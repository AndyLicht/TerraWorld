<?php
    $requester =  new ZMQSocket(new ZMQContext(), ZMQ::SOCKET_REQ,"MySock1");
    $requester->setSockOpt(ZMQ::SOCKOPT_LINGER,2000);
    $requester->connect("tcp://127.0.0.1:5000");
    $requester->send("s/".$_POST["tid"]."/".$_POST["gid"]."/".$_POST["state"]."/".$_POST["command"]);
    $reply = $requester->recv();
    echo $reply;
?>