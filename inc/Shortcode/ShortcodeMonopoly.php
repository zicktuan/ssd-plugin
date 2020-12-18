<?php
namespace Awesome\Shortcode;

class ShortcodeMonopoly extends AbstractShortcode
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
        return 'mayxaydung_monopoly';
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
        include $this->parent->locateTemplate('shortcode-monopoly.tpl.php');
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
                'type'       => 'textfield',
                'param_name' => 'title_text',
                'heading'    => esc_html__('Title', 'MXD')
            ),
            array(
                'type'       => 'param_group',
                'param_name' => 'items',
                'heading'    => esc_html__( 'List slide', 'MXD' ),
                'params'     => array(
                    array(
                        'type'       => 'attach_image',
                        'param_name' => 'items_image',
                        'heading'    => esc_html__('Image', 'MXD')
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
            'name'        => esc_html__('Monopoly', 'MXD'),
            'description' => esc_html__('Monopoly', 'MXD'),
            'category'    => $this->get_category(),
            'icon'        => $this->get_icon(),
            'params'      => $params
        );
    }
}
