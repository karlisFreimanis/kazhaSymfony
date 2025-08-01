ARG TIMEZONE
ARG PHP_IMAGE

FROM ${PHP_IMAGE}

# Install dependencies
RUN apk update && apk add --no-cache \
    gnupg \
    g++ \
    procps \
    openssl \
    git \
    unzip \
    zlib-dev \
    libzip-dev \
    freetype-dev \
    libpng \
    libpng-dev \
    libjpeg-turbo-dev \
    icu-dev \
    oniguruma-dev \
    libxslt-dev \
    acl \
    curl \
#    postgresql-dev \
    mysql-dev

# Install Xdebug
RUN apk add --no-cache linux-headers $PHPIZE_DEPS \
    && pecl install xdebug-3.4.5 \
    && docker-php-ext-enable xdebug

RUN apk add --no-cache pcre-dev $PHPIZE_DEPS && \
    pecl update-channels && \
    pecl install redis && \
    docker-php-ext-enable redis && \
    apk del $PHPIZE_DEPS

# Configure and install PHP extensions
RUN docker-php-ext-configure gd --with-jpeg --with-freetype \
    && docker-php-ext-install pdo pdo_mysql zip xsl gd intl opcache exif mbstring bcmath # pdo_pgsql

# Set timezone
RUN ln -snf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime && echo ${TIMEZONE} > /etc/timezone \
    && printf '[PHP]\ndate.timezone = "%s"\n', '${TIMEZONE}' > /usr/local/etc/php/conf.d/tzone.ini \
    && date

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN echo "xdebug.mode=debug" > /usr/local/etc/php/conf.d/docker-xdebug.ini
RUN echo "xdebug.discover_client_host=true" >> /usr/local/etc/php/conf.d/docker-xdebug.ini
RUN echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-xdebug.ini
RUN echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/docker-xdebug.ini


RUN printf '#!/bin/sh\nphp /var/www/symfony/bin/console "$@"\n' > /usr/local/bin/symfony-console \
    && chmod +x /usr/local/bin/symfony-console

# Set working directory
WORKDIR /var/www/symfony
