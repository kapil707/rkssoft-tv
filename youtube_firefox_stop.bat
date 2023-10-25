@ECHO OFF
ECHO Youtube Firefox Stop
taskkill /f /IM firefox.exe
taskkill /f /IM xampp-control.exe

c:\xampp\apache\bin\pv -f -k mysqld.exe -q

if not exist c:\xampp\mysql\data\%computername%.pid GOTO exit
echo Delete %computername%.pid ...
del c:\xampp\mysql\data\%computername%.pid
