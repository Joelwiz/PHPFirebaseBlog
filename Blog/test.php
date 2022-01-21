<?php

// Firebase Token can be found in the Firebase Console:
// Settings -> Project Settings -> Service accounts -> Database secrets
require 'vendor/autoload.php';
require 'tblog.php';
const URL = 'https://blog-8792c-default-rtdb.europe-west1.firebasedatabase.app/';
const TOKEN = 'oYBZ8cNHoG1ejurVky8TRyGq1P9bfMADmXodAMjo';
const PATH = '/firebase';

use Firebase\FirebaseLib;

$firebase = new FirebaseLib(URL, TOKEN);
$dateTime = new DateTime();

// Storing an array
//$test = [
//'foo' => 'bar',
//'i_love' => 'lamp',
//'id' => 42
//];

//$firebase->set(PATH . '/' . $dateTime->format('c'), $test);

// Storing a string
//$firebase->set(PATH . '/name/contact001', 'John Doe');

// Reading the stored string
//$name = $firebase->get(PATH . '/name/contact001');

//echo $name;
//Creación del Blog e introducción en Firebase
$r = new Blog("Mi Primer Blog de Firebase hecho con PHP (Joel Medina Ferraz)");
$nombre= $r->getNombre();
$id= $r->getId();
$blog = [
    'nombre' => $nombre,
    'id' => $id
];
$firebase->set(PATH . '/blog', $blog);
//Inserción de usuarios en Firebase
$user = new Usuario("Sergio",USER);
$user2 = new Usuario("Pedro",ADMIN);
$user3 = new Usuario("Sara",AUTHOR);
$user4 = new Usuario("Penelope",AUTHOR);
$user5 = new Usuario("Laura",ADMIN);
$user6 = new Usuario("Perico",USER);

$nombre1= $user->getNombre();
$tipo1=$user->getTipo();
$nombre2= $user2->getNombre();
$tipo2=$user2->getTipo();
$nombre3= $user3->getNombre();
$tipo3=$user3->getTipo();
$nombre4= $user4->getNombre();
$tipo4=$user4->getTipo();
$nombre5= $user5->getNombre();
$tipo5=$user5->getTipo();
$nombre6= $user6->getNombre();
$tipo6=$user6->getTipo();

$usuarios = [
    ['Nombre' => $nombre1,
        'Tipo' => $tipo1
    ],
    ['Nombre' => $nombre2,
        'Tipo' => $tipo2
    ],
    ['Nombre' => $nombre3,
        'Tipo' => $tipo3
    ],
    ['Nombre' => $nombre4,
    'Tipo' => $tipo4
    ],
    ['Nombre' => $nombre5,
        'Tipo' => $tipo5
    ],
    ['Nombre' => $nombre6,
        'Tipo' => $tipo6
    ]
];

$firebase->set(PATH . '/blog/usuarios', $usuarios);
//Inserción de entradas en Firebase
$entry1 = new Entrada("El Pepe Chiringo","12/06/2007","Es un restaurante de comida rapida.",$nombre1,"No hay imagen.","#IRL","Vida Real");
$entry2 = new Entrada("Smash Ultimate","23/09/2020","Es un juegazo de lucha.",$nombre2,"SmashUltimate.jpg.","#Game #Fighting","Videojuegos");
$entry3 = new Entrada("Plato de Espaguetis Boloñesa","11/09/2013","Un plato buenisimo de pasta.",$nombre4,"EspaguetiBoloñesa.jpg.","#Cooking #Recipe","Comida");
$entry4 = new Entrada("Regalos bien envueltos","02/12/2018","Como envolver bien un regalo de navidad.",$nombre3,"No hay imagen.","#Presents #Holidays #Christmas","Regalos");

$nom1= $entry1->getTitulo();
$fecha1=$entry1->getFecha();
$desc1= $entry1->getDescripcion();
$autor1=$entry1->getUsuario();
$imagen1= $entry1->getImagen();
$tags1=$entry1->getTags();
$categoria1= $entry1->getCategoria();

$nom2= $entry2->getTitulo();
$fecha2=$entry2->getFecha();
$desc2= $entry2->getDescripcion();
$autor2=$entry2->getUsuario();
$imagen2= $entry2->getImagen();
$tags2=$entry2->getTags();
$categoria2= $entry2->getCategoria();

$nom3= $entry3->getTitulo();
$fecha3=$entry3->getFecha();
$desc3= $entry3->getDescripcion();
$autor3=$entry3->getUsuario();
$imagen3= $entry3->getImagen();
$tags3=$entry3->getTags();
$categoria3= $entry3->getCategoria();

$nom4= $entry4->getTitulo();
$fecha4=$entry4->getFecha();
$desc4= $entry4->getDescripcion();
$autor4=$entry4->getUsuario();
$imagen4= $entry4->getImagen();
$tags4=$entry4->getTags();
$categoria4= $entry4->getCategoria();

