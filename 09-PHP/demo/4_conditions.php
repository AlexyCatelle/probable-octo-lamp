<?php

$codeHttp = 200;
$message = "";

//switch
switch($codeHttp){
case 200:
    $message = "Ok !";
Break;

};

// math
$message = match ($codeHttp){
200,201 =>"OK !",
400 => "Not found",
500 => "Serveur error",
default => "Code inconnu"

};

echo $message, PHP_EOL;