function Loading({ show }) {
    return show &&
            <div className="loading">
                <div className="lds-facebook">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
}

export default Loading