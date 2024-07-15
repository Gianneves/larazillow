<template>
    <Box>
        <template #header>Offer Made</template>
        <PriceTag :price="offer.amount" class="text-3xl" />

        <section class="mt-2 flex flex-col md:flex-row justify-between text-gray-500">
            <div>Made on</div>
            <div class="font-medium">{{ offerMadeOne }}</div>
        </section>
    </Box>
</template>

<script setup>

import Box from '@/Components/UI/Box.vue';
import PriceTag from '@/Components/PriceTag.vue';
import { computed } from 'vue';

const props = defineProps({
    offer: Object
});

const offerMadeOne = computed(() => new Date(props.offer.created_at).toString());
</script>