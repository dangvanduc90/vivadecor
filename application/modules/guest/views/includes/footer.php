<footer>
	
	<div class="footer-bottom">

		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="tab-footer items hidden-xs">

						<ul class="tab items">

						<?php if ($footers) {

							foreach ($footers as $key => $value) {

								echo $key == 0 ? "<li class=\"active\"><h4>".$value['Title']."</h4></li>" : "<li><h4>".$value['Title']."</h4></li>";

							}

						} ?>

						</ul>

						<div class="quick-main">

							<?php if ($footers) {

								foreach ($footers as $key => $value) {

									echo '<div class="menu-item view-row">';

									echo $value['Body'];

									echo '</div>';

								}

							} ?>

						</div>

					</div>
					<?php if ($footers) {
					foreach ($footers as $key => $value) { ?>
					<div class="col-xs-12 hidden-sm hidden-md hidden-lg">
						<div class="introduce-title">
							<b><?= $value['Title']; ?></b>
						</div>
						<div class="introduce-body">
							<?= $value['Body']; ?>
						</div>
					</div>
					<?php } } ?>
				</div>
			</div>

		</div>

		<div class="container">
			<div class="row">
				<div class="col-xs-12">

					<div class="hinh-thuc-thanh-toan">

						<a rel="nofollow" target="_blank" title="Phương thức thanh toán" href="<?= base_url('phuong-thuc-thanh-toan').'.html'; ?>"><img src="<?= base_url() ?>resources/ui_images/thanh-toan.png" title="Phương thức thanh toán" alt="Phương thức thanh toán" />

						</a>

					</div>

					<!--<a class="dang-ky-thuong-mai-dien-tu" href=""><span class="icon"></span></a>-->

					<div class="backlink">

						<p class="text-center">

							<span>NỘI THẤT VIVADECOR là một thương hiệu trực thuộc Công ty CP Tư vấn và đầu tư xây dựng số 36 (CIC36).</span>
							<!-- <span>Giấy chứng nhận Đăng ký Kinh doanh số 0106547466 do Sở Kế hoạch và Đầu tư Tp.Hà Nội cấp.</span> -->
							<!-- <a href="http://online.gov.vn/CustomWebsiteDisplay.aspx?DocId=6519" rel="nofollow" target="_blank"><img alt="" src="<?= base_url() ?>resources/ui_images/da-dang-ky-bo-cong-thuong.png" style="float:right; height:57px; width:150px" /></a> -->

						</p>

						<hr />

					</div>

				</div>
			</div>
		</div>

	</div>

</footer>

<script type="text/javascript">

	function ajaxSubscribe(){

		var email = document.getElementById("edit-email").value;

		var fullname = document.getElementById("edit-fullname").value;

		var phone = document.getElementById("edit-phone").value;

		var message = document.getElementById("edit-message").value;

		

		if(document.getElementById("edit-nid")){

			var productid = document.getElementById("edit-nid").value;

		}else 

		    var productid = 0;

		var gender = $("input[name='gender']:checked").val();

		var atpos = email.indexOf("@");

		var dotpos = email.lastIndexOf(".");

		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {

			alert("Email không đúng định dạng");

			return false;

		}

		$.ajax({

			url: "<?= base_url() ?>ajaxhandle/client_ajaxhandler/insertSubscribe",

			type: "post",

			data:{email: email, fullname:fullname, phone:phone, message:message, gender:gender, productid: productid},

			dataType: "json",

			success: function(data){

				alert("Đăng ký nhận tin thành công");

				document.getElementById("edit-email").value = "";

				document.getElementById("edit-fullname").value = "";

				document.getElementById("edit-phone").value = "";

				document.getElementById("edit-message").value = "";

			},

			error: function(data){

				console.log(data);

				alert("Đăng ký nhận tin thất bại");

			}

		});

		return false;

	}

</script>