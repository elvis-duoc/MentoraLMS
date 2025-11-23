# MentoraLMS - Sistema de Gestión de Aprendizaje

Plataforma educativa para cursos online con gestión de estudiantes y administradores.

## 🚀 Características

-   👨‍🎓 **Estudiantes**: Inscripción a cursos, progreso de lecciones, certificados
-   👨‍🏫 **Instructores**: Creación de cursos, módulos y lecciones
-   👨‍💼 **Administradores**: Gestión completa del sistema

## 📋 Requisitos

-   PHP 8.1+
-   MySQL 5.7+
-   Composer
-   Node.js & NPM

## ⚙️ Instalación

1. Clonar repositorio
2. Instalar dependencias: `composer install`
3. Copiar `.env.example` a `.env`
4. Configurar base de datos en `.env`
5. Importar `mentora_bd_v1.sql`
6. Generar key: `php artisan key:generate`
7. Iniciar servidor: `php artisan serve`

## 🔑 Accesos por Defecto

-   **Admin**: admin@mentoralms.cl / admin.2025
-   **Estudiante**: estudiante@mentoralms.cl / estudiante.2025
-   **URL**: http://localhost:8000

## 📦 Tecnologías

-   Laravel 10
-   MySQL
-   Bootstrap 5
-   jQuery
