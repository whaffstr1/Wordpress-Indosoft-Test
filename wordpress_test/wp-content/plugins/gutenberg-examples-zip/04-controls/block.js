/**
 * Hello World: Step 4
 *
 * Adding extra controls: built-in alignment toolbar.
 */
( function( blocks, editor, i18n, element, components, _, blockEditor ) {
	var el = element.createElement;
	var __ = i18n.__;
	// var RichText = editor.RichText;
	var MediaUpload = blockEditor.MediaUpload;
	// var AlignmentToolbar = editor.AlignmentToolbar;
	// var BlockControls = editor.BlockControls;
	// var useBlockProps = blockEditor.useBlockProps;

	blocks.registerBlockType( 'gutenberg-examples/example-04-controls', {
		title: __( 'Subscription Section', 'gutenberg-examples' ),
		icon: 'email',
		category: 'layout',

		attributes: {
			mediaID: {
				type: 'number',
			},
			mediaURL: {
				type: 'string',
				source: 'attribute',
				selector: 'img',
				attribute: 'src',
			},
		},

		example: {
			attributes: {
				mediaID: 1,
				mediaURL : "http://localhost/wordpress_test/wp-content/uploads/2022/08/dizzy-messages-1.png",
			},
		},

		edit: function( props ) {

			var attributes = props.attributes;

			var onSelectImage = function( media ) {
				return props.setAttributes( {
					mediaURL: media.url,
					mediaID: media.id,
				} );
			};

			return el(
				'div',
				{className:'wp-block-gutenberg-examples-example-04-controls',},
				el(
					'div',
					{className:'frame11',},
					el(
						'div',
						{className:'imagewrapper',},
						el( MediaUpload, {
							onSelect: onSelectImage,
							allowedTypes: 'image',
							value: attributes.mediaID,
							render: function( obj ) {
								return el(
									components.Button,
									{
										className: attributes.mediaID
											? 'image-button'
											: 'button button-large',
										onClick: obj.open,
									},
									! attributes.mediaID
										? __( 'Upload Image', 'gutenberg-examples' )
										: el( 'img', { src: attributes.mediaURL } )
								);
							},
						} ),
					),
				),
				el(
					'div',
					{className:'card-content',},
					el(
						'div',
						{className:'h1wrapper',},
						el( 
							'h3', 
							{}, 
							i18n.__( 'Stay Tuned!', 'gutenberg-examples' ), 
						),
					),
					el(
						'div',
						{className:'pwrapper',},
						el(
							'p',
							{},
							i18n.__( 'Get the latest articles and business updates that you need to know, you\'ll even get special recommendations weekly.', 'gutenberg-examples' ),
						)
					),
					el(
						'div',
						{className:'divwrapper',},
						el(
							'input',
							{
								className:'forma-input',
								type:'text',
								placeholder:i18n.__( 'Insert Your Email Here', 'gutenberg-examples' ),
							},
						),
						el(
							'button',
							{
								className:'forma-btn',
								type:'btn',								
							},
							i18n.__( 'Subscribe', 'gutenberg-examples' ),
						)
					),
				),
			);
		},

		save: function( props ) {
			var attributes = props.attributes;

			return el(
				'div',
				{className:'wp-block-gutenberg-examples-example-04-controls',},
				el(
					'div',
					{className:'frame11',},
					el(
						'div',
						{className:'imagewrapper',},
						attributes.mediaURL && el(
							'img',
							{ 
								src: attributes.mediaURL, 
							},
						),
					),
				),
				el(
					'div',
					{className:'card-content',},
					el(
						'div',
						{className:'h1wrapper',},
						el( 
							'h3', 
							{}, 
							i18n.__( 'Stay Tuned!', 'gutenberg-examples' ), 
						),
					),
					el(
						'div',
						{className:'pwrapper',},
						el(
							'p',
							{},
							i18n.__( 'Get the latest articles and business updates that you need to know, you\'ll even get special recommendations weekly.', 'gutenberg-examples' ),
						)
					),
					el(
						'div',
						{className:'divwrapper',},
						el(
							'input',
							{
								className:'forma-input',
								type:'text',
								placeholder:i18n.__( 'Your Email', 'gutenberg-examples' ),
							},
						),
						el(
							'button',
							{
								className:'forma-btn',
								type:'btn',								
							},
							i18n.__( 'Subscribe', 'gutenberg-examples' ),
						)
					),
				),
			);
		},

	} );
}( 
	window.wp.blocks, 
	window.wp.editor, 
	window.wp.i18n, 
	window.wp.element,
	window.wp.components,
	window._,
	window.wp.blockEditor ) );
