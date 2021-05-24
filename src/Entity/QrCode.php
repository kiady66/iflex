<?php

namespace App\Entity;

use App\Repository\QrCodeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QrCodeRepository::class)
 */
class QrCode
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $link;

    /**
     * @ORM\Column(type="boolean")
     */
    private $payed;

    /**
     * @ORM\OneToOne(targetEntity=UserOrder::class, mappedBy="QrCode", cascade={"persist", "remove"})
     */
    private $userOrder;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getPayed(): ?bool
    {
        return $this->payed;
    }

    public function setPayed(bool $payed): self
    {
        $this->payed = $payed;

        return $this;
    }

    public function getUserOrder(): ?UserOrder
    {
        return $this->userOrder;
    }

    public function setUserOrder(UserOrder $userOrder): self
    {
        // set the owning side of the relation if necessary
        if ($userOrder->getQrCode() !== $this) {
            $userOrder->setQrCode($this);
        }

        $this->userOrder = $userOrder;

        return $this;
    }
}
