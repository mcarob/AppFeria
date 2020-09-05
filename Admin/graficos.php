<?php
session_start();
if (!isset($_SESSION['user'])) {

	header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 4)) {
	header("location: index.php");
}

?>


<?php
include('Header.php');
include('menuAdmi.php');

?>
<div class="content-wrapper">
	<div class="content">
		<div class="row">
			<div class="col-12">
				<div class="card card-default">
					<div class="card-header justify-content-center">
						<h2 class="text-center">Inscripciones de estudiantes por mes</h2>
					</div>
					<div class="card-body" style="height: 450px;">
						<canvas id="linechart" class="chartjs"></canvas>
					</div>
				</div>
			</div>


			<div class="col-12 col-lg-6">
				<div class="card card-default">
					<div class="card-header justify-content-center">
						<h2 class="text-center">Product Line Chart</h2>
					</div>
					<div class="card-body">
						<canvas id="activity"></canvas>
					</div>
				</div>
			</div>

			<div class="col-12 col-lg-6">
				<div class="card card-default">
					<div class="card-header justify-content-center">
						<h2 class="text-center"></h2>
					</div>
					<div class="card-body" style="height: 400px;">
						<canvas id="deviceChart"></canvas>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-6">
				<div class="card card-default">
					<div class="card-header justify-content-center">
						<h2 class="text-center">Polar Chart</h2>
					</div>
					<div class="card-body" style="height: 400px;">
						<canvas id="polar"></canvas>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-6">
				<div class="card card-default">
					<div class="card-header justify-content-center">
						<h2 class="text-center">Radar Chart</h2>
					</div>
					<div class="card-body" style="height: 400px;">
						<canvas id="radar"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div class="right-sidebar-2">
		<div class="right-sidebar-container-2">
			<div class="slim-scroll-right-sidebar-2">

				<div class="right-sidebar-2-header">
					<h2>Layout Settings</h2>
					<p>User Interface Settings</p>
					<div class="btn-close-right-sidebar-2">
						<i class="mdi mdi-window-close"></i>
					</div>
				</div>

				<div class="right-sidebar-2-body">
					<span class="right-sidebar-2-subtitle">Header Layout</span>
					<div class="no-col-space">
						<a href="javascript:void(0);" class="btn-right-sidebar-2 header-fixed-to btn-right-sidebar-2-active">Fixed</a>
						<a href="javascript:void(0);" class="btn-right-sidebar-2 header-static-to">Static</a>
					</div>

					<span class="right-sidebar-2-subtitle">Sidebar Layout</span>
					<div class="no-col-space">
						<select class="right-sidebar-2-select" id="sidebar-option-select">
							<option value="sidebar-fixed">Fixed Default</option>
							<option value="sidebar-fixed-minified">Fixed Minified</option>
							<option value="sidebar-fixed-offcanvas">Fixed Offcanvas</option>
							<option value="sidebar-static">Static Default</option>
							<option value="sidebar-static-minified">Static Minified</option>
							<option value="sidebar-static-offcanvas">Static Offcanvas</option>
						</select>
					</div>

				</div>
			</div>
		</div>
	</div>
	<script src="../assets/plugins/jquery/jquery.min.js"></script>
	<script src="../assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
	<script src="../assets/plugins/jekyll-search.min.js"></script>



	<script src="../assets/plugins/charts/Chart.min.js"></script>



	<script src="../    assets/js/sleek.bundle.js"></script>

	<?php

	include('Footer.php')

	?>