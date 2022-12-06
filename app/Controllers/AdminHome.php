<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\OrdersModel;
use App\Models\EdgeModel;
use App\Models\FlavorModel;
use App\Models\DoughModel;
use CodeIgniter\Database\Query;

class AdminHome extends BaseController
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
        $db = db_connect();
        
        $query1 = $db->query("SELECT DISTINCT count(*)  as total , flavor.name as name  from orders JOIN flavor WHERE orders.flavor_id1 = flavor.id group by orders.flavor_id1;")->getResult();
        $query2 = $db->query("SELECT count(*) as total, flavor.name as name from orders JOIN flavor WHERE orders.flavor_id2 = flavor.id group by orders.flavor_id2;")->getResult();
        
        $db->close();
        
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);


        $flavorArray = $this->flavorModel->findAll();
        $orderFlavors = [];
        $ordersArray = $this->ordersModel->findAll();
        
        
        foreach($flavorArray as $i => $flavorItem){
            $orderFlavors[$i] = ['name' => $flavorItem['name'], 'total' => 0,];
            $count = 0;
            foreach($ordersArray as $j => $orderItem){
                if($flavorItem['id']==$orderItem['flavor_id']){
                    $count++;
                }
                if($flavorItem['id']==$orderItem['flavor_id1']){
                    $count++;
                }
                if($flavorItem['id']==$orderItem['flavor_id2']){
                    $count++;
                }
                
            }
            $orderFlavors[$i]['total'] = $count;
        }


        $data = [
            'title' => 'adminHome',
            'userInfo' => $userInfo,
            'orderArray' => $this->ordersModel->findAll(),
            'flavorArray' => $this->flavorModel->findAll(),
            'edgeArray' => $this->edgeModel->findAll(),
            'doughArray' => $this->doughModel->findAll(),
            'fullArray' => $orderFlavors,
        ];

        return view('adminHome/index', $data);
    }
    public function buttons()
    {
        $uri = current_url(true);
        $post = $_POST;
        var_dump($post);
        if (reset($post) == 'Pronto') {

            $orderArray = $uri->getSegment(4);
            var_dump($orderArray);

            $this->ordersModel->set('status', 'Pronto');
            $this->ordersModel->where('id', $orderArray);
            $this->ordersModel->update();

            return redirect()->back();
        } else if (reset($post) == 'Concluido') {

            $orderArray = $uri->getSegment(4);
            var_dump($orderArray);

            $this->ordersModel->set('status', 'Concluido');
            $this->ordersModel->where('id', $orderArray);
            $this->ordersModel->update();

            return redirect()->back();
        } else if (reset($post) == 'Em produção') {

            $orderArray = $uri->getSegment(4);
            var_dump($orderArray);

            $this->ordersModel->set('status', 'Em produção');
            $this->ordersModel->where('id', $orderArray);
            $this->ordersModel->update();

            return redirect()->back();
        }
    }




}