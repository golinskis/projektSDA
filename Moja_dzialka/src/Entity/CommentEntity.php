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
     * @ORM\Column(type="text", nullable=false)
     */
    private $text;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $data;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserEntity", inversedBy="comment")
     */
    private $user;



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

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(string $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getUser(): ?UserEntity
    {
        return $this->user;
    }

    public function setUser(?UserEntity $user): self
    {
        $this->user = $user;

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

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->text;
    }
}
