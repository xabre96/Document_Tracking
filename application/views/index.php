<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <form method="POST" action="<?php echo base_url('Users/user_login');?>">
    	<label>Username: </label>
    	<input type="text" name="username" />
    	<br/>
    	<label>Password: </label>
    	<input type="password" name="password" />
    	<br/>
    	<input type="submit" value="Login"/>
    </form>
  </body>
</html>
