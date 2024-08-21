#!/bin/sh

if [ ! -f /etc/letsencrypt/live/ali-nek.lol/fullchain.pem ]; then
    certbot --nginx -d ali-nek.lol -d www.ali-nek.lol --non-interactive --agree-tos --no-eff-email alisherradjabovracer@gmail.com
fi

exec nginx -g 'daemon off;'
