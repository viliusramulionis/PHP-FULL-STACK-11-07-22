import { useContext, useEffect } from 'react';
import { Link } from 'react-router-dom';
import axios from 'axios';
import MainContext from '../../context/MainContext';

function Products() {
    const { data, setLoading, setData, refresh, setMessage, setRefresh } = useContext(MainContext);

    useEffect(() => {
        setLoading(true);
        //Duomenų paėmimas naudojant fetch funkciją
        // fetch('http://localhost:8000/api/')
        // .then(resp => resp.json())
        // .then(resp => {
        //   setData(resp);
        // });

        //Duomenų paėmimas naudojant axios modulį
        axios.get('http://localhost:8000/api/products')
            .then(resp => {
                setData(resp.data);
            })
            .finally(() => setLoading(false));
    }, [refresh]);

    const handleDelete = (id) => {
        setLoading(true);

        axios.delete('http://localhost:8000/api/products/' + id)
            .then(resp => {
                setMessage({ m: resp.data, s: 'success' });
                setRefresh(!refresh);
            })
            .finally(() => setLoading(false));
    }

    return (
        <>
            <div className="d-flex justify-content-between align-items-center">
                <h1>Produktų sąrašas</h1>
                <Link to="/admin/new-product" className="btn btn-primary">Naujas produktas</Link>
            </div>
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
                            <td>
                                <Link
                                    to={'/admin/edit-product/' + product.id}
                                    className="btn btn-primary"
                                >Redaguoti</Link>
                                <button
                                    className="btn btn-danger"
                                    onClick={() => handleDelete(product.id)}
                                >Ištrinti</button>
                            </td>
                        </tr>
                    )}
                </tbody>
            </table>
        </>
    );
}

export default Products;
