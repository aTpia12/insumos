<!-- Modal -->
<div class="modal fade" id="createMdlCustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('customers.store') }}" role="form" method="post" id="createStoreFrm">
            {{ csrf_field() }}
            <div class="row">
                <div class="mb-3 col-md-8">
                    <label for="business_name" class="form-label">Razón social</label>
                    <input 
                        type="text" 
                        class="form-control {{$errors->has('business_name') ? 'is-invalid' : ''}}" 
                        id="business_name" name="business_name" 
                        placeholder="-"
                        value="{{ old('business_name') }}"
                    >
                    @if ($errors->has('business_name'))
                        <span class="text-danger">{{$errors->first('business_name')}}</span>
                    @endif
                </div>
                <div class="mb-3 col">
                    <label for="rfc" class="form-label">RFC</label>
                    <input 
                        type="text" 
                        class="form-control {{$errors->has('rfc') ? 'is-invalid' : ''}}" 
                        id="rfc" name="rfc" 
                        placeholder="-"
                        value="{{ old('rfc') }}"
                    >
                    @if ($errors->has('rfc'))
                        <span class="text-danger">{{$errors->first('rfc')}}</span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="zipcode" class="form-label">Código postal</label>
                    <input 
                        type="text" 
                        class="form-control {{$errors->has('zipcode') ? 'is-invalid' : ''}}" 
                        id="zipcode" name="zipcode" 
                        placeholder="-"
                        value="{{ old('zipcode') }}"
                    >
                    @if ($errors->has('zipcode'))
                        <span class="text-danger">{{$errors->first('zipcode')}}</span>
                    @endif
                </div>
                <div class="mb-3 col">
                    <label for="colony" class="form-label">Colonia</label>
                    <input 
                        type="text" 
                        class="form-control {{$errors->has('colony') ? 'is-invalid' : ''}}" 
                        id="colony" name="colony" 
                        placeholder="-"
                        value="{{ old('colony') }}"
                    >
                    @if ($errors->has('colony'))
                        <span class="text-danger">{{$errors->first('colony')}}</span>
                    @endif
                </div>
                <div class="mb-3 col">
                    <label for="street" class="form-label">Calle</label>
                    <input 
                        type="text" 
                        class="form-control {{$errors->has('street') ? 'is-invalid' : ''}}" 
                        id="street" name="street" 
                        placeholder="-"
                        value="{{ old('street') }}"
                    >
                    @if ($errors->has('street'))
                        <span class="text-danger">{{$errors->first('street')}}</span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="out_number" class="form-label">Número exterior</label>
                    <input 
                        type="text" 
                        class="form-control {{$errors->has('out_number') ? 'is-invalid' : ''}}" 
                        id="out_number" name="out_number" 
                        placeholder="-"
                        value="{{ old('out_number') }}"
                    >
                    @if ($errors->has('out_number'))
                        <span class="text-danger">{{$errors->first('out_number')}}</span>
                    @endif
                </div>
                <div class="mb-3 col">
                    <label for="int_number" class="form-label">Número interior</label>
                    <input 
                        type="text" 
                        class="form-control {{$errors->has('int_number') ? 'is-invalid' : ''}}" 
                        id="int_number" name="int_number" 
                        placeholder="-"
                        value="{{ old('int_number') }}"
                    >
                    @if ($errors->has('int_number'))
                        <span class="text-danger">{{$errors->first('int_number')}}</span>
                    @endif
                </div>
                <div class="mb-3 col">
                    <label for="locally" class="form-label">Localidad</label>
                    <input 
                        type="text" 
                        class="form-control {{$errors->has('locally') ? 'is-invalid' : ''}}" 
                        id="locally" name="locally" 
                        placeholder="-"
                        value="{{ old('locally') }}"
                    >
                    @if ($errors->has('locally'))
                        <span class="text-danger">{{$errors->first('locally')}}</span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="city" class="form-label">Ciudad</label>
                    <input 
                        type="text" 
                        class="form-control {{$errors->has('city') ? 'is-invalid' : ''}}" 
                        id="city" name="city" 
                        placeholder="-"
                        value="{{ old('city') }}"
                    >
                    @if ($errors->has('city'))
                        <span class="text-danger">{{$errors->first('city')}}</span>
                    @endif
                </div>
                <div class="mb-3 col">
                    <label for="state" class="form-label">Estado</label>
                    <input 
                        type="text" 
                        class="form-control {{$errors->has('state') ? 'is-invalid' : ''}}" 
                        id="state" name="state" 
                        placeholder="-"
                        value="{{ old('state') }}"
                    >
                    @if ($errors->has('state'))
                        <span class="text-danger">{{$errors->first('state')}}</span>
                    @endif
                </div>
                <div class="mb-3 col">
                    <label for="country" class="form-label">País</label>
                    <input 
                        type="text" 
                        class="form-control {{$errors->has('country') ? 'is-invalid' : ''}}" 
                        id="country" name="country" 
                        placeholder="-"
                        value="{{ old('country') }}"
                    >
                    @if ($errors->has('country'))
                        <span class="text-danger">{{$errors->first('country')}}</span>
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