/*! For license information please see vendor.js.LICENSE.txt */
(self.webpackChunk = self.webpackChunk || []).push([[660], {
    734: function(t, e, n) {
        !function(t, e, n) {
            "use strict";
            function i(t) {
                return t && "object" == typeof t && "default" in t ? t : {
                    default: t
                }
            }
            var r = i(e),
                s = i(n);
            function o(t, e) {
                for (var n = 0; n < e.length; n++) {
                    var i = e[n];
                    i.enumerable = i.enumerable || !1,
                    i.configurable = !0,
                    "value" in i && (i.writable = !0),
                    Object.defineProperty(t, i.key, i)
                }
            }
            function a(t, e, n) {
                return e && o(t.prototype, e), n && o(t, n), Object.defineProperty(t, "prototype", {
                    writable: !1
                }), t
            }
            function l() {
                return l = Object.assign ? Object.assign.bind() : function(t) {
                    for (var e = 1; e < arguments.length; e++) {
                        var n = arguments[e];
                        for (var i in n)
                            Object.prototype.hasOwnProperty.call(n, i) && (t[i] = n[i])
                    }
                    return t
                }, l.apply(this, arguments)
            }
            function u(t, e) {
                t.prototype = Object.create(e.prototype),
                t.prototype.constructor = t,
                c(t, e)
            }
            function c(t, e) {
                return c = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(t, e) {
                    return t.__proto__ = e, t
                }, c(t, e)
            }
            var h = "transitionend",
                d = 1e6,
                f = 1e3;
            function p(t) {
                return null == t ? "" + t : {}.toString.call(t).match(/\s([a-z]+)/i)[1].toLowerCase()
            }
            function g() {
                return {
                    bindType: h,
                    delegateType: h,
                    handle: function(t) {
                        if (r.default(t.target).is(this))
                            return t.handleObj.handler.apply(this, arguments)
                    }
                }
            }
            function m(t) {
                var e = this,
                    n = !1;
                return r.default(this).one(y.TRANSITION_END, (function() {
                    n = !0
                })), setTimeout((function() {
                    n || y.triggerTransitionEnd(e)
                }), t), this
            }
            function v() {
                r.default.fn.emulateTransitionEnd = m,
                r.default.event.special[y.TRANSITION_END] = g()
            }
            var y = {
                TRANSITION_END: "bsTransitionEnd",
                getUID: function(t) {
                    do {
                        t += ~~(Math.random() * d)
                    } while (document.getElementById(t));
                    return t
                },
                getSelectorFromElement: function(t) {
                    var e = t.getAttribute("data-target");
                    if (!e || "#" === e) {
                        var n = t.getAttribute("href");
                        e = n && "#" !== n ? n.trim() : ""
                    }
                    try {
                        return document.querySelector(e) ? e : null
                    } catch (t) {
                        return null
                    }
                },
                getTransitionDurationFromElement: function(t) {
                    if (!t)
                        return 0;
                    var e = r.default(t).css("transition-duration"),
                        n = r.default(t).css("transition-delay"),
                        i = parseFloat(e),
                        s = parseFloat(n);
                    return i || s ? (e = e.split(",")[0], n = n.split(",")[0], (parseFloat(e) + parseFloat(n)) * f) : 0
                },
                reflow: function(t) {
                    return t.offsetHeight
                },
                triggerTransitionEnd: function(t) {
                    r.default(t).trigger(h)
                },
                supportsTransitionEnd: function() {
                    return Boolean(h)
                },
                isElement: function(t) {
                    return (t[0] || t).nodeType
                },
                typeCheckConfig: function(t, e, n) {
                    for (var i in n)
                        if (Object.prototype.hasOwnProperty.call(n, i)) {
                            var r = n[i],
                                s = e[i],
                                o = s && y.isElement(s) ? "element" : p(s);
                            if (!new RegExp(r).test(o))
                                throw new Error(t.toUpperCase() + ': Option "' + i + '" provided type "' + o + '" but expected type "' + r + '".')
                        }
                },
                findShadowRoot: function(t) {
                    if (!document.documentElement.attachShadow)
                        return null;
                    if ("function" == typeof t.getRootNode) {
                        var e = t.getRootNode();
                        return e instanceof ShadowRoot ? e : null
                    }
                    return t instanceof ShadowRoot ? t : t.parentNode ? y.findShadowRoot(t.parentNode) : null
                },
                jQueryDetection: function() {
                    if (void 0 === r.default)
                        throw new TypeError("Bootstrap's JavaScript requires jQuery. jQuery must be included before Bootstrap's JavaScript.");
                    var t = r.default.fn.jquery.split(" ")[0].split("."),
                        e = 1,
                        n = 2,
                        i = 9,
                        s = 1,
                        o = 4;
                    if (t[0] < n && t[1] < i || t[0] === e && t[1] === i && t[2] < s || t[0] >= o)
                        throw new Error("Bootstrap's JavaScript requires at least jQuery v1.9.1 but less than v4.0.0")
                }
            };
            y.jQueryDetection(),
            v();
            var _ = "alert",
                w = "4.6.2",
                b = "bs.alert",
                x = "." + b,
                C = ".data-api",
                E = r.default.fn[_],
                T = "alert",
                S = "fade",
                A = "show",
                D = "close" + x,
                k = "closed" + x,
                N = "click" + x + C,
                j = '[data-dismiss="alert"]',
                I = function() {
                    function t(t) {
                        this._element = t
                    }
                    var e = t.prototype;
                    return e.close = function(t) {
                        var e = this._element;
                        t && (e = this._getRootElement(t)),
                        this._triggerCloseEvent(e).isDefaultPrevented() || this._removeElement(e)
                    }, e.dispose = function() {
                        r.default.removeData(this._element, b),
                        this._element = null
                    }, e._getRootElement = function(t) {
                        var e = y.getSelectorFromElement(t),
                            n = !1;
                        return e && (n = document.querySelector(e)), n || (n = r.default(t).closest("." + T)[0]), n
                    }, e._triggerCloseEvent = function(t) {
                        var e = r.default.Event(D);
                        return r.default(t).trigger(e), e
                    }, e._removeElement = function(t) {
                        var e = this;
                        if (r.default(t).removeClass(A), r.default(t).hasClass(S)) {
                            var n = y.getTransitionDurationFromElement(t);
                            r.default(t).one(y.TRANSITION_END, (function(n) {
                                return e._destroyElement(t, n)
                            })).emulateTransitionEnd(n)
                        } else
                            this._destroyElement(t)
                    }, e._destroyElement = function(t) {
                        r.default(t).detach().trigger(k).remove()
                    }, t._jQueryInterface = function(e) {
                        return this.each((function() {
                            var n = r.default(this),
                                i = n.data(b);
                            i || (i = new t(this), n.data(b, i)),
                            "close" === e && i[e](this)
                        }))
                    }, t._handleDismiss = function(t) {
                        return function(e) {
                            e && e.preventDefault(),
                            t.close(this)
                        }
                    }, a(t, null, [{
                        key: "VERSION",
                        get: function() {
                            return w
                        }
                    }]), t
                }();
            r.default(document).on(N, j, I._handleDismiss(new I)),
            r.default.fn[_] = I._jQueryInterface,
            r.default.fn[_].Constructor = I,
            r.default.fn[_].noConflict = function() {
                return r.default.fn[_] = E, I._jQueryInterface
            };
            var O = "button",
                F = "4.6.2",
                P = "bs.button",
                $ = "." + P,
                q = ".data-api",
                R = r.default.fn[O],
                L = "active",
                M = "btn",
                H = "focus",
                z = "click" + $ + q,
                W = "focus" + $ + q + " blur" + $ + q,
                V = "load" + $ + q,
                B = '[data-toggle^="button"]',
                U = '[data-toggle="buttons"]',
                Q = '[data-toggle="button"]',
                X = '[data-toggle="buttons"] .btn',
                Z = 'input:not([type="hidden"])',
                Y = ".active",
                K = ".btn",
                G = function() {
                    function t(t) {
                        this._element = t,
                        this.shouldAvoidTriggerChange = !1
                    }
                    var e = t.prototype;
                    return e.toggle = function() {
                        var t = !0,
                            e = !0,
                            n = r.default(this._element).closest(U)[0];
                        if (n) {
                            var i = this._element.querySelector(Z);
                            if (i) {
                                if ("radio" === i.type)
                                    if (i.checked && this._element.classList.contains(L))
                                        t = !1;
                                    else {
                                        var s = n.querySelector(Y);
                                        s && r.default(s).removeClass(L)
                                    }
                                t && ("checkbox" !== i.type && "radio" !== i.type || (i.checked = !this._element.classList.contains(L)), this.shouldAvoidTriggerChange || r.default(i).trigger("change")),
                                i.focus(),
                                e = !1
                            }
                        }
                        this._element.hasAttribute("disabled") || this._element.classList.contains("disabled") || (e && this._element.setAttribute("aria-pressed", !this._element.classList.contains(L)), t && r.default(this._element).toggleClass(L))
                    }, e.dispose = function() {
                        r.default.removeData(this._element, P),
                        this._element = null
                    }, t._jQueryInterface = function(e, n) {
                        return this.each((function() {
                            var i = r.default(this),
                                s = i.data(P);
                            s || (s = new t(this), i.data(P, s)),
                            s.shouldAvoidTriggerChange = n,
                            "toggle" === e && s[e]()
                        }))
                    }, a(t, null, [{
                        key: "VERSION",
                        get: function() {
                            return F
                        }
                    }]), t
                }();
            r.default(document).on(z, B, (function(t) {
                var e = t.target,
                    n = e;
                if (r.default(e).hasClass(M) || (e = r.default(e).closest(K)[0]), !e || e.hasAttribute("disabled") || e.classList.contains("disabled"))
                    t.preventDefault();
                else {
                    var i = e.querySelector(Z);
                    if (i && (i.hasAttribute("disabled") || i.classList.contains("disabled")))
                        return void t.preventDefault();
                    "INPUT" !== n.tagName && "LABEL" === e.tagName || G._jQueryInterface.call(r.default(e), "toggle", "INPUT" === n.tagName)
                }
            })).on(W, B, (function(t) {
                var e = r.default(t.target).closest(K)[0];
                r.default(e).toggleClass(H, /^focus(in)?$/.test(t.type))
            })),
            r.default(window).on(V, (function() {
                for (var t = [].slice.call(document.querySelectorAll(X)), e = 0, n = t.length; e < n; e++) {
                    var i = t[e],
                        r = i.querySelector(Z);
                    r.checked || r.hasAttribute("checked") ? i.classList.add(L) : i.classList.remove(L)
                }
                for (var s = 0, o = (t = [].slice.call(document.querySelectorAll(Q))).length; s < o; s++) {
                    var a = t[s];
                    "true" === a.getAttribute("aria-pressed") ? a.classList.add(L) : a.classList.remove(L)
                }
            })),
            r.default.fn[O] = G._jQueryInterface,
            r.default.fn[O].Constructor = G,
            r.default.fn[O].noConflict = function() {
                return r.default.fn[O] = R, G._jQueryInterface
            };
            var J = "carousel",
                tt = "4.6.2",
                et = "bs.carousel",
                nt = "." + et,
                it = ".data-api",
                rt = r.default.fn[J],
                st = 37,
                ot = 39,
                at = 500,
                lt = 40,
                ut = "carousel",
                ct = "active",
                ht = "slide",
                dt = "carousel-item-right",
                ft = "carousel-item-left",
                pt = "carousel-item-next",
                gt = "carousel-item-prev",
                mt = "pointer-event",
                vt = "next",
                yt = "prev",
                _t = "left",
                wt = "right",
                bt = "slide" + nt,
                xt = "slid" + nt,
                Ct = "keydown" + nt,
                Et = "mouseenter" + nt,
                Tt = "mouseleave" + nt,
                St = "touchstart" + nt,
                At = "touchmove" + nt,
                Dt = "touchend" + nt,
                kt = "pointerdown" + nt,
                Nt = "pointerup" + nt,
                jt = "dragstart" + nt,
                It = "load" + nt + it,
                Ot = "click" + nt + it,
                Ft = ".active",
                Pt = ".active.carousel-item",
                $t = ".carousel-item",
                qt = ".carousel-item img",
                Rt = ".carousel-item-next, .carousel-item-prev",
                Lt = ".carousel-indicators",
                Mt = "[data-slide], [data-slide-to]",
                Ht = '[data-ride="carousel"]',
                zt = {
                    interval: 5e3,
                    keyboard: !0,
                    slide: !1,
                    pause: "hover",
                    wrap: !0,
                    touch: !0
                },
                Wt = {
                    interval: "(number|boolean)",
                    keyboard: "boolean",
                    slide: "(boolean|string)",
                    pause: "(string|boolean)",
                    wrap: "boolean",
                    touch: "boolean"
                },
                Vt = {
                    TOUCH: "touch",
                    PEN: "pen"
                },
                Bt = function() {
                    function t(t, e) {
                        this._items = null,
                        this._interval = null,
                        this._activeElement = null,
                        this._isPaused = !1,
                        this._isSliding = !1,
                        this.touchTimeout = null,
                        this.touchStartX = 0,
                        this.touchDeltaX = 0,
                        this._config = this._getConfig(e),
                        this._element = t,
                        this._indicatorsElement = this._element.querySelector(Lt),
                        this._touchSupported = "ontouchstart" in document.documentElement || navigator.maxTouchPoints > 0,
                        this._pointerEvent = Boolean(window.PointerEvent || window.MSPointerEvent),
                        this._addEventListeners()
                    }
                    var e = t.prototype;
                    return e.next = function() {
                        this._isSliding || this._slide(vt)
                    }, e.nextWhenVisible = function() {
                        var t = r.default(this._element);
                        !document.hidden && t.is(":visible") && "hidden" !== t.css("visibility") && this.next()
                    }, e.prev = function() {
                        this._isSliding || this._slide(yt)
                    }, e.pause = function(t) {
                        t || (this._isPaused = !0),
                        this._element.querySelector(Rt) && (y.triggerTransitionEnd(this._element), this.cycle(!0)),
                        clearInterval(this._interval),
                        this._interval = null
                    }, e.cycle = function(t) {
                        t || (this._isPaused = !1),
                        this._interval && (clearInterval(this._interval), this._interval = null),
                        this._config.interval && !this._isPaused && (this._updateInterval(), this._interval = setInterval((document.visibilityState ? this.nextWhenVisible : this.next).bind(this), this._config.interval))
                    }, e.to = function(t) {
                        var e = this;
                        this._activeElement = this._element.querySelector(Pt);
                        var n = this._getItemIndex(this._activeElement);
                        if (!(t > this._items.length - 1 || t < 0))
                            if (this._isSliding)
                                r.default(this._element).one(xt, (function() {
                                    return e.to(t)
                                }));
                            else {
                                if (n === t)
                                    return this.pause(), void this.cycle();
                                var i = t > n ? vt : yt;
                                this._slide(i, this._items[t])
                            }
                    }, e.dispose = function() {
                        r.default(this._element).off(nt),
                        r.default.removeData(this._element, et),
                        this._items = null,
                        this._config = null,
                        this._element = null,
                        this._interval = null,
                        this._isPaused = null,
                        this._isSliding = null,
                        this._activeElement = null,
                        this._indicatorsElement = null
                    }, e._getConfig = function(t) {
                        return t = l({}, zt, t), y.typeCheckConfig(J, t, Wt), t
                    }, e._handleSwipe = function() {
                        var t = Math.abs(this.touchDeltaX);
                        if (!(t <= lt)) {
                            var e = t / this.touchDeltaX;
                            this.touchDeltaX = 0,
                            e > 0 && this.prev(),
                            e < 0 && this.next()
                        }
                    }, e._addEventListeners = function() {
                        var t = this;
                        this._config.keyboard && r.default(this._element).on(Ct, (function(e) {
                            return t._keydown(e)
                        })),
                        "hover" === this._config.pause && r.default(this._element).on(Et, (function(e) {
                            return t.pause(e)
                        })).on(Tt, (function(e) {
                            return t.cycle(e)
                        })),
                        this._config.touch && this._addTouchEventListeners()
                    }, e._addTouchEventListeners = function() {
                        var t = this;
                        if (this._touchSupported) {
                            var e = function(e) {
                                    t._pointerEvent && Vt[e.originalEvent.pointerType.toUpperCase()] ? t.touchStartX = e.originalEvent.clientX : t._pointerEvent || (t.touchStartX = e.originalEvent.touches[0].clientX)
                                },
                                n = function(e) {
                                    t.touchDeltaX = e.originalEvent.touches && e.originalEvent.touches.length > 1 ? 0 : e.originalEvent.touches[0].clientX - t.touchStartX
                                },
                                i = function(e) {
                                    t._pointerEvent && Vt[e.originalEvent.pointerType.toUpperCase()] && (t.touchDeltaX = e.originalEvent.clientX - t.touchStartX),
                                    t._handleSwipe(),
                                    "hover" === t._config.pause && (t.pause(), t.touchTimeout && clearTimeout(t.touchTimeout), t.touchTimeout = setTimeout((function(e) {
                                        return t.cycle(e)
                                    }), at + t._config.interval))
                                };
                            r.default(this._element.querySelectorAll(qt)).on(jt, (function(t) {
                                return t.preventDefault()
                            })),
                            this._pointerEvent ? (r.default(this._element).on(kt, (function(t) {
                                return e(t)
                            })), r.default(this._element).on(Nt, (function(t) {
                                return i(t)
                            })), this._element.classList.add(mt)) : (r.default(this._element).on(St, (function(t) {
                                return e(t)
                            })), r.default(this._element).on(At, (function(t) {
                                return n(t)
                            })), r.default(this._element).on(Dt, (function(t) {
                                return i(t)
                            })))
                        }
                    }, e._keydown = function(t) {
                        if (!/input|textarea/i.test(t.target.tagName))
                            switch (t.which) {
                            case st:
                                t.preventDefault(),
                                this.prev();
                                break;
                            case ot:
                                t.preventDefault(),
                                this.next()
                            }
                    }, e._getItemIndex = function(t) {
                        return this._items = t && t.parentNode ? [].slice.call(t.parentNode.querySelectorAll($t)) : [], this._items.indexOf(t)
                    }, e._getItemByDirection = function(t, e) {
                        var n = t === vt,
                            i = t === yt,
                            r = this._getItemIndex(e),
                            s = this._items.length - 1;
                        if ((i && 0 === r || n && r === s) && !this._config.wrap)
                            return e;
                        var o = (r + (t === yt ? -1 : 1)) % this._items.length;
                        return -1 === o ? this._items[this._items.length - 1] : this._items[o]
                    }, e._triggerSlideEvent = function(t, e) {
                        var n = this._getItemIndex(t),
                            i = this._getItemIndex(this._element.querySelector(Pt)),
                            s = r.default.Event(bt, {
                                relatedTarget: t,
                                direction: e,
                                from: i,
                                to: n
                            });
                        return r.default(this._element).trigger(s), s
                    }, e._setActiveIndicatorElement = function(t) {
                        if (this._indicatorsElement) {
                            var e = [].slice.call(this._indicatorsElement.querySelectorAll(Ft));
                            r.default(e).removeClass(ct);
                            var n = this._indicatorsElement.children[this._getItemIndex(t)];
                            n && r.default(n).addClass(ct)
                        }
                    }, e._updateInterval = function() {
                        var t = this._activeElement || this._element.querySelector(Pt);
                        if (t) {
                            var e = parseInt(t.getAttribute("data-interval"), 10);
                            e ? (this._config.defaultInterval = this._config.defaultInterval || this._config.interval, this._config.interval = e) : this._config.interval = this._config.defaultInterval || this._config.interval
                        }
                    }, e._slide = function(t, e) {
                        var n,
                            i,
                            s,
                            o = this,
                            a = this._element.querySelector(Pt),
                            l = this._getItemIndex(a),
                            u = e || a && this._getItemByDirection(t, a),
                            c = this._getItemIndex(u),
                            h = Boolean(this._interval);
                        if (t === vt ? (n = ft, i = pt, s = _t) : (n = dt, i = gt, s = wt), u && r.default(u).hasClass(ct))
                            this._isSliding = !1;
                        else if (!this._triggerSlideEvent(u, s).isDefaultPrevented() && a && u) {
                            this._isSliding = !0,
                            h && this.pause(),
                            this._setActiveIndicatorElement(u),
                            this._activeElement = u;
                            var d = r.default.Event(xt, {
                                relatedTarget: u,
                                direction: s,
                                from: l,
                                to: c
                            });
                            if (r.default(this._element).hasClass(ht)) {
                                r.default(u).addClass(i),
                                y.reflow(u),
                                r.default(a).addClass(n),
                                r.default(u).addClass(n);
                                var f = y.getTransitionDurationFromElement(a);
                                r.default(a).one(y.TRANSITION_END, (function() {
                                    r.default(u).removeClass(n + " " + i).addClass(ct),
                                    r.default(a).removeClass(ct + " " + i + " " + n),
                                    o._isSliding = !1,
                                    setTimeout((function() {
                                        return r.default(o._element).trigger(d)
                                    }), 0)
                                })).emulateTransitionEnd(f)
                            } else
                                r.default(a).removeClass(ct),
                                r.default(u).addClass(ct),
                                this._isSliding = !1,
                                r.default(this._element).trigger(d);
                            h && this.cycle()
                        }
                    }, t._jQueryInterface = function(e) {
                        return this.each((function() {
                            var n = r.default(this).data(et),
                                i = l({}, zt, r.default(this).data());
                            "object" == typeof e && (i = l({}, i, e));
                            var s = "string" == typeof e ? e : i.slide;
                            if (n || (n = new t(this, i), r.default(this).data(et, n)), "number" == typeof e)
                                n.to(e);
                            else if ("string" == typeof s) {
                                if (void 0 === n[s])
                                    throw new TypeError('No method named "' + s + '"');
                                n[s]()
                            } else
                                i.interval && i.ride && (n.pause(), n.cycle())
                        }))
                    }, t._dataApiClickHandler = function(e) {
                        var n = y.getSelectorFromElement(this);
                        if (n) {
                            var i = r.default(n)[0];
                            if (i && r.default(i).hasClass(ut)) {
                                var s = l({}, r.default(i).data(), r.default(this).data()),
                                    o = this.getAttribute("data-slide-to");
                                o && (s.interval = !1),
                                t._jQueryInterface.call(r.default(i), s),
                                o && r.default(i).data(et).to(o),
                                e.preventDefault()
                            }
                        }
                    }, a(t, null, [{
                        key: "VERSION",
                        get: function() {
                            return tt
                        }
                    }, {
                        key: "Default",
                        get: function() {
                            return zt
                        }
                    }]), t
                }();
            r.default(document).on(Ot, Mt, Bt._dataApiClickHandler),
            r.default(window).on(It, (function() {
                for (var t = [].slice.call(document.querySelectorAll(Ht)), e = 0, n = t.length; e < n; e++) {
                    var i = r.default(t[e]);
                    Bt._jQueryInterface.call(i, i.data())
                }
            })),
            r.default.fn[J] = Bt._jQueryInterface,
            r.default.fn[J].Constructor = Bt,
            r.default.fn[J].noConflict = function() {
                return r.default.fn[J] = rt, Bt._jQueryInterface
            };
            var Ut = "collapse",
                Qt = "4.6.2",
                Xt = "bs.collapse",
                Zt = "." + Xt,
                Yt = ".data-api",
                Kt = r.default.fn[Ut],
                Gt = "show",
                Jt = "collapse",
                te = "collapsing",
                ee = "collapsed",
                ne = "width",
                ie = "height",
                re = "show" + Zt,
                se = "shown" + Zt,
                oe = "hide" + Zt,
                ae = "hidden" + Zt,
                le = "click" + Zt + Yt,
                ue = ".show, .collapsing",
                ce = '[data-toggle="collapse"]',
                he = {
                    toggle: !0,
                    parent: ""
                },
                de = {
                    toggle: "boolean",
                    parent: "(string|element)"
                },
                fe = function() {
                    function t(t, e) {
                        this._isTransitioning = !1,
                        this._element = t,
                        this._config = this._getConfig(e),
                        this._triggerArray = [].slice.call(document.querySelectorAll('[data-toggle="collapse"][href="#' + t.id + '"],[data-toggle="collapse"][data-target="#' + t.id + '"]'));
                        for (var n = [].slice.call(document.querySelectorAll(ce)), i = 0, r = n.length; i < r; i++) {
                            var s = n[i],
                                o = y.getSelectorFromElement(s),
                                a = [].slice.call(document.querySelectorAll(o)).filter((function(e) {
                                    return e === t
                                }));
                            null !== o && a.length > 0 && (this._selector = o, this._triggerArray.push(s))
                        }
                        this._parent = this._config.parent ? this._getParent() : null,
                        this._config.parent || this._addAriaAndCollapsedClass(this._element, this._triggerArray),
                        this._config.toggle && this.toggle()
                    }
                    var e = t.prototype;
                    return e.toggle = function() {
                        r.default(this._element).hasClass(Gt) ? this.hide() : this.show()
                    }, e.show = function() {
                        var e,
                            n,
                            i = this;
                        if (!(this._isTransitioning || r.default(this._element).hasClass(Gt) || (this._parent && 0 === (e = [].slice.call(this._parent.querySelectorAll(ue)).filter((function(t) {
                            return "string" == typeof i._config.parent ? t.getAttribute("data-parent") === i._config.parent : t.classList.contains(Jt)
                        }))).length && (e = null), e && (n = r.default(e).not(this._selector).data(Xt)) && n._isTransitioning))) {
                            var s = r.default.Event(re);
                            if (r.default(this._element).trigger(s), !s.isDefaultPrevented()) {
                                e && (t._jQueryInterface.call(r.default(e).not(this._selector), "hide"), n || r.default(e).data(Xt, null));
                                var o = this._getDimension();
                                r.default(this._element).removeClass(Jt).addClass(te),
                                this._element.style[o] = 0,
                                this._triggerArray.length && r.default(this._triggerArray).removeClass(ee).attr("aria-expanded", !0),
                                this.setTransitioning(!0);
                                var a = function() {
                                        r.default(i._element).removeClass(te).addClass(Jt + " " + Gt),
                                        i._element.style[o] = "",
                                        i.setTransitioning(!1),
                                        r.default(i._element).trigger(se)
                                    },
                                    l = "scroll" + (o[0].toUpperCase() + o.slice(1)),
                                    u = y.getTransitionDurationFromElement(this._element);
                                r.default(this._element).one(y.TRANSITION_END, a).emulateTransitionEnd(u),
                                this._element.style[o] = this._element[l] + "px"
                            }
                        }
                    }, e.hide = function() {
                        var t = this;
                        if (!this._isTransitioning && r.default(this._element).hasClass(Gt)) {
                            var e = r.default.Event(oe);
                            if (r.default(this._element).trigger(e), !e.isDefaultPrevented()) {
                                var n = this._getDimension();
                                this._element.style[n] = this._element.getBoundingClientRect()[n] + "px",
                                y.reflow(this._element),
                                r.default(this._element).addClass(te).removeClass(Jt + " " + Gt);
                                var i = this._triggerArray.length;
                                if (i > 0)
                                    for (var s = 0; s < i; s++) {
                                        var o = this._triggerArray[s],
                                            a = y.getSelectorFromElement(o);
                                        null !== a && (r.default([].slice.call(document.querySelectorAll(a))).hasClass(Gt) || r.default(o).addClass(ee).attr("aria-expanded", !1))
                                    }
                                this.setTransitioning(!0);
                                var l = function() {
                                    t.setTransitioning(!1),
                                    r.default(t._element).removeClass(te).addClass(Jt).trigger(ae)
                                };
                                this._element.style[n] = "";
                                var u = y.getTransitionDurationFromElement(this._element);
                                r.default(this._element).one(y.TRANSITION_END, l).emulateTransitionEnd(u)
                            }
                        }
                    }, e.setTransitioning = function(t) {
                        this._isTransitioning = t
                    }, e.dispose = function() {
                        r.default.removeData(this._element, Xt),
                        this._config = null,
                        this._parent = null,
                        this._element = null,
                        this._triggerArray = null,
                        this._isTransitioning = null
                    }, e._getConfig = function(t) {
                        return (t = l({}, he, t)).toggle = Boolean(t.toggle), y.typeCheckConfig(Ut, t, de), t
                    }, e._getDimension = function() {
                        return r.default(this._element).hasClass(ne) ? ne : ie
                    }, e._getParent = function() {
                        var e,
                            n = this;
                        y.isElement(this._config.parent) ? (e = this._config.parent, void 0 !== this._config.parent.jquery && (e = this._config.parent[0])) : e = document.querySelector(this._config.parent);
                        var i = '[data-toggle="collapse"][data-parent="' + this._config.parent + '"]',
                            s = [].slice.call(e.querySelectorAll(i));
                        return r.default(s).each((function(e, i) {
                            n._addAriaAndCollapsedClass(t._getTargetFromElement(i), [i])
                        })), e
                    }, e._addAriaAndCollapsedClass = function(t, e) {
                        var n = r.default(t).hasClass(Gt);
                        e.length && r.default(e).toggleClass(ee, !n).attr("aria-expanded", n)
                    }, t._getTargetFromElement = function(t) {
                        var e = y.getSelectorFromElement(t);
                        return e ? document.querySelector(e) : null
                    }, t._jQueryInterface = function(e) {
                        return this.each((function() {
                            var n = r.default(this),
                                i = n.data(Xt),
                                s = l({}, he, n.data(), "object" == typeof e && e ? e : {});
                            if (!i && s.toggle && "string" == typeof e && /show|hide/.test(e) && (s.toggle = !1), i || (i = new t(this, s), n.data(Xt, i)), "string" == typeof e) {
                                if (void 0 === i[e])
                                    throw new TypeError('No method named "' + e + '"');
                                i[e]()
                            }
                        }))
                    }, a(t, null, [{
                        key: "VERSION",
                        get: function() {
                            return Qt
                        }
                    }, {
                        key: "Default",
                        get: function() {
                            return he
                        }
                    }]), t
                }();
            r.default(document).on(le, ce, (function(t) {
                "A" === t.currentTarget.tagName && t.preventDefault();
                var e = r.default(this),
                    n = y.getSelectorFromElement(this),
                    i = [].slice.call(document.querySelectorAll(n));
                r.default(i).each((function() {
                    var t = r.default(this),
                        n = t.data(Xt) ? "toggle" : e.data();
                    fe._jQueryInterface.call(t, n)
                }))
            })),
            r.default.fn[Ut] = fe._jQueryInterface,
            r.default.fn[Ut].Constructor = fe,
            r.default.fn[Ut].noConflict = function() {
                return r.default.fn[Ut] = Kt, fe._jQueryInterface
            };
            var pe = "dropdown",
                ge = "4.6.2",
                me = "bs.dropdown",
                ve = "." + me,
                ye = ".data-api",
                _e = r.default.fn[pe],
                we = 27,
                be = 32,
                xe = 9,
                Ce = 38,
                Ee = 40,
                Te = 3,
                Se = new RegExp(Ce + "|" + Ee + "|" + we),
                Ae = "disabled",
                De = "show",
                ke = "dropup",
                Ne = "dropright",
                je = "dropleft",
                Ie = "dropdown-menu-right",
                Oe = "position-static",
                Fe = "hide" + ve,
                Pe = "hidden" + ve,
                $e = "show" + ve,
                qe = "shown" + ve,
                Re = "click" + ve,
                Le = "click" + ve + ye,
                Me = "keydown" + ve + ye,
                He = "keyup" + ve + ye,
                ze = '[data-toggle="dropdown"]',
                We = ".dropdown form",
                Ve = ".dropdown-menu",
                Be = ".navbar-nav",
                Ue = ".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)",
                Qe = "top-start",
                Xe = "top-end",
                Ze = "bottom-start",
                Ye = "bottom-end",
                Ke = "right-start",
                Ge = "left-start",
                Je = {
                    offset: 0,
                    flip: !0,
                    boundary: "scrollParent",
                    reference: "toggle",
                    display: "dynamic",
                    popperConfig: null
                },
                tn = {
                    offset: "(number|string|function)",
                    flip: "boolean",
                    boundary: "(string|element)",
                    reference: "(string|element)",
                    display: "string",
                    popperConfig: "(null|object)"
                },
                en = function() {
                    function t(t, e) {
                        this._element = t,
                        this._popper = null,
                        this._config = this._getConfig(e),
                        this._menu = this._getMenuElement(),
                        this._inNavbar = this._detectNavbar(),
                        this._addEventListeners()
                    }
                    var e = t.prototype;
                    return e.toggle = function() {
                        if (!this._element.disabled && !r.default(this._element).hasClass(Ae)) {
                            var e = r.default(this._menu).hasClass(De);
                            t._clearMenus(),
                            e || this.show(!0)
                        }
                    }, e.show = function(e) {
                        if (void 0 === e && (e = !1), !(this._element.disabled || r.default(this._element).hasClass(Ae) || r.default(this._menu).hasClass(De))) {
                            var n = {
                                    relatedTarget: this._element
                                },
                                i = r.default.Event($e, n),
                                o = t._getParentFromElement(this._element);
                            if (r.default(o).trigger(i), !i.isDefaultPrevented()) {
                                if (!this._inNavbar && e) {
                                    if (void 0 === s.default)
                                        throw new TypeError("Bootstrap's dropdowns require Popper (https://popper.js.org)");
                                    var a = this._element;
                                    "parent" === this._config.reference ? a = o : y.isElement(this._config.reference) && (a = this._config.reference, void 0 !== this._config.reference.jquery && (a = this._config.reference[0])),
                                    "scrollParent" !== this._config.boundary && r.default(o).addClass(Oe),
                                    this._popper = new s.default(a, this._menu, this._getPopperConfig())
                                }
                                "ontouchstart" in document.documentElement && 0 === r.default(o).closest(Be).length && r.default(document.body).children().on("mouseover", null, r.default.noop),
                                this._element.focus(),
                                this._element.setAttribute("aria-expanded", !0),
                                r.default(this._menu).toggleClass(De),
                                r.default(o).toggleClass(De).trigger(r.default.Event(qe, n))
                            }
                        }
                    }, e.hide = function() {
                        if (!this._element.disabled && !r.default(this._element).hasClass(Ae) && r.default(this._menu).hasClass(De)) {
                            var e = {
                                    relatedTarget: this._element
                                },
                                n = r.default.Event(Fe, e),
                                i = t._getParentFromElement(this._element);
                            r.default(i).trigger(n),
                            n.isDefaultPrevented() || (this._popper && this._popper.destroy(), r.default(this._menu).toggleClass(De), r.default(i).toggleClass(De).trigger(r.default.Event(Pe, e)))
                        }
                    }, e.dispose = function() {
                        r.default.removeData(this._element, me),
                        r.default(this._element).off(ve),
                        this._element = null,
                        this._menu = null,
                        null !== this._popper && (this._popper.destroy(), this._popper = null)
                    }, e.update = function() {
                        this._inNavbar = this._detectNavbar(),
                        null !== this._popper && this._popper.scheduleUpdate()
                    }, e._addEventListeners = function() {
                        var t = this;
                        r.default(this._element).on(Re, (function(e) {
                            e.preventDefault(),
                            e.stopPropagation(),
                            t.toggle()
                        }))
                    }, e._getConfig = function(t) {
                        return t = l({}, this.constructor.Default, r.default(this._element).data(), t), y.typeCheckConfig(pe, t, this.constructor.DefaultType), t
                    }, e._getMenuElement = function() {
                        if (!this._menu) {
                            var e = t._getParentFromElement(this._element);
                            e && (this._menu = e.querySelector(Ve))
                        }
                        return this._menu
                    }, e._getPlacement = function() {
                        var t = r.default(this._element.parentNode),
                            e = Ze;
                        return t.hasClass(ke) ? e = r.default(this._menu).hasClass(Ie) ? Xe : Qe : t.hasClass(Ne) ? e = Ke : t.hasClass(je) ? e = Ge : r.default(this._menu).hasClass(Ie) && (e = Ye), e
                    }, e._detectNavbar = function() {
                        return r.default(this._element).closest(".navbar").length > 0
                    }, e._getOffset = function() {
                        var t = this,
                            e = {};
                        return "function" == typeof this._config.offset ? e.fn = function(e) {
                            return e.offsets = l({}, e.offsets, t._config.offset(e.offsets, t._element)), e
                        } : e.offset = this._config.offset, e
                    }, e._getPopperConfig = function() {
                        var t = {
                            placement: this._getPlacement(),
                            modifiers: {
                                offset: this._getOffset(),
                                flip: {
                                    enabled: this._config.flip
                                },
                                preventOverflow: {
                                    boundariesElement: this._config.boundary
                                }
                            }
                        };
                        return "static" === this._config.display && (t.modifiers.applyStyle = {
                            enabled: !1
                        }), l({}, t, this._config.popperConfig)
                    }, t._jQueryInterface = function(e) {
                        return this.each((function() {
                            var n = r.default(this).data(me);
                            if (n || (n = new t(this, "object" == typeof e ? e : null), r.default(this).data(me, n)), "string" == typeof e) {
                                if (void 0 === n[e])
                                    throw new TypeError('No method named "' + e + '"');
                                n[e]()
                            }
                        }))
                    }, t._clearMenus = function(e) {
                        if (!e || e.which !== Te && ("keyup" !== e.type || e.which === xe))
                            for (var n = [].slice.call(document.querySelectorAll(ze)), i = 0, s = n.length; i < s; i++) {
                                var o = t._getParentFromElement(n[i]),
                                    a = r.default(n[i]).data(me),
                                    l = {
                                        relatedTarget: n[i]
                                    };
                                if (e && "click" === e.type && (l.clickEvent = e), a) {
                                    var u = a._menu;
                                    if (r.default(o).hasClass(De) && !(e && ("click" === e.type && /input|textarea/i.test(e.target.tagName) || "keyup" === e.type && e.which === xe) && r.default.contains(o, e.target))) {
                                        var c = r.default.Event(Fe, l);
                                        r.default(o).trigger(c),
                                        c.isDefaultPrevented() || ("ontouchstart" in document.documentElement && r.default(document.body).children().off("mouseover", null, r.default.noop), n[i].setAttribute("aria-expanded", "false"), a._popper && a._popper.destroy(), r.default(u).removeClass(De), r.default(o).removeClass(De).trigger(r.default.Event(Pe, l)))
                                    }
                                }
                            }
                    }, t._getParentFromElement = function(t) {
                        var e,
                            n = y.getSelectorFromElement(t);
                        return n && (e = document.querySelector(n)), e || t.parentNode
                    }, t._dataApiKeydownHandler = function(e) {
                        if (!(/input|textarea/i.test(e.target.tagName) ? e.which === be || e.which !== we && (e.which !== Ee && e.which !== Ce || r.default(e.target).closest(Ve).length) : !Se.test(e.which)) && !this.disabled && !r.default(this).hasClass(Ae)) {
                            var n = t._getParentFromElement(this),
                                i = r.default(n).hasClass(De);
                            if (i || e.which !== we) {
                                if (e.preventDefault(), e.stopPropagation(), !i || e.which === we || e.which === be)
                                    return e.which === we && r.default(n.querySelector(ze)).trigger("focus"), void r.default(this).trigger("click");
                                var s = [].slice.call(n.querySelectorAll(Ue)).filter((function(t) {
                                    return r.default(t).is(":visible")
                                }));
                                if (0 !== s.length) {
                                    var o = s.indexOf(e.target);
                                    e.which === Ce && o > 0 && o--,
                                    e.which === Ee && o < s.length - 1 && o++,
                                    o < 0 && (o = 0),
                                    s[o].focus()
                                }
                            }
                        }
                    }, a(t, null, [{
                        key: "VERSION",
                        get: function() {
                            return ge
                        }
                    }, {
                        key: "Default",
                        get: function() {
                            return Je
                        }
                    }, {
                        key: "DefaultType",
                        get: function() {
                            return tn
                        }
                    }]), t
                }();
            r.default(document).on(Me, ze, en._dataApiKeydownHandler).on(Me, Ve, en._dataApiKeydownHandler).on(Le + " " + He, en._clearMenus).on(Le, ze, (function(t) {
                t.preventDefault(),
                t.stopPropagation(),
                en._jQueryInterface.call(r.default(this), "toggle")
            })).on(Le, We, (function(t) {
                t.stopPropagation()
            })),
            r.default.fn[pe] = en._jQueryInterface,
            r.default.fn[pe].Constructor = en,
            r.default.fn[pe].noConflict = function() {
                return r.default.fn[pe] = _e, en._jQueryInterface
            };
            var nn = "modal",
                rn = "4.6.2",
                sn = "bs.modal",
                on = "." + sn,
                an = ".data-api",
                ln = r.default.fn[nn],
                un = 27,
                cn = "modal-dialog-scrollable",
                hn = "modal-scrollbar-measure",
                dn = "modal-backdrop",
                fn = "modal-open",
                pn = "fade",
                gn = "show",
                mn = "modal-static",
                vn = "hide" + on,
                yn = "hidePrevented" + on,
                _n = "hidden" + on,
                wn = "show" + on,
                bn = "shown" + on,
                xn = "focusin" + on,
                Cn = "resize" + on,
                En = "click.dismiss" + on,
                Tn = "keydown.dismiss" + on,
                Sn = "mouseup.dismiss" + on,
                An = "mousedown.dismiss" + on,
                Dn = "click" + on + an,
                kn = ".modal-dialog",
                Nn = ".modal-body",
                jn = '[data-toggle="modal"]',
                In = '[data-dismiss="modal"]',
                On = ".fixed-top, .fixed-bottom, .is-fixed, .sticky-top",
                Fn = ".sticky-top",
                Pn = {
                    backdrop: !0,
                    keyboard: !0,
                    focus: !0,
                    show: !0
                },
                $n = {
                    backdrop: "(boolean|string)",
                    keyboard: "boolean",
                    focus: "boolean",
                    show: "boolean"
                },
                qn = function() {
                    function t(t, e) {
                        this._config = this._getConfig(e),
                        this._element = t,
                        this._dialog = t.querySelector(kn),
                        this._backdrop = null,
                        this._isShown = !1,
                        this._isBodyOverflowing = !1,
                        this._ignoreBackdropClick = !1,
                        this._isTransitioning = !1,
                        this._scrollbarWidth = 0
                    }
                    var e = t.prototype;
                    return e.toggle = function(t) {
                        return this._isShown ? this.hide() : this.show(t)
                    }, e.show = function(t) {
                        var e = this;
                        if (!this._isShown && !this._isTransitioning) {
                            var n = r.default.Event(wn, {
                                relatedTarget: t
                            });
                            r.default(this._element).trigger(n),
                            n.isDefaultPrevented() || (this._isShown = !0, r.default(this._element).hasClass(pn) && (this._isTransitioning = !0), this._checkScrollbar(), this._setScrollbar(), this._adjustDialog(), this._setEscapeEvent(), this._setResizeEvent(), r.default(this._element).on(En, In, (function(t) {
                                return e.hide(t)
                            })), r.default(this._dialog).on(An, (function() {
                                r.default(e._element).one(Sn, (function(t) {
                                    r.default(t.target).is(e._element) && (e._ignoreBackdropClick = !0)
                                }))
                            })), this._showBackdrop((function() {
                                return e._showElement(t)
                            })))
                        }
                    }, e.hide = function(t) {
                        var e = this;
                        if (t && t.preventDefault(), this._isShown && !this._isTransitioning) {
                            var n = r.default.Event(vn);
                            if (r.default(this._element).trigger(n), this._isShown && !n.isDefaultPrevented()) {
                                this._isShown = !1;
                                var i = r.default(this._element).hasClass(pn);
                                if (i && (this._isTransitioning = !0), this._setEscapeEvent(), this._setResizeEvent(), r.default(document).off(xn), r.default(this._element).removeClass(gn), r.default(this._element).off(En), r.default(this._dialog).off(An), i) {
                                    var s = y.getTransitionDurationFromElement(this._element);
                                    r.default(this._element).one(y.TRANSITION_END, (function(t) {
                                        return e._hideModal(t)
                                    })).emulateTransitionEnd(s)
                                } else
                                    this._hideModal()
                            }
                        }
                    }, e.dispose = function() {
                        [window, this._element, this._dialog].forEach((function(t) {
                            return r.default(t).off(on)
                        })),
                        r.default(document).off(xn),
                        r.default.removeData(this._element, sn),
                        this._config = null,
                        this._element = null,
                        this._dialog = null,
                        this._backdrop = null,
                        this._isShown = null,
                        this._isBodyOverflowing = null,
                        this._ignoreBackdropClick = null,
                        this._isTransitioning = null,
                        this._scrollbarWidth = null
                    }, e.handleUpdate = function() {
                        this._adjustDialog()
                    }, e._getConfig = function(t) {
                        return t = l({}, Pn, t), y.typeCheckConfig(nn, t, $n), t
                    }, e._triggerBackdropTransition = function() {
                        var t = this,
                            e = r.default.Event(yn);
                        if (r.default(this._element).trigger(e), !e.isDefaultPrevented()) {
                            var n = this._element.scrollHeight > document.documentElement.clientHeight;
                            n || (this._element.style.overflowY = "hidden"),
                            this._element.classList.add(mn);
                            var i = y.getTransitionDurationFromElement(this._dialog);
                            r.default(this._element).off(y.TRANSITION_END),
                            r.default(this._element).one(y.TRANSITION_END, (function() {
                                t._element.classList.remove(mn),
                                n || r.default(t._element).one(y.TRANSITION_END, (function() {
                                    t._element.style.overflowY = ""
                                })).emulateTransitionEnd(t._element, i)
                            })).emulateTransitionEnd(i),
                            this._element.focus()
                        }
                    }, e._showElement = function(t) {
                        var e = this,
                            n = r.default(this._element).hasClass(pn),
                            i = this._dialog ? this._dialog.querySelector(Nn) : null;
                        this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE || document.body.appendChild(this._element),
                        this._element.style.display = "block",
                        this._element.removeAttribute("aria-hidden"),
                        this._element.setAttribute("aria-modal", !0),
                        this._element.setAttribute("role", "dialog"),
                        r.default(this._dialog).hasClass(cn) && i ? i.scrollTop = 0 : this._element.scrollTop = 0,
                        n && y.reflow(this._element),
                        r.default(this._element).addClass(gn),
                        this._config.focus && this._enforceFocus();
                        var s = r.default.Event(bn, {
                                relatedTarget: t
                            }),
                            o = function() {
                                e._config.focus && e._element.focus(),
                                e._isTransitioning = !1,
                                r.default(e._element).trigger(s)
                            };
                        if (n) {
                            var a = y.getTransitionDurationFromElement(this._dialog);
                            r.default(this._dialog).one(y.TRANSITION_END, o).emulateTransitionEnd(a)
                        } else
                            o()
                    }, e._enforceFocus = function() {
                        var t = this;
                        r.default(document).off(xn).on(xn, (function(e) {
                            document !== e.target && t._element !== e.target && 0 === r.default(t._element).has(e.target).length && t._element.focus()
                        }))
                    }, e._setEscapeEvent = function() {
                        var t = this;
                        this._isShown ? r.default(this._element).on(Tn, (function(e) {
                            t._config.keyboard && e.which === un ? (e.preventDefault(), t.hide()) : t._config.keyboard || e.which !== un || t._triggerBackdropTransition()
                        })) : this._isShown || r.default(this._element).off(Tn)
                    }, e._setResizeEvent = function() {
                        var t = this;
                        this._isShown ? r.default(window).on(Cn, (function(e) {
                            return t.handleUpdate(e)
                        })) : r.default(window).off(Cn)
                    }, e._hideModal = function() {
                        var t = this;
                        this._element.style.display = "none",
                        this._element.setAttribute("aria-hidden", !0),
                        this._element.removeAttribute("aria-modal"),
                        this._element.removeAttribute("role"),
                        this._isTransitioning = !1,
                        this._showBackdrop((function() {
                            r.default(document.body).removeClass(fn),
                            t._resetAdjustments(),
                            t._resetScrollbar(),
                            r.default(t._element).trigger(_n)
                        }))
                    }, e._removeBackdrop = function() {
                        this._backdrop && (r.default(this._backdrop).remove(), this._backdrop = null)
                    }, e._showBackdrop = function(t) {
                        var e = this,
                            n = r.default(this._element).hasClass(pn) ? pn : "";
                        if (this._isShown && this._config.backdrop) {
                            if (this._backdrop = document.createElement("div"), this._backdrop.className = dn, n && this._backdrop.classList.add(n), r.default(this._backdrop).appendTo(document.body), r.default(this._element).on(En, (function(t) {
                                e._ignoreBackdropClick ? e._ignoreBackdropClick = !1 : t.target === t.currentTarget && ("static" === e._config.backdrop ? e._triggerBackdropTransition() : e.hide())
                            })), n && y.reflow(this._backdrop), r.default(this._backdrop).addClass(gn), !t)
                                return;
                            if (!n)
                                return void t();
                            var i = y.getTransitionDurationFromElement(this._backdrop);
                            r.default(this._backdrop).one(y.TRANSITION_END, t).emulateTransitionEnd(i)
                        } else if (!this._isShown && this._backdrop) {
                            r.default(this._backdrop).removeClass(gn);
                            var s = function() {
                                e._removeBackdrop(),
                                t && t()
                            };
                            if (r.default(this._element).hasClass(pn)) {
                                var o = y.getTransitionDurationFromElement(this._backdrop);
                                r.default(this._backdrop).one(y.TRANSITION_END, s).emulateTransitionEnd(o)
                            } else
                                s()
                        } else
                            t && t()
                    }, e._adjustDialog = function() {
                        var t = this._element.scrollHeight > document.documentElement.clientHeight;
                        !this._isBodyOverflowing && t && (this._element.style.paddingLeft = this._scrollbarWidth + "px"),
                        this._isBodyOverflowing && !t && (this._element.style.paddingRight = this._scrollbarWidth + "px")
                    }, e._resetAdjustments = function() {
                        this._element.style.paddingLeft = "",
                        this._element.style.paddingRight = ""
                    }, e._checkScrollbar = function() {
                        var t = document.body.getBoundingClientRect();
                        this._isBodyOverflowing = Math.round(t.left + t.right) < window.innerWidth,
                        this._scrollbarWidth = this._getScrollbarWidth()
                    }, e._setScrollbar = function() {
                        var t = this;
                        if (this._isBodyOverflowing) {
                            var e = [].slice.call(document.querySelectorAll(On)),
                                n = [].slice.call(document.querySelectorAll(Fn));
                            r.default(e).each((function(e, n) {
                                var i = n.style.paddingRight,
                                    s = r.default(n).css("padding-right");
                                r.default(n).data("padding-right", i).css("padding-right", parseFloat(s) + t._scrollbarWidth + "px")
                            })),
                            r.default(n).each((function(e, n) {
                                var i = n.style.marginRight,
                                    s = r.default(n).css("margin-right");
                                r.default(n).data("margin-right", i).css("margin-right", parseFloat(s) - t._scrollbarWidth + "px")
                            }));
                            var i = document.body.style.paddingRight,
                                s = r.default(document.body).css("padding-right");
                            r.default(document.body).data("padding-right", i).css("padding-right", parseFloat(s) + this._scrollbarWidth + "px")
                        }
                        r.default(document.body).addClass(fn)
                    }, e._resetScrollbar = function() {
                        var t = [].slice.call(document.querySelectorAll(On));
                        r.default(t).each((function(t, e) {
                            var n = r.default(e).data("padding-right");
                            r.default(e).removeData("padding-right"),
                            e.style.paddingRight = n || ""
                        }));
                        var e = [].slice.call(document.querySelectorAll("" + Fn));
                        r.default(e).each((function(t, e) {
                            var n = r.default(e).data("margin-right");
                            void 0 !== n && r.default(e).css("margin-right", n).removeData("margin-right")
                        }));
                        var n = r.default(document.body).data("padding-right");
                        r.default(document.body).removeData("padding-right"),
                        document.body.style.paddingRight = n || ""
                    }, e._getScrollbarWidth = function() {
                        var t = document.createElement("div");
                        t.className = hn,
                        document.body.appendChild(t);
                        var e = t.getBoundingClientRect().width - t.clientWidth;
                        return document.body.removeChild(t), e
                    }, t._jQueryInterface = function(e, n) {
                        return this.each((function() {
                            var i = r.default(this).data(sn),
                                s = l({}, Pn, r.default(this).data(), "object" == typeof e && e ? e : {});
                            if (i || (i = new t(this, s), r.default(this).data(sn, i)), "string" == typeof e) {
                                if (void 0 === i[e])
                                    throw new TypeError('No method named "' + e + '"');
                                i[e](n)
                            } else
                                s.show && i.show(n)
                        }))
                    }, a(t, null, [{
                        key: "VERSION",
                        get: function() {
                            return rn
                        }
                    }, {
                        key: "Default",
                        get: function() {
                            return Pn
                        }
                    }]), t
                }();
            r.default(document).on(Dn, jn, (function(t) {
                var e,
                    n = this,
                    i = y.getSelectorFromElement(this);
                i && (e = document.querySelector(i));
                var s = r.default(e).data(sn) ? "toggle" : l({}, r.default(e).data(), r.default(this).data());
                "A" !== this.tagName && "AREA" !== this.tagName || t.preventDefault();
                var o = r.default(e).one(wn, (function(t) {
                    t.isDefaultPrevented() || o.one(_n, (function() {
                        r.default(n).is(":visible") && n.focus()
                    }))
                }));
                qn._jQueryInterface.call(r.default(e), s, this)
            })),
            r.default.fn[nn] = qn._jQueryInterface,
            r.default.fn[nn].Constructor = qn,
            r.default.fn[nn].noConflict = function() {
                return r.default.fn[nn] = ln, qn._jQueryInterface
            };
            var Rn = ["background", "cite", "href", "itemtype", "longdesc", "poster", "src", "xlink:href"],
                Ln = {
                    "*": ["class", "dir", "id", "lang", "role", /^aria-[\w-]*$/i],
                    a: ["target", "href", "title", "rel"],
                    area: [],
                    b: [],
                    br: [],
                    col: [],
                    code: [],
                    div: [],
                    em: [],
                    hr: [],
                    h1: [],
                    h2: [],
                    h3: [],
                    h4: [],
                    h5: [],
                    h6: [],
                    i: [],
                    img: ["src", "srcset", "alt", "title", "width", "height"],
                    li: [],
                    ol: [],
                    p: [],
                    pre: [],
                    s: [],
                    small: [],
                    span: [],
                    sub: [],
                    sup: [],
                    strong: [],
                    u: [],
                    ul: []
                },
                Mn = /^(?:(?:https?|mailto|ftp|tel|file|sms):|[^#&/:?]*(?:[#/?]|$))/i,
                Hn = /^data:(?:image\/(?:bmp|gif|jpeg|jpg|png|tiff|webp)|video\/(?:mpeg|mp4|ogg|webm)|audio\/(?:mp3|oga|ogg|opus));base64,[\d+/a-z]+=*$/i;
            function zn(t, e) {
                var n = t.nodeName.toLowerCase();
                if (-1 !== e.indexOf(n))
                    return -1 === Rn.indexOf(n) || Boolean(Mn.test(t.nodeValue) || Hn.test(t.nodeValue));
                for (var i = e.filter((function(t) {
                        return t instanceof RegExp
                    })), r = 0, s = i.length; r < s; r++)
                    if (i[r].test(n))
                        return !0;
                return !1
            }
            function Wn(t, e, n) {
                if (0 === t.length)
                    return t;
                if (n && "function" == typeof n)
                    return n(t);
                for (var i = (new window.DOMParser).parseFromString(t, "text/html"), r = Object.keys(e), s = [].slice.call(i.body.querySelectorAll("*")), o = function(t, n) {
                        var i = s[t],
                            o = i.nodeName.toLowerCase();
                        if (-1 === r.indexOf(i.nodeName.toLowerCase()))
                            return i.parentNode.removeChild(i), "continue";
                        var a = [].slice.call(i.attributes),
                            l = [].concat(e["*"] || [], e[o] || []);
                        a.forEach((function(t) {
                            zn(t, l) || i.removeAttribute(t.nodeName)
                        }))
                    }, a = 0, l = s.length; a < l; a++)
                    o(a);
                return i.body.innerHTML
            }
            var Vn = "tooltip",
                Bn = "4.6.2",
                Un = "bs.tooltip",
                Qn = "." + Un,
                Xn = r.default.fn[Vn],
                Zn = "bs-tooltip",
                Yn = new RegExp("(^|\\s)" + Zn + "\\S+", "g"),
                Kn = ["sanitize", "whiteList", "sanitizeFn"],
                Gn = "fade",
                Jn = "show",
                ti = "show",
                ei = "out",
                ni = ".tooltip-inner",
                ii = ".arrow",
                ri = "hover",
                si = "focus",
                oi = "click",
                ai = "manual",
                li = {
                    AUTO: "auto",
                    TOP: "top",
                    RIGHT: "right",
                    BOTTOM: "bottom",
                    LEFT: "left"
                },
                ui = {
                    animation: !0,
                    template: '<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
                    trigger: "hover focus",
                    title: "",
                    delay: 0,
                    html: !1,
                    selector: !1,
                    placement: "top",
                    offset: 0,
                    container: !1,
                    fallbackPlacement: "flip",
                    boundary: "scrollParent",
                    customClass: "",
                    sanitize: !0,
                    sanitizeFn: null,
                    whiteList: Ln,
                    popperConfig: null
                },
                ci = {
                    animation: "boolean",
                    template: "string",
                    title: "(string|element|function)",
                    trigger: "string",
                    delay: "(number|object)",
                    html: "boolean",
                    selector: "(string|boolean)",
                    placement: "(string|function)",
                    offset: "(number|string|function)",
                    container: "(string|element|boolean)",
                    fallbackPlacement: "(string|array)",
                    boundary: "(string|element)",
                    customClass: "(string|function)",
                    sanitize: "boolean",
                    sanitizeFn: "(null|function)",
                    whiteList: "object",
                    popperConfig: "(null|object)"
                },
                hi = {
                    HIDE: "hide" + Qn,
                    HIDDEN: "hidden" + Qn,
                    SHOW: "show" + Qn,
                    SHOWN: "shown" + Qn,
                    INSERTED: "inserted" + Qn,
                    CLICK: "click" + Qn,
                    FOCUSIN: "focusin" + Qn,
                    FOCUSOUT: "focusout" + Qn,
                    MOUSEENTER: "mouseenter" + Qn,
                    MOUSELEAVE: "mouseleave" + Qn
                },
                di = function() {
                    function t(t, e) {
                        if (void 0 === s.default)
                            throw new TypeError("Bootstrap's tooltips require Popper (https://popper.js.org)");
                        this._isEnabled = !0,
                        this._timeout = 0,
                        this._hoverState = "",
                        this._activeTrigger = {},
                        this._popper = null,
                        this.element = t,
                        this.config = this._getConfig(e),
                        this.tip = null,
                        this._setListeners()
                    }
                    var e = t.prototype;
                    return e.enable = function() {
                        this._isEnabled = !0
                    }, e.disable = function() {
                        this._isEnabled = !1
                    }, e.toggleEnabled = function() {
                        this._isEnabled = !this._isEnabled
                    }, e.toggle = function(t) {
                        if (this._isEnabled)
                            if (t) {
                                var e = this.constructor.DATA_KEY,
                                    n = r.default(t.currentTarget).data(e);
                                n || (n = new this.constructor(t.currentTarget, this._getDelegateConfig()), r.default(t.currentTarget).data(e, n)),
                                n._activeTrigger.click = !n._activeTrigger.click,
                                n._isWithActiveTrigger() ? n._enter(null, n) : n._leave(null, n)
                            } else {
                                if (r.default(this.getTipElement()).hasClass(Jn))
                                    return void this._leave(null, this);
                                this._enter(null, this)
                            }
                    }, e.dispose = function() {
                        clearTimeout(this._timeout),
                        r.default.removeData(this.element, this.constructor.DATA_KEY),
                        r.default(this.element).off(this.constructor.EVENT_KEY),
                        r.default(this.element).closest(".modal").off("hide.bs.modal", this._hideModalHandler),
                        this.tip && r.default(this.tip).remove(),
                        this._isEnabled = null,
                        this._timeout = null,
                        this._hoverState = null,
                        this._activeTrigger = null,
                        this._popper && this._popper.destroy(),
                        this._popper = null,
                        this.element = null,
                        this.config = null,
                        this.tip = null
                    }, e.show = function() {
                        var t = this;
                        if ("none" === r.default(this.element).css("display"))
                            throw new Error("Please use show on visible elements");
                        var e = r.default.Event(this.constructor.Event.SHOW);
                        if (this.isWithContent() && this._isEnabled) {
                            r.default(this.element).trigger(e);
                            var n = y.findShadowRoot(this.element),
                                i = r.default.contains(null !== n ? n : this.element.ownerDocument.documentElement, this.element);
                            if (e.isDefaultPrevented() || !i)
                                return;
                            var o = this.getTipElement(),
                                a = y.getUID(this.constructor.NAME);
                            o.setAttribute("id", a),
                            this.element.setAttribute("aria-describedby", a),
                            this.setContent(),
                            this.config.animation && r.default(o).addClass(Gn);
                            var l = "function" == typeof this.config.placement ? this.config.placement.call(this, o, this.element) : this.config.placement,
                                u = this._getAttachment(l);
                            this.addAttachmentClass(u);
                            var c = this._getContainer();
                            r.default(o).data(this.constructor.DATA_KEY, this),
                            r.default.contains(this.element.ownerDocument.documentElement, this.tip) || r.default(o).appendTo(c),
                            r.default(this.element).trigger(this.constructor.Event.INSERTED),
                            this._popper = new s.default(this.element, o, this._getPopperConfig(u)),
                            r.default(o).addClass(Jn),
                            r.default(o).addClass(this.config.customClass),
                            "ontouchstart" in document.documentElement && r.default(document.body).children().on("mouseover", null, r.default.noop);
                            var h = function() {
                                t.config.animation && t._fixTransition();
                                var e = t._hoverState;
                                t._hoverState = null,
                                r.default(t.element).trigger(t.constructor.Event.SHOWN),
                                e === ei && t._leave(null, t)
                            };
                            if (r.default(this.tip).hasClass(Gn)) {
                                var d = y.getTransitionDurationFromElement(this.tip);
                                r.default(this.tip).one(y.TRANSITION_END, h).emulateTransitionEnd(d)
                            } else
                                h()
                        }
                    }, e.hide = function(t) {
                        var e = this,
                            n = this.getTipElement(),
                            i = r.default.Event(this.constructor.Event.HIDE),
                            s = function() {
                                e._hoverState !== ti && n.parentNode && n.parentNode.removeChild(n),
                                e._cleanTipClass(),
                                e.element.removeAttribute("aria-describedby"),
                                r.default(e.element).trigger(e.constructor.Event.HIDDEN),
                                null !== e._popper && e._popper.destroy(),
                                t && t()
                            };
                        if (r.default(this.element).trigger(i), !i.isDefaultPrevented()) {
                            if (r.default(n).removeClass(Jn), "ontouchstart" in document.documentElement && r.default(document.body).children().off("mouseover", null, r.default.noop), this._activeTrigger[oi] = !1, this._activeTrigger[si] = !1, this._activeTrigger[ri] = !1, r.default(this.tip).hasClass(Gn)) {
                                var o = y.getTransitionDurationFromElement(n);
                                r.default(n).one(y.TRANSITION_END, s).emulateTransitionEnd(o)
                            } else
                                s();
                            this._hoverState = ""
                        }
                    }, e.update = function() {
                        null !== this._popper && this._popper.scheduleUpdate()
                    }, e.isWithContent = function() {
                        return Boolean(this.getTitle())
                    }, e.addAttachmentClass = function(t) {
                        r.default(this.getTipElement()).addClass(Zn + "-" + t)
                    }, e.getTipElement = function() {
                        return this.tip = this.tip || r.default(this.config.template)[0], this.tip
                    }, e.setContent = function() {
                        var t = this.getTipElement();
                        this.setElementContent(r.default(t.querySelectorAll(ni)), this.getTitle()),
                        r.default(t).removeClass(Gn + " " + Jn)
                    }, e.setElementContent = function(t, e) {
                        "object" != typeof e || !e.nodeType && !e.jquery ? this.config.html ? (this.config.sanitize && (e = Wn(e, this.config.whiteList, this.config.sanitizeFn)), t.html(e)) : t.text(e) : this.config.html ? r.default(e).parent().is(t) || t.empty().append(e) : t.text(r.default(e).text())
                    }, e.getTitle = function() {
                        var t = this.element.getAttribute("data-original-title");
                        return t || (t = "function" == typeof this.config.title ? this.config.title.call(this.element) : this.config.title), t
                    }, e._getPopperConfig = function(t) {
                        var e = this;
                        return l({}, {
                            placement: t,
                            modifiers: {
                                offset: this._getOffset(),
                                flip: {
                                    behavior: this.config.fallbackPlacement
                                },
                                arrow: {
                                    element: ii
                                },
                                preventOverflow: {
                                    boundariesElement: this.config.boundary
                                }
                            },
                            onCreate: function(t) {
                                t.originalPlacement !== t.placement && e._handlePopperPlacementChange(t)
                            },
                            onUpdate: function(t) {
                                return e._handlePopperPlacementChange(t)
                            }
                        }, this.config.popperConfig)
                    }, e._getOffset = function() {
                        var t = this,
                            e = {};
                        return "function" == typeof this.config.offset ? e.fn = function(e) {
                            return e.offsets = l({}, e.offsets, t.config.offset(e.offsets, t.element)), e
                        } : e.offset = this.config.offset, e
                    }, e._getContainer = function() {
                        return !1 === this.config.container ? document.body : y.isElement(this.config.container) ? r.default(this.config.container) : r.default(document).find(this.config.container)
                    }, e._getAttachment = function(t) {
                        return li[t.toUpperCase()]
                    }, e._setListeners = function() {
                        var t = this;
                        this.config.trigger.split(" ").forEach((function(e) {
                            if ("click" === e)
                                r.default(t.element).on(t.constructor.Event.CLICK, t.config.selector, (function(e) {
                                    return t.toggle(e)
                                }));
                            else if (e !== ai) {
                                var n = e === ri ? t.constructor.Event.MOUSEENTER : t.constructor.Event.FOCUSIN,
                                    i = e === ri ? t.constructor.Event.MOUSELEAVE : t.constructor.Event.FOCUSOUT;
                                r.default(t.element).on(n, t.config.selector, (function(e) {
                                    return t._enter(e)
                                })).on(i, t.config.selector, (function(e) {
                                    return t._leave(e)
                                }))
                            }
                        })),
                        this._hideModalHandler = function() {
                            t.element && t.hide()
                        },
                        r.default(this.element).closest(".modal").on("hide.bs.modal", this._hideModalHandler),
                        this.config.selector ? this.config = l({}, this.config, {
                            trigger: "manual",
                            selector: ""
                        }) : this._fixTitle()
                    }, e._fixTitle = function() {
                        var t = typeof this.element.getAttribute("data-original-title");
                        (this.element.getAttribute("title") || "string" !== t) && (this.element.setAttribute("data-original-title", this.element.getAttribute("title") || ""), this.element.setAttribute("title", ""))
                    }, e._enter = function(t, e) {
                        var n = this.constructor.DATA_KEY;
                        (e = e || r.default(t.currentTarget).data(n)) || (e = new this.constructor(t.currentTarget, this._getDelegateConfig()), r.default(t.currentTarget).data(n, e)),
                        t && (e._activeTrigger["focusin" === t.type ? si : ri] = !0),
                        r.default(e.getTipElement()).hasClass(Jn) || e._hoverState === ti ? e._hoverState = ti : (clearTimeout(e._timeout), e._hoverState = ti, e.config.delay && e.config.delay.show ? e._timeout = setTimeout((function() {
                            e._hoverState === ti && e.show()
                        }), e.config.delay.show) : e.show())
                    }, e._leave = function(t, e) {
                        var n = this.constructor.DATA_KEY;
                        (e = e || r.default(t.currentTarget).data(n)) || (e = new this.constructor(t.currentTarget, this._getDelegateConfig()), r.default(t.currentTarget).data(n, e)),
                        t && (e._activeTrigger["focusout" === t.type ? si : ri] = !1),
                        e._isWithActiveTrigger() || (clearTimeout(e._timeout), e._hoverState = ei, e.config.delay && e.config.delay.hide ? e._timeout = setTimeout((function() {
                            e._hoverState === ei && e.hide()
                        }), e.config.delay.hide) : e.hide())
                    }, e._isWithActiveTrigger = function() {
                        for (var t in this._activeTrigger)
                            if (this._activeTrigger[t])
                                return !0;
                        return !1
                    }, e._getConfig = function(t) {
                        var e = r.default(this.element).data();
                        return Object.keys(e).forEach((function(t) {
                            -1 !== Kn.indexOf(t) && delete e[t]
                        })), "number" == typeof (t = l({}, this.constructor.Default, e, "object" == typeof t && t ? t : {})).delay && (t.delay = {
                            show: t.delay,
                            hide: t.delay
                        }), "number" == typeof t.title && (t.title = t.title.toString()), "number" == typeof t.content && (t.content = t.content.toString()), y.typeCheckConfig(Vn, t, this.constructor.DefaultType), t.sanitize && (t.template = Wn(t.template, t.whiteList, t.sanitizeFn)), t
                    }, e._getDelegateConfig = function() {
                        var t = {};
                        if (this.config)
                            for (var e in this.config)
                                this.constructor.Default[e] !== this.config[e] && (t[e] = this.config[e]);
                        return t
                    }, e._cleanTipClass = function() {
                        var t = r.default(this.getTipElement()),
                            e = t.attr("class").match(Yn);
                        null !== e && e.length && t.removeClass(e.join(""))
                    }, e._handlePopperPlacementChange = function(t) {
                        this.tip = t.instance.popper,
                        this._cleanTipClass(),
                        this.addAttachmentClass(this._getAttachment(t.placement))
                    }, e._fixTransition = function() {
                        var t = this.getTipElement(),
                            e = this.config.animation;
                        null === t.getAttribute("x-placement") && (r.default(t).removeClass(Gn), this.config.animation = !1, this.hide(), this.show(), this.config.animation = e)
                    }, t._jQueryInterface = function(e) {
                        return this.each((function() {
                            var n = r.default(this),
                                i = n.data(Un),
                                s = "object" == typeof e && e;
                            if ((i || !/dispose|hide/.test(e)) && (i || (i = new t(this, s), n.data(Un, i)), "string" == typeof e)) {
                                if (void 0 === i[e])
                                    throw new TypeError('No method named "' + e + '"');
                                i[e]()
                            }
                        }))
                    }, a(t, null, [{
                        key: "VERSION",
                        get: function() {
                            return Bn
                        }
                    }, {
                        key: "Default",
                        get: function() {
                            return ui
                        }
                    }, {
                        key: "NAME",
                        get: function() {
                            return Vn
                        }
                    }, {
                        key: "DATA_KEY",
                        get: function() {
                            return Un
                        }
                    }, {
                        key: "Event",
                        get: function() {
                            return hi
                        }
                    }, {
                        key: "EVENT_KEY",
                        get: function() {
                            return Qn
                        }
                    }, {
                        key: "DefaultType",
                        get: function() {
                            return ci
                        }
                    }]), t
                }();
            r.default.fn[Vn] = di._jQueryInterface,
            r.default.fn[Vn].Constructor = di,
            r.default.fn[Vn].noConflict = function() {
                return r.default.fn[Vn] = Xn, di._jQueryInterface
            };
            var fi = "popover",
                pi = "4.6.2",
                gi = "bs.popover",
                mi = "." + gi,
                vi = r.default.fn[fi],
                yi = "bs-popover",
                _i = new RegExp("(^|\\s)" + yi + "\\S+", "g"),
                wi = "fade",
                bi = "show",
                xi = ".popover-header",
                Ci = ".popover-body",
                Ei = l({}, di.Default, {
                    placement: "right",
                    trigger: "click",
                    content: "",
                    template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
                }),
                Ti = l({}, di.DefaultType, {
                    content: "(string|element|function)"
                }),
                Si = {
                    HIDE: "hide" + mi,
                    HIDDEN: "hidden" + mi,
                    SHOW: "show" + mi,
                    SHOWN: "shown" + mi,
                    INSERTED: "inserted" + mi,
                    CLICK: "click" + mi,
                    FOCUSIN: "focusin" + mi,
                    FOCUSOUT: "focusout" + mi,
                    MOUSEENTER: "mouseenter" + mi,
                    MOUSELEAVE: "mouseleave" + mi
                },
                Ai = function(t) {
                    function e() {
                        return t.apply(this, arguments) || this
                    }
                    u(e, t);
                    var n = e.prototype;
                    return n.isWithContent = function() {
                        return this.getTitle() || this._getContent()
                    }, n.addAttachmentClass = function(t) {
                        r.default(this.getTipElement()).addClass(yi + "-" + t)
                    }, n.getTipElement = function() {
                        return this.tip = this.tip || r.default(this.config.template)[0], this.tip
                    }, n.setContent = function() {
                        var t = r.default(this.getTipElement());
                        this.setElementContent(t.find(xi), this.getTitle());
                        var e = this._getContent();
                        "function" == typeof e && (e = e.call(this.element)),
                        this.setElementContent(t.find(Ci), e),
                        t.removeClass(wi + " " + bi)
                    }, n._getContent = function() {
                        return this.element.getAttribute("data-content") || this.config.content
                    }, n._cleanTipClass = function() {
                        var t = r.default(this.getTipElement()),
                            e = t.attr("class").match(_i);
                        null !== e && e.length > 0 && t.removeClass(e.join(""))
                    }, e._jQueryInterface = function(t) {
                        return this.each((function() {
                            var n = r.default(this).data(gi),
                                i = "object" == typeof t ? t : null;
                            if ((n || !/dispose|hide/.test(t)) && (n || (n = new e(this, i), r.default(this).data(gi, n)), "string" == typeof t)) {
                                if (void 0 === n[t])
                                    throw new TypeError('No method named "' + t + '"');
                                n[t]()
                            }
                        }))
                    }, a(e, null, [{
                        key: "VERSION",
                        get: function() {
                            return pi
                        }
                    }, {
                        key: "Default",
                        get: function() {
                            return Ei
                        }
                    }, {
                        key: "NAME",
                        get: function() {
                            return fi
                        }
                    }, {
                        key: "DATA_KEY",
                        get: function() {
                            return gi
                        }
                    }, {
                        key: "Event",
                        get: function() {
                            return Si
                        }
                    }, {
                        key: "EVENT_KEY",
                        get: function() {
                            return mi
                        }
                    }, {
                        key: "DefaultType",
                        get: function() {
                            return Ti
                        }
                    }]), e
                }(di);
            r.default.fn[fi] = Ai._jQueryInterface,
            r.default.fn[fi].Constructor = Ai,
            r.default.fn[fi].noConflict = function() {
                return r.default.fn[fi] = vi, Ai._jQueryInterface
            };
            var Di = "scrollspy",
                ki = "4.6.2",
                Ni = "bs.scrollspy",
                ji = "." + Ni,
                Ii = ".data-api",
                Oi = r.default.fn[Di],
                Fi = "dropdown-item",
                Pi = "active",
                $i = "activate" + ji,
                qi = "scroll" + ji,
                Ri = "load" + ji + Ii,
                Li = "offset",
                Mi = "position",
                Hi = '[data-spy="scroll"]',
                zi = ".nav, .list-group",
                Wi = ".nav-link",
                Vi = ".nav-item",
                Bi = ".list-group-item",
                Ui = ".dropdown",
                Qi = ".dropdown-item",
                Xi = ".dropdown-toggle",
                Zi = {
                    offset: 10,
                    method: "auto",
                    target: ""
                },
                Yi = {
                    offset: "number",
                    method: "string",
                    target: "(string|element)"
                },
                Ki = function() {
                    function t(t, e) {
                        var n = this;
                        this._element = t,
                        this._scrollElement = "BODY" === t.tagName ? window : t,
                        this._config = this._getConfig(e),
                        this._selector = this._config.target + " " + Wi + "," + this._config.target + " " + Bi + "," + this._config.target + " " + Qi,
                        this._offsets = [],
                        this._targets = [],
                        this._activeTarget = null,
                        this._scrollHeight = 0,
                        r.default(this._scrollElement).on(qi, (function(t) {
                            return n._process(t)
                        })),
                        this.refresh(),
                        this._process()
                    }
                    var e = t.prototype;
                    return e.refresh = function() {
                        var t = this,
                            e = this._scrollElement === this._scrollElement.window ? Li : Mi,
                            n = "auto" === this._config.method ? e : this._config.method,
                            i = n === Mi ? this._getScrollTop() : 0;
                        this._offsets = [],
                        this._targets = [],
                        this._scrollHeight = this._getScrollHeight(),
                        [].slice.call(document.querySelectorAll(this._selector)).map((function(t) {
                            var e,
                                s = y.getSelectorFromElement(t);
                            if (s && (e = document.querySelector(s)), e) {
                                var o = e.getBoundingClientRect();
                                if (o.width || o.height)
                                    return [r.default(e)[n]().top + i, s]
                            }
                            return null
                        })).filter(Boolean).sort((function(t, e) {
                            return t[0] - e[0]
                        })).forEach((function(e) {
                            t._offsets.push(e[0]),
                            t._targets.push(e[1])
                        }))
                    }, e.dispose = function() {
                        r.default.removeData(this._element, Ni),
                        r.default(this._scrollElement).off(ji),
                        this._element = null,
                        this._scrollElement = null,
                        this._config = null,
                        this._selector = null,
                        this._offsets = null,
                        this._targets = null,
                        this._activeTarget = null,
                        this._scrollHeight = null
                    }, e._getConfig = function(t) {
                        if ("string" != typeof (t = l({}, Zi, "object" == typeof t && t ? t : {})).target && y.isElement(t.target)) {
                            var e = r.default(t.target).attr("id");
                            e || (e = y.getUID(Di), r.default(t.target).attr("id", e)),
                            t.target = "#" + e
                        }
                        return y.typeCheckConfig(Di, t, Yi), t
                    }, e._getScrollTop = function() {
                        return this._scrollElement === window ? this._scrollElement.pageYOffset : this._scrollElement.scrollTop
                    }, e._getScrollHeight = function() {
                        return this._scrollElement.scrollHeight || Math.max(document.body.scrollHeight, document.documentElement.scrollHeight)
                    }, e._getOffsetHeight = function() {
                        return this._scrollElement === window ? window.innerHeight : this._scrollElement.getBoundingClientRect().height
                    }, e._process = function() {
                        var t = this._getScrollTop() + this._config.offset,
                            e = this._getScrollHeight(),
                            n = this._config.offset + e - this._getOffsetHeight();
                        if (this._scrollHeight !== e && this.refresh(), t >= n) {
                            var i = this._targets[this._targets.length - 1];
                            this._activeTarget !== i && this._activate(i)
                        } else {
                            if (this._activeTarget && t < this._offsets[0] && this._offsets[0] > 0)
                                return this._activeTarget = null, void this._clear();
                            for (var r = this._offsets.length; r--;)
                                this._activeTarget !== this._targets[r] && t >= this._offsets[r] && (void 0 === this._offsets[r + 1] || t < this._offsets[r + 1]) && this._activate(this._targets[r])
                        }
                    }, e._activate = function(t) {
                        this._activeTarget = t,
                        this._clear();
                        var e = this._selector.split(",").map((function(e) {
                                return e + '[data-target="' + t + '"],' + e + '[href="' + t + '"]'
                            })),
                            n = r.default([].slice.call(document.querySelectorAll(e.join(","))));
                        n.hasClass(Fi) ? (n.closest(Ui).find(Xi).addClass(Pi), n.addClass(Pi)) : (n.addClass(Pi), n.parents(zi).prev(Wi + ", " + Bi).addClass(Pi), n.parents(zi).prev(Vi).children(Wi).addClass(Pi)),
                        r.default(this._scrollElement).trigger($i, {
                            relatedTarget: t
                        })
                    }, e._clear = function() {
                        [].slice.call(document.querySelectorAll(this._selector)).filter((function(t) {
                            return t.classList.contains(Pi)
                        })).forEach((function(t) {
                            return t.classList.remove(Pi)
                        }))
                    }, t._jQueryInterface = function(e) {
                        return this.each((function() {
                            var n = r.default(this).data(Ni);
                            if (n || (n = new t(this, "object" == typeof e && e), r.default(this).data(Ni, n)), "string" == typeof e) {
                                if (void 0 === n[e])
                                    throw new TypeError('No method named "' + e + '"');
                                n[e]()
                            }
                        }))
                    }, a(t, null, [{
                        key: "VERSION",
                        get: function() {
                            return ki
                        }
                    }, {
                        key: "Default",
                        get: function() {
                            return Zi
                        }
                    }]), t
                }();
            r.default(window).on(Ri, (function() {
                for (var t = [].slice.call(document.querySelectorAll(Hi)), e = t.length; e--;) {
                    var n = r.default(t[e]);
                    Ki._jQueryInterface.call(n, n.data())
                }
            })),
            r.default.fn[Di] = Ki._jQueryInterface,
            r.default.fn[Di].Constructor = Ki,
            r.default.fn[Di].noConflict = function() {
                return r.default.fn[Di] = Oi, Ki._jQueryInterface
            };
            var Gi = "tab",
                Ji = "4.6.2",
                tr = "bs.tab",
                er = "." + tr,
                nr = ".data-api",
                ir = r.default.fn[Gi],
                rr = "dropdown-menu",
                sr = "active",
                or = "disabled",
                ar = "fade",
                lr = "show",
                ur = "hide" + er,
                cr = "hidden" + er,
                hr = "show" + er,
                dr = "shown" + er,
                fr = "click" + er + nr,
                pr = ".dropdown",
                gr = ".nav, .list-group",
                mr = ".active",
                vr = "> li > .active",
                yr = '[data-toggle="tab"], [data-toggle="pill"], [data-toggle="list"]',
                _r = ".dropdown-toggle",
                wr = "> .dropdown-menu .active",
                br = function() {
                    function t(t) {
                        this._element = t
                    }
                    var e = t.prototype;
                    return e.show = function() {
                        var t = this;
                        if (!(this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE && r.default(this._element).hasClass(sr) || r.default(this._element).hasClass(or) || this._element.hasAttribute("disabled"))) {
                            var e,
                                n,
                                i = r.default(this._element).closest(gr)[0],
                                s = y.getSelectorFromElement(this._element);
                            if (i) {
                                var o = "UL" === i.nodeName || "OL" === i.nodeName ? vr : mr;
                                n = (n = r.default.makeArray(r.default(i).find(o)))[n.length - 1]
                            }
                            var a = r.default.Event(ur, {
                                    relatedTarget: this._element
                                }),
                                l = r.default.Event(hr, {
                                    relatedTarget: n
                                });
                            if (n && r.default(n).trigger(a), r.default(this._element).trigger(l), !l.isDefaultPrevented() && !a.isDefaultPrevented()) {
                                s && (e = document.querySelector(s)),
                                this._activate(this._element, i);
                                var u = function() {
                                    var e = r.default.Event(cr, {
                                            relatedTarget: t._element
                                        }),
                                        i = r.default.Event(dr, {
                                            relatedTarget: n
                                        });
                                    r.default(n).trigger(e),
                                    r.default(t._element).trigger(i)
                                };
                                e ? this._activate(e, e.parentNode, u) : u()
                            }
                        }
                    }, e.dispose = function() {
                        r.default.removeData(this._element, tr),
                        this._element = null
                    }, e._activate = function(t, e, n) {
                        var i = this,
                            s = (!e || "UL" !== e.nodeName && "OL" !== e.nodeName ? r.default(e).children(mr) : r.default(e).find(vr))[0],
                            o = n && s && r.default(s).hasClass(ar),
                            a = function() {
                                return i._transitionComplete(t, s, n)
                            };
                        if (s && o) {
                            var l = y.getTransitionDurationFromElement(s);
                            r.default(s).removeClass(lr).one(y.TRANSITION_END, a).emulateTransitionEnd(l)
                        } else
                            a()
                    }, e._transitionComplete = function(t, e, n) {
                        if (e) {
                            r.default(e).removeClass(sr);
                            var i = r.default(e.parentNode).find(wr)[0];
                            i && r.default(i).removeClass(sr),
                            "tab" === e.getAttribute("role") && e.setAttribute("aria-selected", !1)
                        }
                        r.default(t).addClass(sr),
                        "tab" === t.getAttribute("role") && t.setAttribute("aria-selected", !0),
                        y.reflow(t),
                        t.classList.contains(ar) && t.classList.add(lr);
                        var s = t.parentNode;
                        if (s && "LI" === s.nodeName && (s = s.parentNode), s && r.default(s).hasClass(rr)) {
                            var o = r.default(t).closest(pr)[0];
                            if (o) {
                                var a = [].slice.call(o.querySelectorAll(_r));
                                r.default(a).addClass(sr)
                            }
                            t.setAttribute("aria-expanded", !0)
                        }
                        n && n()
                    }, t._jQueryInterface = function(e) {
                        return this.each((function() {
                            var n = r.default(this),
                                i = n.data(tr);
                            if (i || (i = new t(this), n.data(tr, i)), "string" == typeof e) {
                                if (void 0 === i[e])
                                    throw new TypeError('No method named "' + e + '"');
                                i[e]()
                            }
                        }))
                    }, a(t, null, [{
                        key: "VERSION",
                        get: function() {
                            return Ji
                        }
                    }]), t
                }();
            r.default(document).on(fr, yr, (function(t) {
                t.preventDefault(),
                br._jQueryInterface.call(r.default(this), "show")
            })),
            r.default.fn[Gi] = br._jQueryInterface,
            r.default.fn[Gi].Constructor = br,
            r.default.fn[Gi].noConflict = function() {
                return r.default.fn[Gi] = ir, br._jQueryInterface
            };
            var xr = "toast",
                Cr = "4.6.2",
                Er = "bs.toast",
                Tr = "." + Er,
                Sr = r.default.fn[xr],
                Ar = "fade",
                Dr = "hide",
                kr = "show",
                Nr = "showing",
                jr = "click.dismiss" + Tr,
                Ir = "hide" + Tr,
                Or = "hidden" + Tr,
                Fr = "show" + Tr,
                Pr = "shown" + Tr,
                $r = '[data-dismiss="toast"]',
                qr = {
                    animation: !0,
                    autohide: !0,
                    delay: 500
                },
                Rr = {
                    animation: "boolean",
                    autohide: "boolean",
                    delay: "number"
                },
                Lr = function() {
                    function t(t, e) {
                        this._element = t,
                        this._config = this._getConfig(e),
                        this._timeout = null,
                        this._setListeners()
                    }
                    var e = t.prototype;
                    return e.show = function() {
                        var t = this,
                            e = r.default.Event(Fr);
                        if (r.default(this._element).trigger(e), !e.isDefaultPrevented()) {
                            this._clearTimeout(),
                            this._config.animation && this._element.classList.add(Ar);
                            var n = function() {
                                t._element.classList.remove(Nr),
                                t._element.classList.add(kr),
                                r.default(t._element).trigger(Pr),
                                t._config.autohide && (t._timeout = setTimeout((function() {
                                    t.hide()
                                }), t._config.delay))
                            };
                            if (this._element.classList.remove(Dr), y.reflow(this._element), this._element.classList.add(Nr), this._config.animation) {
                                var i = y.getTransitionDurationFromElement(this._element);
                                r.default(this._element).one(y.TRANSITION_END, n).emulateTransitionEnd(i)
                            } else
                                n()
                        }
                    }, e.hide = function() {
                        if (this._element.classList.contains(kr)) {
                            var t = r.default.Event(Ir);
                            r.default(this._element).trigger(t),
                            t.isDefaultPrevented() || this._close()
                        }
                    }, e.dispose = function() {
                        this._clearTimeout(),
                        this._element.classList.contains(kr) && this._element.classList.remove(kr),
                        r.default(this._element).off(jr),
                        r.default.removeData(this._element, Er),
                        this._element = null,
                        this._config = null
                    }, e._getConfig = function(t) {
                        return t = l({}, qr, r.default(this._element).data(), "object" == typeof t && t ? t : {}), y.typeCheckConfig(xr, t, this.constructor.DefaultType), t
                    }, e._setListeners = function() {
                        var t = this;
                        r.default(this._element).on(jr, $r, (function() {
                            return t.hide()
                        }))
                    }, e._close = function() {
                        var t = this,
                            e = function() {
                                t._element.classList.add(Dr),
                                r.default(t._element).trigger(Or)
                            };
                        if (this._element.classList.remove(kr), this._config.animation) {
                            var n = y.getTransitionDurationFromElement(this._element);
                            r.default(this._element).one(y.TRANSITION_END, e).emulateTransitionEnd(n)
                        } else
                            e()
                    }, e._clearTimeout = function() {
                        clearTimeout(this._timeout),
                        this._timeout = null
                    }, t._jQueryInterface = function(e) {
                        return this.each((function() {
                            var n = r.default(this),
                                i = n.data(Er);
                            if (i || (i = new t(this, "object" == typeof e && e), n.data(Er, i)), "string" == typeof e) {
                                if (void 0 === i[e])
                                    throw new TypeError('No method named "' + e + '"');
                                i[e](this)
                            }
                        }))
                    }, a(t, null, [{
                        key: "VERSION",
                        get: function() {
                            return Cr
                        }
                    }, {
                        key: "DefaultType",
                        get: function() {
                            return Rr
                        }
                    }, {
                        key: "Default",
                        get: function() {
                            return qr
                        }
                    }]), t
                }();
            r.default.fn[xr] = Lr._jQueryInterface,
            r.default.fn[xr].Constructor = Lr,
            r.default.fn[xr].noConflict = function() {
                return r.default.fn[xr] = Sr, Lr._jQueryInterface
            },
            t.Alert = I,
            t.Button = G,
            t.Carousel = Bt,
            t.Collapse = fe,
            t.Dropdown = en,
            t.Modal = qn,
            t.Popover = Ai,
            t.Scrollspy = Ki,
            t.Tab = br,
            t.Toast = Lr,
            t.Tooltip = di,
            t.Util = y,
            Object.defineProperty(t, "__esModule", {
                value: !0
            })
        }(e, n(755), n(981))
    },
    755: function(t, e) {
        var n;
        !function(e, n) {
            "use strict";
            "object" == typeof t.exports ? t.exports = e.document ? n(e, !0) : function(t) {
                if (!t.document)
                    throw new Error("jQuery requires a window with a document");
                return n(t)
            } : n(e)
        }("undefined" != typeof window ? window : this, (function(i, r) {
            "use strict";
            var s = [],
                o = Object.getPrototypeOf,
                a = s.slice,
                l = s.flat ? function(t) {
                    return s.flat.call(t)
                } : function(t) {
                    return s.concat.apply([], t)
                },
                u = s.push,
                c = s.indexOf,
                h = {},
                d = h.toString,
                f = h.hasOwnProperty,
                p = f.toString,
                g = p.call(Object),
                m = {},
                v = function(t) {
                    return "function" == typeof t && "number" != typeof t.nodeType && "function" != typeof t.item
                },
                y = function(t) {
                    return null != t && t === t.window
                },
                _ = i.document,
                w = {
                    type: !0,
                    src: !0,
                    nonce: !0,
                    noModule: !0
                };
            function b(t, e, n) {
                var i,
                    r,
                    s = (n = n || _).createElement("script");
                if (s.text = t, e)
                    for (i in w)
                        (r = e[i] || e.getAttribute && e.getAttribute(i)) && s.setAttribute(i, r);
                n.head.appendChild(s).parentNode.removeChild(s)
            }
            function x(t) {
                return null == t ? t + "" : "object" == typeof t || "function" == typeof t ? h[d.call(t)] || "object" : typeof t
            }
            var C = "3.6.3",
                E = function(t, e) {
                    return new E.fn.init(t, e)
                };
            function T(t) {
                var e = !!t && "length" in t && t.length,
                    n = x(t);
                return !v(t) && !y(t) && ("array" === n || 0 === e || "number" == typeof e && e > 0 && e - 1 in t)
            }
            E.fn = E.prototype = {
                jquery: C,
                constructor: E,
                length: 0,
                toArray: function() {
                    return a.call(this)
                },
                get: function(t) {
                    return null == t ? a.call(this) : t < 0 ? this[t + this.length] : this[t]
                },
                pushStack: function(t) {
                    var e = E.merge(this.constructor(), t);
                    return e.prevObject = this, e
                },
                each: function(t) {
                    return E.each(this, t)
                },
                map: function(t) {
                    return this.pushStack(E.map(this, (function(e, n) {
                        return t.call(e, n, e)
                    })))
                },
                slice: function() {
                    return this.pushStack(a.apply(this, arguments))
                },
                first: function() {
                    return this.eq(0)
                },
                last: function() {
                    return this.eq(-1)
                },
                even: function() {
                    return this.pushStack(E.grep(this, (function(t, e) {
                        return (e + 1) % 2
                    })))
                },
                odd: function() {
                    return this.pushStack(E.grep(this, (function(t, e) {
                        return e % 2
                    })))
                },
                eq: function(t) {
                    var e = this.length,
                        n = +t + (t < 0 ? e : 0);
                    return this.pushStack(n >= 0 && n < e ? [this[n]] : [])
                },
                end: function() {
                    return this.prevObject || this.constructor()
                },
                push: u,
                sort: s.sort,
                splice: s.splice
            },
            E.extend = E.fn.extend = function() {
                var t,
                    e,
                    n,
                    i,
                    r,
                    s,
                    o = arguments[0] || {},
                    a = 1,
                    l = arguments.length,
                    u = !1;
                for ("boolean" == typeof o && (u = o, o = arguments[a] || {}, a++), "object" == typeof o || v(o) || (o = {}), a === l && (o = this, a--); a < l; a++)
                    if (null != (t = arguments[a]))
                        for (e in t)
                            i = t[e],
                            "__proto__" !== e && o !== i && (u && i && (E.isPlainObject(i) || (r = Array.isArray(i))) ? (n = o[e], s = r && !Array.isArray(n) ? [] : r || E.isPlainObject(n) ? n : {}, r = !1, o[e] = E.extend(u, s, i)) : void 0 !== i && (o[e] = i));
                return o
            },
            E.extend({
                expando: "jQuery" + (C + Math.random()).replace(/\D/g, ""),
                isReady: !0,
                error: function(t) {
                    throw new Error(t)
                },
                noop: function() {},
                isPlainObject: function(t) {
                    var e,
                        n;
                    return !(!t || "[object Object]" !== d.call(t)) && (!(e = o(t)) || "function" == typeof (n = f.call(e, "constructor") && e.constructor) && p.call(n) === g)
                },
                isEmptyObject: function(t) {
                    var e;
                    for (e in t)
                        return !1;
                    return !0
                },
                globalEval: function(t, e, n) {
                    b(t, {
                        nonce: e && e.nonce
                    }, n)
                },
                each: function(t, e) {
                    var n,
                        i = 0;
                    if (T(t))
                        for (n = t.length; i < n && !1 !== e.call(t[i], i, t[i]); i++)
                            ;
                    else
                        for (i in t)
                            if (!1 === e.call(t[i], i, t[i]))
                                break;
                    return t
                },
                makeArray: function(t, e) {
                    var n = e || [];
                    return null != t && (T(Object(t)) ? E.merge(n, "string" == typeof t ? [t] : t) : u.call(n, t)), n
                },
                inArray: function(t, e, n) {
                    return null == e ? -1 : c.call(e, t, n)
                },
                merge: function(t, e) {
                    for (var n = +e.length, i = 0, r = t.length; i < n; i++)
                        t[r++] = e[i];
                    return t.length = r, t
                },
                grep: function(t, e, n) {
                    for (var i = [], r = 0, s = t.length, o = !n; r < s; r++)
                        !e(t[r], r) !== o && i.push(t[r]);
                    return i
                },
                map: function(t, e, n) {
                    var i,
                        r,
                        s = 0,
                        o = [];
                    if (T(t))
                        for (i = t.length; s < i; s++)
                            null != (r = e(t[s], s, n)) && o.push(r);
                    else
                        for (s in t)
                            null != (r = e(t[s], s, n)) && o.push(r);
                    return l(o)
                },
                guid: 1,
                support: m
            }),
            "function" == typeof Symbol && (E.fn[Symbol.iterator] = s[Symbol.iterator]),
            E.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), (function(t, e) {
                h["[object " + e + "]"] = e.toLowerCase()
            }));
            var S = function(t) {
                var e,
                    n,
                    i,
                    r,
                    s,
                    o,
                    a,
                    l,
                    u,
                    c,
                    h,
                    d,
                    f,
                    p,
                    g,
                    m,
                    v,
                    y,
                    _,
                    w = "sizzle" + 1 * new Date,
                    b = t.document,
                    x = 0,
                    C = 0,
                    E = lt(),
                    T = lt(),
                    S = lt(),
                    A = lt(),
                    D = function(t, e) {
                        return t === e && (h = !0), 0
                    },
                    k = {}.hasOwnProperty,
                    N = [],
                    j = N.pop,
                    I = N.push,
                    O = N.push,
                    F = N.slice,
                    P = function(t, e) {
                        for (var n = 0, i = t.length; n < i; n++)
                            if (t[n] === e)
                                return n;
                        return -1
                    },
                    $ = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
                    q = "[\\x20\\t\\r\\n\\f]",
                    R = "(?:\\\\[\\da-fA-F]{1,6}" + q + "?|\\\\[^\\r\\n\\f]|[\\w-]|[^\0-\\x7f])+",
                    L = "\\[" + q + "*(" + R + ")(?:" + q + "*([*^$|!~]?=)" + q + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + R + "))|)" + q + "*\\]",
                    M = ":(" + R + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + L + ")*)|.*)\\)|)",
                    H = new RegExp(q + "+", "g"),
                    z = new RegExp("^" + q + "+|((?:^|[^\\\\])(?:\\\\.)*)" + q + "+$", "g"),
                    W = new RegExp("^" + q + "*," + q + "*"),
                    V = new RegExp("^" + q + "*([>+~]|" + q + ")" + q + "*"),
                    B = new RegExp(q + "|>"),
                    U = new RegExp(M),
                    Q = new RegExp("^" + R + "$"),
                    X = {
                        ID: new RegExp("^#(" + R + ")"),
                        CLASS: new RegExp("^\\.(" + R + ")"),
                        TAG: new RegExp("^(" + R + "|[*])"),
                        ATTR: new RegExp("^" + L),
                        PSEUDO: new RegExp("^" + M),
                        CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + q + "*(even|odd|(([+-]|)(\\d*)n|)" + q + "*(?:([+-]|)" + q + "*(\\d+)|))" + q + "*\\)|)", "i"),
                        bool: new RegExp("^(?:" + $ + ")$", "i"),
                        needsContext: new RegExp("^" + q + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + q + "*((?:-\\d)?\\d*)" + q + "*\\)|)(?=[^-]|$)", "i")
                    },
                    Z = /HTML$/i,
                    Y = /^(?:input|select|textarea|button)$/i,
                    K = /^h\d$/i,
                    G = /^[^{]+\{\s*\[native \w/,
                    J = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
                    tt = /[+~]/,
                    et = new RegExp("\\\\[\\da-fA-F]{1,6}" + q + "?|\\\\([^\\r\\n\\f])", "g"),
                    nt = function(t, e) {
                        var n = "0x" + t.slice(1) - 65536;
                        return e || (n < 0 ? String.fromCharCode(n + 65536) : String.fromCharCode(n >> 10 | 55296, 1023 & n | 56320))
                    },
                    it = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,
                    rt = function(t, e) {
                        return e ? "\0" === t ? "�" : t.slice(0, -1) + "\\" + t.charCodeAt(t.length - 1).toString(16) + " " : "\\" + t
                    },
                    st = function() {
                        d()
                    },
                    ot = wt((function(t) {
                        return !0 === t.disabled && "fieldset" === t.nodeName.toLowerCase()
                    }), {
                        dir: "parentNode",
                        next: "legend"
                    });
                try {
                    O.apply(N = F.call(b.childNodes), b.childNodes),
                    N[b.childNodes.length].nodeType
                } catch (t) {
                    O = {
                        apply: N.length ? function(t, e) {
                            I.apply(t, F.call(e))
                        } : function(t, e) {
                            for (var n = t.length, i = 0; t[n++] = e[i++];)
                                ;
                            t.length = n - 1
                        }
                    }
                }
                function at(t, e, i, r) {
                    var s,
                        a,
                        u,
                        c,
                        h,
                        p,
                        v,
                        y = e && e.ownerDocument,
                        b = e ? e.nodeType : 9;
                    if (i = i || [], "string" != typeof t || !t || 1 !== b && 9 !== b && 11 !== b)
                        return i;
                    if (!r && (d(e), e = e || f, g)) {
                        if (11 !== b && (h = J.exec(t)))
                            if (s = h[1]) {
                                if (9 === b) {
                                    if (!(u = e.getElementById(s)))
                                        return i;
                                    if (u.id === s)
                                        return i.push(u), i
                                } else if (y && (u = y.getElementById(s)) && _(e, u) && u.id === s)
                                    return i.push(u), i
                            } else {
                                if (h[2])
                                    return O.apply(i, e.getElementsByTagName(t)), i;
                                if ((s = h[3]) && n.getElementsByClassName && e.getElementsByClassName)
                                    return O.apply(i, e.getElementsByClassName(s)), i
                            }
                        if (n.qsa && !A[t + " "] && (!m || !m.test(t)) && (1 !== b || "object" !== e.nodeName.toLowerCase())) {
                            if (v = t, y = e, 1 === b && (B.test(t) || V.test(t))) {
                                for ((y = tt.test(t) && vt(e.parentNode) || e) === e && n.scope || ((c = e.getAttribute("id")) ? c = c.replace(it, rt) : e.setAttribute("id", c = w)), a = (p = o(t)).length; a--;)
                                    p[a] = (c ? "#" + c : ":scope") + " " + _t(p[a]);
                                v = p.join(",")
                            }
                            try {
                                if (n.cssSupportsSelector && !CSS.supports("selector(:is(" + v + "))"))
                                    throw new Error;
                                return O.apply(i, y.querySelectorAll(v)), i
                            } catch (e) {
                                A(t, !0)
                            } finally {
                                c === w && e.removeAttribute("id")
                            }
                        }
                    }
                    return l(t.replace(z, "$1"), e, i, r)
                }
                function lt() {
                    var t = [];
                    return function e(n, r) {
                        return t.push(n + " ") > i.cacheLength && delete e[t.shift()], e[n + " "] = r
                    }
                }
                function ut(t) {
                    return t[w] = !0, t
                }
                function ct(t) {
                    var e = f.createElement("fieldset");
                    try {
                        return !!t(e)
                    } catch (t) {
                        return !1
                    } finally {
                        e.parentNode && e.parentNode.removeChild(e),
                        e = null
                    }
                }
                function ht(t, e) {
                    for (var n = t.split("|"), r = n.length; r--;)
                        i.attrHandle[n[r]] = e
                }
                function dt(t, e) {
                    var n = e && t,
                        i = n && 1 === t.nodeType && 1 === e.nodeType && t.sourceIndex - e.sourceIndex;
                    if (i)
                        return i;
                    if (n)
                        for (; n = n.nextSibling;)
                            if (n === e)
                                return -1;
                    return t ? 1 : -1
                }
                function ft(t) {
                    return function(e) {
                        return "input" === e.nodeName.toLowerCase() && e.type === t
                    }
                }
                function pt(t) {
                    return function(e) {
                        var n = e.nodeName.toLowerCase();
                        return ("input" === n || "button" === n) && e.type === t
                    }
                }
                function gt(t) {
                    return function(e) {
                        return "form" in e ? e.parentNode && !1 === e.disabled ? "label" in e ? "label" in e.parentNode ? e.parentNode.disabled === t : e.disabled === t : e.isDisabled === t || e.isDisabled !== !t && ot(e) === t : e.disabled === t : "label" in e && e.disabled === t
                    }
                }
                function mt(t) {
                    return ut((function(e) {
                        return e = +e, ut((function(n, i) {
                            for (var r, s = t([], n.length, e), o = s.length; o--;)
                                n[r = s[o]] && (n[r] = !(i[r] = n[r]))
                        }))
                    }))
                }
                function vt(t) {
                    return t && void 0 !== t.getElementsByTagName && t
                }
                for (e in n = at.support = {}, s = at.isXML = function(t) {
                    var e = t && t.namespaceURI,
                        n = t && (t.ownerDocument || t).documentElement;
                    return !Z.test(e || n && n.nodeName || "HTML")
                }, d = at.setDocument = function(t) {
                    var e,
                        r,
                        o = t ? t.ownerDocument || t : b;
                    return o != f && 9 === o.nodeType && o.documentElement ? (p = (f = o).documentElement, g = !s(f), b != f && (r = f.defaultView) && r.top !== r && (r.addEventListener ? r.addEventListener("unload", st, !1) : r.attachEvent && r.attachEvent("onunload", st)), n.scope = ct((function(t) {
                        return p.appendChild(t).appendChild(f.createElement("div")), void 0 !== t.querySelectorAll && !t.querySelectorAll(":scope fieldset div").length
                    })), n.cssSupportsSelector = ct((function() {
                        return CSS.supports("selector(*)") && f.querySelectorAll(":is(:jqfake)") && !CSS.supports("selector(:is(*,:jqfake))")
                    })), n.attributes = ct((function(t) {
                        return t.className = "i", !t.getAttribute("className")
                    })), n.getElementsByTagName = ct((function(t) {
                        return t.appendChild(f.createComment("")), !t.getElementsByTagName("*").length
                    })), n.getElementsByClassName = G.test(f.getElementsByClassName), n.getById = ct((function(t) {
                        return p.appendChild(t).id = w, !f.getElementsByName || !f.getElementsByName(w).length
                    })), n.getById ? (i.filter.ID = function(t) {
                        var e = t.replace(et, nt);
                        return function(t) {
                            return t.getAttribute("id") === e
                        }
                    }, i.find.ID = function(t, e) {
                        if (void 0 !== e.getElementById && g) {
                            var n = e.getElementById(t);
                            return n ? [n] : []
                        }
                    }) : (i.filter.ID = function(t) {
                        var e = t.replace(et, nt);
                        return function(t) {
                            var n = void 0 !== t.getAttributeNode && t.getAttributeNode("id");
                            return n && n.value === e
                        }
                    }, i.find.ID = function(t, e) {
                        if (void 0 !== e.getElementById && g) {
                            var n,
                                i,
                                r,
                                s = e.getElementById(t);
                            if (s) {
                                if ((n = s.getAttributeNode("id")) && n.value === t)
                                    return [s];
                                for (r = e.getElementsByName(t), i = 0; s = r[i++];)
                                    if ((n = s.getAttributeNode("id")) && n.value === t)
                                        return [s]
                            }
                            return []
                        }
                    }), i.find.TAG = n.getElementsByTagName ? function(t, e) {
                        return void 0 !== e.getElementsByTagName ? e.getElementsByTagName(t) : n.qsa ? e.querySelectorAll(t) : void 0
                    } : function(t, e) {
                        var n,
                            i = [],
                            r = 0,
                            s = e.getElementsByTagName(t);
                        if ("*" === t) {
                            for (; n = s[r++];)
                                1 === n.nodeType && i.push(n);
                            return i
                        }
                        return s
                    }, i.find.CLASS = n.getElementsByClassName && function(t, e) {
                        if (void 0 !== e.getElementsByClassName && g)
                            return e.getElementsByClassName(t)
                    }, v = [], m = [], (n.qsa = G.test(f.querySelectorAll)) && (ct((function(t) {
                        var e;
                        p.appendChild(t).innerHTML = "<a id='" + w + "'></a><select id='" + w + "-\r\\' msallowcapture=''><option selected=''></option></select>",
                        t.querySelectorAll("[msallowcapture^='']").length && m.push("[*^$]=" + q + "*(?:''|\"\")"),
                        t.querySelectorAll("[selected]").length || m.push("\\[" + q + "*(?:value|" + $ + ")"),
                        t.querySelectorAll("[id~=" + w + "-]").length || m.push("~="),
                        (e = f.createElement("input")).setAttribute("name", ""),
                        t.appendChild(e),
                        t.querySelectorAll("[name='']").length || m.push("\\[" + q + "*name" + q + "*=" + q + "*(?:''|\"\")"),
                        t.querySelectorAll(":checked").length || m.push(":checked"),
                        t.querySelectorAll("a#" + w + "+*").length || m.push(".#.+[+~]"),
                        t.querySelectorAll("\\\f"),
                        m.push("[\\r\\n\\f]")
                    })), ct((function(t) {
                        t.innerHTML = "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";
                        var e = f.createElement("input");
                        e.setAttribute("type", "hidden"),
                        t.appendChild(e).setAttribute("name", "D"),
                        t.querySelectorAll("[name=d]").length && m.push("name" + q + "*[*^$|!~]?="),
                        2 !== t.querySelectorAll(":enabled").length && m.push(":enabled", ":disabled"),
                        p.appendChild(t).disabled = !0,
                        2 !== t.querySelectorAll(":disabled").length && m.push(":enabled", ":disabled"),
                        t.querySelectorAll("*,:x"),
                        m.push(",.*:")
                    }))), (n.matchesSelector = G.test(y = p.matches || p.webkitMatchesSelector || p.mozMatchesSelector || p.oMatchesSelector || p.msMatchesSelector)) && ct((function(t) {
                        n.disconnectedMatch = y.call(t, "*"),
                        y.call(t, "[s!='']:x"),
                        v.push("!=", M)
                    })), n.cssSupportsSelector || m.push(":has"), m = m.length && new RegExp(m.join("|")), v = v.length && new RegExp(v.join("|")), e = G.test(p.compareDocumentPosition), _ = e || G.test(p.contains) ? function(t, e) {
                        var n = 9 === t.nodeType && t.documentElement || t,
                            i = e && e.parentNode;
                        return t === i || !(!i || 1 !== i.nodeType || !(n.contains ? n.contains(i) : t.compareDocumentPosition && 16 & t.compareDocumentPosition(i)))
                    } : function(t, e) {
                        if (e)
                            for (; e = e.parentNode;)
                                if (e === t)
                                    return !0;
                        return !1
                    }, D = e ? function(t, e) {
                        if (t === e)
                            return h = !0, 0;
                        var i = !t.compareDocumentPosition - !e.compareDocumentPosition;
                        return i || (1 & (i = (t.ownerDocument || t) == (e.ownerDocument || e) ? t.compareDocumentPosition(e) : 1) || !n.sortDetached && e.compareDocumentPosition(t) === i ? t == f || t.ownerDocument == b && _(b, t) ? -1 : e == f || e.ownerDocument == b && _(b, e) ? 1 : c ? P(c, t) - P(c, e) : 0 : 4 & i ? -1 : 1)
                    } : function(t, e) {
                        if (t === e)
                            return h = !0, 0;
                        var n,
                            i = 0,
                            r = t.parentNode,
                            s = e.parentNode,
                            o = [t],
                            a = [e];
                        if (!r || !s)
                            return t == f ? -1 : e == f ? 1 : r ? -1 : s ? 1 : c ? P(c, t) - P(c, e) : 0;
                        if (r === s)
                            return dt(t, e);
                        for (n = t; n = n.parentNode;)
                            o.unshift(n);
                        for (n = e; n = n.parentNode;)
                            a.unshift(n);
                        for (; o[i] === a[i];)
                            i++;
                        return i ? dt(o[i], a[i]) : o[i] == b ? -1 : a[i] == b ? 1 : 0
                    }, f) : f
                }, at.matches = function(t, e) {
                    return at(t, null, null, e)
                }, at.matchesSelector = function(t, e) {
                    if (d(t), n.matchesSelector && g && !A[e + " "] && (!v || !v.test(e)) && (!m || !m.test(e)))
                        try {
                            var i = y.call(t, e);
                            if (i || n.disconnectedMatch || t.document && 11 !== t.document.nodeType)
                                return i
                        } catch (t) {
                            A(e, !0)
                        }
                    return at(e, f, null, [t]).length > 0
                }, at.contains = function(t, e) {
                    return (t.ownerDocument || t) != f && d(t), _(t, e)
                }, at.attr = function(t, e) {
                    (t.ownerDocument || t) != f && d(t);
                    var r = i.attrHandle[e.toLowerCase()],
                        s = r && k.call(i.attrHandle, e.toLowerCase()) ? r(t, e, !g) : void 0;
                    return void 0 !== s ? s : n.attributes || !g ? t.getAttribute(e) : (s = t.getAttributeNode(e)) && s.specified ? s.value : null
                }, at.escape = function(t) {
                    return (t + "").replace(it, rt)
                }, at.error = function(t) {
                    throw new Error("Syntax error, unrecognized expression: " + t)
                }, at.uniqueSort = function(t) {
                    var e,
                        i = [],
                        r = 0,
                        s = 0;
                    if (h = !n.detectDuplicates, c = !n.sortStable && t.slice(0), t.sort(D), h) {
                        for (; e = t[s++];)
                            e === t[s] && (r = i.push(s));
                        for (; r--;)
                            t.splice(i[r], 1)
                    }
                    return c = null, t
                }, r = at.getText = function(t) {
                    var e,
                        n = "",
                        i = 0,
                        s = t.nodeType;
                    if (s) {
                        if (1 === s || 9 === s || 11 === s) {
                            if ("string" == typeof t.textContent)
                                return t.textContent;
                            for (t = t.firstChild; t; t = t.nextSibling)
                                n += r(t)
                        } else if (3 === s || 4 === s)
                            return t.nodeValue
                    } else
                        for (; e = t[i++];)
                            n += r(e);
                    return n
                }, i = at.selectors = {
                    cacheLength: 50,
                    createPseudo: ut,
                    match: X,
                    attrHandle: {},
                    find: {},
                    relative: {
                        ">": {
                            dir: "parentNode",
                            first: !0
                        },
                        " ": {
                            dir: "parentNode"
                        },
                        "+": {
                            dir: "previousSibling",
                            first: !0
                        },
                        "~": {
                            dir: "previousSibling"
                        }
                    },
                    preFilter: {
                        ATTR: function(t) {
                            return t[1] = t[1].replace(et, nt), t[3] = (t[3] || t[4] || t[5] || "").replace(et, nt), "~=" === t[2] && (t[3] = " " + t[3] + " "), t.slice(0, 4)
                        },
                        CHILD: function(t) {
                            return t[1] = t[1].toLowerCase(), "nth" === t[1].slice(0, 3) ? (t[3] || at.error(t[0]), t[4] = +(t[4] ? t[5] + (t[6] || 1) : 2 * ("even" === t[3] || "odd" === t[3])), t[5] = +(t[7] + t[8] || "odd" === t[3])) : t[3] && at.error(t[0]), t
                        },
                        PSEUDO: function(t) {
                            var e,
                                n = !t[6] && t[2];
                            return X.CHILD.test(t[0]) ? null : (t[3] ? t[2] = t[4] || t[5] || "" : n && U.test(n) && (e = o(n, !0)) && (e = n.indexOf(")", n.length - e) - n.length) && (t[0] = t[0].slice(0, e), t[2] = n.slice(0, e)), t.slice(0, 3))
                        }
                    },
                    filter: {
                        TAG: function(t) {
                            var e = t.replace(et, nt).toLowerCase();
                            return "*" === t ? function() {
                                return !0
                            } : function(t) {
                                return t.nodeName && t.nodeName.toLowerCase() === e
                            }
                        },
                        CLASS: function(t) {
                            var e = E[t + " "];
                            return e || (e = new RegExp("(^|" + q + ")" + t + "(" + q + "|$)")) && E(t, (function(t) {
                                    return e.test("string" == typeof t.className && t.className || void 0 !== t.getAttribute && t.getAttribute("class") || "")
                                }))
                        },
                        ATTR: function(t, e, n) {
                            return function(i) {
                                var r = at.attr(i, t);
                                return null == r ? "!=" === e : !e || (r += "", "=" === e ? r === n : "!=" === e ? r !== n : "^=" === e ? n && 0 === r.indexOf(n) : "*=" === e ? n && r.indexOf(n) > -1 : "$=" === e ? n && r.slice(-n.length) === n : "~=" === e ? (" " + r.replace(H, " ") + " ").indexOf(n) > -1 : "|=" === e && (r === n || r.slice(0, n.length + 1) === n + "-"))
                            }
                        },
                        CHILD: function(t, e, n, i, r) {
                            var s = "nth" !== t.slice(0, 3),
                                o = "last" !== t.slice(-4),
                                a = "of-type" === e;
                            return 1 === i && 0 === r ? function(t) {
                                return !!t.parentNode
                            } : function(e, n, l) {
                                var u,
                                    c,
                                    h,
                                    d,
                                    f,
                                    p,
                                    g = s !== o ? "nextSibling" : "previousSibling",
                                    m = e.parentNode,
                                    v = a && e.nodeName.toLowerCase(),
                                    y = !l && !a,
                                    _ = !1;
                                if (m) {
                                    if (s) {
                                        for (; g;) {
                                            for (d = e; d = d[g];)
                                                if (a ? d.nodeName.toLowerCase() === v : 1 === d.nodeType)
                                                    return !1;
                                            p = g = "only" === t && !p && "nextSibling"
                                        }
                                        return !0
                                    }
                                    if (p = [o ? m.firstChild : m.lastChild], o && y) {
                                        for (_ = (f = (u = (c = (h = (d = m)[w] || (d[w] = {}))[d.uniqueID] || (h[d.uniqueID] = {}))[t] || [])[0] === x && u[1]) && u[2], d = f && m.childNodes[f]; d = ++f && d && d[g] || (_ = f = 0) || p.pop();)
                                            if (1 === d.nodeType && ++_ && d === e) {
                                                c[t] = [x, f, _];
                                                break
                                            }
                                    } else if (y && (_ = f = (u = (c = (h = (d = e)[w] || (d[w] = {}))[d.uniqueID] || (h[d.uniqueID] = {}))[t] || [])[0] === x && u[1]), !1 === _)
                                        for (; (d = ++f && d && d[g] || (_ = f = 0) || p.pop()) && ((a ? d.nodeName.toLowerCase() !== v : 1 !== d.nodeType) || !++_ || (y && ((c = (h = d[w] || (d[w] = {}))[d.uniqueID] || (h[d.uniqueID] = {}))[t] = [x, _]), d !== e));)
                                            ;
                                    return (_ -= r) === i || _ % i == 0 && _ / i >= 0
                                }
                            }
                        },
                        PSEUDO: function(t, e) {
                            var n,
                                r = i.pseudos[t] || i.setFilters[t.toLowerCase()] || at.error("unsupported pseudo: " + t);
                            return r[w] ? r(e) : r.length > 1 ? (n = [t, t, "", e], i.setFilters.hasOwnProperty(t.toLowerCase()) ? ut((function(t, n) {
                                for (var i, s = r(t, e), o = s.length; o--;)
                                    t[i = P(t, s[o])] = !(n[i] = s[o])
                            })) : function(t) {
                                return r(t, 0, n)
                            }) : r
                        }
                    },
                    pseudos: {
                        not: ut((function(t) {
                            var e = [],
                                n = [],
                                i = a(t.replace(z, "$1"));
                            return i[w] ? ut((function(t, e, n, r) {
                                for (var s, o = i(t, null, r, []), a = t.length; a--;)
                                    (s = o[a]) && (t[a] = !(e[a] = s))
                            })) : function(t, r, s) {
                                return e[0] = t, i(e, null, s, n), e[0] = null, !n.pop()
                            }
                        })),
                        has: ut((function(t) {
                            return function(e) {
                                return at(t, e).length > 0
                            }
                        })),
                        contains: ut((function(t) {
                            return t = t.replace(et, nt), function(e) {
                                return (e.textContent || r(e)).indexOf(t) > -1
                            }
                        })),
                        lang: ut((function(t) {
                            return Q.test(t || "") || at.error("unsupported lang: " + t), t = t.replace(et, nt).toLowerCase(), function(e) {
                                var n;
                                do {
                                    if (n = g ? e.lang : e.getAttribute("xml:lang") || e.getAttribute("lang"))
                                        return (n = n.toLowerCase()) === t || 0 === n.indexOf(t + "-")
                                } while ((e = e.parentNode) && 1 === e.nodeType);
                                return !1
                            }
                        })),
                        target: function(e) {
                            var n = t.location && t.location.hash;
                            return n && n.slice(1) === e.id
                        },
                        root: function(t) {
                            return t === p
                        },
                        focus: function(t) {
                            return t === f.activeElement && (!f.hasFocus || f.hasFocus()) && !!(t.type || t.href || ~t.tabIndex)
                        },
                        enabled: gt(!1),
                        disabled: gt(!0),
                        checked: function(t) {
                            var e = t.nodeName.toLowerCase();
                            return "input" === e && !!t.checked || "option" === e && !!t.selected
                        },
                        selected: function(t) {
                            return t.parentNode && t.parentNode.selectedIndex, !0 === t.selected
                        },
                        empty: function(t) {
                            for (t = t.firstChild; t; t = t.nextSibling)
                                if (t.nodeType < 6)
                                    return !1;
                            return !0
                        },
                        parent: function(t) {
                            return !i.pseudos.empty(t)
                        },
                        header: function(t) {
                            return K.test(t.nodeName)
                        },
                        input: function(t) {
                            return Y.test(t.nodeName)
                        },
                        button: function(t) {
                            var e = t.nodeName.toLowerCase();
                            return "input" === e && "button" === t.type || "button" === e
                        },
                        text: function(t) {
                            var e;
                            return "input" === t.nodeName.toLowerCase() && "text" === t.type && (null == (e = t.getAttribute("type")) || "text" === e.toLowerCase())
                        },
                        first: mt((function() {
                            return [0]
                        })),
                        last: mt((function(t, e) {
                            return [e - 1]
                        })),
                        eq: mt((function(t, e, n) {
                            return [n < 0 ? n + e : n]
                        })),
                        even: mt((function(t, e) {
                            for (var n = 0; n < e; n += 2)
                                t.push(n);
                            return t
                        })),
                        odd: mt((function(t, e) {
                            for (var n = 1; n < e; n += 2)
                                t.push(n);
                            return t
                        })),
                        lt: mt((function(t, e, n) {
                            for (var i = n < 0 ? n + e : n > e ? e : n; --i >= 0;)
                                t.push(i);
                            return t
                        })),
                        gt: mt((function(t, e, n) {
                            for (var i = n < 0 ? n + e : n; ++i < e;)
                                t.push(i);
                            return t
                        }))
                    }
                }, i.pseudos.nth = i.pseudos.eq, {
                    radio: !0,
                    checkbox: !0,
                    file: !0,
                    password: !0,
                    image: !0
                })
                    i.pseudos[e] = ft(e);
                for (e in {
                    submit: !0,
                    reset: !0
                })
                    i.pseudos[e] = pt(e);
                function yt() {}
                function _t(t) {
                    for (var e = 0, n = t.length, i = ""; e < n; e++)
                        i += t[e].value;
                    return i
                }
                function wt(t, e, n) {
                    var i = e.dir,
                        r = e.next,
                        s = r || i,
                        o = n && "parentNode" === s,
                        a = C++;
                    return e.first ? function(e, n, r) {
                        for (; e = e[i];)
                            if (1 === e.nodeType || o)
                                return t(e, n, r);
                        return !1
                    } : function(e, n, l) {
                        var u,
                            c,
                            h,
                            d = [x, a];
                        if (l) {
                            for (; e = e[i];)
                                if ((1 === e.nodeType || o) && t(e, n, l))
                                    return !0
                        } else
                            for (; e = e[i];)
                                if (1 === e.nodeType || o)
                                    if (c = (h = e[w] || (e[w] = {}))[e.uniqueID] || (h[e.uniqueID] = {}), r && r === e.nodeName.toLowerCase())
                                        e = e[i] || e;
                                    else {
                                        if ((u = c[s]) && u[0] === x && u[1] === a)
                                            return d[2] = u[2];
                                        if (c[s] = d, d[2] = t(e, n, l))
                                            return !0
                                    }
                        return !1
                    }
                }
                function bt(t) {
                    return t.length > 1 ? function(e, n, i) {
                        for (var r = t.length; r--;)
                            if (!t[r](e, n, i))
                                return !1;
                        return !0
                    } : t[0]
                }
                function xt(t, e, n, i, r) {
                    for (var s, o = [], a = 0, l = t.length, u = null != e; a < l; a++)
                        (s = t[a]) && (n && !n(s, i, r) || (o.push(s), u && e.push(a)));
                    return o
                }
                function Ct(t, e, n, i, r, s) {
                    return i && !i[w] && (i = Ct(i)), r && !r[w] && (r = Ct(r, s)), ut((function(s, o, a, l) {
                        var u,
                            c,
                            h,
                            d = [],
                            f = [],
                            p = o.length,
                            g = s || function(t, e, n) {
                                for (var i = 0, r = e.length; i < r; i++)
                                    at(t, e[i], n);
                                return n
                            }(e || "*", a.nodeType ? [a] : a, []),
                            m = !t || !s && e ? g : xt(g, d, t, a, l),
                            v = n ? r || (s ? t : p || i) ? [] : o : m;
                        if (n && n(m, v, a, l), i)
                            for (u = xt(v, f), i(u, [], a, l), c = u.length; c--;)
                                (h = u[c]) && (v[f[c]] = !(m[f[c]] = h));
                        if (s) {
                            if (r || t) {
                                if (r) {
                                    for (u = [], c = v.length; c--;)
                                        (h = v[c]) && u.push(m[c] = h);
                                    r(null, v = [], u, l)
                                }
                                for (c = v.length; c--;)
                                    (h = v[c]) && (u = r ? P(s, h) : d[c]) > -1 && (s[u] = !(o[u] = h))
                            }
                        } else
                            v = xt(v === o ? v.splice(p, v.length) : v),
                            r ? r(null, o, v, l) : O.apply(o, v)
                    }))
                }
                function Et(t) {
                    for (var e, n, r, s = t.length, o = i.relative[t[0].type], a = o || i.relative[" "], l = o ? 1 : 0, c = wt((function(t) {
                            return t === e
                        }), a, !0), h = wt((function(t) {
                            return P(e, t) > -1
                        }), a, !0), d = [function(t, n, i) {
                            var r = !o && (i || n !== u) || ((e = n).nodeType ? c(t, n, i) : h(t, n, i));
                            return e = null, r
                        }]; l < s; l++)
                        if (n = i.relative[t[l].type])
                            d = [wt(bt(d), n)];
                        else {
                            if ((n = i.filter[t[l].type].apply(null, t[l].matches))[w]) {
                                for (r = ++l; r < s && !i.relative[t[r].type]; r++)
                                    ;
                                return Ct(l > 1 && bt(d), l > 1 && _t(t.slice(0, l - 1).concat({
                                    value: " " === t[l - 2].type ? "*" : ""
                                })).replace(z, "$1"), n, l < r && Et(t.slice(l, r)), r < s && Et(t = t.slice(r)), r < s && _t(t))
                            }
                            d.push(n)
                        }
                    return bt(d)
                }
                return yt.prototype = i.filters = i.pseudos, i.setFilters = new yt, o = at.tokenize = function(t, e) {
                    var n,
                        r,
                        s,
                        o,
                        a,
                        l,
                        u,
                        c = T[t + " "];
                    if (c)
                        return e ? 0 : c.slice(0);
                    for (a = t, l = [], u = i.preFilter; a;) {
                        for (o in n && !(r = W.exec(a)) || (r && (a = a.slice(r[0].length) || a), l.push(s = [])), n = !1, (r = V.exec(a)) && (n = r.shift(), s.push({
                            value: n,
                            type: r[0].replace(z, " ")
                        }), a = a.slice(n.length)), i.filter)
                            !(r = X[o].exec(a)) || u[o] && !(r = u[o](r)) || (n = r.shift(), s.push({
                                value: n,
                                type: o,
                                matches: r
                            }), a = a.slice(n.length));
                        if (!n)
                            break
                    }
                    return e ? a.length : a ? at.error(t) : T(t, l).slice(0)
                }, a = at.compile = function(t, e) {
                    var n,
                        r = [],
                        s = [],
                        a = S[t + " "];
                    if (!a) {
                        for (e || (e = o(t)), n = e.length; n--;)
                            (a = Et(e[n]))[w] ? r.push(a) : s.push(a);
                        a = S(t, function(t, e) {
                            var n = e.length > 0,
                                r = t.length > 0,
                                s = function(s, o, a, l, c) {
                                    var h,
                                        p,
                                        m,
                                        v = 0,
                                        y = "0",
                                        _ = s && [],
                                        w = [],
                                        b = u,
                                        C = s || r && i.find.TAG("*", c),
                                        E = x += null == b ? 1 : Math.random() || .1,
                                        T = C.length;
                                    for (c && (u = o == f || o || c); y !== T && null != (h = C[y]); y++) {
                                        if (r && h) {
                                            for (p = 0, o || h.ownerDocument == f || (d(h), a = !g); m = t[p++];)
                                                if (m(h, o || f, a)) {
                                                    l.push(h);
                                                    break
                                                }
                                            c && (x = E)
                                        }
                                        n && ((h = !m && h) && v--, s && _.push(h))
                                    }
                                    if (v += y, n && y !== v) {
                                        for (p = 0; m = e[p++];)
                                            m(_, w, o, a);
                                        if (s) {
                                            if (v > 0)
                                                for (; y--;)
                                                    _[y] || w[y] || (w[y] = j.call(l));
                                            w = xt(w)
                                        }
                                        O.apply(l, w),
                                        c && !s && w.length > 0 && v + e.length > 1 && at.uniqueSort(l)
                                    }
                                    return c && (x = E, u = b), _
                                };
                            return n ? ut(s) : s
                        }(s, r)),
                        a.selector = t
                    }
                    return a
                }, l = at.select = function(t, e, n, r) {
                    var s,
                        l,
                        u,
                        c,
                        h,
                        d = "function" == typeof t && t,
                        f = !r && o(t = d.selector || t);
                    if (n = n || [], 1 === f.length) {
                        if ((l = f[0] = f[0].slice(0)).length > 2 && "ID" === (u = l[0]).type && 9 === e.nodeType && g && i.relative[l[1].type]) {
                            if (!(e = (i.find.ID(u.matches[0].replace(et, nt), e) || [])[0]))
                                return n;
                            d && (e = e.parentNode),
                            t = t.slice(l.shift().value.length)
                        }
                        for (s = X.needsContext.test(t) ? 0 : l.length; s-- && (u = l[s], !i.relative[c = u.type]);)
                            if ((h = i.find[c]) && (r = h(u.matches[0].replace(et, nt), tt.test(l[0].type) && vt(e.parentNode) || e))) {
                                if (l.splice(s, 1), !(t = r.length && _t(l)))
                                    return O.apply(n, r), n;
                                break
                            }
                    }
                    return (d || a(t, f))(r, e, !g, n, !e || tt.test(t) && vt(e.parentNode) || e), n
                }, n.sortStable = w.split("").sort(D).join("") === w, n.detectDuplicates = !!h, d(), n.sortDetached = ct((function(t) {
                    return 1 & t.compareDocumentPosition(f.createElement("fieldset"))
                })), ct((function(t) {
                    return t.innerHTML = "<a href='#'></a>", "#" === t.firstChild.getAttribute("href")
                })) || ht("type|href|height|width", (function(t, e, n) {
                    if (!n)
                        return t.getAttribute(e, "type" === e.toLowerCase() ? 1 : 2)
                })), n.attributes && ct((function(t) {
                    return t.innerHTML = "<input/>", t.firstChild.setAttribute("value", ""), "" === t.firstChild.getAttribute("value")
                })) || ht("value", (function(t, e, n) {
                    if (!n && "input" === t.nodeName.toLowerCase())
                        return t.defaultValue
                })), ct((function(t) {
                    return null == t.getAttribute("disabled")
                })) || ht($, (function(t, e, n) {
                    var i;
                    if (!n)
                        return !0 === t[e] ? e.toLowerCase() : (i = t.getAttributeNode(e)) && i.specified ? i.value : null
                })), at
            }(i);
            E.find = S,
            E.expr = S.selectors,
            E.expr[":"] = E.expr.pseudos,
            E.uniqueSort = E.unique = S.uniqueSort,
            E.text = S.getText,
            E.isXMLDoc = S.isXML,
            E.contains = S.contains,
            E.escapeSelector = S.escape;
            var A = function(t, e, n) {
                    for (var i = [], r = void 0 !== n; (t = t[e]) && 9 !== t.nodeType;)
                        if (1 === t.nodeType) {
                            if (r && E(t).is(n))
                                break;
                            i.push(t)
                        }
                    return i
                },
                D = function(t, e) {
                    for (var n = []; t; t = t.nextSibling)
                        1 === t.nodeType && t !== e && n.push(t);
                    return n
                },
                k = E.expr.match.needsContext;
            function N(t, e) {
                return t.nodeName && t.nodeName.toLowerCase() === e.toLowerCase()
            }
            var j = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;
            function I(t, e, n) {
                return v(e) ? E.grep(t, (function(t, i) {
                    return !!e.call(t, i, t) !== n
                })) : e.nodeType ? E.grep(t, (function(t) {
                    return t === e !== n
                })) : "string" != typeof e ? E.grep(t, (function(t) {
                    return c.call(e, t) > -1 !== n
                })) : E.filter(e, t, n)
            }
            E.filter = function(t, e, n) {
                var i = e[0];
                return n && (t = ":not(" + t + ")"), 1 === e.length && 1 === i.nodeType ? E.find.matchesSelector(i, t) ? [i] : [] : E.find.matches(t, E.grep(e, (function(t) {
                    return 1 === t.nodeType
                })))
            },
            E.fn.extend({
                find: function(t) {
                    var e,
                        n,
                        i = this.length,
                        r = this;
                    if ("string" != typeof t)
                        return this.pushStack(E(t).filter((function() {
                            for (e = 0; e < i; e++)
                                if (E.contains(r[e], this))
                                    return !0
                        })));
                    for (n = this.pushStack([]), e = 0; e < i; e++)
                        E.find(t, r[e], n);
                    return i > 1 ? E.uniqueSort(n) : n
                },
                filter: function(t) {
                    return this.pushStack(I(this, t || [], !1))
                },
                not: function(t) {
                    return this.pushStack(I(this, t || [], !0))
                },
                is: function(t) {
                    return !!I(this, "string" == typeof t && k.test(t) ? E(t) : t || [], !1).length
                }
            });
            var O,
                F = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;
            (E.fn.init = function(t, e, n) {
                var i,
                    r;
                if (!t)
                    return this;
                if (n = n || O, "string" == typeof t) {
                    if (!(i = "<" === t[0] && ">" === t[t.length - 1] && t.length >= 3 ? [null, t, null] : F.exec(t)) || !i[1] && e)
                        return !e || e.jquery ? (e || n).find(t) : this.constructor(e).find(t);
                    if (i[1]) {
                        if (e = e instanceof E ? e[0] : e, E.merge(this, E.parseHTML(i[1], e && e.nodeType ? e.ownerDocument || e : _, !0)), j.test(i[1]) && E.isPlainObject(e))
                            for (i in e)
                                v(this[i]) ? this[i](e[i]) : this.attr(i, e[i]);
                        return this
                    }
                    return (r = _.getElementById(i[2])) && (this[0] = r, this.length = 1), this
                }
                return t.nodeType ? (this[0] = t, this.length = 1, this) : v(t) ? void 0 !== n.ready ? n.ready(t) : t(E) : E.makeArray(t, this)
            }).prototype = E.fn,
            O = E(_);
            var P = /^(?:parents|prev(?:Until|All))/,
                $ = {
                    children: !0,
                    contents: !0,
                    next: !0,
                    prev: !0
                };
            function q(t, e) {
                for (; (t = t[e]) && 1 !== t.nodeType;)
                    ;
                return t
            }
            E.fn.extend({
                has: function(t) {
                    var e = E(t, this),
                        n = e.length;
                    return this.filter((function() {
                        for (var t = 0; t < n; t++)
                            if (E.contains(this, e[t]))
                                return !0
                    }))
                },
                closest: function(t, e) {
                    var n,
                        i = 0,
                        r = this.length,
                        s = [],
                        o = "string" != typeof t && E(t);
                    if (!k.test(t))
                        for (; i < r; i++)
                            for (n = this[i]; n && n !== e; n = n.parentNode)
                                if (n.nodeType < 11 && (o ? o.index(n) > -1 : 1 === n.nodeType && E.find.matchesSelector(n, t))) {
                                    s.push(n);
                                    break
                                }
                    return this.pushStack(s.length > 1 ? E.uniqueSort(s) : s)
                },
                index: function(t) {
                    return t ? "string" == typeof t ? c.call(E(t), this[0]) : c.call(this, t.jquery ? t[0] : t) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
                },
                add: function(t, e) {
                    return this.pushStack(E.uniqueSort(E.merge(this.get(), E(t, e))))
                },
                addBack: function(t) {
                    return this.add(null == t ? this.prevObject : this.prevObject.filter(t))
                }
            }),
            E.each({
                parent: function(t) {
                    var e = t.parentNode;
                    return e && 11 !== e.nodeType ? e : null
                },
                parents: function(t) {
                    return A(t, "parentNode")
                },
                parentsUntil: function(t, e, n) {
                    return A(t, "parentNode", n)
                },
                next: function(t) {
                    return q(t, "nextSibling")
                },
                prev: function(t) {
                    return q(t, "previousSibling")
                },
                nextAll: function(t) {
                    return A(t, "nextSibling")
                },
                prevAll: function(t) {
                    return A(t, "previousSibling")
                },
                nextUntil: function(t, e, n) {
                    return A(t, "nextSibling", n)
                },
                prevUntil: function(t, e, n) {
                    return A(t, "previousSibling", n)
                },
                siblings: function(t) {
                    return D((t.parentNode || {}).firstChild, t)
                },
                children: function(t) {
                    return D(t.firstChild)
                },
                contents: function(t) {
                    return null != t.contentDocument && o(t.contentDocument) ? t.contentDocument : (N(t, "template") && (t = t.content || t), E.merge([], t.childNodes))
                }
            }, (function(t, e) {
                E.fn[t] = function(n, i) {
                    var r = E.map(this, e, n);
                    return "Until" !== t.slice(-5) && (i = n), i && "string" == typeof i && (r = E.filter(i, r)), this.length > 1 && ($[t] || E.uniqueSort(r), P.test(t) && r.reverse()), this.pushStack(r)
                }
            }));
            var R = /[^\x20\t\r\n\f]+/g;
            function L(t) {
                return t
            }
            function M(t) {
                throw t
            }
            function H(t, e, n, i) {
                var r;
                try {
                    t && v(r = t.promise) ? r.call(t).done(e).fail(n) : t && v(r = t.then) ? r.call(t, e, n) : e.apply(void 0, [t].slice(i))
                } catch (t) {
                    n.apply(void 0, [t])
                }
            }
            E.Callbacks = function(t) {
                t = "string" == typeof t ? function(t) {
                    var e = {};
                    return E.each(t.match(R) || [], (function(t, n) {
                        e[n] = !0
                    })), e
                }(t) : E.extend({}, t);
                var e,
                    n,
                    i,
                    r,
                    s = [],
                    o = [],
                    a = -1,
                    l = function() {
                        for (r = r || t.once, i = e = !0; o.length; a = -1)
                            for (n = o.shift(); ++a < s.length;)
                                !1 === s[a].apply(n[0], n[1]) && t.stopOnFalse && (a = s.length, n = !1);
                        t.memory || (n = !1),
                        e = !1,
                        r && (s = n ? [] : "")
                    },
                    u = {
                        add: function() {
                            return s && (n && !e && (a = s.length - 1, o.push(n)), function e(n) {
                                E.each(n, (function(n, i) {
                                    v(i) ? t.unique && u.has(i) || s.push(i) : i && i.length && "string" !== x(i) && e(i)
                                }))
                            }(arguments), n && !e && l()), this
                        },
                        remove: function() {
                            return E.each(arguments, (function(t, e) {
                                for (var n; (n = E.inArray(e, s, n)) > -1;)
                                    s.splice(n, 1),
                                    n <= a && a--
                            })), this
                        },
                        has: function(t) {
                            return t ? E.inArray(t, s) > -1 : s.length > 0
                        },
                        empty: function() {
                            return s && (s = []), this
                        },
                        disable: function() {
                            return r = o = [], s = n = "", this
                        },
                        disabled: function() {
                            return !s
                        },
                        lock: function() {
                            return r = o = [], n || e || (s = n = ""), this
                        },
                        locked: function() {
                            return !!r
                        },
                        fireWith: function(t, n) {
                            return r || (n = [t, (n = n || []).slice ? n.slice() : n], o.push(n), e || l()), this
                        },
                        fire: function() {
                            return u.fireWith(this, arguments), this
                        },
                        fired: function() {
                            return !!i
                        }
                    };
                return u
            },
            E.extend({
                Deferred: function(t) {
                    var e = [["notify", "progress", E.Callbacks("memory"), E.Callbacks("memory"), 2], ["resolve", "done", E.Callbacks("once memory"), E.Callbacks("once memory"), 0, "resolved"], ["reject", "fail", E.Callbacks("once memory"), E.Callbacks("once memory"), 1, "rejected"]],
                        n = "pending",
                        r = {
                            state: function() {
                                return n
                            },
                            always: function() {
                                return s.done(arguments).fail(arguments), this
                            },
                            catch: function(t) {
                                return r.then(null, t)
                            },
                            pipe: function() {
                                var t = arguments;
                                return E.Deferred((function(n) {
                                    E.each(e, (function(e, i) {
                                        var r = v(t[i[4]]) && t[i[4]];
                                        s[i[1]]((function() {
                                            var t = r && r.apply(this, arguments);
                                            t && v(t.promise) ? t.promise().progress(n.notify).done(n.resolve).fail(n.reject) : n[i[0] + "With"](this, r ? [t] : arguments)
                                        }))
                                    })),
                                    t = null
                                })).promise()
                            },
                            then: function(t, n, r) {
                                var s = 0;
                                function o(t, e, n, r) {
                                    return function() {
                                        var a = this,
                                            l = arguments,
                                            u = function() {
                                                var i,
                                                    u;
                                                if (!(t < s)) {
                                                    if ((i = n.apply(a, l)) === e.promise())
                                                        throw new TypeError("Thenable self-resolution");
                                                    u = i && ("object" == typeof i || "function" == typeof i) && i.then,
                                                    v(u) ? r ? u.call(i, o(s, e, L, r), o(s, e, M, r)) : (s++, u.call(i, o(s, e, L, r), o(s, e, M, r), o(s, e, L, e.notifyWith))) : (n !== L && (a = void 0, l = [i]), (r || e.resolveWith)(a, l))
                                                }
                                            },
                                            c = r ? u : function() {
                                                try {
                                                    u()
                                                } catch (i) {
                                                    E.Deferred.exceptionHook && E.Deferred.exceptionHook(i, c.stackTrace),
                                                    t + 1 >= s && (n !== M && (a = void 0, l = [i]), e.rejectWith(a, l))
                                                }
                                            };
                                        t ? c() : (E.Deferred.getStackHook && (c.stackTrace = E.Deferred.getStackHook()), i.setTimeout(c))
                                    }
                                }
                                return E.Deferred((function(i) {
                                    e[0][3].add(o(0, i, v(r) ? r : L, i.notifyWith)),
                                    e[1][3].add(o(0, i, v(t) ? t : L)),
                                    e[2][3].add(o(0, i, v(n) ? n : M))
                                })).promise()
                            },
                            promise: function(t) {
                                return null != t ? E.extend(t, r) : r
                            }
                        },
                        s = {};
                    return E.each(e, (function(t, i) {
                        var o = i[2],
                            a = i[5];
                        r[i[1]] = o.add,
                        a && o.add((function() {
                            n = a
                        }), e[3 - t][2].disable, e[3 - t][3].disable, e[0][2].lock, e[0][3].lock),
                        o.add(i[3].fire),
                        s[i[0]] = function() {
                            return s[i[0] + "With"](this === s ? void 0 : this, arguments), this
                        },
                        s[i[0] + "With"] = o.fireWith
                    })), r.promise(s), t && t.call(s, s), s
                },
                when: function(t) {
                    var e = arguments.length,
                        n = e,
                        i = Array(n),
                        r = a.call(arguments),
                        s = E.Deferred(),
                        o = function(t) {
                            return function(n) {
                                i[t] = this,
                                r[t] = arguments.length > 1 ? a.call(arguments) : n,
                                --e || s.resolveWith(i, r)
                            }
                        };
                    if (e <= 1 && (H(t, s.done(o(n)).resolve, s.reject, !e), "pending" === s.state() || v(r[n] && r[n].then)))
                        return s.then();
                    for (; n--;)
                        H(r[n], o(n), s.reject);
                    return s.promise()
                }
            });
            var z = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
            E.Deferred.exceptionHook = function(t, e) {
                i.console && i.console.warn && t && z.test(t.name) && i.console.warn("jQuery.Deferred exception: " + t.message, t.stack, e)
            },
            E.readyException = function(t) {
                i.setTimeout((function() {
                    throw t
                }))
            };
            var W = E.Deferred();
            function V() {
                _.removeEventListener("DOMContentLoaded", V),
                i.removeEventListener("load", V),
                E.ready()
            }
            E.fn.ready = function(t) {
                return W.then(t).catch((function(t) {
                    E.readyException(t)
                })), this
            },
            E.extend({
                isReady: !1,
                readyWait: 1,
                ready: function(t) {
                    (!0 === t ? --E.readyWait : E.isReady) || (E.isReady = !0, !0 !== t && --E.readyWait > 0 || W.resolveWith(_, [E]))
                }
            }),
            E.ready.then = W.then,
            "complete" === _.readyState || "loading" !== _.readyState && !_.documentElement.doScroll ? i.setTimeout(E.ready) : (_.addEventListener("DOMContentLoaded", V), i.addEventListener("load", V));
            var B = function(t, e, n, i, r, s, o) {
                    var a = 0,
                        l = t.length,
                        u = null == n;
                    if ("object" === x(n))
                        for (a in r = !0, n)
                            B(t, e, a, n[a], !0, s, o);
                    else if (void 0 !== i && (r = !0, v(i) || (o = !0), u && (o ? (e.call(t, i), e = null) : (u = e, e = function(t, e, n) {
                        return u.call(E(t), n)
                    })), e))
                        for (; a < l; a++)
                            e(t[a], n, o ? i : i.call(t[a], a, e(t[a], n)));
                    return r ? t : u ? e.call(t) : l ? e(t[0], n) : s
                },
                U = /^-ms-/,
                Q = /-([a-z])/g;
            function X(t, e) {
                return e.toUpperCase()
            }
            function Z(t) {
                return t.replace(U, "ms-").replace(Q, X)
            }
            var Y = function(t) {
                return 1 === t.nodeType || 9 === t.nodeType || !+t.nodeType
            };
            function K() {
                this.expando = E.expando + K.uid++
            }
            K.uid = 1,
            K.prototype = {
                cache: function(t) {
                    var e = t[this.expando];
                    return e || (e = {}, Y(t) && (t.nodeType ? t[this.expando] = e : Object.defineProperty(t, this.expando, {
                        value: e,
                        configurable: !0
                    }))), e
                },
                set: function(t, e, n) {
                    var i,
                        r = this.cache(t);
                    if ("string" == typeof e)
                        r[Z(e)] = n;
                    else
                        for (i in e)
                            r[Z(i)] = e[i];
                    return r
                },
                get: function(t, e) {
                    return void 0 === e ? this.cache(t) : t[this.expando] && t[this.expando][Z(e)]
                },
                access: function(t, e, n) {
                    return void 0 === e || e && "string" == typeof e && void 0 === n ? this.get(t, e) : (this.set(t, e, n), void 0 !== n ? n : e)
                },
                remove: function(t, e) {
                    var n,
                        i = t[this.expando];
                    if (void 0 !== i) {
                        if (void 0 !== e) {
                            n = (e = Array.isArray(e) ? e.map(Z) : (e = Z(e)) in i ? [e] : e.match(R) || []).length;
                            for (; n--;)
                                delete i[e[n]]
                        }
                        (void 0 === e || E.isEmptyObject(i)) && (t.nodeType ? t[this.expando] = void 0 : delete t[this.expando])
                    }
                },
                hasData: function(t) {
                    var e = t[this.expando];
                    return void 0 !== e && !E.isEmptyObject(e)
                }
            };
            var G = new K,
                J = new K,
                tt = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
                et = /[A-Z]/g;
            function nt(t, e, n) {
                var i;
                if (void 0 === n && 1 === t.nodeType)
                    if (i = "data-" + e.replace(et, "-$&").toLowerCase(), "string" == typeof (n = t.getAttribute(i))) {
                        try {
                            n = function(t) {
                                return "true" === t || "false" !== t && ("null" === t ? null : t === +t + "" ? +t : tt.test(t) ? JSON.parse(t) : t)
                            }(n)
                        } catch (t) {}
                        J.set(t, e, n)
                    } else
                        n = void 0;
                return n
            }
            E.extend({
                hasData: function(t) {
                    return J.hasData(t) || G.hasData(t)
                },
                data: function(t, e, n) {
                    return J.access(t, e, n)
                },
                removeData: function(t, e) {
                    J.remove(t, e)
                },
                _data: function(t, e, n) {
                    return G.access(t, e, n)
                },
                _removeData: function(t, e) {
                    G.remove(t, e)
                }
            }),
            E.fn.extend({
                data: function(t, e) {
                    var n,
                        i,
                        r,
                        s = this[0],
                        o = s && s.attributes;
                    if (void 0 === t) {
                        if (this.length && (r = J.get(s), 1 === s.nodeType && !G.get(s, "hasDataAttrs"))) {
                            for (n = o.length; n--;)
                                o[n] && 0 === (i = o[n].name).indexOf("data-") && (i = Z(i.slice(5)), nt(s, i, r[i]));
                            G.set(s, "hasDataAttrs", !0)
                        }
                        return r
                    }
                    return "object" == typeof t ? this.each((function() {
                        J.set(this, t)
                    })) : B(this, (function(e) {
                        var n;
                        if (s && void 0 === e)
                            return void 0 !== (n = J.get(s, t)) || void 0 !== (n = nt(s, t)) ? n : void 0;
                        this.each((function() {
                            J.set(this, t, e)
                        }))
                    }), null, e, arguments.length > 1, null, !0)
                },
                removeData: function(t) {
                    return this.each((function() {
                        J.remove(this, t)
                    }))
                }
            }),
            E.extend({
                queue: function(t, e, n) {
                    var i;
                    if (t)
                        return e = (e || "fx") + "queue", i = G.get(t, e), n && (!i || Array.isArray(n) ? i = G.access(t, e, E.makeArray(n)) : i.push(n)), i || []
                },
                dequeue: function(t, e) {
                    e = e || "fx";
                    var n = E.queue(t, e),
                        i = n.length,
                        r = n.shift(),
                        s = E._queueHooks(t, e);
                    "inprogress" === r && (r = n.shift(), i--),
                    r && ("fx" === e && n.unshift("inprogress"), delete s.stop, r.call(t, (function() {
                        E.dequeue(t, e)
                    }), s)),
                    !i && s && s.empty.fire()
                },
                _queueHooks: function(t, e) {
                    var n = e + "queueHooks";
                    return G.get(t, n) || G.access(t, n, {
                            empty: E.Callbacks("once memory").add((function() {
                                G.remove(t, [e + "queue", n])
                            }))
                        })
                }
            }),
            E.fn.extend({
                queue: function(t, e) {
                    var n = 2;
                    return "string" != typeof t && (e = t, t = "fx", n--), arguments.length < n ? E.queue(this[0], t) : void 0 === e ? this : this.each((function() {
                        var n = E.queue(this, t, e);
                        E._queueHooks(this, t),
                        "fx" === t && "inprogress" !== n[0] && E.dequeue(this, t)
                    }))
                },
                dequeue: function(t) {
                    return this.each((function() {
                        E.dequeue(this, t)
                    }))
                },
                clearQueue: function(t) {
                    return this.queue(t || "fx", [])
                },
                promise: function(t, e) {
                    var n,
                        i = 1,
                        r = E.Deferred(),
                        s = this,
                        o = this.length,
                        a = function() {
                            --i || r.resolveWith(s, [s])
                        };
                    for ("string" != typeof t && (e = t, t = void 0), t = t || "fx"; o--;)
                        (n = G.get(s[o], t + "queueHooks")) && n.empty && (i++, n.empty.add(a));
                    return a(), r.promise(e)
                }
            });
            var it = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
                rt = new RegExp("^(?:([+-])=|)(" + it + ")([a-z%]*)$", "i"),
                st = ["Top", "Right", "Bottom", "Left"],
                ot = _.documentElement,
                at = function(t) {
                    return E.contains(t.ownerDocument, t)
                },
                lt = {
                    composed: !0
                };
            ot.getRootNode && (at = function(t) {
                return E.contains(t.ownerDocument, t) || t.getRootNode(lt) === t.ownerDocument
            });
            var ut = function(t, e) {
                return "none" === (t = e || t).style.display || "" === t.style.display && at(t) && "none" === E.css(t, "display")
            };
            function ct(t, e, n, i) {
                var r,
                    s,
                    o = 20,
                    a = i ? function() {
                        return i.cur()
                    } : function() {
                        return E.css(t, e, "")
                    },
                    l = a(),
                    u = n && n[3] || (E.cssNumber[e] ? "" : "px"),
                    c = t.nodeType && (E.cssNumber[e] || "px" !== u && +l) && rt.exec(E.css(t, e));
                if (c && c[3] !== u) {
                    for (l /= 2, u = u || c[3], c = +l || 1; o--;)
                        E.style(t, e, c + u),
                        (1 - s) * (1 - (s = a() / l || .5)) <= 0 && (o = 0),
                        c /= s;
                    c *= 2,
                    E.style(t, e, c + u),
                    n = n || []
                }
                return n && (c = +c || +l || 0, r = n[1] ? c + (n[1] + 1) * n[2] : +n[2], i && (i.unit = u, i.start = c, i.end = r)), r
            }
            var ht = {};
            function dt(t) {
                var e,
                    n = t.ownerDocument,
                    i = t.nodeName,
                    r = ht[i];
                return r || (e = n.body.appendChild(n.createElement(i)), r = E.css(e, "display"), e.parentNode.removeChild(e), "none" === r && (r = "block"), ht[i] = r, r)
            }
            function ft(t, e) {
                for (var n, i, r = [], s = 0, o = t.length; s < o; s++)
                    (i = t[s]).style && (n = i.style.display, e ? ("none" === n && (r[s] = G.get(i, "display") || null, r[s] || (i.style.display = "")), "" === i.style.display && ut(i) && (r[s] = dt(i))) : "none" !== n && (r[s] = "none", G.set(i, "display", n)));
                for (s = 0; s < o; s++)
                    null != r[s] && (t[s].style.display = r[s]);
                return t
            }
            E.fn.extend({
                show: function() {
                    return ft(this, !0)
                },
                hide: function() {
                    return ft(this)
                },
                toggle: function(t) {
                    return "boolean" == typeof t ? t ? this.show() : this.hide() : this.each((function() {
                        ut(this) ? E(this).show() : E(this).hide()
                    }))
                }
            });
            var pt,
                gt,
                mt = /^(?:checkbox|radio)$/i,
                vt = /<([a-z][^\/\0>\x20\t\r\n\f]*)/i,
                yt = /^$|^module$|\/(?:java|ecma)script/i;
            pt = _.createDocumentFragment().appendChild(_.createElement("div")),
            (gt = _.createElement("input")).setAttribute("type", "radio"),
            gt.setAttribute("checked", "checked"),
            gt.setAttribute("name", "t"),
            pt.appendChild(gt),
            m.checkClone = pt.cloneNode(!0).cloneNode(!0).lastChild.checked,
            pt.innerHTML = "<textarea>x</textarea>",
            m.noCloneChecked = !!pt.cloneNode(!0).lastChild.defaultValue,
            pt.innerHTML = "<option></option>",
            m.option = !!pt.lastChild;
            var _t = {
                thead: [1, "<table>", "</table>"],
                col: [2, "<table><colgroup>", "</colgroup></table>"],
                tr: [2, "<table><tbody>", "</tbody></table>"],
                td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
                _default: [0, "", ""]
            };
            function wt(t, e) {
                var n;
                return n = void 0 !== t.getElementsByTagName ? t.getElementsByTagName(e || "*") : void 0 !== t.querySelectorAll ? t.querySelectorAll(e || "*") : [], void 0 === e || e && N(t, e) ? E.merge([t], n) : n
            }
            function bt(t, e) {
                for (var n = 0, i = t.length; n < i; n++)
                    G.set(t[n], "globalEval", !e || G.get(e[n], "globalEval"))
            }
            _t.tbody = _t.tfoot = _t.colgroup = _t.caption = _t.thead,
            _t.th = _t.td,
            m.option || (_t.optgroup = _t.option = [1, "<select multiple='multiple'>", "</select>"]);
            var xt = /<|&#?\w+;/;
            function Ct(t, e, n, i, r) {
                for (var s, o, a, l, u, c, h = e.createDocumentFragment(), d = [], f = 0, p = t.length; f < p; f++)
                    if ((s = t[f]) || 0 === s)
                        if ("object" === x(s))
                            E.merge(d, s.nodeType ? [s] : s);
                        else if (xt.test(s)) {
                            for (o = o || h.appendChild(e.createElement("div")), a = (vt.exec(s) || ["", ""])[1].toLowerCase(), l = _t[a] || _t._default, o.innerHTML = l[1] + E.htmlPrefilter(s) + l[2], c = l[0]; c--;)
                                o = o.lastChild;
                            E.merge(d, o.childNodes),
                            (o = h.firstChild).textContent = ""
                        } else
                            d.push(e.createTextNode(s));
                for (h.textContent = "", f = 0; s = d[f++];)
                    if (i && E.inArray(s, i) > -1)
                        r && r.push(s);
                    else if (u = at(s), o = wt(h.appendChild(s), "script"), u && bt(o), n)
                        for (c = 0; s = o[c++];)
                            yt.test(s.type || "") && n.push(s);
                return h
            }
            var Et = /^([^.]*)(?:\.(.+)|)/;
            function Tt() {
                return !0
            }
            function St() {
                return !1
            }
            function At(t, e) {
                return t === function() {
                    try {
                        return _.activeElement
                    } catch (t) {}
                }() == ("focus" === e)
            }
            function Dt(t, e, n, i, r, s) {
                var o,
                    a;
                if ("object" == typeof e) {
                    for (a in "string" != typeof n && (i = i || n, n = void 0), e)
                        Dt(t, a, n, i, e[a], s);
                    return t
                }
                if (null == i && null == r ? (r = n, i = n = void 0) : null == r && ("string" == typeof n ? (r = i, i = void 0) : (r = i, i = n, n = void 0)), !1 === r)
                    r = St;
                else if (!r)
                    return t;
                return 1 === s && (o = r, r = function(t) {
                    return E().off(t), o.apply(this, arguments)
                }, r.guid = o.guid || (o.guid = E.guid++)), t.each((function() {
                    E.event.add(this, e, r, i, n)
                }))
            }
            function kt(t, e, n) {
                n ? (G.set(t, e, !1), E.event.add(t, e, {
                    namespace: !1,
                    handler: function(t) {
                        var i,
                            r,
                            s = G.get(this, e);
                        if (1 & t.isTrigger && this[e]) {
                            if (s.length)
                                (E.event.special[e] || {}).delegateType && t.stopPropagation();
                            else if (s = a.call(arguments), G.set(this, e, s), i = n(this, e), this[e](), s !== (r = G.get(this, e)) || i ? G.set(this, e, !1) : r = {}, s !== r)
                                return t.stopImmediatePropagation(), t.preventDefault(), r && r.value
                        } else
                            s.length && (G.set(this, e, {
                                value: E.event.trigger(E.extend(s[0], E.Event.prototype), s.slice(1), this)
                            }), t.stopImmediatePropagation())
                    }
                })) : void 0 === G.get(t, e) && E.event.add(t, e, Tt)
            }
            E.event = {
                global: {},
                add: function(t, e, n, i, r) {
                    var s,
                        o,
                        a,
                        l,
                        u,
                        c,
                        h,
                        d,
                        f,
                        p,
                        g,
                        m = G.get(t);
                    if (Y(t))
                        for (n.handler && (n = (s = n).handler, r = s.selector), r && E.find.matchesSelector(ot, r), n.guid || (n.guid = E.guid++), (l = m.events) || (l = m.events = Object.create(null)), (o = m.handle) || (o = m.handle = function(e) {
                            return void 0 !== E && E.event.triggered !== e.type ? E.event.dispatch.apply(t, arguments) : void 0
                        }), u = (e = (e || "").match(R) || [""]).length; u--;)
                            f = g = (a = Et.exec(e[u]) || [])[1],
                            p = (a[2] || "").split(".").sort(),
                            f && (h = E.event.special[f] || {}, f = (r ? h.delegateType : h.bindType) || f, h = E.event.special[f] || {}, c = E.extend({
                                type: f,
                                origType: g,
                                data: i,
                                handler: n,
                                guid: n.guid,
                                selector: r,
                                needsContext: r && E.expr.match.needsContext.test(r),
                                namespace: p.join(".")
                            }, s), (d = l[f]) || ((d = l[f] = []).delegateCount = 0, h.setup && !1 !== h.setup.call(t, i, p, o) || t.addEventListener && t.addEventListener(f, o)), h.add && (h.add.call(t, c), c.handler.guid || (c.handler.guid = n.guid)), r ? d.splice(d.delegateCount++, 0, c) : d.push(c), E.event.global[f] = !0)
                },
                remove: function(t, e, n, i, r) {
                    var s,
                        o,
                        a,
                        l,
                        u,
                        c,
                        h,
                        d,
                        f,
                        p,
                        g,
                        m = G.hasData(t) && G.get(t);
                    if (m && (l = m.events)) {
                        for (u = (e = (e || "").match(R) || [""]).length; u--;)
                            if (f = g = (a = Et.exec(e[u]) || [])[1], p = (a[2] || "").split(".").sort(), f) {
                                for (h = E.event.special[f] || {}, d = l[f = (i ? h.delegateType : h.bindType) || f] || [], a = a[2] && new RegExp("(^|\\.)" + p.join("\\.(?:.*\\.|)") + "(\\.|$)"), o = s = d.length; s--;)
                                    c = d[s],
                                    !r && g !== c.origType || n && n.guid !== c.guid || a && !a.test(c.namespace) || i && i !== c.selector && ("**" !== i || !c.selector) || (d.splice(s, 1), c.selector && d.delegateCount--, h.remove && h.remove.call(t, c));
                                o && !d.length && (h.teardown && !1 !== h.teardown.call(t, p, m.handle) || E.removeEvent(t, f, m.handle), delete l[f])
                            } else
                                for (f in l)
                                    E.event.remove(t, f + e[u], n, i, !0);
                        E.isEmptyObject(l) && G.remove(t, "handle events")
                    }
                },
                dispatch: function(t) {
                    var e,
                        n,
                        i,
                        r,
                        s,
                        o,
                        a = new Array(arguments.length),
                        l = E.event.fix(t),
                        u = (G.get(this, "events") || Object.create(null))[l.type] || [],
                        c = E.event.special[l.type] || {};
                    for (a[0] = l, e = 1; e < arguments.length; e++)
                        a[e] = arguments[e];
                    if (l.delegateTarget = this, !c.preDispatch || !1 !== c.preDispatch.call(this, l)) {
                        for (o = E.event.handlers.call(this, l, u), e = 0; (r = o[e++]) && !l.isPropagationStopped();)
                            for (l.currentTarget = r.elem, n = 0; (s = r.handlers[n++]) && !l.isImmediatePropagationStopped();)
                                l.rnamespace && !1 !== s.namespace && !l.rnamespace.test(s.namespace) || (l.handleObj = s, l.data = s.data, void 0 !== (i = ((E.event.special[s.origType] || {}).handle || s.handler).apply(r.elem, a)) && !1 === (l.result = i) && (l.preventDefault(), l.stopPropagation()));
                        return c.postDispatch && c.postDispatch.call(this, l), l.result
                    }
                },
                handlers: function(t, e) {
                    var n,
                        i,
                        r,
                        s,
                        o,
                        a = [],
                        l = e.delegateCount,
                        u = t.target;
                    if (l && u.nodeType && !("click" === t.type && t.button >= 1))
                        for (; u !== this; u = u.parentNode || this)
                            if (1 === u.nodeType && ("click" !== t.type || !0 !== u.disabled)) {
                                for (s = [], o = {}, n = 0; n < l; n++)
                                    void 0 === o[r = (i = e[n]).selector + " "] && (o[r] = i.needsContext ? E(r, this).index(u) > -1 : E.find(r, this, null, [u]).length),
                                    o[r] && s.push(i);
                                s.length && a.push({
                                    elem: u,
                                    handlers: s
                                })
                            }
                    return u = this, l < e.length && a.push({
                        elem: u,
                        handlers: e.slice(l)
                    }), a
                },
                addProp: function(t, e) {
                    Object.defineProperty(E.Event.prototype, t, {
                        enumerable: !0,
                        configurable: !0,
                        get: v(e) ? function() {
                            if (this.originalEvent)
                                return e(this.originalEvent)
                        } : function() {
                            if (this.originalEvent)
                                return this.originalEvent[t]
                        },
                        set: function(e) {
                            Object.defineProperty(this, t, {
                                enumerable: !0,
                                configurable: !0,
                                writable: !0,
                                value: e
                            })
                        }
                    })
                },
                fix: function(t) {
                    return t[E.expando] ? t : new E.Event(t)
                },
                special: {
                    load: {
                        noBubble: !0
                    },
                    click: {
                        setup: function(t) {
                            var e = this || t;
                            return mt.test(e.type) && e.click && N(e, "input") && kt(e, "click", Tt), !1
                        },
                        trigger: function(t) {
                            var e = this || t;
                            return mt.test(e.type) && e.click && N(e, "input") && kt(e, "click"), !0
                        },
                        _default: function(t) {
                            var e = t.target;
                            return mt.test(e.type) && e.click && N(e, "input") && G.get(e, "click") || N(e, "a")
                        }
                    },
                    beforeunload: {
                        postDispatch: function(t) {
                            void 0 !== t.result && t.originalEvent && (t.originalEvent.returnValue = t.result)
                        }
                    }
                }
            },
            E.removeEvent = function(t, e, n) {
                t.removeEventListener && t.removeEventListener(e, n)
            },
            E.Event = function(t, e) {
                if (!(this instanceof E.Event))
                    return new E.Event(t, e);
                t && t.type ? (this.originalEvent = t, this.type = t.type, this.isDefaultPrevented = t.defaultPrevented || void 0 === t.defaultPrevented && !1 === t.returnValue ? Tt : St, this.target = t.target && 3 === t.target.nodeType ? t.target.parentNode : t.target, this.currentTarget = t.currentTarget, this.relatedTarget = t.relatedTarget) : this.type = t,
                e && E.extend(this, e),
                this.timeStamp = t && t.timeStamp || Date.now(),
                this[E.expando] = !0
            },
            E.Event.prototype = {
                constructor: E.Event,
                isDefaultPrevented: St,
                isPropagationStopped: St,
                isImmediatePropagationStopped: St,
                isSimulated: !1,
                preventDefault: function() {
                    var t = this.originalEvent;
                    this.isDefaultPrevented = Tt,
                    t && !this.isSimulated && t.preventDefault()
                },
                stopPropagation: function() {
                    var t = this.originalEvent;
                    this.isPropagationStopped = Tt,
                    t && !this.isSimulated && t.stopPropagation()
                },
                stopImmediatePropagation: function() {
                    var t = this.originalEvent;
                    this.isImmediatePropagationStopped = Tt,
                    t && !this.isSimulated && t.stopImmediatePropagation(),
                    this.stopPropagation()
                }
            },
            E.each({
                altKey: !0,
                bubbles: !0,
                cancelable: !0,
                changedTouches: !0,
                ctrlKey: !0,
                detail: !0,
                eventPhase: !0,
                metaKey: !0,
                pageX: !0,
                pageY: !0,
                shiftKey: !0,
                view: !0,
                char: !0,
                code: !0,
                charCode: !0,
                key: !0,
                keyCode: !0,
                button: !0,
                buttons: !0,
                clientX: !0,
                clientY: !0,
                offsetX: !0,
                offsetY: !0,
                pointerId: !0,
                pointerType: !0,
                screenX: !0,
                screenY: !0,
                targetTouches: !0,
                toElement: !0,
                touches: !0,
                which: !0
            }, E.event.addProp),
            E.each({
                focus: "focusin",
                blur: "focusout"
            }, (function(t, e) {
                E.event.special[t] = {
                    setup: function() {
                        return kt(this, t, At), !1
                    },
                    trigger: function() {
                        return kt(this, t), !0
                    },
                    _default: function(e) {
                        return G.get(e.target, t)
                    },
                    delegateType: e
                }
            })),
            E.each({
                mouseenter: "mouseover",
                mouseleave: "mouseout",
                pointerenter: "pointerover",
                pointerleave: "pointerout"
            }, (function(t, e) {
                E.event.special[t] = {
                    delegateType: e,
                    bindType: e,
                    handle: function(t) {
                        var n,
                            i = this,
                            r = t.relatedTarget,
                            s = t.handleObj;
                        return r && (r === i || E.contains(i, r)) || (t.type = s.origType, n = s.handler.apply(this, arguments), t.type = e), n
                    }
                }
            })),
            E.fn.extend({
                on: function(t, e, n, i) {
                    return Dt(this, t, e, n, i)
                },
                one: function(t, e, n, i) {
                    return Dt(this, t, e, n, i, 1)
                },
                off: function(t, e, n) {
                    var i,
                        r;
                    if (t && t.preventDefault && t.handleObj)
                        return i = t.handleObj, E(t.delegateTarget).off(i.namespace ? i.origType + "." + i.namespace : i.origType, i.selector, i.handler), this;
                    if ("object" == typeof t) {
                        for (r in t)
                            this.off(r, e, t[r]);
                        return this
                    }
                    return !1 !== e && "function" != typeof e || (n = e, e = void 0), !1 === n && (n = St), this.each((function() {
                        E.event.remove(this, t, n, e)
                    }))
                }
            });
            var Nt = /<script|<style|<link/i,
                jt = /checked\s*(?:[^=]|=\s*.checked.)/i,
                It = /^\s*<!\[CDATA\[|\]\]>\s*$/g;
            function Ot(t, e) {
                return N(t, "table") && N(11 !== e.nodeType ? e : e.firstChild, "tr") && E(t).children("tbody")[0] || t
            }
            function Ft(t) {
                return t.type = (null !== t.getAttribute("type")) + "/" + t.type, t
            }
            function Pt(t) {
                return "true/" === (t.type || "").slice(0, 5) ? t.type = t.type.slice(5) : t.removeAttribute("type"), t
            }
            function $t(t, e) {
                var n,
                    i,
                    r,
                    s,
                    o,
                    a;
                if (1 === e.nodeType) {
                    if (G.hasData(t) && (a = G.get(t).events))
                        for (r in G.remove(e, "handle events"), a)
                            for (n = 0, i = a[r].length; n < i; n++)
                                E.event.add(e, r, a[r][n]);
                    J.hasData(t) && (s = J.access(t), o = E.extend({}, s), J.set(e, o))
                }
            }
            function qt(t, e) {
                var n = e.nodeName.toLowerCase();
                "input" === n && mt.test(t.type) ? e.checked = t.checked : "input" !== n && "textarea" !== n || (e.defaultValue = t.defaultValue)
            }
            function Rt(t, e, n, i) {
                e = l(e);
                var r,
                    s,
                    o,
                    a,
                    u,
                    c,
                    h = 0,
                    d = t.length,
                    f = d - 1,
                    p = e[0],
                    g = v(p);
                if (g || d > 1 && "string" == typeof p && !m.checkClone && jt.test(p))
                    return t.each((function(r) {
                        var s = t.eq(r);
                        g && (e[0] = p.call(this, r, s.html())),
                        Rt(s, e, n, i)
                    }));
                if (d && (s = (r = Ct(e, t[0].ownerDocument, !1, t, i)).firstChild, 1 === r.childNodes.length && (r = s), s || i)) {
                    for (a = (o = E.map(wt(r, "script"), Ft)).length; h < d; h++)
                        u = r,
                        h !== f && (u = E.clone(u, !0, !0), a && E.merge(o, wt(u, "script"))),
                        n.call(t[h], u, h);
                    if (a)
                        for (c = o[o.length - 1].ownerDocument, E.map(o, Pt), h = 0; h < a; h++)
                            u = o[h],
                            yt.test(u.type || "") && !G.access(u, "globalEval") && E.contains(c, u) && (u.src && "module" !== (u.type || "").toLowerCase() ? E._evalUrl && !u.noModule && E._evalUrl(u.src, {
                                nonce: u.nonce || u.getAttribute("nonce")
                            }, c) : b(u.textContent.replace(It, ""), u, c))
                }
                return t
            }
            function Lt(t, e, n) {
                for (var i, r = e ? E.filter(e, t) : t, s = 0; null != (i = r[s]); s++)
                    n || 1 !== i.nodeType || E.cleanData(wt(i)),
                    i.parentNode && (n && at(i) && bt(wt(i, "script")), i.parentNode.removeChild(i));
                return t
            }
            E.extend({
                htmlPrefilter: function(t) {
                    return t
                },
                clone: function(t, e, n) {
                    var i,
                        r,
                        s,
                        o,
                        a = t.cloneNode(!0),
                        l = at(t);
                    if (!(m.noCloneChecked || 1 !== t.nodeType && 11 !== t.nodeType || E.isXMLDoc(t)))
                        for (o = wt(a), i = 0, r = (s = wt(t)).length; i < r; i++)
                            qt(s[i], o[i]);
                    if (e)
                        if (n)
                            for (s = s || wt(t), o = o || wt(a), i = 0, r = s.length; i < r; i++)
                                $t(s[i], o[i]);
                        else
                            $t(t, a);
                    return (o = wt(a, "script")).length > 0 && bt(o, !l && wt(t, "script")), a
                },
                cleanData: function(t) {
                    for (var e, n, i, r = E.event.special, s = 0; void 0 !== (n = t[s]); s++)
                        if (Y(n)) {
                            if (e = n[G.expando]) {
                                if (e.events)
                                    for (i in e.events)
                                        r[i] ? E.event.remove(n, i) : E.removeEvent(n, i, e.handle);
                                n[G.expando] = void 0
                            }
                            n[J.expando] && (n[J.expando] = void 0)
                        }
                }
            }),
            E.fn.extend({
                detach: function(t) {
                    return Lt(this, t, !0)
                },
                remove: function(t) {
                    return Lt(this, t)
                },
                text: function(t) {
                    return B(this, (function(t) {
                        return void 0 === t ? E.text(this) : this.empty().each((function() {
                            1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || (this.textContent = t)
                        }))
                    }), null, t, arguments.length)
                },
                append: function() {
                    return Rt(this, arguments, (function(t) {
                        1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || Ot(this, t).appendChild(t)
                    }))
                },
                prepend: function() {
                    return Rt(this, arguments, (function(t) {
                        if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                            var e = Ot(this, t);
                            e.insertBefore(t, e.firstChild)
                        }
                    }))
                },
                before: function() {
                    return Rt(this, arguments, (function(t) {
                        this.parentNode && this.parentNode.insertBefore(t, this)
                    }))
                },
                after: function() {
                    return Rt(this, arguments, (function(t) {
                        this.parentNode && this.parentNode.insertBefore(t, this.nextSibling)
                    }))
                },
                empty: function() {
                    for (var t, e = 0; null != (t = this[e]); e++)
                        1 === t.nodeType && (E.cleanData(wt(t, !1)), t.textContent = "");
                    return this
                },
                clone: function(t, e) {
                    return t = null != t && t, e = null == e ? t : e, this.map((function() {
                        return E.clone(this, t, e)
                    }))
                },
                html: function(t) {
                    return B(this, (function(t) {
                        var e = this[0] || {},
                            n = 0,
                            i = this.length;
                        if (void 0 === t && 1 === e.nodeType)
                            return e.innerHTML;
                        if ("string" == typeof t && !Nt.test(t) && !_t[(vt.exec(t) || ["", ""])[1].toLowerCase()]) {
                            t = E.htmlPrefilter(t);
                            try {
                                for (; n < i; n++)
                                    1 === (e = this[n] || {}).nodeType && (E.cleanData(wt(e, !1)), e.innerHTML = t);
                                e = 0
                            } catch (t) {}
                        }
                        e && this.empty().append(t)
                    }), null, t, arguments.length)
                },
                replaceWith: function() {
                    var t = [];
                    return Rt(this, arguments, (function(e) {
                        var n = this.parentNode;
                        E.inArray(this, t) < 0 && (E.cleanData(wt(this)), n && n.replaceChild(e, this))
                    }), t)
                }
            }),
            E.each({
                appendTo: "append",
                prependTo: "prepend",
                insertBefore: "before",
                insertAfter: "after",
                replaceAll: "replaceWith"
            }, (function(t, e) {
                E.fn[t] = function(t) {
                    for (var n, i = [], r = E(t), s = r.length - 1, o = 0; o <= s; o++)
                        n = o === s ? this : this.clone(!0),
                        E(r[o])[e](n),
                        u.apply(i, n.get());
                    return this.pushStack(i)
                }
            }));
            var Mt = new RegExp("^(" + it + ")(?!px)[a-z%]+$", "i"),
                Ht = /^--/,
                zt = function(t) {
                    var e = t.ownerDocument.defaultView;
                    return e && e.opener || (e = i), e.getComputedStyle(t)
                },
                Wt = function(t, e, n) {
                    var i,
                        r,
                        s = {};
                    for (r in e)
                        s[r] = t.style[r],
                        t.style[r] = e[r];
                    for (r in i = n.call(t), e)
                        t.style[r] = s[r];
                    return i
                },
                Vt = new RegExp(st.join("|"), "i"),
                Bt = "[\\x20\\t\\r\\n\\f]",
                Ut = new RegExp("^" + Bt + "+|((?:^|[^\\\\])(?:\\\\.)*)" + Bt + "+$", "g");
            function Qt(t, e, n) {
                var i,
                    r,
                    s,
                    o,
                    a = Ht.test(e),
                    l = t.style;
                return (n = n || zt(t)) && (o = n.getPropertyValue(e) || n[e], a && o && (o = o.replace(Ut, "$1") || void 0), "" !== o || at(t) || (o = E.style(t, e)), !m.pixelBoxStyles() && Mt.test(o) && Vt.test(e) && (i = l.width, r = l.minWidth, s = l.maxWidth, l.minWidth = l.maxWidth = l.width = o, o = n.width, l.width = i, l.minWidth = r, l.maxWidth = s)), void 0 !== o ? o + "" : o
            }
            function Xt(t, e) {
                return {
                    get: function() {
                        if (!t())
                            return (this.get = e).apply(this, arguments);
                        delete this.get
                    }
                }
            }
            !function() {
                function t() {
                    if (c) {
                        u.style.cssText = "position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0",
                        c.style.cssText = "position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%",
                        ot.appendChild(u).appendChild(c);
                        var t = i.getComputedStyle(c);
                        n = "1%" !== t.top,
                        l = 12 === e(t.marginLeft),
                        c.style.right = "60%",
                        o = 36 === e(t.right),
                        r = 36 === e(t.width),
                        c.style.position = "absolute",
                        s = 12 === e(c.offsetWidth / 3),
                        ot.removeChild(u),
                        c = null
                    }
                }
                function e(t) {
                    return Math.round(parseFloat(t))
                }
                var n,
                    r,
                    s,
                    o,
                    a,
                    l,
                    u = _.createElement("div"),
                    c = _.createElement("div");
                c.style && (c.style.backgroundClip = "content-box", c.cloneNode(!0).style.backgroundClip = "", m.clearCloneStyle = "content-box" === c.style.backgroundClip, E.extend(m, {
                    boxSizingReliable: function() {
                        return t(), r
                    },
                    pixelBoxStyles: function() {
                        return t(), o
                    },
                    pixelPosition: function() {
                        return t(), n
                    },
                    reliableMarginLeft: function() {
                        return t(), l
                    },
                    scrollboxSize: function() {
                        return t(), s
                    },
                    reliableTrDimensions: function() {
                        var t,
                            e,
                            n,
                            r;
                        return null == a && (t = _.createElement("table"), e = _.createElement("tr"), n = _.createElement("div"), t.style.cssText = "position:absolute;left:-11111px;border-collapse:separate", e.style.cssText = "border:1px solid", e.style.height = "1px", n.style.height = "9px", n.style.display = "block", ot.appendChild(t).appendChild(e).appendChild(n), r = i.getComputedStyle(e), a = parseInt(r.height, 10) + parseInt(r.borderTopWidth, 10) + parseInt(r.borderBottomWidth, 10) === e.offsetHeight, ot.removeChild(t)), a
                    }
                }))
            }();
            var Zt = ["Webkit", "Moz", "ms"],
                Yt = _.createElement("div").style,
                Kt = {};
            function Gt(t) {
                var e = E.cssProps[t] || Kt[t];
                return e || (t in Yt ? t : Kt[t] = function(t) {
                        for (var e = t[0].toUpperCase() + t.slice(1), n = Zt.length; n--;)
                            if ((t = Zt[n] + e) in Yt)
                                return t
                    }(t) || t)
            }
            var Jt = /^(none|table(?!-c[ea]).+)/,
                te = {
                    position: "absolute",
                    visibility: "hidden",
                    display: "block"
                },
                ee = {
                    letterSpacing: "0",
                    fontWeight: "400"
                };
            function ne(t, e, n) {
                var i = rt.exec(e);
                return i ? Math.max(0, i[2] - (n || 0)) + (i[3] || "px") : e
            }
            function ie(t, e, n, i, r, s) {
                var o = "width" === e ? 1 : 0,
                    a = 0,
                    l = 0;
                if (n === (i ? "border" : "content"))
                    return 0;
                for (; o < 4; o += 2)
                    "margin" === n && (l += E.css(t, n + st[o], !0, r)),
                    i ? ("content" === n && (l -= E.css(t, "padding" + st[o], !0, r)), "margin" !== n && (l -= E.css(t, "border" + st[o] + "Width", !0, r))) : (l += E.css(t, "padding" + st[o], !0, r), "padding" !== n ? l += E.css(t, "border" + st[o] + "Width", !0, r) : a += E.css(t, "border" + st[o] + "Width", !0, r));
                return !i && s >= 0 && (l += Math.max(0, Math.ceil(t["offset" + e[0].toUpperCase() + e.slice(1)] - s - l - a - .5)) || 0), l
            }
            function re(t, e, n) {
                var i = zt(t),
                    r = (!m.boxSizingReliable() || n) && "border-box" === E.css(t, "boxSizing", !1, i),
                    s = r,
                    o = Qt(t, e, i),
                    a = "offset" + e[0].toUpperCase() + e.slice(1);
                if (Mt.test(o)) {
                    if (!n)
                        return o;
                    o = "auto"
                }
                return (!m.boxSizingReliable() && r || !m.reliableTrDimensions() && N(t, "tr") || "auto" === o || !parseFloat(o) && "inline" === E.css(t, "display", !1, i)) && t.getClientRects().length && (r = "border-box" === E.css(t, "boxSizing", !1, i), (s = a in t) && (o = t[a])), (o = parseFloat(o) || 0) + ie(t, e, n || (r ? "border" : "content"), s, i, o) + "px"
            }
            function se(t, e, n, i, r) {
                return new se.prototype.init(t, e, n, i, r)
            }
            E.extend({
                cssHooks: {
                    opacity: {
                        get: function(t, e) {
                            if (e) {
                                var n = Qt(t, "opacity");
                                return "" === n ? "1" : n
                            }
                        }
                    }
                },
                cssNumber: {
                    animationIterationCount: !0,
                    columnCount: !0,
                    fillOpacity: !0,
                    flexGrow: !0,
                    flexShrink: !0,
                    fontWeight: !0,
                    gridArea: !0,
                    gridColumn: !0,
                    gridColumnEnd: !0,
                    gridColumnStart: !0,
                    gridRow: !0,
                    gridRowEnd: !0,
                    gridRowStart: !0,
                    lineHeight: !0,
                    opacity: !0,
                    order: !0,
                    orphans: !0,
                    widows: !0,
                    zIndex: !0,
                    zoom: !0
                },
                cssProps: {},
                style: function(t, e, n, i) {
                    if (t && 3 !== t.nodeType && 8 !== t.nodeType && t.style) {
                        var r,
                            s,
                            o,
                            a = Z(e),
                            l = Ht.test(e),
                            u = t.style;
                        if (l || (e = Gt(a)), o = E.cssHooks[e] || E.cssHooks[a], void 0 === n)
                            return o && "get" in o && void 0 !== (r = o.get(t, !1, i)) ? r : u[e];
                        "string" === (s = typeof n) && (r = rt.exec(n)) && r[1] && (n = ct(t, e, r), s = "number"),
                        null != n && n == n && ("number" !== s || l || (n += r && r[3] || (E.cssNumber[a] ? "" : "px")), m.clearCloneStyle || "" !== n || 0 !== e.indexOf("background") || (u[e] = "inherit"), o && "set" in o && void 0 === (n = o.set(t, n, i)) || (l ? u.setProperty(e, n) : u[e] = n))
                    }
                },
                css: function(t, e, n, i) {
                    var r,
                        s,
                        o,
                        a = Z(e);
                    return Ht.test(e) || (e = Gt(a)), (o = E.cssHooks[e] || E.cssHooks[a]) && "get" in o && (r = o.get(t, !0, n)), void 0 === r && (r = Qt(t, e, i)), "normal" === r && e in ee && (r = ee[e]), "" === n || n ? (s = parseFloat(r), !0 === n || isFinite(s) ? s || 0 : r) : r
                }
            }),
            E.each(["height", "width"], (function(t, e) {
                E.cssHooks[e] = {
                    get: function(t, n, i) {
                        if (n)
                            return !Jt.test(E.css(t, "display")) || t.getClientRects().length && t.getBoundingClientRect().width ? re(t, e, i) : Wt(t, te, (function() {
                                return re(t, e, i)
                            }))
                    },
                    set: function(t, n, i) {
                        var r,
                            s = zt(t),
                            o = !m.scrollboxSize() && "absolute" === s.position,
                            a = (o || i) && "border-box" === E.css(t, "boxSizing", !1, s),
                            l = i ? ie(t, e, i, a, s) : 0;
                        return a && o && (l -= Math.ceil(t["offset" + e[0].toUpperCase() + e.slice(1)] - parseFloat(s[e]) - ie(t, e, "border", !1, s) - .5)), l && (r = rt.exec(n)) && "px" !== (r[3] || "px") && (t.style[e] = n, n = E.css(t, e)), ne(0, n, l)
                    }
                }
            })),
            E.cssHooks.marginLeft = Xt(m.reliableMarginLeft, (function(t, e) {
                if (e)
                    return (parseFloat(Qt(t, "marginLeft")) || t.getBoundingClientRect().left - Wt(t, {
                        marginLeft: 0
                    }, (function() {
                        return t.getBoundingClientRect().left
                    }))) + "px"
            })),
            E.each({
                margin: "",
                padding: "",
                border: "Width"
            }, (function(t, e) {
                E.cssHooks[t + e] = {
                    expand: function(n) {
                        for (var i = 0, r = {}, s = "string" == typeof n ? n.split(" ") : [n]; i < 4; i++)
                            r[t + st[i] + e] = s[i] || s[i - 2] || s[0];
                        return r
                    }
                },
                "margin" !== t && (E.cssHooks[t + e].set = ne)
            })),
            E.fn.extend({
                css: function(t, e) {
                    return B(this, (function(t, e, n) {
                        var i,
                            r,
                            s = {},
                            o = 0;
                        if (Array.isArray(e)) {
                            for (i = zt(t), r = e.length; o < r; o++)
                                s[e[o]] = E.css(t, e[o], !1, i);
                            return s
                        }
                        return void 0 !== n ? E.style(t, e, n) : E.css(t, e)
                    }), t, e, arguments.length > 1)
                }
            }),
            E.Tween = se,
            se.prototype = {
                constructor: se,
                init: function(t, e, n, i, r, s) {
                    this.elem = t,
                    this.prop = n,
                    this.easing = r || E.easing._default,
                    this.options = e,
                    this.start = this.now = this.cur(),
                    this.end = i,
                    this.unit = s || (E.cssNumber[n] ? "" : "px")
                },
                cur: function() {
                    var t = se.propHooks[this.prop];
                    return t && t.get ? t.get(this) : se.propHooks._default.get(this)
                },
                run: function(t) {
                    var e,
                        n = se.propHooks[this.prop];
                    return this.options.duration ? this.pos = e = E.easing[this.easing](t, this.options.duration * t, 0, 1, this.options.duration) : this.pos = e = t, this.now = (this.end - this.start) * e + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), n && n.set ? n.set(this) : se.propHooks._default.set(this), this
                }
            },
            se.prototype.init.prototype = se.prototype,
            se.propHooks = {
                _default: {
                    get: function(t) {
                        var e;
                        return 1 !== t.elem.nodeType || null != t.elem[t.prop] && null == t.elem.style[t.prop] ? t.elem[t.prop] : (e = E.css(t.elem, t.prop, "")) && "auto" !== e ? e : 0
                    },
                    set: function(t) {
                        E.fx.step[t.prop] ? E.fx.step[t.prop](t) : 1 !== t.elem.nodeType || !E.cssHooks[t.prop] && null == t.elem.style[Gt(t.prop)] ? t.elem[t.prop] = t.now : E.style(t.elem, t.prop, t.now + t.unit)
                    }
                }
            },
            se.propHooks.scrollTop = se.propHooks.scrollLeft = {
                set: function(t) {
                    t.elem.nodeType && t.elem.parentNode && (t.elem[t.prop] = t.now)
                }
            },
            E.easing = {
                linear: function(t) {
                    return t
                },
                swing: function(t) {
                    return .5 - Math.cos(t * Math.PI) / 2
                },
                _default: "swing"
            },
            E.fx = se.prototype.init,
            E.fx.step = {};
            var oe,
                ae,
                le = /^(?:toggle|show|hide)$/,
                ue = /queueHooks$/;
            function ce() {
                ae && (!1 === _.hidden && i.requestAnimationFrame ? i.requestAnimationFrame(ce) : i.setTimeout(ce, E.fx.interval), E.fx.tick())
            }
            function he() {
                return i.setTimeout((function() {
                    oe = void 0
                })), oe = Date.now()
            }
            function de(t, e) {
                var n,
                    i = 0,
                    r = {
                        height: t
                    };
                for (e = e ? 1 : 0; i < 4; i += 2 - e)
                    r["margin" + (n = st[i])] = r["padding" + n] = t;
                return e && (r.opacity = r.width = t), r
            }
            function fe(t, e, n) {
                for (var i, r = (pe.tweeners[e] || []).concat(pe.tweeners["*"]), s = 0, o = r.length; s < o; s++)
                    if (i = r[s].call(n, e, t))
                        return i
            }
            function pe(t, e, n) {
                var i,
                    r,
                    s = 0,
                    o = pe.prefilters.length,
                    a = E.Deferred().always((function() {
                        delete l.elem
                    })),
                    l = function() {
                        if (r)
                            return !1;
                        for (var e = oe || he(), n = Math.max(0, u.startTime + u.duration - e), i = 1 - (n / u.duration || 0), s = 0, o = u.tweens.length; s < o; s++)
                            u.tweens[s].run(i);
                        return a.notifyWith(t, [u, i, n]), i < 1 && o ? n : (o || a.notifyWith(t, [u, 1, 0]), a.resolveWith(t, [u]), !1)
                    },
                    u = a.promise({
                        elem: t,
                        props: E.extend({}, e),
                        opts: E.extend(!0, {
                            specialEasing: {},
                            easing: E.easing._default
                        }, n),
                        originalProperties: e,
                        originalOptions: n,
                        startTime: oe || he(),
                        duration: n.duration,
                        tweens: [],
                        createTween: function(e, n) {
                            var i = E.Tween(t, u.opts, e, n, u.opts.specialEasing[e] || u.opts.easing);
                            return u.tweens.push(i), i
                        },
                        stop: function(e) {
                            var n = 0,
                                i = e ? u.tweens.length : 0;
                            if (r)
                                return this;
                            for (r = !0; n < i; n++)
                                u.tweens[n].run(1);
                            return e ? (a.notifyWith(t, [u, 1, 0]), a.resolveWith(t, [u, e])) : a.rejectWith(t, [u, e]), this
                        }
                    }),
                    c = u.props;
                for (!function(t, e) {
                    var n,
                        i,
                        r,
                        s,
                        o;
                    for (n in t)
                        if (r = e[i = Z(n)], s = t[n], Array.isArray(s) && (r = s[1], s = t[n] = s[0]), n !== i && (t[i] = s, delete t[n]), (o = E.cssHooks[i]) && "expand" in o)
                            for (n in s = o.expand(s), delete t[i], s)
                                n in t || (t[n] = s[n], e[n] = r);
                        else
                            e[i] = r
                }(c, u.opts.specialEasing); s < o; s++)
                    if (i = pe.prefilters[s].call(u, t, c, u.opts))
                        return v(i.stop) && (E._queueHooks(u.elem, u.opts.queue).stop = i.stop.bind(i)), i;
                return E.map(c, fe, u), v(u.opts.start) && u.opts.start.call(t, u), u.progress(u.opts.progress).done(u.opts.done, u.opts.complete).fail(u.opts.fail).always(u.opts.always), E.fx.timer(E.extend(l, {
                    elem: t,
                    anim: u,
                    queue: u.opts.queue
                })), u
            }
            E.Animation = E.extend(pe, {
                tweeners: {
                    "*": [function(t, e) {
                        var n = this.createTween(t, e);
                        return ct(n.elem, t, rt.exec(e), n), n
                    }]
                },
                tweener: function(t, e) {
                    v(t) ? (e = t, t = ["*"]) : t = t.match(R);
                    for (var n, i = 0, r = t.length; i < r; i++)
                        n = t[i],
                        pe.tweeners[n] = pe.tweeners[n] || [],
                        pe.tweeners[n].unshift(e)
                },
                prefilters: [function(t, e, n) {
                    var i,
                        r,
                        s,
                        o,
                        a,
                        l,
                        u,
                        c,
                        h = "width" in e || "height" in e,
                        d = this,
                        f = {},
                        p = t.style,
                        g = t.nodeType && ut(t),
                        m = G.get(t, "fxshow");
                    for (i in n.queue || (null == (o = E._queueHooks(t, "fx")).unqueued && (o.unqueued = 0, a = o.empty.fire, o.empty.fire = function() {
                        o.unqueued || a()
                    }), o.unqueued++, d.always((function() {
                        d.always((function() {
                            o.unqueued--,
                            E.queue(t, "fx").length || o.empty.fire()
                        }))
                    }))), e)
                        if (r = e[i], le.test(r)) {
                            if (delete e[i], s = s || "toggle" === r, r === (g ? "hide" : "show")) {
                                if ("show" !== r || !m || void 0 === m[i])
                                    continue;
                                g = !0
                            }
                            f[i] = m && m[i] || E.style(t, i)
                        }
                    if ((l = !E.isEmptyObject(e)) || !E.isEmptyObject(f))
                        for (i in h && 1 === t.nodeType && (n.overflow = [p.overflow, p.overflowX, p.overflowY], null == (u = m && m.display) && (u = G.get(t, "display")), "none" === (c = E.css(t, "display")) && (u ? c = u : (ft([t], !0), u = t.style.display || u, c = E.css(t, "display"), ft([t]))), ("inline" === c || "inline-block" === c && null != u) && "none" === E.css(t, "float") && (l || (d.done((function() {
                            p.display = u
                        })), null == u && (c = p.display, u = "none" === c ? "" : c)), p.display = "inline-block")), n.overflow && (p.overflow = "hidden", d.always((function() {
                            p.overflow = n.overflow[0],
                            p.overflowX = n.overflow[1],
                            p.overflowY = n.overflow[2]
                        }))), l = !1, f)
                            l || (m ? "hidden" in m && (g = m.hidden) : m = G.access(t, "fxshow", {
                                display: u
                            }), s && (m.hidden = !g), g && ft([t], !0), d.done((function() {
                                for (i in g || ft([t]), G.remove(t, "fxshow"), f)
                                    E.style(t, i, f[i])
                            }))),
                            l = fe(g ? m[i] : 0, i, d),
                            i in m || (m[i] = l.start, g && (l.end = l.start, l.start = 0))
                }],
                prefilter: function(t, e) {
                    e ? pe.prefilters.unshift(t) : pe.prefilters.push(t)
                }
            }),
            E.speed = function(t, e, n) {
                var i = t && "object" == typeof t ? E.extend({}, t) : {
                    complete: n || !n && e || v(t) && t,
                    duration: t,
                    easing: n && e || e && !v(e) && e
                };
                return E.fx.off ? i.duration = 0 : "number" != typeof i.duration && (i.duration in E.fx.speeds ? i.duration = E.fx.speeds[i.duration] : i.duration = E.fx.speeds._default), null != i.queue && !0 !== i.queue || (i.queue = "fx"), i.old = i.complete, i.complete = function() {
                    v(i.old) && i.old.call(this),
                    i.queue && E.dequeue(this, i.queue)
                }, i
            },
            E.fn.extend({
                fadeTo: function(t, e, n, i) {
                    return this.filter(ut).css("opacity", 0).show().end().animate({
                        opacity: e
                    }, t, n, i)
                },
                animate: function(t, e, n, i) {
                    var r = E.isEmptyObject(t),
                        s = E.speed(e, n, i),
                        o = function() {
                            var e = pe(this, E.extend({}, t), s);
                            (r || G.get(this, "finish")) && e.stop(!0)
                        };
                    return o.finish = o, r || !1 === s.queue ? this.each(o) : this.queue(s.queue, o)
                },
                stop: function(t, e, n) {
                    var i = function(t) {
                        var e = t.stop;
                        delete t.stop,
                        e(n)
                    };
                    return "string" != typeof t && (n = e, e = t, t = void 0), e && this.queue(t || "fx", []), this.each((function() {
                        var e = !0,
                            r = null != t && t + "queueHooks",
                            s = E.timers,
                            o = G.get(this);
                        if (r)
                            o[r] && o[r].stop && i(o[r]);
                        else
                            for (r in o)
                                o[r] && o[r].stop && ue.test(r) && i(o[r]);
                        for (r = s.length; r--;)
                            s[r].elem !== this || null != t && s[r].queue !== t || (s[r].anim.stop(n), e = !1, s.splice(r, 1));
                        !e && n || E.dequeue(this, t)
                    }))
                },
                finish: function(t) {
                    return !1 !== t && (t = t || "fx"), this.each((function() {
                        var e,
                            n = G.get(this),
                            i = n[t + "queue"],
                            r = n[t + "queueHooks"],
                            s = E.timers,
                            o = i ? i.length : 0;
                        for (n.finish = !0, E.queue(this, t, []), r && r.stop && r.stop.call(this, !0), e = s.length; e--;)
                            s[e].elem === this && s[e].queue === t && (s[e].anim.stop(!0), s.splice(e, 1));
                        for (e = 0; e < o; e++)
                            i[e] && i[e].finish && i[e].finish.call(this);
                        delete n.finish
                    }))
                }
            }),
            E.each(["toggle", "show", "hide"], (function(t, e) {
                var n = E.fn[e];
                E.fn[e] = function(t, i, r) {
                    return null == t || "boolean" == typeof t ? n.apply(this, arguments) : this.animate(de(e, !0), t, i, r)
                }
            })),
            E.each({
                slideDown: de("show"),
                slideUp: de("hide"),
                slideToggle: de("toggle"),
                fadeIn: {
                    opacity: "show"
                },
                fadeOut: {
                    opacity: "hide"
                },
                fadeToggle: {
                    opacity: "toggle"
                }
            }, (function(t, e) {
                E.fn[t] = function(t, n, i) {
                    return this.animate(e, t, n, i)
                }
            })),
            E.timers = [],
            E.fx.tick = function() {
                var t,
                    e = 0,
                    n = E.timers;
                for (oe = Date.now(); e < n.length; e++)
                    (t = n[e])() || n[e] !== t || n.splice(e--, 1);
                n.length || E.fx.stop(),
                oe = void 0
            },
            E.fx.timer = function(t) {
                E.timers.push(t),
                E.fx.start()
            },
            E.fx.interval = 13,
            E.fx.start = function() {
                ae || (ae = !0, ce())
            },
            E.fx.stop = function() {
                ae = null
            },
            E.fx.speeds = {
                slow: 600,
                fast: 200,
                _default: 400
            },
            E.fn.delay = function(t, e) {
                return t = E.fx && E.fx.speeds[t] || t, e = e || "fx", this.queue(e, (function(e, n) {
                    var r = i.setTimeout(e, t);
                    n.stop = function() {
                        i.clearTimeout(r)
                    }
                }))
            },
            function() {
                var t = _.createElement("input"),
                    e = _.createElement("select").appendChild(_.createElement("option"));
                t.type = "checkbox",
                m.checkOn = "" !== t.value,
                m.optSelected = e.selected,
                (t = _.createElement("input")).value = "t",
                t.type = "radio",
                m.radioValue = "t" === t.value
            }();
            var ge,
                me = E.expr.attrHandle;
            E.fn.extend({
                attr: function(t, e) {
                    return B(this, E.attr, t, e, arguments.length > 1)
                },
                removeAttr: function(t) {
                    return this.each((function() {
                        E.removeAttr(this, t)
                    }))
                }
            }),
            E.extend({
                attr: function(t, e, n) {
                    var i,
                        r,
                        s = t.nodeType;
                    if (3 !== s && 8 !== s && 2 !== s)
                        return void 0 === t.getAttribute ? E.prop(t, e, n) : (1 === s && E.isXMLDoc(t) || (r = E.attrHooks[e.toLowerCase()] || (E.expr.match.bool.test(e) ? ge : void 0)), void 0 !== n ? null === n ? void E.removeAttr(t, e) : r && "set" in r && void 0 !== (i = r.set(t, n, e)) ? i : (t.setAttribute(e, n + ""), n) : r && "get" in r && null !== (i = r.get(t, e)) ? i : null == (i = E.find.attr(t, e)) ? void 0 : i)
                },
                attrHooks: {
                    type: {
                        set: function(t, e) {
                            if (!m.radioValue && "radio" === e && N(t, "input")) {
                                var n = t.value;
                                return t.setAttribute("type", e), n && (t.value = n), e
                            }
                        }
                    }
                },
                removeAttr: function(t, e) {
                    var n,
                        i = 0,
                        r = e && e.match(R);
                    if (r && 1 === t.nodeType)
                        for (; n = r[i++];)
                            t.removeAttribute(n)
                }
            }),
            ge = {
                set: function(t, e, n) {
                    return !1 === e ? E.removeAttr(t, n) : t.setAttribute(n, n), n
                }
            },
            E.each(E.expr.match.bool.source.match(/\w+/g), (function(t, e) {
                var n = me[e] || E.find.attr;
                me[e] = function(t, e, i) {
                    var r,
                        s,
                        o = e.toLowerCase();
                    return i || (s = me[o], me[o] = r, r = null != n(t, e, i) ? o : null, me[o] = s), r
                }
            }));
            var ve = /^(?:input|select|textarea|button)$/i,
                ye = /^(?:a|area)$/i;
            function _e(t) {
                return (t.match(R) || []).join(" ")
            }
            function we(t) {
                return t.getAttribute && t.getAttribute("class") || ""
            }
            function be(t) {
                return Array.isArray(t) ? t : "string" == typeof t && t.match(R) || []
            }
            E.fn.extend({
                prop: function(t, e) {
                    return B(this, E.prop, t, e, arguments.length > 1)
                },
                removeProp: function(t) {
                    return this.each((function() {
                        delete this[E.propFix[t] || t]
                    }))
                }
            }),
            E.extend({
                prop: function(t, e, n) {
                    var i,
                        r,
                        s = t.nodeType;
                    if (3 !== s && 8 !== s && 2 !== s)
                        return 1 === s && E.isXMLDoc(t) || (e = E.propFix[e] || e, r = E.propHooks[e]), void 0 !== n ? r && "set" in r && void 0 !== (i = r.set(t, n, e)) ? i : t[e] = n : r && "get" in r && null !== (i = r.get(t, e)) ? i : t[e]
                },
                propHooks: {
                    tabIndex: {
                        get: function(t) {
                            var e = E.find.attr(t, "tabindex");
                            return e ? parseInt(e, 10) : ve.test(t.nodeName) || ye.test(t.nodeName) && t.href ? 0 : -1
                        }
                    }
                },
                propFix: {
                    for: "htmlFor",
                    class: "className"
                }
            }),
            m.optSelected || (E.propHooks.selected = {
                get: function(t) {
                    var e = t.parentNode;
                    return e && e.parentNode && e.parentNode.selectedIndex, null
                },
                set: function(t) {
                    var e = t.parentNode;
                    e && (e.selectedIndex, e.parentNode && e.parentNode.selectedIndex)
                }
            }),
            E.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], (function() {
                E.propFix[this.toLowerCase()] = this
            })),
            E.fn.extend({
                addClass: function(t) {
                    var e,
                        n,
                        i,
                        r,
                        s,
                        o;
                    return v(t) ? this.each((function(e) {
                        E(this).addClass(t.call(this, e, we(this)))
                    })) : (e = be(t)).length ? this.each((function() {
                        if (i = we(this), n = 1 === this.nodeType && " " + _e(i) + " ") {
                            for (s = 0; s < e.length; s++)
                                r = e[s],
                                n.indexOf(" " + r + " ") < 0 && (n += r + " ");
                            o = _e(n),
                            i !== o && this.setAttribute("class", o)
                        }
                    })) : this
                },
                removeClass: function(t) {
                    var e,
                        n,
                        i,
                        r,
                        s,
                        o;
                    return v(t) ? this.each((function(e) {
                        E(this).removeClass(t.call(this, e, we(this)))
                    })) : arguments.length ? (e = be(t)).length ? this.each((function() {
                        if (i = we(this), n = 1 === this.nodeType && " " + _e(i) + " ") {
                            for (s = 0; s < e.length; s++)
                                for (r = e[s]; n.indexOf(" " + r + " ") > -1;)
                                    n = n.replace(" " + r + " ", " ");
                            o = _e(n),
                            i !== o && this.setAttribute("class", o)
                        }
                    })) : this : this.attr("class", "")
                },
                toggleClass: function(t, e) {
                    var n,
                        i,
                        r,
                        s,
                        o = typeof t,
                        a = "string" === o || Array.isArray(t);
                    return v(t) ? this.each((function(n) {
                        E(this).toggleClass(t.call(this, n, we(this), e), e)
                    })) : "boolean" == typeof e && a ? e ? this.addClass(t) : this.removeClass(t) : (n = be(t), this.each((function() {
                        if (a)
                            for (s = E(this), r = 0; r < n.length; r++)
                                i = n[r],
                                s.hasClass(i) ? s.removeClass(i) : s.addClass(i);
                        else
                            void 0 !== t && "boolean" !== o || ((i = we(this)) && G.set(this, "__className__", i), this.setAttribute && this.setAttribute("class", i || !1 === t ? "" : G.get(this, "__className__") || ""))
                    })))
                },
                hasClass: function(t) {
                    var e,
                        n,
                        i = 0;
                    for (e = " " + t + " "; n = this[i++];)
                        if (1 === n.nodeType && (" " + _e(we(n)) + " ").indexOf(e) > -1)
                            return !0;
                    return !1
                }
            });
            var xe = /\r/g;
            E.fn.extend({
                val: function(t) {
                    var e,
                        n,
                        i,
                        r = this[0];
                    return arguments.length ? (i = v(t), this.each((function(n) {
                        var r;
                        1 === this.nodeType && (null == (r = i ? t.call(this, n, E(this).val()) : t) ? r = "" : "number" == typeof r ? r += "" : Array.isArray(r) && (r = E.map(r, (function(t) {
                            return null == t ? "" : t + ""
                        }))), (e = E.valHooks[this.type] || E.valHooks[this.nodeName.toLowerCase()]) && "set" in e && void 0 !== e.set(this, r, "value") || (this.value = r))
                    }))) : r ? (e = E.valHooks[r.type] || E.valHooks[r.nodeName.toLowerCase()]) && "get" in e && void 0 !== (n = e.get(r, "value")) ? n : "string" == typeof (n = r.value) ? n.replace(xe, "") : null == n ? "" : n : void 0
                }
            }),
            E.extend({
                valHooks: {
                    option: {
                        get: function(t) {
                            var e = E.find.attr(t, "value");
                            return null != e ? e : _e(E.text(t))
                        }
                    },
                    select: {
                        get: function(t) {
                            var e,
                                n,
                                i,
                                r = t.options,
                                s = t.selectedIndex,
                                o = "select-one" === t.type,
                                a = o ? null : [],
                                l = o ? s + 1 : r.length;
                            for (i = s < 0 ? l : o ? s : 0; i < l; i++)
                                if (((n = r[i]).selected || i === s) && !n.disabled && (!n.parentNode.disabled || !N(n.parentNode, "optgroup"))) {
                                    if (e = E(n).val(), o)
                                        return e;
                                    a.push(e)
                                }
                            return a
                        },
                        set: function(t, e) {
                            for (var n, i, r = t.options, s = E.makeArray(e), o = r.length; o--;)
                                ((i = r[o]).selected = E.inArray(E.valHooks.option.get(i), s) > -1) && (n = !0);
                            return n || (t.selectedIndex = -1), s
                        }
                    }
                }
            }),
            E.each(["radio", "checkbox"], (function() {
                E.valHooks[this] = {
                    set: function(t, e) {
                        if (Array.isArray(e))
                            return t.checked = E.inArray(E(t).val(), e) > -1
                    }
                },
                m.checkOn || (E.valHooks[this].get = function(t) {
                    return null === t.getAttribute("value") ? "on" : t.value
                })
            })),
            m.focusin = "onfocusin" in i;
            var Ce = /^(?:focusinfocus|focusoutblur)$/,
                Ee = function(t) {
                    t.stopPropagation()
                };
            E.extend(E.event, {
                trigger: function(t, e, n, r) {
                    var s,
                        o,
                        a,
                        l,
                        u,
                        c,
                        h,
                        d,
                        p = [n || _],
                        g = f.call(t, "type") ? t.type : t,
                        m = f.call(t, "namespace") ? t.namespace.split(".") : [];
                    if (o = d = a = n = n || _, 3 !== n.nodeType && 8 !== n.nodeType && !Ce.test(g + E.event.triggered) && (g.indexOf(".") > -1 && (m = g.split("."), g = m.shift(), m.sort()), u = g.indexOf(":") < 0 && "on" + g, (t = t[E.expando] ? t : new E.Event(g, "object" == typeof t && t)).isTrigger = r ? 2 : 3, t.namespace = m.join("."), t.rnamespace = t.namespace ? new RegExp("(^|\\.)" + m.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, t.result = void 0, t.target || (t.target = n), e = null == e ? [t] : E.makeArray(e, [t]), h = E.event.special[g] || {}, r || !h.trigger || !1 !== h.trigger.apply(n, e))) {
                        if (!r && !h.noBubble && !y(n)) {
                            for (l = h.delegateType || g, Ce.test(l + g) || (o = o.parentNode); o; o = o.parentNode)
                                p.push(o),
                                a = o;
                            a === (n.ownerDocument || _) && p.push(a.defaultView || a.parentWindow || i)
                        }
                        for (s = 0; (o = p[s++]) && !t.isPropagationStopped();)
                            d = o,
                            t.type = s > 1 ? l : h.bindType || g,
                            (c = (G.get(o, "events") || Object.create(null))[t.type] && G.get(o, "handle")) && c.apply(o, e),
                            (c = u && o[u]) && c.apply && Y(o) && (t.result = c.apply(o, e), !1 === t.result && t.preventDefault());
                        return t.type = g, r || t.isDefaultPrevented() || h._default && !1 !== h._default.apply(p.pop(), e) || !Y(n) || u && v(n[g]) && !y(n) && ((a = n[u]) && (n[u] = null), E.event.triggered = g, t.isPropagationStopped() && d.addEventListener(g, Ee), n[g](), t.isPropagationStopped() && d.removeEventListener(g, Ee), E.event.triggered = void 0, a && (n[u] = a)), t.result
                    }
                },
                simulate: function(t, e, n) {
                    var i = E.extend(new E.Event, n, {
                        type: t,
                        isSimulated: !0
                    });
                    E.event.trigger(i, null, e)
                }
            }),
            E.fn.extend({
                trigger: function(t, e) {
                    return this.each((function() {
                        E.event.trigger(t, e, this)
                    }))
                },
                triggerHandler: function(t, e) {
                    var n = this[0];
                    if (n)
                        return E.event.trigger(t, e, n, !0)
                }
            }),
            m.focusin || E.each({
                focus: "focusin",
                blur: "focusout"
            }, (function(t, e) {
                var n = function(t) {
                    E.event.simulate(e, t.target, E.event.fix(t))
                };
                E.event.special[e] = {
                    setup: function() {
                        var i = this.ownerDocument || this.document || this,
                            r = G.access(i, e);
                        r || i.addEventListener(t, n, !0),
                        G.access(i, e, (r || 0) + 1)
                    },
                    teardown: function() {
                        var i = this.ownerDocument || this.document || this,
                            r = G.access(i, e) - 1;
                        r ? G.access(i, e, r) : (i.removeEventListener(t, n, !0), G.remove(i, e))
                    }
                }
            }));
            var Te = i.location,
                Se = {
                    guid: Date.now()
                },
                Ae = /\?/;
            E.parseXML = function(t) {
                var e,
                    n;
                if (!t || "string" != typeof t)
                    return null;
                try {
                    e = (new i.DOMParser).parseFromString(t, "text/xml")
                } catch (t) {}
                return n = e && e.getElementsByTagName("parsererror")[0], e && !n || E.error("Invalid XML: " + (n ? E.map(n.childNodes, (function(t) {
                    return t.textContent
                })).join("\n") : t)), e
            };
            var De = /\[\]$/,
                ke = /\r?\n/g,
                Ne = /^(?:submit|button|image|reset|file)$/i,
                je = /^(?:input|select|textarea|keygen)/i;
            function Ie(t, e, n, i) {
                var r;
                if (Array.isArray(e))
                    E.each(e, (function(e, r) {
                        n || De.test(t) ? i(t, r) : Ie(t + "[" + ("object" == typeof r && null != r ? e : "") + "]", r, n, i)
                    }));
                else if (n || "object" !== x(e))
                    i(t, e);
                else
                    for (r in e)
                        Ie(t + "[" + r + "]", e[r], n, i)
            }
            E.param = function(t, e) {
                var n,
                    i = [],
                    r = function(t, e) {
                        var n = v(e) ? e() : e;
                        i[i.length] = encodeURIComponent(t) + "=" + encodeURIComponent(null == n ? "" : n)
                    };
                if (null == t)
                    return "";
                if (Array.isArray(t) || t.jquery && !E.isPlainObject(t))
                    E.each(t, (function() {
                        r(this.name, this.value)
                    }));
                else
                    for (n in t)
                        Ie(n, t[n], e, r);
                return i.join("&")
            },
            E.fn.extend({
                serialize: function() {
                    return E.param(this.serializeArray())
                },
                serializeArray: function() {
                    return this.map((function() {
                        var t = E.prop(this, "elements");
                        return t ? E.makeArray(t) : this
                    })).filter((function() {
                        var t = this.type;
                        return this.name && !E(this).is(":disabled") && je.test(this.nodeName) && !Ne.test(t) && (this.checked || !mt.test(t))
                    })).map((function(t, e) {
                        var n = E(this).val();
                        return null == n ? null : Array.isArray(n) ? E.map(n, (function(t) {
                            return {
                                name: e.name,
                                value: t.replace(ke, "\r\n")
                            }
                        })) : {
                            name: e.name,
                            value: n.replace(ke, "\r\n")
                        }
                    })).get()
                }
            });
            var Oe = /%20/g,
                Fe = /#.*$/,
                Pe = /([?&])_=[^&]*/,
                $e = /^(.*?):[ \t]*([^\r\n]*)$/gm,
                qe = /^(?:GET|HEAD)$/,
                Re = /^\/\//,
                Le = {},
                Me = {},
                He = "*/".concat("*"),
                ze = _.createElement("a");
            function We(t) {
                return function(e, n) {
                    "string" != typeof e && (n = e, e = "*");
                    var i,
                        r = 0,
                        s = e.toLowerCase().match(R) || [];
                    if (v(n))
                        for (; i = s[r++];)
                            "+" === i[0] ? (i = i.slice(1) || "*", (t[i] = t[i] || []).unshift(n)) : (t[i] = t[i] || []).push(n)
                }
            }
            function Ve(t, e, n, i) {
                var r = {},
                    s = t === Me;
                function o(a) {
                    var l;
                    return r[a] = !0, E.each(t[a] || [], (function(t, a) {
                        var u = a(e, n, i);
                        return "string" != typeof u || s || r[u] ? s ? !(l = u) : void 0 : (e.dataTypes.unshift(u), o(u), !1)
                    })), l
                }
                return o(e.dataTypes[0]) || !r["*"] && o("*")
            }
            function Be(t, e) {
                var n,
                    i,
                    r = E.ajaxSettings.flatOptions || {};
                for (n in e)
                    void 0 !== e[n] && ((r[n] ? t : i || (i = {}))[n] = e[n]);
                return i && E.extend(!0, t, i), t
            }
            ze.href = Te.href,
            E.extend({
                active: 0,
                lastModified: {},
                etag: {},
                ajaxSettings: {
                    url: Te.href,
                    type: "GET",
                    isLocal: /^(?:about|app|app-storage|.+-extension|file|res|widget):$/.test(Te.protocol),
                    global: !0,
                    processData: !0,
                    async: !0,
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    accepts: {
                        "*": He,
                        text: "text/plain",
                        html: "text/html",
                        xml: "application/xml, text/xml",
                        json: "application/json, text/javascript"
                    },
                    contents: {
                        xml: /\bxml\b/,
                        html: /\bhtml/,
                        json: /\bjson\b/
                    },
                    responseFields: {
                        xml: "responseXML",
                        text: "responseText",
                        json: "responseJSON"
                    },
                    converters: {
                        "* text": String,
                        "text html": !0,
                        "text json": JSON.parse,
                        "text xml": E.parseXML
                    },
                    flatOptions: {
                        url: !0,
                        context: !0
                    }
                },
                ajaxSetup: function(t, e) {
                    return e ? Be(Be(t, E.ajaxSettings), e) : Be(E.ajaxSettings, t)
                },
                ajaxPrefilter: We(Le),
                ajaxTransport: We(Me),
                ajax: function(t, e) {
                    "object" == typeof t && (e = t, t = void 0),
                    e = e || {};
                    var n,
                        r,
                        s,
                        o,
                        a,
                        l,
                        u,
                        c,
                        h,
                        d,
                        f = E.ajaxSetup({}, e),
                        p = f.context || f,
                        g = f.context && (p.nodeType || p.jquery) ? E(p) : E.event,
                        m = E.Deferred(),
                        v = E.Callbacks("once memory"),
                        y = f.statusCode || {},
                        w = {},
                        b = {},
                        x = "canceled",
                        C = {
                            readyState: 0,
                            getResponseHeader: function(t) {
                                var e;
                                if (u) {
                                    if (!o)
                                        for (o = {}; e = $e.exec(s);)
                                            o[e[1].toLowerCase() + " "] = (o[e[1].toLowerCase() + " "] || []).concat(e[2]);
                                    e = o[t.toLowerCase() + " "]
                                }
                                return null == e ? null : e.join(", ")
                            },
                            getAllResponseHeaders: function() {
                                return u ? s : null
                            },
                            setRequestHeader: function(t, e) {
                                return null == u && (t = b[t.toLowerCase()] = b[t.toLowerCase()] || t, w[t] = e), this
                            },
                            overrideMimeType: function(t) {
                                return null == u && (f.mimeType = t), this
                            },
                            statusCode: function(t) {
                                var e;
                                if (t)
                                    if (u)
                                        C.always(t[C.status]);
                                    else
                                        for (e in t)
                                            y[e] = [y[e], t[e]];
                                return this
                            },
                            abort: function(t) {
                                var e = t || x;
                                return n && n.abort(e), T(0, e), this
                            }
                        };
                    if (m.promise(C), f.url = ((t || f.url || Te.href) + "").replace(Re, Te.protocol + "//"), f.type = e.method || e.type || f.method || f.type, f.dataTypes = (f.dataType || "*").toLowerCase().match(R) || [""], null == f.crossDomain) {
                        l = _.createElement("a");
                        try {
                            l.href = f.url,
                            l.href = l.href,
                            f.crossDomain = ze.protocol + "//" + ze.host != l.protocol + "//" + l.host
                        } catch (t) {
                            f.crossDomain = !0
                        }
                    }
                    if (f.data && f.processData && "string" != typeof f.data && (f.data = E.param(f.data, f.traditional)), Ve(Le, f, e, C), u)
                        return C;
                    for (h in (c = E.event && f.global) && 0 == E.active++ && E.event.trigger("ajaxStart"), f.type = f.type.toUpperCase(), f.hasContent = !qe.test(f.type), r = f.url.replace(Fe, ""), f.hasContent ? f.data && f.processData && 0 === (f.contentType || "").indexOf("application/x-www-form-urlencoded") && (f.data = f.data.replace(Oe, "+")) : (d = f.url.slice(r.length), f.data && (f.processData || "string" == typeof f.data) && (r += (Ae.test(r) ? "&" : "?") + f.data, delete f.data), !1 === f.cache && (r = r.replace(Pe, "$1"), d = (Ae.test(r) ? "&" : "?") + "_=" + Se.guid++ + d), f.url = r + d), f.ifModified && (E.lastModified[r] && C.setRequestHeader("If-Modified-Since", E.lastModified[r]), E.etag[r] && C.setRequestHeader("If-None-Match", E.etag[r])), (f.data && f.hasContent && !1 !== f.contentType || e.contentType) && C.setRequestHeader("Content-Type", f.contentType), C.setRequestHeader("Accept", f.dataTypes[0] && f.accepts[f.dataTypes[0]] ? f.accepts[f.dataTypes[0]] + ("*" !== f.dataTypes[0] ? ", " + He + "; q=0.01" : "") : f.accepts["*"]), f.headers)
                        C.setRequestHeader(h, f.headers[h]);
                    if (f.beforeSend && (!1 === f.beforeSend.call(p, C, f) || u))
                        return C.abort();
                    if (x = "abort", v.add(f.complete), C.done(f.success), C.fail(f.error), n = Ve(Me, f, e, C)) {
                        if (C.readyState = 1, c && g.trigger("ajaxSend", [C, f]), u)
                            return C;
                        f.async && f.timeout > 0 && (a = i.setTimeout((function() {
                            C.abort("timeout")
                        }), f.timeout));
                        try {
                            u = !1,
                            n.send(w, T)
                        } catch (t) {
                            if (u)
                                throw t;
                            T(-1, t)
                        }
                    } else
                        T(-1, "No Transport");
                    function T(t, e, o, l) {
                        var h,
                            d,
                            _,
                            w,
                            b,
                            x = e;
                        u || (u = !0, a && i.clearTimeout(a), n = void 0, s = l || "", C.readyState = t > 0 ? 4 : 0, h = t >= 200 && t < 300 || 304 === t, o && (w = function(t, e, n) {
                            for (var i, r, s, o, a = t.contents, l = t.dataTypes; "*" === l[0];)
                                l.shift(),
                                void 0 === i && (i = t.mimeType || e.getResponseHeader("Content-Type"));
                            if (i)
                                for (r in a)
                                    if (a[r] && a[r].test(i)) {
                                        l.unshift(r);
                                        break
                                    }
                            if (l[0] in n)
                                s = l[0];
                            else {
                                for (r in n) {
                                    if (!l[0] || t.converters[r + " " + l[0]]) {
                                        s = r;
                                        break
                                    }
                                    o || (o = r)
                                }
                                s = s || o
                            }
                            if (s)
                                return s !== l[0] && l.unshift(s), n[s]
                        }(f, C, o)), !h && E.inArray("script", f.dataTypes) > -1 && E.inArray("json", f.dataTypes) < 0 && (f.converters["text script"] = function() {}), w = function(t, e, n, i) {
                            var r,
                                s,
                                o,
                                a,
                                l,
                                u = {},
                                c = t.dataTypes.slice();
                            if (c[1])
                                for (o in t.converters)
                                    u[o.toLowerCase()] = t.converters[o];
                            for (s = c.shift(); s;)
                                if (t.responseFields[s] && (n[t.responseFields[s]] = e), !l && i && t.dataFilter && (e = t.dataFilter(e, t.dataType)), l = s, s = c.shift())
                                    if ("*" === s)
                                        s = l;
                                    else if ("*" !== l && l !== s) {
                                        if (!(o = u[l + " " + s] || u["* " + s]))
                                            for (r in u)
                                                if ((a = r.split(" "))[1] === s && (o = u[l + " " + a[0]] || u["* " + a[0]])) {
                                                    !0 === o ? o = u[r] : !0 !== u[r] && (s = a[0], c.unshift(a[1]));
                                                    break
                                                }
                                        if (!0 !== o)
                                            if (o && t.throws)
                                                e = o(e);
                                            else
                                                try {
                                                    e = o(e)
                                                } catch (t) {
                                                    return {
                                                        state: "parsererror",
                                                        error: o ? t : "No conversion from " + l + " to " + s
                                                    }
                                                }
                                    }
                            return {
                                state: "success",
                                data: e
                            }
                        }(f, w, C, h), h ? (f.ifModified && ((b = C.getResponseHeader("Last-Modified")) && (E.lastModified[r] = b), (b = C.getResponseHeader("etag")) && (E.etag[r] = b)), 204 === t || "HEAD" === f.type ? x = "nocontent" : 304 === t ? x = "notmodified" : (x = w.state, d = w.data, h = !(_ = w.error))) : (_ = x, !t && x || (x = "error", t < 0 && (t = 0))), C.status = t, C.statusText = (e || x) + "", h ? m.resolveWith(p, [d, x, C]) : m.rejectWith(p, [C, x, _]), C.statusCode(y), y = void 0, c && g.trigger(h ? "ajaxSuccess" : "ajaxError", [C, f, h ? d : _]), v.fireWith(p, [C, x]), c && (g.trigger("ajaxComplete", [C, f]), --E.active || E.event.trigger("ajaxStop")))
                    }
                    return C
                },
                getJSON: function(t, e, n) {
                    return E.get(t, e, n, "json")
                },
                getScript: function(t, e) {
                    return E.get(t, void 0, e, "script")
                }
            }),
            E.each(["get", "post"], (function(t, e) {
                E[e] = function(t, n, i, r) {
                    return v(n) && (r = r || i, i = n, n = void 0), E.ajax(E.extend({
                        url: t,
                        type: e,
                        dataType: r,
                        data: n,
                        success: i
                    }, E.isPlainObject(t) && t))
                }
            })),
            E.ajaxPrefilter((function(t) {
                var e;
                for (e in t.headers)
                    "content-type" === e.toLowerCase() && (t.contentType = t.headers[e] || "")
            })),
            E._evalUrl = function(t, e, n) {
                return E.ajax({
                    url: t,
                    type: "GET",
                    dataType: "script",
                    cache: !0,
                    async: !1,
                    global: !1,
                    converters: {
                        "text script": function() {}
                    },
                    dataFilter: function(t) {
                        E.globalEval(t, e, n)
                    }
                })
            },
            E.fn.extend({
                wrapAll: function(t) {
                    var e;
                    return this[0] && (v(t) && (t = t.call(this[0])), e = E(t, this[0].ownerDocument).eq(0).clone(!0), this[0].parentNode && e.insertBefore(this[0]), e.map((function() {
                        for (var t = this; t.firstElementChild;)
                            t = t.firstElementChild;
                        return t
                    })).append(this)), this
                },
                wrapInner: function(t) {
                    return v(t) ? this.each((function(e) {
                        E(this).wrapInner(t.call(this, e))
                    })) : this.each((function() {
                        var e = E(this),
                            n = e.contents();
                        n.length ? n.wrapAll(t) : e.append(t)
                    }))
                },
                wrap: function(t) {
                    var e = v(t);
                    return this.each((function(n) {
                        E(this).wrapAll(e ? t.call(this, n) : t)
                    }))
                },
                unwrap: function(t) {
                    return this.parent(t).not("body").each((function() {
                        E(this).replaceWith(this.childNodes)
                    })), this
                }
            }),
            E.expr.pseudos.hidden = function(t) {
                return !E.expr.pseudos.visible(t)
            },
            E.expr.pseudos.visible = function(t) {
                return !!(t.offsetWidth || t.offsetHeight || t.getClientRects().length)
            },
            E.ajaxSettings.xhr = function() {
                try {
                    return new i.XMLHttpRequest
                } catch (t) {}
            };
            var Ue = {
                    0: 200,
                    1223: 204
                },
                Qe = E.ajaxSettings.xhr();
            m.cors = !!Qe && "withCredentials" in Qe,
            m.ajax = Qe = !!Qe,
            E.ajaxTransport((function(t) {
                var e,
                    n;
                if (m.cors || Qe && !t.crossDomain)
                    return {
                        send: function(r, s) {
                            var o,
                                a = t.xhr();
                            if (a.open(t.type, t.url, t.async, t.username, t.password), t.xhrFields)
                                for (o in t.xhrFields)
                                    a[o] = t.xhrFields[o];
                            for (o in t.mimeType && a.overrideMimeType && a.overrideMimeType(t.mimeType), t.crossDomain || r["X-Requested-With"] || (r["X-Requested-With"] = "XMLHttpRequest"), r)
                                a.setRequestHeader(o, r[o]);
                            e = function(t) {
                                return function() {
                                    e && (e = n = a.onload = a.onerror = a.onabort = a.ontimeout = a.onreadystatechange = null, "abort" === t ? a.abort() : "error" === t ? "number" != typeof a.status ? s(0, "error") : s(a.status, a.statusText) : s(Ue[a.status] || a.status, a.statusText, "text" !== (a.responseType || "text") || "string" != typeof a.responseText ? {
                                        binary: a.response
                                    } : {
                                        text: a.responseText
                                    }, a.getAllResponseHeaders()))
                                }
                            },
                            a.onload = e(),
                            n = a.onerror = a.ontimeout = e("error"),
                            void 0 !== a.onabort ? a.onabort = n : a.onreadystatechange = function() {
                                4 === a.readyState && i.setTimeout((function() {
                                    e && n()
                                }))
                            },
                            e = e("abort");
                            try {
                                a.send(t.hasContent && t.data || null)
                            } catch (t) {
                                if (e)
                                    throw t
                            }
                        },
                        abort: function() {
                            e && e()
                        }
                    }
            })),
            E.ajaxPrefilter((function(t) {
                t.crossDomain && (t.contents.script = !1)
            })),
            E.ajaxSetup({
                accepts: {
                    script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
                },
                contents: {
                    script: /\b(?:java|ecma)script\b/
                },
                converters: {
                    "text script": function(t) {
                        return E.globalEval(t), t
                    }
                }
            }),
            E.ajaxPrefilter("script", (function(t) {
                void 0 === t.cache && (t.cache = !1),
                t.crossDomain && (t.type = "GET")
            })),
            E.ajaxTransport("script", (function(t) {
                var e,
                    n;
                if (t.crossDomain || t.scriptAttrs)
                    return {
                        send: function(i, r) {
                            e = E("<script>").attr(t.scriptAttrs || {}).prop({
                                charset: t.scriptCharset,
                                src: t.url
                            }).on("load error", n = function(t) {
                                e.remove(),
                                n = null,
                                t && r("error" === t.type ? 404 : 200, t.type)
                            }),
                            _.head.appendChild(e[0])
                        },
                        abort: function() {
                            n && n()
                        }
                    }
            }));
            var Xe,
                Ze = [],
                Ye = /(=)\?(?=&|$)|\?\?/;
            E.ajaxSetup({
                jsonp: "callback",
                jsonpCallback: function() {
                    var t = Ze.pop() || E.expando + "_" + Se.guid++;
                    return this[t] = !0, t
                }
            }),
            E.ajaxPrefilter("json jsonp", (function(t, e, n) {
                var r,
                    s,
                    o,
                    a = !1 !== t.jsonp && (Ye.test(t.url) ? "url" : "string" == typeof t.data && 0 === (t.contentType || "").indexOf("application/x-www-form-urlencoded") && Ye.test(t.data) && "data");
                if (a || "jsonp" === t.dataTypes[0])
                    return r = t.jsonpCallback = v(t.jsonpCallback) ? t.jsonpCallback() : t.jsonpCallback, a ? t[a] = t[a].replace(Ye, "$1" + r) : !1 !== t.jsonp && (t.url += (Ae.test(t.url) ? "&" : "?") + t.jsonp + "=" + r), t.converters["script json"] = function() {
                        return o || E.error(r + " was not called"), o[0]
                    }, t.dataTypes[0] = "json", s = i[r], i[r] = function() {
                        o = arguments
                    }, n.always((function() {
                        void 0 === s ? E(i).removeProp(r) : i[r] = s,
                        t[r] && (t.jsonpCallback = e.jsonpCallback, Ze.push(r)),
                        o && v(s) && s(o[0]),
                        o = s = void 0
                    })), "script"
            })),
            m.createHTMLDocument = ((Xe = _.implementation.createHTMLDocument("").body).innerHTML = "<form></form><form></form>", 2 === Xe.childNodes.length),
            E.parseHTML = function(t, e, n) {
                return "string" != typeof t ? [] : ("boolean" == typeof e && (n = e, e = !1), e || (m.createHTMLDocument ? ((i = (e = _.implementation.createHTMLDocument("")).createElement("base")).href = _.location.href, e.head.appendChild(i)) : e = _), s = !n && [], (r = j.exec(t)) ? [e.createElement(r[1])] : (r = Ct([t], e, s), s && s.length && E(s).remove(), E.merge([], r.childNodes)));
                var i,
                    r,
                    s
            },
            E.fn.load = function(t, e, n) {
                var i,
                    r,
                    s,
                    o = this,
                    a = t.indexOf(" ");
                return a > -1 && (i = _e(t.slice(a)), t = t.slice(0, a)), v(e) ? (n = e, e = void 0) : e && "object" == typeof e && (r = "POST"), o.length > 0 && E.ajax({
                    url: t,
                    type: r || "GET",
                    dataType: "html",
                    data: e
                }).done((function(t) {
                    s = arguments,
                    o.html(i ? E("<div>").append(E.parseHTML(t)).find(i) : t)
                })).always(n && function(t, e) {
                    o.each((function() {
                        n.apply(this, s || [t.responseText, e, t])
                    }))
                }), this
            },
            E.expr.pseudos.animated = function(t) {
                return E.grep(E.timers, (function(e) {
                    return t === e.elem
                })).length
            },
            E.offset = {
                setOffset: function(t, e, n) {
                    var i,
                        r,
                        s,
                        o,
                        a,
                        l,
                        u = E.css(t, "position"),
                        c = E(t),
                        h = {};
                    "static" === u && (t.style.position = "relative"),
                    a = c.offset(),
                    s = E.css(t, "top"),
                    l = E.css(t, "left"),
                    ("absolute" === u || "fixed" === u) && (s + l).indexOf("auto") > -1 ? (o = (i = c.position()).top, r = i.left) : (o = parseFloat(s) || 0, r = parseFloat(l) || 0),
                    v(e) && (e = e.call(t, n, E.extend({}, a))),
                    null != e.top && (h.top = e.top - a.top + o),
                    null != e.left && (h.left = e.left - a.left + r),
                    "using" in e ? e.using.call(t, h) : c.css(h)
                }
            },
            E.fn.extend({
                offset: function(t) {
                    if (arguments.length)
                        return void 0 === t ? this : this.each((function(e) {
                            E.offset.setOffset(this, t, e)
                        }));
                    var e,
                        n,
                        i = this[0];
                    return i ? i.getClientRects().length ? (e = i.getBoundingClientRect(), n = i.ownerDocument.defaultView, {
                        top: e.top + n.pageYOffset,
                        left: e.left + n.pageXOffset
                    }) : {
                        top: 0,
                        left: 0
                    } : void 0
                },
                position: function() {
                    if (this[0]) {
                        var t,
                            e,
                            n,
                            i = this[0],
                            r = {
                                top: 0,
                                left: 0
                            };
                        if ("fixed" === E.css(i, "position"))
                            e = i.getBoundingClientRect();
                        else {
                            for (e = this.offset(), n = i.ownerDocument, t = i.offsetParent || n.documentElement; t && (t === n.body || t === n.documentElement) && "static" === E.css(t, "position");)
                                t = t.parentNode;
                            t && t !== i && 1 === t.nodeType && ((r = E(t).offset()).top += E.css(t, "borderTopWidth", !0), r.left += E.css(t, "borderLeftWidth", !0))
                        }
                        return {
                            top: e.top - r.top - E.css(i, "marginTop", !0),
                            left: e.left - r.left - E.css(i, "marginLeft", !0)
                        }
                    }
                },
                offsetParent: function() {
                    return this.map((function() {
                        for (var t = this.offsetParent; t && "static" === E.css(t, "position");)
                            t = t.offsetParent;
                        return t || ot
                    }))
                }
            }),
            E.each({
                scrollLeft: "pageXOffset",
                scrollTop: "pageYOffset"
            }, (function(t, e) {
                var n = "pageYOffset" === e;
                E.fn[t] = function(i) {
                    return B(this, (function(t, i, r) {
                        var s;
                        if (y(t) ? s = t : 9 === t.nodeType && (s = t.defaultView), void 0 === r)
                            return s ? s[e] : t[i];
                        s ? s.scrollTo(n ? s.pageXOffset : r, n ? r : s.pageYOffset) : t[i] = r
                    }), t, i, arguments.length)
                }
            })),
            E.each(["top", "left"], (function(t, e) {
                E.cssHooks[e] = Xt(m.pixelPosition, (function(t, n) {
                    if (n)
                        return n = Qt(t, e), Mt.test(n) ? E(t).position()[e] + "px" : n
                }))
            })),
            E.each({
                Height: "height",
                Width: "width"
            }, (function(t, e) {
                E.each({
                    padding: "inner" + t,
                    content: e,
                    "": "outer" + t
                }, (function(n, i) {
                    E.fn[i] = function(r, s) {
                        var o = arguments.length && (n || "boolean" != typeof r),
                            a = n || (!0 === r || !0 === s ? "margin" : "border");
                        return B(this, (function(e, n, r) {
                            var s;
                            return y(e) ? 0 === i.indexOf("outer") ? e["inner" + t] : e.document.documentElement["client" + t] : 9 === e.nodeType ? (s = e.documentElement, Math.max(e.body["scroll" + t], s["scroll" + t], e.body["offset" + t], s["offset" + t], s["client" + t])) : void 0 === r ? E.css(e, n, a) : E.style(e, n, r, a)
                        }), e, o ? r : void 0, o)
                    }
                }))
            })),
            E.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], (function(t, e) {
                E.fn[e] = function(t) {
                    return this.on(e, t)
                }
            })),
            E.fn.extend({
                bind: function(t, e, n) {
                    return this.on(t, null, e, n)
                },
                unbind: function(t, e) {
                    return this.off(t, null, e)
                },
                delegate: function(t, e, n, i) {
                    return this.on(e, t, n, i)
                },
                undelegate: function(t, e, n) {
                    return 1 === arguments.length ? this.off(t, "**") : this.off(e, t || "**", n)
                },
                hover: function(t, e) {
                    return this.mouseenter(t).mouseleave(e || t)
                }
            }),
            E.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "), (function(t, e) {
                E.fn[e] = function(t, n) {
                    return arguments.length > 0 ? this.on(e, null, t, n) : this.trigger(e)
                }
            }));
            var Ke = /^[\s\uFEFF\xA0]+|([^\s\uFEFF\xA0])[\s\uFEFF\xA0]+$/g;
            E.proxy = function(t, e) {
                var n,
                    i,
                    r;
                if ("string" == typeof e && (n = t[e], e = t, t = n), v(t))
                    return i = a.call(arguments, 2), r = function() {
                        return t.apply(e || this, i.concat(a.call(arguments)))
                    }, r.guid = t.guid = t.guid || E.guid++, r
            },
            E.holdReady = function(t) {
                t ? E.readyWait++ : E.ready(!0)
            },
            E.isArray = Array.isArray,
            E.parseJSON = JSON.parse,
            E.nodeName = N,
            E.isFunction = v,
            E.isWindow = y,
            E.camelCase = Z,
            E.type = x,
            E.now = Date.now,
            E.isNumeric = function(t) {
                var e = E.type(t);
                return ("number" === e || "string" === e) && !isNaN(t - parseFloat(t))
            },
            E.trim = function(t) {
                return null == t ? "" : (t + "").replace(Ke, "$1")
            },
            void 0 === (n = function() {
                return E
            }.apply(e, [])) || (t.exports = n);
            var Ge = i.jQuery,
                Je = i.$;
            return E.noConflict = function(t) {
                return i.$ === E && (i.$ = Je), t && i.jQuery === E && (i.jQuery = Ge), E
            }, void 0 === r && (i.jQuery = i.$ = E), E
        }))
    },
    9: (t, e, n) => {
        var i = n(755),
            r = n(755);
        !function(t, e, n, r) {
            function s(e, n) {
                this.settings = null,
                this.options = t.extend({}, s.Defaults, n),
                this.$element = t(e),
                this._handlers = {},
                this._plugins = {},
                this._supress = {},
                this._current = null,
                this._speed = null,
                this._coordinates = [],
                this._breakpoint = null,
                this._width = null,
                this._items = [],
                this._clones = [],
                this._mergers = [],
                this._widths = [],
                this._invalidated = {},
                this._pipe = [],
                this._drag = {
                    time: null,
                    target: null,
                    pointer: null,
                    stage: {
                        start: null,
                        current: null
                    },
                    direction: null
                },
                this._states = {
                    current: {},
                    tags: {
                        initializing: ["busy"],
                        animating: ["busy"],
                        dragging: ["interacting"]
                    }
                },
                t.each(["onResize", "onThrottledResize"], t.proxy((function(e, n) {
                    this._handlers[n] = t.proxy(this[n], this)
                }), this)),
                t.each(s.Plugins, t.proxy((function(t, e) {
                    this._plugins[t.charAt(0).toLowerCase() + t.slice(1)] = new e(this)
                }), this)),
                t.each(s.Workers, t.proxy((function(e, n) {
                    this._pipe.push({
                        filter: n.filter,
                        run: t.proxy(n.run, this)
                    })
                }), this)),
                this.setup(),
                this.initialize()
            }
            s.Defaults = {
                items: 3,
                loop: !1,
                center: !1,
                rewind: !1,
                checkVisibility: !0,
                mouseDrag: !0,
                touchDrag: !0,
                pullDrag: !0,
                freeDrag: !1,
                margin: 0,
                stagePadding: 0,
                merge: !1,
                mergeFit: !0,
                autoWidth: !1,
                startPosition: 0,
                rtl: !1,
                smartSpeed: 250,
                fluidSpeed: !1,
                dragEndSpeed: !1,
                responsive: {},
                responsiveRefreshRate: 200,
                responsiveBaseElement: e,
                fallbackEasing: "swing",
                slideTransition: "",
                info: !1,
                nestedItemSelector: !1,
                itemElement: "div",
                stageElement: "div",
                refreshClass: "owl-refresh",
                loadedClass: "owl-loaded",
                loadingClass: "owl-loading",
                rtlClass: "owl-rtl",
                responsiveClass: "owl-responsive",
                dragClass: "owl-drag",
                itemClass: "owl-item",
                stageClass: "owl-stage",
                stageOuterClass: "owl-stage-outer",
                grabClass: "owl-grab"
            },
            s.Width = {
                Default: "default",
                Inner: "inner",
                Outer: "outer"
            },
            s.Type = {
                Event: "event",
                State: "state"
            },
            s.Plugins = {},
            s.Workers = [{
                filter: ["width", "settings"],
                run: function() {
                    this._width = this.$element.width()
                }
            }, {
                filter: ["width", "items", "settings"],
                run: function(t) {
                    t.current = this._items && this._items[this.relative(this._current)]
                }
            }, {
                filter: ["items", "settings"],
                run: function() {
                    this.$stage.children(".cloned").remove()
                }
            }, {
                filter: ["width", "items", "settings"],
                run: function(t) {
                    var e = this.settings.margin || "",
                        n = !this.settings.autoWidth,
                        i = this.settings.rtl,
                        r = {
                            width: "auto",
                            "margin-left": i ? e : "",
                            "margin-right": i ? "" : e
                        };
                    !n && this.$stage.children().css(r),
                    t.css = r
                }
            }, {
                filter: ["width", "items", "settings"],
                run: function(t) {
                    var e = (this.width() / this.settings.items).toFixed(3) - this.settings.margin,
                        n = null,
                        i = this._items.length,
                        r = !this.settings.autoWidth,
                        s = [];
                    for (t.items = {
                        merge: !1,
                        width: e
                    }; i--;)
                        n = this._mergers[i],
                        n = this.settings.mergeFit && Math.min(n, this.settings.items) || n,
                        t.items.merge = n > 1 || t.items.merge,
                        s[i] = r ? e * n : this._items[i].width();
                    this._widths = s
                }
            }, {
                filter: ["items", "settings"],
                run: function() {
                    var e = [],
                        n = this._items,
                        i = this.settings,
                        r = Math.max(2 * i.items, 4),
                        s = 2 * Math.ceil(n.length / 2),
                        o = i.loop && n.length ? i.rewind ? r : Math.max(r, s) : 0,
                        a = "",
                        l = "";
                    for (o /= 2; o > 0;)
                        e.push(this.normalize(e.length / 2, !0)),
                        a += n[e[e.length - 1]][0].outerHTML,
                        e.push(this.normalize(n.length - 1 - (e.length - 1) / 2, !0)),
                        l = n[e[e.length - 1]][0].outerHTML + l,
                        o -= 1;
                    this._clones = e,
                    t(a).addClass("cloned").appendTo(this.$stage),
                    t(l).addClass("cloned").prependTo(this.$stage)
                }
            }, {
                filter: ["width", "items", "settings"],
                run: function() {
                    for (var t = this.settings.rtl ? 1 : -1, e = this._clones.length + this._items.length, n = -1, i = 0, r = 0, s = []; ++n < e;)
                        i = s[n - 1] || 0,
                        r = this._widths[this.relative(n)] + this.settings.margin,
                        s.push(i + r * t);
                    this._coordinates = s
                }
            }, {
                filter: ["width", "items", "settings"],
                run: function() {
                    var t = this.settings.stagePadding,
                        e = this._coordinates,
                        n = {
                            width: Math.ceil(Math.abs(e[e.length - 1])) + 2 * t,
                            "padding-left": t || "",
                            "padding-right": t || ""
                        };
                    this.$stage.css(n)
                }
            }, {
                filter: ["width", "items", "settings"],
                run: function(t) {
                    var e = this._coordinates.length,
                        n = !this.settings.autoWidth,
                        i = this.$stage.children();
                    if (n && t.items.merge)
                        for (; e--;)
                            t.css.width = this._widths[this.relative(e)],
                            i.eq(e).css(t.css);
                    else
                        n && (t.css.width = t.items.width, i.css(t.css))
                }
            }, {
                filter: ["items"],
                run: function() {
                    this._coordinates.length < 1 && this.$stage.removeAttr("style")
                }
            }, {
                filter: ["width", "items", "settings"],
                run: function(t) {
                    t.current = t.current ? this.$stage.children().index(t.current) : 0,
                    t.current = Math.max(this.minimum(), Math.min(this.maximum(), t.current)),
                    this.reset(t.current)
                }
            }, {
                filter: ["position"],
                run: function() {
                    this.animate(this.coordinates(this._current))
                }
            }, {
                filter: ["width", "position", "items", "settings"],
                run: function() {
                    var t,
                        e,
                        n,
                        i,
                        r = this.settings.rtl ? 1 : -1,
                        s = 2 * this.settings.stagePadding,
                        o = this.coordinates(this.current()) + s,
                        a = o + this.width() * r,
                        l = [];
                    for (n = 0, i = this._coordinates.length; n < i; n++)
                        t = this._coordinates[n - 1] || 0,
                        e = Math.abs(this._coordinates[n]) + s * r,
                        (this.op(t, "<=", o) && this.op(t, ">", a) || this.op(e, "<", o) && this.op(e, ">", a)) && l.push(n);
                    this.$stage.children(".active").removeClass("active"),
                    this.$stage.children(":eq(" + l.join("), :eq(") + ")").addClass("active"),
                    this.$stage.children(".center").removeClass("center"),
                    this.settings.center && this.$stage.children().eq(this.current()).addClass("center")
                }
            }],
            s.prototype.initializeStage = function() {
                this.$stage = this.$element.find("." + this.settings.stageClass),
                this.$stage.length || (this.$element.addClass(this.options.loadingClass), this.$stage = t("<" + this.settings.stageElement + ">", {
                    class: this.settings.stageClass
                }).wrap(t("<div/>", {
                    class: this.settings.stageOuterClass
                })), this.$element.append(this.$stage.parent()))
            },
            s.prototype.initializeItems = function() {
                var e = this.$element.find(".owl-item");
                if (e.length)
                    return this._items = e.get().map((function(e) {
                        return t(e)
                    })), this._mergers = this._items.map((function() {
                        return 1
                    })), void this.refresh();
                this.replace(this.$element.children().not(this.$stage.parent())),
                this.isVisible() ? this.refresh() : this.invalidate("width"),
                this.$element.removeClass(this.options.loadingClass).addClass(this.options.loadedClass)
            },
            s.prototype.initialize = function() {
                var t,
                    e,
                    n;
                (this.enter("initializing"), this.trigger("initialize"), this.$element.toggleClass(this.settings.rtlClass, this.settings.rtl), this.settings.autoWidth && !this.is("pre-loading")) && (t = this.$element.find("img"), e = this.settings.nestedItemSelector ? "." + this.settings.nestedItemSelector : r, n = this.$element.children(e).width(), t.length && n <= 0 && this.preloadAutoWidthImages(t));
                this.initializeStage(),
                this.initializeItems(),
                this.registerEventHandlers(),
                this.leave("initializing"),
                this.trigger("initialized")
            },
            s.prototype.isVisible = function() {
                return !this.settings.checkVisibility || this.$element.is(":visible")
            },
            s.prototype.setup = function() {
                var e = this.viewport(),
                    n = this.options.responsive,
                    i = -1,
                    r = null;
                n ? (t.each(n, (function(t) {
                    t <= e && t > i && (i = Number(t))
                })), "function" == typeof (r = t.extend({}, this.options, n[i])).stagePadding && (r.stagePadding = r.stagePadding()), delete r.responsive, r.responsiveClass && this.$element.attr("class", this.$element.attr("class").replace(new RegExp("(" + this.options.responsiveClass + "-)\\S+\\s", "g"), "$1" + i))) : r = t.extend({}, this.options),
                this.trigger("change", {
                    property: {
                        name: "settings",
                        value: r
                    }
                }),
                this._breakpoint = i,
                this.settings = r,
                this.invalidate("settings"),
                this.trigger("changed", {
                    property: {
                        name: "settings",
                        value: this.settings
                    }
                })
            },
            s.prototype.optionsLogic = function() {
                this.settings.autoWidth && (this.settings.stagePadding = !1, this.settings.merge = !1)
            },
            s.prototype.prepare = function(e) {
                var n = this.trigger("prepare", {
                    content: e
                });
                return n.data || (n.data = t("<" + this.settings.itemElement + "/>").addClass(this.options.itemClass).append(e)), this.trigger("prepared", {
                    content: n.data
                }), n.data
            },
            s.prototype.update = function() {
                for (var e = 0, n = this._pipe.length, i = t.proxy((function(t) {
                        return this[t]
                    }), this._invalidated), r = {}; e < n;)
                    (this._invalidated.all || t.grep(this._pipe[e].filter, i).length > 0) && this._pipe[e].run(r),
                    e++;
                this._invalidated = {},
                !this.is("valid") && this.enter("valid")
            },
            s.prototype.width = function(t) {
                switch (t = t || s.Width.Default) {
                case s.Width.Inner:
                case s.Width.Outer:
                    return this._width;
                default:
                    return this._width - 2 * this.settings.stagePadding + this.settings.margin
                }
            },
            s.prototype.refresh = function() {
                this.enter("refreshing"),
                this.trigger("refresh"),
                this.setup(),
                this.optionsLogic(),
                this.$element.addClass(this.options.refreshClass),
                this.update(),
                this.$element.removeClass(this.options.refreshClass),
                this.leave("refreshing"),
                this.trigger("refreshed")
            },
            s.prototype.onThrottledResize = function() {
                e.clearTimeout(this.resizeTimer),
                this.resizeTimer = e.setTimeout(this._handlers.onResize, this.settings.responsiveRefreshRate)
            },
            s.prototype.onResize = function() {
                return !!this._items.length && (this._width !== this.$element.width() && (!!this.isVisible() && (this.enter("resizing"), this.trigger("resize").isDefaultPrevented() ? (this.leave("resizing"), !1) : (this.invalidate("width"), this.refresh(), this.leave("resizing"), void this.trigger("resized")))))
            },
            s.prototype.registerEventHandlers = function() {
                t.support.transition && this.$stage.on(t.support.transition.end + ".owl.core", t.proxy(this.onTransitionEnd, this)),
                !1 !== this.settings.responsive && this.on(e, "resize", this._handlers.onThrottledResize),
                this.settings.mouseDrag && (this.$element.addClass(this.options.dragClass), this.$stage.on("mousedown.owl.core", t.proxy(this.onDragStart, this)), this.$stage.on("dragstart.owl.core selectstart.owl.core", (function() {
                    return !1
                }))),
                this.settings.touchDrag && (this.$stage.on("touchstart.owl.core", t.proxy(this.onDragStart, this)), this.$stage.on("touchcancel.owl.core", t.proxy(this.onDragEnd, this)))
            },
            s.prototype.onDragStart = function(e) {
                var i = null;
                3 !== e.which && (t.support.transform ? i = {
                    x: (i = this.$stage.css("transform").replace(/.*\(|\)| /g, "").split(","))[16 === i.length ? 12 : 4],
                    y: i[16 === i.length ? 13 : 5]
                } : (i = this.$stage.position(), i = {
                    x: this.settings.rtl ? i.left + this.$stage.width() - this.width() + this.settings.margin : i.left,
                    y: i.top
                }), this.is("animating") && (t.support.transform ? this.animate(i.x) : this.$stage.stop(), this.invalidate("position")), this.$element.toggleClass(this.options.grabClass, "mousedown" === e.type), this.speed(0), this._drag.time = (new Date).getTime(), this._drag.target = t(e.target), this._drag.stage.start = i, this._drag.stage.current = i, this._drag.pointer = this.pointer(e), t(n).on("mouseup.owl.core touchend.owl.core", t.proxy(this.onDragEnd, this)), t(n).one("mousemove.owl.core touchmove.owl.core", t.proxy((function(e) {
                    var i = this.difference(this._drag.pointer, this.pointer(e));
                    t(n).on("mousemove.owl.core touchmove.owl.core", t.proxy(this.onDragMove, this)),
                    Math.abs(i.x) < Math.abs(i.y) && this.is("valid") || (e.preventDefault(), this.enter("dragging"), this.trigger("drag"))
                }), this)))
            },
            s.prototype.onDragMove = function(t) {
                var e = null,
                    n = null,
                    i = null,
                    r = this.difference(this._drag.pointer, this.pointer(t)),
                    s = this.difference(this._drag.stage.start, r);
                this.is("dragging") && (t.preventDefault(), this.settings.loop ? (e = this.coordinates(this.minimum()), n = this.coordinates(this.maximum() + 1) - e, s.x = ((s.x - e) % n + n) % n + e) : (e = this.settings.rtl ? this.coordinates(this.maximum()) : this.coordinates(this.minimum()), n = this.settings.rtl ? this.coordinates(this.minimum()) : this.coordinates(this.maximum()), i = this.settings.pullDrag ? -1 * r.x / 5 : 0, s.x = Math.max(Math.min(s.x, e + i), n + i)), this._drag.stage.current = s, this.animate(s.x))
            },
            s.prototype.onDragEnd = function(e) {
                var i = this.difference(this._drag.pointer, this.pointer(e)),
                    r = this._drag.stage.current,
                    s = i.x > 0 ^ this.settings.rtl ? "left" : "right";
                t(n).off(".owl.core"),
                this.$element.removeClass(this.options.grabClass),
                (0 !== i.x && this.is("dragging") || !this.is("valid")) && (this.speed(this.settings.dragEndSpeed || this.settings.smartSpeed), this.current(this.closest(r.x, 0 !== i.x ? s : this._drag.direction)), this.invalidate("position"), this.update(), this._drag.direction = s, (Math.abs(i.x) > 3 || (new Date).getTime() - this._drag.time > 300) && this._drag.target.one("click.owl.core", (function() {
                    return !1
                }))),
                this.is("dragging") && (this.leave("dragging"), this.trigger("dragged"))
            },
            s.prototype.closest = function(e, n) {
                var i = -1,
                    s = this.width(),
                    o = this.coordinates();
                return this.settings.freeDrag || t.each(o, t.proxy((function(t, a) {
                    return "left" === n && e > a - 30 && e < a + 30 ? i = t : "right" === n && e > a - s - 30 && e < a - s + 30 ? i = t + 1 : this.op(e, "<", a) && this.op(e, ">", o[t + 1] !== r ? o[t + 1] : a - s) && (i = "left" === n ? t + 1 : t), -1 === i
                }), this)), this.settings.loop || (this.op(e, ">", o[this.minimum()]) ? i = e = this.minimum() : this.op(e, "<", o[this.maximum()]) && (i = e = this.maximum())), i
            },
            s.prototype.animate = function(e) {
                var n = this.speed() > 0;
                this.is("animating") && this.onTransitionEnd(),
                n && (this.enter("animating"), this.trigger("translate")),
                t.support.transform3d && t.support.transition ? this.$stage.css({
                    transform: "translate3d(" + e + "px,0px,0px)",
                    transition: this.speed() / 1e3 + "s" + (this.settings.slideTransition ? " " + this.settings.slideTransition : "")
                }) : n ? this.$stage.animate({
                    left: e + "px"
                }, this.speed(), this.settings.fallbackEasing, t.proxy(this.onTransitionEnd, this)) : this.$stage.css({
                    left: e + "px"
                })
            },
            s.prototype.is = function(t) {
                return this._states.current[t] && this._states.current[t] > 0
            },
            s.prototype.current = function(t) {
                if (t === r)
                    return this._current;
                if (0 === this._items.length)
                    return r;
                if (t = this.normalize(t), this._current !== t) {
                    var e = this.trigger("change", {
                        property: {
                            name: "position",
                            value: t
                        }
                    });
                    e.data !== r && (t = this.normalize(e.data)),
                    this._current = t,
                    this.invalidate("position"),
                    this.trigger("changed", {
                        property: {
                            name: "position",
                            value: this._current
                        }
                    })
                }
                return this._current
            },
            s.prototype.invalidate = function(e) {
                return "string" === t.type(e) && (this._invalidated[e] = !0, this.is("valid") && this.leave("valid")), t.map(this._invalidated, (function(t, e) {
                    return e
                }))
            },
            s.prototype.reset = function(t) {
                (t = this.normalize(t)) !== r && (this._speed = 0, this._current = t, this.suppress(["translate", "translated"]), this.animate(this.coordinates(t)), this.release(["translate", "translated"]))
            },
            s.prototype.normalize = function(t, e) {
                var n = this._items.length,
                    i = e ? 0 : this._clones.length;
                return !this.isNumeric(t) || n < 1 ? t = r : (t < 0 || t >= n + i) && (t = ((t - i / 2) % n + n) % n + i / 2), t
            },
            s.prototype.relative = function(t) {
                return t -= this._clones.length / 2, this.normalize(t, !0)
            },
            s.prototype.maximum = function(t) {
                var e,
                    n,
                    i,
                    r = this.settings,
                    s = this._coordinates.length;
                if (r.loop)
                    s = this._clones.length / 2 + this._items.length - 1;
                else if (r.autoWidth || r.merge) {
                    if (e = this._items.length)
                        for (n = this._items[--e].width(), i = this.$element.width(); e-- && !((n += this._items[e].width() + this.settings.margin) > i);)
                            ;
                    s = e + 1
                } else
                    s = r.center ? this._items.length - 1 : this._items.length - r.items;
                return t && (s -= this._clones.length / 2), Math.max(s, 0)
            },
            s.prototype.minimum = function(t) {
                return t ? 0 : this._clones.length / 2
            },
            s.prototype.items = function(t) {
                return t === r ? this._items.slice() : (t = this.normalize(t, !0), this._items[t])
            },
            s.prototype.mergers = function(t) {
                return t === r ? this._mergers.slice() : (t = this.normalize(t, !0), this._mergers[t])
            },
            s.prototype.clones = function(e) {
                var n = this._clones.length / 2,
                    i = n + this._items.length,
                    s = function(t) {
                        return t % 2 == 0 ? i + t / 2 : n - (t + 1) / 2
                    };
                return e === r ? t.map(this._clones, (function(t, e) {
                    return s(e)
                })) : t.map(this._clones, (function(t, n) {
                    return t === e ? s(n) : null
                }))
            },
            s.prototype.speed = function(t) {
                return t !== r && (this._speed = t), this._speed
            },
            s.prototype.coordinates = function(e) {
                var n,
                    i = 1,
                    s = e - 1;
                return e === r ? t.map(this._coordinates, t.proxy((function(t, e) {
                    return this.coordinates(e)
                }), this)) : (this.settings.center ? (this.settings.rtl && (i = -1, s = e + 1), n = this._coordinates[e], n += (this.width() - n + (this._coordinates[s] || 0)) / 2 * i) : n = this._coordinates[s] || 0, n = Math.ceil(n))
            },
            s.prototype.duration = function(t, e, n) {
                return 0 === n ? 0 : Math.min(Math.max(Math.abs(e - t), 1), 6) * Math.abs(n || this.settings.smartSpeed)
            },
            s.prototype.to = function(t, e) {
                var n = this.current(),
                    i = null,
                    r = t - this.relative(n),
                    s = (r > 0) - (r < 0),
                    o = this._items.length,
                    a = this.minimum(),
                    l = this.maximum();
                this.settings.loop ? (!this.settings.rewind && Math.abs(r) > o / 2 && (r += -1 * s * o), (i = (((t = n + r) - a) % o + o) % o + a) !== t && i - r <= l && i - r > 0 && (n = i - r, t = i, this.reset(n))) : t = this.settings.rewind ? (t % (l += 1) + l) % l : Math.max(a, Math.min(l, t)),
                this.speed(this.duration(n, t, e)),
                this.current(t),
                this.isVisible() && this.update()
            },
            s.prototype.next = function(t) {
                t = t || !1,
                this.to(this.relative(this.current()) + 1, t)
            },
            s.prototype.prev = function(t) {
                t = t || !1,
                this.to(this.relative(this.current()) - 1, t)
            },
            s.prototype.onTransitionEnd = function(t) {
                if (t !== r && (t.stopPropagation(), (t.target || t.srcElement || t.originalTarget) !== this.$stage.get(0)))
                    return !1;
                this.leave("animating"),
                this.trigger("translated")
            },
            s.prototype.viewport = function() {
                var i;
                return this.options.responsiveBaseElement !== e ? i = t(this.options.responsiveBaseElement).width() : e.innerWidth ? i = e.innerWidth : n.documentElement && n.documentElement.clientWidth ? i = n.documentElement.clientWidth : console.warn("Can not detect viewport width."), i
            },
            s.prototype.replace = function(e) {
                this.$stage.empty(),
                this._items = [],
                e && (e = e instanceof i ? e : t(e)),
                this.settings.nestedItemSelector && (e = e.find("." + this.settings.nestedItemSelector)),
                e.filter((function() {
                    return 1 === this.nodeType
                })).each(t.proxy((function(t, e) {
                    e = this.prepare(e),
                    this.$stage.append(e),
                    this._items.push(e),
                    this._mergers.push(1 * e.find("[data-merge]").addBack("[data-merge]").attr("data-merge") || 1)
                }), this)),
                this.reset(this.isNumeric(this.settings.startPosition) ? this.settings.startPosition : 0),
                this.invalidate("items")
            },
            s.prototype.add = function(e, n) {
                var s = this.relative(this._current);
                n = n === r ? this._items.length : this.normalize(n, !0),
                e = e instanceof i ? e : t(e),
                this.trigger("add", {
                    content: e,
                    position: n
                }),
                e = this.prepare(e),
                0 === this._items.length || n === this._items.length ? (0 === this._items.length && this.$stage.append(e), 0 !== this._items.length && this._items[n - 1].after(e), this._items.push(e), this._mergers.push(1 * e.find("[data-merge]").addBack("[data-merge]").attr("data-merge") || 1)) : (this._items[n].before(e), this._items.splice(n, 0, e), this._mergers.splice(n, 0, 1 * e.find("[data-merge]").addBack("[data-merge]").attr("data-merge") || 1)),
                this._items[s] && this.reset(this._items[s].index()),
                this.invalidate("items"),
                this.trigger("added", {
                    content: e,
                    position: n
                })
            },
            s.prototype.remove = function(t) {
                (t = this.normalize(t, !0)) !== r && (this.trigger("remove", {
                    content: this._items[t],
                    position: t
                }), this._items[t].remove(), this._items.splice(t, 1), this._mergers.splice(t, 1), this.invalidate("items"), this.trigger("removed", {
                    content: null,
                    position: t
                }))
            },
            s.prototype.preloadAutoWidthImages = function(e) {
                e.each(t.proxy((function(e, n) {
                    this.enter("pre-loading"),
                    n = t(n),
                    t(new Image).one("load", t.proxy((function(t) {
                        n.attr("src", t.target.src),
                        n.css("opacity", 1),
                        this.leave("pre-loading"),
                        !this.is("pre-loading") && !this.is("initializing") && this.refresh()
                    }), this)).attr("src", n.attr("src") || n.attr("data-src") || n.attr("data-src-retina"))
                }), this))
            },
            s.prototype.destroy = function() {
                for (var i in this.$element.off(".owl.core"), this.$stage.off(".owl.core"), t(n).off(".owl.core"), !1 !== this.settings.responsive && (e.clearTimeout(this.resizeTimer), this.off(e, "resize", this._handlers.onThrottledResize)), this._plugins)
                    this._plugins[i].destroy();
                this.$stage.children(".cloned").remove(),
                this.$stage.unwrap(),
                this.$stage.children().contents().unwrap(),
                this.$stage.children().unwrap(),
                this.$stage.remove(),
                this.$element.removeClass(this.options.refreshClass).removeClass(this.options.loadingClass).removeClass(this.options.loadedClass).removeClass(this.options.rtlClass).removeClass(this.options.dragClass).removeClass(this.options.grabClass).attr("class", this.$element.attr("class").replace(new RegExp(this.options.responsiveClass + "-\\S+\\s", "g"), "")).removeData("owl.carousel")
            },
            s.prototype.op = function(t, e, n) {
                var i = this.settings.rtl;
                switch (e) {
                case "<":
                    return i ? t > n : t < n;
                case ">":
                    return i ? t < n : t > n;
                case ">=":
                    return i ? t <= n : t >= n;
                case "<=":
                    return i ? t >= n : t <= n
                }
            },
            s.prototype.on = function(t, e, n, i) {
                t.addEventListener ? t.addEventListener(e, n, i) : t.attachEvent && t.attachEvent("on" + e, n)
            },
            s.prototype.off = function(t, e, n, i) {
                t.removeEventListener ? t.removeEventListener(e, n, i) : t.detachEvent && t.detachEvent("on" + e, n)
            },
            s.prototype.trigger = function(e, n, i, r, o) {
                var a = {
                        item: {
                            count: this._items.length,
                            index: this.current()
                        }
                    },
                    l = t.camelCase(t.grep(["on", e, i], (function(t) {
                        return t
                    })).join("-").toLowerCase()),
                    u = t.Event([e, "owl", i || "carousel"].join(".").toLowerCase(), t.extend({
                        relatedTarget: this
                    }, a, n));
                return this._supress[e] || (t.each(this._plugins, (function(t, e) {
                    e.onTrigger && e.onTrigger(u)
                })), this.register({
                    type: s.Type.Event,
                    name: e
                }), this.$element.trigger(u), this.settings && "function" == typeof this.settings[l] && this.settings[l].call(this, u)), u
            },
            s.prototype.enter = function(e) {
                t.each([e].concat(this._states.tags[e] || []), t.proxy((function(t, e) {
                    this._states.current[e] === r && (this._states.current[e] = 0),
                    this._states.current[e]++
                }), this))
            },
            s.prototype.leave = function(e) {
                t.each([e].concat(this._states.tags[e] || []), t.proxy((function(t, e) {
                    this._states.current[e]--
                }), this))
            },
            s.prototype.register = function(e) {
                if (e.type === s.Type.Event) {
                    if (t.event.special[e.name] || (t.event.special[e.name] = {}), !t.event.special[e.name].owl) {
                        var n = t.event.special[e.name]._default;
                        t.event.special[e.name]._default = function(t) {
                            return !n || !n.apply || t.namespace && -1 !== t.namespace.indexOf("owl") ? t.namespace && t.namespace.indexOf("owl") > -1 : n.apply(this, arguments)
                        },
                        t.event.special[e.name].owl = !0
                    }
                } else
                    e.type === s.Type.State && (this._states.tags[e.name] ? this._states.tags[e.name] = this._states.tags[e.name].concat(e.tags) : this._states.tags[e.name] = e.tags, this._states.tags[e.name] = t.grep(this._states.tags[e.name], t.proxy((function(n, i) {
                        return t.inArray(n, this._states.tags[e.name]) === i
                    }), this)))
            },
            s.prototype.suppress = function(e) {
                t.each(e, t.proxy((function(t, e) {
                    this._supress[e] = !0
                }), this))
            },
            s.prototype.release = function(e) {
                t.each(e, t.proxy((function(t, e) {
                    delete this._supress[e]
                }), this))
            },
            s.prototype.pointer = function(t) {
                var n = {
                    x: null,
                    y: null
                };
                return (t = (t = t.originalEvent || t || e.event).touches && t.touches.length ? t.touches[0] : t.changedTouches && t.changedTouches.length ? t.changedTouches[0] : t).pageX ? (n.x = t.pageX, n.y = t.pageY) : (n.x = t.clientX, n.y = t.clientY), n
            },
            s.prototype.isNumeric = function(t) {
                return !isNaN(parseFloat(t))
            },
            s.prototype.difference = function(t, e) {
                return {
                    x: t.x - e.x,
                    y: t.y - e.y
                }
            },
            t.fn.owlCarousel = function(e) {
                var n = Array.prototype.slice.call(arguments, 1);
                return this.each((function() {
                    var i = t(this),
                        r = i.data("owl.carousel");
                    r || (r = new s(this, "object" == typeof e && e), i.data("owl.carousel", r), t.each(["next", "prev", "to", "destroy", "refresh", "replace", "add", "remove"], (function(e, n) {
                        r.register({
                            type: s.Type.Event,
                            name: n
                        }),
                        r.$element.on(n + ".owl.carousel.core", t.proxy((function(t) {
                            t.namespace && t.relatedTarget !== this && (this.suppress([n]), r[n].apply(this, [].slice.call(arguments, 1)), this.release([n]))
                        }), r))
                    }))),
                    "string" == typeof e && "_" !== e.charAt(0) && r[e].apply(r, n)
                }))
            },
            t.fn.owlCarousel.Constructor = s
        }(window.Zepto || r, window, document),
        function(t, e, n, i) {
            var r = function(e) {
                this._core = e,
                this._interval = null,
                this._visible = null,
                this._handlers = {
                    "initialized.owl.carousel": t.proxy((function(t) {
                        t.namespace && this._core.settings.autoRefresh && this.watch()
                    }), this)
                },
                this._core.options = t.extend({}, r.Defaults, this._core.options),
                this._core.$element.on(this._handlers)
            };
            r.Defaults = {
                autoRefresh: !0,
                autoRefreshInterval: 500
            },
            r.prototype.watch = function() {
                this._interval || (this._visible = this._core.isVisible(), this._interval = e.setInterval(t.proxy(this.refresh, this), this._core.settings.autoRefreshInterval))
            },
            r.prototype.refresh = function() {
                this._core.isVisible() !== this._visible && (this._visible = !this._visible, this._core.$element.toggleClass("owl-hidden", !this._visible), this._visible && this._core.invalidate("width") && this._core.refresh())
            },
            r.prototype.destroy = function() {
                var t,
                    n;
                for (t in e.clearInterval(this._interval), this._handlers)
                    this._core.$element.off(t, this._handlers[t]);
                for (n in Object.getOwnPropertyNames(this))
                    "function" != typeof this[n] && (this[n] = null)
            },
            t.fn.owlCarousel.Constructor.Plugins.AutoRefresh = r
        }(window.Zepto || r, window, document),
        function(t, e, n, i) {
            var r = function(e) {
                this._core = e,
                this._loaded = [],
                this._handlers = {
                    "initialized.owl.carousel change.owl.carousel resized.owl.carousel": t.proxy((function(e) {
                        if (e.namespace && this._core.settings && this._core.settings.lazyLoad && (e.property && "position" == e.property.name || "initialized" == e.type)) {
                            var n = this._core.settings,
                                i = n.center && Math.ceil(n.items / 2) || n.items,
                                r = n.center && -1 * i || 0,
                                s = (e.property && undefined !== e.property.value ? e.property.value : this._core.current()) + r,
                                o = this._core.clones().length,
                                a = t.proxy((function(t, e) {
                                    this.load(e)
                                }), this);
                            for (n.lazyLoadEager > 0 && (i += n.lazyLoadEager, n.loop && (s -= n.lazyLoadEager, i++)); r++ < i;)
                                this.load(o / 2 + this._core.relative(s)),
                                o && t.each(this._core.clones(this._core.relative(s)), a),
                                s++
                        }
                    }), this)
                },
                this._core.options = t.extend({}, r.Defaults, this._core.options),
                this._core.$element.on(this._handlers)
            };
            r.Defaults = {
                lazyLoad: !1,
                lazyLoadEager: 0
            },
            r.prototype.load = function(n) {
                var i = this._core.$stage.children().eq(n),
                    r = i && i.find(".owl-lazy");
                !r || t.inArray(i.get(0), this._loaded) > -1 || (r.each(t.proxy((function(n, i) {
                    var r,
                        s = t(i),
                        o = e.devicePixelRatio > 1 && s.attr("data-src-retina") || s.attr("data-src") || s.attr("data-srcset");
                    this._core.trigger("load", {
                        element: s,
                        url: o
                    }, "lazy"),
                    s.is("img") ? s.one("load.owl.lazy", t.proxy((function() {
                        s.css("opacity", 1),
                        this._core.trigger("loaded", {
                            element: s,
                            url: o
                        }, "lazy")
                    }), this)).attr("src", o) : s.is("source") ? s.one("load.owl.lazy", t.proxy((function() {
                        this._core.trigger("loaded", {
                            element: s,
                            url: o
                        }, "lazy")
                    }), this)).attr("srcset", o) : ((r = new Image).onload = t.proxy((function() {
                        s.css({
                            "background-image": 'url("' + o + '")',
                            opacity: "1"
                        }),
                        this._core.trigger("loaded", {
                            element: s,
                            url: o
                        }, "lazy")
                    }), this), r.src = o)
                }), this)), this._loaded.push(i.get(0)))
            },
            r.prototype.destroy = function() {
                var t,
                    e;
                for (t in this.handlers)
                    this._core.$element.off(t, this.handlers[t]);
                for (e in Object.getOwnPropertyNames(this))
                    "function" != typeof this[e] && (this[e] = null)
            },
            t.fn.owlCarousel.Constructor.Plugins.Lazy = r
        }(window.Zepto || r, window, document),
        function(t, e, n, i) {
            var r = function(n) {
                this._core = n,
                this._previousHeight = null,
                this._handlers = {
                    "initialized.owl.carousel refreshed.owl.carousel": t.proxy((function(t) {
                        t.namespace && this._core.settings.autoHeight && this.update()
                    }), this),
                    "changed.owl.carousel": t.proxy((function(t) {
                        t.namespace && this._core.settings.autoHeight && "position" === t.property.name && this.update()
                    }), this),
                    "loaded.owl.lazy": t.proxy((function(t) {
                        t.namespace && this._core.settings.autoHeight && t.element.closest("." + this._core.settings.itemClass).index() === this._core.current() && this.update()
                    }), this)
                },
                this._core.options = t.extend({}, r.Defaults, this._core.options),
                this._core.$element.on(this._handlers),
                this._intervalId = null;
                var i = this;
                t(e).on("load", (function() {
                    i._core.settings.autoHeight && i.update()
                })),
                t(e).resize((function() {
                    i._core.settings.autoHeight && (null != i._intervalId && clearTimeout(i._intervalId), i._intervalId = setTimeout((function() {
                        i.update()
                    }), 250))
                }))
            };
            r.Defaults = {
                autoHeight: !1,
                autoHeightClass: "owl-height"
            },
            r.prototype.update = function() {
                var e = this._core._current,
                    n = e + this._core.settings.items,
                    i = this._core.settings.lazyLoad,
                    r = this._core.$stage.children().toArray().slice(e, n),
                    s = [],
                    o = 0;
                t.each(r, (function(e, n) {
                    s.push(t(n).height())
                })),
                (o = Math.max.apply(null, s)) <= 1 && i && this._previousHeight && (o = this._previousHeight),
                this._previousHeight = o,
                this._core.$stage.parent().height(o).addClass(this._core.settings.autoHeightClass)
            },
            r.prototype.destroy = function() {
                var t,
                    e;
                for (t in this._handlers)
                    this._core.$element.off(t, this._handlers[t]);
                for (e in Object.getOwnPropertyNames(this))
                    "function" != typeof this[e] && (this[e] = null)
            },
            t.fn.owlCarousel.Constructor.Plugins.AutoHeight = r
        }(window.Zepto || r, window, document),
        function(t, e, n, i) {
            var r = function(e) {
                this._core = e,
                this._videos = {},
                this._playing = null,
                this._handlers = {
                    "initialized.owl.carousel": t.proxy((function(t) {
                        t.namespace && this._core.register({
                            type: "state",
                            name: "playing",
                            tags: ["interacting"]
                        })
                    }), this),
                    "resize.owl.carousel": t.proxy((function(t) {
                        t.namespace && this._core.settings.video && this.isInFullScreen() && t.preventDefault()
                    }), this),
                    "refreshed.owl.carousel": t.proxy((function(t) {
                        t.namespace && this._core.is("resizing") && this._core.$stage.find(".cloned .owl-video-frame").remove()
                    }), this),
                    "changed.owl.carousel": t.proxy((function(t) {
                        t.namespace && "position" === t.property.name && this._playing && this.stop()
                    }), this),
                    "prepared.owl.carousel": t.proxy((function(e) {
                        if (e.namespace) {
                            var n = t(e.content).find(".owl-video");
                            n.length && (n.css("display", "none"), this.fetch(n, t(e.content)))
                        }
                    }), this)
                },
                this._core.options = t.extend({}, r.Defaults, this._core.options),
                this._core.$element.on(this._handlers),
                this._core.$element.on("click.owl.video", ".owl-video-play-icon", t.proxy((function(t) {
                    this.play(t)
                }), this))
            };
            r.Defaults = {
                video: !1,
                videoHeight: !1,
                videoWidth: !1
            },
            r.prototype.fetch = function(t, e) {
                var n = t.attr("data-vimeo-id") ? "vimeo" : t.attr("data-vzaar-id") ? "vzaar" : "youtube",
                    i = t.attr("data-vimeo-id") || t.attr("data-youtube-id") || t.attr("data-vzaar-id"),
                    r = t.attr("data-width") || this._core.settings.videoWidth,
                    s = t.attr("data-height") || this._core.settings.videoHeight,
                    o = t.attr("href");
                if (!o)
                    throw new Error("Missing video URL.");
                if ((i = o.match(/(http:|https:|)\/\/(player.|www.|app.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com|be\-nocookie\.com)|vzaar\.com)\/(video\/|videos\/|embed\/|channels\/.+\/|groups\/.+\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/))[3].indexOf("youtu") > -1)
                    n = "youtube";
                else if (i[3].indexOf("vimeo") > -1)
                    n = "vimeo";
                else {
                    if (!(i[3].indexOf("vzaar") > -1))
                        throw new Error("Video URL not supported.");
                    n = "vzaar"
                }
                i = i[6],
                this._videos[o] = {
                    type: n,
                    id: i,
                    width: r,
                    height: s
                },
                e.attr("data-video", o),
                this.thumbnail(t, this._videos[o])
            },
            r.prototype.thumbnail = function(e, n) {
                var i,
                    r,
                    s = n.width && n.height ? "width:" + n.width + "px;height:" + n.height + "px;" : "",
                    o = e.find("img"),
                    a = "src",
                    l = "",
                    u = this._core.settings,
                    c = function(n) {
                        '<div class="owl-video-play-icon"></div>',
                        i = u.lazyLoad ? t("<div/>", {
                            class: "owl-video-tn " + l,
                            srcType: n
                        }) : t("<div/>", {
                            class: "owl-video-tn",
                            style: "opacity:1;background-image:url(" + n + ")"
                        }),
                        e.after(i),
                        e.after('<div class="owl-video-play-icon"></div>')
                    };
                if (e.wrap(t("<div/>", {
                    class: "owl-video-wrapper",
                    style: s
                })), this._core.settings.lazyLoad && (a = "data-src", l = "owl-lazy"), o.length)
                    return c(o.attr(a)), o.remove(), !1;
                "youtube" === n.type ? (r = "//img.youtube.com/vi/" + n.id + "/hqdefault.jpg", c(r)) : "vimeo" === n.type ? t.ajax({
                    type: "GET",
                    url: "//vimeo.com/api/v2/video/" + n.id + ".json",
                    jsonp: "callback",
                    dataType: "jsonp",
                    success: function(t) {
                        r = t[0].thumbnail_large,
                        c(r)
                    }
                }) : "vzaar" === n.type && t.ajax({
                    type: "GET",
                    url: "//vzaar.com/api/videos/" + n.id + ".json",
                    jsonp: "callback",
                    dataType: "jsonp",
                    success: function(t) {
                        r = t.framegrab_url,
                        c(r)
                    }
                })
            },
            r.prototype.stop = function() {
                this._core.trigger("stop", null, "video"),
                this._playing.find(".owl-video-frame").remove(),
                this._playing.removeClass("owl-video-playing"),
                this._playing = null,
                this._core.leave("playing"),
                this._core.trigger("stopped", null, "video")
            },
            r.prototype.play = function(e) {
                var n,
                    i = t(e.target).closest("." + this._core.settings.itemClass),
                    r = this._videos[i.attr("data-video")],
                    s = r.width || "100%",
                    o = r.height || this._core.$stage.height();
                this._playing || (this._core.enter("playing"), this._core.trigger("play", null, "video"), i = this._core.items(this._core.relative(i.index())), this._core.reset(i.index()), (n = t('<iframe frameborder="0" allowfullscreen mozallowfullscreen webkitAllowFullScreen ></iframe>')).attr("height", o), n.attr("width", s), "youtube" === r.type ? n.attr("src", "//www.youtube.com/embed/" + r.id + "?autoplay=1&rel=0&v=" + r.id) : "vimeo" === r.type ? n.attr("src", "//player.vimeo.com/video/" + r.id + "?autoplay=1") : "vzaar" === r.type && n.attr("src", "//view.vzaar.com/" + r.id + "/player?autoplay=true"), t(n).wrap('<div class="owl-video-frame" />').insertAfter(i.find(".owl-video")), this._playing = i.addClass("owl-video-playing"))
            },
            r.prototype.isInFullScreen = function() {
                var e = n.fullscreenElement || n.mozFullScreenElement || n.webkitFullscreenElement;
                return e && t(e).parent().hasClass("owl-video-frame")
            },
            r.prototype.destroy = function() {
                var t,
                    e;
                for (t in this._core.$element.off("click.owl.video"), this._handlers)
                    this._core.$element.off(t, this._handlers[t]);
                for (e in Object.getOwnPropertyNames(this))
                    "function" != typeof this[e] && (this[e] = null)
            },
            t.fn.owlCarousel.Constructor.Plugins.Video = r
        }(window.Zepto || r, window, document),
        function(t, e, n, i) {
            var r = function(e) {
                this.core = e,
                this.core.options = t.extend({}, r.Defaults, this.core.options),
                this.swapping = !0,
                this.previous = i,
                this.next = i,
                this.handlers = {
                    "change.owl.carousel": t.proxy((function(t) {
                        t.namespace && "position" == t.property.name && (this.previous = this.core.current(), this.next = t.property.value)
                    }), this),
                    "drag.owl.carousel dragged.owl.carousel translated.owl.carousel": t.proxy((function(t) {
                        t.namespace && (this.swapping = "translated" == t.type)
                    }), this),
                    "translate.owl.carousel": t.proxy((function(t) {
                        t.namespace && this.swapping && (this.core.options.animateOut || this.core.options.animateIn) && this.swap()
                    }), this)
                },
                this.core.$element.on(this.handlers)
            };
            r.Defaults = {
                animateOut: !1,
                animateIn: !1
            },
            r.prototype.swap = function() {
                if (1 === this.core.settings.items && t.support.animation && t.support.transition) {
                    this.core.speed(0);
                    var e,
                        n = t.proxy(this.clear, this),
                        i = this.core.$stage.children().eq(this.previous),
                        r = this.core.$stage.children().eq(this.next),
                        s = this.core.settings.animateIn,
                        o = this.core.settings.animateOut;
                    this.core.current() !== this.previous && (o && (e = this.core.coordinates(this.previous) - this.core.coordinates(this.next), i.one(t.support.animation.end, n).css({
                        left: e + "px"
                    }).addClass("animated owl-animated-out").addClass(o)), s && r.one(t.support.animation.end, n).addClass("animated owl-animated-in").addClass(s))
                }
            },
            r.prototype.clear = function(e) {
                t(e.target).css({
                    left: ""
                }).removeClass("animated owl-animated-out owl-animated-in").removeClass(this.core.settings.animateIn).removeClass(this.core.settings.animateOut),
                this.core.onTransitionEnd()
            },
            r.prototype.destroy = function() {
                var t,
                    e;
                for (t in this.handlers)
                    this.core.$element.off(t, this.handlers[t]);
                for (e in Object.getOwnPropertyNames(this))
                    "function" != typeof this[e] && (this[e] = null)
            },
            t.fn.owlCarousel.Constructor.Plugins.Animate = r
        }(window.Zepto || r, window, document),
        function(t, e, n, i) {
            var r = function(e) {
                this._core = e,
                this._call = null,
                this._time = 0,
                this._timeout = 0,
                this._paused = !0,
                this._handlers = {
                    "changed.owl.carousel": t.proxy((function(t) {
                        t.namespace && "settings" === t.property.name ? this._core.settings.autoplay ? this.play() : this.stop() : t.namespace && "position" === t.property.name && this._paused && (this._time = 0)
                    }), this),
                    "initialized.owl.carousel": t.proxy((function(t) {
                        t.namespace && this._core.settings.autoplay && this.play()
                    }), this),
                    "play.owl.autoplay": t.proxy((function(t, e, n) {
                        t.namespace && this.play(e, n)
                    }), this),
                    "stop.owl.autoplay": t.proxy((function(t) {
                        t.namespace && this.stop()
                    }), this),
                    "mouseover.owl.autoplay": t.proxy((function() {
                        this._core.settings.autoplayHoverPause && this._core.is("rotating") && this.pause()
                    }), this),
                    "mouseleave.owl.autoplay": t.proxy((function() {
                        this._core.settings.autoplayHoverPause && this._core.is("rotating") && this.play()
                    }), this),
                    "touchstart.owl.core": t.proxy((function() {
                        this._core.settings.autoplayHoverPause && this._core.is("rotating") && this.pause()
                    }), this),
                    "touchend.owl.core": t.proxy((function() {
                        this._core.settings.autoplayHoverPause && this.play()
                    }), this)
                },
                this._core.$element.on(this._handlers),
                this._core.options = t.extend({}, r.Defaults, this._core.options)
            };
            r.Defaults = {
                autoplay: !1,
                autoplayTimeout: 5e3,
                autoplayHoverPause: !1,
                autoplaySpeed: !1
            },
            r.prototype._next = function(i) {
                this._call = e.setTimeout(t.proxy(this._next, this, i), this._timeout * (Math.round(this.read() / this._timeout) + 1) - this.read()),
                this._core.is("interacting") || n.hidden || this._core.next(i || this._core.settings.autoplaySpeed)
            },
            r.prototype.read = function() {
                return (new Date).getTime() - this._time
            },
            r.prototype.play = function(n, i) {
                var r;
                this._core.is("rotating") || this._core.enter("rotating"),
                n = n || this._core.settings.autoplayTimeout,
                r = Math.min(this._time % (this._timeout || n), n),
                this._paused ? (this._time = this.read(), this._paused = !1) : e.clearTimeout(this._call),
                this._time += this.read() % n - r,
                this._timeout = n,
                this._call = e.setTimeout(t.proxy(this._next, this, i), n - r)
            },
            r.prototype.stop = function() {
                this._core.is("rotating") && (this._time = 0, this._paused = !0, e.clearTimeout(this._call), this._core.leave("rotating"))
            },
            r.prototype.pause = function() {
                this._core.is("rotating") && !this._paused && (this._time = this.read(), this._paused = !0, e.clearTimeout(this._call))
            },
            r.prototype.destroy = function() {
                var t,
                    e;
                for (t in this.stop(), this._handlers)
                    this._core.$element.off(t, this._handlers[t]);
                for (e in Object.getOwnPropertyNames(this))
                    "function" != typeof this[e] && (this[e] = null)
            },
            t.fn.owlCarousel.Constructor.Plugins.autoplay = r
        }(window.Zepto || r, window, document),
        function(t, e, n, i) {
            "use strict";
            var r = function(e) {
                this._core = e,
                this._initialized = !1,
                this._pages = [],
                this._controls = {},
                this._templates = [],
                this.$element = this._core.$element,
                this._overrides = {
                    next: this._core.next,
                    prev: this._core.prev,
                    to: this._core.to
                },
                this._handlers = {
                    "prepared.owl.carousel": t.proxy((function(e) {
                        e.namespace && this._core.settings.dotsData && this._templates.push('<div class="' + this._core.settings.dotClass + '">' + t(e.content).find("[data-dot]").addBack("[data-dot]").attr("data-dot") + "</div>")
                    }), this),
                    "added.owl.carousel": t.proxy((function(t) {
                        t.namespace && this._core.settings.dotsData && this._templates.splice(t.position, 0, this._templates.pop())
                    }), this),
                    "remove.owl.carousel": t.proxy((function(t) {
                        t.namespace && this._core.settings.dotsData && this._templates.splice(t.position, 1)
                    }), this),
                    "changed.owl.carousel": t.proxy((function(t) {
                        t.namespace && "position" == t.property.name && this.draw()
                    }), this),
                    "initialized.owl.carousel": t.proxy((function(t) {
                        t.namespace && !this._initialized && (this._core.trigger("initialize", null, "navigation"), this.initialize(), this.update(), this.draw(), this._initialized = !0, this._core.trigger("initialized", null, "navigation"))
                    }), this),
                    "refreshed.owl.carousel": t.proxy((function(t) {
                        t.namespace && this._initialized && (this._core.trigger("refresh", null, "navigation"), this.update(), this.draw(), this._core.trigger("refreshed", null, "navigation"))
                    }), this)
                },
                this._core.options = t.extend({}, r.Defaults, this._core.options),
                this.$element.on(this._handlers)
            };
            r.Defaults = {
                nav: !1,
                navText: ['<span aria-label="Previous">&#x2039;</span>', '<span aria-label="Next">&#x203a;</span>'],
                navSpeed: !1,
                navElement: 'button type="button" role="presentation"',
                navContainer: !1,
                navContainerClass: "owl-nav",
                navClass: ["owl-prev", "owl-next"],
                slideBy: 1,
                dotClass: "owl-dot",
                dotsClass: "owl-dots",
                dots: !0,
                dotsEach: !1,
                dotsData: !1,
                dotsSpeed: !1,
                dotsContainer: !1
            },
            r.prototype.initialize = function() {
                var e,
                    n = this._core.settings;
                for (e in this._controls.$relative = (n.navContainer ? t(n.navContainer) : t("<div>").addClass(n.navContainerClass).appendTo(this.$element)).addClass("disabled"), this._controls.$previous = t("<" + n.navElement + ">").addClass(n.navClass[0]).html(n.navText[0]).prependTo(this._controls.$relative).on("click", t.proxy((function(t) {
                    this.prev(n.navSpeed)
                }), this)), this._controls.$next = t("<" + n.navElement + ">").addClass(n.navClass[1]).html(n.navText[1]).appendTo(this._controls.$relative).on("click", t.proxy((function(t) {
                    this.next(n.navSpeed)
                }), this)), n.dotsData || (this._templates = [t('<button role="button">').addClass(n.dotClass).append(t("<span>")).prop("outerHTML")]), this._controls.$absolute = (n.dotsContainer ? t(n.dotsContainer) : t("<div>").addClass(n.dotsClass).appendTo(this.$element)).addClass("disabled"), this._controls.$absolute.on("click", "button", t.proxy((function(e) {
                    var i = t(e.target).parent().is(this._controls.$absolute) ? t(e.target).index() : t(e.target).parent().index();
                    e.preventDefault(),
                    this.to(i, n.dotsSpeed)
                }), this)), this._overrides)
                    this._core[e] = t.proxy(this[e], this)
            },
            r.prototype.destroy = function() {
                var t,
                    e,
                    n,
                    i,
                    r;
                for (t in r = this._core.settings, this._handlers)
                    this.$element.off(t, this._handlers[t]);
                for (e in this._controls)
                    "$relative" === e && r.navContainer ? this._controls[e].html("") : this._controls[e].remove();
                for (i in this.overides)
                    this._core[i] = this._overrides[i];
                for (n in Object.getOwnPropertyNames(this))
                    "function" != typeof this[n] && (this[n] = null)
            },
            r.prototype.update = function() {
                var t,
                    e,
                    n = this._core.clones().length / 2,
                    i = n + this._core.items().length,
                    r = this._core.maximum(!0),
                    s = this._core.settings,
                    o = s.center || s.autoWidth || s.dotsData ? 1 : s.dotsEach || s.items;
                if ("page" !== s.slideBy && (s.slideBy = Math.min(s.slideBy, s.items)), s.dots || "page" == s.slideBy)
                    for (this._pages = [], t = n, e = 0, 0; t < i; t++) {
                        if (e >= o || 0 === e) {
                            if (this._pages.push({
                                start: Math.min(r, t - n),
                                end: t - n + o - 1
                            }), Math.min(r, t - n) === r)
                                break;
                            e = 0
                        }
                        e += this._core.mergers(this._core.relative(t))
                    }
            },
            r.prototype.draw = function() {
                var e,
                    n = this._core.settings,
                    i = this._core.items().length <= n.items,
                    r = this._core.relative(this._core.current()),
                    s = n.loop || n.rewind;
                this._controls.$relative.toggleClass("disabled", !n.nav || i),
                n.nav && (this._controls.$previous.toggleClass("disabled", !s && r <= this._core.minimum(!0)), this._controls.$next.toggleClass("disabled", !s && r >= this._core.maximum(!0))),
                this._controls.$absolute.toggleClass("disabled", !n.dots || i),
                n.dots && (e = this._pages.length - this._controls.$absolute.children().length, n.dotsData && 0 !== e ? this._controls.$absolute.html(this._templates.join("")) : e > 0 ? this._controls.$absolute.append(new Array(e + 1).join(this._templates[0])) : e < 0 && this._controls.$absolute.children().slice(e).remove(), this._controls.$absolute.find(".active").removeClass("active"), this._controls.$absolute.children().eq(t.inArray(this.current(), this._pages)).addClass("active"))
            },
            r.prototype.onTrigger = function(e) {
                var n = this._core.settings;
                e.page = {
                    index: t.inArray(this.current(), this._pages),
                    count: this._pages.length,
                    size: n && (n.center || n.autoWidth || n.dotsData ? 1 : n.dotsEach || n.items)
                }
            },
            r.prototype.current = function() {
                var e = this._core.relative(this._core.current());
                return t.grep(this._pages, t.proxy((function(t, n) {
                    return t.start <= e && t.end >= e
                }), this)).pop()
            },
            r.prototype.getPosition = function(e) {
                var n,
                    i,
                    r = this._core.settings;
                return "page" == r.slideBy ? (n = t.inArray(this.current(), this._pages), i = this._pages.length, e ? ++n : --n, n = this._pages[(n % i + i) % i].start) : (n = this._core.relative(this._core.current()), i = this._core.items().length, e ? n += r.slideBy : n -= r.slideBy), n
            },
            r.prototype.next = function(e) {
                t.proxy(this._overrides.to, this._core)(this.getPosition(!0), e)
            },
            r.prototype.prev = function(e) {
                t.proxy(this._overrides.to, this._core)(this.getPosition(!1), e)
            },
            r.prototype.to = function(e, n, i) {
                var r;
                !i && this._pages.length ? (r = this._pages.length, t.proxy(this._overrides.to, this._core)(this._pages[(e % r + r) % r].start, n)) : t.proxy(this._overrides.to, this._core)(e, n)
            },
            t.fn.owlCarousel.Constructor.Plugins.Navigation = r
        }(window.Zepto || r, window, document),
        function(t, e, n, i) {
            "use strict";
            var r = function(n) {
                this._core = n,
                this._hashes = {},
                this.$element = this._core.$element,
                this._handlers = {
                    "initialized.owl.carousel": t.proxy((function(n) {
                        n.namespace && "URLHash" === this._core.settings.startPosition && t(e).trigger("hashchange.owl.navigation")
                    }), this),
                    "prepared.owl.carousel": t.proxy((function(e) {
                        if (e.namespace) {
                            var n = t(e.content).find("[data-hash]").addBack("[data-hash]").attr("data-hash");
                            if (!n)
                                return;
                            this._hashes[n] = e.content
                        }
                    }), this),
                    "changed.owl.carousel": t.proxy((function(n) {
                        if (n.namespace && "position" === n.property.name) {
                            var i = this._core.items(this._core.relative(this._core.current())),
                                r = t.map(this._hashes, (function(t, e) {
                                    return t === i ? e : null
                                })).join();
                            if (!r || e.location.hash.slice(1) === r)
                                return;
                            e.location.hash = r
                        }
                    }), this)
                },
                this._core.options = t.extend({}, r.Defaults, this._core.options),
                this.$element.on(this._handlers),
                t(e).on("hashchange.owl.navigation", t.proxy((function(t) {
                    var n = e.location.hash.substring(1),
                        i = this._core.$stage.children(),
                        r = this._hashes[n] && i.index(this._hashes[n]);
                    undefined !== r && r !== this._core.current() && this._core.to(this._core.relative(r), !1, !0)
                }), this))
            };
            r.Defaults = {
                URLhashListener: !1
            },
            r.prototype.destroy = function() {
                var n,
                    i;
                for (n in t(e).off("hashchange.owl.navigation"), this._handlers)
                    this._core.$element.off(n, this._handlers[n]);
                for (i in Object.getOwnPropertyNames(this))
                    "function" != typeof this[i] && (this[i] = null)
            },
            t.fn.owlCarousel.Constructor.Plugins.Hash = r
        }(window.Zepto || r, window, document),
        function(t, e, n, i) {
            var r = t("<support>").get(0).style,
                s = "Webkit Moz O ms".split(" "),
                o = {
                    transition: {
                        end: {
                            WebkitTransition: "webkitTransitionEnd",
                            MozTransition: "transitionend",
                            OTransition: "oTransitionEnd",
                            transition: "transitionend"
                        }
                    },
                    animation: {
                        end: {
                            WebkitAnimation: "webkitAnimationEnd",
                            MozAnimation: "animationend",
                            OAnimation: "oAnimationEnd",
                            animation: "animationend"
                        }
                    }
                },
                a = function() {
                    return !!c("transform")
                },
                l = function() {
                    return !!c("perspective")
                },
                u = function() {
                    return !!c("animation")
                };
            function c(e, n) {
                var i = !1,
                    o = e.charAt(0).toUpperCase() + e.slice(1);
                return t.each((e + " " + s.join(o + " ") + o).split(" "), (function(t, e) {
                    if (undefined !== r[e])
                        return i = !n || e, !1
                })), i
            }
            function h(t) {
                return c(t, !0)
            }
            (function() {
                return !!c("transition")
            })() && (t.support.transition = new String(h("transition")), t.support.transition.end = o.transition.end[t.support.transition]),
            u() && (t.support.animation = new String(h("animation")), t.support.animation.end = o.animation.end[t.support.animation]),
            a() && (t.support.transform = new String(h("transform")), t.support.transform3d = l())
        }(window.Zepto || r, window, document)
    },
    295: function(t, e, n) {
        var i = n(755);
        t.exports = function(t) {
            "use strict";
            function e(t) {
                return e = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
                    return typeof t
                } : function(t) {
                    return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
                }, e(t)
            }
            function r() {
                return r = Object.assign || function(t) {
                    for (var e = 1; e < arguments.length; e++) {
                        var n = arguments[e];
                        for (var i in n)
                            Object.prototype.hasOwnProperty.call(n, i) && (t[i] = n[i])
                    }
                    return t
                }, r.apply(this, arguments)
            }
            function s(t, e) {
                return l(t) || c(t, e) || d()
            }
            function o(t) {
                return a(t) || u(t) || h()
            }
            function a(t) {
                if (Array.isArray(t)) {
                    for (var e = 0, n = new Array(t.length); e < t.length; e++)
                        n[e] = t[e];
                    return n
                }
            }
            function l(t) {
                if (Array.isArray(t))
                    return t
            }
            function u(t) {
                if (Symbol.iterator in Object(t) || "[object Arguments]" === Object.prototype.toString.call(t))
                    return Array.from(t)
            }
            function c(t, e) {
                if (Symbol.iterator in Object(t) || "[object Arguments]" === Object.prototype.toString.call(t)) {
                    var n = [],
                        i = !0,
                        r = !1,
                        s = void 0;
                    try {
                        for (var o, a = t[Symbol.iterator](); !(i = (o = a.next()).done) && (n.push(o.value), !e || n.length !== e); i = !0)
                            ;
                    } catch (t) {
                        r = !0,
                        s = t
                    } finally {
                        try {
                            i || null == a.return || a.return()
                        } finally {
                            if (r)
                                throw s
                        }
                    }
                    return n
                }
            }
            function h() {
                throw new TypeError("Invalid attempt to spread non-iterable instance")
            }
            function d() {
                throw new TypeError("Invalid attempt to destructure non-iterable instance")
            }
            var f = 1,
                p = {},
                g = {
                    attr: function(t, e, n) {
                        var i,
                            r,
                            s,
                            o = new RegExp("^" + e, "i");
                        if (void 0 === n)
                            n = {};
                        else
                            for (i in n)
                                n.hasOwnProperty(i) && delete n[i];
                        if (!t)
                            return n;
                        for (i = (s = t.attributes).length; i--;)
                            (r = s[i]) && r.specified && o.test(r.name) && (n[this.camelize(r.name.slice(e.length))] = this.deserializeValue(r.value));
                        return n
                    },
                    checkAttr: function(t, e, n) {
                        return t.hasAttribute(e + n)
                    },
                    setAttr: function(t, e, n, i) {
                        t.setAttribute(this.dasherize(e + n), String(i))
                    },
                    getType: function(t) {
                        return t.getAttribute("type") || "text"
                    },
                    generateID: function() {
                        return "" + f++
                    },
                    deserializeValue: function(t) {
                        var e;
                        try {
                            return t ? "true" == t || "false" != t && ("null" == t ? null : isNaN(e = Number(t)) ? /^[\[\{]/.test(t) ? JSON.parse(t) : t : e) : t
                        } catch (e) {
                            return t
                        }
                    },
                    camelize: function(t) {
                        return t.replace(/-+(.)?/g, (function(t, e) {
                            return e ? e.toUpperCase() : ""
                        }))
                    },
                    dasherize: function(t) {
                        return t.replace(/::/g, "/").replace(/([A-Z]+)([A-Z][a-z])/g, "$1_$2").replace(/([a-z\d])([A-Z])/g, "$1_$2").replace(/_/g, "-").toLowerCase()
                    },
                    warn: function() {
                        var t;
                        window.console && "function" == typeof window.console.warn && (t = window.console).warn.apply(t, arguments)
                    },
                    warnOnce: function(t) {
                        p[t] || (p[t] = !0, this.warn.apply(this, arguments))
                    },
                    _resetWarnings: function() {
                        p = {}
                    },
                    trimString: function(t) {
                        return t.replace(/^\s+|\s+$/g, "")
                    },
                    parse: {
                        date: function(t) {
                            var e = t.match(/^(\d{4,})-(\d\d)-(\d\d)$/);
                            if (!e)
                                return null;
                            var n = s(e.map((function(t) {
                                    return parseInt(t, 10)
                                })), 4),
                                i = (n[0], n[1]),
                                r = n[2],
                                o = n[3],
                                a = new Date(i, r - 1, o);
                            return a.getFullYear() !== i || a.getMonth() + 1 !== r || a.getDate() !== o ? null : a
                        },
                        string: function(t) {
                            return t
                        },
                        integer: function(t) {
                            return isNaN(t) ? null : parseInt(t, 10)
                        },
                        number: function(t) {
                            if (isNaN(t))
                                throw null;
                            return parseFloat(t)
                        },
                        boolean: function(t) {
                            return !/^\s*false\s*$/i.test(t)
                        },
                        object: function(t) {
                            return g.deserializeValue(t)
                        },
                        regexp: function(t) {
                            var e = "";
                            return /^\/.*\/(?:[gimy]*)$/.test(t) ? (e = t.replace(/.*\/([gimy]*)$/, "$1"), t = t.replace(new RegExp("^/(.*?)/" + e + "$"), "$1")) : t = "^" + t + "$", new RegExp(t, e)
                        }
                    },
                    parseRequirement: function(t, e) {
                        var n = this.parse[t || "string"];
                        if (!n)
                            throw 'Unknown requirement specification: "' + t + '"';
                        var i = n(e);
                        if (null === i)
                            throw "Requirement is not a ".concat(t, ': "').concat(e, '"');
                        return i
                    },
                    namespaceEvents: function(e, n) {
                        return (e = this.trimString(e || "").split(/\s+/))[0] ? t.map(e, (function(t) {
                            return "".concat(t, ".").concat(n)
                        })).join(" ") : ""
                    },
                    difference: function(e, n) {
                        var i = [];
                        return t.each(e, (function(t, e) {
                            -1 == n.indexOf(e) && i.push(e)
                        })), i
                    },
                    all: function(e) {
                        return t.when.apply(t, o(e).concat([42, 42]))
                    },
                    objectCreate: Object.create || function() {
                        var t = function() {};
                        return function(n) {
                            if (arguments.length > 1)
                                throw Error("Second argument not supported");
                            if ("object" != e(n))
                                throw TypeError("Argument must be an object");
                            t.prototype = n;
                            var i = new t;
                            return t.prototype = null, i
                        }
                    }(),
                    _SubmitSelector: 'input[type="submit"], button:submit'
                },
                m = {
                    namespace: "data-parsley-",
                    inputs: "input, textarea, select",
                    excluded: "input[type=button], input[type=submit], input[type=reset], input[type=hidden]",
                    priorityEnabled: !0,
                    multiple: null,
                    group: null,
                    uiEnabled: !0,
                    validationThreshold: 3,
                    focus: "first",
                    trigger: !1,
                    triggerAfterFailure: "input",
                    errorClass: "parsley-error",
                    successClass: "parsley-success",
                    classHandler: function(t) {},
                    errorsContainer: function(t) {},
                    errorsWrapper: '<ul class="parsley-errors-list"></ul>',
                    errorTemplate: "<li></li>"
                },
                v = function() {
                    this.__id__ = g.generateID()
                };
            v.prototype = {
                asyncSupport: !0,
                _pipeAccordingToValidationResult: function() {
                    var e = this,
                        n = function() {
                            var n = t.Deferred();
                            return !0 !== e.validationResult && n.reject(), n.resolve().promise()
                        };
                    return [n, n]
                },
                actualizeOptions: function() {
                    return g.attr(this.element, this.options.namespace, this.domOptions), this.parent && this.parent.actualizeOptions && this.parent.actualizeOptions(), this
                },
                _resetOptions: function(t) {
                    for (var e in this.domOptions = g.objectCreate(this.parent.options), this.options = g.objectCreate(this.domOptions), t)
                        t.hasOwnProperty(e) && (this.options[e] = t[e]);
                    this.actualizeOptions()
                },
                _listeners: null,
                on: function(t, e) {
                    return this._listeners = this._listeners || {}, (this._listeners[t] = this._listeners[t] || []).push(e), this
                },
                subscribe: function(e, n) {
                    t.listenTo(this, e.toLowerCase(), n)
                },
                off: function(t, e) {
                    var n = this._listeners && this._listeners[t];
                    if (n)
                        if (e)
                            for (var i = n.length; i--;)
                                n[i] === e && n.splice(i, 1);
                        else
                            delete this._listeners[t];
                    return this
                },
                unsubscribe: function(e, n) {
                    t.unsubscribeTo(this, e.toLowerCase())
                },
                trigger: function(t, e, n) {
                    e = e || this;
                    var i,
                        r = this._listeners && this._listeners[t];
                    if (r)
                        for (var s = r.length; s--;)
                            if (!1 === (i = r[s].call(e, e, n)))
                                return i;
                    return !this.parent || this.parent.trigger(t, e, n)
                },
                asyncIsValid: function(t, e) {
                    return g.warnOnce("asyncIsValid is deprecated; please use whenValid instead"), this.whenValid({
                        group: t,
                        force: e
                    })
                },
                _findRelated: function() {
                    return this.options.multiple ? t(this.parent.element.querySelectorAll("[".concat(this.options.namespace, 'multiple="').concat(this.options.multiple, '"]'))) : this.$element
                }
            };
            var y = function(t, e) {
                    var n = t.match(/^\s*\[(.*)\]\s*$/);
                    if (!n)
                        throw 'Requirement is not an array: "' + t + '"';
                    var i = n[1].split(",").map(g.trimString);
                    if (i.length !== e)
                        throw "Requirement has " + i.length + " values when " + e + " are needed";
                    return i
                },
                _ = function(t, e, n) {
                    var i = null,
                        r = {};
                    for (var s in t)
                        if (s) {
                            var o = n(s);
                            "string" == typeof o && (o = g.parseRequirement(t[s], o)),
                            r[s] = o
                        } else
                            i = g.parseRequirement(t[s], e);
                    return [i, r]
                },
                w = function(e) {
                    t.extend(!0, this, e)
                };
            w.prototype = {
                validate: function(t, e) {
                    if (this.fn)
                        return arguments.length > 3 && (e = [].slice.call(arguments, 1, -1)), this.fn(t, e);
                    if (Array.isArray(t)) {
                        if (!this.validateMultiple)
                            throw "Validator `" + this.name + "` does not handle multiple values";
                        return this.validateMultiple.apply(this, arguments)
                    }
                    var n = arguments[arguments.length - 1];
                    if (this.validateDate && n._isDateInput())
                        return arguments[0] = g.parse.date(arguments[0]), null !== arguments[0] && this.validateDate.apply(this, arguments);
                    if (this.validateNumber)
                        return !t || !isNaN(t) && (arguments[0] = parseFloat(arguments[0]), this.validateNumber.apply(this, arguments));
                    if (this.validateString)
                        return this.validateString.apply(this, arguments);
                    throw "Validator `" + this.name + "` only handles multiple values"
                },
                parseRequirements: function(e, n) {
                    if ("string" != typeof e)
                        return Array.isArray(e) ? e : [e];
                    var i = this.requirementType;
                    if (Array.isArray(i)) {
                        for (var r = y(e, i.length), s = 0; s < r.length; s++)
                            r[s] = g.parseRequirement(i[s], r[s]);
                        return r
                    }
                    return t.isPlainObject(i) ? _(i, e, n) : [g.parseRequirement(i, e)]
                },
                requirementType: "string",
                priority: 2
            };
            var b = function(t, e) {
                    this.__class__ = "ValidatorRegistry",
                    this.locale = "en",
                    this.init(t || {}, e || {})
                },
                x = {
                    email: /^((([a-zA-Z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-zA-Z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-zA-Z]|\d|-|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-zA-Z]|\d|-|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))$/,
                    number: /^-?(\d*\.)?\d+(e[-+]?\d+)?$/i,
                    integer: /^-?\d+$/,
                    digits: /^\d+$/,
                    alphanum: /^\w+$/i,
                    date: {
                        test: function(t) {
                            return null !== g.parse.date(t)
                        }
                    },
                    url: new RegExp("^(?:(?:https?|ftp)://)?(?:\\S+(?::\\S*)?@)?(?:(?:[1-9]\\d?|1\\d\\d|2[01]\\d|22[0-3])(?:\\.(?:1?\\d{1,2}|2[0-4]\\d|25[0-5])){2}(?:\\.(?:[1-9]\\d?|1\\d\\d|2[0-4]\\d|25[0-4]))|(?:(?:[a-zA-Z\\u00a1-\\uffff0-9]-*)*[a-zA-Z\\u00a1-\\uffff0-9]+)(?:\\.(?:[a-zA-Z\\u00a1-\\uffff0-9]-*)*[a-zA-Z\\u00a1-\\uffff0-9]+)*(?:\\.(?:[a-zA-Z\\u00a1-\\uffff]{2,})))(?::\\d{2,5})?(?:/\\S*)?$")
                };
            x.range = x.number;
            var C = function(t) {
                    var e = ("" + t).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                    return e ? Math.max(0, (e[1] ? e[1].length : 0) - (e[2] ? +e[2] : 0)) : 0
                },
                E = function(t, e) {
                    return e.map(g.parse[t])
                },
                T = function(t, e) {
                    return function(n) {
                        for (var i = arguments.length, r = new Array(i > 1 ? i - 1 : 0), s = 1; s < i; s++)
                            r[s - 1] = arguments[s];
                        return r.pop(), e.apply(void 0, [n].concat(o(E(t, r))))
                    }
                },
                S = function(t) {
                    return {
                        validateDate: T("date", t),
                        validateNumber: T("number", t),
                        requirementType: t.length <= 2 ? "string" : ["string", "string"],
                        priority: 30
                    }
                };
            b.prototype = {
                init: function(t, e) {
                    for (var n in this.catalog = e, this.validators = r({}, this.validators), t)
                        this.addValidator(n, t[n].fn, t[n].priority);
                    window.Parsley.trigger("parsley:validator:init")
                },
                setLocale: function(t) {
                    if (void 0 === this.catalog[t])
                        throw new Error(t + " is not available in the catalog");
                    return this.locale = t, this
                },
                addCatalog: function(t, n, i) {
                    return "object" === e(n) && (this.catalog[t] = n), !0 === i ? this.setLocale(t) : this
                },
                addMessage: function(t, e, n) {
                    return void 0 === this.catalog[t] && (this.catalog[t] = {}), this.catalog[t][e] = n, this
                },
                addMessages: function(t, e) {
                    for (var n in e)
                        this.addMessage(t, n, e[n]);
                    return this
                },
                addValidator: function(t, e, n) {
                    if (this.validators[t])
                        g.warn('Validator "' + t + '" is already defined.');
                    else if (m.hasOwnProperty(t))
                        return void g.warn('"' + t + '" is a restricted keyword and is not a valid validator name.');
                    return this._setValidator.apply(this, arguments)
                },
                hasValidator: function(t) {
                    return !!this.validators[t]
                },
                updateValidator: function(t, e, n) {
                    return this.validators[t] ? this._setValidator.apply(this, arguments) : (g.warn('Validator "' + t + '" is not already defined.'), this.addValidator.apply(this, arguments))
                },
                removeValidator: function(t) {
                    return this.validators[t] || g.warn('Validator "' + t + '" is not defined.'), delete this.validators[t], this
                },
                _setValidator: function(t, n, i) {
                    for (var r in "object" !== e(n) && (n = {
                        fn: n,
                        priority: i
                    }), n.validate || (n = new w(n)), this.validators[t] = n, n.messages || {})
                        this.addMessage(r, t, n.messages[r]);
                    return this
                },
                getErrorMessage: function(t) {
                    return ("type" === t.name ? (this.catalog[this.locale][t.name] || {})[t.requirements] : this.formatMessage(this.catalog[this.locale][t.name], t.requirements)) || this.catalog[this.locale].defaultMessage || this.catalog.en.defaultMessage
                },
                formatMessage: function(t, n) {
                    if ("object" === e(n)) {
                        for (var i in n)
                            t = this.formatMessage(t, n[i]);
                        return t
                    }
                    return "string" == typeof t ? t.replace(/%s/i, n) : ""
                },
                validators: {
                    notblank: {
                        validateString: function(t) {
                            return /\S/.test(t)
                        },
                        priority: 2
                    },
                    required: {
                        validateMultiple: function(t) {
                            return t.length > 0
                        },
                        validateString: function(t) {
                            return /\S/.test(t)
                        },
                        priority: 512
                    },
                    type: {
                        validateString: function(t, e) {
                            var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {},
                                i = n.step,
                                r = void 0 === i ? "any" : i,
                                s = n.base,
                                o = void 0 === s ? 0 : s,
                                a = x[e];
                            if (!a)
                                throw new Error("validator type `" + e + "` is not supported");
                            if (!t)
                                return !0;
                            if (!a.test(t))
                                return !1;
                            if ("number" === e && !/^any$/i.test(r || "")) {
                                var l = Number(t),
                                    u = Math.max(C(r), C(o));
                                if (C(l) > u)
                                    return !1;
                                var c = function(t) {
                                    return Math.round(t * Math.pow(10, u))
                                };
                                if ((c(l) - c(o)) % c(r) != 0)
                                    return !1
                            }
                            return !0
                        },
                        requirementType: {
                            "": "string",
                            step: "string",
                            base: "number"
                        },
                        priority: 256
                    },
                    pattern: {
                        validateString: function(t, e) {
                            return !t || e.test(t)
                        },
                        requirementType: "regexp",
                        priority: 64
                    },
                    minlength: {
                        validateString: function(t, e) {
                            return !t || t.length >= e
                        },
                        requirementType: "integer",
                        priority: 30
                    },
                    maxlength: {
                        validateString: function(t, e) {
                            return t.length <= e
                        },
                        requirementType: "integer",
                        priority: 30
                    },
                    length: {
                        validateString: function(t, e, n) {
                            return !t || t.length >= e && t.length <= n
                        },
                        requirementType: ["integer", "integer"],
                        priority: 30
                    },
                    mincheck: {
                        validateMultiple: function(t, e) {
                            return t.length >= e
                        },
                        requirementType: "integer",
                        priority: 30
                    },
                    maxcheck: {
                        validateMultiple: function(t, e) {
                            return t.length <= e
                        },
                        requirementType: "integer",
                        priority: 30
                    },
                    check: {
                        validateMultiple: function(t, e, n) {
                            return t.length >= e && t.length <= n
                        },
                        requirementType: ["integer", "integer"],
                        priority: 30
                    },
                    min: S((function(t, e) {
                        return t >= e
                    })),
                    max: S((function(t, e) {
                        return t <= e
                    })),
                    range: S((function(t, e, n) {
                        return t >= e && t <= n
                    })),
                    equalto: {
                        validateString: function(e, n) {
                            if (!e)
                                return !0;
                            var i = t(n);
                            return i.length ? e === i.val() : e === n
                        },
                        priority: 256
                    },
                    euvatin: {
                        validateString: function(t, e) {
                            return !t || /^[A-Z][A-Z][A-Za-z0-9 -]{2,}$/.test(t)
                        },
                        priority: 30
                    }
                }
            };
            var A = {},
                D = function t(e, n, i) {
                    for (var r = [], s = [], o = 0; o < e.length; o++) {
                        for (var a = !1, l = 0; l < n.length; l++)
                            if (e[o].assert.name === n[l].assert.name) {
                                a = !0;
                                break
                            }
                        a ? s.push(e[o]) : r.push(e[o])
                    }
                    return {
                        kept: s,
                        added: r,
                        removed: i ? [] : t(n, e, !0).added
                    }
                };
            A.Form = {
                _actualizeTriggers: function() {
                    var t = this;
                    this.$element.on("submit.Parsley", (function(e) {
                        t.onSubmitValidate(e)
                    })),
                    this.$element.on("click.Parsley", g._SubmitSelector, (function(e) {
                        t.onSubmitButton(e)
                    })),
                    !1 !== this.options.uiEnabled && this.element.setAttribute("novalidate", "")
                },
                focus: function() {
                    if (this._focusedField = null, !0 === this.validationResult || "none" === this.options.focus)
                        return null;
                    for (var t = 0; t < this.fields.length; t++) {
                        var e = this.fields[t];
                        if (!0 !== e.validationResult && e.validationResult.length > 0 && void 0 === e.options.noFocus && (this._focusedField = e.$element, "first" === this.options.focus))
                            break
                    }
                    return null === this._focusedField ? null : this._focusedField.focus()
                },
                _destroyUI: function() {
                    this.$element.off(".Parsley")
                }
            },
            A.Field = {
                _reflowUI: function() {
                    if (this._buildUI(), this._ui) {
                        var t = D(this.validationResult, this._ui.lastValidationResult);
                        this._ui.lastValidationResult = this.validationResult,
                        this._manageStatusClass(),
                        this._manageErrorsMessages(t),
                        this._actualizeTriggers(),
                        !t.kept.length && !t.added.length || this._failedOnce || (this._failedOnce = !0, this._actualizeTriggers())
                    }
                },
                getErrorsMessages: function() {
                    if (!0 === this.validationResult)
                        return [];
                    for (var t = [], e = 0; e < this.validationResult.length; e++)
                        t.push(this.validationResult[e].errorMessage || this._getErrorMessage(this.validationResult[e].assert));
                    return t
                },
                addError: function(t) {
                    var e = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                        n = e.message,
                        i = e.assert,
                        r = e.updateClass,
                        s = void 0 === r || r;
                    this._buildUI(),
                    this._addError(t, {
                        message: n,
                        assert: i
                    }),
                    s && this._errorClass()
                },
                updateError: function(t) {
                    var e = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                        n = e.message,
                        i = e.assert,
                        r = e.updateClass,
                        s = void 0 === r || r;
                    this._buildUI(),
                    this._updateError(t, {
                        message: n,
                        assert: i
                    }),
                    s && this._errorClass()
                },
                removeError: function(t) {
                    var e = (arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {}).updateClass,
                        n = void 0 === e || e;
                    this._buildUI(),
                    this._removeError(t),
                    n && this._manageStatusClass()
                },
                _manageStatusClass: function() {
                    this.hasConstraints() && this.needsValidation() && !0 === this.validationResult ? this._successClass() : this.validationResult.length > 0 ? this._errorClass() : this._resetClass()
                },
                _manageErrorsMessages: function(e) {
                    if (void 0 === this.options.errorsMessagesDisabled) {
                        if (void 0 !== this.options.errorMessage)
                            return e.added.length || e.kept.length ? (this._insertErrorWrapper(), 0 === this._ui.$errorsWrapper.find(".parsley-custom-error-message").length && this._ui.$errorsWrapper.append(t(this.options.errorTemplate).addClass("parsley-custom-error-message")), this._ui.$errorClassHandler.attr("aria-describedby", this._ui.errorsWrapperId), this._ui.$errorsWrapper.addClass("filled").attr("aria-hidden", "false").find(".parsley-custom-error-message").html(this.options.errorMessage)) : (this._ui.$errorClassHandler.removeAttr("aria-describedby"), this._ui.$errorsWrapper.removeClass("filled").attr("aria-hidden", "true").find(".parsley-custom-error-message").remove());
                        for (var n = 0; n < e.removed.length; n++)
                            this._removeError(e.removed[n].assert.name);
                        for (n = 0; n < e.added.length; n++)
                            this._addError(e.added[n].assert.name, {
                                message: e.added[n].errorMessage,
                                assert: e.added[n].assert
                            });
                        for (n = 0; n < e.kept.length; n++)
                            this._updateError(e.kept[n].assert.name, {
                                message: e.kept[n].errorMessage,
                                assert: e.kept[n].assert
                            })
                    }
                },
                _addError: function(e, n) {
                    var i = n.message,
                        r = n.assert;
                    this._insertErrorWrapper(),
                    this._ui.$errorClassHandler.attr("aria-describedby", this._ui.errorsWrapperId),
                    this._ui.$errorsWrapper.addClass("filled").attr("aria-hidden", "false").append(t(this.options.errorTemplate).addClass("parsley-" + e).html(i || this._getErrorMessage(r)))
                },
                _updateError: function(t, e) {
                    var n = e.message,
                        i = e.assert;
                    this._ui.$errorsWrapper.addClass("filled").find(".parsley-" + t).html(n || this._getErrorMessage(i))
                },
                _removeError: function(t) {
                    this._ui.$errorClassHandler.removeAttr("aria-describedby"),
                    this._ui.$errorsWrapper.removeClass("filled").attr("aria-hidden", "true").find(".parsley-" + t).remove()
                },
                _getErrorMessage: function(t) {
                    var e = t.name + "Message";
                    return void 0 !== this.options[e] ? window.Parsley.formatMessage(this.options[e], t.requirements) : window.Parsley.getErrorMessage(t)
                },
                _buildUI: function() {
                    if (!this._ui && !1 !== this.options.uiEnabled) {
                        var e = {};
                        this.element.setAttribute(this.options.namespace + "id", this.__id__),
                        e.$errorClassHandler = this._manageClassHandler(),
                        e.errorsWrapperId = "parsley-id-" + (this.options.multiple ? "multiple-" + this.options.multiple : this.__id__),
                        e.$errorsWrapper = t(this.options.errorsWrapper).attr("id", e.errorsWrapperId),
                        e.lastValidationResult = [],
                        e.validationInformationVisible = !1,
                        this._ui = e
                    }
                },
                _manageClassHandler: function() {
                    if ("string" == typeof this.options.classHandler && t(this.options.classHandler).length)
                        return t(this.options.classHandler);
                    var n = this.options.classHandler;
                    if ("string" == typeof this.options.classHandler && "function" == typeof window[this.options.classHandler] && (n = window[this.options.classHandler]), "function" == typeof n) {
                        var r = n.call(this, this);
                        if (void 0 !== r && r.length)
                            return r
                    } else {
                        if ("object" === e(n) && n instanceof i && n.length)
                            return n;
                        n && g.warn("The class handler `" + n + "` does not exist in DOM nor as a global JS function")
                    }
                    return this._inputHolder()
                },
                _inputHolder: function() {
                    return this.options.multiple && "SELECT" !== this.element.nodeName ? this.$element.parent() : this.$element
                },
                _insertErrorWrapper: function() {
                    var n = this.options.errorsContainer;
                    if (0 !== this._ui.$errorsWrapper.parent().length)
                        return this._ui.$errorsWrapper.parent();
                    if ("string" == typeof n) {
                        if (t(n).length)
                            return t(n).append(this._ui.$errorsWrapper);
                        "function" == typeof window[n] ? n = window[n] : g.warn("The errors container `" + n + "` does not exist in DOM nor as a global JS function")
                    }
                    return "function" == typeof n && (n = n.call(this, this)), "object" === e(n) && n.length ? n.append(this._ui.$errorsWrapper) : this._inputHolder().after(this._ui.$errorsWrapper)
                },
                _actualizeTriggers: function() {
                    var t,
                        e = this,
                        n = this._findRelated();
                    n.off(".Parsley"),
                    this._failedOnce ? n.on(g.namespaceEvents(this.options.triggerAfterFailure, "Parsley"), (function() {
                        e._validateIfNeeded()
                    })) : (t = g.namespaceEvents(this.options.trigger, "Parsley")) && n.on(t, (function(t) {
                        e._validateIfNeeded(t)
                    }))
                },
                _validateIfNeeded: function(t) {
                    var e = this;
                    t && /key|input/.test(t.type) && (!this._ui || !this._ui.validationInformationVisible) && this.getValue().length <= this.options.validationThreshold || (this.options.debounce ? (window.clearTimeout(this._debounced), this._debounced = window.setTimeout((function() {
                        return e.validate()
                    }), this.options.debounce)) : this.validate())
                },
                _resetUI: function() {
                    this._failedOnce = !1,
                    this._actualizeTriggers(),
                    void 0 !== this._ui && (this._ui.$errorsWrapper.removeClass("filled").children().remove(), this._resetClass(), this._ui.lastValidationResult = [], this._ui.validationInformationVisible = !1)
                },
                _destroyUI: function() {
                    this._resetUI(),
                    void 0 !== this._ui && this._ui.$errorsWrapper.remove(),
                    delete this._ui
                },
                _successClass: function() {
                    this._ui.validationInformationVisible = !0,
                    this._ui.$errorClassHandler.removeClass(this.options.errorClass).addClass(this.options.successClass)
                },
                _errorClass: function() {
                    this._ui.validationInformationVisible = !0,
                    this._ui.$errorClassHandler.removeClass(this.options.successClass).addClass(this.options.errorClass)
                },
                _resetClass: function() {
                    this._ui.$errorClassHandler.removeClass(this.options.successClass).removeClass(this.options.errorClass)
                }
            };
            var k = function(e, n, i) {
                    this.__class__ = "Form",
                    this.element = e,
                    this.$element = t(e),
                    this.domOptions = n,
                    this.options = i,
                    this.parent = window.Parsley,
                    this.fields = [],
                    this.validationResult = null
                },
                N = {
                    pending: null,
                    resolved: !0,
                    rejected: !1
                };
            k.prototype = {
                onSubmitValidate: function(t) {
                    var e = this;
                    if (!0 !== t.parsley) {
                        var n = this._submitSource || this.$element.find(g._SubmitSelector)[0];
                        if (this._submitSource = null, this.$element.find(".parsley-synthetic-submit-button").prop("disabled", !0), !n || null === n.getAttribute("formnovalidate")) {
                            window.Parsley._remoteCache = {};
                            var i = this.whenValidate({
                                event: t
                            });
                            "resolved" === i.state() && !1 !== this._trigger("submit") || (t.stopImmediatePropagation(), t.preventDefault(), "pending" === i.state() && i.done((function() {
                                e._submit(n)
                            })))
                        }
                    }
                },
                onSubmitButton: function(t) {
                    this._submitSource = t.currentTarget
                },
                _submit: function(e) {
                    if (!1 !== this._trigger("submit")) {
                        if (e) {
                            var n = this.$element.find(".parsley-synthetic-submit-button").prop("disabled", !1);
                            0 === n.length && (n = t('<input class="parsley-synthetic-submit-button" type="hidden">').appendTo(this.$element)),
                            n.attr({
                                name: e.getAttribute("name"),
                                value: e.getAttribute("value")
                            })
                        }
                        this.$element.trigger(r(t.Event("submit"), {
                            parsley: !0
                        }))
                    }
                },
                validate: function(e) {
                    if (arguments.length >= 1 && !t.isPlainObject(e)) {
                        g.warnOnce("Calling validate on a parsley form without passing arguments as an object is deprecated.");
                        var n = Array.prototype.slice.call(arguments);
                        e = {
                            group: n[0],
                            force: n[1],
                            event: n[2]
                        }
                    }
                    return N[this.whenValidate(e).state()]
                },
                whenValidate: function() {
                    var e,
                        n = this,
                        i = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                        s = i.group,
                        a = i.force,
                        l = i.event;
                    this.submitEvent = l,
                    l && (this.submitEvent = r({}, l, {
                        preventDefault: function() {
                            g.warnOnce("Using `this.submitEvent.preventDefault()` is deprecated; instead, call `this.validationResult = false`"),
                            n.validationResult = !1
                        }
                    })),
                    this.validationResult = !0,
                    this._trigger("validate"),
                    this._refreshFields();
                    var u = this._withoutReactualizingFormOptions((function() {
                        return t.map(n.fields, (function(t) {
                            return t.whenValidate({
                                force: a,
                                group: s
                            })
                        }))
                    }));
                    return (e = g.all(u).done((function() {
                        n._trigger("success")
                    })).fail((function() {
                        n.validationResult = !1,
                        n.focus(),
                        n._trigger("error")
                    })).always((function() {
                        n._trigger("validated")
                    }))).pipe.apply(e, o(this._pipeAccordingToValidationResult()))
                },
                isValid: function(e) {
                    if (arguments.length >= 1 && !t.isPlainObject(e)) {
                        g.warnOnce("Calling isValid on a parsley form without passing arguments as an object is deprecated.");
                        var n = Array.prototype.slice.call(arguments);
                        e = {
                            group: n[0],
                            force: n[1]
                        }
                    }
                    return N[this.whenValid(e).state()]
                },
                whenValid: function() {
                    var e = this,
                        n = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                        i = n.group,
                        r = n.force;
                    this._refreshFields();
                    var s = this._withoutReactualizingFormOptions((function() {
                        return t.map(e.fields, (function(t) {
                            return t.whenValid({
                                group: i,
                                force: r
                            })
                        }))
                    }));
                    return g.all(s)
                },
                refresh: function() {
                    return this._refreshFields(), this
                },
                reset: function() {
                    for (var t = 0; t < this.fields.length; t++)
                        this.fields[t].reset();
                    this._trigger("reset")
                },
                destroy: function() {
                    this._destroyUI();
                    for (var t = 0; t < this.fields.length; t++)
                        this.fields[t].destroy();
                    this.$element.removeData("Parsley"),
                    this._trigger("destroy")
                },
                _refreshFields: function() {
                    return this.actualizeOptions()._bindFields()
                },
                _bindFields: function() {
                    var e = this,
                        n = this.fields;
                    return this.fields = [], this.fieldsMappedById = {}, this._withoutReactualizingFormOptions((function() {
                        e.$element.find(e.options.inputs).not(e.options.excluded).not("[".concat(e.options.namespace, "excluded=true]")).each((function(t, n) {
                            var i = new window.Parsley.Factory(n, {}, e);
                            if ("Field" === i.__class__ || "FieldMultiple" === i.__class__) {
                                var r = i.__class__ + "-" + i.__id__;
                                void 0 === e.fieldsMappedById[r] && (e.fieldsMappedById[r] = i, e.fields.push(i))
                            }
                        })),
                        t.each(g.difference(n, e.fields), (function(t, e) {
                            e.reset()
                        }))
                    })), this
                },
                _withoutReactualizingFormOptions: function(t) {
                    var e = this.actualizeOptions;
                    this.actualizeOptions = function() {
                        return this
                    };
                    var n = t();
                    return this.actualizeOptions = e, n
                },
                _trigger: function(t) {
                    return this.trigger("form:" + t)
                }
            };
            var j = function(t, e, n, i, s) {
                    var o = window.Parsley._validatorRegistry.validators[e],
                        a = new w(o);
                    r(this, {
                        validator: a,
                        name: e,
                        requirements: n,
                        priority: i = i || t.options[e + "Priority"] || a.priority,
                        isDomConstraint: s = !0 === s
                    }),
                    this._parseRequirements(t.options)
                },
                I = function(t) {
                    return t[0].toUpperCase() + t.slice(1)
                };
            j.prototype = {
                validate: function(t, e) {
                    var n;
                    return (n = this.validator).validate.apply(n, [t].concat(o(this.requirementList), [e]))
                },
                _parseRequirements: function(t) {
                    var e = this;
                    this.requirementList = this.validator.parseRequirements(this.requirements, (function(n) {
                        return t[e.name + I(n)]
                    }))
                }
            };
            var O = function(e, n, i, r) {
                    this.__class__ = "Field",
                    this.element = e,
                    this.$element = t(e),
                    void 0 !== r && (this.parent = r),
                    this.options = i,
                    this.domOptions = n,
                    this.constraints = [],
                    this.constraintsByName = {},
                    this.validationResult = !0,
                    this._bindConstraints()
                },
                F = {
                    pending: null,
                    resolved: !0,
                    rejected: !1
                };
            O.prototype = {
                validate: function(e) {
                    arguments.length >= 1 && !t.isPlainObject(e) && (g.warnOnce("Calling validate on a parsley field without passing arguments as an object is deprecated."), e = {
                        options: e
                    });
                    var n = this.whenValidate(e);
                    if (!n)
                        return !0;
                    switch (n.state()) {
                    case "pending":
                        return null;
                    case "resolved":
                        return !0;
                    case "rejected":
                        return this.validationResult
                    }
                },
                whenValidate: function() {
                    var t,
                        e = this,
                        n = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                        i = n.force,
                        r = n.group;
                    if (this.refresh(), !r || this._isInGroup(r))
                        return this.value = this.getValue(), this._trigger("validate"), (t = this.whenValid({
                            force: i,
                            value: this.value,
                            _refreshed: !0
                        }).always((function() {
                            e._reflowUI()
                        })).done((function() {
                            e._trigger("success")
                        })).fail((function() {
                            e._trigger("error")
                        })).always((function() {
                            e._trigger("validated")
                        }))).pipe.apply(t, o(this._pipeAccordingToValidationResult()))
                },
                hasConstraints: function() {
                    return 0 !== this.constraints.length
                },
                needsValidation: function(t) {
                    return void 0 === t && (t = this.getValue()), !(!t.length && !this._isRequired() && void 0 === this.options.validateIfEmpty)
                },
                _isInGroup: function(e) {
                    return Array.isArray(this.options.group) ? -1 !== t.inArray(e, this.options.group) : this.options.group === e
                },
                isValid: function(e) {
                    if (arguments.length >= 1 && !t.isPlainObject(e)) {
                        g.warnOnce("Calling isValid on a parsley field without passing arguments as an object is deprecated.");
                        var n = Array.prototype.slice.call(arguments);
                        e = {
                            force: n[0],
                            value: n[1]
                        }
                    }
                    var i = this.whenValid(e);
                    return !i || F[i.state()]
                },
                whenValid: function() {
                    var e = this,
                        n = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                        i = n.force,
                        r = void 0 !== i && i,
                        s = n.value,
                        o = n.group;
                    if (n._refreshed || this.refresh(), !o || this._isInGroup(o)) {
                        if (this.validationResult = !0, !this.hasConstraints())
                            return t.when();
                        if (null == s && (s = this.getValue()), !this.needsValidation(s) && !0 !== r)
                            return t.when();
                        var a = this._getGroupedConstraints(),
                            l = [];
                        return t.each(a, (function(n, i) {
                            var r = g.all(t.map(i, (function(t) {
                                return e._validateConstraint(s, t)
                            })));
                            if (l.push(r), "rejected" === r.state())
                                return !1
                        })), g.all(l)
                    }
                },
                _validateConstraint: function(e, n) {
                    var i = this,
                        r = n.validate(e, this);
                    return !1 === r && (r = t.Deferred().reject()), g.all([r]).fail((function(t) {
                        i.validationResult instanceof Array || (i.validationResult = []),
                        i.validationResult.push({
                            assert: n,
                            errorMessage: "string" == typeof t && t
                        })
                    }))
                },
                getValue: function() {
                    var t;
                    return null == (t = "function" == typeof this.options.value ? this.options.value(this) : void 0 !== this.options.value ? this.options.value : this.$element.val()) ? "" : this._handleWhitespace(t)
                },
                reset: function() {
                    return this._resetUI(), this._trigger("reset")
                },
                destroy: function() {
                    this._destroyUI(),
                    this.$element.removeData("Parsley"),
                    this.$element.removeData("FieldMultiple"),
                    this._trigger("destroy")
                },
                refresh: function() {
                    return this._refreshConstraints(), this
                },
                _refreshConstraints: function() {
                    return this.actualizeOptions()._bindConstraints()
                },
                refreshConstraints: function() {
                    return g.warnOnce("Parsley's refreshConstraints is deprecated. Please use refresh"), this.refresh()
                },
                addConstraint: function(t, e, n, i) {
                    if (window.Parsley._validatorRegistry.validators[t]) {
                        var r = new j(this, t, e, n, i);
                        "undefined" !== this.constraintsByName[r.name] && this.removeConstraint(r.name),
                        this.constraints.push(r),
                        this.constraintsByName[r.name] = r
                    }
                    return this
                },
                removeConstraint: function(t) {
                    for (var e = 0; e < this.constraints.length; e++)
                        if (t === this.constraints[e].name) {
                            this.constraints.splice(e, 1);
                            break
                        }
                    return delete this.constraintsByName[t], this
                },
                updateConstraint: function(t, e, n) {
                    return this.removeConstraint(t).addConstraint(t, e, n)
                },
                _bindConstraints: function() {
                    for (var t = [], e = {}, n = 0; n < this.constraints.length; n++)
                        !1 === this.constraints[n].isDomConstraint && (t.push(this.constraints[n]), e[this.constraints[n].name] = this.constraints[n]);
                    for (var i in this.constraints = t, this.constraintsByName = e, this.options)
                        this.addConstraint(i, this.options[i], void 0, !0);
                    return this._bindHtml5Constraints()
                },
                _bindHtml5Constraints: function() {
                    null !== this.element.getAttribute("required") && this.addConstraint("required", !0, void 0, !0),
                    null !== this.element.getAttribute("pattern") && this.addConstraint("pattern", this.element.getAttribute("pattern"), void 0, !0);
                    var t = this.element.getAttribute("min"),
                        e = this.element.getAttribute("max");
                    null !== t && null !== e ? this.addConstraint("range", [t, e], void 0, !0) : null !== t ? this.addConstraint("min", t, void 0, !0) : null !== e && this.addConstraint("max", e, void 0, !0),
                    null !== this.element.getAttribute("minlength") && null !== this.element.getAttribute("maxlength") ? this.addConstraint("length", [this.element.getAttribute("minlength"), this.element.getAttribute("maxlength")], void 0, !0) : null !== this.element.getAttribute("minlength") ? this.addConstraint("minlength", this.element.getAttribute("minlength"), void 0, !0) : null !== this.element.getAttribute("maxlength") && this.addConstraint("maxlength", this.element.getAttribute("maxlength"), void 0, !0);
                    var n = g.getType(this.element);
                    return "number" === n ? this.addConstraint("type", ["number", {
                        step: this.element.getAttribute("step") || "1",
                        base: t || this.element.getAttribute("value")
                    }], void 0, !0) : /^(email|url|range|date)$/i.test(n) ? this.addConstraint("type", n, void 0, !0) : this
                },
                _isRequired: function() {
                    return void 0 !== this.constraintsByName.required && !1 !== this.constraintsByName.required.requirements
                },
                _trigger: function(t) {
                    return this.trigger("field:" + t)
                },
                _handleWhitespace: function(t) {
                    return !0 === this.options.trimValue && g.warnOnce('data-parsley-trim-value="true" is deprecated, please use data-parsley-whitespace="trim"'), "squish" === this.options.whitespace && (t = t.replace(/\s{2,}/g, " ")), "trim" !== this.options.whitespace && "squish" !== this.options.whitespace && !0 !== this.options.trimValue || (t = g.trimString(t)), t
                },
                _isDateInput: function() {
                    var t = this.constraintsByName.type;
                    return t && "date" === t.requirements
                },
                _getGroupedConstraints: function() {
                    if (!1 === this.options.priorityEnabled)
                        return [this.constraints];
                    for (var t = [], e = {}, n = 0; n < this.constraints.length; n++) {
                        var i = this.constraints[n].priority;
                        e[i] || t.push(e[i] = []),
                        e[i].push(this.constraints[n])
                    }
                    return t.sort((function(t, e) {
                        return e[0].priority - t[0].priority
                    })), t
                }
            };
            var P = function() {
                this.__class__ = "FieldMultiple"
            };
            P.prototype = {
                addElement: function(t) {
                    return this.$elements.push(t), this
                },
                _refreshConstraints: function() {
                    var e;
                    if (this.constraints = [], "SELECT" === this.element.nodeName)
                        return this.actualizeOptions()._bindConstraints(), this;
                    for (var n = 0; n < this.$elements.length; n++)
                        if (t("html").has(this.$elements[n]).length) {
                            e = this.$elements[n].data("FieldMultiple")._refreshConstraints().constraints;
                            for (var i = 0; i < e.length; i++)
                                this.addConstraint(e[i].name, e[i].requirements, e[i].priority, e[i].isDomConstraint)
                        } else
                            this.$elements.splice(n, 1);
                    return this
                },
                getValue: function() {
                    if ("function" == typeof this.options.value)
                        return this.options.value(this);
                    if (void 0 !== this.options.value)
                        return this.options.value;
                    if ("INPUT" === this.element.nodeName) {
                        var e = g.getType(this.element);
                        if ("radio" === e)
                            return this._findRelated().filter(":checked").val() || "";
                        if ("checkbox" === e) {
                            var n = [];
                            return this._findRelated().filter(":checked").each((function() {
                                n.push(t(this).val())
                            })), n
                        }
                    }
                    return "SELECT" === this.element.nodeName && null === this.$element.val() ? [] : this.$element.val()
                },
                _init: function() {
                    return this.$elements = [this.$element], this
                }
            };
            var $ = function(n, i, s) {
                this.element = n,
                this.$element = t(n);
                var o = this.$element.data("Parsley");
                if (o)
                    return void 0 !== s && o.parent === window.Parsley && (o.parent = s, o._resetOptions(o.options)), "object" === e(i) && r(o.options, i), o;
                if (!this.$element.length)
                    throw new Error("You must bind Parsley on an existing element.");
                if (void 0 !== s && "Form" !== s.__class__)
                    throw new Error("Parent instance must be a Form instance");
                return this.parent = s || window.Parsley, this.init(i)
            };
            $.prototype = {
                init: function(t) {
                    return this.__class__ = "Parsley", this.__version__ = "2.9.2", this.__id__ = g.generateID(), this._resetOptions(t), "FORM" === this.element.nodeName || g.checkAttr(this.element, this.options.namespace, "validate") && !this.$element.is(this.options.inputs) ? this.bind("parsleyForm") : this.isMultiple() ? this.handleMultiple() : this.bind("parsleyField")
                },
                isMultiple: function() {
                    var t = g.getType(this.element);
                    return "radio" === t || "checkbox" === t || "SELECT" === this.element.nodeName && null !== this.element.getAttribute("multiple")
                },
                handleMultiple: function() {
                    var e,
                        n,
                        i = this;
                    if (this.options.multiple = this.options.multiple || (e = this.element.getAttribute("name")) || this.element.getAttribute("id"), "SELECT" === this.element.nodeName && null !== this.element.getAttribute("multiple"))
                        return this.options.multiple = this.options.multiple || this.__id__, this.bind("parsleyFieldMultiple");
                    if (!this.options.multiple)
                        return g.warn("To be bound by Parsley, a radio, a checkbox and a multiple select input must have either a name or a multiple option.", this.$element), this;
                    this.options.multiple = this.options.multiple.replace(/(:|\.|\[|\]|\{|\}|\$)/g, ""),
                    e && t('input[name="' + e + '"]').each((function(t, e) {
                        var n = g.getType(e);
                        "radio" !== n && "checkbox" !== n || e.setAttribute(i.options.namespace + "multiple", i.options.multiple)
                    }));
                    for (var r = this._findRelated(), s = 0; s < r.length; s++)
                        if (void 0 !== (n = t(r.get(s)).data("Parsley"))) {
                            this.$element.data("FieldMultiple") || n.addElement(this.$element);
                            break
                        }
                    return this.bind("parsleyField", !0), n || this.bind("parsleyFieldMultiple")
                },
                bind: function(e, n) {
                    var i;
                    switch (e) {
                    case "parsleyForm":
                        i = t.extend(new k(this.element, this.domOptions, this.options), new v, window.ParsleyExtend)._bindFields();
                        break;
                    case "parsleyField":
                        i = t.extend(new O(this.element, this.domOptions, this.options, this.parent), new v, window.ParsleyExtend);
                        break;
                    case "parsleyFieldMultiple":
                        i = t.extend(new O(this.element, this.domOptions, this.options, this.parent), new P, new v, window.ParsleyExtend)._init();
                        break;
                    default:
                        throw new Error(e + "is not a supported Parsley type")
                    }
                    return this.options.multiple && g.setAttr(this.element, this.options.namespace, "multiple", this.options.multiple), void 0 !== n ? (this.$element.data("FieldMultiple", i), i) : (this.$element.data("Parsley", i), i._actualizeTriggers(), i._trigger("init"), i)
                }
            };
            var q = t.fn.jquery.split(".");
            if (parseInt(q[0]) <= 1 && parseInt(q[1]) < 8)
                throw "The loaded version of jQuery is too old. Please upgrade to 1.8.x or better.";
            q.forEach || g.warn("Parsley requires ES5 to run properly. Please include https://github.com/es-shims/es5-shim");
            var R = r(new v, {
                element: document,
                $element: t(document),
                actualizeOptions: null,
                _resetOptions: null,
                Factory: $,
                version: "2.9.2"
            });
            r(O.prototype, A.Field, v.prototype),
            r(k.prototype, A.Form, v.prototype),
            r($.prototype, v.prototype),
            t.fn.parsley = t.fn.psly = function(e) {
                if (this.length > 1) {
                    var n = [];
                    return this.each((function() {
                        n.push(t(this).parsley(e))
                    })), n
                }
                if (0 != this.length)
                    return new $(this[0], e)
            },
            void 0 === window.ParsleyExtend && (window.ParsleyExtend = {}),
            R.options = r(g.objectCreate(m), window.ParsleyConfig),
            window.ParsleyConfig = R.options,
            window.Parsley = window.psly = R,
            R.Utils = g,
            window.ParsleyUtils = {},
            t.each(g, (function(t, e) {
                "function" == typeof e && (window.ParsleyUtils[t] = function() {
                    return g.warnOnce("Accessing `window.ParsleyUtils` is deprecated. Use `window.Parsley.Utils` instead."), g[t].apply(g, arguments)
                })
            }));
            var L = window.Parsley._validatorRegistry = new b(window.ParsleyConfig.validators, window.ParsleyConfig.i18n);
            window.ParsleyValidator = {},
            t.each("setLocale addCatalog addMessage addMessages getErrorMessage formatMessage addValidator updateValidator removeValidator hasValidator".split(" "), (function(t, e) {
                window.Parsley[e] = function() {
                    return L[e].apply(L, arguments)
                },
                window.ParsleyValidator[e] = function() {
                    var t;
                    return g.warnOnce("Accessing the method '".concat(e, "' through Validator is deprecated. Simply call 'window.Parsley.").concat(e, "(...)'")), (t = window.Parsley)[e].apply(t, arguments)
                }
            })),
            window.Parsley.UI = A,
            window.ParsleyUI = {
                removeError: function(t, e, n) {
                    var i = !0 !== n;
                    return g.warnOnce("Accessing UI is deprecated. Call 'removeError' on the instance directly. Please comment in issue 1073 as to your need to call this method."), t.removeError(e, {
                        updateClass: i
                    })
                },
                getErrorsMessages: function(t) {
                    return g.warnOnce("Accessing UI is deprecated. Call 'getErrorsMessages' on the instance directly."), t.getErrorsMessages()
                }
            },
            t.each("addError updateError".split(" "), (function(t, e) {
                window.ParsleyUI[e] = function(t, n, i, r, s) {
                    var o = !0 !== s;
                    return g.warnOnce("Accessing UI is deprecated. Call '".concat(e, "' on the instance directly. Please comment in issue 1073 as to your need to call this method.")), t[e](n, {
                        message: i,
                        assert: r,
                        updateClass: o
                    })
                }
            })),
            !1 !== window.ParsleyConfig.autoBind && t((function() {
                t("[data-parsley-validate]").length && t("[data-parsley-validate]").parsley()
            }));
            var M = t({}),
                H = function() {
                    g.warnOnce("Parsley's pubsub module is deprecated; use the 'on' and 'off' methods on parsley instances or window.Parsley")
                };
            function z(t, e) {
                return t.parsleyAdaptedCallback || (t.parsleyAdaptedCallback = function() {
                    var n = Array.prototype.slice.call(arguments, 0);
                    n.unshift(this),
                    t.apply(e || M, n)
                }), t.parsleyAdaptedCallback
            }
            var W = "parsley:";
            function V(t) {
                return 0 === t.lastIndexOf(W, 0) ? t.substr(W.length) : t
            }
            function B() {
                var e = this,
                    i = window || n.g;
                r(this, {
                    isNativeEvent: function(t) {
                        return t.originalEvent && !1 !== t.originalEvent.isTrusted
                    },
                    fakeInputEvent: function(n) {
                        e.isNativeEvent(n) && t(n.target).trigger("input")
                    },
                    misbehaves: function(n) {
                        e.isNativeEvent(n) && (e.behavesOk(n), t(document).on("change.inputevent", n.data.selector, e.fakeInputEvent), e.fakeInputEvent(n))
                    },
                    behavesOk: function(n) {
                        e.isNativeEvent(n) && t(document).off("input.inputevent", n.data.selector, e.behavesOk).off("change.inputevent", n.data.selector, e.misbehaves)
                    },
                    install: function() {
                        if (!i.inputEventPatched) {
                            i.inputEventPatched = "0.0.3";
                            for (var n = 0, r = ["select", 'input[type="checkbox"]', 'input[type="radio"]', 'input[type="file"]']; n < r.length; n++) {
                                var s = r[n];
                                t(document).on("input.inputevent", s, {
                                    selector: s
                                }, e.behavesOk).on("change.inputevent", s, {
                                    selector: s
                                }, e.misbehaves)
                            }
                        }
                    },
                    uninstall: function() {
                        delete i.inputEventPatched,
                        t(document).off(".inputevent")
                    }
                })
            }
            return t.listen = function(t, n) {
                var i;
                if (H(), "object" === e(arguments[1]) && "function" == typeof arguments[2] && (i = arguments[1], n = arguments[2]), "function" != typeof n)
                    throw new Error("Wrong parameters");
                window.Parsley.on(V(t), z(n, i))
            }, t.listenTo = function(t, e, n) {
                if (H(), !(t instanceof O || t instanceof k))
                    throw new Error("Must give Parsley instance");
                if ("string" != typeof e || "function" != typeof n)
                    throw new Error("Wrong parameters");
                t.on(V(e), z(n))
            }, t.unsubscribe = function(t, e) {
                if (H(), "string" != typeof t || "function" != typeof e)
                    throw new Error("Wrong arguments");
                window.Parsley.off(V(t), e.parsleyAdaptedCallback)
            }, t.unsubscribeTo = function(t, e) {
                if (H(), !(t instanceof O || t instanceof k))
                    throw new Error("Must give Parsley instance");
                t.off(V(e))
            }, t.unsubscribeAll = function(e) {
                H(),
                window.Parsley.off(V(e)),
                t("form,input,textarea,select").each((function() {
                    var n = t(this).data("Parsley");
                    n && n.off(V(e))
                }))
            }, t.emit = function(t, e) {
                var n;
                H();
                var i = e instanceof O || e instanceof k,
                    r = Array.prototype.slice.call(arguments, i ? 2 : 1);
                r.unshift(V(t)),
                i || (e = window.Parsley),
                (n = e).trigger.apply(n, o(r))
            }, t.extend(!0, R, {
                asyncValidators: {
                    default: {
                        fn: function(t) {
                            return t.status >= 200 && t.status < 300
                        },
                        url: !1
                    },
                    reverse: {
                        fn: function(t) {
                            return t.status < 200 || t.status >= 300
                        },
                        url: !1
                    }
                },
                addAsyncValidator: function(t, e, n, i) {
                    return R.asyncValidators[t] = {
                        fn: e,
                        url: n || !1,
                        options: i || {}
                    }, this
                }
            }), R.addValidator("remote", {
                requirementType: {
                    "": "string",
                    validator: "string",
                    reverse: "boolean",
                    options: "object"
                },
                validateString: function(e, n, i, r) {
                    var s,
                        o,
                        a = {},
                        l = i.validator || (!0 === i.reverse ? "reverse" : "default");
                    if (void 0 === R.asyncValidators[l])
                        throw new Error("Calling an undefined async validator: `" + l + "`");
                    (n = R.asyncValidators[l].url || n).indexOf("{value}") > -1 ? n = n.replace("{value}", encodeURIComponent(e)) : a[r.element.getAttribute("name") || r.element.getAttribute("id")] = e;
                    var u = t.extend(!0, i.options || {}, R.asyncValidators[l].options);
                    s = t.extend(!0, {}, {
                        url: n,
                        data: a,
                        type: "GET"
                    }, u),
                    r.trigger("field:ajaxoptions", r, s),
                    o = t.param(s),
                    void 0 === R._remoteCache && (R._remoteCache = {});
                    var c = R._remoteCache[o] = R._remoteCache[o] || t.ajax(s),
                        h = function() {
                            var e = R.asyncValidators[l].fn.call(r, c, n, i);
                            return e || (e = t.Deferred().reject()), t.when(e)
                        };
                    return c.then(h, h)
                },
                priority: -1
            }), R.on("form:submit", (function() {
                R._remoteCache = {}
            })), v.prototype.addAsyncValidator = function() {
                return g.warnOnce("Accessing the method `addAsyncValidator` through an instance is deprecated. Simply call `Parsley.addAsyncValidator(...)`"), R.addAsyncValidator.apply(R, arguments)
            }, R.addMessages("en", {
                defaultMessage: "This value seems to be invalid.",
                type: {
                    email: "This value should be a valid email.",
                    url: "This value should be a valid url.",
                    number: "This value should be a valid number.",
                    integer: "This value should be a valid integer.",
                    digits: "This value should be digits.",
                    alphanum: "This value should be alphanumeric."
                },
                notblank: "This value should not be blank.",
                required: "This value is required.",
                pattern: "This value seems to be invalid.",
                min: "This value should be greater than or equal to %s.",
                max: "This value should be lower than or equal to %s.",
                range: "This value should be between %s and %s.",
                minlength: "This value is too short. It should have %s characters or more.",
                maxlength: "This value is too long. It should have %s characters or fewer.",
                length: "This value length is invalid. It should be between %s and %s characters long.",
                mincheck: "You must select at least %s choices.",
                maxcheck: "You must select %s choices or fewer.",
                check: "You must select between %s and %s choices.",
                equalto: "This value should be the same.",
                euvatin: "It's not a valid VAT Identification Number."
            }), R.setLocale("en"), (new B).install(), R
        }(n(755))
    }
}]);
//# sourceMappingURL=vendor.js.map