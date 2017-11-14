( function( api ) {

	// Extends our custom "eboost" section.
	api.sectionConstructor['eboost'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
