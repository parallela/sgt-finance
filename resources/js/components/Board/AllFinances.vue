<template>
    <div
        class="flex flex-col bg-gradient-to-r from-indigo-900 to-indigo-800 hover:from-indigo-800 hover:to-indigo-900 h-[17.5rem] w-1/2 rounded-2xl shadow-md shadow-indigo-800 mr-4"
    >
        <!-- Card Heading -->
        <div class="p-4">
            <div class="text-white font-light text-2xl">
                Stocks
            </div>

            <div class="mt-4 w-full">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-400">
                        <thead class="text-xs uppercase bg-gradient-to-r from-indigo-900 to-indigo-800 hover:from-indigo-800 hover:to-indigo-900">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Stock
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Color
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="bg-gradient-to-r from-indigo-900 to-indigo-800 hover:from-indigo-800 hover:to-indigo-900">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                Apple MacBook Pro 17"
                            </th>
                            <td class="px-6 py-4">
                                Silver
                            </td>
                            <td class="px-6 py-4">
                                Laptop
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import { initFlowbite } from 'flowbite';
export default {
    mounted() {},
    data() {
        return {};
    },
};
</script>
