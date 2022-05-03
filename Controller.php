<?php
class Controller
{

    public static function ucitajInt(
        $poruka="Učitaj cijeli broj: "
    ,   $greska="Niste unijeli cijeli broj: ")
    {

        
        $terminal = fopen('php://stdin', 'r');
        while(true){
            echo $poruka;
        
        $korisnik=(int)fgets($terminal);
        if($korisnik!=0){
            return $korisnik;

        }
        echo $greska . PHP_EOL;
        }


   


    }

    public static function ucitajFloat(
        $poruka="Učitaj decimalni broj: "
    ,   $greska="Niste unijeli decimalni broj: ")
    {

        
        $terminal = fopen('php://stdin', 'r');
        while(true){
            echo $poruka;
        
        $korisnik=(float)fgets($terminal);
        if($korisnik!=0){
            return $korisnik;

        }
        echo $greska . PHP_EOL;
        }


   


    }

    public static function ucitajString(
        $poruka="Učitaj tekst: "
    ,   $greska="Niste upisali tekst: ")
    {

        
        $terminal = fopen('php://stdin', 'r');
        while(true){
            echo $poruka;
        
        $korisnik=fgets($terminal);
        $korisnik= preg_replace("/\r|\n/", "", $korisnik);
        if(strlen($korisnik)>0){
            return $korisnik;

        }
        echo $greska . PHP_EOL;
        }


   


    }

}