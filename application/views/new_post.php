<form action="<?=base_url()?>posts/new_post" method="post">
    <p>
        Title:
        <input type="text" name="title"/>
    </p>
    <p>
        Description:
        <input type="text" name="post"/>
    </p>
    <p>
        <input type="submit" value="Add Post"/>
    </p>
</form>