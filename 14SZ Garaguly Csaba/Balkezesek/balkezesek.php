<?php
namespace Balkezesek;

use Jatekos\Jatekos;

class Balkezesek
{
    private $jatekosok = [],
            $kapottEvszam;

    public function Main()
    {
        echo 'Helló Balkezesek';
        $this->Beolvas();
        $this->Feladat3();
        $this->Feladat4();
        $this->Feladat5();
        $this->Feladat6();
    }

    private function Feladat6()
    {
        $osszeSuly = 0;
        $osszesJatekos = 0;

        foreach ($this->jatekosok as $jatekos ) {
            
            $eslo = (int)substr($jatekos->elso, 0, 4);
            $utolso = (int)substr($jatekos->utloso, 0, 4);

            if ( $elso <= (int)$this->kapottEvszam && $utolso >= (int)$this->kapottEvszam) 
            {
                $osszeSuly += (int)$jatekos->suly;
                $osszesJatekos++;
            }
        }
    }

    private function Feladat5()
    {
        echo "5. feladat: \n";
        echo "Kérek egy 1990 és 1999 közötti évszámot!: ";

        $ok = false;
        do
        {
            $evszam = readline();
            settype($evszam, "integer");

            if ($evszam < 1990 || $evszam > 1999) {
                echo "Hibás adat, kérek egy 1990 és 1999 közötti évszámot!: ";
            }
            else {$ok = true;}
        }
        while ($ok == false);

    }

    private function Feladat4()
    {
        $jatekosok = [];
        echo "4. feladat\n";

        foreach ($this->jatekosok as $jatekos) 
        {
            $utolso_ev = substr($jatekos->utolso, 0, 4);
            $utolso_ho = substr($jatekos->utolso, 5, 6);

            if ((int)$utolso_ev <= 1999 && (int)$utolso_ho <=10 
                && !array_key_exists($jatekos->nev, $jatekosok)) 
            {
                $magassag = $jatekos->magassag / 2.54;
                echo $jatekos->nev." ".round($magassag, 1)."\n";

                $jatekosok[$jatekos->nev] = $jatekos->nev;
            }

            $utolso = substr($jatekos->utolso, 0, 4);
            echo $utolso."\n";
            echo $jatekos->utolso."\n";

        }
    }

    private function Feladat3()
    {

    }

    private function Beolvas()
    {
        $f = fopen("File/balkezesek.csv", "r");
        fgetcsv($f, 200, ';');

        while ( !feof($f) ) 
        {
            $sor = fgetcsv($f, 200, ';');

            $this->jatekosok[] = new Jatekos(
                $sor[0],
                $sor[1],
                $sor[2],
                $sor[3],
                $sor[4]
            );
        }

        sort($this->jatekosok);

        fclose($f);
    }

}