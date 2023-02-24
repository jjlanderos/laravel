<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\SaveProjectRequest;
//use Illuminate\Support\Facades\DB;


class ProjectController extends Controller
{
    public function __construct(){
        //$this->middleware('auth')->only('create','edit');//solo afectará aestos 2 metodos
        $this->middleware('auth')->except('index','show');//todos los métodos estaran validados menos index y show
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $portafolio = DB::table('projects')->get();

        //$portafolio = Project::orderBy('created_at','DESC')->get();
        //$portafolio = Project::latest('created_at')->get();
        //$portafolio = Project::orderBy('created_at')->paginate(1); //por defecto son 15

        return view('projects.index', [
            'projects' => Project::orderBy('created_at','desc')->paginate()
        ]); // sintaxis: view,data
    }

    public function show(Project $project){

        return view('projects.show',[
           // 'project' =>Project::findOrFail($id)    //findOrFail para que falle si no encuentra el id, mostrará pagina 404 si como parametro solo viene la variable
            'project' => $project    //findOrFail para que falle si no encuentra el id, mostrará pagina 404
        ]);
    }

    public function create(){
      return view('projects.create', [
        'project' => new Project
      ]);
    }

    public function store(SaveProjectRequest $request){

        //FORM REQUEST
        //$request->validated();  //validated solo pasa los valores de los campos agregados en la validación

        //Realizar esta validación solamente si no se esta utilizando FORM REQUEST FORM
        /*$fields = request()->validate([
            'title'=>'required',
            'url'=>'required',
            'description'=>'required',
        ]);*/

        /*Project::create([
                'title'=>request('title'),
                'url'=>request('url'),
                'description'=>request('description')
        ]);*/

        //en el caso de que los campos del formulario se llamen igual que a los de la BD se puede utilizar el siguiente método:
        //Project::create(request()->all());

        //--> only nos indica que solo pasaran del request estos campos
        //Project::create(request()->only('title','url','description'));

        //--> solo si se agregó validación en formulario
        Project::create( $request->validated() );   //-->FORM REQUEST

        return redirect()->route('project.index')->with('status','El proyecto fué creado con éxito!!');
    }

    public function edit(Project $project){

       // return $project;
        return view('projects.edit',[
            // 'project' =>Project::findOrFail($id)    //findOrFail para que falle si no encuentra el id, mostrará pagina 404 si como parametro solo viene la variable
             'project' => $project    //findOrFail para que falle si no encuentra el id, mostrará pagina 404
         ]);
    }

    public function update(Project $project, SaveProjectRequest $request){
        /*
        $project->update([
            'title'=>request('title'),
            'url'=>request('url'),
            'description'=>request('description')
        ]);
        */

        //--> solo si se agregó validación en formulario
        $project->update( $request->validated() );   //-->FORM REQUEST

        return redirect()->route('project.show',$project)->with('status','El proyecto fue actualizado con éxito!!');
    }

    public function destroy(Project $project){

         //si se utiliza modelo de eloquent
         //Project::destroy($id); //pasar id o ids

         //como ya tenemos Project utilizamos:
         $project->delete();

         return redirect()->route('project.index')->with('status','El proyecto fué eliminado con éxito');
    }

}
