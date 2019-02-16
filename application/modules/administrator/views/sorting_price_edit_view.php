<div class="grid_12">
    <form method="post" action="<?= current_url();?>" name="form-edit" id="form-edit" accept-charset="utf-8">
        <div class="header-content">Cập nhật diện tích</div>
        <div class="clear"></div>
        <div class="command">
            <span><a href="<?= base_url()?>administrator/sorting/price">Quay lại danh sách</a></span>
            <span><a onclick="showconfirm('','Xác thực lưu thông tin','Bạn muốn lưu lại thông tin này?','save');">Lưu</a></span>

            <span><a href="<?= base_url()?>administrator/sorting/price/add">Thêm mới</a></span>
        </div>
        <div id="tabs">
            <ul>
                <li>
                    <a href="#tabs-1">Thông tin chi tiết</a>
                </li>
                <li>

                    <a href="#tabs-2">Thông tin khác</a>

                </li>
            </ul>
            <div id="tabs-1">
                <table class="admintable" width="100%">
                    <tbody>
                        <tr>
                            <td style="height: 5px;"></td>
                        </tr>
                        <tr>
                            <td class="key" style="width: 150px;">
                                <span class="Required">*</span>
                                &nbsp;Tên danh mục
                            </td>
                            <td>
                                <?php echo form_error('cateTitle'); ?>
                                <input type="hidden" value="<?= $category['SortingPriceID']?>" id="cateID">
                                <input name="cateTitle" type="text" value="<?= $category['Title']?>" maxlength="500" id="cateTitle" class="TextInput" style="width:400px;" onchange="checkTitle(this);">    
                                <span class="tooltip">
                                    <span class="tooltipContent">
                                        <p class="tooltiptitle">Tên danh mục</p>
                                        <p class="tooltipmessage">Nhập tên của danh mục</p>
                                    </span>
                                </span>
                            </td>
                        </tr>

                        <!-- <tr>
                            <td class="key" style="width: 150px;">
                                <span class="Required">*</span>
                                &nbsp;Tên danh mục tiếng Anh
                            </td>
                            <td>
                                <?php echo form_error('cateTitle_en'); ?>
                                <input name="cateTitle_en" type="text" value="<?php echo set_value('cateTitle_en'); ?>" maxlength="500" id="cateTitle" class="TextInput" style="width:400px;">    
                                <span class="tooltip">
                                    <span class="tooltipContent">
                                        <p class="tooltiptitle">Tên danh mục</p>
                                        <p class="tooltipmessage">Nhập tên của danh mục</p>
                                    </span>
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <td class="key" style="width: 150px;">
                                <span class="Required">*</span>
                                &nbsp;Tên danh mục tiếng Pháp
                            </td>
                            <td>
                                <?php echo form_error('cateTitle_fr'); ?>
                                <input name="cateTitle_fr" type="text" value="<?php echo set_value('cateTitle_fr'); ?>" maxlength="500" id="cateTitle" class="TextInput" style="width:400px;">    
                                <span class="tooltip">
                                    <span class="tooltipContent">
                                        <p class="tooltiptitle">Tên danh mục</p>
                                        <p class="tooltipmessage">Nhập tên của danh mục</p>
                                    </span>
                                </span>
                            </td>
                        </tr> -->
                        
                        <!-- <tr>
                            <td class="key">
                                &nbsp;Danh mục cha
                            </td>
                            <td>
                                <select size="10" name="cateParentID" id="cateParentID" style="width:400px;">
                                    <option value="0">Gốc</option>
                                    <?php foreach ($categories as $key) :?>
                                        <option value="<?= $key['SortingPriceID']?>"><?= $key['Title']?></option>
                                    <?php endforeach;?>
                                </select>
                                <span class="tooltip">
                                    <span class="tooltipContent">
                                        <p class="tooltiptitle">Danh mục cha</p>
                                        <p class="tooltipmessage">Lưa chọn danh mục cha</p>
                                    </span>
                                </span>
                            </td>
                        </tr> -->
                        
                        <tr>
                            <td class="key">Hiển thị</td>
                            <td>
                                <select name="catePublish" id="catePublish">
                                    <option selected="selected" value="1">Có</option>

                                    <option <?php if(!$category['Publish']) echo 'selected="selected"';?> value="0">Không</option>
                                </select>
                                <span class="tooltip">
                                    <span class="tooltipContent">
                                        <p class="tooltiptitle">Hiển thị danh mục</p>
                                        <p class="tooltipmessage">Lựa chọn để hiển thị danh mục ngoài website.</p>
                                    </span>
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <td class="key">Thứ tự hiển thị</td>
                            <td>
                                <input name="cateOrders" type="text" value="<?= $category['Orders']?>" id="cateOrders" style="width:40px;">    
                                <span class="tooltip">
                                    <span class="tooltipContent">
                                        <p class="tooltiptitle">Thứ tự hiển thị danh mục</p>
                                        <p class="tooltipmessage">Thứ tự hiển thị của danh mục</p>
                                    </span>
                                </span>
                            </td>
                        </tr>

                        <!-- <tr>
                            <td class="key"><span class="Required">*</span>
                                &nbsp;Ảnh đại diện
                                <span class="recommend-res">(Kích thước khuyến nghị ...)</span>
                            </td>
                            <td>
                                <table id="tblUpload" cellspacing="0" cellpadding="0" width="100%">
                                    <tbody>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img id="img_upload" src="">
                                                <input type="hidden" name="cateImagesURL" id="ImagesURL" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="file" name="userfile" id="userfile" size="20" />
                                                <a onclick="showconfirm('','Xác thực Upload ảnh','Bạn muốn upload hình ảnh này?','uploadimg');" class="linkbtn">Upload</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr> -->
                        <tr>
                            <td class="key" style="width: 150px;">
                                Tiêu đề trang
                            </td>
                            <td>
                                <input name="catePageTitle" type="text" maxlength="500" value="<?= $category['SEOTitle']?>" id="txtPageTitle" style="width:400px;">
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
                                <input name="cateMetaKeywords" type="text" value="<?= $category['SEOKeyword']?>" id="txtMetaKeywords" style="width:400px;">
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
                            <td class="key">Thẻ mô tả</td>
                            <td>
                                <textarea rows="2" cols="20" style="height:96px;width:400px;" name="cateMetaDesc"><?= $category['SEODescription']?></textarea>
                            </td>
                        </tr>
                        <!-- <tr>
                            <td class="key">Nội dung</td>
                            <td>
                                <textarea name="cateBody"></textarea>
                                <script>
                                    CKEDITOR.replace( 'cateBody');
                                </script>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <div id="tabs-2">

                <table class="admintable" width="100%">

                    <tbody>

                        <tr>

                            <td style="height: 5px;"></td>

                        </tr>

                        <!-- <tr>

                            <td class="key">Tùy chọn</td>

                            <td>

                                <input id="cateIsTop" type="checkbox" <?php if($category['IsTop'] == 1) echo "checked";?> name="cateIsTop" >

                                <label for="cateIsTop">Tiêu biểu</label>

                            </td>

                        </tr> -->



                        <tr>

                            <td class="key">Người khởi tạo</td>

                            <td><span class="lbl-key"><?php if($category['CreatedBy'] =='') echo '<span class="lbl-key-nan">Không xác định</span>'; else echo '<span class="lbl-key">'.$category['CreatedBy'].'</span>';?></span>

                                <span class="tooltip">

                                    <span class="tooltipContent">

                                        <p class="tooltiptitle">Người khởi tạo</p>

                                        <p class="tooltipmessage">Tên tài khoản của người đã tạo ra danh mục này</p>

                                    </span>

                                </span>

                            </td>

                        </tr>

                        <tr>

                            <td class="key">Ngày khởi tạo</td>

                            <td><span class="lbl-key"><?= $category['CreatedDate']?></span>

                                <span class="tooltip">

                                    <span class="tooltipContent">

                                        <p class="tooltiptitle">Ngày khởi tạo</p>

                                        <p class="tooltipmessage">Ngày giờ danh mục được khởi tạo</p>

                                    </span>

                                </span>

                            </td>

                        </tr>

                        <tr>

                            <td class="key">Người đã chỉnh sửa</td>

                            <td><?php if($category['ModifiedBy'] =='') echo '<span class="lbl-key">Không xác định</span>'; else echo '<span class="lbl-key">'.$category['ModifiedBy'].'</span>';?>

                                <span class="tooltip">

                                    <span class="tooltipContent">

                                        <p class="tooltiptitle">Người chỉnh sửa</p>

                                        <p class="tooltipmessage">Tên tài khoản của người đã chỉnh sửa danh mục này</p>

                                    </span>

                                </span>

                            </td>

                        </tr>

                        <tr>

                            <td class="key">Ngày chỉnh sửa</td>

                            <td><?php if($category['ModifiedDate'] =='') echo '<span class="lbl-key-nan">Chưa từng sửa</span>'; else echo '<span class="lbl-key">'.$category['ModifiedDate'].'</span>';?>

                                <span class="tooltip">

                                    <span class="tooltipContent">

                                        <p class="tooltiptitle">Ngày chỉnh sửa</p>

                                        <p class="tooltipmessage">Ngày giờ dah mục được chỉnh sửa</p>

                                    </span>

                                </span>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>
        </div>
        <div class="command">
            <span><a href="<?= base_url()?>administrator/sorting/price">Quay lại danh sách</a></span>
            <span><a onclick="showconfirm('','Xác thực lưu thông tin','Bạn muốn lưu lại thông tin này?','save');">Lưu</a></span>

            <span><a href="<?= base_url()?>administrator/sorting/price/add">Thêm mới</a></span>
        </div>
    </form>
