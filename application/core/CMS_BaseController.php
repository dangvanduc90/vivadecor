<?php
    /* load the MX_Loader class */
    require APPPATH."third_party/MX/Controller.php";
    class CMS_BaseController extends MX_Controller {
        function __construct()
        {
            parent::__construct();
            $timezone = "Asia/Saigon";
            if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
            $this -> load -> library('Objecthelper');
            $this -> load -> helper(array('file'));
        }

        public function isAjax() {
          return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'));
        }

        public function getUrl() {
            $query = $_SERVER['QUERY_STRING'] ? '?'.$_SERVER['QUERY_STRING'] : '';
            return str_replace('index.php','',$this->config->site_url().$this->uri->uri_string(). $query);
            //return $_SERVER['REQUEST_URI'];
        }

        public function Upload_Single_Image0($custom_path = false, $max_height = false, $max_width = false,$element_name = false) {

            if($max_height === false || !is_numeric($max_height)) $max_height = 0;
            if($max_width === false || !is_numeric($max_width)) $max_width = 0;

            $msg = "";
            $url= "";
            $imageid= "";
            $imgname = "";
            $file_element_name = 'userfile';
            if($element_name !== false) {
                $file_element_name = $element_name;
            }

            $array_information_uploaded = array();

            $gallery_path;
            if(isset($_FILES[$file_element_name])) {
                $name = $_FILES[$file_element_name]["name"];

                if($custom_path){
                    $config['upload_path'] = './resources/uploads/images/automatic/'. $custom_path;
                    if(!is_dir('./resources/uploads/images/automatic/'. $custom_path))
                    {
                       mkdir('./resources/uploads/images/automatic/'. $custom_path,0755);
                       mkdir('./resources/uploads/images/automatic/'. $custom_path . '/thumbs',0755);
                    }
                } else {
                    $config['upload_path'] = './resources/uploads/images/automatic';
                }
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size']  = 0;
                

                $config['max_height'] = $max_height;
                $config['max_width'] = $max_width;

                $this -> load -> library('upload', $config);

                if (!empty($name)){

                    if (!$this->upload->do_upload($file_element_name))
                    {

                        $msg = $this->upload->display_errors('','');
                        $array_information_uploaded['file_name'] = "";
                        $array_information_uploaded['url_thumbs'] = "";

                    }else{

                        $array_information_uploaded = $this->upload->data();
                        if($custom_path){
                            $gallery_path = realpath(APPPATH . '../resources/uploads/images/automatic/' . $custom_path);
                        } else {
                            $gallery_path = realpath(APPPATH . '../resources/uploads/images/automatic');
                        }
                        $config = array(

                            'source_image' => $array_information_uploaded['full_path'],
                            'new_image' => $gallery_path . '/thumbs',
                            'maintain_ratio' => false,
                            // 'create_thumb' => true,
                            // 'thumb_marker' => '_110_110',
                            'width' => 61,
                            'height' => 50

                        );

                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                        if ($custom_path) {
                            $url_thumbs = base_url().'resources/uploads/images/automatic/' . $custom_path . '/thumbs/'.$array_information_uploaded['file_name'];
                        } else {
                            $url_thumbs = base_url().'resources/uploads/images/automatic/thumbs/'.$array_information_uploaded['file_name'];
                        }

                        $array_information_uploaded['url_thumbs'] = $url_thumbs;

                    }

                    @unlink($_FILES[$file_element_name]);

                }else {
                    $array_information_uploaded['file_name'] = "";
                    $array_information_uploaded['url_thumbs'] = "";
                    $msg = "Error: Chưa chọn file cần upload!";

                }

                $array_information_uploaded['message'] = $msg;

                return $array_information_uploaded;
            }
        }

        public function Upload_Single_Image($custom_path = false, $max_height = false, $max_width = false,$element_name = false) {

            if($max_height === false || !is_numeric($max_height)) $max_height = 0;
            if($max_width === false || !is_numeric($max_width)) $max_width = 0;

            $msg = "";
            $url= "";
            $imageid= "";
            $imgname = "";
            $file_element_name = 'userfile';
            if($element_name !== false) {
                $file_element_name = $element_name;
            }

            $array_information_uploaded = array();

            $gallery_path;
            if(isset($_FILES[$file_element_name])) {
                $name = $_FILES[$file_element_name]["name"];

                if($custom_path){
                    $config['upload_path'] = './resources/uploads/images/automatic/'. $custom_path;
                    if(!is_dir('./resources/uploads/images/automatic/'. $custom_path))
                    {
                       mkdir('./resources/uploads/images/automatic/'. $custom_path,0755);
                       mkdir('./resources/uploads/images/automatic/'. $custom_path . '/thumbs',0755);
                    }
                } else {
                    $config['upload_path'] = './resources/uploads/images/automatic';
                }
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size']  = 0;
                

                $config['max_height'] = $max_height;
                $config['max_width'] = $max_width;

                $this -> load -> library('upload', $config);

                if (!empty($name)){

                    if (!$this->upload->do_upload($file_element_name))
                    {

                        $msg = $this->upload->display_errors('','');
                        $array_information_uploaded['file_name'] = "";
                        $array_information_uploaded['url_thumbs'] = "";

                    }else{

                        $array_information_uploaded = $this->upload->data();
                        if($custom_path){
                            $gallery_path = realpath(APPPATH . '../resources/uploads/images/automatic/' . $custom_path);
                        } else {
                            $gallery_path = realpath(APPPATH . '../resources/uploads/images/automatic');
                        }
                        $config = array(

                            'source_image' => $array_information_uploaded['full_path'],
                            'new_image' => $gallery_path . '/thumbs',
                            'maintain_ratio' => false,
                            // 'create_thumb' => true,
                            // 'thumb_marker' => '_110_110',
                            'width' => 110,
                            'height' => 110

                        );

                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                        if ($custom_path) {
                            $url_thumbs = base_url().'resources/uploads/images/automatic/' . $custom_path . '/thumbs/'.$array_information_uploaded['file_name'];
                        } else {
                            $url_thumbs = base_url().'resources/uploads/images/automatic/thumbs/'.$array_information_uploaded['file_name'];
                        }

                        $array_information_uploaded['url_thumbs'] = $url_thumbs;

                    }

                    @unlink($_FILES[$file_element_name]);

                }else {
                    $array_information_uploaded['file_name'] = "";
                    $array_information_uploaded['url_thumbs'] = "";
                    $msg = "Error: Chưa chọn file cần upload!";

                }

                $array_information_uploaded['message'] = $msg;

                return $array_information_uploaded;
            }
        }

        public function Upload_Single_Image2($max_height = false, $max_width = false,$element_name = false) {

            if($max_height === false || !is_numeric($max_height)) $max_height = 0;
            if($max_width === false || !is_numeric($max_width)) $max_width = 0;

            $msg = "";
            $url= "";
            $imageid= "";
            $imgname = "";
            $file_element_name = 'userfile2';
            if($element_name !== false) {
                $file_element_name = $element_name;
            }

            $array_information_uploaded = array();

            $gallery_path;
            if(isset($_FILES[$file_element_name])) {
                $name = $_FILES[$file_element_name]["name"];

                $config['upload_path'] = './resources/uploads/images/automatic/san-pham';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']  = 0;
                

                $config['max_height'] = $max_height;
                $config['max_width'] = $max_width;

                $this -> load -> library('upload', $config);

                if (!empty($name)){

                    if (!$this->upload->do_upload($file_element_name))
                    {

                        $msg = $this->upload->display_errors('','');
                        $array_information_uploaded['file_name'] = "";
                        $array_information_uploaded['url_thumbs'] = "";

                    }else{

                        $array_information_uploaded = $this->upload->data();
                        $gallery_path = realpath(APPPATH . '../resources/uploads/images/automatic/san-pham');
                        $config = array(

                            'source_image' => $array_information_uploaded['full_path'],
                            'new_image' => $gallery_path . '/thumbs',
                            'maintain_ratio' => true,
                            // 'create_thumb' => true,
                            // 'thumb_marker' => '_150_100',
                            'width' => 155,
                            'height' => 96

                        );

                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                        $url_thumbs = base_url().'resources/uploads/images/automatic/san-pham/thumbs/'.$array_information_uploaded['file_name'];

                        $array_information_uploaded['url_thumbs'] = $url_thumbs;

                    }

                    @unlink($_FILES[$file_element_name]);

                }else {
                    $array_information_uploaded['file_name'] = "";
                    $array_information_uploaded['url_thumbs'] = "";
                    $msg = "Error: Chưa chọn file cần upload!";

                }

                $array_information_uploaded['message'] = $msg;

                return $array_information_uploaded;
            }
        }

        public function Upload_Docs_File($max_size = false,$element_name = false) {

            $msg = "";
            $url= "";
            $imgname = "";
            $file_element_name = 'userfile';
            if($element_name !== false) {
                $file_element_name = $element_name;
            }

            $array_information_uploaded = array();

            $gallery_path;

            $name = $_FILES[$file_element_name]["name"];

            $config['upload_path'] = './resources/uploads/files/';
            $config['allowed_types'] = 'doc|docx|pdf|txt|xls|xlsx';
            $config['max_size']  = 20971520;
            
            if($max_size !== false) {
                $config['max_size'] = $max_size;
            }

            $this -> load -> library('upload', $config);

            if (!empty($name)){

                if (!$this->upload->do_upload($file_element_name))
                {

                    $msg = $this->upload->display_errors('','');
                    $array_information_uploaded['file_name'] = "";
                    $array_information_uploaded['url_file'] = "";

                }else{

                    $array_information_uploaded = $this->upload->data();

                    $url = base_url().'resources/uploads/files/'.$array_information_uploaded['file_name'];

                    $array_information_uploaded['url_file'] = $url;

                    $msg = "Upload thành công!";
                }

                @unlink($_FILES[$file_element_name]);

            }else {
                $array_information_uploaded['file_name'] = "";
                $array_information_uploaded['url_file'] = "";
                $msg = "Error: Chưa chọn file cần upload!";

            }

            $array_information_uploaded['message'] = $msg;

            return $array_information_uploaded;
        }

        public function Upload_Docs_File_client($max_size = false,$element_name = false,$lang = false) {

            $msg = "";
            $url= "";
            $imgname = "";
            $file_element_name = 'userfile';
            if($element_name !== false) {
                $file_element_name = $element_name;
            }

            $array_information_uploaded = array();

            $gallery_path;

            $name = $_FILES[$file_element_name]["name"];

            $config['upload_path'] = './resources/uploads/files/';
            $config['allowed_types'] = 'doc|docx|pdf|txt|xls|xlsx';
            $config['max_size']  = 20971520;
            
            if($max_size !== false) {
                $config['max_size'] = $max_size;
            }

            $this -> load -> library('upload', $config);

            if (!empty($name)){

                if (!$this->upload->do_upload($file_element_name))
                {

                    $msg = $this->upload->display_errors('','');
                    $array_information_uploaded['file_name'] = "";
                    $array_information_uploaded['url_file'] = "";

                }else{

                    $array_information_uploaded = $this->upload->data();

                    $url = base_url().'resources/uploads/files/'.$array_information_uploaded['file_name'];

                    $array_information_uploaded['url_file'] = $url;
                    if($lang == 'lang_vi')
                        $msg = "Upload thành công!";
                    else
                        $msg = "Upload success!";
                }

                @unlink($_FILES[$file_element_name]);

            }else {
                $array_information_uploaded['file_name'] = "";
                $array_information_uploaded['url_file'] = "";
                if($lang == 'lang_vi')
                    $msg = "Error: Chưa chọn file cần upload!";
                else
                    $msg = "Error: File upload required!";

            }

            $array_information_uploaded['message'] = $msg;

            return $array_information_uploaded;
        }
    }
?>