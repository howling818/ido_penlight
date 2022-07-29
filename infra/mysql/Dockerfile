FROM mysql:5.7.34

COPY ./infra/mysql/my.cnf /etc/my.cnf

RUN mkdir -p /var/log/mysql && chown mysql:mysql /var/log/mysql

RUN apt-get update && apt-get -y install vim less
