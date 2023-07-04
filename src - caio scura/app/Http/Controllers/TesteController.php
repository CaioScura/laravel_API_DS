<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teste;
use Illuminate\Support\Facades\Route;

class TesteController extends Controller
{
    public $collection;

    //$soma = $this->collection->sum('votes');

    public function __construct()
    {
        $this->collection = collect([
            [ "name" => "Madie Barton", "votes" => 76, "price" => 444.72 ],
            [ "name" => "Rhoda Metz", "votes" => 155, "price" => 131.92 ],
            [ "name" => "Shanie Simonis", "votes" => 123, "price" => 205.85 ],
            [ "name" => "Cory Schroeder", "votes" => 152, "price" => 130.85 ],
            [ "name" => "Ansel Nader", "votes" => 31, "price" => 475.53 ],
            [ "name" => "Floyd Kshlerin", "votes" => 36, "price" => 08.27 ],
            [ "name" => "Clint Schuster", "votes" => 15, "price" => 442.49 ],
            [ "name" => "Aiden Langosh", "votes" => 104, "price" => 418.58 ],
            [ "name" => "Woodrow Gutmann", "votes" => 22, "price" => 347.30 ],
            [ "name" => "Alysson Stiedemann", "votes" => 31, "price" => 432.47 ]
        ]);
    }


    public function primeiraRota()
    {
        return view('teste.teste');//pasta teste. arquivo teste
    }

    public function paramObrig($id)
    {
        return view('teste.teste')->with('parametro', $id);
    }

    public function soma($n1, $n2 = 1)
    {
        $soma = $n1 + $n2;
        return view('teste.teste')->with('soma', $soma);
    }

    public function getAll()
    {
        // select * from teste;
        // Recupera todos os registros
        $testes = Teste::all();

        return view('teste.teste')->with('variavel', $testes);
    }


    /**
     * Buscar um elemento pelo ID
     * sintaxe: $var = Model::find($id);
     */
    public function getOneById($id)
    {
        // select * from testes where id = $id
        $teste = Teste::find($id);

        return view('teste.teste')->with('variavel', $teste);
    }


    /**
     * Buscar vários elementos pelo ID
     * sintaxe: $var = Model::find([$id1, $id2, ..., $idn]);
     */
    public function getManyById($id1, $id2, $id3)
    {
        // select * from testes where id = $id1 OR id = $id2 ...
        $testes = Teste::find([$id1, $id2, $id3]);

        return view('teste.teste')->with('variavel', $testes);
    }


    /**
     * Buscar elementos através de valores de colunas
     * sintaxe: $var = Model::where('nome_coluna', 'operador', valor)->get();
     */
    public function getByName($name)
    {

        // select * from company_2021.teste where name = 'Ansel Nader'
        // $testes = Teste::where('name', $name)->get();

        // select * from company_2021.teste where name like '%an%';
        $testes = Teste::where('name', 'like', '%'.$name.'%')->get();

        return view('teste.teste')->with('variavel', $testes);
    }



    public function getByVotes($votes)
    {
        $testes = Teste::where('votes', '<=', $votes)->get();

        return view('teste.teste')->with('variavel', $testes);
    }


    /**
    *  Buscar elementos que estejam em um intervalo
    *  sintaxe: $var = Model::whereBetween('nome_coluna', [ intervalo ])->get();
    * */
    public function getByVotesBetween($min, $max)
    {
        $testes = Teste::whereBetween('votes', [$min, $max] )->get();

        return view('teste.teste')->with('variavel', $testes);
    }


    /**
     * Buscar elementos que NÃO estejam em um intervalo
     * sintaxe: $var = Model::whereNotBetween('nome_coluna', [intervalo])->get();
     */
    public function getByVotesNotBetween($min, $max)
    {
        $testes = Teste::whereNotBetween('votes', [$min, $max] )->get();

        return view('teste.teste')->with('variavel', $testes);
    }


