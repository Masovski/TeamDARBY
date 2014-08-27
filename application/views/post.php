<?php if (!isset($post)) { ?>
    <p>This page was accessed incorrectly!</p>
<?php
} else {
    $date = date("F jS, Y \\a\\t H:i", strtotime($post['date_added']));
    ?>
<?php } ?>

<!-- Author -->
<p class="lead">
    by <a href="#"><?=$post['author'];?></a>
</p>

<!-- Date/Time -->
<?php if($author_permissions) { ?>
    <span class="glyphicon glyphicon-edit"></span> <a href="<?= base_url() ?>posts/editpost/<?= $post['postID'] ?>">Edit</a> |
    <span class="glyphicon glyphicon-remove-circle"></span> <a href="<?= base_url() ?>posts/deletepost/<?= $post['postID']; ?>">Delete</a> <?php } ?>
    <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $date; ?></p>
    <p><span class="glyphicon glyphicon-eye-open"></span> <strong><?= $post['views']+1;?></strong></p>
<hr>

<!-- Preview Image -
<img class="img-responsive" src="http://placehold.it/900x300" alt="">

<hr>->

<!-- Post Content -->
<p><?= $post['post'] ?></p>

<!-- Tags -->
<?php $tags = explode(",", $post['tags']) ?>
<?php foreach($tags as $tag) { ?>
    <span class="label label-info"><?=$tag?></span>
<?php } ?>
<hr>

<!-- Blog Comments -->

<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
    <form role="form" method="post" action="<?= base_url(); ?>comments/add_comment/<?= $post['postID'] ?>">
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" style="display: inline; max-width: 250px" required="required">
            <input type="text" name="email" class="form-control" placeholder="Email" style="display: inline; max-width: 250px">
        </div>
        <div class="form-group">
            <textarea class="form-control" rows="3" name="comment" required="required"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<hr>

<!-- Posted Comments -->

<!-- Comment -->
<?php if (count($comments) > 0) { ?>
    <?php foreach ($comments as $comment) { ?>
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><?= $comment['username'] ?>
                    <small><?= date('m/d/Y H:i A', strtotime($comment['date_added'])) ?></small>
                </h4>
        <?= $comment['comment'] ?>
            </div>
        </div>
    <?php
    }
}
?>