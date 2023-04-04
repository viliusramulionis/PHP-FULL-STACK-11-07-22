import { useState, useEffect, useContext } from 'react';
import { useParams } from 'react-router-dom';
import axios from 'axios';
import MainContext from '../context/MainContext';
import Product from '../components/product/Product';

function Category() {
  const [data, setData] = useState([]);
  const { refresh, setLoading, setMessage } = useContext(MainContext);
  const { id } = useParams();

  useEffect(() => {
    setMessage(false);
    setLoading(true);

    axios.get('http://localhost:8000/api/categories/products/' + id)
    .then(resp => setData(resp.data))
    .finally(() => setLoading(false));
  }, [refresh, id]);

  return (
    <>
        <h1>{data.name}</h1>
        <div className="row">
          {data.products && data.products.map(product => 
            <Product key={product.id} data={product} />
          )}
        </div>
    </>
  );
}

export default Category;
