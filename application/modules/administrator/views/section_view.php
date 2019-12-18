<div class="grid_12">
    <div class="header-content">Quản lý section trang chủ</div>
    <div class="clear"></div>
    <div class="command">
        <span><a href="<?= base_url() ?>administrator/sections/add">Thêm mới</a></span>
    </div>
    <div class="clear"></div>
    <div class="wrap-main-body">
        <div>
            <form method="get" accept-charset="utf-8">
                <table border="0" width="100%" style="border-collapse: collapse; margin:5px 0px;">
                    <tbody>
                    <tr>
                        <td colspan="2">
                            <table class="SearchForm">
                                <tbody>
                                <tr>
                                    <td><b>Tiêu đề</b>
                                        <input name="key"
                                               value="<?php if ($this->input->get('key')) echo $this->input->get('key'); ?>"
                                               type="text" id="txtSearch" style="width:200px;">
                                        &nbsp;&nbsp;
                                    </td>
                                    <td>
                                        &nbsp;&nbsp;
                                        <a class="linkbtn" onclick="javascript:submit();">Tìm kiếm</a></td>
                                </tr>

                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:5px;"></td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="wrap-page-link">
            <div class="page-link"><?= $link ?></div>
        </div>
        <div style="padding:1px;">
            <table class="table-view">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tiêu đề</th>
                    <th>Thứ tự</th>
                    <th>Link</th>
                    <th>Hiển thị</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <?php if (count($sections_list) > 0) { ?>
                    <?php $i = 1;
                    foreach ($sections_list as $key) : ?>
                        <tr id="section<?= $key['id'] ?>">
                            <td align="center" style="width:20px;text-align:center;"><?= $i ?></td>
                            <td style="text-align:left;"><?= $key['Title'] ?></td>
                            <td style="text-align:left;"><?= $key['Link'] ?></td>
                            <td align="center" style="width:60px;text-align:center;"><input type="text"
                                                                                            id="txtOrders<?= $key['id'] ?>"
                                                                                            style="width: 60px; text-align:right;"
                                                                                            value="<?= $key['Orders'] ?>"
                                                                                            onchange="UpdateOrders(<?= $key['id'] ?>,this);"/>
                            </td>
                            <td align="center" style="width:60px;text-align:center;"><input type="checkbox" value="1"
                                                                                            id="cbIsVisible<?= $key['id'] ?>" <?php if ($key['Publish'] == 1) echo 'checked="checked"' ?>
                                                                                            onclick="UpdatePublishStatus(<?= $key['id'] ?>);"/>
                            </td>
                            <td align="center" style="width:120px;text-align:center;"><a
                                        href="<?= base_url() ?>administrator/sections/edit/<?= $key['id'] ?>">Chỉnh
                                    sửa</a> | <a href="javascript:void(0);"
                                                 onclick="showconfirm(<?= $key['id'] ?>,'Xác thực xóa section','Bạn có chắc muốn xóa section này?','delete');">xóa</a>
                            </td>
                        </tr>
                        <?php $i++; endforeach; ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="6">Chưa có section nào cả</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="wrap-page-link">
            <div class="page-link"><?= $link ?></div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="command">
        <span><a href="<?= base_url() ?>administrator/sections/add">Thêm mới</a></span>
    </div>
</div>

<script type="text/javascript">
    //<![CDATA[

    function showconfirm(id, title, message, action) {
        //var elem = $(this).closest('.item');
        $('body').css('overflow', 'hidden');
        $.confirm({
            'title': title,
            'message': message,
            'buttons': {
                'Yes': {
                    'class': 'blue',
                    'action': function () {
                        if (action == 'delete') {
                            Delete_section(id);
                            $('body').css('overflow', 'auto');
                        }
                    }
                },
                'No': {
                    'class': 'gray',
                    'action': function () {
                        $('body').css('overflow', 'auto');
                    }
                }
            }
        });
    }

    function UpdatePublishStatus(id) {
        var Publish;
        if ($("#cbIsVisible" + id).attr('checked')) {
            Publish = 1;
        } else {
            Publish = 0;
        }
        $.ajax({
            type: "POST",
            url: "<?= base_url()?>ajaxhandle/admin_ajaxhandler/Update_publish_section",
            data: {id: id, publish: Publish},
            dataType: "json",
            success: function (data) {
                if (data == 0) {
                    notice('Đã có lỗi! Thực hiện lại sau.');
                } else if (data == 1) {
                    notice("Đã cập nhật trạng thái hiển thị.");
                } else {
                    notice(data.msg);
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                notice("Error status : " + textStatus + "<br/>Error code : " + XMLHttpRequest.status + "<br/>Error thrown : " + errorThrown);
            }
        });
    }

    function UpdateOrders(id, element) {
        var orders = Number($("#txtOrders" + id).val());
        if (!isNaN(orders)) {
            $.ajax({
                type: "POST",
                url: "<?= base_url()?>ajaxhandle/admin_ajaxhandler/Update_orders_section",
                data: {id: id, orders: orders},
                dataType: "json",
                success: function (data) {
                    if (data == 0) {
                        notice('Đã có lỗi! Thực hiện lại sau.');
                    } else if (data == 1) {
                        element.defaultValue = orders;
                        notice('Đã cập nhật thứ tự.');
                    } else {
                        notice(data.msg);
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    notice("Error status : " + textStatus + "<br/>Error code : " + XMLHttpRequest.status + "<br/>Error thrown : " + errorThrown);
                }
            });
        } else {
            $("#txtOrders" + id).val(element.defaultValue);
            notice('Thứ tự phải là chữ số.');
        }
    }

    function Delete_section(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url()?>ajaxhandle/admin_ajaxhandler/Delete_section",
            data: {id: id},
            dataType: "json",
            success: function (data) {
                if (data == 0) {
                    notice('Đã có lỗi! Thực hiện lại sau.');
                } else if (data == 1) {
                    notice("Đã xóa thành công.");
                    $('#section' + id).fadeOut();
                } else {
                    notice(data.msg);
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                notice("Error status : " + textStatus + "<br/>Error code : " + XMLHttpRequest.status + "<br/>Error thrown : " + errorThrown);
            }
        });
    }

    function getdate_() {
        var d = new Date();

        var curr_date = d.getDate();

        var curr_month = d.getMonth();

        var curr_year = d.getFullYear();
        curr_month++;
        return curr_month + "/" + curr_date + "/" + curr_year;
    }

    //]]>
</script>