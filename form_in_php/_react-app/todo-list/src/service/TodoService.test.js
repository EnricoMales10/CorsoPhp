import { activeFilter, addTask, completedFilter, dateFilter, updateTask, removeTask } from "./TodoService.js";

const taskList = 
    [
        {
            user_id: 2,
            name: "Comprare un manga",
            due_date: "2023-05-28",
            done: true,
            task_id: 1
        },
        {
            user_id: 2,
            name: "Andare allo zoom",
            due_date: "2023-08-31",
            done: false,
            task_id: 2
        },
        {
            user_id: 1,
            name: "Andare in Giappone",
            due_date: "2025-05-14",
            done: false,
            task_id: 3
        }
    ]


const activeTask = activeFilter(taskList)
console.log(activeTask);
if (activeTask.length ==1){
    console.log("test fallito");
}
const completedTask = completedFilter(taskList)
//console.log(completedTask);
if (completedTask.length ==2){
    console.log("test fallito");
}

dateFilter

const newTask = {
    user_id: 2,
    name: "Accarezzare Fil-Ippo",
    due_date: "2023-08-31",
    done: false
    }
    const newTaskList = addTask(newTask,taskList)
   // console.log(newTaskList);
if (newTaskList.length ==3) {
    console.log("test fallito");
}
const newTaskNoName = {    
    user_id :12,
    due_date : "2000-03-01"
}

try {
    const addTaskNoName = addTask(newTaskNoName,taskList)
    console.log("il test è nome vuoto fallito");
} catch (error) {
   
    if(!(error.message === 'manca il nome alla task')){
        console.log("tes fallito, non ho trovato vl'errore che mi aspettavo")
    }
   // console.log(error.message)
}



const emptyStringName = { 
    name:"",   
    user_id :12,
    due_date : "2000-03-01"
}

try {
    const addTaskNoName = addTask(emptyStringName,taskList)
    console.log("il test è stringa vuota è fallito");
} catch (error) {
    if(!(error.message === 'manca il nome alla task')){
        console.log("test fallito, non ho trovato vl'errore che mi aspettavo")
    }
}


const spaceStringName = { 
    name:"          ",   
    user_id :12,
    due_date : "2000-03-01"
}

try {
    const addTaskNoName = addTask(spaceStringName,taskList)
    console.log("il test è spazi vuoti  è fallito");
} catch (error) {
    if(!(error.message === 'manca il nome alla task')){
        console.log("test fallito, non ho trovato l'errore che mi aspettavo")
    }
}



const toTrimTask = { 
    name:"   Rinnovare patente       ",   
    user_id :12,
    due_date : "2000-03-01"
}


 const addToTrimTask = addTask(toTrimTask,taskList)
//console.log("addTaskNoName il test è spazi vuoti  è fallito");

const res = addToTrimTask.find(function(task,index){
    return task.name == toTrimTask.name.trim()
})

if(res == undefined){
    console.log("test fallito per addToTrimTask")
}

// const task_id = 3
// const removedTask = removeTask (task_id,newTaskList)
//console.log(removedTask);



const updatedTaskItem = {
    "name" : "Nuovo Nome Task",
    "user_id" : 1
} 

const updatetedTaskslist = updateTask(updatedTaskItem,taskList)

 //console.log(updatetedTaskslist)