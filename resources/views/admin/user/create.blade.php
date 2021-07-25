@extends('layouts.appuser')

@section('content')
<div class="col-lg-8">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
              
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
             
            </div>
            <h4 class="panel-title">TAMBAH USER</h4>
        </div>
        <div class="panel-body">
          
            <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>NAMA USER</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama User"
                        class="form-control @error('name') is-invalid @enderror">

                    @error('name')
                    <div class="invalid-feedback" style="display: block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>EMAIL</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email"
                        class="form-control @error('email') is-invalid @enderror">

                    @error('email')
                    <div class="invalid-feedback" style="display: block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>PASSWORD</label>
                            <input type="password" name="password" value="{{ old('password') }}" placeholder="Masukkan Password"
                                class="form-control @error('password') is-invalid @enderror">

                            @error('password')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>PASSWORD</label>
                            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Masukkan Konfirmasi Password"
                                class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">ROLE</label>
                    
                    @foreach ($roles as $role)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="role[]" value="{{ $role->name }}" id="check-{{ $role->id }}">
                        <label class="form-check-label" for="check-{{ $role->id }}">
                            {{ $role->name }}
                        </label>
                    </div>
                    @endforeach
                </div>

                <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                    SIMPAN</button>
                <button class="btn btn-warning mr-1 btn-reset" type="reset"><i class="fa fa-redo"></i> 
                    RESET</button>
            </form>
            </div>
        </div>
    </div>
</div>  
@endsection