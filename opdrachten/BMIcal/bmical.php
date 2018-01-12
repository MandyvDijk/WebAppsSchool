<!DOCTYPE html>
<html>
    <head>
        <title>bmical</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- verbinden met stylesheets -->
        <link rel="stylesheet" href="css/themes/BroodBanket.css" />
        <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
        <link rel="stylesheet" href="css/themes/jquery.mobile.structure-1.4.5.min.css" /> 
        <!-- verbinden met scripts-->
        <script src="src/jquery-1.11.1.min.js"></script> 
        <script src="src/jquery.mobile-1.4.5.min.js"></script>
        <!-- Zorgen dat plaatjes schalen-->
        <style> img {max-width: 100%; max-height: 100%;} </style>
    </head>
    
    <body>
        <div data-role="header">
            <h1>BMI</h1>
        </div>
        <!-- dmv color =#FFF zorgen dat de tekst wit wordt en beter leesbaar is-->
        <p style="color:#FFF; ui-content">Gebruik de BMI-calculator om uw ideale gewicht te bepalen</p>
        
        <!-- form voor userinput-->
        <form = action "bmical.php" method = "post">
            <div>
                <label for="gewicht" style='color:#FFF;'>Gewicht (kg):</label>
                <!-- dmv range zorgen dat de inputtype een slider is-->
                <input type="range" name="gewicht" id="gewicht" data-highlight="true" min="1" max="200" value="50" step="1">
            </div>
            <div>
                <label for="lengte" style='color:#FFF;'>Lengte (cm):</label>
                <input type="range" name="lengte" id="lengte" data-highlight="true" min="1" max="220" value="50" step="1">
            </div>
            <!-- verzendknop -->
            <input type= "submit" name="verzend" value="Bereken BMI">
        </form>
        
        
        <?php
        //controleren of er op verzend gedrukt is
            if(isset($_POST["verzend"])){
                //var uit form ophalen
                $gewicht = $_POST["gewicht"];
                $lengte = $_POST["lengte"];
                //hulpvar maken voor bereken bmi, want moet in meters
                $LengteInMeters = $lengte/100;
                //bmi berekenen met gegeven formule op informatica actief
                $BMI = $gewicht/($LengteInMeters*$LengteInMeters);
                //dmv round bmi,1 zorgen dat het bmi op 1 decimaal afgerond wordt
                $BMIAfgerond = round($BMI, 1);
                
                //het berekende bmi echo'en. dmv alles in style zijn de letters wit en staan ze wat verder van de zijkant af
                echo "<font style='color:#FFF; ui-content; margin-left:10px; margin-right:10px;'>
                Uw BMI is $BMIAfgerond</font><br>";
                
                //if statement die kijkt hoe hoog het bmi is
                if($BMIAfgerond < 18){
                    //passende tekst echo'en
                    echo "<font style='color:#FFF; ui-content; margin-left:10px; margin-right:10px;'>
                    U heeft ondergewicht...</font>";
                    //passend plaatje echo'en
                    echo "<img src='images/bmi1.jpg'>";
                }
                else if($BMIAfgerond >= 18 && $BMIAfgerond < 25){
                    echo "<font style='color:#FFF; ui-content; margin-left:10px; margin-right:10px;'>
                    U bent op gezond gewicht!</font>";
                    echo "<img src='images/bmi2.jpg'>";
                }
                else if($BMIAfgerond >= 25 && $BMIAfgerond < 30){
                    echo "<font style='color:#FFF; ui-content; margin-left:10px; margin-right:10px;'>
                    U heeft licht overgewicht</font>";
                    echo "<img src='images/bmi3.jpg'>";
                }
                else if($BMIAfgerond > 30){
                    echo "<font style='color:#FFF; ui-content; margin-left:10px; margin-right:10px;'>
                    U heeft ernstig overgewicht...</font>";
                    echo "<img src='images/bmi4.jpg'>";
                }
                else{
                    echo "<font style='color:#FFF; ui-content; margin-left:10px; margin-right:10px;'>
                    Er is iets mis gegaan...</font>";
                };
            };
         ?>
    </body>
</html>