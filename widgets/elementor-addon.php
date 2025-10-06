<?php

class Elementor_Test_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'test_widget';
    }

    public function get_title()
    {
        return esc_html__('Test Widget', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-favorite';
    }

    public function get_categories()
    {
        return ['elementor-addon-category'];
    }

    public function get_keywords()
    {
        return ['test', 'heading'];
    }

    public function get_custom_help_url()
    {
        return 'https://example.com/widget-name';
    }

    protected function get_upsale_data()
    {
        return [];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => esc_html__('Title', 'elementor-addon'),
                'placeholder' => esc_html__('Enter your title', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'size',
            [
                'type' => \Elementor\Controls_Manager::NUMBER,
                'label' => esc_html__('Size', 'elementor-addon'),
                'placeholder' => '0',
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 50,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Style', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color',
            [
                'label' => esc_html__('Color', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f00',
                'selectors' => [
                    '{{WRAPPER}} h3' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if (empty($settings['title'])) {
            return;
        }
        ?>
        <h3>
            <?php echo $settings['title']; ?>
        </h3>
        <?php
    }

}