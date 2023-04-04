import { useContext } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import axios from 'axios';
import MainContext from '../context/MainContext';

function Order() {
    const { data, setData, refresh, setLoading, setMessage } = useContext(MainContext);
    const { productId, productQty } = useParams();
    const navigate = useNavigate();

    const handleSubmit = (e) => {
        e.preventDefault();

        setMessage(false);
        setLoading(true);

        const data = new FormData(e.target);

        data.append('product_id', productId);
        data.append('product_qty', productQty);

        axios.post('http://localhost:8000/api/orders/', data)
        .then(resp => {
            setMessage({ m: resp.data, s: 'success' });
            setTimeout(() => navigate('/'), 2000);
        })
        .catch(error => {
            setMessage({m: error.response.data, s: 'danger'})
        })
        .finally(() => setLoading(false));
    }

    return (
        <form onSubmit={handleSubmit}>
            <h2>Užsakymo informacija</h2>
            <div className="mb-3">
                <label>Jūsų vardas:</label>
                <input 
                    type="text" 
                    name="first_name" 
                    className="form-control" 
                    required
                />
            </div>
            <div className="mb-3">
                <label>Jūsų pavardė:</label>
                <input 
                    type="text" 
                    name="last_name" 
                    className="form-control" 
                    required
                />
            </div>
            <div className="mb-3">
                <label>Jūsų adresas:</label>
                <input 
                    type="text" 
                    name="address" 
                    className="form-control" 
                    required
                />
            </div>
            <div className="mb-3">
                <label>Jūsų el. pašto adresas:</label>
                <input 
                    type="email" 
                    name="email" 
                    className="form-control" 
                    required
                />
            </div>
            <div className="mb-3">
                <label>Jūsų telefono numeris:</label>
                <input 
                    type="phone" 
                    name="phone" 
                    className="form-control" 
                    required
                />
            </div>
            <div className="mb-3">
                <h4>Mokėjimo būdas:</h4>
                <div className="mb-1">
                    <label>
                        <input 
                            type="radio" 
                            name="payment_method" 
                            className="form-check-input me-2" 
                            value="1"
                        />
                        Paysera
                    </label>
                </div>
                <div className="mb-1">
                    <label>
                        <input 
                            type="radio" 
                            name="payment_method" 
                            className="form-check-input me-2" 
                            value="2"
                        />
                        Visa
                    </label>
                </div>
                <div className="mb-1">
                    <label>
                        <input 
                            type="radio" 
                            name="payment_method" 
                            className="form-check-input me-2" 
                            value="3"
                        />
                        Mastercard
                    </label>
                </div>
            </div>
            <div className="mb-3">
                <h4>Pristatymo būdas:</h4>
                <div className="mb-1">
                    <label>
                        <input 
                            type="radio" 
                            name="shipping_method" 
                            className="form-check-input me-2" 
                            value="1"
                        />
                        Atsiėmimas DPD paštomate
                    </label>
                </div>
                <div className="mb-1">
                    <label>
                        <input 
                            type="radio" 
                            name="shipping_method" 
                            className="form-check-input me-2" 
                            value="2"
                        />
                        Pristatymas į namus
                    </label>
                </div>
            </div>
            <button className="btn btn-primary">Užsakyti</button>
        </form>
    );
}

export default Order;