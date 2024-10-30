import Cookies from 'js-cookie';

/**
 * @class CookieManager
 * @description Class for managing cookies
 * @author Kokku <tech@kokku.com>
 * @version 1.8.7
 * @since 1.8.7
 */
class CookieManager {
    constructor(cookieBanner, gtmID, marketingCheckbox, statisticsCheckbox, categorisedCheckbox) {
        this.cookieBanner = cookieBanner;
        this.gtmID = gtmID;
        this.marketingCookieEnabled = false;
        this.statisticsCookieEnabled = false;
        this.categorisedCookieEnabled = false;

        this.marketingCheckbox = marketingCheckbox;
        this.statisticsCheckbox = statisticsCheckbox;
        this.categorisedCheckbox = categorisedCheckbox;
    }

    init() {
        // Check if Cookies object exists
        if (typeof Cookies !== "object") {
            console.log('Cookie library not found')
            return;
        }

        // Check if cookie banner markup presents
        if (!this.cookieBanner) {
            console.log('Cookie banner markup not found')
            return;
        }

        // Update cookie banner display
        this.updateCookieBannerDisplay();

        // Fire google tag manager when necessary cookie is set
        if (this.getCookie("tracking-opt-in") === "true") {
            this.fireGTM();
        }
    }

    setCookies() {
        const marketingCookie = this.marketingCookieEnabled ? "true" : "false";
        const statisticsCookie = this.statisticsCookieEnabled ? "true" : "false";
        const categorisedCookie = this.categorisedCookieEnabled ? "true" : "false";

        // Always set necessary cookie for tracking to be enabled
        Cookies.set("tracking-opt-in", "true", { expires: 365 });

        // Set optional cookies if checkbox is checked
        Cookies.set("mark-tra-opt-in", marketingCookie, { expires: 365 });
        Cookies.set("sta-tra-opt-in", statisticsCookie, { expires: 365 });
        Cookies.set("cat-tra-opt-in", categorisedCookie, { expires: 365 });

        // Set cookie to hide cookie banner
        Cookies.set("hide-cookie-banner", "true", { expires: 365 });
    }

    removeCookies(cookies) {
        cookies.forEach(cookie => {
            Cookies.remove(cookie);
        });
    }

    getCookie(cookieKey) {
        return Cookies.get(cookieKey);;
    }

    updateCookieBannerDisplay() {
        // Show or hide cookie banner based on one cookie setting
        if (Cookies.get("hide-cookie-banner") === "true") {
            this.cookieBanner.style.display = "none";
            document.body.classList.remove("kokku-cookie-banner-active");
        } else {
            this.cookieBanner.style.display = "block";
            document.body.classList.add("kokku-cookie-banner-active");
        }

        // Mark optional cookie checkboxes as checked or unchecked
        if (this.marketingCheckbox !== null) {
            this.marketingCheckbox.checked = Cookies.get("mark-tra-opt-in") === "true";
        }

        if (this.statisticsCheckbox !== null) {
            this.statisticsCheckbox.checked = Cookies.get("sta-tra-opt-in") === "true";
        }

        if (this.categorisedCheckbox !== null) {
            this.categorisedCheckbox.checked = Cookies.get("cat-tra-opt-in") === "true";
        }
    }

    fireGTM() {
        console.log("Firing Google Tag Manager");
        (function (w, d, s, l, i, x) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });

            var f = d.getElementsByTagName(s)[0],
                e = d.getElementById(x),
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';

            if (e !== null) {
                e.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            } else {
                j.async = true;
                j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                j.id = x;
                f.parentNode.insertBefore(j, f);
            }
        })(window, document, 'script', 'dataLayer', this.gtmID, 'gtm-script');
    }
}

export default CookieManager;