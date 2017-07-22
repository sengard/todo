<?php

namespace App\Controllers;

use App\Core\App;

class UsersController
{

    const COOKIE_NAME = 'todo_user_token';
    const COOKIE_USER_NAME = 'todo_user_name';

    /**
     * Show all users.
     */
    public function index()
    {
        $users = App::get('database')->selectAll('users');

        return view('users', compact('users'));
    }

    /**
     * Store a new user in the database.
     */
    public function store()
    {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        App::get('database')->insert('users', [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $password
        ]);

        setcookie(self::COOKIE_NAME, $password, time() + (86400 * 30), "/"); 
        setcookie(self::COOKIE_USER_NAME, $_POST['name'], time() + (86400 * 30), "/");

        return redirect('users');
    }

    /**
     * show login page
     */
    public function loginShow()
    {
        return view('login');
    }

    /**
     * submit login post
     */
    public function loginPost()
    {
       $users = App::get('database')->login([
            'name' => $_POST['name'],
            'password' => $_POST['password'],
        ]);
       return redirect('tasks');
    }

    /**
     * logout user
     */
    public function logout()
    {
        setcookie(self::COOKIE_NAME, "", time() - 3600);
        
        return redirect('users');
    }
}
