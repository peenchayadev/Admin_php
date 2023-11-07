<?php 
    /**
     * Dashboard Page
     * 
     */
    require_once('../authen.php'); 
    /**
    |--------------------------------------------------------------------------
    | ดึงข้อมูลจากฐานข้อมูล Sales Report
    |--------------------------------------------------------------------------
    */
    $response = [
        'status' => true,
        'response' => [
            'label' => 'ออกรายงาน',
            'labels' => ['01', '02', '03', '04', '05', '06', '07','08', '09', '10', '11', '12'], 
            'results' => [2000, 1300, 1800, 1000, 1500, 2600, 3250, 2000, 1300, 4100, 1000, 1500]
        ],
        'message' => 'OK'
    ];
    
    $response_json = json_encode($response);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>หน้าหลัก | PeenchayaDev</title>
  <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon.ico">
  <!-- stylesheet -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../assets/css/adminlte.min.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include_once('../includes/sidebar.php') ?>
    <div class="content-wrapper pt-3">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info shadow">
                            <div class="inner text-center">
                                <h1 class="py-3">&nbsp;ผู้ดูแลระบบ&nbsp;</h1>
                            </div>
                            <a href="../manager/" class="small-box-footer py-3"> คลิกจัดการระบบ <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-primary shadow">
                            <div class="inner text-center">
                                <h1 class="py-3">จัดการเมนู</h1>
                            </div>
                            <a href="#" class="small-box-footer py-3"> คลิกจัดการระบบ <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success shadow">
                            <div class="inner text-center">
                                <h1 class="py-3">จัดการเมนู</h1>
                            </div>
                            <a href="#" class="small-box-footer py-3"> คลิกจัดการระบบ <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info shadow">
                            <div class="inner text-center">
                                <h1 class="py-3">จัดการเมนู</h1>
                            </div>
                            <a href="#" class="small-box-footer py-3"> คลิกจัดการระบบ <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="small-box py-3 bg-white shadow">
                            <div class="inner">
                                <h3>9,999 รายการ</h3>
                                <p class="text-danger">Report 1</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="small-box py-3 bg-white shadow">
                            <div class="inner">
                                <h3>9,999 รายการ</h3>
                                <p class="text-danger">Report 2</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="small-box py-3 bg-white shadow">
                            <div class="inner">
                                <h3>9,999 รายการ</h3>
                                <p class="text-danger">Report 3</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="small-box py-3 bg-white shadow">
                            <div class="inner">
                                <h3>9,999 รายการ</h3>
                                <p class="text-danger">Report 4</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-xl">฿9,999</span>
                                        <span class="text-danger">Sales Report</span>
                                    </p>
                                </div>
                                <div class="position-relative">
                                    <canvas id="chart" height="350"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('../includes/footer.php') ?>
</div>


<!-- SCRIPTS -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/adminlte.min.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<script>
    $(function () {  
        function renderChart(chartType = 'bar') {
            var data = JSON.parse('<?php echo $response_json ?>');
            var label = data.response.label;
            var myChart = new Chart($('#chart'), {
                type: chartType,
                data: {
                    labels: data.response.labels,
                    datasets: [{
                        label: label,
                        data: data.response.results,
                        backgroundColor: '#007bff88',
                        borderColor: '#007bff',
                        borderWidth: 3,
                        datalabels: {
                            align: 'end',
                            anchor: 'end'
                        },
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    layout: {
                        padding: {
                            top: 32,
                            right: 20,
                            bottom: 0,
                            left: 8
                        }
                    },
                    legend: {
                        display: false //ทำให้ป้ายหัวข้อหาย
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: true,
                            },
                            ticks: {
                                beginAtZero: true
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                display: true
                            }
                        }]
                    }
                }
            })
        }
        renderChart('bar')
    })

</script>
</body>
</html>
