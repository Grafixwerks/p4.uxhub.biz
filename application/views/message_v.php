<?php
//	echo '<pre>' ;
//	print_r($results) ;
//	echo '<br />' ;	
//	print_r($this->session->all_userdata()) ;
//	echo '</pre>' ;	
?>
<div class="main">

 


<?php foreach ($results as $message): ?> 

<h1><?php echo $message->subject ; ?></h1>
<div class="left-med">
<p><?php echo $message->message ; ?></p>

<p>Sent by: <a href="/user/<?php echo $message->user_id ; ?>"><?php echo $message->f_name ; ?> <?php echo $message->l_name ; ?></a></p>


<a href="/message-reply/<?php echo $message->message_id ; ?>" class="btn">Reply</a>

</div><!-- close .left-med -->

<?php endforeach  ?> 

</div><!-- close .main -->
