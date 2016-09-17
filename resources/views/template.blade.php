<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Conde Agenda - @yield('title')</title>

    <!-- Bootstrap -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
        <header>
            <h1>Code.Education</h1>
            <div class="row">
                <div class="col-md-3">
                    <h4>
                        <i class="glyphicon glyphicon-phone-alt"></i>
                        <span>Agenda Telefônica</span>
                    </h4>
                </div>
                <div class="col-md-3 pull-right">
                    <form class="navbar-form navbar-right" method="GET" action="{{route('agenda.index')}}">
                        <div class="input-group">
                            <input type="text" name="p" class="form-control" placeholder="Pesquisar Contato...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-12">
                    @foreach($letras as $letra)
                        <a href="{{ route('agenda.pesquisa',["name" => $letra]) }}"
                           class="btn btn-primary btn-xs">{{ $letra }}</a>
                    @endforeach
                </div>

            </div>
        </header>
        <div class="row btn-row">
            @yield('container')
        </div>
    </div>

<script src="/js/scripts.js"></script>
</body>
</html>