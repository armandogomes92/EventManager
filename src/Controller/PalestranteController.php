<?php


namespace App\Controller;

use App\Entity\Palestrante;
use App\Helper\DadosRequest;
use App\Helper\PalestranteFactory;
use App\Repository\PalestranteRepository;
use Doctrine\ORM\EntityManagerInterface;

class PalestranteController extends CrudController
{
    public function __construct(
        PalestranteRepository $repository,
        EntityManagerInterface $entityManager,
        PalestranteFactory $factory,
        DadosRequest $dadosRequest)
    {
        parent::__construct($repository, $entityManager, $factory, $dadosRequest);
    }

    public function atualizarEntidadeExistente($id, $entidade)
    {
        /** @var Palestrante $entidadeExistente */
        $entidadeExistente = $this->repository->find($id);
        if (is_null($entidadeExistente)) {
            throw new \InvalidArgumentException();
        }
        $entidadeExistente->insereNome($entidade->pegaNome());
        return $entidadeExistente;
    }
}