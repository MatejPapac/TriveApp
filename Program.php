<?php
class Program
{

    
private $podaci;
private $kosarica;

//Radim podaci i kosarica array i stavljam ih i construct
public function __construct()
{
    $this->podaci=[];
    $this->kosarica =[];
    $this->naslov();

}

//prvi izbornik dodavanje i provjera produkta
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
    //unos produkta po njihovim vrijednostima
    {
        $p=new Produkt();
        $p->setSifra(Controller::ucitajInt('Unesi šifru produkta : '));
        $p->setIme(Controller::ucitajString('Unesi ime produkta : '));
        $p->setKolicina(Controller::ucitajInt('Unesi kolicinu produkta : '));
        $p->setCijena(Controller::ucitajFloat('Unesi cijenu produkta : '));
        $this->podaci[]=$p;
        $this->izbornik();

    }

    private function pregledProdukta()
    //pregled produkta na prvom meniju
        {
            foreach ($this->podaci as $p) {
                echo $p->getSifra() . ' ' . $p->getCijena() . ' ' . $p->getIme() .' ' . $p->getKolicina() .  PHP_EOL;
            }
        $this->izbornik();
        }



        private function kosaricaMenu()
        // drugi meni za kosaricu

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
        //dodajem u kosaricu sa postojecim proizvodima
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
                 $produktKosarice->setSifra($unos);
                }
            }
        
        if(null !==( $produktKosarice->getSifra())){
            break;
        }

        echo 'šifra tog predmeta ne postoji' . PHP_EOL;
        continue;
        }

        while(true) {
            $unos=(Controller::ucitajInt('Stavi kolicinu: ' ,'kolicina mora biti vise od 0'));
            foreach($this->podaci as $p){
                if($produktKosarice ->getSifra() == $p->getSifra()) {
                    if($unos <= $p ->getKolicina()){
                        $produktKosarice->setKolicina($unos);
                        $produktKosarice->setIme($p->getIme());
                        $produktKosarice->setCijena($p->getCijena());
                        $this->kosarica[]=$produktKosarice;
                        $p->setKolicina($p->getKolicina()-$unos);
                        echo 'Proizvod uspješno dodan!' ;
                    

                    }else{
                        echo 'Ima ' . $p->getKolicina() . '' . $p->getIme() . ' u skladištu ' . PHP_EOL;

                    }
                }
            }
        if(null !==($produktKosarice->getKolicina())) {
            break;
        }
        continue;
        }
    $this->kosaricaMenu();
        
    
           
    
    }
    private function izbrisiIzKosarice()
    //brisem iz kosarice postojece produkte
    {
        for($i=0;$i<count($this->kosarica);$i++){
            echo $this->kosarica[$i]->getSifra(). ' . ' . $this->kosarica[$i]->getIme()
            . ' ' . $this->kosarica[$i]->getKolicina() . ' '. $this->kosarica[$i]->getKolicina() . PHP_EOL;
        }
        $izbrisi=Controller::ucitajInt('odaberi šifru predmeta kojeg zelis izbrisat : ');

        array_splice($this->kosarica,$izbrisi-1,1);
        echo 'Uspješno obrisano' .PHP_EOL;

        $this->kosaricaMenu();



    }


    private function racun()
    //pokazujem postojoce proizvode u kosarici i zbrajam .
    {
        $total=0;

        echo 'Racun' . PHP_EOL;
        foreach($this->kosarica as $k){
            $cijena = $k->getCijena() * $k->getKolicina();
            $total +=$cijena;
            echo $k -> getIme() . ' ' . $k->getKolicina() . ' * ' . $k->getCijena() . ' = ' . $cijena . PHP_EOL;
            echo 'TOTAL= ' . $total . PHP_EOL;
            $this->kosarica = [];
            $this->kosaricaMenu();
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
