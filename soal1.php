<?php
// kalau kamupunya blueprint sepeda motor,
//  apa yang terjadi kalau kamub ikin motor nyata dari blueprint tersebut
class SepedaMotor
{
    public $merk;
    public $warna;

   
    public function __construct($merk, $warna)
    {
        $this->merk  = $merk;
        $this->warna = $warna;
    }

    public function nyalakan()
    {
        return "Motor $this->merk warna $this->warna dibuat <br>";
    }

    public function matikan()
    {
        return "Motor $this->merk warna $this->warna berhasil dibuat <br>";
    }
}


class MotorListrik extends SepedaMotor
{
    public $kapasitasBaterai;

    public function __construct($merk, $warna, $kapasitasBaterai)
    {
        parent::__construct($merk, $warna);
        $this->kapasitasBaterai = $kapasitasBaterai;
    }

    public function isiDaya()
    {
        return "Motor listrik $this->merk sedang dipebaiki dengan mengisi
         $this->kapasitasBaterai kWh ⚡<br>";
    }
}

$motor1 = new SepedaMotor("Honda", "Merah");
echo $motor1->nyalakan();
echo $motor1->matikan();

$motor2 = new SepedaMotor("Yamaha", "Hitam");
echo $motor2->nyalakan();

$motorListrik = new MotorListrik("Tesla Bike", "Putih", 10);
echo $motorListrik->nyalakan();
echo $motorListrik->isiDaya();
echo $motorListrik->matikan();
