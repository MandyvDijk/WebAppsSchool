<!-- broncode van inf. actief gekopieerd en aangepast zoals de opdracht was. -->
<!-- de rode punten in kantlijn is waar ik iets er bij gemaakt heb-->

<?php
// Hier wordt de sessie gestart
session_start();
// Hier wordt gecontroleerd of er opnieuw begonnen moet worden
if(isset($_POST["opnieuw"])){
	session_destroy();
	session_start();
}
// Hier krijgen de sessievariabelen worp1, worp2 en worp3 en de totaal waardes variabelen een startwaarde
if(!isset($_SESSION["worp1"])){
	$_SESSION["worp1"] = 3;
	$_SESSION["worp2"] = 1;
	$_SESSION["worp3"] = 6;
	//var worptotaal nodig om bij te houden hoeveel er met welke dobbelsteen gegooid is
	//omdat de worpen standaard op 3,6 en 1 staan dit als begin waarde geven aan de variable worpntotaal
	$_SESSION["worp1totaal"] = 3 ;
	$_SESSION["worp2totaal"] = 1 ;
	$_SESSION["worp3totaal"] = 6 ;
}
// Hier krijgt de sessievariabele aantal een startwaarde
if(!isset($_SESSION["aantal"])){
	$_SESSION["aantal"] = 0;
}
// Hier wordt gecontroleerd of er op een verzendknop is geklikt
if(isset($_POST["verzend"])){
	// Hier wordt het aantal worpen met 1 opgehoogd
	$aantal = $_SESSION["aantal"];
	$aantal++;
	$_SESSION["aantal"] = $aantal;
	// Hier wordt gekeken op welke verzendknop er is geklikt
	$verzend = $_POST["verzend"];
	// Hier wordt een willekeurig getal tussen 1 en 6 bewaard in de variabele $worp
	$worp = rand(1,6);
	// Afhankelijk van de verzendknop wordt hier de bijbehorende sessievariabele aangepast
	  if($verzend == 1){
	      $_SESSION["worp1"] = $worp;
	      //na het drukken op de dobbelsteen wordt de var worptotaal opgehoogd met het aantal ogen dat op de dobbelsteen staat.
	      $_SESSION["worp1totaal"] = $_SESSION["worp1totaal"] + $worp;
	  }
	  if($verzend == 2){
	      $_SESSION["worp2"] = $worp;
	      $_SESSION["worp2totaal"] = $_SESSION["worp2totaal"] + $worp;
	  }
	  if($verzend == 3){
	      $_SESSION["worp3"] = $worp;
	      $_SESSION["worp3totaal"] = $_SESSION["worp3totaal"] + $worp;
	  };
};
// Hier worden de waarden van de sessievariabelen uit de sessie gehaald en bewaard in $worp1 $worp2 $worp3, $aantal en $worp1totaal, $worp2totaal en $worp3totaal
$worp1 = $_SESSION["worp1"];
$worp2 = $_SESSION["worp2"];
$worp3 = $_SESSION["worp3"];
$aantal = $_SESSION["aantal"];
$worp1totaal = $_SESSION["worp1totaal"];
$worp2totaal = $_SESSION["worp2totaal"];
$worp3totaal = $_SESSION["worp3totaal"];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>3_DOB</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- verbinden met stylesheets -->
        <link rel="stylesheet" href="css/themes/greenbluethingy.css"/>
        <link rel="stylesheet" href="css/themes/greenbluethingy.min.css"/>
        <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css"/>
        <link rel="stylesheet" href="css/themes/jquery.mobile.structure-1.4.5.min.css"/> 
        <!-- verbinden met scripts-->
        <script src="src/jquery-1.11.1.min.js"></script> 
        <script src="src/jquery.mobile-1.4.5.min.js"></script>
        <!-- zorgen dat plaatjes schalen -->
        <style> img {max-width: 100%; max-height: 100%;} </style>
    </head>
  
    <body>
    	<!-- header -->
		<div id="pag1" data-role="page">
			<div data-role="header">
				<h1>3_DOB</h1>
			</div>
			
			<div role="main" class="ui-content" style="padding:0px;">
				<fieldset class="ui-grid-b">
					<div class="ui-block-a">
					<form action="driedobbelstenen.php" method="post">
						<input type="hidden" name="verzend" value="1" />
						<input type="image" src="images/dobbel<?php echo"$worp1"; ?>.gif" style="max-width:100%" />
						<!-- Het totaal aantal ogen echo'en zodat dit recht onder de dobbelsteen staat-->
						<?php echo"Totaal: $worp1totaal"; ?>
					</form>
					</div>
					
					<div class="ui-block-b">
					<form action="driedobbelstenen.php" method="post">
						<input type="hidden" name="verzend" value="2" />
						<input type="image" src="images/dobbel<?php echo"$worp2"; ?>.gif" style="max-width:100%" />
						<?php echo"Totaal: $worp2totaal"; ?>
					</form>
					</div>
					
					<div class="ui-block-c">
					<form action="driedobbelstenen.php" method="post">
						<input type="hidden" name="verzend" value="3" />
						<input type="image" src="images/dobbel<?php echo"$worp3"; ?>.gif" style="max-width:100%" />
						<?php echo"Totaal: $worp3totaal"; ?>
					</form>					
					</div>
				</fieldset>
				<div class="ui-body ui-body-b ui-corner-all">
				
				<?php
				echo"Het aantal worpen is: $aantal";
				?>
				
				</div>
				<form action="driedobbelstenen.php" method="post">
					<button class="ui-shadow ui-btn ui-corner-all ui-mini" id="opnieuw" type="submit" name="opnieuw">Begin opnieuw</button>
				</form>				
			</div>
			
			<div data-role="footer" data-position="fixed">
				<h3>&copy; INF-actief</h3>
			
			</div>
		</div>
    </body>
</html>