<!DOCTYPE html>
<html>
<head>
    <title></title>
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  
<div class="overflow-auto h-44">
    @forelse ($messages as $message)
        <div class="flex leading-7 border-b-2 mb-4">
            <div class="shrink-0">
                {{ $message->user->name }}:
            </div>
            <div class="ml-3 grow"> 
                {{ $message->body }}
            </div>
            <div> 
                [{{ $message->created_at->format('H:i') }}] 
            </div>
            <div class="mx-8">
                <div x-data="{ open: false }">
                    <button @click="open = ! open">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5" />
                        </svg>
                    </button>
 
                    <div x-show="open" class="max-w-5xl border-2 px-10 mt-5 mb-5">
                        Content...
                    </div>
                </div>
            </div>
        </div>
        @empty
            No messages yet. Type one below!
    @endforelse
    </div>

    <div class="mt-6 border-top">
        <form method="POST" wire:submit="sendMessage">
            @csrf

            <!-- Body -->
            <div>
                <x-input-label for="body" :value="__('Message')" />
                <x-text-input id="body" 
                    class="block mt-1 w-full" 
                    type="text" name="body"  
                    wire:model="body"
                      />
                
            </div>

        
            <div class="flex items-center justify-start mt-4">
                
                <x-primary-button>
                    {{ __('send') }}
                </x-primary-button>
            </div>
        </form>
   </div>

</body>
<script src="{{ asset('js/app.js') }}"></script>
@livewireScripts
</html>