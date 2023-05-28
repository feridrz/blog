<?php
namespace App\repositories;

use App\core\Database;
use App\models\CommentModel;
use PDO;

class CommentRepository
{
  private $db;

  public function __construct(Database $connection)
  {
    $this->db = $connection->db;
  }
  public function createComment(CommentModel $comment): bool
  {

    $query = "INSERT INTO comments (post_id, user_id, text) VALUES (:post_id, :user_id, :text)";
    $stmt = $this->db->prepare($query);

    $stmt->bindValue(':post_id', $comment->getPostId(), PDO::PARAM_INT);
    $stmt->bindValue(':user_id', $comment->getUserId(), PDO::PARAM_INT);
    $stmt->bindValue(':text', $comment->getText(), PDO::PARAM_STR);

    return $stmt->execute();
  }

  public function getById($id)
  {
    $stmt = $this->db->prepare("SELECT * FROM comments WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }


  public function delete($id): bool
  {
    $sql = "DELETE FROM comments WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->rowCount();
  }
}