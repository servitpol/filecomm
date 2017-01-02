При реализации тестового задания использовал WAMP: Open Server,  Apache-2.2, MySQL5.5, PHP-5.4.  JQuery, AJAX, Twitter Bootstrap.
Почтовый клиент так же настроен на openserver через один из моих e-mail.
Базу данных MySQL создал на своем хостинге, доступ открыт со всех ip, 
можно посмотреть реализацию тут https://xray.beget.com/phpMyAdmin , данные для входа в connect.php.
Тестовый акк с загружеными файлами:
e-mail(login): admin@admin.ua
pass: admin

Структура тестового сайта FileComm:
/activation
 - active.php	//активация аккаунта через почту
/core
 - connect.php	//соединение с БД
 - creatdb.php	//создание БД
 - function.php	//ф-ции
/includes
 - actions.php	//обработка запросов из колонки actions
 - authhad.php	//авторизация
 - reghand.php	//регистрация
 - tablehand.php	//таблица с файлами
 - upload.php	//загрузка файлов на сервер
/js
 - authscript.js	//ajax авторизация
 - file.js	//формирование таблицы и действия actions
 - wysiwyg.js	//wysiwyg редактор
 - descr.js	//скрипт вывода description через ajax
/pages
 - auth.php	//страница авторизации
 - defualt.php	//страница с контентом по умолчанию
 - manfiles.php	//страница файлового менеджера
 - register.php	//страница регистрации
/style
 - style.css	//стили
/uploads	//папка с файлами пользователей

.htaccess	//настройки
index.php	//главная страница

Потратил времени: 3 часа 28.12, 3 часа 29.12, 3 часа 30.12, 5 часов 31.12, 5 часов 2.01 из которых 2 на тесты и написание readme.txt. Итого: 19 часов.
Пересмотренная оценка тестового задания с 2 до 4-.

