FROM php:7.0-fpm

MAINTAINER Pulkit Swarup <pulkit.swarup@gmail.com>

# Install required packages
RUN apt-get update -q \
    && DEBIAN_FRONTEND=noninteractive apt-get install -yq --no-install-recommends \
      ca-certificates \
      openssh-server \
      wget \
      apt-transport-https \
      vim \
      nano \
      build-essential \
      zlib1g-dev \
      libyaml-dev \
      libssl-dev \
      libgdbm-dev \
      libreadline-dev \
      libncurses5-dev \
      libffi-dev \
      curl \
      openssh-server \
      redis-server \
      checkinstall \
      libxml2-dev \
      libxslt-dev \
      libcurl4-openssl-dev \
      libicu-dev \
      logrotate \
      python-docutils \
      pkg-config \
      cmake \
      nodejs \
      libcurl4-openssl-dev \
      libexpat1-dev \
      gettext \
      libz-dev \
      libssl-dev \
      build-essential

RUN mkdir -p /usr/local/bin
RUN curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony
RUN chmod a+x /usr/local/bin/symfony

