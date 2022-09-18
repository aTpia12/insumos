<!-- Modal -->
<div class="modal fade" id="createMdl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar almacen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('stores.store') }}" role="form" method="post" id="createStoreFrm">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input 
                    type="text" 
                    class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" 
                    id="name" name="name" 
                    placeholder="-"
                    value="{{ old('name') }}"
                >
                @if ($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        </div>
      </div>
    </div>
  </div>