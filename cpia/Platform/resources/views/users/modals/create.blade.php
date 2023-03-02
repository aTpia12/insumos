<!-- Modal -->
<div class="modal fade" id="createMdlUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('users.store') }}" role="form" method="post" id="createUserFrm">
            {{ csrf_field() }}
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" 
                        class="form-control form-control-user {{$errors->has('name') ? 'is-invalid' : ''}}" 
                        name="name" id="name"
                        placeholder="Nombre">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="col-sm-6">
                    <input type="text" 
                        class="form-control form-control-user {{$errors->has('username') ? 'is-invalid' : ''}}" 
                        name="username" 
                        id="username"
                        placeholder="Nombre de usuario">
                    @if ($errors->has('username'))
                        <span class="text-danger">{{$errors->first('username')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <input type="email" 
                    class="form-control form-control-user {{$errors->has('email') ? 'is-invalid' : ''}}" 
                    name="email" 
                    id="email"
                    placeholder="Correo eléctronico">
                @if ($errors->has('email'))
                    <span class="text-danger">{{$errors->first('email')}}</span>
                @endif
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" 
                        class="form-control form-control-user {{$errors->has('password') ? 'is-invalid' : ''}}"
                        id="password" 
                        name="password" 
                        placeholder="Contraseña">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{$errors->first('password')}}</span>
                    @endif
                </div>
                <div class="col-sm-6">
                    <select class="form-control" name="rol" aria-label="Default select example">
                        @foreach ($roles as $rol)
                            <option value="{{$rol->name}}">{{ $rol->name }}</option>
                        @endforeach
                    </select>
                </div>
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