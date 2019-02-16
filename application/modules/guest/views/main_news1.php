<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"

  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" version="XHTML+RDFa 1.0" dir="ltr"

  xmlns:content="http://purl.org/rss/1.0/modules/content/"

  xmlns:dc="http://purl.org/dc/terms/"

  xmlns:foaf="http://xmlns.com/foaf/0.1/"

  xmlns:og="http://ogp.me/ns#"

  xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#"

  xmlns:sioc="http://rdfs.org/sioc/ns#"

  xmlns:sioct="http://rdfs.org/sioc/types#"

  xmlns:skos="http://www.w3.org/2004/02/skos/core#"

  xmlns:xsd="http://www.w3.org/2001/XMLSchema#">



<head profile="http://www.w3.org/1999/xhtml/vocab">

	<?php $this -> load -> view('includes/header'); ?>


	<link rel="stylesheet" type="text/css" href="<?= base_url()?>resources/stylesheets/client/css_xE-rWrJf-fncB6ztZfd2huxqgxu4WO-qwma6Xer30m4.css" />

	<link rel="stylesheet" type="text/css" href="<?= base_url()?>resources/stylesheets/client/css_QAYhg7dez74Eme6CB5OY3Ayb0tva2gY_kYm5fkc2vOU.css" />

	<link rel="stylesheet" type="text/css" href="<?= base_url()?>resources/stylesheets/client/css_XymMW3gpkRTrcrQMLU0GzsgauM5FeWzFgVLnPB-NCC0.css" />



	<script src="<?= base_url()?>resources/js/client/jquery-1.3.2.min.js"></script>

	<script src="<?= base_url()?>resources/js/client/jquery.min.js"></script>

	<script src="<?= base_url()?>resources/js/client/easing.js"></script>

	<script src="<?= base_url()?>resources/js/client/bootstrap.min.js"></script>

	<script src="<?= base_url()?>resources/js/client/jquery.ui.totop.js"></script>





  <script type="text/javascript">$(document).ready(function() {/*var defaults = {containerID: 'moccaUItoTop', // fading element idcontainerHoverClass: 'moccaUIhover', // fading element hover classscrollSpeed: 1200,easingType: 'linear' };*/$().UItoTop({ easingType: 'easeOutQuart' });});</script>

  <style type="text/css">

		#toTopHover {display:none;text-decoration:none;position:fixed;bottom:10px;right:10px;overflow:hidden;width:100px;height:150px;z-index:700;border:none;text-indent:-999px;background:url(resources/ui_images//before.png) no-repeat left top;}#toTop:active, #toTop:focus {outline:none;}

		

		#toTop {display:none;text-decoration:none;position:fixed;bottom:10px;right:10px;overflow:hidden;width:100px;height:150px;border:none;text-indent:-999px;background:url("resources/ui_images//before.png") no-repeat left top;}

		

		#toTop:hover{

		background: url("resources/ui_images//after.png") no-repeat scroll left top rgba(0, 0, 0, 0);

		border: medium none;

		bottom: 10px;

		display: none;

		height: 150px;

		overflow: hidden;

		position: fixed;

		right: 10px;

		text-decoration: none;

		text-indent: -999px;

		width: 100px;

		}

	</style>

</head>

<body class="html not-front not-logged-in no-sidebars page-node page-node- page-node-244 node-type-project page-news" >

	<header>

		<?php $this -> load -> view('includes/top'); ?>

	</header>

	<div class="main">

		<div class="container">

			<div class="group-content">

				<div class="bai-viet-node-detail items">

					<?php echo $breadcrumb; ?>

					<!-- <div class="noi-dung"> -->

						<?php if ($newsList) { ?>

						<div class="view-content items">

							<div class="content-items">

								<ul class="blog-posts">

								<?php foreach ($newsList as $key => $news) { ?>

									<li class="post-item">
										<article class="entry">
											<div class="row">
												<div class="col-sm-5">
													<div class="entry-thumb image-hover2">
														<a href="<?= base_url($news -> Slug).'.html'; ?>">
														<img class="img-responsive" src="<?= base_url() . 'resources/uploads/images/automatic/' . $news -> ImageURL ?>" alt="<?= $news -> ImageAlt ?>" title="<?= $news -> ImageTitle; ?>">
														</a>
													</div>
												</div>
												<div class="col-sm-7">
													<div class="entry-ci">
														<h2 class="entry-title"><a title="<?= $news -> Title; ?>" href="<?= base_url($news -> Slug).'.html'; ?>"><?= $news -> Title; ?></a></h2>
														<div class="entry-excerpt">
															<?= $news -> Body; ?>
														</div>
														<div class="entry-more">
															<a rel="nofollow" title="<?= $news -> Title; ?>" href="<?= base_url($news -> Slug).'.html'; ?>">Xem thêm</a>
														</div>
													</div>
												</div>
											</div>
										</article>
									</li>

								<?php } ?>

								</ul>

							</div>

						</div>

						<?php echo $links; }else echo '<p class="lead text-uppercase text-success">Không có tin tức nào</p>'; ?>
					<!-- </div> -->

				</div>

			</div>

			<?php $this -> load -> view('includes/sidebar'); ?>

		</div>

	</div>

	<?php $this -> load -> view('includes/footer'); ?>

	<!-- slider -->

	<script src="<?= base_url()?>resources/js/client/js_xAPl0qIk9eowy_iS9tNkCWXLUVoat94SQT48UBCFkyQ.js"></script>

	<script src="<?= base_url()?>resources/js/client/js_aWiQ9fvPkOXyPwxBu2QprjK_mqzskAq4obsa04reQJE.js"></script>

	<script src="<?= base_url()?>resources/js/client/js_t9dhvMjyBVilgboxNnLC3Ks6cdDRBVDoBrHpIQELUYQ.js"></script>

	<!-- <script src="<?= base_url()?>resources/js/client/js_6cGsFgruUh8ksyKLsOg1gTgnhWg0ga2N32997qzmuzw.js"></script> -->

	<script src="<?= base_url()?>resources/js/client/js_gSe1cCZGvZPFIdrEzWjBrwD6h3QbH-vbRp3JnE_3q64.js"></script>

	<a href="#" id="toTop" style="display: inline;"><span id="toTopHover" style="opacity: 0;"></span>To Top</a>

</body>

</html>