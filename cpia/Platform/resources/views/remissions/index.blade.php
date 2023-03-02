@extends('layouts.admin')

@section('titulo')
    <span>Notas de remisión</span>
    <a href="{{ route('quotation.list') }}"><i class="fa-solid fa-magnifying-glass"></i></a>
@endsection

@section('contenido')
    <div class="col-md-8">
        <label>Cliente(s)</label>
        <select class="js-example-basic-single form-control" id="subsidiaries" name="subsidiaries" disabled>
            <option value="{{$quote->subsidiaries[0]->id}}">{{$quote->subsidiaries[0]->alias}}</option>
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
    <hr>
    <div class="card">
        <div class="card-body" id="cont">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Cantidad</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
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
            <button class="btn-submit btn btn-primary">Guardar y enviar</button>
        </div>
        <div class="col-md-4">
            <table>
                <tr>
                    <td colspan="2">Subtotal: </td>
                    <td></td>
                    <td id="subTotal"></td>
                </tr>
                <tr>
                    <td colspan="2">Descuento: </td>
                    <td>
                        <select id="discProd" onchange="calc()">
                            <option value="0">0%</option>
                            <option value="10">10%</option>
                            <option value="16">16%</option>
                            <option value="20">20%</option>
                            <option value="30">30%</option>
                        </select>
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
        let products = @json($products);
        let di = @json($quote->discount);
        let totales = [];
        let content = document.querySelector("#tbodyP");
        let subTotal = document.querySelector("#subTotal");
        let toTal = document.querySelector("#toTal");
        let descuento = document.querySelector("#descuento");

        $(document).ready(function() {
            document.getElementById("discProd").value = di;
            //
                //console.log(products);
                content.innerHTML = "";
                products.forEach(produc => {
                            content.innerHTML += `<tr>
                                                    <td>${produc.cant}</td>
                                                    <td>${produc.name}</td>
                                                    <td>${produc.description}</td>
                                                    <td>${produc.price}</td>
                                                    <td>${produc.price * produc.cant}</td>
                                                    <td><i onclick="mas(${produc.id});" class="fa-solid fa-plus"></i> <i onclick="menos(${produc.id});" class="fa-solid fa-minus"></i> <div class="btn"><i onclick="erease(${produc.id});" class="fa-solid fa-xmark"></i></div></td>
                                                </tr>`;
                         });
                calc();


            //
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
                console.log(products);
                var data =  e.params.data;
                let product = JSON.parse(data.id);

                    let findProduct = products.find(element => element.product_id === product.id);
                    if(!findProduct){

                        product.product_id = product.id;
                        product.cant = 1;
                        product.subtotal = product.price * product.cant;
                        products.push(product);
                        
                    }
                //console.log(products);
                content.innerHTML = "";
                products.forEach(produc => {
                            content.innerHTML += `<tr>
                                                    <td>${produc.cant}</td>
                                                    <td>${produc.name}</td>
                                                    <td>${produc.description}</td>
                                                    <td>${produc.price}</td>
                                                    <td>${produc.price * produc.cant}</td>
                                                    <td><i onclick="mas(${produc.product_id});" class="fa-solid fa-plus"></i> <i onclick="menos(${produc.product_id});" class="fa-solid fa-minus"></i> <div class="btn"><i onclick="erease(${produc.product_id});" class="fa-solid fa-xmark"></i></div></td>
                                                </tr>`;
                         });
                calc();
            });
        });
        
        function mas(idx){
            const updatedOSArray = products.map(p =>
                p.product_id === idx
                    ? { ...p, cant: p.cant+1, subtotal : p.price * (p.cant+1) }
                    : p
            );
            products = updatedOSArray;

            content.innerHTML = "";
                products.forEach(produc => {
                            content.innerHTML += `<tr>
                                                    <td>${produc.cant}</td>
                                                    <td>${produc.name}</td>
                                                    <td>${produc.description}</td>
                                                    <td>${produc.price}</td>
                                                    <td>${produc.subtotal}</td>
                                                    <td><i onclick="mas(${produc.product_id});" class="fa-solid fa-plus"></i> <i onclick="menos(${produc.product_id});" class="fa-solid fa-minus"></i> <div class="btn"><i onclick="erease(${produc.product_id});" class="fa-solid fa-xmark"></i></div></td>
                                                </tr>`;
                         });
            calc();
        }

        function menos(idx){
            const updatedOSArray = products.map(p =>
                p.product_id === idx && p.cant > 1
                    ? { ...p, cant: p.cant-1, subtotal : p.price * (p.cant-1) }
                    : p
            );
            products = updatedOSArray;

            content.innerHTML = "";
                products.forEach(produc => {
                            content.innerHTML += `<tr>
                                                    <td>${produc.cant}</td>
                                                    <td>${produc.name}</td>
                                                    <td>${produc.description}</td>
                                                    <td>${produc.price}</td>
                                                    <td>${produc.price * produc.cant}</td>
                                                    <td><i onclick="mas(${produc.product_id});" class="fa-solid fa-plus"></i> <i onclick="menos(${produc.product_id});" class="fa-solid fa-minus"></i> <div class="btn"><i onclick="erease(${produc.product_id});" class="fa-solid fa-xmark"></i></div></td>
                                                </tr>`;
                         });
            calc();
        }

        function erease(idx){
            var arrayErase = products.filter((item) => item.product_id !== idx);

            products = arrayErase;

            content.innerHTML = "";
                products.forEach(produc => {
                            content.innerHTML += `<tr>
                                                    <td>${produc.cant}</td>
                                                    <td>${produc.name}</td>
                                                    <td>${produc.description}</td>
                                                    <td>${produc.price}</td>
                                                    <td>${produc.price * produc.cant}</td>
                                                    <td><i onclick="mas(${produc.product_id});" class="fa-solid fa-plus"></i> <i onclick="menos(${produc.product_id});" class="fa-solid fa-minus"></i> <div class="btn"><i onclick="erease(${produc.product_id});" class="fa-solid fa-xmark"></i></div></td>
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
            totales = [];
            products.forEach(prod => {
                
                acum += prod.subtotal;
                
            });
            subTotal.innerHTML = "$ "+acum;
            dis = (disc/100)+1;
            total = (acum/dis);
            toTal.innerHTML = "$ "+total.toFixed(2);
            let discount = acum-total;
            let tot = {
                serie : "A",
                folio : 1,
                subtotal: acum,
                discount: disc,
                total: total.toFixed(2),
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
                url:"{{ route('remissions.store') }}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    "customers" : customers,
                    "products" : products,
                    "totales" : totales,
                },
                success:function(data){
                    console.log(data);
                }

            });
        });
    </script>
@endpush