@extends('layouts.profile')

@section('leftSidebar')

<div class="card sticky top-[115px]">
    <div class="card-body">
        <h2>Username</h2>
    </div>
</div>
@endsection

@section('content')
<div class="card mb-3">
    <div class="card-body">
        <h1 style="align-self: center;">Publicaciones</h1>
    </div>
</div>
@foreach ($posts as $post)
<div class="card mb-3">
    <div class="card-body">
        <div class="feed">
            <p style="font-weight: 600;">
                Publicado por: {{ $post->user->name }}
            </p>

            <img src="{{ $post->image }}" alt="post image">

            <p>{{ $post->description }}</p>
            <p>{{ $post->created_at }}</p>
        </div>
    </div>


</div>
@endforeach
@endsection

@section('rightSidebar')
<div class="d-flex flex-column gap-3"> <!-- gap entre cards -->
    @foreach ($jobsOffer as $job)
    <div class="card">
        <div class="card-body d-flex justify-content-between align-items-start">
            <div>
                <p style="font-weight: 600;">{{ $job->user->name }} ha publicado esta oferta de trabajo</p>
                <p><strong>{{ $job->title }}</strong></p>
                <p>{{ $job->description }}</p>
                <p>Salario: {{ $job->salary }} €</p>
                <p>Pulicado: {{ $job->created_at}}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection






