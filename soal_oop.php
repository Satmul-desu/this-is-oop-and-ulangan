<?php
    class Karyawan
    {
        private $nama;
        private $id;
        private $gajiPokok;
        private $statusKepegawaian; // Tetap atau Kontrak
        private $jabatan;           // Manager, Supervisor, Staff
        private $statusNikah;       // Menikah atau Belum

        public function __construct($nama, $id, $gajiPokok, $statusKepegawaian, $jabatan, $statusNikah)
        {
            $this->nama              = $nama;
            $this->id                = $id;
            $this->gajiPokok         = $gajiPokok;
            $this->statusKepegawaian = $statusKepegawaian;
            $this->jabatan           = $jabatan;
            $this->statusNikah       = $statusNikah;
        }

        // Hitung tunjangan jabatan
        private function getTunjanganJabatan()
        {
            switch (strtolower($this->jabatan)) {
                case "manager":return 0.20 * $this->gajiPokok;
                case "supervisor":return 0.15 * $this->gajiPokok;
                case "staff":return 0.10 * $this->gajiPokok;
                default: return 0;
            }
        }

        // Hitung tunjangan transportasi
        private function getTunjanganTransport()
        {
            return (strtolower($this->statusKepegawaian) == "tetap") ? 500000 : 0;
        }

        // Hitung tunjangan keluarga
        private function getTunjanganKeluarga()
        {
            return (strtolower($this->statusNikah) == "menikah") ? 300000 : 0;
        }

        // Total gaji kotor
        private function getGajiKotor()
        {
            return $this->gajiPokok + $this->getTunjanganJabatan() + $this->getTunjanganTransport() + $this->getTunjanganKeluarga();
        }

        // Pajak 5%
        private function getPajak()
        {
            return 0.05 * $this->getGajiKotor();
        }

        // Gaji bersih
        public function getGajiBersih()
        {
            return $this->getGajiKotor() - $this->getPajak();
        }

        // Tampilkan data karyawan
        public function tampilkanData()
        {
            echo "<tr>";
            echo "<td>{$this->nama}</td>";
            echo "<td>{$this->id}</td>";
            echo "<td>{$this->jabatan}</td>";
            echo "<td>{$this->statusKepegawaian}</td>";
            echo "<td>{$this->statusNikah}</td>";
            echo "<td>Rp" . number_format($this->gajiPokok, 0, ',', '.') . "</td>";
            echo "<td>Rp" . number_format($this->getTunjanganJabatan(), 0, ',', '.') . "</td>";
            echo "<td>Rp" . number_format($this->getTunjanganTransport(), 0, ',', '.') . "</td>";
            echo "<td>Rp" . number_format($this->getTunjanganKeluarga(), 0, ',', '.') . "</td>";
            echo "<td>Rp" . number_format($this->getGajiKotor(), 0, ',', '.') . "</td>";
            echo "<td>Rp" . number_format($this->getPajak(), 0, ',', '.') . "</td>";
            echo "<td><b>Rp" . number_format($this->getGajiBersih(), 0, ',', '.') . "</b></td>";
            echo "</tr>";
        }
    }

    // Contoh data karyawan
    $karyawanList = [
        new Karyawan("Andi", "EMP001", 8000000, "Tetap", "Manager", "Menikah"),
        new Karyawan("Budi", "EMP002", 6000000, "Tetap", "Supervisor", "Belum"),
        new Karyawan("Citra", "EMP003", 4000000, "Kontrak", "Staff", "Menikah"),
        new Karyawan("Dewi", "EMP004", 3500000, "Kontrak", "Staff", "Belum"),
    ];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistem Penggajian TechNova</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background: #ddd;
        }
    </style>
</head>
<body>
    <h2>Sistem Penggajian Karyawan TechNova</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>ID</th>
            <th>Jabatan</th>
            <th>Status</th>
            <th>Status Nikah</th>
            <th>Gaji Pokok</th>
            <th>Tunj. Jabatan</th>
            <th>Tunj. Transport</th>
            <th>Tunj. Keluarga</th>
            <th>Gaji Kotor</th>
            <th>Pajak (5%)</th>
            <th>Gaji Bersih</th>
        </tr>
        <?php
            foreach ($karyawanList as $karyawan) {
                $karyawan->tampilkanData();
            }
        ?>
    </table>
</body>
</html>