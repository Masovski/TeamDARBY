<h2>Login</h2>
<?php if($error==1){ ?>
<p>Your username or password did now match.</p>
<?php } ?>

<form action='<?=base_url()?>users/login' method="post">
    <p>Username: <input type="text" name="username"/></p>
    <p>Password: <input type="password" name="password"/></p>
    <p>User type:
        <select name="user_type">
            <option value="" selected="selected">--</option>
            <option value="admin">Admin</option>
            <option value="admin">Author</option>
            <option value="admin">User</option>
        </select>
    </p>
    <p><input type="submit" value="Login"/></p>
</form>