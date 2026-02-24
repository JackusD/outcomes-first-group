export function isTouchEnabled() {
    return ( 'ontouchstart' in window ) ||
           ( navigator.maxTouchPoints > 0 ) ||
           ( navigator.msMaxTouchPoints > 0 );
}

export function enableBodyScroll() {
    document.body.classList.remove('no-scroll');
    document.body.style.width = '';
};

export function disableBodyScroll() {
    document.body.style.width = document.body.clientWidth + 'px';
    document.body.classList.add('no-scroll');
};
