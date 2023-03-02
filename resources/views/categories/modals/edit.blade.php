<!-- Modal -->
<div class="modal fade" id="editMdl{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories.update', $category) }}" role="form" method="post" id="createStoreFrm">
                    @method('PUT')
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input
                            type="text"
                            class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                            id="nameEditStore{{$category->id}}" name="name"
                            placeholder="-"
                            value="{{ $category->name }}"
                        >
                        @if ($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="closeStoreEdit{{$category->id}}" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" id="btnEditStore{{$category->id}}" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('#nameEditStore'+{{$category->id}}).on('keyup', function(){
            const valor = $(this).val();

            if(valor === ""){
                $('#btnEditStore'+{{$category->id}}).attr('disabled', 'disabled');
            }else
            {
                $('#btnEditStore'+{{$category->id}}).removeAttr('disabled', 'disabled');
            }
        });

        $('#closeStoreEdit'+{{$category->id}}).on('click', function(){
            $('#nameEditStore'+{{$category->id}}).val("{{$category->name}}");
            $('#btnEditStore'+{{$category->id}}).removeAttr('disabled', 'disabled');
        });
    </script>
@endpush
