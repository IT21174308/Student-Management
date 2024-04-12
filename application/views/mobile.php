<!DOCTYPE HTML>
<html>
<head>

<script src="<?=base_url()?>media/js/dist/Chart.bundle.js"></script>
<script src="<?=base_url()?>media/js/utils.js"></script>
<?
// $this->load->view("includes/header_".$this->session->userdata('usermodule'));
// $this->load->view("includes/topbar_notsearch");
// ?>


<style type="text/css">

button{
    margin-left: 45%;
        margin-bottom: 20px;
        padding: 14px 15px 10px 15px;
        border-radius: 50%; /* Add this line to make the buttons circular */
        width: 150px; /* Set a fixed width to ensure circular shape */
        height: 150px; /* Set a fixed height to ensure circular shape */
        display: flex;
        align-items: center;
        justify-content: center;

}

@media(max-width:1920px){
	.topup{
	margin-top:0px;
}
}
@media(max-width:360px){
	.topup{
	margin-top:0px;
}
}
@media(max-width:790px){
	.topup{
	margin-top:100px;
}
}
@media(max-width:768px){
	.topup{
	margin-top:-10px;
}
}
</style> 

<div id="page-wrapper" >
	<div class="main-page container-fluid" >
        <!-- Begin Page Content -->

          <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h6 class="mb-4 p-3 db-topic bg-cyan-900 text-uppercase">Mark On Location Attendance</h6>
</div>

          <!-- Content Row -->
<div class="row">
         
<div class="button">
               
<button type="button" id="btnCheckIn" class="btn1 mb-4 p-3 db-topic bg-green-400 text-uppercase">Check In</button> <br>
                    <button type="button" id="btnCheckOut" class="btn2 mb-4 p-3 db-topic bg-red-400 text-uppercase">Check Out</button>
                </div>
          </div>
     </div>
    
</div>
      <!-- End of Main Content -->
 <link href="<?=base_url()?>media/css/sb-admin-2.css" rel="stylesheet">
  <!-- Core plugin JavaScript-->
  <script src="<?=base_url()?>media/js/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url()?>media/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?=base_url()?>media/js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=base_url()?>media/js/chart-area-demo.js"></script>
  <script>
	  // Set new default font family and font color to mimic Bootstrap's default styling
	  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
	  Chart.defaults.global.defaultFontColor = '#858796';
	  
	  // Pie Chart Example
	  var ctx = document.getElementById("myPieChart");
	  var myPieChart = new Chart(ctx, {
		type: 'doughnut',
		data: {
		  labels: ["Completed", "Ongoing", "Pending", "Expired"],
		  datasets: [{
			data: [<?=$completed?>, <?=$ongoing?>, <?=$pending?>,<?=$expired?>],
			backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#666666'],
			hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#333333'],
			hoverBorderColor: "rgba(234, 236, 244, 1)",
		  }],
		},
		options: {
		  maintainAspectRatio: false,
		  tooltips: {
			backgroundColor: "rgb(255,255,255)",
			bodyFontColor: "#858796",
			borderColor: '#dddfeb',
			borderWidth: 1,
			xPadding: 15,
			yPadding: 15,
			displayColors: false,
			caretPadding: 10,
		  },
		  legend: {
			display: false
		  },
		  cutoutPercentage: 80,
		},
	  });
  </script>
  
  <script>
        $(document).ready(function () {
            $("#btnCheckIn").click(function () {
                markAttendance('mark_in');
            });
            $("#btnCheckOut").click(function () {
                markAttendance('mark_out');
            });

            function markAttendance(type) {
                $.ajax({
                    url: 'your_controller_path/mark_attendance',
                    type: 'GET',
                    data: {
                        user_id: '<?= $user_id ?>',
                        meta: '{"type":"' + type + '"}',
                    },
                    success: function (response) {
                        var result = JSON.parse(response);
                        if (result.status) {
                            alert(result.message);
                            // Optionally, you can update the UI or perform additional actions upon success
                        } else {
                            alert(result.message);
                        }
                    },
                    error: function () {
                        alert('Error occurred during the AJAX request.');
                    }
                });
            }
        });
    </script>
<!--footer-->
<?
	$this->load->view("includes/footer");
?>
