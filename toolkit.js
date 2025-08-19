var threatmetrix = threatmetrix || {};
threatmetrix.version = 1, threatmetrix.load_when_ready = function(t, e, r, n, i) {
    if (void 0 !== e && void 0 !== r && void 0 !== n) {
        var a, o = "WebkitAppearance" in document.documentElement.style;
        if (!document.body || "complete" !== document.readyState && o)
            if ((a = "undefined" != typeof window && "unknown" != typeof window && null !== window ? window : document.body).addEventListener) a.addEventListener("load", function() {
                t(e, r, n, i)
            }, !1);
            else if (a.attachEvent) a.attachEvent("onload", function() {
            t(e, r, n, i)
        });
        else {
            var c = a.onload;
            a.onload = new function() {
                var o = !0;
                null !== c && "function" == typeof c && (o = c());
                return setTimeout(function() {
                    t(e, r, n, i)
                }, 200), a.onload = c, o
            }
        } else t(e, r, n, i)
    }
}, threatmetrix.create_url = function(t, e, r, n, i) {
    function a() {
        return Math.floor(2742745743359 * Math.random())
    }

    function o() {
        return c(a())
    }

    function c(t) {
        return (t + 78364164096).toString(36)
    }
    var u = a(),
        m = a(),
        d = 885187064159;
    m = ((m = m - m % 256 + threatmetrix.version) + u) % 2742745743359, d = (d + u) % 2742745743359;
    var l = "https://" + t + "/" + (u = o() + c(u)) + e,
        s = [(m = c(d) + c(m)) + "=" + r, o() + o() + "=" + n];
    return void 0 !== i && i.length > 0 && s.push(o() + o() + "=" + i), l + "?" + s.join("&")
}, threatmetrix.beacon = function(t, e, r, n) {
    var i = "turn:aa.online-metrix.net?transport=",
        a = threatmetrix.version + ":" + e + ":" + r,
        o = {
            iceServers: [{
                urls: i + "tcp",
                username: a,
                credential: r
            }, {
                urls: i + "udp",
                username: a,
                credential: r
            }]
        };
    try {
        var c = new RTCPeerConnection(o);
        c.createDataChannel("");
        var u = function() {};
        c.createOffer(function(t) {
            c.setLocalDescription(t, u, u)
        }, u)
    } catch (t) {}
}, threatmetrix.load_tags = function(t, e, r, n) {
    threatmetrix.beacon(t, e, r, n);
    var i = document.getElementsByTagName("head").item(0),
        a = document.createElement("script");
    a.setAttribute("type", "text/javascript");
    var o = threatmetrix.create_url(t, ".js", e, r, n);
    a.setAttribute("src", o), threatmetrix.set_csp_nonce(a), i.appendChild(a)
}, threatmetrix.load_iframe_tags = function(t, e, r, n) {
    threatmetrix.beacon(t, e, r, n);
    var i = threatmetrix.create_url(t, ".htm", e, r, n),
        a = document.createElement("iframe");
    a.title = "empty", a.width = "0", a.height = "0", a.setAttribute("style", "color:rgba(0,0,0,0); float:left; position:absolute; top:-200; left:-200; border:0px"), a.setAttribute("src", i), document.body.appendChild(a)
}, threatmetrix.csp_nonce = null, threatmetrix.register_csp_nonce = function(t) {
    if (void 0 !== t.currentScript && null !== t.currentScript) {
        var e = t.currentScript.getAttribute("nonce");
        void 0 !== e && null !== e && "" !== e ? threatmetrix.csp_nonce = e : void 0 !== t.currentScript.nonce && null !== t.currentScript.nonce && "" !== t.currentScript.nonce && (threatmetrix.csp_nonce = t.currentScript.nonce)
    }
}, threatmetrix.set_csp_nonce = function(t) {
    null !== threatmetrix.csp_nonce && (t.setAttribute("nonce", threatmetrix.csp_nonce), t.getAttribute("nonce") !== threatmetrix.csp_nonce && (t.nonce = threatmetrix.csp_nonce))
}, threatmetrix.profile = function(t, e, r, n) {
    threatmetrix.register_csp_nonce(document), threatmetrix.load_when_ready(threatmetrix.load_tags, t, e, r, n)
}, threatmetrix.profile_iframe = function(t, e, r, n) {
    threatmetrix.register_csp_nonce(document), threatmetrix.load_when_ready(threatmetrix.load_iframe_tags, t, e, r, n)
};