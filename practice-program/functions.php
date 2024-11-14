<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    function sum($a , $b){
        $c=$a+$b;
        return $c;
    }

    echo "5 + 10 = " .sum(5,10) . "<br>";
    echo "25 + 100 = " .sum(25,100) . "<br>";
    echo "40 + 30 = " .sum(40,30) . "<br>";

    echo "<br><br>multiple number sum <br>";
    function sumNumbers(...$x) {
        $n = 0;
        $len = count($x);
        for($i = 0; $i < $len; $i++) {
          $n += $x[$i];
        }
        return $n;
      }
      
      $a = sumNumbers(5, 2, 6, 2, 7, 7);
      echo $a;
    ?>
</body>
</html>