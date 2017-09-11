Codeception Api Skeleton
========================

Skeleton to create codeception tests using for external projects using suites

- functional
- api
- acceptance

Installation
------------

The preferred way to install is through [composer]

`composer create-project --prefer-dist tecnocen/codeception-api-skeleton codeception-tests`

The command installs the advanced application in a directory named
`codeception-tests`. You can choose a different directory name if you want.

Preparing application
---------------------

After you install the application, you have to conduct the following steps to
initialize the installed application. You only need to do these once for all.

1. Open a console terminal, execute the composer script `deploy`
  `composer deploy`

2. By default it downloads `2.44` as the file `selenium-ss.jar` in the root
   directory for the project, you can update the version of selenium as you
   prefer by visiting the [selenium] website.

3. Install java jdk and xvfb
   - [Guide for ubuntu 14.04]
   - [Guide for ubuntu 16.04]

4. Edit the files
   - `codeception.yml`
   - `tests/functional.suite.yml`
   - `tests/api.suite.yml`
   - `tests/acceptance.suite.yml`
   To point at your server api url.

Run Tests
---------

You can run tests by using the following composer scripts.

- `composer init-selenium` initializes selenium standalone server.
- `composer run-functional-tests` run functional tests. (selenium not required)
- `composer run-api-tests` run REST api tests. (selenium not required)
- `composer run-acceptance-tests` run acceptance tests. (selenium required)
- `composer run-tests` **all of the above**

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
[Guide for ubuntu 14.04]: https://gist.github.com/curtismcmullan/7be1a8c1c841a9d8db2c
[Guide for ubuntu 16.04]: https://gist.github.com/ziadoz/3e8ab7e944d02fe872c3454d17af31a5
