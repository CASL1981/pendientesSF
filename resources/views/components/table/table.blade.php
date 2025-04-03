@props(['audit'])

<div class="col-12">
    <div class="table-responsive tableFixHead" style="max-height: 500px; overflow-y: auto;">
        <table id="users-list" class="table">
        <thead>
            <tr>{{ $head }}</tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
        <x-audit-information wire:model="showauditor" :audit="$audit"></x-audit-information>
        </table>
    </div>
</div>