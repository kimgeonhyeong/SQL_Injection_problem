<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="lndex.css">
    <title>Document</title>
</head>
<body>
<?php


	if(isset($_POST['login']))
	{	
		$username = 'admin';
		if($username == $_POST['username'])
		{
			$password = $_POST['password'];
			$password = str_replace('=','X',$password);
			$password = str_replace('\n','X',$password);
			$password = str_replace("/",'X',$password);
			$password = str_replace('select','XXXXXX',$password);
			$password = str_replace('union','XXXXX',$password);
			$password = str_replace('having','XXXXXX',$password);
			$password = str_replace('-','X',$password);
			$password = str_replace('<','X',$password);
			$password = str_replace('>','X',$password);
			$password = str_replace('"','X',$password);
			$password = str_replace(' ','X',$password);
			$password = str_replace('%20',' ',$password);
			$password = str_replace("and","XXX",$password);
			$con = mysqli_connect('localhost','ID','Password','Sql_injection') or die("연결 안됨");
			$result = mysqli_query($con, "select * from users where username='$username' and password='$password';") or exit("Filtering: $password");

			if(mysqli_num_rows($result) == 0){
				echo "Filtering: $password";
				
			}
			else{
				echo " <script>alert('관리자님 환영합니다.')</script>";
				echo "<script>location.href='flag.php'</script>";
			}		
		}
		else
			echo "your not admin";
	}
	else
	{
?>	<div class="hidden" style="display: none;"></div>
	<form action="index.php" method="POST" class="main_borad">
		<div class="username"><p>Username :</p> <input type="text" name="username"/></div><br/>
		<div class="password"><p>Password :</p> <input type="password" name="password"/></div><br/>
		<input type="submit" name="login" value="Login" class="login"/>
	</form>
	
<?php
	}
?>
</body>
</html>
