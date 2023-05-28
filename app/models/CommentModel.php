<?php
namespace App\models;
use Carbon\Carbon;

class CommentModel
{
    private $id;
    private $postId;
    private $authorId;
    private $text;
    private $createdAt;
    private $authorName;



    public function __construct($id, $postId, $authorId, $text, $createdAt = null)
    {
        $this->id = $id;
        $this->postId = $postId;
        $this->authorId = $authorId;
        $this->text = $text;
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

    public function setPostId($id)
    {
        $this->postId = $id;
    }

    public function getPostId()
    {
        return $this->postId;
    }

    
    public function getUserId()
    {
        return $this->authorId;
    }

    public function setUserId($id)
    {
        $this->authorId = $id;
    }


    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }
    public function getCreatedDate()
    {
        return $this->createdAt;
    }

    public function setCreatedDate($createdAt)
    {
        $this->createdAt = $createdAt;
    }
    public function getAuthorData()
    {
        return [
            "name" => $this->authorName,
        ];
    }

    public function setAuthorData($authorName, $authorEmail, $authorImage)
    {
        $this->authorName = $authorName;
    }
}