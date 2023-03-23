import { useState, useEffect } from 'react';
import axios from 'axios';

function Products() {
  const [data, setData] = useState([]);
  const [message, setMessage] = useState(false);

  useEffect(() => {
    //Duomenų paėmimas naudojant fetch funkciją
    // fetch('http://localhost:8000/api/')
    // .then(resp => resp.json())
    // .then(resp => {
    //   setData(resp);
    // });

    //Duomenų paėmimas naudojant axios modulį
    axios.get('http://localhost:8000/api/products')
    .then(resp => setData(resp.data));
  }, [message]);

  const handleDelete = (id) => {
    axios.delete('http://localhost:8000/api/products/' + id)
    .then(resp => setMessage(resp.data));
  }

  return (
        <>
            <h1>Produktų sąrašas</h1>
            {message && <div className="alert alert-success">{message}</div>}
            <table className="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pavadinimas</th>
                        <th>SKU</th>
                        <th>Likutis sandėlyje</th>
                        <th>Kaina</th>
                        <th>Statusas</th>
                        <th>Sukūrimo data</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {data.map(product => 
                        <tr key={product.id}>
                            <td>{product.id}</td>
                            <td>{product.name}</td>
                            <td>{product.sku}</td>
                            <td>{product.warehouse_qty}</td>
                            <td>{product.price}</td>
                            <td>{product.status ? 'Įjungtas' : 'Išjungtas'}</td>
                            <td>{(new Date(product.created_at)).toLocaleString('lt-LT')}</td>
                            <td><button className="btn btn-danger" onClick={() => handleDelete(product.id)}>Ištrinti</button></td>
                        </tr>
                    )}
                </tbody>
            </table>
        </>
  );
}

export default Products;
