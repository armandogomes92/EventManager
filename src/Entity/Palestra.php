<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PalestraRepository")
 */

class Palestra implements \JsonSerializable
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
    private $data;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Evento")
     * @ORM\JoinColumn(nullable=false)
     */
    private $evento;
    /**
     * @ORM\Column(type="string")
     */
    private $horaInicio;
    /**
     * @ORM\Column(type="string")
     */
    private $horaFinal;
    /**
     * @ORM\Column(type="string")
     */
    private $descricao;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Palestrante")
     * @ORM\JoinColumn(nullable=false)
     */
    private $palestrante;


    public function pegaId(): ?int
    {
        return $this->id;
    }


    public function pegaTitulo(): ?string
    {
        return $this->titulo;
    }

    public function insereTitulo(?string $titulo): self
    {
        $this->titulo = $titulo;
        return $this;
    }

    public function pegaData(): ?string
    {
        return $this->data;
    }

    public function insereData(?string $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function pegaEvento(): ?Evento
    {
        return $this->evento;
    }

    public function insereEvento(?Evento $evento): self
    {
        $this->evento = $evento;
        return $this;
    }

    public function pegaHoraInicial(): ?string
    {
        return $this->horaInicio;
    }

    public function insereHoraInicial(?string $horaInicio): self
    {
        $this->horaInicio = $horaInicio;
        return $this;
    }

    public function pegaHoraFinal(): ?string
    {
        return $this->horaFinal;
    }

    public function insereHoraFinal(?string $horaFinal): self
    {
        $this->horaFinal = $horaFinal;
        return $this;
    }

    public function pegaDescricao(): ?string
    {
        return $this->descricao;
    }

    public function insereDescricao(?string $descricao): self
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function pegaPalestrante(): ?Palestrante
    {
        return $this->palestrante;
    }

    public function inserePalestrante(?Palestrante $palestrante): self
    {
        $this->palestrante = $palestrante;
        return $this;
    }

    public function jsonSerialize()
    {
        return [

            'id' => $this->pegaId(),
            'titulo' => $this->pegaTitulo(),
            'data' => $this->pegaData(),
            'eventoId' => $this->pegaEvento()->pegaId(),
            'horaInicial' => $this->pegaHoraInicial(),
            'horaFinal' => $this->pegaHoraFinal(),
            'descricao' => $this->pegaDescricao(),
            'palestranteId' => $this->pegaEvento()->pegaId(),
            '_links' => [
                [
                    'rel' => 'self',
                    'path' => '/palestras/' . $this->pegaId()
                ],
                [
                    'rel' => 'palestrantes',
                    'path' => '/palestrantes/' . $this->pegaPalestrante()->pegaId()
                ],
            ]

        ];
    }
}