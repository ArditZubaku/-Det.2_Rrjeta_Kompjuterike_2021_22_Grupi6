<?php 

$host = "127.0.0.1";
$port = 20205;

set_time_limit(0);

$socket = socket_create(AF_INET, SOCK_STREAM,0) or die ("Couldn't create socket\n");
$result = socket_bind($socket, $host, $port) or die ("Couldn't bind socket\n");


$result = socket_listen($socket,3) or die ("Couldn't set up socket listener\n");

echo "Listening for connections";

class Chat {

    function readline() {
        return rtrim(fgets(STDIN));
    }
}

do {
    $accept = socket_accept($socket) or die ("Couldn't accept incoming connection\n");
    $message = socket_read($accept, 1024) or die ("Couldn't read input");
    
    $message = trim($message);
    echo "Client says:\t".$message."\n\n";

    line = new Chat();
    echo "Enter reply:\t";
    $reply = $line->readline();

    socket_write($accept,$reply,strlen($reply)) or die ("Couldn't write output\n");
}

while(true);

socket_close($accept,$socket);

?>
