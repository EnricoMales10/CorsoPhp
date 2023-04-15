const task = {
    "name":"comprare il latte",
    "due_date":"2000-01-01",
    "done":true
}

const frase1 = `Ti ricordi che il ${task.due_date} hai dovuto ${task.name}`

console.log(frase1)

// const {name,due_date} = task

frase(task)

function frase({name,due_date}) {
    const frase2 = `Ti ricordi che il ${due_date} hai dovuto ${name}`
console.log(frase2)
}