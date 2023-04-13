<?php

use PHPUnit\Framework\TestCase;

require_once "./config.php";

class TaskApiCreateTest extends TestCase
{

    public function testCreateTaskApi()
    {
        (new PDO(DB_DNS, DB_USER, DB_PASSWORD))->query("TRUNCATE TABLE user;");
        (new PDO(DB_DNS, DB_USER, DB_PASSWORD))->query("TRUNCATE TABLE task;");
        $payload = [
            "user_id" => 1,
            "name" => "Felice",
            "due_date" => "2024-12-31",
            "done" => true
        ];
        $response = $this->post("http://localhost/CORSOPHP/form_in_php/rest_api/tasks.php", $payload);
        $this->assertJson($response);
        //fwrite(STDERR, print_r($response, TRUE));
    }


    public function post(String $url, array $body)
    {
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
