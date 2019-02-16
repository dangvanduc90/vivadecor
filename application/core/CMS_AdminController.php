<?php
    class CMS_AdminController extends CMS_BaseController {
        function __construct()
        {
            parent::__construct();
            global $PermissAddNew;
            global $PermissEdit;
            global $PermissDelete;
            global $PermissView;

            $PermissAddNew = 1;
            $PermissEdit = 2;
            $PermissView = 4;
            $PermissDelete = 8;

            $this -> is_logged_in();
        }

        function is_logged_in() {
        	// $login_data = array('username' => 'joe2e','email' => 'nguyenthang_joe2e@outlook.com', 'is_logged_in' => true);
        	// $this -> session -> set_userdata($login_data);

            // Get url when user access before login, but server does not allows.
            // After login succeed, server will redirect to this url;
            $oldurl = $this -> getUrl();
            $sess = array('oldurl' => $oldurl);
            $this -> session -> set_userdata($sess);

        	$is_logged_in = $this -> session -> userdata('is_logged_in');

        	if(!isset($is_logged_in) || !$is_logged_in) {
                if ($this -> isAjax()) {

                    echo json_encode(array("msg" => "Error: Phiên làm việc đã kết thúc. Đăng nhập lại để thao tác!"));
                    //redirect('../administrator/login');
                    die();
                }else {

        		  redirect(base_url().'administrator/login');

                }
        	}
        }

        /******
        ******* Ham nay dung de kiem tra xem quyen co ton tai trong role hay khong
        ***************************************************/
        function checkPermission($permiss = false,$permissNumber = false){
            if( ((int)$permiss & (int)$permissNumber) == (int)$permiss )
                return true;
            return false;
        }

        /******
        ******* Ham nay de kiem tra xem nguoi dung co quyen gi trong 1 phuong thuc duocj quy dinh san
        ***************************************************/
        function hasPermission($funcname = false, $roleid = false, $permiss = false) {

            if($funcname !== false && $roleid !== false && $permiss !== false) {

                $this -> load -> model('cms_base_model');
                $role = $this -> cms_base_model -> getUserPermission($funcname,$roleid);
                if($role !== false) {
                    return $this -> checkPermission($permiss,$role['PermissionNumber']);
                }else {
                    return false;
                }

            }
        }

    }
?>