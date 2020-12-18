<?php
namespace Awesome\Shortcode;

class ShortcodeSlider extends AbstractShortcode
{
    public function __construct($self = null) {
        $this->parent = $self;
        add_shortcode($this->get_name(), array($this, 'render'));
        vc_lean_map($this->get_name(), array($this, 'map'));
    }

    /**
     * 
     * Get shortcode name.
     *
     * @return string
     */
    public function get_name() {
        return 'mayxaydung_slider';
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

        $listItems =  explode(",", $atts['items_image']) ;

        ob_start();
        include $this->parent->locateTemplate('shortcode-slider.tpl.php');
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
                'type'       => 'attach_images',
                'param_name' => 'items_image',
                'heading'    => esc_html__( 'Image', 'MXD' ),
            )
        );

        return array(
            'name'        => esc_html__('Slider', 'MXD'),
            'description' => esc_html__('Slider', 'MXD'),
            'category'    => $this->get_category(),
            'icon'        => $this->get_icon(),
            'params'      => $params
        );
    }
}
