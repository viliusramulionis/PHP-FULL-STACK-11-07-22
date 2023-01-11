const Subheadline = () => {
    return (
        <div className="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
            <div className="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div className="my-3 p-3">
                    <h2 className="display-5">Another headline</h2>
                    <p className="lead">And an even wittier subheading.</p>
                </div>
                <div 
                    className="bg-body shadow-sm mx-auto" 
                    style={{width: '80%', height: '300px', borderRadius: '21px 21px 0 0'}}
                ></div>
            </div>
            <div className="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div className="my-3 py-3">
                    <h2 className="display-5">Another headline</h2>
                    <p className="lead">And an even wittier subheading.</p>
                </div>
                <div 
                    className="bg-body shadow-sm mx-auto" 
                    style={{width: '80%', height: '300px', borderRadius: '21px 21px 0 0'}}
                ></div>
            </div>
        </div>
    );
}

export default Subheadline;