<?php

namespace App\Http\Controllers;

use App\Models\Actuator;
use Illuminate\Http\Request;

class ActuatorsController extends Controller
{
     //Consultar todos los Actuator
     public function index(){
        return Actuator::paginate();
    }
    //consultar un Actuator
    public function show($id){
        return Actuator::find($id);
    }
    //crear un Actuator
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:actuators',
            'type' => 'required',
            'value' => 'required',
            //'date' => 'required',
            //'user_id' => 'required',
        ]);
        $Actuator = new Actuator();
        $Actuator->fill($request->all());
        $Actuator->user_id = 1;
        $Actuator->save();
        return $Actuator;
    }
    //actualizar un Actuator
    public function update(Request $request, $id){
        $this->validate($request,[
            'name' => 'filled|unique:Actuator',
        ]);
        $Actuator = Actuator::find($id);
        if(!$Actuator) return response('', 404);
        $Actuator->update($request->all());
        $Actuator->save();
        return $Actuator;
    }
    //eliminar un Actuator
    public function destroy($id){
        $Actuator = Actuator::find($id);
        if(!$Actuator) return response('', 404);
        $Actuator->delete();
        return $Actuator;
    }
}
