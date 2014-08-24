<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Title</title>
    </head>
<body>
    <?php if($this->session->userdata('userID')){ ?>
        <p>
            <?=$this->session->userdata('username')?>
            <a href="<?=base_url()?>users/logout">Logout</a>
        </p>
    <?php } else { ?>
        <a href="<?=base_url()?>users/login">Login</a>
    <?php } ?>

