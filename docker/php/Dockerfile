FROM php:8.3-fpm

COPY wait-for-it.sh /usr/bin/wait-for-it
RUN chmod +x /usr/bin/wait-for-it

COPY .bashrc /root/.bashrc

RUN apt update && \
    apt install -y --no-install-recommends libssl-dev \
    zlib1g-dev \
    curl \
    g++ \
    git \
    unzip \
    netcat-traditional \
    libxml2-dev \
    libicu-dev \
    libzip-dev \
    libpq-dev \
    zip \
    iputils-ping \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install -j$(nproc) intl opcache pdo pdo_pgsql \
    && docker-php-ext-install -j$(nproc) pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu pdo_pgsql sodium pdo_mysql \
    && docker-php-ext-configure zip && docker-php-ext-install zip \
    && docker-php-ext-install bcmath

RUN pecl install xdebug && docker-php-ext-enable xdebug

SHELL ["/bin/bash", "-c"]

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

CMD composer i -o ; wait-for-it postgres:5432 -- bin/console doctrine:migrations:migrate; bin/console doctrine:fixtures:load -n ; php-fpm

EXPOSE 9000
