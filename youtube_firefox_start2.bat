@ECHO OFF
ECHO Starting Youtube video
taskkill /f /IM RKS-Player.exe
start "" "C:\Program Files\Mozilla Firefox\firefox.exe" --kiosk "https://www.youtube.com/embed/live_stream?channel=UC9907Ioi2cJ21YLCN2K_ATQ&autoplay=true"