    /**
     * Buscar elementos que estejam em um conjunto
     * sintaxe: $var = Model::whereIn('nome_coluna', [conjunto])->get();
     */
    public function getByVotesIn($votesQtd1, $votesQtd2, $votesQtd3)
    {
        $testes = Teste::whereIn('votes', [$votesQtd1, $votesQtd2, $votesQtd3] )->get();

        return view('teste.teste')->with('variavel', $testes);
    }


    /**
     * Buscar elementos que NÃO estejam em um conjunto
     * sintaxe: $var = Model::whereIn('nome_coluna', [conjunto])->get();
     */
    public function getByVotesNotIn($votesQtd1, $votesQtd2, $votesQtd3)
    {
        $testes = Teste::whereNotIn('votes', [$votesQtd1, $votesQtd2, $votesQtd3] )->get();

        return view('teste.teste')->with('variavel', $testes);
    }



    /**
     * Ancadeando consultas
     * ======================
     *
     * Toda consulta quando não utilizamos o método `get()` irá retornar
     * um objeto do tipo `Builder`. Nós podemos utilizar esse objeto para
     * compor novoas queries mais sofisticadas e melhorar assim os
     * resultados das nossas pesquisas.
     *
     * Por exemplo, vamos supor que temos a seguinte querie:
     *
     * Teste::where('id', [2, 6, 7])
     *
     * Agora desejamos adicionar uma condição dizendo que, em cima dos
     * resultados que a querie irá trazer, queremos também o registro que
     * tenha a coluna votos com um valor acima de 5000.
     *
     * Para isso basta concatenar uma nova cláusula `where`:
     *
     * Teste::where('id', [2, 6, 7])->where('votes', '>', 5000)
     *
     * E por fim utilizamos o método `get()` para informar ao laravel que
     * desejamos o resultado desse `Builder`:
     *
     * Teste::where('id', [2, 6, 7])->where('votes', '>', 5000)->get();
     */
    public function getTestesByVotes($vote1, $vote2)
    {
        // select * from testes where votes >= $vote1 AND votes < $vote2
        $testes = Teste::where('votes', '>=', $vote1)->where('votes', '<', $vote2)->get();

        return view('teste.teste')->with('variavel', $testes);
    }



    /**
     * Se desejamos adicionar um `OR` na cláusula, basta adicionar
     * a palavra `or` na frente do `where`:
     *
     * Teste::where('id', [2, 6, 7])->orWhere('votes', '>', 5000)->get();
     */
    public function getTestesByVotesOr($vote1, $vote2)
    {
        // select * from testes where votes >= $vote1 OR votes < $vote2
        $testes = Teste::where('votes', '>=', $vote1)->orwhere('votes', '<', $vote2)->get();

        return view('teste.teste')->with('variavel', $testes);
    }



    // (minVotes > 100 AND maxVotes < 155) AND (minPrice > 400 OR maxPrice = 131.92)
    /**
     * Agrupando Consultas
     * ===================
     *
     * Digamos agora que nós precisamos buscar os dados que estão dentro
     * de uma consulta mais complexa. Digamos que eu preciso de todos os
     * usuários que possuam o ID entre 3 e 7, e que os nome tenha ou os
     * caracteres `llie` ou `ie`.
     *
     * Portanto, de uma maneira simples, nossa consulta seria algo do tipo:
     *
     * (id > 3 AND id < 7) AND (name like '%llie%' OR name like '%ey%')
     *
     * Para montarmos um agrupando de queries podemos utilizar a seguinte
     * técnica:
     *
     * Teste::where(
     * function($q) {
     * $q->where('id', '>', 3)->where('id', '<', 7);
     * }
     * )->where(
      * function($q) {
    * $q->where('name', 'like', '%llie%')->orWhere('name', 'like', '%ey%');
    * }
    * )->get();
    */
    public function getTestesByVotesAndPrices($minVotes, $maxVotes, $minPrice, $maxPrice)
    {
        // (votes > 100 AND votes < 155) AND (price > 400 OR price = 131.92)
        $testes = Teste::where(
            // (votes > 100 AND votes < 155)
            function($query) use ($minVotes, $maxVotes){
                $query->where('votes', '>', $minVotes)->where('votes', '<', $maxVotes)->get();
            }

        // AND
        )->where(
            function($query) use ($minPrice, $maxPrice){
                // (price > 400 OR price = 131.92)
                $query->where('votes', '>', $minPrice)->orwhere('votes', '=', $maxPrice)->get();
            }

        )->get();

        return view('teste.teste')->with('variavel', $testes);
    }



