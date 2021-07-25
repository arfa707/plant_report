@extends('layouts.appuser')

@section('content')
<div class="col-lg-8">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
              
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
             
            </div>
            <h4 class="panel-title"><i class="fas fa-unlock"></i> Roles</h4>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.role.index') }}" method="GET">
                <div class="form-group">
                    <div class="input-group mb-3">
                        @can('roles.create')
                            <div class="input-group-prepend">
                                <a href="{{ route('admin.role.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                            </div>
                        @endcan
                        <input type="text" class="form-control" name="q"
                               placeholder="cari berdasarkan nama role">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> CARI
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" style="text-align: center;width: 6%">NO.</th>
                        <th scope="col" style="width: 15%">NAMA ROLE</th>
                        <th scope="col">PERMISSIONS</th>
                        <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $no => $role)
                        <tr>
                            <th scope="row" style="text-align: center">{{ ++$no + ($roles->currentPage()-1) * $roles->perPage() }}</th>
                            <td>{{ $role->name }}</td>
                            <td>
                                @foreach($role->getPermissionNames() as $permission)
                                    <button class="btn btn-sm btn-success mb-1 mt-1 mr-1">{{ $permission }}</button>
                                @endforeach
                            </td>
                            <td class="text-center">
                                @can('roles.edit')
                                    <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                @endcan
                                
                                @can('roles.delete')
                                    <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $role->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="text-align: center">
                    {{$roles->links("vendor.pagination.bootstrap-4")}}
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection