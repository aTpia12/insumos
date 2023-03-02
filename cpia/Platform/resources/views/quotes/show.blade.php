@extends('layouts.admin')

@section('titulo')
<a href="{{ route('quotation.create') }}"><i class="fa-solid fa-newspaper"></a></i> <span>Cotizaciones</span>

@endsection

@section('contenido')

    <div class="card">
        <div class="card-body">
            <table id="dt-quotes" class="table table-striped table-bordered table-sm">
                <thead>
                    <tr>
                      <th>Serie</th>
                      <th>Folio</th>
                      <th>Subtotal</th>
                      <th>Desc. %</th>
                      <th>Total</th>
                      <td>Nota de remisión</td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($quotes as $quote)
                        <tr>
                            <td>{{ $quote->serie }}</td>
                            <td>{{ $quote->folio }}</td>
                            <td>{{ $quote->subtotal }}</td>
                            <td>{{ $quote->discount }}</td>
                            <td>{{ $quote->total }}</td>
                            <td style="text-align: center"><a href="{{ route('remissions.create', $quote->id) }}"><button class="btn btn-primary btn-sm">Crear</button></a></td>
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
    <script>
        $(document).ready(function (){
         if(window.jQuery){
        if($.fn.DataTable){
            $('#dt-quotes').DataTable({
                language: {
                    url: '../libs/datatables/spanish.json'
                }
            });
        }
    }
});
    </script>
@endpush