<div class="grid_12">
	<form method="post" action="<?= current_url();?>/save" name="form-edit" id="form-edit" accept-charset="utf-8">
	<div class="header-content">Tối ưu hóa SEO</div>
		<div class="clear"></div>
		<div class="command">
			<span><a onclick="showconfirm('','Xác thực lưu thông tin','Bạn muốn lưu lại thông tin này?','save');">Lưu</a></span>
			<span><a href="<?= base_url()?>administrator/seolink/add">Thêm mới</a></span>
		</div>
			<?php if ($seolinks) { ?>
				<table class="table-view" width="100%">
					<thead>
						<th>#</th>
						<th>Tiêu đề</th>
						<th>Link</th>
						<th></th>
					</thead>
					<tbody>
					<?php foreach ($seolinks as $key => $seolink) {$key++; ?>
						<tr>
							<td style="height: 5px;text-align: center;"><?php echo $key; ?>
							</td>
							<td style="text-align: center;">
								<?= $seolink['Title']?>
							</td>
							<td style="text-align: center;">
								<?= $seolink['Link']?>
							</td>
							<td align="center" style="width:120px;text-align:center;"><a href="javascript:void(0);" onclick="showconfirm(<?= $seolink['SeoLinkID']?>,'Xác thực xóa seo link','Bạn có chắc muốn xóa seo link?','delete');">xóa</a></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			<?php }else{ ?>
				<p>Không có seo link nào</p>
			<?php } ?>
		<div class="command">
			<span><a onclick="showconfirm('','Xác thực lưu thông tin','Bạn muốn lưu lại thông tin này?','save');">Lưu</a></span>
			<span><a href="<?= base_url()?>administrator/seolink/add">Thêm mới</a></span>
		</div>
	</form>
</div>

<script type="text/javascript">
   function showconfirm(id,title,message,action){
		//var elem = $(this).closest('.item');
		$('body').css('overflow','hidden');
		$.confirm({
			'title'     : title,
			'message'   : message,
			'buttons'   : {
				'Yes'   : {
					'class' : 'blue',
					'action': function(){
						if(action == 'save') {
							submitform();
							$('body').css('overflow','auto');
						}else if(action == 'delete'){
							Delete_Seo_Link(id);
							$('body').css('overflow','auto');
						}
					}
				},
				'No'    : {
					'class' : 'gray',
					'action': function(){
						// if(action == 'delete' || action == 'update' || action == 'uploadimg') {
						//     $('body').css('overflow','auto');
						// }
						$('body').css('overflow','auto');
					}
				}
			}
		});
	}

	function scrollToError(yeah) {
		$('html, body').animate({scrollTop:$('#'+yeah).offset().top - 50}, 'slow');
	}

	function submitform() {
		$("#form-edit").submit();
	}

	$('form').submit(function() {
		return true;
	});

	function Delete_Seo_Link(id) {
		$.ajax( {
			type: "POST",
			url: "<?= base_url()?>ajaxhandle/admin_ajaxhandler/Delete_Seo_Link",
			data: { id: id},
			dataType: "json",
			success: function(data) {
				if(data == 0){
				  notice('Có lỗi, vui lòng thử lại sau!');
				}else if(data == 1) {
				  notice('Xóa seolink thành công!');
				  $('#menu'+id).fadeOut(400);
				}else {
				  notice(data.msg);
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				notice("Error status : "+textStatus+"<br/>Error code : "+XMLHttpRequest.status+"<br/>Error thrown : "+errorThrown);
			}
		});
	}

</script>