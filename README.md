# CAMPARTIST

#### About
This project is a wrapper over Lastfm API(s) to display Top Artist by Country & Top Tracks by Artists

#### Requirement

* **php** >= 7.0 (Along with web server i.e. nginx, apache, etc.)
* **docker** >= 1.11.0
* **docker-compose** >= 1.8.0
* **git** > 2.0.0 (Used to clone the code on the machine)

#### Issues
Docker is a relatively new project and is active being developed and tested by a thriving community of developers and testers and every release of docker features many enhancements and bugfixes.

Given the nature of the development and release cycle it is very important that you have the latest version of docker installed because any issue that you encounter might have already been fixed with a newer docker release.

Install the most recent version of the Docker Engine for your platform using the official Docker releases, which can also be installed using:
```
wget -qO- https://get.docker.com/ | sh
```
Fedora and RHEL/CentOS users should try disabling selinux with setenforce 0 and check if resolves the issue. If it does than there is not much that I can help you with. You can either stick with selinux disabled (not recommended by redhat) or switch to using ubuntu.

You may also set DEBUG=true to enable debugging of the entrypoint script, which could help you pin point any configuration issues.

If using the latest docker version and/or disabling selinux does not fix the issue then please file a issue request on the issues page.

In your issue report please make sure you provide the following information:

The host distribution and release version.
Output of the docker version command
Output of the docker info command
The docker run command you used to run the image (mask out the sensitive bits).

Please refer the undermentioned link(s) for installation:

1. <https://docs.docker.com/engine/installation/>
2. <https://docs.docker.com/compose/install/>

#### Installation

```
docker-compose up -d
```

In order, to speed up the process you can also download docker images:
```
docker pull php:7.0-fpm

docker pull nginx:1.10.1
```

#### Tests
Tests has been grouped into three categories
- functional
- integration
- unit

In order, to execute PHPUnit Test Cases in the project under specific categories, following are the commands:

*functional*
```
vendor/phpunit/phpunit/phpunit -c app/ src/Campartist/CatalogBundle/ --group functional
```

*integration*
```
vendor/phpunit/phpunit/phpunit -c app/ src/Campartist/CatalogBundle/ --group unit
```

*unit*
```
vendor/phpunit/phpunit/phpunit -c app/ src/Campartist/CatalogBundle/ --group unit
```

Use the following command to execute all test(s):
```
vendor/phpunit/phpunit/phpunit -c app/ src/Campartist/CatalogBundle/
```
#### Web Access
The project can be accessed at: 
<http://localhost:8000/geo>

#### Shell Access
For debugging and maintenance purposes you may want access the containers shell. If you are using docker version 1.3.0 or higher you can access a running containers shell using docker exec command.
```
docker exec -it campartist_app_1 bash
```

In order, to view logs
```
docker-compose logs
```
#### ToDo
1. Although, the project lays down the foundation of the code, it is yet not complete
2. Exception case handling in Test Case (Removed because of incompatibility with PHP 7.0)
3. Obviously, since there are a lot of API calls being made to a third-party application, need to introduce a caching layer to minimize the number of call and faster response times.
3. Bug Fixes

#### Contact Us
Get in touch with your suggestions, thoughts and queries at pulkit.swarup[at]gmail.com

#### License
Please see [LICENSE.md](LICENSE.md) for details.
