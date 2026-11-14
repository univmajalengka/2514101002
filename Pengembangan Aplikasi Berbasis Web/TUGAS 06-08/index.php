<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hitungDiskon - Pertemuan 06-08</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-gradient: radial-gradient(circle at top left, #1e1b4b, #0f172a 60%, #020617);
            --card-bg: rgba(255, 255, 255, 0.98);
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --accent: #0ea5e9;
            --success: #10b981;
            --success-bg: #ecfdf5;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border: #e2e8f0;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background: var(--bg-gradient);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 24px;
            color: var(--text-main);
        }

        .app-container {
            width: 100%;
            max-width: 460px;
            background: var(--card-bg);
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(255, 255, 255, 0.1);
            overflow: hidden;
            animation: slideUp 0.4s ease-out;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(16px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .header {
            background: linear-gradient(135deg, #4f46e5 0%, #2563eb 50%, #0284c7 100%);
            padding: 28px 30px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .header::after {
            content: '';
            position: absolute;
            top: -40%;
            right: -15%;
            width: 180px;
            height: 180px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            pointer-events: none;
        }

        .pill-tag {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(4px);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            padding: 5px 12px;
            border-radius: 99px;
            margin-bottom: 10px;
        }

        .header h1 {
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -0.3px;
        }

        .header p {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.85);
            margin-top: 4px;
        }

        .content {
            padding: 28px 30px 32px;
        }

        .form-label {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 8px;
        }

        .input-box {
            position: relative;
            display: flex;
            align-items: center;
        }

        .currency-prefix {
            position: absolute;
            left: 16px;
            font-size: 18px;
            font-weight: 800;
            color: var(--primary);
            user-select: none;
        }

        input[type="text"] {
            width: 100%;
            padding: 15px 16px 15px 52px;
            font-size: 22px;
            font-weight: 800;
            color: var(--text-main);
            background: #f8fafc;
            border: 2px solid var(--border);
            border-radius: 14px;
            transition: all 0.2s ease;
        }

        input[type="text"]:focus {
            outline: none;
            background: #ffffff;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.12);
        }

        /* Quick select nominal chips */
        .quick-amounts {
            display: flex;
            gap: 8px;
            margin-top: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .chip {
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            color: #475569;
            font-size: 12px;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .chip:hover {
            background: #e0e7ff;
            border-color: #c7d2fe;
            color: var(--primary);
        }

        .btn-submit {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, var(--primary) 0%, #2563eb 100%);
            color: white;
            font-size: 15px;
            font-weight: 700;
            border: none;
            border-radius: 14px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            box-shadow: 0 10px 20px -5px rgba(79, 70, 229, 0.4);
            transition: all 0.2s ease;
        }

        .btn-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 14px 24px -5px rgba(79, 70, 229, 0.5);
        }

        .btn-submit:active {
            transform: translateY(1px);
        }

        /* Info Tier Promo */
        .promo-banner {
            margin-top: 22px;
            padding: 12px 14px;
            border-radius: 12px;
            font-size: 12.5px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            line-height: 1.4;
        }

        .promo-max {
            background: var(--success-bg);
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .promo-mid {
            background: #eff6ff;
            color: #1e40af;
            border: 1px solid #bfdbfe;
        }

        .promo-low {
            background: #fffbeb;
            color: #92400e;
            border: 1px solid #fde68a;
        }

        /* Receipt Summary Card */
        .summary-card {
            margin-top: 18px;
            background: #f8fafc;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 20px;
            position: relative;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            color: var(--text-muted);
            margin-bottom: 12px;
        }

        .summary-row strong {
            color: var(--text-main);
            font-weight: 700;
        }

        .discount-tag {
            display: inline-flex;
            align-items: center;
            background: #dcfce7;
            color: #15803d;
            font-size: 11px;
            font-weight: 800;
            padding: 2px 8px;
            border-radius: 6px;
            margin-left: 6px;
        }

        .discount-tag.zero {
            background: #e2e8f0;
            color: #475569;
        }

        .summary-row.discount-val strong {
            color: var(--success);
        }

        .dashed-line {
            border-top: 2px dashed #cbd5e1;
            margin: 16px 0;
        }

        .final-total {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
        }

        .final-total .label {
            font-size: 14px;
            font-weight: 700;
            color: var(--text-main);
        }

        .final-total .amount {
            font-size: 24px;
            font-weight: 800;
            color: var(--primary);
            letter-spacing: -0.5px;
        }

        .rules-footer {
            margin-top: 18px;
            padding-top: 14px;
            border-top: 1px solid #f1f5f9;
            display: flex;
            justify-content: space-between;
            font-size: 11px;
            color: var(--text-muted);
        }
    </style>
</head>
<body>

<?php
// ============================================================================
// PROSEDUR / FUNGSI hitungDiskon() SESUAI KETENTUAN SOAL
// ============================================================================
function hitungDiskon($totalBelanja) {
    $diskon = 0;

    if ($totalBelanja >= 100000) {
        $diskon = 0.10 * $totalBelanja; // Diskon 10%
    } elseif ($totalBelanja >= 50000) {
        $diskon = 0.05 * $totalBelanja; // Diskon 5%
    } else {
        $diskon = 0;                    // Tidak ada diskon
    }

    return $diskon;
}

// Default awal sesuai contoh kasus modul (Rp. 120.000)
$totalBelanja = 120000;

if (isset($_POST['proses']) && isset($_POST['totalBelanja'])) {
    // Membersihkan titik agar kembali menjadi angka murni
    $inputBersih = str_replace('.', '', $_POST['totalBelanja']);
    $totalBelanja = (float) $inputBersih;
}

$diskon = hitungDiskon($totalBelanja);
$totalBayar = $totalBelanja - $diskon;

// Logika UI/UX untuk status promo & badge persentase
if ($totalBelanja >= 100000) {
    $persenLabel = "10%";
    $statusClass = "promo-max";
    $statusIcon  = "🎉";
    $statusText  = "Selamat! Anda mendapatkan <strong>Diskon Maksimal 10%</strong>.";
} elseif ($totalBelanja >= 50000) {
    $persenLabel = "5%";
    $kurang = 100000 - $totalBelanja;
    $statusClass = "promo-mid";
    $statusIcon  = "✨";
    $statusText  = "Diskon 5% aktif! Tambah belanja <strong>Rp. " . number_format($kurang, 0, ',', '.') . "</strong> lagi untuk diskon 10%.";
} else {
    $persenLabel = "0%";
    $kurang = 50000 - $totalBelanja;
    $statusClass = "promo-low";
    $statusIcon  = "💡";
    $statusText  = "Belanja <strong>Rp. " . number_format($kurang, 0, ',', '.') . "</strong> lagi untuk mendapatkan diskon 5%.";
}
?>

<div class="app-container">
    <div class="header">
        <span class="pill-tag">KASIR UTAMA</span>
        <h1>Ringkasan Pembayaran</h1>
        <p>Rincian total belanja dan potongan harga pelanggan</p>
    </div>

    <div class="content">
        <form method="POST" action="" id="diskonForm">
            <div class="form-label">
                <span>Total Belanja Anda</span>
                <span style="font-weight: 500; color: var(--text-muted); font-size: 12px;">Otomatis format titik</span>
            </div>

            <div class="input-box">
                <span class="currency-prefix">Rp</span>
                <input type="text" id="totalBelanja" name="totalBelanja" 
                       value="<?= number_format($totalBelanja, 0, ',', '.') ?>" 
                       oninput="formatTitik(this)" required autocomplete="off" inputmode="numeric">
            </div>

            <!-- Tombol Nominal Cepat untuk Memudahkan Pengujian -->
            <div class="quick-amounts">
                <button type="button" class="chip" onclick="isiNominal(30000)">Rp 30.000</button>
                <button type="button" class="chip" onclick="isiNominal(75000)">Rp 75.000</button>
                <button type="button" class="chip" onclick="isiNominal(120000)">Rp 120.000</button>
                <button type="button" class="chip" onclick="isiNominal(250000)">Rp 250.000</button>
            </div>

            <button type="submit" name="proses" class="btn-submit">
                <span>Hitung Total Pembayaran</span>
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </button>
        </form>

        <!-- Banner Edukasi / Status Diskon Dinamis -->
        <div class="promo-banner <?= $statusClass ?>">
            <span style="font-size: 18px;"><?= $statusIcon ?></span>
            <div><?= $statusText ?></div>
        </div>

        <!-- Kartu Rincian Struk -->
        <div class="summary-card">
            <div class="summary-row">
                <span>Subtotal Belanja</span>
                <strong>Rp. <?= number_format($totalBelanja, 0, ',', '.') ?></strong>
            </div>

            <div class="summary-row discount-val">
                <span>
                    Potongan Diskon
                    <span class="discount-tag <?= $persenLabel === '0%' ? 'zero' : '' ?>"><?= $persenLabel ?></span>
                </span>
                <strong><?= $diskon > 0 ? '- Rp. ' . number_format($diskon, 0, ',', '.') : 'Rp. 0' ?></strong>
            </div>

            <div class="dashed-line"></div>

            <div class="final-total">
                <span class="label">Total Bayar</span>
                <span class="amount">Rp. <?= number_format($totalBayar, 0, ',', '.') ?></span>
            </div>
        </div>

        <!-- Keterangan Aturan Diskon di Bagian Bawah -->
        <div class="rules-footer">
            <span>&lt; 50rb: <strong>0%</strong></span>
            <span>50rb – 99rb: <strong>5%</strong></span>
            <span>&ge; 100rb: <strong>10%</strong></span>
        </div>
    </div>
</div>

<script>
// Format angka dengan pemisah titik setiap 3 digit secara real-time
function formatTitik(el) {
    let angka = el.value.replace(/[^0-9]/g, '');
    el.value = angka.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
}

// Mengisi kolom input otomatis dari tombol chip nominal cepat
function isiNominal(nilai) {
    const input = document.getElementById('totalBelanja');
    input.value = nilai.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
}
</script>

</body>
</html>