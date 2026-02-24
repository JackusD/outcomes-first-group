import { GradientAnimation } from "../classes/GradientAnimation";


(() => {
    const initSiteTopGradient = () => {
        const $siteTopGradient = document.querySelector('.site-top-gradient__inner');

        if (!$siteTopGradient) return;

        new GradientAnimation($siteTopGradient);
    }

    initSiteTopGradient();
})();
