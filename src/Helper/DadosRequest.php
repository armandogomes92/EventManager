<?php


namespace App\Helper;


use Symfony\Component\HttpFoundation\Request;

class DadosRequest
{
    private function buscaDadosRequest(Request $request)
    {
        $queryString = $request->query->all();
        $dadosOrdenacao = array_key_exists('sort', $queryString)? $queryString['sort']:null;
        unset($queryString['sort']);
        $paginaAtual = array_key_exists('page', $queryString)? $queryString['page']: 1;
        unset($queryString['page']);
        $itensPorPagina = array_key_exists('itensPorPagina', $queryString)? $queryString['itensPorPagina']: 5;
        unset($queryString['itensPorPagina']);
        return [$queryString, $dadosOrdenacao, $paginaAtual, $itensPorPagina];
    }
    public function buscaDadosOrdenacao(Request $request)
    {
        [$informacaoDaOrdenacao, ] = $this->buscaDadosRequest($request);

        return $informacaoDaOrdenacao;
    }

    public function buscaDadosFiltro(Request $request)
    {
        [, $informacaoDeFiltro] = $this->buscaDadosRequest($request);

        return $informacaoDeFiltro;
    }
    public function buscaDadosPaginacao(Request $request)
    {
        [, , $paginaAtual, $itensPorPagina] = $this->buscaDadosRequest($request);
        return [$paginaAtual, $itensPorPagina];
    }
}