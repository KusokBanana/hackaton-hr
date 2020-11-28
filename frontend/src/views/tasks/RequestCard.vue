<template>
  <div class="w-full flex flex-col rounded shadow-card p-4 text-menugrey">
    <div class="flex flex-row">
      <div
        class="text-black font-medium cursor-pointer"
        @click="
          $router.push({ name: 'Position Candidates', params: { id: item.id } })
        "
      >
        {{ item.title }}
      </div>
      <div class="flex-grow"></div>
      <div>{{ item.service }}</div>
    </div>

    <div class="flex flex-row mt-1 items-center">
      <div class="flex-grow">
        Описание:
        <span class="text-appgrey"
          >{{ item.description.substring(0, 250)
          }}{{ item.description > 250 ? "..." : "..." }}</span
        >
      </div>
      <div class="text-appblue font-medium cursor-pointer">Подробнее</div>
    </div>

    <div class="mt-4 flex items-center">
      <div class="">
        Дата создания: <span class="text-appgrey">{{ item.created_at }}</span>
      </div>
      <div class="flex-grow"></div>
      <div>
        <img
          class="cursor-pointer"
          :src="require(`@/assets/icons/trash.svg`)"
        />
      </div>
      <Button class="ml-4" color="6C63FF" @click="$router.push({ name: 'Position Candidates', params: { id: item.id } })">Выполнен</Button>
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