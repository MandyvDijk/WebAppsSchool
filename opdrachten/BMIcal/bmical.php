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
        
        <p style="color:#FFF; ui-content">Gebruik de BMI-calculator om uw ideale gewicht te bepalen</p>
        
        <form = action "bmical.php" method = "post">
            <div>
                <label for="gewicht" style='color:#FFF;'>Gewicht (kg):</label>
                <input type="range" name="gewicht" id="gewicht" data-highlight="true" min="1" max="200" value="50" step="1">
            </div>
            <div>
                <label for="lengte" style='color:#FFF;'>Lengte (cm):</label>
                <input type="range" name="lengte" id="lengte" data-highlight="true" min="1" max="220" value="50" step="1">
            </div>
            <input type= "submit" name="verzend" value="Bereken BMI">
        </form>
        
        
        <?php
            if(isset($_POST["verzend"])){
             
                $gewicht = $_POST["gewicht"];
                $lengte = $_POST["lengte"];
                $LengteInMeters = $lengte/100;
                $BMI = $gewicht/($LengteInMeters*$LengteInMeters);
                $BMIAfgerond = round($BMI, 1);
                
                echo "<font style='color:#FFF; ui-content; margin-left:10px; margin-right:10px;'>
                Uw BMI is $BMIAfgerond</font><br>";
                
                if($BMIAfgerond < 18){
                    echo "<font style='color:#FFF; ui-content; margin-left:10px; margin-right:10px;'>
                    U heeft ondergewicht...</font>";
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