<?php
// bayang kan ada class siswa disekolahan . kalau budi rehan dadan  dan maryana itu termasuk class atau obkect,
//  buat kan implemtasi nya
    // Blueprint (Class) Siswa
    class Siswa
    {
        public $nama;
        public $kelas;
        public $umur;

        public function __construct($nama, $kelas, $umur)
        {
            $this->nama  = $nama;
            $this->kelas = $kelas;
            $this->umur  = $umur;
        }

        public function perkenalan()
        {
            return "
            <div class='siswa'>
                <p>Halo, nama saya <b>$this->nama</b>.<br>
                Saya kelas <b>$this->kelas</b> dan umur saya <b>$this->umur</b> tahun.</p>
            </div>
            <hr>
        ";
        }
    }

    $budi    = new Siswa("Budi", "10A", 16);
    $rehan   = new Siswa("Rehan", "9B", 15);
    $dadan   = new Siswa("Dadan", "11A", 17);
    $maryana = new Siswa("Maryana", "12C", 18);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center; 
            margin-top: 40px;
        }
        .siswa {
            margin-bottom: 10px;
        }
        hr {
            width: 50%;
            border: 1px solid #444;
        }
    </style>
</head>
<body>
    <h2>Data Siswa</h2>
    <?php
        echo $budi->perkenalan();
        echo $rehan->perkenalan();
        echo $dadan->perkenalan();
        echo $maryana->perkenalan();
    ?>
</body>
</html>
