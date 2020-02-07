<?php
if( ! defined('ABSPATH') ) exit;

// Регистрируем новый виджет
add_action( 'widgets_init', 'register_top_posts_widget' );
function register_top_posts_widget() {
	register_widget( 'Popular_Post_Widget' );
}

// Добавляем новый виджет
class Popular_Post_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'pop_widget',
			'Популярные записи',
			array( 'description' => 'Вывод популярных записей', )
		);

		// Активируем фукцию подсчета просмотров 
		add_action('wp_head', 'brilias_post_views');
		function brilias_post_views() {
			if( is_single() ) {
				set_post_views( get_the_ID() );
			}
		}

		// Функция подсчета просмотров
		function set_post_views($postID) {
			// Мета где будем хранить данные
			$count_views = 'count_views'; // Количество просмотров

			// Получаем данные из мета
			$count = get_post_meta($postID, $count_views, true); // Количество просмотров

			// Если $count не существует
			if($count=='') {
				$count = 0;
				delete_post_meta($postID, $count_views);
				add_post_meta($postID, $count_views, '0');
			} else {
				$count++;
				update_post_meta($postID, $count_views, $count);
			}
		}   
	}

	/** Вывод виджета популярных записей
	 *
	 *  @param array $args     аргументы виджета.
	 *  @param array $instance сохраненные данные из настроек
	 */
	public function widget( $args, $instance ) {
		global $today_date;
		global $reset_val;
		global $period_reset;

		// Получим опции виджета
		$title = apply_filters( 'widget_title', $instance['title'] ); // Узнаем заголовок виджета
		$param_cat = $instance['cat_id']; // Узнаем ID категории
		$param_quantity = $instance['quantity']; // Узнаем сколько записей выводить
		$period_reset = $instance['period']; // Узнаем период сброса
		$today_date = current_time('Y-m-d'); // Узнаем текущую дату

		// Установим дату сброса
		$reset_val = date ('Y-m-d', strtotime ($today_date .'+' .$period_reset .'days'));

		// Аргументы для проверки даты сброса
		$reset_args = array(
			'post_status' => 'publish',
			'category__in' => $param_cat,
			'posts_per_page' => -1
		);

		// Получим все записи для проверки даты сброса
		$reset_query = new WP_Query($reset_args);
		while ($reset_query->have_posts()){ $reset_query->the_post();
			global $today_date;
			global $reset_val;
			global $period_reset;                           

			$meta_date_reset = $period_reset .'_date_reset'; // Мета даты сброса просмотров

			// Получим мета сброса просмотров                              
			$reset = get_post_meta($reset_query->post->ID, $meta_date_reset, true);

			// Если $reset не существует создадим мету и запишем дату
			if($reset == ''){
				delete_post_meta($reset_query->post->ID, $meta_date_reset);
				add_post_meta($reset_query->post->ID, $meta_date_reset, $reset_val);
			}

			// Если текущая дата больше или равно даты сброса          
			if($today_date >= $reset){
				update_post_meta($reset_query->post->ID, 'count_views', 0); // Сбросим счетчик просмотров
				update_post_meta($reset_query->post->ID, $meta_date_reset, $reset_val); // Установим овую дату сброса
			}                           
		} wp_reset_postdata();

		// Аргументы вывода виджета
		$args = array(
			'post_status' => 'publish',
			'category__in' => $param_cat,
			'posts_per_page' => $param_quantity,
			'meta_key' => 'count_views',
			'orderby' => 'meta_value_num',
			'order' => 'DESC',
		); ?>
  <div class="widget">
  <h4 class="widgettitle">
  <?php
		echo $instance['title']; ?>
  </h4>
	
  <div class="row">  
  <?php
		$result = new WP_Query($args);
		while ($result->have_posts()) { $result->the_post(); ?>

<div class="col-6 top-posts">
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(array(100,100)); ?>
<?php the_title(); ?></a>
</div>

		<?php } wp_reset_postdata(); ?>
	</div>
  </div>
		<?php }
  
	

	/**
	 * Админ-часть виджета
	 *
	 * @param array $instance сохраненные данные из настроек
	 */
	public function form( $instance ) {
		$title = @ $instance['title'] ?: 'Заголовок';
		$cat = @ $instance['cat_id'] ?: '1';
		$period = @ $instance['period'] ?: '1';
		$quantity = @ $instance['quantity'] ?: '1';
	?>

	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Заголовок:' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_html( $title ); ?>">

	<label for="<?php echo $this->get_field_id( 'cat' ); ?>"><?php _e( 'ID Категории:' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'cat_id' ); ?>" name="<?php echo $this->get_field_name( 'cat_id' ); ?>" type="text" value="<?php echo esc_attr( $cat ); ?>">

	<label for="<?php echo $this->get_field_id( 'period' ); ?>"><?php _e( 'Период времени:' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'period' ); ?>" name="<?php echo $this->get_field_name( 'period' ); ?>" type="text" value="<?php echo esc_attr( $period ); ?>">

	<label for="<?php echo $this->get_field_id( 'quantity' ); ?>"><?php _e( 'Количество записей:' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'quantity' ); ?>" name="<?php echo $this->get_field_name( 'quantity' ); ?>" type="text" value="<?php echo esc_attr( $quantity ); ?>">

	<?php }

	/**
	 * Сохранение настроек виджета. Здесь данные должны быть очищены и возвращены для сохранения их в базу данных.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance новые настройки
	 * @param array $old_instance предыдущие настройки
	 *
	 * @return array данные которые будут сохранены
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? ( $new_instance['title'] ) : '';
		$instance['cat_id'] = ( ! empty( $new_instance['cat_id'] ) ) ? strip_tags( $new_instance['cat_id'] ) : '';
		$instance['period'] = ( ! empty( $new_instance['period'] ) ) ? strip_tags( $new_instance['period'] ) : '';
		$instance['quantity'] = ( ! empty( $new_instance['quantity'] ) ) ? strip_tags( $new_instance['quantity'] ) : '';

		return $instance;
	}
}
