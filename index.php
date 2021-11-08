<?php

include "./letextoservice.php";

//On recupere les informations pour l'envoi
//Par exemple le nom et les contacts
$letextoService = new LeTExtoService();
$contact = [
    ['phone'=>'225XXXXXXX'],
    ['phone'=>'225XXXXXXXX'],
    ];
$idCampaign = $letextoService->setCampaign($param);
$sendCampaign = $letextoServie->sendSms($idCampaign);
