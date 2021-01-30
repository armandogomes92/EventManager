<?php


namespace App\Controller;


use App\Entity\Palestra;
use App\Helper\DadosRequest;
use App\Helper\PalestraFactory;
use App\Repository\PalestraRepository;
use Doctrine\ORM\EntityManagerInterface;

class PalestraController extends CrudController
{
    public function __construct(
        PalestraFactory $factory,
        PalestraRepository $repository,
        EntityManagerInterface $entityManager,
        DadosRequest $dadosRequest
    )
    {

        $this->factory = $factory;
        $this->repository = $repository;
        $this->entityManager = $entityManager;
        $this->dadosRequest = $dadosRequest;
    }

    public function atualizarEntidadeExistente($id, $entidade)
    {
        /** @var Palestra $entidadeExistente */
        $entidadeExistente = $this->repository->find($id);
        if (is_null($entidadeExistente)) {
            throw new \InvalidArgumentException();
        }
        $entidadeExistente
            ->insereTitulo($entidade->pegaTitulo())
            ->insereData($entidade->pegaData())
            ->insereEvento($entidade->pegaEvento())
            ->insereHoraInicial($entidade->pegaHoraInicial())
            ->insereHoraFinal($entidade->pegaHoraFinal())
            ->insereDescricao($entidade->pegaDescricao())
            ->inserePalestrante($entidade->pegaPalestrante());
        return $entidadeExistente;
    }
}