    /**
     * Ordenando Pesquisas
     * ===================
     * Para fazermos com que a pesquisa fique em ordem inversa, ou seja
     * decrescente, basta adicionar o parâmetro `desc`:
     *
     * $var = Teste::orderBy('name', 'desc')->get();
     */
    public function getTestesOrderByVotes($min, $max)
    {
        $testes = Teste::where('votes', '>', $min)
                        ->where('votes', '<=', $max)
                        ->OrderBy('votes', 'asc')
                        ->get();

        return view('teste.teste')->with('variavel', $testes);
    }


    /**
     * Podemos fazer uma pesquisa ja ordenada por um determinado
     * campo da tabela través do comando
     *
     * $var = Teste::orderBy('name')->get();
     */
    public function getAllOrderByPrice()
    {
        $testes = Teste::orderBy('price', 'desc')->get();

        return view('teste.teste')->with('variavel', $testes);
    }


    public function getVotesAvg()
    {
        /*$teste = Teste::all();

        $soma = 0;

        foreach($testes as $teste){
            $soma += $teste->votes;
        }

        return $soma/count($testes);
    */

        return Teste::all()->avg('votes');
    }



    public function getMaxVotes()
    {
        return Teste::all()->max('prices');
    }

    public function getMinVotes()
    {
        return Teste::all()->min('votes');
    }



    // Cria um novo registro
    public function createTeste()
    {
        /**
         * Cria um objeto (Model) do tipo Teste
         */
        $teste = new Teste();

        /**
         * Preenche as colunas (atributos) do objeto
         * (Model) com os dados necessários
         */
        $teste->name = 'Caio Scura';
        $teste->email = 'caioscura@gmail.com';
        $teste->price = 100;
        $teste->votes = 50;

        /**
         * Salva o objeto (Model) no Banco de Dados
         */
        $teste->save();

        return view('teste.teste')->with('variavel', 'Objeto inserido com sucesso');
    }


    /**
     * Atualiza um registro
     */
    public function updateTeste()
    {
        /**
        * Encontra um objeto dado um ID
        */
        $teste = Teste::find(10);

        /**
         * Preenche as colunas (atributos) do objeto
         * (Model) com os dados necessários
         */
        $teste->name = 'Paula Almeida';
        $teste->price = 200;

        /**
         * Salva o objeto (Model) no Banco de Dados
         */
        $teste->save();

        return view('teste.teste')->with('variavel', 'Objeto inserido com sucesso');
    }


    /**
     * Delete um registro
     */
    public function deleteTeste()
    {

        /**
         * Encontra um objeto dado um ID
         */
        $teste = Teste::find(11);

        /**
         * Apaga o objeto (Model) no Banco de Dados
         */
        $teste->delete();

        return view('teste.teste')->with('variavel', 'Objeto apagado com sucesso');
    }