$entries = [
    [   'Titulo' => $nom1,
        'Fecha' => $fecha1,
        'Descripcion' => $desc1,
        'Usuario' => $autor1,
        'Imagen' => $imagen1,
        'Tags' => $tags1,
        'Categoria' => $categoria1
    ],
    [   'Titulo' => $nom2,
        'Fecha' => $fecha2,
        'Descripcion' => $desc2,
        'Usuario' => $autor2,
        'Imagen' => $imagen2,
        'Tags' => $tags2,
        'Categoria' => $categoria2
    ],
    [   'Titulo' => $nom3,
    'Fecha' => $fecha3,
    'Descripcion' => $desc3,
    'Usuario' => $autor3,
    'Imagen' => $imagen3,
    'Tags' => $tags3,
    'Categoria' => $categoria3
    ],
    [   'Titulo' => $nom4,
        'Fecha' => $fecha4,
        'Descripcion' => $desc4,
        'Usuario' => $autor4,
        'Imagen' => $imagen4,
        'Tags' => $tags4,
        'Categoria' => $categoria4
    ]
];

$firebase->set(PATH . '/blog/entradas', $entries);
//Inserción de comentarios en Firebase
$com1 = new Comentarios($nombre2,"12/12/2008","Ay caramba chamaquitos");
$com2 = new Comentarios($nombre4,"27/03/2012","No esta nada mal");
$com3 = new Comentarios($nombre1,"31/10/2017","Nueva cosa interesante mis colegas");
$com4 = new Comentarios($nombre3,"13/11/2029","Hay que mejorarla un poco");
$com5 = new Comentarios($nombre5,"02/06/2021","Mola mazo como esta hecha");

$nomb1= $com1->getUsuario();
$fec1=$com1->getFecha();
$co1= $com1->getComentario();

$nomb2=$com2->getUsuario();
$fec2= $com2->getFecha();
$co2=$com2->getComentario();

$nomb3=$com3->getUsuario();
$fec3= $com3->getFecha();
$co3=$com3->getComentario();

$nomb4=$com4->getUsuario();
$fec4= $com4->getFecha();
$co4=$com4->getComentario();

$nomb5=$com5->getUsuario();
$fec5= $com5->getFecha();
$co5=$com5->getComentario();

$comments = [
    [   'Autor' => $nomb1,
        'Fecha' => $fec1,
        'Comentario' => $co1
    ],
    [   'Autor' => $nomb2,
        'Fecha' => $fec2,
        'Comentario' => $co2
    ],
    [   'Autor' => $nomb3,
        'Fecha' => $fec3,
        'Comentario' => $co3
    ],
    [   'Autor' => $nomb4,
        'Fecha' => $fec4,
        'Comentario' => $co4
    ],
    [   'Autor' => $nomb5,
        'Fecha' => $fec5,
        'Comentario' => $co5
    ],
];

$firebase->set(PATH . '/blog/comentarios', $comments);

// Traer datos de firebase
echo "<body style='background-color: #2d2dce'>";
$leer = $firebase->get(PATH . '/blog');
$data = json_decode($leer,true);
echo '<h1 style="text-align: center;color: orangered;border-radius: 25px;">'.$data["nombre"].'</h1>';
echo "<br>";

//Recogemos las entradas introducidas en firebase
$leer2 = $firebase->get(PATH . '/blog/entradas');
$data2 = json_decode($leer2,true);
echo "<div style='text-align: center;background-color: aqua;border-radius: 25px;'>";
echo "<h1 style='color: orangered'>Entradas del blog</h1>";
foreach ($data2 as $key=>$value){
    //$k = $data2[$key]["Imagen"];
    echo '<h3 style="color: orangered">'.$data2[$key]["Titulo"].'</h3>';
    echo "<br>";
    echo $data2[$key]["Fecha"];
    echo "<br>";
    echo $data2[$key]["Descripcion"];
    echo "<br>";
    echo $data2[$key]["Imagen"];
    echo "<br>";
    echo 'Autor: '.$data2[$key]["Usuario"];
    echo "<br>";
    echo "<br>";
    echo "<br>";
}
echo "</div>";

//Recogemos los comentarios introducidos en firebase
$leer3 = $firebase->get(PATH . '/blog/comentarios');
$data3 = json_decode($leer3,true);
echo "<div style='text-align: center;background-color: aqua;border-radius: 25px;'>";
echo "<h1 style='text-align: center;color: orangered'>Comentarios:</h1>";
foreach ($data3 as $key=>$value){
    echo $data3[$key]["Autor"]." : ";
    echo $data3[$key]["Comentario"].", ";
    echo "<i><b>".$data3[$key]["Fecha"]."</b></i>";
    echo "<br><br>";

}
echo "</div>";

//Recogemos los Usuarios que hay actualmente dentro de Firebase
$leer4 = $firebase->get(PATH . '/blog/usuarios');
$data4 = json_decode($leer4,true);
echo "<div style='text-align: center;background-color: aqua;border-radius: 25px;'>";
echo "<h1 style='color: orangered'>Usuarios registrados del blog</h1>";
foreach ($data4 as $key=>$value){
    echo '<h4>'."Nombre: ".$data4[$key]["Nombre"]."</h4><br><h4 style='color:red'> Tipo de Usuario = ".$data4[$key]["Tipo"].'</h4>';
    echo "<br>";
    echo "<br>";
}
echo "</div>";
echo "</body>";