<?php
namespace App\controllers;
use App\core\Controller;
use App\interfaces\ICommentService;
use Exception;


class CommentController extends Controller
{
  private $service;

  public function __construct(ICommentService $service)
  {
    $this->service = $service;
  }


  public function store($postId)
  {
    $text = $_POST['text'] ? htmlspecialchars($_POST['text'], ENT_QUOTES | ENT_HTML5, 'UTF-8') : null;

    if (empty($text)) {
      $_SESSION['error_message'] = 'Text is not provided';
      redirect(self::HOME);
  }

    try {
      $this->service->createComment($postId, $_SESSION['id'], $text);
      $_SESSION['success_message'] = "Comment created successfully";
      redirect(self::HOME);

    } catch (Exception $e) {
      handleException($e);
    }

  }

  public function delete($id)
  {
    try {
      $this->service->deleteComment($id);

      $_SESSION['success_message'] = "Comment deleted successfully";
      redirect(self::HOME);
    } catch (Exception $e) {
      handleException($e);
    }

  }

}