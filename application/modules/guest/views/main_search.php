<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"

	"http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" version="XHTML+RDFa 1.0" dir="ltr" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:dc="http://purl.org/dc/terms/" xmlns:foaf="http://xmlns.com/foaf/0.1/" xmlns:og="http://ogp.me/ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:sioc="http://rdfs.org/sioc/ns#" xmlns:sioct="http://rdfs.org/sioc/types#" xmlns:skos="http://www.w3.org/2004/02/skos/core#" xmlns:xsd="http://www.w3.org/2001/XMLSchema#">



<head profile="http://www.w3.org/1999/xhtml/vocab">
	<?php $this -> load -> view('includes/header'); ?>
	<meta name="robots" content="noindex, nofollow, noodp, noarchive" />
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>resources/stylesheets/client/css_xE-rWrJf-fncB6ztZfd2huxqgxu4WO-qwma6Xer30m4.css" />

	<link rel="stylesheet" type="text/css" href="<?= base_url()?>resources/stylesheets/client/css_QAYhg7dez74Eme6CB5OY3Ayb0tva2gY_kYm5fkc2vOU.css" />

	<link rel="stylesheet" type="text/css" href="<?= base_url()?>resources/stylesheets/client/css_XymMW3gpkRTrcrQMLU0GzsgauM5FeWzFgVLnPB-NCC0.css" />

	<script src="<?= base_url()?>resources/js/client/jquery-1.3.2.min.js"></script>

	<script src="<?= base_url()?>resources/js/client/jquery.min.js"></script>

	<script src="<?= base_url()?>resources/js/client/easing.js"></script>

	<script src="<?= base_url()?>resources/js/client/bootstrap.min.js"></script>

	<script src="<?= base_url()?>resources/js/client/jquery.ui.totop.js"></script>
<!-- carousel -->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>resources/stylesheets/client/owl.carousel.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>resources/stylesheets/client/owl.theme.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>resources/stylesheets/client/owl.transitions.css" />

	<script src="<?= base_url()?>resources/js/client/owl.carousel.min.js"></script>
<!-- carousel -->

	<script type="text/javascript">

		$(document).ready(function() { /*var defaults = {containerID: 'moccaUItoTop', // fading element idcontainerHoverClass: 'moccaUIhover', // fading element hover classscrollSpeed: 1200,easingType: 'linear' };*/

			$().UItoTop({

				easingType: 'easeOutQuart'

			});

		});

	</script>

	<style type="text/css">
	
		#toTopHover {

			display: none;

			text-decoration: none;

			position: fixed;

			bottom: 10px;

			right: 10px;

			overflow: hidden;

			width: 100px;

			height: 150px;

			z-index: 700;

			border: none;

			text-indent: -999px;

			background: url(resources/ui_images//before.png) no-repeat left top;

		}

		#toTop:active,

		#toTop:focus {

			outline: none;

		}

		#toTop {

			display: none;

			text-decoration: none;

			position: fixed;

			bottom: 10px;

			right: 10px;

			overflow: hidden;

			width: 100px;

			height: 150px;

			border: none;

			text-indent: -999px;

			background: url("resources/ui_images//before.png") no-repeat left top;

		}

		#toTop:hover {

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



<body class="html front not-logged-in no-sidebars page-home">

	<header>

		<?php $this -> load -> view('includes/top'); ?>

		<?php $this -> load -> view('includes/filter'); ?>

	</header>

	<div class="main">

		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					
					<div class="group-content">

						<div class="du-an-home-item block items">

							<h3>

								<strong>Danh sách dự án</strong>

								<span><i></i></span>

							</h3>

							<?php if ($productsList) { ?>

							<div class="view-content items">

								<div class="content-items">

									<ul>

									<?php foreach ($productsList as $key => $product) { ?>

										<li class="row">

											<a href="<?= base_url($product -> Slug).'.html'; ?>" class="image"><img src="<?= base_url() . 'resources/uploads/images/automatic/' . $product -> ImageURL ?>" width="396" height="177" alt="<?= $product -> ImageAlt ?>" title="<?= $product -> ImageTitle; ?>">

											</a>

											<div class="hover">

												<div class="inner"><span "=""><a href="<?= base_url($product -> Slug).'.html'; ?>" rel="nofollow ">Xem chi tiết</a></span></div></div><a href="<?= base_url($product -> Slug).'.html'; ?>" class="title " title="<?= $product -> Title; ?>"><?= $product -> Title; ?></a><span class="phong-cach "><?= $product -> srtres_Title; ?></span><span class="dien-tich ">Diện tích <?= $product -> srtprice_Title; ?></span><div class="lead "><?= $product -> Description; ?></div>

										</li>

									<?php } ?>

									</ul>

								</div>

							</div>

							<?php echo $links;}else echo '<p class="lead text-uppercase text-success">Không có dự án nào</p>'; ?>

						</div>

					</div>

				</div>
			</div>
		</div>

	</div>

</div>

<?php $this -> load -> view('includes/footer'); ?>

	<script src="<?= base_url()?>resources/js/client/js_xAPl0qIk9eowy_iS9tNkCWXLUVoat94SQT48UBCFkyQ.js"></script>

	<script src="<?= base_url()?>resources/js/client/js_aWiQ9fvPkOXyPwxBu2QprjK_mqzskAq4obsa04reQJE.js"></script>

	<script src="<?= base_url()?>resources/js/client/js_6cGsFgruUh8ksyKLsOg1gTgnhWg0ga2N32997qzmuzw.js"></script>

	<script src="<?= base_url()?>resources/js/client/js_gSe1cCZGvZPFIdrEzWjBrwD6h3QbH-vbRp3JnE_3q64.js"></script>

	<a href = "#" id = "toTop" style = "display: inline;" ><span id = "toTopHover" style = "opacity: 0;" ></span>To Top</a>
<script>
		$(document).ready(function() {
 
	  $("#owl-demo").owlCarousel({
	      slideSpeed : 300,
	      paginationSpeed : 400,
	      singleItem:true
	 
	      // "singleItem:true" is a shortcut for:
	      // items : 1, 
	      // itemsDesktop : false,
	      // itemsDesktopSmall : false,
	      // itemsTablet: false,
	      // itemsMobile : false
	 
	  });
	 
	});
</script>
</body></html>