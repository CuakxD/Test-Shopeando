<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>POSTS</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="form.html">Agregar POST</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Detalles del POST</h1>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Created</th>
                        <th scope="col">Comentarios</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $id=$_GET["consultar"];
                $datos = json_decode(file_get_contents("http://localhost/Test%20Shopeando/api.php?consultar=".$id.""),true);
                // print_r($datos);
                for($i=0;$i<count($datos); $i++)
                {
                    if(isset($datos[$i]['title'])){
                        echo "                         <tr>

                        <td> ".$datos[$i]['id']."</td>
                       <td> ".$datos[$i]['title']."</td>
                       <td> ".$datos[$i]['content']."</td>
                       <td> ".$datos[$i]['created_at']."</td>
                       <td> ".$datos[$i]['comment']."</td>
   
                       </tr> ";
                    }
                    else{
                        echo('<script type="text/javascript">
                        alert("No se encontró la publicación con la ID especificada");
                        window.location.href="index.php";
                        </script>');
                    }
                  
                }
                ?>

                </tbody>
                </table>

                <img src="https://cdn-icons-png.flaticon.com/512/1/1755.png" alt="detalles " class="img-fluid">
                <h2>Datos de la API jsonplaceholder</h2>
                <?php
                  $datosApi = json_decode(file_get_contents("https://jsonplaceholder.typicode.com/comments?id=".$id.""),true);
                  for($i=0;$i<count($datosApi); $i++)
                  {
                      echo "                        
  
                      ID: ".$datosApi[$i]['id']." <br>
                      Name: ".$datosApi[$i]['name']."<br>
                      Email: ".$datosApi[$i]['email']."<br>
                      Body: ".$datosApi[$i]['body']."<br>
                       ";
                  }
  
                ?>
                    <a class="btn btn-primary" href="index.php">Regresar</a>
            </div>
        </div>
    </div>

    <footer class="text-center">
        <p>Desarrollado por <a href="https://cuakxd.com/JonathanCordero/" target="_blank">Enrique Jonathan Cordero
                Escobar</a></p>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>