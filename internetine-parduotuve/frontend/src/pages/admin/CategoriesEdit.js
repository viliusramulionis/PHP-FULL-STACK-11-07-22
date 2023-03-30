import { useState, useEffect, useContext } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import axios from 'axios';
import MainContext from '../../context/MainContext';

function EditCategory() {
    const { setLoading, setMessage } = useContext(MainContext);
    const [data, setData] = useState({
        name: ''
    });
    const navigate = useNavigate();
    const { id } = useParams();

    useEffect(() => {
        setLoading(true);

        axios.get('http://localhost:8000/api/categories/' + id)
        .then(resp => setData(resp.data))
        .finally(() => setLoading(false));
    }, []);

    const handleSubmit = (e) => {
        e.preventDefault();

        setLoading(true);

        axios.put('http://localhost:8000/api/categories/' + id, data)
        .then(resp => {
            setMessage({m: resp.data, s: 'success'});
            setTimeout(() => navigate('/admin/categories'), 2000);
        })
        .catch(error => {
            setMessage({m: error.response.data, s: 'danger'})
        })
        .finally(() => setLoading(false));
    }

    const handleField = (e) => {
        setData({...data, [e.target.name] : e.target.value});
    }

    return (
        <>
            <h1>Redaguoti kagoriją</h1>
            <form onSubmit={handleSubmit}>
                <div className="mb-3">
                    <label>Pavadinimas</label>
                    <input 
                        type="text" 
                        name="name" 
                        className="form-control" 
                        required 
                        value={data.name} 
                        onChange={handleField}
                    />
                </div>
                <button className="btn btn-primary">Išsaugoti</button>
            </form>
        </>
    );
}

export default EditCategory;