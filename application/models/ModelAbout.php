<?php
  /**
   *
   */

  class ModelAbout extends CI_Model{
    private $naslov;
    private $text;
    private $fb_link;
    private $fb_img;
    private $in_link;
    private $in_img;
    private $gp_link;
    private $gp_img;
    private $ou_link;
    private $ou_img;
    public function __construct()
    {
      parent::__construct();
      //Codeigniter : Write Less Do More
    }

    public function getAboutContent(){
      $this->db->select('*');
      $this->db->from('aboutme');
      $res = $this->db->get();
      return $res->result();
    }
  }
 ?>
