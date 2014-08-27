<link href="<?= asset_url() . "css/about.css"; ?>" rel="stylesheet"/>
<div class="container">
    <div class="row">
        <div class="col-md-10">
		<?php foreach ($abouts as $member) {
            echo $member['name'] . "<br>";
        }?>
<?php for($i = 0; $i < 6 ; $i++){ ?>
				<div id="user-1">					
					<div class="information">
						<div class="table-row">
						<div class="photo">
							<img class="photo" src='<?= asset_url()."images/ceco.jpg"?>' alt=""/>
						</div>
						<div class="table-row">
							<div class="left">Name:</div>
							<div class="right">Pesho</div>
						</div>
						<div class="table-row">
							<div class="left">Work as:</div>
							<div class="right">street worker</div>
						</div>
						<div class="table-row">
							<div class="left">Contacts:</div>
							<div class="table-row">
							<div class="right">
												<div class="table-row">
												<div class="left">Email:</div>
												</div>
												<div class="table-row">
												<div class="right">pesho@mymailofcourse.com</div>
												</div>
												<div class="table-row">
												<div class="left">Facebook:</div>
												</div>
												<div class="table-row">
												<div class="right">peshopicha.facebook.com</div>
												</div>
												<div class="table-row">
												<div class="left">Phone:</div>
												</div>
												<div class="table-row">
												<div class="right">555-55555-555</div>
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