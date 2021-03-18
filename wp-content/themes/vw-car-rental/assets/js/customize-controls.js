( function( api ) {

	// Extends our custom "vw-car-rental" section.
	api.sectionConstructor['vw-car-rental'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );