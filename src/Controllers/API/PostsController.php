<?php

namespace App\Controllers\API;

use App\Models\Post;
use App\Controllers\Controller;

class PostsController extends Controller
{
    /**
     * Data access layer
     * 
     * @var \App\Models\Post 
     */ 
    private Post $postModel;

    /**
     * Initiates PostsController constructor method
     * 
     * @return void 
     */ 
    public function __construct()
    {
        parent::__construct();
        $this->postModel = new Post();
    }

    /**
     * Returns all posts from data with 
     * all fields. Posts have to be returned in JSON
     * format and if table is empty will be returned
     * error message
     * 
     * @return void 
     */ 
    public function all()
    {
        $posts = $this->postModel->getPosts();

        if (empty($posts)) {
            return $this->render('api/posts');
        }

        return $this->render('api/posts', compact('posts'));
    }

    /**
     * Finds unique post in database by specified
     * id and returns preview_text, title, body, created_at,
     * id and author username table rows
     * 
     * @param int $id
     * @return void 
     */ 
    public function getPostById(int $id)
    {
        $post = $this->postModel->getPostById($id);

        if (empty($post)) {
            return $this->render('api/post');
        }

        return $this->render('api/post', compact('post'));
    }

    /**
     * Updates post by unique id field. 
     * Edits only title, preview_text and body posts table
     * rows and returns status if post was edited successfully
     * 
     * @return void
     */ 
    public function edit()
    {
        $request = $this->getRequest();

        if (!$request->isMethod('POST')) {
            return $this->render('api/edit_post');
        }

        if (!$this->postModel->editPost($request->all())) {
            return $this->render('api/edit_post');
        }

        $status = "Post with id {$request->post('id')} was edited";

        return $this->render('api/edit_post', compact('status'));
    }
}
