@extends('layouts.manage')
@section("script")

@endsection

@section('content')
    <div class="page-list">
        <div class="row page-list-header">
            <div class="col-xs-8 text-left">

            </div>
            <div class="col-xs-4 text-right">

                <form method="get" cssClass="form-horizontal">
                    @if (Auth::guest())
                        <a href="{{ url('manage/login') }}">登陆</a>
                        <a href="{{ url('manage/register') }}">注册</a> </span>@else

                        {{ Auth::user()->name }}  <a href="{{ url('/logout') }}" class="n2">登出</a>

                    @endif
                </form>
            </div>
        </div>
        <div class="row page-list-body">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row page-list-footer">
            <div class="col-xs-6">

            </div>
            <div class="col-xs-6 text-right">

            </div>
        </div>
        @include('common.success')

    </div>
@endsection