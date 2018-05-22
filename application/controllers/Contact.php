<?php

  class Contact extends CI_Controller{

    public function __construct()
    {
      parent::__construct();
      //Codeigniter : Write Less Do More
      $this->load->model('ModelContact','Contact');
    }

    function insertCon()
    {
      $dugmeCon = $this->input->post('btnSubContact');
      if($dugmeCon !=""){
        $data = array(
          'contact_subject' => $this->input->post('tbSubContact'),
          'contact_text' => $this->input->post('tbSubContact'),
          'user_id' => $this->session->userdata('id')
        );
        $this->Contact->insertContact($data);
      }
    }
    function anketa() {
      $glas = $this->input->get('glas');

      $anketares = "anketaglasovi.txt";
      $sadrzaj = file($anketares);

      $niz = explode(",", $sadrzaj[0]);
      $like = $niz[0];
      $dislike = $niz[1];


      if ($glas == 0) {
        $like = $like + 1;
      }
      if ($glas == 1) {
        $dislike = $dislike + 1;
      }

      $unesiglasove = $like.",".$dislike;
      $fil = fopen($anketares,"w");
      fputs($fil,$unesiglasove);
      fclose($fil);
      ?>

       <form>
          <input type="button" name="btnLike" value="0" id="like" onclick="anketa(this.value);"/><p>(<?php echo $like?>)</p>
          <input type="button" name="btnDislike"  value="1" id="dislike" onclick="anketa(this.value);"/><p>(<?php echo $dislike?>)</p>
        </form>
        <?php
          }
  }
 ?>
