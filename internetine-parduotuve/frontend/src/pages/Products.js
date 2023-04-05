import { useEffect, useContext, useState } from 'react';
import axios from 'axios';
import MainContext from '../context/MainContext';
import Product from '../components/product/Product';

function Products() {
  const [sort, setSort] = useState('');
  const [direction, setDirection] = useState('');
  // const [refresh, setRefresh] = useState(false);
  const { data, setData, refresh, setLoading, setMessage } = useContext(MainContext);

  useEffect(() => {
    let url = 'http://localhost:8000/api/products/';

    if(sort != '' && direction != '') {
      url += sort + '/' + direction + '/';
    }

    setMessage(false);
    setLoading(true);

    axios.get(url)
    .then(resp => {
      setData(resp.data)
    })
    .finally(() => setLoading(false));
  }, [refresh, sort, direction]);

  return (
    <>  
        <div className="d-flex justify-content-between align-items-center pb-4">
          <h1>Naujausi produktai</h1>
          <div className="sort d-flex gap-3">
            <select 
              className="form-control"
              onChange={(e) => setSort(e.target.value)}
            >
              <option value="">Pasirinkite rūšiavimą</option>
              <option value="name">Pagal pavadinimą</option>
              <option value="price">Pagal kainą</option>
            </select>
            <select 
              className="form-control"
              onChange={(e) => setDirection(e.target.value)}
            >
              <option value="">Pasirinkite kryptį</option>
              <option value="asc">Didėjančia tvarka</option>
              <option value="desc">Mažėjančia tvarka</option>
            </select>
          </div>
        </div>
        <div className="row">
          {data.map(product => 
            <Product key={product.id} data={product} />
          )}
        </div>
    </>
  );
}

export default Products;
