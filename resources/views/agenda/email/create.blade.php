@extends('template')

@section('title') Novo Email @endsection

@section('container')
    <h3>Novo Email do Contato {{$pessoa->nome}}</h3>
    <hr/>
    <div class="col-md-6">
        <form id="form_contato" class="form-horizontal" method="post" action="{{route('email.store',["id"=>$pessoa->id])}}">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" placeholder="Email">
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
           email_attr    = $form.find("input[name='email']").val(),
           pessoa_id     = '{{$pessoa->id}}'
           url           = $form.attr("action");
        var posting = $.post(url,{email:email_attr, pessoa_id: pessoa_id });
        posting.done(function (data) {
            if(data.result)
            {
                var n = '{{$pessoa->nome}}';

                window.location.href = '{{route('agenda.index')}}/'+n.substr(0,1);
            }else{
                alert('Ops tivemos um problema ao adicionar seu e-mail');
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