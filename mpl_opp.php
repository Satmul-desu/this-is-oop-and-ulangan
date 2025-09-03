<?php
class ruangan {
    public $warna = "putih dan biru";
    public $berapa = 5;
    public $fasilas = "komputer/laptop";

  public function tampilan()
    {
        return "bagus dan bersih";
    }

    public function ac()
    {
        return "bagus di setiap ruangan ada ac ";
    }

    public function alat()
    {
        return "peralatan dan fasilitas nya lengkap dan bagus";
    }
}
//  inisiasi (pembuatan object)
$RPL = new ruangan();
echo "warna ruangan nya " . $RPL->warna ."dan juga" . $RPL->tampilan() .  "<br>";
echo "jumlah ruangan cukup banyak ada " . $RPL->berapa . "dan juga" .  $RPL->ac() . "<br>";
echo "fasilitas nya amazing ada " . $RPL->fasilas . "dan juga" .  $RPL->alat() . "<br>";
