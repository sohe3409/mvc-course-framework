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
          <div class="result">
              <p><?= $sum ?></p>
              <p><?= $status ?></p>
              <p><?= $message ?></p>
          </div>


          <form action="{{ url('/game') }}" method="post">
              @csrf
              <input class="button" type="submit" name="action" value="Roll again">
          </form>
          <br>
          <form action="{{ url('/game') }}" method="post">
              @csrf
              <input type="hidden" name="score" value="<?= $total ?>">
              <input class="button" type="submit" name="action" value="Stop">
          </form>
          <br>
          <form action="{{ url('/game') }}" method="post">
              @csrf
              <input class="button" type="submit" name="action" value="New round">
          </form>

          <p>Rounds won:</p>
          <p>You: <?= session('user') ?></p>
          <p>Computer: <?= session('computer') ?></p>

          <form action="{{ url('/game') }}" method="post">
              @csrf
              <input class="button" type="submit" name="action" value="End game">
          </form>
          <br>
            <div class="book-img">
                @php
                $highscore = (session('user') - session('computer')) * 10;
                @endphp
                @if($highscore > 0)
                    <br>
                    <form action="{{ url('/highscores') }}" method="post">
                        @csrf
                        <label for="name">Your name: </label>
                        <input type="text" id="name" name="name" minlength="3" maxlength="10" required>
                        <input type="hidden" name="score" value="{{ $highscore }}">
                        <input class="button" type="submit" name="action" value="Save score">
                    </form>
                @else
                    <br>
                    <p style="font-size: 1rem; color: blue">You must have won more rounds than the computer to save your score.</p>
                @endif
            </div>
        </div>
    </div>
@endsection