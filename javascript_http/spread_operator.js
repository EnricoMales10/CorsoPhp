


const primari_additivi = ["rosso","verde","blu"]
const primari_sottrattivi = ["cyano","magenta","giallo"]


// console.log("rosso","verde","blu")
// console.log(...primari_additivi)
const tutti_colori_primary = [...primari_additivi,...primari_sottrattivi]
console.log(tutti_colori_primary)

const primari_additivi_pink = ["pink",...primari_additivi]
console.log(primari_additivi_pink)

const nuovo = "arancione"
const primari_additivi_pink_arancione =["pink",...primari_additivi,nuovo]
console.log(primari_additivi_pink_arancione)

const spelling_di_parola=[..."abra"]
console.log(spelling_di_parola)

const persona = {
    nome: "Mario",
    cognome: "Rossi"
}
const persona2 = {...persona,...{"voti":[6,7,8]}}
persona2.indirizzo = "Via Novara 33"

console.log(persona,persona2)

