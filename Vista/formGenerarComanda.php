<?php

class formGenerarComanda{
   

    function __construct(){
  
    }

    public function formGenerarComandaShow($listaprivilegios,$listaproductos){
        ?>
        <!DOCTYPE html>
		<html>
		<head>
			<title>Generar Comanda</title>
		</head>
		<link rel="stylesheet" type="text/css" href="../public/css/main.css">
		<?php
			include_once("../shared/nav.php");
			$objNav= new nav();
            $objNav->navShow($listaprivilegios);
            $nombre ="";
            $apellido ="";
            $dni ="";
            $empleado = "";
		  ?>
		<body>

			<!-- <a class="botoasn" href="controlVerificarAcceso.php?opc=1" >Comandas</a>
			<a class="botoasn" href="controlVerificarAcceso.php?opp=2" >Proformas</a> -->
        <?php for($i = 0; $i <1; $i++){
                
            ?>
              <P>Mesero: <?php echo $listaprivilegios[$i]['nombre']." ". $listaprivilegios[$i]['apellidos']?></P>
               <P>Usuario: <?php echo $listaprivilegios[$i]['DNI'] ?></P>
            <?php
                $dni = $listaprivilegios[$i]['DNI'];
                $empleado = $listaprivilegios[$i]['nombre']." ".$listaprivilegios[$i]['apellidos'];
        } ?>
        <hr>
        <form action="controlGenerarComanda.php" method="post">

            <table>
                <tr>
                    <th>Platillo</th>
                    <th>Precio</th>
                    <th>cantidad</th>
                    <th>Grabar</th>
                </tr>
        <?php
        $cont=0;
            foreach($listaproductos as $row){
                ?>
                <tr>
                    <td><?php echo $row['nombrepr'] ?></td>
                    <td><?php echo $row['precio'] ?></td>
                    <td><input type="number" name="<?php echo $row['idProducto'];?>" id=""></td>
                    <td><input type="text" value="<?php echo $row['idProducto'] ?>" name="<?php echo $row['idProducto'];?>i" id="" hidden></td>
                    <td><input type="checkbox" value="<?php echo $row['precio'];?>" name="<?php echo $row['idProducto'];?>c" id=""></td>
                    
                </tr>
                <?php
                $cont++;
            }
            ?>
            </table>
            <br><hr><br>
            <input type="text" name="tamano" value="<?php echo $cont ?>" id="" hidden>
            <input type="text"  value="<?php echo $dni?>" name="dni"  hidden >
            <input type="text"  value="<?php echo $empleado?>" name="empleado"  hidden >
            <input type="text"  value="<?php echo $this->apellido ?>" name="apellido"  hidden >

            <label for="">DNI Cliente:<br>
                <input type="number" name="dnicliente" id=""><br>
            </label>
            <label for="">Fecha:<br>
                <input type="datetime" name="fecha" id=""><br>
            </label>
            <input name="a" type="submit" value="generar">
        </form>


        <hr>
        <script src="../../js/capturarid.js"></script>


        </body>
        </html>
        <?php
    }

}

?>
