@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 container-fluid">
            <div class="panel panel-primary row">
                    <div class="panel-heading">Uw boodschappenlijst!</div>
            </div>
            <div class="panel panel-default row">
                <form action="/lijst/{{ $lijst->id }}" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="col-xs-12 panel-body" style="padding-left: 5px;">
                        <div class="col-xs-3 col-md-2" style="padding-top: 7px;">                        
                            {{ $lijst->created_at->format('d-m-Y') }}
                        </div>
                        <div class="col-xs-6 col-md-9">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Naam Boodschappenlijst" value="{{ $lijst->name }}">
                        </div>
                        <div class="col-xs-1 col-md-1">
                            <button type="submit" class="btn btn-primary btn-sm">Wijzig</button>
                        </div>
                    </div>
                </form>
            </div>
            <div>  
                &nbsp;
            </div>
            <div class="panel panel-primary row">
                <div class="panel-heading">Losse Producten!</div>
            </div>
            <div class="panel panel-default row">
                <div class="panel-body container-fluid" >
                    @if (count($usedproducts) > 0)
                        @foreach ($usedproducts as $usedproduct)
                            <div class="row" style="padding: 10px;">
                                <div class="col-xs-1 col-md-1">
                                    {{ $usedproduct->pivot->quantity }}
                                </div>
                                <div class="col-xs-2 col-md-2">
                                    {{ $usedproduct->unit()->first()->symbol }}
                                </div>
                                <div class="col-xs-6 col-md-8">
                                    <strong>{{ $usedproduct->name }}</strong>
                                </div>
                                <div class="col-xs-1 col-md-1">
                                    <form action="/product/delete/{{ $lijst->id }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="product_id" value="{{ $usedproduct->id }}">
                                        <input type="hidden" name="unit_id" value="{{ $usedproduct->unit()->first()->id}}">
                                        <input type="submit"  class="btn btn-primary btn-xs" role="button" value="delete">
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div style="height: 30px; padding: 20px;">
                            Er zijn geen producten toegevoegd aan dit boodschappenlijstje.
                        </div>
                    @endif
                </div>
            </div>
            <div class="panel panel-default row">
                <div class="panel-body container-fluid">
                    <form action="/product/add/{{ $lijst->id }}" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xs-2" style="float:left; padding: 0px 2px;">
                                <input type="text" class="form-control" style="padding: 2px 10px;" name="quantity" id="quantity" placeholder="" value="">
                            </div>
                            <div class="col-xs-4" style="float:left; padding: 0px 2px;">
                                <select class="form-control" name="unit_id" style="float:left; padding: 0px 2px;">
                                    <option></option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">({{ $unit->symbol }}) {{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-6" style="float:left; padding: 0px 2px;">
                                <input class="form-control" list="products" name="product_name" />
                                <datalist id="products">
                                    @foreach ($unusedproducts as $unusedproduct)
                                        <option value="{{ $unusedproduct->name }}">
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 10px;">
                            <button type="submit" class="pull-right btn btn-primary">product toevoegen</button>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
