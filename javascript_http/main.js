import {getUser }from "./UserService.js";
import { UserList, UserTable } from "./RenderView.js";

const users = await getUser()
UserList(users,'lista_utenti')
UserTable(users,'lista_utenti_1')