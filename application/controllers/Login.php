<?php

class Login extends CI_Controller{

    private $data = array();
    public function __construct()
    {
      parent::__construct();
      $this->load->model('ModelUsers','Users');
      //$this->data['users'] = $this->Users->getUsers();
    }

   public function login()
    {
        $dugmeLog = $this->input->post('btnLogUser');
        $dugmeReg = $this->input->post('btnRegUser');

        if($dugmeReg !=""){
          $email= $this->input->post('tbEmailReg');
          $user = $this->input->post('tbUserLog');
          $pass = md5($this->input->post('tbPassLog'));

          $data = array(
              'user_name' => $user,
              'password' => $pass,
              'email' => $email,
              'id_function' => '2'
            );
            $this->Users->insertUsers($data);
            redirect();
          }

        if($dugmeLog!="")
        {
            //$email= "";
            $user = $this->input->post('tbUserLog');
            $pass = md5($this->input->post('tbPassLog'));

            $log=$this->Users->login($user,$pass);
            if($log)
            {
                foreach ($log as $l) {
                  $this->session->set_userdata('username',$l->user_name);
                  $this->session->set_userdata('function',$l->id_function);
                  $this->session->set_userdata('id',$l->id_user);
                  $this->session->set_userdata('ulogovan', true);
                  $this->session->set_flashdata('ulogovanporuka','Ulogovali ste se!');
                }
                if($this->session->userdata('function') == 1){
                $this->session->set_userdata('admin', true);
                redirect('admin');
                }
                else{
                  redirect();
                }
            }
            else
            {
                redirect();
            }
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('function');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('admin');
        $this->session->unset_userdata('ulogovan');
        $this->session->sess_destroy();
        redirect();
    }
}
