<link href='<?= asset_url() . "css/edit_post.css"?>' rel="stylesheet"/>
<div class="post">
    <form action="<?=base_url()?>posts/new_post" method="post">
        <p>
            Title:<br/>
            <input type="text" name="title"/>
        </p>
        <p>
            Content:
            <br/><textarea name="post"></textarea>
        </p>
        <p>
            Tags:<br/>
            <input type="text" name="tags"/>
        </p>
        <p>
            <input type="submit" value="Save Post"/>
        </p>
    </form>
</div>