(() => {
    let winWidth = null;

    const setScreenHeights = () => {
        const $fullHeightEls = document.querySelectorAll('.full-height');
        const $fixedHeight = document.querySelectorAll('.fixed-height');
        const $maxHeightEls = document.querySelectorAll('.max-height');
        const $maxFullHeightEls = document.querySelectorAll('.max-full-height');

        if ($fullHeightEls.length) {
            if (winWidth !== window.innerWidth) {
                $fullHeightEls.forEach($el => {
                    $el.style.minHeight = `${window.innerHeight}px`;
                });
            }
        }

        if ($fixedHeight.length) {
            if (winWidth !== window.innerWidth) {
                $fixedHeight.forEach($el => {
                    
                    $el.style.height = '';
                    
                    setTimeout(() => {
                        $el.style.height = `${$el.offsetHeight}px`;
                    }, 10);
                });
            }
        }

        if ($maxHeightEls.length) {
            if (winWidth !== window.innerWidth) {
                $maxHeightEls.forEach($el => {
                    const viewportFraction = $el.dataset.viewportFraction ? parseFloat($el.dataset.viewportFraction) : 1;
                    
                    $el.style.maxHeight = `${window.innerHeight * viewportFraction}px`;
                });
            }
        }

        if ($maxFullHeightEls.length) {
            if (winWidth !== window.innerWidth) {
                $maxFullHeightEls.forEach($el => {
                    $el.style.maxHeight = `${window.innerHeight}px`;
                });
            }
        }
    }

    window.addEventListener('resize', () => {
        setScreenHeights();

        winWidth = window.innerWidth;
    });

    setScreenHeights();
})();
