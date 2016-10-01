@extends('template')

@section('title') Editar Email @endsection

@section('container')
    <h3>Editar Email {{$email->email}} do Contato {{$email->pessoa->nome}}</h3>
    <hr/>
    <div class="col-md-6">
        <form id="form_contato" class="form-horizontal" method="post" action="{{route('email.update',["id"=>$email->id])}}">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" placeholder="Email"
                           value="{{$email->email}}">
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
           email_attr    = $form.find("input[name='email']").val(),
           url          = $form.attr("action");
        var posting = $.post(url,{email:email_attr, _method: 'PUT' });
        posting.done(function (data) {
            if(data.result)
            {
                var n = '{{$email->pessoa->nome}}';

                window.location.href = '{{route('agenda.index')}}/'+n.substr(0,1);
            }else{
                alert('Ops tivemos um problema para alterar o email');
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