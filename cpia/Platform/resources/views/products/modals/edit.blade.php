<!-- Modal -->
<div class="modal fade" id="editMdlProduct{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.store') }}" role="form" method="post" id="createStoreFrm">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="store_id" class="required">Almacen</label>
                        <select name="store_id" id="store_id" class="form-control" aria-label="Default select example">
                            @foreach ($stores as $store)
                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category_id" class="required">Categoria</label>
                        <select name="category_id" id="category_id" class="form-control" aria-label="Default select example">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name" class="required">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" placeholder="Ingrese el nombre del producto" value="{{old('name', '')}}">
                        @if ($errors->has('name'))
                            <span class="text-danger">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description" class="required">Descripción </label>
                        <textarea name="description" id="description" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" placeholder="Ingrese descripción(Opcional...)" value="{{old('description', '')}}"></textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">
                      <strong>{{ $errors->first('description') }}</strong>
                  </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="internal_code" class="required">Código interno </label>
                        <input type="text" name="internal_code" id="internal_code" class="form-control {{$errors->has('internal_code') ? 'is-invalid' : ''}}" placeholder="Ingrese el código interno">
                        @if ($errors->has('internal_code'))
                            <span class="text-danger">
                      <strong>{{ $errors->first('internal_code') }}</strong>
                  </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="code" class="required">Código </label>
                        <input type="text" name="code" id="code" class="form-control {{$errors->has('code') ? 'is-invalid' : ''}}" placeholder="Ingrese el código">
                        @if ($errors->has('code'))
                            <span class="text-danger">
                    <strong>{{ $errors->first('code') }}</strong>
                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="barcode" class="required">Código de barras </label>
                        <input type="text" name="barcode" id="barcode" class="form-control {{$errors->has('barcode') ? 'is-invalid' : ''}}" placeholder="Ingrese el código de barras">
                        @if ($errors->has('barcode'))
                            <span class="text-danger">
                    <strong>{{ $errors->first('barcode') }}</strong>
                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price" class="required">Precio </label>
                        <input type="text" name="price" id="price" class="form-control {{$errors->has('price') ? 'is-invalid' : ''}}" placeholder="Ingrese el precio">
                        @if ($errors->has('price'))
                            <span class="text-danger">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-label">Imagen</label>
                        <input class="form-control" type="file" id="image" name="image">
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
