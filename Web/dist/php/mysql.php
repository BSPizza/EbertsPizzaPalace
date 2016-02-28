<?php

function createConnection()
{
	//<!-- global mysql settings -->
	static $servername = "localhost";
	static $username = "root";
	static $password = "";
	static $database = "EbertsPizzaPalace";
	//<!-- end global mysql settings -->
	
	//try and create connection
	mysql_connect($servername, $username, $password);	
	
	//try and select database or exit
	@mysql_select_db($database) or die("Unable to select database! Please contact support");
}

function closeConnection()
{
	mysql_close();
}


//return an array of arrays[2]{id,name}
function getMenuHeaderStrings()
{
	$retArray = array();
	createConnection();
	
	//create statement
	$statement = "SELECT ID,Name FROM Categories WHERE SuperCategoryID = 0 AND IsDeleted = 0";
	//query db
	$result =  mysql_query($statement);
	
	
	
	//if there are any results fill retArray
	if($result)
	{
		//add all results to retArray
		while($row = mysql_fetch_array($result))
		{
			array_push($retArray, array( $row["ID"], htmlentities($row["Name"])));
		}		
	}
	
	closeConnection();
	
	return $retArray;
}


function adjustVariable($variable)
{
	$cleanVariable;
	
	//problematic types for injections etc are string and array of strings, possibly object but not sure about that
	if(is_string($variable))
	{
		$cleanVariable = htmlentities (strip_tags ($variable));
	}
	else if(is_array($variable))
	{
		$cleanVariable = arrayAdjust($variable);
	}
	
	return $cleanVariable;
}

function arrayAdjust($array)
{
	for($i = 0; $i < count($array); $i++)
	{
		if(is_string($array[$i]))
		{
			$array[$i] = htmlentities (strip_tags ($array[$i]));
		}
		else if(is_array($array[$i]))
		{
			$array[$i] = arrayAdjust($array[$i]);
		}
	}
	
	return $array;
}

?>