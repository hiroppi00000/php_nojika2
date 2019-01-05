<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Big_item_category;
use App\Middle_item_category;
use App\Items;
use Carbon\Carbon;
use DB;

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
                'middle_category_id' => (int)$request->post('middle_item_category'),
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

    public function check(Request $request)
    {
        $dt = Carbon::today();
        $dt = $dt->startOfWeek()->subDay(1);

        $result = ['each' => [], 'each_total' => []];
        for($i = 1 ;$i <= 7; $i++)
        {
            $item = Items::where('item_date', '=', $dt->toDateString())->orderBy('price', 'desc')->get();
            $result['each'][$dt->toDateString()] = $item;

            $total = 0;
            foreach($item as $value)
            {
                $total += $value['price'];
            }
            $result['each_total'][$dt->toDateString()] = $total;
            $dt = $dt->addDay(1);
        }

        $dt2 = Carbon::today();
        $dt2 = $dt2->startOfWeek()->subDay(1);
        $sunday = $dt2->toDateString();
        $saturday = $dt2->addDay(6)->toDateString();

        $result2 = DB::table('items')->select([
            'items.id',
            'items.middle_category_id',
            'big_item_categories.name',
            'big_item_categories.id as bid',
            'items.price'
        ])->leftjoin('middle_item_categories', 'items.middle_category_id', '=', 'middle_item_categories.id')
        ->leftjoin('big_item_categories', 'middle_item_categories.big_category_id', '=', 'big_item_categories.id')
        ->whereBetween('item_date', array($sunday, $saturday))
        ->get();

        $big_category = Big_item_category::all();
        $big_category_array = [];
        foreach($big_category as $big)
        {
            $big_category_array[$big->id] = ['name' => $big->name, 'total_price' => 0];
        }

        $week_total_price = 0;
        foreach($result2 as $item)
        {
            $big_category_array[$item->bid]['total_price'] += $item->price;
            $week_total_price += $item->price;
        }

        return view('nojika/check', [
            'result' => $result,
            'big_category_array' => $big_category_array,
            'week_total_price' => $week_total_price
        ]);
    }
}
