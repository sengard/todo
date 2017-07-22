<?php

namespace App\Controllers;


use App\Controllers\UsersController;
use App\Core\App;
use App\Core\Database\{QueryBuilder, Connection};
use App\Image\SaveImageToDisc;


class TasksController
{
    /**
     * Show all tasks.
     */
    public function index()
    {
        $tasks = App::get('database')->getTasks();
        
        return view('tasks', compact('tasks'));
    }

    /**
     * Store a new task with image.
     */
    public function store()
    {
        if($_POST['description'] === ""){
            throw new \Exception('Описание задания не должно быть путым');
        }

        $user = App::get('database')->getUser();

        if (isset($_COOKIE[UsersController::COOKIE_NAME])){
           $parantId = App::get('database')->insert('tasks', [
                'description' => $_POST['description'],
                'name' => $user['name'],
                'email' => $user['email'],
            ]);
        } else {
            $parantId = App::get('database')->insert('tasks', [
                'description' => $_POST['description'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
            ]);
        }
        

        $file_ary = $this->reArrayFiles($_FILES['img']);

        //for now only with pictures 
        //@todo implement without pic
        //if($file_ary[0]['size'] != 0){
        foreach($file_ary  as $file){
            // save image to disk
            $fileName = SaveImageToDisc::savePicture($file);

            //save image to db
            App::get('database')->insert('images', [
                'task_id' => $parantId,
                'file' => $fileName
            ]);

        }
        //}

        return redirect('tasks');
    }

    /**
     * Shuffle an array 
     *
     *@param  array  $file_post
     */
    function reArrayFiles($file_post) {
        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }
}