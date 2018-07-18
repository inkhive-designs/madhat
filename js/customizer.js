/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	wp.customize( 'madhat_content_site_title_fontsize_set', function( value ) {
		value.bind( function( to ) {
			$( '.site-title' ).css( 'font-size', to + 'px' );
		} );
	} );

	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	wp.customize( 'madhat_content_site_desc_fontsize_set', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).css( 'font-size', to + 'px' );
		} );
	} );

	//Fonts
    wp.customize( 'madhat_title_font', function( value ) {
        value.bind( function( to ) {
            $( '.title-font, h1, h2, .section-title, #top-menu a, #site-navigation a' ).css( 'font-family', to );
        } );
    } );
    wp.customize( 'madhat_body_font', function( value ) {
        value.bind( function( to ) {
            $( 'body' ).css( 'font-family', to );
        } );
    } );

	//Header Settings
	wp.customize('madhat_hide_title_tagline', function( value ) {
		value.bind(function( to ) {
			$('#text-title-desc').toggle();
		});
	});

    wp.customize( 'madhat_branding_below_logo', function ( value ) {
        value.bind( function ( to ) {
            if(to == true ) {
                $( '#text-title-desc' ).css({
                    'display' : 'inline',
                });
            }
            else {
                $( '#text-title-desc' ).css( {
                    'display' : 'inline-block',
                    'text-align' : 'left',
                });
            }
        });
    } );
    wp.customize( 'madhat_center_logo', function ( value ) {
        value.bind( function ( to ) {
            if( to == true ) {
                $( '.site-branding' ).css('text-align', 'center' );
                $( '#text-title-desc' ).css('text-align', 'center' );
            }
            else {
                $( '.site-branding' ).css('text-align', 'left' );
                $( '#text-title-desc' ).css('text-align', 'left' );
            }
        });
    } );


    //Social Icons
    wp.customize( 'madhat_social_icon_style_set', function( value ) {
        value.bind( function( to ) {
            var	ChangeClass	=	'social-style ' + to;
            $( '#social-icons a' ).attr( 'class', ChangeClass );
        });
    });

    wp.customize( 'madhat_social_1', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('#social-icons' ).find( 'i:eq(0)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'madhat_social_2', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('#social-icons' ).find( 'i:eq(1)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'madhat_social_3', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('#social-icons' ).find( 'i:eq(2)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'madhat_social_4', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('#social-icons' ).find( 'i:eq(3)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'madhat_social_5', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('#social-icons' ).find( 'i:eq(4)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'madhat_social_6', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('#social-icons' ).find( 'i:eq(5)' ).attr( 'class', ClassNew );
        });
    });

    wp.customize( 'madhat_social_7', function( value ) {
        value.bind( function( to ) {
            var ClassNew	=	'fa fa-' + to;
            jQuery('#social-icons' ).find( 'i:eq(6)' ).attr( 'class', ClassNew );
        });
    });

    //Featured Areas
    wp.customize('madhat_box_enable', function( value ) {
        value.bind(function( to ) {
            $('#featured-area-skew').toggle();
        });
    });
    wp.customize( 'madhat_box_title', function( value ) {
        value.bind( function( to ) {
            $( '#featured-area-skew .section-title' ).text( to );
        } );
    } );

    wp.customize('madhat_fa2_enable', function( value ) {
        value.bind(function( to ) {
            $('#featured-area-2').toggle();
        });
    });
    wp.customize( 'madhat_fa2_title', function( value ) {
        value.bind( function( to ) {
            $( '#featured-area-2 .section-title' ).text( to );
        } );
    } );

    //Design & Layouts
	//Colors
    wp.customize( 'madhat_site_titlecolor', function( value ) {
        value.bind( function( to ) {
            $( '.site-title a' ).css( 'color', to );
        } );
    } );
    wp.customize( 'madhat_header_desccolor', function( value ) {
        value.bind( function( to ) {
            $( '.site-description' ).css( 'color', to );
        } );
    } );

    //Content Font Size Set
    wp.customize( 'madhat_content_fontsize_set', function( value ) {
        value.bind( function( to ) {
            $( '#primary-mono .entry-content' ).css( 'font-size', to );
        } );
    } );

    //Footer
    wp.customize( 'madhat_footer_text', function( value ) {
        value.bind( function( to ) {
            $( '.sep' ).text( to );
        } );
    } );

} )( jQuery );
