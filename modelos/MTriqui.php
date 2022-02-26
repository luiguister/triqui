<?php
class MTriqui {

    public function registrar_caracter($caracter) {
        $_SESSION['caracter']   =$caracter;
    }
    
    public function cargar_caracter() {
        return $_SESSION['caracter'];
    }

    public function registrar_gano($gano) {
        $_SESSION['gano']   =$gano;
    }

    public function registrar_empate($empate){ //funcion que registra el empate
        $_SESSION['empate']   =$empate;
    }
    
    public function cargar_gano() {
        return isset($_SESSION['gano'])?$_SESSION['gano']:FALSE;
    }

    public function cargar_empate(){
        return isset($_SESSION['empate'])?$_SESSION['empate']:FALSE; //funcion que carga el empate
    }

    public function registrar_tablero($tablero) {
        $_SESSION['tablero']   =$tablero;
    }
    
    public function cargar_tablero() {
        return $_SESSION['tablero'];
    }

    public function tablero_existe() {
        return isset($_SESSION['tablero']);
    }
    
}
