<?php
class TagihanListrik
{
    private $nama, $abonemen, $kwh, $tarifPerKwh;

    public function __construct($nama, $abonemen, $kwh, $tarifPerKwh)
    {
        $this->nama        = $nama;
        $this->abonemen    = $abonemen;
        $this->kwh         = $kwh;
        $this->tarifPerKwh = $tarifPerKwh;
    }

    public function hitungTagihan()
    {
        $biayaPemakaian = $this->kwh * $this->tarifPerKwh;
        $biayaTambahan  = ($this->kwh > 500) ? 100000 : 0;
        $totalSementara = $this->abonemen + $biayaPemakaian + $biayaTambahan;
        $ppn            = 0.1 * $totalSementara;
        $total          = $totalSementara + $ppn;

        return [
            "nama" => $this->nama,
            "abonemen" => $this->abonemen,
            "kwh" => $this->kwh,
            "tarifPerKwh" => $this->tarifPerKwh,
            "biayaPemakaian" => $biayaPemakaian,
            "biayaTambahan" => $biayaTambahan,
            "ppn" => $ppn,
            "total" => $total,
        ];
    }
}
 $result = null;
 if($_SERVER['REQUEST_METHOD'] =="POST")
 {
    $tagihan = new TagihanListrik(
    $_POST['nama'],
    $_POST['abonemen'],
    $_POST['kwh'],
    $_POST['tarif']
);
 $result = $tagihan->hitungTagihan();
 }
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hitung tagihan lisrik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

 </head>
 <body style="background: linear-gradient(135deg, #007bff, #07c1ffff); min-height: 100vh;">
    <div class="container py-5">
  <div class="card shadow-lg">
    <div class="card-header text-center bg-primary text-white">
      <h3>💡 Aplikasi Tagihan Listrik</h3>  
    </div>
    <div class="card-body">
      <form method="post" class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Nama Pemilik Rumah</label>
          <input type="text" name="nama" class="form-control" required>
        </div>
         <div class="col-md-6">
          <label class="form-label">Biaya Abonemen</label>
          <input type="number" name="abonemen" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Pemakaian Listrik (kWh)</label>
          <input type="number" name="kwh" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Tarif per kWh</label>
          <input type="number" name="tarif" class="form-control" required>
        </div>
        <div class="col-12 text-center">
          <button type="submit" class="btn btn-success px-4">Hitung Tagihan</button>
        </div>
      </form>
    </div>
  </div>
  <?php if ($result): ?>
  <div class="card shadow-lg mt-4">
    <div class="card-header bg-warning text-white text-center">
      <h4>Hasil Perhitungan Tagihan</h4>
    </div>
    <div class="card-body">
      <p><strong>Nama Pemilik:</strong> <?php echo $result['nama']?></p>
      <table class="table table-bordered">
        <tr>
          <th>Abonemen</th>
          <td>Rp <?php echo number_format($result['abonemen'], 0, ',', '.')?></td>
        </tr>
        <tr>
          <th>Pemakaian (<?php echo $result['kwh']?> kWh)</th>
          <td>Rp <?php echo number_format($result['biayaPemakaian'], 0, ',', '.')?></td>
        </tr>
        <tr>
          <th>Biaya Tambahan</th>
          <td>Rp <?php echo number_format($result['biayaTambahan'], 0, ',', '.')?></td>
        </tr>
        <tr>
          <th>PPN (10%)</th>
          <td>Rp <?php echo number_format($result['ppn'], 0, ',', '.')?></td>
        </tr>
        <tr class="table-success">
          <th>Total Tagihan</th>
          <td><strong>Rp <?php echo number_format($result['total'], 0, ',', '.')?></strong></td>
        </tr>
      </table>
    </div>
  </div>
  <?php endif; ?>
</div>
</body>
</html>
 </body>
 </html>