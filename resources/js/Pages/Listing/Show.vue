<template>
  <MainLayout>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
      <Box class="col-span-12 md:col-span-7 flex items-center w-full">
        <div class="w-full text-center font-medium text-gray-500">No images</div>
      </Box>
      <div class="md:col-span-5 flex flex-col gap-4">
        <Box>
          <template #header>
            Basic Info
          </template>
          <PriceTag :price="listing.price" class="text-2xl font-bold" />
          <ListingSpace :listing="listing" class="text-lg" />
          <ListingAddress :listing="listing" class="text-gray-500" />
        </Box>

        <Box>
          <template #header>
            Offer
          </template>
          Make an offer
        </Box>
      </div>
    </div>
  </MainLayout>
</template>

<script setup>
import ListingAddress from "@/Components/ListingAddress.vue";
import ListingSpace from "@/Components/ListingSpace.vue";
import PriceTag from "@/Components/PriceTag.vue";
import Box from "@/Components/UI/Box.vue";
import MainLayout from "@/Layouts/MainLayout.vue";

defineProps({
  listing: Object,
});
</script>
