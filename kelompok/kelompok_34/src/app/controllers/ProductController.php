<?php

class ProductController extends Controller
{
    private $productModel;

    public function __construct()
    {
        requireAuth();
        session_start();
        
        if ($_SESSION['user']['role'] !== 'admin') {
            $_SESSION['error'] = 'Akses ditolak! Hanya admin yang bisa mengelola produk.';
            header("Location: " . BASE_URL . "/pos");
            exit;
        }

        $this->productModel = $this->model('Product');
    }

    public function index()
    {
        $data['title'] = 'Kelola Produk - ' . APP_NAME;
        $data['products'] = $this->productModel->getAll();
        
        $this->view('products/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Produk - ' . APP_NAME;
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $price = floatval($_POST['price']);
            $stock = intval($_POST['stock']);
            $image = 'default.jpg'; 
            
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $image = $this->uploadImage($_FILES['image']);
            }
            
            $result = $this->productModel->create([
                'name' => $name,
                'price' => $price,
                'stock' => $stock,
                'image' => $image
            ]);
            
            if ($result) {
                $_SESSION['success'] = 'Produk berhasil ditambahkan!';
                header("Location: " . BASE_URL . "/product");
                exit;
            } else {
                $data['error'] = 'Gagal menambahkan produk!';
            }
        }
        
        $this->view('products/create', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Produk - ' . APP_NAME;
        $data['product'] = $this->productModel->find($id);
        
        if (!$data['product']) {
            $_SESSION['error'] = 'Produk tidak ditemukan!';
            header("Location: " . BASE_URL . "/product");
            exit;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $price = floatval($_POST['price']);
            $stock = intval($_POST['stock']);
            $image = $data['product']['image']; 
            
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $image = $this->uploadImage($_FILES['image']);
            }
            
            $result = $this->productModel->update($id, [
                'name' => $name,
                'price' => $price,
                'stock' => $stock,
                'image' => $image
            ]);
            
            if ($result) {
                $_SESSION['success'] = 'Produk berhasil diupdate!';
                header("Location: " . BASE_URL . "/product");
                exit;
            } else {
                $data['error'] = 'Gagal mengupdate produk!';
            }
        }
        
        $this->view('products/edit', $data);
    }

    public function delete($id)
    {
        $product = $this->productModel->find($id);
        
        if (!$product) {
            $_SESSION['error'] = 'Produk tidak ditemukan!';
            header("Location: " . BASE_URL . "/product");
            exit;
        }
        
        $result = $this->productModel->delete($id);
        
        if ($result) {
            $_SESSION['success'] = 'Produk berhasil dihapus!';
        } else {
            $_SESSION['error'] = 'Gagal menghapus produk!';
        }
        
        header("Location: " . BASE_URL . "/product");
        exit;
    }

    private function uploadImage($file)
    {
        $targetDir = BASE_PATH . "/src/public/uploads/products/";
        
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        
        if ($file['size'] > 2097152) {
            return 'default.jpg';
        }
        
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $extension;
        $targetFile = $targetDir . $filename;
        
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (!in_array(strtolower($extension), $allowedTypes)) {
            return 'default.jpg';
        }
        
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            return $filename;
        }
        
        return 'default.jpg';
    }
    
    private function getImageUrl($imageName)
    {
        if ($imageName && $imageName !== 'default.jpg') {
            $path = BASE_PATH . "/src/public/uploads/products/" . $imageName;
            if (file_exists($path)) {
                return BASE_URL . "/public/uploads/products/" . $imageName;
            }
        }
        return BASE_URL . "/public/images/default-product.jpg";
    }
}