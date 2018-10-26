<?php

/* @var $this yii\web\View */

$this->title = 'Weather';
?>

<body style="background-image: url('https://www.pixelstalk.net/wp-content/uploads/2016/07/Download-Free-Weather-Background-768x432.jpg'); height: 100%; background-position: center; background-repeat: no-repeat;background-size: cover;">
    <div class="site-index">
        <div class="jumbotron" style="background-color: rgba(255, 255, 255, .4);">
            <div class="row">
                <div class="col-lg-2" style="text-align: left;">
                    <?php echo $country ?>
                    <h6 class='w3-xxxlarge w3-animate-zoom'><?php echo $time ?></h6>
                </div>
                    <?php for ($i=0; $i < count($data['consolidated_weather']); $i++) { ?>
                        <div class="col-lg-2" style="text-align: left;">
                            <h4 class='w3-xxxlarge w3-animate-zoom'><b><?php echo date('l jS F ', strtotime($data['consolidated_weather'][$i]['applicable_date'])); ?></b></h4>
                            <h6 class='w3-xxxlarge w3-animate-zoom'><?php echo "<img src='https://www.metaweather.com/static/img/weather/ico/".$data['consolidated_weather'][$i]['weather_state_abbr'].".ico' style='width:42px'>" ?> <?php echo $data['consolidated_weather'][$i]['weather_state_name']; ?></h6>
                            <h6 class='w3-xxxlarge w3-animate-zoom'><?php echo round($data['consolidated_weather'][$i]['max_temp']) ?><sup>o</sup>C<br></h6>
                            <h6 class='w3-xxxlarge w3-animate-zoom'><?php echo round($data['consolidated_weather'][$i]['min_temp']) ?><sup>o</sup>C<br></h6>
                        </div>
                    <?php } ?>
                </div>
            </div>
    </div>
</body>
