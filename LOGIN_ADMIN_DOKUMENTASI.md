# Login Admin Laundry - Dokumentasi

## Fitur yang Telah Ditambahkan

### 1. Admin Authentication Controller (`app/Http/Controllers/AuthController.php`)

- **showAdminLogin()** - Menampilkan halaman login admin
- **adminLogin()** - Memproses login admin dengan validasi role
- **showLogin()** - Menampilkan halaman login user regular
- **login()** - Memproses login user regular
- **showRegister()** - Menampilkan halaman registrasi
- **register()** - Memproses registrasi user baru
- **logout()** - Mengeluarkan user dari sistem

### 2. Halaman Login Admin (`resources/views/auth/admin_login.blade.php`)

- Form login khusus admin dengan email dan password
- Validasi error messages
- Design modern dengan gradient purple
- Indicator "Admin Access Only"
- Link kembali ke halaman utama

### 3. Admin Middleware (`app/Http/Middleware/AdminMiddleware.php`)

- Memvalidasi bahwa user yang login memiliki role 'admin'
- Redirect ke `/admin/login` jika user bukan admin
- Proteksi semua dashboard dan management routes

### 4. Routes Authentication (`routes/web.php`)

**Admin Routes:**

```
GET  /admin/login     → AuthController@showAdminLogin (guest)
POST /admin/login     → AuthController@adminLogin (guest)
```

**User Routes:**

```
GET  /login           → AuthController@showLogin (guest)
POST /login           → AuthController@login (guest)
GET  /register        → AuthController@showRegister (guest)
POST /register        → AuthController@register (guest)
POST /logout          → AuthController@logout (auth)
```

### 5. Protected Admin Routes

Semua routes berikut dilindungi dengan middleware `auth` dan `admin`:

- `/dashboard`
- `/paket` (all operations)
- `/transaksi` (all operations)
- `/pelanggan` (all operations)

Jika user regular mencoba mengakses routes ini, akan diredirect ke `/admin/login`

### 6. User Model Update

Added `role` field to users table:

```php
protected $fillable = [
    'name',
    'email',
    'password',
    'phone',
    'address',
    'city',
    'role',  // ← Baru
];
```

## Cara Menggunakan

### Untuk Login Admin:

1. Akses `/admin/login`
2. Masukkan email dan password yang sudah terdaftar
3. Pastikan user tersebut memiliki `role = 'admin'` di database

### Untuk Membuat Admin Baru:

**Via Database:**

```sql
INSERT INTO users (name, email, password, role, created_at, updated_at)
VALUES ('Admin', 'admin@cleango.com', 'hashed_password', 'admin', NOW(), NOW());
```

**Via Tinker:**

```bash
php artisan tinker
```

```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'Admin',
    'email' => 'admin@cleango.com',
    'password' => Hash::make('password123'),
    'role' => 'admin'
]);
```

### Migrasi Database:

Jalankan migration untuk menambah kolom 'role':

```bash
php artisan migrate
```

File migration: `database/migrations/2026_01_29_000000_add_role_to_users_table.php`

### Membuat Admin Menggunakan Command (Recommended):

```bash
php artisan admin:create
```

Command ini akan meminta:

- Nama Admin
- Email Admin
- Password
- Konfirmasi Password

Contoh:

```
Nama Admin: Administrator
Email Admin: admin@cleango.com
Password: [masukkan password]
Konfirmasi Password: [masukkan ulang password]

Admin user berhasil dibuat!
Email: admin@cleango.com
```

## File-File yang Dimodifikasi/Ditambahkan

### File Baru:

1. `app/Http/Middleware/AdminMiddleware.php` - Middleware untuk validasi admin
2. `resources/views/auth/admin_login.blade.php` - Halaman login admin
3. `database/migrations/2026_01_29_000000_add_role_to_users_table.php` - Migration untuk role
4. `app/Console/Commands/CreateAdminUser.php` - Command untuk membuat admin

### File yang Dimodifikasi:

1. `app/Http/Controllers/AuthController.php` - Tambah method adminLogin & showAdminLogin
2. `app/Models/User.php` - Tambah 'role' ke fillable
3. `routes/web.php` - Tambah admin routes & admin middleware
4. `bootstrap/app.php` - Register admin middleware alias
5. `LOGIN_ADMIN_DOKUMENTASI.md` - Update dokumentasi

## Alur Login Admin

1. User akses `/admin/login`
2. Form login muncul
3. User masukkan email & password
4. AuthController@adminLogin dijalankan
5. Validasi kredensial
6. Jika valid, cek apakah `role = 'admin'`
7. Jika admin, redirect ke `/dashboard`
8. Jika bukan admin, tampilkan error
9. Dashboard dan routes lainnya dilindungi dengan middleware admin

## Security Notes

- Password di-hash menggunakan bcrypt
- Admin middleware memastikan hanya admin yang bisa akses dashboard
- Session diregenerasi setelah login
- CSRF protection aktif di semua form
- Email unik validation pada registrasi

### 7. Landing Page Update

- Navbar diupdate dengan kondisional links:
    - Jika belum login: tampil "Login" dan "Daftar"
    - Jika sudah login: tampil "Dashboard" dan "Logout"

## Cara Menggunakan

### 1. Login

1. Kunjungi `http://localhost/login`
2. Masukkan email dan password
3. Akan diarahkan ke dashboard jika berhasil

### 2. Register User Baru

1. Kunjungi `http://localhost/register`
2. Isi form dengan:
    - Nama Lengkap
    - Email
    - Password (min 6 karakter)
    - Konfirmasi Password
3. Klik Daftar
4. Akan auto-login dan diarahkan ke dashboard

### 3. Logout

1. Klik tombol "Logout" di navbar dashboard
2. Akan diarahkan kembali ke landing page

## Database

User model sudah memiliki fields:

- `name` - Nama user
- `email` - Email (unique)
- `password` - Password (hashed)
- `phone` - Nomor telepon (nullable)
- `address` - Alamat (nullable)
- `city` - Kota (nullable)

## Security Features

✅ Password hashing menggunakan Argon2
✅ CSRF Protection dengan @csrf token
✅ Session regeneration saat login
✅ Session invalidation saat logout
✅ Guest middleware untuk login/register
✅ Auth middleware untuk protected routes

## Next Steps (Opsional)

- Email verification
- Password reset functionality
- Role-based access control (admin, user, etc)
- Two-factor authentication
