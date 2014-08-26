<style>
.information {
	display: table;
	margin: 2px;
    background-color: #f9f9f9;
    float: left;
    border-radius: 5px;
}
.table-row {
	display: table-row;
	
}
.left, .right {
	display: table-cell;
	width: 50%;
	padding: 5px;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-10">
<?php for($i = 0; $i < 5 ; $i++){ ?>
				<div id="user-1">					
					<div class="information">
						<div class="table-row">
						<div class="photo">
							<img src='<?= asset_url()."images/ceco.png"?>' alt=""/>
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