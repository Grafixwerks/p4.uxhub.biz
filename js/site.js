// Andy Pearson
// CSCI E-60 P final project

$(document).ready(function(){
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
  