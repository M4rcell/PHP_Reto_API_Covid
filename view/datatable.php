
<?php 
  require './controller/datacontroller.php';
?>

<div class="chart">

    <div id="container" width="1000" height="385" >
          <canvas id="chart"></canvas>
    </div>
  

    <?php

  $respuesta = ControladorAPI::callWebService();

  //var_dump($respuesta);
  
    $fechas = array();
    $confirmados = array();
    $muertos = array();
    $recuperados = array();
    $activos = array();


    foreach ($respuesta as $key => $value) {

      $fechas[]=date('m-d-Y', strtotime($value["Date"] ));
      $confirmados[]=$value["Confirmed"];
      $muertos[]=$value["Deaths"];
      $recuperados[]=$value["Recovered"];
      $activos[]=$value["Active"];
    
    }
    

    ?>
  
    <script>
    var ctx = document.getElementById('chart').getContext('2d');
    var chart = new Chart(ctx,{

      type:'line',
      data:{
    
          labels: <?php  echo json_encode($fechas); ?> ,

          datasets: [
                {
                  label: 'Confirmados',
                  fill: false,
                  lineTension: 0.1,
                  backgroundColor: 'rgba(75,192,192)',
                  borderColor: 'rgba(75,192,192,0.4)',
                  borderCapStyle: 'butt',
                  borderDash: [],
                  borderDashOffset: 0.0,
                  borderJoinStyle: 'miter',
                  pointBorderColor: 'rgba(75,192,192)',
                  pointBackgroundColor: '#fff',
                  pointBorderWidth: 1,
                  pointHoverRadius: 5,
                  pointHoverBackgroundColor: 'rgba(75,192,192)',
                  pointHoverBorderColor: 'rgba(220,220,220)',
                  pointHoverBorderWidth: 2,
                  pointRadius: 1,
                  pointHitRadius: 10,
                  
                  data: <?php echo json_encode($confirmados);?>
                },
                {
                  label: 'Muertos',
                  fill: false,
                  lineTension: 0.1,
                  backgroundColor: 'rgba(255, 51, 119)',
                  borderColor: 'rgba(255, 51, 119,0.5)',
                  borderCapStyle: 'butt',
                  borderDash: [],
                  borderDashOffset: 0.0,
                  borderJoinStyle: 'miter',
                  pointBorderColor: 'rgba(255, 51, 119)',
                  pointBackgroundColor: '#fff',
                  pointBorderWidth: 1,
                  pointHoverRadius: 5,
                  pointHoverBackgroundColor: 'rgba(255, 51, 119)',
                  pointHoverBorderColor: 'rgba(255, 51, 119)',
                  pointHoverBorderWidth: 2,
                  pointRadius: 1,
                  pointHitRadius: 10,
                  
                  data: <?php echo json_encode($muertos);?>
                },
                {
                  label: 'Recuperados',
                  fill: false,
                  lineTension: 0.1,
                  backgroundColor: 'rgba(255, 178, 51)',
                  borderColor: 'rgba(255, 178, 51,0.5 )',
                  borderCapStyle: 'butt',
                  borderDash: [],
                  borderDashOffset: 0.0,
                  borderJoinStyle: 'miter',
                  pointBorderColor: 'rgba(255, 178, 51)',
                  pointBackgroundColor: '#fff',
                  pointBorderWidth: 1,
                  pointHoverRadius: 5,
                  pointHoverBackgroundColor: 'rgba(255, 178, 51)',
                  pointHoverBorderColor: 'rgba(255, 178, 51)',
                  pointHoverBorderWidth: 2,
                  pointRadius: 1,
                  pointHitRadius: 10,
                  
                  data: <?php echo json_encode($recuperados);?>
                },
                {
                  label: 'Activos',
                  fill: false,
                  lineTension: 0.3,
                  borderWidth: 2,
                  backgroundColor: 'rgba(104, 220, 43)',
                  borderColor: 'rgba(104, 220, 43,0.4)',
                  borderCapStyle: 'butt',
                  borderDash: [],
                  borderDashOffset: 0.3,
                  borderJoinStyle: 'miter',
                  pointBorderColor: 'rgba(104, 220, 43)',
                  pointBackgroundColor: '#fff',
                  pointBorderWidth: 1,
                  pointHoverRadius: 5,
                  pointHoverBackgroundColor: 'rgba(104, 220, 43)',
                  pointHoverBorderColor: 'rgba(104, 220, 43)',
                  pointHoverBorderWidth: 2,
                  pointRadius: 1,
                  pointHitRadius: 10,
                  
                  data: <?php echo json_encode($activos);?>
                }
                      
        ]


      },
      //para que comienze desde cero
      options:{
                  scales:{
                      yAxes:[{
                              ticks:{
                                  beginAtZero:true
                              }
                      }]
                  },
                  responsive: true,
                    title: {
                      display: true,
                      text: ''
                    }
              }


    });

    
  </script>
</div>

<hr>


<div class="dttable">
    <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Confirmados</th>
                <th scope="col">Muertos</th>
                <th scope="col">Recuperados</th>
                <th scope="col">Activos</th>

                </tr>
            </thead>
            <tbody>
            <?php 

                
                usort( $respuesta, function ($a, $b) {
                    return strcmp($b["Date"],$a["Date"]);
                });

                //var_dump($respuesta);
                foreach ( $respuesta as $key => $value) {
                    echo'  
                    <tr>
                        <th scope="row">'.date('Y-m-d', strtotime($value["Date"] )).'</th>
                        <td>'.$value["Confirmed"].'</td>
                        <td>'.$value["Deaths"].'</td>
                        <td>'.$value["Recovered"].'</td>
                        <td>'.$value["Active"].'</td>
                    </tr>';

                }
            ?>    
            </tbody>
        </table>

</div>