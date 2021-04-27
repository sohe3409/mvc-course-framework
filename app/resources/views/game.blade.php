@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container">
            <p>Gaaaame!!</p>

            <form action="{{ url('/dice') }}" method="post">
                @csrf
                <input type="radio" name="dices" value="1" required>
                <label for="dices">1</label>
                <input type="radio" name="dices" value="2" required>
                <label for="dices">2</label>
                <input type="submit" name="action" value="start">
            </form>

        </div>
    </div>
@endsection
