import {getUser }from "./UserService.js";
import { UserList, UserTable } from "./RenderView.js";

const users = await getUser()
UserTable(users,'lista_utenti_1')
UserList(users,'lista_utenti')