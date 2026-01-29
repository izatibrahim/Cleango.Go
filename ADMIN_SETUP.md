# Setup Admin Dashboard - CleanGo Laundry

## ✅ Yang Telah Selesai

Sistem admin login telah berhasil diimplementasikan dengan fitur-fitur berikut:

### 1. **Admin Login Page** (`/admin/login`)

- Halaman login khusus untuk admin
- Design profesional dengan gradient purple
- Error handling dan validasi form

### 2. **Admin Authentication**

- Validasi role 'admin' pada login
- Middleware proteksi untuk dashboard
- Session management

### 3. **Protected Admin Routes**

- `/dashboard` - Hanya admin
- `/paket` - Kelola paket laundry (hanya admin)
- `/transaksi` - Kelola transaksi (hanya admin)
- `/pelanggan` - Kelola pelanggan (hanya admin)

### 4. **Database Updates**

- Migration untuk menambah kolom `role` di tabel users
- Role field dengan default value 'user'

### 5. **Admin Management Command**

- `php artisan admin:create` untuk membuat admin baru

---

## 🚀 Cara Mengakses Admin Dashboard

### Login Admin:

1. Buka URL: `http://localhost:8000/admin/login`
2. Masukkan credential:
    - **Email:** `admin@cleango.com`
    - **Password:** `admin123`
3. Klik tombol "Login Admin"
4. Akan diredirect ke `/dashboard`

### Membuat Admin Baru:

```bash
php artisan admin:create
```

Atau via Database:

```php
php artisan tinker

User::create([
    'name' => 'Nama Admin',
    'email' => 'email@example.com',
    'password' => Hash::make('password'),
    'role' => 'admin'
]);
```

---

## 📋 File-File Penting

### Baru Ditambahkan:

```
app/Http/Middleware/AdminMiddleware.php
resources/views/auth/admin_login.blade.php
database/migrations/2026_01_29_000000_add_role_to_users_table.php
app/Console/Commands/CreateAdminUser.php
```

### Dimodifikasi:

```
app/Http/Controllers/AuthController.php
app/Models/User.php
routes/web.php
bootstrap/app.php
LOGIN_ADMIN_DOKUMENTASI.md
```

---

## 🔒 Security Features

✅ Password di-hash dengan bcrypt
✅ CSRF protection aktif
✅ Session regeneration setelah login
✅ Admin middleware validation
✅ Email unique constraint
✅ Role-based access control

---

## 📝 Struktur Alur Login

```
User
  ↓
[Visit /admin/login]
  ↓
[Submit Form]
  ↓
[AuthController@adminLogin]
  ↓
[Validate Email & Password]
  ↓
[Check if role = 'admin']
  ↓
[If Admin → Redirect to /dashboard]
[If Not Admin → Error Message]
  ↓
[Dashboard Protected by AdminMiddleware]
```

---

## 💡 Tips

1. **Lupa Password?** Update langsung di database atau gunakan Tinker
2. **Buat Multiple Admin?** Gunakan command `php artisan admin:create` berkali-kali
3. **Regular User?** Tetap bisa login di `/login` tapi tidak bisa akses dashboard
4. **Session Timeout?** User akan diarahkan ke `/admin/login` saat session expired

---

## ⚠️ Penting

Sebelum go-to-production:

1. Ubah password default admin
2. Setup proper database backups
3. Enable HTTPS
4. Setup email notifications untuk login activity
5. Implement rate limiting pada login form

---

Dokumentasi lengkap: `LOGIN_ADMIN_DOKUMENTASI.md`
