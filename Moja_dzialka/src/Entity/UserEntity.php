<?php

namespace App\Entity;

// use Doctrine\Common\Collections\ArrayCollection;
// use Doctrine\Common\Collections\Collection;
// use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class UserEntity extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}

// /**
//  * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
//  */
// class UserEntity
// {
//     /**
//      * @ORM\Id()
//      * @ORM\GeneratedValue()
//      * @ORM\Column(type="integer")
//      */
//     private $id;

//     /**
//      * @ORM\Column(type="string", length=255)
//      */
//     private $name;

//     /**
//      * @ORM\Column(type="string", length=255)
//      */
//     private $email;

//     /**
//      * @ORM\Column(type="string", length=255)
//      */
//     private $password;

//     /**
//      * @ORM\OneToMany(targetEntity="App\Entity\CommentEntity", mappedBy="relation")
//      */
//     private $comment;

//     public function __construct()
//     {
//         $this->comment = new ArrayCollection();
//     }

//     public function getId()
//     {
//         return $this->id;
//     }

//     public function getName(): ?string
//     {
//         return $this->name;
//     }

//     public function setName(string $name): self
//     {
//         $this->name = $name;

//         return $this;
//     }

//     public function getEmail(): ?string
//     {
//         return $this->email;
//     }

//     public function setEmail(string $email): self
//     {
//         $this->email = $email;

//         return $this;
//     }

//     public function getPassword(): ?string
//     {
//         return $this->password;
//     }

//     public function setPassword(string $password): self
//     {
//         $this->password = $password;

//         return $this;
//     }

//     /**
//      * @return Collection|CommentEntity[]
//      */
//     public function getComment(): Collection
//     {
//         return $this->comment;
//     }

//     public function addComment(CommentEntity $comment): self
//     {
//         if (!$this->comment->contains($comment)) {
//             $this->comment[] = $comment;
//             $comment->setRelation($this);
//         }

//         return $this;
//     }

//     public function removeComment(CommentEntity $comment): self
//     {
//         if ($this->comment->contains($comment)) {
//             $this->comment->removeElement($comment);
//             // set the owning side to null (unless already changed)
//             if ($comment->getRelation() === $this) {
//                 $comment->setRelation(null);
//             }
//         }

//         return $this;
//     }
//     public function __toString()
//     {
//         return $this->getName();
//     }
// }
