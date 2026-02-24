import { enableBodyScroll, disableBodyScroll } from '../common/helpers';

const modalOpenEvent = new CustomEvent('modalopen', {
    detail: {},
    bubbles: true,
    cancelable: true,
    composed: false
});

const modalCloseEvent = new CustomEvent('modalclose', {
    detail: {},
    bubbles: true,
    cancelable: true,
    composed: false
});

const modalAfterOpenEvent = new CustomEvent('modalafteropen', {
    detail: {},
    bubbles: true,
    cancelable: true,
    composed: false
});

const modalAfterCloseEvent = new CustomEvent('modalafterclose', {
    detail: {},
    bubbles: true,
    cancelable: true,
    composed: false
});

export function closeModal($modal) {
    if (!$modal) return;

    $modal.dispatchEvent(modalCloseEvent);

    const { modalBtns } = $modal.dataset;

    const $modalToggleBtns = $modal.dataset?.modalToggleBtn ? document.querySelectorAll($modal.dataset.modalToggleBtn) : false;

    $modal.classList.remove('modal--active');

    enableBodyScroll();

    if (modalBtns) {
        const $modalBtns = document.querySelectorAll(modalBtns);

        $modalBtns?.forEach($modalBtn => {
            $modalBtn.classList.remove('modal-is-open');

            $modalBtn.setAttribute('aria-expanded', 'false');
        });
    }

    if ($modalToggleBtns.length) {
        $modalToggleBtns.forEach($modalToggleBtn => {
            $modalToggleBtn.classList.remove('modal--active');
            $modalToggleBtn.ariaExpanded = false;
        });
    }

    $modal.dispatchEvent(modalAfterCloseEvent);
}

export function openModal($modal) {
    if (!$modal) return;

    $modal.dispatchEvent(modalOpenEvent);

    const { modalBtns } = $modal.dataset;

    const $modalToggleBtns = $modal.dataset?.modalToggleBtn ? document.querySelectorAll($modal.dataset.modalToggleBtn) : false;

    $modal.classList.add('modal--active');

    disableBodyScroll();

    if (modalBtns) {
        const $modalBtns = document.querySelectorAll(modalBtns);

        $modalBtns?.forEach($modalBtn => {
            $modalBtn.classList.add('modal-is-open');

            $modalBtn.setAttribute('aria-expanded', 'true');
        });
    }

    if ($modalToggleBtns.length) {
        $modalToggleBtns.forEach($modalToggleBtn => {
            $modalToggleBtn.classList.add('modal--active');
            $modalToggleBtn.ariaExpanded = true;
        });
    }

    const $modalFocusEl = $modal.querySelector('a[href], button, input:not([type="hidden"]), textarea, select, details,[tabindex]:not([tabindex="-1"])');

    if ($modalFocusEl) {
        $modalFocusEl.focus();
    }

    const escapeListener = e => {
        if (e.key !== 'Escape') return;

        closeModal($modal);

        document.removeEventListener('keyup', escapeListener);
    };

    document.addEventListener('keyup', escapeListener);

    $modal.dispatchEvent(modalAfterOpenEvent);
};

export function initModals() {
    const $modalToggleBtns = document.querySelectorAll('.modal-open, .modal-close');
    const $modalResize = document.querySelectorAll('.modal, .modal-resize');

    if ($modalToggleBtns.length) {
        $modalToggleBtns.forEach($modalToggleBtn => {
            const $modal = $modalToggleBtn.dataset?.modalTarget ? document.getElementById($modalToggleBtn.dataset.modalTarget) : false;

            if (!$modal) return;

            $modalToggleBtn.addEventListener('click', e => {
                e.preventDefault();
                
                if ($modal.classList.contains('modal--active') && $modalToggleBtn.classList.contains('modal-close')) {
                    closeModal($modal);
                } else if (!$modal.classList.contains('modal--active') && $modalToggleBtn.classList.contains('modal-open')) {
                    openModal($modal);
                }
            });
        });
    }

    if ($modalResize.length) {
        $modalResize.forEach($modal => {
            if ($modal.id && window.location.hash && '#' + $modal.id === window.location.hash) {
                openModal($modal);
            }
        });
    }

    const setModalWidths = () => {
        const $activeModals = document.querySelectorAll('.modal.modal--active, .modal-resize.modal--active');
    
        let hasActiveModal = false;

        enableBodyScroll();
    
        if ($activeModals.length) {
            $activeModals.forEach($modal => {
                if (!$modal.dataset?.modalMaxWidth || window.innerWidth < $modal.dataset.modalMaxWidth) {
                    hasActiveModal = true;
                }
            });
        }

        if (hasActiveModal) {
            disableBodyScroll();
        }

        if (!hasActiveModal) {
            if ($activeModals.length) {
                $activeModals.forEach($modal => {
                    if ($modal.dataset?.modalMaxWidth && window.innerWidth >= $modal.dataset.modalMaxWidth) {
                        closeModal($modal);
                    }
                });
            }
    
            return;
        }
    };

    window.addEventListener('resize', setModalWidths);

    setModalWidths();
}
