import './App.css';
import { useState, useEffect } from 'react';

const App = () => {
  const [advice, setAdvice] = useState();
  const [refresh, setRefresh] = useState(false);

  useEffect(() => {
    fetch('https://api.adviceslip.com/advice')
    .then(resp => resp.json())
    .then(resp => {
      const storedAdvices = localStorage.getItem('advices');
      const returnedObject = {
        text: resp.slip.advice,
        count: 1
      };
      
      if(storedAdvices) {
        const parsedAdvices = JSON.parse(storedAdvices);

        parsedAdvices.push(resp.slip.id);
  
        localStorage.setItem('advices', JSON.stringify(parsedAdvices));

        returnedObject.count = parsedAdvices.filter((value) => value === resp.slip.id).length;
      } else {
        localStorage.setItem('advices', JSON.stringify([resp.slip.id]));
      }

      setAdvice(returnedObject);
    });
  }, [refresh]);

  return (
    <>
      <h1>Patarimas šiandienai:</h1>
      <p>"{advice?.text}" ({advice?.count} kartus)</p>
      <button class="btn btn-primary" onClick={() => setRefresh(!refresh)}>Naujas patarimas</button>
    </>
  );
}

export default App;
