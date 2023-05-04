# asistencia
Trabajo recreativo, con el cual se quiere mostrar como se administra una base de datos asi como su importancia de tener una base de datos consisa, esto permite una mayor visualizacion de los datos , tambien que sea escalable para que en futuras modificaciones sea mas facil su compresion.

'''sql
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


'''
