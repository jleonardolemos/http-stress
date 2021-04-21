FROM php:8-alpine3.12

RUN mkdir -p /var/www

COPY ./code /var/www

EXPOSE 8000

WORKDIR /var/www

CMD [ "php", "-S", "0.0.0.0:8000" ]