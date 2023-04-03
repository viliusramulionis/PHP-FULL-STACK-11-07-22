import { useContext, useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import axios from 'axios';
import MainContext from '../../context/MainContext';
import AdminTableButtons from '../../components/adminTableButtons/AdminTableButtons';

function Products() {
    const { setLoading, refresh, setMessage, setRefresh } = useContext(MainContext);
    const [data, setData] = useState([]);

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
                        <th>Likutis</th>
                        <th>Kaina</th>
                        <th>Statusas</th>
                        <th>Kategorijos</th>
                        <th>Data</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {data.map(item =>
                        <tr key={item.id}>
                            <td>{item.id}</td>
                            <td>{item.name}</td>
                            <td>{item.sku}</td>
                            <td>{item.warehouse_qty}</td>
                            <td>{item.price}</td>
                            <td>{item.status ? 'Įjungtas' : 'Išjungtas'}</td>
                            <td>{item.categories.map(cat => cat.name).join(', ')}</td>
                            <td>{(new Date(item.created_at)).toLocaleString('lt-LT')}</td>
                            <td>
                                <AdminTableButtons 
                                    id={item.id} 
                                    link="product" 
                                    deleteFn={handleDelete} 
                                />
                            </td>
                        </tr>
                    )}
                </tbody>
            </table>
        </>
    );
}

export default Products;
