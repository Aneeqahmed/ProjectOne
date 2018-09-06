jQuery(document).ready(function($) {	

    /** Script for Customizer icons **/ 
    $(document).on('click', '.fa-icons-list li', function() {
        $(this).parents('.fa-icons-list').find('li').removeClass();
        $(this).addClass('selected');
        var iconVal = $(this).parents('.icons-list-wrapper').find('li.selected').children('i').attr('class');
        var inpiconVal = iconVal.split(' ');
        $(this).parents( '.fa-icons-list' ).find('.ap-icon-value').val(inpiconVal[1]);
        $(this).parents( '.fa-icons-list' ).find('.selected-icon-preview').html('<i class="' + iconVal + '"></i>');
        $('.ap-icon-value').trigger('change');
    });
       
});
( function( api ) {
    // Extends our custom "example-1" section.
    api.sectionConstructor['real-estater'] = api.Section.extend( {
        // No events for this type of section.
        attachEvents: function () {},
        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );
} )( wp.customize );