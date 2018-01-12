<?php
//sessie starten
session_start();
//zorgen dat var plaatje een waarde van 1 heeft als er nog niet op "volgende" gedrukt is
if(!isset($_POST["verzend"])){
    $_SESSION["plaatje"] = 1;
};

?>

<!DOCTYPE html>
<html>
    <head>
        <title>index</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- verbinden met stylesheets -->
        <link rel="stylesheet" href="css/themes/greenbluethingy.css" />
        <link rel="stylesheet" href="css/themes/greenbluethingy.min.css" />
        <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
        <link rel="stylesheet" href="css/themes/jquery.mobile.structure-1.4.5.min.css" /> 
        <!-- verbinden met scripts-->
        <script src="src/jquery-1.11.1.min.js"></script> 
        <script src="src/jquery.mobile-1.4.5.min.js"></script>
        <!-- zorgen dat plaatjes meeschalen-->
        <style> img {max-width: 100%; max-height: 100%;} </style>
    </head>
    
    <body>
        <div data-role="header">
            <h1>Vingers tellen</h1>
        </div>
        
        <!-- de volgende knop in een form zodat het verstuurd en opgehaald kan worden -->
        <form action="vingerstellen.php" method = "post">
            <input type= "submit" name="verzend" value="Volgende">
        </form>
        
        <?php
        if(isset($_POST["verzend"])){
            //Dit stukje zegt dat elke keer dat er op "volgende" gedrukt wordt de var plaatje met 1 opgehoogd wordt
            $_SESSION["plaatje"] = $_SESSION["plaatje"] + 1;
        };
        
        //hier in de if statement elke waarde van var. plaatje een andere echo en dus andere afbeelding geven 
        if($_SESSION["plaatje"] == 1){
            //plaatjes gedownload uit broncode voorbeeld op informatica actief
            echo "<img src ='images/hand1.jpg' ";
        }
        
        elseif($_SESSION["plaatje"] == 2){
            echo "<img src ='images/hand2.jpg' ";
        }
        
        elseif($_SESSION["plaatje"] == 3){
            echo "<img src ='images/hand3.jpg' ";
        }
        
        elseif($_SESSION["plaatje"] == 4){
            echo "<img src ='images/hand4.jpg' ";
        }
        
        elseif($_SESSION["plaatje"] == 5){
            echo "<img src ='images/hand5.jpg' ";
            //na 5 moet de sessie opnieuw beginnen zodat plaatje weer 1 is en de eerste afbeelding weer te zien is
            //dit doen met session_destroy
            session_destroy();
        }
        else{
            //melding als er ergens wat fout ging met de afbeeldingen en dus de waarde van var plaatje
            echo "Er ging iets mis...";
        };
         
         ?>
        
    </body>
</html>