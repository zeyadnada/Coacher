; (function ($, document, window) {
    var defaults = {
        label: 'MENU',
        prependTo: 'body',
        allowParentLinks: false
    };

    var mobileMenu = 'slicknav',
        prefix = 'slicknav';

    function Plugin(element, options) {
        this.element = element;
        this.settings = $.extend({}, defaults, options);
        this._name = mobileMenu;
        this.init();
    }

    Plugin.prototype.init = function () {
        var $this = this,
            menu = $(this.element),
            settings = this.settings,
            menuBar;

        // Clone or use original menu
        $this.mobileNav = menu;

        // Add class to the mobile nav
        $this.mobileNav.attr('class', prefix + '_nav');

        // Create menu bar
        menuBar = $('<div class="' + prefix + '_menu"></div>');

        // Create the toggle button
        $this.btn = $(
            '<a aria-haspopup="true" role="button" tabindex="0" class="' + prefix + '_btn ' + prefix + '_collapsed">' +
            '<span class="' + prefix + '_menutxt">' + settings.label + '</span>' +
            '<span class="' + prefix + '_icon">' +
            '<span class="' + prefix + '_icon-bar"></span>' +
            '<span class="' + prefix + '_icon-bar"></span>' +
            '<span class="' + prefix + '_icon-bar"></span>' +
            '</span>' +
            '</a>'
        );

        $(menuBar).append($this.btn);
        $(settings.prependTo).prepend(menuBar);
        menuBar.append($this.mobileNav);

        // Iterate over structure adding accessibility attributes
        $this.mobileNav.find('li').each(function () {
            var item = $(this);

            // If the item has children
            if (item.children('ul').length > 0) {
                item.addClass(prefix + '_parent');
                var arrowElement = $('<span class="' + prefix + '_arrow"></span>');
                item.children('a').after(arrowElement);
            }

            // Allow parent links if specified
            if (settings.allowParentLinks) {
                item.children('a').attr('role', 'menuitem');
            }
        });
    };

    $.fn[mobileMenu] = function (options) {
        return this.each(function () {
            if (!$.data(this, 'plugin_' + mobileMenu)) {
                $.data(this, 'plugin_' + mobileMenu, new Plugin(this, options));
            }
        });
    };
})(jQuery, document, window);