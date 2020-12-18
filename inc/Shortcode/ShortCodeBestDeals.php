<?php
namespace Awesome\Shortcode;

class ShortCodeBestDeals extends AbstractShortcode
{
    public function __construct($self = null) {
        $this->parent = $self;
        add_shortcode($this->get_name(), array($this, 'render'));
        vc_lean_map($this->get_name(), array($this, 'map'));
    }

    /**
     * Get shortCode name.
     *
     * @return string
     */
    public function get_name() {
        return 'awesome_best_deals';
    }

    /**
     * ShortCode handler.
     *
     * @param array $atts ShortCode attributes.
     *
     * @return string ShortCode output.
     */
    public function render($atts) {
        $atts = vc_map_get_attributes($this->get_name(), $atts);
        $atts = array_map('trim', $atts);

        $listItems = vc_param_group_parse_atts( $atts['items'] );

        ob_start();
        include $this->parent->locateTemplate('shortcode-best-deals.tpl.php');
        return ob_get_clean();
    }

    /**
     * Get shortCode settings.
     *
     * @return array
     *
     * @see vc_lean_map()
     */
    public function map() {
        $params = array(
            array(
                'type'       => 'textfield',
                'param_name' => 'title_text',
                'heading'    => esc_html__('Title', 'awesome')
            ),
            array(
                'type'       => 'textfield',
                'param_name' => 'item_des',
                'heading'    => esc_html__('Description', 'awesome')
            ),

            array(
                'type'       => 'param_group',
                'param_name' => 'items',
                'heading'    => esc_html__( 'List', 'awesome' ),
                'params'     => array(
                    array(
                        'type'        => 'textfield',
                        'param_name'  => 'items_icon',
                        'heading'     => esc_html__('Icon', 'awesome'),
                        'description' => esc_html__('See list icon in -> http://astronautweb.co/snippet/font-awesome-icons-v4-2/', 'awesome')
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'items_title',
                        'heading'    => esc_html__('Title', 'awesome')
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'items_excerpt',
                        'heading'    => esc_html__('Excerpt', 'awesome')
                    )
                )
            )
        );

        return array(
            'name'        => esc_html__('Best deals', 'awesome'),
            'description' => esc_html__('Best deals Home', 'awesome'),
            'category'    => 'Home',
            'icon'        => $this->get_icon(),
            'params'      => $params
        );
    }
}
