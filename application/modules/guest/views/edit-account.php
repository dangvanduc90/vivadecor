<!DOCTYPE html>

<html>

<head>

	<?= $this -> load -> view('guest/includes/head') ?>

	<style type="text/css">

		fieldset {

			padding: .35em .625em .75em;

			margin: 0 2px;

			border: 1px solid silver;

		}

	</style>

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

				<div class="vc_column-inner ">

					<div class="wpb_wrapper">

						<div class="woocommerce">

							<form action="<?= base_url('edit-account') ?>" method="POST" class="form-horizontal">

								<fieldset>

									<legend>Thông tin tài khoản</legend>

									<div class="form-group">

										<label class="col-sm-2 col-sm-2 control-label">Tên đăng nhập</label>

										<div class="col-sm-10">

											<input type="text" name="username" class="form-control" value="<?= $user->username ?>" />

											<span class="help-block"></span>

										</div>

									</div>

									<div class="form-group">

										<label class="col-sm-2 col-sm-2 control-label">Email</label>

										<div class="col-sm-10">

											<input type="text" name="email" class="form-control" value="<?= $user->email ?>" />

											<span class="help-block"></span>

										</div>

									</div>

									<div class="form-group">

										<label class="col-sm-2 col-sm-2 control-label">Số điện thoại</label>

										<div class="col-sm-10">

											<input type="text" name="phone" class="form-control" value="<?= $user->phone ?>" />

											<span class="help-block"></span>

										</div>

									</div>


									<div class="form-group">

										<label class="col-sm-2 col-sm-2 control-label">Họ</label>

										<div class="col-sm-10">

											<input type="text" name="FirstName" class="form-control" value="<?= $user->FirstName ?>" />

											<span class="help-block"></span>

										</div>

									</div>


									<div class="form-group">

										<label class="col-sm-2 col-sm-2 control-label">Tên</label>

										<div class="col-sm-10">

											<input type="text" name="LastName" class="form-control" value="<?= $user->LastName ?>" />

											<span class="help-block"></span>

										</div>

									</div>

									<div class="form-group">

										<label class="col-sm-2 col-sm-2 control-label">Địa chỉ</label>

										<div class="col-sm-10">

											<textarea name="address" id="inputAddress" class="form-control" rows="3"><?= $user->address ?></textarea>

											<span class="help-block"></span>

										</div>

									</div>

									<div class="form-group">

										<label class="col-sm-2 col-sm-2 control-label">Ngày đăng ký</label>

										<div class="col-sm-10">

											<input type="text" name="created" readonly class="form-control" 

											value="<?= date('d-m-Y', strtotime($user->created)) ?>" />

											<span class="help-block"></span>

										</div>

									</div>

									<div class="form-group">

										<label class="col-sm-2 col-sm-2 control-label"></label>

										<div class="col-sm-10">

											<button type="submit" class="btn btn-primary">Cập nhật</button>

										</div>

									</div>

								</fieldset>

							</form>

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