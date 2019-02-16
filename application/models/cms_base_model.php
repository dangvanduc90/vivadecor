<?php
    class Cms_base_model extends CI_Model {
        function __construct() {
            parent::__construct();
            $this -> load -> library('Objecthelper');

            global $lang;
            $lang = $this -> lang -> mci_current();

            $timezone = "Asia/Saigon";
            if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
        }

        public function replaceUnicode($str){

           $str = $this -> objecthelper -> replaceUnicode($str);
           return $str;
        }

        public function gen_slug($str) {
            return $this -> replaceUnicode($str);
        }

        public function getUrl() {
            $query = $_SERVER['QUERY_STRING'] ? '?'.$_SERVER['QUERY_STRING'] : '';
            return str_replace('index.php','',$this->config->site_url().$this->uri->uri_string(). $query);
            //return $_SERVER['REQUEST_URI'];
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

            $url = $this -> objecthelper -> editURL($url);
            return $url;

        }

        public function genPageLink($currentPage,$linkRange,$totalPage,$url) {

            $link = $this -> objecthelper -> genPageLink($currentPage,$linkRange,$totalPage,$url);
            return $link;

        }

        public function getUserPermission($funcName = false, $roleId = false) {
          $selectClause = " select permiss.RolesID, permiss.PermissionNumber, permiss.PermissFuncID, perfunc.FuncName
                              from permissions as permiss inner join permissfunc as perfunc
                                  on permiss.PermissFuncID = perfunc.PermissFuncID
                                      where RolesID = ? and perfunc.FuncName = ? ";
          $result = $this -> db -> query($selectClause,array($roleId,$funcName));

          if($result)
            return $result -> row_array();
          else return false;
        }
    }


?>