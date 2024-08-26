#!/bin/sh

# Log the environment variable
echo "CERTBOT_EMAIL is set to: $CERTBOT_EMAIL"

# Check if the certificate already exists
if [ ! -f /etc/letsencrypt/live/ali-nek.lol/fullchain.pem ]; then
    # Run Certbot with the email option correctly specified
    certbot --nginx -d ali-nek.lol -d www.ali-nek.lol --non-interactive --agree-tos --email $CERTBOT_EMAIL
fi

# Start Nginx
exec nginx -g 'daemon off;'


