@extends('layouts.app')

@section('content')
<div class="container">
        <form method="GET" action="/g">
                @csrf
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                           Get All Users
                        </button>
                    </div>
                </div>
        </form>
        <div class="py-4">
            <form method="POST" action="/g" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name"  autocomplete="off" autofocus>

                            @error('name')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                        <div>
                            <input id="image" type="file" class="mt-2 ml-2" name="image"  autocomplete="off">

                            @error('image')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Post The User
                            </button>
                        </div>
                    </div>
            </form>
        <div class="{{$visible ?? 'invisible'}} container py-3">
            @if($created ?? '')
                <div  class="alert alert-success alert-dismissible fade show text-center py-3 " role="alert">
                    User Created
                </div>
            @else
            <div  class="alert alert-danger alert-dismissible fade show text-center py-3 " role="alert">
                    User is Not created
            </div>
            @endif
        </div>
    </div>
</div>
@endsection