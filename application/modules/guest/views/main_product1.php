<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" version="XHTML+RDFa 1.0" dir="ltr" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:dc="http://purl.org/dc/terms/" xmlns:foaf="http://xmlns.com/foaf/0.1/" xmlns:og="http://ogp.me/ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:sioc="http://rdfs.org/sioc/ns#" xmlns:sioct="http://rdfs.org/sioc/types#" xmlns:skos="http://www.w3.org/2004/02/skos/core#" xmlns:xsd="http://www.w3.org/2001/XMLSchema#">

<head profile="http://www.w3.org/1999/xhtml/vocab">

<?php $this -> load -> view('includes/header'); ?>

<link rel="canonical" href="<?= current_url(); ?>" /><!--Canonical Seo trang chuyên mục-->
<meta name="robots" content="index, follow, noodp, noarchive" /><!-- Khai báo Robots -->
<meta name="pubdate" itemprop="datePublished" content="2017-01-03T15:46:04+07:00"/><!-- Format thời gian xuất bản bài viết mới nhất chuyên mục-->
<meta property="article:modified_time" itemprop="dateModified" content="2017-01-04T15:45:59+07:00" /><!-- Format thời gian chỉnh sửa cuối cùng bài viết mới nhất chuyên mục-->
<!--Định danh cho MXH-->
<meta property="og:site_name" content="<?php if($SEOTitle !== false) echo $SEOTitle;?>">
<meta property="og:url" content="<?= current_url(); ?>">
<meta property="og:title" content="<?php if($SEOTitle !== false) echo $SEOTitle;?>"><!--Title Seo trang chuyên mục-->
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
<!--Local Company-->
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "url": "<?= base_url(); ?>",// URL website 
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


	<link rel="stylesheet" type="text/css" href="<?= base_url()?>resources/stylesheets/client/css_xE-rWrJf-fncB6ztZfd2huxqgxu4WO-qwma6Xer30m4.css" />

	<link rel="stylesheet" type="text/css" href="<?= base_url()?>resources/stylesheets/client/css_QAYhg7dez74Eme6CB5OY3Ayb0tva2gY_kYm5fkc2vOU.css" />

	<link rel="stylesheet" type="text/css" href="<?= base_url()?>resources/stylesheets/client/css_XymMW3gpkRTrcrQMLU0GzsgauM5FeWzFgVLnPB-NCC0.css" />

	<script src="<?= base_url()?>resources/js/client/jquery-1.3.2.min.js"></script>

	<script src="<?= base_url()?>resources/js/client/jquery.min.js"></script>

	<script src="<?= base_url()?>resources/js/client/easing.js"></script>

	<script src="<?= base_url()?>resources/js/client/bootstrap.min.js"></script>

	<script src="<?= base_url()?>resources/js/client/jquery.ui.totop.js"></script>

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

	<div class="clear"></div>

	<div class="main">

		<div class="container">

			<div class="row">
				<div class="col-xs-12">

					<div class="du-an-home-item block items">
						<?php echo $breadcrumb; ?>
						<h1>

							<?= $parent -> Title ?>

							<span><i></i></span>

						</h1>



						<?php if ($productsList) { ?>

						<div class="view-content items">

							<!-- <a href="<?= base_url('moi'); ?>" class="xem-them">Xem chi tiết</a> -->

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

						<?php echo $links; }else echo '<p class="lead text-uppercase text-success">Không có dự án nào</p>'; ?>

					</div>

				</div>
			</div>

		</div>

	</div>
	
	<?php if (isset($showIntro) && $showIntro) { ?>

	<div class="main">

		<div class="container">

			<div class="row">

				<div class="col-xs-12">

					<div class="du-an-home-item block items">
						
						<h3>

							<strong>Dự án hoàn thành</strong>

							<span><i></i></span>

						</h3>



						<?php if ($hotProductsList) { ?>

						<div class="view-content items">

							<div class="content-items hot-product">

								<ul>

								<?php foreach ($hotProductsList as $key => $product) { ?>

									<li class="col-xs-12">

										<a href="<?= base_url($product -> Slug).'.html'; ?>" class="image"><img src="<?= base_url() . 'resources/uploads/images/automatic/' . $product -> ImageURL ?>" width="396" height="177" alt="<?= $product -> ImageAlt ?>" title="<?= $product -> ImageTitle; ?>">

										</a>

										<div class="hover">

											<div class="inner"><span><a href="<?= base_url($product -> Slug).'.html'; ?>" rel="nofollow ">Xem chi tiết</a></span></div></div><a href="<?= base_url($product -> Slug).'.html'; ?>" class="title " title="<?= $product -> Title; ?>"><?= $product -> Title; ?></a><span class="phong-cach "><?= $product -> srtres_Title; ?></span><span class="dien-tich ">Diện tích <?= $product -> srtprice_Title; ?></span><div class="lead "><?= $product -> Description; ?></div>

									</li>

								<?php } ?>

								</ul>

							</div>

						</div>

						<?php } ?>
					
						<ul class="pagination-ajax">
							<?php if ($current_page > 1) { ?>
							<?php } ?>
						<?php for ($i=1; $i <= $total_page; $i++) { ?>
							<li <?php if ($i == $current_page) {echo 'class="active"';} ?> ><a href="javascript:;" data-page="<?= $i; ?>" ><?= $i; ?></a></li>
						<?php } ?>
							<?php if ($current_page < $total_page) { ?>
							<?php } ?>
						</ul>

					</div>

				</div>

			</div>

		</div>

	</div>
	<?php } ?>

