<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $a=200;
        $b=100;
        $c=150;

        if($a > $b && $a > $c){
            echo "a is grater than b and c..";
        }
        echo "<br><br>";

        if($a > 115){
            echo "condition true..";
        }
        else{
            echo "condition false..";
        }
        echo "<br><br>";
        $colors = array("red", "green", "blue", "yellow"); 

foreach ($colors as $x) {
  echo "$x <br>";
}

echo "<br><br> while loop <br>";
$i = 1;
while ($i < 6) {
  echo $i;
  $i++;
}
echo "<br><br> do-while loop <br>";
$i = 8;

do {
  echo $i;
  $i++;
} while ($i < 6);
echo "<br><br> for loop <br>";
for ($x = 0; $x <= 10; $x++) {
    echo "The number is: $x <br>";
  }
    
    ?>
</body>
</html>