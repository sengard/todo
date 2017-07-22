<?php

namespace App\Core\Database;

use App\Controllers\UsersController;
use PDO;

class QueryBuilder
{
    /**
     * The PDO instance.
     *
     * @var PDO
     */
    protected $pdo;

    /**
     * Create a new QueryBuilder instance.
     *
     * @param PDO $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Select all records from a database table.
     *
     * @param string $table
     */
    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Select all records from tasks and make joints.
     */
    public function getTasks()
    {
        $statement = $this->pdo->prepare("SELECT  
            tasks.id, 
            tasks.description, 
            tasks.name, 
            tasks.email, 
            images.file 
            FROM tasks 
            INNER JOIN images ON  tasks.id = images.task_id
           ;");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_GROUP|PDO::FETCH_ASSOC);
    }

    /**
     * Insert a record into a table.
     *
     * @param  string $table
     * @param  array  $parameters
     */
    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);

            return $this->pdo->lastInsertId();
             
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * select a User.
     *
     * @param  string $table
     * @param  array  $parameters
     */
    public function getUser()
    {
        if(!isset($_COOKIE[UsersController::COOKIE_NAME])) {
            return false;
        } 
        try {
            $statement = $this->pdo->prepare("select * from users where password = '{$_COOKIE[UsersController::COOKIE_NAME]}'");
           
            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_ASSOC)[0];
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * login user (creates a session .
     *
     * @param  array  $parameters
     */
    public function login($parameters)
    {
        
        try {
            $statement = $this->pdo->prepare("select * from users where name = '{$parameters['name']}'");
           
             $statement->execute();

            $users = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($users as $user){
                if (password_verify($parameters['password'], $user['password'])) {
                    setcookie(UsersController::COOKIE_NAME, $user['password'], time() + (86400 * 30), "/");
                    setcookie(UsersController::COOKIE_USER_NAME, $user['name'], time() + (86400 * 30), "/");

                    return redirect('users');
                } else {
                    throw new \Exception("User not found");
                }
            }
            throw new \Exception("User not found");
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
