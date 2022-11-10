<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href= "estilos.css" type="text/css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>Capitulos</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="https://rickandmortyapi.com/">API Ricky And Morty</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class=" collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto ">
          <li class="nav-item">
            <a class="nav-link mx-2 active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="Capitulos.php">Episodes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="Personajes.php">Characters</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <center><H1>Episodes</H1></center>
  <br> 
<?php
  include 'RespuestaApi.php';
  echo '
  <form action="Capitulos.php" method="post">
  <H3>Episodes: <select id="opciones" name="opciones">  </H3>';
  for($i=1; $i<=51; $i++)
  {
    $Respuesta = new Consumidor();
    $capitulo = $Respuesta->ConsumirApi("https://rickandmortyapi.com/api/episode/".$i); 
    echo'<option value="'.$i.'">Episode '.$i.' '.$capitulo['name'].'</option>';  
  }
  echo '
  </select>
  <button type="submit" name="Ver" value="Ver">Ver</button>
  </form>';
  if(isset($_POST['Ver'])){ 
    $cap = $_REQUEST['opciones'];
    $Respuesta = new Consumidor();
    $capitulo = $Respuesta->ConsumirApi("https://rickandmortyapi.com/api/episode/".$cap);
    echo "<br> 
    <center><H1>"."Episode ".$capitulo['name']."</H1></center>";
    $contador=0;
    $c=0;
    $co = Count($capitulo['characters']);
    echo '<container class="Contenedor">';
    foreach($capitulo['characters'] as $personajes){
        echo "<br></br>";
        $Respuesta = new Consumidor();
        $person = $Respuesta->ConsumirApi($personajes);
        $location = $person['location'];
        $origin = $person['origin'];
        echo 
        '<div class = "cTarjeta">
            <div class="TarjetaPersonaje">
              <div class="InfoPersonaje">
                <img class="TarjetaImagen" src="'.$person['image'].'">
              </div>
              <input id="activar" name="activar" type="checkbox">
              <label for="activar"><h5><u class="inputlabel" name="inputlabel">Click para ver contenido</u></h5></label>
              <div class="desplegable InfoPersonaje">
              <h3>Name: '.$person['name'].'</h3>
              <h3>Specie: '.$person['species'].'</h3>
              <h3>Status: '.$person['status'].'</h3>
              <h3>Gender: '.$person['gender'].'</h3>
              <h3>Location: '.$location['name'].'</h3>
              <h3>Origin: '.$origin['name'].'</h3>
            </div> 
          </div>
        </div>';
        $contador += 1;
        $c += 1;
        if($contador == 4){
          echo "</container>";
          echo "<br>";
          $contador=0;
          echo '<container class="Contenedor">';
        }
        if($c == $co)
        {
          echo "</container>";
          $c=0;
        }
    }
  }
?>
 <footer class="text-center text-white fixed-bottom" style="background-color: #21081a;">
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2022 Copyright:
    <a class="text-white" href="https://m.facebook.com/profile.php?id=100023086538963">Rodrigo Martinez Jimenez</a>
  </div>
</footer>
</body>
</html>
