<?php 

$host = "127.0.0.1";
$port = 20205;

set_time_limit(0);

$socket = socket_create(AF_INET, SOCK_STREAM,0) or die ("Couldn't create socket\n");
$result = socket_bind($socket, $host, $port) or die ("Couldn't bind socket\n");


$result = socket_listen($socket,3) or die ("Couldn't set up socket listener\n");

echo "Listening for connections";
?>
