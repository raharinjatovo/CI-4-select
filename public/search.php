<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "covid";
$myPDO = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
if(isset($_POST["query"]))
{
$output='';
$result = $myPDO->query('SELECT countriesAndTerritories FROM geo_dist where countriesAndTerritories like "%'.$_POST["query"].'%"  group by countriesAndTerritories ');
$output ='<ul class="list-unstyled">';
foreach($result as $row)
    {
       
         $output .="<li><a href='http://localhost/CI/public/home/select/".$row['countriesAndTerritories']."'>".str_replace("_"," ",$row['countriesAndTerritories'])."</li>";
    }
     $output .="</ul>";



     echo $output;
}


 ?>
