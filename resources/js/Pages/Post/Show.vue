<script setup>
import Authenticated from "@/Layouts/AuthenticatedLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";

const { post } = defineProps({
    post: Object,
});
</script>

<template>
    <Authenticated>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Show
            </h2>
        </template>

        <div class="w-1/4 mx-auto mt-8 space-y-4">
            <div>
                <h1>{{ post.title }}</h1>
                <p>{{ post.created_at }}</p>
            </div>

            <div>
                <h3>本文</h3>
                <p>{{ post.body }}</p>
            </div>

            <div>
                <Link :href="route('post.index')">戻る</Link>
            </div>
        </div>
    </Authenticated>
</template>
