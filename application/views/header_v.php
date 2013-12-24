<?php
// site header
// menu for user account
$name = $this->session->userdata('f_name') ;
$name .= ' ' ;
$name .= $this->session->userdata('l_name') ;

$logged_in_menu = '<ul class="user-nav">' ;
$logged_in_menu .= '<li><a href="/sign-out">Sign out</a></li>' ;
$logged_in_menu .= '<li><a href="/dashboard">Account dashboard</a></li>' ;
$logged_in_menu .= '<li>Logged in as <a href="/profile">' ;
$logged_in_menu .= $name ;
$logged_in_menu .= '</a></li></ul>' ;

// user sign in link 
$sign_in_link = '<ul class="user-nav"><li><a href="/join">Join</a></li><li><a href="/sign-in" class="login-link">Sign in</a></li></ul>' ;

// check if user is signed in and set main nav link
if ($this->session->userdata('is_logged_in')) {
	$nav_link = $logged_in_menu ;
	} else {
	$nav_link = $sign_in_link ;
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title><?php echo html_escape( $title ) ?> | Jobzr</title>
<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>css/main.css">
</head>

<body>


<div class="wrapper">
<div class="main-header ">
<a href="/" class="logo">Jobzr</a>

<?php echo $nav_link ; ?>
</div><!-- close .header -->

<?php 

//		$data['title'] = $this->session->userdata('f_name') ;
//		$data['title'] .= ' ' ;
//		$data['title'] .= $this->session->userdata('l_name') ;

?>