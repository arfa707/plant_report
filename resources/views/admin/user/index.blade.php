@extends('layouts.appuser')

@section('content')
<div class="col-lg-8">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
              
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
             
            </div>
            <h4 class="panel-title"><i class="fas fa-users"></i> Users</h4>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.user.index') }}" method="GET">
                <div class="form-group">
                    <div class="input-group mb-3">
                        @can('users.create')
                            <div class="input-group-prepend">
                                <a href="{{ route('admin.user.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                            </div>
                        @endcan
                        <input type="text" class="form-control" name="q"
                               placeholder="cari berdasarkan nama user">
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
                        <th scope="col">NAMA USER</th>
                        <th scope="col">ROLE</th>
                        <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $no => $user)
                        <tr>
                            <th scope="row" style="text-align: center">{{ ++$no + ($users->currentPage()-1) * $users->perPage() }}</th>
                            <td>{{ $user->name }}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $role)
                                        <label class="badge badge-success">{{ $role }}</label>
                                    @endforeach
                                @endif
                            </td>
                            <td class="text-center">
                                @can('users.edit')
                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                @endcan
                                
                                @can('users.delete')
                                    <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $user->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="text-align: center">
                    {{$users->links("vendor.pagination.bootstrap-4")}}
                </div>
            </div>
              
            </div>
        </div>
    </div>
</div>  
@endsection