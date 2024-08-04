<?php include '00configuraciones.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $titulo_pagina; ?></title>
  <?php include '../include/header.php'; ?>
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <?php include '../include/menu_superior.php'; ?>
    
    
    <?php include '../include/menu_lateral_izquierdo.php'; ?>
    
    <div class="content-wrapper">

      <section class="content-header">
        <div class="container-fluid">

          <div class="row">

            <?php
            if(isset($_SESSION['error'])){
              echo "
              <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
              </div>
              ";
              unset($_SESSION['error']);
            }
            if(isset($_SESSION['success'])){
              echo "
              <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i>¡Proceso Exitoso!</h4>
              ".$_SESSION['success']."
              </div>
              ";
              unset($_SESSION['success']);
            }
            ?>

          </div>





          <div class="row">

            <div class="col-md-7">



              <div class="card  card">
                <div class="card-header ">
                  <h3 class="card-title">
                    Volts - lectura en tiempo Real ESP32 GPIOs 30
                  </h3>

                  <div class="card-tools">

                   <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                    <button type="button" class="btn btn-default btn-sm active" data-toggle="on">On</button>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="off">Off</button>
                  </div>


                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  

                </div>
              </div>

              <div class="card-body ">

               <div id="interactive" style="height: 300px;"></div>

             </div>

             <div class="card-footer clearfix">
              <h6><strong> Realizando valores cada N segundos </strong></h6>
             <!--  <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">X</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Y</a> -->
            </div>

          </div>


        </div>

        <div class="col-md-5">



         <div class="card">
          <div class="card-header">
            <h3 class="card-title">Promedio por C/100 lecturas</h3>

            <div class="card-tools">



              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>


            </div>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1s" class="table table-bordered table-striped">
              <thead>
                <tr>
                 <th>Fecha</th>
                 <th>V_Min</th>
                 <th>V_Max</th>
               </tr>
             </thead>
             <tbody>
              <?php  while($row = $query->fetch_assoc()){  ?>
                <tr>
                  <td><?php echo $row['descripcion']; ?></td>
                  <td><?php echo $row['costo1']; ?></td>
                  <td><?php echo $row['costo2']; ?></td>
                </tr>
              <?php  }  ?>
            </tbody>              
          </table>
        </div>
        <!-- /.card-body -->
      </div>

    </div>

  </div>



</div>
</section>


<section class="content">






  <div class="container-fluid">
    <div class="row">
      <div class="col-12">







      </div>

    </div>

  </div>

  <?php include '03modal.php'; ?>
</section>

</div>

<?php include '../include/footer.php'; ?>

<aside class="control-sidebar control-sidebar-dark">

</aside>

</div>

<?php include '../include/scriptsx.php'; ?>



<script>


  function funcionX(valor){
    //alert(valor);
    $('#modal-edit').modal('show');    
    var id = valor;    
    getRow(id);     

  }

  function funcionY(valor){
    //alert(valor);
    $('#modal-delete').modal('show');
    var id = valor;
    getRow(id);

  }

  
  $(function(){
    $('.edit').click(function(e){
      e.preventDefault();
      $('#modal-edit').modal('show');
      var id = $(this).data('id');

    // alert(id);

      getRow(id);
    });

    $('.delete').click(function(e){
      e.preventDefault();
      $('#modal-delete').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });

    $('.photo').click(function(e){
      e.preventDefault();
      var id = $(this).data('id');
      getRow(id);
    });

  });

  function getRow(id){
    var tabla = '<?php echo $tabla; ?>';
    $.ajax({
      type: 'POST',
      url: '02data.php',
      data: {id:id,tabla:tabla},
      dataType: 'json',
      success: function(response){

      //$('.empid').val(response.empid);

      $('.empid').val(response.empid);//id del registro que se desea editar o eliminar

      $('.employee_id').html(response.descripcion);
      
      $('.del_employee_name').html(response.descripcion);




      $('#edit_descripcion').val(response.descripcion);

      $('#edit_costo1').val(response.costo1);
      $('#edit_costo2').val(response.costo2);



    }
  });
  }
</script>



<script src="../plugins/flot/jquery.flot.js"></script>

<script src="../plugins/flot/plugins/jquery.flot.resize.js"></script>

<script src="../plugins/flot/plugins/jquery.flot.pie.js"></script>


<script>
  $(function () {
    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    
    var data    = [],
    totalPoints = 100

    function getRandomData() {
      var x="";
      if (data.length > 0) {
        data = data.slice(1);
        //console.log(data);
      }

      // Do a random walk
      while (data.length < totalPoints) {

        //var prev = data.length > 0 ? data[data.length - 1] : 50;


        $.ajax({
          type:'GET',
          url:'getData.php',
          data: "",
          dataType: 'json',
          async:false,
          success: function(dato){
            x = dato.costo2;
            //console.log("el dato x es: "+x);
          }
        });

          //y    = prev + Math.random() * 10 - 5
        y    =  x 

        // if (y < 0) {
        //   y = 0
        // } else if (y > 100) {
        //   y = 100
        // }

        data.push(y)
      }

      // Zip the generated y values with the x values
      var res = []
      for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
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

    var updateInterval = 500 //Fetch data ever x milliseconds
    var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
    function update() {

      interactive_plot.setData([getRandomData()])

      // Since the axes don't change, we don't need to call plot.setupGrid()
      interactive_plot.draw()
      if (realtime === 'on') {
        setTimeout(update, updateInterval)
      }
    }

    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === 'on') {
      update()
    }
    //REALTIME TOGGLE
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
     */




  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
    + label
    + '<br>'
    + Math.round(series.percent) + '%</div>'
  }
</script>



<script>
  // function myFuncionCheck(){

  //   if (document.getElementById('checkbox1').checked)
  //   {
  //     alert('PASANDO EL SISTEMA AL ESTADO1');

  //                //window.location = '01index.php?dato=' + dato;
  //              }
  //              else{
  //               alert('PASANDO EL SISTEMA AL ESTADO2');

  //                //window.location = '01index.php?dato=' + dato;
  //              }

  //            }

  $("#checkbox1").bootstrapSwitch({
    onSwitchChange: function(e) {
                //alert(e.target.value);
      var dato = document.getElementById('checkbox1').value;
      window.location = 'actualizar_estado.php?estado=' + dato;

    }
  });

</script>




</body>
</html>
