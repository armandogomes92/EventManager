<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PalestranteRepository")
 */

class Palestrante implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $nome;

    public function pegaId(): ?int
    {
        return $this->id;
    }

    public function pegaNome(): ?string
    {
        return $this->nome;
    }

    public function insereNome(?string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->pegaId(),
            'nome' => $this->pegaNome(),
            '_links' => [
                [
                    'rel' => 'self',
                    'path' => '/palestrantes/' . $this->pegaId()
                ]
            ]
        ];
    }
}