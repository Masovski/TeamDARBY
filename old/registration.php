<?php
session_start() ;
include 'header.php' ;
?>
<form method="POST">
	<div>Име:<input type = "text" name= "username"/></div>
	<div>Парола:<input type = "password" name= "pass"/></div>
	<input type = "submit" value = "Край на регистрацията"/>
</form>
<?php
$connection = mysqli_connect('localhost','mimi','qwerty','registration') ;
if(!$connection)
{
	echo 'no' ;
	exit ;
}
mysqli_set_charset($connection,'utf8');
if($_POST)
{
	$user_name = trim($_POST['username']) ;
	$user_name = mysqli_real_escape_string($connection,$user_name) ;
	$password = trim($_POST['pass']) ;
	$password = mysqli_real_escape_string($connection,$password) ;
	$sql = 'INSERT INTO registration(user_name,password) VALUES("'.$user_name.'","'.$password.'")' ;
	
			
			if(!mysqli_query($connection,$sql) and (strlen($user_name)<5))
			{
				echo   'Грешка.Късо име!';
			}
			else
			{
				echo  'Вашата регистрация е успешна <a href = "index.php">Моля влезте от тук</a>' ;
			}
		
	}

?>