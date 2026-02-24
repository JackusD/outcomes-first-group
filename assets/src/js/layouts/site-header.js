(() => {
    const $siteHeader = document.querySelector('.site-header');

    let lastScrollPos = window.scrollY;

    const initSiteHeader = () => {
        const $firstBlock = document.querySelector('.block');

        if (!$siteHeader) return;

        if ($firstBlock && $firstBlock.classList.contains('background-color-black')) {
            $siteHeader.classList.add('site-header--white');
        }

        setTimeout(() => {
            $siteHeader.classList.add('site-header--initiated');
        }, 300);
    };

    const initSiteHeaderBackground = () => {
        if (!$siteHeader) return;

        if (window.scrollY === 0) {
            $siteHeader.classList.remove('site-header--scrolled');
        } else {
            $siteHeader.classList.add('site-header--scrolled');
        }
    };

    const toggleSiteHeader = () => {
        if (window.scrollY > lastScrollPos) {
            $siteHeader.classList.add('site-header--hide');

            lastScrollPos = window.scrollY;
        };
        
        if (window.scrollY === 0 || window.scrollY < lastScrollPos - 100) {
            $siteHeader.classList.remove('site-header--hide');

            lastScrollPos = window.scrollY;
        };
    };

    window.addEventListener('scroll', () => {
        initSiteHeaderBackground();
        toggleSiteHeader();
    });

    initSiteHeaderBackground();
    initSiteHeader();
})();
