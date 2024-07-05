<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("ログインしました。") }}
                </div>
            </div>

            <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('diagnoses.index') }}" class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('診断する') }}
                    </a>
                </div>
            <div class="p-6 text-gray-900">
                    <a href="{{ route('posts.index') }}" class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('体質に合った習慣をみる') }}
                    </a>
                    <p class="text-sm mt-4">※診断をしていない場合は診断画面に移動します。</p>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>