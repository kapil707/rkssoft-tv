<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"><html>    <head>        <title>Apple (Cupertino) Streaming - M3U8 Playlist</title>        <script type="text/javascript" src="../../bin-debug/jwplayer.js">        </script>        <script type="text/javascript" src="settings.js">        </script>        <script src="https://www.google.com/jsapi?key=ABQIAAAAmW4wY4GLARKwRKxx1EY4dxTCwYuWkdD_iTnqF3uxU7_DebvfxBREab8CD-MRcuvG-IzP2uSZrQpweg" type="text/javascript">        </script>        <script language="Javascript" type="text/javascript">            google.load("dojo", "1");        </script>    </head>    <body>        <script type="text/javascript">            document.write("<h1>" + document.title + "</h1>");        </script>		<div id="player"></div>		<input id="m3u8path" type="text" value="http://162.212.176.247/live/rkstv/index.m3u8"/>		<a href="#" onclick="setup();return false;">Update</a>        <script type="text/javascript">            function setup(firsttime) {				if (!firsttime) {					jwplayer("player").remove();					}            	jwplayer("player").setup({            		players: settings.players(window.location.href, ["html5", "download"]),					image: "http://content.bitsontherun.com/thumbs/gSzpo2wh-480.jpg",					file: document.getElementById("m3u8path").value            	});            }			setup(true);        </script>        <h3>HTML code</h3>    </body></html>