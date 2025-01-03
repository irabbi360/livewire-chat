
    <div class="container mx-auto px-4 py-6 max-w-4xl">
        <!-- Messages Container -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-auto h-96 mb-6">
            @forelse ($messages as $message)
                <div class="flex items-center justify-between p-4 border-b border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <div class="flex items-start flex-1">
                        <div class="font-medium text-gray-900 dark:text-gray-100 min-w-[100px]">
                            {{ $message->user->name }}:
                        </div>
                        <div class="ml-4 text-gray-700 dark:text-gray-300 flex-1"> 
                            {{ $message->body }}
                        </div>
                    </div>
                    
                    <div class="text-sm text-gray-500 dark:text-gray-400 mx-4"> 
                        [{{ $message->created_at->format('H:i') }}] 
                    </div>

                    <div class="relative" x-data="{ open: false }">
                        <button 
                            @click="open = !open"
                            class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-full transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                fill="none" 
                                viewBox="0 0 24 24" 
                                stroke-width="1.5" 
                                stroke="currentColor" 
                                class="w-5 h-5 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                                <path stroke-linecap="round" 
                                    stroke-linejoin="round" 
                                    d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5" />
                            </svg>
                        </button>

                        <div x-show="open" 
                            x-transition
                            @click.away="open = false"
                            class="absolute right-0 mt-2 w-64 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-lg p-4">
                            Content...
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-8 text-center text-gray-500 dark:text-gray-400">
                    No messages yet. Type one below!
                </div>
            @endforelse
        </div>

        <!-- Message Input Form -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
            <form method="POST" wire:submit.prevent="sendMessage">
                @csrf

                <div class="space-y-4">
                    <div>
                        <x-input-label for="body" :value="__('Message')" 
                            class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                        <x-text-input id="body" 
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 
                                   dark:bg-gray-700 dark:text-gray-100
                                   shadow-sm focus:border-indigo-500 focus:ring-indigo-500
                                   dark:focus:border-indigo-400 dark:focus:ring-indigo-400" 
                            type="text" 
                            name="body"  
                            wire:model="body"
                            placeholder="Type your message here..."
                        />
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button class="bg-indigo-600 dark:bg-indigo-500 
                                                hover:bg-indigo-700 dark:hover:bg-indigo-400 
                                                focus:ring-indigo-500 dark:focus:ring-indigo-400">
                            {{ __('Send') }}
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>