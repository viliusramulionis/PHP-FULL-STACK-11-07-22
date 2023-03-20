@extends('layouts.main')

@section('turinys')
    <h1>Naujas įrašas</h1>

    <form method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="mb-2">
            <label>Pavadinimas</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-2">
            <label>Turinys</label>
            <textarea name="content" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <label>Nuotrauka</label>
            <input type="text" name="photo" class="form-control">
        </div>
        <button class="btn btn-primary">Siųsti</button>
    </form>
@stop
