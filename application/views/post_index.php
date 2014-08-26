
        <?php
        if (!isset($posts)) {
            ?>
            <p>There are currently no posts</p>
        <?php } else { ?>
            <?php foreach ($posts as $row) {
                $row['date_added'] = date("F jS, Y \\a\\t H:i", strtotime($row['date_added'])); ?>
                <h2>
                    <a href="<?= base_url() ?>posts/post/<?= $row['postID'] ?>"><?= $row['title'] ?></a> |
                    <a href="<?= base_url() ?>posts/editpost/<?= $row['postID'] ?>">
                        Edit
                    </a> |
                    <a href="<?= base_url() ?>posts/deletepost/<?= $row['postID'] ?>">
                        Delete
                    </a>
                </h2>
                <p class="lead">
                    by <a href="<?= base_url(); ?>">Team Darby</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $row['date_added']; ?></p>
                <hr>
                <!--<img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>-->
                <p><?= substr(strip_tags($row['post']), 0, 200) . ".." ?></p>
                <a class="btn btn-primary" href="<?= base_url() ?>posts/post/<?= $row['postID'] ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

            <?php
            }
        }
        ?>
        
        <!-- Pager -->
        <ul class="pager">
           <?=$pages?>
        </ul>