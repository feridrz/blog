<?php
namespace App\interfaces;

interface ICommentService
{
    public function createComment($postId, $userId, $text);
    public function deleteComment($id);
}
