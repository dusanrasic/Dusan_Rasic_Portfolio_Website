<?php
/**
 *
 */
class App extends CI_Controller{
  private $data=array();
  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('ModelAbout','About');
    $this->data['about'] = $this->About->getAboutContent();
    $this->load->model('ModelProjects', 'Projects');
    $this->data['projects']=$this->Projects->dohvatiPodatke();
    $this->load->model('ModelGallery','Gallery');
    $this->data['gallery']=$this->Gallery->dohvatiPodatke();
  }

  function index()
  {
    $this->load->view('home');
    $this->load->view('navigation');
    $this->load->view('home_content');
    $this->load->view('commentary');
    $this->load->view('contact');
    $this->load->view('projects', $this->data);
    $this->load->view('about',$this->data);
  }

}
 ?>
