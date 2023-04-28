const TaskList = props => {
return (
    <>
    <h3 className="task_list_header">{props.header} {props.tasks.length}</h3>
    <ul className="task_list_list">
        {props.children}
    </ul>
    </>
    )
}

export default TaskList;