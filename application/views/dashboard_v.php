<?php
//	echo '<pre>' ;
//	print_r($results) ;
//	print_r($inbox) ;
//	echo '<br />' ;	
//	print_r($this->session->all_userdata()) ;
//	echo '</pre>' ;	
$name = $this->session->userdata('f_name') ;
$name .= ' ' ;
$name .= $this->session->userdata('l_name') ;
?>
<div class="main">

<h1><?php echo $name ; ?> account dashboard</h1>

<a href="/create-ad" class="btn">Create job ad</a>

<h2>Your ads</h2>

<?php if ($results == NULL) : ?>

    <p>You have no ads.</p>

<?php else:  ?>

    <table class="tablesorter your-ads">
    <thead>
      <tr>
          <th scope="col" class="th-headline left">Headline</th>
          <th scope="col" class="th-posted">Posted On</th>
          <th scope="col" class="th-edit">&nbsp;</th>
          <th scope="col" class="th-delete">&nbsp;</th>
      </tr>
    </thead>
    
    <tbody>
    
    <?php foreach ($results as $ad): ?> 
        <tr>
              <td class="left"><a href="ad/<?php echo $ad->ad_id ; ?>"><?php echo $ad->headline ; ?></a></td>
              <td><?php echo date( "j-M-y", strtotime( $ad->date ) ) ; ?></td>
              <td><a href="/edit-ad/<?php echo $ad->ad_id ; ?>">edit</a></td>
              <td><a href="/delete-ad/<?php echo $ad->ad_id ; ?>" class="del">delete</a></td>
        </tr>
    <?php endforeach  ?> 
    
    </tbody>  
    </table>

<?php endif; ?>

<h2>Your Messages</h2>

<?php if ($inbox == NULL) : ?>

    <p>You have no messages.</p>

<?php else:  ?>

    <table class="tablesorter messages">
    <thead>
      <tr>
          <th scope="col" class="th-subject">Subject</th>
          <th scope="col" class="th-from">From</th>
          <th scope="col" class="th-date">Date</th>
          <th scope="col" class="th-delete">&nbsp;</th>
        </tr>
      <tr>
    </thead>
    <tbody>  
    <?php foreach ($inbox as $message): ?> 
        <tr>
            <td class="left"><a href="/view-message/<?php echo $message->message_id ; ?>"><?php echo $message->subject ; ?></a></td>
            <td> <a href="/user/<?php echo $message->user_id ; ?>"><?php echo $message->f_name ; ?> <?php echo $message->l_name ; ?></a> </td>
            <td><?php echo date( "j-M-y", strtotime( $message->date ) ) ; ?></td>
            <td><a href="/delete-message/<?php echo $message->message_id ; ?>" class="del">delete</a></td>
         </tr>
    <?php endforeach  ?> 
    </tbody>
    </table>

<?php endif; ?>
 
</div><!-- close .main -->