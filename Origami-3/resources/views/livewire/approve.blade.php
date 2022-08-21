<td>
    <select wire:model="status">
        <option value="1">Not Yet Approve</option>
        <option value="2">Approve</option>
    </select>
    <button onclick="return acceptDelete() || event.stopImmediatePropagation()" wire:click.prevent="confirm()">Confirm</button>
</td>


