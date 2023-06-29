<template>
    <div class="relative" v-if="messages.err || messages.info">
      <div
        :class="{
          'bg-red-200': messages.err,
          'bg-blue-200': messages.info,
        }"
        class="border shadow-lg rounded text-red-800 p-4 mx-8 mt-4 flex items-center"
      >
        <svg
          fill="#ff0000"
          version="1.1"
          id="Capa_1"
          xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink"
          width="60px"
          height="60px"
          viewBox="0 0 478.125 478.125"
          xml:space="preserve"
          class="w-8 h-8 mr-4"
        >
          <g>
            <g>
              <g>
                <circle cx="239.904" cy="314.721" r="35.878" />
                <path
                  d="M256.657,127.525h-31.9c-10.557,0-19.125,8.645-19.125,19.125v101.975c0,10.48,8.645,19.125,19.125,19.125h31.9
                      c10.48,0,19.125-8.645,19.125-19.125V146.65C275.782,136.17,267.138,127.525,256.657,127.525z"
                />
                <path
                  d="M239.062,0C106.947,0,0,106.947,0,239.062s106.947,239.062,239.062,239.062c132.115,0,239.062-106.947,239.062-239.062
                      S371.178,0,239.062,0z M239.292,409.734c-94.171,0-170.595-76.348-170.595-170.596c0-94.248,76.347-170.595,170.595-170.595
                      s170.595,76.347,170.595,170.595C409.887,333.387,333.464,409.734,239.292,409.734z"
                />
              </g>
            </g>
          </g>
        </svg>
        <div class="flex-1">
          {{ messages.err || messages.info }}
        </div>
        <button
          class="border px-2 bg-red-800 text-white"
          @click="hide"
          aria-label="Close"
        >
          X
        </button>
      </div>
    </div>
  </template>

<script setup>
import { reactive, defineProps } from 'vue';

const props = defineProps({
  messages: Object,
});

const state = reactive({
  isVisible: true,
});

function hide() {
  state.isVisible = false;
}



</script>

