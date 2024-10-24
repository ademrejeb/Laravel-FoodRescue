@extends('layouts.commonMaster')

@section('title', 'Dashboard')

@section('layoutContent')
    <div class="container">
        <h3>Vos Notifications</h3>
        <ul>
            @foreach($notifications as $notification)
                <li>{{ $notification->data['message'] }} - <a href="{{ $notification->data['link'] }}">Voir les détails</a></li>
            @endforeach
        </ul>
    </div>
@endsection
