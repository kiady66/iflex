<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
#[ApiResource(
    security: 'is_granted("ROLE_ADMIN")',
    collectionOperations: [],
    itemOperations: [
        'get' => []
    ]
)]
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:collection"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=UserInvoice::class, mappedBy="client", orphanRemoval=true)
     */
    private $userInvoices;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $accessToken;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $postalcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\ManyToMany(targetEntity=Group::class, mappedBy="users")
     */
    private $userGroups;

    /**
     * @ORM\ManyToMany(targetEntity=Game::class, mappedBy="participants")
     */
    private $games;

    /**
     * @ORM\ManyToMany(targetEntity=MessageRoom::class, mappedBy="users")
     */
    private $messageRooms;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $roles = [];

    /**
     * @ORM\OneToMany(targetEntity=Post::class, mappedBy="user")
     */
    private $posts;

    /**
     * @ORM\OneToMany(targetEntity=File::class, mappedBy="user")
     */
    private $files;

    /**
     * @ORM\OneToMany(targetEntity=UserOrder::class, mappedBy="client", orphanRemoval=true)
     */
    private $userOrders;

    /**
     * @ORM\OneToMany(targetEntity=Invitation::class, mappedBy="sentBy", orphanRemoval=true)
     */
    private $invitationsCreated;

    /**
     * @ORM\ManyToMany(targetEntity=invitation::class, inversedBy="peopleWhoJoined")
     */
    private $invitationsReceived;



    public function __construct()
    {
        $this->userInvoices = new ArrayCollection();
        $this->userGroups = new ArrayCollection();
        $this->games = new ArrayCollection();
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->messageRooms = new ArrayCollection();
        $this->posts = new ArrayCollection();
        $this->files = new ArrayCollection();
        $this->userOrders = new ArrayCollection();
        $this->invitationsCreated = new ArrayCollection();
        $this->invitationsReceived = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection|UserInvoice[]
     */
    public function getUserInvoices(): Collection
    {
        return $this->userInvoices;
    }

    public function addUserInvoice(UserInvoice $userInvoice): self
    {
        if (!$this->userInvoices->contains($userInvoice)) {
            $this->userInvoices[] = $userInvoice;
            $userInvoice->setClient($this);
        }

        return $this;
    }

    public function removeUserInvoice(UserInvoice $userInvoice): self
    {
        if ($this->userInvoices->removeElement($userInvoice)) {
            // set the owning side to null (unless already changed)
            if ($userInvoice->getClient() === $this) {
                $userInvoice->setClient(null);
            }
        }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    public function setAccessToken(?string $accessToken): self
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPostalcode(): ?string
    {
        return $this->postalcode;
    }

    public function setPostalcode(?string $postalcode): self
    {
        $this->postalcode = $postalcode;

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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection|Group[]
     */
    public function getUserGroups(): Collection
    {
        return $this->userGroups;
    }

    public function addUserGroup(Group $userGroup): self
    {
        if (!$this->userGroups->contains($userGroup)) {
            $this->userGroups[] = $userGroup;
            $userGroup->addUser($this);
        }

        return $this;
    }

    public function removeUserGroup(Group $userGroup): self
    {
        if ($this->userGroups->removeElement($userGroup)) {
            $userGroup->removeUser($this);
        }

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
            $game->addParticipant($this);
        }

        return $this;
    }

    public function removeGame(Game $game): self
    {
        if ($this->games->removeElement($game)) {
            $game->removeParticipant($this);
        }

        return $this;
    }

    /**
     * @return Collection|MessageRoom[]
     */
    public function getMessageRooms(): Collection
    {
        return $this->messageRooms;
    }

    public function addMessageRoom(MessageRoom $messageRoom): self
    {
        if (!$this->messageRooms->contains($messageRoom)) {
            $this->messageRooms[] = $messageRoom;
            $messageRoom->addUser($this);
        }

        return $this;
    }

    public function removeMessageRoom(MessageRoom $messageRoom): self
    {
        if ($this->messageRooms->removeElement($messageRoom)) {
            $messageRoom->removeUser($this);
        }

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getRoles()
    {
        return ['ROLE_ADMIN'];
    }


    public function getSalt()
    {
        //TODO
    }

    public function eraseCredentials()
    {
        //TODO
    }

    public function setRoles(?array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return Collection|Post[]
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(Post $post): self
    {
        if (!$this->posts->contains($post)) {
            $this->posts[] = $post;
            $post->setUser($this);
        }

        return $this;
    }

    public function removePost(Post $post): self
    {
        if ($this->posts->removeElement($post)) {
            // set the owning side to null (unless already changed)
            if ($post->getUser() === $this) {
                $post->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|File[]
     */
    public function getFiles(): Collection
    {
        return $this->files;
    }

    public function addFile(File $file): self
    {
        if (!$this->files->contains($file)) {
            $this->files[] = $file;
            $file->setUser($this);
        }

        return $this;
    }

    public function removeFile(File $file): self
    {
        if ($this->files->removeElement($file)) {
            // set the owning side to null (unless already changed)
            if ($file->getUser() === $this) {
                $file->setUser(null);
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
            $userOrder->setClient($this);
        }

        return $this;
    }

    public function removeUserOrder(UserOrder $userOrder): self
    {
        if ($this->userOrders->removeElement($userOrder)) {
            // set the owning side to null (unless already changed)
            if ($userOrder->getClient() === $this) {
                $userOrder->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Invitation[]
     */
    public function getInvitationsCreated(): Collection
    {
        return $this->invitationsCreated;
    }

    public function addInvitationsCreated(Invitation $invitationsCreated): self
    {
        if (!$this->invitationsCreated->contains($invitationsCreated)) {
            $this->invitationsCreated[] = $invitationsCreated;
            $invitationsCreated->setSentBy($this);
        }

        return $this;
    }

    public function removeInvitationsCreated(Invitation $invitationsCreated): self
    {
        if ($this->invitationsCreated->removeElement($invitationsCreated)) {
            // set the owning side to null (unless already changed)
            if ($invitationsCreated->getSentBy() === $this) {
                $invitationsCreated->setSentBy(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|invitation[]
     */
    public function getInvitationsReceived(): Collection
    {
        return $this->invitationsReceived;
    }

    public function addInvitationsReceived(invitation $invitationsReceived): self
    {
        if (!$this->invitationsReceived->contains($invitationsReceived)) {
            $this->invitationsReceived[] = $invitationsReceived;
        }

        return $this;
    }

    public function removeInvitationsReceived(invitation $invitationsReceived): self
    {
        $this->invitationsReceived->removeElement($invitationsReceived);

        return $this;
    }

}
