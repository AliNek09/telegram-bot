FROM alineck09/telegram-bot:php-latest AS php

FROM nginx:alpine

# Install Certbot and its Nginx plugin
RUN apk add --no-cache certbot certbot-nginx

COPY nginx/nginx.conf /etc/nginx/nginx.conf
COPY nginx/default.conf /etc/nginx/conf.d/default.conf

COPY --from=php /app /var/www/html

COPY nginx/entrypoint.sh /entrypoint.sh

# Make the entrypoint script executable
RUN chmod +x /entrypoint.sh

# Set the entrypoint to the script
ENTRYPOINT ["/entrypoint.sh"]

EXPOSE 80
EXPOSE 443
