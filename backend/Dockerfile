FROM yiisoftware/yii2-php:8.3-fpm-nginx

# Change document root for Apache
RUN sed -i -e 's|/app/web|/app/backend/web|g' /etc/nginx/conf.d/default.conf
