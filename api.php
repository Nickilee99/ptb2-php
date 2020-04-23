<?php


require 'restful_api.php';

class api extends restful_api {

    function __construct(){
        parent::__construct();
    }

    function checkngayketiep(){
        if ($this->method == 'GET'){
            $this->response(200, $this->getngayketiep($this->params));
        }
    }

    function checktamgiac()
    {
        if($this->method == 'GET')
        {
            $this->response(200,$this->gettamgiac($this->params));
        }
    }

    function gettamgiac($params)
    {
        if(empty($params[0])||empty($params[1])||empty($params[2])||!empty($params[3]))
        {
            return array("status" => false, "data" => array());
        }
        else{
            $a=(double)$params[0];
            $b=(double)$params[1];
            $c=(double)$params[2];
            if(($a + $b) > $c && ($b + $c) > $a && ($c + $a) > $b)
            {
               return $data="Day la tam giac thuong";
            }
            elseif($a == $b && $b == $c)
            {
                return $data = "Day la tam giac deu";
            }
            elseif($a == $b || $a == $c || $c == $b)
            {
                if($a * $a == $b * $b + $c * $c || $b * $b == $a * $a + $c * $c || $c * $c == $a * $a + $b *$b)
                {
                    return $data = "Day la tam giac vuong can";
                }
                else
                {
                    return $data = "Day la tam giac can";
                }
            }
            elseif($a2==$b2+$c2 || $b2==$a2+$c2 || $c2==$a2+$b2)
            {
                return $data = "Day la tam giac vuong";
            }
            else
            {
                return $data = "Day la tam giac thuong";
            }
        }
    }

   
}

$user_api = new api();
