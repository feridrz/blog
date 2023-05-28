<?php
namespace App\controllers;
use App\core\Controller;
use App\interfaces\IPostService;
use App\repositories\PostRepository;
use App\services\PostService;
class PostController extends Controller
{

    private $service;

    public function __construct(PostService $service)
    {
        hasAccess();
        $this->service = $service;
    }

    public function index()
    {
        hasAccess();
        $posts = $this->service->getAllPosts();

        view('home', ['posts' => $posts]);
    }

    public function create()
    {
        view('create_post');
    }

    public function store()
    {
        $title = $_POST['title'] ? htmlspecialchars($_POST['title'], ENT_QUOTES | ENT_HTML5, 'UTF-8') : null;
        $content = $_POST['text'] ? htmlspecialchars($_POST['text'], ENT_QUOTES | ENT_HTML5, 'UTF-8') : null;
        $image = $_FILES['image'] ?? null;

        $errors = $this->service->validatePost($title, $content, $image);
        if (!empty($errors)) {
            $_SESSION['error_message'] = $errors;
            redirect('/create-post');
        }

        try {
            $this->service->createPost($title, $content, $image);
            $_SESSION['success_message'] = "Post created successfully";
            redirect(self::HOME);
        } catch (\Exception $e) {
            handleException($e);
        }
    }

    public function update()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $image = (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) ? $_FILES['image'] : null;

        $errors = $this->service->validatePost($title, $content, $image);

        if (!empty($errors)) {
            $_SESSION['error_message'] = $errors;
            redirect("/edit-post/$id");
        }

        try {
            $this->service->updatePost($id, $title, $content, $image);
            $_SESSION['success_message'] = "Post updated successfully";
            redirect(self::HOME);
        } catch (\Exception $e) {
            handleException($e);
        }
    }

    public function delete($id)
    {
        try {
            $this->service->deletePost($id);
            $_SESSION['success_message'] = "Post deleted successfully";
            redirect(self::HOME);
        } catch (\Exception $e) {
            handleException($e);
        }

    }

    public function edit($id) {
        $post = $this->service->getPostById($id);
        if (!$post) {
            sendResponse(404, "Not Found", "/");
        }
        view('post_edit', compact('post'));
    }


}