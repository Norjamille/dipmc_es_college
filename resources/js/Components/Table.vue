<template>
    <div class="flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <slot name="header" />
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <slot name="body" />
                        </tbody>
                    </table>
                </div>
                <div>
                    <slot name="footer" />
                </div>
            </div>
        </div>
    </div>
</template>