		<div class="sticky-container hidden-xs hidden-md">
		</div>
		<div class="sticky-buttons hidden-xs hidden-md">
			<!-- <a data-toggle="modal" data-target="#supportonlineModal">Hỗ trợ trực tuyến</a> -->
			<!-- <a data-toggle="modal" data-target="#hotlineModal">HOTLINE</a> -->
		</div>
		<!-- <div class="modal fade" id="hotlineModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">HOTLINE</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div id="modal_hotline_list">
								<?php foreach ($hotline as $hl) { ?>
									<div class="col-xs-4">
										<div class="hotline">
											<span class="phone"><?= $hl['Title'] ?></span>
											<span class="title"><?= $hl['Phone'] ?></span>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
					</div>
				</div>
			</div>
		</div> -->
		<div class="modal fade" id="supportonlineModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Hỗ trợ trực tuyến</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div id="modal_hotline_list">
								<?php foreach ($support_online as $so) { ?>
									<div class="col-xs-6 col-md-4">
										<div class="hotline">
											<?php if ($so['FullName']) {echo '<p class="title">'. $so['FullName'] .'</p>';} ?>
											<?php if ($so['Title']) {echo '<p>'. $so['Title'] .'</p>';} ?>
											<?php if ($so['Phone']) {echo '<p>Tel: '. $so['Phone'] .'</p>';} ?>
											<?php if ($so['Yahoo']) {echo '
												<a style="float:left" href="ymsgr:SendIM?'. $so['Yahoo'] .'">
		                                            <img border="0" align="absmiddle" src="http://opi.yahoo.com/online?u='. $so['Yahoo'] .'&amp;m=g&amp;t=2&amp;l=us">
		                                       </a>
											';} ?>
											<?php if ($so['Skype']) {echo '
												<a style="float:left" href="skype:'. $so['Skype'] .'?chat" class="icons skype"><i style="font-size:25px;margin-left:10px;" class="fa fa-skype"></i></a>
											';} ?>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="go_top" class="hidden-xs hidden-sm"><i class="fa fa-arrow-circle-up"></i></div>
		<div id="fixed-bottom" class="hidden-lg hidden-md">
			<div id="call-xs-sm"><a href="tel:<?= $hotline[0]['Phone'] ?>"><i class="fa fa-phone">&nbsp;&nbsp;</i>Gọi <?= $hotline[0]['Phone'] ?></a></div>
		</div>
		<?php if ($message) { ?>
            <div class="modal" id="alert-dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thông báo</h4>
                        </div>
                        <div class="modal-body">
                            <?php echo $message; ?>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" type="button" class="btn btn-primary">OK</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
            $(function() {
                $('#alert-dialog').modal('show').on('hidden.bs.modal');
            });
            </script>
        <?php } ?>