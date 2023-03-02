@extends('layouts.admin')

@section('titulo')
    <span><a href="{{ route('customers.index') }}"><i class="fa-solid fa-building"></i></a> {{ $customer->business_name }}</span>
    | Sucursales
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdlSubsidiary">
        <i class="fas fa-plus"></i>
    </a>
@endsection

@section('contenido')

    @include('subsidiaries.modals.create')

    <div class="card">
        <div class="card-body">
            <table id="dt-subsidiaries" class="table table-striped table-bordered dts table-sm">
                <thead>
                    <th>Alias</th>
                    <th>Teléfono</th>
                    <th>Correo electrónico</th>
                    <th>Dirección de envío</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($subsidiaries as $subsidiary)
                    
                        <tr class="text-center">
                            <td>{{ $subsidiary->alias }}</td>
                            <td>{{ $subsidiary->telephone }}</td>
                            <td>{{ $subsidiary->email }}</td>
                            <td>{{ $subsidiary->send_address }}</td>
                            <td>
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdlCustomer">
                                    <i class="fas fa-edit"></i>
                                </a> 
                                |
                                <a href="{{ route('subsidiaries.index') }}" class="edit-form-data" title="Sucursales">
                                    <i class="fas fa-store"></i>
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
                    $('#createMdlSubsidiary').modal('show');
                });
            </script>
        @else
            <script>
                $(function (){
                    $('#editMdlCustomer').modal('show');
                });
            </script>
        @endif
    @endif
@endpush