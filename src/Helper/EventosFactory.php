<?php


namespace App\Helper;


use App\Entity\Evento;

class EventosFactory implements EntidadeFactory
{

    public function criarEntidade(string $json): Evento
    {
        $dadosJson = json_decode($json);
        $evento = new Evento();
        $evento
            ->insereTitulo($dadosJson->titulo)
            ->insereDataInicial($dadosJson->dataInicial)
            ->insereHoraInicial($dadosJson->horaInicial)
            ->insereDataFinal($dadosJson->dataFinal)
            ->insereHoraFinal($dadosJson->horaFinal)
            ->insereDescricao($dadosJson->descricao);
        return $evento;
    }
}