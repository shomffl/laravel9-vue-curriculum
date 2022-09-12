<script setup>
import Authenticated from "@/Layouts/AuthenticatedLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";

const { posts } = defineProps({ posts: Array });

const destroy = (id) => {
    Inertia.delete(route("post.delete", { id: id }), {
        onBefore: () => confirm("削除しますが、よろしいですか？"),
    });
};
</script>
<template>
    <Authenticated>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Index
            </h2>
        </template>

        <div class="w-3/4 mx-auto mt-8">
            <h1 class="font-bold text-3xl text-grey-800">Blog Name</h1>

            <div class="w-1/2 mx-auto divide-gray-200 divide-y-2 space-y-4">
                <div :key="post.id" v-for="post in posts" class="space-y-5 p-3">
                    <div class="flex justify-between">
                        <h2 class="mt-4 font-bold text-xl text-grey-800">
                            <Link :href="route('post.show', { id: post.id })">{{
                                post.title
                            }}</Link>
                        </h2>
                        <button
                            class="px-3 bg-purple-300 hover:bg-purple-400 rounded-md"
                            v-on:click="destroy(post.id)"
                        >
                            削除
                        </button>
                    </div>

                    <p>{{ post.body }}</p>
                </div>
            </div>
        </div>
    </Authenticated>
</template>
