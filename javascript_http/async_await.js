//const base_url = "enricomalesani.000Webhostapp.it/rest_api"

async function getUser(){
const base_url = "http://localhost/CORSOPHP/form_in_php/rest_api"

const response = await fetch(base_url+"/users.php")
const json = await response.json()

return json
}
//fetch(base_url+"tasks.php")
const users = await getUser()
console.log(users)