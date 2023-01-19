import './App.css';
import { useEffect, useState } from 'react';
import Post from './components/post/Post'

const App = () => {
    const [posts, setPosts] = useState([]);

    useEffect(() => {
        setPosts(JSON.parse(localStorage.getItem('posts')));
    }, []);

    return (
        <>
            <h1 className="text-center my-3">Mano blog'as</h1>
            <div className="container">
                <div className="row">
                    {posts.map(post => 
                        <Post post={post} key={post._id} />
                    )}
                </div>
            </div>
        </>
    );
}

export default App;
