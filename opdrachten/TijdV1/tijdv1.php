<!DOCTYPE html>
<html>
    <head>
        <title>tijdv1</title>
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
            <h1>Seconden berekenen</h1>
        </div>
        
        <div role="main" class="ui-content">
            <!-- form voor het verzenden van de input -->
            <form = action "tijdv1.php" method = "post">
                <div>
                    <label for="uren">Aantal uren:</label>
                    <!--type= range voor slider -->
                    <input type="range" name="uren" id="uren" data-highlight="true" min="0" max="23" value="1">
                </div>
                <div>
                    <label for="minuten">Aantal minuten:</label>
                    <input type="range" name="minuten" id="minuten" data-highlight="true" min="0" max="59" value="1">
                </div>
                <div>
                    <label for="seconden">Aantal seconden:</label>
                    <input type="range" name="seconden" id="seconden" data-highlight="true" min="0" max="59" value="1">
                </div>
                <input type= "submit" name="verzend" value="Bereken">
            </form>
        </div>
        
        <?php
            //controlleren of op verzend gedrukt is
            if(isset($_POST["verzend"])){
                //var ophalen
                $uren = $_POST["uren"];
                $minuten = $_POST["minuten"];
                $seconden = $_POST["seconden"];
                //rekenen
                $secondenuren = $uren * 3600;
                $secondenminuten = $minuten * 60;
                $secondentotaal = $secondenuren + $secondenminuten + $seconden;
                //uitkomst echo'en
                echo "<font style='color:#FFF; ui-content; margin-left:10px; margin-right:10px;'>$uren uren, $minuten minuten en $seconden seconden = $secondentotaal seconden.</font>";
         
            };
         ?>
        
    </body>