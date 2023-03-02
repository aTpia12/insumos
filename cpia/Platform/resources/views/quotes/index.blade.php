@extends('layouts.admin')

@section('titulo')
    <span>Cotizaciones</span>
    <a href="{{ route('quotation.list') }}"><i class="fa-solid fa-magnifying-glass"></i></a>
@endsection

@section('contenido')
    <div class="col-md-8">
        <label>Cliente(s)</label>
        <select class="js-example-basic-single form-control" id="subsidiaries" name="subsidiaries">
        @foreach ($customers as $customer)
            <optgroup label="{{ $customer->business_name }}">
                @foreach ($customer->subsidiaries as $subsidiary)
                    <option value="{{ $subsidiary->id }}">{{ $subsidiary->alias }}</option>
                @endforeach
            </optgroup>
        @endforeach
        </select>
    </div>
    <br>
    <div class="col-md-8">
        <label>Productos</label>
        <select class="js-example-basic-single form-control" id="mySelect2" name="product">
            <option value="">Selecciona producto...</option>
        @foreach ($categories as $category)
            <optgroup label="{{ $category->name }}">
                @foreach ($category->products as $product)
                    <option value="{{ $product }}">{{ $product->name }}</option>
                @endforeach
            </optgroup>
        @endforeach
        </select>
    </div>
    <div class="custom-control custom-switch float-right">
        <input type="checkbox" class="custom-control-input" id="customSwitch1">
        <label class="custom-control-label" for="customSwitch1">Imagenes</label>
    </div><br>
    <hr>
    <div class="card">
        <div class="card-body" id="cont">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Cantidad</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Descripción Alterna</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </thead>
                <tbody id="tbodyP">

                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-8">
            <button class="btn-submit btn btn-primary">Guardar y enviar</button><br><br>
            <input
                class="form-control form-control-sm"
                type="text"
                style="width: 340px; font-weight: bold"
                value="VIGENCIA DE COTIZACIÓN 15 DÍAS"
                id="cotField1"
            /><br>
            <input
                class="form-control form-control-sm"
                type="text"
                style="width: 340px; font-weight: bold"
                value="CONDICIONES DE PAGO: CRÉDITO"
                id="cotField2"
            /><br>
            <input
                class="form-control form-control-sm"
                type="text"
                style="width: 340px; font-weight: bold"
                value="TIEMPO DE ENTREGA *** ENTREGA INMEDIATA"
                id="cotField3"
            />
        </div>
        <div class="col-md-4">
            <table>
                <tr>
                    <td colspan="2">Subtotal: </td>
                    <td></td>
                    <td id="subTotal"></td>
                </tr>
                <tr>
                    <td colspan="2">IVA: </td>
                    <td>(16%)</td>
                    <td id="iva"></td>
                </tr>
                <tr>
                    <td colspan="2">Descuento: </td>
                    <td>
                        <input type="number" id="discProd" onchange="calc()" style="width: 70px" min="0" max="100">
                    </td>
                    <td id="descuento"></td>
                </tr>
                <tr>
                    <td colspan="1">Total: </td>
                    <td></td>
                    <td id="toTal"></td>
                </tr>
            </table>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/datatables.bootstrap4.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
        let products = [];
        let totales = [];
        let field1 = $("#cotField1").val();
        let field2 = $("#cotField2").val();
        let field3 = $("#cotField3").val();
        let fields = [field1, field2, field3];
        let content = document.querySelector("#tbodyP");
        let subTotal = document.querySelector("#subTotal");
        let toTal = document.querySelector("#toTal");
        let descuento = document.querySelector("#descuento");
        let desgloceIva = document.querySelector("#iva");

        $(document).ready(function() {

            $('.js-example-basic-multiple').select2({
                matcher(params, data) {
                const originalMatcher = $.fn.select2.defaults.defaults.matcher;
                const result = originalMatcher(params, data);

                if (
                    result &&
                    data.children &&
                    result.children &&
                    data.children.length
                ) {
                    if (
                        data.children.length !== result.children.length &&
                        data.text.toLowerCase().includes(params.term.toLowerCase())
                    ) {
                        result.children = data.children;
                    }
                    return result;
                }

                    return null;
                },
            });

            $('.js-example-basic-single').select2({
                matcher(params, data) {
                const originalMatcher = $.fn.select2.defaults.defaults.matcher;
                const result = originalMatcher(params, data);

                if (
                    result &&
                    data.children &&
                    result.children &&
                    data.children.length
                ) {
                    if (
                        data.children.length !== result.children.length &&
                        data.text.toLowerCase().includes(params.term.toLowerCase())
                    ) {
                        result.children = data.children;
                    }
                    return result;
                }

                    return null;
                },
            });


            //Product
            $('#mySelect2').on('select2:select', function (e) {
                var data =  e.params.data;
                let product = JSON.parse(data.id);

                    let findProduct = products.find(element => element.id === product.id);
                    if(!findProduct){

                        product.cant = 1;
                        product.subtotal = product.price * product.cant;
                        products.push(product);

                    }
                //console.log(products);
                content.innerHTML = "";
                products.forEach(produc => {
                            content.innerHTML += `<tr>
                                                    <td>
                                                        <input
                                                            class="form-control form-control-sm"
                                                            type="number" value="${produc.cant}"
                                                            style="width: 70px"
                                                            onchange="cantChange($(this).val(), ${produc.id})"
                                                        />
                                                    </td>
                                                    <td>${produc.name}</td>
                                                    <td>${produc.description}</td>
                                                    <td><textarea onchange="cantDes($(this).val(), ${produc.id});"></textarea></td>
                                                    <td>${produc.price}</td>
                                                    <td>${produc.price * produc.cant}</td>
                                                    <td><i onclick="mas(${produc.id});" class="fa-solid fa-plus"></i> <i onclick="menos(${produc.id});" class="fa-solid fa-minus"></i> <div class="btn"><i onclick="erease(${produc.id});" class="fa-solid fa-xmark"></i></div></td>
                                                </tr>`;
                         });
                calc();
            });
        });

        function cantDes(val, idx){
            const updatedOSArray = products.map(p =>
                p.id === idx
                    ? { ...p, description: val }
                    : p
            );
            products = updatedOSArray;

            redraw();
        }

        function redraw(){
            content.innerHTML = "";
            products.forEach(produc => {
                content.innerHTML += `<tr>
                                                <td>
                                                        <input
                                                            class="form-control form-control-sm"
                                                            type="number" value="${produc.cant}"
                                                            style="width: 70px"
                                                            onchange="cantChange($(this).val(), ${produc.id})"
                                                        />
                                                    </td>
                                                    <td>${produc.name}</td>
                                                    <td>${produc.description}</td>
                                                    <td><textarea onchange="cantDes($(this).val(), ${produc.id});"></textarea></td>
                                                    <td>${produc.price}</td>
                                                    <td>${produc.subtotal}</td>
                                                    <td><i onclick="mas(${produc.id});" class="fa-solid fa-plus"></i> <i onclick="menos(${produc.id});" class="fa-solid fa-minus"></i> <div class="btn"><i onclick="erease(${produc.id});" class="fa-solid fa-xmark"></i></div></td>
                                                </tr>`;
            });
            calc();
        }

        function cantChange(val, idx){
            let valor = 1;
            if(val>0)
            valor = parseInt(val);
            const updatedOSArray = products.map(p =>
                p.id === idx
                    ? { ...p, cant: valor, subtotal : p.price * valor }
                    : p
            );
            products = updatedOSArray;

            content.innerHTML = "";
            products.forEach(produc => {
                content.innerHTML += `<tr>
                                                <td>
                                                        <input
                                                            class="form-control form-control-sm"
                                                            type="number" value="${valor}"
                                                            style="width: 70px"
                                                            onchange="cantChange($(this).val(), ${produc.id})"
                                                        />
                                                    </td>
                                                    <td>${produc.name}</td>
                                                    <td>${produc.description}</td>
                                                    <td><textarea onchange="cantDes($(this).val(), ${produc.id});"></textarea></td>
                                                    <td>${produc.price}</td>
                                                    <td>${produc.subtotal}</td>
                                                    <td><i onclick="mas(${produc.id});" class="fa-solid fa-plus"></i> <i onclick="menos(${produc.id});" class="fa-solid fa-minus"></i> <div class="btn"><i onclick="erease(${produc.id});" class="fa-solid fa-xmark"></i></div></td>
                                                </tr>`;
            });
            calc();
        }

        function mas(idx){
            const updatedOSArray = products.map(p =>
                p.id === idx
                    ? { ...p, cant: p.cant+1, subtotal : p.price * (p.cant+1) }
                    : p
            );
            products = updatedOSArray;

            content.innerHTML = "";
                products.forEach(produc => {
                            content.innerHTML += `<tr>
                                                    <td><input class="form-control form-control-sm" type="number" value="${produc.cant}" style="width: 70px"/></td>
                                                    <td>${produc.name}</td>
                                                    <td>${produc.description}</td>
                                                    <td><textarea onchange="cantDes($(this).val(), ${produc.id});"></textarea></td>
                                                    <td>${produc.price}</td>
                                                    <td>${produc.subtotal}</td>
                                                    <td><i onclick="mas(${produc.id});" class="fa-solid fa-plus"></i> <i onclick="menos(${produc.id});" class="fa-solid fa-minus"></i> <div class="btn"><i onclick="erease(${produc.id});" class="fa-solid fa-xmark"></i></div></td>
                                                </tr>`;
                         });
            calc();
        }

        function menos(idx){
            const updatedOSArray = products.map(p =>
                p.id === idx && p.cant > 1
                    ? { ...p, cant: p.cant-1, subtotal : p.price * (p.cant-1) }
                    : p
            );
            products = updatedOSArray;

            content.innerHTML = "";
                products.forEach(produc => {
                            content.innerHTML += `<tr>
                                                    <td><input class="form-control form-control-sm" type="number" value="${produc.cant}" style="width: 70px"/></td>
                                                    <td>${produc.name}</td>
                                                    <td>${produc.description}</td>
                                                    <td><textarea onchange="cantDes($(this).val(), ${produc.id});"></textarea></td>
                                                    <td>${produc.price}</td>
                                                    <td>${produc.price * produc.cant}</td>
                                                    <td><i onclick="mas(${produc.id});" class="fa-solid fa-plus"></i> <i onclick="menos(${produc.id});" class="fa-solid fa-minus"></i> <div class="btn"><i onclick="erease(${produc.id});" class="fa-solid fa-xmark"></i></div></td>
                                                </tr>`;
                         });
            calc();
        }

        function erease(idx){
            var arrayErase = products.filter((item) => item.id !== idx);

            products = arrayErase;

            content.innerHTML = "";
                products.forEach(produc => {
                            content.innerHTML += `<tr>
                                                    <td><input class="form-control form-control-sm" type="number" value="${produc.cant}" style="width: 70px"/></td>
                                                    <td>${produc.name}</td>
                                                    <td>${produc.description}</td>
                                                    <td><textarea onchange="cantDes($(this).val(), ${produc.id});"></textarea></td>
                                                    <td>${produc.price}</td>
                                                    <td>${produc.price * produc.cant}</td>
                                                    <td><i onclick="mas(${produc.id});" class="fa-solid fa-plus"></i> <i onclick="menos(${produc.id});" class="fa-solid fa-minus"></i> <div class="btn"><i onclick="erease(${produc.id});" class="fa-solid fa-xmark"></i></div></td>
                                                </tr>`;
                         });
            calc();
        }

        //All calculates
        const calc = () => {
            let acum = 0;
            let total = 0;
            let disc = $("#discProd").val();
            let dis = 0;
            let totalMasIva = 0;
            const imp = 1.16;
            totales = [];
            products.forEach(prod => {

                acum += prod.subtotal;

            });
            let iva = acum*imp;
            let ivaDes = iva-acum;
            desgloceIva.innerHTML = "$ "+ivaDes.toFixed(2);
            subTotal.innerHTML = "$ "+acum;
            //dis = (disc/100)+1;
            total = acum*imp;

            let discount = (total*disc)/100;
            totalMasIva = total-discount;
            toTal.innerHTML = "$ "+totalMasIva.toFixed(2);

            let tot = {
                serie : "A",
                folio : 1,
                iva : ivaDes.toFixed(2),
                subtotal: acum,
                discount: disc,
                totDisc: discount.toFixed(2),
                total: totalMasIva.toFixed(2),
            }
            totales.push(tot);
            descuento.innerHTML = '$'+discount.toFixed(2);
        }



        $(".btn-submit").click(function(e){

            e.preventDefault();

            let select = document.getElementById('subsidiaries');
            let customers = [...select.options]
                            .filter(option => option.selected)
                            .map(option => option.value);

            //let customers = $("#titleID").val();

            $.ajax({
                type:'POST',
                url:"{{ route('quotation.store') }}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    "customers" : customers,
                    "products" : products,
                    "totales" : totales,
                    "fields" : fields,
                },
                success:function(data){
                    console.log(data);
                }

            });
        });
    </script>
@endpush
