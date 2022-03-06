<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background:black; color:white">
</body>
</html>

<?php  
header("Content-Type: text/html;charset=utf-8");
date_default_timezone_set('America/Caracas');

    include_once "BaseModel.php";
    include_once "AnswerModel.php";
    include_once "BlockModel.php";
	include_once "DiscussionModel.php";
    include_once "HonorModel.php";
    include_once "PlatformModel.php";
    include_once "PlayerModel.php";
    include_once "TopicModel.php";

    

    //$prueba = new DiscussionModel();
    //$prueba = new AnswerModel();
    //$prueba = new PlatformModel();
    //$prueba = new TopicModel();
    //$prueba = new PlayerModel();
    //$prueba = new BlockModel();
    $prueba = new HonorModel();
    //public function UpdateHonor($playerId, $targetId, $targetType, $honor){
    $prueba->AddHonor(1, 5, 'respuesta', 1);

    //el estado de la discusión puede ser: abierta/cerrada/terminada/oculta
    //el estado de las respuestas serán 1 para normal y -1 para oculto
    //el estado de los jugadores será 1 para normal y -1 para bloqueado
    //el estado de bloqueo será 1 para activo y -1 para inactivo

?>