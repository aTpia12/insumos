<!-- Modal -->
<div class="modal fade" id="createMdlInventory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar inventario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('inventories.store') }}" role="form" method="post" id="createStoreFrm">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Productos</label>
                        <select class="dos-sm form-control" id="mySelect" name="product_id">
                            <option value="">Selecciona producto...</option>
                            @foreach ($categories as $category)
                                <optgroup label="{{ $category->name }}">
                                    @foreach ($category->products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name" class="required">Cantidad</label>
                        <input type="number" min="1"  name="cant" id="cant" class="form-control {{$errors->has('cant') ? 'is-invalid' : ''}}" placeholder="Ingrese cantidad" value="{{old('cant', '')}}">
                        @if ($errors->has('cant'))
                            <span class="text-danger">
                      <strong>{{ $errors->first('cant') }}</strong>
                  </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description" class="required">Lote </label>
                        <input type="text" name="lote" id="lote" class="form-control {{$errors->has('lote') ? 'is-invalid' : ''}}" placeholder="Ingrese lote" value="{{old('lote', '')}}">
                        @if ($errors->has('lote'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('lote') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description" class="required">Caducidad </label>
                        <input type="text" name="cad" id="lote" class="form-control {{$errors->has('cad') ? 'is-invalid' : ''}}" placeholder="Ingrese caducidad" value="{{old('cad', '')}}">
                        @if ($errors->has('cad'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('cad') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="internal_code" class="required">Costo </label>
                        <input type="text" name="cost" id="cost" class="form-control {{$errors->has('cost') ? 'is-invalid' : ''}}" placeholder="Ingrese el costo del producto...">
                        @if ($errors->has('cost'))
                            <span class="text-danger">
                      <strong>{{ $errors->first('cost') }}</strong>
                  </span>
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
