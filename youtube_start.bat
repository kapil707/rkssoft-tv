@ECHO OFF
ECHO Starting NGINX
start /d "G:\live_online_link\nginx_youtube" nginx.exe
start /d "C:\Program Files\obs-studio\bin\64bit" obs64.exe --startstreaming parameter

popd
EXIT /b