<?php
session_start() ;

include 'header.php' ;

?>

<form  method="POST">  
    <div>Име:<input type="text" name="user_name" /></div>
	<div>Парола:<input type="password" name = "password"/></div>
    <div><input type="submit" name="submit" value="Вход" /></div>
</form>

<a href = "registration.php">Нова регистрация</a>


<?php

if($_SESSION['isLogged'] == true)
{
	echo 'Здрасти' ;
	header('Location:allPost.php');
	$myName = $_POST['user_name'];
	$_SESSION['user_name'] = $myName;
}
else
{

		$connection = mysqli_connect('localhost','mimi','qwerty','registration') ;
		if(!$connection)
	{
		echo 'no' ;
		exit ;
	}
			mysqli_set_charset($connection,'utf8');
			
				
				if($_POST)
				{
					
				$user_name = trim($_POST['user_name']) ;
				$password = trim($_POST['password']) ;
				$activUsers = mysqli_query($connection,'SELECT user_name,password FROM registration') ;
				
				if($activUsers->num_rows>0)
				{
					while($row=$activUsers->fetch_assoc())
					{	
						if(($row['user_name']===$user_name) AND ($row['password']===$password) )
						{	
							$myName = $_POST['user_name'];
							$_SESSION['user_name'] = $myName;
							$_SESSION['isLogged'] = true;
							header('Location:allPost.php');
							exit;
						}
						
					}
					
				}
		
}

include 'footer.php';
}
?>