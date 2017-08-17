<?php
session_start();
if(!empty($_SESSION['login_user']))
{
header('Location: home.php');
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Ajax Login Page with Shake Effect</title>
<link rel="stylesheet" href="http://demos.9lessons.info/ajaxLoginServer/css/style.css"/>
<script src="http://demos.9lessons.info/ajaxLoginServer/js/jquery.min.js"></script>
<script src="http://demos.9lessons.info/ajaxLoginServer/js/jquery.ui.shake.js"></script>
	<script>
			$(document).ready(function() {
			
			$('#login').click(function()
			{
			var username=$("#username").val();
			var password=$("#password").val();
		    var dataString = 'username='+username+'&password='+password;
		    alert(dataString);
			if($.trim(username).length>0 && $.trim(password).length>0)
			{
			
 
			$.ajax({
            type: "POST",
            url: "ajaxLogin.php",
            data: dataString,
            cache: false,
            beforeSend: function(){ $("#login").val('Connecting...');},
            success: function(data){
            if(data)
            {
             $('#box').shake();
			 $("#login").val('Login')
			 $("#error").html("<span style='color:#cc0000'>Error:</span> Invalid username and password. ");
       
            }
            else
            {
             $('#box').shake();
			 $("#login").val('Login')
			 $("#error").html("<span style='color:#cc0000'>Error:</span> Invalid username and password. ");
            }
            }
            });
			
			}
			return false;
			});
			
				
			});
		</script>
</head>

<body>
<div id="main">
<h1>Ajax Login Page with Shake Effect</h1>

<div id="box">
<form action="" method="post">
<label>Username</label> 
<input type="text" name="username" class="input" autocomplete="off" id="username"/>
<label>Password </label>
<input type="password" name="password" class="input" autocomplete="off" id="password"/><br/>
<input type="submit" class="button button-primary" value="Log In" id="login"/> 
<span class='msg'></span> 

<div id="error">

</div>	

</div>
</form>	
</div>

</div>
</body>
</html>
