<?php

use crud\UserCRUD;
use models\User;


include "../config1.php";
include "../autoload.php";

$crud = new UserCRUD;
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $user_id = filter_input(INPUT_GET, 'user_id');
        if (!is_null($user_id)) {
            //   echo json_encode($crud->read($user_id));

            $response = [
                'data' => $crud->read($user_id),
                'status' => 200
            ];
            echo json_encode($response);
            
        } else {
            $users = $crud->read();
            $response = [
                'data' => $users,
                'status' => 200
            ];
            echo json_encode($response);
            // echo json_encode($users);

        }
        break;

        case 'DELETE':
            $user_id = filter_input(INPUT_GET, 'user_id');
            if (!is_null($user_id)) {
                $rows = $crud->delete($user_id);
                if ($rows == 1) {
                    $response = [
                        'data' => $user_id,
                        'status' => 200
                    ];
                    echo json_encode($response);
                }
    
    
                if ($rows == 0) {
                    http_response_code(404);
                    $response = [
                        'errors' => [
                            [
                                'status' => 404,
                                'title' => "Utente non trovato",
                                'details' => "Utente id: " . $user_id
                            ]
                        ]
                    ];
                    echo json_encode($response);
                }
            }
            break;

    case 'POST':

        $input = file_get_contents('php://input');
        $request = json_decode($input, true);
        $user = User::arrayToUser($request);
        try {

            $last_id = $crud->create($user);
            // $response = [
            //     'data' => [
            //         'type' => "users",
            //         'id' => $last_id,
            //         'attributes' => $user
            //     ]
            // ];
            $user = (array)$user;
            unset($user['password']);
            $user['user_id'] = $last_id;

            $response = [
                'data' => $user,
                'status' => 202
            ];
        } catch (\Throwable $th) {
            http_response_code(422);
            $response = [
                'errors' => [
                    [
                        "status" => 422,
                        "title" =>  "Formato non trovato",
                        "details" => $th->getMessage(),
                        'code' => $th->getCode()
                    ]
                ]
            ];
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
        break;

    case 'PUT':
        $user_id = filter_input(INPUT_GET, 'user_id');
        $input = file_get_contents('php://input');
        $request = json_decode($input, true);

        $user = User::arrayToUser($request);
        $last_id = $crud->update($user, $user_id);

        $user = (array)$user;
        // unset($user['username']);
        // unset($user['password']);
        $user['user_id'] = $last_id;

        if ($last_id == 1) {
            $response = [
                'data' => $user,
                'status' => 202
            ];
        }
        if ($last_id == 0) {
            http_response_code(404);
            // array associativo
            $response = [
                // proprietà errors
                // 'chiave' => "valore"
                'errors' => [
                    [
                        'status' => 404,
                        'title' => "impossibile eseguire update",
                        'details' => $user_id
                    ]
                ]
            ];
        }

        echo json_encode($response);

        break;

    default:
        # code...
        break;
}
