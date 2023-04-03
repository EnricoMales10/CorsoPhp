<?php

namespace crud;

use models\User;
use PDO;

class UserCRUD
{


    public function create(User $user)
    {
        $query = "INSERT INTO user (first_name, last_name, birthday, birth_city, regione_id, provincia_id, gender, username, password)
      Values (:first_name, :last_name, :birthday, :birth_city, :regione_id, :provincia_id, :gender, :username, :password)";
        $conn = new PDO(DB_DNS, DB_USER, DB_PASSWORD);
        $stm = $conn->prepare($query);
        $stm->bindValue(':first_name', $user->first_name, PDO::PARAM_STR);
        $stm->bindValue(':last_name', $user->last_name, PDO::PARAM_STR);
        $stm->bindValue(':birthday', $user->birthday, PDO::PARAM_STR);
        $stm->bindValue(':birth_city', $user->birth_city, PDO::PARAM_STR);
        $stm->bindValue(':regione_id', $user->regione_id, PDO::PARAM_INT);
        $stm->bindValue(':provincia_id', $user->provincia_id, PDO::PARAM_INT);
        $stm->bindValue(':gender', $user->gender, PDO::PARAM_STR);
        $stm->bindValue(':username', $user->username, PDO::PARAM_STR);
        $stm->bindValue(':password', md5($user->password), PDO::PARAM_STR);
        $stm->execute();
        return $conn->lastInsertId();
    }
    
    public function update($user, $user_id)
    {
        $conn = new \PDO(DB_DNS,DB_USER,DB_PASSWORD);
        $query = "UPDATE `user` SET  `first_name`= :first_name, `last_name`= 
        :last_name, `birthday` = :birthday, `birth_city`= :birth_city, `regione_id`= 
        :regione_id, `provincia_id`=:provincia_id, 
        -- `username`=:username, `password`=:password,
         `gender`=:gender WHERE user_id= :user_id;";
        $stm = $conn->prepare($query);
        $stm->bindValue(':first_name',$user->first_name,\PDO::PARAM_STR);
        $stm->bindValue(':last_name',$user->last_name,\PDO::PARAM_STR);
        $stm->bindValue(':birthday',$user->birthday,\PDO::PARAM_STR);
        $stm->bindValue(':birth_city',$user->birth_city,\PDO::PARAM_STR);
        $stm->bindValue(':regione_id',$user->regione_id,\PDO::PARAM_INT);
        $stm->bindValue(':provincia_id',$user->provincia_id,\PDO::PARAM_INT);
        // $stm->bindValue(':username',$user->username,\PDO::PARAM_STR);
        // $stm->bindValue(':password',$user->password,\PDO::PARAM_STR);
        $stm->bindValue(':gender',$user->gender,\PDO::PARAM_STR);
        $stm->bindValue(':user_id',$user_id,PDO::PARAM_INT);
        $stm->execute();
        return $stm->rowCount();
    }
    
    public function read(int $user_id = null):User|array|bool
    {
        $conn = new PDO(DB_DNS, DB_USER, DB_PASSWORD);
        if (!is_null($user_id)) {
            $query = "SELECT * FROM user where user_id = :user_id;";
            $stm = $conn->prepare($query);
            $stm->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_CLASS, 'models\User');
            if (count($result) == 1) {
                return $result[0];
            }
            if (count($result) > 1) {
                throw new \Exception("Chiave primaria duplicata", 1);
            }
            if (count($result) === 0) {
                return false;
            }
        } else {
            $query = "SELECT * FROM user;";
            $stm = $conn->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_CLASS, 'models\User');
            if (count($result) === 0) {
                return false;
            }
            return $result;
        }
        //echo "ciao sono ".User::class."\n";

    }

    public function delete($user_id)
    {
        $conn = new PDO(DB_DNS, DB_USER, DB_PASSWORD);
        $query = "DELETE from user where user_id = :user_id";
        $stm = $conn->prepare($query);
        $stm->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->rowCount();
    }
}
