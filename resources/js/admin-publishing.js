window.addEventListener('DOMContentLoaded', init);

let publicToggle;
let publicField;

function init() {
    publicToggle = document.querySelector('#setter-public');
    publicField = document.querySelector('#public');

    publicToggle.addEventListener('change', () => {
        publicField.value = (publicToggle.checked) ? '1' : '0';
    });
}
