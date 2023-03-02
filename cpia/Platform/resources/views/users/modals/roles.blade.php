<!-- Modal -->
<div class="modal fade" id="rolesMdl{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Asignar Rol</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('role.update', $user->id)}}" role="form" method="POST" id="asignRol">
            @method('PUT')
            {{ csrf_field() }}
            <div class="mb-3">
                <select class="form-control" aria-label="Default select example" id="rU">
                    @foreach ($roles as $rol)
                        <option value="{{$rol->name}}" @if($user->roles[0]["name"] == $rol->name) selected @endif>{{ $rol->name }}</option>
                    @endforeach
                  </select>
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
