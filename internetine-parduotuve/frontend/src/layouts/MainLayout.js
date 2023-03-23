import Header from '../components/header/Header';

function MainLayout(props) {
    return (
        <>
            <Header />
            <div className="container">
                {props.children}
            </div>
        </>
    );
}

export default MainLayout;