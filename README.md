### [1. Тестовое задание для Facepass](#1)
### [2. Инструкция по запуску проекта](#2)
### [3. Работа с проектом](#3)
### [4. Работа с проектом](#4)
### [5. Работа с проектом](#5)

### <a name="1">1. Тестовое задание для Facepass</a>

Описание:

Используя laravel framework 7+, написать REST API для выдачи списка пользователей из любого внешнего сервиса по API (например vk, facebook, google, итп). Требуется реализовать интеграцию с выбранным сервисом. Запуск импорта пользователей будет производиться через консольную команду. Для работы с бд использовать ORM.  Для респонсов использовать https://laravel.com/docs/5.8/eloquent-resources

У пользователя должны быть поля:
-	имя
-	емайл (если есть)
-	фотография (ссылка на локальный хост), например https://127.0.0.1/storage/avatar_1.png

Консольные команды, которые нужно реализовать:
-	запуск импорта пользователей из внешнего сервиса

API Методы, которые нужно реализовать:
-	список всех пользователей, которые импортированы из сервиса
-	получение подробной информации о пользователе по ID

Упаковать проект в docker, запушить и описать проект на github. В описании должно быть описано как разворачивать проект.

ВАЖНО: Работу с картинками реализовать через https://github.com/spatie/laravel-medialibrary 

Для добавления новых пользователей в базу данных, использовать events и listeners. При получении пользователя из внешнего сервиса, передавать данные пользователя в event, при срабатывании event должен вызываться listener, который добавляет пользователя в базу данных. 

### <a name="2">2. Инструкция по запуску проекта</a>

Скачать с GitHub

    git clone https://github.com/al-zv/parser.git
    
Открыть папку проекта

    cd parser

Запустить проект через Docker (Docker должен быть установлен и запущен)

    ./vendor/bin/sail up -d

Выполнить миграции

    ./vendor/bin/sail artisan migrate
    
Для интеграции с VK нужен сервисный ключ доступа

    https://dev.vk.com/api/getting-started
    
    <img width="880" alt="Снимок экрана 2022-11-25 в 11 47 29" src="https://user-images.githubusercontent.com/63869857/203917899-fe3cbde0-0271-4934-b910-9a258d86b256.png">

### <a name="3">3. Работа с проектом</a> 

Для начала парсинга ввести в командной строке

    ./vendor/bin/sail artisan vk:parse {количество_пользователей}
    
количество_пользователей - число пользователей, информацию о которых нужно получить

Получить всех пользователей

    http://localhost/api/users
    
Получить подробную информацию о пользователе
    
    http://localhost/api/user/1

### <a name="4">4. Слайд как работает проект</a> 

<img width="1233" alt="image" src="https://user-images.githubusercontent.com/63869857/203923465-7f71c623-eacc-4a23-910b-69bf78920b6b.png">

### <a name="5">5. Результат работы проекта</a> 

