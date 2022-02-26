<html>
    <head>
        <meta charset="UTF-8">
        <title>Triqui_Carlos-Villalobos-Uribe</title>
        <MARQUEE><FONT SIZE=4><FONT FACE="verdana"><font color="red"><b><i>Juego del TRIQUI</i></b></font></FONT></MARQUEE> 
        </br>
        </br>
        <link rel="stylesheet" href="css/estilo1.css"/>
    </head>
    <body>
    <body bgcolor=#EAF2B7>
<?php
session_start();
//session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once './controladores/Ctriqui.php';
            $cTriqui    =new Ctriqui();
            if(isset($_GET['op'])){
                if($_GET['op']==1){
                    $cTriqui->reservar_caracter();
                    $cTriqui->mostrar_tablero();
                }elseif($_GET['op']==2){
                    $cTriqui->hacer_jugada();
                    $cTriqui->mostrar_tablero();
                }
                
            }else{
                $cTriqui->seleccion_caracter();
            }                        
        ?>
    </body>
 </body>
</html>
