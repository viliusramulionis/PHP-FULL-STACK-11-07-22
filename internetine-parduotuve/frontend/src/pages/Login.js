import { useContext } from 'react';
import { useNavigate } from 'react-router-dom';
import axios from 'axios';
import MainContext from '../context/MainContext';

function Login() {
    const { setLoading, setMessage, setUser } = useContext(MainContext);
    const navigate = useNavigate();

    const handleSubmit = (e) => {
        e.preventDefault();

        const data = new FormData(e.target);

        setLoading(true);
        axios.post('http://localhost:8000/api/login', data)
        .then(resp => {
            setMessage({m: resp.data.message, s: 'success'});

            setTimeout(() => {
                setUser(true);
                localStorage.setItem('token', resp.data.token);
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + resp.data.token;
                navigate('/admin');
            }, 2000);
        })
        .catch(error => {
            setMessage({m: error.response.data, s: 'danger'})
        })
        .finally(() => setLoading(false));
    }

    return (
        <>
            <h1>Prisijungimas</h1>
            <form onSubmit={handleSubmit}>
                <div className="mb-3">
                    <label>El. pašto adresas</label>
                    <input type="email" name="email" className="form-control" required />
                </div>
                <div className="mb-3">
                    <label>Slaptažodis</label>
                    <input type="password" name="password" className="form-control" required />
                </div>
                <button className="btn btn-primary">Prisijungti</button>
            </form>
        </>
    );
}

export default Login;