<?php

namespace App\Entity;

use App\Repository\OfferRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OfferRepository::class)
 */

#[ApiResource(
    itemOperations: [
        'get' => [
            'normalisation_context' => ['groups' => ['read:Offer:collection','read:Offer:item']]
        ],
        'post' => [
            'denormalization_context' => ['groups' => ['write:Offer:item']]
        ],
        'put' => [
            'denormalization_context' => ['groups' => ['put:Offer:item']]
        ]
        ],
    collectionOperations: [
        'get' => [
            'normalisation_context' => ['groups' => ['read:Offer:collection']]
        ],
    ]
)]
class Offer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:Offer:collection'])]
    #[Groups(['write:Offer:collection'])]
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="offers")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:Offer:collection'])]
    #[Groups(['write:Offer:collection'])]
    private $proposer;

    /**
     * @ORM\OneToMany(targetEntity=Exchange::class, mappedBy="offer")
     */
    #[Groups(['read:Offer:collection'])]
    #[Groups(['write:Offer:collection'])]
    private $exchanges;

    public function __construct()
    {
        $this->exchanges = new ArrayCollection();
    }

    #[Groups(['read:Offer:collection'])]
    public function getId(): ?int
    {
        return $this->id;
    }

    #[Groups(['read:Offer:collection'])]
    #[Groups(['write:Offer:collection'])]
    public function getProposer(): ?User
    {
        return $this->proposer;
    }

    #[Groups(['read:Offer:collection'])]
    #[Groups(['write:Offer:collection'])]
    public function setProposer(?User $proposer): self
    {
        $this->proposer = $proposer;

        return $this;
    }

    /**
     * @return Collection|Exchange[]
     */
    public function getExchanges(): Collection
    {
        return $this->exchanges;
    }

    public function addExchange(Exchange $exchange): self
    {
        if (!$this->exchanges->contains($exchange)) {
            $this->exchanges[] = $exchange;
            $exchange->setOffer($this);
        }

        return $this;
    }

    public function removeExchange(Exchange $exchange): self
    {
        if ($this->exchanges->contains($exchange)) {
            $this->exchanges->removeElement($exchange);
            // set the owning side to null (unless already changed)
            if ($exchange->getOffer() === $this) {
                $exchange->setOffer(null);
            }
        }

        return $this;
    }
}
