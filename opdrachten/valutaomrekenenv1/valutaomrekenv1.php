<!DOCTYPE html>
<html>
    <head>
        <title>index</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- verbinden met stylesheets -->
        <link rel="stylesheet" href="css/themes/BroodBanket.css" />
        <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
        <link rel="stylesheet" href="css/themes/jquery.mobile.structure-1.4.5.min.css" /> 
        <!-- verbinden met scripts-->
        <script src="src/jquery-1.11.1.min.js"></script> 
        <script src="src/jquery.mobile-1.4.5.min.js"></script>
    </head>
    
    <body>
        <div data-role="header">
            <h1>Valuta</h1>
        </div>
        
        <p style="color:#FFF; ui-content">Met deze WebApp kun je valuta omrekenen naar euro's</p>
        
        <div>
            <form = action "valutaomrekenenv1.php" method = "post">
                <div>
                    <label for="uren">Bedrag:</label>
                    <!-- type = range zodat het een slider wordt-->
                    <input type="range" name="bedrag" id="bedrag" data-highlight="true" min="1" max="1000" value="1" step="1">
                </div>
                
                <!-- fieldset gebruikten om de drie opties naast elkaar te kunnen krijgen-->
                <fieldset data-role="controlgroup" data-mini="true" data-type="horizontal">
                    <legend style='color:#FFF;'>Welke valuta lever je in?</legend>
                    <label for="amdollar">Am.Dollar</label>
                    <input name="valuta" id="amdollar" type="radio" value="amdollar">
                    <label for="engpond">Eng.Pond</label>
                    <input name="valuta" id="engpond" type="radio" value="engpond">
                    <label for="japyen">Jap.Yen</label>
                    <input name="valuta" id="japyen" type="radio" value="japyen">
                </fieldset>
                <input type= "submit" name="verzend" value="Bereken">
            </form>
        </div>
        
        <?php
        //controlleren of op verzend gedrukt is
         if(isset($_POST["verzend"])){
             //variabelen ophalen
             $bedrag = $_POST["bedrag"];
             $valuta = $_POST["valuta"];
             //if statement die uniek is voor elke verschillende soort valuta
             if($valuta == "amdollar"){
                 //var waar mee gerekend wordt naam geven
                 $valutareken = "Dollar";
                 //rekenen, 1 dollar is ong 85 cent
                 $bedragtotaal = $bedrag * 0.85;
                 //echo = 1 zegt later dat de uitkomst ge-echo'd kan worden
                 $echo = 1;
             }
             //elseif gebruiken omdat het meerdere opties zijn
             elseif($valuta == "engpond"){
                 $valutareken = "Pond";
                 //rekenen, 1 pond is ongeveer 1 euro 13 cent
                 $bedragtotaal = $bedrag * 1.13;
                 $echo = 1;
             }
             elseif($valuta == "japyen"){
                 $valutareken= "Yen";
                 //rekenen, 1 yen is ongeveer 0,754 cent
                 $bedragtotaal = $bedrag * 0.00754;
                 $echo = 1;
             }
             else{
                 //echo als er geen valuta ingevuld is en dus de ifstatement niets doorkomt
                 echo "<font style='color:#FFF; ui-content; margin-left:10px; margin-right:10px;'>Geen valuta ingevuld.</font>";
                 $echo = 0;
             };
             //controlleren of echo 1 is
            if($echo==1){ 
                //echo'en als echo 1 is
                echo "<font style='color:#FFF; ui-content; margin-left:10px; margin-right:10px;'>$bedrag $valutareken is omgerekend $bedragtotaal euro.</font>";
            }
            else{
                //echo'en als echo geen 1 is
                echo "<font style='color:#FFF; ui-content; margin-left:10px; margin-right:10px;'>Vul eerst een valuta in.</font>";
            };
         };
         ?>
        
    </body>
</html>