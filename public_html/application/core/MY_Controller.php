<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Community Auth - MY Controller
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2017, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */

require_once APPPATH . 'third_party/auth/core/Auth_Controller.php';

class MY_Controller extends Auth_Controller
{
	/**
	 * Class constructor
	 */
        protected $profiler;
        
        public function __construct()
	{
		parent::__construct();
                $this->_profile();
	}
        
        final function _profile() {
            $this->is_logged_in();
            // load profile data form controllers
            switch ($this->auth_role) {
                case 'admin':
                        $this->profiler = $this->admin_data();
                    break;
                case 'client':
                        $this->profiler = $this->client_data();
                    break;
                case 'corporate':
                        $this->profiler = $this->corporate_data();
                    break;
                default:
                    $this->profiler = $this->my_auth_model->_get_profile( $this->auth_user_id );
                    break;
            }
            
            $this->config->set_item('profiler', $this->profiler);
            // load profile data for views
            $var['profiler'] = $this->profiler;            
            $this->load->vars($var);
            
        }
        
        final function corporate_data(){
            return $this->my_auth_model->_get_corporate_profile( $this->auth_user_id);
        }
        
        final function client_data(){
            return $this->my_auth_model->_get_client_profile( $this->auth_user_id);
        }
        
        final function admin_data(){
            return $this->my_auth_model->_get_admin_profile( $this->auth_user_id);
        }
}

/* End of file MY_Controller.php */
/* Location: /community_auth/core/MY_Controller.php */