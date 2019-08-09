"use strict";
/**
 * similar to PHP's empty function
 */
function empty(data) {
    if (typeof(
            data
        ) == 'number' || typeof(
            data
        ) == 'boolean') {
        return false;
    }
    if (typeof(
            data
        ) == 'undefined' || data === null) {
        return true;
    }
    if (typeof(
            data.length
        ) != 'undefined') {
        return data.length === 0;
    }
    var count = 0;
    for (var i in data) {
        // if(data.hasOwnProperty(i))
        //
        // This doesn't work in ie8/ie9 due the fact that hasOwnProperty works only on native objects.
        // http://stackoverflow.com/questions/8157700/object-has-no-hasownproperty-method-i-e-its-undefined-ie8
        //
        // for hosts objects we do this
        if (Object.prototype.hasOwnProperty.call(data, i)) {
            count++;
        }
    }
    return count === 0;
}

// https://github.com/taylorhakes/promise-polyfill
! function(e) {
    function n() {}

    function t(e, n) {
        return function() {
            e.apply(n, arguments)
        }
    }

    function o(e) {
        if ("object" != typeof this) throw new TypeError("Promises must be constructed via new");
        if ("function" != typeof e) throw new TypeError("not a function");
        this._state = 0, this._handled = !1, this._value = void 0, this._deferreds = [], s(e, this)
    }

    function i(e, n) {
        for (; 3 === e._state;) e = e._value;
        return 0 === e._state ? void e._deferreds.push(n) : (e._handled = !0, void o._immediateFn(function() {
            var t = 1 === e._state ? n.onFulfilled : n.onRejected;
            if (null === t) return void(1 === e._state ? r : u)(n.promise, e._value);
            var o;
            try {
                o = t(e._value)
            } catch (i) {
                return void u(n.promise, i)
            }
            r(n.promise, o)
        }))
    }

    function r(e, n) {
        try {
            if (n === e) throw new TypeError("A promise cannot be resolved with itself.");
            if (n && ("object" == typeof n || "function" == typeof n)) {
                var i = n.then;
                if (n instanceof o) return e._state = 3, e._value = n, void f(e);
                if ("function" == typeof i) return void s(t(i, n), e)
            }
            e._state = 1, e._value = n, f(e)
        } catch (r) {
            u(e, r)
        }
    }

    function u(e, n) {
        e._state = 2, e._value = n, f(e)
    }

    function f(e) {
        2 === e._state && 0 === e._deferreds.length && o._immediateFn(function() {
            e._handled || o._unhandledRejectionFn(e._value)
        });
        for (var n = 0, t = e._deferreds.length; n < t; n++) i(e, e._deferreds[n]);
        e._deferreds = null
    }

    function c(e, n, t) {
        this.onFulfilled = "function" == typeof e ? e : null, this.onRejected = "function" == typeof n ? n : null, this.promise = t
    }

    function s(e, n) {
        var t = !1;
        try {
            e(function(e) {
                t || (t = !0, r(n, e))
            }, function(e) {
                t || (t = !0, u(n, e))
            })
        } catch (o) {
            if (t) return;
            t = !0, u(n, o)
        }
    }
    var a = setTimeout;
    o.prototype["catch"] = function(e) {
        return this.then(null, e)
    }, o.prototype.then = function(e, t) {
        var o = new this.constructor(n);
        return i(this, new c(e, t, o)), o
    }, o.all = function(e) {
        var n = Array.prototype.slice.call(e);
        return new o(function(e, t) {
            function o(r, u) {
                try {
                    if (u && ("object" == typeof u || "function" == typeof u)) {
                        var f = u.then;
                        if ("function" == typeof f) return void f.call(u, function(e) {
                            o(r, e)
                        }, t)
                    }
                    n[r] = u, 0 === --i && e(n)
                } catch (c) {
                    t(c)
                }
            }
            if (0 === n.length) return e([]);
            for (var i = n.length, r = 0; r < n.length; r++) o(r, n[r])
        })
    }, o.resolve = function(e) {
        return e && "object" == typeof e && e.constructor === o ? e : new o(function(n) {
            n(e)
        })
    }, o.reject = function(e) {
        return new o(function(n, t) {
            t(e)
        })
    }, o.race = function(e) {
        return new o(function(n, t) {
            for (var o = 0, i = e.length; o < i; o++) e[o].then(n, t)
        })
    }, o._immediateFn = "function" == typeof setImmediate && function(e) {
        setImmediate(e)
    } || function(e) {
        a(e, 0)
    }, o._unhandledRejectionFn = function(e) {
        "undefined" != typeof console && console && console.warn("Possible Unhandled Promise Rejection:", e)
    }, o._setImmediateFn = function(e) {
        o._immediateFn = e
    }, o._setUnhandledRejectionFn = function(e) {
        o._unhandledRejectionFn = e
    }, "undefined" != typeof module && module.exports ? module.exports = o : e.Promise || (e.Promise = o)
}(this);

