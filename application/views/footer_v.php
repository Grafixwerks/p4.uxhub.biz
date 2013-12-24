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

<form action="<cfoutput>#baseURL#</cfoutput>process/login-user.cfm" method="post" name="login" id="login">

<div class="form-field">
<label for="email">Email</label>
<input type="text" class="med txt" name="email" id="email" maxlength="20" />
</div><!-- close .form-field -->


<div class="form-field">
<label id="label-pw" for="pw">Password</label>
<input type="password" class="med txt" name="pw" id="pw" maxlength="30" />
</div><!-- close .form-field -->


<input name="login" id="join-btn" class="btn" type="submit" value="Login" />

<a href="join.html" id="join-link">Join</a>
      

</form>
    
    </div><!--close #modal-login -->


</div><!-- close .wrapper -->
<br>

    <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/site.js"></script>

</body>
</html>