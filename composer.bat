@ECHO OFF
REM Save this file in the same directory as you phar-file.
REM For composer.phar, save this file as composer.bat
REM For phpunit.phar, save this file as phpunit.bat
REM
REM Read how the filename is created:
REM https://www.microsoft.com/resources/documentation/windows/xp/all/proddocs/en-us/percent.mspx?mfr=true
REM
REM php "%~dp0composer.phar" %*
php "%~dp0%~n0.phar" %*

