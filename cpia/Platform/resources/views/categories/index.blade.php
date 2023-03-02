@extends('layouts.admin')

@section('titulo')
    <span>Categorias</span>

    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdlCategory">
        <i class="fas fa-plus"></i>
    </a>
@endsection

@section('contenido')
@include('categories.modals.create')
    <div class="card">
        <div class="card-body">
            <table id="dt-categories" class="table table-striped table-bordered dts table-sm">
                <thead>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        @include('categories.modals.edit')
                        <tr class="text-center">
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl{{$category->id}}">
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
                    $('#createMdlCategory').modal('show');
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
