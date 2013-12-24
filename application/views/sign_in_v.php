<div class="main">



<h1>Login to your account</h1>


<?php 
$attributes = array('id' => 'login');

echo form_open('user_c/sign_in_validation', $attributes) ; ?>

<?php echo validation_errors('<div class="error">', '</div>') ; ?>

<div class="form-field">
<label for="email">Email</label>
<input type="text" class="med txt" name="email" id="email" maxlength="20"  value="<?php echo set_value('email'); ?>" />
</div><!-- close .form-field -->


<div class="form-field">
<label id="label-pw" for="password">Password</label>
<input type="password" class="med txt" name="password" id="password" maxlength="40" autocomplete="off" />
</div><!-- close .form-field -->


<input name="login" id="join-btn" class="btn" type="submit" value="Login" />

<p class="notice"><a href="join.html">Join</a></p>
      

<?php echo form_close() ; ?>




</div><!-- close .main -->