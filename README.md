# asistencia
Trabajo recreativo, con el cual se quiere mostrar como se administra una base de datos asi como su importancia de tener una base de datos consisa, esto permite una mayor visualizacion de los datos , tambien que sea escalable para que en futuras modificaciones sea mas facil su compresion.



### Procedimientos almacenados
```sql
  -- Define el delimitador para poder crear el procedimiento almacenado
  delimiter //

  -- Crea el procedimiento almacenado
  create procedure alumnos(in letra char)
  begin
      select * from estudiante where nombre like concat("%",letra,"%");
  end//

  -- Restaura el delimitador a su valor por defecto
  delimiter ;

  -- Llama al procedimiento almacenado e imprime los resultados
  call alumnos('a');


```

como mostrar los resultados

```sql
  // Llama al procedimiento almacenado
  $resultado = $mysqli->query("CALL alumnos('a')");

  // Recorre los resultados
  while ($fila = $resultado->fetch_array()) {
      echo $fila[0] . ' ' . $fila['nombre'] . '<br>';
  }

  // Cierra la conexión y libera los recursos
  $resultado->free();
  $mysqli->close();
```

```sql
CREATE DEFINER=`root`@`localhost` PROCEDURE `periodo_maestro`(in idmaestro int)
BEGIN
	SELECT
	grupo.clave, 
	grupo.ID, 
	materia.nombre AS materia, 
	materia.clave AS clavemateria, 
	periodo.nombre AS periodo, 
	COUNT(listagrupo.fk_estudiante)
FROM
	grupo
	INNER JOIN
	materia
	ON 
		grupo.fk_materia = materia.ID
	INNER JOIN
	periodo
	ON 
		grupo.fk_periodo = periodo.ID
	INNER JOIN
	listagrupo
	ON 
		grupo.ID = listagrupo.fk_grupo
WHERE
	grupo.fk_maestro = idmaestro
GROUP BY
	materia.nombre;

END
```
