<?php if(!isset($post)){ ?>
    <p>This page was accessed incorrectly!</p>
<?php } else {
    $date = date("F jS, Y \\a\\t H:i", strtotime($post['date_added'])); ?>
    <!--<h2>
        <?=$post['title']?>
    </h2>-->

<?php } ?>

<!-- Author -->
<p class="lead">
    by <a href="#">Team Darby</a>
</p>

<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> Posted on <?= $date;?></p>

<hr>

<!-- Preview Image -
<img class="img-responsive" src="http://placehold.it/900x300" alt="">

<hr>->

<!-- Post Content -->
<p><?=$post['post']?></p>
<hr>

<!-- Blog Comments -->

<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
    <form role="form">
        <div class="form-group">
            <textarea class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<hr>

<!-- Posted Comments -->

<!-- Comment -->
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">Team Darby
            <small>August 25, 2014 at 9:30 PM</small>
        </h4>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </div>
</div>