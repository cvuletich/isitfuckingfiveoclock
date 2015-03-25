<?php
$isitfiveoclock = "no";
$timezones = DateTimeZone::listIdentifiers();
$cities = array();
foreach ($timezones as $zone) {
  $time = new DateTime("now", new DateTimeZone($zone));
  $hour = $time->format("H");
  list($region, $city) = split("/", $zone);
  $city = str_replace("_", " ", $city);
  if ($hour == "17") {
    $isitfiveoclock = "yes";
    if ($city != "") {
      array_push($cities, $city);
    }
  }
}
$replies['yes'] = array(
  "BEER.",
  "Let's go get fucked up.",
  "Good, cuz I needed a beer.",
  "Alcohol: The cause of and solution to all of life's problems.",
  "I feel sorry for people who don't drink. When they wake up in the morning, that's as good as they're going to feel all day.",
  "Reality is an illusion that occurs due to the lack of alcohol.",
  "I drink to make other people interesting.",
  "In wine there is wisdom. In beer there is freedom.  In water there is bacteria.",
  "I'm too sober for this shit.",
  "I'm drinking because fuck you, that's why.",
);
$replies['no'] = array("Sucks.");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Is It Fucking Five O'Clock?</title>
    <meta name="author" content="Chris Vuletich" />
    <style>
      html, body {
        background-color: #000;
        font-family: Courier;
      }
      .container {
        border: 2px solid #fff;
        color: #fff;
        height: 160px;
        margin: 250px auto 0;
        position: relative;
        text-align: center;
        width: 1000px;
      }
      .small {
        font-size: 10px;
      }
      .answer {
        font-size: 34px;
        margin: 55px 0 0 0;
        padding: 0;
      }
      .left {
        float: left;
      }
      .right {
        bottom: 10px;
        position: absolute;
        right: 20px;
      }
      .powered {
        color: #fff;
        font-size: 8px;
        position: fixed;
        bottom: 5px;
        right: 10px;
      }
      .powered a {
        color: #fff;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="answer">
        <?php
        if ($isitfiveoclock === "yes") {
          echo "Yeah, it's fucking 5 o'clock in " . $cities[array_rand($cities)] . ".";
        } else {
          echo "No, it's not 5 o'clock anywhere.  Just wait the fuck up.";
        }
        ?>
      </div>
      <div class="small"><?php echo $replies[$isitfiveoclock][rand(0, count($replies[$isitfiveoclock]) - 1)]; ?></div>
    </div>
    <div class="powered"><a href="http://chrisvuletich.com" target="_blank">http://chrisvuletich.com</a></div>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-11868870-13', 'isitfuckingfiveoclock.com');
      ga('send', 'pageview');

    </script>
  </body>
</html>
