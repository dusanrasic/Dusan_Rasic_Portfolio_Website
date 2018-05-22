<?php
  /**
   *
   */

  class ModelUsers extends CI_Model{
    /*private $id;
    private $username;
    private $password;
    private $email;
    private $id_function;*/

    public function __construct()
    {
      parent::__construct();
      //Codeigniter : Write Less Do More
      $this->userTbl= 'users';
    }

/*public function getUsers(){
      $this->db->select('*');
      $this->db->from('users');
      $this->db->join('function', 'function.id_function=users.id_function');
      $query = $this->db->get();
      return $query->result();
    }*/
    public function insertUsers($data){
      $insert = $this->db->insert($this->userTbl, $data);
      redirect();
    }
    public function login($username,$pass){
      $this->db->select('*');
      $this->db->from('users');
      $this->db->join('function', 'function.id_function=users.id_function');
      $this->db->where('user_name',$username);
      $this->db->where('password',$pass);
      $query = $this->db->get();
      return $query->result();
    }
}
 ?>
