jQuery(document).ready(function($){

	  // Get current url and find last index
	  var fullurl = window.location.href;
	  var res = fullurl.split("/");
	  var len = res.length;
	  var last_index = res[len-1];
	 
	  if(last_index == 'our-clients') {
	    $('li.home').removeClass('current_page_item');
	    $('#clients').addClass('current_page_item');
	  }
	  if(last_index == 'about-us') {
	    $('li.home').removeClass('current_page_item');
	    $('#about').addClass('current_page_item');
	  }
	  if(last_index == 'careers') {
	    $('li.home').removeClass('current_page_item');
	    $('#careers').addClass('current_page_item');
	  }
	  if(last_index == 'login') {
	    $('li.home').removeClass('current_page_item');
	    $('#login').addClass('current_page_item');
	  }
	  if(last_index == 'register') {
	    $('li.home').removeClass('current_page_item');
	    $('#register').addClass('current_page_item');
	  }
	  if(last_index == 'home') {
	    $('li.home').removeClass('current_page_item');
	    $('#home').addClass('current_page_item');
	  }
	  if(last_index == 'new-dashboard') {
	  	alert();
	    $('li.home').removeClass('current_page_item');
	    $('#home').addClass('current_page_item');
	  }
});