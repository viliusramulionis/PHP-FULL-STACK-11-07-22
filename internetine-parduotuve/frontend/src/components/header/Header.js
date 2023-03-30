import { useState, useContext } from 'react';
import { Link } from 'react-router-dom';
import axios from 'axios';
import MainContext from '../../context/MainContext';

function Header() {
    const [search, setSearch] = useState('');
    const {setData, setRefresh} = useContext(MainContext);

    const handleSearch = (e) => {
        e.preventDefault();

        if(search === '') return setRefresh(buvusi => !buvusi);

        axios.get('http://localhost:8000/api/products/s/' + search)
        .then(resp => setData(resp.data));
    }

    return (
        <header className="p-3 mb-3 border-bottom">
            <div className="container">
                <div className="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <Link to="/" className="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                        <h6>Pavadinimas</h6>
                    </Link>

                    <ul className="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><Link to="/admin" className="nav-link px-2 link-dar">Administratorius</Link></li>
                        <li><Link to="/admin/categories" className="nav-link px-2 link-dar">Kategorijos</Link></li>
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

                    <div className="dropdown text-end">
                        <a href="#" className="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" className="rounded-circle" />
                        </a>
                    </div>
                </div>
            </div>
        </header>
    );
}

export default Header;