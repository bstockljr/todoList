<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Todos;
use Illuminate\Http\Request;

class TodosController extends Controller
{



        // public function users()
        // {
        //     $users_todo = User::find(1)->name;

           
        // }

        // public function admins()
        // {
        //     $admins_todo = Admin::find(1)->name;

            
        // }

        //FETCH
        public function index()
        {
            $todos = Todos::with(['admins','users'])->get();
            // $lastTodo->load('relation')

            foreach ( $todos as $todo){
            $todo->user = null;
                    if( count($todo->admins) > 0){

                    $admins_ids = [];
                        foreach ( $todo->admins as $admin){
                            array_push($admins_ids, $admin->id);
                        }

                        $todo->user_type = "Admin";
                        $todo->adminsIds = $admins_ids;



                        //    $todo->user = $todo->admins[0];
                        //    $todo->userId = $todo->admins[0]->id;
                    //    $todo->username = $todo->admins[0]->name;
                    // }else{
                    //     $admin = Admin::find($todo->user);
                    //     $todo->username = $admin->name;
                    // }
                    }
                    if( count($todo->users) > 0){
                    $users_ids = [];
                        foreach ( $todo->users as $user){
                            array_push($users_ids, $user->id);
                        }
                        
                        $todo->user_type = "user";
                        $todo->usersIds = $users_ids;

                        // $todo->user = $todo->users[0];
                        // $todo->userId = $todo->users[0]->id;
                    }
                    // $todo->username = $todo->users[0]->name;
                


                // foreach ( $todos as $todo){
                //     if($todo->user_type === 'user'){
                //         $user = User::find($todo->user);
                //         $todo->username = $user->name;
                //     }else{
                //         $admin = Admin::find($todo->user);
                //         $todo->username = $admin->name;
                //     }
                // }
                
            }
            return response()->json($todos, 201);   
        
    }
        //ADD
        public function create(Request $request)
        {
            $lastTodo = Todos::create([
                'item'=>$request->get('item'),
                // 'user'=>$request->get('user'),
                // 'user_type'=>$request->get('user_type')
            ]);
            if($request->user_type === 'Admin'){
                $lastTodo->admins()->attach($request->user);
                $lastTodo->load('admins');
            }
            else{
                $lastTodo->users()->attach($request->user);
                $lastTodo->load('users');
            }
            
            return response()->json($lastTodo, 201);
        }

    

        //DELETE
        public function destroy($id)
        {
            $existItem = Todos::find($id);
            
            if( $existItem ){
                $existItem->users()->sync([]);
                $existItem->admins()->sync([]);
                $existItem->delete();
                return "Item successfully deleted.";
            }
            return "Item not found.";
        }
        

        //UPDATE
        public function update(Request $request)
        {
            $existItem = Todos::find($request->get('id'));
                if( $existItem ){
                    $existItem->completed= $request->get('completed');
                    $existItem->item= $request->get('item');
                    // $existItem->user= $request->get('user');
                    // $existItem->user_type= $request->get('user_type');
                    $existItem->save();
                }

                $existItem->admins()->sync([]);
                $existItem->users()->sync([]);
                
                if($request->user_type === 'Admin'){
                    $existItem->admins()->attach($request->userAdmin);
                    $existItem->load('admins');

                }else{
                    $existItem-> users()->attach($request->userUser);
                    $existItem->load('users');
                }
                
                return response()->json($existItem, 201);            
        }
        
        





        public function store(Request $request)
        {
           $newItem = new Todos();
           $newItem->name = $request->item["name"];
           $newItem->save();
           return $newItem;
        }


        public function show()
        {
            //
        }
    
    
        public function edit()
        {
            //
        }
    
      
    
      
    }
    