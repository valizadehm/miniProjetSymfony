<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticlesRepository::class)]
class Articles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 25)]
    private $titre;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $contenu;

    #[ORM\Column(type: 'datetime')]
    private $date_de_creation;

    #[ORM\Column(type: 'datetime')]
    private $date_de_modification;

    #[ORM\OneToMany(mappedBy: 'articles', targetEntity: Commentaires::class, orphanRemoval: true)]
    private $commentaires;

    #[ORM\ManyToMany(targetEntity: Categories::class, mappedBy: 'articles')]
    private $categories;

    #[ORM\ManyToMany(targetEntity: MotsCles::class, mappedBy: 'articles')]
    private $motsCles;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->motsCles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(?string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDateDeCreation(): ?\DateTimeInterface
    {
        return $this->date_de_creation;
    }

    public function setDateDeCreation(\DateTimeInterface $date_de_creation): self
    {
        $this->date_de_creation = $date_de_creation;

        return $this;
    }

    public function getDateDeModification(): ?\DateTimeInterface
    {
        return $this->date_de_modification;
    }

    public function setDateDeModification(\DateTimeInterface $date_de_modification): self
    {
        $this->date_de_modification = $date_de_modification;

        return $this;
    }

    /**
     * @return Collection<int, Commentaires>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaires $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setArticles($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaires $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getArticles() === $this) {
                $commentaire->setArticles(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Categories>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categories $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->addArticle($this);
        }

        return $this;
    }

    public function removeCategory(Categories $category): self
    {
        if ($this->categories->removeElement($category)) {
            $category->removeArticle($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, MotsCles>
     */
    public function getMotsCles(): Collection
    {
        return $this->motsCles;
    }

    public function addMotsCle(MotsCles $motsCle): self
    {
        if (!$this->motsCles->contains($motsCle)) {
            $this->motsCles[] = $motsCle;
            $motsCle->addArticle($this);
        }

        return $this;
    }

    public function removeMotsCle(MotsCles $motsCle): self
    {
        if ($this->motsCles->removeElement($motsCle)) {
            $motsCle->removeArticle($this);
        }

        return $this;
    }
}