// Variables
var $window = jQuery(window),
    $body = jQuery('body'),
    gt3_map_latitude = $body.attr('data-map-latitude'),
    gt3_map_longitude = $body.attr('data-map-longitude');

// Map part
var Map = (
    function() {
        // create a custom icon class that can be extended for each listing category
        var map, markers, CustomHtmlIcon;

        // initialization - check wether we are on the archive page or on a single listing
        function init() {

            if (jQuery('.no_job_listings_found').length) {
                jQuery('<div class="results">' + gt3listing_params.strings['no_job_listings_found'] + '</div>').prependTo('.showing_jobs, .search-query');
            }

            if (!jQuery('#map').length) {
                jQuery('#main_content .job_listings').on('updated_results', function(e, result) {
                    updateCards(result.total_found);
                });
                return;
            }

            if (typeof L !== "object" || !L.hasOwnProperty('map')) {
                return;
            }

            map = L.map('map', {
                scrollWheelZoom: false
            });
            markers = new L.MarkerClusterGroup({
                showCoverageOnHover: false
            });
            CustomHtmlIcon = L.HtmlIcon.extend({
                options: {
                    html: "<div class='pin'></div>",
                    iconSize: [48, 59], // size of the icon
                    iconAnchor: [24, 59], // point of the icon which will correspond to marker's location
                    popupAnchor: [0, -59] // point from which the popup should open relative to the iconAnchor
                }
            });

            $window.on('gt3:refreshmap', function() {
                map._onResize();
            });

            var tileLayer,
                map_skin_style = jQuery('body').data('map-skin-style');

            tileLayer = L.gridLayer.googleMutant({
                type: 'roadmap',
                styles: map_skin_style
            });
            jQuery('#map').addClass('gt3_google_map');

            map.addLayer(tileLayer);

            // if we are on the archive page (#map is not a single listing's map) :D
            if (!jQuery('#map').is('.listing-map')) {
                jQuery('#main_content .job_listings').on('updated_results', function(e, result) {
                    updateCards(result.total_found);
                });
            } else {
                if (jQuery('.single_job_listing').length) {
                    var $item = jQuery('.single_job_listing');
                } else if (jQuery('.gt3_location_map').length) {
                    var $item = jQuery('.gt3_location_map');
                }
                // add only one marker if we're on the single listing page
                if (typeof $item.data('latitude') !== "undefined" && typeof $item.data('longitude') !== "undefined") {

                    var zoom = (
                    typeof MapWidgetZoom !== "undefined"
                    ) ? MapWidgetZoom : 13;

                    addPinToMap($item);
                    map.addLayer(markers);
                    map.setActiveArea('active-area');
                    map.setView([$item.data('latitude'), $item.data('longitude')], zoom);
                    jQuery(window).on('update:map', function() {
                        map.setView([$item.data('latitude'), $item.data('longitude')], zoom);
                    });
                } else {
                    jQuery('#map').hide();
                    jQuery('.listing-address').css('marginTop', 0);
                }
            }

            jQuery('.map_find_me').on('click', function(e) {

                var gt3_maxZoom = '18',
                    gt3_map_mobile_maxzoom = jQuery('body').attr('data-mobile-maxzoommap');
                if (jQuery(window).width() < 767 && gt3_map_mobile_maxzoom !== '') {
                    var gt3_maxZoom = gt3_map_mobile_maxzoom;
                }

                e.preventDefault();
                e.stopPropagation();
                map.locate({
                    setView: true,
                    maxZoom: gt3_maxZoom
                });
            });
        }

        function updateCards($total_found) {

            var $cards = jQuery('#main_content .card'),
                cardsWithLocation = 0;

            if (!$cards.length) {
                jQuery('body').addClass('has-no-listings');
                defaultMapView();

                return;
            }

            //first some cleanup to avoid multiple results being shown - it happens
            jQuery('.showing_jobs .results').remove();

            if (typeof $total_found !== 'undefined') {
                //someone must have blessed us with higher knowledge
                //let's not let it go to waste
                jQuery('<div class="results"><span class="results-no">' + $total_found + '</span> ' + gt3listing_params.strings['results-no'] + '</div>').prependTo('.showing_jobs, .search-query');
            } else {
                jQuery('<div class="results"><span class="results-no">' + $cards.length + '</span> ' + gt3listing_params.strings['results-no'] + '</div>').prependTo('.showing_jobs, .search-query');
            }

            if (jQuery('.map').length && typeof map !== "undefined") {
                map.removeLayer(markers);
                markers = new L.MarkerClusterGroup({
                    showCoverageOnHover: false
                });
                $cards.each(function(i, obj) {
                    var cardHasLocation = addPinToMap(jQuery(obj), true);
                    if (cardHasLocation) {
                        cardsWithLocation += 1;
                    }
                });

                if (cardsWithLocation != 0) {
                    map.fitBounds(markers.getBounds(), {
                        padding: [50, 50]
                    });
                    map.addLayer(markers);

                    var mapZoom = map.getZoom();
                    var bounds = markers.getBounds();
                    var lat = (bounds._northEast.lat + bounds._southWest.lat) / 2;
                    var lng = (bounds._northEast.lng + bounds._southWest.lng) / 2;
                    bounds = [lat, lng];

                    jQuery.cookie(('gt3-listing-bounds', JSON.stringify(bounds)));
                    jQuery.cookie(('gt3-listing-mapZoom', mapZoom));
                } else {
                    defaultMapView();
                }
            }
        }

        function addPinToMap($item, archive) {
            var categories = $item.data('categories'),
                iconClass, m;

            if (empty($item.data('latitude')) || empty($item.data('longitude'))) {
                return false;
            }

            if (typeof categories !== "undefined" && !categories.length) {
                iconClass = 'pin pin--empty';
            } else {
                iconClass = 'pin';
            }

            var $icon = jQuery('.pin_map_mapker_svg'),
                $categories = $item.find('.category-icon'),
                $tag, iconHTML = "<div class='" + iconClass + "'></div>";

            if (typeof $item.data('color') !== "undefined") {
                var marker_label_color = " style='fill: "+ $item.data('color') +"'";
            } else {
                var marker_label_color = '';
            }

            if ($body.is('.single-job_listing')) {
                // If we are on a single listing
                iconHTML = "<div class='" + iconClass + "'></div>";
            } else if ($categories.length) {
                iconHTML = "<div class='" + iconClass + "'><div class='marker-cluster_inner' " + marker_label_color + ">" + $icon.html() + "</div><div class='pin__icon'>" + $categories.html() + "</div></div>";
            }

            m = L.marker([$item.data('latitude'), $item.data('longitude')], {
                icon: new CustomHtmlIcon({
                    html: iconHTML
                })
            });

            if (typeof archive !== "undefined") {

                $item.mouseenter(function(){
                    jQuery(m._icon).find('.pin').addClass('item_hovered');
                }).mouseleave(function(){
                    jQuery(m._icon).find('.pin').removeClass('item_hovered');
                });

                var address = $item.find('.card__address').text();

                var item_img_tag = '';
                if ($item.data('img') !== '') {
                    item_img_tag = "<div class='popup__image' style='background-image: url(" + $item.data('img') + ");'></div>";
                }

                m.bindPopup(
                    "<a class='popup' href='" + $item.data('permalink') + "'>" + item_img_tag +
                    "<div class='popup__content'>" +
                        "<h3 class='popup__title'>" + $item.find('.card__title').html() + "</h3>" +
                        "<div class='popup_address'>" + $item.find('.card__address').html() + "</div>" +
                    "</div>" +
                    "</a>").openPopup();
            }

            markers.addLayer(m);

            return true;
        }

        function defaultMapView() {
            var bounds = jQuery.cookie(('gt3-listing-bounds')),
                zoom = jQuery.cookie(('gt3-listing-mapZoom'));

            if (typeof bounds === 'undefined') {

                if (gt3_map_latitude == '') {
                    gt3_map_latitude = '51.4825766';
                }
                if (gt3_map_longitude == '') {
                    gt3_map_longitude = '0.0098476';
                }

                bounds = [gt3_map_latitude, gt3_map_longitude];
                zoom = 9;
            } else {
                bounds = JSON.parse(bounds);
            }

            map.removeLayer(markers);
            map.setView(bounds, zoom);
        }

        return {
            init: init,
            updateResults: updateCards
        }
    }
)();

