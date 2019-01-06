@extends('layouts.app_nojika')
@section('contents')
<script type="text/javascript">
    $(function(){
        jQuery('#from_id').datepicker({
            dateFormat: 'yy-mm-dd'
        });
        jQuery('#to_id').datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
</script>
    <form method="post" action="{{url('/from_to_check')}}">
        @csrf
        from:<br>
        <input type="text" name="from" id="from_id">
        <br>
        to:<br>
        <input type="text" name="to" id="to_id">
        <br>
        <br>
        <button type="submit" class="btn-primary" style="width:200px;">検索</button>
    </form>

@if(isset($result))
    <h1>{{$request->post('from')}}　〜　</h1>
    <h1>{{$request->post('to')}}</h1>

    <table border="1">
        <tr>
            <td>合計</td>
            <td>￥{{number_format($range_total_price)}}</td>
        </tr>
        @foreach($big_category_array as $big_category)
            <tr>
                <td>{{$big_category['name']}}</td>
                <td>￥{{number_format($big_category['total_price'])}}</td>
            </tr>
        @endforeach
    </table>
    <br>
    <br>
    @foreach($result['each'] as $day_key => $items)
        <table border="1">
            <tr>
                <td colspan="5">{{$day_key}}</td>
            </tr>
            <tr>
                <td colspan="5">￥{{ number_format($result['each_total'][$day_key]) }}</td>
            </tr>
            @php $i = 0; @endphp
            @foreach($items as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->iname}}</td>
                    <td>{{$item->location}}</td>
                    <td>{{$item->note}}</td>
                    <td>￥{{ number_format($item->price)}}</td>
                </tr>
            @endforeach
        </table>
        <br>
        <br>
    @endforeach
@endif
@endsection