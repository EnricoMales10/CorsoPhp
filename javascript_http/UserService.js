
const base_url = "http://localhost/CORSOPHP/form_in_php/rest_api"

// export function getUser() {

//     return fetch(base_url + "/users.php").then(response =>response.json())//promessa

     
// }

export async function getUser(){
    const response = await fetch(base_url+"/users.php")
    const json = await response.json()
    
    return json.data
    }