@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 container">
            <div class="panel panel-primary row">
                <div class="col-xs-12 panel-heading">
                    <div class="col-xs-8 col-md-10" style="padding-top: 5px;">Boodschappenlijstjes</div>
                    <div class="col-xs-1 col-md-1">
                        <a href="/lijst/create" class="btn btn-default btn-sm" role="button">nieuwe lijst</a>
                    </div>
                </div>
            </div>
            <div class="panel panel-default row">
                <div class="panel-body container-fluid">
                    @if (count($lijsts) > 0)
                        @foreach ($lijsts as $lijst)
                            <div class="row">
                                <div class="col-xs-8 col-md-10">
                                    {{ $lijst->name }}
                                </div>
                                <div class="col-xs-2 col-md-1">
                                    <a href="/lijst/{{ $lijst->id}}/edit" class="btn btn-primary btn-xs" role="button">edit</a>
                                </div>
                                <div class="col-xs-1 col-md-1">
                                    <form action="lijst/{{ $lijst->id }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit"  class="btn btn-primary btn-xs" role="button" value="delete">
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div style="height: 30px;">
                            Er is geen boodschappenlijst aangemaakt.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
