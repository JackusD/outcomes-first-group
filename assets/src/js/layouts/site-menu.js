(() => {
    const $siteHeader = document.querySelector('.site-header');

    const initSiteNavDropdowns = () => {
        const $siteMenuModalSubMenuWraps = document.querySelectorAll('.site-menu .menu-item-has-children');

        if ($siteMenuModalSubMenuWraps.length) {
            $siteMenuModalSubMenuWraps.forEach($subMenuWrap => {
                const $subMenuWrapBtn = $subMenuWrap.querySelector('a');
                const $subMenu = $subMenuWrap.querySelector('.sub-menu-dropdown');
                const $subMenuInner = $subMenu.querySelector('.sub-menu-dropdown__inner');

                const showSubMenu = () => {
                    $subMenu.style.height = `${$subMenuInner.offsetHeight}px`;
                    $subMenuWrap.classList.add('menu-item--active');

                    if ($siteHeader) {
                        setTimeout(() => {
                            $siteHeader.classList.add('site-header--sub-menu-active');
                        }, 1);
                    }

                    setTimeout(() => {
                        $subMenu.style.height = '';
                    }, 300);
                };

                const hideSubMenu = () => {
                    $subMenu.style.height = `${$subMenuInner.offsetHeight}px`;
                    $subMenuWrap.classList.remove('menu-item--active');
                    $activeChildSubMenus = $subMenuInner.querySelectorAll('.menu-item--active');

                    if ($siteHeader) {
                        $siteHeader.classList.remove('site-header--sub-menu-active');
                    }

                    setTimeout(() => {
                        $subMenu.style.height = '';
                    }, 10);

                    setTimeout(() => {
                        if ($activeChildSubMenus && !$subMenuWrap.classList.contains('menu-item--active')) {
                            $activeChildSubMenus.forEach($activeChildSubMenu => {
                                $activeChildSubMenu.classList.remove('menu-item--active');
                            });
                        }
                    }, 300);
                };

                $subMenuWrapBtn.addEventListener('click', e => {
                    e.preventDefault();

                    $subMenuWrapBtn.removeEventListener('mouseleave', () => {
                        hideSubMenu();
                    });

                    if ($subMenuWrap.classList.contains('menu-item--active')) {
                        hideSubMenu();
                    } else {
                        showSubMenu();
                    }
                });
            });
        }
    };

    initSiteNavDropdowns();
})();
