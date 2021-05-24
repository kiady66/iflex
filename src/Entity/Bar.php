<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Group;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=BarRepository::class)
 */
class Bar
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
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $postalcode;

    /**
     * @ORM\OneToMany(targetEntity=group::class, mappedBy="bar")
     */
    private $barGroups;

    /**
     * @ORM\OneToMany(targetEntity=UserOrder::class, mappedBy="bar", orphanRemoval=true)
     */
    private $userOrders;

    public function __construct()
    {
        $this->barGroups = new ArrayCollection();
        $this->userOrders = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPostalcode(): ?string
    {
        return $this->postalcode;
    }

    public function setPostalcode(string $postalcode): self
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    /**
     * @return Collection|group[]
     */
    public function getBarGroups(): Collection
    {
        return $this->barGroups;
    }

    public function addBarGroup(group $barGroup): self
    {
        if (!$this->barGroups->contains($barGroup)) {
            $this->barGroups[] = $barGroup;
            $barGroup->setBar($this);
        }

        return $this;
    }

    public function removeBarGroup(group $barGroup): self
    {
        if ($this->barGroups->removeElement($barGroup)) {
            // set the owning side to null (unless already changed)
            if ($barGroup->getBar() === $this) {
                $barGroup->setBar(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UserOrder[]
     */
    public function getUserOrders(): Collection
    {
        return $this->userOrders;
    }

    public function addUserOrder(UserOrder $userOrder): self
    {
        if (!$this->userOrders->contains($userOrder)) {
            $this->userOrders[] = $userOrder;
            $userOrder->setBar($this);
        }

        return $this;
    }

    public function removeUserOrder(UserOrder $userOrder): self
    {
        if ($this->userOrders->removeElement($userOrder)) {
            // set the owning side to null (unless already changed)
            if ($userOrder->getBar() === $this) {
                $userOrder->setBar(null);
            }
        }

        return $this;
    }
}
