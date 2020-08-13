@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($users as $user)
        <div class="container py-3">
            <span class="d-flex">
                    <a href="/g/{{$user->id}}"><img class="thumbnail"  width="200" src="/storage/{{$user->image}}" alt="No Image!"/></a>
                    <div class="px-4">
                        <p>id:{{$user->id}}</p>
                        <p>name:{{$user->name}}</p>
                        <p>created:{{$user->created_at}}</p>
                        <p>updated:{{$user->updated_at}}</p>
                    </div>
            </span>
        </div>
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$users->links()}}
        </div>
    </div>
</div>
@endsection