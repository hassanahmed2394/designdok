!function(a, b, c, d) {
    var e = "jPages", f = null, g = {
        containerID: "",
        first: false,
        previous: "← previous",
        next: "next →",
        last: false,
        links: "numeric",
        startPage: 1,
        perPage: 10,
        midRange: 5,
        startRange: 1,
        endRange: 1,
        keyBrowse: false,
        scrollBrowse: false,
        pause: 0,
        clickStop: false,
        delay: 50,
        direction: "forward",
        animation: "",
        fallback: 400,
        minHeight: true,
        callback: d
    };
    function h(d, e) {
        this.options = a.extend({}, g, e);
        this._container = a("#" + this.options.containerID);
        if (!this._container.length) return;
        this.jQwindow = a(b);
        this.jQdocument = a(c);
        this._holder = a(d);
        this._nav = {};
        this._first = a(this.options.first);
        this._previous = a(this.options.previous);
        this._next = a(this.options.next);
        this._last = a(this.options.last);
        this._items = this._container.children(":visible");
        this._itemsShowing = a([]);
        this._itemsHiding = a([]);
        this._numPages = Math.ceil(this._items.length / this.options.perPage);
        this._currentPageNum = this.options.startPage;
        this._clicked = false;
        this._cssAnimSupport = this.getCSSAnimationSupport();
        this.init();
    }
    h.prototype = {
        constructor: h,
        getCSSAnimationSupport: function() {
            var a = false, b = "animation", c = "", e = "Webkit Moz O ms Khtml".split(" "), f = "", g = this._container.get(0);
            if (g.style.animationName) a = true;
            if (false === a) for (var h = 0; h < e.length; h++) if (g.style[e[h] + "AnimationName"] !== d) {
                f = e[h];
                b = f + "Animation";
                c = "-" + f.toLowerCase() + "-";
                a = true;
                break;
            }
            return a;
        },
        init: function() {
            this.setStyles();
            this.setNav();
            this.paginate(this._currentPageNum);
            this.setMinHeight();
        },
        setStyles: function() {
            var b = "<style>" + ".jp-invisible { visibility: hidden !important; } " + ".jp-hidden { display: none !important; }" + "</style>";
            a(b).appendTo("head");
            if (this._cssAnimSupport && this.options.animation.length) this._items.addClass("animated jp-hidden"); else this._items.hide();
        },
        setNav: function() {
            var b = this.writeNav();
            this._holder.each(this.bind(function(c, d) {
                var e = a(d);
                e.html(b);
                this.cacheNavElements(e, c);
                this.bindNavHandlers(c);
                this.disableNavSelection(d);
            }, this));
            if (this.options.keyBrowse) this.bindNavKeyBrowse();
            if (this.options.scrollBrowse) this.bindNavScrollBrowse();
        },
        writeNav: function() {
            var a = 1, b;
            b = this.writeBtn("first") + this.writeBtn("previous");
            for (;a <= this._numPages; a++) {
                if (1 === a && 0 === this.options.startRange) b += "<span>...</span>";
                if (a > this.options.startRange && a <= this._numPages - this.options.endRange) b += "<a href='#' class='jp-hidden'>"; else b += "<a>";
                switch (this.options.links) {
                  case "numeric":
                    b += a;
                    break;

                  case "blank":
                    break;

                  case "title":
                    var c = this._items.eq(a - 1).attr("data-title");
                    b += c !== d ? c : "";
                }
                b += "</a>";
                if (a === this.options.startRange || a === this._numPages - this.options.endRange) b += "<span>...</span>";
            }
            b += this.writeBtn("next") + this.writeBtn("last") + "</div>";
            return b;
        },
        writeBtn: function(b) {
            return false !== this.options[b] && !a(this["_" + b]).length ? "<a class='jp-" + b + "'>" + this.options[b] + "</a>" : "";
        },
        cacheNavElements: function(b, c) {
            this._nav[c] = {};
            this._nav[c].holder = b;
            this._nav[c].first = this._first.length ? this._first : this._nav[c].holder.find("a.jp-first");
            this._nav[c].previous = this._previous.length ? this._previous : this._nav[c].holder.find("a.jp-previous");
            this._nav[c].next = this._next.length ? this._next : this._nav[c].holder.find("a.jp-next");
            this._nav[c].last = this._last.length ? this._last : this._nav[c].holder.find("a.jp-last");
            this._nav[c].fstBreak = this._nav[c].holder.find("span:first");
            this._nav[c].lstBreak = this._nav[c].holder.find("span:last");
            this._nav[c].pages = this._nav[c].holder.find("a").not(".jp-first, .jp-previous, .jp-next, .jp-last");
            this._nav[c].permPages = this._nav[c].pages.slice(0, this.options.startRange).add(this._nav[c].pages.slice(this._numPages - this.options.endRange, this._numPages));
            this._nav[c].pagesShowing = a([]);
            this._nav[c].currentPage = a([]);
        },
        bindNavHandlers: function(b) {
            var c = this._nav[b];
            c.holder.bind("click.jPages", this.bind(function(b) {
                var d = this.getNewPage(c, a(b.target));
                if (this.validNewPage(d)) {
                    this._clicked = true;
                    this.paginate(d);
                }
                b.preventDefault();
            }, this));
            if (this._first.length) this._first.bind("click.jPages", this.bind(function() {
                if (this.validNewPage(1)) {
                    this._clicked = true;
                    this.paginate(1);
                }
            }, this));
            if (this._previous.length) this._previous.bind("click.jPages", this.bind(function() {
                var a = this._currentPageNum - 1;
                if (this.validNewPage(a)) {
                    this._clicked = true;
                    this.paginate(a);
                }
            }, this));
            if (this._next.length) this._next.bind("click.jPages", this.bind(function() {
                var a = this._currentPageNum + 1;
                if (this.validNewPage(a)) {
                    this._clicked = true;
                    this.paginate(a);
                }
            }, this));
            if (this._last.length) this._last.bind("click.jPages", this.bind(function() {
                if (this.validNewPage(this._numPages)) {
                    this._clicked = true;
                    this.paginate(this._numPages);
                }
            }, this));
        },
        disableNavSelection: function(a) {
            if ("undefined" != typeof a.onselectstart) a.onselectstart = function() {
                return false;
            }; else if ("undefined" != typeof a.style.MozUserSelect) a.style.MozUserSelect = "none"; else a.onmousedown = function() {
                return false;
            };
        },
        bindNavKeyBrowse: function() {
            this.jQdocument.bind("keydown.jPages", this.bind(function(a) {
                var b = a.target.nodeName.toLowerCase();
                if (this.elemScrolledIntoView() && "input" !== b && "textarea" != b) {
                    var c = this._currentPageNum;
                    if (37 == a.which) c = this._currentPageNum - 1;
                    if (39 == a.which) c = this._currentPageNum + 1;
                    if (this.validNewPage(c)) {
                        this._clicked = true;
                        this.paginate(c);
                    }
                }
            }, this));
        },
        elemScrolledIntoView: function() {
            var a, b, c, d;
            a = this.jQwindow.scrollTop();
            b = a + this.jQwindow.height();
            c = this._container.offset().top;
            d = c + this._container.height();
            return d >= a && c <= b;
        },
        bindNavScrollBrowse: function() {
            this._container.bind("mousewheel.jPages DOMMouseScroll.jPages", this.bind(function(a) {
                var b = (a.originalEvent.wheelDelta || -a.originalEvent.detail) > 0 ? this._currentPageNum - 1 : this._currentPageNum + 1;
                if (this.validNewPage(b)) {
                    this._clicked = true;
                    this.paginate(b);
                }
                a.preventDefault();
                return false;
            }, this));
        },
        getNewPage: function(a, b) {
            if (b.is(a.currentPage)) return this._currentPageNum;
            if (b.is(a.pages)) return a.pages.index(b) + 1;
            if (b.is(a.first)) return 1;
            if (b.is(a.last)) return this._numPages;
            if (b.is(a.previous)) return a.pages.index(a.currentPage);
            if (b.is(a.next)) return a.pages.index(a.currentPage) + 2;
        },
        validNewPage: function(a) {
            return a !== this._currentPageNum && a > 0 && a <= this._numPages;
        },
        paginate: function(b) {
            var c, d;
            c = this.updateItems(b);
            d = this.updatePages(b);
            this._currentPageNum = b;
            if (a.isFunction(this.options.callback)) this.callback(b, c, d);
            this.updatePause();
        },
        updateItems: function(a) {
            var b = this.getItemRange(a);
            this._itemsHiding = this._itemsShowing;
            this._itemsShowing = this._items.slice(b.start, b.end);
            if (this._cssAnimSupport && this.options.animation.length) this.cssAnimations(a); else this.jQAnimations(a);
            return b;
        },
        getItemRange: function(a) {
            var b = {};
            b.start = (a - 1) * this.options.perPage;
            b.end = b.start + this.options.perPage;
            if (b.end > this._items.length) b.end = this._items.length;
            return b;
        },
        cssAnimations: function(a) {
            clearInterval(this._delay);
            this._itemsHiding.removeClass(this.options.animation + " jp-invisible").addClass("jp-hidden");
            this._itemsShowing.removeClass("jp-hidden").addClass("jp-invisible");
            this._itemsOriented = this.getDirectedItems(a);
            this._index = 0;
            this._delay = setInterval(this.bind(function() {
                if (this._index === this._itemsOriented.length) clearInterval(this._delay); else this._itemsOriented.eq(this._index).removeClass("jp-invisible").addClass(this.options.animation);
                this._index = this._index + 1;
            }, this), this.options.delay);
        },
        jQAnimations: function(a) {
            clearInterval(this._delay);
            this._itemsHiding.addClass("jp-hidden");
            this._itemsShowing.fadeTo(0, 0).removeClass("jp-hidden");
            this._itemsOriented = this.getDirectedItems(a);
            this._index = 0;
            this._delay = setInterval(this.bind(function() {
                if (this._index === this._itemsOriented.length) clearInterval(this._delay); else this._itemsOriented.eq(this._index).fadeTo(this.options.fallback, 1);
                this._index = this._index + 1;
            }, this), this.options.delay);
        },
        getDirectedItems: function(b) {
            var c;
            switch (this.options.direction) {
              case "backwards":
                c = a(this._itemsShowing.get().reverse());
                break;

              case "random":
                c = a(this._itemsShowing.get().sort(function() {
                    return Math.round(Math.random()) - .5;
                }));
                break;

              case "auto":
                c = b >= this._currentPageNum ? this._itemsShowing : a(this._itemsShowing.get().reverse());
                break;

              default:
                c = this._itemsShowing;
            }
            return c;
        },
        updatePages: function(a) {
            var b, c, d;
            b = this.getInterval(a);
            for (c in this._nav) if (this._nav.hasOwnProperty(c)) {
                d = this._nav[c];
                this.updateBtns(d, a);
                this.updateCurrentPage(d, a);
                this.updatePagesShowing(d, b);
                this.updateBreaks(d, b);
            }
            return b;
        },
        getInterval: function(a) {
            var b, c, d, e;
            b = Math.ceil(this.options.midRange / 2);
            c = this._numPages - this.options.midRange;
            d = a > b ? Math.max(Math.min(a - b, c), 0) : 0;
            e = a > b ? Math.min(a + b - (this.options.midRange % 2 > 0 ? 1 : 0), this._numPages) : Math.min(this.options.midRange, this._numPages);
            return {
                start: d,
                end: e
            };
        },
        updateBtns: function(a, b) {
            if (1 === b) {
                a.first.addClass("jp-disabled");
                a.previous.addClass("jp-disabled");
            }
            if (b === this._numPages) {
                a.next.addClass("jp-disabled");
                a.last.addClass("jp-disabled");
            }
            if (1 === this._currentPageNum && b > 1) {
                a.first.removeClass("jp-disabled");
                a.previous.removeClass("jp-disabled");
            }
            if (this._currentPageNum === this._numPages && b < this._numPages) {
                a.next.removeClass("jp-disabled");
                a.last.removeClass("jp-disabled");
            }
        },
        updateCurrentPage: function(a, b) {
            a.currentPage.removeClass("jp-current");
            a.currentPage = a.pages.eq(b - 1).addClass("jp-current");
        },
        updatePagesShowing: function(a, b) {
            var c = a.pages.slice(b.start, b.end).not(a.permPages);
            a.pagesShowing.not(c).addClass("jp-hidden");
            c.not(a.pagesShowing).removeClass("jp-hidden");
            a.pagesShowing = c;
        },
        updateBreaks: function(a, b) {
            if (b.start > this.options.startRange || 0 === this.options.startRange && b.start > 0) a.fstBreak.removeClass("jp-hidden"); else a.fstBreak.addClass("jp-hidden");
            if (b.end < this._numPages - this.options.endRange) a.lstBreak.removeClass("jp-hidden"); else a.lstBreak.addClass("jp-hidden");
        },
        callback: function(a, b, c) {
            var d = {
                current: a,
                interval: c,
                count: this._numPages
            }, e = {
                showing: this._itemsShowing,
                oncoming: this._items.slice(b.start + this.options.perPage, b.end + this.options.perPage),
                range: b,
                count: this._items.length
            };
            d.interval.start = d.interval.start + 1;
            e.range.start = e.range.start + 1;
            this.options.callback(d, e);
        },
        updatePause: function() {
            if (this.options.pause && this._numPages > 1) {
                clearTimeout(this._pause);
                if (this.options.clickStop && this._clicked) return; else this._pause = setTimeout(this.bind(function() {
                    this.paginate(this._currentPageNum !== this._numPages ? this._currentPageNum + 1 : 1);
                }, this), this.options.pause);
            }
        },
        setMinHeight: function() {
            if (this.options.minHeight && !this._container.is("table, tbody")) setTimeout(this.bind(function() {
                this._container.css({
                    "min-height": this._container.css("height")
                });
            }, this), 1e3);
        },
        bind: function(a, b) {
            return function() {
                return a.apply(b, arguments);
            };
        },
        destroy: function() {
            this.jQdocument.unbind("keydown.jPages");
            this._container.unbind("mousewheel.jPages DOMMouseScroll.jPages");
            if (this.options.minHeight) this._container.css("min-height", "");
            if (this._cssAnimSupport && this.options.animation.length) this._items.removeClass("animated jp-hidden jp-invisible " + this.options.animation); else this._items.removeClass("jp-hidden").fadeTo(0, 1);
            this._holder.unbind("click.jPages").empty();
        }
    };
    a.fn[e] = function(b) {
        var c = a.type(b);
        if ("object" === c) {
            if (this.length && !a.data(this, e)) {
                f = new h(this, b);
                this.each(function() {
                    a.data(this, e, f);
                });
            }
            return this;
        }
        if ("string" === c && "destroy" === b) {
            f.destroy();
            this.each(function() {
                a.removeData(this, e);
            });
            return this;
        }
        if ("number" === c && b % 1 === 0) {
            if (f.validNewPage(b)) f.paginate(b);
            return this;
        }
        return this;
    };
}(jQuery, window, document);