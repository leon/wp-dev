FROM php:7-fpm

# Install X-Debug
ENV XDEBUG_VERSION 2.4.0rc4
ENV XDEBUG_MD5 0ff361aa7bc8098ff7dd4c2ea13e7773
RUN set -x \
	&& curl -SL "http://www.xdebug.org/files/xdebug-$XDEBUG_VERSION.tgz" -o xdebug.tgz \
	&& echo $XDEBUG_MD5 xdebug.tgz | md5sum -c - \
	&& mkdir -p /usr/src/xdebug \
	&& tar -xf xdebug.tgz -C /usr/src/xdebug --strip-components=1 \
	&& rm xdebug.* \
	&& cd /usr/src/xdebug \
	&& phpize \
	&& ./configure --enable-xdebug \
	&& make -j"$(nproc)" \
	&& make install \
	&& make clean
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Install php plugins required by wordpress
RUN apt-get update \
	&& apt-get install -y libpng12-dev libjpeg-dev \
	&& rm -rf /var/lib/apt/lists/* \
	&& docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr \
	&& docker-php-ext-install gd mysqli

# Custom php.ini
COPY ./php.ini /usr/local/etc/php/php.ini

# Expose X-Debug port
EXPOSE 9999
