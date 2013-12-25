<div class="main">

<?php
//	echo '<pre>' ;
//	print_r($results) ;
//	echo '<br />' ;	
//	print_r($this->session->all_userdata()) ;
//	echo '</pre>' ;	
?>

<?php foreach ($results as $ad): ?> 

<h1><?php echo $ad->headline ; ?></h1>

<div class="left-col-sm">

<ul class="job-ad">
<li>Posted by: <a href="/user/<?php echo $ad->user_id ; ?>"><?php echo $ad->f_name ; ?> <?php echo $ad->l_name ; ?></a></li>
<li>Posted: <?php echo date( "F j, Y", strtotime( $ad->date ) ) ; ?></li>
<li><?php echo $ad->location ; ?></li>
<li><?php echo $ad->type ; ?></li>
<li><?php echo $ad->hours ; ?></li>
<li><?php echo $ad->on_site ; ?></li>
<li><?php echo $ad->level ; ?></li>
</ul></div><!-- close .left-col-sm -->

<div class="left-col">

<?php
$description  = $this->typography->auto_typography($ad->description);
 echo $description ;
  ?>
<?php if ($this->session->userdata('is_logged_in')) : ?>
<a href="/ad-reply/<?php echo $ad->ad_id ; ?>" class="btn">Reply</a>
<?php else:  ?>

<p><a href="/join">Join</a> or <a href="/sign-in" class="login-link">sign in</a> to reply.</p>

<?php endif; ?>

</div><!-- close .left-col -->



<?php endforeach  ?> 

 
</div><!-- close .main -->