    //////////////////////////////////
    //Exercício AULA 08-04 - TESTE CONTROLLER
    public function sum()
    {
        $collection = collect([
            [ "name" => "Madie Barton", "votes" => 76, "price" => 444.72 ],
            [ "name" => "Rhoda Metz", "votes" => 155, "price" => 131.92 ],
            [ "name" => "Shanie Simonis", "votes" => 123, "price" => 205.85 ],
            [ "name" => "Cory Schroeder", "votes" => 152, "price" => 130.85 ],
            [ "name" => "Ansel Nader", "votes" => 31, "price" => 475.53 ],
            [ "name" => "Floyd Kshlerin", "votes" => 36, "price" => 08.27 ],
            [ "name" => "Clint Schuster", "votes" => 15, "price" => 442.49 ],
            [ "name" => "Aiden Langosh", "votes" => 104, "price" => 418.58 ],
            [ "name" => "Woodrow Gutmann", "votes" => 22, "price" => 347.30 ],
            [ "name" => "Alysson Stiedemann", "votes" => 31, "price" => 432.47 ]
        ]);

        $soma = $collection->sum('votes');
        //$soma = Teste::sum('votes');
        return view('teste.teste')->with('variavel', $soma);
    }


    public function vetor()
    {
        $collection = collect([
            [ "name" => "Madie Barton", "votes" => 76, "price" => 444.72 ],
            [ "name" => "Rhoda Metz", "votes" => 155, "price" => 131.92 ],
            [ "name" => "Shanie Simonis", "votes" => 123, "price" => 205.85 ],
            [ "name" => "Cory Schroeder", "votes" => 152, "price" => 130.85 ],
            [ "name" => "Ansel Nader", "votes" => 31, "price" => 475.53 ],
            [ "name" => "Floyd Kshlerin", "votes" => 36, "price" => 08.27 ],
            [ "name" => "Clint Schuster", "votes" => 15, "price" => 442.49 ],
            [ "name" => "Aiden Langosh", "votes" => 104, "price" => 418.58 ],
            [ "name" => "Woodrow Gutmann", "votes" => 22, "price" => 347.30 ],
            [ "name" => "Alysson Stiedemann", "votes" => 31, "price" => 432.47 ]
        ]);

        $vetor = $collection->toArray();

        return view('teste.teste')->with('variavel', $vetor);
    }


    public function divisao()
    {
        $collection = collect([
            [ "name" => "Madie Barton", "votes" => 76, "price" => 444.72 ],
            [ "name" => "Rhoda Metz", "votes" => 155, "price" => 131.92 ],
            [ "name" => "Shanie Simonis", "votes" => 123, "price" => 205.85 ],
            [ "name" => "Cory Schroeder", "votes" => 152, "price" => 130.85 ],
            [ "name" => "Ansel Nader", "votes" => 31, "price" => 475.53 ],
            [ "name" => "Floyd Kshlerin", "votes" => 36, "price" => 08.27 ],
            [ "name" => "Clint Schuster", "votes" => 15, "price" => 442.49 ],
            [ "name" => "Aiden Langosh", "votes" => 104, "price" => 418.58 ],
            [ "name" => "Woodrow Gutmann", "votes" => 22, "price" => 347.30 ],
            [ "name" => "Alysson Stiedemann", "votes" => 31, "price" => 432.47 ]
        ]);

        $chunks = $collection->chunk(2);
        $chunks->toArray();

        return view('teste.teste')->with('variavel', $chunks);
    }


    public function totalItem()
    {
        $collection = collect([
            [ "name" => "Madie Barton", "votes" => 76, "price" => 444.72 ],
            [ "name" => "Rhoda Metz", "votes" => 155, "price" => 131.92 ],
            [ "name" => "Shanie Simonis", "votes" => 123, "price" => 205.85 ],
            [ "name" => "Cory Schroeder", "votes" => 152, "price" => 130.85 ],
            [ "name" => "Ansel Nader", "votes" => 31, "price" => 475.53 ],
            [ "name" => "Floyd Kshlerin", "votes" => 36, "price" => 08.27 ],
            [ "name" => "Clint Schuster", "votes" => 15, "price" => 442.49 ],
            [ "name" => "Aiden Langosh", "votes" => 104, "price" => 418.58 ],
            [ "name" => "Woodrow Gutmann", "votes" => 22, "price" => 347.30 ],
            [ "name" => "Alysson Stiedemann", "votes" => 31, "price" => 432.47 ]
        ]);

        $totalItem = $collection->count();

        return view('teste.teste')->with('variavel', $totalItem);
    }


