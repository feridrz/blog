<?php
namespace App\interfaces;

interface IPostService
{
    public function getAllPosts();
    public function getPostById($id);
    public function validatePost($title, $content, $image);
    public function createPost($title, $content, $image);
    public function updatePost($id, $title, $content, $image);
    public function deletePost($id);
}