function init() {

    var $uploader = jQuery('.wp-job-manager-file-upload');

    $uploader.each(function(i, obj) {
        var $input = jQuery(obj),
            id = jQuery(obj).attr('id'),
            $label = jQuery('label[for="' + id + '"]'),
            $btn = jQuery('<div class="uploader-btn"><div class="spacer"><div class="text">' + gt3listing_params.strings['wp-job-manager-file-upload'] + '</div></div></div>').insertAfter($input);

        $btn.on('click', function() {
            $label.trigger('click');
        });
    });

    if (jQuery('#job_preview').length) {
        $body.addClass('single-job_listing single-job_listing_preview').removeClass('page-add-listing');
        jQuery('.page').removeClass('page');
        jQuery('.listing-map').css({
            display: '',
            height: ''
        });
        $window.trigger('gt3:refreshmap');
        jQuery('#job_preview').css('opacity', 1);
    }

    jQuery('.btn_filter').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();

        if ($body.hasClass('show-filters')) {
            $window.scrollTop(0);
        }
        $body.toggleClass('show-filters');
    });

    jQuery('.btn_view').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $body.toggleClass('show-map');
        jQuery('html, body').scrollTop(0);
        setTimeout(function() {
            $window.trigger('gt3:refreshmap');
        });
    });

    if (jQuery('#job_package_selection').length) {
        $body.addClass('page-package-selection');

        var $nopackages = jQuery('.no-packages');

        if ($nopackages.length) {
            var $form = $nopackages.closest('#job_package_selection');

            if ($form.length) {
                $nopackages.insertAfter($form);
                $form.remove();
            }
        }
    }

    Map.init();
}

