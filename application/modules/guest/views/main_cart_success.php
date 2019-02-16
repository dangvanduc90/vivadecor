<!DOCTYPE html>
<html class="no-js" lang="<?= $lang ?>">
	<head>
		<!-- CSS and Jquery start here -->
		<?= $this -> load -> view('guest/includes/header') ?>
		<link rel="stylesheet" type="text/css" href="<?= base_url()?>resources/stylesheets/client/flexslider.css" />
		<link rel="stylesheet" type="text/css" href="<?= base_url()?>resources/stylesheets/client/social-likes_birman.css" />
		<script src="<?= base_url()?>resources/js/client/jquery.flexslider-min.js"></script>
		<script src="<?= base_url()?>resources/js/client/social-likes.min.js"></script>
		<!-- CSS and Jquery end here -->
	</head>
	<body lang="<?= $lang ?>">
		<div id="wrapper">
			<!-- Top start here -->
			<div id="top">
				<?= $this -> load -> view('guest/includes/top') ?>
				<?= $this -> load -> view('guest/includes/menu') ?>
				<div class="clear"></div>
			</div>
			<!-- Top end here -->
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-12">
								<img style="display:block;margin:20px auto;" src="<?= base_url() ?>resources/ui_images/client/background/error_404.png">
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Bottom end here -->
			<div id="bottom">
				<?= $this -> load -> view('guest/includes/footer') ?>
				<div class="clear"></div>
			</div>
			<!-- Bottom end here -->

		</div>
		<?= $this -> load -> view('guest/includes/sticky') ?>
			<?= $this -> load -> view('guest/includes/documentready') ?>
	</body>
</html>