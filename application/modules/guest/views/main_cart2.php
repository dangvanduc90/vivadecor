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
                            <table id="cart">
                                <tr>
                                    <td style="background:#fff;">
                                        <span>Xin vui lòng điền thông tin dưới đây để chúng tôi thực hiện giao hàng tới cho bạn</span>
                                        <?= form_open() ?>
                                        <div class="form_label_input">
                                            <label for="fullname">Họ tên<span class="required"> * </span></label>
                                            <input type="text" name="fullname" id="fullname" value="<?php if (isset($cart_guest['fullname'])) echo $cart_guest['fullname']; ?>" >
                                            <?php echo form_error('fullname'); ?>
                                        </div>
                                        <div class="form_label_input">
                                            <label for="phone">Điện thoại<span class="required"> * </span></label>
                                            <input type="text" name="phone" id="phone" value="<?php if (isset($cart_guest['phone'])) echo $cart_guest['phone']; ?>" >
                                            <?php echo form_error('phone'); ?>
                                        </div>
                                        <div class="form_label_input">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" id="email" value="<?php if (isset($cart_guest['email'])) echo $cart_guest['email']; ?>" >
                                            <?php echo form_error('email'); ?>
                                        </div>
                                        <div class="form_label_input">
                                            <label for="address">Địa chỉ<span class="required"> * </span></label>
                                            <textarea style="width:100%;height:100px" name="address" id="address"><?php if (isset($cart_guest['address'])) echo $cart_guest['address']; ?></textarea>
                                            <?php echo form_error('address'); ?>
                                        </div>
                                        <input name="submit_guest" class="form_label_submit btn3" type="submit" value="Bước tiếp theo" >
                                        <?= form_close() ?>
                                    </td>
                                </tr>
                                <tr class="no-border">
                                    <td colspan="7">
                                        <input class="btn2" type="button" value="Trở về giỏ hàng" onclick="location.href='<?= site_url() ?>gio-hang'" />
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