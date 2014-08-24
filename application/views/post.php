<?php if(!isset($post)){ ?>
    <p>This page was accessed incorrectly!</p>
<?php } else { ?>
    <h2>
        <?=$post['title']?>
    </h2>
    <?=$post['post']?>
<?php } ?>
