<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;


/**
 * @ORM\Entity(repositoryClass=GenreRepository::class)
 */
#[ApiResource(
    itemOperations: [
        'get' => [
            'normalisation_context' => ['groups' => ['read:Genre:collection','read:Genre:item']]
        ]
        ],
    collectionOperations: [
        'get' => [
            'normalisation_context' => ['groups' => ['read:Genre:collection']]
        ]
    ]
)]
class Genre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:Genre:collection'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"init"})
     */
    #[Groups(['read:Genre:collection'])]
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"init"})
     */
    #[Groups(['read:Genre:collection'])]
    private $slug;

    /**
     * @ORM\ManyToMany(targetEntity=Game::class, mappedBy="genres")
     */
    #[Groups(['read:Genre:item'])]
    private $games;

    public function __construct()
    {
        $this->games = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): ?self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection|Game[]
     */
    public function getGames(): Collection
    {
        return $this->games;
    }

    public function addGame(Game $game): self
    {
        if (!$this->games->contains($game)) {
            $this->games[] = $game;
            $game->addGenre($this);
        }

        return $this;
    }

    public function removeGame(Game $game): self
    {
        if ($this->games->contains($game)) {
            $this->games->removeElement($game);
            $game->removeGenre($this);
        }

        return $this;
    }
}