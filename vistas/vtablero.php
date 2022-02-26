<center>

<form action="index.php">
    <input type="hidden" name="op" value="2"/>
    </br><?php 
    if ($gano){
        echo 'Ganaron las '.$caracter;
    } 
    
    ?>
    <table>
        <?php for($i =0;$i<sizeof($tablero);$i++): ?>
                <tr>
                <?php for($j =0;$j<sizeof($tablero);$j++): ?>
                    <td>
                    <?php
                        if (!$gano) {
                            if($tablero[$i][$j]===0){
                                //Mostrar un boton
                    ?> 
                                <input type="submit" name="pos" value="<?= $i.','.$j?>"/>
                    <?php
                            }else{
                                //Mostrar la jugada
                                echo $tablero[$i][$j];
                            }//en el siguiente bloque como la variable gano es verdadera, entonces puedo desabilitar los botones con propiedad disabled.
                        }elseif($tablero[$i][$j]===0){?>
                            <input type="submit" name="pos" disabled="<?=$gano?>" value="<?= $i.','.$j?>"/>
                    </td>
                    <?php 
                        }else{
                            //Mostrar la jugada
                            echo $tablero[$i][$j];
                        }endfor;?>
                </tr>
        <?php endfor; ?>
    </table>
</form>
<form action="index.php" method="post">
<?php if (!$gano && !$empate) {//solo se muestra el turno siempre y cuando nadie gane y no haya empate

  echo 'Turno de las ' .$caracter;
}
if(!$gano && $empate){//se muestra el empate si nadie gana y el empate sea verdadero.
    echo 'empate';
}
 ?>
    </br>
    </br>
    <input type="submit" name="Volver" value ="Reiniciar juego">
</center>