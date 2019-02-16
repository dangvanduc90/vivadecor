<?php
    class Base_model extends CI_Model {
        function __construct() {
            parent::__construct();
            $timezone = "Asia/Saigon";
            if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
        }
        
        public function replaceUnicode($str){
           if(!$str) return false;
           $unicode = array(
              'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|À|Á|Ả|Ạ|Ã|Ă|Ằ|Ắ|Ẳ|Ặ|Ẵ|Â|Ầ|Ấ|Ẩ',
              'd'=>'đ|Đ',
              'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|È|É|Ẻ|Ẹ|Ẽ|Ê|Ề|Ế|Ể|Ệ|Ễ',
              'i'=>'í|ì|ỉ|ĩ|ị|Ì|Í|Ỉ|Ị|Ĩ',
              'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ò|Ó|Ỏ|Ọ|Õ|Ô|Ồ|Ố|Ổ|Ộ|Ỗ|Ơ|Ờ|Ớ|Ở|Ợ|Ỡ',
              'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ù|Ú|Ủ|Ụ|Ũ|Ư|Ừ|Ứ|Ử|Ự|Ữ',
              'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Y|Ỳ|Ý|Ỷ|Ỵ|Ỹ',
           );
           foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
           
           $str = strtolower(trim($str));
           $str = preg_replace('/[^a-z0-9-]/', '-', $str);
           $str = preg_replace('/-+/', "-", $str);
           return $str;
        }

        public function gen_slug($str) {
            return $this -> replaceUnicode($str);
        }

        public function upload_coppy() {
            $allowedExts = array("jpg", "jpeg", "gif", "png");
            $extension = end(explode(".", $_FILES["file"]["name"]));
            echo $extension;
            echo $_FILES["file"]["size"];
            if ((($_FILES["file"]["type"] == "image/gif")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/png")
                || ($_FILES["file"]["type"] == "image/pjpeg"))
                &&($_FILES["file"]["size"] < 2097152) && in_array($extension, $allowedExts)
                ) {
                  if ($_FILES["file"]["error"] > 0)
                    {
                        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
                    }
                  else
                    {
                        if (file_exists("images/" . $_FILES["file"]["name"]))
                          {
                          echo $_FILES["file"]["name"] . " already exists. ";
                          }
                        else
                          {
                          move_uploaded_file($_FILES["file"]["tmp_name"],
                          "images/" . $_FILES["file"]["name"]);
                          echo "Stored in: " . "images/" . $_FILES["file"]["name"];
                          }
                    }
                  }
                else
                  {
                    echo "Invalid file";
                  }
        }
        
        public function upload_() {
            $allowedExts = array("jpg", "jpeg", "gif", "png");
            $extension = end(explode(".", $_FILES["file"]["name"]));
            echo $extension;
            echo $_FILES["file"]["size"];
            if ((($_FILES["file"]["type"] == "image/gif")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/png")
                || ($_FILES["file"]["type"] == "image/pjpeg"))
                &&($_FILES["file"]["size"] < 2097152) && in_array($extension, $allowedExts)
                ) {
                  if ($_FILES["file"]["error"] > 0)
                    {
                        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
                    }
                  else
                    {
                        echo "Upload: " . $_FILES["file"]["name"] . "<br />";
                        echo "Type: " . $_FILES["file"]["type"] . "<br />";
                        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
                        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
                    
                        if (file_exists("images/" . $_FILES["file"]["name"]))
                          {
                          echo $_FILES["file"]["name"] . " already exists. ";
                          }
                        else
                          {
                          move_uploaded_file($_FILES["file"]["tmp_name"],
                          "images/" . $_FILES["file"]["name"]);
                          echo "Stored in: " . "images/" . $_FILES["file"]["name"];
                          }
                    }
                  }
                else
                  {
                    echo "Invalid file";
                  }
        }

        public function get_data_with_paging($fields =false,$table_name = false, $order_by = false,$limit_start = false,$limit_show = false,$where =false) {
            $this -> db -> select($fields);
            $this -> db -> from($table_name);
            if($order_by !== false)
                $this -> db -> order_by($order_by);
            if($limit_start !== false)
                $this -> db -> limit($limit_start);
            if($limit_start !== false && $limit_show !== false)
                $this -> db -> limit($limit_start,$limit_show);
            if($where !== false)
                $this -> db ->where ($where);

            $query = $this -> db -> get();

            return $query;
        }

        public function get_total_row($table_name = false) {
            $this -> db -> select('count(*) as count');
            $this -> db -> from($table_name);
            $query = $this -> db -> get();
            $yeah = $query -> result_array();
            return $yeah[0];
        }
        
        public function editURL($url) {
            $index = 0;
            $leftClause = '';
    		$rightClause = '';
    		$temp = '';
    		$part = '';
            $finalURL = '1';
            
            $temp = str_replace(' ','',$url);
            
            $leftClause = substr($temp,0,strpos($temp,'?',0));
	        $rightClause = substr($temp,strpos($temp,'?',0)+1,strlen($temp));
            //$index = strpos($rightClause,'@',0);
            if($leftClause != ''){
                $temp = $rightClause;
                //strpos($temp,'&',0);
                $part = substr($temp,0,strpos($temp,'&',0));
                while(strpos($temp,'&',0) !== false) {
                    $part = substr($temp,0,strpos($temp,'&',0));
                    
                    if(strpos($part,'page',0) > -1) {
                        $finalURL = str_replace('?'.$part.'&','?',$url);
                        $finalURL = str_replace('?'.$part,'',$finalURL);
                        $finalURL = str_replace('&'.$part,'',$finalURL);
                        //echo 'fuck nhay vao';
                        $finalURL = $finalURL.'&';
                        //echo $finalURL.'con ba no nua chu';
                        break;
                    }
                    //echo 'chay tiep';
                    $temp = substr($temp,strpos($temp,'&',0)+1,strlen($temp));
                    $index = strpos($temp,'&',0);
                    
                    if(strpos($temp,'&',0) === false){
                        if(strpos($temp,'page',0) > -1) {
                            $finalURL = str_replace('&&'.$temp,'',$url);
                            $finalURL = str_replace('&'.$temp,'',$finalURL);
                            
                            $finalURL = $finalURL.'&';
                            break;
                        }
                    }
                }
                
                if(strpos($temp,'&',0) === false){
                    if(strpos($temp,'page',0) > -1) {
                        $finalURL = str_replace($temp,'',$url);
                    }else {
                        $finalURL = $url.'&';
                    }
                }
                
            }else {
                $finalURL = $url.'?';
            }
            
            //echo strpos($rightClause,'@',0).' | ';
            //echo "'".strpos($part,'page',0)."'";
            //echo $finalURL.'Vai loan';
            return $finalURL;
            //return $finalURL;
        }
        
        
        public function genPageLink($currentPage,$linkRange,$totalPage,$url) {
           
                $str = '';
                $startLinkFromPosition = 1;
                $editedURL = $this -> editURL($url);
                //echo $editedURL.'dkm co chay ko';
                $lastRangePosition = 0;
                if ($currentPage == 1) {
                    $str.='<a>Page</a> ';
                    $lastRangePosition = $linkRange;
                    if ($lastRangePosition > $totalPage) {
                        $lastRangePosition = $totalPage;
                    }
                    $startLinkFromPosition = 1;
                } else {
                    $str.='<a href='.$editedURL.'page=1>First</a> ';
                    $str.='<a href='.$editedURL.'page='.($currentPage - 1).'> Priv</a> ';
                    if (($totalPage - $currentPage) < $linkRange / 2) {
                        $startLinkFromPosition = ($totalPage - $linkRange) + 1;
                        if ($startLinkFromPosition <= 0) {
                            $startLinkFromPosition = 1;
                        }
                        $lastRangePosition = $totalPage;
                    } else {
                        if (($currentPage - ($linkRange / 2)) == 0) {
                            $lastRangePosition = $currentPage + ($linkRange / 2) + 1;
                            if ($totalPage < $lastRangePosition) {
                                $lastRangePosition = $totalPage;
                            }
                        } else {
                            $startLinkFromPosition = ceil($currentPage - ($linkRange / 2));
                            if ($startLinkFromPosition <= 0) {
                                $startLinkFromPosition = 1;
                            }
                            $lastRangePosition = $currentPage + ($linkRange / 2);
                            if ($lastRangePosition > $totalPage) {
                                $lastRangePosition = $totalPage;
                            } else if ($lastRangePosition < $linkRange) {
                                $lastRangePosition = $linkRange;
                            }
                        }
                    }
                }
    
                while ($startLinkFromPosition <= $lastRangePosition) {
                    if ($startLinkFromPosition == $currentPage) {
                        $str.='<b>'.$startLinkFromPosition.'</b> ';
                    } else {
                        $str.='<a href='.$editedURL.'page='.$startLinkFromPosition.'>'.$startLinkFromPosition.'</a> ';
                    }
                    $startLinkFromPosition++;
                }
    
                if ($currentPage < $totalPage) {
                    $str.= '<a href='.$editedURL.'page='.($currentPage + 1).'> Next</a> ';
                    $str.='<a href='.$editedURL.'page='.$totalPage.'> Last</a>';
                }
    
                return $str;
            //return "";
        }
    }
    
    
?>