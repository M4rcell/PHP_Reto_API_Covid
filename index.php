
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Reto Api Covid </title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <link rel="stylesheet" href="./css/style.css">
     
    <!-- ChartJS -->
    <script src="php_reto_api_covid/../library/Chart/dist/Chart.js"></script>
    <script src="php_reto_api_covid/../library/Chart/dist/Chart.min.js"></script>
</head>
<body>
    <div class="card" >
        <div class="card-header">
        Casos COVID-19 en Perú al 2020-07-17
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"> <?php include './view/datatable.php'; ?></li>
        </ul>

        
    </div>
   
    
</body>
</html>