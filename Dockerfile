# Usa la imagen oficial de PHP con soporte para Laravel
FROM php:8.1-cli

# Instala dependencias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    curl && \
    docker-php-ext-install pdo pdo_mysql zip

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia los archivos de tu proyecto al contenedor
WORKDIR /app
COPY . .

# Instala las dependencias de PHP
RUN composer install --no-dev --optimize-autoloader

# Asegúrate de que `start.sh` sea ejecutable
RUN chmod +x start.sh

# Expone el puerto 10000 para el servidor PHP
EXPOSE 10000

# Define el comando de inicio
CMD ["./start.sh"]
