var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

// example of simple includes for js
/*! jQuery v3.0.0 | (c) jQuery Foundation | jquery.org/license */
!function (a, b) {
    "use strict";
    "object" == (typeof module === "undefined" ? "undefined" : _typeof(module)) && "object" == _typeof(module.exports) ? module.exports = a.document ? b(a, !0) : function (a) {
        if (!a.document) throw new Error("jQuery requires a window with a document");return b(a);
    } : b(a);
}("undefined" != typeof window ? window : this, function (a, b) {
    "use strict";
    var c = [],
        d = a.document,
        e = Object.getPrototypeOf,
        f = c.slice,
        g = c.concat,
        h = c.push,
        i = c.indexOf,
        j = {},
        k = j.toString,
        l = j.hasOwnProperty,
        m = l.toString,
        n = m.call(Object),
        o = {};function p(a, b) {
        b = b || d;var c = b.createElement("script");c.text = a, b.head.appendChild(c).parentNode.removeChild(c);
    }var q = "3.0.0",
        r = function r(a, b) {
        return new r.fn.init(a, b);
    },
        s = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
        t = /^-ms-/,
        u = /-([a-z])/g,
        v = function v(a, b) {
        return b.toUpperCase();
    };r.fn = r.prototype = { jquery: q, constructor: r, length: 0, toArray: function toArray() {
            return f.call(this);
        }, get: function get(a) {
            return null != a ? 0 > a ? this[a + this.length] : this[a] : f.call(this);
        }, pushStack: function pushStack(a) {
            var b = r.merge(this.constructor(), a);return b.prevObject = this, b;
        }, each: function each(a) {
            return r.each(this, a);
        }, map: function map(a) {
            return this.pushStack(r.map(this, function (b, c) {
                return a.call(b, c, b);
            }));
        }, slice: function slice() {
            return this.pushStack(f.apply(this, arguments));
        }, first: function first() {
            return this.eq(0);
        }, last: function last() {
            return this.eq(-1);
        }, eq: function eq(a) {
            var b = this.length,
                c = +a + (0 > a ? b : 0);return this.pushStack(c >= 0 && b > c ? [this[c]] : []);
        }, end: function end() {
            return this.prevObject || this.constructor();
        }, push: h, sort: c.sort, splice: c.splice }, r.extend = r.fn.extend = function () {
        var a,
            b,
            c,
            d,
            e,
            f,
            g = arguments[0] || {},
            h = 1,
            i = arguments.length,
            j = !1;for ("boolean" == typeof g && (j = g, g = arguments[h] || {}, h++), "object" == (typeof g === "undefined" ? "undefined" : _typeof(g)) || r.isFunction(g) || (g = {}), h === i && (g = this, h--); i > h; h++) {
            if (null != (a = arguments[h])) for (b in a) {
                c = g[b], d = a[b], g !== d && (j && d && (r.isPlainObject(d) || (e = r.isArray(d))) ? (e ? (e = !1, f = c && r.isArray(c) ? c : []) : f = c && r.isPlainObject(c) ? c : {}, g[b] = r.extend(j, f, d)) : void 0 !== d && (g[b] = d));
            }
        }return g;
    }, r.extend({ expando: "jQuery" + (q + Math.random()).replace(/\D/g, ""), isReady: !0, error: function error(a) {
            throw new Error(a);
        }, noop: function noop() {}, isFunction: function isFunction(a) {
            return "function" === r.type(a);
        }, isArray: Array.isArray, isWindow: function isWindow(a) {
            return null != a && a === a.window;
        }, isNumeric: function isNumeric(a) {
            var b = r.type(a);return ("number" === b || "string" === b) && !isNaN(a - parseFloat(a));
        }, isPlainObject: function isPlainObject(a) {
            var b, c;return a && "[object Object]" === k.call(a) ? (b = e(a)) ? (c = l.call(b, "constructor") && b.constructor, "function" == typeof c && m.call(c) === n) : !0 : !1;
        }, isEmptyObject: function isEmptyObject(a) {
            var b;for (b in a) {
                return !1;
            }return !0;
        }, type: function type(a) {
            return null == a ? a + "" : "object" == (typeof a === "undefined" ? "undefined" : _typeof(a)) || "function" == typeof a ? j[k.call(a)] || "object" : typeof a === "undefined" ? "undefined" : _typeof(a);
        }, globalEval: function globalEval(a) {
            p(a);
        }, camelCase: function camelCase(a) {
            return a.replace(t, "ms-").replace(u, v);
        }, nodeName: function nodeName(a, b) {
            return a.nodeName && a.nodeName.toLowerCase() === b.toLowerCase();
        }, each: function each(a, b) {
            var c,
                d = 0;if (w(a)) {
                for (c = a.length; c > d; d++) {
                    if (b.call(a[d], d, a[d]) === !1) break;
                }
            } else for (d in a) {
                if (b.call(a[d], d, a[d]) === !1) break;
            }return a;
        }, trim: function trim(a) {
            return null == a ? "" : (a + "").replace(s, "");
        }, makeArray: function makeArray(a, b) {
            var c = b || [];return null != a && (w(Object(a)) ? r.merge(c, "string" == typeof a ? [a] : a) : h.call(c, a)), c;
        }, inArray: function inArray(a, b, c) {
            return null == b ? -1 : i.call(b, a, c);
        }, merge: function merge(a, b) {
            for (var c = +b.length, d = 0, e = a.length; c > d; d++) {
                a[e++] = b[d];
            }return a.length = e, a;
        }, grep: function grep(a, b, c) {
            for (var d, e = [], f = 0, g = a.length, h = !c; g > f; f++) {
                d = !b(a[f], f), d !== h && e.push(a[f]);
            }return e;
        }, map: function map(a, b, c) {
            var d,
                e,
                f = 0,
                h = [];if (w(a)) for (d = a.length; d > f; f++) {
                e = b(a[f], f, c), null != e && h.push(e);
            } else for (f in a) {
                e = b(a[f], f, c), null != e && h.push(e);
            }return g.apply([], h);
        }, guid: 1, proxy: function proxy(a, b) {
            var c, d, e;return "string" == typeof b && (c = a[b], b = a, a = c), r.isFunction(a) ? (d = f.call(arguments, 2), e = function e() {
                return a.apply(b || this, d.concat(f.call(arguments)));
            }, e.guid = a.guid = a.guid || r.guid++, e) : void 0;
        }, now: Date.now, support: o }), "function" == typeof Symbol && (r.fn[Symbol.iterator] = c[Symbol.iterator]), r.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), function (a, b) {
        j["[object " + b + "]"] = b.toLowerCase();
    });function w(a) {
        var b = !!a && "length" in a && a.length,
            c = r.type(a);return "function" === c || r.isWindow(a) ? !1 : "array" === c || 0 === b || "number" == typeof b && b > 0 && b - 1 in a;
    }var x = function (a) {
        var b,
            c,
            d,
            e,
            f,
            g,
            h,
            i,
            j,
            k,
            l,
            m,
            n,
            o,
            p,
            q,
            r,
            s,
            t,
            u = "sizzle" + 1 * new Date(),
            v = a.document,
            w = 0,
            x = 0,
            y = ha(),
            z = ha(),
            A = ha(),
            B = function B(a, b) {
            return a === b && (l = !0), 0;
        },
            C = {}.hasOwnProperty,
            D = [],
            E = D.pop,
            F = D.push,
            G = D.push,
            H = D.slice,
            I = function I(a, b) {
            for (var c = 0, d = a.length; d > c; c++) {
                if (a[c] === b) return c;
            }return -1;
        },
            J = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
            K = "[\\x20\\t\\r\\n\\f]",
            L = "(?:\\\\.|[\\w-]|[^\x00-\\xa0])+",
            M = "\\[" + K + "*(" + L + ")(?:" + K + "*([*^$|!~]?=)" + K + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + L + "))|)" + K + "*\\]",
            N = ":(" + L + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + M + ")*)|.*)\\)|)",
            O = new RegExp(K + "+", "g"),
            P = new RegExp("^" + K + "+|((?:^|[^\\\\])(?:\\\\.)*)" + K + "+$", "g"),
            Q = new RegExp("^" + K + "*," + K + "*"),
            R = new RegExp("^" + K + "*([>+~]|" + K + ")" + K + "*"),
            S = new RegExp("=" + K + "*([^\\]'\"]*?)" + K + "*\\]", "g"),
            T = new RegExp(N),
            U = new RegExp("^" + L + "$"),
            V = { ID: new RegExp("^#(" + L + ")"), CLASS: new RegExp("^\\.(" + L + ")"), TAG: new RegExp("^(" + L + "|[*])"), ATTR: new RegExp("^" + M), PSEUDO: new RegExp("^" + N), CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + K + "*(even|odd|(([+-]|)(\\d*)n|)" + K + "*(?:([+-]|)" + K + "*(\\d+)|))" + K + "*\\)|)", "i"), bool: new RegExp("^(?:" + J + ")$", "i"), needsContext: new RegExp("^" + K + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + K + "*((?:-\\d)?\\d*)" + K + "*\\)|)(?=[^-]|$)", "i") },
            W = /^(?:input|select|textarea|button)$/i,
            X = /^h\d$/i,
            Y = /^[^{]+\{\s*\[native \w/,
            Z = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
            $ = /[+~]/,
            _ = new RegExp("\\\\([\\da-f]{1,6}" + K + "?|(" + K + ")|.)", "ig"),
            aa = function aa(a, b, c) {
            var d = "0x" + b - 65536;return d !== d || c ? b : 0 > d ? String.fromCharCode(d + 65536) : String.fromCharCode(d >> 10 | 55296, 1023 & d | 56320);
        },
            ba = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\x80-\uFFFF\w-]/g,
            ca = function ca(a, b) {
            return b ? "\x00" === a ? "\uFFFD" : a.slice(0, -1) + "\\" + a.charCodeAt(a.length - 1).toString(16) + " " : "\\" + a;
        },
            da = function da() {
            m();
        },
            ea = ta(function (a) {
            return a.disabled === !0;
        }, { dir: "parentNode", next: "legend" });try {
            G.apply(D = H.call(v.childNodes), v.childNodes), D[v.childNodes.length].nodeType;
        } catch (fa) {
            G = { apply: D.length ? function (a, b) {
                    F.apply(a, H.call(b));
                } : function (a, b) {
                    var c = a.length,
                        d = 0;while (a[c++] = b[d++]) {}a.length = c - 1;
                } };
        }function ga(a, b, d, e) {
            var f,
                h,
                j,
                k,
                l,
                o,
                r,
                s = b && b.ownerDocument,
                w = b ? b.nodeType : 9;if (d = d || [], "string" != typeof a || !a || 1 !== w && 9 !== w && 11 !== w) return d;if (!e && ((b ? b.ownerDocument || b : v) !== n && m(b), b = b || n, p)) {
                if (11 !== w && (l = Z.exec(a))) if (f = l[1]) {
                    if (9 === w) {
                        if (!(j = b.getElementById(f))) return d;if (j.id === f) return d.push(j), d;
                    } else if (s && (j = s.getElementById(f)) && t(b, j) && j.id === f) return d.push(j), d;
                } else {
                    if (l[2]) return G.apply(d, b.getElementsByTagName(a)), d;if ((f = l[3]) && c.getElementsByClassName && b.getElementsByClassName) return G.apply(d, b.getElementsByClassName(f)), d;
                }if (c.qsa && !A[a + " "] && (!q || !q.test(a))) {
                    if (1 !== w) s = b, r = a;else if ("object" !== b.nodeName.toLowerCase()) {
                        (k = b.getAttribute("id")) ? k = k.replace(ba, ca) : b.setAttribute("id", k = u), o = g(a), h = o.length;while (h--) {
                            o[h] = "#" + k + " " + sa(o[h]);
                        }r = o.join(","), s = $.test(a) && qa(b.parentNode) || b;
                    }if (r) try {
                        return G.apply(d, s.querySelectorAll(r)), d;
                    } catch (x) {} finally {
                        k === u && b.removeAttribute("id");
                    }
                }
            }return i(a.replace(P, "$1"), b, d, e);
        }function ha() {
            var a = [];function b(c, e) {
                return a.push(c + " ") > d.cacheLength && delete b[a.shift()], b[c + " "] = e;
            }return b;
        }function ia(a) {
            return a[u] = !0, a;
        }function ja(a) {
            var b = n.createElement("fieldset");try {
                return !!a(b);
            } catch (c) {
                return !1;
            } finally {
                b.parentNode && b.parentNode.removeChild(b), b = null;
            }
        }function ka(a, b) {
            var c = a.split("|"),
                e = c.length;while (e--) {
                d.attrHandle[c[e]] = b;
            }
        }function la(a, b) {
            var c = b && a,
                d = c && 1 === a.nodeType && 1 === b.nodeType && a.sourceIndex - b.sourceIndex;if (d) return d;if (c) while (c = c.nextSibling) {
                if (c === b) return -1;
            }return a ? 1 : -1;
        }function ma(a) {
            return function (b) {
                var c = b.nodeName.toLowerCase();return "input" === c && b.type === a;
            };
        }function na(a) {
            return function (b) {
                var c = b.nodeName.toLowerCase();return ("input" === c || "button" === c) && b.type === a;
            };
        }function oa(a) {
            return function (b) {
                return "label" in b && b.disabled === a || "form" in b && b.disabled === a || "form" in b && b.disabled === !1 && (b.isDisabled === a || b.isDisabled !== !a && ("label" in b || !ea(b)) !== a);
            };
        }function pa(a) {
            return ia(function (b) {
                return b = +b, ia(function (c, d) {
                    var e,
                        f = a([], c.length, b),
                        g = f.length;while (g--) {
                        c[e = f[g]] && (c[e] = !(d[e] = c[e]));
                    }
                });
            });
        }function qa(a) {
            return a && "undefined" != typeof a.getElementsByTagName && a;
        }c = ga.support = {}, f = ga.isXML = function (a) {
            var b = a && (a.ownerDocument || a).documentElement;return b ? "HTML" !== b.nodeName : !1;
        }, m = ga.setDocument = function (a) {
            var b,
                e,
                g = a ? a.ownerDocument || a : v;return g !== n && 9 === g.nodeType && g.documentElement ? (n = g, o = n.documentElement, p = !f(n), v !== n && (e = n.defaultView) && e.top !== e && (e.addEventListener ? e.addEventListener("unload", da, !1) : e.attachEvent && e.attachEvent("onunload", da)), c.attributes = ja(function (a) {
                return a.className = "i", !a.getAttribute("className");
            }), c.getElementsByTagName = ja(function (a) {
                return a.appendChild(n.createComment("")), !a.getElementsByTagName("*").length;
            }), c.getElementsByClassName = Y.test(n.getElementsByClassName), c.getById = ja(function (a) {
                return o.appendChild(a).id = u, !n.getElementsByName || !n.getElementsByName(u).length;
            }), c.getById ? (d.find.ID = function (a, b) {
                if ("undefined" != typeof b.getElementById && p) {
                    var c = b.getElementById(a);return c ? [c] : [];
                }
            }, d.filter.ID = function (a) {
                var b = a.replace(_, aa);return function (a) {
                    return a.getAttribute("id") === b;
                };
            }) : (delete d.find.ID, d.filter.ID = function (a) {
                var b = a.replace(_, aa);return function (a) {
                    var c = "undefined" != typeof a.getAttributeNode && a.getAttributeNode("id");return c && c.value === b;
                };
            }), d.find.TAG = c.getElementsByTagName ? function (a, b) {
                return "undefined" != typeof b.getElementsByTagName ? b.getElementsByTagName(a) : c.qsa ? b.querySelectorAll(a) : void 0;
            } : function (a, b) {
                var c,
                    d = [],
                    e = 0,
                    f = b.getElementsByTagName(a);if ("*" === a) {
                    while (c = f[e++]) {
                        1 === c.nodeType && d.push(c);
                    }return d;
                }return f;
            }, d.find.CLASS = c.getElementsByClassName && function (a, b) {
                return "undefined" != typeof b.getElementsByClassName && p ? b.getElementsByClassName(a) : void 0;
            }, r = [], q = [], (c.qsa = Y.test(n.querySelectorAll)) && (ja(function (a) {
                o.appendChild(a).innerHTML = "<a id='" + u + "'></a><select id='" + u + "-\r\\' msallowcapture=''><option selected=''></option></select>", a.querySelectorAll("[msallowcapture^='']").length && q.push("[*^$]=" + K + "*(?:''|\"\")"), a.querySelectorAll("[selected]").length || q.push("\\[" + K + "*(?:value|" + J + ")"), a.querySelectorAll("[id~=" + u + "-]").length || q.push("~="), a.querySelectorAll(":checked").length || q.push(":checked"), a.querySelectorAll("a#" + u + "+*").length || q.push(".#.+[+~]");
            }), ja(function (a) {
                a.innerHTML = "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";var b = n.createElement("input");b.setAttribute("type", "hidden"), a.appendChild(b).setAttribute("name", "D"), a.querySelectorAll("[name=d]").length && q.push("name" + K + "*[*^$|!~]?="), 2 !== a.querySelectorAll(":enabled").length && q.push(":enabled", ":disabled"), o.appendChild(a).disabled = !0, 2 !== a.querySelectorAll(":disabled").length && q.push(":enabled", ":disabled"), a.querySelectorAll("*,:x"), q.push(",.*:");
            })), (c.matchesSelector = Y.test(s = o.matches || o.webkitMatchesSelector || o.mozMatchesSelector || o.oMatchesSelector || o.msMatchesSelector)) && ja(function (a) {
                c.disconnectedMatch = s.call(a, "*"), s.call(a, "[s!='']:x"), r.push("!=", N);
            }), q = q.length && new RegExp(q.join("|")), r = r.length && new RegExp(r.join("|")), b = Y.test(o.compareDocumentPosition), t = b || Y.test(o.contains) ? function (a, b) {
                var c = 9 === a.nodeType ? a.documentElement : a,
                    d = b && b.parentNode;return a === d || !(!d || 1 !== d.nodeType || !(c.contains ? c.contains(d) : a.compareDocumentPosition && 16 & a.compareDocumentPosition(d)));
            } : function (a, b) {
                if (b) while (b = b.parentNode) {
                    if (b === a) return !0;
                }return !1;
            }, B = b ? function (a, b) {
                if (a === b) return l = !0, 0;var d = !a.compareDocumentPosition - !b.compareDocumentPosition;return d ? d : (d = (a.ownerDocument || a) === (b.ownerDocument || b) ? a.compareDocumentPosition(b) : 1, 1 & d || !c.sortDetached && b.compareDocumentPosition(a) === d ? a === n || a.ownerDocument === v && t(v, a) ? -1 : b === n || b.ownerDocument === v && t(v, b) ? 1 : k ? I(k, a) - I(k, b) : 0 : 4 & d ? -1 : 1);
            } : function (a, b) {
                if (a === b) return l = !0, 0;var c,
                    d = 0,
                    e = a.parentNode,
                    f = b.parentNode,
                    g = [a],
                    h = [b];if (!e || !f) return a === n ? -1 : b === n ? 1 : e ? -1 : f ? 1 : k ? I(k, a) - I(k, b) : 0;if (e === f) return la(a, b);c = a;while (c = c.parentNode) {
                    g.unshift(c);
                }c = b;while (c = c.parentNode) {
                    h.unshift(c);
                }while (g[d] === h[d]) {
                    d++;
                }return d ? la(g[d], h[d]) : g[d] === v ? -1 : h[d] === v ? 1 : 0;
            }, n) : n;
        }, ga.matches = function (a, b) {
            return ga(a, null, null, b);
        }, ga.matchesSelector = function (a, b) {
            if ((a.ownerDocument || a) !== n && m(a), b = b.replace(S, "='$1']"), c.matchesSelector && p && !A[b + " "] && (!r || !r.test(b)) && (!q || !q.test(b))) try {
                var d = s.call(a, b);if (d || c.disconnectedMatch || a.document && 11 !== a.document.nodeType) return d;
            } catch (e) {}return ga(b, n, null, [a]).length > 0;
        }, ga.contains = function (a, b) {
            return (a.ownerDocument || a) !== n && m(a), t(a, b);
        }, ga.attr = function (a, b) {
            (a.ownerDocument || a) !== n && m(a);var e = d.attrHandle[b.toLowerCase()],
                f = e && C.call(d.attrHandle, b.toLowerCase()) ? e(a, b, !p) : void 0;return void 0 !== f ? f : c.attributes || !p ? a.getAttribute(b) : (f = a.getAttributeNode(b)) && f.specified ? f.value : null;
        }, ga.escape = function (a) {
            return (a + "").replace(ba, ca);
        }, ga.error = function (a) {
            throw new Error("Syntax error, unrecognized expression: " + a);
        }, ga.uniqueSort = function (a) {
            var b,
                d = [],
                e = 0,
                f = 0;if (l = !c.detectDuplicates, k = !c.sortStable && a.slice(0), a.sort(B), l) {
                while (b = a[f++]) {
                    b === a[f] && (e = d.push(f));
                }while (e--) {
                    a.splice(d[e], 1);
                }
            }return k = null, a;
        }, e = ga.getText = function (a) {
            var b,
                c = "",
                d = 0,
                f = a.nodeType;if (f) {
                if (1 === f || 9 === f || 11 === f) {
                    if ("string" == typeof a.textContent) return a.textContent;for (a = a.firstChild; a; a = a.nextSibling) {
                        c += e(a);
                    }
                } else if (3 === f || 4 === f) return a.nodeValue;
            } else while (b = a[d++]) {
                c += e(b);
            }return c;
        }, d = ga.selectors = { cacheLength: 50, createPseudo: ia, match: V, attrHandle: {}, find: {}, relative: { ">": { dir: "parentNode", first: !0 }, " ": { dir: "parentNode" }, "+": { dir: "previousSibling", first: !0 }, "~": { dir: "previousSibling" } }, preFilter: { ATTR: function ATTR(a) {
                    return a[1] = a[1].replace(_, aa), a[3] = (a[3] || a[4] || a[5] || "").replace(_, aa), "~=" === a[2] && (a[3] = " " + a[3] + " "), a.slice(0, 4);
                }, CHILD: function CHILD(a) {
                    return a[1] = a[1].toLowerCase(), "nth" === a[1].slice(0, 3) ? (a[3] || ga.error(a[0]), a[4] = +(a[4] ? a[5] + (a[6] || 1) : 2 * ("even" === a[3] || "odd" === a[3])), a[5] = +(a[7] + a[8] || "odd" === a[3])) : a[3] && ga.error(a[0]), a;
                }, PSEUDO: function PSEUDO(a) {
                    var b,
                        c = !a[6] && a[2];return V.CHILD.test(a[0]) ? null : (a[3] ? a[2] = a[4] || a[5] || "" : c && T.test(c) && (b = g(c, !0)) && (b = c.indexOf(")", c.length - b) - c.length) && (a[0] = a[0].slice(0, b), a[2] = c.slice(0, b)), a.slice(0, 3));
                } }, filter: { TAG: function TAG(a) {
                    var b = a.replace(_, aa).toLowerCase();return "*" === a ? function () {
                        return !0;
                    } : function (a) {
                        return a.nodeName && a.nodeName.toLowerCase() === b;
                    };
                }, CLASS: function CLASS(a) {
                    var b = y[a + " "];return b || (b = new RegExp("(^|" + K + ")" + a + "(" + K + "|$)")) && y(a, function (a) {
                        return b.test("string" == typeof a.className && a.className || "undefined" != typeof a.getAttribute && a.getAttribute("class") || "");
                    });
                }, ATTR: function ATTR(a, b, c) {
                    return function (d) {
                        var e = ga.attr(d, a);return null == e ? "!=" === b : b ? (e += "", "=" === b ? e === c : "!=" === b ? e !== c : "^=" === b ? c && 0 === e.indexOf(c) : "*=" === b ? c && e.indexOf(c) > -1 : "$=" === b ? c && e.slice(-c.length) === c : "~=" === b ? (" " + e.replace(O, " ") + " ").indexOf(c) > -1 : "|=" === b ? e === c || e.slice(0, c.length + 1) === c + "-" : !1) : !0;
                    };
                }, CHILD: function CHILD(a, b, c, d, e) {
                    var f = "nth" !== a.slice(0, 3),
                        g = "last" !== a.slice(-4),
                        h = "of-type" === b;return 1 === d && 0 === e ? function (a) {
                        return !!a.parentNode;
                    } : function (b, c, i) {
                        var j,
                            k,
                            l,
                            m,
                            n,
                            o,
                            p = f !== g ? "nextSibling" : "previousSibling",
                            q = b.parentNode,
                            r = h && b.nodeName.toLowerCase(),
                            s = !i && !h,
                            t = !1;if (q) {
                            if (f) {
                                while (p) {
                                    m = b;while (m = m[p]) {
                                        if (h ? m.nodeName.toLowerCase() === r : 1 === m.nodeType) return !1;
                                    }o = p = "only" === a && !o && "nextSibling";
                                }return !0;
                            }if (o = [g ? q.firstChild : q.lastChild], g && s) {
                                m = q, l = m[u] || (m[u] = {}), k = l[m.uniqueID] || (l[m.uniqueID] = {}), j = k[a] || [], n = j[0] === w && j[1], t = n && j[2], m = n && q.childNodes[n];while (m = ++n && m && m[p] || (t = n = 0) || o.pop()) {
                                    if (1 === m.nodeType && ++t && m === b) {
                                        k[a] = [w, n, t];break;
                                    }
                                }
                            } else if (s && (m = b, l = m[u] || (m[u] = {}), k = l[m.uniqueID] || (l[m.uniqueID] = {}), j = k[a] || [], n = j[0] === w && j[1], t = n), t === !1) while (m = ++n && m && m[p] || (t = n = 0) || o.pop()) {
                                if ((h ? m.nodeName.toLowerCase() === r : 1 === m.nodeType) && ++t && (s && (l = m[u] || (m[u] = {}), k = l[m.uniqueID] || (l[m.uniqueID] = {}), k[a] = [w, t]), m === b)) break;
                            }return t -= e, t === d || t % d === 0 && t / d >= 0;
                        }
                    };
                }, PSEUDO: function PSEUDO(a, b) {
                    var c,
                        e = d.pseudos[a] || d.setFilters[a.toLowerCase()] || ga.error("unsupported pseudo: " + a);return e[u] ? e(b) : e.length > 1 ? (c = [a, a, "", b], d.setFilters.hasOwnProperty(a.toLowerCase()) ? ia(function (a, c) {
                        var d,
                            f = e(a, b),
                            g = f.length;while (g--) {
                            d = I(a, f[g]), a[d] = !(c[d] = f[g]);
                        }
                    }) : function (a) {
                        return e(a, 0, c);
                    }) : e;
                } }, pseudos: { not: ia(function (a) {
                    var b = [],
                        c = [],
                        d = h(a.replace(P, "$1"));return d[u] ? ia(function (a, b, c, e) {
                        var f,
                            g = d(a, null, e, []),
                            h = a.length;while (h--) {
                            (f = g[h]) && (a[h] = !(b[h] = f));
                        }
                    }) : function (a, e, f) {
                        return b[0] = a, d(b, null, f, c), b[0] = null, !c.pop();
                    };
                }), has: ia(function (a) {
                    return function (b) {
                        return ga(a, b).length > 0;
                    };
                }), contains: ia(function (a) {
                    return a = a.replace(_, aa), function (b) {
                        return (b.textContent || b.innerText || e(b)).indexOf(a) > -1;
                    };
                }), lang: ia(function (a) {
                    return U.test(a || "") || ga.error("unsupported lang: " + a), a = a.replace(_, aa).toLowerCase(), function (b) {
                        var c;do {
                            if (c = p ? b.lang : b.getAttribute("xml:lang") || b.getAttribute("lang")) return c = c.toLowerCase(), c === a || 0 === c.indexOf(a + "-");
                        } while ((b = b.parentNode) && 1 === b.nodeType);return !1;
                    };
                }), target: function target(b) {
                    var c = a.location && a.location.hash;return c && c.slice(1) === b.id;
                }, root: function root(a) {
                    return a === o;
                }, focus: function focus(a) {
                    return a === n.activeElement && (!n.hasFocus || n.hasFocus()) && !!(a.type || a.href || ~a.tabIndex);
                }, enabled: oa(!1), disabled: oa(!0), checked: function checked(a) {
                    var b = a.nodeName.toLowerCase();return "input" === b && !!a.checked || "option" === b && !!a.selected;
                }, selected: function selected(a) {
                    return a.parentNode && a.parentNode.selectedIndex, a.selected === !0;
                }, empty: function empty(a) {
                    for (a = a.firstChild; a; a = a.nextSibling) {
                        if (a.nodeType < 6) return !1;
                    }return !0;
                }, parent: function parent(a) {
                    return !d.pseudos.empty(a);
                }, header: function header(a) {
                    return X.test(a.nodeName);
                }, input: function input(a) {
                    return W.test(a.nodeName);
                }, button: function button(a) {
                    var b = a.nodeName.toLowerCase();return "input" === b && "button" === a.type || "button" === b;
                }, text: function text(a) {
                    var b;return "input" === a.nodeName.toLowerCase() && "text" === a.type && (null == (b = a.getAttribute("type")) || "text" === b.toLowerCase());
                }, first: pa(function () {
                    return [0];
                }), last: pa(function (a, b) {
                    return [b - 1];
                }), eq: pa(function (a, b, c) {
                    return [0 > c ? c + b : c];
                }), even: pa(function (a, b) {
                    for (var c = 0; b > c; c += 2) {
                        a.push(c);
                    }return a;
                }), odd: pa(function (a, b) {
                    for (var c = 1; b > c; c += 2) {
                        a.push(c);
                    }return a;
                }), lt: pa(function (a, b, c) {
                    for (var d = 0 > c ? c + b : c; --d >= 0;) {
                        a.push(d);
                    }return a;
                }), gt: pa(function (a, b, c) {
                    for (var d = 0 > c ? c + b : c; ++d < b;) {
                        a.push(d);
                    }return a;
                }) } }, d.pseudos.nth = d.pseudos.eq;for (b in { radio: !0, checkbox: !0, file: !0, password: !0, image: !0 }) {
            d.pseudos[b] = ma(b);
        }for (b in { submit: !0, reset: !0 }) {
            d.pseudos[b] = na(b);
        }function ra() {}ra.prototype = d.filters = d.pseudos, d.setFilters = new ra(), g = ga.tokenize = function (a, b) {
            var c,
                e,
                f,
                g,
                h,
                i,
                j,
                k = z[a + " "];if (k) return b ? 0 : k.slice(0);h = a, i = [], j = d.preFilter;while (h) {
                c && !(e = Q.exec(h)) || (e && (h = h.slice(e[0].length) || h), i.push(f = [])), c = !1, (e = R.exec(h)) && (c = e.shift(), f.push({ value: c, type: e[0].replace(P, " ") }), h = h.slice(c.length));for (g in d.filter) {
                    !(e = V[g].exec(h)) || j[g] && !(e = j[g](e)) || (c = e.shift(), f.push({ value: c, type: g, matches: e }), h = h.slice(c.length));
                }if (!c) break;
            }return b ? h.length : h ? ga.error(a) : z(a, i).slice(0);
        };function sa(a) {
            for (var b = 0, c = a.length, d = ""; c > b; b++) {
                d += a[b].value;
            }return d;
        }function ta(a, b, c) {
            var d = b.dir,
                e = b.next,
                f = e || d,
                g = c && "parentNode" === f,
                h = x++;return b.first ? function (b, c, e) {
                while (b = b[d]) {
                    if (1 === b.nodeType || g) return a(b, c, e);
                }
            } : function (b, c, i) {
                var j,
                    k,
                    l,
                    m = [w, h];if (i) {
                    while (b = b[d]) {
                        if ((1 === b.nodeType || g) && a(b, c, i)) return !0;
                    }
                } else while (b = b[d]) {
                    if (1 === b.nodeType || g) if (l = b[u] || (b[u] = {}), k = l[b.uniqueID] || (l[b.uniqueID] = {}), e && e === b.nodeName.toLowerCase()) b = b[d] || b;else {
                        if ((j = k[f]) && j[0] === w && j[1] === h) return m[2] = j[2];if (k[f] = m, m[2] = a(b, c, i)) return !0;
                    }
                }
            };
        }function ua(a) {
            return a.length > 1 ? function (b, c, d) {
                var e = a.length;while (e--) {
                    if (!a[e](b, c, d)) return !1;
                }return !0;
            } : a[0];
        }function va(a, b, c) {
            for (var d = 0, e = b.length; e > d; d++) {
                ga(a, b[d], c);
            }return c;
        }function wa(a, b, c, d, e) {
            for (var f, g = [], h = 0, i = a.length, j = null != b; i > h; h++) {
                (f = a[h]) && (c && !c(f, d, e) || (g.push(f), j && b.push(h)));
            }return g;
        }function xa(a, b, c, d, e, f) {
            return d && !d[u] && (d = xa(d)), e && !e[u] && (e = xa(e, f)), ia(function (f, g, h, i) {
                var j,
                    k,
                    l,
                    m = [],
                    n = [],
                    o = g.length,
                    p = f || va(b || "*", h.nodeType ? [h] : h, []),
                    q = !a || !f && b ? p : wa(p, m, a, h, i),
                    r = c ? e || (f ? a : o || d) ? [] : g : q;if (c && c(q, r, h, i), d) {
                    j = wa(r, n), d(j, [], h, i), k = j.length;while (k--) {
                        (l = j[k]) && (r[n[k]] = !(q[n[k]] = l));
                    }
                }if (f) {
                    if (e || a) {
                        if (e) {
                            j = [], k = r.length;while (k--) {
                                (l = r[k]) && j.push(q[k] = l);
                            }e(null, r = [], j, i);
                        }k = r.length;while (k--) {
                            (l = r[k]) && (j = e ? I(f, l) : m[k]) > -1 && (f[j] = !(g[j] = l));
                        }
                    }
                } else r = wa(r === g ? r.splice(o, r.length) : r), e ? e(null, g, r, i) : G.apply(g, r);
            });
        }function ya(a) {
            for (var b, c, e, f = a.length, g = d.relative[a[0].type], h = g || d.relative[" "], i = g ? 1 : 0, k = ta(function (a) {
                return a === b;
            }, h, !0), l = ta(function (a) {
                return I(b, a) > -1;
            }, h, !0), m = [function (a, c, d) {
                var e = !g && (d || c !== j) || ((b = c).nodeType ? k(a, c, d) : l(a, c, d));return b = null, e;
            }]; f > i; i++) {
                if (c = d.relative[a[i].type]) m = [ta(ua(m), c)];else {
                    if (c = d.filter[a[i].type].apply(null, a[i].matches), c[u]) {
                        for (e = ++i; f > e; e++) {
                            if (d.relative[a[e].type]) break;
                        }return xa(i > 1 && ua(m), i > 1 && sa(a.slice(0, i - 1).concat({ value: " " === a[i - 2].type ? "*" : "" })).replace(P, "$1"), c, e > i && ya(a.slice(i, e)), f > e && ya(a = a.slice(e)), f > e && sa(a));
                    }m.push(c);
                }
            }return ua(m);
        }function za(a, b) {
            var c = b.length > 0,
                e = a.length > 0,
                f = function f(_f, g, h, i, k) {
                var l,
                    o,
                    q,
                    r = 0,
                    s = "0",
                    t = _f && [],
                    u = [],
                    v = j,
                    x = _f || e && d.find.TAG("*", k),
                    y = w += null == v ? 1 : Math.random() || .1,
                    z = x.length;for (k && (j = g === n || g || k); s !== z && null != (l = x[s]); s++) {
                    if (e && l) {
                        o = 0, g || l.ownerDocument === n || (m(l), h = !p);while (q = a[o++]) {
                            if (q(l, g || n, h)) {
                                i.push(l);break;
                            }
                        }k && (w = y);
                    }c && ((l = !q && l) && r--, _f && t.push(l));
                }if (r += s, c && s !== r) {
                    o = 0;while (q = b[o++]) {
                        q(t, u, g, h);
                    }if (_f) {
                        if (r > 0) while (s--) {
                            t[s] || u[s] || (u[s] = E.call(i));
                        }u = wa(u);
                    }G.apply(i, u), k && !_f && u.length > 0 && r + b.length > 1 && ga.uniqueSort(i);
                }return k && (w = y, j = v), t;
            };return c ? ia(f) : f;
        }return h = ga.compile = function (a, b) {
            var c,
                d = [],
                e = [],
                f = A[a + " "];if (!f) {
                b || (b = g(a)), c = b.length;while (c--) {
                    f = ya(b[c]), f[u] ? d.push(f) : e.push(f);
                }f = A(a, za(e, d)), f.selector = a;
            }return f;
        }, i = ga.select = function (a, b, e, f) {
            var i,
                j,
                k,
                l,
                m,
                n = "function" == typeof a && a,
                o = !f && g(a = n.selector || a);if (e = e || [], 1 === o.length) {
                if (j = o[0] = o[0].slice(0), j.length > 2 && "ID" === (k = j[0]).type && c.getById && 9 === b.nodeType && p && d.relative[j[1].type]) {
                    if (b = (d.find.ID(k.matches[0].replace(_, aa), b) || [])[0], !b) return e;n && (b = b.parentNode), a = a.slice(j.shift().value.length);
                }i = V.needsContext.test(a) ? 0 : j.length;while (i--) {
                    if (k = j[i], d.relative[l = k.type]) break;if ((m = d.find[l]) && (f = m(k.matches[0].replace(_, aa), $.test(j[0].type) && qa(b.parentNode) || b))) {
                        if (j.splice(i, 1), a = f.length && sa(j), !a) return G.apply(e, f), e;break;
                    }
                }
            }return (n || h(a, o))(f, b, !p, e, !b || $.test(a) && qa(b.parentNode) || b), e;
        }, c.sortStable = u.split("").sort(B).join("") === u, c.detectDuplicates = !!l, m(), c.sortDetached = ja(function (a) {
            return 1 & a.compareDocumentPosition(n.createElement("fieldset"));
        }), ja(function (a) {
            return a.innerHTML = "<a href='#'></a>", "#" === a.firstChild.getAttribute("href");
        }) || ka("type|href|height|width", function (a, b, c) {
            return c ? void 0 : a.getAttribute(b, "type" === b.toLowerCase() ? 1 : 2);
        }), c.attributes && ja(function (a) {
            return a.innerHTML = "<input/>", a.firstChild.setAttribute("value", ""), "" === a.firstChild.getAttribute("value");
        }) || ka("value", function (a, b, c) {
            return c || "input" !== a.nodeName.toLowerCase() ? void 0 : a.defaultValue;
        }), ja(function (a) {
            return null == a.getAttribute("disabled");
        }) || ka(J, function (a, b, c) {
            var d;return c ? void 0 : a[b] === !0 ? b.toLowerCase() : (d = a.getAttributeNode(b)) && d.specified ? d.value : null;
        }), ga;
    }(a);r.find = x, r.expr = x.selectors, r.expr[":"] = r.expr.pseudos, r.uniqueSort = r.unique = x.uniqueSort, r.text = x.getText, r.isXMLDoc = x.isXML, r.contains = x.contains, r.escapeSelector = x.escape;var y = function y(a, b, c) {
        var d = [],
            e = void 0 !== c;while ((a = a[b]) && 9 !== a.nodeType) {
            if (1 === a.nodeType) {
                if (e && r(a).is(c)) break;d.push(a);
            }
        }return d;
    },
        z = function z(a, b) {
        for (var c = []; a; a = a.nextSibling) {
            1 === a.nodeType && a !== b && c.push(a);
        }return c;
    },
        A = r.expr.match.needsContext,
        B = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i,
        C = /^.[^:#\[\.,]*$/;function D(a, b, c) {
        if (r.isFunction(b)) return r.grep(a, function (a, d) {
            return !!b.call(a, d, a) !== c;
        });if (b.nodeType) return r.grep(a, function (a) {
            return a === b !== c;
        });if ("string" == typeof b) {
            if (C.test(b)) return r.filter(b, a, c);b = r.filter(b, a);
        }return r.grep(a, function (a) {
            return i.call(b, a) > -1 !== c && 1 === a.nodeType;
        });
    }r.filter = function (a, b, c) {
        var d = b[0];return c && (a = ":not(" + a + ")"), 1 === b.length && 1 === d.nodeType ? r.find.matchesSelector(d, a) ? [d] : [] : r.find.matches(a, r.grep(b, function (a) {
            return 1 === a.nodeType;
        }));
    }, r.fn.extend({ find: function find(a) {
            var b,
                c,
                d = this.length,
                e = this;if ("string" != typeof a) return this.pushStack(r(a).filter(function () {
                for (b = 0; d > b; b++) {
                    if (r.contains(e[b], this)) return !0;
                }
            }));for (c = this.pushStack([]), b = 0; d > b; b++) {
                r.find(a, e[b], c);
            }return d > 1 ? r.uniqueSort(c) : c;
        }, filter: function filter(a) {
            return this.pushStack(D(this, a || [], !1));
        }, not: function not(a) {
            return this.pushStack(D(this, a || [], !0));
        }, is: function is(a) {
            return !!D(this, "string" == typeof a && A.test(a) ? r(a) : a || [], !1).length;
        } });var E,
        F = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/,
        G = r.fn.init = function (a, b, c) {
        var e, f;if (!a) return this;if (c = c || E, "string" == typeof a) {
            if (e = "<" === a[0] && ">" === a[a.length - 1] && a.length >= 3 ? [null, a, null] : F.exec(a), !e || !e[1] && b) return !b || b.jquery ? (b || c).find(a) : this.constructor(b).find(a);if (e[1]) {
                if (b = b instanceof r ? b[0] : b, r.merge(this, r.parseHTML(e[1], b && b.nodeType ? b.ownerDocument || b : d, !0)), B.test(e[1]) && r.isPlainObject(b)) for (e in b) {
                    r.isFunction(this[e]) ? this[e](b[e]) : this.attr(e, b[e]);
                }return this;
            }return f = d.getElementById(e[2]), f && (this[0] = f, this.length = 1), this;
        }return a.nodeType ? (this[0] = a, this.length = 1, this) : r.isFunction(a) ? void 0 !== c.ready ? c.ready(a) : a(r) : r.makeArray(a, this);
    };G.prototype = r.fn, E = r(d);var H = /^(?:parents|prev(?:Until|All))/,
        I = { children: !0, contents: !0, next: !0, prev: !0 };r.fn.extend({ has: function has(a) {
            var b = r(a, this),
                c = b.length;return this.filter(function () {
                for (var a = 0; c > a; a++) {
                    if (r.contains(this, b[a])) return !0;
                }
            });
        }, closest: function closest(a, b) {
            var c,
                d = 0,
                e = this.length,
                f = [],
                g = "string" != typeof a && r(a);if (!A.test(a)) for (; e > d; d++) {
                for (c = this[d]; c && c !== b; c = c.parentNode) {
                    if (c.nodeType < 11 && (g ? g.index(c) > -1 : 1 === c.nodeType && r.find.matchesSelector(c, a))) {
                        f.push(c);break;
                    }
                }
            }return this.pushStack(f.length > 1 ? r.uniqueSort(f) : f);
        }, index: function index(a) {
            return a ? "string" == typeof a ? i.call(r(a), this[0]) : i.call(this, a.jquery ? a[0] : a) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1;
        }, add: function add(a, b) {
            return this.pushStack(r.uniqueSort(r.merge(this.get(), r(a, b))));
        }, addBack: function addBack(a) {
            return this.add(null == a ? this.prevObject : this.prevObject.filter(a));
        } });function J(a, b) {
        while ((a = a[b]) && 1 !== a.nodeType) {}return a;
    }r.each({ parent: function parent(a) {
            var b = a.parentNode;return b && 11 !== b.nodeType ? b : null;
        }, parents: function parents(a) {
            return y(a, "parentNode");
        }, parentsUntil: function parentsUntil(a, b, c) {
            return y(a, "parentNode", c);
        }, next: function next(a) {
            return J(a, "nextSibling");
        }, prev: function prev(a) {
            return J(a, "previousSibling");
        }, nextAll: function nextAll(a) {
            return y(a, "nextSibling");
        }, prevAll: function prevAll(a) {
            return y(a, "previousSibling");
        }, nextUntil: function nextUntil(a, b, c) {
            return y(a, "nextSibling", c);
        }, prevUntil: function prevUntil(a, b, c) {
            return y(a, "previousSibling", c);
        }, siblings: function siblings(a) {
            return z((a.parentNode || {}).firstChild, a);
        }, children: function children(a) {
            return z(a.firstChild);
        }, contents: function contents(a) {
            return a.contentDocument || r.merge([], a.childNodes);
        } }, function (a, b) {
        r.fn[a] = function (c, d) {
            var e = r.map(this, b, c);return "Until" !== a.slice(-5) && (d = c), d && "string" == typeof d && (e = r.filter(d, e)), this.length > 1 && (I[a] || r.uniqueSort(e), H.test(a) && e.reverse()), this.pushStack(e);
        };
    });var K = /\S+/g;function L(a) {
        var b = {};return r.each(a.match(K) || [], function (a, c) {
            b[c] = !0;
        }), b;
    }r.Callbacks = function (a) {
        a = "string" == typeof a ? L(a) : r.extend({}, a);var b,
            c,
            d,
            e,
            f = [],
            g = [],
            h = -1,
            i = function i() {
            for (e = a.once, d = b = !0; g.length; h = -1) {
                c = g.shift();while (++h < f.length) {
                    f[h].apply(c[0], c[1]) === !1 && a.stopOnFalse && (h = f.length, c = !1);
                }
            }a.memory || (c = !1), b = !1, e && (f = c ? [] : "");
        },
            j = { add: function add() {
                return f && (c && !b && (h = f.length - 1, g.push(c)), function d(b) {
                    r.each(b, function (b, c) {
                        r.isFunction(c) ? a.unique && j.has(c) || f.push(c) : c && c.length && "string" !== r.type(c) && d(c);
                    });
                }(arguments), c && !b && i()), this;
            }, remove: function remove() {
                return r.each(arguments, function (a, b) {
                    var c;while ((c = r.inArray(b, f, c)) > -1) {
                        f.splice(c, 1), h >= c && h--;
                    }
                }), this;
            }, has: function has(a) {
                return a ? r.inArray(a, f) > -1 : f.length > 0;
            }, empty: function empty() {
                return f && (f = []), this;
            }, disable: function disable() {
                return e = g = [], f = c = "", this;
            }, disabled: function disabled() {
                return !f;
            }, lock: function lock() {
                return e = g = [], c || b || (f = c = ""), this;
            }, locked: function locked() {
                return !!e;
            }, fireWith: function fireWith(a, c) {
                return e || (c = c || [], c = [a, c.slice ? c.slice() : c], g.push(c), b || i()), this;
            }, fire: function fire() {
                return j.fireWith(this, arguments), this;
            }, fired: function fired() {
                return !!d;
            } };return j;
    };function M(a) {
        return a;
    }function N(a) {
        throw a;
    }function O(a, b, c) {
        var d;try {
            a && r.isFunction(d = a.promise) ? d.call(a).done(b).fail(c) : a && r.isFunction(d = a.then) ? d.call(a, b, c) : b.call(void 0, a);
        } catch (a) {
            c.call(void 0, a);
        }
    }r.extend({ Deferred: function Deferred(b) {
            var c = [["notify", "progress", r.Callbacks("memory"), r.Callbacks("memory"), 2], ["resolve", "done", r.Callbacks("once memory"), r.Callbacks("once memory"), 0, "resolved"], ["reject", "fail", r.Callbacks("once memory"), r.Callbacks("once memory"), 1, "rejected"]],
                d = "pending",
                e = { state: function state() {
                    return d;
                }, always: function always() {
                    return f.done(arguments).fail(arguments), this;
                }, "catch": function _catch(a) {
                    return e.then(null, a);
                }, pipe: function pipe() {
                    var a = arguments;return r.Deferred(function (b) {
                        r.each(c, function (c, d) {
                            var e = r.isFunction(a[d[4]]) && a[d[4]];f[d[1]](function () {
                                var a = e && e.apply(this, arguments);a && r.isFunction(a.promise) ? a.promise().progress(b.notify).done(b.resolve).fail(b.reject) : b[d[0] + "With"](this, e ? [a] : arguments);
                            });
                        }), a = null;
                    }).promise();
                }, then: function then(b, d, e) {
                    var f = 0;function g(b, c, d, e) {
                        return function () {
                            var h = this,
                                i = arguments,
                                j = function j() {
                                var a, j;if (!(f > b)) {
                                    if (a = d.apply(h, i), a === c.promise()) throw new TypeError("Thenable self-resolution");j = a && ("object" == (typeof a === "undefined" ? "undefined" : _typeof(a)) || "function" == typeof a) && a.then, r.isFunction(j) ? e ? j.call(a, g(f, c, M, e), g(f, c, N, e)) : (f++, j.call(a, g(f, c, M, e), g(f, c, N, e), g(f, c, M, c.notifyWith))) : (d !== M && (h = void 0, i = [a]), (e || c.resolveWith)(h, i));
                                }
                            },
                                k = e ? j : function () {
                                try {
                                    j();
                                } catch (a) {
                                    r.Deferred.exceptionHook && r.Deferred.exceptionHook(a, k.stackTrace), b + 1 >= f && (d !== N && (h = void 0, i = [a]), c.rejectWith(h, i));
                                }
                            };b ? k() : (r.Deferred.getStackHook && (k.stackTrace = r.Deferred.getStackHook()), a.setTimeout(k));
                        };
                    }return r.Deferred(function (a) {
                        c[0][3].add(g(0, a, r.isFunction(e) ? e : M, a.notifyWith)), c[1][3].add(g(0, a, r.isFunction(b) ? b : M)), c[2][3].add(g(0, a, r.isFunction(d) ? d : N));
                    }).promise();
                }, promise: function promise(a) {
                    return null != a ? r.extend(a, e) : e;
                } },
                f = {};return r.each(c, function (a, b) {
                var g = b[2],
                    h = b[5];e[b[1]] = g.add, h && g.add(function () {
                    d = h;
                }, c[3 - a][2].disable, c[0][2].lock), g.add(b[3].fire), f[b[0]] = function () {
                    return f[b[0] + "With"](this === f ? void 0 : this, arguments), this;
                }, f[b[0] + "With"] = g.fireWith;
            }), e.promise(f), b && b.call(f, f), f;
        }, when: function when(a) {
            var b = arguments.length,
                c = b,
                d = Array(c),
                e = f.call(arguments),
                g = r.Deferred(),
                h = function h(a) {
                return function (c) {
                    d[a] = this, e[a] = arguments.length > 1 ? f.call(arguments) : c, --b || g.resolveWith(d, e);
                };
            };if (1 >= b && (O(a, g.done(h(c)).resolve, g.reject), "pending" === g.state() || r.isFunction(e[c] && e[c].then))) return g.then();while (c--) {
                O(e[c], h(c), g.reject);
            }return g.promise();
        } });var P = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;r.Deferred.exceptionHook = function (b, c) {
        a.console && a.console.warn && b && P.test(b.name) && a.console.warn("jQuery.Deferred exception: " + b.message, b.stack, c);
    };var Q = r.Deferred();r.fn.ready = function (a) {
        return Q.then(a), this;
    }, r.extend({ isReady: !1, readyWait: 1, holdReady: function holdReady(a) {
            a ? r.readyWait++ : r.ready(!0);
        }, ready: function ready(a) {
            (a === !0 ? --r.readyWait : r.isReady) || (r.isReady = !0, a !== !0 && --r.readyWait > 0 || Q.resolveWith(d, [r]));
        } }), r.ready.then = Q.then;function R() {
        d.removeEventListener("DOMContentLoaded", R), a.removeEventListener("load", R), r.ready();
    }"complete" === d.readyState || "loading" !== d.readyState && !d.documentElement.doScroll ? a.setTimeout(r.ready) : (d.addEventListener("DOMContentLoaded", R), a.addEventListener("load", R));var S = function S(a, b, c, d, e, f, g) {
        var h = 0,
            i = a.length,
            j = null == c;if ("object" === r.type(c)) {
            e = !0;for (h in c) {
                S(a, b, h, c[h], !0, f, g);
            }
        } else if (void 0 !== d && (e = !0, r.isFunction(d) || (g = !0), j && (g ? (b.call(a, d), b = null) : (j = b, b = function b(a, _b, c) {
            return j.call(r(a), c);
        })), b)) for (; i > h; h++) {
            b(a[h], c, g ? d : d.call(a[h], h, b(a[h], c)));
        }return e ? a : j ? b.call(a) : i ? b(a[0], c) : f;
    },
        T = function T(a) {
        return 1 === a.nodeType || 9 === a.nodeType || !+a.nodeType;
    };function U() {
        this.expando = r.expando + U.uid++;
    }U.uid = 1, U.prototype = { cache: function cache(a) {
            var b = a[this.expando];return b || (b = {}, T(a) && (a.nodeType ? a[this.expando] = b : Object.defineProperty(a, this.expando, { value: b, configurable: !0 }))), b;
        }, set: function set(a, b, c) {
            var d,
                e = this.cache(a);if ("string" == typeof b) e[r.camelCase(b)] = c;else for (d in b) {
                e[r.camelCase(d)] = b[d];
            }return e;
        }, get: function get(a, b) {
            return void 0 === b ? this.cache(a) : a[this.expando] && a[this.expando][r.camelCase(b)];
        }, access: function access(a, b, c) {
            return void 0 === b || b && "string" == typeof b && void 0 === c ? this.get(a, b) : (this.set(a, b, c), void 0 !== c ? c : b);
        }, remove: function remove(a, b) {
            var c,
                d = a[this.expando];if (void 0 !== d) {
                if (void 0 !== b) {
                    r.isArray(b) ? b = b.map(r.camelCase) : (b = r.camelCase(b), b = b in d ? [b] : b.match(K) || []), c = b.length;while (c--) {
                        delete d[b[c]];
                    }
                }(void 0 === b || r.isEmptyObject(d)) && (a.nodeType ? a[this.expando] = void 0 : delete a[this.expando]);
            }
        }, hasData: function hasData(a) {
            var b = a[this.expando];return void 0 !== b && !r.isEmptyObject(b);
        } };var V = new U(),
        W = new U(),
        X = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
        Y = /[A-Z]/g;function Z(a, b, c) {
        var d;if (void 0 === c && 1 === a.nodeType) if (d = "data-" + b.replace(Y, "-$&").toLowerCase(), c = a.getAttribute(d), "string" == typeof c) {
            try {
                c = "true" === c ? !0 : "false" === c ? !1 : "null" === c ? null : +c + "" === c ? +c : X.test(c) ? JSON.parse(c) : c;
            } catch (e) {}W.set(a, b, c);
        } else c = void 0;return c;
    }r.extend({ hasData: function hasData(a) {
            return W.hasData(a) || V.hasData(a);
        }, data: function data(a, b, c) {
            return W.access(a, b, c);
        }, removeData: function removeData(a, b) {
            W.remove(a, b);
        }, _data: function _data(a, b, c) {
            return V.access(a, b, c);
        }, _removeData: function _removeData(a, b) {
            V.remove(a, b);
        } }), r.fn.extend({ data: function data(a, b) {
            var c,
                d,
                e,
                f = this[0],
                g = f && f.attributes;if (void 0 === a) {
                if (this.length && (e = W.get(f), 1 === f.nodeType && !V.get(f, "hasDataAttrs"))) {
                    c = g.length;while (c--) {
                        g[c] && (d = g[c].name, 0 === d.indexOf("data-") && (d = r.camelCase(d.slice(5)), Z(f, d, e[d])));
                    }V.set(f, "hasDataAttrs", !0);
                }return e;
            }return "object" == (typeof a === "undefined" ? "undefined" : _typeof(a)) ? this.each(function () {
                W.set(this, a);
            }) : S(this, function (b) {
                var c;if (f && void 0 === b) {
                    if (c = W.get(f, a), void 0 !== c) return c;if (c = Z(f, a), void 0 !== c) return c;
                } else this.each(function () {
                    W.set(this, a, b);
                });
            }, null, b, arguments.length > 1, null, !0);
        }, removeData: function removeData(a) {
            return this.each(function () {
                W.remove(this, a);
            });
        } }), r.extend({ queue: function queue(a, b, c) {
            var d;return a ? (b = (b || "fx") + "queue", d = V.get(a, b), c && (!d || r.isArray(c) ? d = V.access(a, b, r.makeArray(c)) : d.push(c)), d || []) : void 0;
        }, dequeue: function dequeue(a, b) {
            b = b || "fx";var c = r.queue(a, b),
                d = c.length,
                e = c.shift(),
                f = r._queueHooks(a, b),
                g = function g() {
                r.dequeue(a, b);
            };"inprogress" === e && (e = c.shift(), d--), e && ("fx" === b && c.unshift("inprogress"), delete f.stop, e.call(a, g, f)), !d && f && f.empty.fire();
        }, _queueHooks: function _queueHooks(a, b) {
            var c = b + "queueHooks";return V.get(a, c) || V.access(a, c, { empty: r.Callbacks("once memory").add(function () {
                    V.remove(a, [b + "queue", c]);
                }) });
        } }), r.fn.extend({ queue: function queue(a, b) {
            var c = 2;return "string" != typeof a && (b = a, a = "fx", c--), arguments.length < c ? r.queue(this[0], a) : void 0 === b ? this : this.each(function () {
                var c = r.queue(this, a, b);r._queueHooks(this, a), "fx" === a && "inprogress" !== c[0] && r.dequeue(this, a);
            });
        }, dequeue: function dequeue(a) {
            return this.each(function () {
                r.dequeue(this, a);
            });
        }, clearQueue: function clearQueue(a) {
            return this.queue(a || "fx", []);
        }, promise: function promise(a, b) {
            var c,
                d = 1,
                e = r.Deferred(),
                f = this,
                g = this.length,
                h = function h() {
                --d || e.resolveWith(f, [f]);
            };"string" != typeof a && (b = a, a = void 0), a = a || "fx";while (g--) {
                c = V.get(f[g], a + "queueHooks"), c && c.empty && (d++, c.empty.add(h));
            }return h(), e.promise(b);
        } });var $ = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
        _ = new RegExp("^(?:([+-])=|)(" + $ + ")([a-z%]*)$", "i"),
        aa = ["Top", "Right", "Bottom", "Left"],
        ba = function ba(a, b) {
        return a = b || a, "none" === a.style.display || "" === a.style.display && r.contains(a.ownerDocument, a) && "none" === r.css(a, "display");
    },
        ca = function ca(a, b, c, d) {
        var e,
            f,
            g = {};for (f in b) {
            g[f] = a.style[f], a.style[f] = b[f];
        }e = c.apply(a, d || []);for (f in b) {
            a.style[f] = g[f];
        }return e;
    };function da(a, b, c, d) {
        var e,
            f = 1,
            g = 20,
            h = d ? function () {
            return d.cur();
        } : function () {
            return r.css(a, b, "");
        },
            i = h(),
            j = c && c[3] || (r.cssNumber[b] ? "" : "px"),
            k = (r.cssNumber[b] || "px" !== j && +i) && _.exec(r.css(a, b));if (k && k[3] !== j) {
            j = j || k[3], c = c || [], k = +i || 1;do {
                f = f || ".5", k /= f, r.style(a, b, k + j);
            } while (f !== (f = h() / i) && 1 !== f && --g);
        }return c && (k = +k || +i || 0, e = c[1] ? k + (c[1] + 1) * c[2] : +c[2], d && (d.unit = j, d.start = k, d.end = e)), e;
    }var ea = {};function fa(a) {
        var b,
            c = a.ownerDocument,
            d = a.nodeName,
            e = ea[d];return e ? e : (b = c.body.appendChild(c.createElement(d)), e = r.css(b, "display"), b.parentNode.removeChild(b), "none" === e && (e = "block"), ea[d] = e, e);
    }function ga(a, b) {
        for (var c, d, e = [], f = 0, g = a.length; g > f; f++) {
            d = a[f], d.style && (c = d.style.display, b ? ("none" === c && (e[f] = V.get(d, "display") || null, e[f] || (d.style.display = "")), "" === d.style.display && ba(d) && (e[f] = fa(d))) : "none" !== c && (e[f] = "none", V.set(d, "display", c)));
        }for (f = 0; g > f; f++) {
            null != e[f] && (a[f].style.display = e[f]);
        }return a;
    }r.fn.extend({ show: function show() {
            return ga(this, !0);
        }, hide: function hide() {
            return ga(this);
        }, toggle: function toggle(a) {
            return "boolean" == typeof a ? a ? this.show() : this.hide() : this.each(function () {
                ba(this) ? r(this).show() : r(this).hide();
            });
        } });var ha = /^(?:checkbox|radio)$/i,
        ia = /<([a-z][^\/\0>\x20\t\r\n\f]+)/i,
        ja = /^$|\/(?:java|ecma)script/i,
        ka = { option: [1, "<select multiple='multiple'>", "</select>"], thead: [1, "<table>", "</table>"], col: [2, "<table><colgroup>", "</colgroup></table>"], tr: [2, "<table><tbody>", "</tbody></table>"], td: [3, "<table><tbody><tr>", "</tr></tbody></table>"], _default: [0, "", ""] };ka.optgroup = ka.option, ka.tbody = ka.tfoot = ka.colgroup = ka.caption = ka.thead, ka.th = ka.td;function la(a, b) {
        var c = "undefined" != typeof a.getElementsByTagName ? a.getElementsByTagName(b || "*") : "undefined" != typeof a.querySelectorAll ? a.querySelectorAll(b || "*") : [];return void 0 === b || b && r.nodeName(a, b) ? r.merge([a], c) : c;
    }function ma(a, b) {
        for (var c = 0, d = a.length; d > c; c++) {
            V.set(a[c], "globalEval", !b || V.get(b[c], "globalEval"));
        }
    }var na = /<|&#?\w+;/;function oa(a, b, c, d, e) {
        for (var f, g, h, i, j, k, l = b.createDocumentFragment(), m = [], n = 0, o = a.length; o > n; n++) {
            if (f = a[n], f || 0 === f) if ("object" === r.type(f)) r.merge(m, f.nodeType ? [f] : f);else if (na.test(f)) {
                g = g || l.appendChild(b.createElement("div")), h = (ia.exec(f) || ["", ""])[1].toLowerCase(), i = ka[h] || ka._default, g.innerHTML = i[1] + r.htmlPrefilter(f) + i[2], k = i[0];while (k--) {
                    g = g.lastChild;
                }r.merge(m, g.childNodes), g = l.firstChild, g.textContent = "";
            } else m.push(b.createTextNode(f));
        }l.textContent = "", n = 0;while (f = m[n++]) {
            if (d && r.inArray(f, d) > -1) e && e.push(f);else if (j = r.contains(f.ownerDocument, f), g = la(l.appendChild(f), "script"), j && ma(g), c) {
                k = 0;while (f = g[k++]) {
                    ja.test(f.type || "") && c.push(f);
                }
            }
        }return l;
    }!function () {
        var a = d.createDocumentFragment(),
            b = a.appendChild(d.createElement("div")),
            c = d.createElement("input");c.setAttribute("type", "radio"), c.setAttribute("checked", "checked"), c.setAttribute("name", "t"), b.appendChild(c), o.checkClone = b.cloneNode(!0).cloneNode(!0).lastChild.checked, b.innerHTML = "<textarea>x</textarea>", o.noCloneChecked = !!b.cloneNode(!0).lastChild.defaultValue;
    }();var pa = d.documentElement,
        qa = /^key/,
        ra = /^(?:mouse|pointer|contextmenu|drag|drop)|click/,
        sa = /^([^.]*)(?:\.(.+)|)/;function ta() {
        return !0;
    }function ua() {
        return !1;
    }function va() {
        try {
            return d.activeElement;
        } catch (a) {}
    }function wa(a, b, c, d, e, f) {
        var g, h;if ("object" == (typeof b === "undefined" ? "undefined" : _typeof(b))) {
            "string" != typeof c && (d = d || c, c = void 0);for (h in b) {
                wa(a, h, c, d, b[h], f);
            }return a;
        }if (null == d && null == e ? (e = c, d = c = void 0) : null == e && ("string" == typeof c ? (e = d, d = void 0) : (e = d, d = c, c = void 0)), e === !1) e = ua;else if (!e) return a;return 1 === f && (g = e, e = function e(a) {
            return r().off(a), g.apply(this, arguments);
        }, e.guid = g.guid || (g.guid = r.guid++)), a.each(function () {
            r.event.add(this, b, e, d, c);
        });
    }r.event = { global: {}, add: function add(a, b, c, d, e) {
            var f,
                g,
                h,
                i,
                j,
                k,
                l,
                m,
                n,
                o,
                p,
                q = V.get(a);if (q) {
                c.handler && (f = c, c = f.handler, e = f.selector), e && r.find.matchesSelector(pa, e), c.guid || (c.guid = r.guid++), (i = q.events) || (i = q.events = {}), (g = q.handle) || (g = q.handle = function (b) {
                    return "undefined" != typeof r && r.event.triggered !== b.type ? r.event.dispatch.apply(a, arguments) : void 0;
                }), b = (b || "").match(K) || [""], j = b.length;while (j--) {
                    h = sa.exec(b[j]) || [], n = p = h[1], o = (h[2] || "").split(".").sort(), n && (l = r.event.special[n] || {}, n = (e ? l.delegateType : l.bindType) || n, l = r.event.special[n] || {}, k = r.extend({ type: n, origType: p, data: d, handler: c, guid: c.guid, selector: e, needsContext: e && r.expr.match.needsContext.test(e), namespace: o.join(".") }, f), (m = i[n]) || (m = i[n] = [], m.delegateCount = 0, l.setup && l.setup.call(a, d, o, g) !== !1 || a.addEventListener && a.addEventListener(n, g)), l.add && (l.add.call(a, k), k.handler.guid || (k.handler.guid = c.guid)), e ? m.splice(m.delegateCount++, 0, k) : m.push(k), r.event.global[n] = !0);
                }
            }
        }, remove: function remove(a, b, c, d, e) {
            var f,
                g,
                h,
                i,
                j,
                k,
                l,
                m,
                n,
                o,
                p,
                q = V.hasData(a) && V.get(a);if (q && (i = q.events)) {
                b = (b || "").match(K) || [""], j = b.length;while (j--) {
                    if (h = sa.exec(b[j]) || [], n = p = h[1], o = (h[2] || "").split(".").sort(), n) {
                        l = r.event.special[n] || {}, n = (d ? l.delegateType : l.bindType) || n, m = i[n] || [], h = h[2] && new RegExp("(^|\\.)" + o.join("\\.(?:.*\\.|)") + "(\\.|$)"), g = f = m.length;while (f--) {
                            k = m[f], !e && p !== k.origType || c && c.guid !== k.guid || h && !h.test(k.namespace) || d && d !== k.selector && ("**" !== d || !k.selector) || (m.splice(f, 1), k.selector && m.delegateCount--, l.remove && l.remove.call(a, k));
                        }g && !m.length && (l.teardown && l.teardown.call(a, o, q.handle) !== !1 || r.removeEvent(a, n, q.handle), delete i[n]);
                    } else for (n in i) {
                        r.event.remove(a, n + b[j], c, d, !0);
                    }
                }r.isEmptyObject(i) && V.remove(a, "handle events");
            }
        }, dispatch: function dispatch(a) {
            var b = r.event.fix(a),
                c,
                d,
                e,
                f,
                g,
                h,
                i = new Array(arguments.length),
                j = (V.get(this, "events") || {})[b.type] || [],
                k = r.event.special[b.type] || {};for (i[0] = b, c = 1; c < arguments.length; c++) {
                i[c] = arguments[c];
            }if (b.delegateTarget = this, !k.preDispatch || k.preDispatch.call(this, b) !== !1) {
                h = r.event.handlers.call(this, b, j), c = 0;while ((f = h[c++]) && !b.isPropagationStopped()) {
                    b.currentTarget = f.elem, d = 0;while ((g = f.handlers[d++]) && !b.isImmediatePropagationStopped()) {
                        b.rnamespace && !b.rnamespace.test(g.namespace) || (b.handleObj = g, b.data = g.data, e = ((r.event.special[g.origType] || {}).handle || g.handler).apply(f.elem, i), void 0 !== e && (b.result = e) === !1 && (b.preventDefault(), b.stopPropagation()));
                    }
                }return k.postDispatch && k.postDispatch.call(this, b), b.result;
            }
        }, handlers: function handlers(a, b) {
            var c,
                d,
                e,
                f,
                g = [],
                h = b.delegateCount,
                i = a.target;if (h && i.nodeType && ("click" !== a.type || isNaN(a.button) || a.button < 1)) for (; i !== this; i = i.parentNode || this) {
                if (1 === i.nodeType && (i.disabled !== !0 || "click" !== a.type)) {
                    for (d = [], c = 0; h > c; c++) {
                        f = b[c], e = f.selector + " ", void 0 === d[e] && (d[e] = f.needsContext ? r(e, this).index(i) > -1 : r.find(e, this, null, [i]).length), d[e] && d.push(f);
                    }d.length && g.push({ elem: i, handlers: d });
                }
            }return h < b.length && g.push({ elem: this, handlers: b.slice(h) }), g;
        }, addProp: function addProp(a, b) {
            Object.defineProperty(r.Event.prototype, a, { enumerable: !0, configurable: !0, get: r.isFunction(b) ? function () {
                    return this.originalEvent ? b(this.originalEvent) : void 0;
                } : function () {
                    return this.originalEvent ? this.originalEvent[a] : void 0;
                }, set: function set(b) {
                    Object.defineProperty(this, a, { enumerable: !0, configurable: !0, writable: !0, value: b });
                } });
        }, fix: function fix(a) {
            return a[r.expando] ? a : new r.Event(a);
        }, special: { load: { noBubble: !0 }, focus: { trigger: function trigger() {
                    return this !== va() && this.focus ? (this.focus(), !1) : void 0;
                }, delegateType: "focusin" }, blur: { trigger: function trigger() {
                    return this === va() && this.blur ? (this.blur(), !1) : void 0;
                }, delegateType: "focusout" }, click: { trigger: function trigger() {
                    return "checkbox" === this.type && this.click && r.nodeName(this, "input") ? (this.click(), !1) : void 0;
                }, _default: function _default(a) {
                    return r.nodeName(a.target, "a");
                } }, beforeunload: { postDispatch: function postDispatch(a) {
                    void 0 !== a.result && a.originalEvent && (a.originalEvent.returnValue = a.result);
                } } } }, r.removeEvent = function (a, b, c) {
        a.removeEventListener && a.removeEventListener(b, c);
    }, r.Event = function (a, b) {
        return this instanceof r.Event ? (a && a.type ? (this.originalEvent = a, this.type = a.type, this.isDefaultPrevented = a.defaultPrevented || void 0 === a.defaultPrevented && a.returnValue === !1 ? ta : ua, this.target = a.target && 3 === a.target.nodeType ? a.target.parentNode : a.target, this.currentTarget = a.currentTarget, this.relatedTarget = a.relatedTarget) : this.type = a, b && r.extend(this, b), this.timeStamp = a && a.timeStamp || r.now(), void (this[r.expando] = !0)) : new r.Event(a, b);
    }, r.Event.prototype = { constructor: r.Event, isDefaultPrevented: ua, isPropagationStopped: ua, isImmediatePropagationStopped: ua, isSimulated: !1, preventDefault: function preventDefault() {
            var a = this.originalEvent;this.isDefaultPrevented = ta, a && !this.isSimulated && a.preventDefault();
        }, stopPropagation: function stopPropagation() {
            var a = this.originalEvent;this.isPropagationStopped = ta, a && !this.isSimulated && a.stopPropagation();
        }, stopImmediatePropagation: function stopImmediatePropagation() {
            var a = this.originalEvent;this.isImmediatePropagationStopped = ta, a && !this.isSimulated && a.stopImmediatePropagation(), this.stopPropagation();
        } }, r.each({ altKey: !0, bubbles: !0, cancelable: !0, changedTouches: !0, ctrlKey: !0, detail: !0, eventPhase: !0, metaKey: !0, pageX: !0, pageY: !0, shiftKey: !0, view: !0, "char": !0, charCode: !0, key: !0, keyCode: !0, button: !0, buttons: !0, clientX: !0, clientY: !0, offsetX: !0, offsetY: !0, pointerId: !0, pointerType: !0, screenX: !0, screenY: !0, targetTouches: !0, toElement: !0, touches: !0, which: function which(a) {
            var b = a.button;return null == a.which && qa.test(a.type) ? null != a.charCode ? a.charCode : a.keyCode : !a.which && void 0 !== b && ra.test(a.type) ? 1 & b ? 1 : 2 & b ? 3 : 4 & b ? 2 : 0 : a.which;
        } }, r.event.addProp), r.each({ mouseenter: "mouseover", mouseleave: "mouseout", pointerenter: "pointerover", pointerleave: "pointerout" }, function (a, b) {
        r.event.special[a] = { delegateType: b, bindType: b, handle: function handle(a) {
                var c,
                    d = this,
                    e = a.relatedTarget,
                    f = a.handleObj;return e && (e === d || r.contains(d, e)) || (a.type = f.origType, c = f.handler.apply(this, arguments), a.type = b), c;
            } };
    }), r.fn.extend({ on: function on(a, b, c, d) {
            return wa(this, a, b, c, d);
        }, one: function one(a, b, c, d) {
            return wa(this, a, b, c, d, 1);
        }, off: function off(a, b, c) {
            var d, e;if (a && a.preventDefault && a.handleObj) return d = a.handleObj, r(a.delegateTarget).off(d.namespace ? d.origType + "." + d.namespace : d.origType, d.selector, d.handler), this;if ("object" == (typeof a === "undefined" ? "undefined" : _typeof(a))) {
                for (e in a) {
                    this.off(e, b, a[e]);
                }return this;
            }return b !== !1 && "function" != typeof b || (c = b, b = void 0), c === !1 && (c = ua), this.each(function () {
                r.event.remove(this, a, c, b);
            });
        } });var xa = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi,
        ya = /<script|<style|<link/i,
        za = /checked\s*(?:[^=]|=\s*.checked.)/i,
        Aa = /^true\/(.*)/,
        Ba = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;function Ca(a, b) {
        return r.nodeName(a, "table") && r.nodeName(11 !== b.nodeType ? b : b.firstChild, "tr") ? a.getElementsByTagName("tbody")[0] || a : a;
    }function Da(a) {
        return a.type = (null !== a.getAttribute("type")) + "/" + a.type, a;
    }function Ea(a) {
        var b = Aa.exec(a.type);return b ? a.type = b[1] : a.removeAttribute("type"), a;
    }function Fa(a, b) {
        var c, d, e, f, g, h, i, j;if (1 === b.nodeType) {
            if (V.hasData(a) && (f = V.access(a), g = V.set(b, f), j = f.events)) {
                delete g.handle, g.events = {};for (e in j) {
                    for (c = 0, d = j[e].length; d > c; c++) {
                        r.event.add(b, e, j[e][c]);
                    }
                }
            }W.hasData(a) && (h = W.access(a), i = r.extend({}, h), W.set(b, i));
        }
    }function Ga(a, b) {
        var c = b.nodeName.toLowerCase();"input" === c && ha.test(a.type) ? b.checked = a.checked : "input" !== c && "textarea" !== c || (b.defaultValue = a.defaultValue);
    }function Ha(a, b, c, d) {
        b = g.apply([], b);var e,
            f,
            h,
            i,
            j,
            k,
            l = 0,
            m = a.length,
            n = m - 1,
            q = b[0],
            s = r.isFunction(q);if (s || m > 1 && "string" == typeof q && !o.checkClone && za.test(q)) return a.each(function (e) {
            var f = a.eq(e);s && (b[0] = q.call(this, e, f.html())), Ha(f, b, c, d);
        });if (m && (e = oa(b, a[0].ownerDocument, !1, a, d), f = e.firstChild, 1 === e.childNodes.length && (e = f), f || d)) {
            for (h = r.map(la(e, "script"), Da), i = h.length; m > l; l++) {
                j = e, l !== n && (j = r.clone(j, !0, !0), i && r.merge(h, la(j, "script"))), c.call(a[l], j, l);
            }if (i) for (k = h[h.length - 1].ownerDocument, r.map(h, Ea), l = 0; i > l; l++) {
                j = h[l], ja.test(j.type || "") && !V.access(j, "globalEval") && r.contains(k, j) && (j.src ? r._evalUrl && r._evalUrl(j.src) : p(j.textContent.replace(Ba, ""), k));
            }
        }return a;
    }function Ia(a, b, c) {
        for (var d, e = b ? r.filter(b, a) : a, f = 0; null != (d = e[f]); f++) {
            c || 1 !== d.nodeType || r.cleanData(la(d)), d.parentNode && (c && r.contains(d.ownerDocument, d) && ma(la(d, "script")), d.parentNode.removeChild(d));
        }return a;
    }r.extend({ htmlPrefilter: function htmlPrefilter(a) {
            return a.replace(xa, "<$1></$2>");
        }, clone: function clone(a, b, c) {
            var d,
                e,
                f,
                g,
                h = a.cloneNode(!0),
                i = r.contains(a.ownerDocument, a);if (!(o.noCloneChecked || 1 !== a.nodeType && 11 !== a.nodeType || r.isXMLDoc(a))) for (g = la(h), f = la(a), d = 0, e = f.length; e > d; d++) {
                Ga(f[d], g[d]);
            }if (b) if (c) for (f = f || la(a), g = g || la(h), d = 0, e = f.length; e > d; d++) {
                Fa(f[d], g[d]);
            } else Fa(a, h);return g = la(h, "script"), g.length > 0 && ma(g, !i && la(a, "script")), h;
        }, cleanData: function cleanData(a) {
            for (var b, c, d, e = r.event.special, f = 0; void 0 !== (c = a[f]); f++) {
                if (T(c)) {
                    if (b = c[V.expando]) {
                        if (b.events) for (d in b.events) {
                            e[d] ? r.event.remove(c, d) : r.removeEvent(c, d, b.handle);
                        }c[V.expando] = void 0;
                    }c[W.expando] && (c[W.expando] = void 0);
                }
            }
        } }), r.fn.extend({ detach: function detach(a) {
            return Ia(this, a, !0);
        }, remove: function remove(a) {
            return Ia(this, a);
        }, text: function text(a) {
            return S(this, function (a) {
                return void 0 === a ? r.text(this) : this.empty().each(function () {
                    1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || (this.textContent = a);
                });
            }, null, a, arguments.length);
        }, append: function append() {
            return Ha(this, arguments, function (a) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var b = Ca(this, a);b.appendChild(a);
                }
            });
        }, prepend: function prepend() {
            return Ha(this, arguments, function (a) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var b = Ca(this, a);b.insertBefore(a, b.firstChild);
                }
            });
        }, before: function before() {
            return Ha(this, arguments, function (a) {
                this.parentNode && this.parentNode.insertBefore(a, this);
            });
        }, after: function after() {
            return Ha(this, arguments, function (a) {
                this.parentNode && this.parentNode.insertBefore(a, this.nextSibling);
            });
        }, empty: function empty() {
            for (var a, b = 0; null != (a = this[b]); b++) {
                1 === a.nodeType && (r.cleanData(la(a, !1)), a.textContent = "");
            }return this;
        }, clone: function clone(a, b) {
            return a = null == a ? !1 : a, b = null == b ? a : b, this.map(function () {
                return r.clone(this, a, b);
            });
        }, html: function html(a) {
            return S(this, function (a) {
                var b = this[0] || {},
                    c = 0,
                    d = this.length;if (void 0 === a && 1 === b.nodeType) return b.innerHTML;if ("string" == typeof a && !ya.test(a) && !ka[(ia.exec(a) || ["", ""])[1].toLowerCase()]) {
                    a = r.htmlPrefilter(a);try {
                        for (; d > c; c++) {
                            b = this[c] || {}, 1 === b.nodeType && (r.cleanData(la(b, !1)), b.innerHTML = a);
                        }b = 0;
                    } catch (e) {}
                }b && this.empty().append(a);
            }, null, a, arguments.length);
        }, replaceWith: function replaceWith() {
            var a = [];return Ha(this, arguments, function (b) {
                var c = this.parentNode;r.inArray(this, a) < 0 && (r.cleanData(la(this)), c && c.replaceChild(b, this));
            }, a);
        } }), r.each({ appendTo: "append", prependTo: "prepend", insertBefore: "before", insertAfter: "after", replaceAll: "replaceWith" }, function (a, b) {
        r.fn[a] = function (a) {
            for (var c, d = [], e = r(a), f = e.length - 1, g = 0; f >= g; g++) {
                c = g === f ? this : this.clone(!0), r(e[g])[b](c), h.apply(d, c.get());
            }return this.pushStack(d);
        };
    });var Ja = /^margin/,
        Ka = new RegExp("^(" + $ + ")(?!px)[a-z%]+$", "i"),
        La = function La(b) {
        var c = b.ownerDocument.defaultView;return c && c.opener || (c = a), c.getComputedStyle(b);
    };!function () {
        function b() {
            if (i) {
                i.style.cssText = "box-sizing:border-box;position:relative;display:block;margin:auto;border:1px;padding:1px;top:1%;width:50%", i.innerHTML = "", pa.appendChild(h);var b = a.getComputedStyle(i);c = "1%" !== b.top, g = "2px" === b.marginLeft, e = "4px" === b.width, i.style.marginRight = "50%", f = "4px" === b.marginRight, pa.removeChild(h), i = null;
            }
        }var c,
            e,
            f,
            g,
            h = d.createElement("div"),
            i = d.createElement("div");i.style && (i.style.backgroundClip = "content-box", i.cloneNode(!0).style.backgroundClip = "", o.clearCloneStyle = "content-box" === i.style.backgroundClip, h.style.cssText = "border:0;width:8px;height:0;top:0;left:-9999px;padding:0;margin-top:1px;position:absolute", h.appendChild(i), r.extend(o, { pixelPosition: function pixelPosition() {
                return b(), c;
            }, boxSizingReliable: function boxSizingReliable() {
                return b(), e;
            }, pixelMarginRight: function pixelMarginRight() {
                return b(), f;
            }, reliableMarginLeft: function reliableMarginLeft() {
                return b(), g;
            } }));
    }();function Ma(a, b, c) {
        var d,
            e,
            f,
            g,
            h = a.style;return c = c || La(a), c && (g = c.getPropertyValue(b) || c[b], "" !== g || r.contains(a.ownerDocument, a) || (g = r.style(a, b)), !o.pixelMarginRight() && Ka.test(g) && Ja.test(b) && (d = h.width, e = h.minWidth, f = h.maxWidth, h.minWidth = h.maxWidth = h.width = g, g = c.width, h.width = d, h.minWidth = e, h.maxWidth = f)), void 0 !== g ? g + "" : g;
    }function Na(a, b) {
        return { get: function get() {
                return a() ? void delete this.get : (this.get = b).apply(this, arguments);
            } };
    }var Oa = /^(none|table(?!-c[ea]).+)/,
        Pa = { position: "absolute", visibility: "hidden", display: "block" },
        Qa = { letterSpacing: "0", fontWeight: "400" },
        Ra = ["Webkit", "Moz", "ms"],
        Sa = d.createElement("div").style;function Ta(a) {
        if (a in Sa) return a;var b = a[0].toUpperCase() + a.slice(1),
            c = Ra.length;while (c--) {
            if (a = Ra[c] + b, a in Sa) return a;
        }
    }function Ua(a, b, c) {
        var d = _.exec(b);return d ? Math.max(0, d[2] - (c || 0)) + (d[3] || "px") : b;
    }function Va(a, b, c, d, e) {
        for (var f = c === (d ? "border" : "content") ? 4 : "width" === b ? 1 : 0, g = 0; 4 > f; f += 2) {
            "margin" === c && (g += r.css(a, c + aa[f], !0, e)), d ? ("content" === c && (g -= r.css(a, "padding" + aa[f], !0, e)), "margin" !== c && (g -= r.css(a, "border" + aa[f] + "Width", !0, e))) : (g += r.css(a, "padding" + aa[f], !0, e), "padding" !== c && (g += r.css(a, "border" + aa[f] + "Width", !0, e)));
        }return g;
    }function Wa(a, b, c) {
        var d,
            e = !0,
            f = La(a),
            g = "border-box" === r.css(a, "boxSizing", !1, f);if (a.getClientRects().length && (d = a.getBoundingClientRect()[b]), 0 >= d || null == d) {
            if (d = Ma(a, b, f), (0 > d || null == d) && (d = a.style[b]), Ka.test(d)) return d;e = g && (o.boxSizingReliable() || d === a.style[b]), d = parseFloat(d) || 0;
        }return d + Va(a, b, c || (g ? "border" : "content"), e, f) + "px";
    }r.extend({ cssHooks: { opacity: { get: function get(a, b) {
                    if (b) {
                        var c = Ma(a, "opacity");return "" === c ? "1" : c;
                    }
                } } }, cssNumber: { animationIterationCount: !0, columnCount: !0, fillOpacity: !0, flexGrow: !0, flexShrink: !0, fontWeight: !0, lineHeight: !0, opacity: !0, order: !0, orphans: !0, widows: !0, zIndex: !0, zoom: !0 }, cssProps: { "float": "cssFloat" }, style: function style(a, b, c, d) {
            if (a && 3 !== a.nodeType && 8 !== a.nodeType && a.style) {
                var e,
                    f,
                    g,
                    h = r.camelCase(b),
                    i = a.style;return b = r.cssProps[h] || (r.cssProps[h] = Ta(h) || h), g = r.cssHooks[b] || r.cssHooks[h], void 0 === c ? g && "get" in g && void 0 !== (e = g.get(a, !1, d)) ? e : i[b] : (f = typeof c === "undefined" ? "undefined" : _typeof(c), "string" === f && (e = _.exec(c)) && e[1] && (c = da(a, b, e), f = "number"), null != c && c === c && ("number" === f && (c += e && e[3] || (r.cssNumber[h] ? "" : "px")), o.clearCloneStyle || "" !== c || 0 !== b.indexOf("background") || (i[b] = "inherit"), g && "set" in g && void 0 === (c = g.set(a, c, d)) || (i[b] = c)), void 0);
            }
        }, css: function css(a, b, c, d) {
            var e,
                f,
                g,
                h = r.camelCase(b);return b = r.cssProps[h] || (r.cssProps[h] = Ta(h) || h), g = r.cssHooks[b] || r.cssHooks[h], g && "get" in g && (e = g.get(a, !0, c)), void 0 === e && (e = Ma(a, b, d)), "normal" === e && b in Qa && (e = Qa[b]), "" === c || c ? (f = parseFloat(e), c === !0 || isFinite(f) ? f || 0 : e) : e;
        } }), r.each(["height", "width"], function (a, b) {
        r.cssHooks[b] = { get: function get(a, c, d) {
                return c ? !Oa.test(r.css(a, "display")) || a.getClientRects().length && a.getBoundingClientRect().width ? Wa(a, b, d) : ca(a, Pa, function () {
                    return Wa(a, b, d);
                }) : void 0;
            }, set: function set(a, c, d) {
                var e,
                    f = d && La(a),
                    g = d && Va(a, b, d, "border-box" === r.css(a, "boxSizing", !1, f), f);return g && (e = _.exec(c)) && "px" !== (e[3] || "px") && (a.style[b] = c, c = r.css(a, b)), Ua(a, c, g);
            } };
    }), r.cssHooks.marginLeft = Na(o.reliableMarginLeft, function (a, b) {
        return b ? (parseFloat(Ma(a, "marginLeft")) || a.getBoundingClientRect().left - ca(a, { marginLeft: 0 }, function () {
            return a.getBoundingClientRect().left;
        })) + "px" : void 0;
    }), r.each({ margin: "", padding: "", border: "Width" }, function (a, b) {
        r.cssHooks[a + b] = { expand: function expand(c) {
                for (var d = 0, e = {}, f = "string" == typeof c ? c.split(" ") : [c]; 4 > d; d++) {
                    e[a + aa[d] + b] = f[d] || f[d - 2] || f[0];
                }return e;
            } }, Ja.test(a) || (r.cssHooks[a + b].set = Ua);
    }), r.fn.extend({ css: function css(a, b) {
            return S(this, function (a, b, c) {
                var d,
                    e,
                    f = {},
                    g = 0;if (r.isArray(b)) {
                    for (d = La(a), e = b.length; e > g; g++) {
                        f[b[g]] = r.css(a, b[g], !1, d);
                    }return f;
                }return void 0 !== c ? r.style(a, b, c) : r.css(a, b);
            }, a, b, arguments.length > 1);
        } });function Xa(a, b, c, d, e) {
        return new Xa.prototype.init(a, b, c, d, e);
    }r.Tween = Xa, Xa.prototype = { constructor: Xa, init: function init(a, b, c, d, e, f) {
            this.elem = a, this.prop = c, this.easing = e || r.easing._default, this.options = b, this.start = this.now = this.cur(), this.end = d, this.unit = f || (r.cssNumber[c] ? "" : "px");
        }, cur: function cur() {
            var a = Xa.propHooks[this.prop];return a && a.get ? a.get(this) : Xa.propHooks._default.get(this);
        }, run: function run(a) {
            var b,
                c = Xa.propHooks[this.prop];return this.options.duration ? this.pos = b = r.easing[this.easing](a, this.options.duration * a, 0, 1, this.options.duration) : this.pos = b = a, this.now = (this.end - this.start) * b + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), c && c.set ? c.set(this) : Xa.propHooks._default.set(this), this;
        } }, Xa.prototype.init.prototype = Xa.prototype, Xa.propHooks = { _default: { get: function get(a) {
                var b;return 1 !== a.elem.nodeType || null != a.elem[a.prop] && null == a.elem.style[a.prop] ? a.elem[a.prop] : (b = r.css(a.elem, a.prop, ""), b && "auto" !== b ? b : 0);
            }, set: function set(a) {
                r.fx.step[a.prop] ? r.fx.step[a.prop](a) : 1 !== a.elem.nodeType || null == a.elem.style[r.cssProps[a.prop]] && !r.cssHooks[a.prop] ? a.elem[a.prop] = a.now : r.style(a.elem, a.prop, a.now + a.unit);
            } } }, Xa.propHooks.scrollTop = Xa.propHooks.scrollLeft = { set: function set(a) {
            a.elem.nodeType && a.elem.parentNode && (a.elem[a.prop] = a.now);
        } }, r.easing = { linear: function linear(a) {
            return a;
        }, swing: function swing(a) {
            return .5 - Math.cos(a * Math.PI) / 2;
        }, _default: "swing" }, r.fx = Xa.prototype.init, r.fx.step = {};var Ya,
        Za,
        $a = /^(?:toggle|show|hide)$/,
        _a = /queueHooks$/;function ab() {
        Za && (a.requestAnimationFrame(ab), r.fx.tick());
    }function bb() {
        return a.setTimeout(function () {
            Ya = void 0;
        }), Ya = r.now();
    }function cb(a, b) {
        var c,
            d = 0,
            e = { height: a };for (b = b ? 1 : 0; 4 > d; d += 2 - b) {
            c = aa[d], e["margin" + c] = e["padding" + c] = a;
        }return b && (e.opacity = e.width = a), e;
    }function db(a, b, c) {
        for (var d, e = (gb.tweeners[b] || []).concat(gb.tweeners["*"]), f = 0, g = e.length; g > f; f++) {
            if (d = e[f].call(c, b, a)) return d;
        }
    }function eb(a, b, c) {
        var d,
            e,
            f,
            g,
            h,
            i,
            j,
            k,
            l = "width" in b || "height" in b,
            m = this,
            n = {},
            o = a.style,
            p = a.nodeType && ba(a),
            q = V.get(a, "fxshow");c.queue || (g = r._queueHooks(a, "fx"), null == g.unqueued && (g.unqueued = 0, h = g.empty.fire, g.empty.fire = function () {
            g.unqueued || h();
        }), g.unqueued++, m.always(function () {
            m.always(function () {
                g.unqueued--, r.queue(a, "fx").length || g.empty.fire();
            });
        }));for (d in b) {
            if (e = b[d], $a.test(e)) {
                if (delete b[d], f = f || "toggle" === e, e === (p ? "hide" : "show")) {
                    if ("show" !== e || !q || void 0 === q[d]) continue;p = !0;
                }n[d] = q && q[d] || r.style(a, d);
            }
        }if (i = !r.isEmptyObject(b), i || !r.isEmptyObject(n)) {
            l && 1 === a.nodeType && (c.overflow = [o.overflow, o.overflowX, o.overflowY], j = q && q.display, null == j && (j = V.get(a, "display")), k = r.css(a, "display"), "none" === k && (j ? k = j : (ga([a], !0), j = a.style.display || j, k = r.css(a, "display"), ga([a]))), ("inline" === k || "inline-block" === k && null != j) && "none" === r.css(a, "float") && (i || (m.done(function () {
                o.display = j;
            }), null == j && (k = o.display, j = "none" === k ? "" : k)), o.display = "inline-block")), c.overflow && (o.overflow = "hidden", m.always(function () {
                o.overflow = c.overflow[0], o.overflowX = c.overflow[1], o.overflowY = c.overflow[2];
            })), i = !1;for (d in n) {
                i || (q ? "hidden" in q && (p = q.hidden) : q = V.access(a, "fxshow", { display: j }), f && (q.hidden = !p), p && ga([a], !0), m.done(function () {
                    p || ga([a]), V.remove(a, "fxshow");for (d in n) {
                        r.style(a, d, n[d]);
                    }
                })), i = db(p ? q[d] : 0, d, m), d in q || (q[d] = i.start, p && (i.end = i.start, i.start = 0));
            }
        }
    }function fb(a, b) {
        var c, d, e, f, g;for (c in a) {
            if (d = r.camelCase(c), e = b[d], f = a[c], r.isArray(f) && (e = f[1], f = a[c] = f[0]), c !== d && (a[d] = f, delete a[c]), g = r.cssHooks[d], g && "expand" in g) {
                f = g.expand(f), delete a[d];for (c in f) {
                    c in a || (a[c] = f[c], b[c] = e);
                }
            } else b[d] = e;
        }
    }function gb(a, b, c) {
        var d,
            e,
            f = 0,
            g = gb.prefilters.length,
            h = r.Deferred().always(function () {
            delete i.elem;
        }),
            i = function i() {
            if (e) return !1;for (var b = Ya || bb(), c = Math.max(0, j.startTime + j.duration - b), d = c / j.duration || 0, f = 1 - d, g = 0, i = j.tweens.length; i > g; g++) {
                j.tweens[g].run(f);
            }return h.notifyWith(a, [j, f, c]), 1 > f && i ? c : (h.resolveWith(a, [j]), !1);
        },
            j = h.promise({ elem: a, props: r.extend({}, b), opts: r.extend(!0, { specialEasing: {}, easing: r.easing._default }, c), originalProperties: b, originalOptions: c, startTime: Ya || bb(), duration: c.duration, tweens: [], createTween: function createTween(b, c) {
                var d = r.Tween(a, j.opts, b, c, j.opts.specialEasing[b] || j.opts.easing);return j.tweens.push(d), d;
            }, stop: function stop(b) {
                var c = 0,
                    d = b ? j.tweens.length : 0;if (e) return this;for (e = !0; d > c; c++) {
                    j.tweens[c].run(1);
                }return b ? (h.notifyWith(a, [j, 1, 0]), h.resolveWith(a, [j, b])) : h.rejectWith(a, [j, b]), this;
            } }),
            k = j.props;for (fb(k, j.opts.specialEasing); g > f; f++) {
            if (d = gb.prefilters[f].call(j, a, k, j.opts)) return r.isFunction(d.stop) && (r._queueHooks(j.elem, j.opts.queue).stop = r.proxy(d.stop, d)), d;
        }return r.map(k, db, j), r.isFunction(j.opts.start) && j.opts.start.call(a, j), r.fx.timer(r.extend(i, { elem: a, anim: j, queue: j.opts.queue })), j.progress(j.opts.progress).done(j.opts.done, j.opts.complete).fail(j.opts.fail).always(j.opts.always);
    }r.Animation = r.extend(gb, { tweeners: { "*": [function (a, b) {
                var c = this.createTween(a, b);return da(c.elem, a, _.exec(b), c), c;
            }] }, tweener: function tweener(a, b) {
            r.isFunction(a) ? (b = a, a = ["*"]) : a = a.match(K);for (var c, d = 0, e = a.length; e > d; d++) {
                c = a[d], gb.tweeners[c] = gb.tweeners[c] || [], gb.tweeners[c].unshift(b);
            }
        }, prefilters: [eb], prefilter: function prefilter(a, b) {
            b ? gb.prefilters.unshift(a) : gb.prefilters.push(a);
        } }), r.speed = function (a, b, c) {
        var e = a && "object" == (typeof a === "undefined" ? "undefined" : _typeof(a)) ? r.extend({}, a) : { complete: c || !c && b || r.isFunction(a) && a, duration: a, easing: c && b || b && !r.isFunction(b) && b };return r.fx.off || d.hidden ? e.duration = 0 : e.duration = "number" == typeof e.duration ? e.duration : e.duration in r.fx.speeds ? r.fx.speeds[e.duration] : r.fx.speeds._default, null != e.queue && e.queue !== !0 || (e.queue = "fx"), e.old = e.complete, e.complete = function () {
            r.isFunction(e.old) && e.old.call(this), e.queue && r.dequeue(this, e.queue);
        }, e;
    }, r.fn.extend({ fadeTo: function fadeTo(a, b, c, d) {
            return this.filter(ba).css("opacity", 0).show().end().animate({ opacity: b }, a, c, d);
        }, animate: function animate(a, b, c, d) {
            var e = r.isEmptyObject(a),
                f = r.speed(b, c, d),
                g = function g() {
                var b = gb(this, r.extend({}, a), f);(e || V.get(this, "finish")) && b.stop(!0);
            };return g.finish = g, e || f.queue === !1 ? this.each(g) : this.queue(f.queue, g);
        }, stop: function stop(a, b, c) {
            var d = function d(a) {
                var b = a.stop;delete a.stop, b(c);
            };return "string" != typeof a && (c = b, b = a, a = void 0), b && a !== !1 && this.queue(a || "fx", []), this.each(function () {
                var b = !0,
                    e = null != a && a + "queueHooks",
                    f = r.timers,
                    g = V.get(this);if (e) g[e] && g[e].stop && d(g[e]);else for (e in g) {
                    g[e] && g[e].stop && _a.test(e) && d(g[e]);
                }for (e = f.length; e--;) {
                    f[e].elem !== this || null != a && f[e].queue !== a || (f[e].anim.stop(c), b = !1, f.splice(e, 1));
                }!b && c || r.dequeue(this, a);
            });
        }, finish: function finish(a) {
            return a !== !1 && (a = a || "fx"), this.each(function () {
                var b,
                    c = V.get(this),
                    d = c[a + "queue"],
                    e = c[a + "queueHooks"],
                    f = r.timers,
                    g = d ? d.length : 0;for (c.finish = !0, r.queue(this, a, []), e && e.stop && e.stop.call(this, !0), b = f.length; b--;) {
                    f[b].elem === this && f[b].queue === a && (f[b].anim.stop(!0), f.splice(b, 1));
                }for (b = 0; g > b; b++) {
                    d[b] && d[b].finish && d[b].finish.call(this);
                }delete c.finish;
            });
        } }), r.each(["toggle", "show", "hide"], function (a, b) {
        var c = r.fn[b];r.fn[b] = function (a, d, e) {
            return null == a || "boolean" == typeof a ? c.apply(this, arguments) : this.animate(cb(b, !0), a, d, e);
        };
    }), r.each({ slideDown: cb("show"), slideUp: cb("hide"), slideToggle: cb("toggle"), fadeIn: { opacity: "show" }, fadeOut: { opacity: "hide" }, fadeToggle: { opacity: "toggle" } }, function (a, b) {
        r.fn[a] = function (a, c, d) {
            return this.animate(b, a, c, d);
        };
    }), r.timers = [], r.fx.tick = function () {
        var a,
            b = 0,
            c = r.timers;for (Ya = r.now(); b < c.length; b++) {
            a = c[b], a() || c[b] !== a || c.splice(b--, 1);
        }c.length || r.fx.stop(), Ya = void 0;
    }, r.fx.timer = function (a) {
        r.timers.push(a), a() ? r.fx.start() : r.timers.pop();
    }, r.fx.interval = 13, r.fx.start = function () {
        Za || (Za = a.requestAnimationFrame ? a.requestAnimationFrame(ab) : a.setInterval(r.fx.tick, r.fx.interval));
    }, r.fx.stop = function () {
        a.cancelAnimationFrame ? a.cancelAnimationFrame(Za) : a.clearInterval(Za), Za = null;
    }, r.fx.speeds = { slow: 600, fast: 200, _default: 400 }, r.fn.delay = function (b, c) {
        return b = r.fx ? r.fx.speeds[b] || b : b, c = c || "fx", this.queue(c, function (c, d) {
            var e = a.setTimeout(c, b);d.stop = function () {
                a.clearTimeout(e);
            };
        });
    }, function () {
        var a = d.createElement("input"),
            b = d.createElement("select"),
            c = b.appendChild(d.createElement("option"));a.type = "checkbox", o.checkOn = "" !== a.value, o.optSelected = c.selected, a = d.createElement("input"), a.value = "t", a.type = "radio", o.radioValue = "t" === a.value;
    }();var hb,
        ib = r.expr.attrHandle;r.fn.extend({ attr: function attr(a, b) {
            return S(this, r.attr, a, b, arguments.length > 1);
        }, removeAttr: function removeAttr(a) {
            return this.each(function () {
                r.removeAttr(this, a);
            });
        } }), r.extend({ attr: function attr(a, b, c) {
            var d,
                e,
                f = a.nodeType;if (3 !== f && 8 !== f && 2 !== f) return "undefined" == typeof a.getAttribute ? r.prop(a, b, c) : (1 === f && r.isXMLDoc(a) || (e = r.attrHooks[b.toLowerCase()] || (r.expr.match.bool.test(b) ? hb : void 0)), void 0 !== c ? null === c ? void r.removeAttr(a, b) : e && "set" in e && void 0 !== (d = e.set(a, c, b)) ? d : (a.setAttribute(b, c + ""), c) : e && "get" in e && null !== (d = e.get(a, b)) ? d : (d = r.find.attr(a, b), null == d ? void 0 : d));
        }, attrHooks: { type: { set: function set(a, b) {
                    if (!o.radioValue && "radio" === b && r.nodeName(a, "input")) {
                        var c = a.value;return a.setAttribute("type", b), c && (a.value = c), b;
                    }
                } } }, removeAttr: function removeAttr(a, b) {
            var c,
                d = 0,
                e = b && b.match(K);if (e && 1 === a.nodeType) while (c = e[d++]) {
                a.removeAttribute(c);
            }
        } }), hb = { set: function set(a, b, c) {
            return b === !1 ? r.removeAttr(a, c) : a.setAttribute(c, c), c;
        } }, r.each(r.expr.match.bool.source.match(/\w+/g), function (a, b) {
        var c = ib[b] || r.find.attr;ib[b] = function (a, b, d) {
            var e,
                f,
                g = b.toLowerCase();return d || (f = ib[g], ib[g] = e, e = null != c(a, b, d) ? g : null, ib[g] = f), e;
        };
    });var jb = /^(?:input|select|textarea|button)$/i,
        kb = /^(?:a|area)$/i;r.fn.extend({ prop: function prop(a, b) {
            return S(this, r.prop, a, b, arguments.length > 1);
        }, removeProp: function removeProp(a) {
            return this.each(function () {
                delete this[r.propFix[a] || a];
            });
        } }), r.extend({ prop: function prop(a, b, c) {
            var d,
                e,
                f = a.nodeType;if (3 !== f && 8 !== f && 2 !== f) return 1 === f && r.isXMLDoc(a) || (b = r.propFix[b] || b, e = r.propHooks[b]), void 0 !== c ? e && "set" in e && void 0 !== (d = e.set(a, c, b)) ? d : a[b] = c : e && "get" in e && null !== (d = e.get(a, b)) ? d : a[b];
        }, propHooks: { tabIndex: { get: function get(a) {
                    var b = r.find.attr(a, "tabindex");return b ? parseInt(b, 10) : jb.test(a.nodeName) || kb.test(a.nodeName) && a.href ? 0 : -1;
                } } }, propFix: { "for": "htmlFor", "class": "className" } }), o.optSelected || (r.propHooks.selected = { get: function get(a) {
            var b = a.parentNode;return b && b.parentNode && b.parentNode.selectedIndex, null;
        }, set: function set(a) {
            var b = a.parentNode;b && (b.selectedIndex, b.parentNode && b.parentNode.selectedIndex);
        } }), r.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function () {
        r.propFix[this.toLowerCase()] = this;
    });var lb = /[\t\r\n\f]/g;function mb(a) {
        return a.getAttribute && a.getAttribute("class") || "";
    }r.fn.extend({ addClass: function addClass(a) {
            var b,
                c,
                d,
                e,
                f,
                g,
                h,
                i = 0;if (r.isFunction(a)) return this.each(function (b) {
                r(this).addClass(a.call(this, b, mb(this)));
            });if ("string" == typeof a && a) {
                b = a.match(K) || [];while (c = this[i++]) {
                    if (e = mb(c), d = 1 === c.nodeType && (" " + e + " ").replace(lb, " ")) {
                        g = 0;while (f = b[g++]) {
                            d.indexOf(" " + f + " ") < 0 && (d += f + " ");
                        }h = r.trim(d), e !== h && c.setAttribute("class", h);
                    }
                }
            }return this;
        }, removeClass: function removeClass(a) {
            var b,
                c,
                d,
                e,
                f,
                g,
                h,
                i = 0;if (r.isFunction(a)) return this.each(function (b) {
                r(this).removeClass(a.call(this, b, mb(this)));
            });if (!arguments.length) return this.attr("class", "");if ("string" == typeof a && a) {
                b = a.match(K) || [];while (c = this[i++]) {
                    if (e = mb(c), d = 1 === c.nodeType && (" " + e + " ").replace(lb, " ")) {
                        g = 0;while (f = b[g++]) {
                            while (d.indexOf(" " + f + " ") > -1) {
                                d = d.replace(" " + f + " ", " ");
                            }
                        }h = r.trim(d), e !== h && c.setAttribute("class", h);
                    }
                }
            }return this;
        }, toggleClass: function toggleClass(a, b) {
            var c = typeof a === "undefined" ? "undefined" : _typeof(a);return "boolean" == typeof b && "string" === c ? b ? this.addClass(a) : this.removeClass(a) : r.isFunction(a) ? this.each(function (c) {
                r(this).toggleClass(a.call(this, c, mb(this), b), b);
            }) : this.each(function () {
                var b, d, e, f;if ("string" === c) {
                    d = 0, e = r(this), f = a.match(K) || [];while (b = f[d++]) {
                        e.hasClass(b) ? e.removeClass(b) : e.addClass(b);
                    }
                } else void 0 !== a && "boolean" !== c || (b = mb(this), b && V.set(this, "__className__", b), this.setAttribute && this.setAttribute("class", b || a === !1 ? "" : V.get(this, "__className__") || ""));
            });
        }, hasClass: function hasClass(a) {
            var b,
                c,
                d = 0;b = " " + a + " ";while (c = this[d++]) {
                if (1 === c.nodeType && (" " + mb(c) + " ").replace(lb, " ").indexOf(b) > -1) return !0;
            }return !1;
        } });var nb = /\r/g,
        ob = /[\x20\t\r\n\f]+/g;r.fn.extend({ val: function val(a) {
            var b,
                c,
                d,
                e = this[0];{
                if (arguments.length) return d = r.isFunction(a), this.each(function (c) {
                    var e;1 === this.nodeType && (e = d ? a.call(this, c, r(this).val()) : a, null == e ? e = "" : "number" == typeof e ? e += "" : r.isArray(e) && (e = r.map(e, function (a) {
                        return null == a ? "" : a + "";
                    })), b = r.valHooks[this.type] || r.valHooks[this.nodeName.toLowerCase()], b && "set" in b && void 0 !== b.set(this, e, "value") || (this.value = e));
                });if (e) return b = r.valHooks[e.type] || r.valHooks[e.nodeName.toLowerCase()], b && "get" in b && void 0 !== (c = b.get(e, "value")) ? c : (c = e.value, "string" == typeof c ? c.replace(nb, "") : null == c ? "" : c);
            }
        } }), r.extend({ valHooks: { option: { get: function get(a) {
                    var b = r.find.attr(a, "value");return null != b ? b : r.trim(r.text(a)).replace(ob, " ");
                } }, select: { get: function get(a) {
                    for (var b, c, d = a.options, e = a.selectedIndex, f = "select-one" === a.type, g = f ? null : [], h = f ? e + 1 : d.length, i = 0 > e ? h : f ? e : 0; h > i; i++) {
                        if (c = d[i], (c.selected || i === e) && !c.disabled && (!c.parentNode.disabled || !r.nodeName(c.parentNode, "optgroup"))) {
                            if (b = r(c).val(), f) return b;g.push(b);
                        }
                    }return g;
                }, set: function set(a, b) {
                    var c,
                        d,
                        e = a.options,
                        f = r.makeArray(b),
                        g = e.length;while (g--) {
                        d = e[g], (d.selected = r.inArray(r.valHooks.option.get(d), f) > -1) && (c = !0);
                    }return c || (a.selectedIndex = -1), f;
                } } } }), r.each(["radio", "checkbox"], function () {
        r.valHooks[this] = { set: function set(a, b) {
                return r.isArray(b) ? a.checked = r.inArray(r(a).val(), b) > -1 : void 0;
            } }, o.checkOn || (r.valHooks[this].get = function (a) {
            return null === a.getAttribute("value") ? "on" : a.value;
        });
    });var pb = /^(?:focusinfocus|focusoutblur)$/;r.extend(r.event, { trigger: function trigger(b, c, e, f) {
            var g,
                h,
                i,
                j,
                k,
                m,
                n,
                o = [e || d],
                p = l.call(b, "type") ? b.type : b,
                q = l.call(b, "namespace") ? b.namespace.split(".") : [];if (h = i = e = e || d, 3 !== e.nodeType && 8 !== e.nodeType && !pb.test(p + r.event.triggered) && (p.indexOf(".") > -1 && (q = p.split("."), p = q.shift(), q.sort()), k = p.indexOf(":") < 0 && "on" + p, b = b[r.expando] ? b : new r.Event(p, "object" == (typeof b === "undefined" ? "undefined" : _typeof(b)) && b), b.isTrigger = f ? 2 : 3, b.namespace = q.join("."), b.rnamespace = b.namespace ? new RegExp("(^|\\.)" + q.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, b.result = void 0, b.target || (b.target = e), c = null == c ? [b] : r.makeArray(c, [b]), n = r.event.special[p] || {}, f || !n.trigger || n.trigger.apply(e, c) !== !1)) {
                if (!f && !n.noBubble && !r.isWindow(e)) {
                    for (j = n.delegateType || p, pb.test(j + p) || (h = h.parentNode); h; h = h.parentNode) {
                        o.push(h), i = h;
                    }i === (e.ownerDocument || d) && o.push(i.defaultView || i.parentWindow || a);
                }g = 0;while ((h = o[g++]) && !b.isPropagationStopped()) {
                    b.type = g > 1 ? j : n.bindType || p, m = (V.get(h, "events") || {})[b.type] && V.get(h, "handle"), m && m.apply(h, c), m = k && h[k], m && m.apply && T(h) && (b.result = m.apply(h, c), b.result === !1 && b.preventDefault());
                }return b.type = p, f || b.isDefaultPrevented() || n._default && n._default.apply(o.pop(), c) !== !1 || !T(e) || k && r.isFunction(e[p]) && !r.isWindow(e) && (i = e[k], i && (e[k] = null), r.event.triggered = p, e[p](), r.event.triggered = void 0, i && (e[k] = i)), b.result;
            }
        }, simulate: function simulate(a, b, c) {
            var d = r.extend(new r.Event(), c, { type: a, isSimulated: !0 });r.event.trigger(d, null, b);
        } }), r.fn.extend({ trigger: function trigger(a, b) {
            return this.each(function () {
                r.event.trigger(a, b, this);
            });
        }, triggerHandler: function triggerHandler(a, b) {
            var c = this[0];return c ? r.event.trigger(a, b, c, !0) : void 0;
        } }), r.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "), function (a, b) {
        r.fn[b] = function (a, c) {
            return arguments.length > 0 ? this.on(b, null, a, c) : this.trigger(b);
        };
    }), r.fn.extend({ hover: function hover(a, b) {
            return this.mouseenter(a).mouseleave(b || a);
        } }), o.focusin = "onfocusin" in a, o.focusin || r.each({ focus: "focusin", blur: "focusout" }, function (a, b) {
        var c = function c(a) {
            r.event.simulate(b, a.target, r.event.fix(a));
        };r.event.special[b] = { setup: function setup() {
                var d = this.ownerDocument || this,
                    e = V.access(d, b);e || d.addEventListener(a, c, !0), V.access(d, b, (e || 0) + 1);
            }, teardown: function teardown() {
                var d = this.ownerDocument || this,
                    e = V.access(d, b) - 1;e ? V.access(d, b, e) : (d.removeEventListener(a, c, !0), V.remove(d, b));
            } };
    });var qb = a.location,
        rb = r.now(),
        sb = /\?/;r.parseXML = function (b) {
        var c;if (!b || "string" != typeof b) return null;try {
            c = new a.DOMParser().parseFromString(b, "text/xml");
        } catch (d) {
            c = void 0;
        }return c && !c.getElementsByTagName("parsererror").length || r.error("Invalid XML: " + b), c;
    };var tb = /\[\]$/,
        ub = /\r?\n/g,
        vb = /^(?:submit|button|image|reset|file)$/i,
        wb = /^(?:input|select|textarea|keygen)/i;function xb(a, b, c, d) {
        var e;if (r.isArray(b)) r.each(b, function (b, e) {
            c || tb.test(a) ? d(a, e) : xb(a + "[" + ("object" == (typeof e === "undefined" ? "undefined" : _typeof(e)) && null != e ? b : "") + "]", e, c, d);
        });else if (c || "object" !== r.type(b)) d(a, b);else for (e in b) {
            xb(a + "[" + e + "]", b[e], c, d);
        }
    }r.param = function (a, b) {
        var c,
            d = [],
            e = function e(a, b) {
            var c = r.isFunction(b) ? b() : b;d[d.length] = encodeURIComponent(a) + "=" + encodeURIComponent(null == c ? "" : c);
        };if (r.isArray(a) || a.jquery && !r.isPlainObject(a)) r.each(a, function () {
            e(this.name, this.value);
        });else for (c in a) {
            xb(c, a[c], b, e);
        }return d.join("&");
    }, r.fn.extend({ serialize: function serialize() {
            return r.param(this.serializeArray());
        }, serializeArray: function serializeArray() {
            return this.map(function () {
                var a = r.prop(this, "elements");return a ? r.makeArray(a) : this;
            }).filter(function () {
                var a = this.type;return this.name && !r(this).is(":disabled") && wb.test(this.nodeName) && !vb.test(a) && (this.checked || !ha.test(a));
            }).map(function (a, b) {
                var c = r(this).val();return null == c ? null : r.isArray(c) ? r.map(c, function (a) {
                    return { name: b.name, value: a.replace(ub, "\r\n") };
                }) : { name: b.name, value: c.replace(ub, "\r\n") };
            }).get();
        } });var yb = /%20/g,
        zb = /#.*$/,
        Ab = /([?&])_=[^&]*/,
        Bb = /^(.*?):[ \t]*([^\r\n]*)$/gm,
        Cb = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
        Db = /^(?:GET|HEAD)$/,
        Eb = /^\/\//,
        Fb = {},
        Gb = {},
        Hb = "*/".concat("*"),
        Ib = d.createElement("a");Ib.href = qb.href;function Jb(a) {
        return function (b, c) {
            "string" != typeof b && (c = b, b = "*");var d,
                e = 0,
                f = b.toLowerCase().match(K) || [];if (r.isFunction(c)) while (d = f[e++]) {
                "+" === d[0] ? (d = d.slice(1) || "*", (a[d] = a[d] || []).unshift(c)) : (a[d] = a[d] || []).push(c);
            }
        };
    }function Kb(a, b, c, d) {
        var e = {},
            f = a === Gb;function g(h) {
            var i;return e[h] = !0, r.each(a[h] || [], function (a, h) {
                var j = h(b, c, d);return "string" != typeof j || f || e[j] ? f ? !(i = j) : void 0 : (b.dataTypes.unshift(j), g(j), !1);
            }), i;
        }return g(b.dataTypes[0]) || !e["*"] && g("*");
    }function Lb(a, b) {
        var c,
            d,
            e = r.ajaxSettings.flatOptions || {};for (c in b) {
            void 0 !== b[c] && ((e[c] ? a : d || (d = {}))[c] = b[c]);
        }return d && r.extend(!0, a, d), a;
    }function Mb(a, b, c) {
        var d,
            e,
            f,
            g,
            h = a.contents,
            i = a.dataTypes;while ("*" === i[0]) {
            i.shift(), void 0 === d && (d = a.mimeType || b.getResponseHeader("Content-Type"));
        }if (d) for (e in h) {
            if (h[e] && h[e].test(d)) {
                i.unshift(e);break;
            }
        }if (i[0] in c) f = i[0];else {
            for (e in c) {
                if (!i[0] || a.converters[e + " " + i[0]]) {
                    f = e;break;
                }g || (g = e);
            }f = f || g;
        }return f ? (f !== i[0] && i.unshift(f), c[f]) : void 0;
    }function Nb(a, b, c, d) {
        var e,
            f,
            g,
            h,
            i,
            j = {},
            k = a.dataTypes.slice();if (k[1]) for (g in a.converters) {
            j[g.toLowerCase()] = a.converters[g];
        }f = k.shift();while (f) {
            if (a.responseFields[f] && (c[a.responseFields[f]] = b), !i && d && a.dataFilter && (b = a.dataFilter(b, a.dataType)), i = f, f = k.shift()) if ("*" === f) f = i;else if ("*" !== i && i !== f) {
                if (g = j[i + " " + f] || j["* " + f], !g) for (e in j) {
                    if (h = e.split(" "), h[1] === f && (g = j[i + " " + h[0]] || j["* " + h[0]])) {
                        g === !0 ? g = j[e] : j[e] !== !0 && (f = h[0], k.unshift(h[1]));break;
                    }
                }if (g !== !0) if (g && a["throws"]) b = g(b);else try {
                    b = g(b);
                } catch (l) {
                    return { state: "parsererror", error: g ? l : "No conversion from " + i + " to " + f };
                }
            }
        }return { state: "success", data: b };
    }r.extend({ active: 0, lastModified: {}, etag: {}, ajaxSettings: { url: qb.href, type: "GET", isLocal: Cb.test(qb.protocol), global: !0, processData: !0, async: !0, contentType: "application/x-www-form-urlencoded; charset=UTF-8", accepts: { "*": Hb, text: "text/plain", html: "text/html", xml: "application/xml, text/xml", json: "application/json, text/javascript" }, contents: { xml: /\bxml\b/, html: /\bhtml/, json: /\bjson\b/ }, responseFields: { xml: "responseXML", text: "responseText", json: "responseJSON" }, converters: { "* text": String, "text html": !0, "text json": JSON.parse, "text xml": r.parseXML }, flatOptions: { url: !0, context: !0 } }, ajaxSetup: function ajaxSetup(a, b) {
            return b ? Lb(Lb(a, r.ajaxSettings), b) : Lb(r.ajaxSettings, a);
        }, ajaxPrefilter: Jb(Fb), ajaxTransport: Jb(Gb), ajax: function ajax(b, c) {
            "object" == (typeof b === "undefined" ? "undefined" : _typeof(b)) && (c = b, b = void 0), c = c || {};var e,
                f,
                g,
                h,
                i,
                j,
                k,
                l,
                m,
                n,
                o = r.ajaxSetup({}, c),
                p = o.context || o,
                q = o.context && (p.nodeType || p.jquery) ? r(p) : r.event,
                s = r.Deferred(),
                t = r.Callbacks("once memory"),
                u = o.statusCode || {},
                v = {},
                w = {},
                x = "canceled",
                y = { readyState: 0, getResponseHeader: function getResponseHeader(a) {
                    var b;if (k) {
                        if (!h) {
                            h = {};while (b = Bb.exec(g)) {
                                h[b[1].toLowerCase()] = b[2];
                            }
                        }b = h[a.toLowerCase()];
                    }return null == b ? null : b;
                }, getAllResponseHeaders: function getAllResponseHeaders() {
                    return k ? g : null;
                }, setRequestHeader: function setRequestHeader(a, b) {
                    return null == k && (a = w[a.toLowerCase()] = w[a.toLowerCase()] || a, v[a] = b), this;
                }, overrideMimeType: function overrideMimeType(a) {
                    return null == k && (o.mimeType = a), this;
                }, statusCode: function statusCode(a) {
                    var b;if (a) if (k) y.always(a[y.status]);else for (b in a) {
                        u[b] = [u[b], a[b]];
                    }return this;
                }, abort: function abort(a) {
                    var b = a || x;return e && e.abort(b), A(0, b), this;
                } };if (s.promise(y), o.url = ((b || o.url || qb.href) + "").replace(Eb, qb.protocol + "//"), o.type = c.method || c.type || o.method || o.type, o.dataTypes = (o.dataType || "*").toLowerCase().match(K) || [""], null == o.crossDomain) {
                j = d.createElement("a");try {
                    j.href = o.url, j.href = j.href, o.crossDomain = Ib.protocol + "//" + Ib.host != j.protocol + "//" + j.host;
                } catch (z) {
                    o.crossDomain = !0;
                }
            }if (o.data && o.processData && "string" != typeof o.data && (o.data = r.param(o.data, o.traditional)), Kb(Fb, o, c, y), k) return y;l = r.event && o.global, l && 0 === r.active++ && r.event.trigger("ajaxStart"), o.type = o.type.toUpperCase(), o.hasContent = !Db.test(o.type), f = o.url.replace(zb, ""), o.hasContent ? o.data && o.processData && 0 === (o.contentType || "").indexOf("application/x-www-form-urlencoded") && (o.data = o.data.replace(yb, "+")) : (n = o.url.slice(f.length), o.data && (f += (sb.test(f) ? "&" : "?") + o.data, delete o.data), o.cache === !1 && (f = f.replace(Ab, ""), n = (sb.test(f) ? "&" : "?") + "_=" + rb++ + n), o.url = f + n), o.ifModified && (r.lastModified[f] && y.setRequestHeader("If-Modified-Since", r.lastModified[f]), r.etag[f] && y.setRequestHeader("If-None-Match", r.etag[f])), (o.data && o.hasContent && o.contentType !== !1 || c.contentType) && y.setRequestHeader("Content-Type", o.contentType), y.setRequestHeader("Accept", o.dataTypes[0] && o.accepts[o.dataTypes[0]] ? o.accepts[o.dataTypes[0]] + ("*" !== o.dataTypes[0] ? ", " + Hb + "; q=0.01" : "") : o.accepts["*"]);for (m in o.headers) {
                y.setRequestHeader(m, o.headers[m]);
            }if (o.beforeSend && (o.beforeSend.call(p, y, o) === !1 || k)) return y.abort();if (x = "abort", t.add(o.complete), y.done(o.success), y.fail(o.error), e = Kb(Gb, o, c, y)) {
                if (y.readyState = 1, l && q.trigger("ajaxSend", [y, o]), k) return y;o.async && o.timeout > 0 && (i = a.setTimeout(function () {
                    y.abort("timeout");
                }, o.timeout));try {
                    k = !1, e.send(v, A);
                } catch (z) {
                    if (k) throw z;A(-1, z);
                }
            } else A(-1, "No Transport");function A(b, c, d, h) {
                var j,
                    m,
                    n,
                    v,
                    w,
                    x = c;k || (k = !0, i && a.clearTimeout(i), e = void 0, g = h || "", y.readyState = b > 0 ? 4 : 0, j = b >= 200 && 300 > b || 304 === b, d && (v = Mb(o, y, d)), v = Nb(o, v, y, j), j ? (o.ifModified && (w = y.getResponseHeader("Last-Modified"), w && (r.lastModified[f] = w), w = y.getResponseHeader("etag"), w && (r.etag[f] = w)), 204 === b || "HEAD" === o.type ? x = "nocontent" : 304 === b ? x = "notmodified" : (x = v.state, m = v.data, n = v.error, j = !n)) : (n = x, !b && x || (x = "error", 0 > b && (b = 0))), y.status = b, y.statusText = (c || x) + "", j ? s.resolveWith(p, [m, x, y]) : s.rejectWith(p, [y, x, n]), y.statusCode(u), u = void 0, l && q.trigger(j ? "ajaxSuccess" : "ajaxError", [y, o, j ? m : n]), t.fireWith(p, [y, x]), l && (q.trigger("ajaxComplete", [y, o]), --r.active || r.event.trigger("ajaxStop")));
            }return y;
        }, getJSON: function getJSON(a, b, c) {
            return r.get(a, b, c, "json");
        }, getScript: function getScript(a, b) {
            return r.get(a, void 0, b, "script");
        } }), r.each(["get", "post"], function (a, b) {
        r[b] = function (a, c, d, e) {
            return r.isFunction(c) && (e = e || d, d = c, c = void 0), r.ajax(r.extend({ url: a, type: b, dataType: e, data: c, success: d }, r.isPlainObject(a) && a));
        };
    }), r._evalUrl = function (a) {
        return r.ajax({ url: a, type: "GET", dataType: "script", cache: !0, async: !1, global: !1, "throws": !0 });
    }, r.fn.extend({ wrapAll: function wrapAll(a) {
            var b;return this[0] && (r.isFunction(a) && (a = a.call(this[0])), b = r(a, this[0].ownerDocument).eq(0).clone(!0), this[0].parentNode && b.insertBefore(this[0]), b.map(function () {
                var a = this;while (a.firstElementChild) {
                    a = a.firstElementChild;
                }return a;
            }).append(this)), this;
        }, wrapInner: function wrapInner(a) {
            return r.isFunction(a) ? this.each(function (b) {
                r(this).wrapInner(a.call(this, b));
            }) : this.each(function () {
                var b = r(this),
                    c = b.contents();c.length ? c.wrapAll(a) : b.append(a);
            });
        }, wrap: function wrap(a) {
            var b = r.isFunction(a);return this.each(function (c) {
                r(this).wrapAll(b ? a.call(this, c) : a);
            });
        }, unwrap: function unwrap(a) {
            return this.parent(a).not("body").each(function () {
                r(this).replaceWith(this.childNodes);
            }), this;
        } }), r.expr.pseudos.hidden = function (a) {
        return !r.expr.pseudos.visible(a);
    }, r.expr.pseudos.visible = function (a) {
        return !!(a.offsetWidth || a.offsetHeight || a.getClientRects().length);
    }, r.ajaxSettings.xhr = function () {
        try {
            return new a.XMLHttpRequest();
        } catch (b) {}
    };var Ob = { 0: 200, 1223: 204 },
        Pb = r.ajaxSettings.xhr();o.cors = !!Pb && "withCredentials" in Pb, o.ajax = Pb = !!Pb, r.ajaxTransport(function (b) {
        var _c, d;return o.cors || Pb && !b.crossDomain ? { send: function send(e, f) {
                var g,
                    h = b.xhr();if (h.open(b.type, b.url, b.async, b.username, b.password), b.xhrFields) for (g in b.xhrFields) {
                    h[g] = b.xhrFields[g];
                }b.mimeType && h.overrideMimeType && h.overrideMimeType(b.mimeType), b.crossDomain || e["X-Requested-With"] || (e["X-Requested-With"] = "XMLHttpRequest");for (g in e) {
                    h.setRequestHeader(g, e[g]);
                }_c = function c(a) {
                    return function () {
                        _c && (_c = d = h.onload = h.onerror = h.onabort = h.onreadystatechange = null, "abort" === a ? h.abort() : "error" === a ? "number" != typeof h.status ? f(0, "error") : f(h.status, h.statusText) : f(Ob[h.status] || h.status, h.statusText, "text" !== (h.responseType || "text") || "string" != typeof h.responseText ? { binary: h.response } : { text: h.responseText }, h.getAllResponseHeaders()));
                    };
                }, h.onload = _c(), d = h.onerror = _c("error"), void 0 !== h.onabort ? h.onabort = d : h.onreadystatechange = function () {
                    4 === h.readyState && a.setTimeout(function () {
                        _c && d();
                    });
                }, _c = _c("abort");try {
                    h.send(b.hasContent && b.data || null);
                } catch (i) {
                    if (_c) throw i;
                }
            }, abort: function abort() {
                _c && _c();
            } } : void 0;
    }), r.ajaxPrefilter(function (a) {
        a.crossDomain && (a.contents.script = !1);
    }), r.ajaxSetup({ accepts: { script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript" }, contents: { script: /\b(?:java|ecma)script\b/ }, converters: { "text script": function textScript(a) {
                return r.globalEval(a), a;
            } } }), r.ajaxPrefilter("script", function (a) {
        void 0 === a.cache && (a.cache = !1), a.crossDomain && (a.type = "GET");
    }), r.ajaxTransport("script", function (a) {
        if (a.crossDomain) {
            var b, _c2;return { send: function send(e, f) {
                    b = r("<script>").prop({ charset: a.scriptCharset, src: a.url }).on("load error", _c2 = function c(a) {
                        b.remove(), _c2 = null, a && f("error" === a.type ? 404 : 200, a.type);
                    }), d.head.appendChild(b[0]);
                }, abort: function abort() {
                    _c2 && _c2();
                } };
        }
    });var Qb = [],
        Rb = /(=)\?(?=&|$)|\?\?/;r.ajaxSetup({ jsonp: "callback", jsonpCallback: function jsonpCallback() {
            var a = Qb.pop() || r.expando + "_" + rb++;return this[a] = !0, a;
        } }), r.ajaxPrefilter("json jsonp", function (b, c, d) {
        var e,
            f,
            g,
            h = b.jsonp !== !1 && (Rb.test(b.url) ? "url" : "string" == typeof b.data && 0 === (b.contentType || "").indexOf("application/x-www-form-urlencoded") && Rb.test(b.data) && "data");return h || "jsonp" === b.dataTypes[0] ? (e = b.jsonpCallback = r.isFunction(b.jsonpCallback) ? b.jsonpCallback() : b.jsonpCallback, h ? b[h] = b[h].replace(Rb, "$1" + e) : b.jsonp !== !1 && (b.url += (sb.test(b.url) ? "&" : "?") + b.jsonp + "=" + e), b.converters["script json"] = function () {
            return g || r.error(e + " was not called"), g[0];
        }, b.dataTypes[0] = "json", f = a[e], a[e] = function () {
            g = arguments;
        }, d.always(function () {
            void 0 === f ? r(a).removeProp(e) : a[e] = f, b[e] && (b.jsonpCallback = c.jsonpCallback, Qb.push(e)), g && r.isFunction(f) && f(g[0]), g = f = void 0;
        }), "script") : void 0;
    }), o.createHTMLDocument = function () {
        var a = d.implementation.createHTMLDocument("").body;return a.innerHTML = "<form></form><form></form>", 2 === a.childNodes.length;
    }(), r.parseHTML = function (a, b, c) {
        if ("string" != typeof a) return [];"boolean" == typeof b && (c = b, b = !1);var e, f, g;return b || (o.createHTMLDocument ? (b = d.implementation.createHTMLDocument(""), e = b.createElement("base"), e.href = d.location.href, b.head.appendChild(e)) : b = d), f = B.exec(a), g = !c && [], f ? [b.createElement(f[1])] : (f = oa([a], b, g), g && g.length && r(g).remove(), r.merge([], f.childNodes));
    }, r.fn.load = function (a, b, c) {
        var d,
            e,
            f,
            g = this,
            h = a.indexOf(" ");return h > -1 && (d = r.trim(a.slice(h)), a = a.slice(0, h)), r.isFunction(b) ? (c = b, b = void 0) : b && "object" == (typeof b === "undefined" ? "undefined" : _typeof(b)) && (e = "POST"), g.length > 0 && r.ajax({ url: a, type: e || "GET", dataType: "html", data: b }).done(function (a) {
            f = arguments, g.html(d ? r("<div>").append(r.parseHTML(a)).find(d) : a);
        }).always(c && function (a, b) {
            g.each(function () {
                c.apply(this, f || [a.responseText, b, a]);
            });
        }), this;
    }, r.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function (a, b) {
        r.fn[b] = function (a) {
            return this.on(b, a);
        };
    }), r.expr.pseudos.animated = function (a) {
        return r.grep(r.timers, function (b) {
            return a === b.elem;
        }).length;
    };function Sb(a) {
        return r.isWindow(a) ? a : 9 === a.nodeType && a.defaultView;
    }r.offset = { setOffset: function setOffset(a, b, c) {
            var d,
                e,
                f,
                g,
                h,
                i,
                j,
                k = r.css(a, "position"),
                l = r(a),
                m = {};"static" === k && (a.style.position = "relative"), h = l.offset(), f = r.css(a, "top"), i = r.css(a, "left"), j = ("absolute" === k || "fixed" === k) && (f + i).indexOf("auto") > -1, j ? (d = l.position(), g = d.top, e = d.left) : (g = parseFloat(f) || 0, e = parseFloat(i) || 0), r.isFunction(b) && (b = b.call(a, c, r.extend({}, h))), null != b.top && (m.top = b.top - h.top + g), null != b.left && (m.left = b.left - h.left + e), "using" in b ? b.using.call(a, m) : l.css(m);
        } }, r.fn.extend({ offset: function offset(a) {
            if (arguments.length) return void 0 === a ? this : this.each(function (b) {
                r.offset.setOffset(this, a, b);
            });var b,
                c,
                d,
                e,
                f = this[0];if (f) return f.getClientRects().length ? (d = f.getBoundingClientRect(), d.width || d.height ? (e = f.ownerDocument, c = Sb(e), b = e.documentElement, { top: d.top + c.pageYOffset - b.clientTop, left: d.left + c.pageXOffset - b.clientLeft }) : d) : { top: 0, left: 0 };
        }, position: function position() {
            if (this[0]) {
                var a,
                    b,
                    c = this[0],
                    d = { top: 0, left: 0 };return "fixed" === r.css(c, "position") ? b = c.getBoundingClientRect() : (a = this.offsetParent(), b = this.offset(), r.nodeName(a[0], "html") || (d = a.offset()), d = { top: d.top + r.css(a[0], "borderTopWidth", !0), left: d.left + r.css(a[0], "borderLeftWidth", !0) }), { top: b.top - d.top - r.css(c, "marginTop", !0), left: b.left - d.left - r.css(c, "marginLeft", !0) };
            }
        }, offsetParent: function offsetParent() {
            return this.map(function () {
                var a = this.offsetParent;while (a && "static" === r.css(a, "position")) {
                    a = a.offsetParent;
                }return a || pa;
            });
        } }), r.each({ scrollLeft: "pageXOffset", scrollTop: "pageYOffset" }, function (a, b) {
        var c = "pageYOffset" === b;r.fn[a] = function (d) {
            return S(this, function (a, d, e) {
                var f = Sb(a);return void 0 === e ? f ? f[b] : a[d] : void (f ? f.scrollTo(c ? f.pageXOffset : e, c ? e : f.pageYOffset) : a[d] = e);
            }, a, d, arguments.length);
        };
    }), r.each(["top", "left"], function (a, b) {
        r.cssHooks[b] = Na(o.pixelPosition, function (a, c) {
            return c ? (c = Ma(a, b), Ka.test(c) ? r(a).position()[b] + "px" : c) : void 0;
        });
    }), r.each({ Height: "height", Width: "width" }, function (a, b) {
        r.each({ padding: "inner" + a, content: b, "": "outer" + a }, function (c, d) {
            r.fn[d] = function (e, f) {
                var g = arguments.length && (c || "boolean" != typeof e),
                    h = c || (e === !0 || f === !0 ? "margin" : "border");return S(this, function (b, c, e) {
                    var f;return r.isWindow(b) ? 0 === d.indexOf("outer") ? b["inner" + a] : b.document.documentElement["client" + a] : 9 === b.nodeType ? (f = b.documentElement, Math.max(b.body["scroll" + a], f["scroll" + a], b.body["offset" + a], f["offset" + a], f["client" + a])) : void 0 === e ? r.css(b, c, h) : r.style(b, c, e, h);
                }, b, g ? e : void 0, g);
            };
        });
    }), r.fn.extend({ bind: function bind(a, b, c) {
            return this.on(a, null, b, c);
        }, unbind: function unbind(a, b) {
            return this.off(a, null, b);
        }, delegate: function delegate(a, b, c, d) {
            return this.on(b, a, c, d);
        }, undelegate: function undelegate(a, b, c) {
            return 1 === arguments.length ? this.off(a, "**") : this.off(b, a || "**", c);
        } }), r.parseJSON = JSON.parse, "function" == typeof define && define.amd && define("jquery", [], function () {
        return r;
    });var Tb = a.jQuery,
        Ub = a.$;return r.noConflict = function (b) {
        return a.$ === r && (a.$ = Ub), b && a.jQuery === r && (a.jQuery = Tb), r;
    }, b || (a.jQuery = a.$ = r), r;
});
/*
     _ _      _       _
 ___| (_) ___| | __  (_)___
/ __| | |/ __| |/ /  | / __|
\__ \ | | (__|   < _ | \__ \
|___/_|_|\___|_|\_(_)/ |___/
                   |__/

 Version: 1.8.0
  Author: Ken Wheeler
 Website: http://kenwheeler.github.io
    Docs: http://kenwheeler.github.io/slick
    Repo: http://github.com/kenwheeler/slick
  Issues: http://github.com/kenwheeler/slick/issues

 */
/* global window, document, define, jQuery, setInterval, clearInterval */
;(function (factory) {
    'use strict';

    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else if (typeof exports !== 'undefined') {
        module.exports = factory(require('jquery'));
    } else {
        factory(jQuery);
    }
})(function ($) {
    'use strict';

    var Slick = window.Slick || {};

    Slick = function () {

        var instanceUid = 0;

        function Slick(element, settings) {

            var _ = this,
                dataSettings;

            _.defaults = {
                accessibility: true,
                adaptiveHeight: false,
                appendArrows: $(element),
                appendDots: $(element),
                arrows: true,
                asNavFor: null,
                prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
                nextArrow: '<button class="slick-next" aria-label="Next" type="button">Next</button>',
                autoplay: false,
                autoplaySpeed: 3000,
                centerMode: false,
                centerPadding: '50px',
                cssEase: 'ease',
                customPaging: function customPaging(slider, i) {
                    return $('<button type="button" />').text(i + 1);
                },
                dots: false,
                dotsClass: 'slick-dots',
                draggable: true,
                easing: 'linear',
                edgeFriction: 0.35,
                fade: false,
                focusOnSelect: false,
                focusOnChange: false,
                infinite: true,
                initialSlide: 0,
                lazyLoad: 'ondemand',
                mobileFirst: false,
                pauseOnHover: true,
                pauseOnFocus: true,
                pauseOnDotsHover: false,
                respondTo: 'window',
                responsive: null,
                rows: 1,
                rtl: false,
                slide: '',
                slidesPerRow: 1,
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 500,
                swipe: true,
                swipeToSlide: false,
                touchMove: true,
                touchThreshold: 5,
                useCSS: true,
                useTransform: true,
                variableWidth: false,
                vertical: false,
                verticalSwiping: false,
                waitForAnimate: true,
                zIndex: 1000
            };

            _.initials = {
                animating: false,
                dragging: false,
                autoPlayTimer: null,
                currentDirection: 0,
                currentLeft: null,
                currentSlide: 0,
                direction: 1,
                $dots: null,
                listWidth: null,
                listHeight: null,
                loadIndex: 0,
                $nextArrow: null,
                $prevArrow: null,
                scrolling: false,
                slideCount: null,
                slideWidth: null,
                $slideTrack: null,
                $slides: null,
                sliding: false,
                slideOffset: 0,
                swipeLeft: null,
                swiping: false,
                $list: null,
                touchObject: {},
                transformsEnabled: false,
                unslicked: false
            };

            $.extend(_, _.initials);

            _.activeBreakpoint = null;
            _.animType = null;
            _.animProp = null;
            _.breakpoints = [];
            _.breakpointSettings = [];
            _.cssTransitions = false;
            _.focussed = false;
            _.interrupted = false;
            _.hidden = 'hidden';
            _.paused = true;
            _.positionProp = null;
            _.respondTo = null;
            _.rowCount = 1;
            _.shouldClick = true;
            _.$slider = $(element);
            _.$slidesCache = null;
            _.transformType = null;
            _.transitionType = null;
            _.visibilityChange = 'visibilitychange';
            _.windowWidth = 0;
            _.windowTimer = null;

            dataSettings = $(element).data('slick') || {};

            _.options = $.extend({}, _.defaults, settings, dataSettings);

            _.currentSlide = _.options.initialSlide;

            _.originalSettings = _.options;

            if (typeof document.mozHidden !== 'undefined') {
                _.hidden = 'mozHidden';
                _.visibilityChange = 'mozvisibilitychange';
            } else if (typeof document.webkitHidden !== 'undefined') {
                _.hidden = 'webkitHidden';
                _.visibilityChange = 'webkitvisibilitychange';
            }

            _.autoPlay = $.proxy(_.autoPlay, _);
            _.autoPlayClear = $.proxy(_.autoPlayClear, _);
            _.autoPlayIterator = $.proxy(_.autoPlayIterator, _);
            _.changeSlide = $.proxy(_.changeSlide, _);
            _.clickHandler = $.proxy(_.clickHandler, _);
            _.selectHandler = $.proxy(_.selectHandler, _);
            _.setPosition = $.proxy(_.setPosition, _);
            _.swipeHandler = $.proxy(_.swipeHandler, _);
            _.dragHandler = $.proxy(_.dragHandler, _);
            _.keyHandler = $.proxy(_.keyHandler, _);

            _.instanceUid = instanceUid++;

            // A simple way to check for HTML strings
            // Strict HTML recognition (must start with <)
            // Extracted from jQuery v1.11 source
            _.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/;

            _.registerBreakpoints();
            _.init(true);
        }

        return Slick;
    }();

    Slick.prototype.activateADA = function () {
        var _ = this;

        _.$slideTrack.find('.slick-active').attr({
            'aria-hidden': 'false'
        }).find('a, input, button, select').attr({
            'tabindex': '0'
        });
    };

    Slick.prototype.addSlide = Slick.prototype.slickAdd = function (markup, index, addBefore) {

        var _ = this;

        if (typeof index === 'boolean') {
            addBefore = index;
            index = null;
        } else if (index < 0 || index >= _.slideCount) {
            return false;
        }

        _.unload();

        if (typeof index === 'number') {
            if (index === 0 && _.$slides.length === 0) {
                $(markup).appendTo(_.$slideTrack);
            } else if (addBefore) {
                $(markup).insertBefore(_.$slides.eq(index));
            } else {
                $(markup).insertAfter(_.$slides.eq(index));
            }
        } else {
            if (addBefore === true) {
                $(markup).prependTo(_.$slideTrack);
            } else {
                $(markup).appendTo(_.$slideTrack);
            }
        }

        _.$slides = _.$slideTrack.children(this.options.slide);

        _.$slideTrack.children(this.options.slide).detach();

        _.$slideTrack.append(_.$slides);

        _.$slides.each(function (index, element) {
            $(element).attr('data-slick-index', index);
        });

        _.$slidesCache = _.$slides;

        _.reinit();
    };

    Slick.prototype.animateHeight = function () {
        var _ = this;
        if (_.options.slidesToShow === 1 && _.options.adaptiveHeight === true && _.options.vertical === false) {
            var targetHeight = _.$slides.eq(_.currentSlide).outerHeight(true);
            _.$list.animate({
                height: targetHeight
            }, _.options.speed);
        }
    };

    Slick.prototype.animateSlide = function (targetLeft, callback) {

        var animProps = {},
            _ = this;

        _.animateHeight();

        if (_.options.rtl === true && _.options.vertical === false) {
            targetLeft = -targetLeft;
        }
        if (_.transformsEnabled === false) {
            if (_.options.vertical === false) {
                _.$slideTrack.animate({
                    left: targetLeft
                }, _.options.speed, _.options.easing, callback);
            } else {
                _.$slideTrack.animate({
                    top: targetLeft
                }, _.options.speed, _.options.easing, callback);
            }
        } else {

            if (_.cssTransitions === false) {
                if (_.options.rtl === true) {
                    _.currentLeft = -_.currentLeft;
                }
                $({
                    animStart: _.currentLeft
                }).animate({
                    animStart: targetLeft
                }, {
                    duration: _.options.speed,
                    easing: _.options.easing,
                    step: function step(now) {
                        now = Math.ceil(now);
                        if (_.options.vertical === false) {
                            animProps[_.animType] = 'translate(' + now + 'px, 0px)';
                            _.$slideTrack.css(animProps);
                        } else {
                            animProps[_.animType] = 'translate(0px,' + now + 'px)';
                            _.$slideTrack.css(animProps);
                        }
                    },
                    complete: function complete() {
                        if (callback) {
                            callback.call();
                        }
                    }
                });
            } else {

                _.applyTransition();
                targetLeft = Math.ceil(targetLeft);

                if (_.options.vertical === false) {
                    animProps[_.animType] = 'translate3d(' + targetLeft + 'px, 0px, 0px)';
                } else {
                    animProps[_.animType] = 'translate3d(0px,' + targetLeft + 'px, 0px)';
                }
                _.$slideTrack.css(animProps);

                if (callback) {
                    setTimeout(function () {

                        _.disableTransition();

                        callback.call();
                    }, _.options.speed);
                }
            }
        }
    };

    Slick.prototype.getNavTarget = function () {

        var _ = this,
            asNavFor = _.options.asNavFor;

        if (asNavFor && asNavFor !== null) {
            asNavFor = $(asNavFor).not(_.$slider);
        }

        return asNavFor;
    };

    Slick.prototype.asNavFor = function (index) {

        var _ = this,
            asNavFor = _.getNavTarget();

        if (asNavFor !== null && (typeof asNavFor === "undefined" ? "undefined" : _typeof(asNavFor)) === 'object') {
            asNavFor.each(function () {
                var target = $(this).slick('getSlick');
                if (!target.unslicked) {
                    target.slideHandler(index, true);
                }
            });
        }
    };

    Slick.prototype.applyTransition = function (slide) {

        var _ = this,
            transition = {};

        if (_.options.fade === false) {
            transition[_.transitionType] = _.transformType + ' ' + _.options.speed + 'ms ' + _.options.cssEase;
        } else {
            transition[_.transitionType] = 'opacity ' + _.options.speed + 'ms ' + _.options.cssEase;
        }

        if (_.options.fade === false) {
            _.$slideTrack.css(transition);
        } else {
            _.$slides.eq(slide).css(transition);
        }
    };

    Slick.prototype.autoPlay = function () {

        var _ = this;

        _.autoPlayClear();

        if (_.slideCount > _.options.slidesToShow) {
            _.autoPlayTimer = setInterval(_.autoPlayIterator, _.options.autoplaySpeed);
        }
    };

    Slick.prototype.autoPlayClear = function () {

        var _ = this;

        if (_.autoPlayTimer) {
            clearInterval(_.autoPlayTimer);
        }
    };

    Slick.prototype.autoPlayIterator = function () {

        var _ = this,
            slideTo = _.currentSlide + _.options.slidesToScroll;

        if (!_.paused && !_.interrupted && !_.focussed) {

            if (_.options.infinite === false) {

                if (_.direction === 1 && _.currentSlide + 1 === _.slideCount - 1) {
                    _.direction = 0;
                } else if (_.direction === 0) {

                    slideTo = _.currentSlide - _.options.slidesToScroll;

                    if (_.currentSlide - 1 === 0) {
                        _.direction = 1;
                    }
                }
            }

            _.slideHandler(slideTo);
        }
    };

    Slick.prototype.buildArrows = function () {

        var _ = this;

        if (_.options.arrows === true) {

            _.$prevArrow = $(_.options.prevArrow).addClass('slick-arrow');
            _.$nextArrow = $(_.options.nextArrow).addClass('slick-arrow');

            if (_.slideCount > _.options.slidesToShow) {

                _.$prevArrow.removeClass('slick-hidden').removeAttr('aria-hidden tabindex');
                _.$nextArrow.removeClass('slick-hidden').removeAttr('aria-hidden tabindex');

                if (_.htmlExpr.test(_.options.prevArrow)) {
                    _.$prevArrow.prependTo(_.options.appendArrows);
                }

                if (_.htmlExpr.test(_.options.nextArrow)) {
                    _.$nextArrow.appendTo(_.options.appendArrows);
                }

                if (_.options.infinite !== true) {
                    _.$prevArrow.addClass('slick-disabled').attr('aria-disabled', 'true');
                }
            } else {

                _.$prevArrow.add(_.$nextArrow).addClass('slick-hidden').attr({
                    'aria-disabled': 'true',
                    'tabindex': '-1'
                });
            }
        }
    };

    Slick.prototype.buildDots = function () {

        var _ = this,
            i,
            dot;

        if (_.options.dots === true) {

            _.$slider.addClass('slick-dotted');

            dot = $('<ul />').addClass(_.options.dotsClass);

            for (i = 0; i <= _.getDotCount(); i += 1) {
                dot.append($('<li />').append(_.options.customPaging.call(this, _, i)));
            }

            _.$dots = dot.appendTo(_.options.appendDots);

            _.$dots.find('li').first().addClass('slick-active');
        }
    };

    Slick.prototype.buildOut = function () {

        var _ = this;

        _.$slides = _.$slider.children(_.options.slide + ':not(.slick-cloned)').addClass('slick-slide');

        _.slideCount = _.$slides.length;

        _.$slides.each(function (index, element) {
            $(element).attr('data-slick-index', index).data('originalStyling', $(element).attr('style') || '');
        });

        _.$slider.addClass('slick-slider');

        _.$slideTrack = _.slideCount === 0 ? $('<div class="slick-track"/>').appendTo(_.$slider) : _.$slides.wrapAll('<div class="slick-track"/>').parent();

        _.$list = _.$slideTrack.wrap('<div class="slick-list"/>').parent();
        _.$slideTrack.css('opacity', 0);

        if (_.options.centerMode === true || _.options.swipeToSlide === true) {
            _.options.slidesToScroll = 1;
        }

        $('img[data-lazy]', _.$slider).not('[src]').addClass('slick-loading');

        _.setupInfinite();

        _.buildArrows();

        _.buildDots();

        _.updateDots();

        _.setSlideClasses(typeof _.currentSlide === 'number' ? _.currentSlide : 0);

        if (_.options.draggable === true) {
            _.$list.addClass('draggable');
        }
    };

    Slick.prototype.buildRows = function () {

        var _ = this,
            a,
            b,
            c,
            newSlides,
            numOfSlides,
            originalSlides,
            slidesPerSection;

        newSlides = document.createDocumentFragment();
        originalSlides = _.$slider.children();

        if (_.options.rows > 1) {

            slidesPerSection = _.options.slidesPerRow * _.options.rows;
            numOfSlides = Math.ceil(originalSlides.length / slidesPerSection);

            for (a = 0; a < numOfSlides; a++) {
                var slide = document.createElement('div');
                for (b = 0; b < _.options.rows; b++) {
                    var row = document.createElement('div');
                    for (c = 0; c < _.options.slidesPerRow; c++) {
                        var target = a * slidesPerSection + (b * _.options.slidesPerRow + c);
                        if (originalSlides.get(target)) {
                            row.appendChild(originalSlides.get(target));
                        }
                    }
                    slide.appendChild(row);
                }
                newSlides.appendChild(slide);
            }

            _.$slider.empty().append(newSlides);
            _.$slider.children().children().children().css({
                'width': 100 / _.options.slidesPerRow + '%',
                'display': 'inline-block'
            });
        }
    };

    Slick.prototype.checkResponsive = function (initial, forceUpdate) {

        var _ = this,
            breakpoint,
            targetBreakpoint,
            respondToWidth,
            triggerBreakpoint = false;
        var sliderWidth = _.$slider.width();
        var windowWidth = window.innerWidth || $(window).width();

        if (_.respondTo === 'window') {
            respondToWidth = windowWidth;
        } else if (_.respondTo === 'slider') {
            respondToWidth = sliderWidth;
        } else if (_.respondTo === 'min') {
            respondToWidth = Math.min(windowWidth, sliderWidth);
        }

        if (_.options.responsive && _.options.responsive.length && _.options.responsive !== null) {

            targetBreakpoint = null;

            for (breakpoint in _.breakpoints) {
                if (_.breakpoints.hasOwnProperty(breakpoint)) {
                    if (_.originalSettings.mobileFirst === false) {
                        if (respondToWidth < _.breakpoints[breakpoint]) {
                            targetBreakpoint = _.breakpoints[breakpoint];
                        }
                    } else {
                        if (respondToWidth > _.breakpoints[breakpoint]) {
                            targetBreakpoint = _.breakpoints[breakpoint];
                        }
                    }
                }
            }

            if (targetBreakpoint !== null) {
                if (_.activeBreakpoint !== null) {
                    if (targetBreakpoint !== _.activeBreakpoint || forceUpdate) {
                        _.activeBreakpoint = targetBreakpoint;
                        if (_.breakpointSettings[targetBreakpoint] === 'unslick') {
                            _.unslick(targetBreakpoint);
                        } else {
                            _.options = $.extend({}, _.originalSettings, _.breakpointSettings[targetBreakpoint]);
                            if (initial === true) {
                                _.currentSlide = _.options.initialSlide;
                            }
                            _.refresh(initial);
                        }
                        triggerBreakpoint = targetBreakpoint;
                    }
                } else {
                    _.activeBreakpoint = targetBreakpoint;
                    if (_.breakpointSettings[targetBreakpoint] === 'unslick') {
                        _.unslick(targetBreakpoint);
                    } else {
                        _.options = $.extend({}, _.originalSettings, _.breakpointSettings[targetBreakpoint]);
                        if (initial === true) {
                            _.currentSlide = _.options.initialSlide;
                        }
                        _.refresh(initial);
                    }
                    triggerBreakpoint = targetBreakpoint;
                }
            } else {
                if (_.activeBreakpoint !== null) {
                    _.activeBreakpoint = null;
                    _.options = _.originalSettings;
                    if (initial === true) {
                        _.currentSlide = _.options.initialSlide;
                    }
                    _.refresh(initial);
                    triggerBreakpoint = targetBreakpoint;
                }
            }

            // only trigger breakpoints during an actual break. not on initialize.
            if (!initial && triggerBreakpoint !== false) {
                _.$slider.trigger('breakpoint', [_, triggerBreakpoint]);
            }
        }
    };

    Slick.prototype.changeSlide = function (event, dontAnimate) {

        var _ = this,
            $target = $(event.currentTarget),
            indexOffset,
            slideOffset,
            unevenOffset;

        // If target is a link, prevent default action.
        if ($target.is('a')) {
            event.preventDefault();
        }

        // If target is not the <li> element (ie: a child), find the <li>.
        if (!$target.is('li')) {
            $target = $target.closest('li');
        }

        unevenOffset = _.slideCount % _.options.slidesToScroll !== 0;
        indexOffset = unevenOffset ? 0 : (_.slideCount - _.currentSlide) % _.options.slidesToScroll;

        switch (event.data.message) {

            case 'previous':
                slideOffset = indexOffset === 0 ? _.options.slidesToScroll : _.options.slidesToShow - indexOffset;
                if (_.slideCount > _.options.slidesToShow) {
                    _.slideHandler(_.currentSlide - slideOffset, false, dontAnimate);
                }
                break;

            case 'next':
                slideOffset = indexOffset === 0 ? _.options.slidesToScroll : indexOffset;
                if (_.slideCount > _.options.slidesToShow) {
                    _.slideHandler(_.currentSlide + slideOffset, false, dontAnimate);
                }
                break;

            case 'index':
                var index = event.data.index === 0 ? 0 : event.data.index || $target.index() * _.options.slidesToScroll;

                _.slideHandler(_.checkNavigable(index), false, dontAnimate);
                $target.children().trigger('focus');
                break;

            default:
                return;
        }
    };

    Slick.prototype.checkNavigable = function (index) {

        var _ = this,
            navigables,
            prevNavigable;

        navigables = _.getNavigableIndexes();
        prevNavigable = 0;
        if (index > navigables[navigables.length - 1]) {
            index = navigables[navigables.length - 1];
        } else {
            for (var n in navigables) {
                if (index < navigables[n]) {
                    index = prevNavigable;
                    break;
                }
                prevNavigable = navigables[n];
            }
        }

        return index;
    };

    Slick.prototype.cleanUpEvents = function () {

        var _ = this;

        if (_.options.dots && _.$dots !== null) {

            $('li', _.$dots).off('click.slick', _.changeSlide).off('mouseenter.slick', $.proxy(_.interrupt, _, true)).off('mouseleave.slick', $.proxy(_.interrupt, _, false));

            if (_.options.accessibility === true) {
                _.$dots.off('keydown.slick', _.keyHandler);
            }
        }

        _.$slider.off('focus.slick blur.slick');

        if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {
            _.$prevArrow && _.$prevArrow.off('click.slick', _.changeSlide);
            _.$nextArrow && _.$nextArrow.off('click.slick', _.changeSlide);

            if (_.options.accessibility === true) {
                _.$prevArrow && _.$prevArrow.off('keydown.slick', _.keyHandler);
                _.$nextArrow && _.$nextArrow.off('keydown.slick', _.keyHandler);
            }
        }

        _.$list.off('touchstart.slick mousedown.slick', _.swipeHandler);
        _.$list.off('touchmove.slick mousemove.slick', _.swipeHandler);
        _.$list.off('touchend.slick mouseup.slick', _.swipeHandler);
        _.$list.off('touchcancel.slick mouseleave.slick', _.swipeHandler);

        _.$list.off('click.slick', _.clickHandler);

        $(document).off(_.visibilityChange, _.visibility);

        _.cleanUpSlideEvents();

        if (_.options.accessibility === true) {
            _.$list.off('keydown.slick', _.keyHandler);
        }

        if (_.options.focusOnSelect === true) {
            $(_.$slideTrack).children().off('click.slick', _.selectHandler);
        }

        $(window).off('orientationchange.slick.slick-' + _.instanceUid, _.orientationChange);

        $(window).off('resize.slick.slick-' + _.instanceUid, _.resize);

        $('[draggable!=true]', _.$slideTrack).off('dragstart', _.preventDefault);

        $(window).off('load.slick.slick-' + _.instanceUid, _.setPosition);
    };

    Slick.prototype.cleanUpSlideEvents = function () {

        var _ = this;

        _.$list.off('mouseenter.slick', $.proxy(_.interrupt, _, true));
        _.$list.off('mouseleave.slick', $.proxy(_.interrupt, _, false));
    };

    Slick.prototype.cleanUpRows = function () {

        var _ = this,
            originalSlides;

        if (_.options.rows > 1) {
            originalSlides = _.$slides.children().children();
            originalSlides.removeAttr('style');
            _.$slider.empty().append(originalSlides);
        }
    };

    Slick.prototype.clickHandler = function (event) {

        var _ = this;

        if (_.shouldClick === false) {
            event.stopImmediatePropagation();
            event.stopPropagation();
            event.preventDefault();
        }
    };

    Slick.prototype.destroy = function (refresh) {

        var _ = this;

        _.autoPlayClear();

        _.touchObject = {};

        _.cleanUpEvents();

        $('.slick-cloned', _.$slider).detach();

        if (_.$dots) {
            _.$dots.remove();
        }

        if (_.$prevArrow && _.$prevArrow.length) {

            _.$prevArrow.removeClass('slick-disabled slick-arrow slick-hidden').removeAttr('aria-hidden aria-disabled tabindex').css('display', '');

            if (_.htmlExpr.test(_.options.prevArrow)) {
                _.$prevArrow.remove();
            }
        }

        if (_.$nextArrow && _.$nextArrow.length) {

            _.$nextArrow.removeClass('slick-disabled slick-arrow slick-hidden').removeAttr('aria-hidden aria-disabled tabindex').css('display', '');

            if (_.htmlExpr.test(_.options.nextArrow)) {
                _.$nextArrow.remove();
            }
        }

        if (_.$slides) {

            _.$slides.removeClass('slick-slide slick-active slick-center slick-visible slick-current').removeAttr('aria-hidden').removeAttr('data-slick-index').each(function () {
                $(this).attr('style', $(this).data('originalStyling'));
            });

            _.$slideTrack.children(this.options.slide).detach();

            _.$slideTrack.detach();

            _.$list.detach();

            _.$slider.append(_.$slides);
        }

        _.cleanUpRows();

        _.$slider.removeClass('slick-slider');
        _.$slider.removeClass('slick-initialized');
        _.$slider.removeClass('slick-dotted');

        _.unslicked = true;

        if (!refresh) {
            _.$slider.trigger('destroy', [_]);
        }
    };

    Slick.prototype.disableTransition = function (slide) {

        var _ = this,
            transition = {};

        transition[_.transitionType] = '';

        if (_.options.fade === false) {
            _.$slideTrack.css(transition);
        } else {
            _.$slides.eq(slide).css(transition);
        }
    };

    Slick.prototype.fadeSlide = function (slideIndex, callback) {

        var _ = this;

        if (_.cssTransitions === false) {

            _.$slides.eq(slideIndex).css({
                zIndex: _.options.zIndex
            });

            _.$slides.eq(slideIndex).animate({
                opacity: 1
            }, _.options.speed, _.options.easing, callback);
        } else {

            _.applyTransition(slideIndex);

            _.$slides.eq(slideIndex).css({
                opacity: 1,
                zIndex: _.options.zIndex
            });

            if (callback) {
                setTimeout(function () {

                    _.disableTransition(slideIndex);

                    callback.call();
                }, _.options.speed);
            }
        }
    };

    Slick.prototype.fadeSlideOut = function (slideIndex) {

        var _ = this;

        if (_.cssTransitions === false) {

            _.$slides.eq(slideIndex).animate({
                opacity: 0,
                zIndex: _.options.zIndex - 2
            }, _.options.speed, _.options.easing);
        } else {

            _.applyTransition(slideIndex);

            _.$slides.eq(slideIndex).css({
                opacity: 0,
                zIndex: _.options.zIndex - 2
            });
        }
    };

    Slick.prototype.filterSlides = Slick.prototype.slickFilter = function (filter) {

        var _ = this;

        if (filter !== null) {

            _.$slidesCache = _.$slides;

            _.unload();

            _.$slideTrack.children(this.options.slide).detach();

            _.$slidesCache.filter(filter).appendTo(_.$slideTrack);

            _.reinit();
        }
    };

    Slick.prototype.focusHandler = function () {

        var _ = this;

        _.$slider.off('focus.slick blur.slick').on('focus.slick blur.slick', '*', function (event) {

            event.stopImmediatePropagation();
            var $sf = $(this);

            setTimeout(function () {

                if (_.options.pauseOnFocus) {
                    _.focussed = $sf.is(':focus');
                    _.autoPlay();
                }
            }, 0);
        });
    };

    Slick.prototype.getCurrent = Slick.prototype.slickCurrentSlide = function () {

        var _ = this;
        return _.currentSlide;
    };

    Slick.prototype.getDotCount = function () {

        var _ = this;

        var breakPoint = 0;
        var counter = 0;
        var pagerQty = 0;

        if (_.options.infinite === true) {
            if (_.slideCount <= _.options.slidesToShow) {
                ++pagerQty;
            } else {
                while (breakPoint < _.slideCount) {
                    ++pagerQty;
                    breakPoint = counter + _.options.slidesToScroll;
                    counter += _.options.slidesToScroll <= _.options.slidesToShow ? _.options.slidesToScroll : _.options.slidesToShow;
                }
            }
        } else if (_.options.centerMode === true) {
            pagerQty = _.slideCount;
        } else if (!_.options.asNavFor) {
            pagerQty = 1 + Math.ceil((_.slideCount - _.options.slidesToShow) / _.options.slidesToScroll);
        } else {
            while (breakPoint < _.slideCount) {
                ++pagerQty;
                breakPoint = counter + _.options.slidesToScroll;
                counter += _.options.slidesToScroll <= _.options.slidesToShow ? _.options.slidesToScroll : _.options.slidesToShow;
            }
        }

        return pagerQty - 1;
    };

    Slick.prototype.getLeft = function (slideIndex) {

        var _ = this,
            targetLeft,
            verticalHeight,
            verticalOffset = 0,
            targetSlide,
            coef;

        _.slideOffset = 0;
        verticalHeight = _.$slides.first().outerHeight(true);

        if (_.options.infinite === true) {
            if (_.slideCount > _.options.slidesToShow) {
                _.slideOffset = _.slideWidth * _.options.slidesToShow * -1;
                coef = -1;

                if (_.options.vertical === true && _.options.centerMode === true) {
                    if (_.options.slidesToShow === 2) {
                        coef = -1.5;
                    } else if (_.options.slidesToShow === 1) {
                        coef = -2;
                    }
                }
                verticalOffset = verticalHeight * _.options.slidesToShow * coef;
            }
            if (_.slideCount % _.options.slidesToScroll !== 0) {
                if (slideIndex + _.options.slidesToScroll > _.slideCount && _.slideCount > _.options.slidesToShow) {
                    if (slideIndex > _.slideCount) {
                        _.slideOffset = (_.options.slidesToShow - (slideIndex - _.slideCount)) * _.slideWidth * -1;
                        verticalOffset = (_.options.slidesToShow - (slideIndex - _.slideCount)) * verticalHeight * -1;
                    } else {
                        _.slideOffset = _.slideCount % _.options.slidesToScroll * _.slideWidth * -1;
                        verticalOffset = _.slideCount % _.options.slidesToScroll * verticalHeight * -1;
                    }
                }
            }
        } else {
            if (slideIndex + _.options.slidesToShow > _.slideCount) {
                _.slideOffset = (slideIndex + _.options.slidesToShow - _.slideCount) * _.slideWidth;
                verticalOffset = (slideIndex + _.options.slidesToShow - _.slideCount) * verticalHeight;
            }
        }

        if (_.slideCount <= _.options.slidesToShow) {
            _.slideOffset = 0;
            verticalOffset = 0;
        }

        if (_.options.centerMode === true && _.slideCount <= _.options.slidesToShow) {
            _.slideOffset = _.slideWidth * Math.floor(_.options.slidesToShow) / 2 - _.slideWidth * _.slideCount / 2;
        } else if (_.options.centerMode === true && _.options.infinite === true) {
            _.slideOffset += _.slideWidth * Math.floor(_.options.slidesToShow / 2) - _.slideWidth;
        } else if (_.options.centerMode === true) {
            _.slideOffset = 0;
            _.slideOffset += _.slideWidth * Math.floor(_.options.slidesToShow / 2);
        }

        if (_.options.vertical === false) {
            targetLeft = slideIndex * _.slideWidth * -1 + _.slideOffset;
        } else {
            targetLeft = slideIndex * verticalHeight * -1 + verticalOffset;
        }

        if (_.options.variableWidth === true) {

            if (_.slideCount <= _.options.slidesToShow || _.options.infinite === false) {
                targetSlide = _.$slideTrack.children('.slick-slide').eq(slideIndex);
            } else {
                targetSlide = _.$slideTrack.children('.slick-slide').eq(slideIndex + _.options.slidesToShow);
            }

            if (_.options.rtl === true) {
                if (targetSlide[0]) {
                    targetLeft = (_.$slideTrack.width() - targetSlide[0].offsetLeft - targetSlide.width()) * -1;
                } else {
                    targetLeft = 0;
                }
            } else {
                targetLeft = targetSlide[0] ? targetSlide[0].offsetLeft * -1 : 0;
            }

            if (_.options.centerMode === true) {
                if (_.slideCount <= _.options.slidesToShow || _.options.infinite === false) {
                    targetSlide = _.$slideTrack.children('.slick-slide').eq(slideIndex);
                } else {
                    targetSlide = _.$slideTrack.children('.slick-slide').eq(slideIndex + _.options.slidesToShow + 1);
                }

                if (_.options.rtl === true) {
                    if (targetSlide[0]) {
                        targetLeft = (_.$slideTrack.width() - targetSlide[0].offsetLeft - targetSlide.width()) * -1;
                    } else {
                        targetLeft = 0;
                    }
                } else {
                    targetLeft = targetSlide[0] ? targetSlide[0].offsetLeft * -1 : 0;
                }

                targetLeft += (_.$list.width() - targetSlide.outerWidth()) / 2;
            }
        }

        return targetLeft;
    };

    Slick.prototype.getOption = Slick.prototype.slickGetOption = function (option) {

        var _ = this;

        return _.options[option];
    };

    Slick.prototype.getNavigableIndexes = function () {

        var _ = this,
            breakPoint = 0,
            counter = 0,
            indexes = [],
            max;

        if (_.options.infinite === false) {
            max = _.slideCount;
        } else {
            breakPoint = _.options.slidesToScroll * -1;
            counter = _.options.slidesToScroll * -1;
            max = _.slideCount * 2;
        }

        while (breakPoint < max) {
            indexes.push(breakPoint);
            breakPoint = counter + _.options.slidesToScroll;
            counter += _.options.slidesToScroll <= _.options.slidesToShow ? _.options.slidesToScroll : _.options.slidesToShow;
        }

        return indexes;
    };

    Slick.prototype.getSlick = function () {

        return this;
    };

    Slick.prototype.getSlideCount = function () {

        var _ = this,
            slidesTraversed,
            swipedSlide,
            centerOffset;

        centerOffset = _.options.centerMode === true ? _.slideWidth * Math.floor(_.options.slidesToShow / 2) : 0;

        if (_.options.swipeToSlide === true) {
            _.$slideTrack.find('.slick-slide').each(function (index, slide) {
                if (slide.offsetLeft - centerOffset + $(slide).outerWidth() / 2 > _.swipeLeft * -1) {
                    swipedSlide = slide;
                    return false;
                }
            });

            slidesTraversed = Math.abs($(swipedSlide).attr('data-slick-index') - _.currentSlide) || 1;

            return slidesTraversed;
        } else {
            return _.options.slidesToScroll;
        }
    };

    Slick.prototype.goTo = Slick.prototype.slickGoTo = function (slide, dontAnimate) {

        var _ = this;

        _.changeSlide({
            data: {
                message: 'index',
                index: parseInt(slide)
            }
        }, dontAnimate);
    };

    Slick.prototype.init = function (creation) {

        var _ = this;

        if (!$(_.$slider).hasClass('slick-initialized')) {

            $(_.$slider).addClass('slick-initialized');

            _.buildRows();
            _.buildOut();
            _.setProps();
            _.startLoad();
            _.loadSlider();
            _.initializeEvents();
            _.updateArrows();
            _.updateDots();
            _.checkResponsive(true);
            _.focusHandler();
        }

        if (creation) {
            _.$slider.trigger('init', [_]);
        }

        if (_.options.accessibility === true) {
            _.initADA();
        }

        if (_.options.autoplay) {

            _.paused = false;
            _.autoPlay();
        }
    };

    Slick.prototype.initADA = function () {
        var _ = this,
            numDotGroups = Math.ceil(_.slideCount / _.options.slidesToShow),
            tabControlIndexes = _.getNavigableIndexes().filter(function (val) {
            return val >= 0 && val < _.slideCount;
        });

        _.$slides.add(_.$slideTrack.find('.slick-cloned')).attr({
            'aria-hidden': 'true',
            'tabindex': '-1'
        }).find('a, input, button, select').attr({
            'tabindex': '-1'
        });

        if (_.$dots !== null) {
            _.$slides.not(_.$slideTrack.find('.slick-cloned')).each(function (i) {
                var slideControlIndex = tabControlIndexes.indexOf(i);

                $(this).attr({
                    'role': 'tabpanel',
                    'id': 'slick-slide' + _.instanceUid + i,
                    'tabindex': -1
                });

                if (slideControlIndex !== -1) {
                    $(this).attr({
                        'aria-describedby': 'slick-slide-control' + _.instanceUid + slideControlIndex
                    });
                }
            });

            _.$dots.attr('role', 'tablist').find('li').each(function (i) {
                var mappedSlideIndex = tabControlIndexes[i];

                $(this).attr({
                    'role': 'presentation'
                });

                $(this).find('button').first().attr({
                    'role': 'tab',
                    'id': 'slick-slide-control' + _.instanceUid + i,
                    'aria-controls': 'slick-slide' + _.instanceUid + mappedSlideIndex,
                    'aria-label': i + 1 + ' of ' + numDotGroups,
                    'aria-selected': null,
                    'tabindex': '-1'
                });
            }).eq(_.currentSlide).find('button').attr({
                'aria-selected': 'true',
                'tabindex': '0'
            }).end();
        }

        for (var i = _.currentSlide, max = i + _.options.slidesToShow; i < max; i++) {
            _.$slides.eq(i).attr('tabindex', 0);
        }

        _.activateADA();
    };

    Slick.prototype.initArrowEvents = function () {

        var _ = this;

        if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {
            _.$prevArrow.off('click.slick').on('click.slick', {
                message: 'previous'
            }, _.changeSlide);
            _.$nextArrow.off('click.slick').on('click.slick', {
                message: 'next'
            }, _.changeSlide);

            if (_.options.accessibility === true) {
                _.$prevArrow.on('keydown.slick', _.keyHandler);
                _.$nextArrow.on('keydown.slick', _.keyHandler);
            }
        }
    };

    Slick.prototype.initDotEvents = function () {

        var _ = this;

        if (_.options.dots === true) {
            $('li', _.$dots).on('click.slick', {
                message: 'index'
            }, _.changeSlide);

            if (_.options.accessibility === true) {
                _.$dots.on('keydown.slick', _.keyHandler);
            }
        }

        if (_.options.dots === true && _.options.pauseOnDotsHover === true) {

            $('li', _.$dots).on('mouseenter.slick', $.proxy(_.interrupt, _, true)).on('mouseleave.slick', $.proxy(_.interrupt, _, false));
        }
    };

    Slick.prototype.initSlideEvents = function () {

        var _ = this;

        if (_.options.pauseOnHover) {

            _.$list.on('mouseenter.slick', $.proxy(_.interrupt, _, true));
            _.$list.on('mouseleave.slick', $.proxy(_.interrupt, _, false));
        }
    };

    Slick.prototype.initializeEvents = function () {

        var _ = this;

        _.initArrowEvents();

        _.initDotEvents();
        _.initSlideEvents();

        _.$list.on('touchstart.slick mousedown.slick', {
            action: 'start'
        }, _.swipeHandler);
        _.$list.on('touchmove.slick mousemove.slick', {
            action: 'move'
        }, _.swipeHandler);
        _.$list.on('touchend.slick mouseup.slick', {
            action: 'end'
        }, _.swipeHandler);
        _.$list.on('touchcancel.slick mouseleave.slick', {
            action: 'end'
        }, _.swipeHandler);

        _.$list.on('click.slick', _.clickHandler);

        $(document).on(_.visibilityChange, $.proxy(_.visibility, _));

        if (_.options.accessibility === true) {
            _.$list.on('keydown.slick', _.keyHandler);
        }

        if (_.options.focusOnSelect === true) {
            $(_.$slideTrack).children().on('click.slick', _.selectHandler);
        }

        $(window).on('orientationchange.slick.slick-' + _.instanceUid, $.proxy(_.orientationChange, _));

        $(window).on('resize.slick.slick-' + _.instanceUid, $.proxy(_.resize, _));

        $('[draggable!=true]', _.$slideTrack).on('dragstart', _.preventDefault);

        $(window).on('load.slick.slick-' + _.instanceUid, _.setPosition);
        $(_.setPosition);
    };

    Slick.prototype.initUI = function () {

        var _ = this;

        if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {

            _.$prevArrow.show();
            _.$nextArrow.show();
        }

        if (_.options.dots === true && _.slideCount > _.options.slidesToShow) {

            _.$dots.show();
        }
    };

    Slick.prototype.keyHandler = function (event) {

        var _ = this;
        //Dont slide if the cursor is inside the form fields and arrow keys are pressed
        if (!event.target.tagName.match('TEXTAREA|INPUT|SELECT')) {
            if (event.keyCode === 37 && _.options.accessibility === true) {
                _.changeSlide({
                    data: {
                        message: _.options.rtl === true ? 'next' : 'previous'
                    }
                });
            } else if (event.keyCode === 39 && _.options.accessibility === true) {
                _.changeSlide({
                    data: {
                        message: _.options.rtl === true ? 'previous' : 'next'
                    }
                });
            }
        }
    };

    Slick.prototype.lazyLoad = function () {

        var _ = this,
            loadRange,
            cloneRange,
            rangeStart,
            rangeEnd;

        function loadImages(imagesScope) {

            $('img[data-lazy]', imagesScope).each(function () {

                var image = $(this),
                    imageSource = $(this).attr('data-lazy'),
                    imageSrcSet = $(this).attr('data-srcset'),
                    imageSizes = $(this).attr('data-sizes') || _.$slider.attr('data-sizes'),
                    imageToLoad = document.createElement('img');

                imageToLoad.onload = function () {

                    image.animate({ opacity: 0 }, 100, function () {

                        if (imageSrcSet) {
                            image.attr('srcset', imageSrcSet);

                            if (imageSizes) {
                                image.attr('sizes', imageSizes);
                            }
                        }

                        image.attr('src', imageSource).animate({ opacity: 1 }, 200, function () {
                            image.removeAttr('data-lazy data-srcset data-sizes').removeClass('slick-loading');
                        });
                        _.$slider.trigger('lazyLoaded', [_, image, imageSource]);
                    });
                };

                imageToLoad.onerror = function () {

                    image.removeAttr('data-lazy').removeClass('slick-loading').addClass('slick-lazyload-error');

                    _.$slider.trigger('lazyLoadError', [_, image, imageSource]);
                };

                imageToLoad.src = imageSource;
            });
        }

        if (_.options.centerMode === true) {
            if (_.options.infinite === true) {
                rangeStart = _.currentSlide + (_.options.slidesToShow / 2 + 1);
                rangeEnd = rangeStart + _.options.slidesToShow + 2;
            } else {
                rangeStart = Math.max(0, _.currentSlide - (_.options.slidesToShow / 2 + 1));
                rangeEnd = 2 + (_.options.slidesToShow / 2 + 1) + _.currentSlide;
            }
        } else {
            rangeStart = _.options.infinite ? _.options.slidesToShow + _.currentSlide : _.currentSlide;
            rangeEnd = Math.ceil(rangeStart + _.options.slidesToShow);
            if (_.options.fade === true) {
                if (rangeStart > 0) rangeStart--;
                if (rangeEnd <= _.slideCount) rangeEnd++;
            }
        }

        loadRange = _.$slider.find('.slick-slide').slice(rangeStart, rangeEnd);

        if (_.options.lazyLoad === 'anticipated') {
            var prevSlide = rangeStart - 1,
                nextSlide = rangeEnd,
                $slides = _.$slider.find('.slick-slide');

            for (var i = 0; i < _.options.slidesToScroll; i++) {
                if (prevSlide < 0) prevSlide = _.slideCount - 1;
                loadRange = loadRange.add($slides.eq(prevSlide));
                loadRange = loadRange.add($slides.eq(nextSlide));
                prevSlide--;
                nextSlide++;
            }
        }

        loadImages(loadRange);

        if (_.slideCount <= _.options.slidesToShow) {
            cloneRange = _.$slider.find('.slick-slide');
            loadImages(cloneRange);
        } else if (_.currentSlide >= _.slideCount - _.options.slidesToShow) {
            cloneRange = _.$slider.find('.slick-cloned').slice(0, _.options.slidesToShow);
            loadImages(cloneRange);
        } else if (_.currentSlide === 0) {
            cloneRange = _.$slider.find('.slick-cloned').slice(_.options.slidesToShow * -1);
            loadImages(cloneRange);
        }
    };

    Slick.prototype.loadSlider = function () {

        var _ = this;

        _.setPosition();

        _.$slideTrack.css({
            opacity: 1
        });

        _.$slider.removeClass('slick-loading');

        _.initUI();

        if (_.options.lazyLoad === 'progressive') {
            _.progressiveLazyLoad();
        }
    };

    Slick.prototype.next = Slick.prototype.slickNext = function () {

        var _ = this;

        _.changeSlide({
            data: {
                message: 'next'
            }
        });
    };

    Slick.prototype.orientationChange = function () {

        var _ = this;

        _.checkResponsive();
        _.setPosition();
    };

    Slick.prototype.pause = Slick.prototype.slickPause = function () {

        var _ = this;

        _.autoPlayClear();
        _.paused = true;
    };

    Slick.prototype.play = Slick.prototype.slickPlay = function () {

        var _ = this;

        _.autoPlay();
        _.options.autoplay = true;
        _.paused = false;
        _.focussed = false;
        _.interrupted = false;
    };

    Slick.prototype.postSlide = function (index) {

        var _ = this;

        if (!_.unslicked) {

            _.$slider.trigger('afterChange', [_, index]);

            _.animating = false;

            if (_.slideCount > _.options.slidesToShow) {
                _.setPosition();
            }

            _.swipeLeft = null;

            if (_.options.autoplay) {
                _.autoPlay();
            }

            if (_.options.accessibility === true) {
                _.initADA();

                if (_.options.focusOnChange) {
                    var $currentSlide = $(_.$slides.get(_.currentSlide));
                    $currentSlide.attr('tabindex', 0).focus();
                }
            }
        }
    };

    Slick.prototype.prev = Slick.prototype.slickPrev = function () {

        var _ = this;

        _.changeSlide({
            data: {
                message: 'previous'
            }
        });
    };

    Slick.prototype.preventDefault = function (event) {

        event.preventDefault();
    };

    Slick.prototype.progressiveLazyLoad = function (tryCount) {

        tryCount = tryCount || 1;

        var _ = this,
            $imgsToLoad = $('img[data-lazy]', _.$slider),
            image,
            imageSource,
            imageSrcSet,
            imageSizes,
            imageToLoad;

        if ($imgsToLoad.length) {

            image = $imgsToLoad.first();
            imageSource = image.attr('data-lazy');
            imageSrcSet = image.attr('data-srcset');
            imageSizes = image.attr('data-sizes') || _.$slider.attr('data-sizes');
            imageToLoad = document.createElement('img');

            imageToLoad.onload = function () {

                if (imageSrcSet) {
                    image.attr('srcset', imageSrcSet);

                    if (imageSizes) {
                        image.attr('sizes', imageSizes);
                    }
                }

                image.attr('src', imageSource).removeAttr('data-lazy data-srcset data-sizes').removeClass('slick-loading');

                if (_.options.adaptiveHeight === true) {
                    _.setPosition();
                }

                _.$slider.trigger('lazyLoaded', [_, image, imageSource]);
                _.progressiveLazyLoad();
            };

            imageToLoad.onerror = function () {

                if (tryCount < 3) {

                    /**
                     * try to load the image 3 times,
                     * leave a slight delay so we don't get
                     * servers blocking the request.
                     */
                    setTimeout(function () {
                        _.progressiveLazyLoad(tryCount + 1);
                    }, 500);
                } else {

                    image.removeAttr('data-lazy').removeClass('slick-loading').addClass('slick-lazyload-error');

                    _.$slider.trigger('lazyLoadError', [_, image, imageSource]);

                    _.progressiveLazyLoad();
                }
            };

            imageToLoad.src = imageSource;
        } else {

            _.$slider.trigger('allImagesLoaded', [_]);
        }
    };

    Slick.prototype.refresh = function (initializing) {

        var _ = this,
            currentSlide,
            lastVisibleIndex;

        lastVisibleIndex = _.slideCount - _.options.slidesToShow;

        // in non-infinite sliders, we don't want to go past the
        // last visible index.
        if (!_.options.infinite && _.currentSlide > lastVisibleIndex) {
            _.currentSlide = lastVisibleIndex;
        }

        // if less slides than to show, go to start.
        if (_.slideCount <= _.options.slidesToShow) {
            _.currentSlide = 0;
        }

        currentSlide = _.currentSlide;

        _.destroy(true);

        $.extend(_, _.initials, { currentSlide: currentSlide });

        _.init();

        if (!initializing) {

            _.changeSlide({
                data: {
                    message: 'index',
                    index: currentSlide
                }
            }, false);
        }
    };

    Slick.prototype.registerBreakpoints = function () {

        var _ = this,
            breakpoint,
            currentBreakpoint,
            l,
            responsiveSettings = _.options.responsive || null;

        if ($.type(responsiveSettings) === 'array' && responsiveSettings.length) {

            _.respondTo = _.options.respondTo || 'window';

            for (breakpoint in responsiveSettings) {

                l = _.breakpoints.length - 1;

                if (responsiveSettings.hasOwnProperty(breakpoint)) {
                    currentBreakpoint = responsiveSettings[breakpoint].breakpoint;

                    // loop through the breakpoints and cut out any existing
                    // ones with the same breakpoint number, we don't want dupes.
                    while (l >= 0) {
                        if (_.breakpoints[l] && _.breakpoints[l] === currentBreakpoint) {
                            _.breakpoints.splice(l, 1);
                        }
                        l--;
                    }

                    _.breakpoints.push(currentBreakpoint);
                    _.breakpointSettings[currentBreakpoint] = responsiveSettings[breakpoint].settings;
                }
            }

            _.breakpoints.sort(function (a, b) {
                return _.options.mobileFirst ? a - b : b - a;
            });
        }
    };

    Slick.prototype.reinit = function () {

        var _ = this;

        _.$slides = _.$slideTrack.children(_.options.slide).addClass('slick-slide');

        _.slideCount = _.$slides.length;

        if (_.currentSlide >= _.slideCount && _.currentSlide !== 0) {
            _.currentSlide = _.currentSlide - _.options.slidesToScroll;
        }

        if (_.slideCount <= _.options.slidesToShow) {
            _.currentSlide = 0;
        }

        _.registerBreakpoints();

        _.setProps();
        _.setupInfinite();
        _.buildArrows();
        _.updateArrows();
        _.initArrowEvents();
        _.buildDots();
        _.updateDots();
        _.initDotEvents();
        _.cleanUpSlideEvents();
        _.initSlideEvents();

        _.checkResponsive(false, true);

        if (_.options.focusOnSelect === true) {
            $(_.$slideTrack).children().on('click.slick', _.selectHandler);
        }

        _.setSlideClasses(typeof _.currentSlide === 'number' ? _.currentSlide : 0);

        _.setPosition();
        _.focusHandler();

        _.paused = !_.options.autoplay;
        _.autoPlay();

        _.$slider.trigger('reInit', [_]);
    };

    Slick.prototype.resize = function () {

        var _ = this;

        if ($(window).width() !== _.windowWidth) {
            clearTimeout(_.windowDelay);
            _.windowDelay = window.setTimeout(function () {
                _.windowWidth = $(window).width();
                _.checkResponsive();
                if (!_.unslicked) {
                    _.setPosition();
                }
            }, 50);
        }
    };

    Slick.prototype.removeSlide = Slick.prototype.slickRemove = function (index, removeBefore, removeAll) {

        var _ = this;

        if (typeof index === 'boolean') {
            removeBefore = index;
            index = removeBefore === true ? 0 : _.slideCount - 1;
        } else {
            index = removeBefore === true ? --index : index;
        }

        if (_.slideCount < 1 || index < 0 || index > _.slideCount - 1) {
            return false;
        }

        _.unload();

        if (removeAll === true) {
            _.$slideTrack.children().remove();
        } else {
            _.$slideTrack.children(this.options.slide).eq(index).remove();
        }

        _.$slides = _.$slideTrack.children(this.options.slide);

        _.$slideTrack.children(this.options.slide).detach();

        _.$slideTrack.append(_.$slides);

        _.$slidesCache = _.$slides;

        _.reinit();
    };

    Slick.prototype.setCSS = function (position) {

        var _ = this,
            positionProps = {},
            x,
            y;

        if (_.options.rtl === true) {
            position = -position;
        }
        x = _.positionProp == 'left' ? Math.ceil(position) + 'px' : '0px';
        y = _.positionProp == 'top' ? Math.ceil(position) + 'px' : '0px';

        positionProps[_.positionProp] = position;

        if (_.transformsEnabled === false) {
            _.$slideTrack.css(positionProps);
        } else {
            positionProps = {};
            if (_.cssTransitions === false) {
                positionProps[_.animType] = 'translate(' + x + ', ' + y + ')';
                _.$slideTrack.css(positionProps);
            } else {
                positionProps[_.animType] = 'translate3d(' + x + ', ' + y + ', 0px)';
                _.$slideTrack.css(positionProps);
            }
        }
    };

    Slick.prototype.setDimensions = function () {

        var _ = this;

        if (_.options.vertical === false) {
            if (_.options.centerMode === true) {
                _.$list.css({
                    padding: '0px ' + _.options.centerPadding
                });
            }
        } else {
            _.$list.height(_.$slides.first().outerHeight(true) * _.options.slidesToShow);
            if (_.options.centerMode === true) {
                _.$list.css({
                    padding: _.options.centerPadding + ' 0px'
                });
            }
        }

        _.listWidth = _.$list.width();
        _.listHeight = _.$list.height();

        if (_.options.vertical === false && _.options.variableWidth === false) {
            _.slideWidth = Math.ceil(_.listWidth / _.options.slidesToShow);
            _.$slideTrack.width(Math.ceil(_.slideWidth * _.$slideTrack.children('.slick-slide').length));
        } else if (_.options.variableWidth === true) {
            _.$slideTrack.width(5000 * _.slideCount);
        } else {
            _.slideWidth = Math.ceil(_.listWidth);
            _.$slideTrack.height(Math.ceil(_.$slides.first().outerHeight(true) * _.$slideTrack.children('.slick-slide').length));
        }

        var offset = _.$slides.first().outerWidth(true) - _.$slides.first().width();
        if (_.options.variableWidth === false) _.$slideTrack.children('.slick-slide').width(_.slideWidth - offset);
    };

    Slick.prototype.setFade = function () {

        var _ = this,
            targetLeft;

        _.$slides.each(function (index, element) {
            targetLeft = _.slideWidth * index * -1;
            if (_.options.rtl === true) {
                $(element).css({
                    position: 'relative',
                    right: targetLeft,
                    top: 0,
                    zIndex: _.options.zIndex - 2,
                    opacity: 0
                });
            } else {
                $(element).css({
                    position: 'relative',
                    left: targetLeft,
                    top: 0,
                    zIndex: _.options.zIndex - 2,
                    opacity: 0
                });
            }
        });

        _.$slides.eq(_.currentSlide).css({
            zIndex: _.options.zIndex - 1,
            opacity: 1
        });
    };

    Slick.prototype.setHeight = function () {

        var _ = this;

        if (_.options.slidesToShow === 1 && _.options.adaptiveHeight === true && _.options.vertical === false) {
            var targetHeight = _.$slides.eq(_.currentSlide).outerHeight(true);
            _.$list.css('height', targetHeight);
        }
    };

    Slick.prototype.setOption = Slick.prototype.slickSetOption = function () {

        /**
         * accepts arguments in format of:
         *
         *  - for changing a single option's value:
         *     .slick("setOption", option, value, refresh )
         *
         *  - for changing a set of responsive options:
         *     .slick("setOption", 'responsive', [{}, ...], refresh )
         *
         *  - for updating multiple values at once (not responsive)
         *     .slick("setOption", { 'option': value, ... }, refresh )
         */

        var _ = this,
            l,
            item,
            option,
            value,
            refresh = false,
            type;

        if ($.type(arguments[0]) === 'object') {

            option = arguments[0];
            refresh = arguments[1];
            type = 'multiple';
        } else if ($.type(arguments[0]) === 'string') {

            option = arguments[0];
            value = arguments[1];
            refresh = arguments[2];

            if (arguments[0] === 'responsive' && $.type(arguments[1]) === 'array') {

                type = 'responsive';
            } else if (typeof arguments[1] !== 'undefined') {

                type = 'single';
            }
        }

        if (type === 'single') {

            _.options[option] = value;
        } else if (type === 'multiple') {

            $.each(option, function (opt, val) {

                _.options[opt] = val;
            });
        } else if (type === 'responsive') {

            for (item in value) {

                if ($.type(_.options.responsive) !== 'array') {

                    _.options.responsive = [value[item]];
                } else {

                    l = _.options.responsive.length - 1;

                    // loop through the responsive object and splice out duplicates.
                    while (l >= 0) {

                        if (_.options.responsive[l].breakpoint === value[item].breakpoint) {

                            _.options.responsive.splice(l, 1);
                        }

                        l--;
                    }

                    _.options.responsive.push(value[item]);
                }
            }
        }

        if (refresh) {

            _.unload();
            _.reinit();
        }
    };

    Slick.prototype.setPosition = function () {

        var _ = this;

        _.setDimensions();

        _.setHeight();

        if (_.options.fade === false) {
            _.setCSS(_.getLeft(_.currentSlide));
        } else {
            _.setFade();
        }

        _.$slider.trigger('setPosition', [_]);
    };

    Slick.prototype.setProps = function () {

        var _ = this,
            bodyStyle = document.body.style;

        _.positionProp = _.options.vertical === true ? 'top' : 'left';

        if (_.positionProp === 'top') {
            _.$slider.addClass('slick-vertical');
        } else {
            _.$slider.removeClass('slick-vertical');
        }

        if (bodyStyle.WebkitTransition !== undefined || bodyStyle.MozTransition !== undefined || bodyStyle.msTransition !== undefined) {
            if (_.options.useCSS === true) {
                _.cssTransitions = true;
            }
        }

        if (_.options.fade) {
            if (typeof _.options.zIndex === 'number') {
                if (_.options.zIndex < 3) {
                    _.options.zIndex = 3;
                }
            } else {
                _.options.zIndex = _.defaults.zIndex;
            }
        }

        if (bodyStyle.OTransform !== undefined) {
            _.animType = 'OTransform';
            _.transformType = '-o-transform';
            _.transitionType = 'OTransition';
            if (bodyStyle.perspectiveProperty === undefined && bodyStyle.webkitPerspective === undefined) _.animType = false;
        }
        if (bodyStyle.MozTransform !== undefined) {
            _.animType = 'MozTransform';
            _.transformType = '-moz-transform';
            _.transitionType = 'MozTransition';
            if (bodyStyle.perspectiveProperty === undefined && bodyStyle.MozPerspective === undefined) _.animType = false;
        }
        if (bodyStyle.webkitTransform !== undefined) {
            _.animType = 'webkitTransform';
            _.transformType = '-webkit-transform';
            _.transitionType = 'webkitTransition';
            if (bodyStyle.perspectiveProperty === undefined && bodyStyle.webkitPerspective === undefined) _.animType = false;
        }
        if (bodyStyle.msTransform !== undefined) {
            _.animType = 'msTransform';
            _.transformType = '-ms-transform';
            _.transitionType = 'msTransition';
            if (bodyStyle.msTransform === undefined) _.animType = false;
        }
        if (bodyStyle.transform !== undefined && _.animType !== false) {
            _.animType = 'transform';
            _.transformType = 'transform';
            _.transitionType = 'transition';
        }
        _.transformsEnabled = _.options.useTransform && _.animType !== null && _.animType !== false;
    };

    Slick.prototype.setSlideClasses = function (index) {

        var _ = this,
            centerOffset,
            allSlides,
            indexOffset,
            remainder;

        allSlides = _.$slider.find('.slick-slide').removeClass('slick-active slick-center slick-current').attr('aria-hidden', 'true');

        _.$slides.eq(index).addClass('slick-current');

        if (_.options.centerMode === true) {

            var evenCoef = _.options.slidesToShow % 2 === 0 ? 1 : 0;

            centerOffset = Math.floor(_.options.slidesToShow / 2);

            if (_.options.infinite === true) {

                if (index >= centerOffset && index <= _.slideCount - 1 - centerOffset) {
                    _.$slides.slice(index - centerOffset + evenCoef, index + centerOffset + 1).addClass('slick-active').attr('aria-hidden', 'false');
                } else {

                    indexOffset = _.options.slidesToShow + index;
                    allSlides.slice(indexOffset - centerOffset + 1 + evenCoef, indexOffset + centerOffset + 2).addClass('slick-active').attr('aria-hidden', 'false');
                }

                if (index === 0) {

                    allSlides.eq(allSlides.length - 1 - _.options.slidesToShow).addClass('slick-center');
                } else if (index === _.slideCount - 1) {

                    allSlides.eq(_.options.slidesToShow).addClass('slick-center');
                }
            }

            _.$slides.eq(index).addClass('slick-center');
        } else {

            if (index >= 0 && index <= _.slideCount - _.options.slidesToShow) {

                _.$slides.slice(index, index + _.options.slidesToShow).addClass('slick-active').attr('aria-hidden', 'false');
            } else if (allSlides.length <= _.options.slidesToShow) {

                allSlides.addClass('slick-active').attr('aria-hidden', 'false');
            } else {

                remainder = _.slideCount % _.options.slidesToShow;
                indexOffset = _.options.infinite === true ? _.options.slidesToShow + index : index;

                if (_.options.slidesToShow == _.options.slidesToScroll && _.slideCount - index < _.options.slidesToShow) {

                    allSlides.slice(indexOffset - (_.options.slidesToShow - remainder), indexOffset + remainder).addClass('slick-active').attr('aria-hidden', 'false');
                } else {

                    allSlides.slice(indexOffset, indexOffset + _.options.slidesToShow).addClass('slick-active').attr('aria-hidden', 'false');
                }
            }
        }

        if (_.options.lazyLoad === 'ondemand' || _.options.lazyLoad === 'anticipated') {
            _.lazyLoad();
        }
    };

    Slick.prototype.setupInfinite = function () {

        var _ = this,
            i,
            slideIndex,
            infiniteCount;

        if (_.options.fade === true) {
            _.options.centerMode = false;
        }

        if (_.options.infinite === true && _.options.fade === false) {

            slideIndex = null;

            if (_.slideCount > _.options.slidesToShow) {

                if (_.options.centerMode === true) {
                    infiniteCount = _.options.slidesToShow + 1;
                } else {
                    infiniteCount = _.options.slidesToShow;
                }

                for (i = _.slideCount; i > _.slideCount - infiniteCount; i -= 1) {
                    slideIndex = i - 1;
                    $(_.$slides[slideIndex]).clone(true).attr('id', '').attr('data-slick-index', slideIndex - _.slideCount).prependTo(_.$slideTrack).addClass('slick-cloned');
                }
                for (i = 0; i < infiniteCount + _.slideCount; i += 1) {
                    slideIndex = i;
                    $(_.$slides[slideIndex]).clone(true).attr('id', '').attr('data-slick-index', slideIndex + _.slideCount).appendTo(_.$slideTrack).addClass('slick-cloned');
                }
                _.$slideTrack.find('.slick-cloned').find('[id]').each(function () {
                    $(this).attr('id', '');
                });
            }
        }
    };

    Slick.prototype.interrupt = function (toggle) {

        var _ = this;

        if (!toggle) {
            _.autoPlay();
        }
        _.interrupted = toggle;
    };

    Slick.prototype.selectHandler = function (event) {

        var _ = this;

        var targetElement = $(event.target).is('.slick-slide') ? $(event.target) : $(event.target).parents('.slick-slide');

        var index = parseInt(targetElement.attr('data-slick-index'));

        if (!index) index = 0;

        if (_.slideCount <= _.options.slidesToShow) {

            _.slideHandler(index, false, true);
            return;
        }

        _.slideHandler(index);
    };

    Slick.prototype.slideHandler = function (index, sync, dontAnimate) {

        var targetSlide,
            animSlide,
            oldSlide,
            slideLeft,
            targetLeft = null,
            _ = this,
            navTarget;

        sync = sync || false;

        if (_.animating === true && _.options.waitForAnimate === true) {
            return;
        }

        if (_.options.fade === true && _.currentSlide === index) {
            return;
        }

        if (sync === false) {
            _.asNavFor(index);
        }

        targetSlide = index;
        targetLeft = _.getLeft(targetSlide);
        slideLeft = _.getLeft(_.currentSlide);

        _.currentLeft = _.swipeLeft === null ? slideLeft : _.swipeLeft;

        if (_.options.infinite === false && _.options.centerMode === false && (index < 0 || index > _.getDotCount() * _.options.slidesToScroll)) {
            if (_.options.fade === false) {
                targetSlide = _.currentSlide;
                if (dontAnimate !== true) {
                    _.animateSlide(slideLeft, function () {
                        _.postSlide(targetSlide);
                    });
                } else {
                    _.postSlide(targetSlide);
                }
            }
            return;
        } else if (_.options.infinite === false && _.options.centerMode === true && (index < 0 || index > _.slideCount - _.options.slidesToScroll)) {
            if (_.options.fade === false) {
                targetSlide = _.currentSlide;
                if (dontAnimate !== true) {
                    _.animateSlide(slideLeft, function () {
                        _.postSlide(targetSlide);
                    });
                } else {
                    _.postSlide(targetSlide);
                }
            }
            return;
        }

        if (_.options.autoplay) {
            clearInterval(_.autoPlayTimer);
        }

        if (targetSlide < 0) {
            if (_.slideCount % _.options.slidesToScroll !== 0) {
                animSlide = _.slideCount - _.slideCount % _.options.slidesToScroll;
            } else {
                animSlide = _.slideCount + targetSlide;
            }
        } else if (targetSlide >= _.slideCount) {
            if (_.slideCount % _.options.slidesToScroll !== 0) {
                animSlide = 0;
            } else {
                animSlide = targetSlide - _.slideCount;
            }
        } else {
            animSlide = targetSlide;
        }

        _.animating = true;

        _.$slider.trigger('beforeChange', [_, _.currentSlide, animSlide]);

        oldSlide = _.currentSlide;
        _.currentSlide = animSlide;

        _.setSlideClasses(_.currentSlide);

        if (_.options.asNavFor) {

            navTarget = _.getNavTarget();
            navTarget = navTarget.slick('getSlick');

            if (navTarget.slideCount <= navTarget.options.slidesToShow) {
                navTarget.setSlideClasses(_.currentSlide);
            }
        }

        _.updateDots();
        _.updateArrows();

        if (_.options.fade === true) {
            if (dontAnimate !== true) {

                _.fadeSlideOut(oldSlide);

                _.fadeSlide(animSlide, function () {
                    _.postSlide(animSlide);
                });
            } else {
                _.postSlide(animSlide);
            }
            _.animateHeight();
            return;
        }

        if (dontAnimate !== true) {
            _.animateSlide(targetLeft, function () {
                _.postSlide(animSlide);
            });
        } else {
            _.postSlide(animSlide);
        }
    };

    Slick.prototype.startLoad = function () {

        var _ = this;

        if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {

            _.$prevArrow.hide();
            _.$nextArrow.hide();
        }

        if (_.options.dots === true && _.slideCount > _.options.slidesToShow) {

            _.$dots.hide();
        }

        _.$slider.addClass('slick-loading');
    };

    Slick.prototype.swipeDirection = function () {

        var xDist,
            yDist,
            r,
            swipeAngle,
            _ = this;

        xDist = _.touchObject.startX - _.touchObject.curX;
        yDist = _.touchObject.startY - _.touchObject.curY;
        r = Math.atan2(yDist, xDist);

        swipeAngle = Math.round(r * 180 / Math.PI);
        if (swipeAngle < 0) {
            swipeAngle = 360 - Math.abs(swipeAngle);
        }

        if (swipeAngle <= 45 && swipeAngle >= 0) {
            return _.options.rtl === false ? 'left' : 'right';
        }
        if (swipeAngle <= 360 && swipeAngle >= 315) {
            return _.options.rtl === false ? 'left' : 'right';
        }
        if (swipeAngle >= 135 && swipeAngle <= 225) {
            return _.options.rtl === false ? 'right' : 'left';
        }
        if (_.options.verticalSwiping === true) {
            if (swipeAngle >= 35 && swipeAngle <= 135) {
                return 'down';
            } else {
                return 'up';
            }
        }

        return 'vertical';
    };

    Slick.prototype.swipeEnd = function (event) {

        var _ = this,
            slideCount,
            direction;

        _.dragging = false;
        _.swiping = false;

        if (_.scrolling) {
            _.scrolling = false;
            return false;
        }

        _.interrupted = false;
        _.shouldClick = _.touchObject.swipeLength > 10 ? false : true;

        if (_.touchObject.curX === undefined) {
            return false;
        }

        if (_.touchObject.edgeHit === true) {
            _.$slider.trigger('edge', [_, _.swipeDirection()]);
        }

        if (_.touchObject.swipeLength >= _.touchObject.minSwipe) {

            direction = _.swipeDirection();

            switch (direction) {

                case 'left':
                case 'down':

                    slideCount = _.options.swipeToSlide ? _.checkNavigable(_.currentSlide + _.getSlideCount()) : _.currentSlide + _.getSlideCount();

                    _.currentDirection = 0;

                    break;

                case 'right':
                case 'up':

                    slideCount = _.options.swipeToSlide ? _.checkNavigable(_.currentSlide - _.getSlideCount()) : _.currentSlide - _.getSlideCount();

                    _.currentDirection = 1;

                    break;

                default:

            }

            if (direction != 'vertical') {

                _.slideHandler(slideCount);
                _.touchObject = {};
                _.$slider.trigger('swipe', [_, direction]);
            }
        } else {

            if (_.touchObject.startX !== _.touchObject.curX) {

                _.slideHandler(_.currentSlide);
                _.touchObject = {};
            }
        }
    };

    Slick.prototype.swipeHandler = function (event) {

        var _ = this;

        if (_.options.swipe === false || 'ontouchend' in document && _.options.swipe === false) {
            return;
        } else if (_.options.draggable === false && event.type.indexOf('mouse') !== -1) {
            return;
        }

        _.touchObject.fingerCount = event.originalEvent && event.originalEvent.touches !== undefined ? event.originalEvent.touches.length : 1;

        _.touchObject.minSwipe = _.listWidth / _.options.touchThreshold;

        if (_.options.verticalSwiping === true) {
            _.touchObject.minSwipe = _.listHeight / _.options.touchThreshold;
        }

        switch (event.data.action) {

            case 'start':
                _.swipeStart(event);
                break;

            case 'move':
                _.swipeMove(event);
                break;

            case 'end':
                _.swipeEnd(event);
                break;

        }
    };

    Slick.prototype.swipeMove = function (event) {

        var _ = this,
            edgeWasHit = false,
            curLeft,
            swipeDirection,
            swipeLength,
            positionOffset,
            touches,
            verticalSwipeLength;

        touches = event.originalEvent !== undefined ? event.originalEvent.touches : null;

        if (!_.dragging || _.scrolling || touches && touches.length !== 1) {
            return false;
        }

        curLeft = _.getLeft(_.currentSlide);

        _.touchObject.curX = touches !== undefined ? touches[0].pageX : event.clientX;
        _.touchObject.curY = touches !== undefined ? touches[0].pageY : event.clientY;

        _.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(_.touchObject.curX - _.touchObject.startX, 2)));

        verticalSwipeLength = Math.round(Math.sqrt(Math.pow(_.touchObject.curY - _.touchObject.startY, 2)));

        if (!_.options.verticalSwiping && !_.swiping && verticalSwipeLength > 4) {
            _.scrolling = true;
            return false;
        }

        if (_.options.verticalSwiping === true) {
            _.touchObject.swipeLength = verticalSwipeLength;
        }

        swipeDirection = _.swipeDirection();

        if (event.originalEvent !== undefined && _.touchObject.swipeLength > 4) {
            _.swiping = true;
            event.preventDefault();
        }

        positionOffset = (_.options.rtl === false ? 1 : -1) * (_.touchObject.curX > _.touchObject.startX ? 1 : -1);
        if (_.options.verticalSwiping === true) {
            positionOffset = _.touchObject.curY > _.touchObject.startY ? 1 : -1;
        }

        swipeLength = _.touchObject.swipeLength;

        _.touchObject.edgeHit = false;

        if (_.options.infinite === false) {
            if (_.currentSlide === 0 && swipeDirection === 'right' || _.currentSlide >= _.getDotCount() && swipeDirection === 'left') {
                swipeLength = _.touchObject.swipeLength * _.options.edgeFriction;
                _.touchObject.edgeHit = true;
            }
        }

        if (_.options.vertical === false) {
            _.swipeLeft = curLeft + swipeLength * positionOffset;
        } else {
            _.swipeLeft = curLeft + swipeLength * (_.$list.height() / _.listWidth) * positionOffset;
        }
        if (_.options.verticalSwiping === true) {
            _.swipeLeft = curLeft + swipeLength * positionOffset;
        }

        if (_.options.fade === true || _.options.touchMove === false) {
            return false;
        }

        if (_.animating === true) {
            _.swipeLeft = null;
            return false;
        }

        _.setCSS(_.swipeLeft);
    };

    Slick.prototype.swipeStart = function (event) {

        var _ = this,
            touches;

        _.interrupted = true;

        if (_.touchObject.fingerCount !== 1 || _.slideCount <= _.options.slidesToShow) {
            _.touchObject = {};
            return false;
        }

        if (event.originalEvent !== undefined && event.originalEvent.touches !== undefined) {
            touches = event.originalEvent.touches[0];
        }

        _.touchObject.startX = _.touchObject.curX = touches !== undefined ? touches.pageX : event.clientX;
        _.touchObject.startY = _.touchObject.curY = touches !== undefined ? touches.pageY : event.clientY;

        _.dragging = true;
    };

    Slick.prototype.unfilterSlides = Slick.prototype.slickUnfilter = function () {

        var _ = this;

        if (_.$slidesCache !== null) {

            _.unload();

            _.$slideTrack.children(this.options.slide).detach();

            _.$slidesCache.appendTo(_.$slideTrack);

            _.reinit();
        }
    };

    Slick.prototype.unload = function () {

        var _ = this;

        $('.slick-cloned', _.$slider).remove();

        if (_.$dots) {
            _.$dots.remove();
        }

        if (_.$prevArrow && _.htmlExpr.test(_.options.prevArrow)) {
            _.$prevArrow.remove();
        }

        if (_.$nextArrow && _.htmlExpr.test(_.options.nextArrow)) {
            _.$nextArrow.remove();
        }

        _.$slides.removeClass('slick-slide slick-active slick-visible slick-current').attr('aria-hidden', 'true').css('width', '');
    };

    Slick.prototype.unslick = function (fromBreakpoint) {

        var _ = this;
        _.$slider.trigger('unslick', [_, fromBreakpoint]);
        _.destroy();
    };

    Slick.prototype.updateArrows = function () {

        var _ = this,
            centerOffset;

        centerOffset = Math.floor(_.options.slidesToShow / 2);

        if (_.options.arrows === true && _.slideCount > _.options.slidesToShow && !_.options.infinite) {

            _.$prevArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');
            _.$nextArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');

            if (_.currentSlide === 0) {

                _.$prevArrow.addClass('slick-disabled').attr('aria-disabled', 'true');
                _.$nextArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');
            } else if (_.currentSlide >= _.slideCount - _.options.slidesToShow && _.options.centerMode === false) {

                _.$nextArrow.addClass('slick-disabled').attr('aria-disabled', 'true');
                _.$prevArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');
            } else if (_.currentSlide >= _.slideCount - 1 && _.options.centerMode === true) {

                _.$nextArrow.addClass('slick-disabled').attr('aria-disabled', 'true');
                _.$prevArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');
            }
        }
    };

    Slick.prototype.updateDots = function () {

        var _ = this;

        if (_.$dots !== null) {

            _.$dots.find('li').removeClass('slick-active').end();

            _.$dots.find('li').eq(Math.floor(_.currentSlide / _.options.slidesToScroll)).addClass('slick-active');
        }
    };

    Slick.prototype.visibility = function () {

        var _ = this;

        if (_.options.autoplay) {

            if (document[_.hidden]) {

                _.interrupted = true;
            } else {

                _.interrupted = false;
            }
        }
    };

    $.fn.slick = function () {
        var _ = this,
            opt = arguments[0],
            args = Array.prototype.slice.call(arguments, 1),
            l = _.length,
            i,
            ret;
        for (i = 0; i < l; i++) {
            if ((typeof opt === "undefined" ? "undefined" : _typeof(opt)) == 'object' || typeof opt == 'undefined') _[i].slick = new Slick(_[i], opt);else ret = _[i].slick[opt].apply(_[i].slick, args);
            if (typeof ret != 'undefined') return ret;
        }
        return _;
    };
});

/*! nouislider - 11.0.3 - 2018-01-21 14:04:07 */

!function (a) {
    "function" == typeof define && define.amd ? define([], a) : "object" == (typeof exports === "undefined" ? "undefined" : _typeof(exports)) ? module.exports = a() : window.noUiSlider = a();
}(function () {
    "use strict";
    function a(a) {
        return "object" == (typeof a === "undefined" ? "undefined" : _typeof(a)) && "function" == typeof a.to && "function" == typeof a.from;
    }function b(a) {
        a.parentElement.removeChild(a);
    }function c(a) {
        a.preventDefault();
    }function d(a) {
        return a.filter(function (a) {
            return !this[a] && (this[a] = !0);
        }, {});
    }function e(a, b) {
        return Math.round(a / b) * b;
    }function f(a, b) {
        var c = a.getBoundingClientRect(),
            d = a.ownerDocument,
            e = d.documentElement,
            f = o(d);return (/webkit.*Chrome.*Mobile/i.test(navigator.userAgent) && (f.x = 0), b ? c.top + f.y - e.clientTop : c.left + f.x - e.clientLeft
        );
    }function g(a) {
        return "number" == typeof a && !isNaN(a) && isFinite(a);
    }function h(a, b, c) {
        c > 0 && (l(a, b), setTimeout(function () {
            m(a, b);
        }, c));
    }function i(a) {
        return Math.max(Math.min(a, 100), 0);
    }function j(a) {
        return Array.isArray(a) ? a : [a];
    }function k(a) {
        a = String(a);var b = a.split(".");return b.length > 1 ? b[1].length : 0;
    }function l(a, b) {
        a.classList ? a.classList.add(b) : a.className += " " + b;
    }function m(a, b) {
        a.classList ? a.classList.remove(b) : a.className = a.className.replace(new RegExp("(^|\\b)" + b.split(" ").join("|") + "(\\b|$)", "gi"), " ");
    }function n(a, b) {
        return a.classList ? a.classList.contains(b) : new RegExp("\\b" + b + "\\b").test(a.className);
    }function o(a) {
        var b = void 0 !== window.pageXOffset,
            c = "CSS1Compat" === (a.compatMode || "");return { x: b ? window.pageXOffset : c ? a.documentElement.scrollLeft : a.body.scrollLeft, y: b ? window.pageYOffset : c ? a.documentElement.scrollTop : a.body.scrollTop };
    }function p() {
        return window.navigator.pointerEnabled ? { start: "pointerdown", move: "pointermove", end: "pointerup" } : window.navigator.msPointerEnabled ? { start: "MSPointerDown", move: "MSPointerMove", end: "MSPointerUp" } : { start: "mousedown touchstart", move: "mousemove touchmove", end: "mouseup touchend" };
    }function q() {
        var a = !1;try {
            var b = Object.defineProperty({}, "passive", { get: function get() {
                    a = !0;
                } });window.addEventListener("test", null, b);
        } catch (a) {}return a;
    }function r() {
        return window.CSS && CSS.supports && CSS.supports("touch-action", "none");
    }function s(a, b) {
        return 100 / (b - a);
    }function t(a, b) {
        return 100 * b / (a[1] - a[0]);
    }function u(a, b) {
        return t(a, a[0] < 0 ? b + Math.abs(a[0]) : b - a[0]);
    }function v(a, b) {
        return b * (a[1] - a[0]) / 100 + a[0];
    }function w(a, b) {
        for (var c = 1; a >= b[c];) {
            c += 1;
        }return c;
    }function x(a, b, c) {
        if (c >= a.slice(-1)[0]) return 100;var d = w(c, a),
            e = a[d - 1],
            f = a[d],
            g = b[d - 1],
            h = b[d];return g + u([e, f], c) / s(g, h);
    }function y(a, b, c) {
        if (c >= 100) return a.slice(-1)[0];var d = w(c, b),
            e = a[d - 1],
            f = a[d],
            g = b[d - 1];return v([e, f], (c - g) * s(g, b[d]));
    }function z(a, b, c, d) {
        if (100 === d) return d;var f = w(d, a),
            g = a[f - 1],
            h = a[f];return c ? d - g > (h - g) / 2 ? h : g : b[f - 1] ? a[f - 1] + e(d - a[f - 1], b[f - 1]) : d;
    }function A(a, b, c) {
        var d;if ("number" == typeof b && (b = [b]), !Array.isArray(b)) throw new Error("noUiSlider (" + Z + "): 'range' contains invalid value.");if (d = "min" === a ? 0 : "max" === a ? 100 : parseFloat(a), !g(d) || !g(b[0])) throw new Error("noUiSlider (" + Z + "): 'range' value isn't numeric.");c.xPct.push(d), c.xVal.push(b[0]), d ? c.xSteps.push(!isNaN(b[1]) && b[1]) : isNaN(b[1]) || (c.xSteps[0] = b[1]), c.xHighestCompleteStep.push(0);
    }function B(a, b, c) {
        if (!b) return !0;c.xSteps[a] = t([c.xVal[a], c.xVal[a + 1]], b) / s(c.xPct[a], c.xPct[a + 1]);var d = (c.xVal[a + 1] - c.xVal[a]) / c.xNumSteps[a],
            e = Math.ceil(Number(d.toFixed(3)) - 1),
            f = c.xVal[a] + c.xNumSteps[a] * e;c.xHighestCompleteStep[a] = f;
    }function C(a, b, c) {
        this.xPct = [], this.xVal = [], this.xSteps = [c || !1], this.xNumSteps = [!1], this.xHighestCompleteStep = [], this.snap = b;var d,
            e = [];for (d in a) {
            a.hasOwnProperty(d) && e.push([a[d], d]);
        }for (e.length && "object" == _typeof(e[0][0]) ? e.sort(function (a, b) {
            return a[0][0] - b[0][0];
        }) : e.sort(function (a, b) {
            return a[0] - b[0];
        }), d = 0; d < e.length; d++) {
            A(e[d][1], e[d][0], this);
        }for (this.xNumSteps = this.xSteps.slice(0), d = 0; d < this.xNumSteps.length; d++) {
            B(d, this.xNumSteps[d], this);
        }
    }function D(b) {
        if (a(b)) return !0;throw new Error("noUiSlider (" + Z + "): 'format' requires 'to' and 'from' methods.");
    }function E(a, b) {
        if (!g(b)) throw new Error("noUiSlider (" + Z + "): 'step' is not numeric.");a.singleStep = b;
    }function F(a, b) {
        if ("object" != (typeof b === "undefined" ? "undefined" : _typeof(b)) || Array.isArray(b)) throw new Error("noUiSlider (" + Z + "): 'range' is not an object.");if (void 0 === b.min || void 0 === b.max) throw new Error("noUiSlider (" + Z + "): Missing 'min' or 'max' in 'range'.");if (b.min === b.max) throw new Error("noUiSlider (" + Z + "): 'range' 'min' and 'max' cannot be equal.");a.spectrum = new C(b, a.snap, a.singleStep);
    }function G(a, b) {
        if (b = j(b), !Array.isArray(b) || !b.length) throw new Error("noUiSlider (" + Z + "): 'start' option is incorrect.");a.handles = b.length, a.start = b;
    }function H(a, b) {
        if (a.snap = b, "boolean" != typeof b) throw new Error("noUiSlider (" + Z + "): 'snap' option must be a boolean.");
    }function I(a, b) {
        if (a.animate = b, "boolean" != typeof b) throw new Error("noUiSlider (" + Z + "): 'animate' option must be a boolean.");
    }function J(a, b) {
        if (a.animationDuration = b, "number" != typeof b) throw new Error("noUiSlider (" + Z + "): 'animationDuration' option must be a number.");
    }function K(a, b) {
        var c,
            d = [!1];if ("lower" === b ? b = [!0, !1] : "upper" === b && (b = [!1, !0]), !0 === b || !1 === b) {
            for (c = 1; c < a.handles; c++) {
                d.push(b);
            }d.push(!1);
        } else {
            if (!Array.isArray(b) || !b.length || b.length !== a.handles + 1) throw new Error("noUiSlider (" + Z + "): 'connect' option doesn't match handle count.");d = b;
        }a.connect = d;
    }function L(a, b) {
        switch (b) {case "horizontal":
                a.ort = 0;break;case "vertical":
                a.ort = 1;break;default:
                throw new Error("noUiSlider (" + Z + "): 'orientation' option is invalid.");}
    }function M(a, b) {
        if (!g(b)) throw new Error("noUiSlider (" + Z + "): 'margin' option must be numeric.");if (0 !== b && (a.margin = a.spectrum.getMargin(b), !a.margin)) throw new Error("noUiSlider (" + Z + "): 'margin' option is only supported on linear sliders.");
    }function N(a, b) {
        if (!g(b)) throw new Error("noUiSlider (" + Z + "): 'limit' option must be numeric.");if (a.limit = a.spectrum.getMargin(b), !a.limit || a.handles < 2) throw new Error("noUiSlider (" + Z + "): 'limit' option is only supported on linear sliders with 2 or more handles.");
    }function O(a, b) {
        if (!g(b) && !Array.isArray(b)) throw new Error("noUiSlider (" + Z + "): 'padding' option must be numeric or array of exactly 2 numbers.");if (Array.isArray(b) && 2 !== b.length && !g(b[0]) && !g(b[1])) throw new Error("noUiSlider (" + Z + "): 'padding' option must be numeric or array of exactly 2 numbers.");if (0 !== b) {
            if (Array.isArray(b) || (b = [b, b]), a.padding = [a.spectrum.getMargin(b[0]), a.spectrum.getMargin(b[1])], !1 === a.padding[0] || !1 === a.padding[1]) throw new Error("noUiSlider (" + Z + "): 'padding' option is only supported on linear sliders.");if (a.padding[0] < 0 || a.padding[1] < 0) throw new Error("noUiSlider (" + Z + "): 'padding' option must be a positive number(s).");if (a.padding[0] >= 50 || a.padding[1] >= 50) throw new Error("noUiSlider (" + Z + "): 'padding' option must be less than half the range.");
        }
    }function P(a, b) {
        switch (b) {case "ltr":
                a.dir = 0;break;case "rtl":
                a.dir = 1;break;default:
                throw new Error("noUiSlider (" + Z + "): 'direction' option was not recognized.");}
    }function Q(a, b) {
        if ("string" != typeof b) throw new Error("noUiSlider (" + Z + "): 'behaviour' must be a string containing options.");var c = b.indexOf("tap") >= 0,
            d = b.indexOf("drag") >= 0,
            e = b.indexOf("fixed") >= 0,
            f = b.indexOf("snap") >= 0,
            g = b.indexOf("hover") >= 0;if (e) {
            if (2 !== a.handles) throw new Error("noUiSlider (" + Z + "): 'fixed' behaviour must be used with 2 handles");M(a, a.start[1] - a.start[0]);
        }a.events = { tap: c || f, drag: d, fixed: e, snap: f, hover: g };
    }function R(a, b) {
        if (!1 !== b) if (!0 === b) {
            a.tooltips = [];for (var c = 0; c < a.handles; c++) {
                a.tooltips.push(!0);
            }
        } else {
            if (a.tooltips = j(b), a.tooltips.length !== a.handles) throw new Error("noUiSlider (" + Z + "): must pass a formatter for all handles.");a.tooltips.forEach(function (a) {
                if ("boolean" != typeof a && ("object" != (typeof a === "undefined" ? "undefined" : _typeof(a)) || "function" != typeof a.to)) throw new Error("noUiSlider (" + Z + "): 'tooltips' must be passed a formatter or 'false'.");
            });
        }
    }function S(a, b) {
        a.ariaFormat = b, D(b);
    }function T(a, b) {
        a.format = b, D(b);
    }function U(a, b) {
        if (void 0 !== b && "string" != typeof b && !1 !== b) throw new Error("noUiSlider (" + Z + "): 'cssPrefix' must be a string or `false`.");a.cssPrefix = b;
    }function V(a, b) {
        if (void 0 !== b && "object" != (typeof b === "undefined" ? "undefined" : _typeof(b))) throw new Error("noUiSlider (" + Z + "): 'cssClasses' must be an object.");if ("string" == typeof a.cssPrefix) {
            a.cssClasses = {};for (var c in b) {
                b.hasOwnProperty(c) && (a.cssClasses[c] = a.cssPrefix + b[c]);
            }
        } else a.cssClasses = b;
    }function W(a) {
        var b = { margin: 0, limit: 0, padding: 0, animate: !0, animationDuration: 300, ariaFormat: $, format: $ },
            c = { step: { r: !1, t: E }, start: { r: !0, t: G }, connect: { r: !0, t: K }, direction: { r: !0, t: P }, snap: { r: !1, t: H }, animate: { r: !1, t: I }, animationDuration: { r: !1, t: J }, range: { r: !0, t: F }, orientation: { r: !1, t: L }, margin: { r: !1, t: M }, limit: { r: !1, t: N }, padding: { r: !1, t: O }, behaviour: { r: !0, t: Q }, ariaFormat: { r: !1, t: S }, format: { r: !1, t: T }, tooltips: { r: !1, t: R }, cssPrefix: { r: !1, t: U }, cssClasses: { r: !1, t: V } },
            d = { connect: !1, direction: "ltr", behaviour: "tap", orientation: "horizontal", cssPrefix: "noUi-", cssClasses: { target: "target", base: "base", origin: "origin", handle: "handle", handleLower: "handle-lower", handleUpper: "handle-upper", horizontal: "horizontal", vertical: "vertical", background: "background", connect: "connect", connects: "connects", ltr: "ltr", rtl: "rtl", draggable: "draggable", drag: "state-drag", tap: "state-tap", active: "active", tooltip: "tooltip", pips: "pips", pipsHorizontal: "pips-horizontal", pipsVertical: "pips-vertical", marker: "marker", markerHorizontal: "marker-horizontal", markerVertical: "marker-vertical", markerNormal: "marker-normal", markerLarge: "marker-large", markerSub: "marker-sub", value: "value", valueHorizontal: "value-horizontal", valueVertical: "value-vertical", valueNormal: "value-normal", valueLarge: "value-large", valueSub: "value-sub" } };a.format && !a.ariaFormat && (a.ariaFormat = a.format), Object.keys(c).forEach(function (e) {
            if (void 0 === a[e] && void 0 === d[e]) {
                if (c[e].r) throw new Error("noUiSlider (" + Z + "): '" + e + "' is required.");return !0;
            }c[e].t(b, void 0 === a[e] ? d[e] : a[e]);
        }), b.pips = a.pips;var e = document.createElement("div"),
            f = void 0 !== e.style.msTransform,
            g = void 0 !== e.style.transform;b.transformRule = g ? "transform" : f ? "msTransform" : "webkitTransform";var h = [["left", "top"], ["right", "bottom"]];return b.style = h[b.dir][b.ort], b;
    }function X(a, e, g) {
        function k(a, b) {
            var c = ya.createElement("div");return b && l(c, b), a.appendChild(c), c;
        }function s(a, b) {
            var c = k(a, e.cssClasses.origin),
                d = k(c, e.cssClasses.handle);return d.setAttribute("data-handle", b), d.setAttribute("tabindex", "0"), d.setAttribute("role", "slider"), d.setAttribute("aria-orientation", e.ort ? "vertical" : "horizontal"), 0 === b ? l(d, e.cssClasses.handleLower) : b === e.handles - 1 && l(d, e.cssClasses.handleUpper), c;
        }function t(a, b) {
            return !!b && k(a, e.cssClasses.connect);
        }function u(a, b) {
            var c = k(b, e.cssClasses.connects);ka = [], la = [], la.push(t(c, a[0]));for (var d = 0; d < e.handles; d++) {
                ka.push(s(b, d)), ta[d] = d, la.push(t(c, a[d + 1]));
            }
        }function v(a) {
            l(a, e.cssClasses.target), 0 === e.dir ? l(a, e.cssClasses.ltr) : l(a, e.cssClasses.rtl), 0 === e.ort ? l(a, e.cssClasses.horizontal) : l(a, e.cssClasses.vertical), ja = k(a, e.cssClasses.base);
        }function w(a, b) {
            return !!e.tooltips[b] && k(a.firstChild, e.cssClasses.tooltip);
        }function x() {
            var a = ka.map(w);Q("update", function (b, c, d) {
                if (a[c]) {
                    var f = b[c];!0 !== e.tooltips[c] && (f = e.tooltips[c].to(d[c])), a[c].innerHTML = f;
                }
            });
        }function y() {
            Q("update", function (a, b, c, d, f) {
                ta.forEach(function (a) {
                    var b = ka[a],
                        d = U(sa, a, 0, !0, !0, !0),
                        g = U(sa, a, 100, !0, !0, !0),
                        h = f[a],
                        i = e.ariaFormat.to(c[a]);b.children[0].setAttribute("aria-valuemin", d.toFixed(1)), b.children[0].setAttribute("aria-valuemax", g.toFixed(1)), b.children[0].setAttribute("aria-valuenow", h.toFixed(1)), b.children[0].setAttribute("aria-valuetext", i);
                });
            });
        }function z(a, b, c) {
            if ("range" === a || "steps" === a) return va.xVal;if ("count" === a) {
                if (b < 2) throw new Error("noUiSlider (" + Z + "): 'values' (>= 2) required for mode 'count'.");var d = b - 1,
                    e = 100 / d;for (b = []; d--;) {
                    b[d] = d * e;
                }b.push(100), a = "positions";
            }return "positions" === a ? b.map(function (a) {
                return va.fromStepping(c ? va.getStep(a) : a);
            }) : "values" === a ? c ? b.map(function (a) {
                return va.fromStepping(va.getStep(va.toStepping(a)));
            }) : b : void 0;
        }function A(a, b, c) {
            function e(a, b) {
                return (a + b).toFixed(7) / 1;
            }var f = {},
                g = va.xVal[0],
                h = va.xVal[va.xVal.length - 1],
                i = !1,
                j = !1,
                k = 0;return c = d(c.slice().sort(function (a, b) {
                return a - b;
            })), c[0] !== g && (c.unshift(g), i = !0), c[c.length - 1] !== h && (c.push(h), j = !0), c.forEach(function (d, g) {
                var h,
                    l,
                    m,
                    n,
                    o,
                    p,
                    q,
                    r,
                    s,
                    t,
                    u = d,
                    v = c[g + 1];if ("steps" === b && (h = va.xNumSteps[g]), h || (h = v - u), !1 !== u && void 0 !== v) for (h = Math.max(h, 1e-7), l = u; l <= v; l = e(l, h)) {
                    for (n = va.toStepping(l), o = n - k, r = o / a, s = Math.round(r), t = o / s, m = 1; m <= s; m += 1) {
                        p = k + m * t, f[p.toFixed(5)] = ["x", 0];
                    }q = c.indexOf(l) > -1 ? 1 : "steps" === b ? 2 : 0, !g && i && (q = 0), l === v && j || (f[n.toFixed(5)] = [l, q]), k = n;
                }
            }), f;
        }function B(a, b, c) {
            function d(a, b) {
                var c = b === e.cssClasses.value,
                    d = c ? j : m,
                    f = c ? h : i;return b + " " + d[e.ort] + " " + f[a];
            }function f(a, f) {
                f[1] = f[1] && b ? b(f[0], f[1]) : f[1];var h = k(g, !1);h.className = d(f[1], e.cssClasses.marker), h.style[e.style] = a + "%", f[1] && (h = k(g, !1), h.className = d(f[1], e.cssClasses.value), h.setAttribute("data-value", f[0]), h.style[e.style] = a + "%", h.innerText = c.to(f[0]));
            }var g = ya.createElement("div"),
                h = [e.cssClasses.valueNormal, e.cssClasses.valueLarge, e.cssClasses.valueSub],
                i = [e.cssClasses.markerNormal, e.cssClasses.markerLarge, e.cssClasses.markerSub],
                j = [e.cssClasses.valueHorizontal, e.cssClasses.valueVertical],
                m = [e.cssClasses.markerHorizontal, e.cssClasses.markerVertical];return l(g, e.cssClasses.pips), l(g, 0 === e.ort ? e.cssClasses.pipsHorizontal : e.cssClasses.pipsVertical), Object.keys(a).forEach(function (b) {
                f(b, a[b]);
            }), g;
        }function C() {
            na && (b(na), na = null);
        }function D(a) {
            C();var b = a.mode,
                c = a.density || 1,
                d = a.filter || !1,
                e = a.values || !1,
                f = a.stepped || !1,
                g = z(b, e, f),
                h = A(c, b, g),
                i = a.format || { to: Math.round };return na = ra.appendChild(B(h, d, i));
        }function E() {
            var a = ja.getBoundingClientRect(),
                b = "offset" + ["Width", "Height"][e.ort];return 0 === e.ort ? a.width || ja[b] : a.height || ja[b];
        }function F(a, b, c, d) {
            var f = function f(_f2) {
                return !!(_f2 = G(_f2, d.pageOffset, d.target || b)) && !(ra.hasAttribute("disabled") && !d.doNotReject) && !(n(ra, e.cssClasses.tap) && !d.doNotReject) && !(a === oa.start && void 0 !== _f2.buttons && _f2.buttons > 1) && (!d.hover || !_f2.buttons) && (qa || _f2.preventDefault(), _f2.calcPoint = _f2.points[e.ort], void c(_f2, d));
            },
                g = [];return a.split(" ").forEach(function (a) {
                b.addEventListener(a, f, !!qa && { passive: !0 }), g.push([a, f]);
            }), g;
        }function G(a, b, c) {
            var d,
                e,
                f = 0 === a.type.indexOf("touch"),
                g = 0 === a.type.indexOf("mouse"),
                h = 0 === a.type.indexOf("pointer");if (0 === a.type.indexOf("MSPointer") && (h = !0), f) {
                var i = function i(a) {
                    return a.target === c || c.contains(a.target);
                };if ("touchstart" === a.type) {
                    var j = Array.prototype.filter.call(a.touches, i);if (j.length > 1) return !1;d = j[0].pageX, e = j[0].pageY;
                } else {
                    var k = Array.prototype.find.call(a.changedTouches, i);if (!k) return !1;d = k.pageX, e = k.pageY;
                }
            }return b = b || o(ya), (g || h) && (d = a.clientX + b.x, e = a.clientY + b.y), a.pageOffset = b, a.points = [d, e], a.cursor = g || h, a;
        }function H(a) {
            var b = a - f(ja, e.ort),
                c = 100 * b / E();return c = i(c), e.dir ? 100 - c : c;
        }function I(a) {
            var b = 100,
                c = !1;return ka.forEach(function (d, e) {
                if (!d.hasAttribute("disabled")) {
                    var f = Math.abs(sa[e] - a);(f < b || 100 === f && 100 === b) && (c = e, b = f);
                }
            }), c;
        }function J(a, b) {
            "mouseout" === a.type && "HTML" === a.target.nodeName && null === a.relatedTarget && L(a, b);
        }function K(a, b) {
            if (-1 === navigator.appVersion.indexOf("MSIE 9") && 0 === a.buttons && 0 !== b.buttonsProperty) return L(a, b);var c = (e.dir ? -1 : 1) * (a.calcPoint - b.startCalcPoint);X(c > 0, 100 * c / b.baseSize, b.locations, b.handleNumbers);
        }function L(a, b) {
            b.handle && (m(b.handle, e.cssClasses.active), ua -= 1), b.listeners.forEach(function (a) {
                za.removeEventListener(a[0], a[1]);
            }), 0 === ua && (m(ra, e.cssClasses.drag), _(), a.cursor && (Aa.style.cursor = "", Aa.removeEventListener("selectstart", c))), b.handleNumbers.forEach(function (a) {
                S("change", a), S("set", a), S("end", a);
            });
        }function M(a, b) {
            var d;if (1 === b.handleNumbers.length) {
                var f = ka[b.handleNumbers[0]];if (f.hasAttribute("disabled")) return !1;d = f.children[0], ua += 1, l(d, e.cssClasses.active);
            }a.stopPropagation();var g = [],
                h = F(oa.move, za, K, { target: a.target, handle: d, listeners: g, startCalcPoint: a.calcPoint, baseSize: E(), pageOffset: a.pageOffset, handleNumbers: b.handleNumbers, buttonsProperty: a.buttons, locations: sa.slice() }),
                i = F(oa.end, za, L, { target: a.target, handle: d, listeners: g, doNotReject: !0, handleNumbers: b.handleNumbers }),
                j = F("mouseout", za, J, { target: a.target, handle: d, listeners: g, doNotReject: !0, handleNumbers: b.handleNumbers });g.push.apply(g, h.concat(i, j)), a.cursor && (Aa.style.cursor = getComputedStyle(a.target).cursor, ka.length > 1 && l(ra, e.cssClasses.drag), Aa.addEventListener("selectstart", c, !1)), b.handleNumbers.forEach(function (a) {
                S("start", a);
            });
        }function N(a) {
            a.stopPropagation();var b = H(a.calcPoint),
                c = I(b);if (!1 === c) return !1;e.events.snap || h(ra, e.cssClasses.tap, e.animationDuration), aa(c, b, !0, !0), _(), S("slide", c, !0), S("update", c, !0), S("change", c, !0), S("set", c, !0), e.events.snap && M(a, { handleNumbers: [c] });
        }function O(a) {
            var b = H(a.calcPoint),
                c = va.getStep(b),
                d = va.fromStepping(c);Object.keys(xa).forEach(function (a) {
                "hover" === a.split(".")[0] && xa[a].forEach(function (a) {
                    a.call(ma, d);
                });
            });
        }function P(a) {
            a.fixed || ka.forEach(function (a, b) {
                F(oa.start, a.children[0], M, { handleNumbers: [b] });
            }), a.tap && F(oa.start, ja, N, {}), a.hover && F(oa.move, ja, O, { hover: !0 }), a.drag && la.forEach(function (b, c) {
                if (!1 !== b && 0 !== c && c !== la.length - 1) {
                    var d = ka[c - 1],
                        f = ka[c],
                        g = [b];l(b, e.cssClasses.draggable), a.fixed && (g.push(d.children[0]), g.push(f.children[0])), g.forEach(function (a) {
                        F(oa.start, a, M, { handles: [d, f], handleNumbers: [c - 1, c] });
                    });
                }
            });
        }function Q(a, b) {
            xa[a] = xa[a] || [], xa[a].push(b), "update" === a.split(".")[0] && ka.forEach(function (a, b) {
                S("update", b);
            });
        }function R(a) {
            var b = a && a.split(".")[0],
                c = b && a.substring(b.length);Object.keys(xa).forEach(function (a) {
                var d = a.split(".")[0],
                    e = a.substring(d.length);b && b !== d || c && c !== e || delete xa[a];
            });
        }function S(a, b, c) {
            Object.keys(xa).forEach(function (d) {
                var f = d.split(".")[0];a === f && xa[d].forEach(function (a) {
                    a.call(ma, wa.map(e.format.to), b, wa.slice(), c || !1, sa.slice());
                });
            });
        }function T(a) {
            return a + "%";
        }function U(a, b, c, d, f, g) {
            return ka.length > 1 && (d && b > 0 && (c = Math.max(c, a[b - 1] + e.margin)), f && b < ka.length - 1 && (c = Math.min(c, a[b + 1] - e.margin))), ka.length > 1 && e.limit && (d && b > 0 && (c = Math.min(c, a[b - 1] + e.limit)), f && b < ka.length - 1 && (c = Math.max(c, a[b + 1] - e.limit))), e.padding && (0 === b && (c = Math.max(c, e.padding[0])), b === ka.length - 1 && (c = Math.min(c, 100 - e.padding[1]))), c = va.getStep(c), !((c = i(c)) === a[b] && !g) && c;
        }function V(a, b) {
            var c = e.ort;return (c ? b : a) + ", " + (c ? a : b);
        }function X(a, b, c, d) {
            var e = c.slice(),
                f = [!a, a],
                g = [a, !a];d = d.slice(), a && d.reverse(), d.length > 1 ? d.forEach(function (a, c) {
                var d = U(e, a, e[a] + b, f[c], g[c], !1);!1 === d ? b = 0 : (b = d - e[a], e[a] = d);
            }) : f = g = [!0];var h = !1;d.forEach(function (a, d) {
                h = aa(a, c[a] + b, f[d], g[d]) || h;
            }), h && d.forEach(function (a) {
                S("update", a), S("slide", a);
            });
        }function Y(a, b) {
            return e.dir ? 100 - a - b : a;
        }function $(a, b) {
            sa[a] = b, wa[a] = va.fromStepping(b);var c = "translate(" + V(T(Y(b, 0) - Ba), "0") + ")";ka[a].style[e.transformRule] = c, ba(a), ba(a + 1);
        }function _() {
            ta.forEach(function (a) {
                var b = sa[a] > 50 ? -1 : 1,
                    c = 3 + (ka.length + b * a);ka[a].style.zIndex = c;
            });
        }function aa(a, b, c, d) {
            return !1 !== (b = U(sa, a, b, c, d, !1)) && ($(a, b), !0);
        }function ba(a) {
            if (la[a]) {
                var b = 0,
                    c = 100;0 !== a && (b = sa[a - 1]), a !== la.length - 1 && (c = sa[a]);var d = c - b,
                    f = "translate(" + V(T(Y(b, d)), "0") + ")",
                    g = "scale(" + V(d / 100, "1") + ")";la[a].style[e.transformRule] = f + " " + g;
            }
        }function ca(a, b) {
            return null === a || !1 === a || void 0 === a ? sa[b] : ("number" == typeof a && (a = String(a)), a = e.format.from(a), a = va.toStepping(a), !1 === a || isNaN(a) ? sa[b] : a);
        }function da(a, b) {
            var c = j(a),
                d = void 0 === sa[0];b = void 0 === b || !!b, e.animate && !d && h(ra, e.cssClasses.tap, e.animationDuration), ta.forEach(function (a) {
                aa(a, ca(c[a], a), !0, !1);
            }), ta.forEach(function (a) {
                aa(a, sa[a], !0, !0);
            }), _(), ta.forEach(function (a) {
                S("update", a), null !== c[a] && b && S("set", a);
            });
        }function ea(a) {
            da(e.start, a);
        }function fa() {
            var a = wa.map(e.format.to);return 1 === a.length ? a[0] : a;
        }function ga() {
            for (var a in e.cssClasses) {
                e.cssClasses.hasOwnProperty(a) && m(ra, e.cssClasses[a]);
            }for (; ra.firstChild;) {
                ra.removeChild(ra.firstChild);
            }delete ra.noUiSlider;
        }function ha() {
            return sa.map(function (a, b) {
                var c = va.getNearbySteps(a),
                    d = wa[b],
                    e = c.thisStep.step,
                    f = null;!1 !== e && d + e > c.stepAfter.startValue && (e = c.stepAfter.startValue - d), f = d > c.thisStep.startValue ? c.thisStep.step : !1 !== c.stepBefore.step && d - c.stepBefore.highestStep, 100 === a ? e = null : 0 === a && (f = null);var g = va.countStepDecimals();return null !== e && !1 !== e && (e = Number(e.toFixed(g))), null !== f && !1 !== f && (f = Number(f.toFixed(g))), [f, e];
            });
        }function ia(a, b) {
            var c = fa(),
                d = ["margin", "limit", "padding", "range", "animate", "snap", "step", "format"];d.forEach(function (b) {
                void 0 !== a[b] && (g[b] = a[b]);
            });var f = W(g);d.forEach(function (b) {
                void 0 !== a[b] && (e[b] = f[b]);
            }), va = f.spectrum, e.margin = f.margin, e.limit = f.limit, e.padding = f.padding, e.pips && D(e.pips), sa = [], da(a.start || c, b);
        }var ja,
            ka,
            la,
            ma,
            na,
            oa = p(),
            pa = r(),
            qa = pa && q(),
            ra = a,
            sa = [],
            ta = [],
            ua = 0,
            va = e.spectrum,
            wa = [],
            xa = {},
            ya = a.ownerDocument,
            za = ya.documentElement,
            Aa = ya.body,
            Ba = "rtl" === ya.dir || 1 === e.ort ? 0 : 100;return v(ra), u(e.connect, ja), P(e.events), da(e.start), ma = { destroy: ga, steps: ha, on: Q, off: R, get: fa, set: da, reset: ea, __moveHandles: function __moveHandles(a, b, c) {
                X(a, b, sa, c);
            }, options: g, updateOptions: ia, target: ra, removePips: C, pips: D }, e.pips && D(e.pips), e.tooltips && x(), y(), ma;
    }function Y(a, b) {
        if (!a || !a.nodeName) throw new Error("noUiSlider (" + Z + "): create requires a single element, got: " + a);if (a.noUiSlider) throw new Error("noUiSlider (" + Z + "): Slider was already initialized.");var c = W(b, a),
            d = X(a, c, b);return a.noUiSlider = d, d;
    }var Z = "11.0.3";C.prototype.getMargin = function (a) {
        var b = this.xNumSteps[0];if (b && a / b % 1 != 0) throw new Error("noUiSlider (" + Z + "): 'limit', 'margin' and 'padding' must be divisible by step.");return 2 === this.xPct.length && t(this.xVal, a);
    }, C.prototype.toStepping = function (a) {
        return a = x(this.xVal, this.xPct, a);
    }, C.prototype.fromStepping = function (a) {
        return y(this.xVal, this.xPct, a);
    }, C.prototype.getStep = function (a) {
        return a = z(this.xPct, this.xSteps, this.snap, a);
    }, C.prototype.getNearbySteps = function (a) {
        var b = w(a, this.xPct);return { stepBefore: { startValue: this.xVal[b - 2], step: this.xNumSteps[b - 2], highestStep: this.xHighestCompleteStep[b - 2] }, thisStep: { startValue: this.xVal[b - 1], step: this.xNumSteps[b - 1], highestStep: this.xHighestCompleteStep[b - 1] }, stepAfter: { startValue: this.xVal[b - 0], step: this.xNumSteps[b - 0], highestStep: this.xHighestCompleteStep[b - 0] } };
    }, C.prototype.countStepDecimals = function () {
        var a = this.xNumSteps.map(k);return Math.max.apply(null, a);
    }, C.prototype.convert = function (a) {
        return this.getStep(this.toStepping(a));
    };var $ = { to: function to(a) {
            return void 0 !== a && a.toFixed(2);
        }, from: Number };return { version: Z, create: Y };
});
// ==================================================
// fancyBox v3.3.5
//
// Licensed GPLv3 for open source use
// or fancyBox Commercial License for commercial use
//
// http://fancyapps.com/fancybox/
// Copyright 2018 fancyApps
//
// ==================================================
!function (t, e, n, o) {
    "use strict";
    function i(t, e) {
        var o,
            i,
            a = [],
            s = 0;t && t.isDefaultPrevented() || (t.preventDefault(), e = t && t.data ? t.data.options : e || {}, o = e.$target || n(t.currentTarget), i = o.attr("data-fancybox") || "", i ? (a = e.selector ? n(e.selector) : t.data ? t.data.items : [], a = a.length ? a.filter('[data-fancybox="' + i + '"]') : n('[data-fancybox="' + i + '"]'), s = a.index(o), s < 0 && (s = 0)) : a = [o], n.fancybox.open(a, e, s));
    }if (t.console = t.console || { info: function info(t) {} }, n) {
        if (n.fn.fancybox) return void console.info("fancyBox already initialized");var a = { loop: !1, gutter: 50, keyboard: !0, arrows: !0, infobar: !0, smallBtn: "auto", toolbar: "auto", buttons: ["zoom", "thumbs", "close"], idleTime: 3, protect: !1, modal: !1, image: { preload: !1 }, ajax: { settings: { data: { fancybox: !0 } } }, iframe: { tpl: '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allowtransparency="true" src=""></iframe>', preload: !0, css: {}, attr: { scrolling: "auto" } }, defaultType: "image", animationEffect: "zoom", animationDuration: 366, zoomOpacity: "auto", transitionEffect: "fade", transitionDuration: 366, slideClass: "", baseClass: "", baseTpl: '<div class="fancybox-container" role="dialog" tabindex="-1"><div class="fancybox-bg"></div><div class="fancybox-inner"><div class="fancybox-infobar"><span data-fancybox-index></span>&nbsp;/&nbsp;<span data-fancybox-count></span></div><div class="fancybox-toolbar">{{buttons}}</div><div class="fancybox-navigation">{{arrows}}</div><div class="fancybox-stage"></div><div class="fancybox-caption"></div></div></div>', spinnerTpl: '<div class="fancybox-loading"></div>', errorTpl: '<div class="fancybox-error"><p>{{ERROR}}</p></div>', btnTpl: { download: '<a download data-fancybox-download class="fancybox-button fancybox-button--download" title="{{DOWNLOAD}}" href="javascript:;"><svg viewBox="0 0 40 40"><path d="M13,16 L20,23 L27,16 M20,7 L20,23 M10,24 L10,28 L30,28 L30,24" /></svg></a>', zoom: '<button data-fancybox-zoom class="fancybox-button fancybox-button--zoom" title="{{ZOOM}}"><svg viewBox="0 0 40 40"><path d="M18,17 m-8,0 a8,8 0 1,0 16,0 a8,8 0 1,0 -16,0 M24,22 L31,29" /></svg></button>', close: '<button data-fancybox-close class="fancybox-button fancybox-button--close" title="{{CLOSE}}"><svg viewBox="0 0 40 40"><path d="M10,10 L30,30 M30,10 L10,30" /></svg></button>', smallBtn: '<button data-fancybox-close class="fancybox-close-small" title="{{CLOSE}}"><svg viewBox="0 0 32 32"><path d="M10,10 L22,22 M22,10 L10,22"></path></svg></button>', arrowLeft: '<a data-fancybox-prev class="fancybox-button fancybox-button--arrow_left" title="{{PREV}}" href="javascript:;"><svg viewBox="0 0 40 40"><path d="M18,12 L10,20 L18,28 M10,20 L30,20"></path></svg></a>', arrowRight: '<a data-fancybox-next class="fancybox-button fancybox-button--arrow_right" title="{{NEXT}}" href="javascript:;"><svg viewBox="0 0 40 40"><path d="M10,20 L30,20 M22,12 L30,20 L22,28"></path></svg></a>' }, parentEl: "body", autoFocus: !1, backFocus: !0, trapFocus: !0, fullScreen: { autoStart: !1 }, touch: { vertical: !0, momentum: !0 }, hash: null, media: {}, slideShow: { autoStart: !1, speed: 4e3 }, thumbs: { autoStart: !1, hideOnClose: !0, parentEl: ".fancybox-container", axis: "y" }, wheel: "auto", onInit: n.noop, beforeLoad: n.noop, afterLoad: n.noop, beforeShow: n.noop, afterShow: n.noop, beforeClose: n.noop, afterClose: n.noop, onActivate: n.noop, onDeactivate: n.noop, clickContent: function clickContent(t, e) {
                return "image" === t.type && "zoom";
            }, clickSlide: "close", clickOutside: "close", dblclickContent: !1, dblclickSlide: !1, dblclickOutside: !1, mobile: { idleTime: !1, clickContent: function clickContent(t, e) {
                    return "image" === t.type && "toggleControls";
                }, clickSlide: function clickSlide(t, e) {
                    return "image" === t.type ? "toggleControls" : "close";
                }, dblclickContent: function dblclickContent(t, e) {
                    return "image" === t.type && "zoom";
                }, dblclickSlide: function dblclickSlide(t, e) {
                    return "image" === t.type && "zoom";
                } }, lang: "en", i18n: { en: { CLOSE: "Close", NEXT: "Next", PREV: "Previous", ERROR: "The requested content cannot be loaded. <br/> Please try again later.", PLAY_START: "Start slideshow", PLAY_STOP: "Pause slideshow", FULL_SCREEN: "Full screen", THUMBS: "Thumbnails", DOWNLOAD: "Download", SHARE: "Share", ZOOM: "Zoom" }, de: { CLOSE: "Schliessen", NEXT: "Weiter", PREV: "Zurück", ERROR: "Die angeforderten Daten konnten nicht geladen werden. <br/> Bitte versuchen Sie es später nochmal.", PLAY_START: "Diaschau starten", PLAY_STOP: "Diaschau beenden", FULL_SCREEN: "Vollbild", THUMBS: "Vorschaubilder", DOWNLOAD: "Herunterladen", SHARE: "Teilen", ZOOM: "Maßstab" } } },
            s = n(t),
            r = n(e),
            c = 0,
            l = function l(t) {
            return t && t.hasOwnProperty && t instanceof n;
        },
            d = function () {
            return t.requestAnimationFrame || t.webkitRequestAnimationFrame || t.mozRequestAnimationFrame || t.oRequestAnimationFrame || function (e) {
                return t.setTimeout(e, 1e3 / 60);
            };
        }(),
            u = function () {
            var t,
                n = e.createElement("fakeelement"),
                i = { transition: "transitionend", OTransition: "oTransitionEnd", MozTransition: "transitionend", WebkitTransition: "webkitTransitionEnd" };for (t in i) {
                if (n.style[t] !== o) return i[t];
            }return "transitionend";
        }(),
            f = function f(t) {
            return t && t.length && t[0].offsetHeight;
        },
            p = function p(t, e) {
            var o = n.extend(!0, {}, t, e);return n.each(e, function (t, e) {
                n.isArray(e) && (o[t] = e);
            }), o;
        },
            h = function h(t, o, i) {
            var a = this;a.opts = p({ index: i }, n.fancybox.defaults), n.isPlainObject(o) && (a.opts = p(a.opts, o)), n.fancybox.isMobile && (a.opts = p(a.opts, a.opts.mobile)), a.id = a.opts.id || ++c, a.currIndex = parseInt(a.opts.index, 10) || 0, a.prevIndex = null, a.prevPos = null, a.currPos = 0, a.firstRun = !0, a.group = [], a.slides = {}, a.addContent(t), a.group.length && (a.$lastFocus = n(e.activeElement).trigger("blur"), a.init());
        };n.extend(h.prototype, { init: function init() {
                var i,
                    a,
                    s,
                    r = this,
                    c = r.group[r.currIndex],
                    l = c.opts,
                    d = n.fancybox.scrollbarWidth;n.fancybox.getInstance() || l.hideScrollbar === !1 || (n("body").addClass("fancybox-active"), !n.fancybox.isMobile && e.body.scrollHeight > t.innerHeight && (d === o && (i = n('<div style="width:100px;height:100px;overflow:scroll;" />').appendTo("body"), d = n.fancybox.scrollbarWidth = i[0].offsetWidth - i[0].clientWidth, i.remove()), n("head").append('<style id="fancybox-style-noscroll" type="text/css">.compensate-for-scrollbar { margin-right: ' + d + "px; }</style>"), n("body").addClass("compensate-for-scrollbar"))), s = "", n.each(l.buttons, function (t, e) {
                    s += l.btnTpl[e] || "";
                }), a = n(r.translate(r, l.baseTpl.replace("{{buttons}}", s).replace("{{arrows}}", l.btnTpl.arrowLeft + l.btnTpl.arrowRight))).attr("id", "fancybox-container-" + r.id).addClass("fancybox-is-hidden").addClass(l.baseClass).data("FancyBox", r).appendTo(l.parentEl), r.$refs = { container: a }, ["bg", "inner", "infobar", "toolbar", "stage", "caption", "navigation"].forEach(function (t) {
                    r.$refs[t] = a.find(".fancybox-" + t);
                }), r.trigger("onInit"), r.activate(), r.jumpTo(r.currIndex);
            }, translate: function translate(t, e) {
                var n = t.opts.i18n[t.opts.lang];return e.replace(/\{\{(\w+)\}\}/g, function (t, e) {
                    var i = n[e];return i === o ? t : i;
                });
            }, addContent: function addContent(t) {
                var e,
                    i = this,
                    a = n.makeArray(t);n.each(a, function (t, e) {
                    var a,
                        s,
                        r,
                        c,
                        l,
                        d = {},
                        u = {};n.isPlainObject(e) ? (d = e, u = e.opts || e) : "object" === n.type(e) && n(e).length ? (a = n(e), u = a.data() || {}, u = n.extend(!0, {}, u, u.options), u.$orig = a, d.src = i.opts.src || u.src || a.attr("href"), d.type || d.src || (d.type = "inline", d.src = e)) : d = { type: "html", src: e + "" }, d.opts = n.extend(!0, {}, i.opts, u), n.isArray(u.buttons) && (d.opts.buttons = u.buttons), s = d.type || d.opts.type, c = d.src || "", !s && c && ((r = c.match(/\.(mp4|mov|ogv)((\?|#).*)?$/i)) ? (s = "video", d.opts.videoFormat || (d.opts.videoFormat = "video/" + ("ogv" === r[1] ? "ogg" : r[1]))) : c.match(/(^data:image\/[a-z0-9+\/=]*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg|ico)((\?|#).*)?$)/i) ? s = "image" : c.match(/\.(pdf)((\?|#).*)?$/i) ? s = "iframe" : "#" === c.charAt(0) && (s = "inline")), s ? d.type = s : i.trigger("objectNeedsType", d), d.contentType || (d.contentType = n.inArray(d.type, ["html", "inline", "ajax"]) > -1 ? "html" : d.type), d.index = i.group.length, "auto" == d.opts.smallBtn && (d.opts.smallBtn = n.inArray(d.type, ["html", "inline", "ajax"]) > -1), "auto" === d.opts.toolbar && (d.opts.toolbar = !d.opts.smallBtn), d.opts.$trigger && d.index === i.opts.index && (d.opts.$thumb = d.opts.$trigger.find("img:first")), d.opts.$thumb && d.opts.$thumb.length || !d.opts.$orig || (d.opts.$thumb = d.opts.$orig.find("img:first")), "function" === n.type(d.opts.caption) && (d.opts.caption = d.opts.caption.apply(e, [i, d])), "function" === n.type(i.opts.caption) && (d.opts.caption = i.opts.caption.apply(e, [i, d])), d.opts.caption instanceof n || (d.opts.caption = d.opts.caption === o ? "" : d.opts.caption + ""), "ajax" === d.type && (l = c.split(/\s+/, 2), l.length > 1 && (d.src = l.shift(), d.opts.filter = l.shift())), d.opts.modal && (d.opts = n.extend(!0, d.opts, { infobar: 0, toolbar: 0, smallBtn: 0, keyboard: 0, slideShow: 0, fullScreen: 0, thumbs: 0, touch: 0, clickContent: !1, clickSlide: !1, clickOutside: !1, dblclickContent: !1, dblclickSlide: !1, dblclickOutside: !1 })), i.group.push(d);
                }), Object.keys(i.slides).length && (i.updateControls(), e = i.Thumbs, e && e.isActive && (e.create(), e.focus()));
            }, addEvents: function addEvents() {
                var o = this;o.removeEvents(), o.$refs.container.on("click.fb-close", "[data-fancybox-close]", function (t) {
                    t.stopPropagation(), t.preventDefault(), o.close(t);
                }).on("touchstart.fb-prev click.fb-prev", "[data-fancybox-prev]", function (t) {
                    t.stopPropagation(), t.preventDefault(), o.previous();
                }).on("touchstart.fb-next click.fb-next", "[data-fancybox-next]", function (t) {
                    t.stopPropagation(), t.preventDefault(), o.next();
                }).on("click.fb", "[data-fancybox-zoom]", function (t) {
                    o[o.isScaledDown() ? "scaleToActual" : "scaleToFit"]();
                }), s.on("orientationchange.fb resize.fb", function (t) {
                    t && t.originalEvent && "resize" === t.originalEvent.type ? d(function () {
                        o.update();
                    }) : (o.$refs.stage.hide(), setTimeout(function () {
                        o.$refs.stage.show(), o.update();
                    }, n.fancybox.isMobile ? 600 : 250));
                }), r.on("focusin.fb", function (t) {
                    var o = n.fancybox ? n.fancybox.getInstance() : null;o.isClosing || !o.current || !o.current.opts.trapFocus || n(t.target).hasClass("fancybox-container") || n(t.target).is(e) || o && "fixed" !== n(t.target).css("position") && !o.$refs.container.has(t.target).length && (t.stopPropagation(), o.focus());
                }), r.on("keydown.fb", function (t) {
                    var e = o.current,
                        i = t.keyCode || t.which;if (e && e.opts.keyboard && !(t.ctrlKey || t.altKey || t.shiftKey || n(t.target).is("input") || n(t.target).is("textarea"))) return 8 === i || 27 === i ? (t.preventDefault(), void o.close(t)) : 37 === i || 38 === i ? (t.preventDefault(), void o.previous()) : 39 === i || 40 === i ? (t.preventDefault(), void o.next()) : void o.trigger("afterKeydown", t, i);
                }), o.group[o.currIndex].opts.idleTime && (o.idleSecondsCounter = 0, r.on("mousemove.fb-idle mouseleave.fb-idle mousedown.fb-idle touchstart.fb-idle touchmove.fb-idle scroll.fb-idle keydown.fb-idle", function (t) {
                    o.idleSecondsCounter = 0, o.isIdle && o.showControls(), o.isIdle = !1;
                }), o.idleInterval = t.setInterval(function () {
                    o.idleSecondsCounter++, o.idleSecondsCounter >= o.group[o.currIndex].opts.idleTime && !o.isDragging && (o.isIdle = !0, o.idleSecondsCounter = 0, o.hideControls());
                }, 1e3));
            }, removeEvents: function removeEvents() {
                var e = this;s.off("orientationchange.fb resize.fb"), r.off("focusin.fb keydown.fb .fb-idle"), this.$refs.container.off(".fb-close .fb-prev .fb-next"), e.idleInterval && (t.clearInterval(e.idleInterval), e.idleInterval = null);
            }, previous: function previous(t) {
                return this.jumpTo(this.currPos - 1, t);
            }, next: function next(t) {
                return this.jumpTo(this.currPos + 1, t);
            }, jumpTo: function jumpTo(t, e) {
                var i,
                    a,
                    s,
                    r,
                    c,
                    l,
                    d,
                    u = this,
                    p = u.group.length;if (!(u.isDragging || u.isClosing || u.isAnimating && u.firstRun)) {
                    if (t = parseInt(t, 10), a = u.current ? u.current.opts.loop : u.opts.loop, !a && (t < 0 || t >= p)) return !1;if (i = u.firstRun = !Object.keys(u.slides).length, !(p < 2 && !i && u.isDragging)) {
                        if (r = u.current, u.prevIndex = u.currIndex, u.prevPos = u.currPos, s = u.createSlide(t), p > 1 && ((a || s.index > 0) && u.createSlide(t - 1), (a || s.index < p - 1) && u.createSlide(t + 1)), u.current = s, u.currIndex = s.index, u.currPos = s.pos, u.trigger("beforeShow", i), u.updateControls(), l = n.fancybox.getTranslate(s.$slide), s.isMoved = (0 !== l.left || 0 !== l.top) && !s.$slide.hasClass("fancybox-animated"), s.forcedDuration = o, n.isNumeric(e) ? s.forcedDuration = e : e = s.opts[i ? "animationDuration" : "transitionDuration"], e = parseInt(e, 10), i) return s.opts.animationEffect && e && u.$refs.container.css("transition-duration", e + "ms"), u.$refs.container.removeClass("fancybox-is-hidden"), f(u.$refs.container), u.$refs.container.addClass("fancybox-is-open"), f(u.$refs.container), s.$slide.addClass("fancybox-slide--previous"), u.loadSlide(s), s.$slide.removeClass("fancybox-slide--previous").addClass("fancybox-slide--current"), void u.preload("image");n.each(u.slides, function (t, e) {
                            n.fancybox.stop(e.$slide);
                        }), s.$slide.removeClass("fancybox-slide--next fancybox-slide--previous").addClass("fancybox-slide--current"), s.isMoved ? (c = Math.round(s.$slide.width()), n.each(u.slides, function (t, o) {
                            var i = o.pos - s.pos;n.fancybox.animate(o.$slide, { top: 0, left: i * c + i * o.opts.gutter }, e, function () {
                                o.$slide.removeAttr("style").removeClass("fancybox-slide--next fancybox-slide--previous"), o.pos === u.currPos && (s.isMoved = !1, u.complete());
                            });
                        })) : u.$refs.stage.children().removeAttr("style"), s.isLoaded ? u.revealContent(s) : u.loadSlide(s), u.preload("image"), r.pos !== s.pos && (d = "fancybox-slide--" + (r.pos > s.pos ? "next" : "previous"), r.$slide.removeClass("fancybox-slide--complete fancybox-slide--current fancybox-slide--next fancybox-slide--previous"), r.isComplete = !1, e && (s.isMoved || s.opts.transitionEffect) && (s.isMoved ? r.$slide.addClass(d) : (d = "fancybox-animated " + d + " fancybox-fx-" + s.opts.transitionEffect, n.fancybox.animate(r.$slide, d, e, function () {
                            r.$slide.removeClass(d).removeAttr("style");
                        }))));
                    }
                }
            }, createSlide: function createSlide(t) {
                var e,
                    o,
                    i = this;return o = t % i.group.length, o = o < 0 ? i.group.length + o : o, !i.slides[t] && i.group[o] && (e = n('<div class="fancybox-slide"></div>').appendTo(i.$refs.stage), i.slides[t] = n.extend(!0, {}, i.group[o], { pos: t, $slide: e, isLoaded: !1 }), i.updateSlide(i.slides[t])), i.slides[t];
            }, scaleToActual: function scaleToActual(t, e, i) {
                var a,
                    s,
                    r,
                    c,
                    l,
                    d = this,
                    u = d.current,
                    f = u.$content,
                    p = n.fancybox.getTranslate(u.$slide).width,
                    h = n.fancybox.getTranslate(u.$slide).height,
                    g = u.width,
                    b = u.height;!d.isAnimating && f && "image" == u.type && u.isLoaded && !u.hasError && (n.fancybox.stop(f), d.isAnimating = !0, t = t === o ? .5 * p : t, e = e === o ? .5 * h : e, a = n.fancybox.getTranslate(f), a.top -= n.fancybox.getTranslate(u.$slide).top, a.left -= n.fancybox.getTranslate(u.$slide).left, c = g / a.width, l = b / a.height, s = .5 * p - .5 * g, r = .5 * h - .5 * b, g > p && (s = a.left * c - (t * c - t), s > 0 && (s = 0), s < p - g && (s = p - g)), b > h && (r = a.top * l - (e * l - e), r > 0 && (r = 0), r < h - b && (r = h - b)), d.updateCursor(g, b), n.fancybox.animate(f, { top: r, left: s, scaleX: c, scaleY: l }, i || 330, function () {
                    d.isAnimating = !1;
                }), d.SlideShow && d.SlideShow.isActive && d.SlideShow.stop());
            }, scaleToFit: function scaleToFit(t) {
                var e,
                    o = this,
                    i = o.current,
                    a = i.$content;!o.isAnimating && a && "image" == i.type && i.isLoaded && !i.hasError && (n.fancybox.stop(a), o.isAnimating = !0, e = o.getFitPos(i), o.updateCursor(e.width, e.height), n.fancybox.animate(a, { top: e.top, left: e.left, scaleX: e.width / a.width(), scaleY: e.height / a.height() }, t || 330, function () {
                    o.isAnimating = !1;
                }));
            }, getFitPos: function getFitPos(t) {
                var e,
                    n,
                    o,
                    i,
                    a,
                    s = this,
                    r = t.$content,
                    c = t.width || t.opts.width,
                    l = t.height || t.opts.height,
                    d = {};return !!(t.isLoaded && r && r.length) && (i = { top: parseInt(t.$slide.css("paddingTop"), 10), right: parseInt(t.$slide.css("paddingRight"), 10), bottom: parseInt(t.$slide.css("paddingBottom"), 10), left: parseInt(t.$slide.css("paddingLeft"), 10) }, e = parseInt(s.$refs.stage.width(), 10) - (i.left + i.right), n = parseInt(s.$refs.stage.height(), 10) - (i.top + i.bottom), c && l || (c = e, l = n), o = Math.min(1, e / c, n / l), c = Math.floor(o * c), l = Math.floor(o * l), "image" === t.type ? (d.top = Math.floor(.5 * (n - l)) + i.top, d.left = Math.floor(.5 * (e - c)) + i.left) : "video" === t.contentType && (a = t.opts.width && t.opts.height ? c / l : t.opts.ratio || 16 / 9, l > c / a ? l = c / a : c > l * a && (c = l * a)), d.width = c, d.height = l, d);
            }, update: function update() {
                var t = this;n.each(t.slides, function (e, n) {
                    t.updateSlide(n);
                });
            }, updateSlide: function updateSlide(t, e) {
                var o = this,
                    i = t && t.$content,
                    a = t.width || t.opts.width,
                    s = t.height || t.opts.height;i && (a || s || "video" === t.contentType) && !t.hasError && (n.fancybox.stop(i), n.fancybox.setTranslate(i, o.getFitPos(t)), t.pos === o.currPos && (o.isAnimating = !1, o.updateCursor())), t.$slide.trigger("refresh"), o.$refs.toolbar.toggleClass("compensate-for-scrollbar", t.$slide.get(0).scrollHeight > t.$slide.get(0).clientHeight), o.trigger("onUpdate", t);
            }, centerSlide: function centerSlide(t, e) {
                var i,
                    a,
                    s = this;s.current && (i = Math.round(t.$slide.width()), a = t.pos - s.current.pos, n.fancybox.animate(t.$slide, { top: 0, left: a * i + a * t.opts.gutter, opacity: 1 }, e === o ? 0 : e, null, !1));
            }, updateCursor: function updateCursor(t, e) {
                var o,
                    i = this,
                    a = i.current,
                    s = i.$refs.container.removeClass("fancybox-is-zoomable fancybox-can-zoomIn fancybox-can-drag fancybox-can-zoomOut");a && !i.isClosing && (o = i.isZoomable(), s.toggleClass("fancybox-is-zoomable", o), n("[data-fancybox-zoom]").prop("disabled", !o), o && ("zoom" === a.opts.clickContent || n.isFunction(a.opts.clickContent) && "zoom" === a.opts.clickContent(a)) ? i.isScaledDown(t, e) ? s.addClass("fancybox-can-zoomIn") : a.opts.touch ? s.addClass("fancybox-can-drag") : s.addClass("fancybox-can-zoomOut") : a.opts.touch && "video" !== a.contentType && s.addClass("fancybox-can-drag"));
            }, isZoomable: function isZoomable() {
                var t,
                    e = this,
                    n = e.current;if (n && !e.isClosing && "image" === n.type && !n.hasError) {
                    if (!n.isLoaded) return !0;if (t = e.getFitPos(n), n.width > t.width || n.height > t.height) return !0;
                }return !1;
            }, isScaledDown: function isScaledDown(t, e) {
                var i = this,
                    a = !1,
                    s = i.current,
                    r = s.$content;return t !== o && e !== o ? a = t < s.width && e < s.height : r && (a = n.fancybox.getTranslate(r), a = a.width < s.width && a.height < s.height), a;
            }, canPan: function canPan() {
                var t,
                    e = this,
                    n = !1,
                    o = e.current;return "image" === o.type && (t = o.$content) && !o.hasError && (n = e.getFitPos(o), n = Math.abs(t.width() - n.width) > 1 || Math.abs(t.height() - n.height) > 1), n;
            }, loadSlide: function loadSlide(t) {
                var e,
                    o,
                    i,
                    a = this;if (!t.isLoading && !t.isLoaded) {
                    switch (t.isLoading = !0, a.trigger("beforeLoad", t), e = t.type, o = t.$slide, o.off("refresh").trigger("onReset").addClass(t.opts.slideClass), e) {case "image":
                            a.setImage(t);break;case "iframe":
                            a.setIframe(t);break;case "html":
                            a.setContent(t, t.src || t.content);break;case "video":
                            a.setContent(t, '<video class="fancybox-video" controls controlsList="nodownload"><source src="' + t.src + '" type="' + t.opts.videoFormat + "\">Your browser doesn't support HTML5 video</video");break;case "inline":
                            n(t.src).length ? a.setContent(t, n(t.src)) : a.setError(t);break;case "ajax":
                            a.showLoading(t), i = n.ajax(n.extend({}, t.opts.ajax.settings, { url: t.src, success: function success(e, n) {
                                    "success" === n && a.setContent(t, e);
                                }, error: function error(e, n) {
                                    e && "abort" !== n && a.setError(t);
                                } })), o.one("onReset", function () {
                                i.abort();
                            });break;default:
                            a.setError(t);}return !0;
                }
            }, setImage: function setImage(e) {
                var o,
                    i,
                    a,
                    s,
                    r,
                    c = this,
                    l = e.opts.srcset || e.opts.image.srcset;if (e.timouts = setTimeout(function () {
                    var t = e.$image;!e.isLoading || t && t[0].complete || e.hasError || c.showLoading(e);
                }, 350), l) {
                    s = t.devicePixelRatio || 1, r = t.innerWidth * s, a = l.split(",").map(function (t) {
                        var e = {};return t.trim().split(/\s+/).forEach(function (t, n) {
                            var o = parseInt(t.substring(0, t.length - 1), 10);return 0 === n ? e.url = t : void (o && (e.value = o, e.postfix = t[t.length - 1]));
                        }), e;
                    }), a.sort(function (t, e) {
                        return t.value - e.value;
                    });for (var d = 0; d < a.length; d++) {
                        var u = a[d];if ("w" === u.postfix && u.value >= r || "x" === u.postfix && u.value >= s) {
                            i = u;break;
                        }
                    }!i && a.length && (i = a[a.length - 1]), i && (e.src = i.url, e.width && e.height && "w" == i.postfix && (e.height = e.width / e.height * i.value, e.width = i.value), e.opts.srcset = l);
                }e.$content = n('<div class="fancybox-content"></div>').addClass("fancybox-is-hidden").appendTo(e.$slide.addClass("fancybox-slide--image")), o = e.opts.thumb || !(!e.opts.$thumb || !e.opts.$thumb.length) && e.opts.$thumb.attr("src"), e.opts.preload !== !1 && e.opts.width && e.opts.height && o && (e.width = e.opts.width, e.height = e.opts.height, e.$ghost = n("<img />").one("error", function () {
                    n(this).remove(), e.$ghost = null;
                }).one("load", function () {
                    c.afterLoad(e);
                }).addClass("fancybox-image").appendTo(e.$content).attr("src", o)), c.setBigImage(e);
            }, setBigImage: function setBigImage(t) {
                var e = this,
                    o = n("<img />");t.$image = o.one("error", function () {
                    e.setError(t);
                }).one("load", function () {
                    var n;t.$ghost || (e.resolveImageSlideSize(t, this.naturalWidth, this.naturalHeight), e.afterLoad(t)), t.timouts && (clearTimeout(t.timouts), t.timouts = null), e.isClosing || (t.opts.srcset && (n = t.opts.sizes, n && "auto" !== n || (n = (t.width / t.height > 1 && s.width() / s.height() > 1 ? "100" : Math.round(t.width / t.height * 100)) + "vw"), o.attr("sizes", n).attr("srcset", t.opts.srcset)), t.$ghost && setTimeout(function () {
                        t.$ghost && !e.isClosing && t.$ghost.hide();
                    }, Math.min(300, Math.max(1e3, t.height / 1600))), e.hideLoading(t));
                }).addClass("fancybox-image").attr("src", t.src).appendTo(t.$content), (o[0].complete || "complete" == o[0].readyState) && o[0].naturalWidth && o[0].naturalHeight ? o.trigger("load") : o[0].error && o.trigger("error");
            }, resolveImageSlideSize: function resolveImageSlideSize(t, e, n) {
                var o = parseInt(t.opts.width, 10),
                    i = parseInt(t.opts.height, 10);t.width = e, t.height = n, o > 0 && (t.width = o, t.height = Math.floor(o * n / e)), i > 0 && (t.width = Math.floor(i * e / n), t.height = i);
            }, setIframe: function setIframe(t) {
                var e,
                    i = this,
                    a = t.opts.iframe,
                    s = t.$slide;t.$content = n('<div class="fancybox-content' + (a.preload ? " fancybox-is-hidden" : "") + '"></div>').css(a.css).appendTo(s), s.addClass("fancybox-slide--" + t.contentType), t.$iframe = e = n(a.tpl.replace(/\{rnd\}/g, new Date().getTime())).attr(a.attr).appendTo(t.$content), a.preload ? (i.showLoading(t), e.on("load.fb error.fb", function (e) {
                    this.isReady = 1, t.$slide.trigger("refresh"), i.afterLoad(t);
                }), s.on("refresh.fb", function () {
                    var n,
                        i,
                        s = t.$content,
                        r = a.css.width,
                        c = a.css.height;if (1 === e[0].isReady) {
                        try {
                            n = e.contents(), i = n.find("body");
                        } catch (t) {}i && i.length && i.children().length && (s.css({ width: "", height: "" }), r === o && (r = Math.ceil(Math.max(i[0].clientWidth, i.outerWidth(!0)))), r && s.width(r), c === o && (c = Math.ceil(Math.max(i[0].clientHeight, i.outerHeight(!0)))), c && s.height(c)), s.removeClass("fancybox-is-hidden");
                    }
                })) : this.afterLoad(t), e.attr("src", t.src), s.one("onReset", function () {
                    try {
                        n(this).find("iframe").hide().unbind().attr("src", "//about:blank");
                    } catch (t) {}n(this).off("refresh.fb").empty(), t.isLoaded = !1;
                });
            }, setContent: function setContent(t, e) {
                var o = this;o.isClosing || (o.hideLoading(t), t.$content && n.fancybox.stop(t.$content), t.$slide.empty(), l(e) && e.parent().length ? (e.parent().parent(".fancybox-slide--inline").trigger("onReset"), t.$placeholder = n("<div>").hide().insertAfter(e), e.css("display", "inline-block")) : t.hasError || ("string" === n.type(e) && (e = n("<div>").append(n.trim(e)).contents(), 3 === e[0].nodeType && (e = n("<div>").html(e))), t.opts.filter && (e = n("<div>").html(e).find(t.opts.filter))), t.$slide.one("onReset", function () {
                    n(this).find("video,audio").trigger("pause"), t.$placeholder && (t.$placeholder.after(e.hide()).remove(), t.$placeholder = null), t.$smallBtn && (t.$smallBtn.remove(), t.$smallBtn = null), t.hasError || (n(this).empty(), t.isLoaded = !1);
                }), n(e).appendTo(t.$slide), n(e).is("video,audio") && (n(e).addClass("fancybox-video"), n(e).wrap("<div></div>"), t.contentType = "video", t.opts.width = t.opts.width || n(e).attr("width"), t.opts.height = t.opts.height || n(e).attr("height")), t.$content = t.$slide.children().filter("div,form,main,video,audio").first().addClass("fancybox-content"), t.$slide.addClass("fancybox-slide--" + t.contentType), this.afterLoad(t));
            }, setError: function setError(t) {
                t.hasError = !0, t.$slide.trigger("onReset").removeClass("fancybox-slide--" + t.contentType).addClass("fancybox-slide--error"), t.contentType = "html", this.setContent(t, this.translate(t, t.opts.errorTpl)), t.pos === this.currPos && (this.isAnimating = !1);
            }, showLoading: function showLoading(t) {
                var e = this;t = t || e.current, t && !t.$spinner && (t.$spinner = n(e.translate(e, e.opts.spinnerTpl)).appendTo(t.$slide));
            }, hideLoading: function hideLoading(t) {
                var e = this;t = t || e.current, t && t.$spinner && (t.$spinner.remove(), delete t.$spinner);
            }, afterLoad: function afterLoad(t) {
                var e = this;e.isClosing || (t.isLoading = !1, t.isLoaded = !0, e.trigger("afterLoad", t), e.hideLoading(t), t.pos === e.currPos && e.updateCursor(), !t.opts.smallBtn || t.$smallBtn && t.$smallBtn.length || (t.$smallBtn = n(e.translate(t, t.opts.btnTpl.smallBtn)).prependTo(t.$content)), t.opts.protect && t.$content && !t.hasError && (t.$content.on("contextmenu.fb", function (t) {
                    return 2 == t.button && t.preventDefault(), !0;
                }), "image" === t.type && n('<div class="fancybox-spaceball"></div>').appendTo(t.$content)), e.revealContent(t));
            }, revealContent: function revealContent(t) {
                var e,
                    i,
                    a,
                    s,
                    r = this,
                    c = t.$slide,
                    l = !1,
                    d = !1;return e = t.opts[r.firstRun ? "animationEffect" : "transitionEffect"], a = t.opts[r.firstRun ? "animationDuration" : "transitionDuration"], a = parseInt(t.forcedDuration === o ? a : t.forcedDuration, 10), t.pos === r.currPos && (t.isComplete ? e = !1 : r.isAnimating = !0), !t.isMoved && t.pos === r.currPos && a || (e = !1), "zoom" === e && (t.pos === r.currPos && a && "image" === t.type && !t.hasError && (d = r.getThumbPos(t)) ? l = r.getFitPos(t) : e = "fade"), "zoom" === e ? (l.scaleX = l.width / d.width, l.scaleY = l.height / d.height, s = t.opts.zoomOpacity, "auto" == s && (s = Math.abs(t.width / t.height - d.width / d.height) > .1), s && (d.opacity = .1, l.opacity = 1), n.fancybox.setTranslate(t.$content.removeClass("fancybox-is-hidden"), d), f(t.$content), void n.fancybox.animate(t.$content, l, a, function () {
                    r.isAnimating = !1, r.complete();
                })) : (r.updateSlide(t), e ? (n.fancybox.stop(c), i = "fancybox-animated fancybox-slide--" + (t.pos >= r.prevPos ? "next" : "previous") + " fancybox-fx-" + e, c.removeAttr("style").removeClass("fancybox-slide--current fancybox-slide--next fancybox-slide--previous").addClass(i), t.$content.removeClass("fancybox-is-hidden"), f(c), void n.fancybox.animate(c, "fancybox-slide--current", a, function (e) {
                    c.removeClass(i).removeAttr("style"), t.pos === r.currPos && r.complete();
                }, !0)) : (f(c), t.$content.removeClass("fancybox-is-hidden"), void (t.pos === r.currPos && r.complete())));
            }, getThumbPos: function getThumbPos(o) {
                var i,
                    a = this,
                    s = !1,
                    r = o.opts.$thumb,
                    c = r && r.length && r[0].ownerDocument === e ? r.offset() : 0,
                    l = function l(e) {
                    for (var o, i = e[0], a = i.getBoundingClientRect(), s = []; null !== i.parentElement;) {
                        "hidden" !== n(i.parentElement).css("overflow") && "auto" !== n(i.parentElement).css("overflow") || s.push(i.parentElement.getBoundingClientRect()), i = i.parentElement;
                    }return o = s.every(function (t) {
                        var e = Math.min(a.right, t.right) - Math.max(a.left, t.left),
                            n = Math.min(a.bottom, t.bottom) - Math.max(a.top, t.top);return e > 0 && n > 0;
                    }), o && a.bottom > 0 && a.right > 0 && a.left < n(t).width() && a.top < n(t).height();
                };return c && l(r) && (i = a.$refs.stage.offset(), s = { top: c.top - i.top + parseFloat(r.css("border-top-width") || 0), left: c.left - i.left + parseFloat(r.css("border-left-width") || 0), width: r.width(), height: r.height(), scaleX: 1, scaleY: 1 }), s;
            }, complete: function complete() {
                var t = this,
                    o = t.current,
                    i = {};!o.isMoved && o.isLoaded && (o.isComplete || (o.isComplete = !0, o.$slide.siblings().trigger("onReset"), t.preload("inline"), f(o.$slide), o.$slide.addClass("fancybox-slide--complete"), n.each(t.slides, function (e, o) {
                    o.pos >= t.currPos - 1 && o.pos <= t.currPos + 1 ? i[o.pos] = o : o && (n.fancybox.stop(o.$slide), o.$slide.off().remove());
                }), t.slides = i), t.isAnimating = !1, t.updateCursor(), t.trigger("afterShow"), o.$slide.find("video,audio").filter(":visible:first").trigger("play"), (n(e.activeElement).is("[disabled]") || o.opts.autoFocus && "image" != o.type && "iframe" !== o.type) && t.focus());
            }, preload: function preload(t) {
                var e = this,
                    n = e.slides[e.currPos + 1],
                    o = e.slides[e.currPos - 1];n && n.type === t && e.loadSlide(n), o && o.type === t && e.loadSlide(o);
            }, focus: function focus() {
                var t,
                    e = this.current;this.isClosing || e && e.isComplete && e.$content && (t = e.$content.find("input[autofocus]:enabled:visible:first"), t.length || (t = e.$content.find("button,:input,[tabindex],a").filter(":enabled:visible:first")), t = t && t.length ? t : e.$content, t.trigger("focus"));
            }, activate: function activate() {
                var t = this;n(".fancybox-container").each(function () {
                    var e = n(this).data("FancyBox");e && e.id !== t.id && !e.isClosing && (e.trigger("onDeactivate"), e.removeEvents(), e.isVisible = !1);
                }), t.isVisible = !0, (t.current || t.isIdle) && (t.update(), t.updateControls()), t.trigger("onActivate"), t.addEvents();
            }, close: function close(t, e) {
                var o,
                    i,
                    a,
                    s,
                    r,
                    c,
                    l,
                    p = this,
                    h = p.current,
                    g = function g() {
                    p.cleanUp(t);
                };return !p.isClosing && (p.isClosing = !0, p.trigger("beforeClose", t) === !1 ? (p.isClosing = !1, d(function () {
                    p.update();
                }), !1) : (p.removeEvents(), h.timouts && clearTimeout(h.timouts), a = h.$content, o = h.opts.animationEffect, i = n.isNumeric(e) ? e : o ? h.opts.animationDuration : 0, h.$slide.off(u).removeClass("fancybox-slide--complete fancybox-slide--next fancybox-slide--previous fancybox-animated"), h.$slide.siblings().trigger("onReset").remove(), i && p.$refs.container.removeClass("fancybox-is-open").addClass("fancybox-is-closing"), p.hideLoading(h), p.hideControls(), p.updateCursor(), "zoom" !== o || t !== !0 && a && i && "image" === h.type && !h.hasError && (l = p.getThumbPos(h)) || (o = "fade"), "zoom" === o ? (n.fancybox.stop(a), s = n.fancybox.getTranslate(a), c = { top: s.top, left: s.left, scaleX: s.width / l.width, scaleY: s.height / l.height, width: l.width, height: l.height }, r = h.opts.zoomOpacity, "auto" == r && (r = Math.abs(h.width / h.height - l.width / l.height) > .1), r && (l.opacity = 0), n.fancybox.setTranslate(a, c), f(a), n.fancybox.animate(a, l, i, g), !0) : (o && i ? t === !0 ? setTimeout(g, i) : n.fancybox.animate(h.$slide.removeClass("fancybox-slide--current"), "fancybox-animated fancybox-slide--previous fancybox-fx-" + o, i, g) : g(), !0)));
            }, cleanUp: function cleanUp(t) {
                var e,
                    o = this,
                    i = n("body");o.current.$slide.trigger("onReset"), o.$refs.container.empty().remove(), o.trigger("afterClose", t), o.$lastFocus && o.current.opts.backFocus && o.$lastFocus.trigger("focus"), o.current = null, e = n.fancybox.getInstance(), e ? e.activate() : (i.removeClass("fancybox-active compensate-for-scrollbar"), n("#fancybox-style-noscroll").remove());
            }, trigger: function trigger(t, e) {
                var o,
                    i = Array.prototype.slice.call(arguments, 1),
                    a = this,
                    s = e && e.opts ? e : a.current;return s ? i.unshift(s) : s = a, i.unshift(a), n.isFunction(s.opts[t]) && (o = s.opts[t].apply(s, i)), o === !1 ? o : void ("afterClose" !== t && a.$refs ? a.$refs.container.trigger(t + ".fb", i) : r.trigger(t + ".fb", i));
            }, updateControls: function updateControls(t) {
                var e = this,
                    n = e.current,
                    o = n.index,
                    i = n.opts.caption,
                    a = e.$refs.container,
                    s = e.$refs.caption;n.$slide.trigger("refresh"), e.$caption = i && i.length ? s.html(i) : null, e.isHiddenControls || e.isIdle || e.showControls(), a.find("[data-fancybox-count]").html(e.group.length), a.find("[data-fancybox-index]").html(o + 1), a.find("[data-fancybox-prev]").toggleClass("disabled", !n.opts.loop && o <= 0), a.find("[data-fancybox-next]").toggleClass("disabled", !n.opts.loop && o >= e.group.length - 1), "image" === n.type ? a.find("[data-fancybox-zoom]").show().end().find("[data-fancybox-download]").attr("href", n.opts.image.src || n.src).show() : n.opts.toolbar && a.find("[data-fancybox-download],[data-fancybox-zoom]").hide();
            }, hideControls: function hideControls() {
                this.isHiddenControls = !0, this.$refs.container.removeClass("fancybox-show-infobar fancybox-show-toolbar fancybox-show-caption fancybox-show-nav");
            }, showControls: function showControls() {
                var t = this,
                    e = t.current ? t.current.opts : t.opts,
                    n = t.$refs.container;t.isHiddenControls = !1, t.idleSecondsCounter = 0, n.toggleClass("fancybox-show-toolbar", !(!e.toolbar || !e.buttons)).toggleClass("fancybox-show-infobar", !!(e.infobar && t.group.length > 1)).toggleClass("fancybox-show-nav", !!(e.arrows && t.group.length > 1)).toggleClass("fancybox-is-modal", !!e.modal), t.$caption ? n.addClass("fancybox-show-caption ") : n.removeClass("fancybox-show-caption");
            }, toggleControls: function toggleControls() {
                this.isHiddenControls ? this.showControls() : this.hideControls();
            } }), n.fancybox = { version: "3.3.5", defaults: a, getInstance: function getInstance(t) {
                var e = n('.fancybox-container:not(".fancybox-is-closing"):last').data("FancyBox"),
                    o = Array.prototype.slice.call(arguments, 1);return e instanceof h && ("string" === n.type(t) ? e[t].apply(e, o) : "function" === n.type(t) && t.apply(e, o), e);
            }, open: function open(t, e, n) {
                return new h(t, e, n);
            }, close: function close(t) {
                var e = this.getInstance();e && (e.close(), t === !0 && this.close());
            }, destroy: function destroy() {
                this.close(!0), r.add("body").off("click.fb-start", "**");
            }, isMobile: e.createTouch !== o && /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent), use3d: function () {
                var n = e.createElement("div");return t.getComputedStyle && t.getComputedStyle(n) && t.getComputedStyle(n).getPropertyValue("transform") && !(e.documentMode && e.documentMode < 11);
            }(), getTranslate: function getTranslate(t) {
                var e;return !(!t || !t.length) && (e = t[0].getBoundingClientRect(), { top: e.top || 0, left: e.left || 0, width: e.width, height: e.height, opacity: parseFloat(t.css("opacity")) });
            }, setTranslate: function setTranslate(t, e) {
                var n = "",
                    i = {};if (t && e) return e.left === o && e.top === o || (n = (e.left === o ? t.position().left : e.left) + "px, " + (e.top === o ? t.position().top : e.top) + "px", n = this.use3d ? "translate3d(" + n + ", 0px)" : "translate(" + n + ")"), e.scaleX !== o && e.scaleY !== o && (n = (n.length ? n + " " : "") + "scale(" + e.scaleX + ", " + e.scaleY + ")"), n.length && (i.transform = n), e.opacity !== o && (i.opacity = e.opacity), e.width !== o && (i.width = e.width), e.height !== o && (i.height = e.height), t.css(i);
            }, animate: function animate(t, e, i, a, s) {
                var r = !1;n.isFunction(i) && (a = i, i = null), n.isPlainObject(e) || t.removeAttr("style"), n.fancybox.stop(t), t.on(u, function (o) {
                    (!o || !o.originalEvent || t.is(o.originalEvent.target) && "z-index" != o.originalEvent.propertyName) && (n.fancybox.stop(t), r && n.fancybox.setTranslate(t, r), n.isPlainObject(e) ? s === !1 && t.removeAttr("style") : s !== !0 && t.removeClass(e), n.isFunction(a) && a(o));
                }), n.isNumeric(i) && t.css("transition-duration", i + "ms"), n.isPlainObject(e) ? (e.scaleX !== o && e.scaleY !== o && (r = n.extend({}, e, { width: t.width() * e.scaleX, height: t.height() * e.scaleY, scaleX: 1, scaleY: 1 }), delete e.width, delete e.height, t.parent().hasClass("fancybox-slide--image") && t.parent().addClass("fancybox-is-scaling")), n.fancybox.setTranslate(t, e)) : t.addClass(e), t.data("timer", setTimeout(function () {
                    t.trigger("transitionend");
                }, i + 16));
            }, stop: function stop(t) {
                t && t.length && (clearTimeout(t.data("timer")), t.off("transitionend").css("transition-duration", ""), t.parent().removeClass("fancybox-is-scaling"));
            } }, n.fn.fancybox = function (t) {
            var e;return t = t || {}, e = t.selector || !1, e ? n("body").off("click.fb-start", e).on("click.fb-start", e, { options: t }, i) : this.off("click.fb-start").on("click.fb-start", { items: this, options: t }, i), this;
        }, r.on("click.fb-start", "[data-fancybox]", i), r.on("click.fb-start", "[data-trigger]", function (t) {
            i(t, { $target: n('[data-fancybox="' + n(t.currentTarget).attr("data-trigger") + '"]').eq(n(t.currentTarget).attr("data-index") || 0), $trigger: n(this) });
        });
    }
}(window, document, window.jQuery || jQuery), function (t) {
    "use strict";
    var e = function e(_e, n, o) {
        if (_e) return o = o || "", "object" === t.type(o) && (o = t.param(o, !0)), t.each(n, function (t, n) {
            _e = _e.replace("$" + t, n || "");
        }), o.length && (_e += (_e.indexOf("?") > 0 ? "&" : "?") + o), _e;
    },
        n = { youtube: { matcher: /(youtube\.com|youtu\.be|youtube\-nocookie\.com)\/(watch\?(.*&)?v=|v\/|u\/|embed\/?)?(videoseries\?list=(.*)|[\w-]{11}|\?listType=(.*)&list=(.*))(.*)/i, params: { autoplay: 1, autohide: 1, fs: 1, rel: 0, hd: 1, wmode: "transparent", enablejsapi: 1, html5: 1 }, paramPlace: 8, type: "iframe", url: "//www.youtube.com/embed/$4", thumb: "//img.youtube.com/vi/$4/hqdefault.jpg" }, vimeo: { matcher: /^.+vimeo.com\/(.*\/)?([\d]+)(.*)?/, params: { autoplay: 1, hd: 1, show_title: 1, show_byline: 1, show_portrait: 0, fullscreen: 1, api: 1 }, paramPlace: 3, type: "iframe", url: "//player.vimeo.com/video/$2" }, instagram: { matcher: /(instagr\.am|instagram\.com)\/p\/([a-zA-Z0-9_\-]+)\/?/i, type: "image", url: "//$1/p/$2/media/?size=l" }, gmap_place: { matcher: /(maps\.)?google\.([a-z]{2,3}(\.[a-z]{2})?)\/(((maps\/(place\/(.*)\/)?\@(.*),(\d+.?\d+?)z))|(\?ll=))(.*)?/i, type: "iframe", url: function url(t) {
                return "//maps.google." + t[2] + "/?ll=" + (t[9] ? t[9] + "&z=" + Math.floor(t[10]) + (t[12] ? t[12].replace(/^\//, "&") : "") : t[12] + "").replace(/\?/, "&") + "&output=" + (t[12] && t[12].indexOf("layer=c") > 0 ? "svembed" : "embed");
            } }, gmap_search: { matcher: /(maps\.)?google\.([a-z]{2,3}(\.[a-z]{2})?)\/(maps\/search\/)(.*)/i, type: "iframe", url: function url(t) {
                return "//maps.google." + t[2] + "/maps?q=" + t[5].replace("query=", "q=").replace("api=1", "") + "&output=embed";
            } } };t(document).on("objectNeedsType.fb", function (o, i, a) {
        var s,
            r,
            c,
            l,
            d,
            u,
            f,
            p = a.src || "",
            h = !1;s = t.extend(!0, {}, n, a.opts.media), t.each(s, function (n, o) {
            if (c = p.match(o.matcher)) {
                if (h = o.type, f = n, u = {}, o.paramPlace && c[o.paramPlace]) {
                    d = c[o.paramPlace], "?" == d[0] && (d = d.substring(1)), d = d.split("&");for (var i = 0; i < d.length; ++i) {
                        var s = d[i].split("=", 2);2 == s.length && (u[s[0]] = decodeURIComponent(s[1].replace(/\+/g, " ")));
                    }
                }return l = t.extend(!0, {}, o.params, a.opts[n], u), p = "function" === t.type(o.url) ? o.url.call(this, c, l, a) : e(o.url, c, l), r = "function" === t.type(o.thumb) ? o.thumb.call(this, c, l, a) : e(o.thumb, c), "youtube" === n ? p = p.replace(/&t=((\d+)m)?(\d+)s/, function (t, e, n, o) {
                    return "&start=" + ((n ? 60 * parseInt(n, 10) : 0) + parseInt(o, 10));
                }) : "vimeo" === n && (p = p.replace("&%23", "#")), !1;
            }
        }), h ? (a.opts.thumb || a.opts.$thumb && a.opts.$thumb.length || (a.opts.thumb = r), "iframe" === h && (a.opts = t.extend(!0, a.opts, { iframe: { preload: !1, attr: { scrolling: "no" } } })), t.extend(a, { type: h, src: p, origSrc: a.src, contentSource: f, contentType: "image" === h ? "image" : "gmap_place" == f || "gmap_search" == f ? "map" : "video" })) : p && (a.type = a.opts.defaultType);
    });
}(window.jQuery || jQuery), function (t, e, n) {
    "use strict";
    var o = function () {
        return t.requestAnimationFrame || t.webkitRequestAnimationFrame || t.mozRequestAnimationFrame || t.oRequestAnimationFrame || function (e) {
            return t.setTimeout(e, 1e3 / 60);
        };
    }(),
        i = function () {
        return t.cancelAnimationFrame || t.webkitCancelAnimationFrame || t.mozCancelAnimationFrame || t.oCancelAnimationFrame || function (e) {
            t.clearTimeout(e);
        };
    }(),
        a = function a(e) {
        var n = [];e = e.originalEvent || e || t.e, e = e.touches && e.touches.length ? e.touches : e.changedTouches && e.changedTouches.length ? e.changedTouches : [e];for (var o in e) {
            e[o].pageX ? n.push({ x: e[o].pageX, y: e[o].pageY }) : e[o].clientX && n.push({ x: e[o].clientX, y: e[o].clientY });
        }return n;
    },
        s = function s(t, e, n) {
        return e && t ? "x" === n ? t.x - e.x : "y" === n ? t.y - e.y : Math.sqrt(Math.pow(t.x - e.x, 2) + Math.pow(t.y - e.y, 2)) : 0;
    },
        r = function r(t) {
        if (t.is('a,area,button,[role="button"],input,label,select,summary,textarea,video,audio') || n.isFunction(t.get(0).onclick) || t.data("selectable")) return !0;for (var e = 0, o = t[0].attributes, i = o.length; e < i; e++) {
            if ("data-fancybox-" === o[e].nodeName.substr(0, 14)) return !0;
        }return !1;
    },
        c = function c(e) {
        var n = t.getComputedStyle(e)["overflow-y"],
            o = t.getComputedStyle(e)["overflow-x"],
            i = ("scroll" === n || "auto" === n) && e.scrollHeight > e.clientHeight,
            a = ("scroll" === o || "auto" === o) && e.scrollWidth > e.clientWidth;return i || a;
    },
        l = function l(t) {
        for (var e = !1;;) {
            if (e = c(t.get(0))) break;if (t = t.parent(), !t.length || t.hasClass("fancybox-stage") || t.is("body")) break;
        }return e;
    },
        d = function d(t) {
        var e = this;e.instance = t, e.$bg = t.$refs.bg, e.$stage = t.$refs.stage, e.$container = t.$refs.container, e.destroy(), e.$container.on("touchstart.fb.touch mousedown.fb.touch", n.proxy(e, "ontouchstart"));
    };d.prototype.destroy = function () {
        this.$container.off(".fb.touch");
    }, d.prototype.ontouchstart = function (o) {
        var i = this,
            c = n(o.target),
            d = i.instance,
            u = d.current,
            f = u.$content,
            p = "touchstart" == o.type;if (p && i.$container.off("mousedown.fb.touch"), (!o.originalEvent || 2 != o.originalEvent.button) && c.length && !r(c) && !r(c.parent()) && (c.is("img") || !(o.originalEvent.clientX > c[0].clientWidth + c.offset().left))) {
            if (!u || d.isAnimating || d.isClosing) return o.stopPropagation(), void o.preventDefault();if (i.realPoints = i.startPoints = a(o), i.startPoints.length) {
                if (o.stopPropagation(), i.startEvent = o, i.canTap = !0, i.$target = c, i.$content = f, i.opts = u.opts.touch, i.isPanning = !1, i.isSwiping = !1, i.isZooming = !1, i.isScrolling = !1, i.startTime = new Date().getTime(), i.distanceX = i.distanceY = i.distance = 0, i.canvasWidth = Math.round(u.$slide[0].clientWidth), i.canvasHeight = Math.round(u.$slide[0].clientHeight), i.contentLastPos = null, i.contentStartPos = n.fancybox.getTranslate(i.$content) || { top: 0, left: 0 }, i.sliderStartPos = i.sliderLastPos || n.fancybox.getTranslate(u.$slide), i.stagePos = n.fancybox.getTranslate(d.$refs.stage), i.sliderStartPos.top -= i.stagePos.top, i.sliderStartPos.left -= i.stagePos.left, i.contentStartPos.top -= i.stagePos.top, i.contentStartPos.left -= i.stagePos.left, n(e).off(".fb.touch").on(p ? "touchend.fb.touch touchcancel.fb.touch" : "mouseup.fb.touch mouseleave.fb.touch", n.proxy(i, "ontouchend")).on(p ? "touchmove.fb.touch" : "mousemove.fb.touch", n.proxy(i, "ontouchmove")), n.fancybox.isMobile && e.addEventListener("scroll", i.onscroll, !0), !i.opts && !d.canPan() || !c.is(i.$stage) && !i.$stage.find(c).length) return void (c.is(".fancybox-image") && o.preventDefault());n.fancybox.isMobile && (l(c) || l(c.parent())) || o.preventDefault(), (1 === i.startPoints.length || u.hasError) && (i.instance.canPan() ? (n.fancybox.stop(i.$content), i.$content.css("transition-duration", ""), i.isPanning = !0) : i.isSwiping = !0, i.$container.addClass("fancybox-controls--isGrabbing")), 2 === i.startPoints.length && "image" === u.type && (u.isLoaded || u.$ghost) && (i.canTap = !1, i.isSwiping = !1, i.isPanning = !1, i.isZooming = !0, n.fancybox.stop(i.$content), i.$content.css("transition-duration", ""), i.centerPointStartX = .5 * (i.startPoints[0].x + i.startPoints[1].x) - n(t).scrollLeft(), i.centerPointStartY = .5 * (i.startPoints[0].y + i.startPoints[1].y) - n(t).scrollTop(), i.percentageOfImageAtPinchPointX = (i.centerPointStartX - i.contentStartPos.left) / i.contentStartPos.width, i.percentageOfImageAtPinchPointY = (i.centerPointStartY - i.contentStartPos.top) / i.contentStartPos.height, i.startDistanceBetweenFingers = s(i.startPoints[0], i.startPoints[1]));
            }
        }
    }, d.prototype.onscroll = function (t) {
        var n = this;n.isScrolling = !0, e.removeEventListener("scroll", n.onscroll, !0);
    }, d.prototype.ontouchmove = function (t) {
        var e = this,
            o = n(t.target);return void 0 !== t.originalEvent.buttons && 0 === t.originalEvent.buttons ? void e.ontouchend(t) : e.isScrolling || !o.is(e.$stage) && !e.$stage.find(o).length ? void (e.canTap = !1) : (e.newPoints = a(t), void ((e.opts || e.instance.canPan()) && e.newPoints.length && e.newPoints.length && (e.isSwiping && e.isSwiping === !0 || t.preventDefault(), e.distanceX = s(e.newPoints[0], e.startPoints[0], "x"), e.distanceY = s(e.newPoints[0], e.startPoints[0], "y"), e.distance = s(e.newPoints[0], e.startPoints[0]), e.distance > 0 && (e.isSwiping ? e.onSwipe(t) : e.isPanning ? e.onPan() : e.isZooming && e.onZoom()))));
    }, d.prototype.onSwipe = function (e) {
        var a,
            s = this,
            r = s.isSwiping,
            c = s.sliderStartPos.left || 0;if (r !== !0) "x" == r && (s.distanceX > 0 && (s.instance.group.length < 2 || 0 === s.instance.current.index && !s.instance.current.opts.loop) ? c += Math.pow(s.distanceX, .8) : s.distanceX < 0 && (s.instance.group.length < 2 || s.instance.current.index === s.instance.group.length - 1 && !s.instance.current.opts.loop) ? c -= Math.pow(-s.distanceX, .8) : c += s.distanceX), s.sliderLastPos = { top: "x" == r ? 0 : s.sliderStartPos.top + s.distanceY, left: c }, s.requestId && (i(s.requestId), s.requestId = null), s.requestId = o(function () {
            s.sliderLastPos && (n.each(s.instance.slides, function (t, e) {
                var o = e.pos - s.instance.currPos;n.fancybox.setTranslate(e.$slide, { top: s.sliderLastPos.top, left: s.sliderLastPos.left + o * s.canvasWidth + o * e.opts.gutter });
            }), s.$container.addClass("fancybox-is-sliding"));
        });else if (Math.abs(s.distance) > 10) {
            if (s.canTap = !1, s.instance.group.length < 2 && s.opts.vertical ? s.isSwiping = "y" : s.instance.isDragging || s.opts.vertical === !1 || "auto" === s.opts.vertical && n(t).width() > 800 ? s.isSwiping = "x" : (a = Math.abs(180 * Math.atan2(s.distanceY, s.distanceX) / Math.PI), s.isSwiping = a > 45 && a < 135 ? "y" : "x"), s.canTap = !1, "y" === s.isSwiping && n.fancybox.isMobile && (l(s.$target) || l(s.$target.parent()))) return void (s.isScrolling = !0);s.instance.isDragging = s.isSwiping, s.startPoints = s.newPoints, n.each(s.instance.slides, function (t, e) {
                n.fancybox.stop(e.$slide), e.$slide.css("transition-duration", ""), e.inTransition = !1, e.pos === s.instance.current.pos && (s.sliderStartPos.left = n.fancybox.getTranslate(e.$slide).left - n.fancybox.getTranslate(s.instance.$refs.stage).left);
            }), s.instance.SlideShow && s.instance.SlideShow.isActive && s.instance.SlideShow.stop();
        }
    }, d.prototype.onPan = function () {
        var t = this;return s(t.newPoints[0], t.realPoints[0]) < (n.fancybox.isMobile ? 10 : 5) ? void (t.startPoints = t.newPoints) : (t.canTap = !1, t.contentLastPos = t.limitMovement(), t.requestId && (i(t.requestId), t.requestId = null), void (t.requestId = o(function () {
            n.fancybox.setTranslate(t.$content, t.contentLastPos);
        })));
    }, d.prototype.limitMovement = function () {
        var t,
            e,
            n,
            o,
            i,
            a,
            s = this,
            r = s.canvasWidth,
            c = s.canvasHeight,
            l = s.distanceX,
            d = s.distanceY,
            u = s.contentStartPos,
            f = u.left,
            p = u.top,
            h = u.width,
            g = u.height;return i = h > r ? f + l : f, a = p + d, t = Math.max(0, .5 * r - .5 * h), e = Math.max(0, .5 * c - .5 * g), n = Math.min(r - h, .5 * r - .5 * h), o = Math.min(c - g, .5 * c - .5 * g), l > 0 && i > t && (i = t - 1 + Math.pow(-t + f + l, .8) || 0), l < 0 && i < n && (i = n + 1 - Math.pow(n - f - l, .8) || 0), d > 0 && a > e && (a = e - 1 + Math.pow(-e + p + d, .8) || 0), d < 0 && a < o && (a = o + 1 - Math.pow(o - p - d, .8) || 0), { top: a, left: i };
    }, d.prototype.limitPosition = function (t, e, n, o) {
        var i = this,
            a = i.canvasWidth,
            s = i.canvasHeight;return n > a ? (t = t > 0 ? 0 : t, t = t < a - n ? a - n : t) : t = Math.max(0, a / 2 - n / 2), o > s ? (e = e > 0 ? 0 : e, e = e < s - o ? s - o : e) : e = Math.max(0, s / 2 - o / 2), { top: e, left: t };
    }, d.prototype.onZoom = function () {
        var e = this,
            a = e.contentStartPos,
            r = a.width,
            c = a.height,
            l = a.left,
            d = a.top,
            u = s(e.newPoints[0], e.newPoints[1]),
            f = u / e.startDistanceBetweenFingers,
            p = Math.floor(r * f),
            h = Math.floor(c * f),
            g = (r - p) * e.percentageOfImageAtPinchPointX,
            b = (c - h) * e.percentageOfImageAtPinchPointY,
            m = (e.newPoints[0].x + e.newPoints[1].x) / 2 - n(t).scrollLeft(),
            y = (e.newPoints[0].y + e.newPoints[1].y) / 2 - n(t).scrollTop(),
            v = m - e.centerPointStartX,
            x = y - e.centerPointStartY,
            w = l + (g + v),
            $ = d + (b + x),
            S = { top: $, left: w, scaleX: f, scaleY: f };e.canTap = !1, e.newWidth = p, e.newHeight = h, e.contentLastPos = S, e.requestId && (i(e.requestId), e.requestId = null), e.requestId = o(function () {
            n.fancybox.setTranslate(e.$content, e.contentLastPos);
        });
    }, d.prototype.ontouchend = function (t) {
        var o = this,
            s = Math.max(new Date().getTime() - o.startTime, 1),
            r = o.isSwiping,
            c = o.isPanning,
            l = o.isZooming,
            d = o.isScrolling;return o.endPoints = a(t), o.$container.removeClass("fancybox-controls--isGrabbing"), n(e).off(".fb.touch"), e.removeEventListener("scroll", o.onscroll, !0), o.requestId && (i(o.requestId), o.requestId = null), o.isSwiping = !1, o.isPanning = !1, o.isZooming = !1, o.isScrolling = !1, o.instance.isDragging = !1, o.canTap ? o.onTap(t) : (o.speed = 366, o.velocityX = o.distanceX / s * .5, o.velocityY = o.distanceY / s * .5, o.speedX = Math.max(.5 * o.speed, Math.min(1.5 * o.speed, 1 / Math.abs(o.velocityX) * o.speed)), void (c ? o.endPanning() : l ? o.endZooming() : o.endSwiping(r, d)));
    }, d.prototype.endSwiping = function (t, e) {
        var o = this,
            i = !1,
            a = o.instance.group.length;o.sliderLastPos = null, "y" == t && !e && Math.abs(o.distanceY) > 50 ? (n.fancybox.animate(o.instance.current.$slide, { top: o.sliderStartPos.top + o.distanceY + 150 * o.velocityY, opacity: 0 }, 200), i = o.instance.close(!0, 200)) : "x" == t && o.distanceX > 50 && a > 1 ? i = o.instance.previous(o.speedX) : "x" == t && o.distanceX < -50 && a > 1 && (i = o.instance.next(o.speedX)), i !== !1 || "x" != t && "y" != t || (e || a < 2 ? o.instance.centerSlide(o.instance.current, 150) : o.instance.jumpTo(o.instance.current.index)), o.$container.removeClass("fancybox-is-sliding");
    }, d.prototype.endPanning = function () {
        var t,
            e,
            o,
            i = this;i.contentLastPos && (i.opts.momentum === !1 ? (t = i.contentLastPos.left, e = i.contentLastPos.top) : (t = i.contentLastPos.left + i.velocityX * i.speed, e = i.contentLastPos.top + i.velocityY * i.speed), o = i.limitPosition(t, e, i.contentStartPos.width, i.contentStartPos.height), o.width = i.contentStartPos.width, o.height = i.contentStartPos.height, n.fancybox.animate(i.$content, o, 330));
    }, d.prototype.endZooming = function () {
        var t,
            e,
            o,
            i,
            a = this,
            s = a.instance.current,
            r = a.newWidth,
            c = a.newHeight;a.contentLastPos && (t = a.contentLastPos.left, e = a.contentLastPos.top, i = { top: e, left: t, width: r, height: c, scaleX: 1, scaleY: 1 }, n.fancybox.setTranslate(a.$content, i), r < a.canvasWidth && c < a.canvasHeight ? a.instance.scaleToFit(150) : r > s.width || c > s.height ? a.instance.scaleToActual(a.centerPointStartX, a.centerPointStartY, 150) : (o = a.limitPosition(t, e, r, c), n.fancybox.setTranslate(a.$content, n.fancybox.getTranslate(a.$content)), n.fancybox.animate(a.$content, o, 150)));
    }, d.prototype.onTap = function (e) {
        var o,
            i = this,
            s = n(e.target),
            r = i.instance,
            c = r.current,
            l = e && a(e) || i.startPoints,
            d = l[0] ? l[0].x - n(t).scrollLeft() - i.stagePos.left : 0,
            u = l[0] ? l[0].y - n(t).scrollTop() - i.stagePos.top : 0,
            f = function f(t) {
            var o = c.opts[t];if (n.isFunction(o) && (o = o.apply(r, [c, e])), o) switch (o) {case "close":
                    r.close(i.startEvent);break;case "toggleControls":
                    r.toggleControls(!0);break;case "next":
                    r.next();break;case "nextOrClose":
                    r.group.length > 1 ? r.next() : r.close(i.startEvent);break;case "zoom":
                    "image" == c.type && (c.isLoaded || c.$ghost) && (r.canPan() ? r.scaleToFit() : r.isScaledDown() ? r.scaleToActual(d, u) : r.group.length < 2 && r.close(i.startEvent));}
        };if ((!e.originalEvent || 2 != e.originalEvent.button) && (s.is("img") || !(d > s[0].clientWidth + s.offset().left))) {
            if (s.is(".fancybox-bg,.fancybox-inner,.fancybox-outer,.fancybox-container")) o = "Outside";else if (s.is(".fancybox-slide")) o = "Slide";else {
                if (!r.current.$content || !r.current.$content.find(s).addBack().filter(s).length) return;o = "Content";
            }if (i.tapped) {
                if (clearTimeout(i.tapped), i.tapped = null, Math.abs(d - i.tapX) > 50 || Math.abs(u - i.tapY) > 50) return this;f("dblclick" + o);
            } else i.tapX = d, i.tapY = u, c.opts["dblclick" + o] && c.opts["dblclick" + o] !== c.opts["click" + o] ? i.tapped = setTimeout(function () {
                i.tapped = null, f("click" + o);
            }, 500) : f("click" + o);return this;
        }
    }, n(e).on("onActivate.fb", function (t, e) {
        e && !e.Guestures && (e.Guestures = new d(e));
    });
}(window, document, window.jQuery || jQuery), function (t, e) {
    "use strict";
    e.extend(!0, e.fancybox.defaults, { btnTpl: { slideShow: '<button data-fancybox-play class="fancybox-button fancybox-button--play" title="{{PLAY_START}}"><svg viewBox="0 0 40 40"><path d="M13,12 L27,20 L13,27 Z" /><path d="M15,10 v19 M23,10 v19" /></svg></button>' }, slideShow: { autoStart: !1, speed: 3e3 } });var n = function n(t) {
        this.instance = t, this.init();
    };e.extend(n.prototype, { timer: null, isActive: !1, $button: null, init: function init() {
            var t = this;t.$button = t.instance.$refs.toolbar.find("[data-fancybox-play]").on("click", function () {
                t.toggle();
            }), (t.instance.group.length < 2 || !t.instance.group[t.instance.currIndex].opts.slideShow) && t.$button.hide();
        }, set: function set(t) {
            var e = this;e.instance && e.instance.current && (t === !0 || e.instance.current.opts.loop || e.instance.currIndex < e.instance.group.length - 1) ? e.timer = setTimeout(function () {
                e.isActive && e.instance.jumpTo((e.instance.currIndex + 1) % e.instance.group.length);
            }, e.instance.current.opts.slideShow.speed) : (e.stop(), e.instance.idleSecondsCounter = 0, e.instance.showControls());
        }, clear: function clear() {
            var t = this;clearTimeout(t.timer), t.timer = null;
        }, start: function start() {
            var t = this,
                e = t.instance.current;e && (t.isActive = !0, t.$button.attr("title", e.opts.i18n[e.opts.lang].PLAY_STOP).removeClass("fancybox-button--play").addClass("fancybox-button--pause"), t.set(!0));
        }, stop: function stop() {
            var t = this,
                e = t.instance.current;t.clear(), t.$button.attr("title", e.opts.i18n[e.opts.lang].PLAY_START).removeClass("fancybox-button--pause").addClass("fancybox-button--play"), t.isActive = !1;
        }, toggle: function toggle() {
            var t = this;t.isActive ? t.stop() : t.start();
        } }), e(t).on({ "onInit.fb": function onInitFb(t, e) {
            e && !e.SlideShow && (e.SlideShow = new n(e));
        }, "beforeShow.fb": function beforeShowFb(t, e, n, o) {
            var i = e && e.SlideShow;o ? i && n.opts.slideShow.autoStart && i.start() : i && i.isActive && i.clear();
        }, "afterShow.fb": function afterShowFb(t, e, n) {
            var o = e && e.SlideShow;o && o.isActive && o.set();
        }, "afterKeydown.fb": function afterKeydownFb(n, o, i, a, s) {
            var r = o && o.SlideShow;!r || !i.opts.slideShow || 80 !== s && 32 !== s || e(t.activeElement).is("button,a,input") || (a.preventDefault(), r.toggle());
        }, "beforeClose.fb onDeactivate.fb": function beforeCloseFbOnDeactivateFb(t, e) {
            var n = e && e.SlideShow;n && n.stop();
        } }), e(t).on("visibilitychange", function () {
        var n = e.fancybox.getInstance(),
            o = n && n.SlideShow;o && o.isActive && (t.hidden ? o.clear() : o.set());
    });
}(document, window.jQuery || jQuery), function (t, e) {
    "use strict";
    var n = function () {
        for (var e = [["requestFullscreen", "exitFullscreen", "fullscreenElement", "fullscreenEnabled", "fullscreenchange", "fullscreenerror"], ["webkitRequestFullscreen", "webkitExitFullscreen", "webkitFullscreenElement", "webkitFullscreenEnabled", "webkitfullscreenchange", "webkitfullscreenerror"], ["webkitRequestFullScreen", "webkitCancelFullScreen", "webkitCurrentFullScreenElement", "webkitCancelFullScreen", "webkitfullscreenchange", "webkitfullscreenerror"], ["mozRequestFullScreen", "mozCancelFullScreen", "mozFullScreenElement", "mozFullScreenEnabled", "mozfullscreenchange", "mozfullscreenerror"], ["msRequestFullscreen", "msExitFullscreen", "msFullscreenElement", "msFullscreenEnabled", "MSFullscreenChange", "MSFullscreenError"]], n = {}, o = 0; o < e.length; o++) {
            var i = e[o];if (i && i[1] in t) {
                for (var a = 0; a < i.length; a++) {
                    n[e[0][a]] = i[a];
                }return n;
            }
        }return !1;
    }();if (!n) return void (e && e.fancybox && (e.fancybox.defaults.btnTpl.fullScreen = !1));var o = { request: function request(e) {
            e = e || t.documentElement, e[n.requestFullscreen](e.ALLOW_KEYBOARD_INPUT);
        }, exit: function exit() {
            t[n.exitFullscreen]();
        }, toggle: function toggle(e) {
            e = e || t.documentElement, this.isFullscreen() ? this.exit() : this.request(e);
        }, isFullscreen: function isFullscreen() {
            return Boolean(t[n.fullscreenElement]);
        }, enabled: function enabled() {
            return Boolean(t[n.fullscreenEnabled]);
        } };e.extend(!0, e.fancybox.defaults, { btnTpl: { fullScreen: '<button data-fancybox-fullscreen class="fancybox-button fancybox-button--fullscreen" title="{{FULL_SCREEN}}"><svg viewBox="0 0 40 40"><path d="M9,12 v16 h22 v-16 h-22 v8" /></svg></button>' }, fullScreen: { autoStart: !1 } }), e(t).on({ "onInit.fb": function onInitFb(t, e) {
            var n;e && e.group[e.currIndex].opts.fullScreen ? (n = e.$refs.container, n.on("click.fb-fullscreen", "[data-fancybox-fullscreen]", function (t) {
                t.stopPropagation(), t.preventDefault(), o.toggle();
            }), e.opts.fullScreen && e.opts.fullScreen.autoStart === !0 && o.request(), e.FullScreen = o) : e && e.$refs.toolbar.find("[data-fancybox-fullscreen]").hide();
        }, "afterKeydown.fb": function afterKeydownFb(t, e, n, o, i) {
            e && e.FullScreen && 70 === i && (o.preventDefault(), e.FullScreen.toggle());
        }, "beforeClose.fb": function beforeCloseFb(t, e) {
            e && e.FullScreen && e.$refs.container.hasClass("fancybox-is-fullscreen") && o.exit();
        } }), e(t).on(n.fullscreenchange, function () {
        var t = o.isFullscreen(),
            n = e.fancybox.getInstance();n && (n.current && "image" === n.current.type && n.isAnimating && (n.current.$content.css("transition", "none"), n.isAnimating = !1, n.update(!0, !0, 0)), n.trigger("onFullscreenChange", t), n.$refs.container.toggleClass("fancybox-is-fullscreen", t));
    });
}(document, window.jQuery || jQuery), function (t, e) {
    "use strict";
    var n = "fancybox-thumbs",
        o = n + "-active",
        i = n + "-loading";e.fancybox.defaults = e.extend(!0, { btnTpl: { thumbs: '<button data-fancybox-thumbs class="fancybox-button fancybox-button--thumbs" title="{{THUMBS}}"><svg viewBox="0 0 120 120"><path d="M30,30 h14 v14 h-14 Z M50,30 h14 v14 h-14 Z M70,30 h14 v14 h-14 Z M30,50 h14 v14 h-14 Z M50,50 h14 v14 h-14 Z M70,50 h14 v14 h-14 Z M30,70 h14 v14 h-14 Z M50,70 h14 v14 h-14 Z M70,70 h14 v14 h-14 Z" /></svg></button>' }, thumbs: { autoStart: !1, hideOnClose: !0, parentEl: ".fancybox-container", axis: "y" } }, e.fancybox.defaults);var a = function a(t) {
        this.init(t);
    };e.extend(a.prototype, { $button: null, $grid: null, $list: null, isVisible: !1, isActive: !1, init: function init(t) {
            var e,
                n,
                o = this;o.instance = t, t.Thumbs = o, o.opts = t.group[t.currIndex].opts.thumbs, e = t.group[0], e = e.opts.thumb || !(!e.opts.$thumb || !e.opts.$thumb.length) && e.opts.$thumb.attr("src"), t.group.length > 1 && (n = t.group[1], n = n.opts.thumb || !(!n.opts.$thumb || !n.opts.$thumb.length) && n.opts.$thumb.attr("src")), o.$button = t.$refs.toolbar.find("[data-fancybox-thumbs]"), o.opts && e && n && e && n ? (o.$button.show().on("click", function () {
                o.toggle();
            }), o.isActive = !0) : o.$button.hide();
        }, create: function create() {
            var t,
                o = this,
                a = o.instance,
                s = o.opts.parentEl,
                r = [];o.$grid || (o.$grid = e('<div class="' + n + " " + n + "-" + o.opts.axis + '"></div>').appendTo(a.$refs.container.find(s).addBack().filter(s)), o.$grid.on("click", "li", function () {
                a.jumpTo(e(this).attr("data-index"));
            })), o.$list || (o.$list = e("<ul>").appendTo(o.$grid)), e.each(a.group, function (e, n) {
                t = n.opts.thumb || (n.opts.$thumb ? n.opts.$thumb.attr("src") : null), t || "image" !== n.type || (t = n.src), r.push('<li data-index="' + e + '" tabindex="0" class="' + i + '"' + (t && t.length ? ' style="background-image:url(' + t + ')" />' : "") + "></li>");
            }), o.$list[0].innerHTML = r.join(""), "x" === o.opts.axis && o.$list.width(parseInt(o.$grid.css("padding-right"), 10) + a.group.length * o.$list.children().eq(0).outerWidth(!0));
        }, focus: function focus(t) {
            var e,
                n,
                i = this,
                a = i.$list,
                s = i.$grid;i.instance.current && (e = a.children().removeClass(o).filter('[data-index="' + i.instance.current.index + '"]').addClass(o), n = e.position(), "y" === i.opts.axis && (n.top < 0 || n.top > a.height() - e.outerHeight()) ? a.stop().animate({ scrollTop: a.scrollTop() + n.top }, t) : "x" === i.opts.axis && (n.left < s.scrollLeft() || n.left > s.scrollLeft() + (s.width() - e.outerWidth())) && a.parent().stop().animate({ scrollLeft: n.left }, t));
        }, update: function update() {
            var t = this;t.instance.$refs.container.toggleClass("fancybox-show-thumbs", this.isVisible), t.isVisible ? (t.$grid || t.create(), t.instance.trigger("onThumbsShow"), t.focus(0)) : t.$grid && t.instance.trigger("onThumbsHide"), t.instance.update();
        }, hide: function hide() {
            this.isVisible = !1, this.update();
        }, show: function show() {
            this.isVisible = !0, this.update();
        }, toggle: function toggle() {
            this.isVisible = !this.isVisible, this.update();
        } }), e(t).on({ "onInit.fb": function onInitFb(t, e) {
            var n;e && !e.Thumbs && (n = new a(e), n.isActive && n.opts.autoStart === !0 && n.show());
        }, "beforeShow.fb": function beforeShowFb(t, e, n, o) {
            var i = e && e.Thumbs;i && i.isVisible && i.focus(o ? 0 : 250);
        }, "afterKeydown.fb": function afterKeydownFb(t, e, n, o, i) {
            var a = e && e.Thumbs;a && a.isActive && 71 === i && (o.preventDefault(), a.toggle());
        }, "beforeClose.fb": function beforeCloseFb(t, e) {
            var n = e && e.Thumbs;n && n.isVisible && n.opts.hideOnClose !== !1 && n.$grid.hide();
        } });
}(document, window.jQuery || jQuery), function (t, e) {
    "use strict";
    function n(t) {
        var e = { "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#39;", "/": "&#x2F;", "`": "&#x60;", "=": "&#x3D;" };return String(t).replace(/[&<>"'`=\/]/g, function (t) {
            return e[t];
        });
    }e.extend(!0, e.fancybox.defaults, { btnTpl: { share: '<button data-fancybox-share class="fancybox-button fancybox-button--share" title="{{SHARE}}"><svg viewBox="0 0 40 40"><path d="M6,30 C8,18 19,16 23,16 L23,16 L23,10 L33,20 L23,29 L23,24 C19,24 8,27 6,30 Z"></svg></button>' }, share: { url: function url(t, e) {
                return !t.currentHash && "inline" !== e.type && "html" !== e.type && (e.origSrc || e.src) || window.location;
            }, tpl: '<div class="fancybox-share"><h1>{{SHARE}}</h1><p><a class="fancybox-share__button fancybox-share__button--fb" href="https://www.facebook.com/sharer/sharer.php?u={{url}}"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m287 456v-299c0-21 6-35 35-35h38v-63c-7-1-29-3-55-3-54 0-91 33-91 94v306m143-254h-205v72h196" /></svg><span>Facebook</span></a><a class="fancybox-share__button fancybox-share__button--tw" href="https://twitter.com/intent/tweet?url={{url}}&text={{descr}}"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m456 133c-14 7-31 11-47 13 17-10 30-27 37-46-15 10-34 16-52 20-61-62-157-7-141 75-68-3-129-35-169-85-22 37-11 86 26 109-13 0-26-4-37-9 0 39 28 72 65 80-12 3-25 4-37 2 10 33 41 57 77 57-42 30-77 38-122 34 170 111 378-32 359-208 16-11 30-25 41-42z" /></svg><span>Twitter</span></a><a class="fancybox-share__button fancybox-share__button--pt" href="https://www.pinterest.com/pin/create/button/?url={{url}}&description={{descr}}&media={{media}}"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m265 56c-109 0-164 78-164 144 0 39 15 74 47 87 5 2 10 0 12-5l4-19c2-6 1-8-3-13-9-11-15-25-15-45 0-58 43-110 113-110 62 0 96 38 96 88 0 67-30 122-73 122-24 0-42-19-36-44 6-29 20-60 20-81 0-19-10-35-31-35-25 0-44 26-44 60 0 21 7 36 7 36l-30 125c-8 37-1 83 0 87 0 3 4 4 5 2 2-3 32-39 42-75l16-64c8 16 31 29 56 29 74 0 124-67 124-157 0-69-58-132-146-132z" fill="#fff"/></svg><span>Pinterest</span></a></p><p><input class="fancybox-share__input" type="text" value="{{url_raw}}" /></p></div>' } }), e(t).on("click", "[data-fancybox-share]", function () {
        var t,
            o,
            i = e.fancybox.getInstance(),
            a = i.current || null;a && ("function" === e.type(a.opts.share.url) && (t = a.opts.share.url.apply(a, [i, a])), o = a.opts.share.tpl.replace(/\{\{media\}\}/g, "image" === a.type ? encodeURIComponent(a.src) : "").replace(/\{\{url\}\}/g, encodeURIComponent(t)).replace(/\{\{url_raw\}\}/g, n(t)).replace(/\{\{descr\}\}/g, i.$caption ? encodeURIComponent(i.$caption.text()) : ""), e.fancybox.open({ src: i.translate(i, o), type: "html", opts: { animationEffect: !1, afterLoad: function afterLoad(t, e) {
                    i.$refs.container.one("beforeClose.fb", function () {
                        t.close(null, 0);
                    }), e.$content.find(".fancybox-share__links a").click(function () {
                        return window.open(this.href, "Share", "width=550, height=450"), !1;
                    });
                } } }));
    });
}(document, window.jQuery || jQuery), function (t, e, n) {
    "use strict";
    function o() {
        var t = e.location.hash.substr(1),
            n = t.split("-"),
            o = n.length > 1 && /^\+?\d+$/.test(n[n.length - 1]) ? parseInt(n.pop(-1), 10) || 1 : 1,
            i = n.join("-");return { hash: t, index: o < 1 ? 1 : o, gallery: i };
    }function i(t) {
        var e;"" !== t.gallery && (e = n("[data-fancybox='" + n.escapeSelector(t.gallery) + "']").eq(t.index - 1).trigger("click.fb-start"));
    }function a(t) {
        var e, n;return !!t && (e = t.current ? t.current.opts : t.opts, n = e.hash || (e.$orig ? e.$orig.data("fancybox") : ""), "" !== n && n);
    }n.escapeSelector || (n.escapeSelector = function (t) {
        var e = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\x80-\uFFFF\w-]/g,
            n = function n(t, e) {
            return e ? "\0" === t ? "�" : t.slice(0, -1) + "\\" + t.charCodeAt(t.length - 1).toString(16) + " " : "\\" + t;
        };return (t + "").replace(e, n);
    }), n(function () {
        n.fancybox.defaults.hash !== !1 && (n(t).on({ "onInit.fb": function onInitFb(t, e) {
                var n, i;e.group[e.currIndex].opts.hash !== !1 && (n = o(), i = a(e), i && n.gallery && i == n.gallery && (e.currIndex = n.index - 1));
            }, "beforeShow.fb": function beforeShowFb(n, o, i, s) {
                var r;i && i.opts.hash !== !1 && (r = a(o), r && (o.currentHash = r + (o.group.length > 1 ? "-" + (i.index + 1) : ""), e.location.hash !== "#" + o.currentHash && (o.origHash || (o.origHash = e.location.hash), o.hashTimer && clearTimeout(o.hashTimer), o.hashTimer = setTimeout(function () {
                    "replaceState" in e.history ? (e.history[s ? "pushState" : "replaceState"]({}, t.title, e.location.pathname + e.location.search + "#" + o.currentHash), s && (o.hasCreatedHistory = !0)) : e.location.hash = o.currentHash, o.hashTimer = null;
                }, 300))));
            }, "beforeClose.fb": function beforeCloseFb(n, o, i) {
                var s;i.opts.hash !== !1 && (s = a(o), o.currentHash && o.hasCreatedHistory ? e.history.back() : o.currentHash && ("replaceState" in e.history ? e.history.replaceState({}, t.title, e.location.pathname + e.location.search + (o.origHash || "")) : e.location.hash = o.origHash), o.currentHash = null, clearTimeout(o.hashTimer));
            } }), n(e).on("hashchange.fb", function () {
            var t,
                e = o();n.each(n(".fancybox-container").get().reverse(), function (e, o) {
                var i = n(o).data("FancyBox");if (i.currentHash) return t = i, !1;
            }), t ? !t.currentHash || t.currentHash === e.gallery + "-" + e.index || 1 === e.index && t.currentHash == e.gallery || (t.currentHash = null, t.close()) : "" !== e.gallery && i(e);
        }), setTimeout(function () {
            n.fancybox.getInstance() || i(o());
        }, 50));
    });
}(document, window, window.jQuery || jQuery), function (t, e) {
    "use strict";
    var n = new Date().getTime();e(t).on({ "onInit.fb": function onInitFb(t, e, o) {
            e.$refs.stage.on("mousewheel DOMMouseScroll wheel MozMousePixelScroll", function (t) {
                var o = e.current,
                    i = new Date().getTime();e.group.length < 2 || o.opts.wheel === !1 || "auto" === o.opts.wheel && "image" !== o.type || (t.preventDefault(), t.stopPropagation(), o.$slide.hasClass("fancybox-animated") || (t = t.originalEvent || t, i - n < 250 || (n = i, e[(-t.deltaY || -t.deltaX || t.wheelDelta || -t.detail) < 0 ? "next" : "previous"]())));
            });
        } });
}(document, window.jQuery || jQuery);
(function (factory) {

    if (typeof define === 'function' && define.amd) {

        // AMD. Register as an anonymous module.
        define([], factory);
    } else if ((typeof exports === "undefined" ? "undefined" : _typeof(exports)) === 'object') {

        // Node/CommonJS
        module.exports = factory();
    } else {

        // Browser globals
        window.wNumb = factory();
    }
})(function () {

    'use strict';

    var FormatOptions = ['decimals', 'thousand', 'mark', 'prefix', 'suffix', 'encoder', 'decoder', 'negativeBefore', 'negative', 'edit', 'undo'];

    // General

    // Reverse a string
    function strReverse(a) {
        return a.split('').reverse().join('');
    }

    // Check if a string starts with a specified prefix.
    function strStartsWith(input, match) {
        return input.substring(0, match.length) === match;
    }

    // Check is a string ends in a specified suffix.
    function strEndsWith(input, match) {
        return input.slice(-1 * match.length) === match;
    }

    // Throw an error if formatting options are incompatible.
    function throwEqualError(F, a, b) {
        if ((F[a] || F[b]) && F[a] === F[b]) {
            throw new Error(a);
        }
    }

    // Check if a number is finite and not NaN
    function isValidNumber(input) {
        return typeof input === 'number' && isFinite(input);
    }

    // Provide rounding-accurate toFixed method.
    // Borrowed: http://stackoverflow.com/a/21323330/775265
    function toFixed(value, exp) {
        value = value.toString().split('e');
        value = Math.round(+(value[0] + 'e' + (value[1] ? +value[1] + exp : exp)));
        value = value.toString().split('e');
        return (+(value[0] + 'e' + (value[1] ? +value[1] - exp : -exp))).toFixed(exp);
    }

    // Formatting

    // Accept a number as input, output formatted string.
    function formatTo(decimals, thousand, mark, prefix, suffix, encoder, decoder, negativeBefore, negative, edit, undo, input) {

        var originalInput = input,
            inputIsNegative,
            inputPieces,
            inputBase,
            inputDecimals = '',
            output = '';

        // Apply user encoder to the input.
        // Expected outcome: number.
        if (encoder) {
            input = encoder(input);
        }

        // Stop if no valid number was provided, the number is infinite or NaN.
        if (!isValidNumber(input)) {
            return false;
        }

        // Rounding away decimals might cause a value of -0
        // when using very small ranges. Remove those cases.
        if (decimals !== false && parseFloat(input.toFixed(decimals)) === 0) {
            input = 0;
        }

        // Formatting is done on absolute numbers,
        // decorated by an optional negative symbol.
        if (input < 0) {
            inputIsNegative = true;
            input = Math.abs(input);
        }

        // Reduce the number of decimals to the specified option.
        if (decimals !== false) {
            input = toFixed(input, decimals);
        }

        // Transform the number into a string, so it can be split.
        input = input.toString();

        // Break the number on the decimal separator.
        if (input.indexOf('.') !== -1) {
            inputPieces = input.split('.');

            inputBase = inputPieces[0];

            if (mark) {
                inputDecimals = mark + inputPieces[1];
            }
        } else {

            // If it isn't split, the entire number will do.
            inputBase = input;
        }

        // Group numbers in sets of three.
        if (thousand) {
            inputBase = strReverse(inputBase).match(/.{1,3}/g);
            inputBase = strReverse(inputBase.join(strReverse(thousand)));
        }

        // If the number is negative, prefix with negation symbol.
        if (inputIsNegative && negativeBefore) {
            output += negativeBefore;
        }

        // Prefix the number
        if (prefix) {
            output += prefix;
        }

        // Normal negative option comes after the prefix. Defaults to '-'.
        if (inputIsNegative && negative) {
            output += negative;
        }

        // Append the actual number.
        output += inputBase;
        output += inputDecimals;

        // Apply the suffix.
        if (suffix) {
            output += suffix;
        }

        // Run the output through a user-specified post-formatter.
        if (edit) {
            output = edit(output, originalInput);
        }

        // All done.
        return output;
    }

    // Accept a sting as input, output decoded number.
    function formatFrom(decimals, thousand, mark, prefix, suffix, encoder, decoder, negativeBefore, negative, edit, undo, input) {

        var originalInput = input,
            inputIsNegative,
            output = '';

        // User defined pre-decoder. Result must be a non empty string.
        if (undo) {
            input = undo(input);
        }

        // Test the input. Can't be empty.
        if (!input || typeof input !== 'string') {
            return false;
        }

        // If the string starts with the negativeBefore value: remove it.
        // Remember is was there, the number is negative.
        if (negativeBefore && strStartsWith(input, negativeBefore)) {
            input = input.replace(negativeBefore, '');
            inputIsNegative = true;
        }

        // Repeat the same procedure for the prefix.
        if (prefix && strStartsWith(input, prefix)) {
            input = input.replace(prefix, '');
        }

        // And again for negative.
        if (negative && strStartsWith(input, negative)) {
            input = input.replace(negative, '');
            inputIsNegative = true;
        }

        // Remove the suffix.
        // https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/slice
        if (suffix && strEndsWith(input, suffix)) {
            input = input.slice(0, -1 * suffix.length);
        }

        // Remove the thousand grouping.
        if (thousand) {
            input = input.split(thousand).join('');
        }

        // Set the decimal separator back to period.
        if (mark) {
            input = input.replace(mark, '.');
        }

        // Prepend the negative symbol.
        if (inputIsNegative) {
            output += '-';
        }

        // Add the number
        output += input;

        // Trim all non-numeric characters (allow '.' and '-');
        output = output.replace(/[^0-9\.\-.]/g, '');

        // The value contains no parse-able number.
        if (output === '') {
            return false;
        }

        // Covert to number.
        output = Number(output);

        // Run the user-specified post-decoder.
        if (decoder) {
            output = decoder(output);
        }

        // Check is the output is valid, otherwise: return false.
        if (!isValidNumber(output)) {
            return false;
        }

        return output;
    }

    // Framework

    // Validate formatting options
    function validate(inputOptions) {

        var i,
            optionName,
            optionValue,
            filteredOptions = {};

        if (inputOptions['suffix'] === undefined) {
            inputOptions['suffix'] = inputOptions['postfix'];
        }

        for (i = 0; i < FormatOptions.length; i += 1) {

            optionName = FormatOptions[i];
            optionValue = inputOptions[optionName];

            if (optionValue === undefined) {

                // Only default if negativeBefore isn't set.
                if (optionName === 'negative' && !filteredOptions.negativeBefore) {
                    filteredOptions[optionName] = '-';
                    // Don't set a default for mark when 'thousand' is set.
                } else if (optionName === 'mark' && filteredOptions.thousand !== '.') {
                    filteredOptions[optionName] = '.';
                } else {
                    filteredOptions[optionName] = false;
                }

                // Floating points in JS are stable up to 7 decimals.
            } else if (optionName === 'decimals') {
                if (optionValue >= 0 && optionValue < 8) {
                    filteredOptions[optionName] = optionValue;
                } else {
                    throw new Error(optionName);
                }

                // These options, when provided, must be functions.
            } else if (optionName === 'encoder' || optionName === 'decoder' || optionName === 'edit' || optionName === 'undo') {
                if (typeof optionValue === 'function') {
                    filteredOptions[optionName] = optionValue;
                } else {
                    throw new Error(optionName);
                }

                // Other options are strings.
            } else {

                if (typeof optionValue === 'string') {
                    filteredOptions[optionName] = optionValue;
                } else {
                    throw new Error(optionName);
                }
            }
        }

        // Some values can't be extracted from a
        // string if certain combinations are present.
        throwEqualError(filteredOptions, 'mark', 'thousand');
        throwEqualError(filteredOptions, 'prefix', 'negative');
        throwEqualError(filteredOptions, 'prefix', 'negativeBefore');

        return filteredOptions;
    }

    // Pass all options as function arguments
    function passAll(options, method, input) {
        var i,
            args = [];

        // Add all options in order of FormatOptions
        for (i = 0; i < FormatOptions.length; i += 1) {
            args.push(options[FormatOptions[i]]);
        }

        // Append the input, then call the method, presenting all
        // options as arguments.
        args.push(input);
        return method.apply('', args);
    }

    function wNumb(options) {

        if (!(this instanceof wNumb)) {
            return new wNumb(options);
        }

        if ((typeof options === "undefined" ? "undefined" : _typeof(options)) !== "object") {
            return;
        }

        options = validate(options);

        // Call 'formatTo' with proper arguments.
        this.to = function (input) {
            return passAll(options, formatTo, input);
        };

        // Call 'formatFrom' with proper arguments.
        this.from = function (input) {
            return passAll(options, formatFrom, input);
        };
    }

    return wNumb;
});