window.addEventListener('DOMContentLoaded', init);

let rowIndex;
let addButton;
let itemsContainer;

function init() {
    addButton = document.querySelector('#shop-item-add');
    itemsContainer = document.querySelector('#shop-items');

    rowIndex = itemsContainer.querySelectorAll('.shop-item-row').length;

    updateAddButton();

    addButton.addEventListener('click', () => {
        const row = createItemRow();
        itemsContainer.appendChild(row);
        rowIndex++;

        updateAddButton();
    })

    itemsContainer.addEventListener('click', (e) => {
        const removeButton = e.target.closest('.shop-item-remove');
        if (removeButton) {
            const row = removeButton.closest('.shop-item-row');
            const rows = itemsContainer.querySelectorAll('.shop-item-row');

            if (rows.length > 0 && row) {
                row.remove();
                updateAddButton();
            }
        }
    })
}

function createItemRow() {
    const row = document.createElement('div');
    row.className = 'flex gap-3 relative bg-gray-100 border rounded p-3 shop-item-row'
    row.style = 'corner-shape: squircle';

    row.innerHTML = `
        <div class="flex flex-col flex-1">
            <label for="shop_items.${rowIndex}.name">Naam</label>
            <input type="text" name="shop_items[${rowIndex}][name]" id="shop_items.${rowIndex}.name"
                   class="input">
        </div>
        <div class="flex flex-col flex-1">
            <label for="shop_items.${rowIndex}.description">Beschrijving</label>
            <input type="text" name="shop_items[${rowIndex}][description]" id="shop_items.${rowIndex}.description"
                   class="input">
        </div>
        <div class="flex flex-col flex-1">
            <label for="shop_items.${rowIndex}.price">Prijs (In hele ValleyCoins)</label>
            <input type="number" name="shop_items[${rowIndex}][price]" id="shop_items.${rowIndex}.price"
                   class="input">
        </div>
        <button type="button" class="absolute top-0 right-0 p-1 shop-item-remove">
            <i class="fa-solid fa-xmark"></i>
        </button>
    `;

    return row;
}

function updateAddButton() {
    const rows = itemsContainer.querySelectorAll('.shop-item-row');

    if (rows.length > 0) {
        addButton.innerHTML = '<i class="fa-solid fa-plus"></i> Nog een shop-item toevoegen';
    } else {
        addButton.innerHTML = '<i class="fa-solid fa-plus"></i> Eerste shop-item toevoegen';
    }
}
