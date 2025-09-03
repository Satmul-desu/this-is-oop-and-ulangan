<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">bilangan 1</label>
    <input type="number" name="bilangan1" required>
    <br>
      <label for="">bilangan 2</label>
    <input type="number" name="bilangan2" required>
    <br>

    <label for=""></label>
    <input type="submit" value="submit">

</form>
<?php
    class jumlah
    {
        public $bilangan1;
        public $bilangan2;

        public function __construct($b1, $b2)
        {
            $this->bilangan1 = $b1;
            $this->bilangan2 = $b2;
        }

        public function tambah()
        {
            return $this->bilangan1 + $this->bilangan2;
        }

        public function kurang()
        {
            return $this->bilangan1 - $this->bilangan2;
        }

        public function kali()
        {
            return $this->bilangan1 * $this->bilangan2;
        }

        public function bagi()
        {
            return $this->bilangan1 / $this->bilangan2;
        }

    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $a = $_POST['bilangan1'];
        $b = $_POST['bilangan2'];

        $hitung = new jumlah($a, $b);
        echo "hsil pejumlahan: " . $hitung->tambah();
        echo "<br>";
        echo "hasil pengurangan: " . $hitung->kurang();
        echo "<br>";
        echo "hasil perkalian: " . $hitung->kali();
        echo "<br>";
        echo "hasil pembagian: " . $hitung->bagi();

    }

?>
</body>
</html>