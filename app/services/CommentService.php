<?php
namespace App\services;
use App\interfaces\ICommentService;
use App\models\CommentModel;
use App\repositories\CommentRepository;
class CommentService implements ICommentService
{
    private $repository;

    public function __construct(CommentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createComment($postId, $userId, $text)
    {
        $comment = new CommentModel(null, $postId, $userId, $text);
        $this->repository->createComment($comment);
        return $comment;
    }

    public function deleteComment($id)
    {
        $comment = $this->repository->getById($id);
        if (!$comment) {
            handleException('Comment not found');
        }
        $this->repository->delete($comment['id']);
    }
}