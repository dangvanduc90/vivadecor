<div class="right">
	<?php if (!isset($product)) { ?>
	<div class="tu-van-noi-that">
		<h2>Tư vấn thiết kế nội thất</h2>
		<div class="view-content">
			<div class="top">
				<?php if($hotline) {  foreach ($hotline as $h) { ?>
					<a href="tel:<?= str_replace(array(',','.', ' '), "", $h['Phone']); ?>"><span class="icon"></span><?= $h['Phone'] ?></a>
				<?php }} ?>
				<a rel="nofollow" title="Hỗ trợ trực tuyến" class="support" href="javascript:void(0);"><span class="icon"></span>Hỗ trợ trực tuyến</a>
			</div>

			<a class="ctools-modal-my-simple-ass-modal-style text-uppercase btn-block ctools-modal" data-toggle="modal" href='#modal-id'>Gửi yêu cầu thiết kế</a>
			<p>Đặt tư vấn thiết kế và thi công nội thất</p>
			<div style="display:none;" id="modal-message">&nbsp</div>
			<div class="modal fade" id="modal-id">
				<div class="modal-dialog front">
					<div class="modal-content">
						<div class="modal-body">
							<form action="<?= base_url('cam-on.html'); ?>" method="POST" role="form">
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
									<input type="submit" id="edit-submit-3"  name="op" value="Xác nhận" class="form-submit">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php if ($signature) { ?>
		<div class="right-item-bottom">
			<div class="video-home block items">
				<h5>FaceBook</h5>
				<div class="fb-page" data-href="https://www.facebook.com/vivadecor.vn/" data-tabs="timeline" data-width="300" data-height="230" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/vivadecor.vn/" class="fb-xfbml-parse-ignore"><a rel="nofollow" title="Nội thất Vivadecor" href="https://www.facebook.com/vivadecor.vn/">Nội thất Vivadecor</a></blockquote></div>
			</div>
			<div class="cam-nang-item block items">
				<h5>Cẩm nang tin tức</h5>
				<ul>
				<?php foreach ($signature as $key => $value) { ?>
					<li class="<?= $key == 0 ? "first" : "item"; ?>"><a href="<?= base_url($value->Slug).'.html' ?>" class="image"><img src="<?= $key == 0 ? base_url() . 'resources/uploads/images/automatic/tin-tuc/'. $value -> ImageURL : base_url() . 'resources/uploads/images/automatic/tin-tuc/thumbs/'. $value -> ImageURL; ?>" <?= $key == 0 ? 'width="307" height="187"' : 'width="61" height="52"'; ?> alt="<?= $value -> ImageAlt; ?>" title="<?= $value -> ImageTitle; ?>" /></a><a href="<?= base_url($value->Slug).'.html' ?>"><?= $value -> Title; ?></a></li>
				<?php } ?>
				</ul>
			</div>
		</div>
	<?php } ?>
	<?php if ($trend) { ?>
		<div class="right-item-bottom">
			<div class="cam-nang-item block items">
				<h5>Xu hướng thiết kế</h5>
				<ul>
				<?php foreach ($trend as $key => $value) { ?>
					<li class="<?= $key == 0 ? "first" : "item"; ?>"><a href="<?= base_url($value->Slug).'.html' ?>" class="image"><img src="<?= $key == 0 ? base_url() . 'resources/uploads/images/automatic/tin-tuc/'. $value -> ImageURL : base_url() . 'resources/uploads/images/automatic/tin-tuc/thumbs/'. $value -> ImageURL; ?>" <?= $key == 0 ? 'width="307" height="187"' : 'width="61" height="52"'; ?> alt="<?= $value -> ImageAlt; ?>" title="<?= $value -> ImageTitle; ?>" /></a><a href="<?= base_url($value->Slug).'.html' ?>"><?= $value -> Title; ?></a></li>
				<?php } ?>
				</ul>
			</div>
		</div>
	<?php } ?>

</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=792558584177374";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>