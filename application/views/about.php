<link href="<?= asset_url() . "css/about.css"; ?>" rel="stylesheet"/>
<div class="container">
    <div class="row">
        <div class="col-md-11">
<?php for($i = 0; $i < count($abouts) ; $i++){ ?>
				<div id="user-<?=$i?>">					
					<div class="information">
						<div class="table-row">
						<div class="photo">
							<img class="photo" src='<?= asset_url().$abouts[$i]['photo']?>' alt=""/>
						</div>
						<div class="table-row">
							<div class="left">Name:</div>
							<div class="right"><?=$abouts[$i]['name']?></div>
						</div>
						<div class="table-row">
							<div class="left">Work as:</div>
							<div class="right"><?=$abouts[$i]['work_position']?></div>
						</div>
						<div class="table-row">
							<div class="left">Contacts:</div>
							<div class="table-row">
							<div class="right">
												<div class="table-row">
												<div class="left">Email:</div>
												</div>
												<div class="table-row">
												<div class="right"><?=$abouts[$i]['mail']?></div>
												</div>
												<div class="table-row">
												<div class="left">Facebook:</div>
												</div>
												<div class="table-row">
												<div class="right"><?=$abouts[$i]['facebook']?></div>
												</div>
												<div class="table-row">
												<div class="left">Phone:</div>
												</div>
												<div class="table-row">
												<div class="right"><?=$abouts[$i]['phone']?></div>
												</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

	<?php
	}
	?>
        </div>
    </div>
</div>