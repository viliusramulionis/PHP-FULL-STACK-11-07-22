import './App.css';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import MainLayout from './layouts/MainLayout';
import Products from './pages/Products';
import AdminProducts from './pages/admin/Products';

function App() {
  return (
    <>
      <BrowserRouter>
        <MainLayout>
          <Routes>
            <Route path="/" element={<Products />} />
            <Route path="/admin" element={<AdminProducts />} />
          </Routes>
        </MainLayout>
      </BrowserRouter>
    </>
    // <Products />
  );
}

export default App;
