import logo from './logo.svg';
import './App.css';
import CardBase from './components/CardBase';

function App_copy() {
  const bookList = [
    {
      titolo: "Harry Potter",
      autore: "Rowling"
    },
    {
      titolo: "Il signore degli anelli",
      autore: "Tolkien"
    },
    {
      titolo: "Fil-Ippo dello Zoom",
      autore: "Enri"
    }
  ]

  const card_list = bookList.map((book,key) => <CardBase key={key} testo ={book.autore} titolo ={book.titolo}/>)
  // const card_list = bookList.map(function(book){return <CardBase titolo ={book.titolo}/>})

  return (
    <section>
    <div className="App">
      {/*  <CardBase colore={'red'} titolo={'Harry Potter'}></CardBase>
      <CardBase titolo={'Il signore degli anelli'}></CardBase>
      <CardBase titolo={'Il piccolo principe'}></CardBase> */ card_list}
    </div>
    <hr />
    <div className="secondo_elenco">
    {bookList.map(book => <CardBase key={book.titolo} titolo ={book.titolo}/>)}
    </div>
    </section>
  )
}

export default App_copy;
