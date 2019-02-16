<div class="grid_12">
	<form method="post" action="<?= current_url();?>/save" name="form-edit" id="form-edit" accept-charset="utf-8">
		<div class="header-content">Tối ưu hóa SEO</div>
		<div class="clear"></div>
		<div class="command">
			<span><a onclick="showconfirm('','Xác thực lưu thông tin','Bạn muốn lưu lại thông tin này?','save');">Lưu</a></span>
		</div>
		<div id="tabs">
			<ul>
				<li>
					<a href="#tabs-1">Cấu hình SEO</a>
				</li>
			</ul>
			<div id="tabs-1" >
				<div id="Div1">
					<table class="admintable" width="100%">
						<tbody><tr>
							<td style="height: 5px;">
							</td>
						</tr>
						<tr>
							<td class="key" style="width: 150px;">
								Tiêu đề trang
							</td>
							<td>
								<input name="seoPageTitle" type="text" maxlength="500" value="<?= $seo['SEOTitle']?>" id="txtPageTitle" style="width:400px;">
								<span class="tooltip"><span class="tooltipContent">
									<p class="tooltiptitle">
										Tiêu đề trang</p>
									<p class="tooltipmessage">
										Nội dung được hiển thị dưới dạng tiêu đề trong kết quả tìm kiếm và trên trình duyệt của người dùng.
									</p>
								</span></span>
							</td>
						</tr>
						<tr>
							<td class="key">
								Thẻ từ khóa
							</td>
							<td>
								<input name="seoMetaKeywords" type="text" value="<?= $seo['SEOKeyword']?>" id="txtMetaKeywords" style="width:400px;">
								<span class="tooltip"><span class="tooltipContent">
									<p class="tooltiptitle">
										Thẻ từ khóa</p>
									<p class="tooltipmessage">
										Mô tả các từ khóa chính của website
									</p>
								</span></span>
							</td>
						</tr>
						<tr>
							<td class="key">
								Thẻ mô tả
							</td>
							<td>
								<textarea name="seoMetaDesc" id="txtMetaDesc" rows="5" style="width:400px;"><?= $seo['SEODescription']?></textarea>
								<span class="tooltip"><span class="tooltipContent">
									<p class="tooltiptitle">
										Thẻ mô tả</p>
									<p class="tooltipmessage">
										Cung cấp một mô tả ngắn của trang. Trong vài trường hợp, mô tả này được sử dụng như một phần của đoạn trích được hiển thị trong kết quả tìm kiếm.
									</p>
								</span></span>
							</td>
						</tr>

						<tr>
							<td class="key" style="width: 150px;">
								Tiêu đề trang tìm kiếm
                                <span class="recommend-res">Sử dụng [keyword] là từ khóa tìm kiếm</span>
							</td>
							<td>
								<input name="seoPageTitleSearch" type="text" maxlength="500" value="<?= $seo['SEOTitleSearch']?>" id="txtPageTitle" style="width:400px;">
								<span class="tooltip"><span class="tooltipContent">
									<p class="tooltiptitle">
										Tiêu đề trang tìm kiếm</p>
									<p class="tooltipmessage">
										Nội dung được hiển thị dưới dạng tiêu đề trong kết quả tìm kiếm và trên trình duyệt của người dùng trong trang tìm kiếm.
									</p>
								</span></span>
							</td>
						</tr>
						<tr>
							<td class="key">
								Thẻ từ khóa trang tìm kiếm
                                <span class="recommend-res">Sử dụng [keyword] là từ khóa tìm kiếm</span>
							</td>
							<td>
								<input name="seoMetaKeywordsSearch" type="text" value="<?= $seo['SEOKeywordSearch']?>" id="txtMetaKeywords" style="width:400px;">
								<span class="tooltip"><span class="tooltipContent">
									<p class="tooltiptitle">
										Thẻ từ khóa trang tìm kiếm</p>
									<p class="tooltipmessage">
										Mô tả các từ khóa chính của trang tìm kiếm
									</p>
								</span></span>
							</td>
						</tr>
						<tr>
							<td class="key">
								Thẻ mô tả trang tìm kiếm
                                <span class="recommend-res">Sử dụng [keyword] là từ khóa tìm kiếm</span>
							</td>
							<td>
								<textarea name="seoMetaDescSearch" id="txtMetaDesc" rows="5" style="width:400px;"><?= $seo['SEODescriptionSearch']?></textarea>
								<span class="tooltip"><span class="tooltipContent">
									<p class="tooltiptitle">
										Thẻ mô tả trang tìm kiếm</p>
									<p class="tooltipmessage">
										Cung cấp một mô tả này được sử dụng như một phần của đoạn trích được hiển thị trong kết quả tìm kiếm.
									</p>
								</span></span>
							</td>
						</tr>

						<tr>
							<td class="key">
								Copyright
							</td>
							<td>
								<textarea name="Copyright" id="Copyright" rows="5" style="width:400px;"><?= $seo['Copyright']?></textarea>
								<span class="tooltip"><span class="tooltipContent">
									<p class="tooltiptitle">
										Copyright</p>
									<p class="tooltipmessage">
										Bản quyền
									</p>
								</span></span>
							</td>
						</tr>

						<tr>
							<td class="key">
								Slogan
							</td>
							<td>
								<textarea name="Slogan" id="Slogan" rows="5" style="width:400px;"><?= $seo['Slogan']?></textarea>
								<span class="tooltip"><span class="tooltipContent">
									<p class="tooltiptitle">
										Slogan</p>
									<p class="tooltipmessage">
										Slogan
									</p>
								</span></span>
							</td>
						</tr>

						<tr>
							<td class="key">
								Tên công ty
							</td>
							<td>
								<textarea name="CompanyName" id="CompanyName" rows="5" style="width:400px;"><?= $seo['CompanyName']?></textarea>
								<span class="tooltip"><span class="tooltipContent">
									<p class="tooltiptitle">
										Tên công ty</p>
									<p class="tooltipmessage">
										Tên công ty
									</p>
								</span></span>
							</td>
						</tr>

						<tr>
							<td class="key">
								Facebook
							</td>
							<td>
								<input name="Facebook" type="text" value="<?= $seo['Facebook']?>" id="txtMetaKeywords" style="width:400px;">
								<span class="tooltip"><span class="tooltipContent">
									<p class="tooltiptitle">
										Facebook</p>
									<p class="tooltipmessage">
										Link Facebook
									</p>
								</span></span>
							</td>
						</tr>

						<tr>
							<td class="key">
								Instagram
							</td>
							<td>
								<input name="Instagram" type="text" value="<?= $seo['Instagram']?>" id="txtMetaKeywords" style="width:400px;">
								<span class="tooltip"><span class="tooltipContent">
									<p class="tooltiptitle">
										instagram</p>
									<p class="tooltipmessage">
										Link instagram
									</p>
								</span></span>
							</td>
						</tr>

						<tr>
							<td class="key">
								Linkedin
							</td>
							<td>
								<input name="Linkedin" type="text" value="<?= $seo['Linkedin']?>" id="txtMetaKeywords" style="width:400px;">
								<span class="tooltip"><span class="tooltipContent">
									<p class="tooltiptitle">
										Linkedin</p>
									<p class="tooltipmessage">
										Link Linkedin
									</p>
								</span></span>
							</td>
						</tr>

						<tr>
							<td class="key">
								Google+
							</td>
							<td>
								<input name="Google" type="text" value="<?= $seo['Google']?>" id="txtMetaKeywords" style="width:400px;">
								<span class="tooltip"><span class="tooltipContent">
									<p class="tooltiptitle">
										Google+</p>
									<p class="tooltipmessage">
										Link Google+
									</p>
								</span></span>
							</td>
						</tr>

					</tbody></table>
				</div>
			</div>
		</div>
		<div class="command">
			<span><a onclick="showconfirm('','Xác thực lưu thông tin','Bạn muốn lưu lại thông tin này?','save');">Lưu</a></span>
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
</script>