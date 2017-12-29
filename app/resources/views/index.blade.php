@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="app">
                    <note-list :notes="notes"></note-list>
                </div>
            </div>
        </div>
    </div>
@endsection
