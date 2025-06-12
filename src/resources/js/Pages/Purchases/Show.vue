<script setup>
import { onMounted, reactive, ref, computed } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import dayjs from 'dayjs';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    // customers: Array,
    items: Array,
    order: Array,
});

onMounted(() => {
    console.log(props.items);
    console.log(props.order[0].customer_name);
    // ページ読み込み後 即座に実行
});
</script>

<template>
    <form @submit.prevent="storePurchase">
        日付<br />
        <div id="date" name="date">
            {{ dayjs(props.order[0].created_at).format('YYYY/MM/DD') }}
        </div>

        <br />
        会員名<br />
        <div id="date" name="date">
            {{ props.order[0].customer_name }}
        </div>
        <br /><br />
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>商品名</th>
                    <th>金額</th>
                    <th>数量</th>
                    <th>小計</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in props.items" :key="item.id">
                    <td>{{ item.item_id }}</td>
                    <td>{{ item.item_name }}</td>
                    <td>{{ item.item_price }}</td>
                    <td>{{ item.quantity }}</td>
                    <td>{{ item.subtotal }}</td>
                </tr>
            </tbody>
        </table>
        <br />
        合計 {{ props.order[0].total }} 円<br />

        ステータス<br />
        <div v-if="props.order[0].status == true">未キャンセル</div>
        <div v-if="props.order[0].status == false">キャンセル済み</div>
        <br />
        <div v-if="props.order[0].status == false">
            キャンセル日<br />
            {{ dayjs(props.order[0].update_at).format('YYYY/MM/DD') }}
        </div>

        <div v-if="props.order[0].status == true">
            <Link
                as="button"
                :href="
                    route('purchases.edit', {
                        purchase: props.order[0].id,
                    })
                "
                >編集する</Link
            >
        </div>
    </form>
</template>
