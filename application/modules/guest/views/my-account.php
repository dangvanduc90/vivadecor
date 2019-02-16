<!DOCTYPE html>

<html>

<head>

	<?= $this -> load -> view('guest/includes/head') ?>

</head>

<body class="category-page">

<!-- HEADER -->

<?= $this -> load -> view('guest/includes/header') ?>

<!-- end header -->



<div class="columns-container">

	<div class="container" id="columns">

		<!-- breadcrumb -->

		<div class="breadcrumb clearfix">

			<?= $breadcrumb ?>

		</div>

		<!-- ./breadcrumb -->

		<!-- row -->

		<div class="row">

			<!-- Left colunm -->

			<div class="column col-xs-12 col-sm-3" id="left_column">

				<!-- Blog category -->

				<?= $this -> load -> view('guest/includes/sidebar_cate') ?>

				<!-- ./blog category  -->

			</div>

			<!-- ./left colunm -->

			<!-- Center colunm-->

			<div class="center_column col-xs-12 col-sm-9" id="center_column">

				<?php if($this->session->flashdata('message')){ ?>

					<div class="alert alert-success">

						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

						<strong>Thông báo: </strong> <?= $this->session->flashdata('message'); ?>

					</div>

				<?php } ?>

				<h2>TÀI KHOẢN</h2>



				<div class="vc_column-inner ">

					<div class="wpb_wrapper">

						<div class="woocommerce">

							<p class="myaccount_user">Xin chào <strong><?= $this->session->userdata('account') ?></strong> (không phải <?= $this->session->userdata('account') ?>? <a href="<?= base_url('log-out') ?>">Đăng xuất</a>). Từ trang quản lý tài khoản, bạn có thể xem các đơn đặt hàng gần nhất, quản lý địa chỉ thanh toán, nhận hàng và <a href="<?= base_url('edit-account') ?>">thay đổi thông tin tài khoản cùng mật khẩu</a>.</p>



							<h2>Địa chỉ của tôi</h2>

							<p class="myaccount_address">

								Các địa chỉ bên dưới mặc định sẽ được sử dụng ở trang thanh toán sản phẩm.</p>

							<div class="col-1 address">

								<header class="title">

									<h3>Địa chỉ thanh toán</h3>

									<?php if ($user->address) { ?>
										<textarea class="input form-control" readonly><?= $user->address ?></textarea>
									<?php }else{ ?>
										<address>Bạn vẫn chưa thêm địa chỉ nào.</address><a href="<?= base_url('edit-account') ?>" class="edit">Sửa</a>
									<?php } ?>

								</header>

							</div>
							<br>
							<a href="<?= base_url('edit-account')?>" type="button" class="btn btn-default">Quản lý tài khoản</a>
							<a href="<?= base_url('manager-order')?>" type="button" class="btn btn-default">Quản lý hóa đơn</a>

						</div>

					</div>

				</div>



			</div>

			<!-- ./ Center colunm -->

		</div>

		<!-- ./row-->

	</div>

</div>



<!-- Footer -->

<?= $this->load->view('guest/includes/footer') ?>

</body>

</html>