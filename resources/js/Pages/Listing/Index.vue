<template>
    <MainLayout>
        <Filters />
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
            <Listing v-for="list in listing.data" :key="list.id" :listing="list" />
        </div>
        <div v-if="listing.data.length" class="w-full flex justify-center mt-4 mb-4">
            <Pagination :links="listing.links" />
        </div>
    </MainLayout>
</template>

<script setup>
import Pagination from '@/Components/UI/Pagination.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import Listing  from '@/Pages/Listing/Index/Components/Listing.vue';
import Filters from '@/Pages/Listing/Index/Components/Filters.vue';

defineProps({
    listing: Object,
});
</script>