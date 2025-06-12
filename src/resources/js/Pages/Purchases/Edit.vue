<script setup>
import { getToday } from '@/common'; // 別ファイルをインポート
import { onMounted, reactive, ref, computed } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import dayjs from 'dayjs';

const props = defineProps({
    order: Array,
    items: Array,
});

onMounted(() => {
    props.items.forEach((item) => {
        // 配列を1つずつ処理
        itemList.value.push({
            // 配列に1つずつ追加
            id: item.id,
            name: item.name,
            price: item.price,
            quantity: item.quantity,
        });
    });
});

const itemList = ref([]); // リアクティブな配列を準備

const form = reactive({
    id: props.order[0].id,
    date: dayjs(props.order[0].created_at).format('YYYY-MM-DD'),
    customer_id: props.order[0].customer_id,
    status: props.order[0].status,
    items: [],
});

const totalPrice = computed(() => {
    let total = 0;
    itemList.value.forEach((item) => {
        total += item.price * item.quantity;
    });
    return total;
});

const updatePurchase = (id) => {
    itemList.value.forEach((item) => {
        if (item.quantity > 0)
            // 0より大きいものだけ追加
            form.items.push({ id: item.id, quantity: item.quantity });
    });
    Inertia.put(route('purchases.update', { purchase: id }), form);
};

const quantity = Array.from({ length: 10 }, (_, i) => i);
</script>
<template>
    <form @submit.prevent="updatePurchase(form.id)">
        日付<br />
        <input disabled type="date" name="date" :value="form.date" />
        <br />
        会員名<br />
        <input
            disabled
            type="text"
            id="customer"
            name="customer"
            :value="props.order[0].customer_name"
        />
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
                <tr v-for="item in itemList">
                    <td>{{ item.id }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.price }}</td>
                    <td>
                        <select name="quantity" v-model="item.quantity">
                            <option v-for="q in quantity" :value="q">
                                {{ q }}
                            </option>
                        </select>
                    </td>
                    <td>
                        {{ item.price * item.quantity }}
                    </td>
                </tr>
            </tbody>
        </table>
        <br />
        合計 {{ totalPrice }} 円<br />
        <input
            type="radio"
            id="status"
            v-model="form.status"
            name="status"
            value="1"
        />
        未キャンセル
        <input
            type="radio"
            id="status"
            v-model="form.status"
            name="status"
            value="0"
        />
        キャンセルする
        <br /><br />
        <button>更新する</button>
    </form>
</template>
