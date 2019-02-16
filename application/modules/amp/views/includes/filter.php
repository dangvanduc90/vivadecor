<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="header-bottom block">
				<div class="tim-kiem-item">

					<p class="label">Lọc tìm: </p>

					<ul>

						<li class="item">

							<a href="javascript:void(0);"><span class="text">Phong cách</span><span class="icon"></span></a>

							<?= $stylelist; ?>

						</li>

						<li class="item">

							<a href="javascript:void(0);"><span class="text">Màu sắc</span><span class="icon"></span></a>

							<?= $color; ?>

						</li>

						<li class="item">

							<a href="javascript:void(0);"><span class="text">Diện tích</span><span class="icon"></span></a>

							<?= $acreage; ?>

						</li>

						<li class="item">

							<a href="javascript:void(0);"><span class="text">Phòng</span><span class="icon"></span></a>

							<?= $room; ?>

						</li>

					</ul>

					

					<div class="tim-kiem-nang-cao-form">

						<span class="icon"></span>

						<form class="du-an-advave-form" action="<?= base_url('tim-kiem'); ?>" method="get" id="baiviet-du-an-advace-form" accept-charset="UTF-8">

							<div>

								<div class="form-item form-type-radios form-item-phongcach">

									<label for="edit-phongcach">Phong cách </label>

									<div id="edit-phongcach" class="form-radios">

										<?= $stylelist_under; ?>

									</div>

								</div>

								<div class="form-item form-type-radios form-item-mausac">

									<label for="edit-mausac">Màu sắc </label>

									<div id="edit-mausac" class="form-radios">

										<?= $color_under; ?>

									</div>

								</div>

								<div class="form-item form-type-radios form-item-phong">

									<label for="edit-phong">Phòng </label>

									<div id="edit-phong" class="form-radios">

										<?= $room_under; ?>

									</div>

								</div>

								<div class="form-item form-type-radios form-item-dientich">

									<label for="edit-dientich">Diện tích </label>

									<div id="edit-dientich" class="form-radios">

										<?= $acreage_under; ?>

									</div>

								</div>

								<input type="submit" value="Tìm kiếm" class="form-submit" />

							</div>

						</form>

					</div>

					<a class="tim-kiem-nang-cao hidden-xs" href="javascript:void(0);"><i></i>Tìm kiếm nâng cao</a>
				</div>
			</div>
		</div>
	</div>
</div>