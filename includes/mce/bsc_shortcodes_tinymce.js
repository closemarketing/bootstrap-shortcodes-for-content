(function() {
	tinymce.PluginManager.add( 'bsc_mce_button', function( editor, url ) {
		editor.addButton( 'bsc_mce_button', {
			title: 'Bootstrap Shortcodes',
			type: 'menubutton',
			icon: 'mce-ico mce-i-visualchars',
			menu: [


		/** Columns **/
		{
			text: editor.getLang( 'bsc_mce_button.columns' ),
			menu: [

				/* Columns */
				{
					text: editor.getLang( 'bsc_mce_button.twocolumns' ),
					onclick: function() {
						editor.insertContent( '[row]<br />[column sm="6"]<br />...<br />[/column]<br />[column sm="6"]<br />...<br />[/column]<br />[/row]<br />');
					}
				}, // End Columns

				/* Columns */
				{
					text: editor.getLang( 'bsc_mce_button.threecolumns' ),
					onclick: function() {
						editor.insertContent( '[row]<br />[column sm="4"]<br />...<br />[/column]<br />[column sm="4"]<br />...<br />[/column]<br />[column sm="4"]<br />...<br />[/column]<br />[/row]<br />');
					}
				}, // End Columns

				/* Columns */
				{
					text: editor.getLang( 'bsc_mce_button.fourcolumns' ),
					onclick: function() {
						editor.insertContent( '[row]<br />[column sm="3"]<br />...<br />[/column]<br />[column sm="3"]<br />...<br />[/column]<br />[column sm="3"]<br />...<br />[/column]<br />[column sm="3"]<br />...<br />[/column]<br />[/row]<br />');
					}
				}, // End Columns


			]
		}, // End Columns Section


		/** Icons **/
		{
			text: editor.getLang( 'bsc_mce_button.icons' ),
			menu: [

				/* Icon */
				{
					text: editor.getLang( 'bsc_mce_button.icon' ),
					onclick: function() {
						editor.insertContent( '[icon icon="spinner" size="2x" spin="yes" border="yes" muted="yes" align="left" rotate="180" flip="vertical"][/icon]');
					}
				}, // End Icon

				/* Icon Stacked
				{
					text: 'Icon Stacked',
					onclick: function() {
						editor.insertContent( '[iconstack icon="check-empty" top="twitter"][/iconstack]');
					}
				}, // End Icon Stacked

				/* Icon List
				{
					text: 'Icon List',
					onclick: function() {
						editor.insertContent( '[bsc_iconlist]<br />[bsc_iconitem icon="youtube"]YouTube[/bsc_iconitem]<br />[bsc_iconitem icon="facebook"]Facebook[/bsc_iconitem]<br />[bsc_iconitem icon="twitter"]Twitter[/bsc_iconitem]<br />[/bsc_iconlist]');
					}
				}, // End Icon List */

			]
		}, // End Icons Section


		/** Popover **/
		{
			text: editor.getLang( 'bsc_mce_button.popovers' ),
			menu: [

				/* Popover */
				{
					text: editor.getLang( 'bsc_mce_button.popover' ),
					onclick: function() {
						editor.insertContent( '[bsc_popover placement="top" popcontent="Content in Popover" title="Title in Popover"]Click this text for Popover[/bsc_popover]');
					}
				}, // End Popover

				/* Button Popover */
				{
					text: editor.getLang( 'bsc_mce_button.buttonpopover' ),
					onclick: function() {
						editor.insertContent( '[bsc_button color="primary" size="lg" popplacement="top" poptitle="Title" popcontent="Content of popover"]Button Text[/bsc_button]');
					}
				}, // End Popover

			]
		}, // End Popovers Section


		/** Buttons **/
		{
			text: editor.getLang( 'bsc_mce_button.buttons' ),
			menu: [

				/* Buttons */
				{
					text: editor.getLang( 'bsc_mce_button.button' ),
					onclick: function() {
						editor.windowManager.open( {
							title: editor.getLang( 'bsc_mce_button.buttoninsert' ),
							body: [

							// Button Text
							{
								type: 'textbox',
								name: 'buttonText',
								label: editor.getLang( 'bsc_mce_button.buttontext' ),
								value: editor.getLang( 'bsc_mce_button.buttondownload' )
							},

							// Button URL
							{
								type: 'textbox',
								name: 'buttonUrl',
								label: editor.getLang( 'bsc_mce_button.buttonurl' ),
								value: 'http://www.#.com/'
							},

							// Button Color
							{
								type: 'listbox',
								name: 'buttonColor',
								label: editor.getLang( 'bsc_mce_button.buttoncolor' ),
								'values': [
									{text: editor.getLang( 'bsc_mce_button.buttondef' ), value: 'default'},
									{text: editor.getLang( 'bsc_mce_button.buttonprim' ), value: 'primary'},
									{text: editor.getLang( 'bsc_mce_button.buttonsucc' ), value: 'success'},
									{text: editor.getLang( 'bsc_mce_button.buttoninfo' ), value: 'info'},
									{text: editor.getLang( 'bsc_mce_button.buttonwarn' ), value: 'warning'},
									{text: editor.getLang( 'bsc_mce_button.buttondanger' ), value: 'danger'},
									{text: editor.getLang( 'bsc_mce_button.buttonlink' ), value: 'link'}
								]
							},

							// Button Size
							{
								type: 'listbox',
								name: 'buttonSize',
								label: editor.getLang( 'bsc_mce_button.buttonsize' ),
								'values': [
									{text: editor.getLang( 'bsc_mce_button.def' ), value: ''},
									{text: editor.getLang( 'bsc_mce_button.xs' ), value: 'xs'},
									{text: editor.getLang( 'bsc_mce_button.sm' ), value: 'sm'},
									{text: editor.getLang( 'bsc_mce_button.large' ), value: 'lg'}
								]
							},

							// Button Link Target
							{
								type: 'listbox',
								name: 'buttonLinkTarget',
								label: editor.getLang( 'bsc_mce_button.buttonlinkt' ),
								'values': [
									{text: editor.getLang( 'bsc_mce_button.self' ), value: '_self'},
									{text: editor.getLang( 'bsc_mce_button.neww' ), value: '_blank'}
								]
							},

							// Button Rel
							{
								type: 'listbox',
								name: 'buttonRel',
								label: editor.getLang( 'bsc_mce_button.buttonrel' ),
								'values': [
									{text: editor.getLang( 'bsc_mce_button.bnone' ), value: ''},
									{text: editor.getLang( 'bsc_mce_button.nof' ), value: 'nofollow'}
								]
							},

							// Button XClass
							{
								type: 'textbox',
								name: 'buttonxclass',
								label: editor.getLang( 'bsc_mce_button.xclass' ),
								value: ''
							},

						 ],
							onsubmit: function( e ) {
								editor.insertContent( '[button link="' + e.data.buttonUrl + '" type="' + e.data.buttonColor + '" size="' + e.data.buttonSize + '" target="' + e.data.buttonLinkTarget + '" rel="' + e.data.buttonRel + '" xclass="' + e.data.buttonxclass + '"]' + e.data.buttonText + '[/button]');
							}
						});
					}
				}, // End button

				/* Button Dropdown */
				{
					text: editor.getLang( 'bsc_mce_button.buttondropdown' ),
					onclick: function() {
						editor.insertContent( '[button-group]<br />[button link="#" dropdown="true" data="toggle,dropdown"]<br /> ... <br />[caret][/button]<br />[dropdown]<br />[dropdown-header]<br /> ... <br />[/dropdown-header]<br />[dropdown-item link="#"]<br />... <br />[/dropdown-item]<br />[dropdown-item link="#"]<br /> ... <br />[/dropdown-item]<br />[dropdown-item link="#"]<br /> ... <br />[/dropdown-item]<br />[divider]<br />[dropdown-item link="#"]<br /> ... <br />[/dropdown-item]<br />[/dropdown]<br />[/button-group]');
					}
				}, // End Button Dropdown

				/* Button Split Dropdown */
				{
					text: editor.getLang( 'bsc_mce_button.buttonsdropdown' ),
					onclick: function() {
						editor.insertContent( '[button-group]<br />[button link="#"]<br /> ... <br />[/button]<br />[button dropdown="true" data="toggle,dropdown"][caret][/button]<br />[dropdown]<br />   [dropdown-item link="#"]<br /> ... <br />[/dropdown-item]<br />[divider]<br />[dropdown-item link="#"]<br /> ... <br />[/dropdown-item]<br />[/dropdown]<br />[/button-group]');
					}
				}, // Button Split Dropdown

				/* Button Group */
				{
					text: editor.getLang( 'bsc_mce_button.buttongroup' ),
					onclick: function() {
						editor.insertContent( '[button-group size="lg" justified="" vertical=""]<br />[button link="#"]<br />...<br />[/button]<br />[button link="#"]<br />...<br />[/button]<br />[button link="#"]<br />...<br />[/button]<br />[/button-group]');
					}
				}, // Button Group

				/* Vertical Button Group *
				{
					text: 'Vertical Button Group',
					onclick: function() {
						editor.insertContent( '[bsc_button_group_vertical size="xs" ]<br />[bsc_button color="primary" url="http://#.com/" title="Visit Site" target="blank"]Button Text[/bsc_button][bsc_button color="danger" url="http://#.com/" title="Visit Site" target="blank"]Button Text[/bsc_button]<br />[/bsc_button_group_vertical]');
					}
				}, // Vertical Button Group */

			]
		}, // End Buttons Section


		/** Tabs and Toggles **/
		{
		text: editor.getLang( 'bsc_mce_button.tabstoogles' ),
		menu: [

				/* Bootstrap Accordion */
				{
					text: editor.getLang( 'bsc_mce_button.tabaccordion' ),
					onclick: function() {
						editor.insertContent( '[collapsibles]<br />[collapse title="Collapse 1" active="true"]<br />...<br />[/collapse]<br />[collapse title="Collapse 2"]<br />...<br />[/collapse]<br />[collapse title="Collapse 3"]<br />...<br />[/collapse]<br />[/collapsibles]');
					}
				}, // End bootstrap accordion

				/* Tabs */
				{
					text: editor.getLang( 'bsc_mce_button.tabs' ),
					onclick: function() {
						editor.insertContent( '[tabs type="tabs"]<br />[tab title="Home" active="true"]<br />...<br />[/tab]<br />[tab title="Profile"]<br />...<br />[/tab]<br />[tab title="Messages"]<br />...<br />[/tab]<br />[/tabs]');
					}
				}, // End tabs

			]
		}, // End Tabs and Toggles section



		/** Tooltips **/
		{
		text: editor.getLang( 'bsc_mce_button.tool' ),
		menu: [

				/* Tooltip *
				{
					text: 'Tooltip',
					onclick: function() {
						editor.insertContent( '[bsc_tooltip text="Text in tooltip" placement="top"]Link for tooltip[/bsc_tooltip]');
					}
				}, // End Tooltip

				/* Button Tooltip *
				{
					text: 'Button Tooltip',
					onclick: function() {
						editor.insertContent( '[bsc_tooltip text="Text in tooltip" placement="top" color="primary" size="lg"]Link for tooltip[/bsc_tooltip]');
					}
				}, // End Button Tooltip */

			]
		}, // End tooltip section


		/** Popover **/
		{
			text: editor.getLang( 'bsc_mce_button.progress' ),
			menu: [

				/* Single Progress Bar
				{
					text: 'Single Progress Bar',
					onclick: function() {
						editor.insertContent( '[bsc_progress_bar style="success" strip="yes" animate="yes" width="20"][/bsc_progress_bar]');
					}
				}, // End Single Progress Bar

				/* Progress Bar - Stacked *
				{
					text: 'Progress Bar - Stacked',
					onclick: function() {
						editor.insertContent( '[bsc_stacked_progress_bar]<br />[bsc_single_stacked_bar style="success" width="20"][/bsc_single_stacked_bar]<br />[bsc_single_stacked_bar style="warning" width="30"][/bsc_single_stacked_bar]<br />[bsc_single_stacked_bar style="danger" width="30"][/bsc_single_stacked_bar]<br />[/bsc_stacked_progress_bar]');
					}
				}, // End Progress Bar - Stacked */

			]
		}, // End Popovers Section


		/** Bootstrap Components **/
		{
			text: editor.getLang( 'bsc_mce_button.boot' ),
			menu: [

				/* Alert */
				{
					text: 'Alert',
					onclick: function() {
						editor.insertContent( '[alert type="success"] ... [/alert]');
					}
				}, // End Alert

				/* Badge*
				{
					text: 'Badge',
					onclick: function() {
						editor.insertContent( '[bsc_badge]Label[/bsc_badge]');
					}
				}, // End Badge

				/* Carousel *
				{
					text: 'Carousel',
					onclick: function() {
						editor.insertContent( '[bsc_carousel name="ExampleCarousel"]<br />[bsc_carousel_image first="yes" title="Image Title" caption="Caption example text" link="http://domain.com/images/pic.jpg"]<br />[bsc_carousel_image title="Second Image Title" caption="Caption for second image" link="http://domain.com/images/pic.jpg"]<br />[bsc_carousel_image title="Third Image Title" caption="Caption for third image" link="http://domain.com/images/pic.jpg"]<br />[/bsc_carousel] ');
					}
				}, // End Carousel

				/* Jumotron */
				{
					text: editor.getLang( 'bsc_mce_button.jumbo' ),
					onclick: function() {
						editor.insertContent( '[jumbotron title="My Jumbotron"]Content of the Jumbotron <br />[bsc_button color="primary" size="lg" url="http://#.com/" title="Visit Site" target="blank"]Button Text[/bsc_button][/jumbotron]');
					}
				}, // End Jumotron

				/* Label *
				{
					text: 'Label',
					onclick: function() {
						editor.insertContent( '[bsc_label color="warning"]Label[/bsc_label]');
					}
				}, // End Label

				/* Modal *
				{
					text: 'Modal',
					onclick: function() {
						editor.insertContent( '[bsc_modal id="1" header="Title of Modal" color="danger" size="lg" msize="modal-sm" text="Click Here"]Here is he content[/bsc_modal]');
					}
				}, // End Modal

				/* Panel *
				{
					text: 'Panel',
					onclick: function() {
						editor.insertContent( '[bsc_panel color="primary" title="Title of Panel" footer="Panel Footer"]Here is the content of the panel[/bsc_panel]');
					}
				}, // End Panel

				/* Table *
				{
					text: 'Table',
					onclick: function() {
						editor.insertContent( '[bsc_table strip="yes" border="yes" condense="yes" hover="yes" cols="names,values" data="name1,25,name2,409"][/bsc_table]');
					}
				}, // End Table

				/* Well *
				{
					text: 'Well',
					onclick: function() {
						editor.insertContent( '[bsc_well width="50%"]Your Well Content[/bsc_well]');
					}
				}, // End Well*/

			]
		}, // End Bootstrap Components Section


		/** Content **/
		{
		text: editor.getLang( 'bsc_mce_button.content' ),
		menu: [


            /* Gridbox */
            {
                text: 'Gridbox',
                onclick: function() {
                    editor.windowManager.open( {
                        title: editor.getLang( 'bsc_mce_button.contentgridbox' ),
                        body: [

                        // Post Type
                        {
                            type: 'textbox',
                            name: 'gridpost_type',
                            label: editor.getLang( 'bsc_mce_button.pname' ),
                            value: 'page'
                        },

                        // Posts per Page
                        {
                            type: 'textbox',
                            name: 'gridposts_per_page',
                            label: editor.getLang( 'bsc_mce_button.posts' ),
                            value: '-1'
                        },

                        // Columns
                        {
                            type: 'listbox',
                            name: 'gridcol',
                            label: editor.getLang( 'bsc_mce_button.col' ),
                            'values': [
                                {text: editor.getLang( 'bsc_mce_button.column4' ), value: '4'},
                                {text: editor.getLang( 'bsc_mce_button.column3' ), value: '3'},
                                {text: editor.getLang( 'bsc_mce_button.column2' ), value: '2'},
                                {text: editor.getLang( 'bsc_mce_button.column6' ), value: '6'},
                                {text: editor.getLang( 'bsc_mce_button.column12' ), value: '12'}
                            ]
                        },

                        // Button Include date
                        {
                            type: 'listbox',
                            name: 'griddate',
                            label: editor.getLang( 'bsc_mce_button.idate' ),
                            'values': [
                                {text: 'No', value: 'false'},
                                {text: 'Yes', value: 'true'}
                            ]
                        },

                        // Image size
                        {
                            type: 'textbox',
                            name: 'gridimagesize',
                            label: editor.getLang( 'bsc_mce_button.isize' ),
                            value: 'thumbnail'
                        },

                     ],
                        onsubmit: function( e ) {
                            editor.insertContent( '[gridbox post_type="' + e.data.gridpost_type + '" posts_per_page="' + e.data.gridposts_per_page + '" col="' + e.data.gridcol + '" date="' + e.data.griddate + '" size="' + e.data.gridimagesize + '"]');
                        }
                    });
                }
            }, // End gridbox


            /* Gridtaxbox */
            {
                text: 'Gridtaxbox',
                onclick: function() {
                    editor.windowManager.open( {
                        title: 'Insert Gridbox for Taxonomy',
                        body: [

                        // Post Type
                        {
                            type: 'textbox',
                            name: 'gridtax',
                            label: 'Taxonomy Name',
                            value: 'category'
                        },

                        // Posts per Page
                        {
                            type: 'textbox',
                            name: 'gridposts_per_page',
                            label: editor.getLang( 'bsc_mce_button.posts' ),
                            value: '-1'
                        },

                        // Columns
                        {
                            type: 'listbox',
                            name: 'gridcol',
                            label: editor.getLang( 'bsc_mce_button.col' ),
                            'values': [
                                {text: editor.getLang( 'bsc_mce_button.column4' ), value: '4'},
                                {text: editor.getLang( 'bsc_mce_button.column3' ), value: '3'},
                                {text: editor.getLang( 'bsc_mce_button.column2' ), value: '2'},
                                {text: editor.getLang( 'bsc_mce_button.column6' ), value: '6'},
                                {text: editor.getLang( 'bsc_mce_button.column12' ), value: '12'}
                            ]
                        },

                        // Title included?
                        {
                            type: 'listbox',
                            name: 'gridtaxtitle',
                            label: editor.getLang( 'bsc_mce_button.itaxtitle' ),
                            'values': [
                                {text: 'No', value: 'false'},
                                {text: 'Yes', value: 'true'}
                            ]
                        },

                        // Image size
                        {
                            type: 'textbox',
                            name: 'gridimagesize',
                            label: editor.getLang( 'bsc_mce_button.isize' ),
                            value: 'thumbnail'
                        },

                     ],
                        onsubmit: function( e ) {
                            editor.insertContent( '[gridtaxbox tax="' + e.data.gridtax + '" posts_per_page="' + e.data.gridposts_per_page + '" col="' + e.data.gridcol + '" title="' + e.data.gridtaxtitle + '" size="' + e.data.gridimagesize + '"]');
                        }
                    });
                }
            }, // End gridtaxbox


            /* Carousel CPT */
            {
                text: editor.getLang( 'bsc_mce_button.content_carousel' ),
                onclick: function() {
                    editor.windowManager.open( {
                        title: editor.getLang( 'bsc_mce_button.cardesc' ),
                        body: [

                        // Post Type
                        {
                            type: 'textbox',
                            name: 'carcpt',
                            label: editor.getLang( 'bsc_mce_button.carslug' ),
                            value: 'page'
                        },

                        // Taxonomy
                        {
                            type: 'textbox',
                            name: 'cartax',
                            label: editor.getLang( 'bsc_mce_button.cartax' ),
                            value: ''
                        },

                        // Title
                        {
                            type: 'textbox',
                            name: 'cartitle',
                            label: editor.getLang( 'bsc_mce_button.cartit' ),
                            value: ''
                        },

                        // Columns
                        {
                            type: 'listbox',
                            name: 'carcol',
                            label: editor.getLang( 'bsc_mce_button.carel' ),
                            'values': [
                                {text: editor.getLang( 'bsc_mce_button.column4' ), value: '4'},
                                {text: editor.getLang( 'bsc_mce_button.column3' ), value: '3'},
                                {text: editor.getLang( 'bsc_mce_button.column2' ), value: '2'},
                                {text: editor.getLang( 'bsc_mce_button.column6' ), value: '6'},
                                {text: editor.getLang( 'bsc_mce_button.column12' ), value: '12'}
                            ]
                        },

                        // Type
                        {
                            type: 'listbox',
                            name: 'cartype',
                            label: editor.getLang( 'bsc_mce_button.cartyp' ),
                            'values': [
                                {text: editor.getLang( 'bsc_mce_button.post' ), value: 'post'},
                                {text: editor.getLang( 'bsc_mce_button.tax' ), value: 'tax'}
                            ]
                        },

                        // Title included?
                        {
                            type: 'listbox',
                            name: 'cartitlep',
                            label: editor.getLang( 'bsc_mce_button.carshow' ),
                            'values': [
                                {text: editor.getLang( 'bsc_mce_button.no' ), value: 'false'},
                                {text: editor.getLang( 'bsc_mce_button.yes' ), value: 'true'}
                            ]
                        },

                     ],
                        onsubmit: function( e ) {
                            editor.insertContent( '[carouselcpt post_type="' + e.data.carcpt + '" tax="' + e.data.cartax + '" title="' + e.data.cartitle + '" type="' + e.data.cartype + '" col="' + e.data.carcol + '" titlep="' + e.data.cartitlep + '"]');
                        }
                    });
                }
            }, // End carousel cpt


            /* Image Post Slider */
            {
                text: editor.getLang( 'bsc_mce_button.content_imgslider' ),
                onclick: function() {
                    editor.insertContent( '[imagepostslider]');
                }
            }, // Image Post Slider

			/* Image Scroll */
            {
                text: editor.getLang( 'bsc_mce_button.imgscroll' ),
                onclick: function() {
                    editor.windowManager.open( {
                        title: editor.getLang( 'bsc_mce_button.imgscroll_desc' ),
                        body: [

                        // Image size
                        {
                            type: 'textbox',
                            name: 'gridimagesize',
                            label: editor.getLang( 'bsc_mce_button.isize' ),
                            value: 'thumbnail'
                        },

                     ],
                        onsubmit: function( e ) {
                            editor.insertContent( '[image-scroll size="' + e.data.gridimagesize + '"]');
                        }
                    });
                }
            }, // End image scroll

            /* Links */
            {
                text: editor.getLang( 'bsc_mce_button.content_links' ),
                onclick: function() {
                    editor.insertContent( '[links]');
                }
            }, // Links
			]
		} // End content section

			]
		});
	});
})();
