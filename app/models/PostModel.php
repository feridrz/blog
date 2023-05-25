<?php
namespace App\models;

use Carbon\Carbon;


class PostModel
{
    private $id;
    private $title;
    private $content;
    private $author;
    private $comments;
    private $image;
    private $createdAt;

    public function __construct($title, $content, $author, $image, $id = null, $createdAt = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->image = $image;
        if($createdAt){
            $carbonDate = Carbon::parse($createdAt);
            $createdAt = $carbonDate->format('F d, Y \a\t h:i A');
        }
        $this->createdAt = $createdAt;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getComments()
    {
        return $this->comments;
    }
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
    public function getCommentCount()
    {
        return $this->count;
    }
    public function setCommentCount($count)
    {
        $this->count = $count;
    }
}