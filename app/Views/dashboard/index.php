<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('dashboard') ?>

<?php 
    while($item = mysqli_fetch_array($retorno)){
        $data[] = $item;
    }
?>

<div class="wrap">
	<h1>Dashboard</h1>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script> var moviments = JSON.parse('<?= json_encode($data); ?>'); </script>
	<script src="<?php echo base_url() ?>/app/Views/dashboard/script.js"></script>
	<?php
		$dataForm = array_column($data, 'date');
		foreach ($dataForm as $dataExplode) {
			$dataExplode = str_replace('-', ', ', $dataExplode);
		}
	?>
	<script> var dataPronta = JSON.parse('<?= json_encode($dataExplode); ?>'); </script>
	<script src="<?php echo base_url() ?>/app/Views/dashboard/painel.js"></script>
    <div id="curve_chart" style="width: 99%; height: 550px"></div>
	<div id="registroTipo" style="height: 500px;"></div>
</div>
<?= $this->endSection() ?>