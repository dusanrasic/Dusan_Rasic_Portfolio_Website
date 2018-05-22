<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

  private $data = array();
  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->library('pagination');
    $this->load->model('ModelAdmin','Admin');
    $this->load->model('ModelNavigation','Nav');
    $this->data['users'] = $this->Admin->getUsers();
    $this->data['contacts'] = $this->Admin->getContact();
    $this->data['about'] = $this->Admin->getAbout();
    $this->data['posts'] = $this->Admin->getPosts();
    $this->data['projects'] = $this->Admin->getProjects();
    $this->data['gallery'] = $this->Admin->getGallery();
    $this->data['navs'] = $this->Nav->getNav();

  }

  function index()
  {
    $this->load->view('home');
    $this->load->view('admin',$this->data);
  }
  public function users(){

    $update = $this->input->post('btnUserUpdate');
    $delete = $this->input->post('btnUserDelete');
    $insert = $this->input->post('btnUserAdd');

    if($update !=""){
      $id = $this->input->post('id');
      $username = $this->input->post('name');
      $password = md5($this->input->post('password'));
      $mail = $this->input->post('mail');
      $function = $this->input->post('fn');

      $data = array(
        'user_name' =>$username,
        'password' =>$password,
        'email' =>$mail,
        'id_function' =>$function
      );
      $this->Admin->modifyUsers($id,$data);
      redirect('admin');
    }
    if($delete !=""){
      $id = $this->input->post('id');
      $this->Admin->deleteUsers($id);
      redirect('admin');
    }
    if($insert !=""){
      $username = $this->input->post('nickname');
      $password = md5($this->input->post('pass'));
      $mail = $this->input->post('email');
      $function = $this->input->post('function');

      $data = array(
        'user_name' =>$username,
        'password' =>$password,
        'email' =>$mail,
        'id_function' =>$function
      );
      $this->Admin->insertUsers($data);
      redirect('admin');
    }
  }
  public function contact(){
    $delete = $this->input->post('btnDeleteContact');
    if($delete !=""){
      $id = $this->input->post('conId');
      $this->Admin->deleteContact($id);
      redirect('admin');
    }
  }
  public function gallery(){

    $update = $this->input->post('btnUpdateGallery');
    $delete = $this->input->post('btnDeleteGallery');
    $insert = $this->input->post('btnInsertGallery');

    if($update !=""){
      $id = $this->input->post('gal_id');
      $title = $this->input->post('gal_name');
      $location= $this->input->post('gal_location');

      $data = array(
        'gallery_source' =>$location,
        'gallery_title' =>$title,
      );
      $this->Admin->modifyGallery($id,$data);
      redirect('admin');
    }
    if($delete !=""){
      $id = $this->input->post('gal_id');
      $this->Admin->deleteGalery($id);
      redirect('admin');
    }
    if($insert !=""){

      $title = $this->input->post('galName');

      /*$config = array(
      'upload_path' => "./images/gallery",
      'allowed_types' => "gif|jpg|png|jpeg",
      'overwrite' => TRUE,
      'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
      'max_height' => "768",
      'max_width' => "1024"
      );
      $config['file_name']= time().$_FILES['galLocFile']['name'];
      $this->load->library('upload', $config);

      if(!$this->upload->do_upload('galLocFile'))
      {
        $data = array('upload_data' => $this->upload->data());
        $this->data['uspeh'] = $data;
        $location = "images/gallery/".$data['upload_data']['file_name'];
        //move_uploaded_file($data['upload_data']['file_name'], "$location");
      }
      else{
        $location = $this->input->post('galLoc');
      }*/
      $config['upload_path'] = './images/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $this->upload->initialize($config);
      $this->load->library('upload', $config);
        if (!$this->upload->do_upload('galLocFile')){
            $location = $this->input->post('galLoc');
        }
       else{
          $upload_data=$this->upload->data();
          $file_name=$upload_data['file_name'];

          $location = "images/$file_name";
        }
      $data = array(
        'gallery_source' =>$location,
        'gallery_title' =>$title
      );
      //var_dump($location);
      $this->Admin->insertGallery($data);
      redirect('admin');
      }
    }
  public function about(){
    $update = $this->input->post('btnUpdateAbout');

    if($update !=""){
      $id = $this->input->post('id');
      $title = $this->input->post('title');
      $text = $this->input->post('text');
      $fb = $this->input->post('fb');
      $insta = $this->input->post('insta');
      $gplus = $this->input->post('gplus');
      $out = $this->input->post('out');

      $data = array(
        'title' =>$title,
        'text' =>$text,
        'fb_link' =>$fb,
        'in_link' =>$insta,
        'gp_link' =>$gplus,
        'ou_link' =>$out
      );
      $this->Admin->modifyAbout($id,$data);
      redirect('admin');
    }
  }
  public function project(){
    $update = $this->input->post('btnUpdateProject');

    if($update !=""){
      $id = $this->input->post('id');
      $title = $this->input->post('title');
      $link = $this->input->post('link');
      $image = $this->input->post('image');

      $data = array(
        'project_title' =>$title,
        'project_link' =>$link,
        'project_img' =>$image
      );
      $this->Admin->modifyAbout($id,$data);
      redirect('admin');
    }
  }
  public function posts(){
    $insert = $this->input->post('btnPostAdd');
    $delete = $this->input->post('btnDeletePost');

    if($delete !=""){
      $id = $this->input->post('id');
      $this->Admin->deletePost($id);
      redirect('admin');
    }
    if($insert != ""){
      $text = $this->input->post('text');
      $data = array(
        'comment_content' =>$text,
        'date' => date('Y-m-d H:i:s'),
        'user_id' => 1
      );
      $this->Admin->insertPost($data);
      redirect('admin');
    }
  }
}
 ?>
