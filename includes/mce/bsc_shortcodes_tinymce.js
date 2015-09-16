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

				/* Icon Stacked */
				{
					text: 'Icon Stacked',
					onclick: function() {
						editor.insertContent( '[bsc_iconstack icon="check-empty" top="twitter"][/bsc_iconstack]');
					}
				}, // End Icon Stacked

				/* Icon List */
				{
					text: 'Icon List',
					onclick: function() {
						editor.insertContent( '[bsc_iconlist]<br />[bsc_iconitem icon="youtube"]YouTube[/bsc_iconitem]<br />[bsc_iconitem icon="facebook"]Facebook[/bsc_iconitem]<br />[bsc_iconitem icon="twitter"]Twitter[/bsc_iconitem]<br />[/bsc_iconlist]');
					}
				}, // End Icon List

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
						editor.insertContent( '[bsc_button_dropdown label="Button Text" icon="info-sign" color="danger" size="lg"]<br />[bsc_dropdown_link icon="pencil" url="http://#.com/" target="blank"]Button Text[/bsc_dropdown_link]<br />[bsc_dropdown_link icon="comment" url="http://#.com/" target="blank"]Dropdown Link[/bsc_dropdown_link]<br />[bsc_dropdown_link icon="cog" url="http://#.com/" target="blank"]Button Text[/bsc_dropdown_link]<br />[bsc_dropdown_divider]<br />[bsc_dropdown_link url="http://#.com/" target="blank"]Button Text[/bsc_dropdown_link]<br />[/bsc_button_dropdown]');
					}
				}, // End Button Dropdown

				/* Button Split Dropdown */
				{
					text: 'Button Split Dropdown',
					onclick: function() {
						editor.insertContent( '[bsc_button_split_dropdown label="Button Text" color="primary" size="lg" url="http://#.com/" target="blank"]<br />[bsc_dropdown_link icon="pencil" url="http://#.com/" target="blank"]Button Text[/bsc_dropdown_link]<br />[/bsc_button_split_dropdown]');
					}
				}, // Button Split Dropdown

				/* Button Group */
				{
					text: 'Button Group',
					onclick: function() {
						editor.insertContent( '[bsc_button_group size="lg" ]<br />[bsc_button color="primary" url="http://#.com/" title="Visit Site" target="blank"]Button Text[/bsc_button][bsc_button color="danger" url="http://#.com/" title="Visit Site" target="blank"]Button Text[/bsc_button]<br />[/bsc_button_group]');
					}
				}, // Button Group

				/* Vertical Button Group */
				{
					text: 'Vertical Button Group',
					onclick: function() {
						editor.insertContent( '[bsc_button_group_vertical size="xs" ]<br />[bsc_button color="primary" url="http://#.com/" title="Visit Site" target="blank"]Button Text[/bsc_button][bsc_button color="danger" url="http://#.com/" title="Visit Site" target="blank"]Button Text[/bsc_button]<br />[/bsc_button_group_vertical]');
					}
				}, // Vertical Button Group

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
						editor.insertContent( '[bsc_accordion_bootstrap name="UniqueName"]<br />[bsc_accordion_bootstrap_section color="primary" name="UniqueName" heading="Container One Title" number="1" open="yes"]<br />Accordion Bootstrap Content<br />[/bsc_accordion_bootstrap_section]<br />[bsc_accordion_bootstrap_section color="primary" name="UniqueName" heading="Container Two Title" number="2"]<br />Accordion Bootstrap Content<br />[/bsc_accordion_bootstrap_section]<br />[/bsc_accordion_bootstrap]');
					}
				}, // End bootstrap accordion

				/* Tabs */
				{
					text: 'Tabs',
					onclick: function() {
						editor.insertContent( '[bsc_tab_bootstrap]<br />[bsc_tab_titlesection type="tabs"]<br />[bsc_tab_tabtitle active="yes" number="1"]Tab 1[/bsc_tab_tabtitle]<br />[bsc_tab_tabtitle number="2"]Tab 2[/bsc_tab_tabtitle]<br />[/bsc_tab_titlesection]<br />[bsc_tab_contentsection]<br />[bsc_tab_tabcontent active="yes" number="1"]Tab 1 Content[/bsc_tab_tabcontent]<br />[bsc_tab_tabcontent number="2"]Tab 2 Content[/bsc_tab_tabcontent]<br />[/bsc_tab_contentsection]<br />[/bsc_tab_bootstrap]');
					}
				}, // End tabs

			]
		}, // End Tabs and Toggles section



		/** Tooltips **/
		{
		text: 'Tooltips',
		menu: [

				/* Tooltip */
				{
					text: 'Tooltip',
					onclick: function() {
						editor.insertContent( '[bsc_tooltip text="Text in tooltip" placement="top"]Link for tooltip[/bsc_tooltip]');
					}
				}, // End Tooltip

				/* Button Tooltip */
				{
					text: 'Button Tooltip',
					onclick: function() {
						editor.insertContent( '[bsc_tooltip text="Text in tooltip" placement="top" color="primary" size="lg"]Link for tooltip[/bsc_tooltip]');
					}
				}, // End Button Tooltip

			]
		}, // End tooltip section


		/** Popover **/
		{
			text: 'Progress Bar',
			menu: [

				/* Single Progress Bar */
				{
					text: 'Single Progress Bar',
					onclick: function() {
						editor.insertContent( '[bsc_progress_bar style="success" strip="yes" animate="yes" width="20"][/bsc_progress_bar]');
					}
				}, // End Single Progress Bar

				/* Progress Bar - Stacked */
				{
					text: 'Progress Bar - Stacked',
					onclick: function() {
						editor.insertContent( '[bsc_stacked_progress_bar]<br />[bsc_single_stacked_bar style="success" width="20"][/bsc_single_stacked_bar]<br />[bsc_single_stacked_bar style="warning" width="30"][/bsc_single_stacked_bar]<br />[bsc_single_stacked_bar style="danger" width="30"][/bsc_single_stacked_bar]<br />[/bsc_stacked_progress_bar]');
					}
				}, // End Progress Bar - Stacked

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
						editor.insertContent( '[bsc_alert color="danger"]Alert Content[/bsc_alert]');
					}
				}, // End Alert

				/* Badge*/
				{
					text: 'Badge',
					onclick: function() {
						editor.insertContent( '[bsc_badge]Label[/bsc_badge]');
					}
				}, // End Badge

				/* Carousel */
				{
					text: 'Carousel',
					onclick: function() {
						editor.insertContent( '[bsc_carousel name="ExampleCarousel"]<br />[bsc_carousel_image first="yes" title="Image Title" caption="Caption example text" link="http://domain.com/images/pic.jpg"]<br />[bsc_carousel_image title="Second Image Title" caption="Caption for second image" link="http://domain.com/images/pic.jpg"]<br />[bsc_carousel_image title="Third Image Title" caption="Caption for third image" link="http://domain.com/images/pic.jpg"]<br />[/bsc_carousel] ');
					}
				}, // End Carousel

				/* Jumotron */
				{
					text: 'Jumotron',
					onclick: function() {
						editor.insertContent( '[bsc_jumbotron]Content of the Jumbotron <br />[bsc_button color="primary" size="lg" url="http://#.com/" title="Visit Site" target="blank"]Button Text[/bsc_button][/bsc_jumbotron]');
					}
				}, // End Jumotron

				/* Label */
				{
					text: 'Label',
					onclick: function() {
						editor.insertContent( '[bsc_label color="warning"]Label[/bsc_label]');
					}
				}, // End Label

				/* Modal */
				{
					text: 'Modal',
					onclick: function() {
						editor.insertContent( '[bsc_modal id="1" header="Title of Modal" color="danger" size="lg" msize="modal-sm" text="Click Here"]Here is he content[/bsc_modal]');
					}
				}, // End Modal

				/* Panel */
				{
					text: 'Panel',
					onclick: function() {
						editor.insertContent( '[bsc_panel color="primary" title="Title of Panel" footer="Panel Footer"]Here is the content of the panel[/bsc_panel]');
					}
				}, // End Panel

				/* Table */
				{
					text: 'Table',
					onclick: function() {
						editor.insertContent( '[bsc_table strip="yes" border="yes" condense="yes" hover="yes" cols="names,values" data="name1,25,name2,409"][/bsc_table]');
					}
				}, // End Table

				/* Well */
				{
					text: 'Well',
					onclick: function() {
						editor.insertContent( '[bsc_well width="50%"]Your Well Content[/bsc_well]');
					}
				}, // End Well

			]
		}, // End Bootstrap Components Section


		/** Extras **/
		{
		text: 'Extras',
		menu: [

			/* Spacing */
				{
					text: 'Spacing',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Insert Spacing',
							body: [ {
								type: 'textbox',
								name: 'spacingSize',
								label: 'Height In Pixels',
								value: '30'
							} ],
							onsubmit: function( e ) {
								editor.insertContent( '[bsc_spacing size="' + e.data.spacingSize + '"]');
							}
						});
					}
				}, // End spacing

				/* Highlight */
				{
					text: 'Highlight',
					onclick: function() {
						editor.insertContent( '[bsc_highlight color="yellow"]highlighted text[/bsc_highlight]');
					}
				}, // End Highlight

				/* Testimonial */
				{
					text: 'Testimonial',
					onclick: function() {
						editor.insertContent( '[bsc_testimonial by="Person Name"]Your testimonial[/bsc_testimonial]');
					}
				}, // End Testimonial

				/* Pricing Table */
				{
					text: 'Pricing Table',
					onclick: function() {
						editor.insertContent( '[bsc_pricing_table]<br />[bsc_pricing  size="4" plan="Basic" cost="$9.99" per="per month" button_url="#" button_text="Sign Up"  button_target="self" button_rel="nofollow"]<br /><ul><li>Feature One</li><li>Feature Two</li><li>Feature Three</li><li>Feature Four</li><li>Feature Five</li></ul>[/bsc_pricing]<br />[bsc_pricing featured="yes" size="4" plan="Best" cost="$19.99" per="per month" button_url="#" button_text="Sign Up" button_color="danger" button_target="self" button_rel="nofollow"]<br /><ul><li>Feature One</li><li>Feature Two</li><li>Feature Three</li><li>Feature Four</li><li>Feature Five</li></ul>[/bsc_pricing]<br />[bsc_pricing  size="4" plan="Great" cost="$29.99" per="per month" button_url="#" button_text="Sign Up" button_target="self" button_rel="nofollow"]<br /><ul><li>Feature One</li><li>Feature Two</li><li>Feature Three</li><li>Feature Four</li><li>Feature Five</li></ul>[/bsc_pricing]<br />[/bsc_pricing_table]');
					}
				}, // End Pricing Table

				/* Clear Floats */
				{
					text: 'Clear Floats',
					onclick: function() {
						editor.insertContent( '[bsc_clear_floats]');
					}
				}, // End Clear Floats

			]
		}, // End extras section


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
            
			/* Spacing */
				{
					text: 'Image',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Insert Spacing',
							body: [ {
								type: 'textbox',
								name: 'spacingSize',
								label: 'Height In Pixels',
								value: '30'
							} ],
							onsubmit: function( e ) {
								editor.insertContent( '[bsc_spacing size="' + e.data.spacingSize + '"]');
							}
						});
					}
				}, // End spacing



				/* Testimonial */
				{
					text: 'Testimonial',
					onclick: function() {
						editor.insertContent( '[bsc_testimonial by="Person Name"]Your testimonial[/bsc_testimonial]');
					}
				}, // End Testimonial

				/* Pricing Table */
				{
					text: 'Pricing Table',
					onclick: function() {
						editor.insertContent( '[bsc_pricing_table]<br />[bsc_pricing  size="4" plan="Basic" cost="$9.99" per="per month" button_url="#" button_text="Sign Up"  button_target="self" button_rel="nofollow"]<br /><ul><li>Feature One</li><li>Feature Two</li><li>Feature Three</li><li>Feature Four</li><li>Feature Five</li></ul>[/bsc_pricing]<br />[bsc_pricing featured="yes" size="4" plan="Best" cost="$19.99" per="per month" button_url="#" button_text="Sign Up" button_color="danger" button_target="self" button_rel="nofollow"]<br /><ul><li>Feature One</li><li>Feature Two</li><li>Feature Three</li><li>Feature Four</li><li>Feature Five</li></ul>[/bsc_pricing]<br />[bsc_pricing  size="4" plan="Great" cost="$29.99" per="per month" button_url="#" button_text="Sign Up" button_target="self" button_rel="nofollow"]<br /><ul><li>Feature One</li><li>Feature Two</li><li>Feature Three</li><li>Feature Four</li><li>Feature Five</li></ul>[/bsc_pricing]<br />[/bsc_pricing_table]');
					}
				}, // End Pricing Table

				/* Clear Floats */
				{
					text: 'Clear Floats',
					onclick: function() {
						editor.insertContent( '[bsc_clear_floats]');
					}
				}, // End Clear Floats

			]
		} // End extras section
                
                
                
			]
		});
	});
})();
