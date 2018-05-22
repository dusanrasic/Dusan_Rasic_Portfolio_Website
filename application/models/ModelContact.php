<?php
  /**
   *
   */

  class ModelContact extends CI_Model{
    private $id;
    private $username;
    private $password;
    private $email;
    private $id_function;

    public function __construct()
    {
      parent::__construct();
      //Codeigniter : Write Less Do More
      $this->contactTbl= 'contact';
    }
    public function insertContact($data){
      $insert = $this->db->insert($this->contactTbl, $data);
      redirect();
      }
  }
 ?>
