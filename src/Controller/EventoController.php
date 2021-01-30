<?php


namespace App\Controller;


use App\Entity\Evento;
use App\Helper\DadosRequest;
use App\Helper\EventosFactory;
use App\Repository\EventoRepository;
use Doctrine\ORM\EntityManagerInterface;

class EventoController extends CrudController
{
    public function __construct(
        EventosFactory $factory,
        EntityManagerInterface $entityManager,
        EventoRepository $repository,
        DadosRequest $dadosRequest)
    {
        parent::__construct($repository, $entityManager, $factory, $dadosRequest);
    }

    /**
     * @param Evento $entidadeExistente
     * @param Evento $entidadeEnviada
     */
    public function atualizarEntidadeExistente($id, $entidade)
    {
        /** @var Evento $entidadeExistente */
        $entidadeExistente = $this->repository->find($id);
        if (is_null($entidadeExistente)) {
            throw new \InvalidArgumentException();
        }
        $entidadeExistente
            ->insereTitulo($entidade->pegaTitulo())
            ->insereDataInicial($entidade->pegaDataInicial())
            ->insereHoraInicial($entidade->pegaHoraInicial())
            ->insereDataFinal($entidade->pegaDataFinal())
            ->insereHoraFinal($entidade->pegaHoraFinal())
            ->insereDescricao($entidade->PegaDescricao());
        return $entidadeExistente;
    }
}