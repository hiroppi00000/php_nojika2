@extends('layouts.app_nojika')
@section('contents')

<table border="1">
    <tr>
        <td>週間合計</td>
        <td>￥{{number_format($week_total_price)}}</td>
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
        <td colspan="4">{{$day_key}}</td>
    </tr>
    <tr>
        <td colspan="4">￥{{ number_format($result['each_total'][$day_key]) }}</td>
    </tr>
    @php $i = 0; @endphp
    @foreach($items as $item)
        <tr>
            <td>{{$item['name']}}</td>
            <td>{{$item['location']}}</td>
            <td>{{$item['note']}}</td>
            <td>￥{{ number_format($item['price'])}}</td>
        </tr>
    @endforeach
</table>
@endforeach
@endsection