@extends('layouts.admin')

@section('titulo')
    <span>Clientes</span>

    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdlCustomer">
        <i class="fas fa-plus"></i>
    </a>
@endsection

@section('contenido')

    @include('customers.modals.create')
    
    <div class="card">
        <div class="card-body">
            <table id="dt-customers" class="table table-striped table-bordered dts table-sm">
                <thead>
                    <th>Razón social</th>
                    <th>RFC</th>
                    <th>Código postal</th>
                    <th>Ciudad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                    
                        <tr class="text-center">
                            <td>{{ $customer->business_name }}</td>
                            <td>{{ $customer->rfc }}</td>
                            <td>{{ $customer->zipcode }}</td>
                            <td>{{ $customer->city }}</td>
                            <td>{{ $customer->state }}</td>
                            <td>
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdlCustomer">
                                    <i class="fas fa-edit"></i>
                                </a> 
                                |
                                <a href="{{ route('subsidiaries.show', $customer->id) }}" 
                                    onclick="document.getElementById('sucusto').submit();" 
                                    class="edit-form-data" 
                                    title="Sucursales">
                                        <i class="fas fa-store"></i>
                                </a>
                                {{-- <form style="display: none" action="{{ route('subsidiaries.show', $customer->id) }}" id="sucusto" method="GET">
                                    @csrf
                                </form> --}}
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
                    $('#createMdlCustomer').modal('show');
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