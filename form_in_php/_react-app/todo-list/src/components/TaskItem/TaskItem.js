const TaskItem = ({name,done,id,parentRemoveTask}) => {

    function onRemoveTask() {
        console.log(('task '+id));
        parentRemoveTask(id)
    }

function onUpdateStatus() {
    console.log(id,!done);
}

    return (
        <li className={done ? 'done': ''}>
            
            <input onChange={onUpdateStatus} checked={done} type="checkbox" />
            {done}
            <label>
                {name}
            </label>
            <button className="btn btn-primary btn-sm" href="#" data-mdb-toggle="tooltip" title="Edit TaskItem">Edit</button>
            <button className="btn btn-primary btn-sm" href="#" data-mdb-toggle="tooltip" onClick={onRemoveTask} title="Remove TaskItem">Remove</button>

        </li>
    )
}
export default TaskItem;
