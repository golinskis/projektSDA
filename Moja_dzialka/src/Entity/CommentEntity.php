<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 */
class CommentEntity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $text;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserEntity", inversedBy="comment")
     */
    private $relation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PostEntity", inversedBy="comment")
     * @ORM\JoinColumn(nullable=false)
     */
    private $yes;

    public function getId()
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getRelation(): ?UserEntity
    {
        return $this->relation;
    }

    public function setRelation(?UserEntity $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    public function getYes(): ?PostEntity
    {
        return $this->yes;
    }

    public function setYes(?PostEntity $yes): self
    {
        $this->yes = $yes;

        return $this;
    }
}