    public function estiloJson()
    {
        $collection = collect([
            [ "name" => "Madie Barton", "votes" => 76, "price" => 444.72 ],
            [ "name" => "Rhoda Metz", "votes" => 155, "price" => 131.92 ],
            [ "name" => "Shanie Simonis", "votes" => 123, "price" => 205.85 ],
            [ "name" => "Cory Schroeder", "votes" => 152, "price" => 130.85 ],
            [ "name" => "Ansel Nader", "votes" => 31, "price" => 475.53 ],
            [ "name" => "Floyd Kshlerin", "votes" => 36, "price" => 08.27 ],
            [ "name" => "Clint Schuster", "votes" => 15, "price" => 442.49 ],
            [ "name" => "Aiden Langosh", "votes" => 104, "price" => 418.58 ],
            [ "name" => "Woodrow Gutmann", "votes" => 22, "price" => 347.30 ],
            [ "name" => "Alysson Stiedemann", "votes" => 31, "price" => 432.47 ]
        ]);

        $estiloJson = $collection->toJson();

        return view('teste.teste')->with('variavel', $estiloJson);
    }


    public function parteDividida()
    {
        $collection = collect([
            [ "name" => "Madie Barton", "votes" => 76, "price" => 444.72 ],
            [ "name" => "Rhoda Metz", "votes" => 155, "price" => 131.92 ],
            [ "name" => "Shanie Simonis", "votes" => 123, "price" => 205.85 ],
            [ "name" => "Cory Schroeder", "votes" => 152, "price" => 130.85 ],
            [ "name" => "Ansel Nader", "votes" => 31, "price" => 475.53 ],
            [ "name" => "Floyd Kshlerin", "votes" => 36, "price" => 08.27 ],
            [ "name" => "Clint Schuster", "votes" => 15, "price" => 442.49 ],
            [ "name" => "Aiden Langosh", "votes" => 104, "price" => 418.58 ],
            [ "name" => "Woodrow Gutmann", "votes" => 22, "price" => 347.30 ],
            [ "name" => "Alysson Stiedemann", "votes" => 31, "price" => 432.47 ]
        ]);

        $slice = $collection->slice(2);
        $slice->all();

        return view('teste.teste')->with('variavel', $slice);
    }


    public function mesclar()
    {
        $collection = collect([
            [ "name" => "Madie Barton", "votes" => 76, "price" => 444.72 ],
            [ "name" => "Rhoda Metz", "votes" => 155, "price" => 131.92 ],
            [ "name" => "Shanie Simonis", "votes" => 123, "price" => 205.85 ],
            [ "name" => "Cory Schroeder", "votes" => 152, "price" => 130.85 ],
            [ "name" => "Ansel Nader", "votes" => 31, "price" => 475.53 ],
            [ "name" => "Floyd Kshlerin", "votes" => 36, "price" => 08.27 ],
            [ "name" => "Clint Schuster", "votes" => 15, "price" => 442.49 ],
            [ "name" => "Aiden Langosh", "votes" => 104, "price" => 418.58 ],
            [ "name" => "Woodrow Gutmann", "votes" => 22, "price" => 347.30 ],
            [ "name" => "Alysson Stiedemann", "votes" => 31, "price" => 432.47 ]
        ]);

        $merged = $collection->merge(['name'=> "Caio Scura", 'votes' => 745, 'price'=> 200.19, 'discount' => false]);
        $merged->all();

        return view('teste.teste')->with('variavel', $merged);
    }


