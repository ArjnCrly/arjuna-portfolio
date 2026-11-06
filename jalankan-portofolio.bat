@echo off
title Laravel Portfolio & CMS - Arjuna Carly Dhymas Mahendra
echo ========================================================================
echo   MENJALANKAN SERVER LARAVEL PORTOFOLIO ARJUNA CARLY DHYMAS MAHENDRA
echo ========================================================================
echo.
echo   Website Portofolio Utama : http://127.0.0.1:8000
echo   Katalog Semua Projek     : http://127.0.0.1:8000/projects
echo   Dashboard Admin CMS      : http://127.0.0.1:8000/admin
echo   Login Admin Default      : arjuna / admin123
echo.
start http://127.0.0.1:8000
"C:\xampp\php\php.exe" "%~dp0artisan" serve --host=127.0.0.1 --port=8000
pause
