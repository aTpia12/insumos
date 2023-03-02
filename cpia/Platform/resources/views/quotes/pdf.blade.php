<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cotización</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link href="{{ public_path('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="col-md-12">
    <table style="font-size: 10px; width: 100%">
      <tr>
        <td colspan="2">
          <span style="color:#5d9fc5 ;">D&M INSTRUMENTAL E  </span><br>
          <span style="color:#5d9fc5 ;">INSUMOS MEDICOS SA DE CV</span><br>
          <span style="color:#5d9fc5 ;">DII190130HK2</span>
        </td>
        <td></td>
        <td>
          <div style="position: absolute; margin-left: -300px; margin-top: -70px">
            <img src="{{ public_path('media/idym.jpeg') }}" width="50%">
          </div>


        </td>
      </tr>
    </table>
  </div>
  <br><br>
    <div class="card">
        <div class="card-body">
          <div class=" mb-5 mt-3">
            <div class="">
              <div class="col-md-12">
                <div class="text-center">
                  <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                </div>

              </div>

              <div class="row col-md-12">
                <table style="width: 100%">
                    <tr>
                        <td>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                  <li class="text-muted">To: <span style="color:#5d9fc5 ;">{{$data["alias"]}}</span></li>
                                  <li class="text-muted">{{$data["address"]}}</li>
                                  <li class="text-muted"><i class="fas fa-phone"></i>{{$data["tel"]}}</li>
                                </ul>
                              </div>
                        </td>
                        <td style="text-align: right">
                            <div class="col-md-6">
                                <p class="text-muted">Cotización</p>
                                <ul class="list-unstyled">
                                  <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                      class="fw-bold">Folio:</span>#123</li>
                                  <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                      class="fw-bold">Fecha: </span>22 Oct, 2022</li>
                                  <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                      class="me-1 fw-bold">Status:</span><span class="badge bg-success text-black fw-bold">
                                      Enviada</span></li>
                                </ul>
                              </div>
                        </td>
                    </tr>
                  </table>
              </div>

              <div class="row my-2 mx-1 justify-content-center">
                <table class="table table-striped table-borderless">
                  <thead style="background-color:#84B0CA ;" class="text-white">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Producto</th>
                      <th scope="col">Descripción</th>
                      <th scope="col">Cant.</th>
                      <th scope="col">P. Unitario</th>
                      <th scope="col">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data["products"] as $product)
                        <tr>
                            <td>1</td>
                            <td>{{ $product["name"] }}</td>
                            <td>{{ $product["description"] }}</td>
                            <td>{{ $product["cant"] }}</td>
                            <td>{{ $product["price"] }}</td>
                            <td>{{ $product["price"] *  $product["cant"] }}</td>
                        </tr>
                    @endforeach
                  </tbody>

                </table>
              </div>
              <hr>
              <br>
              <table style="width: 100%; font-size: 10px">
                <tr>
                    <td>
                      <div>
                        <p class="ms-3">{{$data["fields"][0]}}</p>
                        <p class="ms-3">{{$data["fields"][1]}}</p>
                        <p class="ms-3">{{$data["fields"][2]}}</p>
                      </div>
                    </td>
                    <td style="text-align: right">
                        <div>
                            <ul class="list-unstyled">
                              <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>${{$data["tot"]["subtotal"]}}</li>
                                <li class="text-muted ms-3"><span class="text-black me-4">IVA</span>${{$data["tot"]["iva"]}}</li>
                              <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Descuento ({{$data["tot"]["discount"]}}%)</span>${{$data["tot"]["totDisc"]}}</li>
                              <li><span style="font-size: 25px;">Total: ${{$data["tot"]["total"]}}</span></p></li>
                            </ul>

                          </div>
                    </td>
                </tr>
              </table>
              <br>
              <hr>
              <div class="row">
                <div class="col-xl-10">
                  <p>Gracias por su preferencia</p>
                </div>
                <div class="col-xl-2">

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <br>
      <footer>
        <table style="width: 100%; font-size: 10px">
          <tr>
            <td>
                    <span style="color:#5d9fc5 ;">Calle Diamante N9</span><br>
                    <span style="color:#5d9fc5 ;">Col. Joyas de Mocambo</span><br>
                    <span style="color:#5d9fc5 ;">Boca del Río, Veracruz</span>
            </td>
            <td style="text-align: right">
                <span style="color:#5d9fc5 ;">(229) 375 44 14</span><br>
                <span style="color:#5d9fc5 ;">(229) 901 93 10</span><br>
                <span style="color:#5d9fc5 ;">ventas@insumosdym.com</span><br>
                <span style="color:#5d9fc5 ;">www.insumosdym.com</span>
            </td>
          </tr>
        </table>
      </footer>
</body>
</html>
