<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import FlashMessage from '@/Components/FlashMessage.vue';
import Pagination from '@/Components/Pagination.vue';
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

defineProps({
    customers: Object,
});

const search = ref('');
// ref の値を取得するには .valueが必要
const searchCustomers = () => {
    Inertia.get(route('customers.index', { search: search.value }));
};
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
                                    >
                                        <Link
                                            as="button"
                                            :href="route('customers.create')"
                                            class="ml-auto flex rounded border-0 bg-indigo-500 px-6 py-2 text-white hover:bg-indigo-600 focus:outline-none"
                                        >
                                            顧客登録
                                        </Link>
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
                                                    氏名
                                                </th>
                                                <th
                                                    class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900"
                                                >
                                                    カナ
                                                </th>
                                                <th
                                                    class="title-font bg-gray-100 px-4 py-3 text-sm font-medium tracking-wider text-gray-900"
                                                >
                                                    電話番号
                                                </th>
                                                <th
                                                    class="title-font w-10 rounded-br rounded-tr bg-gray-100 text-sm font-medium tracking-wider text-gray-900"
                                                ></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="customer in customers.data"
                                                :key="customer.id"
                                            >
                                                <td
                                                    class="border-b-2 border-gray-200 px-4 py-3"
                                                >
                                                    <Link
                                                        class="text-blue-400"
                                                        :href="
                                                            route(
                                                                'items.show',
                                                                {
                                                                    item: customer.id,
                                                                },
                                                            )
                                                        "
                                                    >
                                                        {{ customer.id }}
                                                    </Link>
                                                </td>
                                                <td
                                                    class="border-b-2 border-gray-200 px-4 py-3"
                                                >
                                                    {{ customer.name }}
                                                </td>
                                                <td
                                                    class="border-b-2 border-gray-200 px-4 py-3"
                                                >
                                                    {{ customer.kana }}
                                                </td>
                                                <td
                                                    class="border-b-2 border-gray-200 px-4 py-3"
                                                >
                                                    {{ customer.tel }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <Pagination :links="customers.links"></Pagination>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
