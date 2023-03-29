import { useEffect, useContext } from 'react';
import axios from 'axios';
import MainContext from '../context/MainContext';

function Products() {
  // const [data, setData] = useState([]);
  // const [refresh, setRefresh] = useState(false);
  const { data, setData, refresh, setLoading, setMessage } = useContext(MainContext);

  useEffect(() => {
    setMessage(false);
    setLoading(true);
    //Duomenų paėmimas naudojant fetch funkciją
    // fetch('http://localhost:8000/api/')
    // .then(resp => resp.json())
    // .then(resp => {
    //   setData(resp);
    // });

    //Duomenų paėmimas naudojant axios modulį
    axios.get('http://localhost:8000/api/products/')
    .then(resp => setData(resp.data))
    .finally(() => setLoading(false));
  }, [refresh]);

  return (
    <>
        <h1>Naujausi produktai</h1>
        <div className="row">
          {data.map(product => 
            <div className="col-4" key={product.id}>
              <img 
                src={product.photo} 
                alt={product.name}
              />
              <h4>{product.name}</h4>
            </div>
          )}
        </div>
    </>
  );
}

export default Products;
