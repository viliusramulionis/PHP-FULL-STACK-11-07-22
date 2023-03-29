import { useContext } from 'react';
import { useNavigate } from 'react-router-dom';
import axios from 'axios';
import MainContext from '../../context/MainContext';

function NewProduct() {
    const { setLoading, setMessage } = useContext(MainContext);
    const navigate = useNavigate();

    const handleSubmit = (e) => {
        e.preventDefault();

        const data = new FormData(e.target);

        //Su Fetch Funkcija
        // fetch('http://localhost:8000/api/products', {
        //     body: data,
        //     method: 'POST'
        // })
        // .then(resp => resp.text())
        // .then(resp => console.log(resp));

        setLoading(true);
        axios.post('http://localhost:8000/api/products', data)
        .then(resp => {
            setMessage({m: resp.data, s: 'success'});
            setTimeout(() => navigate('/admin'), 2000);
        })
        .catch(error => {
            setMessage({m: error.response.data, s: 'danger'})
        })
        .finally(() => setLoading(false));
    }

    return (
        <>
            <h1>Naujas Produktas</h1>
            <form onSubmit={handleSubmit}>
                <div className="mb-3">
                    <label>Pavadinimas</label>
                    <input type="text" name="name" className="form-control" required />
                </div>
                <div className="mb-3">
                    <label>SKU</label>
                    <input type="text" name="sku" className="form-control" required />
                </div>
                <div className="mb-3">
                    <label>Photo</label>
                    <input type="text" name="photo" className="form-control" required />
                </div>
                <div className="mb-3">
                    <label>Likutis sandėlyje</label>
                    <input type="number" name="warehouse_qty" className="form-control" required />
                </div>
                <div className="mb-3">
                    <label>Kaina</label>
                    <input type="number" name="price" step="0.01" className="form-control" required />
                </div>
                <button className="btn btn-primary">Išsaugoti</button>
            </form>
        </>
    );
}

export default NewProduct;