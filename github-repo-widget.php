<?php

/**
 * @package Card For GitHub
 */
class WP_Widget_GitHub_Repo_Card extends WP_Widget
{
    function __construct()
    {
        load_plugin_textdomain('card');

        parent::__construct(
            'wp_widget_github_repo_card',
            __('GitHub Repo', 'card'),
            array('description' => __('GitHub Repo Card', 'card'))
        );

        if (is_active_widget(false, false, $this->id_base)) {
            add_action('wp_head', array($this, 'css'));
        }
    }

    function css()
    {
        ?>

        <style type="text/css">
            .a-stats {
                width: auto;
            }

            .a-stats a {
                background: #7CA821;
                background-image: -moz-linear-gradient(0% 100% 90deg, #5F8E14, #7CA821);
                background-image: -webkit-gradient(linear, 0% 0, 0% 100%, from(#7CA821), to(#5F8E14));
                border: 1px solid #5F8E14;
                border-radius: 3px;
                color: #CFEA93;
                cursor: pointer;
                display: block;
                font-weight: normal;
                height: 100%;
                -moz-border-radius: 3px;
                padding: 7px 0 8px;
                text-align: center;
                text-decoration: none;
                -webkit-border-radius: 3px;
                width: 100%;
            }

            .a-stats a:hover {
                text-decoration: none;
                background-image: -moz-linear-gradient(0% 100% 90deg, #6F9C1B, #659417);
                background-image: -webkit-gradient(linear, 0% 0, 0% 100%, from(#659417), to(#6F9C1B));
            }

            .a-stats .count {
                color: #FFF;
                display: block;
                font-size: 15px;
                line-height: 16px;
                padding: 0 13px;
                white-space: nowrap;
            }
        </style>

        <?php
    }

    function form($instance)
    {
        $instance = wp_parse_args((array)$instance, array('title' => __('GitHub', 'card'), 'owner' => '', 'name' => ''));
        $title = esc_attr($instance['title']);
        $owner = esc_attr($instance['owner']);
        $name = esc_attr($instance['name']);

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:', 'card'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('owner'); ?>"><?php esc_html_e('UserName:', 'card'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('owner'); ?>"
                   name="<?php echo $this->get_field_name('owner'); ?>" type="text"
                   value="<?php echo esc_attr($owner); ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('name'); ?>"><?php esc_html_e('Repository:', 'card'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('name'); ?>"
                   name="<?php echo $this->get_field_name('name'); ?>" type="text"
                   value="<?php echo esc_attr($name); ?>"/>
        </p>

        <?php
    }

    function update($new_instance, $old_instance)
    {
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['owner'] = strip_tags($new_instance['owner']);
        $instance['name'] = strip_tags($new_instance['name']);
        return $instance;
    }

    function widget($args, $instance)
    {
        if (!isset($instance['title'])) {
            $instance['title'] = __('Repository', 'card');
        }

        $title = apply_filters('widget_title', esc_attr($instance['title']));
        $owner = esc_attr($instance['owner']);
        $name = esc_attr($instance['name']);

        echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];

        echo wp_github_card(array(
            'owner' => $owner,
            'name' => $name,
            'class' => 'github-card-widget'
        ));

        echo $args['after_widget'];
    }
}


add_action('widgets_init', function () {
    register_widget('WP_Widget_GitHub_Repo_Card');
});
