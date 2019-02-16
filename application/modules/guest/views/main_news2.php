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

<link rel="canonical" href="<?= current_url(); ?>" /><!--Canonical Seo trang chuyên mục-->
<meta name="robots" content="index, follow, noodp, noarchive" /><!-- Khai báo Robots -->
<!--Định danh cho MXH-->
<meta property="og:site_name" content="<?php if($SEOTitle !== false) echo $SEOTitle;?>">
<meta property="og:url" content="<?= current_url(); ?>">
<meta property="og:title" content="<?php if($SEOTitle !== false) echo $SEOTitle;?>"><!--Title Seo trang chuyên mục-->
<meta property="og:image" content="<?= base_url() . 'resources/uploads/images/automatic/tin-tuc/' . $news -> ImageURL ?>"><!-- URL Ảnh đại diện bài viết -->
<meta property="og:description" content="<?php if($SEODescription !== false) echo $SEODescription;?>"> <!--Mô tả Seo trang chuyên mục-->	

<!--Google Author-->
<link rel="author" href="<?= $seo['Google']; ?>" /> <!-- Link G+ của website -->
<link href="<?= $seo['Google']; ?>" rel="publisher" /><!-- Link G+ của website -->	

<meta name="author" content="<?= base_url(); ?>" />
<meta http-equiv="REFRESH" content="300" />
<meta name="geo.region" content="VN" />
<meta name="geo.placename" content="Hà Nội" /><!--Khai báo địa điểm-->
<meta name="copyright" content="<?= $seo['Copyright']; ?>" /><!-- Copyright -->
<meta name="abstract" content="<?= $seo['Slogan']; ?>" /><!-- Slogan -->
<meta name="distribution" content="Global" />
<meta name="Area" content="Hanoi, Saigon, HoChiMinh, Danang,  Vietnam, Nhatrang, Cantho" />
<meta name="revisit-After" content="1 days" />
<meta name="rating" content="general" />

<!--Thẻ Snippet-->
<script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "NewsArticle",
"mainEntityOfPage":
{ "@type":"WebPage", "@id":"<?= base_url($news -> Slug).'.html'; ?>" }
,           	
"headline": "<?= $news -> Title ?>",
"description": "<?php if($SEODescription !== false) echo $SEODescription;?>",
"datePublished": "<?= date("Y-m-d", strtotime($news -> CreatedDate))."T".date("H-i-s", strtotime($news -> CreatedDate))."+07:00"; ?>",
"dateModified": "<?= date("Y-m-d", strtotime($news -> ModifiedDate))."T".date("H-i-s", strtotime($news -> ModifiedDate))."+07:00"; ?>",
"author":
{ "@type": "Person", "name": "<?= $seo['CompanyName']; ?>" }
,
"publisher": {
"@type": "Organization",
"name": "<?= $seo['CompanyName']; ?>",
"logo":
{ "@type": "ImageObject", "url": "<?= base_url() . 'resources/uploads/images/automatic/tin-tuc/' . $news -> ImageURL ?>", "width": 60, "height": 60 }
},
"image": {
"@type": "ImageObject",
"url": "<?= base_url() . 'resources/uploads/images/automatic/tin-tuc/' . $news -> ImageURL ?>",
"width": 1200,
"height": 628
}
},
</script>
<!--Local Company-->
<script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "Organization",
"url": "<?= base_url($news -> Slug).'.html'; ?>", // URL website
"logo": "<?= base_url() . 'resources/uploads/images/automatic/tin-tuc/' . $news -> ImageURL ?>", // URL logo website
"contactPoint": [{
"@type": "ContactPoint",
"telephone": "<?= '(+84) '. substr($hotline[0]['Phone'], 1) ?>", // Số điện thoại Inhome
"contactType": "sales"
}]
}
</script>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Person",
  "name": "<?= $seo['CompanyName']; ?>", // Tên công ty 
  "url": "<?= base_url(); ?>", // URL website
  "sameAs": [
    "<?= $seo['Facebook']; ?>", // URL Facebook
    "<?= $seo['Instagram']; ?>", //URL Instagram
    "<?= $seo['Linkedin']; ?>", //URL Linkedin
    "<?= $seo['Google']; ?>" // URL Plus
  ]
}
</script>
<script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "Organization",
"url": "<?= base_url(); ?>", // URL trang chủ
"logo": "<?= base_url() . 'resources/uploads/images/automatic/tin-tuc/' . $news -> ImageURL ?>" // URL logo trang
}
</script>

	<?php $this -> load -> view('includes/header'); ?>

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

					<div class="noi-dung">
						<?php echo $news -> Body; ?>
					</div>
					<div class="noi-dung">
					<p class="lead text-uppercase relative-title">Tin tức liên quan</p>
						<div id="owl-relative" class="owl-carousel owl-theme">
						<?php if ($relative) {
							foreach ($relative as $key => $value) { ?>
								<div class="item">
									<a title="<?= $value->Title; ?>" href="<?= base_url($value -> Slug).'.html'; ?>"><img src="<?= base_url() . 'resources/uploads/images/automatic/' . $value->ImageURL ?>" alt="<?= $value->ImageAlt; ?>" title="<?= $value->ImageTitle; ?>" ></a>
									<a title="<?= $value->Title; ?>" href="<?= base_url($value -> Slug).'.html'; ?>"><?= $value->Title; ?></a>
								</div>
						<?php }	} ?>
						</div>
					</div>
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
<script>
	$(document).ready(function() {
		var owl = $("#owl-relative");
		owl.owlCarousel({
			itemsCustom : [
				[0, 1],
				[450, 2],
				[600, 2],
				[700, 3],
				[1000, 4],
				[1200, 5],
				[1400, 5],
				[1600, 5]
			],
			navigation : false,
			autoPlay: true
		});
	});
</script>
</body>

</html>