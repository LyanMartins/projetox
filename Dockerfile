FROM php:8.1-fpm

# Pasta raíz da aplicação
ARG app_dir="/api"

# RUN apt-get update \
#     && apt-get install -y \
#         sudo \
#         curl \
#         wget \
#         git \
#         vim \
#         nano \
#         less \
#         openssl \
#         iproute2 \
#         iputils-ping \
#         libzip-dev \
#         libpq-dev \
#         libgmp-dev \
#         libicu-dev \
#         libxext-dev \
#         postgresql-client \
#     && docker-php-ext-configure intl \
#     && docker-php-ext-install \
#         bcmath \
#         gmp \
#         intl \
#         opcache \
#         pcntl \
#         pdo \
#         pdo_pgsql \
#         pgsql \
#         zip \
#     && docker-php-ext-enable \
#         bcmath \
#         intl \
#         opcache \
#         pcntl \
#         pdo \
#     && pecl install -o -f redis \
#     && docker-php-ext-enable redis \
#     && pecl install xdebug \
#     && docker-php-ext-enable xdebug \
#     && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
#     && rm -rf /var/lib/apt/lists/* /tmp/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

EXPOSE 9000 9003

WORKDIR ${app_dir}

COPY ./ ./

RUN composer dumpautoload

# CMD ./docker-cmd.sh
