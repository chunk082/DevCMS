/*! For license information please see app.js.LICENSE.txt */
(self.webpackChunk = self.webpackChunk || []).push([[260], {
    946: (e, t, n) => {
        "use strict";
        n(9);
        var o = n(755);
        function r(e) {
            e.preventDefault(),
            o("#gifting-alert-messages").empty();
            var t = o(this).serialize(),
                n = window.giftVipStoreUrl;
            o("#confirm-checkbox").is(":checked") && (t = o(this).serialize() + "&confirm=true"),
            o.ajax({
                type: "POST",
                url: n,
                data: t,
                dataType: "json",
                success: i,
                error: a
            })
        }
        function i(e) {
            e.needConfirmation ? (o("#giftVIPModal #confirmation-details").html('<span class="font-weight-bold">Username:</span> '.concat(e.username, '<br/> <span class="font-weight-bold">VIP Rank:</span> ').concat(e.productName, '<br/> <span class="font-weight-bold">Price:</span> &pound;').concat(e.price)), o("#giftVIPModal #confirmation-section").show()) : (o("#giftVIPModal #gift-vip-form #confirmation-section").hide(), o("#giftVIPModal #confirm-checkbox").prop("checked", !1), o("#giftVIPModal #gift-vip-form #username").val(""));
            var t = '<div class="alert alert-success" role="alert">'.concat(e.success, "</div>");
            o("#giftVIPModal #gifting-alert-messages").html(t)
        }
        function a(e) {
            var t = e.responseJSON.error;
            if (t) {
                var n = '<div class="alert alert-danger" role="alert">'.concat(t, "</div>");
                o("#gifting-alert-messages").html(n)
            }
        }
        var s = n(755);
        window.Popper = n(981).default,
        n.g.$ = n.g.jQuery = n(755),
        n(734),
        n(295),
        n(54),
        s(document).ready((function() {
            var e;
            s('[data-bs-toggle="tooltip"]').tooltip(),
            e = "",
            o('[data-bs-toggle="tooltip"]').tooltip(),
            o('[data-toggle="modal"][data-target="#giftVIPModal"]').click((function() {
                e = o(this).data("package"),
                o('#gift-vip-form input[name="product"]').val(e),
                o("#gifting-vip-package-name").text(e.replace("_", " "))
            })),
            o("#gift-vip-form").submit(r),
            o("#giftVIPModal").on("hidden.bs.modal", (function(e) {
                o("#giftVIPModal #confirm-checkbox").prop("checked", !1),
                o("#giftVIPModal #gift-vip-form #username").val(""),
                o("#giftVIPModal #gifting-alert-messages").empty(),
                o("#giftVIPModal #gift-vip-form #confirmation-section").hide()
            })),
            s.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": s('meta[name="csrf-token"]').attr("content")
                }
            });
            var t = s(".form");
            t.length > 0 && t.parsley({
                errorClass: "is-invalid",
                successClass: "is-valid",
                errorsWrapper: '<div class="invalid-feedback"></div>',
                errorTemplate: "<span></span>",
                trigger: "change"
            });
            var n = s(".camera-carousel");
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
            s(".read-more").on("click", (function(e) {
                e.preventDefault(),
                s("body,html").animate({
                    scrollTop: s(this.hash).offset().top
                }, 1e3)
            }))

            if (document.getElementById("countdown") && window.paymentExpiresAt) {
    const targetTime = new Date(window.paymentExpiresAt).getTime();
    function updateCountdown() {
        const now = new Date().getTime();
        const distance = targetTime - now;
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        if (distance > 0) {
            document.getElementById("countdown").textContent = `${minutes}m ${seconds}s`;
        } else {
            document.getElementById("countdown").textContent = "EXPIRED";
            clearInterval(countdownInterval);
            window.location.reload();
        }
    }
    updateCountdown();
    const countdownInterval = setInterval(updateCountdown, 1000);
}


        }))
    },
    54: (e, t, n) => {
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
                var o = e('<div class="alert alert-' + n.type + " " + n.class + '" role="alert">');
                if (n.dismissible) {
                    e(o).addClass("alert-dismissible");
                    var r = e('<button type="button" class="close" data-dismiss="alert" aria-label="Close">'),
                        i = e('<span aria-hidden="true">').html("&times;");
                    e(i).appendTo(r),
                    e(r).appendTo(o)
                }
                if (n.heading.length > 0) {
                    var a = e('<h4 class="alert-heading">').html(n.heading);
                    e(a).appendTo(o)
                }
                return e(o).append(n.message), n.clear && e(this).empty(), e(o).appendTo(this), this
            }
        }(n(755))
    },
    366: () => {},
    981: (e, t, n) => {
        "use strict";
        n.r(t),
        n.d(t, {
            default: () => pe
        });
        var o = "undefined" != typeof window && "undefined" != typeof document && "undefined" != typeof navigator,
            r = function() {
                for (var e = ["Edge", "Trident", "Firefox"], t = 0; t < e.length; t += 1)
                    if (o && navigator.userAgent.indexOf(e[t]) >= 0)
                        return 1;
                return 0
            }();
        var i = o && window.Promise ? function(e) {
            var t = !1;
            return function() {
                t || (t = !0, window.Promise.resolve().then((function() {
                    t = !1,
                    e()
                })))
            }
        } : function(e) {
            var t = !1;
            return function() {
                t || (t = !0, setTimeout((function() {
                    t = !1,
                    e()
                }), r))
            }
        };
        function a(e) {
            return e && "[object Function]" === {}.toString.call(e)
        }
        function s(e, t) {
            if (1 !== e.nodeType)
                return [];
            var n = e.ownerDocument.defaultView.getComputedStyle(e, null);
            return t ? n[t] : n
        }
        function f(e) {
            return "HTML" === e.nodeName ? e : e.parentNode || e.host
        }
        function l(e) {
            if (!e)
                return document.body;
            switch (e.nodeName) {
            case "HTML":
            case "BODY":
                return e.ownerDocument.body;
            case "#document":
                return e.body
            }
            var t = s(e),
                n = t.overflow,
                o = t.overflowX,
                r = t.overflowY;
            return /(auto|scroll|overlay)/.test(n + r + o) ? e : l(f(e))
        }
        function p(e) {
            return e && e.referenceNode ? e.referenceNode : e
        }
        var c = o && !(!window.MSInputMethodContext || !document.documentMode),
            d = o && /MSIE 10/.test(navigator.userAgent);
        function u(e) {
            return 11 === e ? c : 10 === e ? d : c || d
        }
        function h(e) {
            if (!e)
                return document.documentElement;
            for (var t = u(10) ? document.body : null, n = e.offsetParent || null; n === t && e.nextElementSibling;)
                n = (e = e.nextElementSibling).offsetParent;
            var o = n && n.nodeName;
            return o && "BODY" !== o && "HTML" !== o ? -1 !== ["TH", "TD", "TABLE"].indexOf(n.nodeName) && "static" === s(n, "position") ? h(n) : n : e ? e.ownerDocument.documentElement : document.documentElement
        }
        function m(e) {
            return null !== e.parentNode ? m(e.parentNode) : e
        }
        function g(e, t) {
            if (!(e && e.nodeType && t && t.nodeType))
                return document.documentElement;
            var n = e.compareDocumentPosition(t) & Node.DOCUMENT_POSITION_FOLLOWING,
                o = n ? e : t,
                r = n ? t : e,
                i = document.createRange();
            i.setStart(o, 0),
            i.setEnd(r, 0);
            var a,
                s,
                f = i.commonAncestorContainer;
            if (e !== f && t !== f || o.contains(r))
                return "BODY" === (s = (a = f).nodeName) || "HTML" !== s && h(a.firstElementChild) !== a ? h(f) : f;
            var l = m(e);
            return l.host ? g(l.host, t) : g(e, m(t).host)
        }
        function v(e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "top",
                n = "top" === t ? "scrollTop" : "scrollLeft",
                o = e.nodeName;
            if ("BODY" === o || "HTML" === o) {
                var r = e.ownerDocument.documentElement,
                    i = e.ownerDocument.scrollingElement || r;
                return i[n]
            }
            return e[n]
        }
        function b(e, t) {
            var n = arguments.length > 2 && void 0 !== arguments[2] && arguments[2],
                o = v(t, "top"),
                r = v(t, "left"),
                i = n ? -1 : 1;
            return e.top += o * i, e.bottom += o * i, e.left += r * i, e.right += r * i, e
        }
        function w(e, t) {
            var n = "x" === t ? "Left" : "Top",
                o = "Left" === n ? "Right" : "Bottom";
            return parseFloat(e["border" + n + "Width"]) + parseFloat(e["border" + o + "Width"])
        }
        function y(e, t, n, o) {
            return Math.max(t["offset" + e], t["scroll" + e], n["client" + e], n["offset" + e], n["scroll" + e], u(10) ? parseInt(n["offset" + e]) + parseInt(o["margin" + ("Height" === e ? "Top" : "Left")]) + parseInt(o["margin" + ("Height" === e ? "Bottom" : "Right")]) : 0)
        }
        function x(e) {
            var t = e.body,
                n = e.documentElement,
                o = u(10) && getComputedStyle(n);
            return {
                height: y("Height", t, n, o),
                width: y("Width", t, n, o)
            }
        }
        var E = function(e, t) {
                if (!(e instanceof t))
                    throw new TypeError("Cannot call a class as a function")
            },
            O = function() {
                function e(e, t) {
                    for (var n = 0; n < t.length; n++) {
                        var o = t[n];
                        o.enumerable = o.enumerable || !1,
                        o.configurable = !0,
                        "value" in o && (o.writable = !0),
                        Object.defineProperty(e, o.key, o)
                    }
                }
                return function(t, n, o) {
                    return n && e(t.prototype, n), o && e(t, o), t
                }
            }(),
            M = function(e, t, n) {
                return t in e ? Object.defineProperty(e, t, {
                    value: n,
                    enumerable: !0,
                    configurable: !0,
                    writable: !0
                }) : e[t] = n, e
            },
            T = Object.assign || function(e) {
                for (var t = 1; t < arguments.length; t++) {
                    var n = arguments[t];
                    for (var o in n)
                        Object.prototype.hasOwnProperty.call(n, o) && (e[o] = n[o])
                }
                return e
            };
        function k(e) {
            return T({}, e, {
                right: e.left + e.width,
                bottom: e.top + e.height
            })
        }
        function L(e) {
            var t = {};
            try {
                if (u(10)) {
                    t = e.getBoundingClientRect();
                    var n = v(e, "top"),
                        o = v(e, "left");
                    t.top += n,
                    t.left += o,
                    t.bottom += n,
                    t.right += o
                } else
                    t = e.getBoundingClientRect()
            } catch (e) {}
            var r = {
                    left: t.left,
                    top: t.top,
                    width: t.right - t.left,
                    height: t.bottom - t.top
                },
                i = "HTML" === e.nodeName ? x(e.ownerDocument) : {},
                a = i.width || e.clientWidth || r.width,
                f = i.height || e.clientHeight || r.height,
                l = e.offsetWidth - a,
                p = e.offsetHeight - f;
            if (l || p) {
                var c = s(e);
                l -= w(c, "x"),
                p -= w(c, "y"),
                r.width -= l,
                r.height -= p
            }
            return k(r)
        }
        function P(e, t) {
            var n = arguments.length > 2 && void 0 !== arguments[2] && arguments[2],
                o = u(10),
                r = "HTML" === t.nodeName,
                i = L(e),
                a = L(t),
                f = l(e),
                p = s(t),
                c = parseFloat(p.borderTopWidth),
                d = parseFloat(p.borderLeftWidth);
            n && r && (a.top = Math.max(a.top, 0), a.left = Math.max(a.left, 0));
            var h = k({
                top: i.top - a.top - c,
                left: i.left - a.left - d,
                width: i.width,
                height: i.height
            });
            if (h.marginTop = 0, h.marginLeft = 0, !o && r) {
                var m = parseFloat(p.marginTop),
                    g = parseFloat(p.marginLeft);
                h.top -= c - m,
                h.bottom -= c - m,
                h.left -= d - g,
                h.right -= d - g,
                h.marginTop = m,
                h.marginLeft = g
            }
            return (o && !n ? t.contains(f) : t === f && "BODY" !== f.nodeName) && (h = b(h, t)), h
        }
        function D(e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] && arguments[1],
                n = e.ownerDocument.documentElement,
                o = P(e, n),
                r = Math.max(n.clientWidth, window.innerWidth || 0),
                i = Math.max(n.clientHeight, window.innerHeight || 0),
                a = t ? 0 : v(n),
                s = t ? 0 : v(n, "left"),
                f = {
                    top: a - o.top + o.marginTop,
                    left: s - o.left + o.marginLeft,
                    width: r,
                    height: i
                };
            return k(f)
        }
        function N(e) {
            var t = e.nodeName;
            if ("BODY" === t || "HTML" === t)
                return !1;
            if ("fixed" === s(e, "position"))
                return !0;
            var n = f(e);
            return !!n && N(n)
        }
        function C(e) {
            if (!e || !e.parentElement || u())
                return document.documentElement;
            for (var t = e.parentElement; t && "none" === s(t, "transform");)
                t = t.parentElement;
            return t || document.documentElement
        }
        function F(e, t, n, o) {
            var r = arguments.length > 4 && void 0 !== arguments[4] && arguments[4],
                i = {
                    top: 0,
                    left: 0
                },
                a = r ? C(e) : g(e, p(t));
            if ("viewport" === o)
                i = D(a, r);
            else {
                var s = void 0;
                "scrollParent" === o ? "BODY" === (s = l(f(t))).nodeName && (s = e.ownerDocument.documentElement) : s = "window" === o ? e.ownerDocument.documentElement : o;
                var c = P(s, a, r);
                if ("HTML" !== s.nodeName || N(a))
                    i = c;
                else {
                    var d = x(e.ownerDocument),
                        u = d.height,
                        h = d.width;
                    i.top += c.top - c.marginTop,
                    i.bottom = u + c.top,
                    i.left += c.left - c.marginLeft,
                    i.right = h + c.left
                }
            }
            var m = "number" == typeof (n = n || 0);
            return i.left += m ? n : n.left || 0, i.top += m ? n : n.top || 0, i.right -= m ? n : n.right || 0, i.bottom -= m ? n : n.bottom || 0, i
        }
        function S(e) {
            return e.width * e.height
        }
        function I(e, t, n, o, r) {
            var i = arguments.length > 5 && void 0 !== arguments[5] ? arguments[5] : 0;
            if (-1 === e.indexOf("auto"))
                return e;
            var a = F(n, o, i, r),
                s = {
                    top: {
                        width: a.width,
                        height: t.top - a.top
                    },
                    right: {
                        width: a.right - t.right,
                        height: a.height
                    },
                    bottom: {
                        width: a.width,
                        height: a.bottom - t.bottom
                    },
                    left: {
                        width: t.left - a.left,
                        height: a.height
                    }
                },
                f = Object.keys(s).map((function(e) {
                    return T({
                        key: e
                    }, s[e], {
                        area: S(s[e])
                    })
                })).sort((function(e, t) {
                    return t.area - e.area
                })),
                l = f.filter((function(e) {
                    var t = e.width,
                        o = e.height;
                    return t >= n.clientWidth && o >= n.clientHeight
                })),
                p = l.length > 0 ? l[0].key : f[0].key,
                c = e.split("-")[1];
            return p + (c ? "-" + c : "")
        }
        function A(e, t, n) {
            var o = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : null,
                r = o ? C(t) : g(t, p(n));
            return P(n, r, o)
        }
        function H(e) {
            var t = e.ownerDocument.defaultView.getComputedStyle(e),
                n = parseFloat(t.marginTop || 0) + parseFloat(t.marginBottom || 0),
                o = parseFloat(t.marginLeft || 0) + parseFloat(t.marginRight || 0);
            return {
                width: e.offsetWidth + o,
                height: e.offsetHeight + n
            }
        }
        function B(e) {
            var t = {
                left: "right",
                right: "left",
                bottom: "top",
                top: "bottom"
            };
            return e.replace(/left|right|bottom|top/g, (function(e) {
                return t[e]
            }))
        }
        function V(e, t, n) {
            n = n.split("-")[0];
            var o = H(e),
                r = {
                    width: o.width,
                    height: o.height
                },
                i = -1 !== ["right", "left"].indexOf(n),
                a = i ? "top" : "left",
                s = i ? "left" : "top",
                f = i ? "height" : "width",
                l = i ? "width" : "height";
            return r[a] = t[a] + t[f] / 2 - o[f] / 2, r[s] = n === s ? t[s] - o[l] : t[B(s)], r
        }
        function W(e, t) {
            return Array.prototype.find ? e.find(t) : e.filter(t)[0]
        }
        function j(e, t, n) {
            return (void 0 === n ? e : e.slice(0, function(e, t, n) {
                if (Array.prototype.findIndex)
                    return e.findIndex((function(e) {
                        return e[t] === n
                    }));
                var o = W(e, (function(e) {
                    return e[t] === n
                }));
                return e.indexOf(o)
            }(e, "name", n))).forEach((function(e) {
                e.function && console.warn("`modifier.function` is deprecated, use `modifier.fn`!");
                var n = e.function || e.fn;
                e.enabled && a(n) && (t.offsets.popper = k(t.offsets.popper), t.offsets.reference = k(t.offsets.reference), t = n(t, e))
            })), t
        }
        function R() {
            if (!this.state.isDestroyed) {
                var e = {
                    instance: this,
                    styles: {},
                    arrowStyles: {},
                    attributes: {},
                    flipped: !1,
                    offsets: {}
                };
                e.offsets.reference = A(this.state, this.popper, this.reference, this.options.positionFixed),
                e.placement = I(this.options.placement, e.offsets.reference, this.popper, this.reference, this.options.modifiers.flip.boundariesElement, this.options.modifiers.flip.padding),
                e.originalPlacement = e.placement,
                e.positionFixed = this.options.positionFixed,
                e.offsets.popper = V(this.popper, e.offsets.reference, e.placement),
                e.offsets.popper.position = this.options.positionFixed ? "fixed" : "absolute",
                e = j(this.modifiers, e),
                this.state.isCreated ? this.options.onUpdate(e) : (this.state.isCreated = !0, this.options.onCreate(e))
            }
        }
        function U(e, t) {
            return e.some((function(e) {
                var n = e.name;
                return e.enabled && n === t
            }))
        }
        function Y(e) {
            for (var t = [!1, "ms", "Webkit", "Moz", "O"], n = e.charAt(0).toUpperCase() + e.slice(1), o = 0; o < t.length; o++) {
                var r = t[o],
                    i = r ? "" + r + n : e;
                if (void 0 !== document.body.style[i])
                    return i
            }
            return null
        }
        function z() {
            return this.state.isDestroyed = !0, U(this.modifiers, "applyStyle") && (this.popper.removeAttribute("x-placement"), this.popper.style.position = "", this.popper.style.top = "", this.popper.style.left = "", this.popper.style.right = "", this.popper.style.bottom = "", this.popper.style.willChange = "", this.popper.style[Y("transform")] = ""), this.disableEventListeners(), this.options.removeOnDestroy && this.popper.parentNode.removeChild(this.popper), this
        }
        function q(e) {
            var t = e.ownerDocument;
            return t ? t.defaultView : window
        }
        function G(e, t, n, o) {
            var r = "BODY" === e.nodeName,
                i = r ? e.ownerDocument.defaultView : e;
            i.addEventListener(t, n, {
                passive: !0
            }),
            r || G(l(i.parentNode), t, n, o),
            o.push(i)
        }
        function _(e, t, n, o) {
            n.updateBound = o,
            q(e).addEventListener("resize", n.updateBound, {
                passive: !0
            });
            var r = l(e);
            return G(r, "scroll", n.updateBound, n.scrollParents), n.scrollElement = r, n.eventsEnabled = !0, n
        }
        function X() {
            this.state.eventsEnabled || (this.state = _(this.reference, this.options, this.state, this.scheduleUpdate))
        }
        function J() {
            var e,
                t;
            this.state.eventsEnabled && (cancelAnimationFrame(this.scheduleUpdate), this.state = (e = this.reference, t = this.state, q(e).removeEventListener("resize", t.updateBound), t.scrollParents.forEach((function(e) {
                e.removeEventListener("scroll", t.updateBound)
            })), t.updateBound = null, t.scrollParents = [], t.scrollElement = null, t.eventsEnabled = !1, t))
        }
        function K(e) {
            return "" !== e && !isNaN(parseFloat(e)) && isFinite(e)
        }
        function Q(e, t) {
            Object.keys(t).forEach((function(n) {
                var o = "";
                -1 !== ["width", "height", "top", "right", "bottom", "left"].indexOf(n) && K(t[n]) && (o = "px"),
                e.style[n] = t[n] + o
            }))
        }
        var $ = o && /Firefox/i.test(navigator.userAgent);
        function Z(e, t, n) {
            var o = W(e, (function(e) {
                    return e.name === t
                })),
                r = !!o && e.some((function(e) {
                    return e.name === n && e.enabled && e.order < o.order
                }));
            if (!r) {
                var i = "`" + t + "`",
                    a = "`" + n + "`";
                console.warn(a + " modifier is required by " + i + " modifier in order to work, be sure to include it before " + i + "!")
            }
            return r
        }
        var ee = ["auto-start", "auto", "auto-end", "top-start", "top", "top-end", "right-start", "right", "right-end", "bottom-end", "bottom", "bottom-start", "left-end", "left", "left-start"],
            te = ee.slice(3);
        function ne(e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] && arguments[1],
                n = te.indexOf(e),
                o = te.slice(n + 1).concat(te.slice(0, n));
            return t ? o.reverse() : o
        }
        var oe = "flip",
            re = "clockwise",
            ie = "counterclockwise";
        function ae(e, t, n, o) {
            var r = [0, 0],
                i = -1 !== ["right", "left"].indexOf(o),
                a = e.split(/(\+|\-)/).map((function(e) {
                    return e.trim()
                })),
                s = a.indexOf(W(a, (function(e) {
                    return -1 !== e.search(/,|\s/)
                })));
            a[s] && -1 === a[s].indexOf(",") && console.warn("Offsets separated by white space(s) are deprecated, use a comma (,) instead.");
            var f = /\s*,\s*|\s+/,
                l = -1 !== s ? [a.slice(0, s).concat([a[s].split(f)[0]]), [a[s].split(f)[1]].concat(a.slice(s + 1))] : [a];
            return l = l.map((function(e, o) {
                var r = (1 === o ? !i : i) ? "height" : "width",
                    a = !1;
                return e.reduce((function(e, t) {
                    return "" === e[e.length - 1] && -1 !== ["+", "-"].indexOf(t) ? (e[e.length - 1] = t, a = !0, e) : a ? (e[e.length - 1] += t, a = !1, e) : e.concat(t)
                }), []).map((function(e) {
                    return function(e, t, n, o) {
                        var r = e.match(/((?:\-|\+)?\d*\.?\d*)(.*)/),
                            i = +r[1],
                            a = r[2];
                        if (!i)
                            return e;
                        if (0 === a.indexOf("%")) {
                            return k("%p" === a ? n : o)[t] / 100 * i
                        }
                        if ("vh" === a || "vw" === a)
                            return ("vh" === a ? Math.max(document.documentElement.clientHeight, window.innerHeight || 0) : Math.max(document.documentElement.clientWidth, window.innerWidth || 0)) / 100 * i;
                        return i
                    }(e, r, t, n)
                }))
            })), l.forEach((function(e, t) {
                e.forEach((function(n, o) {
                    K(n) && (r[t] += n * ("-" === e[o - 1] ? -1 : 1))
                }))
            })), r
        }
        var se = {
                shift: {
                    order: 100,
                    enabled: !0,
                    fn: function(e) {
                        var t = e.placement,
                            n = t.split("-")[0],
                            o = t.split("-")[1];
                        if (o) {
                            var r = e.offsets,
                                i = r.reference,
                                a = r.popper,
                                s = -1 !== ["bottom", "top"].indexOf(n),
                                f = s ? "left" : "top",
                                l = s ? "width" : "height",
                                p = {
                                    start: M({}, f, i[f]),
                                    end: M({}, f, i[f] + i[l] - a[l])
                                };
                            e.offsets.popper = T({}, a, p[o])
                        }
                        return e
                    }
                },
                offset: {
                    order: 200,
                    enabled: !0,
                    fn: function(e, t) {
                        var n = t.offset,
                            o = e.placement,
                            r = e.offsets,
                            i = r.popper,
                            a = r.reference,
                            s = o.split("-")[0],
                            f = void 0;
                        return f = K(+n) ? [+n, 0] : ae(n, i, a, s), "left" === s ? (i.top += f[0], i.left -= f[1]) : "right" === s ? (i.top += f[0], i.left += f[1]) : "top" === s ? (i.left += f[0], i.top -= f[1]) : "bottom" === s && (i.left += f[0], i.top += f[1]), e.popper = i, e
                    },
                    offset: 0
                },
                preventOverflow: {
                    order: 300,
                    enabled: !0,
                    fn: function(e, t) {
                        var n = t.boundariesElement || h(e.instance.popper);
                        e.instance.reference === n && (n = h(n));
                        var o = Y("transform"),
                            r = e.instance.popper.style,
                            i = r.top,
                            a = r.left,
                            s = r[o];
                        r.top = "",
                        r.left = "",
                        r[o] = "";
                        var f = F(e.instance.popper, e.instance.reference, t.padding, n, e.positionFixed);
                        r.top = i,
                        r.left = a,
                        r[o] = s,
                        t.boundaries = f;
                        var l = t.priority,
                            p = e.offsets.popper,
                            c = {
                                primary: function(e) {
                                    var n = p[e];
                                    return p[e] < f[e] && !t.escapeWithReference && (n = Math.max(p[e], f[e])), M({}, e, n)
                                },
                                secondary: function(e) {
                                    var n = "right" === e ? "left" : "top",
                                        o = p[n];
                                    return p[e] > f[e] && !t.escapeWithReference && (o = Math.min(p[n], f[e] - ("right" === e ? p.width : p.height))), M({}, n, o)
                                }
                            };
                        return l.forEach((function(e) {
                            var t = -1 !== ["left", "top"].indexOf(e) ? "primary" : "secondary";
                            p = T({}, p, c[t](e))
                        })), e.offsets.popper = p, e
                    },
                    priority: ["left", "right", "top", "bottom"],
                    padding: 5,
                    boundariesElement: "scrollParent"
                },
                keepTogether: {
                    order: 400,
                    enabled: !0,
                    fn: function(e) {
                        var t = e.offsets,
                            n = t.popper,
                            o = t.reference,
                            r = e.placement.split("-")[0],
                            i = Math.floor,
                            a = -1 !== ["top", "bottom"].indexOf(r),
                            s = a ? "right" : "bottom",
                            f = a ? "left" : "top",
                            l = a ? "width" : "height";
                        return n[s] < i(o[f]) && (e.offsets.popper[f] = i(o[f]) - n[l]), n[f] > i(o[s]) && (e.offsets.popper[f] = i(o[s])), e
                    }
                },
                arrow: {
                    order: 500,
                    enabled: !0,
                    fn: function(e, t) {
                        var n;
                        if (!Z(e.instance.modifiers, "arrow", "keepTogether"))
                            return e;
                        var o = t.element;
                        if ("string" == typeof o) {
                            if (!(o = e.instance.popper.querySelector(o)))
                                return e
                        } else if (!e.instance.popper.contains(o))
                            return console.warn("WARNING: `arrow.element` must be child of its popper element!"), e;
                        var r = e.placement.split("-")[0],
                            i = e.offsets,
                            a = i.popper,
                            f = i.reference,
                            l = -1 !== ["left", "right"].indexOf(r),
                            p = l ? "height" : "width",
                            c = l ? "Top" : "Left",
                            d = c.toLowerCase(),
                            u = l ? "left" : "top",
                            h = l ? "bottom" : "right",
                            m = H(o)[p];
                        f[h] - m < a[d] && (e.offsets.popper[d] -= a[d] - (f[h] - m)),
                        f[d] + m > a[h] && (e.offsets.popper[d] += f[d] + m - a[h]),
                        e.offsets.popper = k(e.offsets.popper);
                        var g = f[d] + f[p] / 2 - m / 2,
                            v = s(e.instance.popper),
                            b = parseFloat(v["margin" + c]),
                            w = parseFloat(v["border" + c + "Width"]),
                            y = g - e.offsets.popper[d] - b - w;
                        return y = Math.max(Math.min(a[p] - m, y), 0), e.arrowElement = o, e.offsets.arrow = (M(n = {}, d, Math.round(y)), M(n, u, ""), n), e
                    },
                    element: "[x-arrow]"
                },
                flip: {
                    order: 600,
                    enabled: !0,
                    fn: function(e, t) {
                        if (U(e.instance.modifiers, "inner"))
                            return e;
                        if (e.flipped && e.placement === e.originalPlacement)
                            return e;
                        var n = F(e.instance.popper, e.instance.reference, t.padding, t.boundariesElement, e.positionFixed),
                            o = e.placement.split("-")[0],
                            r = B(o),
                            i = e.placement.split("-")[1] || "",
                            a = [];
                        switch (t.behavior) {
                        case oe:
                            a = [o, r];
                            break;
                        case re:
                            a = ne(o);
                            break;
                        case ie:
                            a = ne(o, !0);
                            break;
                        default:
                            a = t.behavior
                        }
                        return a.forEach((function(s, f) {
                            if (o !== s || a.length === f + 1)
                                return e;
                            o = e.placement.split("-")[0],
                            r = B(o);
                            var l = e.offsets.popper,
                                p = e.offsets.reference,
                                c = Math.floor,
                                d = "left" === o && c(l.right) > c(p.left) || "right" === o && c(l.left) < c(p.right) || "top" === o && c(l.bottom) > c(p.top) || "bottom" === o && c(l.top) < c(p.bottom),
                                u = c(l.left) < c(n.left),
                                h = c(l.right) > c(n.right),
                                m = c(l.top) < c(n.top),
                                g = c(l.bottom) > c(n.bottom),
                                v = "left" === o && u || "right" === o && h || "top" === o && m || "bottom" === o && g,
                                b = -1 !== ["top", "bottom"].indexOf(o),
                                w = !!t.flipVariations && (b && "start" === i && u || b && "end" === i && h || !b && "start" === i && m || !b && "end" === i && g),
                                y = !!t.flipVariationsByContent && (b && "start" === i && h || b && "end" === i && u || !b && "start" === i && g || !b && "end" === i && m),
                                x = w || y;
                            (d || v || x) && (e.flipped = !0, (d || v) && (o = a[f + 1]), x && (i = function(e) {
                                return "end" === e ? "start" : "start" === e ? "end" : e
                            }(i)), e.placement = o + (i ? "-" + i : ""), e.offsets.popper = T({}, e.offsets.popper, V(e.instance.popper, e.offsets.reference, e.placement)), e = j(e.instance.modifiers, e, "flip"))
                        })), e
                    },
                    behavior: "flip",
                    padding: 5,
                    boundariesElement: "viewport",
                    flipVariations: !1,
                    flipVariationsByContent: !1
                },
                inner: {
                    order: 700,
                    enabled: !1,
                    fn: function(e) {
                        var t = e.placement,
                            n = t.split("-")[0],
                            o = e.offsets,
                            r = o.popper,
                            i = o.reference,
                            a = -1 !== ["left", "right"].indexOf(n),
                            s = -1 === ["top", "left"].indexOf(n);
                        return r[a ? "left" : "top"] = i[n] - (s ? r[a ? "width" : "height"] : 0), e.placement = B(t), e.offsets.popper = k(r), e
                    }
                },
                hide: {
                    order: 800,
                    enabled: !0,
                    fn: function(e) {
                        if (!Z(e.instance.modifiers, "hide", "preventOverflow"))
                            return e;
                        var t = e.offsets.reference,
                            n = W(e.instance.modifiers, (function(e) {
                                return "preventOverflow" === e.name
                            })).boundaries;
                        if (t.bottom < n.top || t.left > n.right || t.top > n.bottom || t.right < n.left) {
                            if (!0 === e.hide)
                                return e;
                            e.hide = !0,
                            e.attributes["x-out-of-boundaries"] = ""
                        } else {
                            if (!1 === e.hide)
                                return e;
                            e.hide = !1,
                            e.attributes["x-out-of-boundaries"] = !1
                        }
                        return e
                    }
                },
                computeStyle: {
                    order: 850,
                    enabled: !0,
                    fn: function(e, t) {
                        var n = t.x,
                            o = t.y,
                            r = e.offsets.popper,
                            i = W(e.instance.modifiers, (function(e) {
                                return "applyStyle" === e.name
                            })).gpuAcceleration;
                        void 0 !== i && console.warn("WARNING: `gpuAcceleration` option moved to `computeStyle` modifier and will not be supported in future versions of Popper.js!");
                        var a = void 0 !== i ? i : t.gpuAcceleration,
                            s = h(e.instance.popper),
                            f = L(s),
                            l = {
                                position: r.position
                            },
                            p = function(e, t) {
                                var n = e.offsets,
                                    o = n.popper,
                                    r = n.reference,
                                    i = Math.round,
                                    a = Math.floor,
                                    s = function(e) {
                                        return e
                                    },
                                    f = i(r.width),
                                    l = i(o.width),
                                    p = -1 !== ["left", "right"].indexOf(e.placement),
                                    c = -1 !== e.placement.indexOf("-"),
                                    d = t ? p || c || f % 2 == l % 2 ? i : a : s,
                                    u = t ? i : s;
                                return {
                                    left: d(f % 2 == 1 && l % 2 == 1 && !c && t ? o.left - 1 : o.left),
                                    top: u(o.top),
                                    bottom: u(o.bottom),
                                    right: d(o.right)
                                }
                            }(e, window.devicePixelRatio < 2 || !$),
                            c = "bottom" === n ? "top" : "bottom",
                            d = "right" === o ? "left" : "right",
                            u = Y("transform"),
                            m = void 0,
                            g = void 0;
                        if (g = "bottom" === c ? "HTML" === s.nodeName ? -s.clientHeight + p.bottom : -f.height + p.bottom : p.top, m = "right" === d ? "HTML" === s.nodeName ? -s.clientWidth + p.right : -f.width + p.right : p.left, a && u)
                            l[u] = "translate3d(" + m + "px, " + g + "px, 0)",
                            l[c] = 0,
                            l[d] = 0,
                            l.willChange = "transform";
                        else {
                            var v = "bottom" === c ? -1 : 1,
                                b = "right" === d ? -1 : 1;
                            l[c] = g * v,
                            l[d] = m * b,
                            l.willChange = c + ", " + d
                        }
                        var w = {
                            "x-placement": e.placement
                        };
                        return e.attributes = T({}, w, e.attributes), e.styles = T({}, l, e.styles), e.arrowStyles = T({}, e.offsets.arrow, e.arrowStyles), e
                    },
                    gpuAcceleration: !0,
                    x: "bottom",
                    y: "right"
                },
                applyStyle: {
                    order: 900,
                    enabled: !0,
                    fn: function(e) {
                        var t,
                            n;
                        return Q(e.instance.popper, e.styles), t = e.instance.popper, n = e.attributes, Object.keys(n).forEach((function(e) {
                            !1 !== n[e] ? t.setAttribute(e, n[e]) : t.removeAttribute(e)
                        })), e.arrowElement && Object.keys(e.arrowStyles).length && Q(e.arrowElement, e.arrowStyles), e
                    },
                    onLoad: function(e, t, n, o, r) {
                        var i = A(r, t, e, n.positionFixed),
                            a = I(n.placement, i, t, e, n.modifiers.flip.boundariesElement, n.modifiers.flip.padding);
                        return t.setAttribute("x-placement", a), Q(t, {
                            position: n.positionFixed ? "fixed" : "absolute"
                        }), n
                    },
                    gpuAcceleration: void 0
                }
            },
            fe = {
                placement: "bottom",
                positionFixed: !1,
                eventsEnabled: !0,
                removeOnDestroy: !1,
                onCreate: function() {},
                onUpdate: function() {},
                modifiers: se
            },
            le = function() {
                function e(t, n) {
                    var o = this,
                        r = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {};
                    E(this, e),
                    this.scheduleUpdate = function() {
                        return requestAnimationFrame(o.update)
                    },
                    this.update = i(this.update.bind(this)),
                    this.options = T({}, e.Defaults, r),
                    this.state = {
                        isDestroyed: !1,
                        isCreated: !1,
                        scrollParents: []
                    },
                    this.reference = t && t.jquery ? t[0] : t,
                    this.popper = n && n.jquery ? n[0] : n,
                    this.options.modifiers = {},
                    Object.keys(T({}, e.Defaults.modifiers, r.modifiers)).forEach((function(t) {
                        o.options.modifiers[t] = T({}, e.Defaults.modifiers[t] || {}, r.modifiers ? r.modifiers[t] : {})
                    })),
                    this.modifiers = Object.keys(this.options.modifiers).map((function(e) {
                        return T({
                            name: e
                        }, o.options.modifiers[e])
                    })).sort((function(e, t) {
                        return e.order - t.order
                    })),
                    this.modifiers.forEach((function(e) {
                        e.enabled && a(e.onLoad) && e.onLoad(o.reference, o.popper, o.options, e, o.state)
                    })),
                    this.update();
                    var s = this.options.eventsEnabled;
                    s && this.enableEventListeners(),
                    this.state.eventsEnabled = s
                }
                return O(e, [{
                    key: "update",
                    value: function() {
                        return R.call(this)
                    }
                }, {
                    key: "destroy",
                    value: function() {
                        return z.call(this)
                    }
                }, {
                    key: "enableEventListeners",
                    value: function() {
                        return X.call(this)
                    }
                }, {
                    key: "disableEventListeners",
                    value: function() {
                        return J.call(this)
                    }
                }]), e
            }();
        le.Utils = ("undefined" != typeof window ? window : n.g).PopperUtils,
        le.placements = ee,
        le.Defaults = fe;
        const pe = le
    }
}, e => {
    var t = t => e(e.s = t);
    e.O(0, [143, 660], (() => (t(946), t(366))));
    e.O()
}]);