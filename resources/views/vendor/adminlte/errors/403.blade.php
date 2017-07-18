@extends('adminlte::layouts.errors')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.pagenotfound') }}
@endsection

@section('main-content')

    <div class="error-page">
        <h2 class="headline text-yellow"> 403</h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Accès refusé.</h3>
            <p>
                Vous n'avez pas les droits pour accéder à cette ressource.
                {{ trans('adminlte_lang::message.mainwhile') }} <a href='{{ url('/home') }}'>{{ trans('adminlte_lang::message.returndashboard') }}</a>.
                <br>
                <br>
                <br>
            </p>
            {{-- <form class='search-form'>
                <div class='input-group'>
                    <input type="text" name="search" class='form-control' placeholder="{{ trans('adminlte_lang::message.search') }}"/>
                    <div class="input-group-btn">
                        <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i></button>
                    </div>
                </div><!-- /.input-group -->
            </form> --}}
        </div><!-- /.error-content -->
    </div><!-- /.error-page -->
@endsection
