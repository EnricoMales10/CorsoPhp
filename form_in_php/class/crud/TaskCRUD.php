<?php

namespace crud;


use models\Task;

use PDO;

class TaskCRUD
{


    public function create(Task $task)
    {
        $query = "INSERT INTO task (user_id, name, due_date, done)
      Values (:user_id, :name, :due_date, :done)";
        $conn = new PDO(DB_DNS, DB_USER, DB_PASSWORD);
        $stm = $conn->prepare($query);
        $stm->bindValue(':user_id', $task->user_id, PDO::PARAM_INT);
        $stm->bindValue(':name', $task->name, PDO::PARAM_STR);
        $stm->bindValue(':due_date', $task->due_date, PDO::PARAM_STR);
        $stm->bindValue(':done', $task->done, PDO::PARAM_BOOL);
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
    
    //read_by_task_id -> GET✅
    public function read_by_task_id(int $task_id = null):Task|array|bool
    {
        $conn = new \PDO(DB_DNS, DB_USER, DB_PASSWORD);
        $query = "SELECT * FROM task WHERE task_id = :task_id";
        $stm = $conn -> prepare($query);
        $stm -> bindValue(':task_id', $task_id, PDO::PARAM_INT);
        
        $stm -> execute();//va sempre prima del $result
        $result = $stm -> fetchAll(PDO::FETCH_CLASS, Task::class);
        
        return $result;//ritorna un solo elemento, task_id univoco

    }
    
    //read_by_user_id -> GET✅
    public function read_by_user_id(int $user_id = null):Task|array|bool
    {
        $conn = new \PDO(DB_DNS, DB_USER, DB_PASSWORD);
        $query = "SELECT * FROM task WHERE user_id = :user_id";
        $stm = $conn -> prepare($query);
        $stm -> bindValue(':user_id', $user_id, PDO::PARAM_INT);
        
        $stm -> execute();//va sempre prima del $result
        $result = $stm -> fetchAll(PDO::FETCH_CLASS, Task::class);
    
        return $result;
    }

    //read_all -> GET✅
    public function read_all():Task|array|bool
    {
        $conn = new \PDO(DB_DNS, DB_USER, DB_PASSWORD);
        $query = "SELECT * FROM task";
        $stm = $conn -> prepare($query);
        
        $stm -> execute();//va sempre prima del $result
        $result = $stm -> fetchAll(PDO::FETCH_CLASS, Task::class);
            
        if(count($result) === 0){
            return false;
        }
        return $result;
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
