<?php

$json_file = file_get_contents("http://localhost:5001/api/data/get");

$json_str = json_decode($json_file, true);

?>

<!DOCTYPE html>
<html>

<head>

  <?php include 'include_links.html' ?>

</head>

<body>

  <!-- Navigation -->
  <?php include 'include_nav.html' ?>

  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>        
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('img/ideia2.jpg')"></div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">
    <br>
    <h2>Relação de cores</h2>

    <div class="row">
      <div class="col-md-12">
        <div class="card my-12">
          <h5 class="card-header"></h5>
          <div class="card-body">
            <div  id="space3" width='100%' ></div>
          </div>
        </div>
      </div>
    </div>
    <br>

    <h1 class="my-4">Sobre o Projeto</h1>

    <!-- Marketing Icons Section -->
    
    <div class="mb-12" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="card">
        <div class="card-header" role="tab" id="headingOne">
          <h5 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">O que é o daltonismo</a>
          </h5>
        </div>

        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
          <div class="card-body">
            O daltonismo, também conhecido como cegueira parcial para cores, é uma anomalia ligada ao sexo causada por um gene localizado no cromossomo X. O nome daltonismo provém do nome do químico inglês John Dalton, que em 1974 publicou um estudo revelando que tinha dificuldade para distinguir a cor verde da vermelha. As pessoas que apresentam esta anomalia sofrem dificuldades no dia-a-dia, independente do nível de seu daltonismo. Qualquer que seja o ambiente que a pessoa esteja, no trabalho, em casa, no mercado, caso houver uma informação que se baseia em uma cor, tal como um aviso, ou gráfico. O daltônico apresentará dificuldade e/ou desvantagem.
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" role="tab" id="headingTwo">
          <h5 class="mb-0">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Iniciativa
            </a>
          </h5>
        </div>
        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
          <div class="card-body">
           A ciência e a tecnologia trabalham juntas para melhorar a vida da sociedade como um todo, principalmente dos mais necessitados. Diante dessa situação, faz-se necessário o desenvolvimento de projetos de engenharia com esse intuito, auxiliar pessoas com alguma deficiência.
          </div>
        </div>
      </div>
    </div>

    <br>
    <!-- Portfolio Section -->
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; 2019 <b style="color: #0000FF">Eng. Computação</b>. All rights reserved.</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/highcharts.js"></script>
  <script src="js/modulesChart/exporting.js"></script>
  <script src="js/modulesChart/export-data.js"></script>

  <script type="text/javascript">
$(function () {
    $('#space3').highcharts({
       chart: {
            renderTo: 'space',
           // width: 1050,
            //height: 350,
            backgroundColor:'transparent'    
        },
        
        title: {
            text: null
        },
         credits: {
      enabled: false
            },
       exporting: {
            enabled: false
        },
      
       xAxis: {
             categories:  ['Cor:'],
            crosshair: true
        },

        yAxis: {
            title: {
                text: 'Qtde Lida:'
            }
        },

        plotOptions: {
            areaspline: {
                fillOpacity: 0.5
            }
        },

        series:[<?php
                for($i = 0 ;$i<count($json_str);$i++){
              ?>
              { type: 'column',        
                name: ['<?php echo $json_str[$i]["cor"];?>',],
                color: '<?php echo $json_str[$i]["hexadecimal"];?>',
                lineWidth: 1,
                data: [<?php echo $json_str[$i]["quantidade"];?>]
              },
              <?php } ?>
        ]
    });
});

</script>

</body>

</html>
