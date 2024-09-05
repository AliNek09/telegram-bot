FROM alineck09/telegram-bot:php-latest AS php

FROM nginx:alpine

COPY nginx.conf /etc/nginx/nginx.conf
COPY default.conf /etc/nginx/conf.d/default.conf

# the first var/www/html takes from php  dockerfile
COPY --from=php /var/www/html /var/www/html


USER nginx

EXPOSE 80

