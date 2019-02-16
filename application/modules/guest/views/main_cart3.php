<!DOCTYPE html>
<html class="no-js" lang="<?= $lang ?>">
    <head>
        <!-- CSS and Jquery start here -->
        <?= $this -> load -> view('guest/includes/header') ?>
        <link rel="stylesheet" type="text/css" href="<?= base_url()?>resources/stylesheets/client/jquery.bootstrap-touchspin.css" />
        <script src="<?= base_url()?>resources/js/client/jquery.bootstrap-touchspin.min.js"></script>
        <!-- CSS and Jquery end here -->
    </head>
    <body lang="<?= $lang ?>">
        <div id="wrapper">
            <!-- Top start here -->
            <div id="top">
                <?= $this -> load -> view('guest/includes/top') ?>
                <?= $this -> load -> view('guest/includes/menu') ?>
                <div class="clear"></div>
            </div>
            <!-- Top end here -->
            <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="header">
                                <span>Giỏ hàng</span>
                            </div>
                            <table id="cart" class="hidden-xs hidden-sm">
                                <tr>
                                    <td colspan="2">
                                        <span class="cart_3_header">Hoàn tất đơn hàng</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:40%;">
                                        <?= form_open() ?>
                                        <span class="circle">1</span><span style="font-weight:bold;color:#555;">Thông tin thanh toán</span>
                                        <div class="form_label_input">
                                            <label style="font-weight:bold" for="fullname">Khách hàng</label>
                                            <span><?= $user_info['fullname'] ?></span>
                                        </div>
                                        <div class="form_label_input">
                                            <label style="font-weight:bold" for="phone">Số điện thoại</label>
                                            <span><?= $user_info['phone'] ?></span>
                                        </div>
                                        <div class="form_label_input">
                                            <label style="font-weight:bold" for="email">Email</label>
                                            <span><?= $user_info['email'] ?></span>
                                        </div>
                                        <!-- <div class="form_label_input">
                                            <label style="font-weight:bold" for="address">Địa chỉ</label>
                                            <span><?= $user_info['address'] ?></span>
                                        </div> -->
                                        <span class="circle">2</span><span style="font-weight:bold;color:#555;">Địa chỉ giao hàng</span>
                                        <!-- <input type="hidden" name="shipping_address" value="<?= $user_info['shipping_address'] ?>" />
                                        <input type="hidden" name="shipping_city" value="<?= $user_info['shipping_city'] ?>" />
                                        <input type="hidden" name="shipping_address_type" value="<?= $user_info['shipping_address_type'] ?>" /> -->
                                        <div class="form_label_input">
                                            <label style="font-weight:bold;vertical-align:top;" for="ship_address">Địa chỉ</label>
                                            <span style="display:inline-block;"><?= $user_info['shipping_address'] ?></span>
                                        </div>
                                        <!-- <div class="form_label_input">
                                            <label style="font-weight:bold" for="ship_city">Thành phố</label>
                                            <span><?= $user_info['shipping_city'] ?></span>
                                        </div>
                                        <div class="form_label_input">
                                            <label style="font-weight:bold" for="ship_address_type">Loại địa chỉ</label>
                                            <span><?= $user_info['shipping_address_type'] ?></span>
                                        </div> -->
                                        <span class="circle">3</span><span style="font-weight:bold;color:#555;">Yêu cầu bổ sung</span>
                                        <div class="form_label_input">
                                            <?php $string = ' Thời gian giao hàng.' . "\r\n" .' Yêu cầu khác.' ?>
                                            <textarea rows="5" style="padding:5px;overflow-y:visible;margin-bottom:10px;width:100%;" name="Notes" placeholder="<?= $string ?>"></textarea>
                                        </div>
                                    </td>
                                    <td style="vertical-align:top">
                                        <span class="circle">4</span><span style="font-weight:bold;color:#555;">Xác nhận đơn hàng</span>

                                        <table id="cart" class="inside">
                                            <tr>
                                                <td colspan="2" class="text_center">Sản phẩm</td>
                                                <td class="text_right">Giá</td>
                                            </tr>
                                            <?php 
                                                if ($cart = $this -> cart -> contents()) {
                                                    $grand_total = 0; $i = 1;
                                                    foreach ($cart as $item) {
                                            ?>
                                            <tr>
                                                <td class="text_center"><img class="cart_img" src="<?= base_url() ?>resources/uploads/images/automatic/<?= $item['image'] ?>"></td>
                                                <td><?= urldecode($item['name']) ?></td>
                                                <td class="text_right">
                                                    <span style="display:block;color:red;font-weight:bold;margin: 0 0 5px 0;"><?= number_format($item['subtotal'],0, ".", ",") ?> đ</span>
                                                    <span>Số lượng: <?= $item['qty'] ?></span>
                                                </td>
                                                <?php $grand_total = $grand_total + $item['subtotal']; ?>
                                            </tr>
                                            <?php }} ?>
                                            <tr>
                                                <td class="text_right" colspan="2"><strong>Tổng cộng:</strong></td>
                                                <td class="text_right" colspan="2"><span style="display:block;color:red;font-weight:bold;"><?= number_format($grand_total,0, ".", ",") ?> đ</span></td>
                                            </tr>
                                        </table>

                                        <?= form_submit('submit_cart', 'Mua hàng', 'class="btn3" style="float:right"') ?>
                                        <?= form_close() ?>
                                    </td>
                                </tr>
                                <tr class="no-border">
                                    <td colspan="7">
                                        <input class="float_left btn2" type="button" value="Trở về giỏ hàng" onclick="location.href='<?= site_url() ?>gio-hang'" />
                                    </td>
                                </tr>
                            </table>
                            <table id="cart" class="hidden-md hidden-lg">
                                <tr>
                                    <td>
                                        <span class="cart_3_header">Hoàn tất đơn hàng</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:40%;">
                                        <?= form_open() ?>
                                        <span class="circle">1</span><span style="font-weight:bold;color:#555;">Thông tin thanh toán</span>
                                        <div class="form_label_input">
                                            <label style="font-weight:bold" for="fullname">Khách hàng</label>
                                            <span><?= $user_info['fullname'] ?></span>
                                        </div>
                                        <div class="form_label_input">
                                            <label style="font-weight:bold" for="phone">Số điện thoại</label>
                                            <span><?= $user_info['phone'] ?></span>
                                        </div>
                                        <div class="form_label_input">
                                            <label style="font-weight:bold" for="email">Email</label>
                                            <span><?= $user_info['email'] ?></span>
                                        </div>
                                        <!-- <div class="form_label_input">
                                            <label style="font-weight:bold" for="address">Địa chỉ</label>
                                            <span><?= $user_info['address'] ?></span>
                                        </div> -->
                                        <span class="circle">2</span><span style="font-weight:bold;color:#555;">Địa chỉ giao hàng</span>
                                        <!-- <input type="hidden" name="shipping_address" value="<?= $user_info['shipping_address'] ?>" />
                                        <input type="hidden" name="shipping_city" value="<?= $user_info['shipping_city'] ?>" />
                                        <input type="hidden" name="shipping_address_type" value="<?= $user_info['shipping_address_type'] ?>" /> -->
                                        <div class="form_label_input">
                                            <label style="font-weight:bold;vertical-align:top;" for="ship_address">Địa chỉ</label>
                                            <span style="display:inline-block;"><?= $user_info['shipping_address'] ?></span>
                                        </div>
                                        <!-- <div class="form_label_input">
                                            <label style="font-weight:bold" for="ship_city">Thành phố</label>
                                            <span><?= $user_info['shipping_city'] ?></span>
                                        </div>
                                        <div class="form_label_input">
                                            <label style="font-weight:bold" for="ship_address_type">Loại địa chỉ</label>
                                            <span><?= $user_info['shipping_address_type'] ?></span>
                                        </div> -->
                                        <span class="circle">3</span><span style="font-weight:bold;color:#555;">Yêu cầu bổ sung</span>
                                        <div class="form_label_input">
                                            <?php $string = ' Thời gian giao hàng.' . "\r\n" .' Yêu cầu khác.' ?>
                                            <textarea rows="5" style="padding:5px;overflow-y:visible;margin-bottom:10px;width:100%;" name="Notes" placeholder="<?= $string ?>"></textarea>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:top">
                                        <span class="circle">4</span><span style="font-weight:bold;color:#555;">Xác nhận đơn hàng</span>

                                        <table id="cart" class="inside">
                                            <?php 
                                                if ($cart = $this -> cart -> contents()) {
                                                    $grand_total = 0; $i = 1;
                                                    foreach ($cart as $item) {
                                            ?>
                                            <tr>
                                                <td class="text_center"><img class="cart_img" src="<?= base_url() ?>resources/uploads/images/automatic/<?= $item['image'] ?>"></td>
                                            </tr>
                                            <tr>
                                                <td><b><?php if($item['SKU']){echo $item['SKU']. " - ";} ?><?= urldecode($item['name']) ?></b></td>
                                            </tr>
                                                <td class="text_last">
                                                    <span style="display:block;color:red;font-weight:bold;margin: 0 0 5px 0;"><?= number_format($item['subtotal'],0, ".", ",") ?> đ</span>
                                                    <span>Số lượng: <?= $item['qty'] ?></span>
                                                </td>
                                                <?php $grand_total = $grand_total + $item['subtotal']; ?>
                                            </tr>
                                            <?php }} ?>
                                            <tr>
                                                <td class="text_right" colspan="2"><strong>Tổng cộng:</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="text_right" colspan="2"><span style="display:block;color:red;font-weight:bold;"><?= number_format($grand_total,0, ".", ",") ?> đ</span></td>
                                            </tr>
                                        </table>

                                        <?= form_submit('submit_cart', 'Mua hàng', 'class="btn3" style="float:right"') ?>
                                        <?= form_close() ?>
                                    </td>
                                </tr>
                                <tr class="no-border">
                                    <td colspan="7">
                                        <input class="float_left btn2" type="button" value="Trở về giỏ hàng" onclick="location.href='<?= site_url() ?>gio-hang'" />
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="clear"></div>
            </div>

            <!-- Bottom end here -->
            <div id="bottom">
                <?= $this -> load -> view('guest/includes/footer') ?>
                <div class="clear"></div>
            </div>
            <!-- Bottom end here -->

        </div>
        <?= $this -> load -> view('guest/includes/sticky') ?>
            <?= $this -> load -> view('guest/includes/documentready') ?>
        <script type="text/javascript" charset="utf-8">

            $(".cart_qty").TouchSpin({
                verticalbuttons: true,
                verticalupclass: 'glyphicon glyphicon-plus',
                verticaldownclass: 'glyphicon glyphicon-minus'
            });

            function clear_cart() {
                var result = confirm('Bạn muốn hủy giỏ hàng ?');
                if(result) {
                    window.location = "<?php echo base_url(); ?>removecart/all";
                }else{
                    return false; // cancel button
                }
            }
        </script>
    </body>
</html>