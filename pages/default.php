<div class="col-lg-12">   
	<h1>Тестовое задание. Простой файловый менеджер.</h1>
<p>Технологии для использования: PHP не ниже 5.3, MySQL5.5, JS фреймворк - JQuery, AJAX, Twitter Bootstrap (или аналог).</p>

<p>требования по дизайну: дизайн простой, произвольный с использованием Twitter Bootstrap.</p>

<p>Использование php - фреймворков: по желанию.</p>
<p>Придеживаться всех описанных требований, то что не описано или не однозначно - на свое усмотрение.</p>
<p>Описание функционала:</p>
<p>Сделать регистрацию пользователей.</p>
<p>Поля формы:</p>
<ul>
 	<li>email *</li>
 	<li>name *</li>
 	<li>info</li>
 	<li>password *</li>
 	<li>confirm password *</li>
 	<li>captcha *</li>
</ul>
<p>Должно отправляться на почту письмо со ссылкой для подтверждения регистрации,
подтверждение админа не требуется.</p>

<p>Валидация на стороне сервера должна быть реализована обязательно по AJAX (это так же касается формы login)</p>

<strong>Формы:</strong>
<p>login / logout</p>

<p>Гость видит только homepage, наполненный произвольным контентом + пункты меню login/register</p>

<p>Авторизированный пользователь видит еще пункт Manage files</p>

<strong>Страница Manage files:</strong>

<p>Тут имеется кнопка Upload file при нажатии на которую открывается форма для загрузки файла (реализация произвольная, AJAX по желанию)</p>
<strong>Форма для Upload file:</strong>
<ul>
 	<li>кнопка для выбора файла</li>
 	<li>title (это имя файла с которым этот файл можно будет скачать, если поле не указано - взять оригинальное имя файла. Файлы не должны перезаписываться,
каждый файл должен быть сохранен, как уникальный)</li>
 	<li>description (это поле с произвольным содержимым, можно вставлять HTML теги, поэтому можно использовать произвольный WYSIWYG редактор)</li>
</ul>
<p>Файлы можно загружать размером до 200 Mb.</p>
<p>Ограничения по типам файлов: doc, docx, xls, xlsx, pdf, jpg, png, rar, zip</p>
<strong>Теперь снова страница Manage files:</strong>
<p>кроме кнопки Upload File она содержит таблицу с pagination (AJAX по желанию)</p>
<strong>Структура таблицы:</strong>
<p>| # | Title | Extention | Size | Upload time | Downloaded | Description | Actions |</p>
<p>| 1 | name |text or pic| 12 Mb| 12.04.2013 10:05 | 186 times |This file is very... | Download / Edit / Delete |</p>
<p>все поля кроме Actions - sortable</p>

<p>Пояснение к некоторым полям:</p>
<p>Description - это предположительно страница с большим контентом, поэтому берем небольшое начало текста, а остальное отрезаем, текст делаем в виде ссылки,
при наведении выводим pop up окно и в него AJAX-ом загружаем всю страницу description.</p>
<p>Download - кнопка скачивания файла. При нажатии на кнопку download - увеличивается счетчик скачиваний файла на единицу, что отражается в столбце Downloaded.
Пользователь не должен иметь доступа к чужим файлам, только к своим.</p>
<p>Edit - редактирование Title и Description (AJAX по желанию)</p>
<p>Delete - удаление.</p>
<p>-------------------------------------------------------</p>
<p>При нажатии на кнопку "Добавить файлы" - вылазит модальное окно с формой, в которой нужно ввести title, description и выбрать загружаемый файл.
После отправки формы идет запись в бд: id, iduser, title, file_rasshirenie, size, date, downloaded, description, file_puth.</p>
</div>