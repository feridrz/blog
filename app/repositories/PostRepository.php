<?php
namespace App\repositories;
use App\BlogFactory;
use PDO;


class PostRepository
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM posts";
        $result = $this->db->query($sql);
        $posts = [];
        $blogFactory = new BlogFactory();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $post = $blogFactory::createPost($row['id'], $row['title'], $row['content'], $row['author_id'], $row['image'], $row['created_at']);
            $comments = $this->getCommentsForPost($row['id']);

            $post->setComments($comments);
            $post->setCommentCount(count($comments));
            $posts[] = $post;
        }

        return $posts;
    }
    public function getCommentsForPost($postId)
    {
        $sql = "SELECT c.*, u.name AS author_name
        FROM comments c
        INNER JOIN users u ON c.user_id = u.id
        WHERE c.post_id = :post_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam('post_id', $postId, PDO::PARAM_INT);
        $stmt->execute();

        $comments = [];
        $blogFactory = new BlogFactory();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $comment = $blogFactory::createComment($row['id'], $row['post_id'], $row['user_id'], $row['text'], $row['created_at']);
            $comment->setAuthorData($row['author_name']);

            $comments[] = $comment;
        }

        return $comments;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM posts WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        if (!$row) {
            return null;
        }

        $blogFactory = new BlogFactory();
        return $blogFactory::createPost($row['id'], $row['title'], $row['content'], $row['author_id'], $row['image'], $row['created_at']);
    }

    public function save($post)
    {
        $sql = "INSERT INTO posts (title, content, author_id, image) VALUES (:title, :content, :author_id, :image)";
        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':title' => $post->getTitle(),
            ':content' => $post->getContent(),
            ':author_id' => $post->getAuthor(),
            ':image' => $post->getImage()
        ]);
        

    }

    public function update($post)
    {
        $sql = "UPDATE posts SET title = :title, content = :content, author_id = :author_id, image = :image WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':title' => $post->getTitle(),
            ':content' => $post->getContent(),
            ':author_id' => $post->getAuthor(),
            ':image' => $post->getImage(),
            ':id' => $post->getId()
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM posts WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}