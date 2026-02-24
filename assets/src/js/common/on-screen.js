let $onScreen = document.querySelectorAll('.on-screen');

const onScreenEvent = new CustomEvent('onScreen', {
    detail: {},
    bubbles: true,
    cancelable: true,
    composed: false
});

const offScreenEvent = new CustomEvent('offScreen', {
    detail: {},
    bubbles: true,
    cancelable: true,
    composed: false
});

const setTransitionDelays = () => {
    $onScreen.forEach($el => {
        const $onScreenTransitionEls = $el.querySelectorAll('[data-on-screen-transition-delay]');

        $onScreenTransitionEls.forEach($onScreenTransitionEl => {
            const onScreenTransitionDelay = $onScreenTransitionEl?.dataset?.onScreenTransitionDelay ? 
                JSON.parse($onScreenTransitionEl.dataset.onScreenTransitionDelay) : null;

            if (!onScreenTransitionDelay) return;

            if (typeof onScreenTransitionDelay === 'number') {
                $onScreenTransitionEl.style.transitionDelay = `${onScreenTransitionDelay}s`;
            }

            if (typeof onScreenTransitionDelay === 'object') {
                for (const key in onScreenTransitionDelay) {
                    if (window.innerWidth < parseInt(key)) continue;

                    $onScreenTransitionEl.style.transitionDelay = `${onScreenTransitionDelay[key]}s`;
                }
            }
        });
    });
}
    
export function checkOnScreenEls() {
    const $onScreen = document.querySelectorAll('.on-screen');

    $onScreen.forEach($el => {
        const $onScreenTransitionEls = $el.querySelectorAll('[data-on-screen-transition-delay]');

        if ($el.getBoundingClientRect().top <= (window.innerHeight * 0.95) || 
            (window.scrollY + window.innerHeight) >= document.body.scrollHeight) {

            if ($el.classList.contains('is-on-screen')) return;

            setTransitionDelays();

            $el.classList.add('is-on-screen');

            $el.dispatchEvent(onScreenEvent);
        } else {
            if (!$el.classList.contains('is-on-screen')) return;

            $onScreenTransitionEls.forEach($onScreenTransitionEl => {
                $onScreenTransitionEl.style.transitionDelay = '';
            });

            $el.classList.remove('is-on-screen');

            $el.dispatchEvent(offScreenEvent);
        }
    });
}

(() => {
    if (!$onScreen.length) return;

    window.addEventListener('scroll', () => {
        checkOnScreenEls();
    });

    window.addEventListener('load', () => {
        checkOnScreenEls();
    });

    window.addEventListener('resize', () => {
        setTransitionDelays();
    });
    
    setTransitionDelays();
    checkOnScreenEls();
})();
