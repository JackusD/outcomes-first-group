(() => {
    const $siteHeader = document.querySelector('.site-header__inner');
    
    let winWidth = window.innerWidth;

    const setBodyWidthVar = () => {
        document.documentElement.style.setProperty('--body-width', `${document.body.offsetWidth}px`);
    };
    
    const setBodyHeightVar = () => {
        document.documentElement.style.setProperty('--body-height', `${document.body.offsetHeight}px`);
    };
    
    const setScreenHeightVar = () => {
        document.documentElement.style.setProperty('--screen-height', `${window.innerHeight}px`);
    };
    
    const setScreenHeightResizeVar = () => {
        document.documentElement.style.setProperty('--screen-height-resize', `${window.innerHeight}px`);
    };

    const setSiteHeaderVar = () => {
        document.documentElement.style.setProperty('--site-header-height', `${($siteHeader?.offsetHeight ?? 0)}px`);
    };

    const setAdminBarHeightVar = () => {
        const $wpadminbar = document.querySelector('#wpadminbar');

        const topPos = $wpadminbar?.offsetHeight && window.innerHeight ? $wpadminbar?.offsetHeight : 0;

        document.documentElement.style.setProperty('--admin-bar-height', `${topPos}px`);
    };

    const setContainerPaddingOffsetVar = () => {
        let containerPaddingOffset = 16;

        if (window.innerWidth >= 375) {
            containerPaddingOffset = 20;
        }
        
        if (window.innerWidth >= 768) {
            containerPaddingOffset = 32;
        }
        
        if (window.innerWidth >= 1024) {
            containerPaddingOffset = 64;
        }
        
        if (window.innerWidth >= 1440) {
            containerPaddingOffset = ((document.body.offsetWidth - 1440) / 2) + 100;
        }

        document.documentElement.style.setProperty('--container-padding-offset', `${containerPaddingOffset}px`);
    };

    const setContainerInnerWidthVar = () => {
        let containerPaddingOffset = 16;

        if (window.innerWidth >= 375) {
            containerPaddingOffset = 20;
        }
        
        if (window.innerWidth >= 768) {
            containerPaddingOffset = 32;
        }
        
        if (window.innerWidth >= 1024) {
            containerPaddingOffset = 64;
        }
        
        if (window.innerWidth >= 1440) {
            containerPaddingOffset = ((document.body.offsetWidth - 1440) / 2) + 100;
        }

        document.documentElement.style.setProperty('--container-inner-width', `${document.body.offsetWidth - containerPaddingOffset * 2}px`);
    };

    const setContainerOffsetVar = () => {
        let containerOffset = 0;

        if (window.innerWidth >= 1440) {
            containerOffset = (document.body.offsetWidth - 1440) / 2;
        }

        document.documentElement.style.setProperty('--container-offset', `${containerOffset}px`);
    };

    window.addEventListener('load', () => {
        setBodyWidthVar();
        setBodyHeightVar();
        setScreenHeightVar();
        setScreenHeightResizeVar();
        setSiteHeaderVar();
        setAdminBarHeightVar();
        setContainerPaddingOffsetVar();
        setContainerInnerWidthVar();
        setContainerOffsetVar();
    });

    window.addEventListener('resize', () => {
        setBodyWidthVar();
        setBodyHeightVar();
        setScreenHeightResizeVar();
        setSiteHeaderVar();
        setAdminBarHeightVar();
        setContainerPaddingOffsetVar();
        setContainerInnerWidthVar();
        setContainerOffsetVar();
        
        if (winWidth !== window.innerWidth) {
            setScreenHeightVar();
        }

        winWidth = window.innerWidth;
    });

    setBodyWidthVar();
    setBodyHeightVar();
    setScreenHeightVar();
    setScreenHeightResizeVar();
    setSiteHeaderVar();
    setAdminBarHeightVar();
    setContainerPaddingOffsetVar();
    setContainerInnerWidthVar();
    setContainerOffsetVar();
})();
