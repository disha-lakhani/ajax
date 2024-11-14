<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo (" value of pi <br>");
    echo pi();
    echo ("<br><br> maximum and minimum <br>");
    echo ("minimum <br>");
    echo min(20, 200, 500, -20, -1, 6, 4000);
    echo ("<br>maximum <br>");
    echo max(20, 200, 500, -20, -1, 6, 4000);
    echo ("<br><br> positive <br>");
    echo abs(-45.6);
    echo ("<br><br> squre root <br>");
    echo sqrt(144);
    echo ("<br><br> round- nearest value <br>");
    echo round(19.8) . "<br>";
    echo round(19.3);
    echo ("<br><br> random number <br>");
    echo rand();
    echo ("<br><br> random number between 10-100<br>");
    echo (rand(10, 100));


    echo ("<br><br> ceil function<br>");
    echo (ceil(9.1));
    echo ("<br>");
    echo (ceil(-8.1));
    echo ("<br>");
    echo (ceil(-10.5));
    echo ("<br>");
    echo (ceil(5.9));
 
   
    echo ("<br><br> floor function<br>");
    echo (floor(9.1));
    echo ("<br>");
    echo (floor(-8.1));
    echo ("<br>");
    echo (floor(-10.5));
    echo ("<br>");
    echo (floor(5.9));
 

    echo ("<br><br> power function<br>");
    echo (pow(2,4));
    echo ("<br>");
    echo (pow(8,3));
    echo ("<br>");
    
    ?>

</body>

</html>