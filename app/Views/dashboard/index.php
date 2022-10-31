<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('dashboard') ?>

<div class="wrap">
	<h1>Dashboard</h1>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script> 
		var moviments = JSON.parse('<?= json_encode($fullArray); ?>'); 
		var inputArray = JSON.parse('<?= json_encode($inputArray); ?>'); 
		var outputArray = JSON.parse('<?= json_encode($outputArray); ?>'); 
	</script>
	<script src="<?php echo base_url() ?>/app/Views/dashboard/script.js"></script>
    <div id="curve_chart" style="width: 97vw; height: 30vw"></div>
	<div id="piechart" style="width: 97vw; height: 30vw;"></div>
</div>
<?= $this->endSection() ?>