    public function todos()
    {
        $collection = collect([
            [ "name" => "Madie Barton", "votes" => 76, "price" => 444.72 ],
            [ "name" => "Rhoda Metz", "votes" => 155, "price" => 131.92 ],
            [ "name" => "Shanie Simonis", "votes" => 123, "price" => 205.85 ],
            [ "name" => "Cory Schroeder", "votes" => 152, "price" => 130.85 ],
            [ "name" => "Ansel Nader", "votes" => 31, "price" => 475.53 ],
            [ "name" => "Floyd Kshlerin", "votes" => 36, "price" => 08.27 ],
            [ "name" => "Clint Schuster", "votes" => 15, "price" => 442.49 ],
            [ "name" => "Aiden Langosh", "votes" => 104, "price" => 418.58 ],
            [ "name" => "Woodrow Gutmann", "votes" => 22, "price" => 347.30 ],
            [ "name" => "Alysson Stiedemann", "votes" => 31, "price" => 432.47 ]
        ]);

        $unique = $collection->unique();
        $unique->values()->all();

        return view('teste.teste')->with('variavel', $unique);
    }


    public function puxar()
    {
        $collection = collect([
            [ "name" => "Madie Barton", "votes" => 76, "price" => 444.72 ],
            [ "name" => "Rhoda Metz", "votes" => 155, "price" => 131.92 ],
            [ "name" => "Shanie Simonis", "votes" => 123, "price" => 205.85 ],
            [ "name" => "Cory Schroeder", "votes" => 152, "price" => 130.85 ],
            [ "name" => "Ansel Nader", "votes" => 31, "price" => 475.53 ],
            [ "name" => "Floyd Kshlerin", "votes" => 36, "price" => 08.27 ],
            [ "name" => "Clint Schuster", "votes" => 15, "price" => 442.49 ],
            [ "name" => "Aiden Langosh", "votes" => 104, "price" => 418.58 ],
            [ "name" => "Woodrow Gutmann", "votes" => 22, "price" => 347.30 ],
            [ "name" => "Alysson Stiedemann", "votes" => 31, "price" => 432.47 ]
        ]);

        $puxar = $collection->pull('votes');

        return view('teste.teste')->with('variavel', $puxar);
    }


    public function acrescentar()
    {
        $collection = collect([
            [ "name" => "Madie Barton", "votes" => 76, "price" => 444.72 ],
            [ "name" => "Rhoda Metz", "votes" => 155, "price" => 131.92 ],
            [ "name" => "Shanie Simonis", "votes" => 123, "price" => 205.85 ],
            [ "name" => "Cory Schroeder", "votes" => 152, "price" => 130.85 ],
            [ "name" => "Ansel Nader", "votes" => 31, "price" => 475.53 ],
            [ "name" => "Floyd Kshlerin", "votes" => 36, "price" => 08.27 ],
            [ "name" => "Clint Schuster", "votes" => 15, "price" => 442.49 ],
            [ "name" => "Aiden Langosh", "votes" => 104, "price" => 418.58 ],
            [ "name" => "Woodrow Gutmann", "votes" => 22, "price" => 347.30 ],
            [ "name" => "Alysson Stiedemann", "votes" => 31, "price" => 432.47 ]
        ]);

        $acrescentar = $collection->push(["name" => "Caio Scura"]);

        return view('teste.teste')->with('variavel', $acrescentar);
    }


