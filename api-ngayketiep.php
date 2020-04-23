<?php


require 'restful_api.php';

class api extends restful_api 
{

    function __construct()
    {
        parent::__construct();
    }

    function checkngayketiep()
    {
        if ($this->method == 'GET')
        {
            $this->response(200, $this->getngayketiep($this->params));
        }
    }

    function getngayketiep($params)
    {
        if(empty($params[0])||empty($params[1])||empty($params[2])||!empty($params[3]))
        {
           return array("status" => false, "data" => array());
        }
        else
        {
            $d=(double)$params[0];
            $m=(double)$params[1];
            $y=(double)$params[2];
            if ($d > 31 || $m >12) {
            return $data = "Nhap ngay/thang khong dung";

            } 
            elseif (($d == 31 && $m == 2)||($d == 30 && $m == 2)||($d == 31 && $m == 4)||($d == 31 && $m == 6)||($d == 31 && $m == 9)||($d == 31 && $m == 11)) 
            {
               return $data = "Nhap ngay khong dung voi thang";
            }
            elseif (($d == 31 && $m == 1)||($d == 31 && $m == 3)||($d == 31 && $m == 5)||($d == 31 && $m == 7)|| ($d == 31 && $m == 8)||($d == 31 && $m == 10)||($d == 31 && $m == 12)||($d == 28 && $m == 2)||($d == 30 && $m == 4)||($d == 30 && $m == 6)||($d == 30 && $m == 9)||($d == 30 && $m == 11)) 
            {
               if($m ==12)
               {
                   $ngay = 1;
                   $thang =1;
                   $nam = $y +1;
                   return $data= "Ngay tiep theo la:ngay:".$ngay.",thang: ".$thang.", nam:".$nam."";
               }
                else 
                {
                    $ngay = 1;
                    $thang =$m +1;
                    $nam = $y;
                   return $data= "Ngay tiep theo la:ngay:".$ngay.",thang: ".$thang.", nam:".$nam."";
                }                
            }
            else
            {
                    $ngay = $d+1;
                    $thang = $m;
                    $nam = $y;
                    return $data= "Ngay tiep theo la:ngay:".$ngay.",thang: ".$thang.", nam:".$nam."";
            }
        }
    }

   
}

$user_api = new api();
