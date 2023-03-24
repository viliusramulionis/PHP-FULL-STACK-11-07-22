import './App.css';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import MainLayout from './layouts/MainLayout';
import Products from './pages/Products';
import AdminProducts from './pages/admin/Products';
import NewProduct from './pages/admin/NewProduct';

function App() {
  return (
    <>
      <BrowserRouter>
        <MainLayout>
          <Routes>
            <Route path="/" element={<Products />} />
            <Route path="/admin" element={<AdminProducts />} />
            <Route path="/admin/new-product" element={<NewProduct />} />
          </Routes>
        </MainLayout>
      </BrowserRouter>
    </>
    // <Products />
  );
}

export default App;