jQuery(document).ready(function() {

    if (jQuery('.gt3_listing_with_map').length) {
        jQuery('body').addClass('page_with_listing_map');
        var load_more_jobs_tag = jQuery('.load_more_jobs');
        if (load_more_jobs_tag.length) {
            load_more_jobs_tag.each(function() {
                jQuery(this).find('strong').text(jQuery('.gt3_listing_part').data('load-btn-text'));
            });
        }
    }

    init();

    jQuery('.job_filters').on('click', '.reset', function() {
        jQuery('.active-tags').empty();
        jQuery('.tags-select').find(':selected').each(function(i, obj) {
            jQuery(obj).attr('selected', false);
        });
        jQuery('.tags-select').trigger("chosen:updated");

        jQuery('input[name="search_keywords"]').each(function(i, obj) {
            jQuery(obj).val('').trigger('chosen:updated');
        });
    });

    jQuery( '#search_keywords' ).on( 'keyup', function(e) {
        jQuery( this ).trigger( 'change' );
    });

    if (jQuery('.job-manager-form').length) {
        jQuery('.job-manager-form').parents('.vc_row').parent().parent().addClass('has_job_manager_form');
    }

    if (jQuery('body.page-add-listing').length) {
        jQuery('#main_content p.m_b80').parents('.vc_row').parent().parent().addClass('has_job_manager_form');
    }

    // Change Claim Button
    var claim_listing_tag = jQuery('.claim-listing'),
        single_job_listing = jQuery('.single_job_listing');
    if (single_job_listing.length && claim_listing_tag.length) {
        var claim_btn_text = claim_listing_tag.text(),
            claim_btn_link = claim_listing_tag.attr('href');
        claim_listing_tag.hide();
        jQuery('.single_job_description .single_job_listing').append('<a class="learn_more claim-listing" href="'+claim_btn_link+'">'+claim_btn_text+' <i class="fa fa-angle-right"></i></a>');
    }

    // GT3 Auto Locate View
    gt3_auto_locateview();

    setTimeout(function() {
        // Custom chosen select
        jQuery('.site_wrapper select').each(function(){
            if (jQuery(this).attr('id') == 'rating' ||
                jQuery(this).attr('id') == 'billing_country') {
                return false;
            }
            jQuery(this).chosen();
        });
    }, 50);


    /* GT3 Location Radius */
    if (jQuery('.gps_type_wrap').length) {
        jQuery('.gps_type_wrap label:has(input:checked)').addClass('active_unit');
        jQuery('.gps_type_wrap label').on('click', function() {
            jQuery('.gps_type_wrap label:has(input:checked)').addClass('active_unit');
            jQuery('.gps_type_wrap label:has(input:not(:checked))').removeClass('active_unit');
        });
    }

});

