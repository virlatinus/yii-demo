FROM yiisoftware/yii2-php:8.3-fpm-nginx

# Change document root for Apache
RUN sed -i -e 's|/app/web|/app/backend/web|g' /etc/nginx/conf.d/default.conf

RUN --mount=type=cache,target=/var/cache/apt,id=be \
    --mount=type=cache,target=/var/lib/apt,id=be \
    apt-get update -y -qqq && \
    apt-get install -y -qqq libz-dev && \
    yes '' | pecl install apcu memcache redis && \
    docker-php-ext-enable apcu memcache redis && \
    echo "apc.enable_cli = 1" >> /usr/local/etc/php/conf.d/docker-php-ext-apcu.ini
