
const base_url = "http://localhost/CORSOPHP/form_in_php/rest_api"

export function getUser() {

    return fetch(base_url + "/users.php").then(response =>response.json())//promessa

     
}