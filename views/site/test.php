<div class="w3-display-container w3-wide">
		<img src="http://www.designbolts.com/wp-content/uploads/2014/03/Blue-Blur-Background1.jpg" style="width:100%;height:100%;" class="w3-image">
		  <div class="w3-display-topmiddle w3-margin-top">
			
				<?php 
				echo $country;
				echo $logo; 
				//echo "<center><h2>".$desc."</h1></center>";
				?>
				
		  </div>
	
	
	<div class="w3-display-middle w3-margin-top w3-padding-top">
		<div class="w3-animate-left w3-margin-top"><br><br><br>
<h1 class="w3-xlarge">

			<?php //echo $temperature; ?>
			<?php echo $clouds; ?>
			<?php echo $humidity; ?>
			<?php echo $windspeed; ?>
			<?php echo $pressure; ?>
			<?php //echo $visibility; ?>
			<?php echo $sunrise; ?>
			<?php echo $sunset; ?>
			</h2>
		</div>
		
	</div>
	
	</div>

	<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="..." alt=<?php echo $country;
				echo $logo; ?> >
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
  </div>
</div>
$weather = $data['consolidated_weather'][0]['weather_state_name'];
                $icon = $data['consolidated_weather'][0]['weather_state_abbr'];
                $country =  "<h4 class='w3-xxxlarge w3-animate-zoom'><b>".$data['title']."</h4></b>";
                $logo = "<img src='https://www.metaweather.com/static/img/weather/ico/".$data['consolidated_weather'][0]['weather_state_abbr'].".ico' style='width:42px'>";
                $max = "Max:".round($data['consolidated_weather'][0]['max_temp'])."<sup>o</sup>C<br>";
                $min = "Min:".round($data['consolidated_weather'][0]['min_temp'])."<sup>o</sup>C<br>";
                $get_time = $data['time'];
                $time = date('h:i A', strtotime($get_time));
                $humidity = "<b>Humidity:".$data['consolidated_weather'][0]['humidity']."%<br>";
                $pressure = "<b>Pressure:".$data['consolidated_weather'][0]['wind_speed']."hpa<br>";
                $visibility =  "<b>Visibility:".round($data['consolidated_weather'][0]['visibility'], 1)." miles</b><br>";