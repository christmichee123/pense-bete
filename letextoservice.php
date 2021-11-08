<?php

class  LeTExtoService
{
    
    //Constructeur de la classe
     public function __construct(){
        $this->url = "https://api.letexto.com/v1/campaigns/";
        $this->token = "mettez votre token ici";
    }
    
    //Méthode pour programmer l'envoi
    public function setCampaign(Array $param){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $this->url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>json_encode($param),
          CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer'.$this->token,
            'Content-Type: application/json'
          ),
        ));
        
        $response = curl_exec($curl);
        curl_close($curl);
        $responsefinal = json_decode($response);
        return $responsefinal['id'];
    }
    
    //Méthode pour proceder à l'envoi
    public function sendSms($responseId){
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => $this->url.$responseId.'/schedule',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_HTTPHEADER => array(
             'Authorization: Bearer'.$this->token,
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        return $response;
    }
}