jQuery(window).load(function() {

    if (jQuery('.gt3_listing_with_map').length) {
        setTimeout(function() {
            var load_more_jobs_tag = jQuery('.load_more_jobs.load_previous');
            load_more_jobs_tag.find('strong').text(jQuery('.gt3_listing_part').data('load-btn-text'));
            load_more_jobs_tag.addClass('gt3_btn_loaded');
        }, 500);
    }

    // if we're on the listings archive do this shit
    if (jQuery('.tags-select').length && !jQuery('.listing-map').length) {
        var $tags = jQuery('.tags-select').chosen(),
            updateTags = function() {
                jQuery('.active-tags').empty();
                $tags.find(':selected').each(function(i, obj) {
                    if (empty(obj.value)) {
                        return;
                    }
                    jQuery('<div class="active-tag">' + obj.value + '<div class="remove-tag"></div></div>').appendTo('.active-tags').on('click', function() {
                        jQuery(this).remove();
                        jQuery(obj).attr('selected', false);
                        $tags.trigger("chosen:updated");
                        jQuery('.active-tags input[value="' + obj.value + '"]').remove();
                        jQuery('.job_listings').triggerHandler('update_results', [1, false]);


                    });
                    jQuery('<input type="hidden" name="job_tag[]" value="' + obj.value + '" />').appendTo('.active-tags');
                });
                jQuery('.job_listings').triggerHandler('update_results', [1, false]);
            };

        $tags.on('change', updateTags);

        var $categories = jQuery('#search_categories'),
            updateCategories = function() {
                jQuery('.active-categories').empty();
                $categories.find(':selected').each(function(i, obj) {
                    jQuery('<div class="active-category">' + jQuery(obj).text() + '<div class="remove-tag"></div></div>').appendTo('.active-categories').on('click', function() {
                        jQuery(obj).attr('selected', false);
                        $categories.trigger("chosen:updated");
                        jQuery(this).remove();
                        jQuery('.job_listings').triggerHandler('update_results', [1, false]);
                    });
                });
                updateTags();
            };

        $categories.on('change', updateCategories);
    }

    //for search listings we need to make some magic to make it behave like the categories and tags archives
    if ($body.is('.search') && $body.is('.post-type-archive-job_listing')) {
        if (jQuery('.job_listings #search_keywords').length) {
            jQuery('.job_listings #search_keywords').val(jQuery('input.search-field').val());
        } else {
            //steal the search input data and put it in among some make shift filters
            jQuery('.job_listings').append('<form class="job_filters"><input type="hidden" name="search_keywords" id="search_keywords" value="' + jQuery('input.search-field').val() + '"/></form>');
        }
    }

    $window.trigger('gt3:refreshmap');

    loginWithAjaxHandlers();

});

function loginWithAjaxHandlers() {
    if (jQuery('.lwa-modal').length) {

        jQuery('.js-lwa-open-remember-form').on('click', function(e) {
            e.stopPropagation();
            e.preventDefault();
            jQuery('.js-lwa-login, .js-lwa-remember').toggleClass('form-visible');
        });

        jQuery('.js-lwa-close-remember-form').on('click', function() {
            jQuery('.js-lwa-login, .js-lwa-remember').toggleClass('form-visible');
        });

        jQuery('.js-lwa-open-register-form').on('click', function(e) {
            e.stopPropagation();
            e.preventDefault();

            jQuery('.js-lwa-login, .js-lwa-register').toggleClass('form-visible');
        });

        jQuery('.js-lwa-close-register-form').on('click', function() {
            jQuery('.js-lwa-login, .js-lwa-register').toggleClass('form-visible');
        });

        jQuery('.lwa-login-link').on('touchstart', function() {
            closeMenu();
        });
    }
}

jQuery(document).on("click", ".pin", function () {
    jQuery(this).toggleClass('active_pin');
});

jQuery(document).on("click", function (e) {
    if (jQuery(e.target).hasClass('tooltip_element')) {
        return false;
    }
    jQuery('.tooltip-container').removeClass('active');
});

jQuery(document).on("click", ".js-tooltip-trigger", function (e) {
     e.preventDefault();
     e.stopPropagation();

    var listing_tooltip_tag = jQuery('.card__footer .tooltip-container');
    if (listing_tooltip_tag.length) {
        var tooltip_width = jQuery(this).parents('.card__footer').width() - 42;
        jQuery(this).parents('.card__footer').find('.tooltip').width(tooltip_width);
    }

    jQuery('.save_listing_wrap').removeClass('active');
    jQuery(this).parent().toggleClass('active');
});

jQuery(window).load(function() {
    gt3_social_icons();
    gt3_hours_of_operation();
});

