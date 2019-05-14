<?php

require("set.php");

$pripoj= mysqli_connect($SQL_Server,$SQL_Uzivatel,$SQL_Password,$Databaze ) ;

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}



$latitude=$_POST['lat'];

$longitude=$_POST['long'];

$jmeno=$_POST['name'];

$zprava=$_POST['textarea'];  

$soubor_name = ($_FILES["file"]["name"]);

$soubor = ($_FILES["file"]["tmp_name"]);



 





$sql="INSERT INTO sptm VALUES ('$latitude','$longitude',null, '$jmeno', now(), '$zprava', '$soubor_name')";



$vysledek = mysqli_query($pripoj, $sql);



if ($vysledek)

{



echo '<html>

<head>

    <meta http-equiv="refresh" content="1;url=http://jirikominek.cz/sptm/examples/sptm.html" />



</head>

<body>

   <div>';

   echo "<img src= http://jirikominek.cz/sptm/img/hlaska.png width=50% style= 'position: absolute; left:30%; top: 30%';>";

    if (!empty($soubor))

{

    if (move_uploaded_file($soubor, "./obrazky/".$soubor_name))

        {

        chmod ("./obrazky/".$soubor_name, 0646);

        

        }

    else

        {

        echo "<b>Chyba - soubor nebyl nahran</b><BR>";

        }

}

     echo '</div></body></html>';



  

}

else

print "sorry";

        

mysqli_close($pripoj);

 

?>

