FROM alineck09/telegram-bot:php-latest AS php

FROM nginx:alpine

COPY nginx.conf /etc/nginx/nginx.conf
COPY default.conf /etc/nginx/conf.d/default.conf

COPY --from=php /app /var/www/html

EXPOSE 80

