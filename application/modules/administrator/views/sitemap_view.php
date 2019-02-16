<div class="grid_12">

	<form method="post" action="<?= current_url();?>/save" name="form-edit" id="form-edit" accept-charset="utf-8">

		<div class="header-content">Tạo SiteMap</div>

		<div class="clear"></div>

		<div class="command">
		</div>

		<div id="tabs">

			<ul>

				<li>

					<a href="#tabs-1">Tạo SiteMap</a>

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

								Sitemap_index.xml

							</td>

							<td>

								<p><?= $sitemap_index_result ? '<a href="'.base_url().'sitemap_index.xml">Tạo sitemap_index.xml thành công</a>' : "Tạo sitemap_index.xml thất bại" ?></p>

							</td>

						</tr>

						<tr>

							<td class="key" style="width: 150px;">

								Sitemap_category.xml

							</td>

							<td>

								<p><?= $sitemap_category_result ? '<a href="'.base_url().'sitemap_category.xml">Tạo Sitemap_category.xml thành công</a>' : "Tạo Sitemap_category.xml thất bại" ?></p>

							</td>

						</tr>

						<tr>

							<td class="key" style="width: 150px;">

								Sitemap_product.xml
							</td>

							<td>

								<p><?= $sitemap_product_result ? '<a href="'.base_url().'sitemap_product.xml">Tạo Sitemap_product.xml thành công</a>' : "Tạo Sitemap_product.xml thất bại" ?></p>

							</td>

						</tr>

						<tr>

							<td class="key" style="width: 150px;">

								Sitemap_news.xml
							</td>

							<td>

								<p><?= $sitemap_news_result ? '<a href="'.base_url().'sitemap_news.xml">Tạo Sitemap_news.xml thành công</a>' : "Tạo Sitemap_news.xml thất bại" ?></p>

							</td>

						</tr>
						
						<tr>

							<td class="key" style="width: 150px;">

								Sitemap_image.xml
							</td>

							<td>

								<p><?= $sitemap_image_result ? '<a href="'.base_url().'sitemap_image.xml">Tạo Sitemap_image.xml thành công</a>' : "Tạo Sitemap_image.xml thất bại" ?></p>

							</td>

						</tr>

					</tbody></table>

				</div>

			</div>

		</div>

		<div class="command">

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