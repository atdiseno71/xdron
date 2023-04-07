<?php

namespace App\Traits;

trait Backup
{

    public function generate(){

        // Variables para la conexion a la base de datos, mysqldump
        $db_host=env('DB_HOST', 'localhost');
        $db_name=env('DB_DATABASE', 'aviacana');
        $db_user=env('DB_USERNAME', 'root');
        $db_password=env('DB_PASSWORD', '');

        // Para identificar nuestro respaldo
        $fecha = date('Ymd-His');

        // Ruta donde quedara almacenada
        $path = '../database/backups/';

        // Como se guarda nuestro respaldo
        $salida_sql = $path . $db_name . '_' . $fecha . '.sql';

        // Instrucciones
        $dump = "mysqldump -h $db_host -u $db_user --password=$db_password --opt $db_name > $salida_sql";

        // Ejecutamos nuestra instruccion
        system($dump, $output);

        return $output;

    }

}
