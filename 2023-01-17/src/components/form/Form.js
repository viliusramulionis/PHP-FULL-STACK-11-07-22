const Form = ({ handleForm, setCurrentTask, currentTask }) => {
    return (
        <form className="input-group" onSubmit={handleForm}>
          <input 
            type="text" 
            className="form-control" 
            onChange={ (e) => setCurrentTask({ name: e.target.value, done: false }) } 
            value={currentTask.name}
          />
          <button className="btn btn-primary">Išsaugoti</button>
        </form>
    );
}

export default Form;