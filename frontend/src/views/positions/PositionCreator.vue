<template>
  <div class="flex flex-col">
    <div
      class="flex flex-row items-center divide-x divide-appdivider space-x-4"
    >
      <div class="text-2xl">Новая вакансия</div>
      <div class="pl-4 text-menugrey">
        сегодня {{ new Date() | moment("D.MM.YYYY") }}
      </div>
    </div>
    <div class="flex space-x-5 mt-3">
      <div class="bg-white rounded shadow-card h-full p-4 flex-grow flex flex-col">
        <div class="font-medium flex items-center">
            <div>Описание</div>
            <div class="flex-grow"></div>
            <div class="border rounded p-2 cursor-pointer" @click="predict">Предсказать</div>
        </div>
        <div class="min-h-half mt-2">
            <textarea name="" v-model="content" class="w-full min-h-half box-border"></textarea>
        </div>
      </div>
      <div class="bg-white rounded shadow-card p-4 w-500px">
          <div class="flex flex-col w-full" v-for="item in items" :key="item">
            <div class="font-medium mb-2">{{item}}</div>
            <Select :value="null" />
          </div>
      </div>
    </div>
  </div>
</template>

<script>
import Api from '../../api/predictions'
export default {
  components: {},
  data() {
      return {
          items: ['Вакансия', 'Навыки', 'Регионы', 'Зарплата'],
          content: ""
      }
  },
  computed: {},
  methods: {
      predict() {
          Api.predict(this.content).then((resp) => {
              this.content = resp.data 
          })
      }
  },
  created() {
    //   this.$store.dispatch('vacancies/getVacancies')
  },
};
</script>

<style>
</style>