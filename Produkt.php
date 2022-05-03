<?php

//produkt class sa get i set metodama
class Produkt
{
    private $sifra;
    private $kolicina;
    private $ime;
    private $cijena;


    public function getSifra(){
        return $this->sifra;
    }
    
    public function setSifra($sifra){
        $this->sifra = $sifra;
    }
    
    public function getKolicina(){
        return $this->kolicina;
    }
    
    public function setKolicina($kolicina){
        $this->kolicina = $kolicina;
    }
    
    public function getIme(){
        return $this->ime;
    }
    
    public function setIme($ime){
        $this->ime = $ime;
    }
    
    public function getCijena(){
        return $this->cijena;
    }
    
    public function setCijena($cijena){
        $this->cijena = $cijena;
    }
    
        
    



    
}


