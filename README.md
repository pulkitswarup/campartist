# CAMPARTIST

#### About
This project is a wrapper over Lastfm API(s) to display Top Artist by Country & Top Tracks by Artists

#### Requirement

* **php** >= 7.0 (Along with web server i.e. nginx, apache, etc.)
* **docker** >= 1.11.0
* **docker-compose** >= 1.8.0
* **git** > 2.0.0 (Used to clone the code on the machine)

#### Installation
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