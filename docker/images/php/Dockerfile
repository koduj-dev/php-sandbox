FROM php:8.3-fpm

RUN apt-get update -y && apt-get install -y \
        libfreetype6-dev \
        libpng-dev \
        libjpeg62-turbo-dev \
        libxml2-dev \
        libzip-dev \
        git \
        unzip \
        autoconf \
#    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd bcmath xml zip intl \
    &&  CFLAGS="$CFLAGS -D_GNU_SOURCE" docker-php-ext-install sockets

RUN curl -o /tmp/composer-setup.php https://getcomposer.org/installer \
    && curl -o /tmp/composer-setup.sig https://composer.github.io/installer.sig \
    # Make sure we're installing what we think we're installing!
    && php -r "if (hash('SHA384', file_get_contents('/tmp/composer-setup.php')) !== trim(file_get_contents('/tmp/composer-setup.sig'))) { unlink('/tmp/composer-setup.php'); echo 'Invalid installer' . PHP_EOL; exit(1); }" \
    && php /tmp/composer-setup.php --no-ansi --install-dir=/usr/local/bin --filename=composer --snapshot \
    && rm -f /tmp/composer-setup.*

RUN docker-php-ext-install pdo_mysql mysqli

RUN usermod -u 1000 www-data

COPY php_sandbox.ini /usr/local/etc/php/conf.d/php_sandbox.ini

RUN composer global require laravel/installer -vvv
RUN echo 'export PATH="/root/.composer/vendor/bin/:$PATH"' >> ~/.bashrc
