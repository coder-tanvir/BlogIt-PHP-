<?php
$articles=["lionel Messi",
            "Cristiano Banaldo",
            "Neymar"];

            echo $articles[0];

$articles2=array("Mbappe","Veratti","Nani");

echo $articles2[2];

var_dump($articles);

//Assigning indexes
$articlesassign=[12=>"twelvth post",1=>"1st post","second post"];

echo $articlesassign[12];

//Assigning strings as index (Associative array)

$players=["first"=>"Lionel Messi","second"=>"Lewandowski"];
echo $players["first"];

///////////////////////////////
/////Multidimensional Arrays
$articles33=[["lionel Messi","2009,2010,2011,2015,2019,2021"],
            ["Cristiano Banaldo","2012,2013,2014"],
            ["Neymar","2020,2022,2023"]];

            echo $articles33[0][0];
            echo $articles33[0][1];
        echo "//////////////////////////////";    
foreach($articles33 as $aa){
    echo $aa[0];
    echo $aa[1];
}

foreach($articles as $key=>$aa){
    echo $key . 'index is' . $aa; 
}

