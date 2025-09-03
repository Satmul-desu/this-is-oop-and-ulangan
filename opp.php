<?php
class mobil
{
    public $jumlah_roda = 4;
    public $warna       = "hitam";

    public function bersuara()
    {
        return "mmmbbbbbeeerr";
    }

    public function menyalakan()
    {
        return "nyalakan mesin ";
    }
}

//  inisiasi (pembuatan object)
$motor = new mobil();
echo "warna motor/mobil 1 : " . $motor->warna . "<br>";
echo "jumlah roda mobil/motor :" . $motor->jumlah_roda . "<br>";
echo "suara motor/mobil:" . $motor->bersuara() . "<br>";
echo "nyalakan motor/mobil:" . $motor->menyalakan() . "<br>";
