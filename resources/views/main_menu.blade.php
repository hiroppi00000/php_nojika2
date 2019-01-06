@extends('layouts.app_nojika')
@section('contents')
<script type="text/javascript">
    $(function(){
        $("#new_create").off().on('click', function(e){
            document.location.href = '{{url('new_create')}}';
        });

        $("#check").off().on('click', function(e){
            document.location.href = '{{url('check')}}';
        });

        $("#from_to_check").off().on('click', function(e){
            document.location.href = '{{url('from_to_check')}}';
        });
    });
</script>
<div class="head_test-wrap">
    <h1 class="head_test">
        MENU
    </h1>
</div>
<div class="box8" id="new_create">
    <p>データ作成</p>
</div>
<div class="box8" id="check">
    <p>データ確認</p>
</div>
<div class="box8" id="from_to_check">
    <p>期間指定　データ確認</p>
</div>

@endsection
