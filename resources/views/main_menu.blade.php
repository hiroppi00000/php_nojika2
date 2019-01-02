@extends('layouts.app_nojika')
@section('contents')
<script type="text/javascript">
    $(function(){
        $("#new_create").off().on('click', function(e){
            document.location.href = '{{url('new_create')}}';
        });
    });
</script>
<div class="head_test-wrap">
    <h1 class="head_test">
        MENU
    </h1>
</div>
<div class="box8" id="new_create">
    <p>新規作成</p>
</div>
<div class="box8">
    <p>カレンダーから選択</p>
</div>
<div class="box8">
    <p>レコード確認</p>
</div>
@endsection
