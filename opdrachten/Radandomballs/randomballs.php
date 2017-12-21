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
    </head>
    
    <body>
        <div data-role="header">
            <h1>Random balls</h1>
        </div>
        
        <form = action "randomballs.php" method = "post">
            <div>
                <label for="rood" style='color:#FFF;'>Aantal rode ballen:</label>
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
         if(isset($_POST["verzend"])){
         
            $rood = $_POST["rood"];
            $blauw = $_POST["blauw"];
            $aantal = $_POST["aantal"];
            
            if(!empty($rood) && !empty($blauw) && !empty($aantal)){
                //rekenen
                $AantalGetrokken = 0;
                while($AantalGetrokken <= $aantal){
                    echo "";
                    $AantalGetrokken++;
                    
                };
                
            }
            else{
                echo "Er ging iets mis... Vul ALLE velden in.";
            };
            
         };
         ?>
        
    </body>
</html>