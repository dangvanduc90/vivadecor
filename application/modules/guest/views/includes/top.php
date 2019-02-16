<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NK54CFL" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="header-top">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="logo">
					<a rel="nofollow" title="<?= $logo['Title'] ?>" href="<?= base_url() ?>">
						<img title="<?= $logo['Title'] ?>" alt="<?= $logo['Description'] ?>" src="<?= base_url() . 'resources/uploads/images/automatic/' . $logo['ImagePreset'] . $logo['ImageURL'] ?>">
					</a>
				</div>
				<form class="tim-kiem-form hidden-xs" action="<?= base_url().'tim-kiem' ?>" method="get" id="baiviet-tim-kiem-form" accept-charset="UTF-8">
					<div>
						<div class="form-item form-type-textfield form-item-title">
							<input placeholder="Nhập từ khóa tìm kiếm..." type="text" id="edit-title" name="t" value="" size="60" maxlength="128" class="form-text form-autocomplete" />
						</div>
						<input type="submit" id="search_btn" value="" class="form-submit searchbutton" />
					</div>
				</form>
				<div class="header-top-right block">
					<ul>
						<li>
							<a class="showroom" href="javascript:void(0);">
								<span class="icon"></span> Địa chỉ VP
							</a>
							<ul>
								<span class="icon"></span> Nội thất Vivadecor:
								<li><a>110 Thái Thịnh, Đống Đa, Hà Nội</a>
								</li>
								<li><a rel="nofollow" href="tel:01203435555" title="01203435555">Hotline hỗ trợ: </a><span><?php if($hotline) { foreach ($hotline as $k => $h) { ?>
									<?php if ($k != 0) {
										echo " | ";
									}echo $h['Phone']; } echo "</a>";} ?></span>
								</li>
								<li><a rel="nofollow" title="Bản đồ đường đi" target="_blank" href="https://goo.gl/maps/xvWThgeY3P72">Xem sơ đồ đường đi</a>
								</li>
							</ul>
						</li>
						<li>
						<?php if($hotline) { echo '<a rel="nofollow" class="hotline" href="tel:'.str_replace(array(',','.', ' '), "", $hotline[0]['Phone']).'"><span class="icon"></span>';  foreach ($hotline as $k => $h) { ?>
									<?php if ($k != 0) {
										echo " | ";
									}echo $h['Phone']; } echo "</a>";} ?>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<nav class="menu-main hidden-xs">
					<?= $menu ?>
			</nav>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<!-- top on mobile -->
	    <div class="hidden-md hidden-lg hidden-sm col-xs-12">
	        <nav class="navbar navbar-default">
	                <!-- Brand and toggle get grouped for better mobile display -->
	                <div class="navbar-header">
	                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                  </button>
	                </div>

	            <!-- Collect the nav links, forms, and other content for toggling -->
	                <div class="collapse navbar-collapse" aria-expanded="false" id="bs-example-navbar-collapse-1">
	                    <?= $menuResponsive ?>
	                </div><!-- /.navbar-collapse -->
	        </nav>
	    </div>
	</div>
</div>