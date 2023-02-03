<?php
require_once("config.php");

$sql = new SQL;

$usuarios= $sql->select("SELECT * FROM exemplo");

echo json_encode($usuarios);