@extends('template')

@section('title')Home @endsection

@section('container')

    <div class="co-xs-12 btn-row">
        <a href="{{route('pessoa.create')}}" class="btn btn-primary">Nova Contato</a>
    </div>

    <div class="row">
        @foreach($pessoas as $pessoa)
            <div class="col-md-6">
                @include('agenda.partials.contato',['pessoa' => $pessoa])
            </div>
        @endforeach
    </div>
@endsection
