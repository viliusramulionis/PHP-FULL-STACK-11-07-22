import './App.css';
import { useId, useState, useEffect } from 'react';
import Form from './components/form/Form'

const App = () => {
  const [tasks, setTasks] = useState([]);
  const [currentTask, setCurrentTask] = useState({
    name: '',
    done: false
  });
  const [edit, setEdit] = useState(false);
  const [editId, setEditId] = useState();

  useEffect(() => {
    const data = localStorage.getItem('tasks');
    setTasks(JSON.parse(data));
  }, []);

  const handleForm = (e) => {
    e.preventDefault();
    let data;

    if(edit) {
      tasks[editId].name = currentTask.name;
      data = [...tasks];
      setTasks(data);
      setEdit(false);
    } else {
      data = [...tasks, currentTask];
      setTasks(data);
    }

    localStorage.setItem('tasks', JSON.stringify(data));

    setCurrentTask({
      name: '',
      done: false
    });
  }

  const handleDone = (e, index) => {
    tasks[index].done = !tasks[index].done;
    const data = [...tasks];
    setTasks(data);
    localStorage.setItem('tasks', JSON.stringify(data));
  }

  const handleDelete = (index) => {
    tasks.splice(index, 1);
    const data = [...tasks];
    setTasks(data);
    localStorage.setItem('tasks', JSON.stringify(data));
  }

  const handleEdit = (index) => {
    setCurrentTask(tasks[index]);
    setEdit(true);
    setEditId(index);
  }

  return (
      <div className="container">
        <h1>Task Manager</h1>
        <Form 
          currentTask={currentTask} 
          setCurrentTask={setCurrentTask} 
          handleForm={handleForm} 
        />
        {tasks.map((value, index) => 
          <li 
            key={value.name + index} 
            className={value.done ? 'done' : ''}
          >
            <div className="d-flex justify-content-between">
              <span onClick={ (e) => handleDone(e, index) }>{value.name}</span>
              <div>
                <button 
                  className="btn btn-danger me-2" 
                  onClick={() => handleDelete(index)}
                >Delete</button>
                <button 
                  className="btn btn-primary" 
                  onClick={() => handleEdit(index)}
                >Edit</button>
              </div>
            </div>
          </li> 
        )}
      </div>
  );
}

export default App;
