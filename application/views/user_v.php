<?php
// user profile, takes user_id from link
$f_name = '' ;
$l_name = '' ;
$location = '' ;
$website = '' ;
$bio = '' ;
$pic = '' ;
$company = '' ;

if(empty($results)){
    // no records to display
	$f_name = 'no records to display' ;
} else {
    // records have been returned
	$f_name = html_escape( $results[0]->f_name ) ;
	$l_name = html_escape( $results[0]->l_name ) ;
	$pic = "{$results[0]->pic }" ;

	if ($results[0]->city != NULL) {
		$location = '<h3>location:</h3>' ;
		$location .= '<p>' ;
		$location .= html_escape( $results[0]->city ) ;
		$location .= ', ' ;
		$location .= html_escape( $results[0]->state ) ;
		$location .= '</p>' ;
	} else $location = '' ;
	
	if ($results[0]->website != NULL) {
		$website = '<h3>website:</h3>' ;
		$website .= '<p><a href="' ;
		$website .= html_escape( $results[0]->website ) ;
		$website .= '"  target="_blank">' ;
		$website .= html_escape( $results[0]->website ) ;
		$website .= '</a></p>' ;
	} else $website = '' ;

	if ($results[0]->company != NULL) {
		$company = '<h3>company: </h3>' ;
		$company .= '<p>' ;

		$company .= html_escape( $results[0]->company ) ;
		$company .= '</p>' ;
	} else $company = '' ;

	if ($results[0]->bio != NULL) {
		$bio = '<h3>bio:</h3>' ;
		$bio .= '<p class="bio-text">' ;
		$bio .= html_escape( $results[0]->bio ) ;
		$bio .= '</p>' ;
	} else $bio = '' ;
	
	if ($results[0]->pic != NULL) {
		$pic = "{$results[0]->pic}" ;
	} else { 
		$pic = 'unk-user' ;
	}
}

?>



<?php
//	echo '<pre>' ;
//	print_r($results) ;
	//echo '<br />' ;	
	//print_r($this->session->all_userdata()) ;
//	echo '</pre>' ;	
?>

<?php foreach ($results as $user): ?> 

<h1><?php echo $user->f_name ; ?> <?php echo $user->l_name ; ?></h1>

<?php endforeach  ?> 
  <div class="profile-left">

      <img src="<?php echo site_url(); ?>images/user/<?php echo $user->pic ; ?>" width="130" height="130" alt="" class="user-pic">
      
  </div><!-- .profile-left -->

<div class="profile">


<?php echo $location ; ?>

<?php echo $company ; ?>

<?php echo $website ; ?>

<?php echo $bio ; ?>

<?php if ($this->session->userdata('is_logged_in')) : ?>
<p>logged in</p>
<?php endif; ?>
<a href="/edit-profile" class="btn btn-edit-profile">Edit your profile</a>


</div><!-- .profile -->

<br class="clr-flt" />


