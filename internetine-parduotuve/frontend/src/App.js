import './App.css';
import { useState } from 'react';

//React router dom
import { BrowserRouter, Routes, Route } from 'react-router-dom';

//Layoutas
import MainLayout from './layouts/MainLayout';

//Kontekstas
import MainContext from './context/MainContext';

//Puslapiai
import Products from './pages/Products';
import AdminProducts from './pages/admin/Products';
import NewProduct from './pages/admin/NewProduct';
import EditProduct from './pages/admin/EditProduct';

function App() {
  const [data, setData] = useState([]);
  const [refresh, setRefresh] = useState(false);
  const [loading, setLoading] = useState(false);
  const [message, setMessage] = useState();

  const contextValues = { 
    data, 
    setData, 
    refresh, 
    setRefresh,
    loading,
    setLoading,
    message,
    setMessage
  };

  return (
    <>
      <BrowserRouter>
        <MainContext.Provider value={contextValues}>
          <MainLayout>
            <Routes>
              <Route path="/" element={<Products />} />
              <Route path="/admin" element={<AdminProducts />} />
              <Route path="/admin/new-product" element={<NewProduct />} />
              <Route path="/admin/edit-product/:id" element={<EditProduct />} />
            </Routes>
          </MainLayout>
        </MainContext.Provider>
      </BrowserRouter>
    </>
    // <Products />
  );
}

export default App;
