<?php

    class Client_ajaxhandler extends CMS_BaseController {

        function __construct()

        {

        	parent::__construct();

        }



        function index() {

        	echo 'helooooooooo';

        }



        public function Products_rating($productsid = false) {

            $this -> input -> post('capcha') ? $capcha = $this -> input -> post('capcha') : $capcha ="";

            $sescapcha = strtolower($this -> session -> userdata('capcha'));

            $capcha = strtolower($capcha);

            if( $sescapcha == $capcha ) {

                $this -> session -> unset_userdata('capcha');

            	$this -> load -> model('ajax_products_rating_model');



            	if($this -> ajax_products_rating_model -> Rating_insert($productsid)) {

            		echo json_encode(array("correct"=>"1"));

            	}else {

            		echo json_encode(array("correct"=>"0"));

            	}

            }else {

                echo json_encode(array("correct"=>"0",'msg'=>'Mã xác nhận chưa chính xác!'));

            }



        }



        public function gencapcha() {

            $this->load->helper('captcha');

             $vals = array(

                'img_path'     => './resources/',

                'img_url'     => base_url().'resources/',

                'img_width'     => '120',

                'img_height' => 30,

                'border' => 0,

                'expiration' => 1

                );

            $cap = create_captcha($vals);

            $this -> session -> set_userdata(array('capcha' => $cap['word']));

            echo json_encode($cap['image']);

        }



        public function gencapcha_callus() {

            $this->load->helper('captcha');

             $vals = array(

                'img_path'     => './resources/',

                'img_url'     => base_url().'resources/',

                'img_width'     => '120',

                'img_height' => 30,

                'border' => 0,

                'expiration' => 1

                );

            $cap = create_captcha($vals);

            $this -> session -> set_userdata(array('capcha_callus' => $cap['word']));

            echo json_encode($cap['image']);

        }



        public function submit_contact() {



            $lang = $this->lang->lang();



            $lang == "vi" ? $msg = 'Mã xác nhận chưa chính xác!' : $msg = 'Capcha text invalid!';



            $this -> input -> post('capcha') ? $capcha = $this -> input -> post('capcha') : $capcha ="";

            $sescapcha = strtolower($this -> session -> userdata('capcha'));

            $capcha = strtolower($capcha);

            if( $sescapcha == $capcha ) {

                $this -> session -> unset_userdata('capcha');

                $this -> load -> model('guest/contact_model');



                if($this -> contact_model -> submit_contact()) {

                    $lang == "vi" ? $msg = 'Thông tin liên hệ của bạn đã được gửi tới chúng tôi!' : $msg = 'Thanks you! Your contact information have been sent to us!';

                    echo json_encode(array("correct"=>"1",'msg'=>$msg));

                }else {

                    echo json_encode(array("correct"=>"0"));

                }

            }else {

                echo json_encode(array("correct"=>"0",'msg'=>$msg));

            }

        }



        public function submit_callus() {



            $lang = $this -> lang -> lang();



            $lang == "vi" ? $msg = 'Mã xác nhận chưa chính xác!' : $msg = 'Capcha text invalid!';



            $this -> input -> post('capcha_callus') ? $capcha_callus = $this -> input -> post('capcha_callus') : $capcha_callus ="";

            $sescapcha_callus = strtolower($this -> session -> userdata('capcha_callus'));

            $capcha_callus = strtolower($capcha_callus);

            if( $sescapcha_callus == $capcha_callus ) {

                $this -> session -> unset_userdata('capcha_callus');

                $this -> load -> model('guest/callus_model');



                if($this -> callus_model -> submit_callus()) {

                    $lang == "vi" ? $msg = 'Thông tin gọi lại của bạn đã được gửi tới chúng tôi!' : $msg = 'Thanks you! Your callback request have been sent to us!';

                    echo json_encode(array("correct"=>"1",'msg'=>$msg));

                }else {

                    echo json_encode(array("correct"=>"0"));

                }

            }else {

                echo json_encode(array("correct"=>"0",'msg'=>$msg));

            }

        }



        public function get_infor_xetnghiem() {

            $lang = $this->lang->lang();



            $lang == "vi" ? $msg = 'Mã xét nghiệm không tồn tại!' : $msg = 'Analysis code invalid!';



            $this -> load -> model('guest/xetnghiem_model');



            $ma_xet_nghiem = $this -> input -> post('ma_xet_nghiem') ? $this -> input -> post('ma_xet_nghiem') : '';



            $infor = $this -> xetnghiem_model -> Get_xetnghiem_by_code($ma_xet_nghiem) ;



            if($infor !== false) {

                $lang == "vi" ? $msg = 'Mã xét nghiệm tồn tại' : $msg = 'Analysis code valid!';

                echo json_encode(array("correct"=>"1",'msg' => $msg,'infor' => $infor ));

            }else {

                echo json_encode(array("correct"=>"0",'msg' => $msg));

            }

            // }else {

            //     echo json_encode(array("correct"=>"0",'msg'=>$msg));

            // }

        }



        public function votePoll() {

            $this -> load -> model('guest/polls_model');



            echo json_encode($this -> polls_model -> vote());

        }




        public function Pagination_product()
        {
            $page = $this -> input -> post('page');
            $display = 6;
            $offset = ($page - 1) * $display;
            $this -> load -> model('guest/products_model');
            $productsList = $this -> products_model -> Get_new_pagination_product($display, $offset);
            if ($productsList) {

                foreach ($productsList as $key => $value) {

                    $value -> Description = $this->trim_text($value -> Description, 150);

                }

            }
            echo json_encode($productsList);
        }

        public function Pagination_product_complete()
        {
            $page = $this -> input -> post('page');
            $display = 6;
            $offset = ($page - 1) * $display;
            $this -> load -> model('guest/products_model');
            $productsList = $this -> products_model -> Get_hot_pagination_product($display, $offset);
            if ($productsList) {

                foreach ($productsList as $key => $value) {

                    $value -> Description = $this->trim_text($value -> Description, 150);

                }

            }
            echo json_encode($productsList);
        }




        public function insertSubscribe() {

            $this -> load -> model('ajaxhandle/ajax_support_online_model');

            $result = $this -> ajax_support_online_model -> insertSubscribe();

            $a = '';

            $result ? $a = '1' : $a = '0';

            echo json_encode($a);

        }

        function trim_text($input, $length, $ellipses = true, $strip_tag = true,$strip_style = true) {

            //strip tags, if desired

            if ($strip_tag) {

                $input = strip_tags($input);

            }

            //strip tags, if desired

            if ($strip_style) {

                $input = preg_replace('/(<[^>]+) style=".*?"/i', '$1',$input);

            }

            if($length=='full') {

                $trimmed_text=$input;

            }

            else {

                //no need to trim, already shorter than trim length

                if (strlen($input) <= $length) {

                return $input;

                }

                //find last space within length

                $last_space = strrpos(substr($input, 0, $length), ' ');

                $trimmed_text = substr($input, 0, $last_space);

                //add ellipses (...)

                if ($ellipses) {

                $trimmed_text .= '...';

                }

            }

            return $trimmed_text;

        }

    }

?>