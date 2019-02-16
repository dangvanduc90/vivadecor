<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="banner-slide-container">
				<div id="owl-demo" class="owl-carousel owl-theme">
					<?php foreach ($banners as $k => $ban) { ?>
						<div class="item">
							<a href="<?= base_url($ban -> Link); ?>" u="image"><img title="<?= $ban -> Title ?>" alt="<?= $ban -> Body ?>" src="<?= base_url() ?>resources/uploads/images/automatic/<?= $ban -> ImageURL ?>" />
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>