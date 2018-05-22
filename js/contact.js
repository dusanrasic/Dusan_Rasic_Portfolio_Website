
  var check_subject = /^[A-Za-z0-9 ]{3,40}$/;
  var check_content = /^[A-Za-z0-9 ]{3,200}$/;


  function validate(){
  var subject = document.getElementById('tbSubContact').value;
  var content = document.getElementById('taTextContact').value;
  var errors = [];

   if (!check_subject.test(subject)) {
    errors[errors.length] = "You must enter valid Subject (3-20).";
   }
   if (!check_content.test(content)) {
    errors[errors.length] = "You must enter valid Content(3-200).";
   }

   if (errors.length > 0) {
    reportErrors(errors);
    return false;
   }
    return true;
  }
  function reportErrors(errors){
   var msg = "Please Enter Valide Data...\n";
   for (var i = 0; i<errors.length; i++) {
   var numError = i + 1;
    msg += "\n" + numError + ". " + errors[i];
  }
   alert(msg);
  }

  var check_name = /^[A-Za-z0-9 ]{3,20}$/;
  var check_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i ;
  var check_password =  /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;

  function validateReg(){
  var username = document.getElementById('tbUserLog').value;
  var password = document.getElementById('tbPassLog').value;
  var email = document.getElementById('tbEmailReg').value;
  var errors = [];

   if (!check_name.test(username)) {
    errors[errors.length] = "You must enter valid username (3-20).";
   }
   if (!check_password.test(password)) {
    errors[errors.length] = "You must enter valid password(6-20).";
   }
   if (!check_email.test(email)) {
    errors[errors.length] = "You must enter a valid email address.";
   }

   if (errors.length > 0) {
    reportErrors(errors);
    return false;
   }
    return true;
  }
  function reportErrors(errors){
   var msg = "Please Enter Valide Data...\n";
   for (var i = 0; i<errors.length; i++) {
   var numError = i + 1;
    msg += "\n" + numError + ". " + errors[i];
  }
   alert(msg);
  }

  function galCheck(){
  var title = document.getElementById('galName').value;
  var loc = document.getElementById('galLoc').value;
  var browse = document.getElementById('galLocFile').files.length;
  var errors = [];

   if (title == "") {
    errors[errors.length] = "You must enter valid title.";
   }
   if (loc == "" && browse == 0 ) {
    errors[errors.length] = "You must enter valid address of image or browse.";
   }
   if (errors.length > 0) {
    reportErrors(errors);
    return false;
   }
    return true;
  }
  function reportErrors(errors){
   var msg = "Please Enter Valide Data...\n";
   for (var i = 0; i<errors.length; i++) {
   var numError = i + 1;
    msg += "\n" + numError + ". " + errors[i];
  }
   alert(msg);
  }
  /*Ajax Anketa*/

  function anketa(likedislike) {
        if (window.XMLHttpRequest) {

            xmlhttp = new XMLHttpRequest();
        } else {

            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("ispisanketa").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","Contact/anketa?glas="+likedislike,true);
        xmlhttp.send();
    }
