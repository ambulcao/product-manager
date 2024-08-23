<template>
  <div>
    <h1>This is {{title}} </h1>
  </div>
</template>
<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    title: String 
});
</script>
