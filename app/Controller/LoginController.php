<?php

namespace App\Controller;

use Config\App;

class LoginController {

    public function showLogin()
    {

        $this->unsetSessionVariables();

        $title = 'Login';

        include 'views/layout.php';
        include 'views/showLogin.php';
    }

    public function doLogin()
    {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            header('Location: login');
            exit;
        }

        if (!empty(App::$access[$_POST['username']]) && App::$access[$_POST['username']] == $_POST['password']) {
            $_SESSION['user'] = $_POST['username'];
            header('Location: dashboard');
            exit;
        }

        header('Location: login');
        exit;
    }

    public function logout()
    {
        $this->unsetSessionVariables();

        header('Location: login');
        exit;
    }

    private function unsetSessionVariables()
    {
        unset($_SESSION['user']);
    }

}