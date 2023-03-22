import { useState, useEffect } from 'react';
import axios from 'axios';
import './App.css';

function App() {
  const [data, setData] = useState([]);

  useEffect(() => {
    //Duomenų paėmimas naudojant fetch funkciją
    // fetch('http://localhost:8000/api/')
    // .then(resp => resp.json())
    // .then(resp => {
    //   setData(resp);
    // });

    //Duomenų paėmimas naudojant axios modulį
    axios.get('http://localhost:8000/api/')
    .then(resp => setData(resp.data));
  }, []);

  return (
    <div className="container py-3">
        <h1>Naujausi produktai</h1>
        <div className="row">
          {data.map(product => 
            <div className="col-4">
              <img 
                src={'http://localhost:8000' + product.photo} 
                alt={product.name}
              />
              <h4>{product.name}</h4>
            </div>
          )}
        </div>
    </div>
  );
}

export default App;
