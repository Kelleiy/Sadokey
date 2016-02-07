# BASH shell for testing
# uitvoeren . ./tst.sh
# depends on phpunit.xml, php.exe en phpunit.phar

. ./env.sh
clear;  # clear screen
$phpunit $phpunitPhar $*
