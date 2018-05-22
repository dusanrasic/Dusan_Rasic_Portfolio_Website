<section class="contact contact-right">
  <div class="contact-me">
    <div class="contact-content">
      <div class="text">
        <p class="first">Send me</p>
        <p class="second">a message!</p>
      </div>
      <div class="forms">
        <?php
          $ulog = $this->session->userdata('ulogovan');
          if (isset($ulog) && $ulog==true) {
              echo form_open('contact/insertCon',array('id' =>'contact_form' ,'name'=>'contact_form','class'=>'contact_form','method'=>'POST'));
              echo form_input(array('id' =>'tbSubContact' ,'name'=>'tbSubContact','class'=>'tbSubContact','placeholder'=>'Subject'));
              echo form_textarea(array('id'=>'taTextContact','name'=>'taTextContact','class'=>'taTextContact', 'placeholder'=>'Text'));
              echo form_submit(array('id'=>'btnSubContact','name'=>'btnSubContact','class'=>'btnSubContact', 'value'=>'Submit','onClick'=>'return validate();'));
              echo form_close();
            }
            else {
              ?>
              <div class="contact-log"><p class='contact-log-p'>Please log in to fill the form!</p></div>
              <?php
              echo form_open('contact/insertCon',array('id' =>'contact_form' ,'name'=>'contact_form','class'=>'contact_form','method'=>'POST'));
              echo form_input(array('id' =>'tbSubContact' ,'name'=>'tbSubContact','class'=>'tbSubContact','placeholder'=>'Subject'));
              echo form_textarea(array('id'=>'taTextContact','name'=>'taTextContact','class'=>'taTextContact', 'placeholder'=>'Text'));
              echo form_submit(array('id'=>'btnSubContact','name'=>'btnSubContact','class'=>'btnSubContact', 'value'=>'Submit','onClick'=>'return validate();'));
              echo form_close();
            }
         ?>
         <div class="anketa" id="ispisanketa">
          <?php
           $anketares = "anketaglasovi.txt";
           $sadrzaj = file($anketares);

           $niz = explode(",", $sadrzaj[0]);
           $like = $niz[0];
           $dislike = $niz[1];
          ?>
            <form>
           <input type="button" name="btnLike" value="0" id="like" onclick="anketa(this.value);"/><p>(<?php echo $like?>)</p>
           <input type="button" name="btnDislike"  value="1" id="dislike" onclick="anketa(this.value);"/><p>(<?php echo $dislike?>)</p>
           </form>
         </div>
      </div>
    </div>
  </div>
</section>
