@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Nieuw product toevoegen.
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="/product" method="POST" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Naam product</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Naam Boodschappenlijst" value="">
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
