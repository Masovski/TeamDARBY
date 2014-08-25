<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Title</title>
        <link href="../../assets/styles/style.css" rel="stylesheet" type="text/css"/>
    </head>
<body>
    <?php if($this->session->userdata('userID')){ ?>
        <p>
            <?=$this->session->userdata('username')?>
            <strong>
                (<?=$this->session->userdata('user_type')?>)
            </strong>
            <a href="<?=base_url()?>users/logout">Logout</a>
        </p>
    <?php } else { ?>
        <a href="<?=base_url()?>users/login">Login</a>
    <?php } ?>

