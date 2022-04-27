<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Requests\ProductsRequest;
use App\Http\Resources\ProductsResource;
use App\Http\Controllers\HistoryController;

class ProductsController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Products $Products)
  {
    $response = [];
    $allData = ProductsResource::collection($Products::all());
    // Condição para caso não existir dados a serem exibidos
    if(count($allData) > 0) {
      $response['status'] = 1;
      $response['data'] = $allData;
    } else {
      $response['status'] = 0;
      $response['data'] = [];
    }

    return $response;
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Models\Products  $produtos
  * @return \Illuminate\Http\Response
  */
  public function show($produto)
  {
    $response = [];
    $prod = Products::find($produto);

    if($prod) {
      $response['status'] = 1;
      $response['data'] = new ProductsResource($prod);
    } else {
      $response['status'] = 0;
      $response['mensagem'] = 'Produto inexistente ou não encontrado...';
    }

    return $response;
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(ProductsRequest $request)
  {
    $response = [];

    try {
      $Produto = new Products;
      $Produto->name = $request->name;
      $Produto->sku = $request->sku;
      $Produto->qtd = $request->qtd;
      $Produto->save();

      $response['status'] = 1;
      $response['data'] = new ProductsResource($Produto);
    } catch (\Throwable $th) {
      $response['status'] = 0;
      $response['error'] = $th->getMessage();
      $response['mensagem'] = 'Não foi possível executar esta ação...';
    }

    return response ($response, 201);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Products  $produtos
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    $response = [];

    try {
      $produto = Products::find($id);
      // Create the movimentation history
      HistoryController::store($request->all(), $produto);
      // Atualiza o registro
      $produto->update($request->all());

      $response['status'] = 1;
      $response['mensagem'] = 'Produto atualizado com sucesso';
    } catch (\Throwable $th) {
      $response['status'] = 0;
      $response['error'] = $th->getMessage();
      $response['mensagem'] = 'Não foi possível executar esta ação...';
    }

    return response ($response, 200);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Products  $produtos
  * @return \Illuminate\Http\Response
  */
  public function destroy($produto)
  {
    $response = [];

    try {
      Products::destroy($produto);

      $response['status'] = 1;
      $response['mensagem'] = 'Produto deletado com sucesso';
    } catch (\Throwable $th) {
      $response['status'] = 0;
      $response['error'] = $th->getMessage();
      $response['mensagem'] = 'Não foi possível executar esta ação...';
    }
    return response($response, 200);
  }
}
