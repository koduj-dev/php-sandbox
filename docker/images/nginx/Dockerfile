FROM nginx:latest

COPY php_sandbox.conf /etc/nginx/conf.d/php_sandbox.conf
COPY nginx.conf /etc/nginx/default.conf
RUN rm /etc/nginx/conf.d/default.conf
