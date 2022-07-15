<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Zoo Simulator</title>
  <meta name="description" content="Zoo Simulator">
  <meta name="author" content="ErickTCuevas">
  <style>
    a, a:hover, a:focus, a:active {
    text-decoration: none;
    color: inherit;
    }
    .header {
      text-align: center;
      width: 100%;
    }
    .current_time {
      text-align: center;
      display: inline-block;
      width: 100%;
    }
    .controls {
      display: flex;
      justify-content: center;
      width: 100%;
      min-width: 390px;
    }
    .controls__button {
      text-align: center;
      display: inline-block;
      background-color: lightgray;
      text-decoration: none;
      width: 120px;
      padding: 10px 0;
      margin: 0 auto;
      border-radius: 5px;
      min-width: 180px;

    }
    .main {
      display: inline-block;
      width: 90%;
    }
    .pavilion {
      display: inline-block;
      width: 33%;
      min-width: 390px;
    }
    .pavilion__title {
      width: 100%;
      text-align: center;
    }
    #gameover {
      display: none;
    }
    #playagain {
      display: none;
    }
  </style>

</head>

<body>
  <div class="main" >
    <div class="header"><h2>Zoo Simulator</h2></div>
    <div class="current_time"><h4>Current Time: <bold><?php echo $template_data['current_time']; ?></bold> Hours. 
      <?php
        $days = floor($template_data['current_time'] / 24);
        $years = floor($days / 365);
        $hours = $template_data['current_time'] % 24;
        $formated_time='( ';
        if( $years > 0 ){
          $days = $template_data['current_time'] % 365;
          $formated_time .= "Years: ". $years;
        }
        $formated_time .= " Days: " . $days . " Hours: " . $hours .") ";
        echo $formated_time;
      ?></h4>
    </div>
    <div id="gameover" class="current_time"><h2><strong>Game Over<strong></h2></div>
    <div id="playagain" class="controls">
      <center><a class="controls__button" href="/">Play Again</a></center>
    </div>
    <div id="controls" class="controls">
      <?php echo '<a  class="controls__button" href="?route='. $template_data['feed_uri'] .'&data='.$template_data['rendered_data'] .'">Feed Animals</a>';?>
      <?php echo '<a class="controls__button" href="?route='. $template_data['pass_time_uri'] .'&data='.$template_data['rendered_data'] .'">Provoke Pass Time</a>';?>
    </div>
    <?php
      $total_animals = 0;
      $total_dead_animals = 0;
      foreach( $template_data['animals'] as $animal_type => $animal_array ){
        $number_of_animals = count($animal_array);
        $total_animals += $number_of_animals;
        echo '<div class="pavilion">';
        echo '<h4 class="pavilion__title">' . $animal_type .' Pavilion </h4>';
        echo '<ol>';
        for( $index = 0; $index < $number_of_animals; $index++ ){
          $animal_status = $template_data['animals']["$animal_type"][$index]->getStatus();
          if( $animal_status == AnimalStatus::STATUS_DIED ){
            $total_dead_animals++;
          }
          echo '<li>' . $animal_type . '</li>';
          echo '<ul>';
          echo '<li>Status: ' . $animal_status . '</li>';
          echo '<li>Health: ' . number_format($template_data['animals']["$animal_type"][$index]->getHealth(),2) . '%</li>';  
          echo '</ul>';        
        }
        echo '</ol>';
        echo '</div>';
      }
    ?>
  </div>
  <script type="text/javascript">
  <?php if( $total_dead_animals == $total_animals ){ ?>
    document.getElementById("controls").style.display = "none";
    document.getElementById("gameover").style.display = "inline-block";
    document.getElementById("playagain").style.display = "inline-block";
  <?php } ?>
  </script>
</body>
</html>

