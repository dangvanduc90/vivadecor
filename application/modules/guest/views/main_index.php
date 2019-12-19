<!DOCTYPE html>
<html>
<html lang="vi">
	<?php $this -> load -> view('includes/header'); ?>
    <link rel="canonical" href="<?= base_url(); ?>" /><!--Canonical Seo trang chủ-->
    <link rel="amphtml"  href="https://amp.vivadecor.com.vn/" />
    <meta name="robots" content="index, follow, noodp, noarchive" /><!-- Khai báo Robots -->
<!--Định danh cho MXH-->
    <meta property="og:site_name" content="<?php if($SEOTitle !== false) echo $SEOTitle;?>">
    <meta property="og:url" content="<?= base_url(); ?>">
    <meta property="og:title" content="<?php if($SEOTitle !== false) echo $SEOTitle;?>"><!--Title Seo trang chủ-->
    <meta property="og:image" content="<?= base_url() . 'resources/uploads/images/automatic/' . $logo['ImagePreset'] . $logo['ImageURL'] ?>"><!--Logo trang chủ-->
    <meta property="og:description" content="<?php if($SEODescription !== false) echo $SEODescription;?>"> <!--Mô tả Seo trang chủ-->
    <link rel="author" href="<?= $seo['Google']; ?>" />
    <link href="<?= $seo['Google']; ?>" rel="publisher" />
    <meta name="author" itemprop="author" content="<?= base_url(); ?>" />
    <meta http-equiv="REFRESH" content="300" />
    <meta name="geo.region" content="VN" />
    <meta name="geo.placename" content="Hà Nội" />
    <meta name="copyright" content="<?= $seo['Copyright']; ?>" />
    <meta name="abstract" content="<?= $seo['Slogan']; ?>" />
    <meta name="distribution" content="Global" />
    <meta name="Area" content="Hanoi" />
    <meta name="revisit-After" content="1 days" />
    <meta name="rating" content="general" />
