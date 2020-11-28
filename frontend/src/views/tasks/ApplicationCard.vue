<template>
  <div class="w-full flex flex-col rounded shadow-card p-4 text-menugrey">
    <div class="flex flex-row">
      <div class="text-black font-medium">{{item.title}}</div>
      <div class="flex-grow"></div>
      <div>{{item.department}}</div>
    </div>
    <div class="mt-1">Отклики: <span class="text-appgrey">{{item.unprocessed_count + item.processed_count}}</span></div>
    <div class="mt-1">
      Дата создания: <span class="text-appgrey">{{item.created_at}}</span>
    </div>
    <div class="mt-4 flex items-center">
      <div
        class="rounded-full text-white bg-appblue w-8 h-8 font-medium text-md flex items-center justify-center"
      >
        <span class="text-shadow">+{{item.unprocessed_count}}</span>
      </div>
      <div class="flex-grow"></div>
      <div>
        <img
          class="cursor-pointer"
          :src="require(`@/assets/icons/trash.svg`)"
        />
      </div>
      <Button class="ml-4" color="F7685B">Обработать</Button>
    </div>
  </div>
</template>

<script>
import Button from "../../components/ui/Button";
export default {
  components: {
    Button,
  },
  props: ["item"],
};
</script>

<style>
.text-shadow {
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
</style>