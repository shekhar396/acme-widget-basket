#!/bin/sh

if [ "$1" = "test" ]; then
  # Run PHPUnit tests
  vendor/bin/phpunit
else
  # Start the PHP built-in server
  php -S 0.0.0.0:8000 -t public
fi
