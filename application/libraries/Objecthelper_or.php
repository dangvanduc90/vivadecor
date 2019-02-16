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


        public function genPageLink($currentPage,$linkRange,$totalPage,$url) {

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
                $str.='<a href='.$editedURL.'page=1>First</a> ';
                $str.='<a href='.$editedURL.'page='.($currentPage - 1).'> <<</a> ';
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
                $str.= '<a href='.$editedURL.'page='.($currentPage + 1).'> >></a> ';
                $str.='<a href='.$editedURL.'page='.$totalPage.'> Last</a>';
            }

            return $str;
        }
    }
?>