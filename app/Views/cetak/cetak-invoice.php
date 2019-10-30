<?php
$total = 0;
?>
<html>
<head>
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/dist/css/bootstrap.min.css')?>" />
</head>
<style type="text/css">
table,
th,
td {
	border: 1px solid black;
}

tbody,
td {
	padding: 5px 12px;
	height: 30px;
	border-bottom: 1px #bfbfbf solid;
}

tfoot,
th {
	height: 30px;
}

table thead tr th {
	text-align: center;
	height: 30px;
}

.header-form {
	justify-content: center;

}

.header-form:last-child {
	border-left: 0;
}

.header-form:last-child {
	display: flex;
	align-items: center;
	justify-content: center;
	font-size: 16px;
	font-weight: 600;
	width: 88%;
}

.form-date {
	background: #ccccff;
	height: 25px;
	margin-top: 1em;
	padding: 0;
}

.date {
	font-size: 12px;
	line-height: 2.1;
	width: 10%;
}

.date:after {
	content: ":";
	float: right;
}

.column-kasbon:first-child {
	width: 4%;
}

.column-kasbon:nth-child(2) {
	width: 15%;
}

.column-kasbon:nth-child(3) {
	width: 20%;
}

.column-kasbon:nth-child(4) {
	width: 5%;
}
.column-kasbon:nth-child(5) {
	width: 5%;
}
.column-kasbon:nth-child(6) {
	width: 15%;
}

.column-nominal {
	text-align: right;
    padding-right: 10px;
}

.ttd-group {
	margin-top: 4em;
}

.title-ttd {
	line-height: 0.5;
	font-size: 12px;
	font-weight: normal;
}

.ttd-person {
	text-decoration: underline;
	font-weight: bold;
	font-size: 12px;
	padding-top: 4em;
}

.body-kasbon {
	margin-left: 0;
	margin-right: 0;
}

.card-kasbon {
	padding-top: 2em;
}
.first-column {
	border-left: 1px white solid;
	border-right: 1px white solid;
	height: 15px;
}
.image-exel-header{
	width: 80%;
	height: 100%;
}
</style>
<div class="content-wrapper">
	<div class="card card-kasbon">
		<div class="container">
			<div class="row body-kasbon">
				<div class="col-lg-12 header-form">INVOICE</div>
			</div>
			<div class="row body-kasbon">
				<div class="col-xl-6">
					<h7>KODE TRANSAKSI&ensp;&ensp;: <?php  echo $transaksi->no_transaksi; ?><h7>
				</div>
				<div class="col-xl-6">
					<h7>TANGGAL&ensp;&ensp;: <?php  echo $transaksi->tanggal; ?></h7>
				</div>
				<div class="col-xl-6">
					<h7>NAMA&ensp;&ensp;: <?php  echo $transaksi->nama_pembeli; ?></h7>
				</div>
				<div class="col-xl-6">
					<h7>TELPON&ensp;&ensp;: <?php  echo $transaksi->telp; ?></h7>
				</div>
			</div>
			<p></p>
			<table width="100%">
				<thead>
					<th class="column-kasbon">No.</th>
					<th class="column-kasbon">Kode Item</th>
					<th class="column-kasbon">Nama Item</th>
					<th class="column-kasbon">Harga</th>
					<th class="column-kasbon">Jumlah</th>
					<th class="column-kasbon">Total</th>
				</thead>
				<tbody>
					<tr>
						<td colspan="11" class="first-column"></td>
					</tr>
					<?php
					$no = 1;
					foreach ($detail as $key => $value) {
						echo '<tr>
						<td>'.$no.'</td>
						<td>'.$value->kode.'</td>
						<td>'.$value->nama.'</td>
						<td>'.$value->harga.'</td>
						<td>'.$value->jumlah.'</td>
						<td class="column-nominal">'.number_format($value->total).'</td>
						</tr>';
						$no++;
					}
					?>
					<tr>
						<td colspan="11" class="first-column"></td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="5" class="text-center">TOTAL</th>
						<th class="column-nominal"><?php echo $transaksi->total;?></th>
					</tr>
				</tfoot>                
			</table>
			<div class="row">
				<div class="col-xl-12">
					<!-- <div class="ttd-group">
						<p class="title-ttd">Prepare by :
						</p>
						<p class="title-ttd">Personalia & Payroll staff</p>
						<p class="ttd-person">Bagus Setyo Wibowo</p>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    // window.print();
</script>