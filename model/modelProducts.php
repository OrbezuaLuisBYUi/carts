<?php
class model_products
{
    public function __construct()
    {

    }

    public function addItem($key,$amount)
    {
        $cookie_name = "products";
        $count = 0;
        if(isset($_COOKIE[$cookie_name]))
        {
            $found = 0;
            $string = "";
            $seleccionados = explode(',',$_COOKIE[$cookie_name]);
            $num = count($seleccionados);
            for($i = 0; $i < $num; $i++) {
                if($seleccionados[$i] != '') {
                    list($idProduct, $amountProduct) = explode(':', $seleccionados[$i]);
                    if($idProduct == $key)
                    {
                        $found = 1;
                        if($string == "")
                        {
                            $string = $idProduct.":".$amount;
                        }
                        else
                        {
                            $string = $string.",".$idProduct.":".$amount;
                        }
                    }
                    else
                    {
                        if($string == "")
                        {
                            $string = $idProduct.":".$amountProduct;
                        }
                        else
                        {
                            $string = $string.",".$idProduct.":".$amountProduct;
                        }
                    }

                }
            }

            if($found == 1)
            {
                $count = $num;
                setcookie($cookie_name, $string, time() + (86400 * 10), "/"); // 86400 = 1 day
            }
            else
            {
                $count = $num+1;
                setcookie($cookie_name, $_COOKIE[$cookie_name].",".$key.":".$amount, time() + (86400 * 10), "/"); // 86400 = 1 day
            }
        }
        else
        {
            $count = 1;
            setcookie($cookie_name, $key.":".$amount, time() + (86400 * 10), "/"); // 86400 = 1 day
        }

        return $count;
    }
    public function deleteItem($key)
    {
        $cookie_name = "products";
        $count = 0;
        if(isset($_COOKIE[$cookie_name]))
        {
            $string = "";
            $seleccionados = explode(',',$_COOKIE[$cookie_name]);
            $num = count($seleccionados);
            for($i = 0; $i < $num; $i++) {
                if($seleccionados[$i] != '') {
                    list($idProduct, $amountProduct) = explode(':', $seleccionados[$i]);
                    if($idProduct != $key)
                    {
                        $count++;
                        if($string == "")
                        {
                            $string = $idProduct.":".$amountProduct;
                        }
                        else
                        {
                            $string = $string.",".$idProduct.":".$amountProduct;
                        }
                    }
                }
            }

            setcookie($cookie_name, $string, time() + (86400 * 10), "/"); // 86400 = 1 day
        }

        return $count;
    }
}