// Andy Pearson
// CSCI E-15 P4

$(document).ready(function(){


	// login modal
//	$('.login-link').click(function () {
//		  $('#modal-login').show();
//		  //$('#modal-login').css({ 'top':100+$(window).scrollTop() });
//		  $('#shade').show().css({ opacity: 0.5, 'width':$(document).width(),'height':$(document).height()});
//		  return false;
//	}); 	

	// close login modal
	$('.close').click(function () {
		  $('#modal-login').hide();
		  $('#shade').hide();
		  return false;
	});

	// homepage tablesorter 
	$("table.listing").tablesorter({widgets : ['zebra']});

	// user dashboard ad list tablesorter 
	$("table.your-ads").tablesorter({
		  widgets : ['zebra'],
		  headers: {
					2: { sorter: false },
					3: { sorter: false }
				}		  
	});

	// user dashboard messages tablesorter 
	$("table.messages").tablesorter({
		  widgets : ['zebra'],
		  headers: {
					3: { sorter: false }
				}		  
	});
	  
}); // close document ready
  