<template>
    <MainLayout>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
            <Listing v-for="list in listing" :key="list.id" :listing="list" />
        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import Listing  from '@/Pages/Listing/Index/Components/Listing.vue';

defineProps({
    listing: Array,
});
</script>