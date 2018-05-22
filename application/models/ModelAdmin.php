<?php
  /**
   *
   */

  class ModelAdmin extends CI_Model{

    public function __construct()
    {
      parent::__construct();
      //Codeigniter : Write Less Do More
      $this->commentTbl= 'comments';
      $this->userTbl= 'users';
    }
    public function getUsers()
      {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('function','function.id_function=users.id_function');
        $result=$this->db->get();
        return $result->result();
      }
    public function insertUsers($data)
      {
        $insert = $this->db->insert($this->userTbl, $data);
      }
    public function modifyUsers($id,$data)
      {
        $this->db->where('id_user', $id);
        $this->db->update($this->userTbl, $data);
      }
      public function deleteUsers($id)
      {
        $this->db->where('id_user',$id);
        $this->db->delete('users');
      }
    public function getProjects()
      {
        $this->db->select('*');
        $this->db->from('projects');
        $result=$this->db->get();
        return $result->result();
      }
    public function modifyProjects($id,$data)
      {
      $this->db->where('project_id', $id);
      $this->db->update('projects', $data);
      }
    public function getGallery()
      {
        $this->db->select('*');
        $this->db->from('gallery');
        $result=$this->db->get();
        return $result->result();
      }
    public function modifyGallery($id,$data)
      {
        $this->db->where('gallery_id', $id);
        $this->db->update('gallery', $data);
      }
    public function deleteGalery($id)
      {
        $this->db->where('gallery_id',$id);
        $this->db->delete('gallery');
      }
    public function insertGallery($data)
      {
        $insert = $this->db->insert('gallery', $data);
      }
    public function getAbout()
      {
        $this->db->select('*');
        $this->db->from('aboutme');
        $result=$this->db->get();
        return $result->result();
      }
    public function modifyAbout($id,$data){
        $this->db->where('id', $id);
        $this->db->update('aboutme', $data);
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
    public function insertPost($data)
      {
        $insert = $this->db->insert('comments', $data);
      }
    public function deletePost($id)
      {
        $this->db->where('id_comment',$id);
        $this->db->delete('comments');
      }
    public function getContact()
      {
        $this->db->select('*');
        $this->db->from('contact');
        $result=$this->db->get();
        return $result->result();
      }
    public function deleteContact($id)
      {
        $this->db->where('contact_id',$id);
        $this->db->delete('contact');
      }
    }
 ?>
