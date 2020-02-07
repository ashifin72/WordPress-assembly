<?php

add_shortcode( 'art_feedback', 'art_feedback' );
/**
 * Шорткод вывода формы
 *
 * @return string
 * @see https://wpruse.ru/?p=3224
 */
function art_feedback() {

    ob_start();
    ?>
    <form id="add_feedback">
        <input type="text" name="art_name" id="art_name" class="required art_name" placeholder="Ваше имя" value=""/>

        <input type="email" name="art_email" id="art_email" class="required art_email" placeholder="Ваш E-Mail" value=""/>

        <input type="text" name="art_subject" id="art_subject" class="art_subject" placeholder="Тема сообщения" value=""/>

        <textarea name="art_comments" id="art_comments" placeholder="Сообщение" rows="10" cols="30" class="required art_comments"></textarea>

        <input type="checkbox" name="art_anticheck" id="art_anticheck" class="art_anticheck" style="display: none !important;" value="true" checked="checked"/>

        <input type="text" name="art_submitted" id="art_submitted" value="" style="display: none !important;"/>

        <input type="submit" id="submit-feedback" class="button" value="Отправить сообщение"/>
    </form>
    <?php

    return ob_get_clean();
}
add_action( 'wp_enqueue_scripts', 'art_feedback_scripts' );
/**
 * Подключение файлов скрипта формы обратной связи
 *
 */
function art_feedback_scripts() {

    // Обрабтка полей формы
    wp_enqueue_script( 'jquery-form' );

    // Подключаем файл скрипта
    wp_enqueue_script(
        'feedback',
        get_stylesheet_directory_uri() . '/assets/js/feedback.js',
        array( 'jquery' ),
        1.0,
        true
    );

    // Задаем данные обьекта ajax
    wp_localize_script(
        'feedback',
        'feedback_object',
        array(
            'url'   => admin_url( 'admin-ajax.php' ),
            'nonce' => wp_create_nonce( 'feedback-nonce' ),
        )
    );

}

add_action( 'wp_ajax_feedback_action', 'ajax_action_callback' );
add_action( 'wp_ajax_nopriv_feedback_action', 'ajax_action_callback' );
/**
 * Обработка скрипта
 *
 * @see https://wpruse.ru/?p=3224
 */
function ajax_action_callback() {

    // Массив ошибок
    $err_message = array();

    // Проверяем nonce. Если проверкане прошла, то блокируем отправку
    if ( ! wp_verify_nonce( $_POST['nonce'], 'feedback-nonce' ) ) {
        wp_die( 'Данные отправлены с левого адреса' );
    }

    // Проверяем на спам. Если скрытое поле заполнено или снят чек, то блокируем отправку
    if ( false === $_POST['art_anticheck'] || ! empty( $_POST['art_submitted'] ) ) {
        wp_die( 'Пошел нахрен, мальчик!(c)' );
    }

    // Проверяем полей имени, если пустое, то пишем сообщение в массив ошибок
    if ( empty( $_POST['art_name'] ) || ! isset( $_POST['art_name'] ) ) {
        $err_message['name'] = 'Пожалуйста, введите ваше имя.';
    } else {
        $art_name = sanitize_text_field( $_POST['art_name'] );
    }

    // Проверяем полей емайла, если пустое, то пишем сообщение в массив ошибок
    if ( empty( $_POST['art_email'] ) || ! isset( $_POST['art_email'] ) ) {
        $err_message['email'] = 'Пожалуйста, введите адрес вашей электронной почты.';
    } elseif ( ! preg_match( '/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i', $_POST['art_email'] ) ) {
        $err_message['email'] = 'Адрес электронной почты некорректный.';
    } else {
        $art_email = sanitize_email( $_POST['art_email'] );

    }
    // Проверяем полей темы письма, если пустое, то пишем сообщение по умолчанию
    if ( empty( $_POST['art_subject'] ) || ! isset( $_POST['art_subject'] ) ) {
        $art_subject = 'Сообщение с сайта';
    } else {
        $art_subject = sanitize_text_field( $_POST['art_subject'] );
    }

    // Проверяем полей сообщения, если пустое, то пишем сообщение в массив ошибок
    if ( empty( $_POST['art_comments'] ) || ! isset( $_POST['art_comments'] ) ) {
        $err_message['comments'] = 'Пожалуйста, введите ваше сообщение.';
    } else {
        $art_comments = sanitize_textarea_field( $_POST['art_comments'] );
    }

    // Проверяем массив ошибок, если не пустой, то передаем сообщение. Иначе отправляем письмо
    if ( $err_message ) {

        wp_send_json_error( $err_message );

    } else {

        // Указываем адресата
        global $wphome_options;
        $wphome_mail_contact = $wphome_options['wphome-mail-contact'];
        $email_to = $wphome_mail_contact;

        // Если адресат не указан, то берем данные из настроек сайта
        if ( ! $email_to ) {
            $email_to = get_option( 'admin_email' );
        }

        $body    = "Имя: $art_name \nEmail: $art_email \n\nСообщение: $art_comments";
        $headers = 'From: ' . $art_name . ' <' . $email_to . '>' . "\r\n" . 'Reply-To: ' . $email_to;

        // Отправляем письмо
        wp_mail( $email_to, $art_subject, $body, $headers );

        // Отправляем сообщение об успешной отправке
        $message_success = 'Собщение отправлено. В ближайшее время я свяжусь с вами.';
        wp_send_json_success( $message_success );
    }

    // На всякий случай убиваем еще раз процесс ajax
    wp_die();

}