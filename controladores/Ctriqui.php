<?php
require_once './modelos/MTriqui.php';
class Ctriqui {
    private $tablero;
    public function __construct() {      
        
        $mTriqui    =new MTriqui();
        if($mTriqui->tablero_existe()){
            $this->tablero  =$mTriqui->cargar_tablero();
        }else{
            $this->tablero  =array(array(0,0,0),
                                   array(0,0,0),
                                   array(0,0,0),
                                  );
        }        
    }
    public function mostrar_tablero() {
        $mTriqui    =new MTriqui();
        $caracter   =$mTriqui->cargar_caracter();
        $gano       =$mTriqui->cargar_gano();
        $empate     =$mTriqui->cargar_empate(); //se carga el empate
        $tablero    =  $this->tablero;        
        include './vistas/vtablero.php';
    }
    public function seleccion_caracter() {
        session_destroy();
        include './vistas/vseleccioncaracter.php';
    }
    public function reservar_caracter() {
        $caracter   =$_GET['caracter'];
        $mTriqui    =new MTriqui();
        $mTriqui->registrar_caracter($caracter);
    }
    public function hacer_jugada() {
        $mTriqui    =new MTriqui();        
        $caracter   =$mTriqui->cargar_caracter();
        $posOrg     =$_GET['pos'];
        $poss       =  explode(',', $posOrg);
        $fila       =$poss[0];
        $columna    =$poss[1];
        $this->tablero[$fila][$columna] =$caracter;
        $gano   =$this->gano($caracter);
        $empate =$this->empatar();//se obtiene valor logico de la funcion empatar, 
        $mTriqui->registrar_gano($gano);
        $mTriqui->registrar_empate($empate);//se registra el empate en la funcion de la clase modelo
        if(!$gano)$caracter   =$caracter=='X'?'O':'X'; 
        $mTriqui->registrar_caracter($caracter);
        $mTriqui->registrar_tablero($this->tablero);        
    }
    private function gano($caracter) {
        return $this->gano_diagonal($caracter)
            || $this->gano_transversal($caracter)
            || $this->gano_horizontal($caracter)
            || $this->gano_horizontal2($caracter)
            || $this->gano_horizontal3($caracter)
            || $this->gano_vertical($caracter)
            || $this->gano_vertical1($caracter)
            || $this->gano_vertical2($caracter);

    }
    private function gano_diagonal($caracter) {
        $tablero    =  $this->tablero;
        if($tablero[0][0]===$caracter && $tablero[1][1]===$caracter && $tablero[2][2]===$caracter){
            return true;
        }else{
            return false;
        }
    }
    private function gano_transversal($caracter) {
        $tablero    =  $this->tablero;
        if($tablero[0][2]===$caracter && $tablero[1][1]===$caracter && $tablero[2][0]===$caracter){
            return true;
        }else{
            return false;
        }
    }
    private function gano_horizontal($caracter) {
        $tablero    =  $this->tablero;
        
        if($tablero[2][0]===$caracter && $tablero[2][1]===$caracter && $tablero[2][2]===$caracter){
            return true;
        }else{
            return false;
        }
    }
    private function gano_horizontal2($caracter) {
        $tablero    =  $this->tablero;
        if($tablero[0][0]===$caracter && $tablero[0][1]===$caracter && $tablero[0][2]===$caracter){
            return true;
        }else{
            return false;
        }
    }
    private function gano_horizontal3($caracter) {
        $tablero    =  $this->tablero;
        if($tablero[1][0]===$caracter && $tablero[1][1]===$caracter && $tablero[1][2]===$caracter){
            return true;
        }else{
            return false;
        }
    }
    private function gano_vertical($caracter) {
        $tablero    =  $this->tablero;
        if($tablero[0][0]===$caracter && $tablero[1][0]===$caracter && $tablero[2][0]===$caracter){
            return true;
        }else{
            return false;
        }
    }
    private function gano_vertical1($caracter) {
        $tablero    =  $this->tablero;
        if($tablero[0][1]===$caracter && $tablero[1][1]===$caracter && $tablero[2][1]===$caracter){
            return true;
        }else{
            return false;
        }
    }
    private function gano_vertical2($caracter) {
        $tablero    =  $this->tablero;
        if($tablero[0][2]===$caracter && $tablero[1][2]===$caracter && $tablero[2][2]===$caracter){
            return true;
        }else{
            return false;
        }
    }
    //funcion que calcula el empate, hay empate a no ser que alguna de las casillas sea identica a 0

    private function empatar(){
        $var=true; //esta variable se envia en el retorno de esta funcion.
        $tablero=$this->tablero;
        for($i =0;$i<sizeof($tablero);$i++){
            for($j =0;$j<sizeof($tablero);$j++){
                if($tablero[$i][$j]===0){
                    $var = false;
                    return $var;
                };
            };
        };
        return $var; 
    }

}
    




