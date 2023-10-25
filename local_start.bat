@ECHO OFF
ECHO Starting OBS
start /d "C:\Program Files\obs-studio\bin\64bit" obs64.exe --startstreaming parameter

popd
EXIT /b