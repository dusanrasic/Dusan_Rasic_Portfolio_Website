$(document).ready(function() {
  $aboutLeft = $('.about-left');
  $btn_ab = $('.btn-ab .ab-p');
  $commentaryBottom=$('.commentary-bottom');
  $btn_co=$('.btn-co .co-p');
  $contactRight=$('.contact-right');
  $btn_cont=$('.btn-cont .cont-p');
  $projectsUp=$('.projects-up');
  $btn_pr=$('.btn-pr .pr-p');
  $btn_ab.click(function() {
    $(this).toggleClass('active');
    $('body').toggleClass('about-push-toright');
    $aboutLeft.toggleClass('about-open');
    $aboutLeft.toggleClass('active');
    $commentaryBottom.removeClass('commentary-open');
    $contactRight.removeClass('contact-open');
    $projectsUp.removeClass('project-open');
    $('body').removeClass('projects-push-bottom');
    $('body').removeClass('contact-push-left');
    $('body').removeClass('commentary-push-up');
    $projectsUp.removeClass('active');
    $commentaryBottom.removeClass('active');
    $contactRight.removeClass('active');
    $btn_co.removeClass('active');
    $btn_cont.removeClass('active');
    $btn_pr.removeClass('active');
  });
  $btn_co.click(function() {
    $(this).toggleClass('active');
    $('body').toggleClass('commentary-push-up');
    $commentaryBottom.toggleClass('commentary-open');
    $commentaryBottom.toggleClass('active');
    $aboutLeft.removeClass('about-open');
    $contactRight.removeClass('contact-open');
    $projectsUp.removeClass('project-open');
    $('body').removeClass('about-push-toright');
    $('body').removeClass('projects-push-bottom');
    $('body').removeClass('contact-push-left');
    $aboutLeft.removeClass('active');
    $projectsUp.removeClass('active');
    $contactRight.removeClass('active');
    $btn_ab.removeClass('active');
    $btn_cont.removeClass('active');
    $btn_pr.removeClass('active')
    });
  $btn_cont.click(function() {
    $(this).toggleClass('active');
    $('body').toggleClass('contact-push-left');
    $contactRight.toggleClass('contact-open');
    $contactRight.toggleClass('active');
    $commentaryBottom.removeClass('commentary-open');
    $aboutLeft.removeClass('about-open');
    $projectsUp.removeClass('project-open');
    $('body').removeClass('commentary-push-up');
    $('body').removeClass('about-push-toright');
    $('body').removeClass('projects-push-bottom');
    $aboutLeft.removeClass('active');
    $commentaryBottom.removeClass('active');
    $projectsUp.removeClass('active');
    $btn_co.removeClass('active');
    $btn_ab.removeClass('active');
    $btn_pr.removeClass('active');
    });
  $btn_pr.click(function() {
    $(this).toggleClass('active');
    $('body').toggleClass('projects-push-bottom');
    $projectsUp.toggleClass('project-open');
    $projectsUp.toggleClass('active');
    $commentaryBottom.removeClass('commentary-open');
    $aboutLeft.removeClass('about-open');
    $contactRight.removeClass('contact-open');
    $('body').removeClass('contact-push-left');
    $('body').removeClass('commentary-push-up');
    $('body').removeClass('about-push-toright');
    $aboutLeft.removeClass('active');
    $commentaryBottom.removeClass('active');
    $contactRight.removeClass('active');
    $btn_co.removeClass('active');
    $btn_cont.removeClass('active');
    $btn_ab.removeClass('active');
  });
  function nav(){
    if(!($('section').hasClass('active'))){
      if (window.matchMedia('(max-width: 768px)').matches){
        $('.btn-ab').css({"left":"4vw"});
        $btn_ab.css({'margin-left':'-6.5vw'});
        $('.btn-pr').css({"top":"7vh"});
        $('.btn-co').css({"bottom":"10vh"});
        $('.btn-cont').css({"right":"4vw"});
        $btn_cont.css({'margin-left':'-7.5vw'});
      }
      else{
        $('.btn-ab').css({"left":"4vw"});
        $btn_ab.css({'margin-left':'-6.5vw'});
        $('.btn-pr').css({"top":"7vh"});
        $('.btn-co').css({"bottom":"7vh"});
        $('.btn-cont').css({"right":"4vw"});
        $btn_cont.css({'margin-left':'-6vw'});
      }
    }
    else{
      if (window.matchMedia('(max-width: 768px)').matches){
        $('btn-ab').css({"left":"2vw"});
        $btn_ab.css({'margin-left':'-8.5vw'});
        $('.btn-pr').css({"top":"4vh"});
        $('.btn-co').css({"bottom":"5vh"});
        $('.btn-cont').css({"right":"5vw"});
        $btn_cont.css({'margin-left':'-4vw'});
      }
      else{
        $('btn-ab').css({"left":"2vw"});
        $btn_ab.css({'margin-left':'-8.5vw'});
        $('.btn-pr').css({"top":"4vh"});
        $('.btn-co').css({"bottom":"2vh"});
        $('.btn-cont').css({"right":"4vw"});
        $btn_cont.css({'margin-left':'-4vw'});
      }
    }
    if($('#navigation').find('p').hasClass('active')){
      if($btn_ab.hasClass('active')){
        $btn_ab.html('home');
        $btn_pr.html('projects');
        $btn_co.html('commentary');
        $btn_cont.html('contact');
      }
      else if ($btn_pr.hasClass('active')) {
        $btn_ab.html('about');
        $btn_co.html('commentary');
        $btn_cont.html('contact');
        $btn_pr.html('home');
      }
      else if ($btn_co.hasClass('active')) {
        $btn_pr.html('projects');
        $btn_ab.html('about');
        $btn_cont.html('contact');
        $btn_co.html('home');
      }
      else if ($btn_cont.hasClass('active')) {
        $btn_co.html('commentary');
        $btn_pr.html('projects');
        $btn_ab.html('about');
        $btn_cont.html('home');
      }
    }
    else {
      {
        $btn_ab.html('about');
        $btn_pr.html('projects');
        $btn_co.html('commentary');
        $btn_cont.html('contact');
      }
    }
    }
    setInterval(nav,1000);
    //gallery plug-in
    $('.project-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title');
			}
		}
	});
  $('.btn-log').click(function(event){
    event.preventDefault();
    $('.log-form').toggleClass('active').focus();
  });

  $('html').click(function (e) {
    if (e.target.id == 'log-form') {
        $('.log-form').removeClass('active');
    }
});
  $('.lbUserReg').click(function(){
    $('.log-form-content').css({'background-color':'#db0828'});
    $('.log_form').css({'background-color':'#db0828'});
    $('.tbUserLog').css({'background-color':'#db0828'});
    $('.tbPassLog').css({'background-color':'#db0828'});
    $('.tbEmailReg').css({'background-color':'#db0828'});
    $('.btnLogUser').css({'display':'none'});
    $('.btnRegUser').css({'display':'block'});
    $('.tbEmailReg').css({'display':'block'});
    $('.lbUserReg').addClass('active');
  });
  $('.lbUserLog').click(function(){
    $('.log-form-content').css({'background-color':'#3c3c3e'});
    $('.log_form').css({'background-color':'#3c3c3e'});
    $('.tbUserLog').css({'background-color':'#3c3c3e'});
    $('.tbPassLog').css({'background-color':'#3c3c3e'});
    $('.btnLogUser').css({'display':'block'});
    $('.btnRegUser').css({'display':'none'});
    $('.tbEmailReg').css({'display':'none'});
    $('.lbUserReg').removeClass('active');
  });
  $('.btn-log').hover(function(){
    $('.btn-log a').toggleClass('active');
  });

  $('.pic-wrapper').click(function(e){
    e.preventDefault();
    $('.account-dropdown').toggleClass('active');
  });
  $('html').click(function (b) {
    if (b.target.id == 'account-dropdown') {
        $('.account-dropdown').removeClass('active');
    }
  });
  $('.contact-log').mousedown(function(){
    $('.contact-log-p').toggleClass('active');
  });
  //script for table
  $('table tr').each(function(){
    $(this).find('th').first().addClass('first');
    $(this).find('th').last().addClass('last');
    $(this).find('td').first().addClass('first');
    $(this).find('td').last().addClass('last');
  });
    $('table tr').first().addClass('row-first');
    $('table tr').last().addClass('row-last');

  $('.btn-doc').mouseenter(function(){
    $('.doc').css({"color":"#4b4b4b"});
  });
  $('.btn-doc').mouseleave(function(){
    $('.doc').css({"color":"#d4d4d4"});
  });
});
