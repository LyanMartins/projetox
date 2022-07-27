FROM nginx:latest

# Pasta raíz da aplicação
ARG app_dir="/api"

RUN apt-get update \
    && apt-get install -y \
        vim \
        nano \
        less \
    && rm -rf /var/lib/apt/lists/* /tmp/*

WORKDIR ${app_dir}

EXPOSE 80

COPY ./docker/nginx/config.conf /etc/nginx/nginx.conf
COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf
