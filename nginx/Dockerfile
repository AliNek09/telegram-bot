FROM alineck09/telegram-bot:php-latest AS php

FROM nginxinc/nginx-unprivileged

COPY nginx.conf /etc/nginx/nginx.conf
COPY default.conf /etc/nginx/conf.d/default.conf

COPY --from=php /var/www/html /var/www/html

EXPOSE 80

