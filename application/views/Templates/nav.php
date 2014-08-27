<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= base_url(); ?>">Team Darby</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php if(in_array($this->session->userdata('user_type'), array('author', 'admin'))){ ?>
                <li>
                    <a href="<?=base_url()?>posts/new_post"><strong>New Post</strong></a>
                </li>
                <?php } ?>
                <li>
                    <a href="<?=base_url()?>abouts">About Us</a>
                </li>
                <li>
                    <a href="<?=base_url()?>schedules">Schedules</a>
                </li>
                <li>
                    <a href="http://www.urbandictionary.com/define.php?term=Darby" target="_blank">What is Darby?</a>
                </li>
            </ul>
            <ul class="nav navbar-nav profile-bar">
                <?php if($this->session->userdata('userID')){ ?>
                    <li style="color:#FFF; padding: 15px;">
                        Logged in as:
                        <?=$this->session->userdata('username')?>
                        <strong>
                            (<?=$this->session->userdata('user_type')?>)
                        </strong>
                    </li>
                    <li style="color:#FFF">
                        <a href="<?=base_url()?>users/logout">Logout</a>
                    </li>
                <?php } else { ?>
                    <li><a href="<?=base_url()?>users/login">Login</a></li>
                    <li><a href="<?=base_url()?>users/register">Register</a></li>
                <?php } ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <?php if ($this->session->flashdata('errors')) {?>
            <div class="alert alert-danger" role="alert">
                <?=$this->session->flashdata('errors');?>
            </div>
        <?php } else if ($this->session->flashdata('success')) {?>
        <div role = "alert" class = "alert alert-success">
                <strong>Well done!</strong>
                <?=$this->session->flashdata('success')?>
        </div >
        <?php } ?>
        <?php if(isset($errors)) { ?>
            <div class="alert alert-danger" role="alert">
                <?=$errors?>
            </div>
        <?php } ?>

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                <?= $title ?>
                <!--<small>Secondary Text</small>-->
            </h1>
