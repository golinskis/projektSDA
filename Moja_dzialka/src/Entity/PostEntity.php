<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostsRepository")
 */
class PostEntity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CommentEntity", mappedBy="yes")
     */
    public $comment;

    /**
     * @ORM\Column(type="text")
     */
    public $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    public $content;

    public function __construct()
    {
        $this->comment = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Collection|CommentEntity[]
     */
    public function getComment(): Collection
    {
        return $this->comment;
    }

    public function addComment(CommentEntity $comment): self
    {
        if (!$this->comment->contains($comment)) {
            $this->comment[] = $comment;
            $comment->setYes($this);
        }

        return $this;
    }

    public function removeComment(CommentEntity $comment): self
    {
        if ($this->comment->contains($comment)) {
            $this->comment->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getYes() === $this) {
                $comment->setYes(null);
            }
        }

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }
}
