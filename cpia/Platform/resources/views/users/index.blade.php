@extends('layouts.admin')

@section('titulo')
    <span>Usuarios</span>

    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdlUser">
        <i class="fas fa-plus"></i>
    </a>
@endsection

@section('contenido')

@include('users.modals.create')

    <div class="card">
        <div class="card-body">
            <table id="dt-stores" class="table table-striped table-bordered dts table-sm">
                <thead>
                    <th>Nombre de usuario</th>
                    <th>Rol</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    @include('users.modals.roles')
                        <tr class="text-center">
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->roles[0]["name"] }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl">
                                    <i class="fas fa-edit"></i>
                                </a>
                                 | 
                                <a href="" class="edit-form-data" style="color: salmon" data-toggle="modal" data-target="#rolesMdl{{$user->id}}">
                                    <i class="fa-solid fa-ban"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/datatables.bootstrap4.min.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>

    @if (!$errors->isEmpty())
        @if ($errors->has('post'))
            <script>
                $(function (){
                    $('#createMdlUser').modal('show');
                });
            </script>
        @else
            <script>
                $(function (){
                    $('#editMdl').modal('show');
                });
            </script>
        @endif
    @endif
    <script>
        $('#titl').html('jojo');
    </script>
@endpush