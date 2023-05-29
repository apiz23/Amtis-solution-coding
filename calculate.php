<?php
    function calculateHour($i){
        $voltage = $current = $currentRate = 0;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $voltage = $_POST["voltage"];
            $current = $_POST["current"];
            $currentRate = $_POST["current-rate"];
        }
        $energy = $voltage * $current / 1000 * $i;
        $total = $energy * ($currentRate / 100);
        return [$total, $energy];
    }
?>