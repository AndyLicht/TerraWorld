<?php
    //Funktion zum Laden des JSON
    $requester =  new ZMQSocket(new ZMQContext(), ZMQ::SOCKET_REQ,"MySock1");
    $requester->setSockOpt(ZMQ::SOCKOPT_LINGER,2000);
    $requester->connect("tcp://127.0.0.1:5000");
    $requester->send("i");
    $reply = $requester->recv();
    $json = json_decode($reply);
    $sensoren = $json->sensoren;
    var_dump($reply);
?>a
