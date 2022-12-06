<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\OrdersModel;
use App\Models\EdgeModel;
use App\Models\FlavorModel;
use App\Models\DoughModel;

class ClientHome extends BaseController
{

    public function __construct()
    {
        $this->ordersModel = new OrdersModel();
        $this->flavorModel = new FlavorModel();
        $this->edgeModel = new EdgeModel();
        $this->doughModel = new DoughModel();
    }

    public function index()
    {
        $userModel = new UserModel();


        if (session()->has('loggedInUser')) {
            $loggedInUserId = session()->get('loggedInUser');
            $userInfo = $userModel->find($loggedInUserId);
            if ($userInfo['type'] == 'client') {


                $data = [
                    'title' => 'ClientHome',
                    'userInfo' => $userInfo,
                    'orderArray' => $this->ordersModel->findAll(),
                    'flavorArray' => $this->flavorModel->findAll(),
                    'edgeArray' => $this->edgeModel->findAll(),
                    'doughArray' => $this->doughModel->findAll(),
                ];

                return view('clientHome/index', $data);
            } else {
                return redirect()->to('admin');
            }
        } else {
            $data = [
                'orderArray' => $this->ordersModel->findAll(),
                'flavorArray' => $this->flavorModel->findAll(),
                'edgeArray' => $this->edgeModel->findAll(),
                'doughArray' => $this->doughModel->findAll(),
            ];
            return view('clientHome/index', $data);
        }
    }
    public function create()
    {
        if (session()->has('loggedInUser')) {


            $loggedInUserId = session()->get('loggedInUser');
            $userModel = new \App\Models\UserModel();
            $userInfoId = $userModel->find($loggedInUserId);

            $flavor = $this->request->getPost('flavor');
            $flavor1 = $this->request->getPost('flavor1');
            $flavor2 = $this->request->getPost('flavor2');
            $edge = $this->request->getPost('edge');
            $dough = $this->request->getPost('dough');

            $idFlavor = $this->flavorModel->where('name', $flavor)->findAll();
            $idFlavor1 = $this->flavorModel->where('name', $flavor1)->findAll();
            $idFlavor2 = $this->flavorModel->where('name', $flavor2)->findAll();
            $idEdge = $this->edgeModel->where('name', $edge)->findAll();
            $idDough = $this->doughModel->where('name', $dough)->findAll();

            $data = [
                'user_id' => $userInfoId['id'],
                'flavor_id' => $idFlavor[0]['id'],
                'edge_id' => $idEdge[0]['id'],
                'dough_id' => $idDough[0]['id'],
                'flavor_id1' => $idFlavor1[0]['id'],
                'flavor_id2' => $idFlavor2[0]['id'],
                'status' => "Pedido",
            ];

            $ordersModel = new \App\Models\OrdersModel();
            $query = $ordersModel->insert($data);

            if (!$query) {
                return redirect()->back()->with('fail', 'n funfo');
            } else {
                return redirect()->back()->with('success', 'funfo');
            }

        } else {
            return redirect()->to('auth')->with(
                'fail',
                'Você precisa estar logado para realizar tal ação'
            );
        }


    }
    public function orderStatus(){
        $loggedInUserId = session()->get('loggedInUser');
        $status = $this->ordersModel->where('user_id', $loggedInUserId)->findAll();
        header('Content-Type: application/json');
        return $this->response->setJSON($status);
        
        


    }
}