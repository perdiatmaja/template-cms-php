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
                // echo chr($dec_str)." ".$dec_str."\n";
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
                
                $dec_str = $dec_str-4;
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

            if (($dec_str >= 64 + 1) && ($dec_str <= 64 + 3)){
                $dec_str = $dec_str+15;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 64 + 4 && $dec_str <= 64 + 10){
                $dec_str = $dec_str-3;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 64 + 11 && $dec_str <= 64 + 14)
            {
                $dec_str = $dec_str + 1;
                $str_arr[$index]=chr($dec_str);
            }
            else if ($dec_str >= 64 + 15 && $dec_str <= 64 + 17)
            {
                $dec_str = $dec_str +4;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 64 + 18 && $dec_str <= 64 + 21)
            {
                $dec_str = $dec_str - 10;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 64 + 22 && $dec_str <= 64 + 23)
            {
                $dec_str = $dec_str + 3;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 64 + 24 && $dec_str <= 64 + 26)
            {
                $dec_str = $dec_str - 2;
                $str_arr[$index] = chr($dec_str);
            }
            else if (($dec_str >= 96 + 1) && ($dec_str <= 96 + 3))
            {
                $dec_str = $dec_str + 15;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 96 + 4 && $dec_str <= 96 + 10)
            {
                $dec_str = $dec_str - 3;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 96 + 11 && $dec_str <= 96 + 14)
            {
                $dec_str = $dec_str + 1;
                $str_arr[$index]=chr($dec_str);
            }
            else if ($dec_str >= 96 + 15 && $dec_str <= 96 + 17)
            {
                $dec_str = $dec_str + 4;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 96 + 18 && $dec_str <= 96 + 21)
            {
                $dec_str = $dec_str - 10;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 96 + 22 && $dec_str <= 96 + 23)
            {
                $dec_str = $dec_str + 3;
                $str_arr[$index] = chr($dec_str);
            }
            else if ($dec_str >= 96 + 24 && $dec_str <= 96 + 26)
            {
                $dec_str = $dec_str - 2;
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

    function addKey($str, $key){
        $result = "";
        $str_arr = str_split($str);
        $key_arr = str_split($key);

        $str_len = count($str_arr);
        $key_len = count($key_arr);

        $mod = $str_len%$key_len;

        if ($key_len <= $str_len){
            $i = 0;
            while ($i < $str_len) {
                $dif = $str_len-$i;
                $loop = $dif===$mod? $mod : $key_len;
                for ($j=0; $j < $loop; $j++) {
                    $key_string = "";
                    $key_sum = ord($str_arr[$j+$i])+ord($key_arr[$j]);
                    
                    $key_string .= $key_sum;

                    if (strlen((String)$key_sum) < 2) $key_string = "00".(String)$key_sum;
                    else if (strlen((String)$key_sum) < 3) $key_string ="0".(String)$key_sum;

                    $result .= $key_string;
                }
                $i += $loop;
            }
        } else {
            $i = 0;
            while ($i < $str_len) {
                $result .= ord($str_arr[$i])+ord($key_arr[$i]);
                $i++;
            }
        }

        return $result;
    }

    function removeKey($str, $key){
        $result = "";

        $str_arr = str_split($str, 3);
        $key_arr = str_split($key);

        $str_len = count($str_arr);
        $key_len = count($key_arr);

        $mod = $str_len%$key_len;

        if ($key_len <= $str_len){
            $i = 0;
            while ($i < $str_len) {
                $dif = $str_len-$i;
                $loop = $dif===$mod? $mod : $key_len;
                for ($j=0; $j < $loop; $j++) {
                    $str_int = (int)$str_arr[$j+$i];
                    $key_int = (int)ord($key_arr[$j]);

                    $key_diff = $str_int > $key_int? $str_int - $key_int:$key_int-$str_int;

                    // echo  $str_int."-".$key_int." ".chr($key_diff)." ".$key_diff."\n";

                    $result .= chr($key_diff);
                }
                $i += $loop;
            }
        } else {
            $i = 0;
            while ($i < $str_len) {
                $str_int = (int)$str_arr[$i];
                $key_int = (int)ord($key_arr[$i]);
                $key_diff = $str_int > $key_int? $str_int - $key_int:$key_int-$str_int;
                
                $result .= chr($key_diff);
                $i++;
            }
        }

        return $result;
    }
?>