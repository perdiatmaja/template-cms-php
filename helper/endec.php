<?php
    require_once "forbidden-rules.php";
    
    function encrypt($str){
        $str_arr = str_split($str);
        $dec_str;

        for ($i=1; $i <= count($str_arr); $i++) {
            $index = $i-1;
            $dec_str = ord($str_arr[$index]);

            if (($dec_str >= 64 + 1) && ($dec_str <= 64 + 7)){
                $dec_str = $dec_str+3;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 64 + 8 && $dec_str <= 64 + 11){
                $dec_str = $dec_str+10;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 64 + 12 && $dec_str <= 64 + 15){
                $dec_str = $dec_str-1;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 64 + 16 && $dec_str <= 64 + 18){
                $dec_str = $dec_str-15;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 64 + 19 && $dec_str <= 64 + 21){
                $dec_str = $dec_str-3;
                $str_arr[$index] = chr($dec_str);
            } else if ($dec_str >= 64 + 22 && $dec_str <= 64 + 24){
                $dec_str = $dec_str+2;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 64 + 25 && $dec_str <= 64 + 26){
                $dec_str = $dec_str-3;
                $str_arr[$index] = chr($dec_str);
            }
            else if (($dec_str >= 96 + 1) && ($dec_str <= 96 + 7)){
                $dec_str = $dec_str+3;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 96 + 8 && $dec_str <= 96 + 11){
                $dec_str = $dec_str+10;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 96 + 12 && $dec_str <= 96 + 15){
                $dec_str = $dec_str-1;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 96 + 16 && $dec_str <= 96 + 18){
                $dec_str = $dec_str-15;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 96 + 19 && $dec_str <= 96 + 21){
                $dec_str = $dec_str-4;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 96 + 22 && $dec_str <= 96 + 24){
                $dec_str = $dec_str+2;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 96 + 25 && $dec_str <= 96 + 26){
                $dec_str = $dec_str-3;
                $str_arr[$index] = chr($dec_str);
            }
        }
        return implode($str_arr);
    }

    function decrypt($str){
        $str_arr = str_split($str);
        $dec_str;

        for ($i=1; $i <= count($str_arr); $i++) {
            $index = $i-1;
            $dec_str = ord($str_arr[$index]);

            if (($dec_str >= 64 + 1) && ($dec_str <= 64 + 7)){
                $dec_str = $dec_str-3;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 64 + 8 && $dec_str <= 64 + 11){
                $dec_str = $dec_str-10;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 64 + 12 && $dec_str <= 64 + 15){
                $dec_str = $dec_str+1;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 64 + 16 && $dec_str <= 64 + 18){
                $dec_str = $dec_str+15;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 64 + 19 && $dec_str <= 64 + 21){
                $dec_str = $dec_str+3;
                $str_arr[$index] = chr($dec_str);

            } else if ($dec_str >= 64 + 22 && $dec_str <= 64 + 24){
                $dec_str = $dec_str-2;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 64 + 25 && $dec_str <= 64 + 26){
                $dec_str = $dec_str+3;
                $str_arr[$index] = chr($dec_str);
            }
            else if (($dec_str >= 96 + 1) && ($dec_str <= 96 + 7)){
                $dec_str = $dec_str-3;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 96 + 8 && $dec_str <= 96 + 11){
                $dec_str = $dec_str-10;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 96 + 12 && $dec_str <= 96 + 15){
                $dec_str = $dec_str+1;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 96 + 16 && $dec_str <= 96 + 18){
                $dec_str = $dec_str+15;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 96 + 19 && $dec_str <= 96 + 21){
                $dec_str = $dec_str+4;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 96 + 22 && $dec_str <= 96 + 24){
                $dec_str = $dec_str-2;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 96 + 25 && $dec_str <= 96 + 26){
                $dec_str = $dec_str+3;
                $str_arr[$index] = chr($dec_str);
            }
        }
        return implode($str_arr);
    }

    function alphaToHex($str){
        $hex_str = "";
        $str_arr = str_split($str);

        for ($i=0; $i<count($str_arr); $i++){
            $hex_str .= dechex(ord($str_arr[$i]));
        }

        return $hex_str;
    }

    function hexToAlpha($str){
        $alpha_str = "";
        $str_arr = str_split($str, 2);

        for ($i=0; $i<count($str_arr); $i++){
            $alpha_str .= chr(hexdec($str_arr[$i]));
        }

        return $alpha_str;
    }
?>