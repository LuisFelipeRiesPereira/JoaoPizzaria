<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdersModel;
use App\Models\UserModel;

class Orders extends BaseController
{

    private $ordersModel;

    public function __construct()
    {
        $this->ordersModel = new OrdersModel();
    }

    //
    public function index()
    {
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);
        $dados = [
            'title' => 'Orders',
            'userInfo' => $userInfo,
            'orders' => $this->ordersModel->orderBy('id', 'DESC')->findAll()
        ];


        return view('moviments/index', $dados);
    }

    public function getDelete($id) {
        if($this->ordersModel->delete($id)) {
            echo view('messages', [
                'message' => 'Movimento excluído com sucesso'
            ]);
        } else {
            echo 'erro.';
        }
    }

    public function create() {
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);

        $dados = [
            'title' => 'New moviment',
            'userInfo' => $userInfo,

        ];

        return view('moviments/form', $dados);
    }

    public function store(){
        $params = [
            'description' => $this->request->getPost('dscription'),
            'value' => $this->request->getPost('value'),
            'type' => $this->request->getPost('type'),
            'user_id' => session()->get('loggedInUser')
        ];

        $db = db_connect();
        $db->query("INSERT INTO moviment VALUES (DEFAULT, :description:, NOW(), :value:, :type:, :user_id:)", $params);
        $db->close();

        return $this->response->redirect(site_url('moviment'));
    }

}
