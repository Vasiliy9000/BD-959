Что необходимо сделать
Создать тип ИБ "Cargonomica - О компании" (CODE = CARGONOMICA_ABOUT).
Создать ИБ "Cargonomica - О компании - Настройки страницы" (CODE = CARGONOMICA_ABOUT_SETTINGS).

Добавить свойства ИБ:

"Оптимизация для роста прибыли" - выводить блок" – чекбокс;
"Оптимизация для роста прибыли" - заголовок" – строка;
"Наш подход" - выводить блок" – чекбокс;
"Наш подход" - заголовок" – строка;
"История" - выводить блок" – чекбокс;
"История" - заголовок" – строка;
"Продукты экосистемы" - выводить блок" – чекбокс;
"Продукты экосистемы" - заголовок" – строка;
"Новости компании" - выводить блок" – чекбокс;
"Новости компании" - заголовок" – строка;
"Документы" - выводить блок" – чекбокс;
"Документы" - заголовок" – строка;
Все свойства одиночные и необязательные, если не указано обратное.

В элементах будут учитываться поля "Активность", "Символьный код", "Шаблон META TITLE", "Шаблон META DESCRIPTION", "Шаблон META KEYWORDS".

Настройки доступа к ИБ базовые:

чтение для всех пользователей,
редактирование для контент-менеджеров,
полный доступ для администраторов.
Настроить форму редактирования элемента ИБ (убрать стандартные табы и поля, вывести свойства, разбить их на табы и блоки).

Добавить элемент ИБ с кодом "index". Заполнить элемент актуальными значениями в соответствии с вёрсткой.

Создать миграции:

На инфоблок
На наполнение инфоблока контентом
Дополнительная информация
По реализации похоже на BD-827 (оттуда же можно подсмотреть настройку формы редактирования – есть особенности работы с шаблонами META)




----------------------------------------------------------------------------------------------------------------------------------------------



В первой миграции ты не писал комментарий к методам up/down в phpDoc...

...а во второй решил написать


В контексте миграций, писать комментарии к наследуемым свойствам и методам ($author, $description, $moduleVersion, up(), down()) необязательно. Они реализуют базовую функциональность, описанную в документации модуля миграций. phpDoc же остаётся обязательным для методов.

Тем не менее, нужно придерживаться единообразия, и если начал писать такие комментарии, то пиши их везде (хотя на мой взгляд, в данном случае можно ничего не писать)

Постоянная ссылка
a.samarkin
Самаркин Анатолий Александрович добавил(а) комментарий - 14/фев/25 10:42 AM
Комментарии в гитлабе.
Нужно исправить phpDoc метода down() второй миграции в части тега @throws – метод не выбрасывает исключений, потому что внутри него все обернуто в try-catch.
Также см. ответ выше, про комментарии в phpDoc

https://gitlab.cargonomica.com/bitrix-php/cargonomica-web-sites/-/merge_requests/66

Постоянная ссылка Редактировать Удалить
V.Andreev
Андреев Василий Иванович добавил(а) комментарий - 14/фев/25 3:10 PM
Что сделано

Поправлены комменты 

 

миграции

BD959_20250214000001

BD959_20250214000002

 

ссылка на мр
