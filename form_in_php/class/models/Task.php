<?php

namespace models;
class Task{
    
    public $user_id;
    public $name; 
    public $due_date; 
    public $done; 
   
    public static function arrayToTask(array $class_array):Task
    {
        $task = new Task;
        foreach ($class_array as  $class_attribute => $value_of_class_attribute) {
           $task->$class_attribute = $value_of_class_attribute;        
    }
    return $task;
}    
}
