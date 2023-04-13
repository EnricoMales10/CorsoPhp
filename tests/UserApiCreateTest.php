<?php

use PHPUnit\Framework\TestCase;

require_once "./config.php";

class UserApiCreateTest extends TestCase
{

    public function testCreateUserApi()
    {
        (new PDO(DB_DNS,DB_USER,DB_PASSWORD))->query("TRUNCATE TABLE user;");
        //(new PDO(DB_DNS,DB_USER,DB_PASSWORD))->query("TRUNCATE TABLE task;");


                    $payload = [
                    "first_name" => "Alessio",
                    "last_name" => "Felice",
                    "birthday" => "1990-12-31",
                    "birth_city" => "Pinerolo",
                    "regione_id" => 12,
                    "provincia_id" => 96,
                    "gender" => "M",
                    "username" => "feliceu@hotmail.it",
                    "password" => "9999",
                ];
                $response = $this->post("http://localhost/CORSOPHP/form_in_php/rest_api/users.php", $payload);
                $this->assertJson($response);
                //fwrite(STDERR, print_r($response, TRUE));
            
       
    }


    public function post(String $url, array $body)
    {
        //curl = client http in linea di comando, command url, usare indirizzo web tramite linea di comando
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => [
                "Accept: */*",
                "Content-Type: application/json",
                "User-Agent: Thunder Client (https://www.thunderclient.com)"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
}
