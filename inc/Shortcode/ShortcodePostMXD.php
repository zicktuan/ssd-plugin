<?php
namespace Awesome\Shortcode;

class ShortcodePostMXD extends AbstractShortcode
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
        return 'mayxaydung_postmxd';
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
        // print_r($listItems);die;
        foreach ($listItems as $value) {
            $listPost = get_posts([
            "order"       => isset($value['order_by']) ? $value['order_by'] : "DESC",
            "numberposts" => isset($value['number_post']) ? $value['number_post'] : 3,
            "category"    => isset($value['cat_1_category']) ? $value['cat_1_category'] : 0
        ]);
        }

        ob_start();
        include $this->parent->locateTemplate('shortcode-post-mxd.tpl.php');
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
        $listCat = [];
        $listCatSystem = get_categories();
        foreach ($listCatSystem as $value) {
            $listCat[$value->name] = $value->term_id;
        }

        $params = array(
            array(
                'type'       => 'param_group',
                'param_name' => 'items',
                'heading'    => esc_html__( 'List slide', 'MXD' ),
                'params'     => array(
                    array(
                        "type"       => "dropdown",
                        "param_name" => "cat_1_category",
                        "heading"    => esc_html__("Category", "hoicongchung"),
                        "value"      => $listCat
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'number_post',
                        'heading'    => esc_html__('Number Of Post', 'MXD'),
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'order_by',
                        'heading'    => esc_html__('Order By', 'MXD'),
                        'value'      => array(
                                        __('DESC', 'MXD') => 'DESC',
                                        __('ASC', 'MXD')  => 'ASC',
                                    )
                    )
                )
            )

        );

        return array(
            'name'        => esc_html__('Posts', 'MXD'),
            'description' => esc_html__('Posts', 'MXD'),
            'category'    => $this->get_category(),
            'icon'        => $this->get_icon(),
            'params'      => $params
        );
    }
}
