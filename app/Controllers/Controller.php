<?php

namespace App\Controllers;

use Database\DBConnection;

abstract class Controller {

    protected $db;

    public function __construct(DBConnection $db)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->db = $db;
    }

    protected function view(string $path, array $params = null,string $layout = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        $content = ob_get_clean();
        require VIEWS . $layout .'.php';
    }

    protected function getDB()
    {
        return $this->db;
    }

    protected function isAdmin()
    {
        if (isset($_SESSION['auth']) && $_SESSION['auth'] == 'admin') {
            return true;
        } else {
            return false; 
        }
    }
    
    protected function isAuth() {
        if(isset($_SESSION['authenticated'])) {
            return true; 
        } else {
            return false; 
        }
    }
}
