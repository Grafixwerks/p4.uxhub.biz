<div class="footer">
<p>CSCI E-15 Project 4 &copy;2013 Andy Pearson</p>
</div><!-- close .footer -->




    <div id="shade">
    	&nbsp;
	</div><!--  Close shade  -->


<!-- --> 
<div id="modal-login" class="modal" style="display:none">
    
<a href="javascript: void(0)" id="close" class="close">Close</a>

<h2 id="login-h">Login to your account</h2>

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
    
    </div><!--close #modal-login -->


</div><!-- close .wrapper -->
<br>

    <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/site.js"></script>

</body>
</html>