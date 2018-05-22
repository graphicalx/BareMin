<?php

namespace App\Controller;

use App\Model\SampleModel;

class SampleController
{
    public function welcome()
    {
        $data = SampleModel::getMyData();

        include 'views/sampleView.php';
    }

    public function dashboard()
    {
        if (empty($_SESSION['user'])) {
            header('Location: login');
            exit;
        }

        echo 'Welcome, you\'re logged in';
    }
}