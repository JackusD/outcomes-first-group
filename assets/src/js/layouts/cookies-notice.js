import { closeModal } from '../common/modals';
import Cookies from 'js-cookie';

(() => {
    const $siteFooterBottomSpacer = document.querySelector('.site-footer-bottom-spacer');
    const $cookiesNotice = document.querySelector('.cookies-notice');
    const $cookiesModal = document.querySelector('.cookies-notice-options');
    const $acceptAllBtn = document.querySelector('.cookies-notice__accept-all-btn');
    const $rejectAllBtn = document.querySelector('.cookies-notice__reject-all-btn');
    const $cookiesForm = document.querySelector('.cookies-notice__form');

    if (!$cookiesNotice) return;

    const siteFooterCookiesNoticePadding = () => {
        if (!$siteFooterBottomSpacer) return;

        $siteFooterBottomSpacer.style.paddingBottom = `${$cookiesNotice?.classList?.contains('cookies-notice--hide') ? 0 : $cookiesNotice?.clientHeight}px`;
    };

    const initAnalyticalCode = cookieConsent => {
        let cookieConsentAccepted = cookieConsent ? cookieConsent : (Cookies.get('cookieConsent') ? JSON.parse(Cookies.get('cookieConsent'))?.analytical : false);

        if (!cookieConsentAccepted) return;

        if (typeof analyticalScripts !== 'undefined') {
            analyticalScripts();
        }
        
        if (typeof pageAnalyticalScripts !== 'undefined') {
            pageAnalyticalScripts();
        }
    }

    const acceptCookies = (allowNecessaryCookies, allowAnalyticalCookies, allowMarketingCookies) => {
        if (!allowNecessaryCookies) {
            Cookies.remove('cookieConsent');
            return;
        }

        Cookies.set('cookieConsent', JSON.stringify({ 
            necessary: allowNecessaryCookies ? true : false,
            analytical: allowAnalyticalCookies ? true : false,
            marketing: allowMarketingCookies ? true : false
        }), { expires: 365 });

        $cookiesNotice.classList.add('cookies-notice--hide');

        initAnalyticalCode(allowAnalyticalCookies ? true : false);

        setTimeout(() => {
            $cookiesNotice.parentNode.removeChild($cookiesNotice);
        }, 500);
    };

    const displayCookieConsentNotice = () => {
        if (window.scrollY === 0) return;

        const cookieConsent = Cookies.get('cookieConsent') ? JSON.parse(Cookies.get('cookieConsent')) : null;

        if (!cookieConsent || !cookieConsent.necessary) {
            $cookiesNotice.classList.remove('cookies-notice--hide');
            siteFooterCookiesNoticePadding();
        }

        window.removeEventListener('scroll', displayCookieConsentNotice);
    };

    if ($acceptAllBtn) {
        $acceptAllBtn.addEventListener('click', () => {
            acceptCookies(true, true, true);

            siteFooterCookiesNoticePadding();
        });
    }

    if ($rejectAllBtn) {
        $rejectAllBtn.addEventListener('click', () => {
            acceptCookies(true, false, false);

            siteFooterCookiesNoticePadding();
        });
    }

    if ($cookiesForm) {
        $cookiesForm.addEventListener('submit', e => {
            e.preventDefault();

            const necessaryCookies = e.target.querySelector('input[name="necessary-cookies"]');
            const analyticalCookies = e.target.querySelector('input[name="analytical-cookies"]');
            const marketingCookies = e.target.querySelector('input[name="marketing-cookies"]');

            acceptCookies(necessaryCookies?.checked, analyticalCookies?.checked, marketingCookies?.checked);

            if ($cookiesModal) {
                closeModal($cookiesModal);
            }

            siteFooterCookiesNoticePadding();
        });
    }

    window.addEventListener('resize', () => {
        siteFooterCookiesNoticePadding();
    });

    window.addEventListener('scroll', displayCookieConsentNotice);

    initAnalyticalCode();
})();
