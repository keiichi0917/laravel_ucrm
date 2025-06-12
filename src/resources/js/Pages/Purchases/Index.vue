<script setup>
import { onMounted, ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import FlashMessage from '@/Components/FlashMessage.vue';
import Pagination from '@/Components/Pagination.vue';
import { Inertia } from '@inertiajs/inertia';
import dayjs from 'dayjs';

const props = defineProps({
    orders: Object,
});
onMounted(() => {
    console.log(props.orders.data);
});
</script>

<template>
    <Head title="購買履歴" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                購買履歴
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section class="body-font text-gray-600">
                            <div class="container mx-auto px-5 py-8">
                                <FlashMessage />
                                <div
                                    class="mx-auto w-full overflow-auto lg:w-2/3"
                                >
                                    <div>
                                        <input
                                            type="text"
                                            name="search"
                                            v-model="search"
                                        />
                                        <button
                                            class="bg-blue-300 px-2 py-2 text-white"
                                            @click="searchCustomers"
                                        >
                                            検索
                                        </button>
                                    </div>
                                    <div
                                        class="mx-auto mt-4 flex w-full pl-4 lg:w-2/3"
                                    ></div>

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
                                                    氏名
                                                </th>
                                                <th
                                                    class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900"
                                                >
                                                    合計金額
                                                </th>
                                                <th
                                                    class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900"
                                                >
                                                    ステータス
                                                </th>
                                                <th
                                                    class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900"
                                                >
                                                    購入日
                                                </th>
                                                <th
                                                    class="title-font w-10 rounded-br rounded-tr bg-gray-100 text-sm font-medium tracking-wider text-gray-900"
                                                ></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="order in props.orders
                                                    .data"
                                                :key="order.id"
                                            >
                                                <td
                                                    class="border-b-2 border-gray-200 px-4 py-3"
                                                >
                                                    <Link
                                                        :href="
                                                            route(
                                                                'purchases.show',
                                                                {
                                                                    purchase:
                                                                        order.id,
                                                                },
                                                            )
                                                        "
                                                        >{{ order.id }}</Link
                                                    >
                                                </td>
                                                <td
                                                    class="border-b-2 border-gray-200 px-4 py-3"
                                                >
                                                    {{ order.customer_name }}
                                                </td>
                                                <td
                                                    class="border-b-2 border-gray-200 px-4 py-3"
                                                >
                                                    {{ order.total }}
                                                </td>
                                                <td
                                                    class="border-b-2 border-gray-200 px-4 py-3"
                                                >
                                                    {{ order.status }}
                                                </td>
                                                <td
                                                    class="border-b-2 border-gray-200 px-4 py-3"
                                                >
                                                    {{
                                                        dayjs(
                                                            order.created_at,
                                                        ).format(
                                                            'YYYY-MM-DD HH:mm:ss',
                                                        )
                                                    }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <Pagination
                                :links="props.orders.links"
                            ></Pagination>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