// Social Icons
function gt3_social_icons(){
    var field = jQuery('.fieldset-gt3_social .field');
    if (empty(field)) {
        return;
    }
    var item_count = 1;
    var social_link_label = jQuery('.fieldset-gt3_social_link').hide().find('label');
    social_link_label.find('small').remove();
    var draggable_icon = '<a href="javascript:;" class="gt3_social_sortable_handle"><i class="fa fa-arrows" aria-hidden="true"></i></a>';
    var item_link = '<div class="gt3_social_link_wrapper"><input type="text" value="" placeholder="'+social_link_label.text().trim()+'"></input></div>';
    var item_color = '<div class="gt3_social_color_wrapper"><input type="text" name="color"></div>';
    var item_remove = '<div class="gt3_social_item_remove"><i class="fa fa-trash" aria-hidden="true"></i></div>';
    field.append('<div class="gt3_social_container"></div>')
    var social_container = field.find('.gt3_social_container');
    field.append('<div class="gt3_add_social_item"><i class="fa fa-plus" aria-hidden="true"></i></div>');
    var add_social_button = field.find('.gt3_add_social_item');
    var item_index = 0,
        old_index = 0,
        soc_array,
        social_out_preset,
        item_link_preset,
        item_color_preset;
    var element = jQuery('#gt3_social');
    var element_value = gt3_get_element_option(element);
    field.find('.input-text').hide();
    var social_out = gt3_get_all_icons_element();

    var icon_select_value,
        icon_link_value,
        icon_color_value;
    if (!empty(element_value) && Array.isArray(element_value)) {
        for (var i = 0; i <= element_value.length - 1; i++) {
            icon_select_value = !empty(element_value[i].select) ? element_value[i].select : '';
            icon_link_value = !empty(element_value[i].input) ? element_value[i].input : '';
            icon_color_value = !empty(element_value[i].color) ? element_value[i].color : '';

            social_out_preset = gt3_get_all_icons_element(icon_select_value);
            item_link_preset = '<div class="gt3_social_link_wrapper"><input type="text" value="'+icon_link_value+'" placeholder="'+social_link_label.text().trim()+'"></input></div>';
            item_color_preset = '<div class="gt3_social_color_wrapper"><input type="text" name="color" value="'+icon_color_value+'"></div>';

            item_count++;
            social_container.append('<div class="gt3_social_item gt3_social_item_'+item_count+'">'+draggable_icon+social_out_preset+item_link_preset+item_color_preset+item_remove+'</div>');
            gt3_social_icon_select_icon(item_count);

        }
    }else{
        social_container.append('<div class="gt3_social_item gt3_social_item_'+item_count+'">'+draggable_icon+social_out+item_link+item_color+item_remove+'</div>');
        gt3_social_icon_select_icon(item_count);
    }


    social_container.sortable( {
        handle: '.gt3_social_sortable_handle',
        placeholder: ' gt3_social_item gt3_social_item--placeholder',
        items: '.gt3_social_item',
        start: function ( event, ui ) {
            // Make the placeholder has the same height as dragged item
            ui.placeholder.height( ui.item.height() );
            item_index = ui.item.index();
        },
        update: function( event, ui ) {
            old_index = item_index;
            item_index = ui.item.index();
            soc_array = gt3_get_element_option(element);
            soc_array = gt3_get_element_option();
            if (!empty(soc_array)) {
                soc_array = gt3_move_index(soc_array,old_index,item_index);
            }
            jQuery(element).val(JSON.stringify(soc_array));
        },
    } );

    add_social_button.on('click',function(){
        item_count++;
        social_container.append('<div class="gt3_social_item gt3_social_item_'+item_count+'">'+draggable_icon+social_out+item_link+item_color+item_remove+'</div>');
        gt3_social_icon_select_icon(item_count);
    })

    var remove_social_item = field.find('.gt3_add_social_item');

    jQuery(document).on("click", ".gt3_social_item_remove", function (e) {
        e.preventDefault();
        e.stopPropagation();
        var index = jQuery(this).parents('.gt3_social_item').index();
        gt3_delete_element_option(index,element);
        jQuery(this).parent('.gt3_social_item').remove();
    });

    jQuery(document).on("change", ".gt3_social_link_wrapper input", function (e) {
        var index = jQuery(this).parents('.gt3_social_item').index();
        var link_value = jQuery(this).val();
        gt3_set_element_option(index,'input',link_value,jQuery('#gt3_social'));
    });

}

function gt3_get_all_icons_element(value){
    var social_icon = jQuery('.fieldset-gt3_social_icon').find('select').clone().show()
    var social_icon_label = jQuery('.fieldset-gt3_social_icon').find('label');
    social_icon_label.find('small').remove();

    var social_out = '<select class="gt3_icon_out" data-placeholder="'+social_icon_label.text().trim()+'">';
    social_out +=  '<option value=""></option>';
    jQuery(social_icon).find('option').each(function(){
        var element = jQuery(this);
        var element_value = element.attr('value');
        social_out += '<option '+(value == element_value ? 'selected' : '')+' value="'+element_value+'">'+'<i class="'+element_value+'"></i>'+element.html()+'</option>';
    });
    social_out += '</select>';
    return social_out;
}

function gt3_move_index (soc_array,old_index, new_index) {
    if (new_index >= soc_array.length) {
        var k = new_index - soc_array.length;
        while ((k--) + 1) {
            soc_array.push(undefined);
        }
    }
    soc_array.splice(new_index, 0, soc_array.splice(old_index, 1)[0]);
    return soc_array;
};


