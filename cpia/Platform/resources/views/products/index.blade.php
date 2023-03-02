@extends('layouts.admin')

@section('titulo')
    <span>Productos</span>

    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdlProduct">
        <i class="fas fa-plus"></i>
    </a>
@endsection

@section('contenido')

    @include('products.modals.create')

    <div class="card">
        <div class="card-body">
            <table id="dt-products" class="table table-striped table-bordered dts table-sm">
                <thead>
                    <tr>
                      <th>Categoria</th>
                      <th>Nombre</th>
                      <th>Descripción</th>
                      <th>Imagen</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $product)
                        @include('products.modals.edit')
                    <tr>

                      <td>{{$product->category->name}}</td>
                      <td>{{$product->name}}</td>
                      <td>{{$product->description}}</td>
                      <td>
                        <img src="{{ asset($product->image) }}" class="img-fluid img-thumbnail" width="120px">
                      </td>
                        <td>
                            <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdlProduct{{$product->id}}">
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
                    $('#createMdlProduct').modal('show');
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
