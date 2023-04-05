import { useContext, useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import axios from 'axios';
import MainContext from '../../context/MainContext';

function Orders() {
    const { setLoading, refresh, setMessage, setRefresh } = useContext(MainContext);
    const [data, setData] = useState([]);

    useEffect(() => {
        setLoading(true);

        axios.get('http://localhost:8000/api/orders')
            .then(resp => {
                setData(resp.data);
            })
            .finally(() => setLoading(false));
    }, [refresh]);

    const handleChange = (id, is_completed) => {
        setLoading(true);

        axios.put('http://localhost:8000/api/orders/' + id, { is_completed: !is_completed })
            .then(resp => {
                setMessage({ m: resp.data, s: 'success' });
                setRefresh(!refresh);
            })
            .finally(() => setLoading(false));
    }

    return (
        <>
            <div className="d-flex justify-content-between align-items-center">
                <h1>Užsakymų sąrašas</h1>
            </div>
            <table className="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Vardas</th>
                        <th>Pavardė</th>
                        <th>Adresas</th>
                        <th>El. pašto adresas</th>
                        <th>Telefonas</th>
                        <th>Mokėjimo būdas</th>
                        <th>Pristatymo būdas</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {data.map(item =>
                        <tr key={item.id}>
                            <td>{item.id}</td>
                            <td>{item.first_name}</td>
                            <td>{item.last_name}</td>
                            <td>{item.address}</td>
                            <td>{item.email}</td>
                            <td>{item.phone}</td>
                            <td>
                                {item.payment_method === 1 && 'Paysera'}
                                {item.payment_method === 2 && 'Visa'}
                                {item.payment_method === 3 && 'Mastercard'}
                            </td>
                            <td>
                                {item.shipping_method === 1 ? 'Atsiėmimas DPD paštomate' : 'Pristatymas į namus'}
                            </td>
                            <td>
                                <button 
                                    className={'btn ' + (item.is_completed ? 'btn-success' : 'btn-warning')}
                                    onClick={() => handleChange(item.id, item.is_completed)}
                                >
                                    {!item.is_completed ? 'Išsiųstas' : 'Ruošiamas'}
                                </button>
                            </td>
                        </tr>
                    )}
                </tbody>
            </table>
        </>
    );
}

export default Orders;
