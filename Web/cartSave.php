<?php
session_start();

    $dataString = $_POST['daten'];
    $data = json_decode($dataString, true);
	$username = $_SESSION['username'];
	$array = array();
	
	$sql1 = "
	START TRANSACTION;

	INSERT INTO orders (Date, CustomerID)
	SELECT CURDATE(), ID
	FROM customers
	WHERE Login = '$username'
	LIMIT 1;
	SET @orders_id  = LAST_INSERT_ID();";
	
	array_push($array, $sql1);
	
	foreach ($data as $key => $value) {
		echo $key;
		if($key == "gesamtPreisFeld"){
			$TotalPrice = $value;
			$sql2 = "INSERT INTO Invoices (OrderID, TotalPrice) VALUES (@orders_id, '$TotalPrice');";
			array_push($array, $sql2);
		}
		else{
			foreach ($_SESSION['cart'] as &$valueCart) {
				$string = "quantity".$valueCart;
						echo $string;
						echo $key;
				if($key == $string){
					$sql3 = "INSERT INTO xProductOrder (ProductID, OrderID, Amount) VALUES ('$valueCart', @orders_id, '$value');";
					array_push($array, $sql3);
				}	
			}
		}
	}
	
	$sql4 = "COMMIT;";
	array_push($array, $sql4);
	
	$sqlQuery = implode(" ",$array);
	
	echo $sqlQuery;
	
	$mysqli = new mysqli("localhost", "root", "", "EbertsPizzaPalace");
		
	if (!$mysqli->multi_query($sqlQuery)) {
		echo "Multi query failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}
	
	$mysqli->close();
	
	
	löschteWarenkorb();
	
	
	
	function löschteWarenkorb(){
		unset($_SESSION['cart']);
	}
?>