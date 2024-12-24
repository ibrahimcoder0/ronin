<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = 'ronin_framework';
  
    //
    // Create options
    CSF::createOptions( $prefix, array(
      'menu_title' => 'Theme Options',
      'menu_slug'  => 'theme-optons',

    ) );
  
    //
    // Home Hero section
    CSF::createSection( $prefix, array(
      'title'  => 'Here Section',
      'fields' => array(
  
        //
        // Hero Title
        array(
          'id'    => 'hero_title',
          'type'  => 'text',
          'title' => 'Your Title Here',
          'default' => 'Title Here',
        ),
        //
        // Hero sub title
        array(
          'id'    => 'hero_subtitle',
          'type'  => 'text',
          'title' => 'Your Sub Title Here',
          'default' => 'Sub Title Here',
        ),
        //
        // Hero content
        array(
          'id'    => 'hero_content',
          'type'  => 'textarea',
          'title' => 'Your Sub Title Here',
          'default' => 'Contact Here',
        ),
        //
        // Hero Btn text
        array(
            'id'    => 'hero_btn_text',
            'type'  => 'text',
            'title' => 'Your BTN Text Here',
            'default' => 'BTN Text Here',
          ),
        //
        // Hero Btn Link
        array(
            'id'    => 'hero_btn_link',
            'type'  => 'text',
            'title' => 'Your BTN Link Here',
            'default' => '#',
          ),
        //
        // Hero Btn Link
        array(
            'id'                              => 'home_hero_btn_bg',
            'type'                            => 'background',
            'title'                           => 'Background',
            'background_gradient'             => true,
            'background_origin'               => true,
            'background_clip'                 => true,
            'background_blend_mode'           => true,
            'default'                         => array(
              'background-color'              => '#111',
              'background-gradient-color'     => '#555',
              'background-gradient-direction' => 'to bottom',
              'background-size'               => 'cover',
              'background-position'           => 'center center',
              'background-repeat'             => 'repeat',
            ),
            'output'                            => '.banner_btn',
          ),
          

        //
        // Hero Img
          array(
            'id'           => 'hero_img',
            'type'         => 'upload',
            'title'        => 'Upload Image',
            'library'      => 'image',
            'placeholder'  => 'http://',
            'button_title' => 'Add Image',
            'remove_title' => 'Remove Image',
            'preview'       => true
          ),
          
  
      )
    ) );
  
    //
    // Home About Section
    CSF::createSection( $prefix, array(
      'title'  => 'Home About Section',
      'fields' => array(
  
        // About Title
        array(
          'id'    => 'home_about_title',
          'type'  => 'text',
          'title' => 'Title Here',
          'default'=> 'About Myself'
        ),
        // About Contant
        array(
          'id'    => 'home_about_content',
          'type'  => 'textarea',
          'title' => 'Contact Here',
          'default'=> 'That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.'
        ),
        // 
        // About box Repeater
        array(
            'id'        => 'home_about_box_rep',
            'type'      => 'repeater',
            'title'     => 'About Box Rep',
            'fields'    => array(
          
              array(
                'id'    => 'home_about_rep_icon',
                'type'  => 'icon',
                'title' => 'Icon',
                'default' => 'fa fa-heart',
              ),
              array(
                'id'    => 'home_about_rep_title',
                'type'  => 'text',
                'title' => 'Title',
                'default'=> '$2.5M',
              ),
              array(
                'id'    => 'home_about_rep_content',
                'type'  => 'text',
                'title' => 'Content',
                'default'=> 'Total Donation',
              ),
          
            ),
            'default'   => array(
              array(
                'home_about_rep_icon' => 'fa fa-heart',
                'home_about_rep_title' => '$2.5M',
                'home_about_rep_content' => 'Total Donation',
              ),
            )
          ),


          // 
        // About skill Repeater
        array(
            'id'        => 'home_about_skill',
            'type'      => 'repeater',
            'title'     => 'About Skill Rep',
            'fields'    => array(
          
              array(
                'id'    => 'home_about_skill_title',
                'type'  => 'text',
                'title' => 'Title',
                'default'=> 'After Effects',
              ),
              array(
                'id'    => 'home_about_skill_number',
                'type'  => 'text',
                'title' => 'Number',
                'default'=> '85',
              ),
          
            ),
            'default'   => array(
              array(
                'home_about_skill_title' => 'After Effects',
                'home_about_skill_number' => '85',
              ),
            )
          ),
          
  
      )
    ) );

    // Section Title
    CSF::createSection( $prefix, array(
      'title'  => 'Section Title',
      'fields' => array(
        //
        // Service Title
        array(
          'id'    => 'service_title',
          'type'  => 'text',
          'title' => 'Service Title Here',
          'default' => 'Title Here',
        ),
        //
        // Service content
        array(
          'id'    => 'service_content',
          'type'  => 'textarea',
          'title' => 'Service Content Here',
          'default' => 'Contact Here',
        ),

        //
        // Portfolio Title
        array(
          'id'    => 'portfolio_title',
          'type'  => 'text',
          'title' => 'Portfolio Title Here',
          'default' => 'Title Here',
        ),
        //
        // Portfolio content
        array(
          'id'    => 'portfolio_content',
          'type'  => 'textarea',
          'title' => 'Portfolio Content Here',
          'default' => 'Contact Here',
        ),

        //
        // Testimonial Title
        array(
          'id'    => 'testimonail_title',
          'type'  => 'text',
          'title' => 'Testimonail Title Here',
          'default' => 'Title Here',
        ),
        //
        // Testimonail content
        array(
          'id'    => 'testimonail_content',
          'type'  => 'textarea',
          'title' => 'Testimonail Content Here',
          'default' => 'Contact Here',
        ),

        //
        // Blog Title
        array(
          'id'    => 'blog_title',
          'type'  => 'text',
          'title' => 'Blog Title Here',
          'default' => 'Title Here',
        ),
        //
        // Blog content
        array(
          'id'    => 'blog_content',
          'type'  => 'textarea',
          'title' => 'Blog Content Here',
          'default' => 'Contact Here',
        ),

          
      )
    ) );
  
    //
    // Home Contact Section
    CSF::createSection( $prefix, array(
      'title'  => 'Home Contact Section',
      'fields' => array(
  
        // 
        // Contct box Repeater
        array(
            'id'        => 'home_contact_box_rep',
            'type'      => 'repeater',
            'title'     => 'Contact Box Rep',
            'fields'    => array(
          
              array(
                'id'    => 'home_contact_rep_icon',
                'type'  => 'icon',
                'title' => 'Icon',
                'default' => 'fa fa-heart',
              ),
              array(
                'id'    => 'home_contact_rep_title',
                'type'  => 'text',
                'title' => 'Title',
                'default'=> 'Title',
              ),
              array(
                'id'    => 'home_contact_rep_content',
                'type'  => 'text',
                'title' => 'Content',
                'default'=> 'Content',
              ),
          
            ),
            'default'   => array(
              array(
                'home_contact_rep_icon' => 'fa fa-heart',
                'home_contact_rep_title' => 'Title',
                'home_contact_rep_content' => 'Content',
              ),
            )
          ),

      )
    ) );


        // Create a section
        CSF::createSection( $prefix, array(
            'title'  => 'Globar Colors',
            'fields' => array(
        
            // Output for multiple element
            array(
                'id'     => 'all_body_p_color',
                'type'   => 'color',
                'title'  => 'Body Color',
                'output' => array( 'p', 'span', 'strong' )
            ),
            // Output for multiple element
            array(
                'id'     => 'all_headding_color',
                'type'   => 'color',
                'title'  => 'Headding Color',
                'output' => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' )
            ),
            // Output for multiple element
          
            
            
            array(
              'id'      => 'opt-typography-3',
              'type'    => 'typography',
              'title'   => 'Typography',
              'output'  => 'body p',
              'default' => array(
                'color'          => '#ffbc00',
                'font-family'    => 'Barlow',
                'font-size'      => '16',
                'line-height'    => '20',
                'letter-spacing' => '-1',
                'text-align'     => 'center',
                'text-transform' => 'uppercase',
                'subset'         => 'latin-ext',
                'type'           => 'google',
                'unit'           => 'px',
              ),
            ),
            

    
            )
          ) );
  
  }
  