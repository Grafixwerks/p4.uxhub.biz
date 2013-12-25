<?php
//	echo '<pre>' ;
//	print_r($results) ;
//	echo '<br />' ;	
//	print_r($this->session->all_userdata()) ;
//	echo '</pre>' ;	
?>
<div class="main">

<h1>Rely to message</h1>

<div class="left-med">

<?php foreach ($results as $message): ?> 
  
    <p>To: <a href="/user/<?php echo $message->user_id ; ?>"><?php echo $message->f_name ; ?> <?php echo $message->l_name ; ?></a></p>
    
    <?php 
    $attributes = array('id' => 'send-message', 'class' => 'wide');
    echo form_open('message_c/reply_validation', $attributes) ; ?>

    <?php echo validation_errors('<div class="error">', '</div>') ; ?>
    
        <input name="to" type="hidden" value="<?php echo $message->user_id ; ?>">
            
        <div class="form-field">
            <label for="subject">Subject<span class="star">*</span></label>
            <input type="text" class="txt long" name="subject" id="subject" maxlength="40" value="Re: <?php echo $message->subject ; ?>" />
        </div><!-- close .form-field -->
        
        <div class="form-textarea">
            <label for="message">Message<span class="star">*</span></label>
            <textarea name="message" id="message" maxlength="5000" class="txt long"> <?php echo $message->message ; ?></textarea>
        </div><!-- close .form-textarea -->
        
        <input name="create-ad" id="btn-ad" class="btn" type="submit" value="Send" />
    
    <?php echo form_close() ; ?>
</div><!-- close .left-med -->
<?php endforeach  ?> 

</div><!-- close .main -->