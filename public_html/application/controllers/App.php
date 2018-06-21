<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

                $this->force_ssl();
                
                $this->load->helper('form');

	}

	
	public function index()
	{
		if( $this->require_min_level(1))
		{       
                        $redirect_protocol = USE_SSL ? 'https' : NULL;

                        redirect( base_url($this->auth_role.'/dashboard'), $redirect_protocol );
                        
		}
	}
	
        public function error404() {
            $this->load->view('auth/error404');
        }
        
	public function login()
	{
            
		// Method should not be directly accessible
		if( $this->uri->uri_string() == 'app/login')
                    return;

                if( $this->is_logged_in())
		{       
                        $redirect_protocol = USE_SSL ? 'https' : NULL;

                        redirect( base_url($this->auth_role.'/dashboard'), $redirect_protocol );
                        
		}
		if( strtolower( $_SERVER['REQUEST_METHOD'] ) == 'post' )
			$this->require_min_level(1);

		$this->setup_login_form();   
                  
                $pagedata = array('title'=>'Login | Greenapp');
                $this->load->vars($pagedata);
		$this->load->view('auth/login'); 
	}

	// --------------------------------------------------------------

	/**
	 * Log out
	 */
	public function logout()
	{
		$this->authentication->logout();

		// Set redirect protocol
		$redirect_protocol = USE_SSL ? 'https' : NULL;

		redirect( site_url( LOGIN_PAGE . '?' . AUTH_LOGOUT_PARAM . '=1', $redirect_protocol ) );
	}

	// --------------------------------------------------------------

	/**
	 * User recovery form
	 */
	public function reset()
	{
		// Load resources

		/// If IP or posted email is on hold, display message
		if( $on_hold = $this->authentication->current_hold_status( TRUE ) )
		{
			$view_data['disabled'] = 1;
		}
		else
		{
			// If the form post looks good
			if( $this->tokens->match && $this->input->post('email') )
			{
				if( $user_data = $this->app_model->get_recovery_data( $this->input->post('email') ) )
				{
					// Check if user is banned
					if( $user_data->banned == '1' )
					{
						// Log an error if banned
						$this->authentication->log_error( $this->input->post('email', TRUE ) );

						// Show special message for banned user
						$view_data['banned'] = 1;
					}
					else
					{
						/**
						 * Use the authentication libraries salt generator for a random string
						 * that will be hashed and stored as the password recovery key.
						 * Method is called 4 times for a 88 character string, and then
						 * trimmed to 72 characters
						 */
						$recovery_code = substr( $this->authentication->random_salt() 
							. $this->authentication->random_salt() 
							. $this->authentication->random_salt() 
							. $this->authentication->random_salt(), 0, 72 );

						// Update user record with recovery code and time
						$this->app_model->update_user_raw_data(
							$user_data->user_id,
							[
								'passwd_recovery_code' => $this->authentication->hash_passwd($recovery_code),
								'passwd_recovery_date' => date('Y-m-d H:i:s')
							]
						);

						// Set the link protocol
						$link_protocol = USE_SSL ? 'https' : NULL;

						// Set URI of link
						$link_uri = 'app/recovery/' . $user_data->user_id . '/' . $recovery_code;

						$view_data['special_link'] = anchor( 
							site_url( $link_uri, $link_protocol ), 
							site_url( $link_uri, $link_protocol ), 
							'target ="_blank"' 
						);
                                                $view_data['special_link_email'] = anchor( 
							site_url( $link_uri, $link_protocol ),'<h1><b>ACTIVATE ACCOUNT</b></h1>', 
							'target ="_blank"' 
						);
                                                $this->load->library('email');
                                                $config['wordwrap'] = TRUE;
                                                $config['mailtype'] = 'html';

                                                $this->email->initialize($config);
                                                $this->email->from('no-reply@greenapp.co.tz', 'No Reply Greenapp');
                                                $this->email->to($user_data->email);

                                                $this->email->subject('Account Recovery');
                                                $this->email->message('Click activate account link to activate your account, if button did\'t work copy paste link into broswer <br/><br/> '.$view_data['special_link'].'<br/>'
                                                        .$view_data['special_link_email']);

                                                if ($this->email->send(TRUE))
                                                    {
                                                            $view_data['confirmation'] = 1;
                                                    }else{
                                                        $view_data['email_error'] = 1;
                                                    }
						
					}
				}
 
				// There was no match, log an error, and display a message
				else
				{
					// Log the error
					$this->authentication->log_error( $this->input->post('email', TRUE ) );

					$view_data['no_match'] = 1;
				}
			}else{
                            if(strtolower($this->input->server('request_method')) == 'post'):
                            $view_data['token_error'] = TRUE;
                            endif;
                        }
		}


		echo $this->load->view('auth/reset', ( isset( $view_data ) ) ? $view_data : '', TRUE );
	}

	// --------------------------------------------------------------

	/**
	 * Verification of a user by email for recovery
	 * 
	 * @param  int     the user ID
	 * @param  string  the passwd recovery code
	 */
	public function recovery( $user_id = '', $recovery_code = '' )
	{
		/// If IP is on hold, display message
		if( $on_hold = $this->authentication->current_hold_status( TRUE ) )
		{
			$view_data['disabled'] = 1;
		}
		else
		{

			if( 
				/**
				 * Make sure that $user_id is a number and less 
				 * than or equal to 10 characters long
				 */
				is_numeric( $user_id ) && strlen( $user_id ) <= 10 &&

				/**
				 * Make sure that $recovery code is exactly 72 characters long
				 */
				strlen( $recovery_code ) == 72 &&
 
				/**
				 * Try to get a hashed password recovery 
				 * code and user salt for the user.
				 */
				$recovery_data = $this->app_model->get_recovery_verification_data( $user_id ) )
			{
				/**
				 * Check that the recovery code from the 
				 * email matches the hashed recovery code.
				 */
				if( $recovery_data->passwd_recovery_code == $this->authentication->check_passwd( $recovery_data->passwd_recovery_code, $recovery_code ) )
				{
					$view_data['user_id']       = $user_id;
					$view_data['username']     = $recovery_data->username;
					$view_data['recovery_code'] = $recovery_data->passwd_recovery_code;
				}

				// Link is bad so show message
				else
				{
					$view_data['recovery_error'] = 1;

					// Log an error
					$this->authentication->log_error('');
				}
			}

			// Link is bad so show message
			else
			{
				$view_data['recovery_error'] = 1;

				// Log an error
				$this->authentication->log_error('');
			}

			/**
			 * If form submission is attempting to change password 
			 */
			if( $this->tokens->match )
			{
				$this->app_model->recovery_password_change();
			}
		}


		echo $this->load->view( 'auth/choose_password_form', $view_data, TRUE );
	}

   public function language($param=NULL) {
        $languages = array('sw-tz','english');
        if(!empty($param) && in_array($param, $languages)){
            $this->session->set_userdata('language',$param);
        }
        
        if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        } else {
            header("Location: " . base_url());
        }    
    }
    
    public function createaccount()
	{
        $this->load->model('client_model');
		// Method should not be directly accessible
		if( $this->uri->uri_string() == 'app/createaccount')
			show_404();
                
                if( strtolower( $_SERVER['REQUEST_METHOD'] ) == 'post' ){
                    // Customize this array for your user
                    
                    $mobile = str_replace('-', '',trim($this->input->post('mobile')));
                    $mobile = str_replace(' ','',$mobile);
                    //$mobile_code = rand(10000,99999);
                    
                    switch ($this->input->post('auth_level')) {
                        case 'client':
                            $auth_level = '3';
                            break;

                        default:
                            $auth_level = '3';
                            break;
                    }
                    
                    $user_data = [
                            'mobile'   => $mobile,
                            'email'   => $this->input->post('email'),
                            'localization'   => $this->input->post('localization'),
                            'passwd'     => $this->input->post('passwd'),
                        'default_city'     => $this->input->post('default_city'),
                            'confirmpasswd'     => $this->input->post('confirmpasswd'),
                            'auth_level' => $auth_level, 
                    ];
                    
                    // Load resources
                    $this->load->helper('auth');
                    $this->load->model('app/app_model');
                    $this->load->model('app/validation_callables');
                    $this->load->library('form_validation');

                    $this->form_validation->set_data( $user_data );
                    
                    $validation_rules = [
			[
				'field' => 'mobile',
				'label' => 'Mobile',
				'rules' => 'max_length[12]|is_unique[' . db_table('user_table') . '.mobile]',
				'errors' => [
					'is_unique' => 'Mobile number already in use.'
				]
			],
			[
				'field' => 'passwd',
				'label' => 'passwd',
				'rules' => [
					'trim',
					'required',
					[ 
						'_check_password_strength', 
						[ $this->validation_callables, '_check_password_strength' ] 
					]
				],
				'errors' => [
					'required' => 'The password field is required.'
				]
			],
			[
				'field'  => 'email',
				'label'  => 'email',
				'rules'  => 'trim|required|valid_email|is_unique[' . db_table('user_table') . '.email]',
				'errors' => [
					'is_unique' => 'Email address already in use.'
				]
			],
                        [
				'field'  => 'confirmpasswd',
				'label'  => 'Confirm Password',
				'rules'  => 'required|matches[passwd]',
				'errors' => [
					'is_unique' => 'Passwords do not match.'
				]
			],
			[
				'field' => 'auth_level',
				'label' => 'auth_level',
				'rules' => 'required|integer|in_list[1,2,3,4,5,6,7,8,9]'
			]
		];

		$this->form_validation->set_rules( $validation_rules );
                

		if( $this->form_validation->run() )
		{
                        $user_id = $this->app_model->get_unused_user_id();
			$user_data['passwd']     = $this->authentication->hash_passwd($user_data['passwd']);
			$user_data['user_id']    = $user_id;
			$user_data['created_at'] = date('Y-m-d H:i:s');
                        
                      
			// If username is not used, it must be entered into the record as NULL
			if( empty( $user_data['username'] ) )
			{
				$user_data['username'] = $mobile;
			}
                        
                        unset($user_data['confirmpasswd']);
                        
			$this->db->set($user_data)
				->insert(db_table('user_table'));

			if( $this->db->affected_rows() == 1 ){
                              $user_weather_data = [
                                    'profile_weather_account'   => $user_id,
                                    'profile_weather_city'   => 1
                                ];
                        
                            $this->db->insert('profile_weather_data',$user_weather_data);
                                    
                            $var['status'] = TRUE;
                            $var['class'] = 'alert-success';
		            $var['message'] = '<h4>Congratulations</h4>' . '<p>User ' . $user_data['username'] . ' was created.</p>';
                            $this->load->vars($var);
                        }
                            }
                            else
                            {
                            $var['status'] = TRUE;
                            $var['class'] = 'alert-danger';
		            $var['message'] = '<h5>User Creation Error(s)</h5>' . validation_errors();
                            $this->load->vars($var);
                            }
                     }
	
                $pagedata = array('localization' => $this->client_model->localizations());
                $this->load->view('auth/signup',$pagedata);
	}
}

/* End of file Examples.php */
/* Location: /community_auth/controllers/Examples.php */
