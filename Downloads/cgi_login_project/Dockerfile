FROM python:3.11-slim

RUN apt-get update && apt-get install -y apache2 libapache2-mod-wsgi-py3 \ 
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY html/ /var/www/html/
RUN chmod +x /var/www/html/login.html

RUN echo 'Options +ExecCGI' >> /etc/apache2/apache2.conf && \ 
    echo 'AddHandler cgi-script .html' >> /etc/apache2/apache2.conf

EXPOSE 80
CMD ["apache2ctl", "-D", "FOREGROUND"]
