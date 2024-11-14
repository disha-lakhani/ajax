<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $x="      Hey My Name Is Disha..      ";
    echo ($x);
    echo ("<br><br> length <br>");
    echo strlen($x);
    echo ("<br><br> total words <br>");
    echo str_word_count($x);
    echo ("<br><br> position <br>");
    echo strpos($x,"disha");
    echo ("<br><br> uppercase <br>");
    echo strtoupper($x);
    echo ("<br><br> lowercase <br>");
    echo strtolower($x);
    echo ("<br><br> reverse <br>");
    echo strrev($x);
    echo ("<br><br> trim-whitespace remove <br>");
    $z= trim($x);
    echo trim($x);
    echo ("<br> length after trim <br>");
    echo strlen($z);
    echo ("<br><br> explode - display result with index value<br>");
    $y=explode(" ",$x);
    print_r($y);
    echo ("<br><br> concate string <br>");
    $a="hellloooo";
    $b="world..!!!";
    $c=$a.$b;
    echo($c);
    echo ("<br><br> with space using dots <br>");
    $c=$a ." ". $b;
    echo($c);
    echo ("<br><br> without using dots <br>");
    $c="$a $b";
    echo($c);



    echo ("<br><br><br> new string function<br>");
    $p="Hey My Name Is Disha..";
    echo ("<br>". $p);
    echo ("<br><br> slicing 4 to 16 <br>");
     echo substr($p,4,16);
     echo ("<br><br> slicing to the end<br>");
     echo substr($p,7);
     echo ("<br><br> slicing from the end<br>");
     echo substr($p,-7 , 5);

     echo ("<br><br> join function <br>");
     $arr=array("hello","...","how","are","you","?..");
     echo join(" ",$arr);
     echo ("<br><br> repeat function <br>");
     echo str_repeat("hello.. <br>" ,10);
     echo ("<br><br> replace function <br>");
     echo ("hello world <br>");
     echo ("replace-----  <br>");
     echo str_replace("world","disha","hello world");
    ?>
</body>
</html>