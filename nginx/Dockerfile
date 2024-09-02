FROM alineck09/telegram-bot:php-latest AS php

FROM nginx:alpine

COPY nginx.conf /etc/nginx/nginx.conf
COPY default.conf /etc/nginx/conf.d/default.conf

RUN chown -R nginx:nginx /var/www/html

#OPTIMIZING for correct permissions for LARAVEL DIRECTORIES
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

#REMOVE ANY DEFAULT CONF
RUN rm /etc/nginx/conf.d/default.conf

COPY --from=php /app /var/www/html

USER nginx

EXPOSE 80

