<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventoRepository")
 */
class Evento implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $titulo;
    /**
     * @ORM\Column(type="string")
     */
    private $dataInicial;
    /**
     * @ORM\Column(type="string")
     */
    private $horaInicial;
    /**
     * @ORM\Column(type="string")
     */
    private $dataFinal;
    /**
     * @ORM\Column(type="string")
     */
    private $horaFinal;
    /**
     * @ORM\Column(type="string")
     */
    private $descricao;

    public function pegaId(): ?int
    {
        return $this->id;
    }

    public function pegaTitulo(): ?string
    {
        return $this->titulo;
    }

    public function insereTitulo(string $titulo): self
    {
        $this->titulo = $titulo;
        return $this;
    }

    public function pegaDataInicial(): ?string
    {
        return $this->dataInicial;
    }

    public function insereDataInicial(string $dataInicial): self
    {
        $this->dataInicial = $dataInicial;
        return $this;
    }

    public function pegaHoraInicial(): ?string
    {
        return $this->horaInicial;
    }

    public function insereHoraInicial(string $horaInicial): self
    {
        $this->horaInicial = $horaInicial;
        return $this;
    }

    public function pegaDataFinal(): ?string
    {
        return $this->dataFinal;
    }

    public function insereDataFinal(string $dataFinal): self
    {
        $this->dataFinal = $dataFinal;
        return $this;
    }

    public function pegaHoraFinal(): ?string
    {
        return $this->horaFinal;
    }

    public function insereHoraFinal(string $horaFinal): self
    {
        $this->horaFinal = $horaFinal;
        return $this;
    }

    public function pegaDescricao(): ?string
    {
        return $this->descricao;
    }

    public function insereDescricao(string $descricao): self
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function jsonSerialize()
    {
        return [

            'id' => $this->pegaId(),
            'titulo' => $this->pegaTitulo(),
            'dataInicial' => $this->pegaDataInicial(),
            'horaInicial' => $this->pegaHoraInicial(),
            'dataFinal' => $this->pegaDataFinal(),
            'horaFinal' => $this->pegaHoraFinal(),
            'descricao' => $this->pegaDescricao(),
            '_links' => [
                [
                    'rel' => 'self',
                    'path' => '/eventos/' . $this->pegaId()
                ]
            ]

        ];
    }
}