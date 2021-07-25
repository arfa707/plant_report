@extends('layouts.appuser')

@section('content')
<div class="col-lg-8">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
              
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
             
            </div>
            <h4 class="panel-title">EDIT ROLE</h4>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.role.update', $role->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>NAMA ROLE</label>
                    <input type="text" name="name" value="{{ old('name', $role->name) }}" placeholder="Masukkan Nama Role"
                        class="form-control @error('title') is-invalid @enderror">

                    @error('name')
                    <div class="invalid-feedback" style="display: block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">PERMISSIONS</label>
                    
                    @foreach ($permissions as $permission)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="check-{{ $permission->id }}" @if($role->permissions->contains($permission)) checked @endif>
                        <label class="form-check-label" for="check-{{ $permission->id }}">
                            {{ $permission->name }}
                        </label>
                    </div>
                    @endforeach
                </div>

                <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                    UPDATE</button>
                <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

            </form>
        </div>
    </div>
</div>  
@endsection

