(function ($) {
    "use strict";
    $.fn.popup = function (opts) {
        return new popup(this[0], opts);
    };
    var queue = [];
    var popup = function (containerEl, opts) {


        if (typeof containerEl === "string" || containerEl instanceof String) {
            this.container = document.getElementById(containerEl);
        } else {
            this.container = containerEl;
        }
        if (!this.container) {
            window.alert("Error finding container for popup " + containerEl);
            return;
        }


        try {
            if (typeof (opts) === "string" || typeof (opts) === "number")
                opts = {
                    message: opts,
                    cancelOnly: "true",
                    cancelText: "OK"
                };
            this.id = opts.id = opts.id; //opts is passed by reference
            this.addCssClass = opts.addCssClass ? opts.addCssClass : "";
            this.suppressTitle = opts.suppressTitle || this.suppressTitle;
            this.title = opts.suppressTitle ? "" : (opts.title || "Alert");
            this.message = opts.message || "";
            this.cancelText = opts.cancelText || "Cancel";
            this.cancelCallback = opts.cancelCallback || function () {};
            this.cancelClass = opts.cancelClass || "button";
            this.doneText = opts.doneText || "Done";
            this.doneCallback = opts.doneCallback || function () {
                // no action by default
            };
            this.doneClass = opts.doneClass || "button";
            this.cancelOnly = opts.cancelOnly || false;
            this.effectTime = opts.effectTime || 200;
            this.onShow = opts.onShow || function () {};
            this.autoCloseDone = opts.autoCloseDone !== undefined ? opts.autoCloseDone : true;


            queue.push(this);
            if (queue.length === 1)
                this.show();
        } catch (e) {
            console.log("error adding popup " + e);
        }


    };


    popup.prototype = {
        id: null,
        addCssClass: null,
        title: null,
        message: null,
        cancelText: null,
        cancelCallback: null,
        cancelClass: null,
        doneText: null,
        doneCallback: null,
        doneClass: null,
        cancelOnly: false,
        effectTime: null,
        onShow: null,
        autoCloseDone: true,
        suppressTitle: false,
        show: function () {
            var self = this;
            var markup = "<div id='" + this.id + "' class='popup hidden "+ this.addCssClass + "'>"+
                        "<header>" + this.title + "</header>"+
                        "<div class='popup_cont'>" + this.message + "</div>"+
                        "<footer>"+
                             "<a href='javascript:;' class='" + this.doneClass + "' id='action'>" + this.doneText + "</a>"+
                             "<a href='javascript:;' class='" + this.cancelClass + "' id='cancel'>" + this.cancelText + "</a>"+
                             "<div style='clear:both'></div>"+
                        "</footer>"+
                        "</div>";


            var $el=$(markup);
            $(this.container).append($el);
            $el.bind("close", function () {
                self.hide();
            });


            if (this.cancelOnly) {
                $el.find("A#action").hide();
                $el.find("A#cancel").addClass("center");
            }
            $el.find("A").each(function () {
                var button = $(this);
                button.bind("click", function (e) {
                    if (button.attr("id") === "cancel") {
                        self.cancelCallback.call(self.cancelCallback, self);
                        self.hide();
                    } else {
                        self.doneCallback.call(self.doneCallback, self);
                        if (self.autoCloseDone)
                            self.hide();
                    }
                    e.preventDefault();
                });
            });
            self.positionPopup();
            $.blockUI(0.5);


            $el.bind("orientationchange", function () {
                self.positionPopup();
            });


            //force header/footer showing to fix CSS style bugs
            $el.show(this.effectTime)


        },


        hide: function () {
            var self = this;
            $("#" + self.id).addClass("hidden");
            $.unblockUI();
            self.remove();
        },


        remove: function () {
            var self = this;
            var $el = $("#" + self.id);
            $el.unbind("close");
            $el.find("BUTTON#action").unbind("click");
            $el.find("BUTTON#cancel").unbind("click");
            $el.unbind("orientationchange").hide(this.effectTime)
            setTimeout(function(){
                $el.remove();
            },this.effectTime)
        },


        positionPopup: function () {
            var popup = $("#" + this.id);


            popup.css("top", ((window.innerHeight / 2.5) + window.pageYOffset) - (popup[0].clientHeight / 2) + "px");
            popup.css("left", (window.innerWidth / 2) - (popup[0].clientWidth / 2) + "px");
        }
    };
    var uiBlocked = false;
    $.blockUI = function (opacity) {
        if (uiBlocked)
            return;
        opacity = opacity ? " style='opacity:" + opacity + ";'" : "";
        $("BODY").prepend($("<div id='mask'" + opacity + " class='popup_bg'></div>"));
        $("BODY DIV#mask").bind("touchstart", function (e) {
            e.preventDefault();
        });
        $("BODY DIV#mask").bind("touchmove", function (e) {
            e.preventDefault();
        });
        uiBlocked = true;
    };


    $.unblockUI = function () {
        uiBlocked = false;
        $("BODY DIV#mask").unbind("touchstart");
        $("BODY DIV#mask").unbind("touchmove");
        $("BODY DIV#mask").fadeOut(this.effectTime)
        setTimeout(function(){
            $("BODY DIV#mask").remove();
        },this.effectTime)
    };




    $.popup=function(opts){
        return $(document.body).popup(opts);
    };


})(jQuery);