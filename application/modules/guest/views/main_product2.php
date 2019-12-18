<!doctype html>

<html lang="vi">
<head profile="http://www.w3.org/1999/xhtml/vocab">

<link rel="canonical" href="<?= current_url(); ?>" /><!--Canonical Seo trang chuyên mục-->
<meta name="robots" content="index, follow, noodp, noarchive" /><!-- Khai báo Robots -->
<!--Định danh cho MXH-->
<meta property="og:site_name" content="<?php if($SEOTitle !== false) echo $SEOTitle;?>">
<meta property="og:url" content="<?= current_url(); ?>">
<meta property="og:title" content="<?php if($SEOTitle !== false) echo $SEOTitle;?>"><!--Title Seo trang chuyên mục-->
<meta property="og:image" content="<?= base_url() . 'resources/uploads/images/automatic/' . $product -> ImageURL ?>"><!-- URL Ảnh đại diện bài viết -->
<meta property="og:description" content="<?php if($SEODescription !== false) echo $SEODescription;?>"> <!--Mô tả Seo trang chuyên mục-->	

<!--Google Author-->
<link rel="author" href="<?= $seo['Google']; ?>" /> <!-- Link G+ của website -->
<link href="<?= $seo['Google']; ?>" rel="publisher" /><!-- Link G+ của website -->

<meta name="author" itemprop="author" content="<?= base_url(); ?>" />
<meta http-equiv="REFRESH" content="300" />
<meta name="geo.region" content="VN" />
<meta name="geo.placename" content="Hà Nội" /><!-- Khai báo địa điểm -->
<meta name="copyright" content="<?= $seo['Copyright']; ?>" /><!-- Copyright -->
<meta name="abstract" content="<?= $seo['Slogan']; ?>" /><!-- Slogan -->
<meta name="distribution" content="Global" />
<meta name="Area" content="Hanoi" />
<meta name="revisit-After" content="1 days" />
<meta name="rating" content="general" />

<!--Thẻ Snippet-->
<script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "NewsArticle",
"mainEntityOfPage":
{ "@type":"WebPage", "@id":"<?= base_url($product -> Slug).'.html'; ?>" }
,           	
"headline": "<?= $product -> Title ?>",
"dateModified": "<?= date("Y-m-d", strtotime($product -> ModifiedDate))."T".date("H-i-s", strtotime($product -> ModifiedDate))."+07:00"; ?>",
"description": "<?php if($SEODescription !== false) echo $SEODescription;?>",
"datePublished": "<?= date("Y-m-d", strtotime($product -> CreatedDate))."T".date("H-i-s", strtotime($product -> CreatedDate))."+07:00"; ?>",
"author":
{ "@type": "Person", "name": "<?= $seo['CompanyName']; ?>" }
,
"publisher": {
"@type": "Organization",
"name": "<?= $seo['CompanyName']; ?>",
"logo":
{ "@type": "ImageObject", "url": "<?= base_url() . 'resources/uploads/images/automatic/' . $product -> ImageURL ?>"}
},
"image": {
"@type": "ImageObject",
"url": "<?= base_url() . 'resources/uploads/images/automatic/' . $product -> ImageURL ?>",
"width": 1200,
"height": 628
}
}
</script>

