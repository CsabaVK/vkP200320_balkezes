<?php
namespace Jatekos;

class Jatekos
{
    private $nev,
            $elso,
            $utolso,
            $suly,
            $magassag;

    public function __get($name)
    {
        switch($name)
        {
            case 'nev':     return $this->nev;
            case 'elso':    return $this->elso;
            case 'utolso':  return $this->utolso;
            case 'suly':    return $this->suly;
            case 'magassag':return $this->magassag;
        }
    }

    function __construct($nev, $elso, $utolso, $suly, $magassag)
    {
        $this->nev         = $nev;
        $this->elso        = $elso;
        $this->utolso      = $utolso;
        $this->suly        = $suly;
        $this->magassag    = $magassag;
    }
}