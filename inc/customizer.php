<?php
function test_wp_eduhub_html_customize_register($wp_customize){
    $wp_customize->add_section( 'email_section', array(
        'title'    => esc_html__( 'Email settings', 'test_wp_eduhub_html' ),
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'email_ua', array(
        'default'   => esc_html__( 'Email Ua', 'test_wp_eduhub_html' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control(
        'email_ua',
        array(
            'label'    => esc_html__( 'Email Ua', 'test_wp_eduhub_html' ),
            'section'  => 'email_section',
            'settings' => 'email_ua',
            'type'     => 'text',
        ) );

    $wp_customize->add_setting( 'email_blr', array(
        'default'   => esc_html__( 'Email Blr', 'test_wp_eduhub_html' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control(
        'email_blr',
        array(
            'label'    => esc_html__( 'Email Blr', 'test_wp_eduhub_html' ),
            'section'  => 'email_section',
            'settings' => 'email_blr',
            'type'     => 'text',
        ) );


}
add_action( 'customize_register', 'test_wp_eduhub_html_customize_register' );