<?php

namespace App\Entity;

use App\Repository\InvitationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InvitationRepository::class)
 */
class Invitation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="invitationsCreated")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sentBy;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="invitationsReceived")
     */
    private $peopleWhoJoined;


    public function __construct()
    {
        $this->peopleWhoJoined = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSentBy(): ?user
    {
        return $this->sentBy;
    }

    public function setSentBy(?user $sentBy): self
    {
        $this->sentBy = $sentBy;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getPeopleWhoJoined(): Collection
    {
        return $this->peopleWhoJoined;
    }

    public function addPeopleWhoJoined(User $peopleWhoJoined): self
    {
        if (!$this->peopleWhoJoined->contains($peopleWhoJoined)) {
            $this->peopleWhoJoined[] = $peopleWhoJoined;
            $peopleWhoJoined->addInvitationsReceived($this);
        }

        return $this;
    }

    public function removePeopleWhoJoined(User $peopleWhoJoined): self
    {
        if ($this->peopleWhoJoined->removeElement($peopleWhoJoined)) {
            $peopleWhoJoined->removeInvitationsReceived($this);
        }

        return $this;
    }

}
