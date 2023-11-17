<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$docentess = User::docentes()->get();
        $docentes = User::docentes()->paginate(10);
        return view('docentes.index',compact('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('docentes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            //'password' => 'required|min:8',
            'role' => 'required|min:5'
        ];
        $messages = [
            'name.required' => 'El nombre del docente es obligatorio',
            'name.min' => 'El nombre del docente debe tener mas de 3 caracteres',
            'email.required' => 'El correo electronico es obligatorio',
            'email.email' => 'Ingrese un correo electronico valido',
           // 'password.requiered' => 'Ingrese una contraseña'
           // 'password.min' => 'La contraseña debe te tener ocho caracteres'
            'role.required' => 'ingresa el tipo de usuario debde der ser "admin" o "docente"',
            'role.min' => 'ingresa el tipo de usuario debde der ser "admin" o "docente"'
        ];
        $this -> validate($request, $rules, $messages);
       // $docentes->role = $request->input('rol');

        User::create(
            $request -> only ('name','email','password','role')
            +[
                'password'=> bcrypt($request->input('password'))
            ]
            );
            $notification = 'El docente se ha creado corectamente.';
            return redirect('/docentes')->with(compact('notification'));

    }

 
    public function show( $id)
    {
        //
    }

  
    public function edit(string $id)
    {
        $docente = User::docentes()->findOrFail($id);
        return view ('docentes.edit', compact('docente'));
    }

   
    public function update(Request $request,  $id)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            //'password' => 'required|min:8',
            'role' => 'required|min:5'
        ];
        $messages = [
            'name.required' => 'El nombre del docente es obligatorio',
            'name.min' => 'El nombre del docente debe tener mas de 3 caracteres',
            'email.required' => 'El correo electronico es obligatorio',
            'email.email' => 'Ingrese un correo electronico valido',
           // 'password.requiered' => 'Ingrese una contraseña'
           // 'password.min' => 'La contraseña debe te tener ocho caracteres'
            'role.required' => 'ingresa el tipo de usuario debde der ser "admin" o "docente"',
            'role.min' => 'ingresa el tipo de usuario debde der ser "admin" o "docente"'
        ];
        $this -> validate($request, $rules, $messages);
        $user = User::docentes()->findOrFail($id);

        $data = $request -> only ('name','email','role');
        $password = $request->input('password');

        if($password)   {
            $data['password'] = bcrypt($password);
        }
        $user->fill($data);
        $user->save();

       
        $docenteName = $user->name;
       
            $notification = "La informacion del docente $docenteName se ah actualizado exitosamente.";
            return redirect('/docentes')->with(compact('notification'));
    }

  
    public function destroy($id)
    {
        $user = User::docentes()->findOrFail($id);
        $docenteName = $user->name;
        $user->delete();
        $notification = "El dcoente $docenteName se elimino correctamente";
        return redirect('/docentes')->with(compact('notification'));
    }
}
