<?php
/**
 *
 */
class Post extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('ModelPost','Post');
    $this->data['posts'] = $this->Post->getPosts();
  }

  function index()
  {

  }

  public function post_submited(){
    $data= array(
      'comment_content' => $this->input->post('comment_content'),
      'user_id' => $this->session->userdata('id'),
      'date' => date('Y-m-d H:i:s')
    );
    $this->Post->insertPost($data);

    }


  public function post_display(){
    foreach ($this->data['posts'] as $post ) {
        $db_user = $post->user_name;
        $db_date = $post->date;
        $db_post = $post->comment_content;
        echo '<div class="post">
                  <div class="post-content"><p>
                  '.$db_post.'
                  </p></div>
                  <div class="post-footer">
                      <p>Posted by: '.$db_user.' Date: '.$db_date.'</p>
                  </div>
                </div>';
      }
  }
}
 ?>
