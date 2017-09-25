Codeception Api Skeleton
========================

Skeleton to create codeception tests using for external projects using suites

- functional
- api
- acceptance

Requirements
------------

- Php >=7.0
- Composer >=1.3
- Java JDK able to run selenium web drivers
  [Official Documentation](http://www.seleniumhq.org/docs/03_webdriver.jsp#php)

Installation
------------

The preferred way to install is through [composer].

`composer create-project --prefer-dist tecnocen/codeception-api-skeleton codeception-tests`

The command installs the advanced application in a directory named
`codeception-tests`. You can choose a different directory name if you want.

If you cloned the project using a CVS like git then run

`composer install --prefer-dist`

on the root project before continuing preparations.

Preparing application
---------------------

### `composer deploy`

This library provides a console command to help initialize the application.

`composer deploy -- os=win32 gecko=0.18.0 chrome=2.32`

It accepts parameters

- os: the Operative system version which will run the selenium web driver.
  By default it will be auto determined by php.
- gecko: the version of [Gecko Driver] to be used.
- chrome: the version of [Chrome Driver] to be used.

This will install the php dependencies using composer and download [selenium]
standalone and the supported webdrivers in the files `selenium-ss.jar`,
`geckodriver` and `chromedriver`

### Edit your configuration files

Configure [codeception] to use your project url.

   - `tests/functional.suite.yml` configuration `PhpBrowser.url`
   - `tests/api.suite.yml` configuration `Rest.url`
   - `tests/acceptance.suite.yml` configuration `WebDriver.url`

### Initialize web drivers

This library also provides commands to easily initialize the selenium web
drivers

- `composer init-chromedriver` to run the tests on chrome or chromium browser.
- `composer init-geckodriver` to run the tests on firefox.

Run Tests
---------

You can run tests by using the following composer scripts.

- `composer run-functional-tests` run functional tests. (selenium not required)
- `composer run-api-tests` run REST api tests. (selenium not required)
- `composer run-acceptance-tests` run acceptance tests. (selenium required)
- `composer run-tests` **all supported tests**

Write tests
-----------

This skeleton uses [codeception] so direct to that guide on how to write tests
for each suite.

Unit tests and Code Coverage
----------------------------

Since this is an standalone library meant to work without access to the api
source code its not possible to create unit tests or review test coverage.

[codeception]: http://codeception.com/
[composer]: https://getcomposer.org/download/
[selenium]: http://www.seleniumhq.org/download/
[Chrome Driver]: https://sites.google.com/a/chromium.org/chromedriver/
[Gecko Driver]: https://github.com/mozilla/geckodriver/
