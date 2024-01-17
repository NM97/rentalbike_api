<?php

use natanielmarmucki\rentalbike\models\Bike;
use natanielmarmucki\rentalbike\models\Location;
use natanielmarmucki\rentalbike\models\Reservation;
use natanielmarmucki\rentalbike\models\Bike_reservations;
use natanielmarmucki\rentalbike\models\Type;
use natanielmarmucki\rentalbike\models\ToDo;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Carbon\Carbon;


Route::middleware(['api'])->group(function(){
    Route::get('bikes', function () {
        $bikes = Bike::with('image','locations', 'reservations')->get(); 
        return $bikes;  
    });

    Route::get('rentals', function () {
        $rentals = Reservation::with('user','bikes')->get();
        return $rentals;  
    });

    Route::get('bikes/filter/{id}', function ($id) {
        $bikes = Bike::whereHas('locations', function($query) use ($id){
            $query->where('id', '=', $id);
        })->get();
        return $bikes;  
    });

    Route::get('locations', function () {
        $locations = Location::all();
        return $locations;  
    });

    Route::get('types', function () {
        $types = Type::all();
        return $types;  
    });

    Route::get('locations/list', function () {
        $locations = Location::all();
        foreach($locations as $location) {
            $location['label'] = $location['name'];
            $location['value'] = $location['id'];
            unset($location['name']);
            unset($location['slug']);
            unset($location['id']);
        }
        return $locations;  
    });
});

Route::middleware(['api','jwt.auth'])->group(function () {

    // RENTAL 

    Route::post('create-reservation', function (Request $request) {
        $reservation = new Reservation;
        $reservation->pickup = $request->pickup;
        $reservation->dropoff = $request->dropoff;
        $reservation->user_id = $request->user_id;
        $reservation->bike_id = 5;
        $reservation->price = $request->price;
        $reservation->returned = $request->returned;
        $reservation->save();

        $str = $request->bike_id;
        $bikes = explode(",", $str);
        
        foreach ($bikes as &$value) {
            $bike_reservations = new Bike_reservations;
            $bike_reservations->reservation_id = $reservation->id;
            $bike_reservations->bike_id = $value;
            $bike_reservations->save();
        }       

        $id = $request->user_id;       
        $pickup = $request->pickup;
        $user= Db::table('users')->where('id', $id)->value('email');
        $name = Db::table('users')->where('id', $id)->value('name');
        $params = array ("name" => $name, "pickup" => $pickup);      
        Mail::sendTo($user, 'rentalbike::mail.new_reservation', $params);
        return response()->json('Reservation Created!');
    });

    Route::post('rental-mark/{id}', function ($id) {
        $mark = Reservation::where('id', $id)->update(['returned' => 1]);
        return $mark;
    });
    Route::post('rental-delete/{id}', function ($id) {
        $delete = Reservation::destroy($id);
        $delete2 = Bike_reservations::where('reservation_id', $id)->delete(); 
        return $delete;
        return $delete2;
    });

    // BIKE 
    Route::post('bike-mark-available/{id}', function ($id) {
        $mark = Bike::where('id', $id)->update(['available' => 1]);
        return $mark;
    });
    Route::post('bike-mark-not-available/{id}', function ($id) {
        $mark = Bike::where('id', $id)->update(['available' => 0]);
        return $mark;
    });
    Route::post('bike-delete/{id}', function ($id) {
        $delete = Bike::destroy($id); 
        return $delete;
    });

    // LOCATION
    Route::post('add-location', function (Request $request) {
        $location = new Location;
        $location->name = $request->name;
        $location->slug = $request->slug;
        $location->description = $request->description;
        $location->save();
        return response()->json('Location Created!');
    });

    Route::post('location-delete/{id}', function ($id) {
        $delete = Location::destroy($id); 
        return $delete;
    });
    Route::post('location-edit', function (Request $request) {
        $id = $request->id;
        $name = $request->name;
        $description = $request->description;
        $UD1 = Location::where('id', $id)->update(['name' => $name, 'description' => $description]);
        return $UD1;
    });

    //TYPE

    Route::post('type-delete/{id}', function ($id) {
        $delete = Type::destroy($id); 
        return $delete;
    });
    Route::post('add-type', function (Request $request) {
        $type = new Type;
        $type->name = $request->name;
        $type->save();
        return response()->json('Type Created!');
    });
    
    // TODO

    Route::get('admin/populate', function(){
        $faker = Faker\Factory::create();
    
        for($i = 0; $i < 20; $i++){
            Todo::create([
                'name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'description' => $faker->text($maxNbChars = 200),
                'status' => $faker->boolean($chanceOfGettingTrue = 50),
                'user_id' => $faker->unique()->numberBetween(1,50),              
                'created_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now')
            ]);
        } 
        return "Todos Created!";
    });


    
    Route::post('admin/add-todo', function(Request $request){
        $todo = new ToDo;
        $todo->name = $request->name;
        $todo->description = $request->description;
        $todo->status = $request->status;
        $todo->user_id = $request->user_id;
        $todo->save();
        return response()->json('ToDo Created!');
    });
    
    Route::post('admin/delete-todo', function(Request $req){
        $data = $req->input();
    
        ToDo::destroy($data['id']);
    });
    
    Route::post('admin/toggle-todo', function(Request $req){
        $data = $req->input();
    
        ToDo::where('id', $data['id'])->update(['status' => $data['status']]);
    });
    
    Route::post('admin/update-todo', function(Request $req){
        $data = $req->input();
    
        ToDo::where('id', $data['id'])
        ->update([
            'status' => $data['status'],
            'name' => $data['name'],
            'description' => $data['description']
        ]);
    });
    Route::get('admin/todos', function() {
        $todos = ToDo::all();
        return $todos;
    });
    Route::get('admin/todos/{id}', function($id) {
        $todos = ToDo::where('user_id', $id)->get();
        return $todos;
    });
});
