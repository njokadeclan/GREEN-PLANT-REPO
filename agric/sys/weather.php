<?php
$cache_file = 'data.json';
if (file_exists($cache_file)) {
  $data = json_decode(file_get_contents($cache_file));
} else {
  $api_url = 'https://content.api.nytimes.com/svc/weather/v2/current-and-seven-day-forecast.json';
  $data = file_get_contents($api_url);
  file_put_contents($cache_file, $data);
  $data = json_decode($data);
}

$current = isset($data->current[0]) ? $data->current[0] : null;
$forecast = isset($data->seven_day_forecast) ? $data->seven_day_forecast : null;

function convert2cen($value, $unit) {
  if ($unit == 'C') {
    return $value;
  } else if ($unit == 'F') {
    $cen = ($value - 32) / 1.8;
    return round($cen, 2);
  }
}
?>

<br>

<div class="row">
  <?php if ($current !== null) { ?>
    <h3 class="title text-center bordered">Weather Report for <?php echo $current->city . ' (' . $current->country . ')'; ?></h3>
    <!-- ... (rest of your weather report HTML) -->
  <?php } ?>
</div>

<br><br>

<div class="row">
  <?php
  if ($forecast !== null && is_array($forecast)) {
  ?>
    <h3 class="title text-center bordered">5 Days Weather Forecast for <?php echo $current ? $current->city . ' (' . $current->country . ')' : ''; ?></h3>
    <?php
    $loop = 0;
    foreach ($forecast as $f) {
      $loop++;
    ?>
      <div class="single forecast-block bordered">
        <h3><?php echo convert2cen(@$f->day, ''); // Use @ operator to suppress errors ?></h3>
        <p style="font-size:1em;" class="aqi-value">
          <?php echo convert2cen(@$f->low, ''); // Use @ operator to suppress errors ?> °C - 
          <?php echo convert2cen(@$f->high, ''); // Use @ operator to suppress errors ?> °C
        </p>
        <hr style="border-bottom:1px solid #fff;">
        <img src="<?php echo @$f->image; // Use @ operator to suppress errors ?>">
        <p><?php echo @$f->phrase; // Use @ operator to suppress errors ?></p>
      </div>
    <?php
    }
  }
  ?>
</div>
