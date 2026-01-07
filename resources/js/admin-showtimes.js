window.addEventListener('DOMContentLoaded', init);

let rowIndex;
let addButton;
let timesContainer;

function init() {
    addButton = document.querySelector('#show-times-add');
    timesContainer = document.querySelector('#show-times');

    rowIndex = timesContainer.querySelectorAll('.show-time-row').length;

    addButton.addEventListener('click', () => {
        const row = createTimeRow();
        timesContainer.appendChild(row);
        rowIndex++;
    })

    timesContainer.addEventListener('click', (e) => {
        const removeButton = e.target.closest('.show-time-remove');
        if (removeButton) {
            const row = removeButton.closest('.show-time-row');
            const rows = timesContainer.querySelectorAll('.show-time-row');

            if (rows.length > 1 && row) {
                row.remove();
            }
        }
    })
}

function createTimeRow() {
    const row = document.createElement('div');
    row.className = 'flex gap-3 relative bg-gray-100 border rounded p-3 show-time-row'
    row.style = 'corner-shape: squircle';

    row.innerHTML = `
        <div class="flex flex-col flex-1">
            <label for="show_times.${rowIndex}.start_time">Starttijd</label>
            <input type="time" name="show_times[${rowIndex}][start_time]" id="show_times.${rowIndex}.start_time"
                   required class="input">
        </div>
        <div class="flex flex-col flex-1">
            <label for="show_times.${rowIndex}.end_time">Eindtijd</label>
            <input type="time" name="show_times[${rowIndex}][end_time]" id="show_times.${rowIndex}.end_time"
                   required class="input">
        </div>
        <div class="flex flex-col flex-1">
            <label for="show_times.${rowIndex}.edition">Editie</label>
            <input type="text" name="show_times[${rowIndex}][edition]" id="show_times.${rowIndex}.edition"
                   required class="input">
        </div>
        <div class="flex flex-col flex-1">
            <label for="show_times.${rowIndex}.location">Locatie</label>
            <input type="text" name="show_times[${rowIndex}][location]" id="show_times.${rowIndex}.location"
                   required class="input">
        </div>
        <button type="button" class="absolute top-0 right-0 p-1 show-time-remove">
            <i class="fa-solid fa-xmark"></i>
        </button>
    `;

    return row;
}