function gt3_social_icon_select_icon(i){
    if (jQuery('.fieldset-gt3_social .gt3_social_item_'+i+' input[name*="color"]').length) {
        jQuery('.fieldset-gt3_social .gt3_social_item_'+i+' input[name*="color"]').wpColorPicker({
            change: function(event, ui){
                var social_item_selectors = jQuery(event.target);
                var color_value = social_item_selectors.val();
                var index = social_item_selectors.parents('.gt3_social_item').index();
                gt3_set_element_option(index,'color',color_value,jQuery('#gt3_social'));
            },
            clear: function() {
                var social_item_selectors = jQuery(event.target);
                gt3_set_element_option(social_item_selectors,'color','',jQuery('#gt3_social'));
            },
        });
    }

    jQuery('.fieldset-gt3_social .gt3_social_item_'+i+' select.gt3_icon_out').chosen({
        inherit_select_classes: true,
        width: "150px"
    }
    ).on('chosen:showing_dropdown',function(){
        jQuery('.fieldset-gt3_social .gt3_social_item_'+i+' .chosen-container.gt3_icon_out .chosen-results').each(function(){
            jQuery(this).find('li').each(function(){
                var element = jQuery(this);
                var element_content = element.html();
                element.html('<i class="fa fa-'+element_content+'"></i> '+element_content)
            })
        })
    }).on('change',function(){
        jQuery('.fieldset-gt3_social .gt3_social_item_'+i+' .chosen-container.gt3_icon_out .chosen-single span').each(function(){
            var element = jQuery(this);
            var element_content = element.html();
            element.html('<i class="fa fa-'+element_content+'"></i> '+element_content);

        })
        jQuery(this).find(':selected')[0].value;
        var index = jQuery(this).parents('.gt3_social_item').index();
        var element_value = jQuery(this).find(':selected')[0].value;
        gt3_set_element_option(index,'select',element_value,jQuery('#gt3_social'));

    }).ready(function(){
        jQuery('.fieldset-gt3_social .gt3_social_item_'+i+' .chosen-container.gt3_icon_out .chosen-single span').each(function(){
            var element = jQuery(this);
            var element_content = element.html();
            element.html('<i class="fa fa-'+element_content+'"></i> '+element_content);
        })
        jQuery('.fieldset-gt3_social .gt3_social_item_'+i+' .chosen-container.gt3_icon_out .chosen-search input').each(
            function(){
                jQuery(this).on('keydown',function(){
                    jQuery(this).parent().next().each(function(){
                        var item = jQuery(this)
                        setTimeout(function(){
                            item.find('li').each(function(){
                                var element = jQuery(this);
                                var element_content = element.html();
                                element.html('<i class="fa fa-'+element_content.replace(/<em>|<\/em>/gi, '')+'"></i> '+element_content)

                            })
                        },200)
                    })
                })
            }
        )
    });
}

function gt3_set_element_option(option_id,option_name,option_value,element){
    if (empty(option_id) || empty(option_name) || empty(element)) {
        return;
    }
    var element_value = element[0].value;
    var item_obj = [];
    var option_obj = {};
    if (empty(element_value)) {
        option_obj[option_name] = option_value;
        item_obj[option_id] = option_obj;
    }else{
        item_obj = JSON.parse(element_value);
        option_obj[option_name] = option_value;
        if (!empty(item_obj[option_id])) {
            item_obj[option_id][option_name] = option_value;
        }else{
            item_obj[option_id] = option_obj;
        }
    }
    jQuery(element).val(JSON.stringify(item_obj))
}

function gt3_get_element_option(element){
    if (empty(element)) { return; }
    var element_value = element[0].value;
    if (empty(element_value)) {
        return '';
    }else{
        return JSON.parse(element_value);
    }
}

function gt3_delete_element_option(option_id,element){
    if (empty(option_id)) {
        return;
    }
    var element_value = element[0].value;
    if (empty(element_value)) {
        return;
    }
    var item_obj = JSON.parse(element_value);
    if (empty(item_obj[option_id])) {
        return;
    }
    item_obj.splice(option_id, 1);
    jQuery(element).val(JSON.stringify(item_obj));
}
/**
 * end Social Icons
 */


/**
 * Hours of Operation
 */
