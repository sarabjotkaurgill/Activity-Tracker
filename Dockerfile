FROM php:7.4-apache

# Install common PHP extensions and their dependencies
RUN apt-get update && apt-get install --assume-yes --silent \
        libfreetype6-dev \
        libicu-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        libxml2-dev \
        unzip \
        wget

RUN docker-php-ext-install -j$(nproc) \
        iconv \
        intl \
        mysqli \
        opcache \
        pdo \
        pdo_mysql \
        soap \
        xml

# TODO:
# RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
#     && docker-php-ext-install -j$(nproc) gd

# RUN pecl install mcrypt-1.0.3 \
#     && docker-php-ext-enable mcrypt
# mbstring \

# # Install Composer and Symphony
# RUN a2enmod rewrite && mkdir /composer-setup && wget https://getcomposer.org/installer -P /composer-setup && php /composer-setup/installer --install-dir=/usr/bin && rm -Rf /composer-setup && curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony && chmod a+x /usr/local/bin/symfony
# # Create symlink for default conf
# RUN ln -s /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-enabled/000-default.conf && mkdir /composer-setup && wget https://getcomposer.org/installer -P /composer-setup && php /composer-setup/installer --install-dir=/usr/bin && rm -Rf /composer-setup && curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony && chmod a+x /usr/local/bin/symfony

