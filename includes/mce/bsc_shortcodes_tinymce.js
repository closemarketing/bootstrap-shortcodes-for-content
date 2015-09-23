(function() {
	tinymce.PluginManager.add( 'bsc_mce_button', function( editor, url ) {
		editor.addButton( 'bsc_mce_button', {
			title: 'Bootstrap Shortcodes',
			type: 'menubutton',
			icon: 'mce-ico mce-i-visualchars',
			menu: [


		/** Columns **/
		{
			text: 'Columns',
			menu: [

				/* Columns */
				{
					text: 'Two Columns',
					onclick: function() {
						editor.insertContent( '[row]<br />[column sm="6"]<br />...<br />[/column]<br />[column sm="6"]<br />...<br />[/column]<br />[/row]<br />');
					}
				}, // End Columns

				/* Columns */
				{
					text: 'Three Columns',
					onclick: function() {
						editor.insertContent( '[row]<br />[column sm="4"]<br />...<br />[/column]<br />[column sm="4"]<br />...<br />[/column]<br />[column sm="4"]<br />...<br />[/column]<br />[/row]<br />');
					}
				}, // End Columns

				/* Columns */
				{
					text: 'Four Columns',
					onclick: function() {
						editor.insertContent( '[row]<br />[column sm="3"]<br />...<br />[/column]<br />[column sm="3"]<br />...<br />[/column]<br />[column sm="3"]<br />...<br />[/column]<br />[column sm="3"]<br />...<br />[/column]<br />[/row]<br />');
					}
				}, // End Columns


			]
		}, // End Columns Section


		/** Icons **/
		{
			text: 'Icons',
			menu: [

				/* Icon */
				{
					text: 'Icon',
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
			text: 'Popovers',
			menu: [

				/* Popover */
				{
					text: 'Popover',
					onclick: function() {
						editor.insertContent( '[bsc_popover placement="top" popcontent="Content in Popover" title="Title in Popover"]Click this text for Popover[/bsc_popover]');
					}
				}, // End Popover

				/* Button Popover */
				{
					text: 'Button Popover',
					onclick: function() {
						editor.insertContent( '[bsc_button color="primary" size="lg" popplacement="top" poptitle="Title" popcontent="Content of popover"]Button Text[/bsc_button]');
					}
				}, // End Popover

			]
		}, // End Popovers Section


		/** Buttons **/
		{
			text: 'Buttons',
			menu: [

				/* Buttons */
				{
					text: 'Button',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Insert Button',
							body: [

							// Button Text
							{
								type: 'textbox',
								name: 'buttonText',
								label: 'Button: Text',
								value: 'Download'
							},

							// Button URL
							{
								type: 'textbox',
								name: 'buttonUrl',
								label: 'Button: URL',
								value: 'http://www.#.com/'
							},

							// Button Color
							{
								type: 'listbox',
								name: 'buttonColor',
								label: 'Button: Color',
								'values': [
									{text: 'Default', value: 'default'},
									{text: 'Primary', value: 'primary'},
									{text: 'Success', value: 'success'},
									{text: 'Info', value: 'info'},
									{text: 'Warning', value: 'warning'},
									{text: 'Danger', value: 'danger'},
									{text: 'Link', value: 'link'}
								]
							},

							// Button Size
							{
								type: 'listbox',
								name: 'buttonSize',
								label: 'Button: Size',
								'values': [
									{text: 'Default', value: ''},
									{text: 'Extra Small', value: 'xs'},
									{text: 'Small', value: 'sm'},
									{text: 'Large', value: 'lg'}
								]
							},

							// Button Link Target
							{
								type: 'listbox',
								name: 'buttonLinkTarget',
								label: 'Button: Link Target',
								'values': [
									{text: 'Self', value: 'self'},
									{text: 'Blank', value: 'blank'}
								]
							},

							// Button Rel
							{
								type: 'listbox',
								name: 'buttonRel',
								label: 'Button: Rel',
								'values': [
									{text: 'None', value: ''},
									{text: 'Nofollow', value: 'nofollow'}
								]
							},

						 ],
							onsubmit: function( e ) {
								editor.insertContent( '[button url="' + e.data.buttonUrl + '" color="' + e.data.buttonColor + '" size="' + e.data.buttonSize + '" target="' + e.data.buttonLinkTarget + '" rel="' + e.data.buttonRel + '"]' + e.data.buttonText + '[/button]');
							}
						});
					}
				}, // End button

				/* Button Dropdown */
				{
					text: 'Button Dropdown',
					onclick: function() {
						editor.insertContent( '[button-group]<br />[button link="#" dropdown="true" data="toggle,dropdown"]<br /> ... <br />[caret][/button]<br />[dropdown]<br />[dropdown-header]<br /> ... <br />[/dropdown-header]<br />[dropdown-item link="#"]<br />... <br />[/dropdown-item]<br />[dropdown-item link="#"]<br /> ... <br />[/dropdown-item]<br />[dropdown-item link="#"]<br /> ... <br />[/dropdown-item]<br />[divider]<br />[dropdown-item link="#"]<br /> ... <br />[/dropdown-item]<br />[/dropdown]<br />[/button-group]');
					}
				}, // End Button Dropdown

				/* Button Split Dropdown */
				{
					text: 'Button Split Dropdown',
					onclick: function() {
						editor.insertContent( '[button-group]<br />[button link="#"]<br /> ... <br />[/button]<br />[button dropdown="true" data="toggle,dropdown"][caret][/button]<br />[dropdown]<br />   [dropdown-item link="#"]<br /> ... <br />[/dropdown-item]<br />[divider]<br />[dropdown-item link="#"]<br /> ... <br />[/dropdown-item]<br />[/dropdown]<br />[/button-group]');
					}
				}, // Button Split Dropdown

				/* Button Group */
				{
					text: 'Button Group',
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
		text: 'Tabs and Toggles',
		menu: [

				/* Bootstrap Accordion */
				{
					text: 'Accordion',
					onclick: function() {
						editor.insertContent( '[collapsibles]<br />[collapse title="Collapse 1" active="true"]<br />...<br />[/collapse]<br />[collapse title="Collapse 2"]<br />...<br />[/collapse]<br />[collapse title="Collapse 3"]<br />...<br />[/collapse]<br />[/collapsibles]');
					}
				}, // End bootstrap accordion

				/* Tabs */
				{
					text: 'Tabs',
					onclick: function() {
						editor.insertContent( '[tabs type="tabs"]<br />[tab title="Home" active="true"]<br />...<br />[/tab]<br />[tab title="Profile"]<br />...<br />[/tab]<br />[tab title="Messages"]<br />...<br />[/tab]<br />[/tabs]');
					}
				}, // End tabs

			]
		}, // End Tabs and Toggles section



		/** Tooltips **/
		{
		text: 'Tooltips',
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
			text: 'Progress Bar',
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
			text: 'Bootstrap Components',
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
					text: 'Jumbotron',
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
		text: 'Content',
		menu: [
            /* Image Post Slider */
            {
                text: 'Image Post Slider',
                onclick: function() {
                    editor.insertContent( '[imagepostslider]');
                }
            }, // Image Post Slider
            
            /* Links */
            {
                text: 'Links',
                onclick: function() {
                    editor.insertContent( '[links]');
                }
            }, // Links


            /* Buttons */
            {
                text: 'Gridbox',
                onclick: function() {
                    editor.windowManager.open( {
                        title: 'Insert Gridbox',
                        body: [

                        // Post Type
                        {
                            type: 'textbox',
                            name: 'gridpost_type',
                            label: 'Post Type Name',
                            value: 'page'
                        },

                        // Posts per Page
                        {
                            type: 'textbox',
                            name: 'gridposts_per_page',
                            label: 'Posts for grid',
                            value: '-1'
                        },

                        // Columns
                        {
                            type: 'listbox',
                            name: 'gridcol',
                            label: 'Columns Grid',
                            'values': [
                                {text: '4 columns', value: '4'},
                                {text: '3 columns', value: '3'},
                                {text: '2 columns', value: '2'},
                                {text: '6 columns', value: '6'},
                                {text: '12 columns', value: '12'}
                            ]
                        },

                        // Button Include date
                        {
                            type: 'listbox',
                            name: 'griddate',
                            label: 'Include Date',
                            'values': [
                                {text: 'No', value: 'false'},
                                {text: 'Yes', value: 'true'}
                            ]
                        },

                        // Image size
                        {
                            type: 'textbox',
                            name: 'gridimagesize',
                            label: 'Image Size (Wordpress name)',
                            value: ''
                        },

                     ],
                        onsubmit: function( e ) {
                            editor.insertContent( '[gridbox post_type="' + e.data.gridpost_type + '" posts_per_page="' + e.data.gridposts_per_page + '" col="' + e.data.gridcol + '" date="' + e.data.griddate + '" size="' + e.data.gridimagesize + '"]');
                        }
                    });
                }
            }, // End button
			]
		} // End content section
                
			]
		});
	});
})();
