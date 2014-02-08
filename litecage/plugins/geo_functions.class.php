<?php

class geo_functions {

    static function calc_distance($point1, $point2) {
        $radius = 6371; //km
        $delta_lat = deg2rad($point2[0] - $point1[0]);
        $delta_lon = deg2rad($point2[1] - $point1[1]);
        $lat1 = deg2rad($point1[0]);
        $lat2 = deg2rad($point2[0]);
        $a = sin($delta_lat/2) * sin($delta_lat/2) + sin($delta_lon/2) * sin($delta_lon/2) * cos($lat1) * cos($lat2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        return $radius * $c;
    }

}

?>
