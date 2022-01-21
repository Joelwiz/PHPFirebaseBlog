<?php
const ADMIN =0;
const USER =1;
const AUTHOR =2;

class Blog{
    private $nombre;
    private $id;
    private $entradas;
    private $usuarios;
    private $comentarios;


    public function __construct($nombre){
        $this->nombre = $nombre;
        $this->id=uniqid();
        $this->usuarios=[];
        $this->entradas=array();
        $this->comentarios=array();

    }

    public function nuevaEntrada($nombre,$fecha,$descripcion,$usuario,$imagen,$tags,$categoria){
        $entrada = new Entrada($nombre,$fecha,$descripcion,$usuario,$imagen,$tags,$categoria);
        array_push($this->entradas,$entrada);
    }
    public function nuevoUsuario($nombre,$tipo){
        $user = new Usuario($nombre,$tipo);
        array_push($this->usuarios,$user);
    }
    public function nuevoComentario($usuario,$fecha,$cometario){
        $comentario = new Comentarios($usuario,$fecha,$cometario);
        array_push($this->comentarios,$comentario);
    }
    public function getUsuarios(){
        foreach ($this->usuarios as $user){
            echo $user->toString()."<br>";
        }

    }
    public function getComentarios(){
        foreach ($this->comentarios as $com){
            echo $com->toString()."<br>";
        }

    }
    public function getEntradas(){
        foreach ($this->entradas as $entrada){
            echo $entrada->toString()."<br>";
        }

    }
    public function toString(){
        return $this->nombre;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getId(){
        return $this->id;
    }
}


class Entrada {
    private $titulo;
    private $fecha;
    private $descripcion;
    private $usuario;
    private $imagen;
    private $tags;
    private $categoria;

    public function __construct($titulo,$fecha,$descripcion,$usuario,$imagen,$tags,$categoria){
        $this->titulo = $titulo;
        $this->fecha = $fecha;
        $this->descripcion = $descripcion;
        $this->usuario = $usuario;
        $this->imagen = $imagen;
        $this->tags = $tags;
        $this->categoria=$categoria;

    }

    public function getEntrada(){
        echo $this->titulo.", ".$this->fecha.", ".$this->descripcion.", ".$this->usuario.", ".$this->imagen.", ".$this->tags.", ".$this->categoria.".";
    }
    public function toString(){
        return $this->titulo.", ".$this->fecha.", ".$this->descripcion.", ".$this->usuario->getNombre().", ".$this->imagen.",  ".$this->tags.", ".$this->categoria;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getImagen(){
        return $this->imagen;
    }

    public function getTags(){
        return $this->tags;
    }

    public function getCategoria(){
        return $this->categoria;
    }

}

class Comentarios {
    private $usuario;
    private $fecha;
    private $comentario;

    public function __construct($usuario, $fecha, $comentario){
        $this->usuario=$usuario;
        $this->fecha=$fecha;
        $this->comentario=$comentario;

    }
    public function getUsuario(){
        return $this->usuario;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getComentario(){
        return $this->comentario;
    }
    public function toString(){
        return $this->usuario->getNombre()."<br>".$this->fecha."<br> ".$this->comentario;
    }
}

class Usuario {
    private $nombre;
    private $tipo;
    private $uid;

    public function __construct($nombre,$tipo){
        $this->nombre=$nombre;
        $this->tipo=$tipo;
        $this->uid=uniqid();
    }

    public function toString(){
        return $this->nombre.", ".$this->tipo;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getTipo(){
        if($this->tipo == 0){
            return "ADMIN";
        }else if($this->tipo == 1){
            return "USER";
        }else{
            return "AUTHOR";
        }
    }
/*
const ADMIN =0;
const USER =1;
const AUTHOR =2;*/
}

//$user = new Usuario("ROBERTO",USER);
//$user2 = new Usuario("ALDABERTO",ADMIN);
//$user3 = new Usuario("DAGOBERTO",AUTHOR);
//$r = new Blog("Prueba", 3);
//$r->nuevoUsuario("PEPE",ADMIN);
//$r->nuevoUsuario("JUAN",USER);
//$r->nuevoUsuario("PEDRO",AUTHOR);
//$r->nuevoComentario($user,"03/12/2021","Página muy informativa");
//$r->nuevoComentario($user2,"03/12/2021","Genial muchas gracias por tu comentario");
//$r->nuevoComentario($user3,"03/12/2021","HOLAAA");
//$r->nuevaEntrada("Primera","03/12/2021","aqui va un texto muy largo.com",$user3,"<img src='img/homero.jpg'>","yo que se", "Me da igual");
//$r->getEntradas();
//$r->getComentarios();
//$r->getUsuarios();