<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UniversRepository")
 */
class Univers
{
    /**     
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank 
     * 
     * @Assert\Length(
     *      min = 2,
     *      max = 64,
     *      minMessage = "Votre nom d'univers doit comporter {{ limit }} caractères minimum",
     *      maxMessage = "Votre nom d'univers doit comporter {{ limit }} caractères maximum"
     * ) 
     * 
     * @ORM\Column(type="string", length=64)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enable;

    /**
     * @Assert\NotBlank
     * @Assert\Type("\DateTime")
     * 
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @Assert\Type("\DateTime")
     * 
     * @ORM\Column(type="datetime", nullable=true)
     */
    
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Category", mappedBy="univers", orphanRemoval=true)
     */
    private $categories;

    public function __construct()
    {
        $this->enable     = true;
        $this->createdAt  = new \DateTime();
        $this->updatedAt  = null;
        $this->categories = new ArrayCollection();
        $this->image      = null;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getEnable(): ?bool
    {
        return $this->enable;
    }

    public function setEnable(bool $enable): self
    {
        $this->enable = $enable;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setUnivers($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
            // set the owning side to null (unless already changed)
            if ($category->getUnivers() === $this) {
                $category->setUnivers(null);
            }
        }

        return $this;
    }
}
