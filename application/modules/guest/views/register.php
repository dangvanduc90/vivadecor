<!DOCTYPE html>

<html>

<head>

	<?= $this -> load -> view('guest/includes/head') ?>

	<style type="text/css">

		/*form dang ky thanh vien*/

		form.register {

			border: 1px solid #d3ced2;

			padding: 20px;

			margin: 2em 0;

			text-align: left;

			border-radius: 5px;

		}

		form.register p.form-row {

			padding: 3px;

			margin: 0 0 6px;

		}

		form.register .form-row label {

			line-height: 2;

		}

		form.register .form-row input.input-text, form.register .form-row textarea {

			box-sizing: border-box;

			width: 100%;

			margin: 0;

			outline: 0;

			line-height: 1;

		}

		form.register .form-row .required {

			color: red;

			font-weight: 700;

			border: 0;

		}



		form.register .form-row input.input-text, form.register .form-row textarea {

		    box-sizing: border-box;

		    width: 100%;

		    margin: 0;

		    outline: 0;

		    line-height: 1;

		}

		form.register input {

		    height: 44px;

		    font-size: 16px;

		    width: 100%;

		    margin-bottom: 10px;

		    -webkit-appearance: none;

		    background: #fff;

		    border: 1px solid #d9d9d9;

		    border-top: 1px solid #c0c0c0;

		    border-radius: 2px;

		    padding: 0 8px;

		    box-sizing: border-box;

		    -moz-box-sizing: border-box;

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

				<h2>Đăng ký</h2>

				<form action="<?= base_url('my-account')?>" method="post" class="register" onsubmit="return validateFrm()" name="form_register">



					<p class="form-row form-row-wide">

						<label for="reg_username">Tên đăng nhập <span class="required">*</span></label>

						<input type="text" class="input-text" name="username" id="reg_username" value="" required>
						<?php echo form_error('username'); ?>

					</p>

					<p class="form-row form-row-wide">

						<label for="reg_email">Địa chỉ email <span class="required">*</span></label>

						<input type="email" class="input-text" name="email" id="reg_email" value="" required>
						<?php echo form_error('email'); ?>

					</p>
					
					<p class="form-row form-row-wide">

						<label for="reg_phone">Số điện thoại <span class="required">*</span></label>

						<input type="text" class="input-text" name="phone" id="reg_phone" value="" required>
						<?php echo form_error('phone'); ?>

					</p>
					
					<p class="form-row form-row-wide">

						<label for="reg_FirstName">Họ <span class="required">*</span></label>

						<input type="text" class="input-text" name="FirstName" id="reg_FirstName" value="" required>
						<?php echo form_error('FirstName'); ?>

					</p>
					
					<p class="form-row form-row-wide">

						<label for="reg_LastName">Tên <span class="required">*</span></label>

						<input type="text" class="input-text" name="LastName" id="reg_LastName" value="" required>
						<?php echo form_error('LastName'); ?>

					</p>

					<p class="form-row form-row-wide">

						<label for="reg_password">Mật khẩu <span class="required">*</span></label>

						<input type="password" class="input-text" name="password" id="reg_password" required>
						<?php echo form_error('password'); ?>

					</p>

					<p class="form-row form-row-wide">

						<label for="reg_password">Địa chỉ <span class="required"></span></label>

						<textarea name="address" class="form-control" rows="3"></textarea>
					</p>

					<!-- Spam Trap -->

					<div style="left: -999em; position: absolute;">

						<label for="trap">Chống Spam</label>

						<input type="text" name="email_2" id="trap" tabindex="-1">

					</div>									

					<p class="form-row">

						<input type="hidden" id="_wpnonce" name="_wpnonce" value="68602dd014">

						<input type="hidden" name="_wp_http_referer" value="/my-account/">

						<input type="submit" class="button" name="register" value="Đăng ký">

					</p>

					

				</form>



			</div>

			<!-- ./ Center colunm -->

		</div>

		<!-- ./row-->

	</div>

</div>



<!-- Footer -->

<?= $this->load->view('guest/includes/footer') ?>

<script type="text/javascript">
	function validateFrm(){
		var email = document.form_register.email.value;
		var atpos = email.indexOf("@");
		var dotpos = email.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
			alert("Email không đúng định dạng");
			return false;
		}
		var password = document.form_register.password.value;
		if (password == "") {
			alert("Mật khẩu không được để trống");
			return false;
		}
		return true;
	}
	$("#edit-cancel").click(function(){
		window.location.href = "<?= base_url('cart') ?>";
	});
</script>

</body>

</html>