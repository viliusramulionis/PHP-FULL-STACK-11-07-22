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
import Order from './pages/Order';
import Category from './pages/Category';
import AdminProducts from './pages/admin/Products';
import NewProduct from './pages/admin/ProductsNew';
import EditProduct from './pages/admin/ProductsEdit';
import Categories from './pages/admin/Categories';
import NewCategory from './pages/admin/CategoriesNew';
import EditCategory from './pages/admin/CategoriesEdit';
import Orders from './pages/admin/Orders';

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
              <Route path="/category/:id" element={<Category />} />
              <Route path="/:productId/:productQty" element={<Order />} />
              <Route path="/admin">
                <Route index element={<AdminProducts />} />
                <Route path="new-product" element={<NewProduct />} />
                <Route path="edit-product/:id" element={<EditProduct />} />
                <Route path="categories" element={<Categories />} />
                <Route path="new-category" element={<NewCategory />} />
                <Route path="edit-category/:id" element={<EditCategory />} />
                <Route path="orders" element={<Orders />} />
              </Route>
            </Routes>
          </MainLayout>
        </MainContext.Provider>
      </BrowserRouter>
    </>
    // <Products />
  );
}

export default App;
