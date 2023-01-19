const Post = ({ post }) => {

    const formatDate = () => {
        const date = new Date(post.date.split(' ')[0]);

        return date.toLocaleDateString('en-US', { month: 'short', year: 'numeric', day: 'numeric'} );
    }

    return (
        <div className="col-4 mb-3">
            <div className="image">
                <img src={post.image} alt={post.title} />
                <span className="category">{post.category}</span>
            </div>
            <div className="info">
                <span>{formatDate()}</span>
                <span className="separator">/</span>
                <span>{post.comments} comments</span>
            </div>
            <h3>{post.title}</h3>
            <p>{post.content}</p>
            <a href={post.link}>Continue reading →</a>
        </div>
    );
}

export default Post;