<?php

namespace crud;


use models\Task;

use PDO;

class UserCRUD
{


    public function create(Task $task)
    {
        $query = "INSERT INTO task (user_id, name, due_date, done)
      Values (:user_id, :name, :due_date, :done)";
        $conn = new PDO(DB_DNS, DB_USER, DB_PASSWORD);
        $stm = $conn->prepare($query);
        $stm->bindValue(':first_name', $task->user_id, PDO::PARAM_INT);
        $stm->bindValue(':last_name', $task->name, PDO::PARAM_STR);
        $stm->bindValue(':birthday', $task->due_date, PDO::PARAM_STR);
        $stm->bindValue(':birth_city', $task->done, PDO::PARAM_BOOL);
        $stm->execute();
        return $conn->lastInsertId();
    }
    
    public function update($task, $task_id)
    {
        $conn = new \PDO(DB_DNS,DB_USER,DB_PASSWORD);
        $query = "UPDATE `task` SET  `user_id`= :user_id, `name`= 
        :name, `due_date` = :due_date, `done`= :done WHERE task_id= :task_id;";
        $stm = $conn->prepare($query);
        $stm->bindValue(':user_id',$task->user_id,\PDO::PARAM_INT);
        $stm->bindValue(':name',$task->name,\PDO::PARAM_STR);
        $stm->bindValue(':due_date',$task->due_date,\PDO::PARAM_STR);
        $stm->bindValue(':done',$task->done,\PDO::PARAM_BOOL);
        $stm->bindValue(':task_id',$task_id,PDO::PARAM_INT);
        $stm->execute();
        return $stm->rowCount();
    }
    
    public function read(int $task_id = null):Task|array|bool
    {
        $conn = new PDO(DB_DNS, DB_USER, DB_PASSWORD);
        if (!is_null($task_id)) {
            $query = "SELECT * FROM task where task_id = :task_id;";
            $stm = $conn->prepare($query);
            $stm->bindValue(':task_id', $task_id, PDO::PARAM_INT);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_CLASS, 'models\Task');
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
            $query = "SELECT * FROM task;";
            $stm = $conn->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_CLASS, 'models\Task');
            if (count($result) === 0) {
                return false;
            }
            return $result;
        }
        //echo "ciao sono ".User::class."\n";

    }

    public function delete($task_id)
    {
        $conn = new PDO(DB_DNS, DB_USER, DB_PASSWORD);
        $query = "DELETE from task where task_id = :task_id";
        $stm = $conn->prepare($query);
        $stm->bindValue(':task_id', $task_id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->rowCount();
    }
}
