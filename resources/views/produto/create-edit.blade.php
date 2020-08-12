@extends('layout.principal')
@section('conteudo')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h4>Gestão de Produtos </h4>
       @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{$erro}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

       <ol class="breadcrumb">
          <li><a href="/produtos"><i class="fa fa-home"></i> Home|</a></li>
          <li><a href="/produtos">Produtos</a></li>

       </ol>
    </section>
    <!-- Main content -->
    <div class="row">
          <!-- /.box-header -->
          <!-- form start -->
        @if(isset($produto->id))
            <form  action="/produtos/edit/$produto->id" method="post">
        @else
            <form  action="/produtos/addProduto" method="post">
        @endif
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
             <div class="col-md-12">
                <div class="form-group">
                   <label for="desproduct">Nome da produto</label>
                <input type="text" class="form-control form-control-sm" value="{{old('nome')}}" name="nome" placeholder="Digite o nome do produto">
                </div>
             </div>
             <div class="col-md-12">
                <div class="form-group">
                   <label >Valor</label>
                <input class="form-control form-control-sm" value="{{old('valor')}}" name="valor" placeholder="0.00">
                </div>
             </div>
             <div class="col-md-12">
                <div class="form-group">
                   <label >Descrição</label>
                <input type="text" class="form-control form-control-sm" value="{{old('descricao')}}" name="descricao" placeholder="Informe a descrição do Produto">
                </div>
             </div>
             <div class="col-md-12">
                <div class="form-group">
                   <label >Quantidade</label>
                <input type="number" class="form-control form-control-sm"  value="{{old('value')}}"name="quantidade" placeholder="0.00">
                </div>
                <div class="box-footer">
                   <button type="submit" class="btn btn-primary">Salvar</button>
                </div>

             </div>

           </form>

        </div>
        <!-- /.box-body -->

  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop
