FROM alineck09/telegram-bot:php-latest AS php

FROM nginx:alpine

COPY nginx.conf /etc/nginx/nginx.conf
COPY default.conf /etc/nginx/conf.d/default.conf

COPY --from=php /app /var/www/html

#OPTIMIZING for correct permissions for LARAVEL DIRECTORIES
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache \
    && chown -R nginx:nginx /var/www/html

# Create necessary directories and set permissions
RUN mkdir -p /run/nginx /var/run/nginx \
     && chown -R nginx:nginx /run/nginx /var/run/nginx /var/www/html

#Give permissions for NGINX
RUN chown -R nginx:nginx /var/cache/nginx

USER nginx

EXPOSE 80

