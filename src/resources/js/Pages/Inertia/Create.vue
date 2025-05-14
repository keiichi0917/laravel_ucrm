<script setup>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

// フォームの初期状態を reactive に保持
const form = reactive({
  title: '',
  content: ''
})

// フォーム送信処理
const submitFunction = () => {
  Inertia.post('/inertia', form)
}
</script>

<template>
  <form @submit.prevent="submitFunction" class="space-y-4">
    <!-- タイトル -->
    <div>
      <label for="title" class="block text-sm font-medium text-gray-700">タイトル</label>
      <input
        type="text"
        id="title"
        v-model="form.title"
        class="mt-1 block w-full border border-gray-300 rounded-md p-2"
      />
      <div v-if="$page.props.errors.title" class="text-red-500 text-sm mt-1">
        {{ $page.props.errors.title }}
      </div>
    </div>

    <!-- 内容 -->
    <div>
      <label for="content" class="block text-sm font-medium text-gray-700">内容</label>
      <textarea
        id="content"
        v-model="form.content"
        class="mt-1 block w-full border border-gray-300 rounded-md p-2"
        rows="4"
      ></textarea>
      <div v-if="$page.props.errors.content" class="text-red-500 text-sm mt-1">
        {{ $page.props.errors.content }}
      </div>
    </div>

    <!-- フラッシュメッセージ（成功） -->
    <div v-if="$page.props.flash.message" class="text-green-600 font-semibold">
      {{ $page.props.flash.message }}
    </div>

    <!-- 送信ボタン -->
    <button
      type="submit"
      class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
    >
      送信
    </button>
  </form>
</template>
