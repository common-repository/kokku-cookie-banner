/**
 * Cookie Consent Banner JS functionalities
 */
import CookieManager from './cookie-manager';

// Define variables
const cookieBanner = document.getElementById("kokku-cookie-banner");
const gtmIDElement = document.getElementById("kokku-cookie-banner__gtm-id");
const gtmID = gtmIDElement.value;
const marketingCheckbox = document.getElementById("marketing-cookies");
const statisticsCheckbox = document.getElementById("statistics-cookies");
const categorisedCheckbox = document.getElementById("categorised-cookies");
const cookieBannerSettings = document.getElementById("kokku-cookie-banner__settings");
const cookieBannerOptions = document.querySelector(".kokku-cookie-banner__options");
const cookieBannerSelected = document.getElementById("kokku-cookie-banner__accept-selected");
const cookieBannerAll = document.getElementById("kokku-cookie-banner__accept-all");
const cookieSettingsLinks = document.querySelectorAll('.kokku-cookie-banner__link');

// Initialize cookie manager
let cookieManager = new CookieManager(cookieBanner, gtmID, marketingCheckbox, statisticsCheckbox, categorisedCheckbox);
cookieManager.init();

// Bind event for click on settings button if presents
if (cookieBannerSettings) {
    cookieBannerSettings.addEventListener("click", (e) => {
        cookieBannerOptions.classList.toggle("d-none");
        e.target.classList.add("d-none");
        cookieBannerSelected.classList.remove("d-none");
    });
}

// Bind event for click on accept selected button if presents
if (cookieBannerSelected) {
    cookieBannerSelected.addEventListener("click", () => {
        // set cookies
        cookieManager.marketingCookieEnabled = marketingCheckbox && marketingCheckbox.checked;
        cookieManager.statisticsCookieEnabled = statisticsCheckbox && statisticsCheckbox.checked;
        cookieManager.categorisedCookieEnabled = categorisedCheckbox && categorisedCheckbox.checked;
        cookieManager.setCookies();

        // update cookie banner display
        cookieManager.updateCookieBannerDisplay();

        // fire gtm event
        cookieManager.fireGTM();
    });
}

// Bind event for click on accept all button if presents
if (cookieBannerAll) {
    cookieBannerAll.addEventListener("click", () => {
        // set cookies
        cookieManager.marketingCookieEnabled = true;
        cookieManager.statisticsCookieEnabled = true;
        cookieManager.categorisedCookieEnabled = true;
        cookieManager.setCookies();

        // update cookie banner display
        cookieManager.updateCookieBannerDisplay();

        // fire gtm event
        cookieManager.fireGTM();
    });
}

// Bind event for click on cookie settings links if present
cookieSettingsLinks.forEach(cookieSettingsLink => {
    if (cookieSettingsLink) {
        cookieSettingsLink.addEventListener("click", (e) => {
            e.preventDefault();
            cookieManager.removeCookies(['hide-cookie-banner']);
            cookieManager.updateCookieBannerDisplay();
        });
    }
});
