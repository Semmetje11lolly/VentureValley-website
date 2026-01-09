window.addEventListener('DOMContentLoaded', init);

let rowIndex;
let addButton;
let itemsContainer;

function init() {
    addButton = document.querySelector('#menu-item-add');
    itemsContainer = document.querySelector('#menu-items');

    rowIndex = itemsContainer.querySelectorAll('.menu-item-row').length;

    addButton.addEventListener('click', () => {
        const row = createItemRow();
        itemsContainer.appendChild(row);
        rowIndex++;

        updateAddButton();
    })

    itemsContainer.addEventListener('click', (e) => {
        const removeButton = e.target.closest('.menu-item-remove');
        if (removeButton) {
            const row = removeButton.closest('.menu-item-row');
            const rows = itemsContainer.querySelectorAll('.menu-item-row');

            if (rows.length > 0 && row) {
                row.remove();
                updateAddButton();
            }
        }
    })
}

function createItemRow() {
    const row = document.createElement('div');
    row.className = 'flex gap-3 relative bg-gray-100 border rounded p-3 menu-item-row'
    row.style = 'corner-shape: squircle';

    row.innerHTML = `
        <div class="flex flex-col flex-1">
            <label for="menu_items.${rowIndex}.name">Naam</label>
            <input type="text" name="menu_items[${rowIndex}][name]" id="menu_items.${rowIndex}.name"
                   class="input">
        </div>
        <div class="flex flex-col flex-1">
            <label for="menu_items.${rowIndex}.description">Beschrijving</label>
            <input type="text" name="menu_items[${rowIndex}][description]" id="menu_items.${rowIndex}.description"
                   class="input">
        </div>
        <div class="flex flex-col flex-1">
            <label for="menu_items.${rowIndex}.price">Prijs (In hele ValleyCoins)</label>
            <input type="number" name="menu_items[${rowIndex}][price]" id="menu_items.${rowIndex}.price"
                   class="input">
        </div>
        <button type="button" class="absolute top-0 right-0 p-1 menu-item-remove">
            <i class="fa-solid fa-xmark"></i>
        </button>
    `;

    return row;
}

function updateAddButton() {
    const rows = itemsContainer.querySelectorAll('.menu-item-row');

    if (rows.length > 0) {
        addButton.innerHTML = '<i class="fa-solid fa-plus"></i> Nog een menu-item toevoegen';
    } else {
        addButton.innerHTML = '<i class="fa-solid fa-plus"></i> Eerste menu-item toevoegen';
    }
}
