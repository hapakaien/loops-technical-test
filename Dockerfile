# Build stage using node:lts-alpine
FROM node:lts-alpine as build

# Set working directory
WORKDIR /app

# Install dependencies with yarn
COPY package*.json ./
COPY yarn* ./
RUN yarn install --frozen-lockfile

# Build app
COPY . .
RUN yarn prod

FROM webdevops/php-nginx:7.4-alpine

# Set ARG
ARG APP_NAME=Loopstest
ARG APP_ENV=local
ARG APP_KEY=base64:4SJPNIIR68jCgjeQ9e57qJaHJikSE175HLxtTWY5MUg=
ARG APP_DEBUG=true
ARG APP_URL=http://localhost
ARG SESSION_DRIVER=redis
ARG SESSION_DOMAIN=.localhost
ARG REDIS_HOST=redis
ARG REDIS_PASSWORD=null
ARG REDIS_PORT=6379
ARG SANCTUM_STATEFUL_DOMAINS=localhost
ARG DB_CONNECTION=pgsql
ARG DB_HOST=db
ARG DB_PORT=5432
ARG DB_DATABASE=postgres
ARG DB_USERNAME=postgres
ARG DB_PASSWORD=secret
ARG AWS_ACCESS_KEY_ID=minio
ARG AWS_SECRET_ACCESS_KEY=secretkey
ARG AWS_DEFAULT_REGION=earth
ARG AWS_BUCKET=dev
ARG AWS_URL=http://minio:9001

# Set ENV
ENV WEB_DOCUMENT_ROOT=/app/public \
    PHP_DATE_TIMEZONE=Asia/Jakarta \
    APP_NAME=$APP_NAME \
    APP_ENV=$APP_ENV \
    APP_KEY=$APP_KEY \
    APP_DEBUG=$APP_DEBUG \
    APP_URL=$APP_URL \
    SESSION_DRIVER=$SESSION_DRIVER \
    SESSION_DOMAIN=$SESSION_DOMAIN \
    REDIS_HOST=$REDIS_HOST \
    REDIS_PASSWORD=$REDIS_PASSWORD \
    REDIS_PORT=$REDIS_PORT \
    SANCTUM_STATEFUL_DOMAINS=$SANCTUM_STATEFUL_DOMAINS \
    DB_CONNECTION=$DB_CONNECTION \
    DB_HOST=$DB_HOST \
    DB_PORT=$DB_PORT \
    DB_DATABASE=$DB_DATABASE \
    DB_USERNAME=$DB_USERNAME \
    DB_PASSWORD=$DB_PASSWORD \
    FILESYSTEM_DRIVER=minio \
    AWS_ACCESS_KEY_ID=$AWS_ACCESS_KEY_ID \
    AWS_SECRET_ACCESS_KEY=$AWS_SECRET_ACCESS_KEY \
    AWS_DEFAULT_REGION=$AWS_DEFAULT_REGION \
    AWS_BUCKET=$AWS_BUCKET \
    AWS_URL=$AWS_URL

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer global require hirak/prestissimo

# Set initial config
# RUN php artisan app:install

# Nginx config
COPY .docker/nginx/conf.d/default.conf /opt/docker/etc/nginx/conf.d/default.conf

# Set working directory
WORKDIR /app

# Copy app
COPY --chown=1000:1000 . .

# Copy /public folder from build stage
COPY --chown=1000:1000 --from=build /app/public ./public

# Install dependencies
RUN composer install --optimize-autoloader --no-dev

# Optimization
# RUN php artisan optimize
