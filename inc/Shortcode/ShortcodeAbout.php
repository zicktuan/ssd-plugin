<?php
namespace Awesome\Shortcode;

class ShortcodeAbout extends AbstractShortcode
{
    public function __construct($self = null) {
        $this->parent = $self;
        add_shortcode($this->get_name(), array($this, 'render'));
        vc_lean_map($this->get_name(), array($this, 'map'));
    }

    /**
     * Get shortcode name.
     *
     * @return string
     */
    public function get_name() {
        return 'mayxaydung_about';
    }

    /**
     * Shortcode handler.
     *
     * @param array $atts Shortcode attributes.
     *
     * @return string Shortcode output.
     */
    public function render($atts) {
        $atts = vc_map_get_attributes($this->get_name(), $atts);
        $atts = array_map('trim', $atts);

        $listItems = vc_param_group_parse_atts( $atts['items'] );

        ob_start();
        include $this->parent->locateTemplate('shortcode-about.tpl.php');
        return ob_get_clean();
    }

    /**
     * Get shortcode settings.
     *
     * @return array
     *
     * @see vc_lean_map()
     */
    public function map() {
        $params = array(
        	array(
                'type'       => 'attach_image',
                'param_name' => 'bg_item',
                'heading'    => esc_html__('Background', 'MXD')
            ),
            array(
                'type'       => 'textfield',
                'param_name' => 'title_text',
                'heading'    => esc_html__('Title', 'MXD')
            ),
            array(
                'type'       => 'textarea',
                'param_name' => 'item_des',
                'heading'    => esc_html__('Description', 'MXD')
            ),
            array(
                'type'        => 'textfield',
                'param_name'  => 'item_btn_detail',
                'heading'     => esc_html__( 'Detail', 'hongdang' ),
                'value'       => "Chi tiết"
            ),
            array(
                'type'        => 'textfield',
                'param_name'  => 'item_link_detail',
                'heading'     => esc_html__( 'Link detail', 'hongdang' ),
                'value'       => "#"
            ),
            array(
                'type'       => 'param_group',
                'param_name' => 'items',
                'heading'    => esc_html__( 'List', 'MXD' ),
                'params'     => array(
                    array(
                        'type'        => 'textfield',
                        'param_name'  => 'items_icon',
                        'heading'     => esc_html__('Icon', 'MXD'),
                        'description' => esc_html__('See list icon in -> http://astronautweb.co/snippet/font-awesome-icons-v4-2/', 'MXD')
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'items_title',
                        'heading'    => esc_html__('Title', 'MXD')
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'items_excerpt',
                        'heading'    => esc_html__('Excerpt', 'MXD')
                    )
                )
            )
        );

        return array(
            'name'        => esc_html__('About', 'MXD'),
            'description' => esc_html__('About', 'MXD'),
            'category'    => $this->get_category(),
            'icon'        => $this->get_icon(),
            'params'      => $params
        );
    }
}
