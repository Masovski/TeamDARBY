<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo asset_url() . "styles/login.css" ?>">
</head>
<body>
<section class="container">
    <div class="login">
        <h1>Login</h1>
        <?php if($error==1){ ?>
            <p>Your username or password did now match.</p>
            <br>
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
    </div>
</section>
</body>
</html>