import Prism from 'prismjs';

import '../sass/acf-field-block-code.scss';

(() => {
    const $codeBlocks = document.querySelectorAll('.your-theme-name-code-block');

    if (!$codeBlocks) return;

    $codeBlocks.forEach($codeBlock => {
        const $code = $codeBlock.querySelector('.your-theme-name-code-block__code');
        const $codeContent = $codeBlock.querySelector('.your-theme-name-code-block__code-content');
        const $editor = $codeBlock.querySelector('.your-theme-name-code-block__editor');

        $editor.addEventListener('input', e => {
            updateCodeText();
            syncScroll();
        });

        $editor.addEventListener('focus', e => {
            syncScroll();
        });

        $editor.addEventListener('keydown', e => {
            checkTab(e);
        });

        $editor.addEventListener('scroll', e => {
            syncScroll();
        });

        function updateCodeText() {
            let text = $editor.value;

            if (text[text.length-1] == "\n") {
                text += " ";
            }

            $codeContent.innerHTML = text.replace(new RegExp("&", "g"), "&amp;").replace(new RegExp("<", "g"), "&lt;"); /* Global RegExp */

            Prism.highlightElement($codeContent);
        }

        function syncScroll() {
            $code.scrollTop = $editor.scrollTop;
            $code.scrollLeft = $editor.scrollLeft;
        }

        function checkTab(event) {
            let code = $editor.value;

            if (event.key == "Tab") {
                event.preventDefault();

                let before_tab = code.slice(0, $editor.selectionStart); // text before tab
                let after_tab = code.slice($editor.selectionEnd, $editor.value.length); // text after tab
                let cursor_pos = $editor.selectionStart + 1; // where cursor moves after tab - moving forward by 1 char to after tab
                $editor.value = before_tab + "\t" + after_tab; // add tab char
                
                $editor.selectionStart = cursor_pos;
                $editor.selectionEnd = cursor_pos;

                updateCodeText($editor.value);
            }
        }
    });
})();