function gt3_hours_of_operation(){
    var field = jQuery('.fieldset-job_hours .field');
    if (empty(field)) {
        return;
    }
    var item_count = 1;
    var draggable_icon = '<a href="javascript:;" class="gt3_hours_of_operation_item_sortable_handle"><i class="fa fa-arrows" aria-hidden="true"></i></a>';
    var item_remove = '<div class="gt3_hours_of_operation_item_remove"><i class="fa fa-trash" aria-hidden="true"></i></div>';
    var textarea = field.find('#job_hours');
    var textarea_placeholder = textarea.attr('placeholder').split("|");
    var item_days = '<div class="gt3_hours_of_operation__days_wrapper"><input type="text" value="" placeholder="'+textarea_placeholder[0].trim()+'"></input></div>';
    var item_hours = '<div class="gt3_hours_of_operation__hours_wrapper"><input type="text" value="" placeholder="'+textarea_placeholder[1].trim()+'"></input></div>';

    field.append('<div class="gt3_hours_of_operation_container"></div>')
    var social_container = field.find('.gt3_hours_of_operation_container');
    field.append('<div class="gt3_add_hours_of_operation_item"><i class="fa fa-plus" aria-hidden="true"></i></div>');
    var add_hours_of_operation_button = field.find('.gt3_add_hours_of_operation_item');
    var item_index = 0,
        old_index = 0,
        soc_array,
        item_days_preset,
        item_hours_preset;


    var element = jQuery('#job_hours');
    var element_value = gt3_get_element_option(element);
    element.hide();
    var days_value,
        hours_value;
    if (!empty(element_value) && Array.isArray(element_value)) {
        for (var i = 0; i <= element_value.length - 1; i++) {
            hours_value = !empty(element_value[i].hours) ? element_value[i].hours : '';
            days_value = !empty(element_value[i].days) ? element_value[i].days : '';
            item_days_preset = '<div class="gt3_hours_of_operation__days_wrapper"><input type="text" value="'+days_value+'" placeholder="'+textarea_placeholder[0].trim()+'"></input></div>';

            item_hours_preset = '<div class="gt3_hours_of_operation__hours_wrapper"><input type="text" value="'+hours_value+'" placeholder="'+textarea_placeholder[1].trim()+'"></input></div>';

            item_count++;
            social_container.append('<div class="gt3_hours_of_operation_item gt3_hours_of_operation_item_'+item_count+'">'+draggable_icon+item_days_preset+item_hours_preset+item_remove+'</div>');

        }
    }else{
        social_container.append('<div class="gt3_hours_of_operation_item gt3_hours_of_operation_item_'+item_count+'">'+draggable_icon+item_days+item_hours+item_remove+'</div>');
    }
    social_container.sortable( {
        handle: '.gt3_hours_of_operation_item_sortable_handle',
        placeholder: ' gt3_hours_of_operation_item gt3_hours_of_operation_item--placeholder',
        items: '.gt3_hours_of_operation_item',
        start: function ( event, ui ) {
            // Make the placeholder has the same height as dragged item
            ui.placeholder.height( ui.item.height() );
            item_index = ui.item.index();
        },
        update: function( event, ui ) {
            old_index = item_index;
            item_index = ui.item.index();
            soc_array = gt3_get_element_option(element);
            if (!empty(soc_array)) {
                soc_array = gt3_move_index(soc_array,old_index,item_index);
            }
            jQuery(element).val(JSON.stringify(soc_array));
        },
    } );
    add_hours_of_operation_button.on('click',function(){
        item_count++;
        social_container.append('<div class="gt3_hours_of_operation_item gt3_hours_of_operation_item_'+item_count+'">'+draggable_icon+item_days+item_hours+item_remove+'</div>');
    })
    var remove_social_item = field.find('.gt3_hours_of_operation_item_remove');
    jQuery(document).on("click", ".gt3_hours_of_operation_item_remove", function (e) {
        e.preventDefault();
        e.stopPropagation();
        var index = jQuery(this).parents('.gt3_hours_of_operation_item').index();
        gt3_delete_element_option(index,element);
        jQuery(this).parent('.gt3_hours_of_operation_item').remove();
    });

    jQuery(document).on("change", ".gt3_hours_of_operation__days_wrapper input", function (e) {
        var index = jQuery(this).parents('.gt3_hours_of_operation_item').index();
        var input_value = jQuery(this).val();
        gt3_set_element_option(index,'days',input_value,jQuery('#job_hours'));
    });

    jQuery(document).on("change", ".gt3_hours_of_operation__hours_wrapper input", function (e) {
        var index = jQuery(this).parents('.gt3_hours_of_operation_item').index();
        var input_value = jQuery(this).val();
        gt3_set_element_option(index,'hours',input_value,jQuery('#job_hours'));
    });

}

/**
 * GT3 Auto Locate View
 */
function gt3_auto_locateview() {
    if (jQuery('.gt3_auto_locate_view').length && '1' == gt3_wpjmel.enable_map) {
        var field_id_array = [ jQuery( '#gt3_auto_locate_searchform' ), jQuery( '#search_location' ) ];
        jQuery.each( field_id_array, function(key, $input) {
            if ( $input.length ) {
                $input.geo_tag_text({ latOutput : '#wpjmel_geo_lat', lngOutput : '#wpjmel_geo_long' });
                var autoComplete = this;
                var autoCompleteField	= new google.maps.places.Autocomplete( jQuery( autoComplete )[0] );
                jQuery( autoComplete ).on( 'change', jQuery( autoComplete ), function() {});
            }
        });
    }
}