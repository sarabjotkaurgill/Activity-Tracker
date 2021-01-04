<?php
session_start();
    global $conn;
   $CONFIG_MYSQL_DATABASE= "activitytrackerdb";
    $CONFIG_MYSQL_USER= 'root';
    $CONFIG_MYSQL_PASSWORD= 'secret';
    $CONFIG_MYSQL_HOST= 'db';
    $CONFIG_MYSQL_PORT= 3306;
    $CONFIG_BACKEND_HOST= 'localhost';

$conn = new mysqli($CONFIG_MYSQL_HOST, $CONFIG_MYSQL_USER, $CONFIG_MYSQL_PASSWORD, $CONFIG_MYSQL_DATABASE, $CONFIG_MYSQL_PORT);

if ($conn->connect_errno) {
    echo("Could not connect to DB." . "\n");
    echo("Errno: " . $conn->connect_errno . "\n");
    echo("Error: " . $conn->connect_error . "\n");
    exit;
}