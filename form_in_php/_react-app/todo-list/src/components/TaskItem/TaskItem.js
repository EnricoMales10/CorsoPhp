const TaskItem = props => {
    return (
        <div>
                <ul className="list-group">
                    <li className="list-group-item justify-content-between align-items-center 
                    border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-2">
                        <input className="form-check-input me-1" type="checkbox" value="" aria-label="..."/>
                        TaskItem
                        <a className="btn btn-primary btn-sm" href="#" data-mdb-toggle="tooltip" title="Remove TaskItem"> X </a>
                    </li>
                    <li className="list-group-item justify-content-between align-items-center 
                    border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-2">
                        <input checked="" className="form-check-input me-1" type="checkbox" value="" aria-label="..."/>
                        <s>TaskItem</s>
                        <a className="btn btn-primary btn-sm" href="#" data-mdb-toggle="tooltip" title="Remove TaskItem"> X </a>
                    </li>
                </ul>
            </div>
    )
}
export default TaskItem;