    public function verificacao()
    {
        $collection = collect([
            [ "name" => "Madie Barton", "votes" => 76, "price" => 444.72 ],
            [ "name" => "Rhoda Metz", "votes" => 155, "price" => 131.92 ],
            [ "name" => "Shanie Simonis", "votes" => 123, "price" => 205.85 ],
            [ "name" => "Cory Schroeder", "votes" => 152, "price" => 130.85 ],
            [ "name" => "Ansel Nader", "votes" => 31, "price" => 475.53 ],
            [ "name" => "Floyd Kshlerin", "votes" => 36, "price" => 08.27 ],
            [ "name" => "Clint Schuster", "votes" => 15, "price" => 442.49 ],
            [ "name" => "Aiden Langosh", "votes" => 104, "price" => 418.58 ],
            [ "name" => "Woodrow Gutmann", "votes" => 22, "price" => 347.30 ],
            [ "name" => "Alysson Stiedemann", "votes" => 31, "price" => 432.47 ]
        ]);

        $verificacao = $collection->has('product');

        return view('teste.teste')->with('variavel', $verificacao);
    }


    public function uniao()
    {
        $collection = collect([
            [ "name" => "Madie Barton", "votes" => 76, "price" => 444.72 ],
            [ "name" => "Rhoda Metz", "votes" => 155, "price" => 131.92 ],
            [ "name" => "Shanie Simonis", "votes" => 123, "price" => 205.85 ],
            [ "name" => "Cory Schroeder", "votes" => 152, "price" => 130.85 ],
            [ "name" => "Ansel Nader", "votes" => 31, "price" => 475.53 ],
            [ "name" => "Floyd Kshlerin", "votes" => 36, "price" => 08.27 ],
            [ "name" => "Clint Schuster", "votes" => 15, "price" => 442.49 ],
            [ "name" => "Aiden Langosh", "votes" => 104, "price" => 418.58 ],
            [ "name" => "Woodrow Gutmann", "votes" => 22, "price" => 347.30 ],
            [ "name" => "Alysson Stiedemann", "votes" => 31, "price" => 432.47 ]
        ]);

        $uniao = collect(['name', 'votes', 'price'])->join(', ');

        return view('teste.teste')->with('variavel', $uniao);
    }


    public function especificado()
    {
        $collection = collect([
            [ "name" => "Madie Barton", "votes" => 76, "price" => 444.72 ],
            [ "name" => "Rhoda Metz", "votes" => 155, "price" => 131.92 ],
            [ "name" => "Shanie Simonis", "votes" => 123, "price" => 205.85 ],
            [ "name" => "Cory Schroeder", "votes" => 152, "price" => 130.85 ],
            [ "name" => "Ansel Nader", "votes" => 31, "price" => 475.53 ],
            [ "name" => "Floyd Kshlerin", "votes" => 36, "price" => 08.27 ],
            [ "name" => "Clint Schuster", "votes" => 15, "price" => 442.49 ],
            [ "name" => "Aiden Langosh", "votes" => 104, "price" => 418.58 ],
            [ "name" => "Woodrow Gutmann", "votes" => 22, "price" => 347.30 ],
            [ "name" => "Alysson Stiedemann", "votes" => 31, "price" => 432.47 ]
        ]);

        $chunk = $collection->take(5);

        return view('teste.teste')->with('variavel', $chunk);
    }

    public function index()
    {
        //select * from testes; === Teste::all();
        $testes = Teste::all();

        return view('testes.index')-> with('itens', $testes);
    }

    public function show($id){
        // select * from testes where id = $id; === Teste::find($id);
        $testes = Teste::find($id);

        return view('testes.show')-> with('elemento', $testes);
    }

    public function create()
    {
        return view('testes.create');
    }

    public function store(Request $request)
    {
        $teste = new Teste;

        $teste->name = $request->name;
        $teste->email = $request->email;
        $teste->price = $request->price;
        $teste->votes = $request->votes;

        $teste->save();

        return redirect()->route('testes.index');
    }

    public function edit($id)
    {
        $testes = Teste::find($id);

        return view('testes.edit')-> with('elemento', $testes);
    }

    public function uptade($id, Request $request)
    {
        $teste = Teste::find($id);

        $teste->name = $request->name;
        $teste->email = $request->email;
        $teste->price = $request->price;
        $teste->votes = $request->votes;

        $teste->save();

        return redirect()->route('testes.index');
    }
}
