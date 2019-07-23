FROM ubuntu:16.04

MAINTAINER Angad Dubey

RUN apt-get update -y && \
    apt-get install -y software-properties-common python-software-properties language-pack-en-base && \
    LC_ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php && \
    apt-get update -y

# Install everything the app requires
RUN apt-get clean && apt-get -y install \
    apache2 \
    nodejs \
    php \
    php-mcrypt \
    php-curl \
    php-mbstring \
    php-xml \
    php-zip \
    libapache2-mod-php \
    php-mysql \
    git \
    supervisor \
    && apt-get -y autoremove \
    && apt-get clean \
    && php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
    && ln -sf /dev/stdout /var/log/apache2/access.log \
    && ln -sf /dev/stderr /var/log/apache2/error.log

# Add dir conf file to apache
ADD docker-conf/apache2/dir.conf /etc/apache2/mods-enabled/

ADD docker-conf/apache2/000-default.conf /etc/apache2/sites-enabled/

# Enable a2enmod
RUN a2enmod rewrite

# Restart apache
RUN service apache2 restart

# Configure supervisord
ADD docker-conf/supervisor/supervisord.conf /etc/supervisor/

# Add supervisor
ADD docker-conf/supervisor/supervisor_conf/* /etc/supervisor/conf.d/

# Expose ports
EXPOSE 80
EXPOSE 443

WORKDIR /var/www

CMD ["/usr/bin/supervisord"]
