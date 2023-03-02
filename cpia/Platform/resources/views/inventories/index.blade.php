@extends('layouts.admin')

@section('titulo')
    <span>Inventario</span>

    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdlInventory">
        <i class="fas fa-plus"></i>
    </a>
@endsection

@section('contenido')
    @include('inventories.modals.create')
    <div class="card">
        <div class="card-body">
            <table id="dt-products" class="table table-striped table-bordered dts table-sm">
                <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Lote</th>
                    <th>Costo</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($inventories as $inventory)

                    <tr>
                        <td>{{$inventory->product->name}}</td>
                        <td>{{$inventory->cant}}</td>
                        <td>{{$inventory->lote}}</td>
                        <td>{{$inventory->cost}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/datatables.bootstrap4.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
    <script>
        $(document).ready(function (){
            $('.dos-sm').select2({
                matcher(params, data) {
                    const originalMatcher = $.fn.select2.defaults.defaults.matcher;
                    const result = originalMatcher(params, data);

                    if (
                        result &&
                        data.children &&
                        result.children &&
                        data.children.length
                    ) {
                        if (
                            data.children.length !== result.children.length &&
                            data.text.toLowerCase().includes(params.term.toLowerCase())
                        ) {
                            result.children = data.children;
                        }
                        return result;
                    }

                    return null;
                },
            });
        });
    </script>
@endpush
