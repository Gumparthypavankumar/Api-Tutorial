<?php

namespace App\Http\Controllers;

use App\userdata;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class apiController extends Controller
{
   public function index()
   {
       // returning the view of index page
       $users = userdata::paginate(3);
       return view('api.index',compact('users'));
   } 
   public function show(\App\userdata $user)
   {
       $user = userdata::find($user->id);
       return view('api.show',compact('user'));
   }
   public function store()
   {
       $usersbefore = userdata::count();
    //    dd(request()->all());
       $data = request()->validate([
           'name' => 'required',
           'image' => ['nullable','image']
       ]);
       if(request('image'))
       {
            $imagePath = request('image')->store('profile','public');
            $image = Image::make(public_path("/storage/{$imagePath}"))->fit(100,100);
            $image->save();
            $data['image'] =$imagePath;
       }
       userdata::create($data);
       $usersafter = userdata::count();
       if($usersafter > $usersbefore)
       {
       $created = true;//user created
       $visible = 'visible';
       return view('api.home',compact('created','visible'));
       }
       else
       {
           return view('api.home',compact('notcreated'));
       }
   }
   public function edit($id)
   {
    return view('api.edit',compact('id'));
   }
   public function update(\App\userdata $user)
   {
    $data = request()->validate([
        'name' => 'required',
        'image' => ['nullable','image'],
       ]);
    if(request('image'))
    {
        $imagePath = request('image')->store('profile','public');
        $image = Image::make(public_path("/storage/{$imagePath}"))->fit(100,100);
        $image->save();
        $user->image =$imagePath;
    }
    $user->name=request('name');
    $user->update(['name' => $user->name ,'image' => $user->image]);
    return redirect('./g/'.$user->id);
   }
   public function destroy($id)
   {
    userdata::destroy($id);
    return redirect('/g');
   }
}
