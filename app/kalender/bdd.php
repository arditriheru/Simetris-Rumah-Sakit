<?php
try
{
	$bdd = new PDO('mysql:host=192.168.1.250;dbname=dbrachmi;charset=utf8', 'root', 'rachm12016');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
