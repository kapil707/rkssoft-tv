@ECHO OFF
ECHO Starting Youtube video
taskkill /f /IM RKS-Player.exe
start "" "C:\Program Files\Mozilla Firefox\firefox.exe" --kiosk "https://www.youtube.com/embed/live_stream?channel=UC7m5ZKDamP4WAdW4hfneyWA&autoplay=true"
