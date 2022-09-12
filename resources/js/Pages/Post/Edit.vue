<script setup>
import Authenticated from "@/Layouts/AuthenticatedLayout.vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";

const { post } = defineProps({
    post: Object,
});

const form = useForm({
    title: post.title,
    body: post.body,
});
</script>
<template>
    <Authenticated>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit
            </h2>
        </template>

        <div
            class="mt-12 mx-auto w-1/4 p-6 bg-indigo-300 border-2 border-gray-200 flex-col rounded"
        >
            <form
                @submit.prevent="
                    form.put(route('post.update', { id: post.id }))
                "
            >
                <!-- title-->
                <div class="m-5">
                    <label for="title">タイトル:</label>
                    <input
                        type="text"
                        v-model="form.title"
                        id="title"
                        class="w-full"
                    />
                    <div class="text-red-700" v-if="form.errors.title">
                        {{ form.errors.title }}
                    </div>
                </div>
                <!-- body -->
                <div class="m-5">
                    <label for="body">本文:</label>
                    <input
                        type="text"
                        v-model="form.body"
                        id="body"
                        class="w-full"
                    />
                    <div class="text-red-700" v-if="form.errors.body">
                        {{ form.errors.body }}
                    </div>
                </div>

                <!-- submit -->
                <button
                    class="ml-auto border-2 border-gray-200 bg-violet-100 px-2 flex"
                    type="submit"
                    :disabled="form.processing"
                >
                    Edit
                </button>
            </form>
            <Link :href="route('post.index')">戻る</Link>
        </div>
    </Authenticated>
</template>
