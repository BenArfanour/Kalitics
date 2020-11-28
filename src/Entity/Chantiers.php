<?php

namespace App\Entity;

use App\Repository\ChantiersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChantiersRepository::class)
 */
class Chantiers
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startDate;






    /**
     * @ORM\OneToMany(targetEntity=Pointages::class, mappedBy="chantier")
     */
    private $chantiers;

    public function __construct()
    {
        $this->chantiers = new ArrayCollection();
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

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }


    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @return Collection|Pointages[]
     */
    public function getChantiers(): Collection
    {
        return $this->chantiers;
    }

    public function addChantier(Pointages $chantier): self
    {
        if (!$this->chantiers->contains($chantier)) {
            $this->chantiers[] = $chantier;
            $chantier->setChantier($this);
        }

        return $this;
    }

    public function removeChantier(Pointages $chantier): self
    {
        if ($this->chantiers->removeElement($chantier)) {
            // set the owning side to null (unless already changed)
            if ($chantier->getChantier() === $this) {
                $chantier->setChantier(null);
            }
        }

        return $this;
    }

    




}
