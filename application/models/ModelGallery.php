<?php
  /**
   *
   */

  class ModelGallery extends CI_Model{
    private $id;
    private $title;
    private $link;

    public function __construct()
    {
      parent::__construct();
      //Codeigniter : Write Less Do More
    }

    public function dohvatiPodatke(){
      $upit = "SELECT * FROM gallery";
      return $this->db->query($upit)->result();
    }
  }
 ?>
