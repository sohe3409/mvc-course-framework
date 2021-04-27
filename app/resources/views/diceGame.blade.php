@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container">
          <?php
          $current = session('score');
          $current += (int)$sum;
          session(['score' => $current]);
          $total = session('score');
          if ($total > 21) {
              $status = "Your score: " . $total . "<br> You lost!";
              $current = session('computer');
              $current += 1;
              session(['computer' => $current]);
          } else if ($total === 21) {
              $status = "Your score: " . $total . "<br>Congratulations, you won!";
              $current = session('user');
              $current += 1;
              session(['user' => $current]);
          } else {
              $status = "Total score: " . $total;
          }?>

          <p><?= $sum ?></p>
          <p><?= $status ?></p>



          <form action="{{ url('/dice') }}" method="post">
              @csrf
              <input type="submit" name="action" value="Roll again">
          </form>
          <br>
          <form action="{{ url('/dice') }}" method="post">
              @csrf
              <input type="hidden" name="score" value="<?= $total ?>">
              <input type="submit" name="action" value="Stop">
          </form>
          <br>
          <form action="{{ url('/dice') }}" method="post">
              @csrf
              <input type="submit" name="action" value="New round">
          </form>

          <h2>Rounds won:</h2>
          <p>You: <?= session('user') ?></p>
          <p>Computer: <?= session('computer') ?></p>

          <form action="{{ url('/dice') }}" method="post">
              @csrf
              <input type="submit" name="action" value="Start over">
          </form>
          <br>


        </div>
    </div>
@endsection
