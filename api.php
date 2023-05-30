<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//Extraemos los parametros del formulario y se guarda en una variable con el nombre indicado en el name del input.
extract($_POST);
//Conexión al servidor
$servidor = "localhost"; $usuario = "root"; $pass = ""; $nombreBaseDatos = "blog";
$conexionBD = new mysqli($servidor, $usuario, $pass, $nombreBaseDatos);



//Inserta un nuevo registro y recepciona en método post los datos de title y conent
if(isset($_POST["posts"])){
        if(($title!="")&&($content!="")){
            
    $sqlPosts = mysqli_query($conexionBD,"INSERT INTO posts(title,content) VALUES('$title','$content') ");
    echo json_encode(["success"=>1]);
    echo('<script type="text/javascript">
    alert("Registro agregado con exito");
    window.location.href="index.php";
    </script>');
        }
        else{
            echo('<script type="text/javascript">
    alert("El titulo y el contenido deben de estar definidos");
    window.location.href="index.php";
    </script>');
        }
    exit();
}

// Consulta datos y recepciona el id para consultar dichos datos con dicha clave
if (isset($_GET["consultar"])){
    $sqlPosts = mysqli_query($conexionBD,"SELECT * FROM posts WHERE id=".$_GET["consultar"]);
    if(mysqli_num_rows($sqlPosts) > 0){
        $Posts = mysqli_fetch_all($sqlPosts,MYSQLI_ASSOC);
        $datosApi = json_decode(file_get_contents("https://jsonplaceholder.typicode.com/comments?id=".$_GET["consultar"].""),true);
                  for($i=0;$i<count($datosApi); $i++)
                  {
                    $Posts[0]['comment']="".$datosApi[$i]['body']."";

                  }
        
        echo json_encode($Posts);
        exit();
    }
    else{ 
        $error[0]['error']="No se encontró la publicación con la ID especificada";
        echo json_encode($error);
        // include('404.php');
        exit();
        }
}

// Recepciona el id eliminar los datos de ese ID
if (isset($_GET["borrar"])){
    $sqlPosts = mysqli_query($conexionBD,"DELETE FROM posts WHERE id=".$_GET["borrar"]);
    if($sqlPosts){
        echo json_encode(["success"=>1]);
        echo('<script type="text/javascript">
    alert("Registro eliminado con éxito");
    window.location.href="index.php";
    </script>');
        exit();
    }
    else{  
        header("HTTP/1.0 404 Not Found");
        include('404.php');
    echo json_encode(["success"=>0]);
    
    echo('<script type="text/javascript">
    alert("Ocurrio un error al momento de eliminar, contacte a un administrador");
    window.location.href="index.php";
    </script>');
 }
 exit();

}

// Actualiza datos, recepciona datos de id, title y contenido para realizar la actualización
if(isset($_POST["put"])){
    $data = json_decode(file_get_contents("php://input"));
    if(($title!="")&&($content!="")){
        $id=$_POST["put"];
        $sqlPosts = mysqli_query($conexionBD,"UPDATE posts SET title='$title',content='$content',created_at=NOW() WHERE id='$id'");
        echo json_encode(["success"=>1]);
        echo('<script type="text/javascript">
    alert("Datos actualizados con exito");
    window.location.href="index.php";
    </script>');
    }else{
        header("HTTP/1.0 404 Not Found");
        include('404.php');
        echo('<script type="text/javascript">
    alert("Ocurrio un error al momento de actualizar, contacte a un administrador");
    window.location.href="index.php";
    </script>');
    }
    
    exit();
}

// Consulta todos los registros de la tabla posts
$sqlposts = mysqli_query($conexionBD,"SELECT * FROM posts ");
if(mysqli_num_rows($sqlposts) > 0){
    $posts = mysqli_fetch_all($sqlposts,MYSQLI_ASSOC);
    echo json_encode($posts);
}
else{ echo json_encode([["success"=>0]]); }
?>