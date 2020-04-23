<?php


require 'restful_api.php';

class api extends restful_api 
{

    function __construct(){
        parent::__construct();
    }


    function checktamgiac()
    {
        if($this->method == 'GET')
        {
            $this->response(200,$this->gettamgiac($this->params));
        }
    }

    function gettamgiac($_GET['gettamgiac'])
    {
        if(isset($_GET['gettamgiac']))
	{
            $a = isset($_GET['a']) ? $_GET['a'] : '';
            $b = isset($_GET['b']) ? $_GET['b'] : '';
            $c = isset($_GET['c']) ? $_GET['c'] : '';
			
            if(($a + $b) <= $c || ($b + $c) <= $a || ($c + $a) <= $b)
            {
               return $data="Day khong phai tam giac";
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