<!--Code Snippet Sitelinks Searchbox | Google Developers -->
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebSite",
  "url": "<?= base_url(); ?>",
  "potentialAction": [{
	"@type": "SearchAction",
	"target": "<?= base_url(); ?>tim-kiem?t={vivadecor}",
	"query-input": "required name={vivadecor}"
  }]
}
</script>
<!--Local Company-->
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "url": "<?= base_url(); ?>",
  "logo": "<?= base_url() . 'resources/uploads/images/automatic/' . $logo['ImagePreset'] . $logo['ImageURL'] ?>",
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
  "name": "<?= $seo['CompanyName']; ?>",
  "url": "<?= base_url(); ?>",
  "sameAs": [
    "<?= $seo['Facebook']; ?>",
    "<?= $seo['Instagram']; ?>",
    "<?= $seo['Linkedin']; ?>",
    "<?= $seo['Google']; ?>"
  ]
}
</script>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "url": "<?= base_url(); ?>",
  "logo": "<?= base_url() . 'resources/uploads/images/automatic/' . $logo['ImagePreset'] . $logo['ImageURL'] ?>"
}
</script>
</script>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "url": "<?= base_url(); ?>",
  "logo": "<?= base_url() . 'resources/uploads/images/automatic/' . $logo['ImagePreset'] . $logo['ImageURL'] ?>"
}
</script>

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
		<?php $this -> load -> view('includes/banner'); ?>
		<?php $this -> load -> view('includes/filter'); ?>
	</header>
	<div class="main">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
                    <?php if ($productsListBySection) {
                        foreach ($productsListBySection as $section) {
                            ?>
                            <div class="du-an-home-item block items">
                                <h3>
                                    <strong><?= $section['Title'] ?></strong>
                                    <span><i></i></span>
                                </h3>

                                <?php if ($section['products']) { ?>
                                    <div class="view-content items">
                                        <!-- <a href="<?= base_url('moi'); ?>" class="xem-them">Xem chi tiết</a> -->
                                        <div class="content-items">
                                            <ul>
                                                <?php foreach ($section['products'] as $key => $product) { ?>
                                                    <li class="row col-xs-12">
                                                        <a href="<?= base_url($product->Slug) . '.html'; ?>"
                                                           class="image"><img
                                                                    src="<?= base_url() . 'resources/uploads/images/automatic/' . $product->ImageURL ?>"
                                                                    width="396" height="177"
                                                                    alt="<?= $product->ImageAlt ?>"
                                                                    title="<?= $product->ImageTitle; ?>">
                                                        </a>
                                                        <div class="hover">
                                                            <div class="inner"><span><a
                                                                            href="<?= base_url($product->Slug) . '.html'; ?>"
                                                                            rel="nofollow ">Xem chi tiết</a></span>
                                                            </div>
                                                        </div>
                                                        <a href="<?= base_url($product->Slug) . '.html'; ?>"
                                                           class="title "
                                                           title="<?= $product->Title; ?>"><?= $product->Title; ?></a><span
                                                                class="phong-cach "><?= $product->srtres_Title; ?></span><span
                                                                class="dien-tich ">Diện tích <?= $product->srtprice_Title; ?></span>
                                                        <div class="lead "><?= $product->Description; ?></div>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                            <div class="clearfix"></div>
                                            <a class="pagination-ajax" href="<?= $section['Link'] ?>">Xem thêm</a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php }
                    } ?>
                </div>
			</div>
		</div>
	</div>

	<div class="main">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="left">
						<h3>
							<strong>Giới thiệu</strong>
							<span><i></i></span>
						</h3>
						<div class="">
							<a title="<?= $hot_news -> Title; ?>" href="<?= base_url($hot_news -> Slug).'.html'; ?>"><img src="<?= base_url() . 'resources/uploads/images/automatic/' . $hot_news -> ImageURL ?>" alt="<?= $hot_news -> ImageAlt ?>" title="<?= $hot_news -> ImageTitle; ?>" /></a>
							<div class="intro_description"><?= $hot_news -> Body; ?>
							<br>
							<a title="<?= $hot_news -> Title; ?>" href="<?= base_url($hot_news -> Slug).'.html'; ?>"><?= $hot_news -> Title; ?></a></div>
						</div>
					</div>
					<!-- <div class="right">
						<div class="tu-van-noi-that">
							<h2>Tư vấn thiết kế nội thất</h2>
							<div class="view-content">
								<div class="top">
									<?php if($hotline) {  foreach ($hotline as $h) { ?>
										<a href="tel:<?= str_replace(array(',','.', ' '), "", $h['Phone']); ?>"><span class="icon"></span><?= $h['Phone'] ?></a>
									<?php }} ?>
									<a class="support" href="javascript:void(0);"><span class="icon"></span>Hỗ trợ trực tuyến</a>
								</div>

								<a class="ctools-modal-my-simple-ass-modal-style text-uppercase btn-block ctools-modal" data-toggle="modal" href='#modal-id'>Gửi yêu cầu thiết kế</a>
								<p>Đặt tư vấn thiết kế và thi công nội thất</p>
								<div style="display:none;" id="modal-message">&nbsp</div>
								<div class="modal fade" id="modal-id">
									<div class="modal-dialog front">
										<div class="modal-content">
											<div class="modal-body">
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
														<input placeholder="Họ và tên" type="text" id="edit-fullname" name="fullname" value="" size="60" maxlength="128" class="form-text required">
													</div>
													<div class="form-item form-type-textfield form-item-phone">
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
													<input type="submit" id="edit-submit-3" onclick="return ajaxSubscribe()" name="op" value="Xác nhận" class="form-submit">
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>
	<?php if ($partners) {
		echo '<div class="main">';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="left">';
		echo '<h3>';
		echo '<strong>Đối tác</strong>';
		echo '<span><i></i></span>';
		echo '</h3>';
		echo '<div class="col-xs-12">';
		echo '<div id="owl-partners" class="owl-carousel owl-theme">';
		foreach ($partners as $key => $partner_item) { ?>
			<div class="item">
				<a rel="nofollow" target="_blank" title="" href="<?= $partner_item['Url']; ?>"><img src="<?= base_url() . 'resources/uploads/images/automatic/logo/' . $partner_item['ImageUrl'] ?>" alt="" title="" ></a>
			</div>
		<?php }
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	} ?>
	<?php $this -> load -> view('includes/footer'); ?>
	<script src="<?= base_url()?>resources/js/client/js_xAPl0qIk9eowy_iS9tNkCWXLUVoat94SQT48UBCFkyQ.js"></script>
	<script src="<?= base_url()?>resources/js/client/js_aWiQ9fvPkOXyPwxBu2QprjK_mqzskAq4obsa04reQJE.js"></script>
	<!-- <script src="<?= base_url()?>resources/js/client/js_6cGsFgruUh8ksyKLsOg1gTgnhWg0ga2N32997qzmuzw.js"></script> -->
	<script src="<?= base_url()?>resources/js/client/js_gSe1cCZGvZPFIdrEzWjBrwD6h3QbH-vbRp3JnE_3q64.js"></script>
<a href = "#" id = "toTop" style = "display: inline;"><span id = "toTopHover" style = "opacity: 0;"></span>To Top</a>
<script>
	$(".pagination-ajax").click(function(){
		if (!$(this).hasClass("active")) {
			pagination($(this).attr('data-page') || 1);
			$(this).addClass("active");
		}
	    return false;
	});
	function pagination(page){
	    const listProduct = $('.content-items ul');
        listProduct.append("<img id='loadmore-products' src='<?= base_url() ?>resources/ui_images/loading_transparent1.gif'/>").fadeIn('fast');
	    $.ajax ({
	        type: "POST",
	        url: "<?= base_url()?>ajaxhandle/client_ajaxhandler/Pagination_product",
	        data: {page: page},
	        dataType: "json",
	        error: function(data){
	    		alert("Lỗi loadmore ajax");
	        },
	        success: function(obj) {
                $(".pagination-ajax").attr('data-page', parseInt(page)+1);
                $(".pagination-ajax").removeClass("active");
					var strhtml = '';
					for(var index in obj) {
							strhtml += '<li class="row col-xs-12">';
								strhtml += '<a href="<?= base_url();?>'+obj[index].Slug+'.html'+ ' " class="image"><img width="396" height="177" src="<?= base_url();?>resources/uploads/images/automatic/' + obj[index].ImageURL + '" alt="' + obj[index].ImageAlt + '" title="' + obj[index].ImageTitle + '" />';
								strhtml += '</a>';
							strhtml += '<div class="hover">';
								strhtml += '<div class="inner"><span><a href="<?= base_url();?>'+obj[index].Slug+'.html'+ ' " rel="nofollow ">Xem chi tiết</a></span></div>';
							strhtml += '</div>';
							strhtml += '<a href="<?= base_url();?>'+obj[index].Slug+'.html'+ ' " title="'+obj[index].Title+'" rel="nofollow ">'+obj[index].Title+'</a>';
							strhtml += '<span class="phong-cach ">'+obj[index].srtres_Title+'</span>';
							strhtml += '<span class="dien-tich ">Diện tích '+obj[index].srtprice_Title+'</span>';
							strhtml += '<div class="lead ">'+obj[index].Description+'</div>';
							strhtml += '</li>';
					}
					listProduct.find("#loadmore-products").remove();
					listProduct.append(strhtml);
	        }
	    });
	}
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
	$(document).ready(function() {
		var owl = $("#owl-partners");
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
			pagination: false
		});
	});
</script>
</body></html>