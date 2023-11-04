<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Models\FilesOperation;
use Illuminate\Http\Request;
use App\Utilities\Resources;
use Illuminate\Support\Str;
use ZipArchive;
use Exception;

trait ImageTrait
{

    /**
     * Devuelve el nuevo nombre del archivo, estado, mensaje
     *
     * Este método se utiliza reducir el tamaño de una imagen,
     * cambiandole el formado webp
     *
     */
    public function webpImage(Request $request, $input_name, $model, $name_file)
    {
        $path = public_path("images/$model");
        if ($request->hasFile($input_name)) {
            try {
                $file = $request->file($input_name);
                $rand = strtolower(Str::random(10));
                $image = Image::make($file);
                $image->encode('webp', 70);

                // RUTA DE LA IMAGEN
                $path_image = $path . $name_file . '.webp';

                // Create folder directory and save
                // Storage::disk('public')->makeDirectory("images/$model");
                // Verificar si el directorio ya existe
                if (!file_exists($path)) {
                    // Si no existe, crear el directorio
                    mkdir($path, 0777, true);
                }
                $image->save($path_image);
                return [
                    'response' => ['status' => true, 'name' => "images/$model" . $name_file . '.webp', 'message' => 'Se ha guardado con éxito']
                ];
            } catch (\Exception $ex) {
                return [
                    'response' => ['status' => false, 'name' => $ex->getMessage(), 'message' => $ex->getMessage()]
                ];
            }
        }
    }

    public function send_file(Request $request, string $input_name, string $model, int $id): array
    {
        $path = public_path("images/$model");
        $doc_path = "$model/$id/";

        try {
            if (Resources::isImagen($request->file($input_name)->getMimeType())){
                if ($request->hasFile($input_name)) {
                    $file = $request->file($input_name);
                    $rand = strtolower(Str::random(10));
                    $image = Image::make($file);
                    $image->encode('webp', 70);

                    // Create folder directory and save
                    Storage::disk('public')->makeDirectory($model . '/' . $id);
                    $image->save($path . $rand . '.webp');

                    $url = "{$model}/{$id}/{$rand}.webp";
                }
            } else {
                $uid = uniqid();
                $file = $request->file($input_name);
                $ext = $file->getClientOriginalExtension();
                $filename_parsed = "$uid.$ext";

                $file->move(public_path("images/$model"), $filename_parsed);
                $url = "images/$model/$filename_parsed";
            }

            return [
                'response' => ['success' => true, 'payload' => $url]
            ];
        } catch (Exception $ex) {
            return [
                'response' => ['success' => false, 'payload' => $ex->getMessage()]
            ];
        }
    }

    public function update_file(Request $request, string $input_name, string $model, int  $id, string $url): array
    {
        try {
            if (File::exists($url)) {
                // Elimina el archivo
                File::delete($url);
            }
            $response = $this->send_file($request, $input_name, $model, $id);
            return $response;
        } catch (Exception $ex) {
            return [
                'response' => ['success' => false, 'payload' => $ex->getMessage()]
            ];
        }
    }

    /* SUBIR DOCUMENTOS A TRAVES DEL DROPZONE */
    public function uploadAll($request, $id, $model, $name_file) {

        $files = $request->file($name_file);
        // If the variable '$files' is not empty, we update the registry with the new images
        if (!empty($files)) {
            try {
                // Validate that the name and image format are present.
                $request->validate([
                    "$name_file.*" => 'bail|required|mimes:jpeg,png,gif,pdf|max:10048',
                ]);
                // We receive one or more images and update them.
                $path = public_path("images/$model");
                foreach ($request->file($name_file) as $file) {
                    $rand = strtolower(Str::random(10));
                    $image = Image::make($file);
                    $image->encode('webp', 70);

                    // RUTA DE LA IMAGEN
                    $path_image = $path . $rand . '.webp';

                    // Verificar si el directorio ya existe
                    if (!file_exists($path)) {
                        // Si no existe, crear el directorio
                        mkdir($path, 0777, true);
                    }
                    $image->save($path_image);
                    // Save in database with relation
                    FilesOperation::create([
                        'src_file' => "images/$model" . $rand . '.webp',
                        'detail_operation_id' => $id,
                    ]);
                }
                return [
                    'response' => ['status' => true, 'name' => "images/$model" . $rand . '.webp', 'message' => 'Se ha guardado con éxito']
                ];
            } catch (\Exception $ex) {
                return [
                    'response' => ['status' => false, 'name' => $ex->getMessage(), 'message' => $ex->getMessage()]
                ];
            }
        }
    }

    /* ACTUALIZAR DOCUMENTOS QUE VIENEN A TRAVES DEL DROPZONE */
    public function updateAllFiles($request, $id, $model, $name_file) {

        try {
            $files = $request->file($name_file);
            $evidences = FilesOperation::where('detail_operation_id', $id)->get();
            if (!empty($files)) {
                foreach ($evidences as $evidence) {
                    // Storage::disk('public')->delete($evidence->path);
                    if (File::exists($evidence->path)) {
                        // Elimina el archivo
                        File::delete($evidence->path);
                        $evidence->delete();
                    }
                }
                $response = $this->uploadAll($request, $id, $model, $name_file);
                return $response;
            }
        } catch (Exception $ex) {
            return [
                'response' => ['success' => false, 'payload' => $ex->getMessage()]
            ];
        }

    }

    // Subir archivos zip
    public function uploadZip($request, $id, $model, $sub_model, $name_file) {

        try {
            // Traemos el archivo
            $file = $request->file($name_file);
            // Guardamos la ruta en la que va
            $path = public_path("$model/_$id/$sub_model");
            // Un nombre cualquiera de momento
            $name = 'evidence';

            if($file->getSize() == 0) throw new Exception("No se ha recibido un archivo");

            // creamos las carpetas
            if( ! is_dir(public_path($model)) ) mkdir(public_path($model));
            if( ! is_dir(public_path("$model/_$id")) ) mkdir(public_path("$model/_$id"));
            if( ! is_dir(public_path("$model/_$id/$sub_model")) ) mkdir(public_path("$model/_$id/$sub_model"));

            move_uploaded_file( $request[$name_file], "$path/$name.zip" );

            $zipppito = new ZipArchive( );
            $response = $zipppito->open( "$path/$name.zip", ZipArchive::RDONLY );

            if( $response !== true ){
                $errors = [
                    ZipArchive::ER_EXISTS  =>  "El fichero ya existe.",
                    ZipArchive::ER_INCONS  =>  "Archivo zip inconsistente.",
                    ZipArchive::ER_INVAL  =>  "Argumento no válido.",
                    ZipArchive::ER_MEMORY  =>  "Falló malloc.",
                    ZipArchive::ER_NOENT  =>  "No existe el fichero.",
                    ZipArchive::ER_NOZIP  =>  "No es un archivo zip.",
                    ZipArchive::ER_OPEN  =>  "No se puede abrir el fichero.",
                    ZipArchive::ER_READ  =>  "Error de lectura.",
                    ZipArchive::ER_SEEK  =>  "Error de búsqueda."
                ];

                $message = $errors[ $response ];
                throw new Exception("$message");
            }

            // Esto es para extraerlo
            // $zipppito->extractTo("$path/$name");
            // Aca cerramos el archivo zip
            $zipppito->close();
            // Retornamos que se guardo con exito
            return response()->json("$model/_$id/$sub_model/$name.zip");
        } catch (Exception $ex) {
            return response()->json($ex->getMessage(), 422);
        }


    }

}
