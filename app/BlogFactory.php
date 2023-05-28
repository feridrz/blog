<?php
namespace App;
use App\models\CommentModel;
use App\models\PostModel;

class BlogFactory {
    public static function createPost($id, string $title, string $content, $author, $image, $createdAt = null): PostModel {
        return new PostModel($title, $content, $author, $image, $id, $createdAt);
    }

    public static function createComment($id, $post_id, string $author, string $text, $createdAt): CommentModel {
        return new CommentModel($id, $post_id, $author, $text, $createdAt);
    }
}
