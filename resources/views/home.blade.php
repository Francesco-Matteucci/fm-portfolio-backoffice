{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="card-dashboard d-flex flex-column justify-content-center align-items-center">
    {{-- Sezione centrata verticalmente/orizzontalmente --}}
    <div class="card p-5 text-center animate__animated animate__fadeIn"
         style="max-width: 600px; width: 100%; background-color: #1e1e1e; border-color: #2b2b2b;">
        <h1 class="mb-4" style="font-weight: 700;">Benvenuto nel mio Portfolio</h1>
        <p class="lead mb-4">
            Qui potrai scoprire i miei progetti e, se accedi,<br>
            gestirli dall’area Admin.
        </p>
    </div>
</div>
@endsection
