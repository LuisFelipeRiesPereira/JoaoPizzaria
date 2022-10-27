<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {

        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);

        $servername = "localhost";
        $database = "cash_book";
        $username = "root";
        $password = "";
        
        $conexao = mysqli_connect($servername, $username, $password, $database);

        $sql="SELECT date, value, type FROM moviment m";
        $retorno = mysqli_query($conexao, $sql);

        
        $data = [
            'title' => 'Dashboard',
            'userInfo' => $userInfo,
            'retorno' => $retorno
        ];

        return view('dashboard/index', $data);
    }
}
