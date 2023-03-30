import { Link } from 'react-router-dom';

function AdminTableButtons({ id, deleteFn, link }) {
    return (
        <div className="d-flex gap-3 justify-content-end">
            <Link
                to={'/admin/edit-' + link + '/' + id}
                className="btn btn-primary"
            >Redaguoti</Link>
            <button
                className="btn btn-danger"
                onClick={() => deleteFn(id)}
            >Ištrinti</button>
        </div>
    );
}

export default AdminTableButtons;