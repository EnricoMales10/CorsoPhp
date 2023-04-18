import {getUser }from "./UserService.js";
import { UserList, UserTable } from "./RenderView.js";

// -> promessa
getUser().then((json) => {
UserList(json,"lista_utenti")
    
})
const user_locale = [
    {
        "first_name": "Lara",
        "last_name": "Rossi",
        "birthday": "1995-10-15",
        "birth_city": "Torino",
        "regione_id": 12,
        "provincia_id": 96,
        "gender": "F",
        "username": "lara@hotmail.it",
        "password": "fa246d0262l666666b0c72bb20eeb1d",
        "user_id": 2
      },
      {
        "first_name": "Fil",
        "last_name": "Ippo",
        "birthday": "2021-12-31",
        "birth_city": "Cumiana",
        "regione_id": 12,
        "provincia_id": 96,
        "gender": "F",
        "username": "ippo@gmail.com",
        "password": "fa246d0262p888887b0c72bb20eeb1d",
        "user_id": 3
      }
]
UserTable(user_locale,"lista_utenti_2")

// getUser().then((json)=>{
//     //view
// alert(json[0]["first_name"]+" "+(json[0]["last_name"]))
// })
;