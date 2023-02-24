<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //protected $table = 'Projects';   //en caso de que no se adapte el nombre de la tabla


    /*
    1.- protected $fillable = ['title','url','description']; //fillable se debe agregar para que al hacer registros(create) indicar que campos puedo insertar
    2.- protected $guarded = ['campo1','campo2','campo3', ...]; ---> esto significa que los campos que estan en el array no los guarde en la BD
    3.- potected $guarded = [];
        deshabilita la protección y se puede insertar todo
    */

    protected $guarded = [];


    //este método se agregó de la clase Model que es la que indica que la busqueda es por el id, pero para modificarla y utilizar otro campo de busqueda debemos agregarla aqui para no modificar el core. Se agrega y se asigna el campo que queremos utilizar
    public function getRouteKeyName(){
        return 'url';
    }

}
