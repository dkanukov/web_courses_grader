<template>
  <div>
    <v-row
        class="bg-cyan-accent-4 pt-5 pb-5"
        >
      <v-col
        cols = "3"
        class="pl-15"
      >
        <v-btn @click="$router.push('/')" class="">Главная</v-btn>
      </v-col>
      <v-col
          cols = "3"
          class="pl-15"
      >
        <v-btn @click="$router.push('/CoursePage')" class="">Курсы</v-btn>
      </v-col>
      <v-col
          cols = "3"
          class="pl-15"
      >
        <v-btn @click="$router.push('/CreateCourseView')">Добавить курс</v-btn>
      </v-col>
      <v-col
          cols = "3"
          class="pl-15 d-flex"
      >
        <svg width="40" height="40" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M32 0C14.336 0 0 14.336 0 32C0 49.664 14.336 64 32 64C49.664 64 64 49.664 64 32C64 14.336 49.664 0 32 0ZM16.224 52.096C17.6 49.216 25.984 46.4 32 46.4C38.016 46.4 46.432 49.216 47.776 52.096C43.424 55.552 37.952 57.6 32 57.6C26.048 57.6 20.576 55.552 16.224 52.096ZM52.352 47.456C47.776 41.888 36.672 40 32 40C27.328 40 16.224 41.888 11.648 47.456C8.24849 43.0203 6.40418 37.5886 6.4 32C6.4 17.888 17.888 6.4 32 6.4C46.112 6.4 57.6 17.888 57.6 32C57.6 37.824 55.616 43.168 52.352 47.456ZM32 12.8C25.792 12.8 20.8 17.792 20.8 24C20.8 30.208 25.792 35.2 32 35.2C38.208 35.2 43.2 30.208 43.2 24C43.2 17.792 38.208 12.8 32 12.8ZM32 28.8C29.344 28.8 27.2 26.656 27.2 24C27.2 21.344 29.344 19.2 32 19.2C34.656 19.2 36.8 21.344 36.8 24C36.8 26.656 34.656 28.8 32 28.8Z" fill="black" fill-opacity="0.6"/> </svg>
        <a class="ml-10 align-self-center" href="#">User Name</a>
      </v-col>
    </v-row>

  </div>
</template>

