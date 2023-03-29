import { useEffect, useContext } from 'react';
import { useLocation } from 'react-router-dom';
import Header from '../components/header/Header';
import Loading from '../components/loading/Loading';
import Message from '../components/message/Message';
import MainContext from '../context/MainContext';

function MainLayout(props) {
    const navigation = useLocation();
    const { setMessage } = useContext(MainContext);

    useEffect(() => {
        setMessage(false);
    }, [navigation]);

    return (
        <>
            <Loading />
            <Header />
            <div className="container">
                <Message />
                {props.children}
            </div>
        </>
    );
}

export default MainLayout;