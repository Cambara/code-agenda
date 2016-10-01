@extends('template')

@section('title') Novo Telefone @endsection

@section('container')
    <h3>Novo Telefone</h3>
    <hr/>
    <div class="col-md-6">
        <form id="form_contato" class="form-horizontal" method="post" action="{{route('telefone.store')}}">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Descrição</label>
                <div class="col-sm-10">
                    <select name="descricao" class="form-control">
                        <option value="Celular">Celular</option>
                        <option value="Comercial">Comercial</option>
                        <option value="Recados">Recados</option>
                        <option value="Residencial">Residencial</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="apelido" class="col-sm-2 control-label">Código País</label>
                <div class="col-sm-10">
                    <input type="number" min="0" max="999" class="form-control" name="codpais" >
                </div>
            </div>
            <div class="form-group">
                <label for="apelido" class="col-sm-2 control-label">DDD</label>
                <div class="col-sm-10">
                    <input type="number" min="0" max="99" class="form-control" name="ddd" >
                </div>
            </div>
            <div class="form-group">
                <label for="apelido" class="col-sm-2 control-label">Prefixo</label>
                <div class="col-sm-10">
                    <input type="number" min="0" class="form-control" name="prefixo" >
                </div>
            </div>
            <div class="form-group">
                <label for="apelido" class="col-sm-2 control-label">Sufixo</label>
                <div class="col-sm-10">
                    <input type="number" min="0" class="form-control" name="sufixo" >
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Salvar</button>
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
           pessoa_id      = '{{$pessoa->id}}',
           url     = $form.attr("action");

        var posting = $.post(url,{descricao:descricao_attr, codpais:codpais_attr, ddd:ddd_attr,
                                prefixo:prefixo_attr, sufixo:sufixo_attr, pessoa_id:pessoa_id});
        posting.done(function (data) {
            if(data.result)
            {
                var n = '{{$pessoa->nome}}';

                window.location.href = '{{route('agenda.index')}}/'+n.substr(0,1);
            }else{
                alert('Ops tivemos um problema ao adicionar o telefone');
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