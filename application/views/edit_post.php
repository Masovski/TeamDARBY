<link href='<?= asset_url() . "css/edit_post.css"?>' rel="stylesheet"/>
<div class="post">
<?php if ($success==1) {?>
    <p>This post has been updated</p>
<?php } ?>

<form action="<?=base_url()?>posts/editpost/<?=$post['postID']?>" method="post">
    <p>
        Title:
        <input type="text" name="title" value= "<?=$post['title']?>"/>
    </p>
    <p>
        Description:
        <br/><textarea name="post"><?=$post['post']?></textarea>
    </p>
    <p>
        <input type="submit" value="Edit Post"/>
    </p>
</form>
</div>