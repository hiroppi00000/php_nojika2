@extends('layouts.app_nojika')
@section('contents')
<div class="top_square">
    <img src="/nojika/svg/top/deer.svg" width="250" height="400" style="float: left; margin-top: 35px; margin-right: 35px;"/>
    <p class="top_title">Nojika with PHP</p>
    @if(0 < count($errors))
        <p style="color:white">{{$errors->first('email')}}</p>
        <p style="color:white">{{$errors->first('password')}}</p>
    @endif
    <form method="post" action="">
        <br>
        <label class="top_label"><b>ID:</b></label><input type="text" name="email">
        <br>
        <br>
        <label class="top_label"><b>PW:</b></label><input type="password" name="password">
        <br>
        <br>
        <br>
        <br>
        　　　　　<button type="submit" class="btn btn-primary">login</button>

        {{ csrf_field() }}
    </form>
</div>
@endsection
