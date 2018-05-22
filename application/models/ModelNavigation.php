<?php
  /**
   *
   */

  class ModelNavigation extends CI_Model{
    private $id;
    private $title;
    private $link;

    public function __construct()
    {
      parent::__construct();
      //Codeigniter : Write Less Do More
    }

    public function getNav(){
      $this->db->select('*');
      $this->db->from('nav');
      $res = $this->db->get();
      return $res->result();
    }
  }
 ?>
