<?php
	//require("mysql.php");
	
	function warenkorbHinzufuegen($ProduktID, $warenkorbCount){
		if (isset($_SESSION['username'])) {
			if (isset($_SESSION['cart'])) {
				array_push($_SESSION['cart'], $ProduktID);
				$_SESSION['cart'] = array_unique($_SESSION['cart']);
				echo '
				<script type="text/javascript">
					window.location.href=\'cart.php\';
				</script>
				';
			}
			else{
				$_SESSION['cart'] = array();
				array_push($_SESSION['cart'], $ProduktID);
				echo '
				<script type="text/javascript">
					window.location.href=\'cart.php\';
				</script>
				';
			}
		} else {
		   	echo '
				<script type="text/javascript">
					window.location.href=\'anmelden.php\';
				</script>
				';
		}
	}
	
	
	function warenkorbLaden($value){
		createConnection();
		//$con = mysql_connect('localhost','root','');
		//mysql_select_db('ebertspizzapalace', $con);
		$sql = "SELECT p.Name, GROUP_CONCAT(i.Name) AS Zutaten, p.Price, p.ID
				FROM products p
                LEFT JOIN xproductingredient xpi ON p.ID = xpi.ProductID
                LEFT JOIN ingredients i ON i.ID = xpi.IngredientID
				WHERE p.ID = '$value'
				GROUP BY p.ID;";
		
		$results = mysql_query($sql);
		
		//mysql_close($con);
		closeConnection();
	
		return $results;
	}
	
	function warenkorbProduktEntfernen($entfernProduktID) {
	
		$_SESSION['cart'] = array_merge(array_diff($_SESSION['cart'], array($entfernProduktID)));
		
		echo '
		<script>
		localStorage.removeItem("quantity'.$entfernProduktID.'");
		</script>';
		
		
		
		
		echo '
		<script type="text/javascript">
			window.location.href=\'cart.php\';
		</script>
		';
	}
	
	function warenkorbCount(){
	$warenkorbAnzahl = 0;
		if (isset($_SESSION['cart'])) {
			$warenkorbAnzahl = count($_SESSION['cart']);
		}
		return $warenkorbAnzahl;
	}
	
	
	function warenkorbGesamtpreis($anzahl, $produkt){
	
		createConnection();
		//$con = mysql_connect('localhost','root','');
		//mysql_select_db('ebertspizzapalace', $con);
		$sql = "SELECT Price FROM Products WHERE ID = '$produkt'";
			
		$result = mysql_query($sql);
		
		$price = mysql_result($result, 0, 0);
		
		//mysql_close($con);
		closeConnection();
		
		$zahl = $price * $anzahl;
		
		return $zahl;
	}
	
	function loescheAmount(){
		echo '
		<script>
		localStorage.clear();
		</script>';
	
	}
	
?>