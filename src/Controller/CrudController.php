<?php


namespace App\Controller;


use App\Helper\DadosRequest;
use App\Helper\EntidadeFactory;
use App\Helper\ResponseFactory;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class CrudController extends AbstractController
{
    /**
     * @var ObjectRepository
     */
    protected ObjectRepository $repository;
    /**
     * @var EntityManagerInterface
     */
    protected EntityManagerInterface $entityManager;
    /**
     * @var EntidadeFactory
     */
    protected EntidadeFactory $factory;
    /**
     * @var DadosRequest
     */
    protected DadosRequest $dadosRequest;

    public function __construct(
        ObjectRepository $repository,
        EntityManagerInterface $entityManager,
        EntidadeFactory $factory,
        DadosRequest $dadosRequest)
    {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
        $this->factory = $factory;
        $this->dadosRequest = $dadosRequest;
    }
    public function novo(Request $request): Response
    {
        $dadosRequest = $request->getContent();
        $entidade = $this->factory->criarEntidade($dadosRequest);

        $this->entityManager->persist($entidade);
        $this->entityManager->flush();

        return new JsonResponse($entidade);
    }

    public function buscarTodos(Request $request): Response
    {
        $informacaoDaOrdenacao = $this->dadosRequest->buscaDadosOrdenacao($request);
        $informacaoDeFiltro = $this->dadosRequest->buscaDadosFiltro($request);
        [$paginaAtual, $itensPorPagina] = $this->dadosRequest->buscaDadosPaginacao($request);

        $entityList = $this->repository->findBy($informacaoDaOrdenacao, $informacaoDeFiltro, $itensPorPagina, ($paginaAtual - 1) * $itensPorPagina);

        $fabricaResposta = new ResponseFactory(
            true,
            $entityList,
            Response::HTTP_OK,
            $paginaAtual,
            $itensPorPagina
        );
        return $fabricaResposta->pegaResposta();
    }

    public function buscarUma(int $id): Response
    {
        $entidade = $this->repository->find($id);
        $statusResposta = is_null($entidade) ? Response::HTTP_NO_CONTENT : Response::HTTP_OK;
        $fabricaResposta = new ResponseFactory(
            true,
            $entidade,
            $statusResposta
        );
        return $fabricaResposta->pegaResposta();
    }

    public function remove(int $id): Response
    {
        $entidade = $this->repository->find($id);
        $this->entityManager->remove($entidade);
        $this->entityManager->flush();

        return new Response('', Response::HTTP_NO_CONTENT);
    }

    public function atualiza(int $id, Request $request): Response
    {
        $corpoRequisicao = $request->getContent();
        $entidade = $this->factory->criarEntidade($corpoRequisicao);

        try {
            $entidadeExistente = $this->atualizarEntidadeExistente($id, $entidade);
            $this->entityManager->flush();

            $fabrica = new ResponseFactory(
                true,
                $entidadeExistente,
                Response::HTTP_OK
            );
            return $fabrica->pegaResposta();
        } catch (\InvalidArgumentException $ex) {
            $fabrica = new ResponseFactory(
                false,
                'Recurso não encontrado',
                Response::HTTP_NOT_FOUND
            );
            return $fabrica->pegaResposta();
        }
    }

    abstract public function atualizarEntidadeExistente($entidadeExistente, $entidadeEnviada);
}