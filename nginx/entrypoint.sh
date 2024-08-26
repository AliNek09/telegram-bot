#!/bin/sh

if [ ! -f /etc/letsencrypt/live/ali-nek.lol/fullchain.pem ]; then
    certbot --nginx -d ali-nek.lol -d www.ali-nek.lol --non-interactive --agree-tos --email $CERTBOT_EMAIL
fi

exec nginx -g 'daemon off;'

