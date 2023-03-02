@extends('layouts.admin')

@section('titulo')
    <span>Almacenes</span>

    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>
@endsection

@section('contenido')

    @include('stores.modals.create')
    
    <div class="card">
        <div class="card-body">
            <table id="dt-stores" class="table table-striped table-bordered dts table-sm">
                <thead>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($stores as $store)
                    @include('stores.modals.edit')
                        <tr class="text-center">
                            <td>{{ $store->name }}</td>
                            <td>
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl{{$store->id}}">
                                    <i class="fas fa-edit"></i>
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
                    $('#createMdl').modal('show');
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
@endpush