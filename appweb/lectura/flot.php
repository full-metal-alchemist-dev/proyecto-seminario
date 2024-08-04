<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GRAFICO</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">


  <!-- DANILO -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- interactive chart -->
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
                Interactive Area Chart
              </h3>

              <div class="card-tools">
                Real time
                <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                  <button type="button" class="btn btn-default btn-sm active" data-toggle="on">On</button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="off">Off</button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div id="interactive" style="height: 300px;"></div>
            </div>
            <!-- /.card-body-->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->




  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- FLOT CHARTS -->
  <script src="../plugins/flot/jquery.flot.js"></script>
  <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
  <script src="../plugins/flot/plugins/jquery.flot.resize.js"></script>
  <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
  <script src="../plugins/flot/plugins/jquery.flot.pie.js"></script>

  <!-- Page specific script -->
  <script>
    $(function () {
    /*
     * Flot Interactive Chart
     * Gráfico interactivo Flot
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // Usamos una fuente de datos en línea en el ejemplo, por lo general los datos

    // be fetched from a server
    // Ser recuperado de un servidor











  // $estados_r = array();
  // $total_r = array();

  // $sql = "SELECT count(*) as totalxequipo, estados_equipo.estado_equipo  from estados_equipo
  //       inner join equipo on equipo.id_estado_equipo = estados_equipo.id_estado_equipo
  //       group by estados_equipo.estado_equipo order by estados_equipo.estado_equipo asc";


  // $oquery = $conn->query($sql);
  // while($resultado = $oquery->fetch_assoc()){
  //   $estado =  $resultado['estado_equipo'];
  //   $total =  $resultado['totalxequipo'];
  //   array_push($estados_r, $estado);
  //   array_push($total_r, $total);
  // }

  // $estados_r = json_encode($estados_r);
  // $total_r = json_encode($total_r);










    var data = [],
    totalPoints = 100

    function getRandomData() {

      if (data.length > 0) {
        data = data.slice(1)
      }

      // Do a random walk
      // Haz un paseo al azar
      while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 50,
        y    = prev + Math.random() * 10 - 5

        if (y < 0) {
          y = 0
        } else if (y > 100) {
          y = 100
        }

        data.push(y)
      }

      // Zip the generated y values with the x values
      // Comprima los valores y generados con los valores x
      var res = []
      for (var i = 0; i < data.length; ++i) {
        //res.push([i, data[i]])
        res.push([i, 100])
      }

      return res
    }









    var interactive_plot = $.plot('#interactive', [
    {
      data: getRandomData(),
    }
    ],
    {
      grid: {
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor: '#f3f3f3'
      },
      series: {
        color: '#3c8dbc',
        lines: {
          lineWidth: 2,
          show: true,
          fill: true,
        },
      },
      yaxis: {
        min: 0,
        max: 100,
        show: true
      },
      xaxis: {
        show: true
      }
    }
    )

    var updateInterval = 500  //  Fetch data ever x milliseconds
                              //  Obtener datos cada x milisegundos

    var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
                              //Si == para encendido, entonces obtenga datos cada x segundos. de lo contrario deja de buscar
    function update() {

      console.log([getRandomData()]);
      //console.log(JSON.stringify([getRandomData()]));

      //interactive_plot.setData([getRandomData()])

interactive_plot.setData(
[
    [
        [0,    1.00  ],
        [1,    70.00  ],
        [2,    2.00  ],
        [3,    3.00  ],
        [4,    4.00  ],
        [5,    5.00  ],
        [6,    99.00  ],
        [7,    7.00  ],
        [8,    8.00  ],
        [9,    9.00  ],
        [10,  10.00  ],
        [11,  11.00  ],
        [12,  12.00  ],
        [13,  13.00  ],
        [14,  14.00  ],
        [15,  90.00  ],
        [16,  16.00  ],
        [17,  17.00  ],
        [18,  18.00  ],
        [19,  25.00  ],
        [20,  20.00  ],
        [21,  21.00  ],
        [22,  22.00  ],
        [23,  23.00  ],
        [24,  24.00  ],
        [25,  25.00  ],
        [26,  26.00  ],
        [27,  27.00  ],
        [28,  28.00  ],
        [29,  29.00  ],
        [30,  30.00  ],
        [31,  31.00  ],
        [32,  32.00  ],
        [33,  33.00  ],
        [34,  34.00  ],
        [35,  35.00  ],
        [36,  36.00  ],
        [37,  37.00  ],
        [38,  38.00  ],
        [39,  39.00  ],
        [40,  85.00  ],
        [41,  41.00  ],
        [42,  42.00  ],
        [43,  43.00  ],
        [44,  44.00  ],
        [45,  45.00  ],
        [46,  46.00  ],
        [47,  47.00  ],
        [48,  48.00  ],
        [49,  49.00  ],
        [50,  25.00  ],
        [51,  51.00  ],
        [52,  52.00  ],
        [53,  53.00  ],
        [54,  54.00  ],
        [55,  55.00  ],
        [56,  56.00  ],
        [57,  57.00  ],
        [58,  58.00  ],
        [59,  59.00  ],
        [60,  25.00  ],
        [61,  61.00  ],
        [62,  62.00  ],
        [63,  63.00  ],
        [64,  64.00  ],
        [65,  65.00  ],
        [66,  66.00  ],
        [67,  67.00  ],
        [68,  68.00  ],
        [69,  69.00  ],
        [70,  70.00  ],
        [71,  71.00  ],
        [72,  72.00  ],
        [73,  73.00  ],
        [74,  74.00  ],
        [75,  75.00  ],
        [76,  76.00  ],
        [77,  77.00  ],
        [78,  25.00  ],
        [79,  79.00  ],
        [80,  80.00  ],
        [81,  81.00  ],
        [82,  82.00  ],
        [83,  83.00  ],
        [84,  84.00  ],
        [85,  85.00  ],
        [86,  86.00  ],
        [87,  10.00  ],
        [88,  88.00  ],
        [89,  89.00  ],
        [90,  25.00  ],
        [91,  91.00  ],
        [92,  92.00  ],
        [93,  93.00  ],
        [94,  94.00  ],
        [95,  95.00  ],
        [96,  96.00  ],
        [97,  97.00  ],
        [98,  98.00  ],
        [99,  100.00  ]

        ]
    ]   
)



      // Since the axes don't change, we don't need to call plot.setupGrid()
      // Como los ejes no cambian, no necesitamos llamar a plot.setupGrid()
      interactive_plot.draw()


      if (realtime === 'on') {
        setTimeout(update, updateInterval)
      }


    }

    //INITIALIZE REALTIME DATA FETCHING
    //INICIALIZAR OBTENCIÓN DE DATOS EN TIEMPO REAL
    if (realtime === 'on') {
      update()
    }
    //REALTIME TOGGLE
    //CAMBIO EN TIEMPO REAL - BOTON PARA SETEAR ESTA CARACTERISTICA
    $('#realtime .btn').click(function () {
      if ($(this).data('toggle') === 'on') {
        realtime = 'on'
      }
      else {
        realtime = 'off'
      }
      update()
    })
    /*
     * END INTERACTIVE CHART
     * FINALIZAR GRÁFICO INTERACTIVO
     */
   })


 </script>


</body>
</html>
