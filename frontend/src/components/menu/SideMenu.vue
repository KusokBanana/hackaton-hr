<template>
  <div class="flex flex-col h-full">
    <div
      class="flex w-full justify-items-end p-3 sm:pl-8 pl-3 align-middle items-center"
    >
      <div class="hidden sm:block">
        <img class="w-full" src="@/assets/logo.svg" />
      </div>
      <div class="ml-4 font-medium text-lg flex-grow sm:flex-grow-0">
        GPB Rec
      </div>
    </div>

    <MenuSection
      class="mt-6"
      v-for="section in menu"
      :key="section.name"
      :section="section"
    />
  </div>
</template>

<script>
import MenuSection from "./MenuSection";
export default {
  components: {
    MenuSection,
  },
  data() {
    return {
      menu: [
        {
          name: "Рекрутинг",
          items: [
            {
              name: "Задачи",
              bgActive: "F4FCE7",
              borderActive: "A7D066",
              fontActive: "77A234",
              path: "tasks",
            },
            {
              name: "Вакансии",
              bgActive: "F2F7FF",
              borderActive: "4886FF",
              fontActive: "4886FF",
              path: "positions",
            },
            {
              name: "База резюме",
              bgActive: "F4FCE7",
              borderActive: "A7D066",
              fontActive: "77A234",
              path: "resume",
            },
            {
              name: "Аналитика",
              bgActive: "F4FCE7",
              borderActive: "A7D066",
              fontActive: "77A234",
              path: "analytics",
            },
          ],
        },
        {
          name: "Общение",
          items: [
            {
              name: "Звонки",
              bgActive: "F4FCE7",
              borderActive: "A7D066",
              fontActive: "77A234",
              path: "calls",
            },
            {
              name: "Почта",
              bgActive: "F4FCE7",
              borderActive: "A7D066",
              fontActive: "77A234",
              path: "mail",
            },
            {
              name: "Чаты",
              bgActive: "F4FCE7",
              borderActive: "A7D066",
              fontActive: "77A234",
              path: "chats",
            },
          ],
        },
        {
          name: "Настройки",
          items: [
            {
              name: "Настройки",
              bgActive: "F4FCE7",
              borderActive: "A7D066",
              fontActive: "77A234",
              path: "settings",
            },
          ],
        },
      ],
    };
  },
};
</script>

<style>
</style>