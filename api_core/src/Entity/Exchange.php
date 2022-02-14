<?php

namespace App\Entity;

use App\Repository\ExchangeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExchangeRepository::class)
 */

#[ApiResource(
    itemOperations: [
        'get' => [
            'normalisation_context' => ['groups' => ['read:Exchange:collection','read:Exchange:item']]
        ],
        'patch' => [
            'denormalization_context' => ['groups' => ['patch:Exchange:item']]
        ]
        ],
    collectionOperations: [
        'get' => [
            'normalisation_context' => ['groups' => ['read:Exchange:collection']]
        ],
        'post' => [
            'denormalization_context' => ['groups' => ['write:Exchange:item']]
        ]
    ]
)]
#[ApiFilter(PropertyFilter::class)]
class Exchange
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:Exchange:collection'])]
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Offer::class, inversedBy="exchanges")
     */
    #[Groups(['write:Exchange:item','read:Exchange:collection'])]
    private $offer;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="exchanges")
     */
    #[Groups(['read:Exchange:collection','write:Exchange:item'])]
    private $UserOwner;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="propositions")
     */
    #[Groups(['read:Exchange:collection','write:Exchange:item'])]
    private $userProposer;

    /**
     *@ORM\Column(type="string", length=180)
     */
    #[Groups(['write:Exchange:item','read:Exchange:collection'])]
    private $game;

    /**
     * @ORM\Column(type="string", length=180)
     */
    #[Groups(['write:Exchange:item','read:Exchange:collection'])]
    private $ownerGame;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    #[Groups(['write:Exchange:item','read:Exchange:collection','patch:Exchange:item'])]
    private $confirmed;

    public function __construct()
    {
        $this->userOwner = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOffer(): ?Offer
    {
        return $this->offer;
    }

    public function setOffer(?Offer $offer): self
    {
        $this->offer = $offer;

        return $this;
    }

    public function getUserOwner(): ?User
    {
        return $this->UserOwner;
    }

    public function setUserOwner(?User $UserOwner): self
    {
        $this->UserOwner = $UserOwner;

        return $this;
    }

    public function getUserProposer(): ?User
    {
        return $this->userProposer;
    }

    public function setUserProposer(?User $userProposer): self
    {
        $this->userProposer = $userProposer;

        return $this;
    }

    public function getGame(): ?string
    {
        return $this->game;
    }

    public function setGame(string $game): self
    {
        $this->game = $game;

        return $this;
    }

    public function getOwnerGame(): ?string
    {
        return $this->ownerGame;
    }

    public function setOwnerGame(string $ownerGame): self
    {
        $this->ownerGame = $ownerGame;

        return $this;
    }

    public function getConfirmed(): ?bool
    {
        return $this->confirmed;
    }

    public function setConfirmed(?bool $confirmed): self
    {
        $this->confirmed = $confirmed;

        return $this;
    }

}
