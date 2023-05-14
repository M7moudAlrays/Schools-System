<div style="text-align: center">

    {{-- <button wire:click="decrement">-</button>
    <button wire:click="increment">+</button>
    <h1>{{ $count }}</h1> --}}


    <input class="p-1 text-center" wire:model="name" type="text" placeholder="type name to search">

    <ul>
        @foreach($users as $user)
            <li> This User {{$name}} Founding at our DataBase </li>
        @endforeach
    </ul>
    
</div>