@extends('layouts.app')

@section('content')
    <div class="container py-3">
            <div class="d-flex">
                <div class="align-items-baseline justify-content-between"><img class="thumbnail"  width="200" src="/storage/{{$user->image}}" alt="Not Worked!"/></div>
                <div class="px-4 align-items-baseline justify-content-between">
                    <p>id:{{$user->id}}</p>
                    <p>name:{{$user->name}}</p>
                    <p>created:{{$user->created_at}}</p>
                    <p>updated:{{$user->updated_at}}</p>
                </div>
            <div class="align-items-baseline justify-content-between px-5"><a href="/g/{{$user->id}}/edit">Update</a></div>
            <div class="align-items-baseline justify-content-between px-5">
                <form method="POST" action="/g/{{$user->id}}">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-primary">
                            Delete The User
                        </button>
                </form>
            </div>
        </div>
    </div>
@endsection