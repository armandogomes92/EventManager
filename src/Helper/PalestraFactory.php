<?php


namespace App\Helper;


use App\Entity\Palestra;
use App\Repository\EventoRepository;
use App\Repository\PalestranteRepository;

class PalestraFactory implements EntidadeFactory
{
    /**
     * @var EventoRepository
     */
    private $eventoRepository;
    /**
     * @var PalestranteRepository
     */
    private $repository;

    public function __construct(EventoRepository $eventoRepository, PalestranteRepository $repository)
    {
        $this->eventoRepository = $eventoRepository;
        $this->repository = $repository;
    }

    public function criarEntidade(string $json): Palestra
    {
        $dadosJson = json_decode($json);
        $palestra = new Palestra();
        $palestranteId = $dadosJson->palestranteId;
        $eventoId = $dadosJson->eventoId;
        $palestrante = $this->repository->find($palestranteId);
        $evento = $this->eventoRepository->find($eventoId);
        $palestra
            ->insereTitulo($dadosJson->titulo)
            ->insereData($dadosJson->data)
            ->insereEvento($evento)
            ->insereHoraInicial($dadosJson->horaInicial)
            ->insereHoraFinal($dadosJson->horaFinal)
            ->insereDescricao($dadosJson->descricao)
            ->inserePalestrante($palestrante);
        return $palestra;
    }
}