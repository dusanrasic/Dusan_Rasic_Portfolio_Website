<section class="about about-left">
<div class="about-me">
  <div class="about-me-content">
    <?php
      if (isset($about)) {
        foreach ($about as $data) {
          ?>
          <h1 class="title"><?php echo $data->title; ?></h1>
          <p class="content"><?php echo $data->text; ?></p>
          <div class="picture"></div>
          <a href="<?php echo $data->fb_link;?>" class="facebook"><img src="<?php echo $data->fb_img;?>" alt="facebook"></a>
          <a href="<?php echo $data->in_link;?>" class="instagram"><img src="<?php echo $data->in_img;?>" alt="instagram"></a>
          <a href="<?php echo $data->gp_link;?>" class="googleplus"><img src="<?php echo $data->gp_img;?>" alt="googleplus"></a>
          <a href="<?php echo $data->ou_link;?>" class="outlook"><img src="<?php echo $data->ou_img;?>" alt="outlook"></a>
          <?php
        }
      }
      else {
        echo "Nema podataka!";
      }
     ?>
  </div>
</div>
</section>
