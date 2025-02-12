/** PIXWELL_CORE_SCRIPT */
var PIXWELL_CORE_SCRIPT = (function (Module, $) {
    "use strict";

    Module.init = function () {
        let self = this;
        this._body = $('body');
        $(window).trigger('RB:CountBookmark');
        this.darkModeID = pixwellCoreParams.darkModeID || 'RubyDarkMode';
        this.isCMode = document.body.classList.contains("is-cmode");

        self.newsLetterSubmit();
        self.initDarkModeCookie();
        self.rbCookie();
        self.headerStrip();
        self.bookMarkCounter();
        self.bookmarkList();
        self.removeBookmarkList();
        self.removeBookMark();
        self.newsLetterPopup();
        self.switchDarkMode();
        self.noteToggle();
        self.accordion();
    };

    Module.initReaction = function () {
        this.clickReaction();
        this.loadReactions();
    }

    Module.rbBookMarks = function () {
        this.loadBookMarks();
        this.addBookMark();
    };

    /** module newsletter */
    Module.newsLetterSubmit = function () {
        $('.rb-newsletter-form').submit(function (e) {
            e.preventDefault();
            e.stopPropagation();
            let target = $(this);
            let responseWrap = target.closest('.rb-newsletter').find('.newsletter-response');
            responseWrap.find('.is-show').removeClass('is-show');
            let subscribeEmail = target.find('input[name="rb_email_subscribe"]').val();
            if (!subscribeEmail) {
                responseWrap.find('.email-error').addClass('is-show');
                responseWrap.find('.email-error').addClass('showing');
                return false;
            }

            let postData = {
                action: 'rb_submit_newsletter',
                email: subscribeEmail
            };

            let privacy = target.find(':checkbox[name="rb_privacy"]');
            if (privacy != null && privacy.length > 0) {
                let privacyVal = privacy.prop('checked');
                if (!privacyVal) {
                    responseWrap.find('.privacy-error').addClass('is-show showing');
                    return false;
                } else {
                    postData.privacy = privacyVal;
                }
            }

            $.ajax({
                type: 'POST',
                url: pixwellParams.ajaxurl,
                data: postData,
                success: function (response) {
                    responseWrap.find('.' + response.notice).addClass('is-show');
                    responseWrap.find('.' + response.notice).addClass('showing');
                }
            });

            return false;
        });
    };

    /** Newsletter popup */
    Module.newsLetterPopup = function () {

        if ($(window).width() < 768) {
            return;
        }

        let targetID = '#rb-newsletter-popup';
        if ($(targetID).length > 0 && '1' !== $.cookie('ruby_newsletter_popup')) {
            let delay = $(targetID).data('delay');
            if (!delay) {
                delay = 2000;
            }
            setTimeout(function () {
                if (PIXWELL_MAIN_SCRIPTS && true === PIXWELL_MAIN_SCRIPTS.siteAccessFlag) {
                    return;
                }
                $.magnificPopup.open({
                    type: 'inline',
                    preloader: false,
                    closeBtnInside: true,
                    removalDelay: 300,
                    showCloseBtn: true,
                    closeOnBgClick: false,
                    disableOn: 992,
                    items: {
                        src: targetID,
                        type: 'inline'
                    },
                    mainClass: 'rb-popup-effect',
                    fixedBgPos: true,
                    fixedContentPos: true,
                    closeMarkup: '<button id="rb-close-newsletter" title="%title%" aria-label="%title%" class="mfp-close"><i class="rbi rbi-move"></i></button>',
                    callbacks: {
                        close: function () {
                            let expiresTime = $(targetID).data('expired');
                            $.cookie('ruby_newsletter_popup', '1', {expires: parseInt(expiresTime), path: '/'});
                        }
                    }
                });

            }, delay);
        }
    };

    Module.noteToggle = function () {
        $('.yes-toggle > .note-header').on('click', function () {
            let wrapper = $(this).parent();
            let timing = wrapper.hasClass('is-inline') ? 0 : 300;

            wrapper.toggleClass('explain');
            wrapper.find('.note-content').slideToggle(timing);
        });
    }

    //share action
    Module.sharesAction = function () {
        $('a.share-action').off('click').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            window.open($(this).attr('href'), '_blank', 'width=600, height=350');
            return false;
        })
    };

    /** rb cookie */
    Module.rbCookie = function () {
        let rbCookie = $('#rb-cookie');
        if (rbCookie.length > 0) {
            if ($.cookie('ruby_cookie_popup') !== '1') {
                rbCookie.css('display', 'block');
                setTimeout(function () {
                    rbCookie.addClass('is-show');
                }, 10)
            }

            $('#cookie-accept').off('click').on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                $.cookie('ruby_cookie_popup', '1', {expires: 30, path: '/'});
                rbCookie.removeClass('is-show');
                setTimeout(function () {
                    rbCookie.css('display', 'none');
                }, 500)
            })
        }
    };

    /** header strip */
    Module.headerStrip = function () {
        let headerStrips = $('.rb-headerstrip');
        if (headerStrips.length > 0) {
            headerStrips.each(function () {
                let headerStrip = $(this);
                let id = headerStrip.attr('id');
                if ($.cookie(id) !== '1') {
                    headerStrip.css('display', 'block');
                }
            });
        }

        $('.headerstrip-submit').off('click').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            let wrap = $(this).parents('.rb-headerstrip');
            let expired = wrap.data('headerstrip');
            if (!expired) {
                expired = 30;
            }
            let id = wrap.attr('id');
            $.cookie(id, '1', {expires: expired, path: '/'});
            wrap.slideUp(300, function () {
                wrap.remove();
            });
        });
    };

    /** add bookmark */
    Module.addBookMark = function () {
        let self = this;
        $('.read-it-later').off('click').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            let target = $(this);
            let postID = target.data('bookmarkid');
            if (!postID) {
                return;
            }
            let dataBookMark = $.cookie('RBBookmarkData');
            if (dataBookMark) {
                dataBookMark = JSON.parse(dataBookMark);
            }

            if (typeof dataBookMark != 'object' || null == dataBookMark || !dataBookMark) {
                dataBookMark = [];
            }

            dataBookMark = self.toggleArrayItem(target, dataBookMark, postID);
            $.cookie('RBBookmarkData', JSON.stringify(dataBookMark), {expires: 30, path: '/'});
            $(window).trigger('RB:CountBookmark');
        });
    };

    /** toggle data */
    Module.toggleArrayItem = function (target, data, value) {
        let i = $.inArray(value, data);
        if (i === -1) {
            $('[data-bookmarkid= ' + value + ']').addClass('added');
            data.push(value);
        } else {
            $('[data-bookmarkid= ' + value + ']').removeClass('added');
            data.splice(i, 1);
        }
        return data;
    };

    /** remove bookmarks */
    Module.removeBookmarkList = function () {
        $('#remove-bookmark-list').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $.removeCookie('RBBookmarkData', {path: '/'});
            window.location.reload();
        })
    };

    Module.loadBookMarks = function () {
        let dataBookMark = $.cookie('RBBookmarkData');
        if (dataBookMark) {
            dataBookMark = JSON.parse(dataBookMark);
        }
        $('.read-it-later:not(.loaded)').each(function () {
            let target = $(this);
            target.addClass('loaded');

            let postID = target.data('bookmarkid');
            if (!postID) {
                return;
            }
            let i = $.inArray(postID, dataBookMark);
            if (i !== -1) {
                target.addClass('added');
            }
        });
        $(window).trigger('RB:CountBookmark');
    };

    /** remove single bookmark */
    Module.removeBookMark = function () {
        let removeID = $('.rb-remove-bookmark').data('bookmarkid');
        if (removeID) {
            let dataBookMark = $.cookie('RBBookmarkData');
            if (dataBookMark) {
                dataBookMark = JSON.parse(dataBookMark);
            }
            if (typeof dataBookMark != 'object') {
                return;
            }
            let i = $.inArray(removeID, dataBookMark);
            if (i != -1) {
                dataBookMark.splice(i, 1);
            }
            $.cookie('RBBookmarkData', JSON.stringify(dataBookMark), {expires: 30, path: '/'});
        }
    };

    /** total bookmarks */
    Module.bookMarkCounter = function () {
        $(window).on('RB:CountBookmark', function () {
            let dataBookMark = $.cookie('RBBookmarkData');
            if (dataBookMark) {
                dataBookMark = JSON.parse(dataBookMark);
                if (dataBookMark != null && dataBookMark.length > 0) {
                    $('.bookmark-counter').fadeOut(0).html(dataBookMark.length).fadeIn(200);
                }
            }
        });
    };

    /** ajax get bookmark list */
    Module.bookmarkList = function () {

        let bookmarkList = $('#bookmarks-list');
        if (null == bookmarkList || bookmarkList.length < 1) {
            return;
        }
        let dataBookMark = $.cookie('RBBookmarkData');
        if (dataBookMark) {
            dataBookMark = JSON.parse(dataBookMark);
        }

        $.ajax({
            type: 'POST',
            url: pixwellParams.ajaxurl,
            data: {
                action: 'rb_bookmark',
                ids: dataBookMark
            },
            success: function (data) {
                data = $.parseJSON(JSON.stringify(data));
                $('#bookmarks-list').html(data);
                $(window).trigger('load');
            }
        });
    };

    Module.setDarkModeCookie = function (id, value) {
        if (this.isCMode) {
            var date = new Date()
            date.setTime(date.getTime() + 5184000000);
            document.cookie = id + '= ' + value + '; path=/; expires=' + date.toGMTString() + ';';
        }
    }

    Module.initDarkModeCookie = function () {
        if (this.isCMode && !$.cookie(this.darkModeID)) {
            $.cookie(this.darkModeID, document.body.getAttribute('data-theme'), {expires: 60, path: '/'});
        }
    }

    Module.switchDarkMode = function () {
        let self = this;
        let darkModeID = pixwellCoreParams.darkModeID;

        $('.dark-mode-toggle').off('click').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            if (!$(this).hasClass('trigged')) {
                $(this).addClass('trigged')
            }

            let iconDefault = $('.mode-icon-default');
            let iconDark = $('.mode-icon-dark');

            let currentMode = localStorage.getItem(darkModeID);
            if (null === currentMode) {
                currentMode = self._body.data('theme');
            }

            self._body.addClass('switch-smooth');

            if (null === currentMode || 'default' === currentMode) {
                localStorage.setItem(darkModeID, 'dark');
                self._body.attr('data-theme', 'dark');
                iconDefault.removeClass('activated');
                iconDark.addClass('activated');
                self.setDarkModeCookie(darkModeID, 'dark');
            } else {
                localStorage.setItem(darkModeID, 'default');
                self._body.attr('data-theme', 'default');
                iconDefault.addClass('activated');
                iconDark.removeClass('activated');
                self.setDarkModeCookie(darkModeID, 'default');
            }
        })
    };

    /** reaction */
    Module.loadReactions = function () {
        let self = this;

        self.reaction = $('.rb-reaction');
        if (self.reaction.length < 1) {
            return;
        }
        self.reactionProcessing = false;
        self.reaction.each(function () {
            let currentReaction = $(this);
            let uid = currentReaction.data('reaction_uid');
            if (!currentReaction.hasClass('data-loaded')) {
                self.loadCurrentReaction(currentReaction, uid);
            }
        });
    };

    Module.loadCurrentReaction = function (currentReaction, uid) {
        let self = this;
        self.reactionProcessing = true;
        $.ajax({
            type: 'POST',
            url: pixwellParams.ajaxurl,
            data: {
                action: 'rb_load_reaction',
                uid: uid
            },
            success: function (data) {
                data = $.parseJSON(JSON.stringify(data));
                $.each(data, function (index, val) {
                    currentReaction.find('[data-reaction=' + val + ']').addClass('active');
                });
                currentReaction.addClass('data-loaded');
                self.reactionProcessing = false;
            }
        });
    };

    Module.clickReaction = function () {

        let self = this;
        $('.reaction').off('click').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            let target = $(this);
            let reaction = target.data('reaction');
            let uid = target.data('reaction_uid');
            let push = 1;

            if (self.reactionProcessing) {
                return;
            }
            target.addClass('loading');
            self.reactionProcessing = true;
            let reactionCount = target.find('.reaction-count');
            let total = parseInt(reactionCount.html());
            if (target.hasClass('active')) {
                total--;
                push = '-1';
            } else {
                total++;
            }
            $.ajax({
                type: 'POST',
                url: pixwellParams.ajaxurl,
                data: {
                    action: 'rb_add_reaction',
                    uid: uid,
                    reaction: reaction,
                    push: push
                },

                success: function (data) {
                    if (true !== data) {
                        let oldReactions = target.siblings('.active');
                        if (oldReactions.length > 0) {
                            $.each(oldReactions, function () {
                                $(this).removeClass('active');
                                let oldReactionCount = $(this).find('.reaction-count');
                                let oldTotal = parseInt(oldReactionCount.html()) - 1;
                                oldReactionCount.hide().html(oldTotal).fadeIn(300);
                            });
                        }
                    }
                    reactionCount.hide().html(total).fadeIn(300);
                    target.toggleClass('active');
                    target.removeClass('loading');
                    self.reactionProcessing = false;
                }
            });

            return false;
        });
    };

    Module.accordion = function () {
        $('.gb-accordion').each(function () {
            const accordion = $(this);
            const accordionItems = accordion.find('.gb-accordion-item');

            if (accordion.hasClass('yes-open')) {
                accordionItems.first().addClass('active');
            }

            accordionItems.on('click', function () {
                const item = $(this);
                const isActive = item.hasClass('active');

                if (!isActive) {
                    const activeItem = accordionItems.filter('.active');
                    activeItem.removeClass('active').find('.accordion-item-content').slideUp(250, function () {
                        $(this).css('display', 'none');
                    });

                    item.addClass('active').find('.accordion-item-content').slideDown(250, function () {
                        $(this).css('display', 'block');
                    });
                } else {
                    item.removeClass('active').find('.accordion-item-content').slideUp(250, function () {
                        $(this).css('display', 'none');
                    });
                }
            });
        });
    };

    return Module;

}(PIXWELL_CORE_SCRIPT || {}, jQuery));

jQuery(document).ready(function () {
    PIXWELL_CORE_SCRIPT.init();
});

jQuery(window).on('load', function () {
    PIXWELL_CORE_SCRIPT.sharesAction();
    PIXWELL_CORE_SCRIPT.rbBookMarks();
    PIXWELL_CORE_SCRIPT.initReaction();
});