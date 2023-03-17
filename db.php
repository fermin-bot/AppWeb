<?php

require_once('config.php');
class db {

    private $usuario;
    private $parametro;
    
    public function __construct($usuario) {
        $this->usuario = $usuario;
        $this->conn = new mysqli("localhost", "root", "", "aplicacionweb");
    }

    public function select_user($parametro){
        $this->parametro = $parametro;
        $sql = "Select $this->parametro from users where Nombre = '$this->usuario';";
        $nomb = mysqli_fetch_array(mysqli_query($this->conn, $sql))[0];
        return $nomb;    
    }

        // Metodos que afectan a la tabla users

    public function insert_user(){
        $sql = "Insert into users (Nombre, Contraseña, imagen) values ('$this->usuario', '$this->parametro', 'img/defecto.jpg');";
        mysqli_query($this->conn, $sql);
        destruct();
    }   

    public function update_user($parametro, $valor){
        $this->parametro = $parametro;
        $this->valor = $valor;
        $sql = "Update users set $this->parametro = '$this->valor' where Nombre = '$this->usuario'";
        mysqli_query($this->conn, $sql);
        // destruct();
    }

    public function delete_user(){
        $sql = "Delete from users where Nombre = '$this->usuario'";
        mysqli_query($this->conn, $sql);
        destruct();
    }
    
        // Metodos que afectan a la tabla files

    public function select_file($parametro){
        $this->parametro = $parametro;
        $sql = "Select $this->parametro from files where propiedad = (Select id_user from users where Nombre = '$this->usuario'); ";
        $nomb = mysqli_fetch_array(mysqli_query($this->conn, $sql));
        return $nomb;   
    }

    public function insert_file($parametro, $valor){
        $this->parametro = $parametro;
        $this->valor = $valor;
        $Date = date('Y-m-d');
        $sql = "INSERT INTO files ($parametro, Date, propiedad) VALUES ('$valor', '$Date' ,(SELECT id_user FROM users WHERE Nombre = '$this->usuario'))";

        // echo $sql;
        mysqli_query($this->conn, $sql);
    }   

    public function update_file(){
        $sql = "Update files set $this->parametro = '$this->usuario' where Nombre = '$this->usuario'";
        mysqli_query($this->conn, $sql);
    }

    public function delete_file(){
        $sql = "Delete from files where id_nodo = '$this->usuario'";
        mysqli_query($this->conn, $sql);
    }

    public function propiedad(){
        
    } 

    public function color() {
        $db = new db($_SESSION['user']);
        $db-> select_user('color');
    }

    public function destruct() {
        $this->conn->close();
    }

}

?>