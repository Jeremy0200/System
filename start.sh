#!/bin/bash
# Cachear la configuración de Laravel
php artisan config:cache

# Iniciar el servidor Laravel en el puerto 80
php artisan serve --host=0.0.0.0 --port=80
