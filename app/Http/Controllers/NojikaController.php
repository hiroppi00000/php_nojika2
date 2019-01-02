<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Big_item_category;
use App\Middle_item_category;
use App\Items;

class NojikaController extends Controller
{
    /**
     * 新規登録画面を表示
     *
     * @param Request $request
     * @param string $result ...regist_item()にて値がセットされる。falseの時、登録失敗。nothing以外のtrueは成功
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function new_create(Request $request, $result = 'nothing')
    {
        //大カテゴリ
        $big_item_category = Big_item_category::select(['*'])->get();
        //ミドルカテゴリ
        $middle_item_categories = [];

        foreach($big_item_category as $big_category)
        {
            $middle_item_categories[] = Middle_item_category::where('big_category_id', $big_category->id)->get();
        }

        return view('nojika/new_create',[
            'big_item_category' => $big_item_category,
            'middle_item_categories' => $middle_item_categories,
            'result' => $result
        ]);
    }

    /**
     * アイテム登録処理
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View ...new_create()にて登録画面に戻る
     */
    public function regist_item(Request $request)
    {
        $result = false;

        try
        {
            $result = Items::firstOrCreate([
                'middle_category_id' => (int)$request->post('middle_category_id'),
                'location' => $request->post('location'),
                'name' => $request->post('name'),
                'price' => (int)$request->post('price'),
                'note' => $request->post('note') ?? '',
                'item_date' => $request->post('item_date')
            ]);
        }
        catch(Exception $ex)
        {
            $result = false;
        }

        return $this->new_create($request, $result);
    }
}
