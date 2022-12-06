<?php
if(session()->has('loggedInUser'))
	$this->extend('layouts/logged_layout');
else{
	$this->extend('layouts/main_layout');
}
?>

<?= $this->section('adminHome') ?>

<div class="container" style="margin-top: 9vh;">
<table class="table table-hover" style="border-left: solid; border-left-color: #212529; border-right: solid; border-right-color: #212529; border-bottom: solid; border-bottom-color: #212529;">
<tr class="table-dark">
        <th>N°</th>
        <th>Cliente</th>
        <th>Sabor1</th>
        <th>Sabor2</th>
        <th>Sabor3</th>
        <th>Massa</th>
        <th>Borda</th>
        <th>Status</th>
        <th>Controle</th>
    </tr>
    <?php 
    use App\Models\FlavorModel;
    use App\Models\UserModel;
    use App\Models\OrdersModel;
    use App\Models\EdgeModel;
    use App\Models\DoughModel;

    $this->userModel = new UserModel();
    $this->ordersModel = new OrdersModel();
    $this->flavorModel = new FlavorModel();
    $this->edgeModel = new EdgeModel();
    $this->doughModel = new DoughModel();
    

     foreach($orderArray as $orderArray): 


     ?>
        <tr >
            <td><?=  $orderArray['id'] ?></td>
            <td><?=  $name = $this->userModel->find($orderArray['user_id'])['name'] ?></td>
            <td><?=  $flavor = $this->flavorModel->find($orderArray['flavor_id'])['name']?></td>
            <td><?= $flavor1 = $this->flavorModel->find($orderArray['flavor_id1'])['name'] ?></td>
            <td><?= $flavor2 = $this->flavorModel->find($orderArray['flavor_id2'])['name'] ?></td>
            <td><?= $dough = $this->doughModel->find($orderArray['dough_id'])['name'] ?></td>
            <td><?= $edge = $this->edgeModel->find($orderArray['edge_id'])['name'] ?></td>
            <td><?= $orderArray['status'] ?></td>
            <td>
                <form action = "<?= site_url('buttons')?>/<?=$orderArray['id']?>" method="post">
            <input type="submit" name="start" value="Em produção" />
            <input type="submit" name="ready" value="Pronto" />
            <input type="submit" name="done" value="Concluido" />
        </form>
            </td>
        </tr>
    <?php
endforeach; ?>
    </table>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script> 
		var orders = JSON.parse('<?= json_encode($fullArray); ?>'); 
	</script>
	<script src="<?php echo base_url() ?>/app/Views/adminHome/script.js"></script>
	<div id="piechart" style="width: 80vw; height: 25vw;"></div>
</div>




<?= $this->endSection() ?>