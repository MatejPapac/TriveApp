<?php
class Program
{
private $podaci;
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
    echo '3.Brisanje Produkta' . PHP_EOL;
    echo '4.Ulazak u košaricu' . PHP_EOL;
    echo '5.Izlazak iz programa' .PHP_EOL;

    $izbor=0;
    while(true) {
        $izbor= Controller::ucitajInt('Izaberi od ponuđenih opcija: ','Nisi unio cijeli broj');
        if($izbor  <1 || $izbor >5){
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
            $this->brisanjeProdukta();
            break;
         case 4:
            $this->kosaricaMenu();
            break;
            case 5:
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
           
    
   




private function naslov()
{
    echo '***************'. PHP_EOL;
    echo 'Trgovina' . PHP_EOL;
    echo '***************' . PHP_EOL;
    $this->izbornik();
}

}
