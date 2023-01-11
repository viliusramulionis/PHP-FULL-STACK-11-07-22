import logo from './logo.svg';
import './App.css';

//Komponentas
function App() {
  //JSX sintaksė
  return (
    <div className="App">
      <header className="App-header">
        <img src={logo} className="App-logo" alt="logo" />
        <p>
          Sveiki, tai mano pirmoji react aplikacija.
        </p>
      </header>
    </div>
  );
}

export default App;
