<section id="home" class="home">
  <nav id="navigation">
    <div class="btn-ab">
      <p class="ab-p">about</p>
    </div>
    <div class="btn-co">
      <p class="co-p">commentary</p>
    </div>
    <div class="btn-cont">
      <p class="cont-p">contact</p>
    </div>
    <div class="btn-pr">
      <p class="pr-p">projects</p>
    </div>
      <?php
        $ulog = $this->session->userdata('ulogovan');
        if (isset($ulog) && $ulog==true) {
          ?>
          <div class="pic-wrapper">
            <img class="profile-pic" src="http://static1.squarespace.com/static/5246d928e4b03b8157cafad4/53c3c182e4b0d5fd0ebcd8c0/53c3c194e4b0d5fd0ebcd8d4/1405338006348/Thorsten+S.png?format=500w" width="32" height="32">
          </div>
          <div class="account-dropdown" id="account-dropdown">
            <div></div><div></div>
            <?php
            $admin = $this->session->userdata('function');
            if(isset($admin) && $admin == 1){
            $links = array(anchor('','Home'), anchor("admin", "Admin"), anchor("login/logout","Logout"));
            }
            else{
              $links = array(anchor('','Home'), anchor("login/logout","Logout"));
            }
            echo ul($links,array('class' => 'acc' ));
             ?>
          </div>
          <?php
          }
          else{
            ?>
            <div class="btn-log">
              <?php
            echo "<p>LogIn</p>";
          }
            ?>
          </div>
          <div class="btn-doc"><a href="documentation/documentation.pdf" class="doc">Documentation</a></div>
        </nav>

  <?php

if(!isset($ulog) && $ulog!=true){ ?>
<div class="log-form" id='log-form'>
  <div class="log-form-content">
    <div class="lbUserLog"><p>Login</p></div>
    <div class="lbUserReg"><p>Register</p></div>
    <?php
    echo validation_errors();
    echo form_open('login/login',array('id' =>'log_form' ,'name'=>'log_form','class'=>'log_form','method'=>'POST'));
    echo form_input(array('id' =>'tbEmailReg' ,'name'=>'tbEmailReg','class'=>'tbEmailReg','placeholder'=>'Email'));
    echo form_input(array('id' =>'tbUserLog' ,'name'=>'tbUserLog','class'=>'tbUserLog','placeholder'=>'Username'));
    echo form_password(array('id' =>'tbPassLog' ,'name'=>'tbPassLog','class'=>'tbPassLog','placeholder'=>'Password'));
    echo form_submit(array('id'=>'btnLogUser','name'=>'btnLogUser','class'=>'btnLogUser', 'value'=>'LOGIN'));
    echo form_submit(array('id'=>'btnRegUser','name'=>'btnRegUser','class'=>'btnRegUser', 'value'=>'REGISTER', 'onClick'=>'return validateReg();'));
    echo form_close();

    ?>
  </div>
</div>
<?php
}
   ?>
