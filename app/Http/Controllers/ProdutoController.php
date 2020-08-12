<?php

namespace estoque\Http\Controllers;
use Illuminate\Support\Facades\DB;
use estoque\Produto;
use Request;
use estoque\Http\Requests\ProdutosRequest;



class ProdutoController extends Controller{


    public function listarProdutos()
    {
        $produto = Produto::all();
        return view("produto.listagem")->with('produtos', $produto);

    }

    public function visualizar($id)
    {

        $produto = Produto::find($id);

        if(empty($produto))
        {
            return "Produto Não Encontrado";
        }
        return view("produto.detalhes")->with('p', $produto);


    }

    public function novo(){
        return view('produto.create-edit');
    }

    public function addProduto(ProdutosRequest $request)
    {

        /**
         * Nesse código existem algumas varias de realizar as fórmas de salvar um resgistro no DB
         * As regras de validação são feitas dentro do Requests
         */

        Produto::create($request->all());//com essa unica linha estamos guardando os dados no BD e validando os dados.

        /* $params = Request::all();
        $produto = new Produto($params);*/

        /*$produto = new Produto();

        $produto->nome = Request::input('nome');
        $produto->valor = Request::input('valor');
        $produto->descricao = Request::input('descricao');
        $produto->quantidade = Request::input('quantidade');*/

        //$produto->save();
        /*$produtos = DB::insert('insert into produtos
                    (nome, valor,descricao, quantidade) values (?,?,?,?)',
                    array($nome, $valor, $descricao, $quantidade));*/
        return redirect()
               ->action('ProdutoController@listarProdutos')
               ->withInput(Request::only('nome'));


    }
    public function listaJson()
    {
        $produto = Produto::all();
        return response()->json($produto) ;

    }

    public function remove($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()
                ->action('ProdutoController@listarProdutos');
    }

    public function edit($id)
    {
        $produto = DB::table('produtos')->where('id', $id)->get();
        $produto=[0];

        return view('produto.create-edit', compact('produto'));
    }
}
