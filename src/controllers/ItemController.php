<?php

namespace App\Controllers;

use Illuminate\Database\QueryException;
use App\Models\Item;
use App\Models\Database;


class ItemController extends Controller
{
    function __construct()
    {
        Database::connect();
    }

    public function getAll()
    {
        return Item::find(1)->toJson();
    }


    // function getSelf()
    // {
    //     $item = $this->getAll();
    //     $this->item = new \stdClass();
    //     $test = json_decode($item);
    //     var_dump($test->shortTitle);
    // }
}
