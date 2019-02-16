<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    /*****
    ****** Author : Thang, Nguyen Nhan
    ****** Email : nguyenthang_joe2e@outlook.com
    ****** Mobile : (+84)974 038 315
    *********************************************/
    class Objecthelper {
        public function gen_json($resultset = FALSE,$gencollection = false){
            $JSON = '';
            if(($resultset != FALSE) and ($resultset->num_rows() > 0 )) {
                
                if($resultset->num_rows() > 0 && $gencollection === true) {
                    $JSON .= '{"json" : [';
                    $info = $resultset->list_fields();
                    $temp = TRUE;
                    
                    foreach($resultset->result_array() as $row) {
                        if(!$temp) {
                            $JSON .= ", ";
                        }
                        $temp = FALSE;
                        $JSON .= "{ ";
                        $first = TRUE;
                        foreach($info as $item){
                            if (!$first) {
                                $JSON .= ", ";
                            }
                            $JSON .= '"'.$item.'": '.'"'.$row[$item].'"';
                            $first = FALSE;
                        }
                        $JSON .= " }";
                    }
                    
                    $JSON .= "]}";
                    
                    return $JSON;
                }else  if(($resultset != FALSE) and ($resultset->num_rows() == 1)){
                    $info = $resultset->list_fields();
                    $JSON .= "{ ";
                    foreach($resultset->result_array() as $row) {
                        $first = TRUE;
                        foreach($info as $item){
                            if (!$first) {
                                $JSON .= ", ";
                            }
                            $JSON .= '"'.$item.'": '.'"'.$row[$item].'"';
                            $first = FALSE;
                        }
                    }
                    $JSON .= " }";
                    
                    return $JSON;
                }
            }
            
            return "null";
        }
        
        public function json_from_array($result_array = FALSE) {
            if(($result_array != false) and ($result_array->num_rows() > 0)) {
                
            }
        }

        public function normalize_str($str) {

            $invalid = array('Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z',
            'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A',
            'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E',
            'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
            'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y',
            'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a',
            'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e',  'ë'=>'e', 'ì'=>'i', 'í'=>'i',
            'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y',  'ý'=>'y', 'þ'=>'b',
            'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', "`" => "'", "´" => "'", '"' => ',', '`' => "'",
            '´' => "'", '"' => '\"', '"' => "\"", '´' => "'", "&acirc;€™" => "'", //"{" => "",
            "~" => "", "–" => "-", "'" => "'","     " => " ");
            
            $yeah = array(' ','');

            $str = str_replace(array_keys($yeah), array_values($yeah), $str);

            $remove = array("\n", "\r\n", "\r","\r\t",'<p>','</p>');
            $str = str_replace($remove, "\\\\\\n", trim($str));

            return trim($str);
        }

        public function replaceUnicode($str){
            if(!$str) return false;
            $coDau=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă","ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ","ì","í","ị","ỉ","ĩ","ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ","ờ","ớ","ợ","ở","ỡ","ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ","ỳ","ý","ỵ","ỷ","ỹ","đ","À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă","Ằ","Ắ","Ặ","Ẳ","Ẵ","È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ","Ì","Í","Ị","Ỉ","Ĩ","Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ","Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ","Ỳ","Ý","Ỵ","Ỷ","Ỹ","Đ","ê","ù","à");
            $khongDau=array("a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","e","e","e","e","e","e","e","e","e","e","e","i","i","i","i","i","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","u","u","u","u","u","u","u","u","u","u","u","y","y","y","y","y","d","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","E","E","E","E","E","E","E","E","E","E","E","I","I","I","I","I","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","U","U","U","U","U","U","U","U","U","U","U","Y","Y","Y","Y","Y","D","e","u","a");
            $str = str_replace($coDau,$khongDau,$str);
           
            $str = strtolower(trim($str));
            $str = preg_replace('/[^a-z0-9-]/', '-', $str);
            $str = preg_replace('/-+/', "-", $str);
            return $str;
        }

        public function convert_html_to_text_for_js($string) 
        { 
           $string = str_replace( array('\'','"','/','  ','\n','\r'),array('\\\'', '\\"','\\/','','',''), $string);//htmlspecialchars_decode($string, ENT_NOQUOTES) 

           return $string; 
           
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
            if($leftClause != ''){
                $temp = $rightClause;
                $part = substr($temp,0,strpos($temp,'&',0));
                while(strpos($temp,'&',0) !== false) {
                    $part = substr($temp,0,strpos($temp,'&',0));
                    
                    if(strpos($part,'page',0) > -1) {
                        $finalURL = str_replace('?'.$part.'&','?',$url);
                        $finalURL = str_replace('?'.$part,'',$finalURL);
                        $finalURL = str_replace('&'.$part,'',$finalURL);
                        $finalURL = $finalURL.'&';
                        break;
                    }
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
            
            return $finalURL;
        }
        
        
        public function genPageLink($currentPage,$linkRange,$totalPage,$url,$isAjax = false,$wrap_name = false) {
           
            $str = '';
            $startLinkFromPosition = 1;
            $editedURL = $this -> editURL($url);
            //echo $editedURL.'dkm co chay ko';
            $lastRangePosition = 0;
            $str.='<a>Page '.$currentPage.'/'.$totalPage.'</a> ';
            if ($currentPage == 1) {
                
                $lastRangePosition = $linkRange;
                if ($lastRangePosition > $totalPage) {
                    $lastRangePosition = $totalPage;
                }
                $startLinkFromPosition = 1;
            }else if($currentPage > $totalPage){
                
            } else {
                $str .= '<a href="';
                $str .= !$isAjax ? $editedURL.'page=1"' : 'javascript:void(0);" onclick="ajaxPaging(\'1\'';
                $wrap_name ? $str .= ',\''.$wrap_name.'\'' : 0;
                $str .= ');"';
                $str .= '>First</a> ';
                $str .= '<a class="number" href="';
                $str .= !$isAjax ? $editedURL.'page='.($currentPage - 1).'"' : 'javascript:void(0);" onclick="ajaxPaging(\''.($currentPage - 1).'\'';
                $wrap_name ? $str .= ',\''.$wrap_name.'\'' : 0;
                $str .= ');"';
                $str .= '> <<</a> ';
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
                    $str .= '<a class="number" href="';
                    $str .= !$isAjax ? $editedURL.'page='.$startLinkFromPosition.'"' : 'javascript:void(0);" onclick="ajaxPaging(\''.$startLinkFromPosition.'\'';
                    $wrap_name ? $str .= ',\''.$wrap_name.'\'' : 0;
                    $str .= ');"';
                    $str .= '>'.$startLinkFromPosition.'</a> ';
                }
                $startLinkFromPosition++;
            }

            if ($currentPage < $totalPage) {
                $str .= '<a class="number" href="';
                $str .= !$isAjax ? $editedURL.'page='.($currentPage + 1).'"' : 'javascript:void(0);" onclick="ajaxPaging(\''.($currentPage + 1).'\'';
                $wrap_name ? $str .= ',\''.$wrap_name.'\'' : 0;
                $str .= ');"';
                $str .= '> >></a> ';

                $str .= '<a href="';
                $str .= !$isAjax ? $editedURL.'page='.$totalPage.'"' : 'javascript:void(0);" onclick="ajaxPaging(\''.$totalPage.'\'';
                $wrap_name ? $str .= ',\''.$wrap_name.'\'' : 0;
                $str .= ');"';
                $str .= '> Last</a>';
            }

            return $str;
        }

        /**
         * creating between two date
         * @param string since
         * @param string until
         * @param string step
         * @param string date format
         * @return array
         * @author Ali OYGUR <alioygur@gmail.com>
         */
        function dateRange($first, $last, $format = 'd/m/Y', $step = '+1 day' ) { 

            $dates = array();
            $current = strtotime($first);
            $last = strtotime($last);

            //if($first == 'null' || $first == null || $last == 'null' || $last == null) {
                while( $current <= $last ) { 

                    $dates[] = date($format, $current);
                    $current = strtotime($step, $current);
                }

                return $dates;
            //}

            return array();
        }


        /**************************************************************************************
        Author: S.M. Zamshed Farhan <zfprince@gmail.com>
        LAST UPDATE: 2013-01-12
        LAST MODIFY: 2013-10-02 by nguyenthang_joe2e@outlook.com
        **************************************************************************************/
        function crop_center($old_name, $new_name, $crop_width, $crop_height) {
    
            if(copy($old_name, $new_name)) {
            
                // READ WIDTH & HEIGHT OF ORIGINAL IMAGE
                list($current_width, $current_height) = getimagesize($new_name);
                
                // CENTER OF GIVEN IMAGE, WHERE WE WILL START THE CROPPING
                $left   =   ($current_width / 2) - ($crop_width / 2);
                $top    =   ($current_height / 2) - ($crop_height / 2);
                
                // BUILD AN IMAGE WITH CROPPED PART
                $new_canvas = imagecreatetruecolor($crop_width, $crop_height);
                $new_image = imagecreatefromjpeg($new_name);
                imagecopy($new_canvas, $new_image, 0, 0, $left, $top, $current_width, $current_height);
                imagejpeg($new_canvas, $new_name, 100);
            
            } else {
                // Do Nothing
            }
            
            return true;
        }

        public function crop_center_image($originFilePath, $newFilePath, $crop_width, $crop_height) {
    
            if(copy($old_name, $new_name)) {
            
                list($current_width, $current_height) = getimagesize($newFilePath);
                
                $left   =   ($current_width / 2) - ($crop_width / 2);
                $top    =   ($current_height / 2) - ($crop_height / 2);
                
                $new_canvas = imagecreatetruecolor($crop_width, $crop_height);
                $new_image = imagecreatefromjpeg($newFilePath);
                imagecopy($new_canvas, $new_image, 0, 0, $left, $top, $current_width, $current_height);
                imagejpeg($new_canvas, $newFilePath, 100);
            
            }
            
            return true;
        }

        function startsWithString($haystack, $needle) {
            return substr($haystack, 0, strlen($needle)) === $needle;
        }

        function startsWithChar($needle, $haystack)
        {
           return ($needle[0] === $haystack);
        }

        function endsWithChar($needle, $haystack)
        {
           return ($needle[strlen($needle) - 1] === $haystack);
        }
    }
?>