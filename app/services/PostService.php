<?php
namespace App\services;
use App\helpers\ValidationHelper;
use App\interfaces\IPostService;
use App\models\PostModel;
use App\repositories\CommentRepository;
use App\repositories\PostRepository;

class PostService implements IPostService
{
    private $postRepository;
    private $commentRepository;

    public function __construct(PostRepository $postRepository, CommentRepository $commentRepository)
    {
        $this->postRepository = $postRepository;
        $this->commentRepository = $commentRepository;

    }

    public function getAllPosts()
    {
        return $this->postRepository->getAll();
    }
    public function getPostById($id)
    {
        return $this->postRepository->getById($id);
    }

    public function validatePost($title, $content, $image)
    {

        $errors = [];

        $result = ValidationHelper::validateTitle($title);
        if ($result !== '') {
            $errors['title'] = $result;
        }

        $result = ValidationHelper::validateDescription($content);
        if ($result !== '') {
            $errors['content'] = $result;
        }

        if ($image) {
            $result = ValidationHelper::validateImage($image);
            if ($result !== '') {
                $errors['image'] = $result;
            }
        }
        return $errors;
    }



    public function createPost($title, $content, $image)
    {
        $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        $imageName = uniqid() . '.' . $extension;

        $this->storeImage($image, $imageName);

        $post = new PostModel($title, $content, $_SESSION['id'], $imageName);
     
        $this->postRepository->save($post);
        return $post;
    }

    public function updatePost($id, $title, $content, $image)
    {
        $post = $this->postRepository->getById($id);
        if (!$post) {
            handleException('Post not found');
        }
        if ($image) {
            $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
            $imageName = uniqid() . '.' . $extension;

            $this->storeImage($image, $imageName);
            $post->setImage($imageName);
        }
        $post->setTitle($title);
        $post->setContent($content);

        $this->postRepository->update($post);
        return $post;
    }

    public function deletePost($id)
    {
        $post = $this->postRepository->getById($id);
        if (!$post) {
            handleException('Post not found');
        }
        $this->removeImage($post->getImage());
        $this->postRepository->delete($post->getId());
    }

    private function storeImage($image, $name)
    {
        $upload_dir = __DIR__ . '/../../uploads/posts/';
        $image_path = $upload_dir . $name;
        move_uploaded_file($image['tmp_name'], $image_path);
    }
    private function removeImage($imageName)
    {
        $image_path = __DIR__ . '/../../uploads/posts/' . $imageName;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
    }

}