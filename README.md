# RSCHIR

Компиляция всех практик 1-7 в проекте на фреймворке Laravel 11

1. Докер контейнеры и установка php 

БД и СУБД приложения запущена в docker-compose контейнерах.

2. Отображение информации на страницах

/drawer?num=(1/2/3) фигуры

/sorting?array=5,3,4,1,2 quicksort

(Я тупанул и выбрал vue фреймворк фронта, поэтому все скрипты на JS, а не на php как надо в задании, но надеюсь мы можем закрыть на это глаза ведь различия не точтобывелекинупожалуйста ╮(￣ω￣;)╭ )

3. 2 динамические и 2 статические страницы

ДИНАМИЧЕСКИЕ:

/books Не паджинированный список всех книг 
при нажатии на имя автора переносит на соответствующую страницу автора
/author/{id} На котором выведена информация о нём и список только его книг.


Страницы сделаны на vue3 + inertia 

Routing от laravel (vue`шный запарный какой-то (я понимаю, что ларавельный делает приложение не SPA своими перезагрузками страницы))

СТАТИЧЕСКИЕ:

/static1.html просто текстик

/static2.html картинка

(Я не врубился пока как на nginx завести (Точнее на моей рабочей машине какая-то лажа с nginx и он игнорит все попытки подключить index.php и 503 выдаёт (попробую на купленный ВПС поставить если понадобится)). Поэтому пока php dev сервер обрабатывает и статические, и динамические запросы. Как потом к этому прикрутить апач вообще без понятия. Не нашел ни одного упоминания совместного использования laravel+apache+nginx, только отдельно)

(Есть ещё такой костыль, но это проклято https://laracasts.com/discuss/channels/laravel/serving-static-html-with-laravel?page=1&replyId=881902)

4. Базовый круд для автора и книги

Если не поленюсь прикреплю скрины из тг