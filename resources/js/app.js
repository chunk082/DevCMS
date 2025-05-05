(self.webpackChunk = self.webpackChunk || []).push([[260], {
    918: (e, t, n) => {
        "use strict";
        var a = n(599),
            o = n(909),
            r = n(755),
            i = n.n(r),
            s = (n(295), n(976), n(9), n(755));
        function c(e) {
            return function(e) {
                    if (Array.isArray(e))
                        return l(e)
                }(e) || function(e) {
                    if ("undefined" != typeof Symbol && null != e[Symbol.iterator] || null != e["@@iterator"])
                        return Array.from(e)
                }(e) || function(e, t) {
                    if (!e)
                        return;
                    if ("string" == typeof e)
                        return l(e, t);
                    var n = Object.prototype.toString.call(e).slice(8, -1);
                    "Object" === n && e.constructor && (n = e.constructor.name);
                    if ("Map" === n || "Set" === n)
                        return Array.from(e);
                    if ("Arguments" === n || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))
                        return l(e, t)
                }(e) || function() {
                    throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
                }()
        }
        function l(e, t) {
            (null == t || t > e.length) && (t = e.length);
            for (var n = 0, a = new Array(t); n < t; n++)
                a[n] = e[n];
            return a
        }
        function d(e) {
            e.preventDefault(),
            s("#gifting-alert-messages").empty();
            var t = s(this).serialize(),
                n = window.config.giftVipStoreUrl;
            s("#confirm-checkbox").is(":checked") && (t = s(this).serialize() + "&confirm=true"),
            s.ajax({
                type: "POST",
                url: n,
                data: t,
                dataType: "json",
                success: u,
                error: f
            })
        }
        function u(e) {
            e.needConfirmation ? (s("#giftVIPModal #confirmation-details").html('<span class="fw-bold">Username:</span> '.concat(e.username, '<br/> <span class="fw-bold">VIP Rank:</span> ').concat(e.productName, '<br/> <span class="fw-bold">Price:</span> &pound;').concat(e.price)), s("#giftVIPModal #confirmation-section").show()) : (s("#giftVIPModal #gift-vip-form #confirmation-section").hide(), s("#giftVIPModal #confirm-checkbox").prop("checked", !1), s("#giftVIPModal #gift-vip-form #username").val(""));
            var t = '<div class="alert alert-success" role="alert">'.concat(e.success, "</div>");
            s("#giftVIPModal #gifting-alert-messages").html(t)
        }
        function f(e) {
            var t = e.responseJSON.error;
            if (t) {
                var n = '<div class="alert alert-danger" role="alert">'.concat(t, "</div>");
                s("#gifting-alert-messages").html(n)
            }
        }
        n(755);
        var p = n(755);
        function m(e) {
            return function(e) {
                    if (Array.isArray(e))
                        return g(e)
                }(e) || function(e) {
                    if ("undefined" != typeof Symbol && null != e[Symbol.iterator] || null != e["@@iterator"])
                        return Array.from(e)
                }(e) || function(e, t) {
                    if (!e)
                        return;
                    if ("string" == typeof e)
                        return g(e, t);
                    var n = Object.prototype.toString.call(e).slice(8, -1);
                    "Object" === n && e.constructor && (n = e.constructor.name);
                    if ("Map" === n || "Set" === n)
                        return Array.from(e);
                    if ("Arguments" === n || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))
                        return g(e, t)
                }(e) || function() {
                    throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
                }()
        }
        function g(e, t) {
            (null == t || t > e.length) && (t = e.length);
            for (var n = 0, a = new Array(t); n < t; n++)
                a[n] = e[n];
            return a
        }
        function h() {
            var e = document.getElementById("cryptoAddress");
            if (e) {
                e.select(),
                document.execCommand("copy");
                var t = document.querySelector(".input-group-append button");
                if (t) {
                    var n = t.innerHTML;
                    t.innerHTML = '<i class="fas fa-check"></i>',
                    setTimeout((function() {
                        t.innerHTML = n
                    }), 2e3)
                }
            }
        }
        window.Popper = a,
        window.bootstrap = o,
        window.$ = i(),
        window.debounce = function(e, t, n) {
            var a;
            return function() {
                var o = this,
                    r = arguments,
                    i = function() {
                        a = null,
                        n || e.apply(o, r)
                    },
                    s = n && !a;
                clearTimeout(a),
                a = setTimeout(i, t),
                s && e.apply(o, r)
            }
        };
        var v = {
            pageId: 2,
            init: function() {
                p("#photos").length && (p(".load-photos").on("click", this.loadMorePhotos.bind(this)), p(document).on("click", ".like-photo", this.toggleLike))
            },
            loadMorePhotos: function(e) {
                e.preventDefault();
                var t = this;
                p.post("/gallery", {
                    page: this.pageId
                }, (function(e) {
                    t.pageId++,
                    e.data.last_page < t.pageId && p(".load-photos").fadeOut(),
                    e.data.forEach((function(e, n) {
                        var a = t.generatePhotoCard(e, n);
                        p("#photos").append(a)
                    })),
                    t.showNotification(t.pageId, "New photos have been loaded!"),
                    p("html, body").animate({
                        scrollTop: "+=600px"
                    }, 800)
                }))
            },
            generatePhotoCard: function(e, t) {
                var n = window.config && window.config.userId ? window.config.userId : 0,
                    a = e.likes.some((function(e) {
                        return e.id === n
                    })) ? "liked" : "",
                    o = t % 3 == 0 ? "blue" : t % 2 == 0 ? "aqua" : "dark-blue";
                return '\n            <div class="col-xl-4 col-lg-6 col-md-6 col-12">\n                <div class="card photo">\n                    <div class="card-body p-0">\n                        <div class="image" id="photo-'.concat(e.id, '" style="background-image: url(https://static.habboon.pw/camera/').concat(e.static_name, ');">\n                            <div class="actions">\n                                <a href="#" class="like-photo" data-id="').concat(e.id, '">\n                                    <i class="fas fa-heart ').concat(a, '"></i>&nbsp;\n                                    <span class="like-count-').concat(e.id, '">').concat(e.likes.length, '</span>\n                                </a>\n                            </div>\n                        </div>\n                    </div>\n\n                    <div class="card-footer ').concat(o, '">\n                        <div class="row align-items-center">\n                            <div class="col-3">\n                                <div class="me">\n                                    <img src="').concat(window.config.habboImagerUrl, "?figure=").concat(e.user.look, '&direction=3&head_direction=3&gesture=sml&headonly=1" alt="').concat(e.user.username, '" loading="lazy">\n                                </div>\n                            </div>\n\n                            <div class="col-9">\n                                <p>\n                                    <a href="#">').concat(e.user.username, '</a>\n                                    <br/>\n                                    <span style="color: #fff;">').concat(moment.unix(e.timestamp).format("DD/MM/YYYY"), "</span>\n                                </p>\n                            </div>\n                        </div>\n                    </div>\n                </div>\n            </div>")
            },
            toggleLike: function(e) {
                e.preventDefault();
                var t = p(this).data("id"),
                    n = (window.likePhotoUrl || "/gallery/like/PHOTO_ID").replace("PHOTO_ID", t);
                p.post(n, {
                    photoId: t
                }, (function(e) {
                    var n = e.id;
                    p(".like-count-" + t).text(e.likes),
                    "liked" === e.status ? p("#photo-" + t + " svg").addClass("liked") : p("#photo-" + t + " svg").removeClass("liked"),
                    v.showNotification(n, e.message)
                })).fail((function() {
                    v.showNotification(1, "You must be logged in to do this!")
                }))
            },
            showNotification: function(e, t) {
                p("#notification-center").prepend('<div class="alert alert-' + e + '">' + t + "</div>"),
                setTimeout((function() {
                    p(".alert-" + e).fadeOut()
                }), 3500)
            }
        };
        p(document).ready((function() {
            var e;
            m(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map((function(e) {
                return new o.Tooltip(e)
            }));
            e = "",
            c(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map((function(e) {
                return new bootstrap.Tooltip(e)
            })),
            s('[data-bs-toggle="modal"][data-bs-target="#giftVIPModal"]').click((function() {
                e = s(this).data("package"),
                s('#gift-vip-form input[name="product"]').val(e),
                s("#gifting-vip-package-name").text(e.replace("_", " "))
            })),
            s("#gift-vip-form").submit(d),
            s("#giftVIPModal").on("hidden.bs.modal", (function(e) {
                s("#giftVIPModal #confirm-checkbox").prop("checked", !1),
                s("#giftVIPModal #gift-vip-form #username").val(""),
                s("#giftVIPModal #gifting-alert-messages").empty(),
                s("#giftVIPModal #gift-vip-form #confirmation-section").hide()
            })),
            p.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": p('meta[name="csrf-token"]').attr("content")
                }
            });
            var t = p(".form");
            t.length > 0 && t.parsley({
                errorClass: "is-invalid",
                successClass: "is-valid",
                errorsWrapper: '<div class="invalid-feedback"></div>',
                errorTemplate: "<span></span>",
                trigger: "change"
            });
            var n = p(".camera-carousel");
            n.length > 0 && n.on({
                "initialized.owl.carousel": function() {
                    n.find(".item").show(),
                    n.find(".loading-placeholder").hide()
                }
            }).owlCarousel({
                loop: !0,
                margin: 10,
                nav: !1,
                items: 4,
                autoplay: !0,
                autoplaySpeed: 2500,
                autoplayTimeout: 2500,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1e3: {
                        items: 4
                    }
                }
            }),
            p(".read-more").on("click", (function(e) {
                e.preventDefault(),
                p("body,html").animate({
                    scrollTop: p(this.hash).offset().top
                }, 1e3)
            })),
            p(".select-category").length && p(".select-category").on("click", (function(e) {
                e.preventDefault();
                var t = p(this).data("category");
                p("#articles-row .article").each((function() {
                    var e = p(this).data("category");
                    0 === t || e === t ? p(this).fadeIn() : p(this).fadeOut()
                }))
            })),
            p(".btn-group .btn[data-currency]").length && p(".btn-group .btn").click((function() {
                var e = p(this).data("currency");
                p(".btn-group .btn").removeClass("active"),
                p('.btn-group .btn[data-currency="'.concat(e, '"]')).addClass("active"),
                p('.row[class*="-credits"], .row[class*="-diamonds"]').addClass("d-none"),
                p('.row[class*="-'.concat(e, '"]')).removeClass("d-none")
            })),
            p('input[name="username"]').length && p('input[name="username"]').keyup(window.debounce((function() {
                var e = p(this).val(),
                    t = p("body").hasClass("christmas") ? "/seasonal/christmas/ghost-christmas.png" : "/img/ghost.png";
                p.get("/api/figure/" + e, (function(e) {
                    void 0 !== e && void 0 !== e.figure && e.figure.length > 0 ? p("#preview-user").css("background-image", "url(".concat(window.config.habboImagerUrl, "?figure=").concat(e.figure, "&size=m&direction=4&head_direction=3&gesture=sml&action=wav)")) : p("#preview-user").css("background-image", "url(".concat(t, ")"))
                }))
            }), 500)),
            document.getElementById("cryptoAddress") && document.querySelector(".btn svg").addEventListener("click", h),
            document.getElementById("countdown") && window.paymentExpiresAt && function(e) {
                if (document.getElementById("countdown")) {
                    var t = new Date(e).getTime();
                    a();
                    var n = setInterval(a, 1e3)
                }
                function a() {
                    var e = (new Date).getTime(),
                        a = t - e,
                        o = Math.floor(a % 36e5 / 6e4),
                        r = Math.floor(a % 6e4 / 1e3);
                    document.getElementById("countdown").textContent = "".concat(o, "m ").concat(r, "s"),
                    a < 0 && (clearInterval(n), document.getElementById("countdown").textContent = "EXPIRED", window.location.reload())
                }
            }(window.paymentExpiresAt),
            v.init()
        })),
        document.addEventListener("DOMContentLoaded", (function() {
            var e = document.getElementById("payment_gateway");
            null !== e && e.addEventListener("change", (function(e) {
                "ETH" === e.target.value || e.target.value.startsWith("ETH-") ? alert("IMPORTANT: When sending from exchanges make sure you select ETHEREUM NETWORK. Do NOT select BASE.") : ("BNB" === e.target.value || e.target.value.startsWith("BNB-")) && alert("IMPORTANT: When sending from exchanges make sure you select BNB SMART CHAIN (BEP-20) network.")
            }))
        }))
    },
    976: (e, t, n) => {
        !function(e) {
            "use strict";
            e.fn.bootstrapAlert = function(t) {
                var n = e.extend({
                    type: "info",
                    dismissible: !0,
                    heading: "",
                    message: "",
                    class: "",
                    clear: !0
                }, t);
                if (0 === n.type.length)
                    return console.log("bootstrapAlert: type is empty"), !1;
                if (0 === n.message.length)
                    return console.log("bootstrapAlert: message is empty"), !1;
                var a = e('<div class="alert alert-' + n.type + " " + n.class + '" role="alert">');
                if (n.dismissible) {
                    e(a).addClass("alert-dismissible fade show");
                    var o = e('<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">');
                    e(o).appendTo(a)
                }
                if (n.heading.length > 0) {
                    var r = e('<h4 class="alert-heading">').html(n.heading);
                    e(r).appendTo(a)
                }
                return e(a).append(n.message), n.clear && e(this).empty(), e(a).appendTo(this), this
            }
        }(n(755))
    },
    425: () => {}
}, e => {
    var t = t => e(e.s = t);
    e.O(0, [143, 660], (() => (t(918), t(425))));
    e.O()
}]);