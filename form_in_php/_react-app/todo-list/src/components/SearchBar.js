import { useState } from 'react';


const SearchBar = (props) => {
    //Hook useState const taskname | const setTaskName
    //taskName è la variabile che contiene lo stato attuale
    //setTaskName è la funzione che devo invocare ogni bolta che devo comunicare a react che il valore di taskname è cambiato

    const [taskName, setTaskName] = useState('')
    const [taskDueDate, setTaskDueDate] = useState('')

    function OnAddTask() {
        console.log(taskName);
        const newTask = {
            name:taskName.trim(),
            due_date:taskDueDate,
            done:false
        }
        props.parentAddTask(newTask)
        setTaskName('')
    }

    return (
        <section>
            <div className="TaskItem">

                <input type="text" id="task"  value={taskName} onChange={evento => setTaskName(evento.target.value)} className="form-control" />
               <div> {!taskName.trim().length>0 ? 'Devi inserire un titolo\n' : ' '}</div>
                <label htmlFor="due_date" className="form-label">Data di scadenza</label>
                <input type="date" value={taskDueDate} onChange={evento => setTaskDueDate(evento.target.value)} className="form-control date-picker" name="due_date" id="due_date" />
                <input type="button" name="add-task" value="Add" onClick={OnAddTask} disabled={!taskName.trim().length>0} className="btn btn-primary btn-sm btn-add" />
                <br />

            </div>
        </section>
    )
}

export default SearchBar