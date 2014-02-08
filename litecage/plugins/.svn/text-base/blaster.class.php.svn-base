<?php 

    class blaster {

        static function fixnum($num) {
            $num = str_replace(array('(',')','-','.'), '', $num);
            return substr($num, 0, 2) == '+1' ? $num : substr($num,0,1)=='1' ? '+'.$num : '+1'.$num;
        }

        static function sendsms($from, $to, $message) {
            $from = self::fixnum($from);
            $to = self::fixnum($to);
            $twilio = new Services_Twilio(TWILIO_SID, TWILIO_TOKEN);
            $sms = $twilio->account->sms_messages->create($from, $to, $message);
        }

    }
