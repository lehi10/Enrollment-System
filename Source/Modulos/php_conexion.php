<?php
	
	/*
	$conexion = mysql_connect("mysql.tuars.com","u272763352_si","omg3nmhh");
	mysql_select_db("u272763352_si",$conexion);
	date_default_timezone_set("America/Bogota");
    */
    $conexion = mysql_connect("localhost","root","");
	mysql_select_db("2013school",$conexion);
	
    mysql_query("SET NAMES utf8");
	mysql_query("SET CHARACTER_SET utf");
	$s='$';
	
	$paa=mysql_query("SELECT * FROM empresa WHERE id=1");					
	if($dato=mysql_fetch_array($paa)){
		$maxima_nota=$dato['maxima'];
		$minima_nota=$dato['minima'];
	}
	
	
	function limpiar($tags){
		

		return $tags;
	}

	
?>