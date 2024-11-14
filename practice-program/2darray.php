<?php
    $flowers=array(
        array("rose","red"),
        array("lotus","pink"),
        array("merigold","yellow")
    );

    for($row=0;$row<3;$row++){
        echo "<p><b>ROW NUMBER $row <b><p>";
        echo "<ul>";
        for($col=0;$col<2;$col++){
            echo "<li>".$flowers[$row][$col]."</li>";
        }
    echo "</ul>";
    }


    $cars=array(
        array("VOLVO",30,25),
        array("AUDI",15,10),
        array("BMW",20,19),
        array("SKODA",10,8)
    );


    echo $cars[0][0]." : IN STOCK : ".$cars[0][1]. " , SOLD : " .$cars[0][2]."<br>";
    echo $cars[1][0]." : IN STOCK : ".$cars[1][1]. " , SOLD : ".$cars[1][2]."<br>";
    echo $cars[2][0]." : IN STOCk : ".$cars[2][1]. " , SOLD : ".$cars[2][2]."<br>";
    echo $cars[3][0]." : IN STOCk : ".$cars[3][1]. " , SOLD : ".$cars[3][2]."<br>";




    $marks=array(

        "ankit"=>array(
            "science"=>80,
            "maths"=>85,
            "history"=>70
        ),
        "ram"=>array(
            "science"=>90,
            "maths"=>65,
            "history"=>80
        ),
        "gopi"=>array(
            "science"=>70,
            "maths"=>95,
            "history"=>100
        ),
        "radha"=>array(
            "science"=>95,
            "maths"=>72,
            "history"=>98
        )
        );
        echo "<br><br>";
        echo "Ankit's maths subject marks : ".$marks['ankit']['maths'];
        echo "<br>";
        echo "Ram's science subject marks : ".$marks['ram']['science'];
        echo "<br>";
        echo "Gopi's history subject marks : ".$marks['gopi']['history'];
        echo "<br>";
        echo "Radha's maths subject marks : ".$marks['radha']['maths'];
        echo "<br><br>";
        echo "---ALL STUDENTS ALL OVER SUBJECT MARKS---";
        echo "<br><br>";

        foreach($marks as $mark){
            echo $mark['science']." ".$mark['maths']." ".$mark['science']."<br>";
        }
?>