<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    items: Array,
});
</script>

<template>
    <Head title="商品一覧" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                商品一覧
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section class="body-font text-gray-600">
                            <div class="container mx-auto px-5 py-8">
                                <div
                                    class="mx-auto w-full overflow-auto lg:w-2/3"
                                >
                                    <div
                                        class="mx-auto mt-4 flex w-full pl-4 lg:w-2/3"
                                    >
                                        <button
                                            class="ml-auto flex rounded border-0 bg-indigo-500 px-6 py-2 text-white hover:bg-indigo-600 focus:outline-none"
                                        >
                                            Button
                                        </button>
                                    </div>

                                    <table
                                        class="whitespace-no-wrap w-full table-auto text-left"
                                    >
                                        <thead>
                                            <tr>
                                                <th
                                                    class="title-font rounded-bl rounded-tl bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900"
                                                >
                                                    ID
                                                </th>
                                                <th
                                                    class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900"
                                                >
                                                    商品名
                                                </th>
                                                <th
                                                    class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900"
                                                >
                                                    価格
                                                </th>
                                                <th
                                                    class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900"
                                                >
                                                    ステータス
                                                </th>
                                                <th
                                                    class="title-font w-10 rounded-br rounded-tr bg-gray-100 text-sm font-medium tracking-wider text-gray-900"
                                                ></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="item in items"
                                                :key="item.id"
                                            >
                                                <td
                                                    class="border-b-2 border-gray-200 px-4 py-3"
                                                >
                                                    {{ item.id }}
                                                </td>
                                                <td
                                                    class="border-b-2 border-gray-200 px-4 py-3"
                                                >
                                                    {{ item.name }}
                                                </td>
                                                <td
                                                    class="border-b-2 border-gray-200 px-4 py-3"
                                                >
                                                    {{ item.price }}
                                                </td>
                                                <td
                                                    class="border-b-2 border-gray-200 px-4 py-3"
                                                >
                                                    <SPAN
                                                        v-if="
                                                            item.is_selling ===
                                                            1
                                                        "
                                                        >販売中</SPAN
                                                    >
                                                    <SPAN
                                                        v-if="
                                                            item.is_selling ===
                                                            0
                                                        "
                                                        >停止中</SPAN
                                                    >
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
s
