<?php
  /**
   *
   */

  class ModelProjects extends CI_Model{
    private $id;
    private $title;
    private $link;
    private $img;

    public function __construct()
    {
      parent::__construct();
      //Codeigniter : Write Less Do More
    }

    public function dohvatiPodatke(){
      $upit = "SELECT * FROM projects";
      return $this->db->query($upit)->result();
    }
  }
 ?>
