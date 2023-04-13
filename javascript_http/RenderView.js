
function UserList(array_users, element_selector) {

    const lista = document.getElementById(element_selector)
    const elenco = array_users.map((user) => {

        return "<li>(" + user.user_id + ")" + user.first_name + " " + user.last_name + "</li>"
    }).join("")

    lista.innerHTML = elenco
}
const UserTable = (array_users, element_selector) => {
    const html =
    //template literals ``
    `
    <table border=1, width=100%>
          <tr>
                <th>
                Nome
                </th>
          </tr>
          `
        +
        array_users.map((user) => {



            return `<tr>
              <td>
              🦛${user.first_name+" "+user.last_name}
             </td>
          </tr> `
        }).join("")
        +
        `
    </table>
   `
   document.getElementById(element_selector).innerHTML= html
}

export { UserList, UserTable }