@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 ">
                    <div class="card">
                        <div class="card-body p-4">
                            <h5 class="card-title">Edit Profile : {{ $user->name }}</h5>
                            <hr/>
                            @if($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            @endif
                            <form method="POST" action="{{ route('profile.update', auth()->id()) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-body mt-3">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class=" py-3 rounded">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input id="name" class="form-control" type="text"
                                                           name="name" value="{{ old("name", $user->name) }} ">
                                                    @error('name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input id="email" class="form-control" type="email"
                                                           name="email" value="{{ old("email", $user->email) }}">
                                                    @error('email')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password : (if changing password)</label>
                                                    <input id="password" class="form-control" type="password"
                                                           name="password" >
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password_confirmation" class="form-label">Confirm Password : (if changing password)</label>
                                                    <input id="password_confirmation" class="form-control" type="password"
                                                           name="password_confirmation" >
                                                    @error('password_confirmation')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="role_name" class="form-label">Role</label>
                                                    <input id="role_name" class="form-control bg-white text-uppercase" type="text" readonly
                                                           name="role_name" value="{{ $role->roles[0]->name }} ">
                                                    @error('role_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <button class="btn btn-primary" type="submit">Save Profile</button>
                                            </div>
                                        </div>
                                    </div><!--end row-->
                                </div>
                            </form>
                            @if(session('success'))
                                <div class="alert alert-info mt-3" id="alert-success"> {{ session('success') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('javascript')

@endsection

