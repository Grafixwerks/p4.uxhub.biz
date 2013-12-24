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

	$("#join").validate({
		rules: {	
			f_name: {
				required: true,
				minlength: 2
			},
			l_name: {
				required: true,
				minlength: 2
			},
			email: {
				required: true,
				email: true
			},
			password: {
				required: true,
				minlength : 6
			},
			pw_2: {
				required: true,
				minlength : 6,
				equalTo : "#pw"
			}
		},
		messages: {
			f_name: "Please enter your first name.",
			l_name: "Please enter your last name.",
			email: "Please enter a valid email address."
		},
		errorPlacement: function(error, element) {
			 error.appendTo(element.parent());
		}		
	});


}); // close document ready
  