<!DOCTYPE html>
<html>
<head>
    <!-- Eyevinn HTML Player CSS -->
    <link rel="stylesheet" href="https://player.eyevinn.technology/v0.4.2/build/eyevinn-html-player.css"></link>
  </head>
  <body>
    <!-- The element where the player will be placed -->
    <div id="player-wrapper"></div>

    <!-- Eyevinn HTML Player Javascript -->
    <script src="https://player.eyevinn.technology/v0.4.2/build/eyevinn-html-player.js" type="text/javascript"></script>

    <!-- Initiate the player and auto-play with audio muted -->
    <script>
      document.addEventListener('DOMContentLoaded', function(event) {
        setupEyevinnPlayer('player-wrapper', 'http://112.196.183.23:8156/live/play.m3u8').then(function(player) {
          var muteOnStart = true;
          player.play(muteOnStart);
        });
      });
    </script>
</body>
</html>
<style>
body{margin:0px;padding:0px;}
</style>		