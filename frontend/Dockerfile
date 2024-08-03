FROM yiisoftware/yii2-php:8.3-fpm-nginx

# Change document root for Apache
RUN sed -i -e 's|/app/web|/app/frontend/web|g' /etc/nginx/conf.d/default.conf

RUN --mount=type=cache,target=/var/cache/apt,id=fe \
    --mount=type=cache,target=/var/lib/apt,id=fe \
    apt-get update -y -qqq && \
    apt-get install -y -qqq libz-dev && \
    yes '' | pecl install apcu memcache && \
    docker-php-ext-enable apcu memcache
