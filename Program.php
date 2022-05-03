<?php
class Program
{
private $podaci;
private $kosarica;
public function __construct()
{
    $this->podaci=[];
    $this->kosarica =[];
    $this->naslov();

}

private function izbornik()
{

    echo '1.Pregled produkta' . PHP_EOL;
    echo '2.Unos produkta' . PHP_EOL;
    echo '3.Ulazak u košaricu' . PHP_EOL;
    echo '4.Izlazak iz programa' .PHP_EOL;

    $izbor=0;
    while(true) {
        $izbor= Controller::ucitajInt('Izaberi od ponuđenih opcija: ','Nisi unio cijeli broj');
        if($izbor  <1 || $izbor >4){
            echo 'Moras uzeti od ponuđenih odabira' .PHP_EOL;
            continue;
        }
        break;

    }


    switch($izbor){
        case 1:
            $this->pregledProdukta();
            break;
       case 2:
            $this->unosProdukta();
            break;
         case 3:
            $this->kosaricaMenu();
            break;
            case 4:
           echo 'Doviđenja' ;
            
        }     

    }   

    private function unosProdukta()
    {
        $p=new Produkt();
        $p->setSifra(Controller::ucitajInt('Unesi šifru produkta : '));
        $p->setIme(Controller::ucitajString('Unesi ime produkta : '));
        $p->setCijena(Controller::ucitajFloat('Unesi cijenu produkta : '));
        $this->podaci[]=$p;
        $this->izbornik();

    }

    private function pregledProdukta()
        {
            foreach ($this->podaci as $p) {
                echo $p->getIme() . ' ' . $p->getCijena() . ' ' . $p->getSifra() . PHP_EOL;
            }
        $this->izbornik();
        }



        private function kosaricaMenu()

        {
            echo '1.Dodaj u košaricu' .PHP_EOL;
            echo '2.Izbriši iz košarice' .PHP_EOL;
            echo '3.Plati' .PHP_EOL;
            echo '4.Izlaz' .PHP_EOL;




            $izbor=0;
    while(true) {
        $izbor= Controller::ucitajInt('Izaberi od ponuđenih opcija: ','Nisi unio cijeli broj');
        if($izbor  <1 || $izbor >4){
            echo 'Moras uzeti od ponuđenih odabira' .PHP_EOL;
            continue;
        }
        break;

    }  switch($izbor){
        case 1:
            $this->dodajuKosaricu();
            break;
       case 2:
            $this->izbrisiIzKosarice();
            break;
         case 3:
            $this->racun();
            break;
            case 4:
           echo 'Doviđenja' ;
            
        } 
    }


        private function dodajuKosaricu()
        {
            $produktKosarice=new Produkt();

            for($i=0;$i<count($this->podaci);$i++){
                echo $this->podaci[$i]->getSifra() . ' ' . $this->podaci[$i]->getIme()
                . ' ' . $this->podaci[$i]->getKolicina() . ' ' . $this->podaci[$i]->getCijena() . PHP_EOL;
                




        }

        while (true) {
            $unos =(Controller::ucitajInt('Upiši sifru produkta: '));
            foreach($this->podaci as $p){
                if($unos ==$p->getSifra($unos)){
                $brojProdukta->setSifra($unos);
                }
            }
        
        if(null !==($brojProdukta->getSifra())){
            break;
        }

        echo 'šifra tog predmeta ne postoji' . PHP_EOL;
        }

        
    
           
    
    }




private function naslov()
{
    echo '***************'. PHP_EOL;
    echo 'Trgovina' . PHP_EOL;
    echo '***************' . PHP_EOL;
    $this->izbornik();
}

}
