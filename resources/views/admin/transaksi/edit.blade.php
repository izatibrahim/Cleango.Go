<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Transaksi - CleanGo Laundry</title>

<style>
:root{
    --primary:#8B5CF6;
    --secondary:#EC4899;
    --success:#10B981;
    --warning:#F59E0B;
    --info:#06B6D4;
    --dark:#1F2937;
}
body{
    font-family:Poppins,system-ui;
    background:linear-gradient(135deg,#faf8ff,#f5f3ff);
    margin:0;
}
.container{max-width:900px;margin:auto;padding:30px}
.card{
    background:#fff;
    border-radius:20px;
    padding:35px;
    box-shadow:0 10px 30px rgba(0,0,0,.08)
}
h2{margin-bottom:25px;color:var(--primary)}
label{font-weight:600;margin-bottom:6px;display:block}
input,select,textarea{
    width:100%;
    padding:12px 14px;
    border-radius:12px;
    border:2px solid #E5E7EB;
    margin-bottom:18px;
}
input:focus,select:focus,textarea:focus{
    outline:none;
    border-color:var(--primary);
}
.row{display:grid;grid-template-columns:1fr 1fr;gap:20px}
.badge{
    padding:6px 14px;
    border-radius:50px;
    font-size:.85rem;
    display:inline-block;
}
.pending{background:#FEF3C7;color:#92400E}
.selesai{background:#E0F2FE;color:#0369A1}
.dibayar{background:#ECFDF5;color:#065F46}
.btn{
    background:linear-gradient(135deg,var(--primary),var(--secondary));
    border:none;
    color:#fff;
    padding:14px 30px;
    border-radius:12px;
    font-weight:600;
    cursor:pointer;
}
.alert{
    padding:16px 20px;
    border-radius:14px;
    margin-bottom:25px;
    font-size:.95rem;
    animation:fadeIn .4s ease;
}
.alert.success{
    background:#ECFDF5;
    color:#065F46;
    border-left:5px solid var(--success);
}
.alert.error{
    background:#FEF2F2;
    color:#991B1B;
    border-left:5px solid #DC2626;
}
.alert ul{
    margin:8px 0 0 18px;
    padding:0;
}
@keyframes fadeIn{
    from{opacity:0;transform:translateY(-10px)}
    to{opacity:1;transform:translateY(0)}
}

.btn:hover{opacity:.9}
@media(max-width:768px){.row{grid-template-columns:1fr}}
</style>
</head>

<body>
<div class="container">
<div class="card">

<h2>Edit Transaksi</h2>
@if(session('success'))
    <div class="alert success">
        <strong>✅ Berhasil!</strong><br>
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert error">
        <strong>❌ Gagal!</strong>
        <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ url('/transaksi/'.$transaksi->id) }}" method="POST">
@csrf
@method('PATCH')

<!-- NO TRANSAKSI -->
<input type="hidden" name="no_order" value="{{ $transaksi->no_order }}">

<!-- PELANGGAN -->
<label>Pelanggan</label>
<select name="user_id">
    <option value="">— Umum —</option>
    @foreach($users as $user)
        <option value="{{ $user->id }}"
            {{ $transaksi->user_id == $user->id ? 'selected' : '' }}>
            {{ $user->name }}
        </option>
    @endforeach
</select>

<!-- PAKET -->
<label>Paket Laundry</label>
<select name="paket_id" required>
@foreach($pakets as $paket)
    <option value="{{ $paket->id }}"
        {{ $transaksi->paket_id == $paket->id ? 'selected' : '' }}>
        {{ $paket->nama_paket }} - Rp {{ number_format($paket->harga) }}/kg
    </option>
@endforeach
</select>

<div class="row">
    <!-- BERAT -->
    <div>
        <label>Berat (kg)</label>
        <input type="number" name="berat"
               value="{{ $transaksi->berat }}"
               step="0.5" min="0.5">
    </div>

    <!-- TOTAL (FIX: SESUAI DB & CONTROLLER) -->
    <div>
        <label>Total Harga</label>
        <input type="number" name="total"
               value="{{ $transaksi->total }}"
               min="0" step="1000" required>
    </div>
</div>

<!-- STATUS -->
<label>Status</label>
<select name="status" required>
    <option value="pending"  {{ $transaksi->status=='pending'?'selected':'' }}>Pending</option>
    <option value="selesai"  {{ $transaksi->status=='selesai'?'selected':'' }}>Selesai</option>
    <option value="dibayar"  {{ $transaksi->status=='dibayar'?'selected':'' }}>Dibayar</option>
</select>

<span class="badge {{ $transaksi->status }}">
    {{ ucfirst($transaksi->status) }}
</span>

<!-- CATATAN -->
<label>Catatan</label>
<textarea name="catatan">{{ $transaksi->catatan }}</textarea>

<button class="btn" type="submit">
    Simpan Perubahan
</button>

</form>
</div>
</div>
</body>
</html>
