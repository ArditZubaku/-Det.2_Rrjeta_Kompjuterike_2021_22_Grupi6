<html>
    <body>
        <liv align='center'>
            <form method='post'>
                <table>
                    <tr>
                        <td>
                            <label>Enter Message</label>
                            <input type='text' name='txtMessage'>
                            <input type='submit' name='btnSend' value='Send'>

                        </td>
                    </tr>
                    <?php
                    $host="127.0.0.1";
                    $port=20205;

                    
                     if(isset($_POST['btnSend']))
                    {
                        $msg = $_REQUEST['txtMessage'];
                        $sock = socket_create(AF_INET,SOCK_STREAM,0);
                        socket_connect($sock,$host,$port);

                        socket_write($sock, $msg ,strlen($msg));

                        $reply = socket_read($sock,1024);
                        $reply = trim($reply);
                        $reply = "Server says:\t".$reply;

                    }
                    ?>
                    
                    <tr>
                        <td>
                            <textarea rows='10' col='30'><?php echo @$reply ?></textarea>
                        </td>
                    </tr>
                </table>
                </form>
                </div>
                </body>
                </html>
    

