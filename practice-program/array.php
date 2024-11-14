<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    echo ("display array <br>");
    $name = array("abc", "pqr", "xyz", "def");
    foreach ($name as $a) {
        echo "$a <br>";
    }

    echo ("<br><br> display array using index value <br>");
    $car = array("audi", "kia", "volvo");
    echo $car[2];

    echo ("<br><br> associative array<br>");
    $car = array("name" => "kia", "model" => "EV9", "year" => 2020);
    echo $car["model"];
    echo "<br>";
    echo $car["year"];

    echo ("<br><br>change year <br>");
    $car["year"] = 2024;
    echo ($car["year"]);

    echo ("<br><br> function <br>");
    $name1 = array("abc", "pqr", "def", "xyz");
    foreach ($name1 as $a) {
        echo "$a <br>";
    }
    echo ("<br><br> remove index 1 value using splice function <br> ");
    array_splice($name1, 1, 1);
    foreach ($name1 as $a) {
        echo "$a <br>";
    }
    echo ("<br><br> function <br>");
    $name1 = array("abc", "pqr", "def", "xyz");
    foreach ($name1 as $a) {
        echo "$a <br>";
    }

    echo ("<br><br> remove index 2 value using unset function <br> ");
    unset($name1[2]);
    foreach ($name1 as $a) {
        echo "$a <br>";
    }

    echo ("<br><br> array_diff function <br>");
    $car = array("name" => "kia", "model" => "EV9", "year" => 2020);
    $newcar = array_diff($car, ["EV9", 2020]);
    echo ($newcar["name"]);

    echo ("<br><br> array_pop function--remove last item <br>");
    $car = array("audi", "bmw", "kia", "volvo");
    foreach ($car as $a) {
        echo "$a <br>";
    }
    array_pop($car);
    echo "<br> ------result----- <br><br>";
    foreach ($car as $a) {
        echo "$a <br>";
    }

    echo ("<br><br> array_shift function--remove first item <br>");
    $car = array("audi", "bmw", "kia", "volvo");
    foreach ($car as $a) {
        echo "$a <br>";
    }
    array_shift($car);
    echo "<br> ------result----- <br><br>";
    foreach ($car as $a) {
        echo "$a <br>";
    }

    echo ("<br><br> sort function <br>");
    $car = array("volvo", "audi", "kia", "bmw");
    foreach ($car as $a) {
        echo "$a <br>";
    }
    sort($car);
    echo "<br> ------result of ascending order----- <br><br>";
    foreach ($car as $a) {
        echo "$a <br>";
    }
    rsort($car);
    echo "<br> ------result of decending order----- <br><br>";
    foreach ($car as $a) {
        echo "$a <br>";
    }
    echo "<br> ascending order ascending value..<br><br>";

    $age = array("gopi" => 21, "radha" => 12, "mohinee" => 25, "zara" => "19");
    foreach ($age as $a => $a_value) {
        echo " name : $a  |||| age : $a_value  <br>";
    }
    asort($age);
    echo "<br> ------result of ascending order value----- <br><br>";
    foreach ($age as $a => $a_value) {
        echo " name : $a ||||  age : $a_value  <br>";
    }
    ksort($age);
    echo "<br> ------result of ascending order key----- <br><br>";
    foreach ($age as $a => $a_value) {
        echo " name : $a ||||  age : $a_value  <br>";
    }
    arsort($age);
    echo "<br> ------result of decending order value----- <br><br>";
    foreach ($age as $a => $a_value) {
        echo " name : $a ||||  age : $a_value  <br>";
    }
    krsort($age);
    echo "<br> ------result of decending order key----- <br><br>";
    foreach ($age as $a => $a_value) {
        echo " name : $a ||||  age : $a_value  <br>";
    }
    echo ("<br><br> combine function <br>");

    $fname = array("gopi", "radha", "mohinee");
    $age = array("35", "37", "43");
    $c = array_combine($fname, $age);
    echo " <br>";
    print_r($c);

    echo ("<br><br> filter function <br>");

    $num = array(12, 1, 3, 15, 13, 21, 19, 49, 57, 2, 40, 80);
    function odd($var)
    {
        if ($var % 2 != 0) {
            return ($var);
        }
    }
    echo " <br>";
    print_r(array_filter($num, "odd"));

    echo ("<br><br> display only key using array_keys function <br>");

    $a = array("Volvo" => "XC90", "BMW" => "X5", "kia" => "EV9");
    echo " <br>";
    print_r(array_keys($a));

    echo ("<br><br> array_merge function <br>");

    $a1 = array("red", "green");
    $a2 = array("blue", "yellow");
    echo " <br>";
    print_r(array_merge($a1, $a2));


    echo ("<br><br> array_push function--add item <br>");

    $car = array("audi", "bmw", "kia", "volvo");
    foreach ($car as $a) {
        echo "$a <br>";
    }
    array_push($car, "toyota", "shift");
    echo "<br> ------result----- <br><br>";
    foreach ($car as $a) {
        echo "$a <br>";
    }

    echo ("<br><br> array_replace function--replace item <br>");

    $a1 = array("yellow", "green");
    $a2 = array("red", "blue");

    foreach ($a1 as $a) {
        echo "$a <br>";
    }
    echo " <br>";
    print_r(array_replace($a1, $a2));


    echo ("<br><br> array_reverse function <br>");
    $car = array("volvo", "audi", "kia", "bmw");
    foreach ($car as $a) {
        echo "$a <br>";
    }
    echo " <br>";
    print_r(array_reverse($car));

    echo ("<br><br> array_search function <br>");
    $a = array("1" => "red", "2" => "green", "3" => "blue");
    foreach ($a as $a1) {
        echo "$a1 <br>";
    }
    echo "<br> --result-- <br>";
    echo array_search("green", $a);

    echo ("<br><br> array_sum function <br>");
    $a = array(5, 15, 25);
    foreach ($a as $a1) {
        echo "$a1 <br>";
    }
    echo "<br> --sum-- <br>";
    echo array_sum($a);

    echo ("<br><br> compact function <br>");
    $firstname = "Peter";
    $lastname = "Griffin";
    $age = "41";

    $result = compact("firstname", "lastname", "age");

    print_r($result);

    echo ("<br><br> count function <br>");
    $cars = array("Volvo", "BMW", "Toyota");
    echo count($cars);
    ?>
</body>

</html>