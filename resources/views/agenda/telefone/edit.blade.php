@extends('template')

@section('title') Editar Telefone @endsection

@section('container')
    <h3>Editar Telefone - {{$telefone->numero}} do {{$telefone->pessoa->nome}}</h3>
    <hr/>
    <div class="col-md-6">
        <form id="form_contato" class="form-horizontal" method="post" action="{{route('telefone.update',["id"=>$telefone->id])}}">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Descrição</label>
                <div class="col-sm-10">
                    <select name="descricao" class="form-control">
                        <option value="Celular" @if($telefone->descricao == 'Celular') selected @endif>Celular</option>
                        <option value="Comercial" @if($telefone->descricao == 'Comercial') selected @endif>Comercial</option>
                        <option value="Recados" @if($telefone->descricao == 'Recados') selected @endif>Recados</option>
                        <option value="Residencial" @if($telefone->descricao == 'Residencial') selected @endif>Residencial</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="apelido" class="col-sm-2 control-label">Código País</label>
                <div class="col-sm-10">
                    <input type="number" min="0" max="999" class="form-control" name="codpais" value="{{$telefone->codpais}}">
                </div>
            </div>
            <div class="form-group">
                <label for="apelido" class="col-sm-2 control-label">DDD</label>
                <div class="col-sm-10">
                    <input type="number" min="0" max="99" class="form-control" name="ddd" value="{{$telefone->ddd}}">
                </div>
            </div>
            <div class="form-group">
                <label for="apelido" class="col-sm-2 control-label">Prefixo</label>
                <div class="col-sm-10">
                    <input type="number" min="0" class="form-control" name="prefixo" value="{{$telefone->prefixo}}">
                </div>
            </div>
            <div class="form-group">
                <label for="apelido" class="col-sm-2 control-label">Sufixo</label>
                <div class="col-sm-10">
                    <input type="number" min="0" class="form-control" name="sufixo" value="{{$telefone->sufixo}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </div>
            </div>
        </form>

    </div>
    <div class="col-md-6">
        <div id="erros" class="alert alert-danger" style="display: none;">
        </div>

    </div>

@endsection
@section('scripts')
<script type="text/javascript">

    $('#form_contato').submit(function (event) {
       event.preventDefault();
       var $form   = $(this),
           descricao_attr = $form.find("select[name='descricao']").val(),
           codpais_attr   = $form.find("input[name='codpais']").val(),
           ddd_attr       = $form.find("input[name='ddd']").val(),
           prefixo_attr   = $form.find("input[name='prefixo']").val(),
           sufixo_attr    = $form.find("input[name='sufixo']").val(),
           url            = $form.attr("action");
        var posting = $.post(url,{descricao:descricao_attr, codpais:codpais_attr, ddd:ddd_attr,
                                    prefixo:prefixo_attr, sufixo:sufixo_attr, _method: 'PUT' });
        posting.done(function (data) {
            if(data.result)
            {
                var n = '{{$telefone->pessoa->nome}}';

                window.location.href = '{{route('agenda.index')}}/'+n.substr(0,1);
            }else{
                alert('Ops tivemos um problema ao editar o telefone');
            }
        });
        posting.fail(function (data) {
            data = data.responseJSON;
            var erros = document.getElementById('erros');
            erros.style.display = 'block';
            erros.innerHTML = "";
            var lista = document.createElement('ul');
            for(campo in data)
            {
                for(e in data[campo])
                {
                    var li = document.createElement('li');
                    li.innerHTML = data[campo][e];
                    lista.appendChild(li);
                }
            }
            erros.appendChild(lista);
        });
    });

</script>
@endsection