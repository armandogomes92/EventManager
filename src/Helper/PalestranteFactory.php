<?php


namespace App\Helper;

use App\Entity\Palestrante;

class PalestranteFactory implements EntidadeFactory
{

    public function criarEntidade(string $json)
    {
        $dadosJson = json_decode($json);
        $palestrante = new Palestrante();
        $palestrante->insereNome($dadosJson->nome);
        return $palestrante;
    }
}