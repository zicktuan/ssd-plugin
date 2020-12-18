<?php
namespace Awesome\Shortcode;

class ShortcodeProductFeatured extends AbstractShortcode
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
        return 'mayxaydung_product';
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
        include $this->parent->locateTemplate('shortcode-products-feature.tpl.php');
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
                'param_name' => 'item_bg',
                'heading'    => esc_html__('Background', 'MXD')
            ),
            array(
                'type'       => 'textfield',
                'param_name' => 'text_title',
                'heading'    => esc_html__('Title', 'MXD')
            ),
            array(
                'type'       => 'param_group',
                'param_name' => 'items',
                'heading'    => esc_html__( 'List Category Product', 'MXD' ),
                'params'     => array(
                    array(
                        'type'       => 'attach_image',
                        'param_name' => 'items_image',
                        'heading'    => esc_html__('Image', 'MXD')
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'items_title',
                        'heading'    => esc_html__('Title', 'MXD')
                    ),
                    array(
                        'type'       => 'textarea',
                        'param_name' => 'items_des',
                        'heading'    => esc_html__('Description', 'MXD')
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'items_btn_detail',
                        'heading'    => esc_html__('Button Detail', 'MXD'),
                        'value'      => 'Chi tiết'
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'items_link',
                        'heading'    => esc_html__('Link', 'MXD'),
                        'value'      => '#'
                    )
                )
            )
        );
        

        return array(
            'name'        => esc_html__('Products Feature', 'MXD'),
            'description' => esc_html__('Products Feature', 'MXD'),
            'category'    => $this->get_category(),
            'icon'        => $this->get_icon(),
            'params'      => $params
        );
    }
}
