# [Steward](https://github.com/lmc-eu/steward) example project for [Berlin PHP Usergroup](http://www.bephpug.de/) Meetup, April 4th 2017

## Install Steward and its dependencies
```sh
$ cd selenium-tests
$ composer install
```

## Install and run Selenium server
Using Docker:

```sh
$ docker run -p 4444:4444 selenium/standalone-firefox-debug
```

Or if you don't use Docker:

```sh
$ vendor/bin/steward install
$ java -jar vendor/bin/selenium-server-standalone-3.3.1.jar &
```

## Run the tests!

Run just one simple test:
```sh
$ vendor/bin/steward run prod firefox -vv --group simple
```

Run the same test scenario implemented with [page object pattern](https://martinfowler.com/bliki/PageObject.html):
```sh
$ vendor/bin/steward run prod firefox -vv --group simple
```

Run all tests in parallel:

```sh
$ vendor/bin/steward run prod firefox -vv
```
