# 🍗 Aplikasi Manajemen Ayam Geprek

Aplikasi web untuk manajemen restoran Ayam Geprek dengan design glassmorphism biru & ungu yang modern.

## ✨ Fitur Utama

### 📊 Dashboard
- Statistik total menu, bahan baku, dan pesanan
- Card design yang menarik dengan hover effects

### 🍽️ Menu Management (CRUD)
- Lihat semua menu
- Tambah menu baru
- Edit menu
- Hapus menu
- Integrasi dengan kategori menu
- Format harga otomatis

### 📦 Bahan Baku Management (CRUD)
- Lihat semua bahan baku
- Tambah bahan baru
- Edit bahan
- Hapus bahan
- Status badge (Tersedia/Terbatas)
- Tracking stok otomatis

### 🛒 Pesanan Management (CRUD)
- Lihat semua pesanan
- Tambah pesanan baru
- Edit pesanan
- Hapus pesanan
- Status pembayaran (Lunas/Belum Bayar)
- Tanggal & jam tracking

## 🎨 Design Features

✨ **Glassmorphism** - Efek blur glass yang modern  
🎨 **Warna Biru & Ungu** - Gradient background #667eea → #764ba2  
🎯 **Interactive Buttons** - Hover effects & transitions  
📱 **Fully Responsive** - Mobile, tablet, dan desktop friendly  
🏷️ **Badge Status** - Visual indicators untuk stok & pembayaran  
⚡ **Modern UI/UX** - Clean dan user-friendly

## 🛠️ Teknologi

- **Frontend**: HTML, CSS (Glasmorphism)
- **Backend**: PHP (Procedural)
- **Database**: MySQL
- **Server**: Apache/XAMPP

## 📋 Struktur Folder

```
ayam-geprek/
├── style.css              # CSS Glasmorphism
├── koneksi.php            # Koneksi Database
├── header.php             # Header & Navigation
├── footer.php             # Footer
├── index.php              # Dashboard
├── database.sql           # Database Schema
├── menu/
│   ├── menu.php           # Lihat Menu
│   ├── menu_tambah.php    # Tambah Menu
│   ├── menu_edit.php      # Edit Menu
│   └── menu_hapus.php     # Hapus Menu
├── bahan/
│   ├── bahan.php          # Lihat Bahan
│   ├── bahan_tambah.php   # Tambah Bahan
│   ├── bahan_edit.php     # Edit Bahan
│   └── bahan_hapus.php    # Hapus Bahan
└── pesanan/
    ├── pesanan.php        # Lihat Pesanan
    ├── pesanan_tambah.php # Tambah Pesanan
    ├── pesanan_edit.php   # Edit Pesanan
    └── pesanan_hapus.php  # Hapus Pesanan
```

## 🚀 Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/samsul-ali/ayam-geprek.git
cd ayam-geprek
```

### 2. Setup Database
```bash
mysql -u root -p < database.sql
```

### 3. Copy ke Folder Web
```bash
cp -r ayam-geprek C:\xampp\htdocs\ayam-geprek
```

### 4. Konfigurasi Koneksi
Edit file `koneksi.php` jika diperlukan:
```php
$conn = mysqli_connect("localhost", "root", "", "ayam_geprek");
```

### 5. Jalankan Aplikasi
- Buka: `http://localhost/ayam-geprek/index.php`
- Login tidak diperlukan (demo)

## 📊 Database Schema

### Tabel Utama:
- `Kategori_Menu` - Kategori menu
- `Menu` - Daftar menu
- `Bahan_Baku` - Inventory bahan
- `Pesanan` - Pesanan pelanggan
- `Karyawan` - Data karyawan
- `Meja` - Nomor meja
- Dan lainnya...

## 🔐 Catatan Keamanan

⚠️ **PENTING**: Aplikasi ini menggunakan string interpolation untuk query SQL, tidak aman untuk production.

### Untuk Production, gunakan:
```php
// Gunakan Prepared Statements
$stmt = $conn->prepare("SELECT * FROM Menu WHERE id_menu = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
```

## 📝 Sample Data

Database sudah include sample data:
- 3 Kategori Menu
- 3 Menu (Ayam Geprek Biasa, Ayam Geprek Pedas, Es Teh Manis)
- 3 Bahan Baku (Ayam, Cabai Merah, Bawang Putih)
- 3 Meja
- 2 Karyawan

## 🎯 Fitur Future

- [ ] Authentication & Login
- [ ] Receipt/Invoice Print
- [ ] Weekly/Monthly Reports
- [ ] Multi-User Support
- [ ] Barcode Scanner Integration
- [ ] Rest API
- [ ] Mobile App

## 👨‍💻 Author

**Samsul Ali**  
GitHub: [@samsul-ali](https://github.com/samsul-ali)

## 📄 License

MIT License - Feel free to use this project!

## 💡 Tips

- Pastikan XAMPP/Apache dan MySQL sudah running
- Database akan auto-create saat import SQL
- Semua file relatif path, jadi folder harus tepat
- Gunakan browser modern untuk efek glassmorphism terbaik

---

**Selamat menggunakan Aplikasi Manajemen Ayam Geprek!** 🍗✨