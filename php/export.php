<?php
    function cleanData(&$str)
    {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }

    $mysql = new mysqli('eporqep6b4b8ql12.chr7pe7iynqr.eu-west-1.rds.amazonaws.com', 'euu7bk3xyma0vpnw', 'y86jquk4ya29ia69', 'q2es9sphx9i4qtq9');
    $filename = "results.xls";

    $file_name = "buffer.txt";
    $query = file_get_contents($file_name);;

    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Content-Type: application/vnd.ms-excel");

    $flag = false;

    mysqli_query($mysql, 'SET character_set_database = cp1251_general_ci'); 
    mysqli_query ($mysql, "SET NAMES 'cp1251'");


    $result = mysqli_query($mysql, $query);

    while($row = mysqli_fetch_assoc($result)) {
        if(!$flag) {
            echo implode("\t", array_keys($row)) . "\r\n";
            $flag = true;
        }    
        array_walk($row, 'cleanData');
        echo implode("\t", array_values($row)) . "\r\n";
    }
    exit;
?>