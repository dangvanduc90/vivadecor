<footer class="ampstart-footer flex flex-column p3">
	<main id="content" role="main" class="">
		<article class="photo-article">
			<!-- Start Related article -->
			<section class="ampstart-related-article-section p3 mb4 border-top border-bottom">
				<?php if ($footers) {
				foreach ($footers as $value) { ?>
				<div class="">
					<div class="">
						<b><?= $value['Title']; ?></b>
					</div>
					<div class="">
						<?= preg_replace('/(<[^>]+) style=".*?"/i', '$1', $value['Body']); ?>
					</div>
				</div>
				<?php } } ?>
				<a title="Phương thức thanh toán" class="margin-auto" rel="nofollow" target="_blank" href="<?= base_url() ?>phuong-thuc-thanh-toan.html"><amp-img src="<?= base_url(); ?>resources/ui_images/thanh-toan.png" width="289" height="39" layout="fixed" class="mb1" alt="Phương thức thanh toán"></amp-img></a>
				<div class="backlink">
					<p class="items-center">
						<span>NỘI THẤT VIVADECOR là một thương hiệu trực thuộc Công ty CP Tư vấn và đầu tư xây dựng số 36 (CIC36).</span>
					</p>
					<hr>
				</div>
			</section>
		</article>
	</main>
</footer>