</div>

<?php if (isset($showIntro) && $showIntro) { ?>
<div class="main">

	<div class="container">

		<div class="left">

			<h2>

				<?= $parent -> Title ?>

				<span><i></i></span>

			</h2>

			<div class="">

				<img src="<?= base_url() . 'resources/uploads/images/automatic/' . $parent -> ImagesURL ?>"  title="<?= $parent -> Title ?>" alt="<?= $parent -> Title ?>">

				<div class="intro_description"><?= strip_tags($parent -> Body, "<a>"); ?>

				<br>

				<a href="<?= base_url($parent -> Slug).'.html'; ?>">Chi tiết</a></div>

			</div>

		</div>

	</div>

</div>
<?php } ?>

<?php $this -> load -> view('includes/footer'); ?>

	<script src="<?= base_url()?>resources/js/client/js_xAPl0qIk9eowy_iS9tNkCWXLUVoat94SQT48UBCFkyQ.js"></script>

	<script src="<?= base_url()?>resources/js/client/js_aWiQ9fvPkOXyPwxBu2QprjK_mqzskAq4obsa04reQJE.js"></script>

	<script src="<?= base_url()?>resources/js/client/js_6cGsFgruUh8ksyKLsOg1gTgnhWg0ga2N32997qzmuzw.js"></script>

	<script src="<?= base_url()?>resources/js/client/js_gSe1cCZGvZPFIdrEzWjBrwD6h3QbH-vbRp3JnE_3q64.js"></script>

<a href = "#" id = "toTop" style = "display: inline;" > <span id = "toTopHover" style = "opacity: 0;"> </span>To Top</a>
<script>
	$(".pagination-ajax li a").click(function(){
		if (!$(this).parent().hasClass("active")) {
			pagination($(this).attr('data-page'));
			$(".pagination-ajax li").removeClass("active");
			$(this).parent().addClass("active");
		}
	    return false;
	});
	function pagination(page){
	    $('.hot-product ul').html("<img src='<?= base_url() ?>resources/ui_images/loading_transparent1.gif'/>").fadeIn('fast');
	    $.ajax ({
	        type: "POST",
	        url: "<?= base_url()?>ajaxhandle/client_ajaxhandler/Pagination_product_complete",
	        data: {page: page},
	        dataType: "json",
	        success: function(obj) {
					var strhtml = '';
					for(var index in obj) {
							strhtml += '<li class="row col-xs-12">';
								strhtml += '<a href="<?= base_url();?>'+obj[index].Slug+'.html" class="image"><img width="396" height="177" src="<?= base_url();?>resources/uploads/images/automatic/' + obj[index].ImageURL + '" alt="' + obj[index].ImageAlt + '" title="' + obj[index].ImageTitle + '" />';
								strhtml += '</a>';

							strhtml += '<div class="hover">';
								strhtml += '<div class="inner"><span><a href="<?= base_url();?>'+obj[index].Slug+'.html" rel="nofollow ">Xem chi tiết</a></span></div>';
							strhtml += '</div>';

							strhtml += '<a class="title " href="<?= base_url();?>'+obj[index].Slug+'.html" title="'+obj[index].Title+'" rel="nofollow ">'+obj[index].Title+'</a>';
							
							strhtml += '<span class="phong-cach ">'+obj[index].srtres_Title+'</span>';
							strhtml += '<span class="dien-tich ">Diện tích '+obj[index].srtprice_Title+'</span>';
							strhtml += '<div class="lead ">'+obj[index].Description+'</div>';

							strhtml += '</li>';
					}
					$('.hot-product ul').html(strhtml);
	        },
	        error: function(data){
	    		alert("Lỗi phân trang ajax");
	        }
	    });
	}

</script>
</body> </html>