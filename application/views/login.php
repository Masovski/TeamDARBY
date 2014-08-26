<link href="<?= asset_url() . "css/login.css"?>" rel="stylesheet"/>
<div class="login">

        <?php if($error==1){ ?>
            <p>Your username or password did now match.</p>
            <br>
        <?php } ?>
        <form action='<?=base_url()?>users/login' method="post">
            <p>Username: <input type="text" name="username"/></p>
            <p>Password: <input type="password" name="password"/></p>
            <p><input type="submit" value="Login"/></p>
        </form>
    </div>
