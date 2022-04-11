<?php 

$host = "127.0.0.1";
$port = 20205;

set_time_limit(0);

$sock=socket_create(AF_INET,SOCK_STREAM,0);
socket_bind($sock,$host,$port);
socket_listen($sock);
echo "Listening for connections";


class Chat {

    function readline() {
        return rtrim(fgets(STDIN));
    }
}

do {
      $accept = socket_accept($sock);
    $msg = socket_read($accept,1024);
    
    $msg = trim($msg);
    echo "Client says:\t".$msg."\n\n";
    $line = new Chat();
    echo "Enter Reply:\t";
    $reply = $line->readline();

    socket_write($accept,$reply,strlen($reply));
}while(true);

socket_close($accept);
socket_close($sock);

?>
