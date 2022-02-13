<?php

namespace App\Entity;

use App\Repository\ExchangeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExchangeRepository::class)
 */

#[ApiResource(
    
)]

class Exchange
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Offer::class, inversedBy="exchanges")
     */
    private $offer;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="exchanges")
     */
    private $UserOwner;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="propositions")
     */
    private $userProposer;

    /**
     *@ORM\Column(type="string", length=180)
     */
    private $game;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $ownerGame;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
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
