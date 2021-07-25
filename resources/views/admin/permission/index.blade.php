@extends('layouts.appuser')

@section('content')
<div class="col-lg-8">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
              
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
             
            </div>
            {{-- <h4 class="panel-title">Roles</h4> --}}
            <h4 class="panel-title"><i class="fas fa-key"></i>  Permissions</h4>
        </div>
        <div class="panel-body">
          
            <form action="{{ route('admin.permission.index') }}" method="GET">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="q"
                               placeholder="cari berdasarkan nama permissions">
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
                        <th scope="col">NAMA PERMISSION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($permissions as $no => $permission)
                        <tr>
                            <th scope="row" style="text-align: center">{{ ++$no + ($permissions->currentPage()-1) * $permissions->perPage() }}</th>
                            <td>{{ $permission->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="text-align: center">
                    {{ $permissions->links("vendor.pagination.bootstrap-4") }}
                </div>
            </div>
            </div>
        </div>
    </div>
</div>  
@endsection