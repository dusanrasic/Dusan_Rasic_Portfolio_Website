<section class="projects projects-up">
  <div class="projects-me">
    <div class="projects-box">
    <?php
      if (isset($projects)) {
        foreach ($projects as $data) {
          ?>
      <div class="project-<?php echo $data->project_id;?>">
          <div class="image">
            <img src="<?php echo $data->project_img;?>">
          </div>
          <div class="title">
            <a href="<?php echo  $data->project_link?>"><h2><i><?php echo $data->project_title?></i></h2></a>
          </div>
      </div>
      <?php
          }
        }
        else {
          echo "Nema podataka!";
        }?>

    </div>
    <div class="project-gallery">
      <?php if(isset($gallery)){
        foreach ($gallery as $data) {
          if($data->gallery_id == 1){
         ?>
        <div class="first">
          <a href="<?php echo $data->gallery_source;?>" title="<?php echo $data->gallery_title;?>"><img src="<?php echo $data->gallery_source;?>"></a>
        </div>
        <div class="second">
          <?php
            }
            else{
           ?>
           <a href="<?php echo $data->gallery_source;?>" title="<?php echo $data->gallery_title;?>"><img src="<?php echo $data->gallery_source;?>"></a>
           <?php
               }
             }
           }
             else {
               echo "Nema podataka!";
             }
            ?>
        </div>
    </div>
  </div>
</section>
