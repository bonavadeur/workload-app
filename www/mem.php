<?php
    ini_set('memory_limit', '-1');
    $num = intval($_GET['value']);
    $memnum = intval($_GET['memory']);

    if ($num < 1) {
        $num = intval($_POST['value']);
    }
   
    if ($memnum < 1) {
        $memnum = intval($_POST['memory']);
    }

    // echo "<html>";
    // echo "<head> <title> Memory Test </title> </head>";
    // echo "<body> <p> <center>";
    // echo "<h2> Memory Test by constructing a big string </h2>";

    if($num < 0) {
        $num = 0;
    }

    if($memnum < 1) {
        $memnum = 1;
    }
    
    $maxnum = 4096;
    if($memnum > $maxnum) {
        echo "memory usage limit: [1--$maxnum]MB. <br>";
        $memnum = $maxnum;
    }

    $rnum = $num;
    if($num > 1) {
        $rnum = rand($num, $num+3);
    }
    $rmemnum = $memnum *1024*1024;


    echo "sleep $num ms, with $memnum MB memory\n";

    $base = str_repeat("helloworldhelloworld", 100);
    $base10w = str_repeat($base, 50);
    $base1m = str_repeat($base10w, 10);
    $bigmem = str_repeat($base1m, $rmemnum/(1000*1000.0));
    #$bigmem = array_fill(0, $rmemnum, '');
    
    $usedMem = round(memory_get_usage()/(1024*1024.0), 2);
    echo "memory used: $usedMem MB\n";

    // usleep(1000*$rnum);
    usleep(1000*$num);

    unset($bigmem);
    // echo "<br><br>free memory...<br><br>";
    $usedMem = round(memory_get_usage()/(1024*1024.0), 2);
    // echo "memory used 2: <b> $usedMem MB </b>.";

    // echo "</center> </p>";
    // include 'footer.php';
    // echo "</body></html>";
?>
