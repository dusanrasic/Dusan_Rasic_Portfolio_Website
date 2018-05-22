<section class="commentary commentary-bottom">
  <script type="text/javascript">
  $(document).ready(function(){
    dohvati();
    $('#btnSubPost').click(function(event){
      event.preventDefault();
      var post = $('.taTextPost').val();

      //var user = <?php echo $this->session->userdata('id'); ?>;
        if (post != "") {
          jQuery.ajax({
            type: "POST",
            url: "<?php echo site_url('post/post_submited')?>",
            data: { 'comment_content' : post },
            success: function(result){
              dohvati();
              $('.taTextPost').val('');
            }
          });
        }
        else{
          alert('Morate uneti komentar');
        }

    });
    function dohvati(){
    jQuery.ajax({
        url: "<?php echo site_url('post/post_display')?>",
        dataType: 'html',
        success: function(d){
          //$(document).find('.commentary-content').find('post').each().remove();
          $(document).find('.post-content-posts').html(d);
        }
    });
    }
  });

  </script>
  <div class="commentary-me">
    <div class="commentary-content">
      <div class="post-post">
        <div class="post-content">
          <?php
          $ulog = $this->session->userdata('ulogovan');
          if (isset($ulog) && $ulog==true) {
          echo form_open('',array('id' =>'post_form' ,'name'=>'post_form','class'=>'post_form','method'=>'POST'));
          echo form_textarea(array('id'=>'taTextPost','name'=>'taTextPost','class'=>'taTextPost', 'placeholder'=>'Type in!'));
          echo form_submit(array('id'=>'btnSubPost','name'=>'btnSubPost','class'=>'btnSubPost', 'value'=>'POST'));
          echo form_close();
         }
         else {
           ?>
           <div class="post-log"><p class='post-log-p'>Please log in to fill the form!</p></div>
           <?php
           echo form_open('post/post_submited',array('id' =>'post_form' ,'name'=>'post_form','class'=>'post_form','method'=>'POST'));
           echo form_textarea(array('id'=>'taTextPost','name'=>'taTextPost','class'=>'taTextPost', 'placeholder'=>'Type in!'));
           echo form_submit(array('id'=>'btnSubPost','name'=>'btnSubPost','class'=>'btnSubPost', 'value'=>'POST'));
           echo form_close();
         }
      ?>
      </div>
      </div>
      <div class="post-content-posts">

      </div>
    </div>
  </div>
</section>
</body>
</html>
