FROM debian:stable
ADD src /var/www/html
RUN apt-get update && apt-get install -y apache2 php php-cli php-mysql vim
RUN echo "ServerName $(hostname)" >> /etc/apache2/apache2.conf
EXPOSE 80 443
ENTRYPOINT ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
