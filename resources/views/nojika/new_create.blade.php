@extends('layouts.app_nojika')
@section('contents')
<script type="text/javascript">
    $(function(){
        //データピッカー表示
        jQuery('#datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        });

        //初期表示ではミドルカテゴリを全部非表示
        allHideMiddleCategory();
    });

    /**
     * ミドルカテゴリをすべて非表示にする
     */
    function allHideMiddleCategory()
    {
        for(var i = 1;i <= {{count($middle_item_categories)}};i++)
        {
            jQuery('#middle_item_category_' + i).hide();
        }
    }

    /**
     * 指定したIDのミドルカテゴリを表示する
     * @param middle_category_id ...ミドルカテゴリに割付されたID
     */
    function showMiddleCategory(middle_category_id)
    {
        //最初に全部非表示
        allHideMiddleCategory();
        //ミドルカテゴリの値はクリア
        jQuery('#middle_item_category').val('');
        //ミドルカテゴリを表示
        jQuery('#middle_item_category_' + middle_category_id).show();
    }

    function submitCheck()
    {
        if(jQuery('#middle_item_category').val() == '')
        {
            alert('ミドルカテゴリーが選択されていません');
            return false;
        }

        return true;
    }

    function setMiddleCategory(middle_item_category_id)
    {
        jQuery('#middle_item_category').val(middle_item_category_id);
    }
</script>
<div class="head_test-wrap">
    <h1 class="head_test">
        新規作成
    </h1>
</div>
@if($result && $result !== 'nothing')
    <p class="alert-info">登録に成功しました</p>
@elseif($result === false)
    <p class="alert-danger">登録に失敗しました</p>
@endif
<form onsubmit="return submitCheck();" method="post" action="{{url('/regist_item')}}">
@csrf
<input type="hidden" name="middle_item_category" id="middle_item_category" value="">
大カテゴリー：<br>
<select name="big_item_category" size="{{count($big_item_category)}}" required>
    @foreach($big_item_category as $big_category)
        <option value="{{$big_category->id}}"
         onclick="showMiddleCategory({{$big_category->id}})"
        >{{$big_category->name}}</option>
    @endforeach
</select>
<br>
中カテゴリー：<br>
@foreach($middle_item_categories as $middle_category)
<select name="middle_item_category" size="@if(1 == count($middle_category)) 2 @else {{count($middle_category)}} @endif" id="middle_item_category_{{$loop->iteration}}">
    @foreach($middle_category as $m_category)
        <option value="{{$m_category->id}}" onclick="setMiddleCategory({{$m_category->id}})">{{$m_category->name}}</option>
    @endforeach
</select>
@endforeach
<br><br>
カレンダー：<br><input type="text" name="item_date" id="datepicker" required>
<br>
場所：<br>
<input type="場所" name="location" required>
<br>
名前：<br>
<input type="text" name="name" required>
<br>
価格：<br>
<input type="number" name="price" required>
<br>
備考：<br>
<input type="text" name="note">
<br>
<br>
<button class="btn-block" type="submit"
        style="width:150px;background-color: blue;color: white;"
>登録</button>
</form>

@endsection