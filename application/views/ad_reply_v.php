<div class="main">

<?php
//	echo '<pre>' ;
//	print_r($results) ;
//	echo '<br />' ;	
//	print_r($this->session->all_userdata()) ;
//	echo '</pre>' ;	
?>

<?php foreach ($results as $ad): ?> 

    <h1>Reply to ad</h1>
    
    <p>To: <a href="/user/<?php echo $ad->user_id ; ?>"><?php echo $ad->f_name ; ?> <?php echo $ad->l_name ; ?></a></p>
    
    <?php 
    $attributes = array('id' => 'send-message', 'class' => 'wide');
    echo form_open('message_c/reply_validation', $attributes) ; ?>

    <?php echo validation_errors('<div class="error">', '</div>') ; ?>
    
        <input name="to" type="hidden" value="<?php echo $ad->user_id ; ?>">
            
        <div class="form-field">
            <label for="subject">Subject<span class="star">*</span></label>
            <input type="text" class="txt long" name="subject" id="subject" maxlength="40" value="Re: <?php echo $ad->headline ; ?>" />
        </div><!-- close .form-field -->
        
        <div class="form-textarea">
            <label for="message">Message<span class="star">*</span></label>
            <textarea name="message" id="message	" maxlength="5000" class="txt long"></textarea>
        </div><!-- close .form-textarea -->
        
        <input name="create-ad" id="btn-ad" class="btn" type="submit" value="Send" />
    
    <?php echo form_close() ; ?>

<?php endforeach  ?> 

</div><!-- close .main -->
