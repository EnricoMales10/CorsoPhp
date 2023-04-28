import { useState } from 'react';
import './App.css';
import SearchBar from './components/SearchBar';
// import { useState } from 'react';
import TaskItem from './components/TaskItem/TaskItem';
import TaskList from './components/TaskList/TaskList';
import { activeFilter, addTask, completedFilter, removeTask } from './service/TodoService';



function App() {

const [taskListData,setTaskListData] = useState([
  
])
  // const taskListData = [
    // {
    //   user_id: 1,
    //   name: "Spesa",
    //   due_date: "2024-12-31",
    //   done: false,
    //   task_id: 1
    // },
  //   {
  //     user_id: 2,
  //     name: "Comprare un manga",
  //     due_date: "2023-08-31",
  //     done: true,
  //     task_id: 2
  //   }
  // ]

  // const [taskListData, setTaskListData] = useState([])

  // function aggiungiTask() {
  //   setTaskListData((attuale)) => {
  //     const new_attuale = [...attuale]
  //     attuale.push(
  //       {
  //       user_id: 2,
  //       name: "Comprare un manga",
  //       due_date: "2023-08-31",
  //       done: true,
  //       task_id: 2
  //     }
  //     )
  //     return attuale
  //   }
  // }

  function parentAddTask(newTask) {
    //Todo user_id    
    const newTaskListData = addTask(newTask,taskListData)
   // console.log(newTaskListData)
    setTaskListData(newTaskListData)
  }

  function parentRemoveTask(id) {
    //console.log("removeTask "+id)
    const res = removeTask(id,taskListData)
    setTaskListData(res)

  }
  function onShowAll() {
    
  }

  function onShowActive() {
    
  }

  function onShowCompleted() {
    //chiamo il servizio
    //aggiorno il sevizio    
  }


  return (
    <main>
      <SearchBar parentAddTask={parentAddTask}></SearchBar>
      {/* {list} */}
      {/* <button onClick={aggiungiTask}>Add Task</button> */}
      <button onClick={onShowAll}>All</button>
      <button onClick={onShowActive}>Active</button>
      <button onClick={onShowCompleted}>Completed</button>
      <TaskList header={'Paolo'} tasks={taskListData}>
        {taskListData.map(task => <TaskItem key={task.id} parentRemoveTask={parentRemoveTask} id={task.id} done={task.done} name={task.name} />)}
      </TaskList>
      

    </main>
  )
}

export default App;
