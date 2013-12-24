<div class="main">



<h1>Login to your account</h1>


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

<p class="notice"><a href="join.html">Join</a></p>
      

</form>




</div><!-- close .main -->