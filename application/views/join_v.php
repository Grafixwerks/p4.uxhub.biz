<?php
// form to join
?>
<div class="main">
   
<h1>Join for a free account</h1>

<?php 
$attributes = array('id' => 'join');
echo form_open('user_c/join_validation', $attributes) ; ?>

<?php echo validation_errors('<div class="error">', '</div>') ; ?>

<div class="form-field">
    <label for="f_name">First name</label>
    <input type="text" class="med txt" name="f_name" id="f_name" maxlength="40"  value="<?php echo set_value('f_name'); ?>" />
</div><!-- close .form-field -->

<div class="form-field">
    <label for="l_name">Last name</label>
    <input type="text" class="med txt" name="l_name" id="l_name" maxlength="40"  value="<?php echo set_value('l_name'); ?>" />
</div><!-- close .form-field -->

    <div class="form-field">
    <label for="email">Email<span class="star">*</span></label>
    <input type="text" class="med txt" name="email" id="email" maxlength="100"  value="<?php echo set_value('email'); ?>" />
</div><!-- close .form-field -->

<p class="notice">We don't spam. Your email address will not be seen by other users of this site and we will not spam you. Your email address won't be shared.</p>

<div class="form-field">
    <label id="label-pw" for="pw">Password<span class="star">*</span></label>
    <input type="password" class="med txt" name="password" id="password" maxlength="30"  autocomplete="off" />
</div><!-- close .form-field -->

<p class="notice">6 or more characters. Please use letters and numbers.</p>

<div class="form-field">
    <label id="label-pw-2" for="c_password">Verify password<span class="star">*</span></label>
    <input type="password" class="med txt" name="c_password" id="c_password" maxlength="30"  autocomplete="off" />
</div><!-- close .form-field -->

<input name="join" id="join-btn" class="btn" type="submit" value="Join" />


<p class="notice"><span class="star">*</span>Required information.</p>

<?php echo form_close() ; ?>

<p>Already a member?  <a href="<?php echo site_url(); ?>sign-in">Sign in</a></p>

</div><!-- close .main -->
