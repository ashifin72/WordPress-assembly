<?php
/**
 * Добавляем рекламу в середину длинных записей
 * @param $content - исходное содержимое записи
 * @return string - модифицированная запись
 */
function addAdvertToArticle($content){
    //считаем общее количество параграфов в записи
    $paragraphNum = substr_count($content, '<p>');

    //в коротких записях реклама не нужна
    if($paragraphNum < 5){
        return $content;
    }

    //инициализируем переменные для вычислений
    $destination = 0;
    $contentLength = strlen($content);

    //обходим половину от общего количества параграфов
    for($count = 1; $count <= round($paragraphNum/2, 0); $count++){

        //записываем позицию последнего найденного параграфа
        $destination = strripos(
            $content,
            '<p>',
            //каждый раз делаем отступ на предыдущую позицию
            //тройка означает длину тега <p>
            ($destination != 0)? -($contentLength - $destination + 3) : null
        );
    }

    //вставляем код рекламы (второй параметр) в запись
    global $wphome_options;
    $wphome_banner1 = $wphome_options['wphome-banner-1'];
    $content = substr_replace(
        $content,
        "<div style='padding:10px; margin: 10px 0;'>$wphome_banner1</div>",
        ($destination - 1),
        0
    );

    return $content;
}

//регистрируем функцию в качестве хук-фильтра
add_filter( 'the_content', 'addAdvertToArticle');