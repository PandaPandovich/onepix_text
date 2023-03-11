import replace from 'gulp-replace'; // Поиск и замена
import plumber from 'gulp-plumber'; // Обработка ошибок
import notify from 'gulp-notify'; // Сообщения (Подсказки)
import ifPlugin from 'gulp-if'; //Условия в функциях gulp

export const plugins = {
    replace:replace,
    plumber:plumber,
    notify:notify,
    if: ifPlugin, 

}