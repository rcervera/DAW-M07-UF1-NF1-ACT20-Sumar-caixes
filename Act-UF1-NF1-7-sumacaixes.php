<html>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<select name="numero">
<?php
   for($x=2; $x<11; $x++) {
     if(isset($_REQUEST['numero']) && $_REQUEST['numero']==$x) 
          echo "<option selected>".$x."</option>\n";
     else echo "<option>$x</option>\n";
   }
?>
</select>
<input type="submit" value="Enviar" name="enviar">
</form>

<?php
    if(isset($_REQUEST['numero'])) {
        $numero = htmlspecialchars($_REQUEST['numero']);
        
        // per seguretat comprovem que el número de caixes estigui
        // entre 1 i 10.
        if($numero<1 || $numero>10) {
            echo "El valor de N ha der ser un número entre 1 i 10";
            exit;
        }

        echo "<form method='post' action='".htmlspecialchars($_SERVER['PHP_SELF'])."?numero=".$numero."'> ";
        for($i=0;$i<$numero;$i++) {

            if(isset($_REQUEST['caixa'][$i]))  
               echo "<input type='text' value='".htmlspecialchars($_REQUEST['caixa'][$i])."' name='caixa[]'><br>";
            else echo "<input type='text' name='caixa[]'><br>";
        }
        echo "<input type='submit' value='Sumar' name='sumar'>";
        echo "</form> ";
        }

    if(isset($_REQUEST['caixa'])) {
        
        $suma=0;
        foreach($_REQUEST['caixa'] as $valor)
            $suma = $suma + intval($valor);
        echo "<br>La suma dels números és: ".$suma;
        
        }
?>

</body>
</html>


