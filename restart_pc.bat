@ECHO OFF
taskkill /f /IM nginx.exe
taskkill /f /IM php-cgi.exe
taskkill /F /IM obs64.exe
shutdown.exe /r /t 00
EXIT