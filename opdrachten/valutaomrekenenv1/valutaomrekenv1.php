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
                    <input type="range" name="bedrag" id="bedrag" data-highlight="true" min="1" max="1000" value="1" step="1">
                </div>
                
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
         if(isset($_POST["verzend"])){
             
             $bedrag = $_POST["bedrag"];
             $valuta = $_POST["valuta"];
             
             if($valuta == "amdollar"){
                 $valutareken = "Dollar";
                 $bedragtotaal = $bedrag * 0.85;
                 $echo = 1;
             }
             //elseif gebruiken omdat het meerdere opties zijn
             elseif($valuta == "engpond"){
                 $valutareken = "Pond";
                 $bedragtotaal = $bedrag * 1.13;
                 $echo = 1;
             }
             elseif($valuta == "japyen"){
                 $valutareken= "Yen";
                 $bedragtotaal = $bedrag * 0.00754;
                 $echo = 1;
             }
             else{
                 echo "<font style='color:#FFF; ui-content; margin-left:10px; margin-right:10px;'>Geen valuta ingevuld.</font>";
                 $echo = 0;
             };
             
            if($echo==1){ 
                echo "<font style='color:#FFF; ui-content; margin-left:10px; margin-right:10px;'>$bedrag $valutareken is omgerekend $bedragtotaal euro.</font>";
            }
            else{
                echo "<font style='color:#FFF; ui-content; margin-left:10px; margin-right:10px;'>Vul eerst een valuta in.</font>";
            };
         };
         ?>
        
    </body>
</html>