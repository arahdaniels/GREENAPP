<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of System_library
 *
 * @author canwo
 */
class System_library {
    //put your code here
    
    protected $tp;
    
    public function __construct() {
        $this->tp =& get_instance();
    }
    
     public function sendsingleemail($data){
            $this->tp->load->library('email');
            $config['mailtype'] = 'html';
            $config['wordwrap'] = TRUE;
            $this->tp->email->initialize($config);
            $this->tp->email->from($data['sender'], $data['sendername']);
            $this->tp->email->to($data['recepient']);
            $this->tp->email->subject($data['subject']);
            $this->tp->email->message($data['message']);

           return  ($this->tp->email->send()) ? TRUE : FALSE;
        } 
        
    public function upload_single_picture($hadler,$directory) {
        $config['upload_path']          = $directory;
                $config['allowed_types']        = 'jpeg|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['file_ext_tolower']     = TRUE;
                $config['encrypt_name']         = TRUE;
                
                $this->tp->load->library('upload', $config);
                 if ( ! $this->tp->upload->do_upload($hadler)) {
                            $error = array('error' => $this->tp->upload->display_errors(),
                                'status' => FALSE );
                            return $error;
                         }
                        else {
                            $data = array('data' => $this->tp->upload->data(),
                                'status' => TRUE );
                            return $data;
                }
    }
    
     public function upload_profile_picture($hadler,$directory) {
        $config['upload_path']          = $directory;
                $config['allowed_types']        = 'jpeg|jpg|png';
                //$config['max_size']             = 2024;
               // $config['max_width']            = 100;
               // $config['max_height']           = 150;
                $config['file_ext_tolower']     = TRUE;
                $config['encrypt_name']         = TRUE;
                
                $this->tp->load->library('upload', $config);
                 if ( ! $this->tp->upload->do_upload($hadler)) {
                            $error = array('error' => $this->tp->upload->display_errors(),
                                'status' => FALSE );
                            return $error;
                         }
                        else {
                            $data = array('data' => $this->tp->upload->data(),
                                'status' => TRUE );
                            return $data;
                }
    }
    
    public function sendSingleSms($data) {
        $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => "http://api.infobip.com/sms/1/text/single",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "{ \"from\":\"".$data['sender']."\", \"to\":\"".$data['recepient']."\", \"text\":\" ".$data['text']." \" }",
              CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "authorization: Basic dG5vdmV0OndpemFyZDIwMTBjMG0=",
                "content-type: application/json"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                $data['status'] = FALSE;
                $data['content'] = $err;
              } else {
               $data['status'] = TRUE;
               $data['content'] =  $response;
            }
            return $data;
    }
}
