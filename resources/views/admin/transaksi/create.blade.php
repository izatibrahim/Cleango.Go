<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Transaksi - Laundry</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS GABUNG -->
    <style>
        body {
            background: #f4f6fb;
            font-family: 'Poppins', sans-serif;
        }

        .card {
            border-radius: 16px;
            border: none;
        }

        .card-header {
            background: #fff;
            font-weight: 700;
            font-size: 18px;
            border-bottom: 1px solid #eee;
        }

        label {
            font-weight: 600;
            margin-bottom: 6px;
        }

        .form-control, .form-select {
            border-radius: 10px;
            padding: 10px 14px;
        }

        .form-control:focus, .form-select:focus {
            border-color: #7c3aed;
            box-shadow: 0 0 0 .15rem rgba(124,58,237,.2);
        }

        .total-input {
            font-size: 20px;
            font-weight: 700;
            color: #7c3aed;
            background: #f5f3ff;
        }

        .btn-primary {
            background: linear-gradient(135deg,#7c3aed,#9333ea);
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 700;
        }

        .btn-primary:hover {
            opacity: .9;
        }

        .alert-danger {
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <div class="card shadow-sm">
                <div class="card-header">
                    Tambah Transaksi
                </div>

                <div class="card-body">

                    {{-- ERROR --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="/transaksi/simpan" id="transactionForm">
                        @csrf

                        <!-- NO TRANSAKSI -->
                        <input type="hidden" name="no_transaksi" value="TRX-{{ date('YmdHis') }}">

                        <!-- PELANGGAN -->
                        <div class="mb-3">
                            <label>Pelanggan</label>
                            <select name="user_id" class="form-select">
                                <option value="">-- Pilih Pelanggan --</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- PAKET -->
                        <div class="mb-3">
                            <label>Paket Laundry *</label>
                            <select id="paket_id" name="paket_id" class="form-select" required onchange="hitungTotal()">
                                <option value="">-- Pilih Paket --</option>
                                @foreach ($pakets as $paket)
                                    <option value="{{ $paket->id }}" data-harga="{{ $paket->harga }}">
                                        {{ $paket->nama_paket }} - Rp {{ number_format($paket->harga) }}/kg
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- BERAT -->
                        <div class="mb-3">
                            <label>Berat (kg)</label>
                            <input type="number" id="berat" name="berat"
                                   class="form-control"
                                   value="1" min="0.5" step="0.5"
                                   onchange="hitungTotal()">
                        </div>

                        <!-- TOTAL (WAJIB name="total") -->
                        <div class="mb-3">
                            <label>Total Harga *</label>
                            <input type="number" id="total" name="total"
                                   class="form-control total-input"
                                   readonly required>
                        </div>

                        <!-- STATUS -->
                        <div class="mb-3">
                            <label>Status *</label>
                            <select name="status" class="form-select" required>
                                <option value="pending">Pending</option>
                                <option value="selesai">Selesai</option>
                                <option value="dibayar">Dibayar</option>
                            </select>
                        </div>

                        <!-- CATATAN -->
                        <div class="mb-4">
                            <label>Catatan</label>
                            <textarea name="catatan" class="form-control" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Simpan Transaksi
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- JS GABUNG -->
<script>
function hitungTotal() {
    const paket = document.getElementById('paket_id');
    const berat = parseFloat(document.getElementById('berat').value) || 0;
    const totalInput = document.getElementById('total');

    if (!paket.value || berat <= 0) {
        totalInput.value = '';
        return;
    }

    const harga = parseInt(paket.options[paket.selectedIndex].dataset.harga);
    totalInput.value = harga * berat;
}

// VALIDASI SUBMIT
document.getElementById('transactionForm').addEventListener('submit', function(e) {
    const total = document.getElementById('total').value;
    if (!total || parseInt(total) <= 0) {
        e.preventDefault();
        alert('Total harga belum valid');
    }
});
</script>

</body>
</html>
