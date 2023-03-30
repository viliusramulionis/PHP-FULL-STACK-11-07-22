import { useContext } from 'react';
import { useNavigate } from 'react-router-dom';
import axios from 'axios';
import MainContext from '../../context/MainContext';

function NewCategory() {
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
        axios.post('http://localhost:8000/api/categories', data)
        .then(resp => {
            setMessage({m: resp.data, s: 'success'});
            setTimeout(() => navigate('/admin/categories'), 2000);
        })
        .catch(error => {
            setMessage({m: error.response.data, s: 'danger'})
        })
        .finally(() => setLoading(false));
    }

    return (
        <>
            <h1>Nauja Kategorija</h1>
            <form onSubmit={handleSubmit}>
                <div className="mb-3">
                    <label>Pavadinimas</label>
                    <input type="text" name="name" className="form-control" required />
                </div>
                <button className="btn btn-primary">Išsaugoti</button>
            </form>
        </>
    );
}

export default NewCategory;