<!--Local Company-->
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "url": "<?= base_url($product -> Slug).'.html'; ?>",// URL website 
  "logo": "<?= base_url() . 'resources/uploads/images/automatic/' . $logo['ImagePreset'] . $logo['ImageURL'] ?>", // URL logo website
  "contactPoint": [{
	"@type": "ContactPoint",
	"telephone": "<?= '(+84) '. substr($hotline[0]['Phone'], 1) ?>", // Số điện thoại
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

  		img{

  			max-width: 100%;

  		}

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

<body class="html not-front not-logged-in no-sidebars page-node page-node- page-node-244 node-type-project" >

	<header>

		<?php $this -> load -> view('includes/top'); ?>

	</header>

<div class="main chi-tiet-project">

	<div class="container">

		<div class="group-content">

			<div class="du-an-node-detail items">
				<?php echo $breadcrumb; ?>
				<h1 class="title">

					<?= $product -> Title ?>

				</h1>

				<div class="image-item block items">

					<div class="big-image" id="slider1_container" style="position: relative; width: 820px;height: 540px; overflow: hidden;">

						<div u="loading" style="position: absolute; top: 0px; left: 0px;">

							<div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;

								background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">

							</div>

							<div style="position: absolute; display: block; background: url(images/loading.html) no-repeat center center;

								top: 0px; left: 0px;width: 100%;height:100%;">

							</div>

						</div>

						<div class="view" u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 820px; height: 430px;overflow: hidden;">

							<?php if ($productImage) {

								foreach ($productImage as $key => $prdImage) { ?>

							<div>

								<img u="thumb" src="<?= base_url() . 'resources/uploads/images/automatic/san-pham/thumbs/'. $prdImage -> ImageURL; ?>" alt="<?= $prdImage -> AltText; ?>" title="<?= $prdImage -> TitleText; ?>" /> 

								<img u="image" src="<?= base_url() . 'resources/uploads/images/automatic/san-pham/'. $prdImage -> ImageURL; ?>" width="814" height="429" alt="<?= $prdImage -> AltText; ?>" title="<?= $prdImage -> TitleText; ?>" />

							</div>

								<?php }	} ?>

						</div>

						<div u="thumbnavigator" class="jssort07" style="width: 820px; height: 100px; left: 0px; bottom: 0px;">

							<!-- Thumbnail Item Skin Begin -->

							<div u="slides" style="cursor: default;">

								<div u="prototype" class="p">

									<div u="thumbnailtemplate" class="i"></div>

									<div class="o"></div>

								</div>

							</div>

							<!-- Arrow Left -->

							<span u="arrowleft" class="jssora11l" style="top: 123px; left: 8px;"></span>

							<!-- Arrow Right -->

							<span u="arrowright" class="jssora11r" style="top: 123px; right: 8px;"></span>

						</div>

						<a class="zoom" href="javascript:void(0)"><span class="icon"></span></a>

					</div>

				</div>

				<div class="ho-tro-khach-hang-node items">

					<div class="hotline">

					<?php if($hotline) { echo '<a href="tel:'.str_replace(array(',','.', ' '), "", $hotline[0]['Phone']).'"><span class="icon"><i>';  foreach ($hotline as $k => $h) { ?>

							<?php if ($k != 0) {

								echo " | ";

							}echo $h['Phone']; } echo "</i></span></a>";} ?>



						<!-- <a href="tel:090 365 3333 | 04 6329 7777">

						<span class="icon"><i>090 365 3333 | 04 6329 7777</i></span>

						</a> -->

					</div>

					<a class="ctools-modal-my-simple-ass-modal-style text-uppercase btn-block ctools-modal" data-toggle="modal" href='#modal-id'>Gửi yêu cầu thiết kế</a>

						<div class="modal fade gui-yeu-cau-thiet-ke-add-form" id="modal-id">

							<div class="modal-dialog front">

								<div class="modal-content">

									<div class="modal-body">
										<form action="<?= base_url('cam-on'.'.html'); ?>" method="POST" role="form">
											<div class="yeu-cau-left">

												<a href="<?= base_url($product -> Title); ?>" class="image">

													<img alt="<?= $product -> ImageAlt ?>" src="<?= base_url() . 'resources/uploads/images/automatic/' . $product -> ImageURL ?>" width="254" height="187">

												</a>

												<a href="<?= base_url($product -> Title); ?>" class="title"><?= $product -> Title ?></a>

											</div>

											<input type="hidden" name="productid" id="edit-nid" value="<?= $product -> ProductsID ?>">

											<div class="yeu-cau-right"><h4>Thông tin khách hàng</h4>

												<div id="edit-gender" class="form-radios">

													<div class="form-item form-type-radio form-item-gender">

														<input type="radio" id="edit-gender-1" name="gender" value="1" class="form-radio">

														<label class="option" for="edit-gender-1">Anh </label>

													</div>

													<div class="form-item form-type-radio form-item-gender">

														<input type="radio" id="edit-gender-2" name="gender" value="0" class="form-radio">  <label class="option" for="edit-gender-2">Chị </label>

													</div>

												</div>

												<div class="form-item form-type-textfield form-item-fullname">
													<?= form_error('fullname'); ?>
													<input placeholder="Họ và tên" type="text" id="edit-fullname" name="fullname" value="" size="60" maxlength="128" class="form-text required">

												</div>

												<div class="form-item form-type-textfield form-item-phone">
													<?= form_error('phone'); ?>
													<input placeholder="Số điện thoại" type="text" id="edit-phone" name="phone" value="" size="60" maxlength="128" class="form-text required">

												</div>

												<div class="form-item form-type-textfield form-item-email">

													<input placeholder="Email (không bắt buộc, dùng để gửi xác nhận)" type="text" id="edit-email" name="email" value="" size="60" maxlength="128" class="form-text">

												</div>

												<div class="form-item form-type-textarea form-item-message">

													<div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">

														<textarea placeholder="Ghi chú khác của quý khách" id="edit-message" name="message" cols="60" rows="5" class="form-textarea"></textarea><div class="grippie"></div>

													</div>

												</div>

												<input type="submit" id="edit-submit-3" name="op" value="Xác nhận" class="form-submit">

											</div>
										</form>
									</div>

								</div>

							</div>

						</div>

				</div>

				<div class="lead">

					<strong class="label">Thông tin</strong><br />

					<div class="content">

						<?= $product -> Description; ?>

					</div>

				</div>

				<div class="clear"></div>

				<div class="noi-dung">

					<strong class="label">Mô tả</strong><br />

					<?= $product -> Body; ?>

				</div>

			</div>

			<?php $this -> load -> view('includes/sidebar'); ?>

			<div class="ban-co-the-quan-tam items block">

				<h3 class="hidden-xs">Có thể bạn quan tâm</h3>

				<div class="content hidden-xs">

					<div id="list" class="owl-carousel owl-theme">

					<?php if ($relative) { 

						foreach ($relative as $key => $rela_prd) { ?>

						<?php foreach ($rela_prd as $k => $prd) { ?>

							<div class="item">

								<a href="<?= base_url($prd['Slug']).'.html'; ?>" class="image <?= ($key == 0 && $k == 0) ? 'active' : ''; ?>">

									<img src="<?= base_url() . 'resources/uploads/images/automatic/san-pham/thumbs/'. $prd['ImageURL']; ?>" width="195" height="128" alt="<?= $prd['ImageAlt']; ?>" title="<?= $prd['ImageTitle']; ?>">

								</a>

								<a href="<?= base_url($prd['Slug']).'.html'; ?>" class="title <?= ($key == 0 && $k == 0) ? 'active' : ''; ?>" title="<?= $prd['Title']; ?>"><?= $prd['Title']; ?></a>

							</div>

							<?php } ?>

					<?php } } ?>

					</div>

				</div>

				<div class="nav">

					<a href="javascript:void();" class="prev" id="prev-cothe"><span class="icon"></span></a>

					<a href="javascript:void();" class="next" id="next-cothe"><span class="icon"></span></a>

				</div>

			</div>

			<div class="binh-luan items">

				<h3>Mời bạn đánh giá bình luận và đặt câu hỏi về sản phẩm</h3>

				<ul class="tab">

					<li class="facebook" data="facebook"><span class="icon"></span>Facbook<span class="hover"></span></li>

					<li class="google" data="google-comment"><span class="icon"></span>Google+<span class="hover"></span></li>

				</ul>

				<div class="quick-main items">

					<div class="quick-view-item" id="facebook">

						<div class="fb-comments" data-href="<?= current_url(); ?>" data-numposts="5" data-width="100%"></div>

					</div>

					<div class="quick-view-item" id="google-comment" style="display: none;">

						<div id="google_comments"><img src="resources/ui_images/loading_transparent1.gif" alt="loading" /> Đang tải...</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>

<?php $this -> load -> view('includes/footer'); ?>

<!-- slider -->

	<script src="<?= base_url()?>resources/js/client/js_xAPl0qIk9eowy_iS9tNkCWXLUVoat94SQT48UBCFkyQ.js"></script>

	<script src="<?= base_url()?>resources/js/client/js_aWiQ9fvPkOXyPwxBu2QprjK_mqzskAq4obsa04reQJE.js"></script>

	<script src="<?= base_url()?>resources/js/client/js_t9dhvMjyBVilgboxNnLC3Ks6cdDRBVDoBrHpIQELUYQ.js"></script>

	<script src="<?= base_url()?>resources/js/client/js_6cGsFgruUh8ksyKLsOg1gTgnhWg0ga2N32997qzmuzw.js"></script>

	<script src="<?= base_url()?>resources/js/client/easing.js"></script>

	<script src="<?= base_url()?>resources/js/client/js_gSe1cCZGvZPFIdrEzWjBrwD6h3QbH-vbRp3JnE_3q64.js"></script>

<a href="#" id="toTop" style="display: inline;"><span id="toTopHover" style="opacity: 0;"></span>To Top</a>

<script src="https://apis.google.com/js/plusone.js" type="text/javascript">{lang: 'vi'}</script>

<script>gapi.comments.render('google_comments',{href:window.location.href,width: 680,first_party_property: 'BLOGGER',view_type: 'FILTERED_POSTMOD'});

       function fix_google()

       {

          if($("#google_comments").length>0) $("#google_comments").css({"width":"100%"});

       }

</script>
<div class="mobile-share-buttons">
	<div class="facebook" href="javascript:void(0);" onclick="window.open(&quot;https://www.facebook.com/sharer.php?u=<?= current_url(); ?>&quot;,
		&quot;displayWindow&quot;, &quot;width=640,height=480,left=350,top=170,status=no,toolbar=no,menubar=no&quot;)">
		<span class="icon"></span>
	</div>
	<div class="twitter" href="javascript:void(0);" onclick="window.open(&quot;https://twitter.com/share?url=<?= current_url(); ?>&quot;,
		&quot;displayWindow&quot;, &quot;width=640,height=480,left=350,top=170,status=no,toolbar=no,menubar=no&quot;)">
		<span class="icon"></span>
	</div>
	<div class="google" href="javascript:void(0);" onclick="window.open(&quot;https://plus.google.com/share?url=<?= current_url(); ?>&quot;,
		&quot;displayWindow&quot;, &quot;width=640,height=480,left=350,top=170,status=no,toolbar=no,menubar=no&quot;)">
		<span class="icon"></span>
	</div>
	<div class="linkedin" href="javascript:void(0);" onclick="window.open(&quot;http://www.linkedin.com/shareArticle?mini=true&amp;url=<?= current_url(); ?>&quot;,
		&quot;displayWindow&quot;, &quot;width=640,height=480,left=350,top=170,status=no,toolbar=no,menubar=no&quot;)">
		<span class="icon"></span>
	</div>
	<div class="close-mobile-block">
		<span class="icon"></span>
	</div>
</div>

	<!-- Đặt thẻ này vào phần đầu hoặc ngay trước thẻ đóng phần nội dung của bạn. -->
<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'vi'}
</script>
<script type="text/javascript">
$(document).ready(function () {
	var owl = $("#list");
	owl.owlCarousel({
		items : 4
		// pagination: false
	});
	// Custom Navigation Events
	$(".next").click(function(){
		owl.trigger('owl.next');
	})
	$(".prev").click(function(){
		owl.trigger('owl.prev');
	})
});
</script>

</body>

</html>

