<amp-carousel width="1200"
	height="488"
	layout="responsive"
	type="slides"
	autoplay>
	<?php if ($banners) { foreach ($banners as $ban) { ?>
	<a rel="nofollow" title="<?= $ban -> Body ?>" href="#"><amp-img src="<?= base_url() ?>resources/uploads/images/automatic/<?= $ban -> ImageURL ?>"
		width="1200"
		height="488"
		layout="responsive"
		alt="<?= $ban -> Body ?>"
		attribution="<?= $ban -> Title ?>"></amp-img></a>
	<?php } } ?>
</amp-carousel>