(() => {
    const setFullWidths = () => {
        const $fullWidth = document.querySelectorAll('.full-width');

        if (!$fullWidth) {
            return;
        }

        $fullWidth.forEach($el => {
            $el.style.width = `${document.body.scrollWidth}px`;
        });
    };

    window.addEventListener('resize', () => {
        setFullWidths();
    });

    setFullWidths();
})();
