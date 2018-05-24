<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Editar monitorias</title>
    </head>
    <body>
        <h2>Modificar usuario</h2>
        <form action="" method="POST">
            <?php foreach ($mod as $fila){ ?>
            <input type="text" name="materia" value="<?=$fila->materia?>"/>
            <input type="text" name="monitor" value="<?=$fila->monitor?>"/>
            <input type="date" name="fecha" value="<?=$fila->fecha?>"/>
            <input type="text"  name="salon" value="<?=$fila->salon?>"/>
            <input type="submit" name="submit" value="Modificar"/>
            <?php } ?>
        </form>
        <a href="<?=base_url()?>">Volver</a>
    </body>
</html>