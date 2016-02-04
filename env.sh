# set up the environment to do the testing

PATH='./:/c/xampp/php/:/I/xampp/php/:'$PATH

phpunit=php.exe

# look for phpunit.phar

echo `pwd`/../lib/phpunit.phar
phpunitPhar=`pwd`/../lib/phpunit.phar
phpunitPhar=/z/xampp/htdocs/sadokey3/phpunit.phar