<?php

include "./letextoservice.php";

//On recupere les informations pour l'envoi
//Par exemple le nom et les contacts
$letextoService = new LeTExtoService();
//Liste d'envoi
$contact = [
            [
              'phone' => '22508080808',
            ],
     [
              'phone' => '225023009876',
            ],
     [
              'phone' => '22506080808',
            ]
          ];
//Parametre du texto
$param= [
          'step' => NULL,
          'sender' => 'SIGES-DCF',
          'name' => 'Notification nvle agent',
          'campaignType' => 'SIMPLE',
          'recipientSource' => 'CUSTOM',
          'groupId' => NULL,
          'filename' => NULL,
          'saveAsModel' => false,
          'destination' => 'NAT_INTER',
          'message' => 'message',
          'emailText' => NULL,
          'recipients' => $contact,
          'sendAt' => [],
        ];
$idCampaign = $letextoService->setCampaign($param);
$sendCampaign = $letextoServie->sendSms($idCampaign);
