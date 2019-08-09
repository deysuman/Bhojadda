jQuery(document).ready(function() {

    jQuery('#sa-admin-tabs').find('a').click(function() {
        jQuery('#sa-admin-tabs').find('a').removeClass('nav-tab-active');
        jQuery('.sa-tab').removeClass('active');

        var id = jQuery(this).attr('id').replace('-tab','');
        jQuery('#' + id).addClass('active');
        jQuery(this).addClass('nav-tab-active');
    });

    // init
    var active_tab = window.location.hash.replace('#top#','');

    // default to first tab
    if ( active_tab == '' || active_tab == '#_=_') {
        active_tab = jQuery('.sa-tab').attr('id');
    }

    jQuery('#' + active_tab).addClass('active');
    jQuery('#' + active_tab + '-tab').addClass('nav-tab-active');

});



