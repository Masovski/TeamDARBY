<link href='<?= asset_url() . "css/edit_post.css"?>' rel="stylesheet"/>
<div class="post">
<?php if ($success==1) {?>
    <p>This post has been updated</p>
<?php } ?>

<form action="<?=base_url()?>posts/editpost/<?=$post['postID']?>" method="post">
    <p>
        Title:<br/>
        <input type="text" name="title" value= "<?=$post['title']?>" required="required"/>
    </p>
    <p>
        Content:
        <br/><textarea name="post" required="required"><?=$post['post']?></textarea>
    </p>
    <p>
        Tags:<br/>
        <input type="text" name="tags" value= "<?=$post['tags']?>"/>
    </p>
    <p>
        <input type="submit" value="Save Changes"/>
    </p>
</form>
</div>