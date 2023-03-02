<!-- Modal -->
<div class="modal fade" id="createMdlSubsidiary" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar sucursal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('subsidiaries.store', $customer) }}" name="customer_id" role="form" method="POST" id="createSubsidiaryFrm">

            {{ csrf_field() }}
            <input hidden type="text" name="customer_id" value="{{ $customer->id }}">
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" 
                        class="form-control form-control-user {{$errors->has('alias') ? 'is-invalid' : ''}}" 
                        name="alias" id="alias"
                        placeholder="Alias">
                    @if ($errors->has('alias'))
                        <span class="text-danger">{{$errors->first('alias')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" 
                        class="form-control form-control-user {{$errors->has('telephone') ? 'is-invalid' : ''}}" 
                        name="telephone" id="telephone"
                        placeholder="Teléfono">
                    @if ($errors->has('telephone'))
                        <span class="text-danger">{{$errors->first('telephone')}}</span>
                    @endif
                </div>
                <div class="col-sm-6">
                    <input type="mail" 
                        class="form-control form-control-user {{$errors->has('email') ? 'is-invalid' : ''}}" 
                        name="email" 
                        id="email"
                        placeholder="Correo eléctronico">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{$errors->first('email')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <textarea 
                        class="form-control form-control-user {{$errors->has('send_address') ? 'is-invalid' : ''}}"
                        id="send_address" 
                        name="send_address" 
                        placeholder="Dirección de envio..."></textarea>
                    @if ($errors->has('send_address'))
                        <span class="text-danger">{{$errors->first('send_address')}}</span>
                    @endif
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