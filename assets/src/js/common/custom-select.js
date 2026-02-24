(() => {
    const $customSelectEls = document.querySelectorAll('.custom-select');

    if ($customSelectEls.length) {

        $customSelectEls.forEach($customSelect => {
            const $select = $customSelect.querySelector('select');

            const $selectOptions = $select.querySelectorAll('option');

            if (!$selectOptions.length) {
                return;
            }

            const $selectedOption = Array.from($selectOptions).filter($option => $option.selected);

            let customSelectHtml = `<div class="custom-select__dropdown"><button class="custom-select__dropdown__toggle" type="button"><div class="icon"></div>${$selectedOption[0].text}</button><div class="custom-select__dropdown__options">`;

            $selectOptions.forEach($option => {
                customSelectHtml += `<div><button class="${$option.value === $select.value ? 'active' : ''}" type="button" data-value="${$option.value}">${$option.text}</div>`;
            });

            customSelectHtml += '</div><button class="custom-select__dropdown__bg-btn" type="button"></button></div>';

            $customSelect.insertAdjacentHTML('beforeend', customSelectHtml);
            
            const $customSelectDropdown = $customSelect.querySelector('.custom-select__dropdown');
            const $customSelectDropdownToggle = $customSelect.querySelector('.custom-select__dropdown__toggle');
            const $customSelectDropdownBgBtn = $customSelect.querySelector('.custom-select__dropdown__bg-btn');
            const $customSelectDropdownOptionsButtons = $customSelect.querySelectorAll('.custom-select__dropdown__options button');

            $customSelectDropdownToggle.addEventListener('click', () => {
                if ($customSelectDropdown.classList.contains('show')) {
                    $customSelectDropdown.classList.remove('show');
                } else {
                    $customSelectDropdown.classList.add('show');
                }
            });

            $customSelectDropdownBgBtn.addEventListener('click', () => {
                $customSelectDropdown.classList.remove('show');
            });
            
            $customSelectDropdownOptionsButtons.forEach($button => {
                $button.addEventListener('click', () => {
                    $select.value = $button.dataset.value;
                    
                    $select.dispatchEvent(new Event('change'));
                });
            });
        });

    }
})();
