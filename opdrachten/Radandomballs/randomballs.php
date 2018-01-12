<!DOCTYPE html>
<html>
    <head>
        <title>index</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- verbinden met stylesheets -->
        <link rel="stylesheet" href="css/themes/greenbluethingy.css" />
        <link rel="stylesheet" href="css/themes/greenbluethingy.min.css" />
        <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
        <link rel="stylesheet" href="css/themes/jquery.mobile.structure-1.4.5.min.css" /> 
        <!-- verbinden met scripts-->
        <script src="src/jquery-1.11.1.min.js"></script> 
        <script src="src/jquery.mobile-1.4.5.min.js"></script>
    </head>
    
    <body>
        <div data-role="header">
            <h1>Random balls</h1>
        </div>
        
        <!-- form die de userinput naar de pagina post -->
        <form action="randomballs.php" method="post">
            <div>
                <label for="rood" style='color:#FFF;'>Aantal rode ballen:</label>
                <!-- met een range input zorgen dat er een slider gebruikt kan worden als input-->
                <input type="range" name="rood" id="gewicht" data-highlight="true" min="1" max="9" value="1" step="1">
            </div>
            <div>
                <label for="blauw" style='color:#FFF;'>Aantal blauw ballen:</label>
                <input type="range" name="blauw" id="blauw" data-highlight="true" min="1" max="9" value="1" step="1">
            </div>
            <div>
                <label for="aantal" style='color:#FFF;'>Kies een aantal:</label>
                <input type="range" name="aantal" id="aantal" data-highlight="true" min="1" max="100" value="1" step="1">
            </div>
            <input type= "submit" name="verzend" value="Stimuleer">
        </form>
        
         <?php
         //kijken of er op verzend gedrukt is
         if(isset($_POST["verzend"])){
            //userinput uit form ophalen
            $rood = $_POST["rood"];
            $blauw = $_POST["blauw"];
            $aantal = $_POST["aantal"];
            $totaal = $rood + $blauw;
            
            //variabelen aanmaken voor rood en blauw totaal
            $RoodTotaal = 0;
            $BlauwTotaal = 0;
            
            //checken of er overal iets ingevuld is zodat er geen infinite loop ontstaat
            if(!empty($rood) && !empty($blauw) && !empty($aantal)){
                
                //var aantalgetrokken aanmaken
                $AantalGetrokken = 0;
                //een while loop om het aantal ballen dat getrokken is en nog getrokken moet worden bij te houden
                while($AantalGetrokken < $aantal){
                    //als de loop loopt, verhoogt hij aantal getrokken met 1 en kiest hij een random getal voor $trek
                    $AantalGetrokken++;
                    $trek = rand(1,$totaal);
                    
                    //kijken of $trek groter of kleiner is dan het aantal rode ballen
                    if($trek <= $rood){
                        //R echo'en als $trek kleiner is dan $rood en $roodtotaal ophogen met 1
                        echo "R ";
                        $RoodTotaal++;
                    }
                    else{
                        //B echo'en als $trek groter is dan $rood en $blauwtotaal ophogen met 1
                        echo "B ";
                        $BlauwTotaal++;
                    };
                };
                
                //de totale uitkomst laten zien
                echo "<br>Er zijn $RoodTotaal rode ballen getrokken en $BlauwTotaal blauwe ballen.";
                
            }
            else{
                //melding als user niet alle velden ingevuld heeft
                echo "Er ging iets mis... Vul ALLE velden in.";
            };
            
         };
         ?>
        
    </body>
</html>