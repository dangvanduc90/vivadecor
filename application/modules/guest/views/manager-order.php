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

							<form action="<?= base_url('manager-order') ?>" method="POST" class="form-horizontal">

								<?php foreach ($orders as $key => $item_orders) {$key++; ?>
								<fieldset>

									<legend>Thông tin hóa đơn số <?= $key ?></legend>
									
										<div class="form-group">

											<label class="col-sm-2 col-sm-2 control-label">Số hóa đơn</label>

											<div class="col-sm-10">

												<input type="text" name="username" class="form-control" value="<?= $item_orders->OrdersID ?>" readonly />

												<span class="help-block"></span>

											</div>

										</div>

										<div class="form-group">

											<label class="col-sm-2 col-sm-2 control-label">Ghi chú về đơn hàng</label>

											<div class="col-sm-10">

												<textarea name="" id="input" class="form-control" rows="3" readonly><?= $item_orders->Notes ?></textarea>

												<span class="help-block"></span>

											</div>

										</div>

										<div class="form-group">

											<label class="col-sm-2 col-sm-2 control-label">Ngày mua hàng</label>

											<div class="col-sm-10">

												<input type="text" name="phone" class="form-control" value="<?= date("d/m/Y H:i:S", strtotime($item_orders->CreatedDate)) ?>" readonly />

												<span class="help-block"></span>

											</div>

										</div>

										<div class="form-group">

											<label class="col-sm-2 col-sm-2 control-label">Trạng thái đơn hàng</label>

											<div class="col-sm-10">

												<input type="text" name="FirstName" class="form-control" value="<?= $item_orders->Status ?>" readonly />

												<span class="help-block"></span>

											</div>

										</div>

										<table class="table table-hover table-bordered">
											<thead>
												<tr>
													<th>Tên sản phẩm</th>
													<th>Số lượng</th>
													<th>Giá</th>
												</tr>
											</thead>
											<tbody>

												<?php foreach ($item_orders->products as $item) { ?>
												<tr>
													<td><?= $item->Title ?></td>
													<td><?= $item->Quantity ?></td>
													<td><?= number_format($item->Price, 0, ".", ",")." VNĐ" ?></td>
												</tr>
												<?php } ?>

											</tbody>
										</table>

								</fieldset>
								<br>
								<?php } ?>

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