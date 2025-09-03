<?php
    class Biodata  
    {
        private $nama;
        private $kelas;
        private $jk;
        private $tgl;
        private $agama;

        public function __construct($nama, $kelas, $jk, $tgl, $agama)
        {
            $this->nama  = $nama;
            $this->kelas = $kelas;
            $this->jk    = $jk;
            $this->tgl   = $tgl;
            $this->agama = $agama;
        }

        public function tampilkan()
        {
            echo "<h2 align='center'>Hasil Biodata</h2>";
            echo "<table border='1' cellpadding='10' cellspacing='0' align='center'>";
            echo "<tr><td>Nama Lengkap</td><td>{$this->nama}</td></tr>";
            echo "<tr><td>Kelas</td><td>{$this->kelas}</td></tr>";
            echo "<tr><td>Jenis Kelamin</td><td>{$this->jk}</td></tr>";
            echo "<tr><td>Tanggal Lahir</td><td>{$this->tgl}</td></tr>";
            echo "<tr><td>Agama</td><td>{$this->agama}</td></tr>";
            echo "</table>";
        }
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Biodata</title>
    
</head>
<body>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama  = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $jk    = $_POST['jk'];
        $tgl   = $_POST['tgl'];
        $agama = $_POST['agama'];

        // buat objek dan tampilkan hasil
        $biodata = new Biodata($nama, $kelas, $jk, $tgl, $agama);
        $biodata->tampilkan();

        echo "<div style='text-align:center; margin-top:20px;'>
            <a href='" . $_SERVER['PHP_SELF'] . "'><button class='btn'>Kembali</button></a>
          </div>";
    } else {
    ?>
    
    <form action="" method="POST">
        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td><input type="text" name="kelas" required></td>
            </tr>
            <tr>
                <td>gender </td>
                <td>
                    <select name="jk" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal lahir</td>
                <td><input type="date" name="tgl" required></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>
                    <select name="agama" required>
                        <option value="">-- Pilih --</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <button type="submit" class="btn">Simpan</button>
                </td>
            </tr>
        </table>
    </form>

<?php }?>

</body>
</html>

