<?php
  /**
   *
   */

  class ModelPost extends CI_Model{

    public function __construct()
    {
      parent::__construct();
      //Codeigniter : Write Less Do More
      $this->commentTbl= 'comments';
    }
    public function insertPost($data){
      $insert = $this->db->insert($this->commentTbl, $data);
      redirect();
      }
    public function getPosts()
      {
        $this->db->select('*');
        $this->db->from('comments');
        $this->db->join('users','users.id_user=comments.user_id');
        $this->db->order_by('date','DESC');
        $result=$this->db->get();
        return $result->result();
      }
  }
 ?>
