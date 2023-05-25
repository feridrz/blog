<?php
namespace App;
use App\models\CommentModel;
use App\models\PostModel;

class BlogFactory {
    public static function createPost($id, $title, $content, $author, $image, $createdAt): PostModel {
        return new PostModel($title, $content, $author, $image, $id, $createdAt);
    }

    public static function createComment($id, $post_id, $author, $text, $createdAt): CommentModel {
        return new CommentModel($id, $post_id, $author, $text, $createdAt);
    }
}
