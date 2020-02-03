FROM php:7.4-apache

RUN mkdir -p /usr/share/man/man1
RUN apt-get update && apt-get install -y \
    git \
    pkg-config \
    build-essential \
    libicu-dev \
    libonig-dev \
    libmcrypt-dev \
    libpng-dev \
    libfreetype6 \
    libxml2-dev \
    nano \
    default-mysql-client \
    libldap2-dev \
    wget

RUN apt-get clean

# Extension PHP
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install intl
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install bcmath



RUN a2enmod rewrite
RUN a2enmod headers
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

#COPY ./default-vhost.conf /etc/apache2/sites-available/
#VHOST
#RUN a2ensite default-vhost.conf

# Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

# ALIASES
RUN echo "alias ll='ls -l'" >> /root/.bashrc
RUN echo "alias la='ls -l'" >> /root/.bashrc


ENV TERM linux
WORKDIR /var/www/html

COPY ./docker-entrypoint.sh /
ENTRYPOINT ["sh", "/docker-entrypoint.sh"]
#CMD /docker-entrypoint.sh
