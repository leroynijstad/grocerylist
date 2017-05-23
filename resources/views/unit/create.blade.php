@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Nieuw eenheid toevoegen
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="/unit" method="POST" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Naam (1 stuk mango)</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Naam van eenheid" value="">
                        </div>
                        <div class="form-group">
                            <label for="plural">Meervoud (2 stuks mango)</label>
                            <input type="text" class="form-control" name="plural" id="plural" placeholder="Meervoud van eenheid" value="">
                        </div>
                        <div class="form-group">
                            <label for="symbol">Symbool (kg)</label>
                            <input type="text" class="form-control" name="symbol" id="symbol" placeholder="Symbool van eenheid" value="">
                        </div>
                        <input type="hidden" name="url" value="{{ url()->previous() }}">
                        <div class="form-group row">
                          <div class="col-md-2" style="float:right;">
                            <button type="submit" class="btn btn-primary">Voeg toe</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
