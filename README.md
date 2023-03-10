# Лабораторная работа 2
## Цель работы
Разработать и реализавать клиент-серверную информационную систему, реализующую механизм CRUD
## Задание
Система предназначена для анонимного общения в сети интернет

Интерфейс системы представляет собой веб-страницу с лентой заметок, отсортированных в обратном хронологическом порядке и форму добавления новой заметки. В ленте отображаются последние 100 заметок.

Возможности пользователей:
- Добавление текстовых заметок в общую ленту
- Реагирование начужие заметки

## Ход работы
1. Пользовательский интерфейс и пользовательский сценарий работы


Первоначально пользователь попадает на главную страницу (index.php). На этой странице он может поставить лайк/дизлайк чужим заметкам, а также добавить свою. Для этого необходимо в форме для ввода ввести логин и текст поста (при необхдимости добавить изображение) и нажать на кнопку "Опубликовать пост". В случае корректного ввода заметка добавляется в самое начало на главную страницу (index.php).  Если же пользователь ввел что-то неправильно, то возвращается на эту же страницу, но вверху будет написано сообщение о его ошибке. Посты можно удалаять, нажав на кнопку "удалить", и редактировать, нажав на кнопку "Изменить". Кнопка "Изменить" перенаправляет пользователя на страницу "update.php", где можно изменить заметку и сохранить изменения. В случае корректного ввода заметка изменится на главной странице (index.php).  Если же пользователь ввел что-то неправильно, то возвращается на эту же страницу (update.php), но вверху будет написано сообщение о его ошибке.

2. Хореография

Добавление поста

![](https://github.com/OneBumBot/Lab2_CRUD/blob/main/IMAGES/Добавление.png)


Удаление поста

![](https://github.com/OneBumBot/Lab2_CRUD/blob/main/IMAGES/Удаление.png)

3. Структура базы данных

| Название | Тип      | Длина | Описание                           |
|----------|----------|-------|------------------------------------|
| id       | int      |       | Ключевое поле                      |
| login    | varchar  | 15    | Логин пользователя                 |
| text     | text     |       | Текст поста                        |
| time     | datetime |       | Время публикации поста             |
| image    | varchar  | 600   | Изображение, приклепленное к посту |
| likes    | int      |       | Количество лайков                  |
| dislikes | int      |       | Количество дизлайков               |

4. Алгоритмы 
- Добавление поста

![](https://github.com/OneBumBot/Lab2_CRUD/blob/main/IMAGES/Добавление%20поста.png)

- Изменение поста

![](https://github.com/OneBumBot/Lab2_CRUD/blob/main/IMAGES/Изменение%20поста.png)

- Реакции на пост (лайк и дизлайк)

![](https://github.com/OneBumBot/Lab2_CRUD/blob/main/IMAGES/Лайк.png)

![](https://github.com/OneBumBot/Lab2_CRUD/blob/main/IMAGES/Дизлайк.png)

- Удаление поста

![](https://github.com/OneBumBot/Lab2_CRUD/blob/main/IMAGES/Удаление%20поста.png)

## Вывод
Разработали и реализавали клиент-серверную информационную систему, реализующую механизм CRUD
