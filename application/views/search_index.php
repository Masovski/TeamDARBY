        <?php
        if (!isset($posts) || count($posts) == 0) {
            ?>
            <p>There are no search results...</p>
        <?php } else { ?>
            <?php foreach ($posts as $row) {
                $row['date_added'] = date("F jS, Y \\a\\t H:i", strtotime($row['date_added'])); ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                    <h3 class="panel-title"><a href="<?= base_url() ?>posts/post/<?= $row['postID'] ?>">
                            <?= html_escape($row['title']); ?></a>
                    </h3>
                    </div>
                    <div class="panel-body">

                <p class="lead">
                    by <a href="<?= base_url(); ?>"><?= $row['author']; ?></a>
                </p>
                <?php if($author_permissions) { ?>
                <span class="glyphicon glyphicon-edit"></span> <a href="<?= base_url() ?>posts/editpost/<?= $row['postID'] ?>">Edit</a> |
                <span class="glyphicon glyphicon-remove-circle"></span> <a href="<?= base_url() ?>posts/deletepost/<?= $row['postID'] ?>" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a> <?php } ?>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $row['date_added']; ?></p>
                <p><span class="glyphicon glyphicon-eye-open"></span> <strong><?= $row['views'];?></strong></p>
                        <hr>
                <!--<img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>-->
                <p><?= substr(strip_tags(html_escape($row['post'])), 0, 500) . ".." ?></p>
                <?php $tags = explode(",", $row['tags']) ?>
                <?php foreach($tags as $tag) { ?>
                    <span class="label label-info"><?=$tag?></span>
                <?php } ?>
                <br/>
                <br/>
                <a class="btn btn-primary" href="<?= base_url() ?>posts/post/<?= $row['postID'] ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                    </div>
                <hr>

            <?php
            }
        }
        ?>