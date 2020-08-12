@extends('layout.principal')
@section('conteudo')
<a href="{{action('ProdutoController@novo')}}"><button type="button" class="btn btn-primary btn-md  fa fa-plus"> Cadastrar</button></a>
    <h1 class="h1">Listagem de Produtos</h1>
    @if(old('nome'))
                <div class="alert alert-success">
            <strong>Sucesso!!!</strong> O produto {{old('nome')}} foi adicionado com sucesso!
        </div>
        @endif
        <table frame = "hsides" class="table table-striped table-bordered table-hover">
            <thead class="thead-light">
                <tr >
                    <th class="table-success">Cód.</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                    <th>Qtde</th>
                    <th>Ação</th>
                    <th>Ação</th>
                    <th>Ação</th>

                </tr>
            </thead>
            @if(empty($produtos))
                <div class="alert alert-danger">
                    Você não tem nenhum produto cadastrado.
                </div>
            @else
                @foreach($produtos as $p)
                <tr class="{{$p->quantidade<=1 ? 'danger' : ''}}">
                    <td class="table-success"><a href="/produtos/visualizar/<?=$p->id?>"><?=$p->id ?></a></td>
                    <td >{{$p->nome}} </td>
                    <td>R$ {{$p->valor}}</td>
                    <td>{{$p->descricao}}</td>
                    <td>{{$p->quantidade}}</td>

                    <td><a href="{{action('ProdutoController@visualizar', $p->id)}}""><button type="button" class="btn btn-primary btn-sm">Detalhes</button></a></td>
                    <td><a href="{{action('ProdutoController@edit', $p->id)}}"><button type="button" class="btn btn-warning btn-sm">Editar</button></a></td>
                    <td><a href="{{action('ProdutoController@remove', $p->id)}}" onclick="return confirm('Deseja realmente excluir este registro?')"><button type="button" class="btn btn-danger btn-sm">Excluir</button></a></td>

                </tr>
            @endforeach
        </table>
        @endif

@stop

