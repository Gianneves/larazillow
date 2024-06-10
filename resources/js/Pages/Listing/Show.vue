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
            Monthly Payment
          </template>
          <div>
            <label class="label">Interest rate ({{ interestRate }}%)</label>
            <input v-model.number="interestRate"
              type="range" min="0.1" max="30" step="0.1" class="w-full h-4 bg-gray-200 rounded-lg apperance-none cursor-pointer dark:bg-gray-700">

            <label class="label">Duration ({{ duration }} years)</label>
            <input v-model.number="duration"
              type="range" min="3" max="35" step="1" class="w-full h-4 bg-gray-200 rounded-lg apperance-none cursor-pointer dark:bg-gray-700">

            <div class="text-gray-600 dark:text-gray-300 mt-2">
              <div class="text-gray-400">Your monthly payment</div>
              <PriceTag :price="monthlyPayment" class="text-3xl" />
            </div>
          </div>
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

import { ref, computed } from "vue";

const interestRate = ref(2.5);
const duration = ref(25);

const props = defineProps({
  listing: Object,
});

const monthlyPayment = computed(() => {
  const principle = props.listing.price;
  const monthlyInterest = interestRate.value / 100 / 12;
  const numberOfPaymentMonths = duration.value * 12;

  return principle * monthlyInterest * (Math.pow(1 + monthlyInterest, numberOfPaymentMonths)) / (Math.pow(1 + monthlyInterest, numberOfPaymentMonths) - 1)
});
</script>
