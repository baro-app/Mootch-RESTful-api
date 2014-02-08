<?php

    class sanitizor {

        public static function clean_phone($phone) {
            $phone = str_replace(array('(',')','.','-','+',' '), '', $phone);
            if(substr($phone,0,1) == '1') {
                $phone = substr($phone, 1);
            }
            return $phone;
        }

        static function brute_extract_numbers($lines, $enclosure) {
            $numbers = array();
            for($i=0;$i<count($lines);$i++) {
                $array_values = str_getcsv($lines[$i],',',$enclosure);
                if(($id = self::get_phone_index($array_values)) > -1) $numbers[] = $array_values[$id];
            }
            return $numbers;
        }

        public static function get_phone_index($phone_array) {
            if(!is_array($phone_array)) return -1;
            for($i=0; $i<count($phone_array); $i++) {
                $clean_num = self::clean_phone($phone_array[$i]);
                if(is_numeric($clean_num) && strlen($clean_num)==10) {
                    return $i;
                }
            }
            return -1;
        }

    }
