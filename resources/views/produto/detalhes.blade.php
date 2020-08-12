@extends('layout.principal')
@section('conteudo')
<h2>Detalhes do Produto </h2>
    <ul class="list-group">
        <li class="list-group-item col-md-6"><b>Nome: </b>{{$p->nome}}</li>
        <li class="list-group-item col-md-6"><b>Código: </b> {{$p->id}}</li>
        <li class="list-group-item col-md-6"><b>Valor: </b> R${{$p->valor}}</li>
        <li class="list-group-item col-md-6"><b>Descrição: </b> {{$p->descricao}}</li>
        <li class="list-group-item col-md-6"><b>Quantidade: </b> {{$p->quantidade}}</li>
    </ul>
    <div>
        <a href="/produtos"><button type="button" class="btn btn-primary btn-sm">Listar Produtos</button></a>
    </div>
@stop


