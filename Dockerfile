FROM wordpress

COPY ./wordpress /var/www/html
RUN ls /var/www/html/wp-content/plugins