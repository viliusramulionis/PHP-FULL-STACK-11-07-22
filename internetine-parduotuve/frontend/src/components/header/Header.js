import { useState, useContext, useEffect } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import axios from 'axios';
import MainContext from '../../context/MainContext';
import './Header.css';

function Header() {
    const [search, setSearch] = useState('');
    const [show, setShow] = useState(false);
    const [categories, setCategories] = useState([]);
    const {setData, setRefresh, user, setUser} = useContext(MainContext);
    const navigate = useNavigate();

    useEffect(() => {
        axios.get('http://localhost:8000/api/categories')
        .then(resp => setCategories(resp.data));
    }, []);

    const handleSearch = (e) => {
        e.preventDefault();

        if(search === '') return setRefresh(buvusi => !buvusi);

        axios.get('http://localhost:8000/api/products/s/' + search)
        .then(resp => setData(resp.data));
    }

    const handleLogout = () => {
        axios.get('http://localhost:8000/api/logout/')
        .then(resp => {
            localStorage.removeItem('token');
            setUser(false);
            navigate('/');
        });
    }

    return (
        <header className="p-3 mb-3 border-bottom">
            <div className="container">
                <div className="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <Link to="/" className="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                        <h6>Pavadinimas</h6>
                    </Link>

                    <ul className="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        {categories.map(el => 
                            <li key={el.id}><Link to={'/category/' + el.id} className="nav-link px-2 link-dar">{el.name}</Link></li>
                        )}
                    </ul>

                    <form 
                        className="mb-3 mb-lg-0 me-lg-3 input-group w-25" 
                        role="search"
                        onSubmit={handleSearch}
                    >
                        <input 
                            type="search" 
                            className="form-control" 
                            placeholder="Search..." 
                            aria-label="Search" 
                            onKeyUp={(e) => setSearch(e.target.value)}
                        />
                        <button className="btn btn-primary">Ieškoti</button>
                    </form>
                    {!user ?
                        <ul className="nav mb-2 justify-content-center mb-md-0">
                            <li><Link to="/login" className="nav-link px-2 link-dar">Prisijungimas</Link></li>
                            <li><Link to="/register" className="nav-link px-2 link-dar">Registracija</Link></li>
                        </ul>
                    :
                        <div className="dropdown text-end">
                            <div 
                                className="d-block link-dark text-decoration-none dropdown-toggle"
                                onClick={() => setShow(!show)}
                            >
                                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" className="rounded-circle" />
                            </div>
                            {show &&
                                <ul className="dropdown-menu text-small show">
                                    <li><Link to="/admin" className="dropdown-item">Administratorius</Link></li>
                                    <li><Link to="/admin/categories" className="dropdown-item">Kategorijos</Link></li>
                                    <li><Link to="/admin/orders" className="dropdown-item">Užsakymai</Link></li>
                                    <li className="py-2 px-3">
                                        <button 
                                            className="btn btn-warning"
                                            onClick={handleLogout}
                                        >Atsijungti</button>
                                    </li>
                                </ul>
                            }
                        </div>
                    }
                </div>
            </div>
        </header>
    );
}

export default Header;