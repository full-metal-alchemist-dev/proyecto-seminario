<?php require_once 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'main/head.php'; ?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">




    <?php require_once 'main/sidebar.php'; ?>

    <div class="content-wrapper">

      <!-- <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?php echo $moduloName; ?></h1>
              <div class="form-check form-check-inline">
                <label for="checkbox1" class="form-check-label me-2">INICIO</label>
                <input type="checkbox" name="my-checkbox-1" id="checkbox1" checked data-bootstrap-switch>
              </div>
            </div>
            <div class="col-sm-6">

              <div class="form-check form-check-inline">
                <label for="checkbox1" class="form-check-label">INICIO</label>
                <input type="checkbox" name="my-checkbox-1" id="checkbox1" checked data-bootstrap-switch>
              </div>
              <div class="form-check form-check-inline">
                <label for="checkbox2" class="form-check-label">PARO DE EMERGENCIA</label>
                <input type="checkbox" name="my-checkbox-2" id="checkbox2" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
              </div>

            </div>
          </div>
        </div>
      </div> -->

      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <!-- Primera columna -->
            <div class="col-sm-6 d-flex align-items-center">
              <h1 class="m-0 me-3"><?php echo $moduloName; ?></h1>
              <div class="form-check form-check-inline">
                <label for="checkbox1" class="form-check-label me-2"> ... STATUS </label>
                <input type="checkbox" name="my-checkbox-1" id="checkbox1" checked data-bootstrap-switch>
              </div>
            </div>
            <!-- Segunda columna -->
            <div class="col-sm-6">
              <div class="form-check form-check-inline">
                <label for="checkbox1" class="form-check-label">INICIO</label>
                <input type="checkbox" name="my-checkbox-1" id="checkbox1" checked data-bootstrap-switch>
              </div>
              <div class="form-check form-check-inline">
                <label for="checkbox2" class="form-check-label">PARO DE EMERGENCIA</label>
                <input type="checkbox" name="my-checkbox-2" id="checkbox2" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
              </div>
            </div>
          </div>
        </div>
      </div>




      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Produccion generado en el dia 24hr</h3>
                    <!-- <a href="javascript:void(0);">View Report</a> -->
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex">
                    <p class="d-flex flex-column">
                      <span class="text-bold text-lg">Watt</span>
                      <!-- <span>Visitors Over Time</span> -->
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                      <span class="text-success">
                        <!-- <i class="fas fa-arrow-up"></i> 12.5% -->
                      </span>
                      <!-- <span class="text-muted">Since last week</span> -->
                    </p>
                  </div>


                  <div class="position-relative mb-4">
                    <canvas id="visitors-chart" height="200"></canvas>
                  </div>

                  <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                      <!-- <i class="fas fa-square text-primary"></i> This Week -->
                    </span>

                    <span>
                      <!-- <i class="fas fa-square text-gray"></i> Last Week -->
                    </span>
                  </div>
                </div>
              </div>


              <div class="card">
                <div class="card-header border-0">
                  <h3 class="card-title">Carga Operativa</h3>
                  <!-- <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div> -->
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped table-valign-middle">
                    <thead>

                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                          Voltaje de Baterias
                        </td>

                        <td>
                          <small class="text-success mr-1">
                            <i class="fas fa-arrow-up"></i>
                            100%
                          </small>

                        </td>
                        <td>
                          <a href="#" class="text-muted">
                            <i class="fas fa-battery-empty"></i>
                            <i class="fas fa-battery-quarter"></i>
                            <i class="fas fa-battery-halft"></i>
                            <i class="fas fa-battery-three-quarters"></i>
                            <i class="fas fa-battery-full"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                          Voltaje de paneles solares
                        </td>

                        <td>
                          <small class="text-warning mr-1">
                            <i class="fas fa-arrow-down"></i>
                            40
                          </small>

                        </td>
                        <td>
                          <a href="#" class="text-muted">
                            <i class="fas fa-cloud-rain"></i>
                            <i class="fas fa-cloud"></i>
                            <i class="fas fa-cloud-sun"></i>

                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                          Voltaje salida inversor
                        </td>

                        <td>
                          <small class="text-danger mr-1">
                            <i class="fas fa-arrow-down"></i>
                            110
                          </small>

                        </td>
                        <td>
                          <a href="#" class="text-muted">
                            <i class="fas fa-battery-full"></i>
                            <i class="fas fa-battery-full"></i>
                            <i class="fas fa-battery-full"></i>
                            <i class="fas fa-battery-full"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                          Voltaje suministro electrico
                          <!-- <span class="badge bg-danger">NEW</span> -->
                        </td>

                        <td>
                          <small class="text-success mr-1">
                            <i class="fas fa-arrow-up"></i>
                            63%
                          </small>

                        </td>
                        <td>
                          <a href="#" class="text-muted">
                            <i class="fas fa-battery-full"></i>
                            <i class="fas fa-battery-full"></i>
                            <i class="fas fa-battery-full"></i>
                            <i class="fas fa-battery-full"></i>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>

            <div class="col-lg-6">
              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Dias de la semana generado/consumo</h3>
                    <!-- <a href="javascript:void(0);">View Report</a> -->
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex">
                    <p class="d-flex flex-column">
                      <!-- <span class="text-bold text-lg">$18,230.00</span> -->
                      <!-- <span>Sales Over Time</span> -->
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                      <span class="text-success">
                        <!-- <i class="fas fa-arrow-up"></i> 33.1% -->
                      </span>
                      <!-- <span class="text-muted">Since last month</span> -->
                    </p>
                  </div>


                  <div class="position-relative mb-4">
                    <canvas id="sales-chart" height="200"></canvas>
                  </div>

                  <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                      <i class="fas fa-square text-primary"></i> Watt Generado
                    </span>

                    <span>
                      <i class="fas fa-square text-gray"></i> Watt consumido
                    </span>
                  </div>
                </div>
              </div>


              <div class="card">
                <div class="card-header border-0">
                  <!-- <h3 class="card-title">Online Store Overview</h3> -->
                  <div class="card-tools">
                    <!-- <a href="#" class="btn btn-sm btn-tool">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-sm btn-tool">
                    <i class="fas fa-bars"></i>
                  </a> -->
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                    <p class="text-success text-xl">
                      <i class="fa fa-bolt"></i>
                    </p>
                    <p class="d-flex flex-column text-right">
                      <span class="font-weight-bold">
                        <!-- <i class="ion ion-android-arrow-up text-success"></i> 12% -->
                      </span>
                      <!-- <span class="text-muted">CONVERSION RATE</span> -->
                    </p>
                  </div>

                  <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                    <p class="text-warning text-xl">
                      <i class="ion ion-ios-cart-outline"></i>
                    </p>
                    <p class="d-flex flex-column text-right">
                      <span class="font-weight-bold">
                        <!-- <i class="ion ion-android-arrow-up text-warning"></i> 0.8% -->
                      </span>
                      <!-- <span class="text-muted">SALES RATE</span> -->
                    </p>
                  </div>

                  <div class="d-flex justify-content-between align-items-center mb-0">
                    <p class="text-danger text-xl">
                      <i class="ion ion-ios-people-outline"></i>
                    </p>
                    <p class="d-flex flex-column text-right">
                      <span class="font-weight-bold">
                        <!-- <i class="ion ion-android-arrow-down text-danger"></i> 1% -->
                      </span>
                      <!-- <span class="text-muted">REGISTRATION RATE</span> -->
                    </p>
                  </div>

                </div>
              </div>
            </div>

          </div>

        </div>

      </div>

    </div>



    <aside class="control-sidebar control-sidebar-dark">

    </aside>



    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>
  </div>

  <script src="plugins/jquery/jquery.min.js"></script>

  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="dist/js/adminlte.js"></script>

  <!-- Bootstrap Switch -->
  <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>


  <script src="plugins/chart.js/Chart.min.js"></script>

  <script src="dist/js/demo.js?v=2"></script>

  <script src="dist/js/pages/dashboard3.js"></script>

  <script>
    $(function() {



      $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      })

    })
  </script>



</body>

</html>