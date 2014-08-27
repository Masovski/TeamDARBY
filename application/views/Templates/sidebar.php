

</div>

<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <form method="get" action="<?=base_url()?>search/index"  autocomplete="off" >
            <h4>Blog Search</h4>
            <div class="input-group">
                <input name="searchphrase" type="text" class="form-control" value="<?=!empty($searchphrase)?$searchphrase:''?>">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
            <br/>
            <h4>Search by:</h4>
            <?php $search_by = empty($search_by)?'tag':$search_by;?>
            <label>
                Tag
                <input type="radio" name="search_by" value="tag" <?=($search_by=='tag')?"checked='checked'":"";?> />
            </label>
            <label>
                Content
                <input type="radio" name="search_by" value="content" <?=($search_by=='content')?"checked='checked'":"";?>/>
            </label>
        </form>
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Posts archive</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                <?php
                // get list of blog-items
                $archives = $this->post->get_posts(2147483647, 0);

                $last_year_month = "";

                // traverse items in foreach loop
                foreach($archives as $row) {
                    // extract year and month
                    $year_month = substr($row["date_added"], 0, 7);

                    // if year and month has changed
                    if ($year_month != $last_year_month) {

                        $last_year_month = $year_month;
                        $year = substr($year_month, 0, 4);
                        $month = date("n", strtotime($last_year_month));
                        foreach($archives as $post) {
                            if($year == substr($post['date_added'], 0, 4) && $month == date("n", strtotime($post['date_added']))) {
                                $rows_array[] = $post;
                            }
                        }
                        $count = sizeof($rows_array);
                        $rows_array = array();
                ?>

                <li><a href="<?= base_url() . "posts/archive/$year/$month"; ?>"><?= date("F", strtotime($last_year_month)) . " " . $year ?></a> <span class='badge'><?=$count?></span></li>
                        <?php
                    }

                }?>
                    </ul>
             </div>
            <!-- /.col-lg-6 -->

        </div>
        <!-- /.row -->
    </div>

    <div class="well">
        <h4>Tags cloud</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                <?php
                // get list of blog-items
                $all_posts = $this->post->get_posts(2147483647, 0);

                $last_year_month = "";

                // traverse items in foreach loop
                $tags_cloud = array();
                foreach($all_posts as $post) {
                    $tags = explode(",",$post['tags']);
                    foreach ($tags as $tag) {
                        if(empty($tags_cloud[$tag])){
                            $tags_cloud[$tag] = 1;
                        } else {
                            $tags_cloud[$tag] += 1;
                        }
                    }
                }
                arsort($tags_cloud);

                foreach($tags_cloud as $tag => $cnt){ 
                    if($tag=="") { continue; }?>
                <li><a href="<?= base_url() . "search/index?searchphrase=".$tag."&search_by=tag"; ?>">
                    <?= $tag ?>
                </a> <span class='badge'><?=$cnt?></span></li>
                        <?php
                    }?>
                    </ul>
             </div>
            <!-- /.col-lg-6 -->

        </div>
        <!-- /.row -->
    </div>
    <!-- Side Widget Well -->
    <div class="well">
        <h4>Support us</h4>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="93YL6Q3653M3G">
			<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online!"/>
			<img alt="" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1" />
		</form>
    </div>

</div>

</div>
<!-- /.row -->

<hr>