</div>
<script type="text/javascript">
 //<![CDATA[
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
                        if(action == 'delete') {
                            delete_image(id);
                        }else if(action == 'save') {
                            submitform();
                        }
                        $('body').css('overflow','auto');
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

//]]>
</script>
<script type="text/javascript">
    function scrollToError(yeah) {
        $('html, body').animate({scrollTop:$('#'+yeah).offset().top - 50}, 'slow');
    }

    function submitform() {
        $("#form-edit").submit();
    }

    function checkTitle(element) {
        var title = $("#cateTitle").val();
        $.ajax({
            type: "POST",
            url: "<?= base_url()?>ajaxhandle/sorting_price_ajaxhandler/Check_Title",
            data: { title: title},
            dataType: "json",
            success: function(data) {
                if(data == 0) {
                    notice('Tiêu đề chưa tồn tại và có thể sử dụng.');
                }else if(data == 1) {
                    element.defaultValue = title;
                    notice('Tiêu đề đã tồn tại ! Vui lòng đổi lại tiêu đề khác.');
                }else {
                    notice(data.msg);
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                notice("Error status : "+textStatus+"<br/>Error code : "+XMLHttpRequest.status+"<br/>Error thrown : "+errorThrown);
            }
        });
    }
    $('form').submit(function() {
        $(".error").remove();
        var idElementError = "";
        var hasError = false;
        // var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        // var catePriceFrom = $("#catePriceFrom").val();
        // if(isNaN(catePriceFrom)) {
        //     $("#catePriceFrom").before('<span class="error Required">Diện tích trị phải là các chữ số</span>');
        //     hasError = true;
        //     if (idElementError == "") idElementError = "catePriceFrom";
        // }

        // var catePriceTo = $("#catePriceTo").val();
        // if(isNaN(catePriceTo)) {
        //     $("#catePriceTo").before('<span class="error Required">Diện tích trị phải là các chữ số</span>');
        //     hasError = true;
        //     if (idElementError == "") idElementError = "catePriceTo";
        // }
        // if(parseFloat(catePriceFrom) > parseFloat(catePriceTo)){
        //     $("#catePriceTo").before('<span class="error Required">Diện tích từ phải nhỏ hơn Diện tích đến</span>');
        //     hasError = true;
        //     if (idElementError == "") idElementError = "catePriceTo";
        // }

        if(hasError == false) {
            return true;
        }

        var index = $('#tabs a[href="#tabs-1"]').parent().index(); $('#tabs').tabs('select', index);

        scrollToError(idElementError);

        return false;
    });
</script>