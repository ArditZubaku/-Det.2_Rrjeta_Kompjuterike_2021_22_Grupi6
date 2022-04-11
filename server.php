<?php 

$host = "127.0.0.1";
$port = 20205;

set_time_limit(0);

$sock=socket_create(AF_INET,SOCK_STREAM,0) or die ("Couldn't create socket\n");
socket_bind($sock,$host,$port) or die ("Couldn't bind socket\n");
socket_listen($sock) or die ("Couldn't set up socket listener\n");
echo "Listening for connections";


class Chat {

    function readline() {
        return rtrim(fgets(STDIN));
    }
}

do {
      $accept = socket_accept($sock) or die ("Couldn't accept incoming connection\n");
    $msg = socket_read($accept,1024) or die ("Couldn't read input");
    
    $msg = trim($msg);
    echo "Client says:\t".$msg."\n\n";
    $line = new Chat();
    echo "Enter Reply:\t";
    $reply = $line->readline();

    socket_write($accept,$reply,strlen($reply))or die ("Couldn't write output\n");
}while(true);

socket_close($accept);
socket_close($sock);

?>
