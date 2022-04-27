<?php

namespace App\Http\Controllers;

use Response;
use App\Models\History;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Resources\HistoriesResource;

class HistoryController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(History $History)
  {
    $response = [];
    $allData = HistoriesResource::collection($History::all());
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
  * Store the data at the product update
  * 
  * @param $productReq
  * @return \Illuminate\Http\Response
  */
  public function store($productReq, $productDB)
  {
    $action = '';
    $response = [];
    $difference = 0;

    try {
      $History = new History;
      // Validando se o SKU do produto sofreu alteração
      if($productDB->sku != $productReq['sku'] && $productReq['sku'] != '') {
        $History->sku = $productReq['sku'];
      } else {
        $History->sku = $productDB->sku;
      }
      // Condição para verificar se a quantidade foi adicionada ou removida
      if($productDB->qtd < $productReq['qtd']) {
        $action = 'acrescentada';
        $difference = $productReq['qtd'] - $productDB->qtd;
      } else if ($productDB->qtd > $productReq['qtd']) {
        $action = 'removida';
        $difference = $productDB->qtd - $productReq['qtd'];
      } else {
        $action = 'none';
      }

      $History->qtd = json_encode(array(
        "action" => $action,
        "oldVal" => $productDB->qtd,
        "newVal" => $productReq['qtd'],
        "differenceBetween" => $difference
      ));
      $History->productID = $productDB->id;
      $History->save();

      $response['status'] = 1;
    //   $response['data'] = new HistoriesResource($History);
      $response['data'] = $productDB;
    } catch (\Throwable $th) {
      $response['status'] = 0;
      $response['error'] = $th->getMessage();
      $response['mensagem'] = 'Não foi possível executar esta ação...';
    }

    return response ($response, 201);
  }
}
